<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class PartnerController extends Controller
{
   public function savePartner()
    {

        $results="";
       $query = DB::table('partners')->where('partnername',Input::get('partnername'))->count();

        if ($query>0) {
            $results="Partner name already exist";
            return $results;
        }
       

        $gid=md5(uniqid(rand(), true));
        $DATEJOINED=date('Y-m-d', strtotime(Input::get('datejoined'))); 
           DB::table('partners')->insert([
                'GID'=>$gid,
                'DATEJOINED' => $DATEJOINED,
                'BUSINESSTYPE' => Input::get('businesstype'),
                'PARTNERNAME' => Input::get('partnername'),
                'ADDRESS1' => Input::get('address1'),
                'ADDRESS2' => Input::get('address2'),
                'ENCODEDBY' =>'user',
                'ACTIVE'=>'A',
                'DATEENCODED' => date("Y-m-d H:m:s"),
               'DATEMODIFIED' => date("Y-m-d H:m:s"),
                'MODIFIEDBY' => 'user']);

           
            return "";
    }

    public function savePartnerRep()
    {

        $results="";
       
        
        $query = DB::table('partners_representatives')->where('emailaddress',Input::get('emailaddress'))->count();

        if ($query>0) {
            $results="Email address already exist";
            return $results;
        }

         $query = DB::table('partners_representatives')->where('username',Input::get('username'))->count();

        if ($query>0) {
            $results="Username already used";
            return $results;
        }

        $password=Hash::make(Input::get('password'));

        $gid=md5(uniqid(rand(), true));
           DB::table('partners_representatives')->insert([
                'gid'=>$gid,
                'partnername' => Input::get('id'),
                'contactname' => Input::get('contactname'),
                'contacttitle' => Input::get('contacttitle'),
                'emailaddress' => Input::get('emailaddress'),
                'mobileno' => Input::get('mobileno'),
                'telephoneno' => Input::get('telephoneno'),
                'faxno' => Input::get('faxno'),
                'username' => Input::get('username'),
                'password' => $password,
                'passflag'=>'Y',
                'encodedby' =>'user',
                'active'=>'A',
                'DATEENCODED' => date("Y-m-d H:m:s"),
               'DATEMODIFIED' => date("Y-m-d H:m:s"),
                'MODIFIEDBY' => 'user']);

           $email=Input::get('emailaddress');

            Mail::send('emails.sendPartnerNewAccount', ['username' => Input::get('username'),'password' => Input::get('password')], function ($message) use($email)
            {

                $message->subject('Payroll Club');

                $message->from('no_reply@payrollclub.co', 'Payroll Club');

                $message->to($email);

            });
            return "";
    }

    public function getAllPartners()
    {
        $results= DB::select("Select
          partners.id,
          partners.gid,
          date_format(partners.datejoined,'%e-%b-%Y') as datejoined,
          businesstype.businesstype,
          partners.partnername,
          partners.address1,
          partners.address2,
          case when partners.active='A' then 'Active' else 'Inactive' end as active
        From
          partners Inner Join
          businesstype
            On partners.businesstype = businesstype.id order by partnername asc");
        return $results;
    }

     public function getPartnerInfo($id,$gid)
    {
        $results= DB::select("Select
          partners.id,
          partners.gid,
          date_format(partners.datejoined,'%e-%b-%Y') as datejoined,
          businesstype.businesstype,
          partners.partnername,
          partners.address1,
          partners.address2,
          case when partners.active='A' then 'Active' else 'Inactive' end as active
        From
          partners Inner Join
          businesstype
            On partners.businesstype = businesstype.id where partners.id=:id and partners.gid=:gid ",['id' => $id,'gid' => $gid]);
        return $results;
    }

    public function getPartnerRep($id,$gid)
    {
        $results= DB::select("select  partners_representatives.id,partners_representatives.gid,partners.partnername,contactname,contacttitle,emailaddress,username,mobileno,case when partners_representatives.active='A' then 'Active' else 'Inactive' end as active
          from partners
          INNER JOIN partners_representatives on partners.id = partners_representatives.partnername
          where partners.id=:id and partners.gid=:gid
          order by contactname",['id' => $id,'gid' => $gid]);
        return $results;
    }
	
	public function getactivepartners()
    {
        $results= DB::select("select id, partnername from partners where active='A' order by partnername asc");
        return $results;
    }
    
	

   
    public function getPartner($id,$gid)
    {
        $results= DB::select('select * from partners where id = :id and gid=:gid', ['id' => $id,'gid' => $gid]);
        
        return $results;
    }

     public function getPartnerRepInfo($id,$gid)
    {
      $results= DB::select("select partners_representatives.id,businesstype.businesstype, partners_representatives.id,partners_representatives.gid,partners.partnername,contactname,contacttitle,emailaddress,username,mobileno,partners_representatives.active,partners_representatives.telephoneno,partners_representatives.faxno from partners
          INNER JOIN partners_representatives on partners.id = partners_representatives.partnername
          INNER JOIN businesstype on businesstype.id=partners.businesstype
          where partners_representatives.id=:id and partners_representatives.gid=:gid",['id' => $id,'gid' => $gid]);
        return $results;
    }

    public function getMemberPayment($id,$duedate){

       $processday=getProcessDate($id,$duedate);

      $status="";

       if(!empty($processday)){
          $curdate=strtotime(getCurrentDate());
          if($curdate>=strtotime($processday[0]->processdate) && $curdate<=strtotime($processday[0]->enddate)){
               $status="";
          }else{

            $extension=getProcessDateExtension($id,$duedate);
            if(empty($extension)){
             $status="Closed";
            }else{
              $status="";
            }

          }

        } 

       $results= DB::select("
        Select

        ifnull(Format(amountdue,2),0) as balance,
        ifnull(Format(payment,2),0) as payment,
        ifnull(Format(balance,2),0) as difference,
        partnerid,
        postedby,
        payperiod as duedate,
        Date_Format(payperiod, '%e-%b-%Y') As due_date,
        Date_Format(dateposted, '%e-%b-%Y') As dateposted,
        status
        From
        partner_payment
        Where partnerid=:id and payperiod =:duedate ", ['id' => $id,'duedate'=>$duedate]);

        if(!empty($results)){
          if($results[0]->status=="P"){
            if($status=="Closed"){
              $results[0]->status="Closed";  
            }else{
              $results[0]->status="Posted";
            }
          }else if($results[0]->status=="F"){
             $results[0]->status="For Approval";
           }else if($results[0]->status=="A"){
             $results[0]->status="Approve";
          }
        }
        //case when curdate()>=member_payment.processdate and curdate()<=member_payment.duedate then '1' else '0' end as isopen

        return $results;

    }
 


    public function updatePartner()
    {

        $results="";


         $query = DB::table('partners')
         ->where('partnername',Input::get('partnername'))
         ->where('id','<>',Input::get('id'))
         ->count();

        

        

        if ($query>0) {
            $results="Partner name already used.";
            return $results;
        }



         $DATEJOINED=date('Y-m-d', strtotime(Input::get('datejoined'))); 

        
        $whereArr = array('id' => Input::get('id'),'gid' => Input::get('gid'));



        DB::table('partners')
            ->where($whereArr)
            ->update(['DATEJOINED' => $DATEJOINED,
                'BUSINESSTYPE' => Input::get('businesstype'),
                'PARTNERNAME' => Input::get('partnername'),
                'ADDRESS1' => Input::get('address1'),
                'ADDRESS2' => Input::get('address2'),
                'ACTIVE'=>'A',
               'DATEMODIFIED' => date("Y-m-d H:m:s"),
                'MODIFIEDBY' => 'user']);

            


            return $results;
    }

    public function updatePartnerRep()
    {

        $results="";


         $query = DB::table('partners_representatives')
         ->where('emailaddress',Input::get('emailaddress'))
         ->where('id','<>',Input::get('id'))
         ->count();

        if ($query>0) {
            $results="Email address already exist";
            return $results;
        }

         $query = DB::table('partners_representatives')
         ->where('username',Input::get('username'))
         ->where('id','<>',Input::get('id'))
         ->count();

        if ($query>0) {
            $results="Username already used.";
            return $results;
        }




        
        $whereArr = array('id' => Input::get('id'),'gid' => Input::get('gid'));



        DB::table('partners_representatives')
            ->where($whereArr)
            ->update(['contactname' => Input::get('contactname'),
                'contacttitle' => Input::get('contacttitle'),
                'emailaddress' => Input::get('emailaddress'),
                'mobileno' => Input::get('mobileno'),
                'telephoneno' => Input::get('telephoneno'),
                'faxno' => Input::get('faxno'),
                'active' => Input::get('active'),
                'username' => Input::get('username'),
               'datemodified' => date("Y-m-d H:m:s"),
                'modifiedby' => 'user']);

            


            return $results;
    }



    public function partnerLogin()
    {


      $login=array('username' =>  '','name'=>'','partnergid'=>'','partnerid'=>'','passflag'=>'');

      $username=Input::get('username');
      $password=Input::get('password');
      $results= DB::select("SELECT partners.partnername,password,username,passflag,contactname,partners.id,partners.gid FROM partners_representatives 
    INNER join partners on partners_representatives.partnername=partners.id
    where username=:username and partners_representatives.active='A' and partners.active='A'",['username'=>$username]);
      
      if($results){
        $res= DB::select("select id from partners_payrollschedule where partnerid=:partnerid and partnergid=:partnergid ",['partnerid'=>$results[0]->id,'partnergid'=>$results[0]->gid]);
        if($res){
           if(count($res)<12){
               return $login; 
           }else{
              if(password_verify($password,$results[0]->password)){
                $login['username']=$username;
                $login['name']=$results[0]->partnername;
                $login['partnerid']=$results[0]->id;
                $login['partnergid']=$results[0]->gid;
                $login['passflag']=$results[0]->passflag;
                insertLoginLogs($username,'Partner');
              }
           }
        }
      }

      return $login;

    }


    public function partnerLoginReset()
    {

      $password=Hash::make(Input::get('newpassword'));
       DB::table('partners')
            ->where(array('username'=>Input::get('username'),'id'=>Input::get('partnerid'),'gid'=>Input::get('partnergid')))
            ->update(['passflag'=>'Y','password'=>$password]);


    }

    public function saveMemberPayment(){

       $duedate=date('Y-m-d', strtotime(Input::get('duedate'))); 

       $count = DB::table('member_payment')
         ->where('partnerid',Input::get('partnerid'))
         ->where('memberid',Input::get('memberid'))
         ->where('duedate',$duedate)
         ->count();


      if($count<=0){
        DB::table('member_payment')->insert([
                'partnerid' => Input::get('partnerid'),
                'memberid' => Input::get('memberid'),
                'duedate' => $duedate,
                'balance' => Input::get('balance'),
                'payment' => Input::get('payment')]);

      }else{
        DB::table('member_payment')
            ->where(array('partnerid'=>Input::get('partnerid'),'duedate'=>$duedate,'memberid'=>Input::get('memberid')))
            ->update(['balance'=> Input::get('balance'),
            'payment' => Input::get('payment')]);

      }

    }


    public function submitMemberPayment(){



       $results= DB::select("update partner_payment set status='F',datesent=curdate() where  partnerid=:partnerid and payperiod=:duedate",
        ['partnerid'=>Input::get('partnerid'),'duedate'=>Input::get('duedate')]);



    }

     public function rejectMemberPayment(){


         $whereArr = array('partnerid' =>Input::get('partnerid'),'payperiod' =>Input::get('duedate'));


       DB::table('partner_payment')->where($whereArr)->delete();


    }




    public function postMemberPayment(){


        DB::insert("
        insert into member_payment(partnerid,memberid,duedate,balance,payment,carryoverbalance,status) 
        (select partnerid,memberid,duedate,principal,0,principal,'F' from member_payables
        where member_payables.partnerid=:partnerid and member_payables.duedate=:duedate
        and memberid NOT IN (select memberid from member_payment where partnerid=:partnerid1 and duedate=:duedate1))",
        ['partnerid'=>Input::get('partnerid'),'duedate'=>Input::get('duedate'),'partnerid1'=>Input::get('partnerid'),'duedate1'=>Input::get('duedate')]);



       $whereArr = array('partnerid' =>Input::get('partnerid'),'payperiod' =>Input::get('duedate'));


       DB::table('partner_payment')->where($whereArr)->delete();


       $results= DB::select("select sum(balance) as amountdue,sum(payment) as payment,(sum(balance)-sum(payment)) as balance from member_payment where  partnerid=:partnerid and duedate=:duedate",
        ['partnerid'=>Input::get('partnerid'),'duedate'=>Input::get('duedate')]);


        if(!empty($results)){
      
              DB::table('partner_payment')->insert([
                          'partnerid'=>Input::get('partnerid'),
                          'payperiod'=>Input::get('duedate'),
                          'amountdue' => $results[0]->amountdue,
                          'payment' => $results[0]->payment,
                          'balance' => $results[0]->balance,
                          'status'=>'P',
                          'dateposted' => date("Y-m-d H:m:s")]);
        }


    }

    public function resetPassword(){

      $message="";

      $password=Hash::make(Input::get('newpassword'));


      $results= DB::select("select password,emailaddress,username from partners where id=:id and gid=:gid and active='A'",
        ['id'=>Input::get('partnerid'),'gid'=>Input::get('partnergid')]);
      
      if($results){
        if(password_verify(Input::get('oldpassword'),$results[0]->password)){

          $email=$results[0]->emailaddress;
          $username=$results[0]->username;

           DB::table('partners')
            ->where(array('id'=>Input::get('partnerid'),'gid'=>Input::get('partnergid')))
            ->update(['password' => $password]);


            Mail::send('emails.sendPartnerChangePassword',['username' => $username], function ($message) use($email)
            {

                $message->subject('Payroll Club');

                $message->from('no_reply@payrollclub.co', 'Payroll Club');

                $message->to($email);

            });


        }else{
          $message="Incorrect old password";
        }
      }else{
        $message="Invalid partner";
      }

      return $message;
    }

    public function getMemberDuePayment($id,$duedate){

      $processday=getProcessDate($id,$duedate);

      $status="";

       if(!empty($processday)){
          $curdate=strtotime(getCurrentDate());
          if($curdate>=strtotime($processday[0]->processdate) && $curdate<=strtotime($processday[0]->enddate)){
               $status="";
          }else{
             $status="Closed";
          }

        } 
        if($status==""){
            $results= DB::select("select id from partner_payment where partnerid=:partnerid and payperiod=:payperiod", ['partnerid' => $id,'payperiod'=>$duedate]);

            if(!empty($results)){
              $status="Posted";
            }
        }

       $results= DB::select("
       Select
      Format(Sum(member_payables.balance), 2) As balance,
      Sum(member_payables.balance)-IfNull(member_payment.payment, 0) as difference,
      members.firstname,
      members.dailyrate,
      members.middlename,
      members.familyname,
      Date_Format(member_payables.duedate, '%e-%b-%Y') As duedate,
      member_payables.memberid,
      members.partnername,
      members.employeeno,
      department.department,
      case when member_payment.payment is null then 0 else member_payment.payment end As payment,
      case when member_payment.payment is null then 0 else member_payment.payment end As save,
      '$status' as status
      From
      member_payables Left Join
      member_payment
        On member_payables.memberid = member_payment.memberid And
        member_payables.partnerid = member_payment.partnerid And
        member_payables.duedate = member_payment.duedate Inner Join
      members
        On member_payables.memberid = members.id And member_payables.membergid =
        members.gid Left Join
      department
        On members.department = department.id
    Where
      member_payables.partnerid=:partnerid and member_payables.duedate = :duedate
    Group By
      members.firstname, members.middlename, members.familyname,
      member_payables.memberid, members.partnername, members.employeeno,
      department.department, member_payables.duedate, member_payment.payment
    Order By
      members.employeeno asc", ['partnerid' => $id,'duedate'=>$duedate]);
       
        return $results;

    }


    public function getMemberDuePaymentStatus($id,$duedate){
      
      $completed="0";
      $count="0";
       $results= DB::select("
       Select count(memberid) as cnt from (Select memberid
       From
       member_payables
       Where member_payables.partnerid=:partnerid and member_payables.duedate = :duedate
       group by memberid) as request", ['partnerid' => $id,'duedate'=>$duedate]);


       
       $count=$results[0]->cnt;

       $results= DB::select("
        select count(memberid) as cnt from (Select member_payables.memberid
      From
      member_payables Left Join
      member_payment
        On member_payables.memberid = member_payment.memberid And
        member_payables.partnerid = member_payment.partnerid And
        member_payables.duedate = member_payment.duedate Inner Join
      members
      On member_payables.memberid = members.id And member_payables.membergid =
      members.gid Left Join
      department
      On members.department = department.id
      Where member_payables.partnerid=:partnerid and member_payables.duedate = :duedate and member_payment.payment>0
      group by member_payables.memberid) as request", ['partnerid' => $id,'duedate'=>$duedate]);

        $completed=$results[0]->cnt;
        return $completed." of ".$count." completed";

    }

  
     public function  getCurrentPayrolPeriod($id){

        $results=getPartnerPayrolPeriod($id);

        return $results[0]->due_date;
     } 

    public function getBulkMembers($id,$filename){
      try
        {
         

        $res= DB::select('select partnername from partners where id=:id' ,['id'=>$id]);
      
        if($res){
          $partnername=substr($res[0]->partnername,0,2);
        }
        
        $results = Excel::load(storage_path()."/partnerdocuments/".$filename)->get()->toArray();
        $x=0;
        $failed=0;
        $uploaded=0;
        $existing=0;
        foreach($results as $v1) {

          
              foreach ( $v1 as $k2 => $item ) {
                $r="";
                  if($item['employee_no']!="" ){

                  if($item['employee_no']!="" 
                    && $item['first_name']!=""
                    && $item['family_name']!=""
                    && $item['email_address']!=""
                    && $item['gender']!=""
                    && $item['date_hired']!=""
                    && $item['monthly_salary']!=""){

                    $query = DB::table('members')->where('emailaddress',$item['email_address'])->count();

                    if ($query>0) {
                        $r="1";
                    }

                    $query = DB::table('members')->where('employeeno',$item['employee_no'])->count();

                    if ($query>0) {
                        $r="1";
                    }


                    if($r==""){
                      $gid=md5(uniqid(rand(), true));
                      $username="";
                      $username=$username.substr($item['first_name'],0,1);
                      $username=$username.substr($item['family_name'],0,1);
                      $username=$username.$partnername.rand (10000 , 99999 );
                      $username=strtoupper(str_replace(' ','',$username));

                        DB::table('members')->insert([
                          'gid'=>$gid,
                          'partnername' => $id,
                          'firstname' => $item['first_name'],
                          'middlename' => $item['middle_name'],
                          'familyname' =>$item['family_name'],
                          'username' => $username,
                          'emailaddress' => $item['email_address'],
                          'employeeno' =>  $item['employee_no'],
                          'position' => $item['position'],
                          'monthlysalary' => $item['monthly_salary'],
                          'gender' => $item['gender'],
                          'mobileno' => $item['mobile_no'],
                          'hiringdate' => $item['date_hired'],
                          'hoursperweek' => $item['hours_per_week'],
                          'sssno' => $item['sss_no'],
                          'tinno' => $item['tin_no'],
                          'active' => 'I',
                          'registration'=>'',
                          'encodedby' =>'partner',
                          'dateencoded' => date("Y-m-d H:m:s"),
                          'datemodified' => date("Y-m-d H:m:s"),
                          'modifiedby' => 'partner']);
                        $uploaded++;
                        
                      }else{
                        $existing++;
                      }
                
                }else{
                    $failed++;
                    
                }
              }
            }
        }


        $message="Uploaded : ".$uploaded." Existing : ".$existing." Failed : ".$failed;

          return $message;
        }
         catch (Exception $exception)
        {
            $message="Uploaded : ".$uploaded." Existing : ".$existing." Failed : ".$failed;

            return $message;
        }

    }

     public function searchMemberPayment($from,$to)
      {
        $results= DB::select("
          Select
          member_payment.id,
          Date_Format(member_payment.duedate, '%e-%b-%Y') As duedate,
          Date_Format(member_payment.dateposted, '%e-%b-%Y') As dateposted,
          Format(member_payment.balance, 2) balance,
          Format(member_payment.payment, 2) payment,
          Format(member_payment.balance-member_payment.payment, 2) difference,
          members.firstname,
          members.familyname
          From
          member_payment Inner Join
          members
          On member_payment.memberid = members.id
          where member_payment.duedate >=:from and member_payment.duedate<=:to", 
          ['from'=>date('Y-m-d', strtotime($from)),'to'=>date('Y-m-d', strtotime($to))] );
        
        return $results;
    }


    public function searchPostedPayment($from,$to)
      {
        $results= DB::select("
          Select
          Date_Format(member_payment.duedate, '%e-%b-%Y') As duedate,
          Format(member_payment.balance, 2) balance,
          Format(member_payment.payment, 2) payment,
          Format(member_payment.balance-member_payment.payment, 2) difference,
          Date_Format(member_payment.dateposted, '%e-%b-%Y') As dateposted,
          note
          From
          member_payment
          Where
          member_payment.isposted = 'Y' and member_payment.duedate >=:from and member_payment.duedate<=:to
          Group By
          member_payment.duedate, member_payment.balance, member_payment.payment,
          member_payment.dateposted ",
          ['from'=>date('Y-m-d', strtotime($from)),'to'=>date('Y-m-d', strtotime($to))] );
        
        return $results;
    }


   

    public function uploadBulkMember(){
      
    
            
            $destinationPath = 'partnerdocuments'; 
            $partnerid=Input::get('txtid');
            $extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
            
            $fname='member_template_'.$partnerid.'.'.$extension;
                    
            Input::file('file')->move(storage_path().'/'.$destinationPath, $fname); 

            $result=$this->getBulkMembers($partnerid,$fname);

            return $result;


         
  }



public function recoverLoginDetails(){

     $results= DB::select("select username,id,gid,emailaddress from partners where lower(emailaddress)=lower(:emailaddress) and active='A'" ,['emailaddress'=>Input::get('email')]);
      
        if($results){

            $username=$results[0]->username;
            $email=$results[0]->emailaddress;
            $rand=rand(10000,99999);
            $link="http://account.payrollclub.co/#/partnerresetpassword/";
            $link=$link.$results[0]->id."/".$results[0]->gid."/".$rand;
            Mail::send('emails.sendPartnerForgotPassword', ['username'=>$username,'link'=>$link], function ($message) use($email)
            {

                $message->subject('Login details request');

                $message->from('no_reply@payrollclub.co', 'Payroll Club');

                $message->to($email);

            });

             DB::table('partners')
            ->where('emailaddress',  $email)
            ->update(['rand' =>  $rand]);


            return "Your login details has been sent to your email address.";


        }else{
            return "The email address that you provided doest not exist in our system.";
        }
      

  }




public function resetPartnerPassword(){
            $password=Hash::make(Input::get('password'));
            DB::table('partners')
            ->where(array('id'=>Input::get('id'),'gid'=>Input::get('gid'),'rand'=>Input::get('rand')))
            ->update(['password' => $password]);

            insertPasswordResetLogs(Input::get('id'),Input::get('gid'),'Partner');

            $results= DB::select("select emailaddress from partners where id=:id and gid=:gid and active='A'" ,['id'=>Input::get('id'),'gid'=>Input::get('gid')]);
            if($results){
             $email=$results[0]->emailaddress;
             Mail::send('emails.sendPartnerForgotPasswordSuccess', ['name' => ''], function ($message) use($email)
            {

                $message->subject('Password Reset');

                $message->from('no_reply@payrollclub.co', 'Payroll Club');

                $message->to($email);

            });
         }

             return "You successfully changed your password";

  }

  public function getPendingSalaryRequest($id)
      {
        $results= DB::select("
          Select
          member_loans.id As loanid,
          Format(member_loans.previousnetsal, 2) previousnetsal,
          Date_Format(member_loans.dateapplied, '%e-%b-%Y') As dateapplied,
          Date_Format(member_loans.payperiod, '%e-%b-%Y') As payperiod,
          members.firstname,
          members.familyname,
          members.middlename,
            case when member_loans.withdeduction='Y' then 'With Deduction' else 'Without Deduction' end as withdeduction
        From
          member_loans Inner Join
          members
            On member_loans.memberid = members.id And member_loans.membergid =
            members.gid
        Where
          member_loans.status = 'E'
                  and partnerid=:partnerid ", 
                  ['partnerid'=>$id] );
        
        return $results;
    }

    public function getPendingSalaryRequestDetails($id)
      {
        $results= DB::select("
          Select
          member_loans.id As loanid,
          Format(member_loans.previousnetsal, 2) previousnetsal,
          Date_Format(member_loans.dateapplied, '%e-%b-%Y') As dateapplied,
          Date_Format(member_loans.payperiod, '%e-%b-%Y') As payperiod,
          members.employeeno,
          concat(members.firstname,members.familyname) as membername,
            case when member_loans.withdeduction='Y' then 'With Deduction' else 'Without Deduction' end as withdeduction
        From
          member_loans Inner Join
          members
            On member_loans.memberid = members.id And member_loans.membergid =
            members.gid
        Where
          member_loans.status = 'E'
                  and member_loans.id=:loanid ", 
                  ['loanid'=>$id] );
        
        return $results;
    }

    public function AprroveSalaryRequest(){
      $flag="";
      $status="";
      if(Input::get('flag')=="A"){
        $flag="approved";
        $status="F";
      }else{
        $flag="disapproved";
        $status="G";
      }
      $whereArr = array('partnerid' => Input::get('partnerid'),'id' => Input::get('id'));

       DB::table('member_loans')
            ->where($whereArr)
            ->update(['status' => $status]);

        insertMemberLoanLogs(Input::get('id'),'B',Input::get('partnerid'),'partner');

        if(Input::get('flag')=="D"){
          

          $requestdetails=getLoanRequestDetails(Input::get('id'));
          $netpay=$requestdetails[0]->previousnetsal;
          $loanamount=$requestdetails[0]->loanamount;
          $dateapplied=$requestdetails[0]->dateapplied;

          $member=getMemberInformation($requestdetails[0]->memberid,$requestdetails[0]->membergid);
          
          $emailaddress=$member[0]->emailaddress;
          $firstname=$member[0]->firstname;
          $currdate=substr(date("M"), 0,3).date(" d").date(", Y");


          Mail::send('emails.sendLoanDisapproved', ['firstname' => $firstname,'loanid'=>Input::get('id'),'dateapplied'=>$dateapplied,
            'dateapproved'=>$currdate,'loanamount'=>number_format($loanamount,2)], function ($message) use($emailaddress)
                  {


                      $message->subject('Salary Advance Request');

                      $message->from('no_reply@payrollclub.co', 'Payroll Club');

                      $message->to($emailaddress);

                  });



        }
        return "[ Request No. ".Input::get('id')." ] Salary request successfully ".$flag;

    }

   

    public function sendRegistrationNotification()
    {
        
        $source=Input::get('source');
        DB::table('members')
            ->where('id', Input::get('memberid'))
            ->where('gid', Input::get('membergid'))
            ->update(['registration' => 'A','active' => 'A','datejoined' => date("Y-m-d H:m:s"),'source'=>$source]);



        $results= DB::select("select id,gid,firstname,emailaddress,username from members where  id=:id and gid=:gid",['id' => Input::get('memberid'),'gid' => Input::get('membergid')]);
        
            $name=$results[0]->firstname;
            $username=$results[0]->username;
            $email=$results[0]->emailaddress;
            $pin=Input::get('pin');

        if($name!=""){
          

           Mail::send('emails.sendPartnerRegistration', ['name' => $name,'username'=>$username,'pin'=>$pin], function ($message) use($email)
            {

                $message->subject('Payroll Club Membership Registration');

                $message->from('registration@payrollclub.co', 'Payroll Club');

                $message->to($email);

            });

          

        }



    }
}
