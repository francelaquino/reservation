<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class ReportController extends Controller
{
   
 public function searchMembers()
    {
      $datejoined=Input::get('datejoined');
      if(Input::get('datejoined')==""){
        $datejoined=date("Y-m-d");
      }


      
        $partnername=Input::get('partnername');
        $status=Input::get('status');
        $where="";
        
        if($partnername!=""){
            $where =$where . "members.partnername=".$partnername." and ";
        }

        if($status!=""){
            $where =$where . "members.active='$status' and ";
        }
        if($where!=""){
          $where=" and ".substr($where,0,strlen($where)-4);
        }




       $results= DB::select("
      Select
      members.username,
      partners.partnername,
      members.firstname,
      members.middlename,
      members.familyname,
      members.gender,
      date_format(members.birthday,'%e-%b-%Y') as birthday,
      members.emailaddress,
      members.mobileno,
      members.sssno,
      members.tinno,
      members.source,
      members.emailaddress,
      date_format(members.datejoined,'%e-%b-%Y') as datejoined,
      members.employeeno,
      members.position,
      membership_type.type,
      case when members.active='A' then 'Active' else 'Inactive' end as active
      From
      members Inner Join
      partners
      On members.partnername = partners.id Left Join
      membership_type
      On members.membership = membership_type.code 
      where members.datejoined<=:datejoined "
      .$where,
       ['datejoined' => date('Y-m-d', strtotime($datejoined))]);

      return $results;
    }


    public function searchPartners()
    {
      $datejoined=Input::get('datejoined');
      if(Input::get('datejoined')==""){
        $datejoined=date("Y-m-d");
      }

       if(Input::get('status')==""){

        $results= DB::select("Select
            date_format(partners.datejoined,'%e-%b-%Y') as datejoined,
            businesstype.businesstype,
            partners.partnername,
            partners.address1,
            partners.address2,
            (select count(id) from partners_representatives where partners_representatives.partnername=partners.id) as representative,
            case when partners.active='A' then 'Active' else 'Inactive' end as active
            From
            partners Inner Join
            businesstype
            On partners.businesstype = businesstype.id 
            where  partners.datejoined<=:datejoined order by datejoined asc",
            ['datejoined' => date('Y-m-d', strtotime($datejoined))]);
       }else{
          $results= DB::select("Select
          date_format(partners.datejoined,'%e-%b-%Y') as datejoined,
          businesstype.businesstype,
          partners.partnername,
          partners.address1,
          partners.address2,
          (select count(id) from partners_representatives where partners_representatives.partnername=partners.id) as representative,
          case when partners.active='A' then 'Active' else 'Inactive' end as active
          From
          partners Inner Join
          businesstype
          On partners.businesstype = businesstype.id 
          where  partners.datejoined<=:datejoined and partners.active=:status order by datejoined asc",
          ['datejoined' => date('Y-m-d', strtotime($datejoined)),'status'=>Input::get('status')]);
       }


      return $results;
    }

    public function searchRepresentatives()
    {
        if(Input::get('partnername')==""){
          $results= DB::select("select  partners.partnername,contactname,contacttitle,emailaddress,username,mobileno,case when partners_representatives.active='A' then 'Active' else 'Inactive' end as active
            from partners
            INNER JOIN partners_representatives on partners.id = partners_representatives.partnername
            order by partnername");  
        }else{
          $results= DB::select("select  partners.partnername,contactname,contacttitle,emailaddress,username,mobileno,case when partners_representatives.active='A' then 'Active' else 'Inactive' end as active
            from partners
            INNER JOIN partners_representatives on partners.id = partners_representatives.partnername
            where partners.id like :id
            order by partnername",['id' => Input::get('partnername')]);
        }
        return $results;
    }

    public function searchPayrollSchedule()
    {
      $results= DB::select("SELECT id,MONTHNAME(STR_TO_DATE(concat(month,'/',endday,'/',year),'%m/%d/%Y')) as monthname,
            month,startday,endday,processday,year FROM partners_payrollschedule 
            where partnerid=:id  order by month,startday asc",
            ['id' =>Input::get('partnername')]);
        return $results;
    }


    public function searchSalaryAdvance()
      {
        $datefrom=Input::get('datefrom');
        if(Input::get('datefrom')==""){
          $datefrom=date("Y-m-d");
        }

        $dateto=Input::get('dateto');
        if(Input::get('dateto')==""){
          $dateto=date("Y-m-d");
        }
        $partnername=Input::get('partnername');
        $plan=Input::get('plan');
        $where="";
        
        if($partnername!=""){
            $where =$where . "member_loans.partnerid='".$partnername."' and ";
        }

        if($plan!=""){
            $where =$where . "member_loans.loantype='$plan' and ";
        }
        if($where!=""){
          $where=" and ".substr($where,0,strlen($where)-4);
        }

            $results= DB::select("
            Select
            members.firstname,
            members.familyname,
            partners.partnername,
            member_loans.id,
            loanplan.loantype,
            Format(member_loans.loanamount, 2) loanamount,
            Date_Format(member_loans.dateapplied, '%e-%b-%Y') As dateapplied,
            Date_Format(member_loans.payperiod, '%e-%b-%Y') As payperiod,
            trasactionstatus.status,
            Format((select case when sum(amount) is null then 0 else sum(amount) end amount from loan_deductions where  loan_deductions.loanid=member_loans.id),2) as deductions,
            Format((select case when sum(amount) is null then 0  else sum(amount) end from loan_billpayment where  loan_billpayment.loanid=member_loans.id)+
            (select case when sum(amount) is null then 0  else sum(amount) end from loan_loadphone where  loan_loadphone.loanid=member_loans.id)+
            (select case when sum(amount) is null then 0  else sum(amount) end from loan_onlinegame where  loan_onlinegame.loanid=member_loans.id),2) as addons
            From
            member_loans Inner Join
            loanplan
            On member_loans.loantype = loanplan.code 
            Inner Join
            trasactionstatus
            On member_loans.status = trasactionstatus.code
            Inner Join members
            On member_loans.memberid=members.id and member_loans.membergid=members.gid
            Inner Join partners
            On member_loans.partnerid =partners.id
            where 
            member_loans.dateapplied >=:datefrom and member_loans.dateapplied<=:dateto and type='L' "
            .$where, 
            ['datefrom' => date('Y-m-d', strtotime($datefrom)),'dateto' =>date('Y-m-d', strtotime($dateto))] );
        
        return $results;
    }


     public function searchMemberUpcomingPayment()
    {

      $pay_period=getCurrentPayrolPeriod(Input::get('partnername'));

       $payperiod=$pay_period[0]->due_date;

      $results= DB::select("select duedate,partnername,firstname,familyname,format(balance,2) as balance,format(carryover,2) as carryover, format(balance+ carryover,2) as totalbalance from 
      (select partners.partnername,members.firstname,members.familyname,case when sum(balance) is null then 0 else sum(balance) end as balance,
      (select case when sum(balance) is null then 0 else sum(balance) end from member_payables as m where m.type='C' and m.duedate=member_payables.duedate) as carryover,
      Date_Format(member_payables.duedate, '%e-%b-%Y') As duedate from member_payables 
      inner join members on member_payables.memberid=members.id and member_payables.membergid=members.gid
      inner join partners on member_payables.partnerid=partners.id
      where member_payables.type='L' and  member_payables.status='O' and duedate=:duedate and member_payables.partnerid=:partnerid
      group by partners.partnername,members.firstname,members.familyname,duedate) as payables",
       ['duedate'=>$payperiod,'partnerid'=>Input::get('partnername')]);

        return $results;
    }


 public function searchAddOns()
    {

     $datefrom=Input::get('datefrom');
        if(Input::get('datefrom')==""){
          $datefrom=date("Y-m-d");
        }

        $dateto=Input::get('dateto');
        if(Input::get('dateto')==""){
          $dateto=date("Y-m-d");
        }
        $partnername=Input::get('partnername');
        $where="";
        
        if($partnername!=""){
            $where =$where . "partnerid='".$partnername."' and ";
        }

        if($where!=""){
          $where=" where " .substr($where,0,strlen($where)-4);
        }

            $results= DB::select("
            select * from (select member_loans.partnerid, member_loans.dateapplied,member_loans.payperiod, partners.partnername,members.firstname,members.familyname,  member_loans.id,biller.billername as addon,format(loan_billpayment.amount,2) as amount ,format(loan_billpayment.fee,2) as fee from member_loans 
            inner join loan_billpayment on member_loans.id=loan_billpayment.loanid
            inner join biller on biller.id=loan_billpayment.biller
            INNER join partners on partners.id=member_loans.partnerid
            inner join members on members.id=member_loans.memberid and members.gid=member_loans.membergid
            union
            select member_loans.partnerid,member_loans.dateapplied,member_loans.payperiod, partners.partnername,members.firstname,members.familyname,  member_loans.id,mobilesubscriber.subscriber as addon,format(loan_loadphone.amount,2) as amount,format(loan_loadphone.fee,2) as fee from member_loans 
            inner join loan_loadphone on member_loans.id=loan_loadphone.loanid
            inner join mobilesubscriber on mobilesubscriber.id=loan_loadphone.subscriber
            INNER join partners on partners.id=member_loans.partnerid
            inner join members on members.id=member_loans.memberid and members.gid=member_loans.membergid
            union
            select member_loans.partnerid,member_loans.dateapplied,member_loans.payperiod, partners.partnername,members.firstname,members.familyname,  member_loans.id,onlinegame.product as addon,format(loan_onlinegame.amount,2) as amount,format(loan_onlinegame.fee,2) as fee from member_loans 
            inner join loan_onlinegame on member_loans.id=loan_onlinegame.loanid
            inner join onlinegame on loan_onlinegame.product=onlinegame.id
            INNER join partners on partners.id=member_loans.partnerid
            inner join members on members.id=member_loans.memberid and members.gid=member_loans.membergid) as tbladdons"
            .$where, 
            ['datefrom' => date('Y-m-d', strtotime($datefrom)),'dateto' =>date('Y-m-d', strtotime($dateto))] );
        
        return $results;
    }



}
