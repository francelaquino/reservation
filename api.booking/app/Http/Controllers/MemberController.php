<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
	
	


    public function sendRegistrationNotification()
    {


        $results= DB::select("select id,gid,firstname,emailaddress from members where  id=:id and gid=:gid",['id' => Input::get('memberid'),'gid' => Input::get('membergid')]);
        
            $name=$results[0]->firstname;
            $email=$results[0]->emailaddress;

        /*if($name!=""){
            Mail::send('emails.sendRegistration', ['name' => $name], function ($message) use($email)
            {

                $message->subject('Payroll Club Membership Registration');

                $message->from('registration@payrollclub.co', 'Payroll Club');

                $message->to($email);

            });

            DB::table('members')
            ->where('id', Input::get('memberid'))
            ->where('gid', Input::get('membergid'))
            ->update(['registration' => 'D','datejoined' => date("Y-m-d H:m:s")]);


        }*/



    }

    public function checkPayrollProcessPeriod($id,$gid){

        $status="O";
        
        $member=getMemberInformation($id,$gid);

        $currdate=getCurrentDate();

        $partnerid= $member[0]->partnername;

        $payperiod=getCurrentPayrolPeriod($partnerid);

        $results= DB::select("select id from partners_payrollschedule where partnerid=:partnerid
        and '$currdate'>=Str_To_Date(Concat(month, '/',
        processday, '/', year), '%m/%d/%Y') and '$currdate'<=Str_To_Date(Concat(month, '/',
        endday, '/', year), '%m/%d/%Y') and '$currdate'>=Str_To_Date(Concat(month, '/',
        startday, '/', year), '%m/%d/%Y') and '$currdate'<=Str_To_Date(Concat(month, '/',
        endday, '/', year), '%m/%d/%Y')",
            ['partnerid'=>$partnerid]);

        if(!empty($results)){
            $status="C";
        }
        return $status;

    }

    public function saveMemberProfile()
    {

        $results="";
        $partnername="";
        
        $query = DB::table('members')->where('emailaddress',Input::get('emailaddress'))->count();

        if ($query>0) {
            $results="Email address already exist";
            return $results;
        }

         $query = DB::table('members')->where('employeeno',Input::get('employeeno'))->count();

        if ($query>0) {
            $results="Employee no. already exist";
            return $results;
        }

         $res= DB::select('select partnername from partners where id=:id' ,['id'=>Input::get('partnerid')]);
      
        if($res){
          $partnername=substr($res[0]->partnername,0,2);
        }
      



		    $gid=md5(uniqid(rand(), true));
        $birthday=date('Y-m-d', strtotime(Input::get('birthday'))); 
        $hiringdate=date('Y-m-d', strtotime(Input::get('hiringdate'))); 
        $contractend=date('Y-m-d', strtotime(Input::get('contractend'))); 
        $username="";
        $username=$username.substr(Input::get('firstname'),0,1);
        $username=$username.substr(Input::get('familyname'),0,1);
        $username=$username.$partnername.rand (10000 , 99999 );
        $username=strtoupper(str_replace(' ','',$username));

           $id=DB::table('members')->insertGetId([
                'gid'=>$gid,
                'partnername' => Input::get('partnerid'),
        				'sssno' => Input::get('sssno'),
        				'tinno' => Input::get('tinno'),
                'firstname' => Input::get('firstname'),
                'middlename' => Input::get('middlename'),
                'familyname' => Input::get('familyname'),
                'username' => $username,
                'birthday' => $birthday,
                'civilstatus' => Input::get('civilstatus'),
                'gender' => Input::get('gender'),
                'emailaddress' => Input::get('emailaddress'),
                'mobileno' => Input::get('mobileno'),
                'telephoneno' => Input::get('telephoneno'),
                'address1' => Input::get('address1'),
                'address2' => Input::get('address2'),
                'employeeno' => Input::get('employeeno'),
                'employeestatus' => Input::get('employeestatus'),
                'contractend' => $contractend,
                'hiringdate' => $hiringdate,
                'position' => Input::get('position'),
                'department' => Input::get('department'),
                'monthlysalary' => Input::get('monthlysalary'),
                'hoursperweek' => Input::get('hoursperweek'),
                'active' => 'I',
                'registration'=>'',
                'encodedby' =>'admin',
                'datejoined' => date("Y-m-d H:m:s"),
                'dateencoded' => date("Y-m-d H:m:s"),
                'datemodified' => date("Y-m-d H:m:s"),
                'modifiedby' => 'admin']);

           
           return $results;
    }


    public function saveMemberProfileStep1()
    {

        $results=array('id' =>  '','gid'=>'','message'=>'');
        $partnername="";
        
        $whereArr = array('emailaddress' =>Input::get('emailaddress'),'active' =>'A');

        $query = DB::table('members')->where($whereArr)->count();

        if ($query>0) {
            $results['message']="Email address already exist";
            return $results;
        }
        $whereArr = array('employeeno' =>Input::get('employeeno'),'active' =>'A');
         $query = DB::table('members')->where($whereArr)->count();

        if ($query>0) {
            $results['message']="Employee no. already exist";
            return $results;
        }

         $res= DB::select('select partnername from partners where id=:id' ,['id'=>Input::get('partnerid')]);
      
        if($res){
          $partnername=substr($res[0]->partnername,0,2);
        }
      



        $gid=md5(uniqid(rand(), true));
        $birthday=date('Y-m-d', strtotime(Input::get('birthday'))); 
        $hiringdate=date('Y-m-d', strtotime(Input::get('hiringdate'))); 
        $username="";
        $username=$username.substr(Input::get('firstname'),0,1);
        $username=$username.substr(Input::get('familyname'),0,1);
        $username=$username.$partnername.rand (10000 , 99999 );
        $username=strtoupper(str_replace(' ','',$username));

        $membership="S";
        if((int)Input::get('hoursperweek')<=40 || Input::get('employeestatus')=='2'){
            $membership="S";
        }else{
            $membership="G";
        }


           $id=DB::table('members')->insertGetId([
                'gid'=>$gid,
                'partnername' => Input::get('partnerid'),
                'sssno' => Input::get('sssno'),
                'tinno' => Input::get('tinno'),
                'firstname' => Input::get('firstname'),
                'middlename' => Input::get('middlename'),
                'familyname' => Input::get('familyname'),
                'username' => $username,
                'birthday' => $birthday,
                'membership'=>$membership,
                'civilstatus' => Input::get('civilstatus'),
                'gender' => Input::get('gender'),
                'emailaddress' => Input::get('emailaddress'),
                'mobileno' => Input::get('mobileno'),
                'telephoneno' => Input::get('telephoneno'),
                'address1' => Input::get('address1'),
                'address2' => Input::get('address2'),
                'employeeno' => Input::get('employeeno'),
                'employeestatus' => Input::get('employeestatus'),
                'hiringdate' => $hiringdate,
                'position' => Input::get('position'),
                'department' => Input::get('department'),
                'monthlysalary' => Input::get('monthlysalary'),
                'hourlyrate' => Input::get('hourlyrate'),
                'hoursperweek' => Input::get('hoursperweek'),
                'active' => 'T',
                'passflag' => 'N',
                'contractend'=>Input::get('enddate'),
                'registration'=>'',
                'encodedby' =>'partner',
                'dateencoded' => date("Y-m-d H:m:s"),
                'datemodified' => date("Y-m-d H:m:s"),
                'modifiedby' => 'partner']);

            $results['id']=$id;
            $results['gid']=$gid;
           return $results;
    }
    
    public function updateMemberInformation()
    {

        
        $birthday=date('Y-m-d', strtotime(Input::get('birthday'))); 
        $hiringdate=date('Y-m-d', strtotime(Input::get('hiringdate'))); 
        $contractend=date('Y-m-d', strtotime(Input::get('contractend'))); 
         $whereArr = array('id' => Input::get('id'),'gid' => Input::get('gid'));

        DB::table('members')
            ->where($whereArr)
            ->update(['firstname' => Input::get('firstname'),
                'middlename' => Input::get('middlename'),
                'familyname' => Input::get('familyname'),
                'birthday' => $birthday,
                'civilstatus' => Input::get('civilstatus'),
                'gender' => Input::get('gender'),
                'emailaddress' => Input::get('emailaddress'),
                'mobileno' => Input::get('mobileno'),
                'telephoneno' => Input::get('telephoneno'),
                'contractend' => $contractend,
                'address1' => Input::get('address1'),
                'address2' => Input::get('address2'),
                'employeeno' => Input::get('employeeno'),
                'sssno' => Input::get('sssno'),
                'tinno' => Input::get('tinno'),
                'employeestatus' => Input::get('employeestatus'),
                'hiringdate' => $hiringdate,
                'position' => Input::get('position'),
                'department' => Input::get('department'),
                'monthlysalary' => Input::get('monthlysalary'),
                'hourlyrate' => Input::get('hourlyrate'),
                'hoursperweek' => Input::get('hoursperweek'),
                'datemodified' => date("Y-m-d H:m:s"),
                'modifiedby' => 'admin']);

               insertMemberUpdateLogs(Input::get('username'),'admin');
    }
    
    public function activateMember($id,$gid){


      $this->sendsingleactivation($id,$gid);

    }
    public function updateMemberProfile()
    {


          $whereArr = array('memberid' =>Input::get('id'),'membergid' =>Input::get('gid'),'status' => 'F');
        DB::table('members_updaterequest')->where($whereArr)->delete();
        


        $birthday=date('Y-m-d', strtotime(Input::get('birthday'))); 
        $hiringdate=date('Y-m-d', strtotime(Input::get('hiringdate'))); 
        $enddate="";
        if(Input::get('enddate')){
            $enddate=date('Y-m-d', strtotime(Input::get('enddate'))); 
        }

        if(Input::get('requestedby')=="partner"){
             $whereArr = array('memberid' => Input::get('id'),'requestedby'=>'partner');
            DB::table('members_updaterequest')->where($whereArr)->delete();
        }
        


        DB::table('members_updaterequest')->insert([
                'memberid'=>Input::get('id'),
                'membergid'=>Input::get('gid'),
                'sssno' => Input::get('sssno'),
                'tinno' => Input::get('tinno'),
                'firstname' => Input::get('firstname'),
                'middlename' => Input::get('middlename'),
                'familyname' => Input::get('familyname'),
                'birthday' => $birthday,
                'contractend'=>$enddate,
                'civilstatus' => Input::get('civilstatus'),
                'gender' => Input::get('gender'),
                'emailaddress' => Input::get('emailaddress'),
                'mobileno' => Input::get('mobileno'),
                'telephoneno' => Input::get('telephoneno'),
                'sssno' => Input::get('sssno'),
                'tinno' => Input::get('tinno'),
                'address1' => Input::get('address1'),
                'address2' => Input::get('address2'),
                'employeeno' => Input::get('employeeno'),
                'employeestatus' => Input::get('employeestatus'),
                'hiringdate' => $hiringdate,
                'position' => Input::get('position'),
                'department' => Input::get('department'),
                'monthlysalary' => Input::get('monthlysalary'),
                'hourlyrate' => Input::get('hourlyrate'),
                'hoursperweek' => Input::get('hoursperweek'),
                'requestedby' => Input::get('requestedby'),
                'status' => 'F',
                'daterequested' => date("Y-m-d H:m:s")]);




            


    }


    public function approveMemberRequestUpdate()
    {


         
        
          $whereArr = array('id' =>Input::get('id'),'gid' =>Input::get('gid'));


        $birthday=date('Y-m-d', strtotime(Input::get('birthday'))); 
        $hiringdate=date('Y-m-d', strtotime(Input::get('hiringdate'))); 
        $enddate=date('Y-m-d', strtotime(Input::get('enddate'))); 
        



        DB::table('members')
            ->where($whereArr)
            ->update(['firstname' => Input::get('firstname'),
                'middlename' => Input::get('middlename'),
                'familyname' => Input::get('familyname'),
                'birthday' => $birthday,
                'civilstatus' => Input::get('civilstatus'),
                'gender' => Input::get('gender'),
                'emailaddress' => Input::get('emailaddress'),
                'mobileno' => Input::get('mobileno'),
                'tinno' => Input::get('tinno'),
                'sssno' => Input::get('sssno'),
                'telephoneno' => Input::get('telephoneno'),
                'address1' => Input::get('address1'),
                'address2' => Input::get('address2'),
                'employeeno' => Input::get('employeeno'),
                'employeestatus' => Input::get('employeestatus'),
                'hiringdate' => $hiringdate,
                'contractend' => $enddate,
                'position' => Input::get('position'),
                'department' => Input::get('department'),
                'monthlysalary' => Input::get('monthlysalary'),
                'hoursperweek' => Input::get('hoursperweek'),
                'datemodified' => date("Y-m-d H:m:s"),
                'modifiedby' => 'partner']);


            $whereArr = array('memberid' =>Input::get('id'),'membergid' =>Input::get('gid'),'status'=>'F');

            DB::table('members_updaterequest')
            ->where($whereArr)
            ->update(['status' => 'A',
                'statusdate' => date("Y-m-d H:m:s")]);


            


    }
    
    public function updateMemberValidId()
    {
        
        DB::table('members')
            ->where('id', Input::get('memberid'))
            ->update(['sssno' => Input::get('sssno'),
                'tinno' => Input::get('tinno')]);
        
        
    }
    public function uploaddocuments(){
        
	   $file = array('image' => Input::file('file'));

	   $rules = array('image' => 'required'); 

	   $validator = Validator::make($file, $rules);
	   if ($validator->fails()) {
	
	       return "validation failed";
	   
     }else {
    
          if (Input::file('file')->isValid()) {
      	 	
            $destinationPath = 'memberdocuments'; 
            //$fname = Input::file('file')->getClientOriginalName();
      	    $memberid=Input::get('txtid');
            $membergid=Input::get('txtgid');
      	    $documentid=Input::get('txtdocument');
            $extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
            
      	    $fname=$memberid.'_'.$documentid.'.'.$extension;
                if($extension=='png' || $extension=='jpg' || $extension=='jpeg' || $extension=='bmp' ){
                    
              		      if( Input::file('file')->getSize()<=4194304){
                         Input::file('file')->move(storage_path().'/'.$destinationPath, $fname); 
                          
              			     $whereArr = array('memberid' => $memberid,'membergid' => $membergid,'documentid' => $documentid);
              			
              			       DB::table('member_documents')
                          ->where($whereArr)
                          ->update(['filename' => $fname,
                              'dateuploaded' => date("Y-m-d H:m:s"),
                              'uploadedby' => 'user']);
                        }
                }
            
            return 'Upload successfully';
          }
          else {
            
            return 'uploaded file is not valid';
          }
    }
}

    

    public function sendsingleactivation($id,$gid){

        $results= DB::select("select id,gid,firstname,emailaddress from members where  id=:id and gid=:gid",['id' => $id,'gid'=>$gid]);
        $name=$results[0]->firstname;
        $email=$results[0]->emailaddress;
        $link="http://account.payrollclub.co/#/welcome/";
        $link=$link.$results[0]->id."/".$results[0]->gid;

        if($name!=""){


          $where = array('id' => $id,'gid' => $gid);

              DB::table('members')
                          ->where($where)
                          ->update(['registration' => 'F',
                            'linksent' => date("Y-m-d H:m:s"),
                              'linkexpiration' => date('Y-m-d', strtotime("+30 days"))]);

                          
            /*Mail::send('emails.sendActivation', ['link' => $link,'name' => $name], function ($message)  use ($name,$email)
            {

                $message->subject('Payroll Club Membership Activation');

                $message->from('registration@payrollclub.co', 'Payroll Club');

                $message->to($email);

            });*/

              
        }
    }
    
    public function getallmembers()
    {

        $results= DB::select("select members.id,members.datejoined, partners.partnername, firstname, middlename, familyname, department.department, position from members,partners,department where partners.id=members.partnername and department.id=members.department order by partnername");
        return $results;
    }

     public function getmembershiptype()
    {

        $results= DB::select("select code,type from membership_type where active='A'");
        return $results;
    }

    public function getallmembersbypartner($id)
    {
        $results= DB::select("select employeeno,id,gid,datejoined, firstname, middlename, familyname, position,case when members.active='A' then 'Active' else 'Inactive' end as active,monthlysalary,hoursperweek,username from members where   active<>'T' and partnername=:partnername and active!='T' order by members.id",['partnername' => $id]);
        return $results;
    }

    public function getallinactivemembersbypartner($id)
    {
        $results= DB::select("select partnername as partnerid,members.employeeno,members.id,members.gid,members.datejoined, firstname, middlename, familyname, department.department, position,members.active,monthlysalary,hoursperweek,date_format(members.linksent,'%e-%M-%Y') as linksent, date_format(members.linkexpiration,'%e-%M-%Y') as linkexpiration  from members,department where  department.id=members.department and partnername=:partnername and members.active='I' order by members.id",['partnername' => $id]);
        return $results;
    }

    public function getallinactivemembers()
    {
        $results= DB::select("Select
        members.employeeno,
        members.id,
        members.gid,
        members.datejoined,
        members.firstname,
        members.middlename,
        members.familyname,
        members.position,
        members.active, 
        members.monthlysalary,
        members.hoursperweek,
        Date_Format(members.linksent, '%e-%M-%Y') As linksent,
        Date_Format(members.linkexpiration, '%e-%M-%Y') As linkexpiration,
        partners.partnername
      From
        members Inner Join
        partners
          On members.partnername = partners.id
      Where
        members.active = 'I'
      Order By
        members.id");
        return $results;
    }

    
	
	
	
    public function getmember($id,$gid)
    {
        $results= DB::select("Select
        members.id,members.gid,membership,username,members.datejoined,members.partnername,firstname,middlename,familyname,civilstatus,
        gender,emailaddress,mobileno,telephoneno,members.address1,members.address2,employeeno,employeestatus,
        date_format(hiringdate, '%e-%b-%Y') as hiringdate,date_format(birthday, '%e-%b-%Y') as birthday,position,department,monthlysalary,hourlyrate,
        hoursperweek,sssno,tinno,partners.partnername As partner_name,
        case when contractend is null then '' else date_format(contractend, '%e-%b-%Y')  end as contractend
      From
        members Inner Join
        partners
          On members.partnername = partners.id where members.id = :id and members.gid=:gid", ['id' => $id,'gid' => $gid]);
      
        
        return $results;
    }

    public function getmembership($id,$gid)
    {
        $results= DB::select("SELECT membership_type.type,username,
        date_format(datejoined,'%e-%M-%Y') as datejoined,
        case when MEMBERS.active='A' then 'Active' else 'Inactive' end as active  FROM MEMBERS
        INNER JOIN membership_type ON members.membership= membership_type.CODE
         where members.id = :id and members.gid=:gid", ['id' => $id,'gid' => $gid]);
        
        return $results;
    }



    public function getmemberupdaterequest($id)
    {
        $results= DB::select("Select *
      From
        members_updaterequest where id = :id and status='F'", ['id' => $id]);
       if (count($results)>0) {
            $results[0]->hiringdate=date('d-M-Y', strtotime($results[0]->hiringdate));
            $results[0]->birthday=date('d-M-Y', strtotime($results[0]->birthday));
            if($results[0]->contractend!=""){
                $results[0]->contractend=date('d-M-Y', strtotime($results[0]->contractend));
            }
        }
        
        return $results;
    }

     public function getAccountDetails($id,$gid)
    {

        $member=getMemberInformation($id,$gid);

        $partnerid= $member[0]->partnername;


         $payperiod=getCurrentPayrolPeriod($partnerid);
                

        $results= DB::select("
        Select
        members.username,
        '' as duedate,
        members.id,
        (Select
        Format(IfNull(Sum(member_payables.balance), 0), 2)
        From
        member_payables
        Where
        member_payables.memberid = members.id And
        member_payables.membergid = members.gid And
        member_payables.duedate=:duedate) As totalbalance,
        membership_type.type
        From
        members Inner Join
        membership_type
        On members.membership = membership_type.code
        where members.id = :id and members.gid=:gid 
        Group By
        members.id, members.datejoined, membership_type.type", ['duedate'=> $payperiod[0]->due_date,'id' => $id,'gid' => $gid]);

        $duepayment= DB::select("
        Select
        Format(IfNull(Sum(member_payables.balance), 0), 2) As balance,
        date_format(member_payables.duedate,'%e-%M-%Y') as duedate
        From
        member_payables
        Where CURDATE()<member_payables.duedate and memberid = :id and membergid=:gid   And member_payables.duedate=:duedate
        Group By
        member_payables.duedate
        Limit 1", ['id' => $id,'gid' => $gid,'duedate'=>$payperiod[0]->due_date]);
       //and member_payables.status = 'O'
        if(!empty($duepayment)){
            $results[0]->amountdue=$duepayment[0]->balance;
            $results[0]->duedate=$payperiod[0]->duedate;
        }else{
            $results[0]->amountdue="0.00";
            $results[0]->duedate=$payperiod[0]->duedate;
        }
       
        
        return $results;
    }

    public function getDuePayments($id,$gid)
    {
        $results= DB::select("
        Select
          Format(member_payables.balance, 2) As balance,
          Format(member_payables.principal, 2) As principal,
          Format(member_payables.interest, 2) As interest,
          Date_Format(member_payables.duedate, '%e-%M-%Y') As duedate,
          case when member_payables.loanid=0 then 'Carry Over Balance' when  member_payables.loanid=1 then 'Admin Fee' 
          else member_payables.loanid  end as loanid,
          case when member_payables.loanid=0 then 'Carry Over Balance'
          when member_payables.loanid=1 then 'Admin Fee' else
          case when member_loans.type='B' then 'Bills Payment' else loanplan.loantype end
          end as loantype
        From
          member_payables As member_payables Left Join
          member_loans
            On member_payables.loanid = member_loans.id Left Join
          loanplan
            On member_loans.loantype = loanplan.code
        Where
         
          member_payables.duedate = (Select
            member_payables.duedate
          From
            member_payables as mempay
          Where
            member_payables.status = 'O' And
          member_payables.memberid = member_payables.memberid And
          member_payables.membergid = member_payables.membergid And
           member_payables.memberid =mempay.memberid And
          member_payables.membergid =mempay.membergid
          Group By
            member_payables.duedate
          Order By
            member_payables.duedate
          Limit 1) And
          member_payables.status = 'O' and member_payables.memberid = :id and member_payables.membergid=:gid
        Group By
          Format(member_payables.balance, 2), member_payables.loanid, loanplan.loantype,
          member_payables.duedate, member_payables.principal, member_payables.interest,
          member_payables.balance" , ['id' => $id,'gid' => $gid]);
       
       
        
        return $results;
    }


    public function getAccountBalanceDetails($id,$gid)
    {
        $results= DB::select("
         Select
          Format(member_payables.principal, 2) As principal,
          Format(member_payables.interest, 2) As interest,
          Format(member_payables.balance, 2) As balance,
          case when member_payables.loanid=0 then 'Carry Over Balance' 
          else member_payables.loanid  end as loanid,
          Date_Format(member_payables.duedate, '%e-%M-%Y') As duedate,
          loanplan.loantype
        From
          member_payables Left Join
          member_loans
            On member_payables.loanid = member_loans.id Left Join
          loanplan
            On member_loans.loantype = loanplan.code
        Where
          member_payables.status = 'O' And
          member_payables.memberid=:id and member_payables.membergid=:gid
        Order By
          member_payables.duedate asc", ['id' => $id,'gid' => $gid] );


        return $results;
    }

     public function getFees($id,$gid)
    {
        $results= DB::select("select adminfee,billpaymentfee,loadphonefee,onlinegamefee from settings");
        return $results;
    }



    


     public function getMemberBillPayment($id,$gid)
      {
        $results= DB::select("
        Select
        member_loans.id,
        Format(member_loans.principal, 2) principal,
        Format(member_loans.interest, 2) interest,
        Format(member_loans.totalamount, 2) totalamount,
        Date_Format(member_loans.dateapplied, '%e-%M-%Y') As dateapplied,
        member_loans.status As statusid,
        status.status As status,
        biller.billername,
        member_loans.billno
        From
        member_loans Inner Join
        status
        On member_loans.status = status.id Inner Join
        biller
        On member_loans.biller = biller.id
        Where
        memberid=:id and membergid=:gid and  member_loans.type = 'B' 
        Limit 20", ['id' => $id,'gid' => $gid] );
      
      return $results;
    }

    public function getMemberBillPaymentHistory($id,$gid,$from,$to)
      {
        $results= DB::select("
        Select
        member_loans.id,
        Format(member_loans.principal, 2) principal,
        Format(member_loans.interest, 2) interest,
        Format(member_loans.totalamount, 2) totalamount,
        Date_Format(member_loans.dateapplied, '%e-%M-%Y') As dateapplied,
        member_loans.status As statusid,
        status.status As status,
        biller.billername,
        member_loans.billno
        From
        member_loans Inner Join
        status
        On member_loans.status = status.id Inner Join
        biller
        On member_loans.biller = biller.id
        Where
        memberid=:id and membergid=:gid and  member_loans.type = 'B' and member_loans.dateapplied >=:from and member_loans.dateapplied<=:to",
        ['id' => $id,'gid' => $gid,'from'=>date('Y-m-d', strtotime($from)),'to'=>date('Y-m-d', strtotime($to))] );
      
      return $results;
    }

     public function getPaymentHistory($id,$duedate)
      {
        $results= DB::select("
        Select
        id,
        Format(balance, 2) as dueamount,
        Format(carryoverbalance, 2) as carryoverbalance,
        Format(carryoverbalance-(balance-payment), 2) as interest,
        Format(balance-payment, 2) as balance,
        Format(payment, 2) as payment,
        Date_Format(duedate, '%e-%M-%Y') As duedate,
        duedate As due_date
        from member_payment
        Where
        memberid=:id  and  duedate =:duedate and status='B'",
        ['id' => $id,'duedate'=>$duedate] );
      
      return $results;
    }


    public function getSalaryRequest($id,$gid)
      {
        $results= DB::select("
     Select
      member_loans.id,
      member_loans.loantype as loantypeid,
      loanplan.loantype,
      Format(member_loans.loanamount, 2) loanamount,
      Date_Format(member_loans.dateapplied, '%e-%M-%Y') As dateapplied,
      Date_Format(member_loans.payperiod, '%e-%M-%Y') As payperiod,
      member_loans.status As statusid,
      trasactionstatus.status
    From
      member_loans Inner Join
      loanplan
        On member_loans.loantype = loanplan.code Inner Join
      trasactionstatus
        On member_loans.status = trasactionstatus.code
      where memberid=:id and membergid=:gid and type='L' ", ['id' => $id,'gid' => $gid] );
      
      return $results;
    }


    public function searchLoanHistory($id,$gid,$from,$to)
      {
      
       $birthday=date('Y-m-d', strtotime(Input::get('birthday'))); 


      $results= DB::select("
      Select
      member_loans.id,
      loanplan.loantype,
      Format(member_loans.principal, 2) principal,
      Format(member_loans.interest, 2) interest,
      Format(member_loans.totalamount, 2) totalamount,
      Date_Format(member_loans.dateapplied, '%e-%M-%Y') As dateapplied,
      member_loans.status As statusid,
      status.status As status
      From
      member_loans Inner Join
      loanplan
      On member_loans.loantype = loanplan.code Inner Join
      status
      On member_loans.status = status.id
      where memberid=:id and membergid=:gid and type='L' and member_loans.dateapplied >=:from and member_loans.dateapplied<=:to", 
      ['id' => $id,'gid' => $gid,'from'=>date('Y-m-d', strtotime($from)),'to'=>date('Y-m-d', strtotime($to))] );
      
      return $results;
    }


    public function getmemberdetailed($id,$gid)
    {
        $results= DB::select('Select
          members.id,
          members.gid,
          members.datejoined,
          partners.partnername,
          members.firstname,
          members.middlename,
          members.familyname,
          members.birthday,
          civilstatus.civilstatus,
          members.emailaddress,
          members.mobileno,
          members.telephoneno,
          members.address1,
          members.address2,
          members.employeeno,
          members.employeestatus,
          members.hiringdate,
          members.position,
          department.department,
          format(members.monthlysalary,2) monthlysalary,
          members.hoursperweek,
          members.sssno,
          members.tinno,
          members.gender
            From
          members Inner Join
          partners
            On members.partnername = partners.id Inner Join
          civilstatus
            On members.civilstatus = civilstatus.id Inner Join
          department
            On members.department = department.id where members.id = :id and members.gid=:gid', ['id' => $id,'gid' => $gid]);
       if (count($results)>0) {
            $results[0]->hiringdate=date('d-M-Y', strtotime($results[0]->hiringdate));
            $results[0]->birthday=date('d-M-Y', strtotime($results[0]->birthday));
        }
        
        return $results;
    }
    
    
    public function verifyFirstLoanApplication($id,$gid)
    {
         $query = DB::table('member_loans')
         ->where('memberid',Input::get('memberid'))
         ->where('id',Input::get('id'))
         ->where('flag','1')
         ->where('status','F')
         ->count();
        
        return $query;
    }
    
    public function getSecurityQuestion($id)
    {
        $results= DB::select('SELECT questionid,answer from member_security_question where memberid = :id order by seq asc', ['id' => $id]);
        
        return $results;
    }
    
    
     public function checkmemberdocuments($id,$gid)
	  
    {
		
		DB::insert("insert into member_documents(memberid,membergid,documentid,filename) select $id,'$gid',id,'' from requireddocuments where id not in (select documentid from member_documents where memberid=:id and membergid=:gid )", ['id' => $id,'gid'=>$gid]);
        
    }
    
	 public function getmemberdocuments($id,$gid)
 
    {

        $results= DB::select("Select
          member_documents.id,
          member_documents.memberid,
          requireddocuments.document,
          member_documents.filename,
         date_format(member_documents.dateuploaded,'%e-%M-%Y') as dateuploaded
          From
          member_documents Inner Join
          requireddocuments
          On member_documents.documentid = requireddocuments.id where filename<>'' and requireddocuments.actv='A' and memberid= :id and membergid= :gid
          order by requireddocuments.seq asc", ['id' => $id,'gid'=>$gid]);
        
        return $results;
    }

    public function getmemberrequireddocuments($id,$gid)
 
    {

        $results= DB::select("Select
          member_documents.id,
          member_documents.memberid,
          requireddocuments.id as docid,
          requireddocuments.document,
          member_documents.filename,
          date_format(member_documents.dateuploaded,'%e-%M-%Y') as dateuploaded
          From
          member_documents Inner Join
          requireddocuments
          On member_documents.documentid = requireddocuments.id where requireddocuments.actv='A' and memberid= :id and membergid= :gid
          order by requireddocuments.seq asc", ['id' => $id,'gid'=>$gid]);
        
        return $results;
    }
	public function removedocument($docid,$memberid,$filename){
		 
        $whereArr = array('memberid' =>$memberid,'documentid' => $docid);
        DB::table('member_documents')->where($whereArr)->delete();
		
		    $destinationPath = 'memberdocuments'; 
		
		    File::delete(storage_path().'/'.$destinationPath."/".$filename);
	}


    public function getmemberdocument($filename){
         
        $destinationPath = 'memberdocuments'; 

        $path = storage_path().'/'.$destinationPath.'/'.$filename;

        $response = Response::make(File::get($path));
        $response->header('Content-Type', 'image/png');
            return $response;
    }

    public function memberLogin()
    {
      $q=rand (1 , 5 );
      $login=array('filename' => '', 'username' =>  '','name'=>'','id'=>'','gid'=>'','memberid'=>'','membergid'=>'','question'=>'','questionid'=>'');
      $username=Input::get('username');
      $password=Input::get('password');
      
     

      $results= DB::select("Select
      members.id,
      members.gid,
      members.firstname,
      members.familyname,
      members.password,
      members.partnername,
      member_documents.filename
      From
      members Left Join
      member_documents
      On members.id = member_documents.memberid And
      members.gid = member_documents.membergid
      Where
      members.username = :username And
      members.active = 'A' And
      member_documents.documentid = 'ProfilePicture'",['username'=>$username]);
      
      if($results){
         $res= DB::select("select id from partners_payrollschedule where partnerid=:partnerid ",['partnerid'=>$results[0]->partnername]);
          if(!$res){
            return $login; 
          }else{
             if(count($res)<12){
               return $login; 
             }else{
                if(password_verify($password,$results[0]->password)){
                    $login['username']=$username;
                    $login['name']=$results[0]->firstname.' '.$results[0]->familyname;
                    $login['memberid']=$results[0]->id;
                    $login['membergid']=$results[0]->gid;
                    $login['filename']=$results[0]->filename;

                    $results= DB::select("Select
                    member_security_question.questionid,
                    security_questions.question
                    From
                    member_security_question Inner Join
                    security_questions
                    On member_security_question.questionid = security_questions.id
                    Where
                    member_security_question.memberid =  :memberid ORDER BY RAND() LIMIT 1",['memberid'=> $login['memberid']]);

                    if($results){
                      $login['question']=$results[0]->question;
                      $login['questionid']=$results[0]->questionid;
                    }
                }
             }

          }
      }



      return $login;

    }


    public function memberCheckSecurityQuestion()
    {
     

      $results= DB::select("select answer from member_security_question where memberid=:memberid and questionid=:questionid",
        ['memberid'=>Input::get('memberid'),'questionid'=>Input::get('questionid')]);
      
      if($results){


        if(Input::get('answer')==$results[0]->answer){
            return "";
          }else{
            return "You provided wrong answer to security question";
          }

        }

    }


    



public function resetMemberPin(){
            $pin=Hash::make(Input::get('pin'));
            DB::table('members')
            ->where(array('id'=>Input::get('id'),'gid'=>Input::get('gid'),'rand'=>Input::get('rand')))
            ->update(['password' => $pin]);


            insertPasswordResetLogs(Input::get('id'),Input::get('gid'),'Member');


            $results= DB::select("select firstname,emailaddress from members where id=:id and gid=:gid and active='A'" ,['id'=>Input::get('id'),'gid'=>Input::get('gid')]);
            if($results){
             
             $email=$results[0]->emailaddress;
             $name=$results[0]->firstname;


             Mail::send('emails.sendMemberForgotPasswordSuccess', ['name' => $name], function ($message) use($email)
            {

                $message->subject('6 Digit Pin Reset');

                $message->from('no_reply@payrollclub.co', 'Payroll Club');

                $message->to($email);

            });
         }

             return "You successfully changed your 6 digit pin";

}

public function recoverLoginDetails(){

     $results= DB::select("select firstname,username,id,gid,emailaddress from members where lower(emailaddress)=lower(:emailaddress) and active='A'" ,['emailaddress'=>Input::get('email')]);
      
        if($results){

            $username=$results[0]->username;
            $email=$results[0]->emailaddress;
            $name=$results[0]->firstname;
            $rand=rand(10000,99999);
            $link="http://account.payrollclub.co/#/memberresetpin/";
            $link=$link.$results[0]->id."/".$results[0]->gid."/".$rand;
            Mail::send('emails.sendMemberForgotPassword', ['name' => $name,'username'=>$username,'link'=>$link], function ($message) use($email)
            {

                $message->subject('Login details request');

                $message->from('no_reply@payrollclub.co', 'Payroll Club');

                $message->to($email);

            });

             DB::table('members')
            ->where('emailaddress',  $email)
            ->update(['rand' =>  $rand]);


            return "Your login details has been sent to your email address.";


        }else{
            return "The email address that you provided doest not exist in our system.";
        }
      

}

public function savePayNowApplication(){


        $results="";
        $id=Input::get('memberid');
        $gid=Input::get('membergid');

        $totalfee=Input::get('loadphonefee')+Input::get('billpaymentfee')+Input::get('onlinegamefee')+Input::get('fee');

        $addon=Input::get('addon');


        $loanamount=Input::get('loanamount');

        $fee=Input::get('fee');


        $cashreceived=$loanamount-$totalfee-$addon;

       

        
        



        $member=getMemberInformation($id,$gid);

        $partnerid= $member[0]->partnername;
        $membername=$member[0]->firstname." ".$member[0]->familyname;
        $email=$member[0]->emailaddress;
        $name=$member[0]->firstname;

        $payperiod=getCurrentPayrolPeriod($partnerid);

       
      
            $loanid=DB::table('member_loans')->insertGetId([
                'memberid'=>$id,
                'membergid'=>$gid,
                'loantype'=>Input::get('plan'),
                'cashreceived'=>$cashreceived,
                'partnerid'=>$partnerid,
                'fee'=>$fee,
                'totalfee'=>$totalfee,
                'loanamount'=>$loanamount,
                'deduction'=>Input::get('deductionamount'),
                'status'=>'F',
                'payperiod'=>$payperiod[0]->due_date,
                'paymentstart'=>$payperiod[0]->due_date,
                'paymentend'=>$payperiod[0]->due_date,
                'type'=>'L',
                'terms'=>1,
                'dateapplied'=>date("Y-m-d H:m:s")]);

            $partneremail=getPartnerEmail($partnerid);

             /*Mail::send('emails.sendSalaryRequestApproval', ['membername' => $membername,'netpay'=>Input::get('netpaysalary'),'loanid'=>$loanid], function ($message) use($partneremail)
            {

                $message->subject('Salary Advance Request for Approval');

                $message->from('no_reply@payrollclub.co', 'Payroll Club');

                $message->to($partneremail);

            });*/
        


            return $loanid;


    }



public function savePayPlusApplication(){


        $results="";
        $id=Input::get('memberid');
        $gid=Input::get('membergid');

        $totalfee=Input::get('loadphonefee')+Input::get('billpaymentfee')+Input::get('onlinegamefee');

        $addon=Input::get('addon');


        $loanamount=Input::get('loanamount');


        $cashreceived=$loanamount-$totalfee-$addon;

        $deduction=$cashreceived/(int)Input::get('terms');

        $member=getMemberInformation($id,$gid);

        $partnerid= $member[0]->partnername;
        $membername=$member[0]->firstname." ".$member[0]->familyname;
        $email=$member[0]->emailaddress;
        $name=$member[0]->firstname;

        $payperiod=getCurrentPayrolPeriod($partnerid);

        $paymentend=getPaymentEnd($id,$gid,Input::get('terms'));

      
            $loanid=DB::table('member_loans')->insertGetId([
                'memberid'=>$id,
                'membergid'=>$gid,
                'loantype'=>"C",
                'cashreceived'=>$cashreceived,
                'partnerid'=>$partnerid,
                'fee'=>0,
                'feeperperiod'=>Input::get('fee'),
                'deductionperperiod'=>$deduction,
                'totalfee'=>$totalfee,
                'loanamount'=>$loanamount,
                'deduction'=>Input::get('deductionamount'),
                'status'=>'F',
                'payperiod'=>$payperiod[0]->due_date,
                'paymentstart'=>$payperiod[0]->due_date,
                'paymentend'=>$paymentend,
                'type'=>'L',
                'terms'=>Input::get('terms'),
                'dateapplied'=>date("Y-m-d H:m:s")]);

            $partneremail=getPartnerEmail($partnerid);

             /*Mail::send('emails.sendSalaryRequestApproval', ['membername' => $membername,'netpay'=>Input::get('netpaysalary'),'loanid'=>$loanid], function ($message) use($partneremail)
            {

                $message->subject('Salary Advance Request for Approval');

                $message->from('no_reply@payrollclub.co', 'Payroll Club');

                $message->to($partneremail);

            });*/
        


            return $loanid;


    }

    public function getPayrollPeriod($id,$gid){


        

        $results= DB::select("SELECT concat(DATE_FORMAT(STR_TO_DATE(concat(month,'/',startday,'/',year),'%m/%d/%Y'), '%d-%b-%y'),' to ',DATE_FORMAT(STR_TO_DATE(concat(month,'/',endday,'/',year),'%m/%d/%Y'), '%d-%b-%y')) as period,
            STR_TO_DATE(concat(month,'/',endday,'/',year),'%m/%d/%Y') as endday FROM partners_payrollschedule 
            order by STR_TO_DATE(concat(month,'/',endday,'/',year),'%m/%d/%Y') asc");
        

            return $results;


    }

   
    public function checkAdminFee($id){
        return checkAdminFee($id);
    }

     public function checkPayNowAdminFee(){
        return checkPayNowAdminFee();
    }

    

    public function checkPayrollPeriod($id,$gid){
        $status="O";
       /* $member=getMemberInformation($id,$gid);

         $partnerid= $member[0]->partnername;

         $pay_period=getCurrentPayrolPeriod($partnerid);

          $payperiod=$pay_period[0]->due_date;


        $results= DB::select("Select id from partner_payment where isposted='Y' and partnerid=:partnerid and payperiod=:payperiod",
        ['partnerid'=>$partnerid,'payperiod'=>$payperiod]);

        if(!empty($results)){
                $status="C";
        }*/
        return $status;

    }

    public function getCurrentPayrolPeriod($id,$gid){
        $member=getMemberInformation($id,$gid);

         $partnerid= $member[0]->partnername;

         $payperiod=getCurrentPayrolPeriod($partnerid);


        return $payperiod;

    }


    public function getRequestHistory($id,$gid){


        $member=getMemberInformation($id,$gid);

       $partnerid= $member[0]->partnername;

        $pay_period=getCurrentPayrolPeriod($partnerid);


        $payperiod=$pay_period[0]->due_date;



        $results="";
        if($payperiod!=""){

        $results= DB::select("
        select * from (
        Select
        'Date Requested' As transaction,
        Date_Format(member_loans.dateapplied, '%M %e, %Y') As amount,
          member_loans.id As id,dateapplied,0 as seq
        From
          member_loans
          where member_loans.memberid='$id' and member_loans.membergid='$gid'
          and member_loans.payperiod='$payperiod'
        Union
        Select
        'Pay Advance Amount' As transaction,
          Format(member_loans.loanamount, 2) As amount,
          member_loans.id As id,dateapplied,1 as seq
        From
          member_loans
          where member_loans.memberid='$id' and member_loans.membergid='$gid' 
          and member_loans.payperiod='$payperiod'
        Union
        Select
        'Pay Advance Fee' As transaction,
          Format(member_loans.fee, 2) As amount,
          member_loans.id As id,dateapplied,2 as seq
        From
          member_loans
          where member_loans.memberid='$id' and member_loans.membergid='$gid'
          and member_loans.payperiod='$payperiod'
        Union
        Select
          Concat(biller.billername, ' (Bill Payment)') As transaction,
          Format(loan_billpayment.amount, 2) As amount,
          loan_billpayment.loanid As id,member_loans.dateapplied,3 as seq
        From
          loan_billpayment Inner Join
          biller
          On loan_billpayment.biller = biller.id
          Inner Join member_loans
          on loan_billpayment.loanid=member_loans.id
          where loan_billpayment.memberid='$id' and loan_billpayment.membergid='$gid'
          and loan_billpayment.payperiod='$payperiod'
          Union
          Select
          Concat(biller.billername, ' (Bill Payment Fee)') As transaction,
          Format(loan_billpayment.fee, 2) As amount,
          loan_billpayment.loanid As id,member_loans.dateapplied,4 as seq
        From
          loan_billpayment Inner Join
          biller
          On loan_billpayment.biller = biller.id
          Inner Join member_loans
          on loan_billpayment.loanid=member_loans.id
          where loan_billpayment.memberid='$id' and loan_billpayment.membergid='$gid'
          and loan_billpayment.payperiod='$payperiod'
          Union
        Select
          Concat(mobilesubscriber.subscriber, ' (Mobile Load)') As transaction,
          Format(loan_loadphone.amount, 2) As amount,
          loan_loadphone.loanid As id,member_loans.dateapplied,5 as seq
        From
          loan_loadphone Inner Join
          mobilesubscriber
            On loan_loadphone.subscriber = mobilesubscriber.id
             Inner Join member_loans
          on loan_loadphone.loanid=member_loans.id
          where loan_loadphone.memberid='$id' and loan_loadphone.membergid='$gid'
          and loan_loadphone.payperiod='$payperiod'
        union
        Select
          Concat(mobilesubscriber.subscriber, ' (Mobile Load Fee)') As transaction,
          Format(loan_loadphone.fee, 2) As amount,
          loan_loadphone.loanid As id,member_loans.dateapplied,6 as seq
        From
          loan_loadphone Inner Join
          mobilesubscriber
            On loan_loadphone.subscriber = mobilesubscriber.id
             Inner Join member_loans
          on loan_loadphone.loanid=member_loans.id
          where loan_loadphone.memberid='$id' and loan_loadphone.membergid='$gid'
          and loan_loadphone.payperiod='$payperiod'
        union
        Select
          Concat(onlinegame.product, ' (Online Game)') As transaction,
          Format(loan_onlinegame.amount, 2) As amount,
          loan_onlinegame.loanid As id,member_loans.dateapplied,7 as seq
        From
          loan_onlinegame Inner Join
          onlinegame
            On loan_onlinegame.product = onlinegame.id
            Inner Join member_loans
          on loan_onlinegame.loanid=member_loans.id
          where loan_onlinegame.memberid='$id' and loan_onlinegame.membergid='$gid'
          and loan_onlinegame.payperiod='$payperiod'
          Union
           Select
          Concat(onlinegame.product, ' (Online Game Fee)') As transaction,
          Format(loan_onlinegame.fee, 2) As amount,
          loan_onlinegame.loanid As id,member_loans.dateapplied,8 as seq
        From
          loan_onlinegame Inner Join
          onlinegame
            On loan_onlinegame.product = onlinegame.id
            Inner Join member_loans
          on loan_onlinegame.loanid=member_loans.id
          where loan_onlinegame.memberid='$id' and loan_onlinegame.membergid='$gid'
          and loan_onlinegame.payperiod='$payperiod'
          Union
          Select
        'Actual Amount Received' As transaction,
          Format(member_loans.cashreceived, 2) As amount,
          member_loans.id As id,dateapplied,9 as seq
            From
          member_loans
          where member_loans.memberid='$id' and member_loans.membergid='$gid' 
          and member_loans.payperiod='$payperiod'

          ) as history 
          order by id, seq");

        }
            return $results;


    }


    public function getRequestHistoryTotal($id,$gid){


        $member=getMemberInformation($id,$gid);

        $partnerid= $member[0]->partnername;

        $payperiod=getCurrentPayrolPeriod($partnerid);
            


        $duedate=$payperiod[0]->due_date;
        $results= DB::select("
        select format(sum(amount),2) as amount from (Select loanamount as amount
        From
          member_loans
          where member_loans.memberid='$id' and member_loans.membergid='$gid' and payperiod='$duedate' and status='B'
          Union
          Select balance as amount 
          from member_payables where member_payables.memberid='$id' and member_payables.membergid='$gid' and member_payables.duedate='$duedate' and type='C') as total");

            return $results;


    }

    

     public function estimatedSalary($id,$gid,$hours){

        $member=getMemberInformation($id,$gid);

        $estimatedSalary=(int)$hours*$member[0]->hourlyrate;

        return $estimatedSalary;


    }


    public function getMemberInformation($id,$gid){
        $member=getMemberInformation($id,$gid);
        return $member;
    }


    public function getRequestTotal($id,$gid){


        $member=getMemberInformation($id,$gid);

        $partnerid= $member[0]->partnername;

        $payperiod=getCurrentPayrolPeriod($partnerid);
            

        $duedate=$payperiod[0]->due_date;
        $results= DB::select("Select format(sum(loanamount),2) as amount,sum(loanamount) as totalamount From member_loans where member_loans.memberid='$id' and member_loans.membergid='$gid' and payperiod='$duedate' and status='B'");

            return $results;


    }

    public function saveBillPayment(){
      
      $billpayment=array(
        'biller' =>  '',
        'memberid' =>  '',
        'membergid' =>  '',
        'loanid' =>  '',
        'fee' =>  '',
        'billno' =>  '',
        'amount' =>  ''
        );
      
       $results =Input::all();
        if(count($results)>0){
            $billpayment=$results[0];
           
            $member=getMemberInformation($billpayment['memberid'],$billpayment['membergid']);

            $partnerid= $member[0]->partnername;

            $payperiod=getCurrentPayrolPeriod($partnerid);
            




           for($x=0;$x<count($results);$x++){
                $billpayment=$results[$x];

                DB::table('loan_billpayment')->insert([
                'memberid'=>$billpayment['memberid'],
                'membergid'=>$billpayment['membergid'],
                'fee'=>$billpayment['fee'],
                'payperiod'=>$payperiod[0]->due_date,
                'loanid'=>(int)$billpayment['loanid'],
                'biller'=>$billpayment['biller'],
                'billno'=>$billpayment['billno'],
                'amount'=>$billpayment['amount'],
                'insertdate' => date("Y-m-d H:m:s")]);

           }
       }



    }


public function saveDeduction(){
      
      $deductions=array(
        'memberid' =>  '',
        'membergid' =>  '',
        'loanid' =>  '',
        'deduction' =>  '',
        'amount' =>  ''
        );
      
       $results =Input::all();
        if(count($results)>0){
            $deductions=$results[0];
           
            $member=getMemberInformation($deductions['memberid'],$deductions['membergid']);

            $partnerid= $member[0]->partnername;

            $payperiod=getCurrentPayrolPeriod($partnerid);
            




           for($x=0;$x<count($results);$x++){
                $deductions=$results[$x];

                DB::table('loan_deductions')->insert([
                'memberid'=>$deductions['memberid'],
                'membergid'=>$deductions['membergid'],
                'payperiod'=>$payperiod[0]->due_date,
                'loanid'=>(int)$deductions['loanid'],
                'deduction'=>$deductions['deduction'],
                'amount'=>$deductions['amount'],
                'insertdate' => date("Y-m-d H:m:s")]);

           }
       }



    }

    public function saveLoadPhone(){
      
      $loadphone=array(
        'memberid' =>  '',
        'membergid' =>  '',
        'loanid' =>  '',
        'mobileno' =>  '',
        'subscriber' =>  '',
        'fee' =>  '',
        'amount' =>  ''
        );
      
       $results =Input::all();
        if(count($results)>0){
            $billpayment=$results[0];
           
            $member=getMemberInformation($billpayment['memberid'],$billpayment['membergid']);

            $partnerid= $member[0]->partnername;

            $payperiod=getCurrentPayrolPeriod($partnerid);
        

           for($x=0;$x<count($results);$x++){
                $loadphone=$results[$x];

                DB::table('loan_loadphone')->insert([
                'memberid'=>$loadphone['memberid'],
                'membergid'=>$loadphone['membergid'],
                'loanid'=>(int)$loadphone['loanid'],
                'payperiod'=>$payperiod[0]->due_date,
                'fee'=>$loadphone['fee'],
                'subscriber'=>$loadphone['subscriber'],
                'mobileno'=>$loadphone['mobileno'],
                'amount'=>$loadphone['amount'],
                'insertdate' => date("Y-m-d H:m:s")]);

           }
        }

                                

    }
    
    public function getExistingRequestTotal($id,$gid){
        $member=getMemberInformation($id,$gid);

        $partnerid= $member[0]->partnername;

        $pay_period=getCurrentPayrolPeriod($partnerid);

        $payperiod=$pay_period[0]->due_date;

         $results= DB::select("
        Select case when sum(loanamount)  is null then 0 else sum(loanamount) end as loanamount from member_loans where memberid=:memberid and membergid=:membergid and payperiod=:payperiod",
        ['memberid'=>$id,'membergid'=>$gid,'payperiod'=>$payperiod]);

      
      return $total=$results[0]->loanamount;
    }


        public function getTimesheet($id,$gid,$payperiod){

        $results= DB::select("Select * from timesheet where memberid=:memberid and membergid=:membergid and payperiod=:payperiod order by day",['memberid'=>$id,'membergid'=>$gid,'payperiod'=>$payperiod]);

         return $results;


    }
    public function savetimesheet(){
         $results =Input::all();

        if(count($results)>0){

             $timesheet=$results[0];
       
            $member=getMemberInformation($timesheet['memberid'],$timesheet['membergid']);

            $partnerid= $member[0]->partnername;

            $payperiod=getCurrentPayrolPeriod($partnerid);

            $whereArr = array('memberid' => $timesheet['memberid'],'payperiod'=>$payperiod[0]->due_date,'membergid'=>$timesheet['membergid']);
                DB::table('timesheet')->where($whereArr)->delete();
           

            

           
            
               
        




           for($x=0;$x<count($results);$x++){
                $timesheet=$results[$x];

                DB::table('timesheet')->insert([
                'memberid'=>$timesheet['memberid'],
                'membergid'=>$timesheet['membergid'],
                'category'=>$timesheet['category'],
                'noofhours'=>$timesheet['noofhours'],
                'day'=>$x,
                'payperiod'=>$payperiod[0]->due_date]);

           }
       }


    }
    public function saveOnlineGame(){
      
      $onlinegame=array(
        'memberid' =>  '',
        'membergid' =>  '',
        'loanid' =>  '',
        'mobileno' =>  '',
        'quantity' =>  '',
        'product' =>  '',
        'fee' =>  '',
        'amount' =>  ''
        );
      
       $results =Input::all();
        if(count($results)>0){
          $billpayment=$results[0];
       
            $member=getMemberInformation($billpayment['memberid'],$billpayment['membergid']);

            $partnerid= $member[0]->partnername;

            $payperiod=getCurrentPayrolPeriod($partnerid);


           for($x=0;$x<count($results);$x++){

                $onlinegame=$results[$x];

                DB::table('loan_onlinegame')->insert([
                'memberid'=>$onlinegame['memberid'],
                'membergid'=>$onlinegame['membergid'],
                'loanid'=>(int)$onlinegame['loanid'],
                'product'=>$onlinegame['product'],
                'payperiod'=>$payperiod[0]->due_date,
                'mobileno'=>$onlinegame['mobileno'],
                'fee'=>$onlinegame['fee'],
                'amount'=>$onlinegame['amount'],
                'quantity'=>$onlinegame['quantity'],
                'insertdate' => date("Y-m-d H:m:s")]);

           }

        }

                                

    }

    public function getPrevSalaryRequest($id,$gid){
       $results= DB::select("
        Select id from member_loans where memberid=:memberid and membergid=:membergid and status in ('A','E','F')",
        ['memberid'=>$id,'membergid'=>$gid]);
      
      return count($results);
    }

    public function getExistingPayPlus($id,$gid){
       $results= DB::select("
        Select id from member_loans where memberid=:memberid and membergid=:membergid and status='B' and loantype='C'",
        ['memberid'=>$id,'membergid'=>$gid]);
      
      return count($results);
    }




    public function getSalaryRequestDetails($loanid){

        $results=array(
            'plan' =>  '',
            'dateapplied'=>'',
            'loanamount'=>'',
            'adminfee'=>'',
            'id'=>$loanid,
            'cashreceived'=>'');

        $loans= DB::select("select loantype,Date_Format(dateapplied, '%M %e, %Y') As dateapplied,
            Format(member_loans.loanamount, 2) As loanamount,
            Format(member_loans.fee, 2) As adminfee,
            Format(member_loans.cashreceived, 2) As cashreceived
            From
            member_loans
            where id='$loanid'");
        if($loans[0]->loantype=="A"){
            $results["plan"]="PayNow";
        }else{
             $results["plan"]="PayMeExpress";
        }
        $results["loanamount"]=$loans[0]->loanamount;
        $results["cashreceived"]=$loans[0]->cashreceived;
        $results["dateapplied"]=$loans[0]->dateapplied;
        $results["adminfee"]=$loans[0]->adminfee;

        return $results;

       
    }

    public function getSalaryRequestDetailsDeduction($loanid){

        $results= DB::select("select deductions.deduction,format(amount,2) as amount FROM loan_deductions
        INNER join deductions on loan_deductions.deduction=deductions.id where loanid='$loanid'");

        return $results;
    }

    public function getSalaryRequestDetailsAddon($loanid){

        $results= DB::select("select * from (Select
          Concat(biller.billername, ' (Bill Payment)') As transaction,
          Format(loan_billpayment.amount, 2) As amount,
          1 as seq
        From
          loan_billpayment Inner Join
          biller
          On loan_billpayment.biller = biller.id
          Inner Join member_loans
          on loan_billpayment.loanid=member_loans.id
          where loan_billpayment.loanid='$loanid'
          Union
          Select
          Concat(biller.billername, ' (Bill Payment Fee)') As transaction,
          Format(loan_billpayment.fee, 2) As amount,
          2 as seq
        From
          loan_billpayment Inner Join
          biller
          On loan_billpayment.biller = biller.id
          Inner Join member_loans
          on loan_billpayment.loanid=member_loans.id
          where loan_billpayment.loanid='$loanid'
          Union
        Select
          Concat(mobilesubscriber.subscriber, ' (Mobile Load)') As transaction,
          Format(loan_loadphone.amount, 2) As amount,
          3 as seq
        From
          loan_loadphone Inner Join
          mobilesubscriber
            On loan_loadphone.subscriber = mobilesubscriber.id
             Inner Join member_loans
          on loan_loadphone.loanid=member_loans.id
          where loan_loadphone.loanid='$loanid'
        union
        Select
          Concat(mobilesubscriber.subscriber, ' (Mobile Load Fee)') As transaction,
          Format(loan_loadphone.fee, 2) As amount,
          4 as seq
        From
          loan_loadphone Inner Join
          mobilesubscriber
            On loan_loadphone.subscriber = mobilesubscriber.id
             Inner Join member_loans
          on loan_loadphone.loanid=member_loans.id
          where loan_loadphone.loanid='$loanid'
        union
        Select
          Concat(onlinegame.product, ' (Online Game)') As transaction,
          Format(loan_onlinegame.amount, 2) As amount,
          5 as seq
        From
          loan_onlinegame Inner Join
          onlinegame
            On loan_onlinegame.product = onlinegame.id
            Inner Join member_loans
          on loan_onlinegame.loanid=member_loans.id
          where loan_onlinegame.loanid='$loanid'
          Union
           Select
          Concat(onlinegame.product, ' (Online Game Fee)') As transaction,
          Format(loan_onlinegame.fee, 2) As amount,
          6 as seq
        From
          loan_onlinegame Inner Join
          onlinegame
            On loan_onlinegame.product = onlinegame.id
            Inner Join member_loans
          on loan_onlinegame.loanid=member_loans.id
          where loan_onlinegame.loanid='$loanid') as history 
          order by seq");

        return $results;
    }

    public function getSalaryRequestDetailsPayPlus($loanid){

        $results=array(
            'plan' =>  'PayPlus',
            'dateapplied'=>'',
            'loanamount'=>'',
            'terms'=>'',
            'id'=>$loanid,
            'paymentstart'=>'',
            'paymentend'=>'',
            'feeperperiod'=>'',
            'cashreceived'=>'',
            'deductionperperiod'=>'');

        $loans= DB::select("select Date_Format(dateapplied, '%M %e, %Y') As dateapplied,
            Format(member_loans.loanamount, 2) As loanamount,
            Format(member_loans.cashreceived, 2) As cashreceived,
            Format(member_loans.deductionperperiod, 2) As deductionperperiod,
            Format(member_loans.feeperperiod, 2) As feeperperiod,
            terms,Date_Format(paymentstart, '%M %e, %Y') As paymentstart,
            Date_Format(paymentend, '%M %e, %Y') As paymentend
            From
            member_loans
            where id='$loanid'");

        $results["dateapplied"]=$loans[0]->dateapplied;
        $results["loanamount"]=$loans[0]->loanamount;
        $results["terms"]=$loans[0]->terms;
        $results["paymentstart"]=$loans[0]->paymentstart;
        $results["cashreceived"]=$loans[0]->cashreceived;
        $results["paymentend"]=$loans[0]->paymentend;
        $results["deductionperperiod"]=$loans[0]->deductionperperiod;
        $results["feeperperiod"]=$loans[0]->feeperperiod;
        
        return $results;
    }

    public function getUpcommingPayment($id,$gid){

        $member=getMemberInformation($id,$gid);

        $partnerid= $member[0]->partnername;

        $pay_period=getCurrentPayrolPeriod($partnerid);

        $payperiod=$pay_period[0]->due_date;

        $results= DB::select("
        select (select format(sum(balance),2) from member_payables where memberid='$id' and membergid='$gid' and duedate='$payperiod') as totalbalance,format(balance,2) as balance, 
        case when type='A' then 'Admin Fee' when type='C' then 'Carry Over Balance' when type='L' then 'Advance Pay' end as type from member_payables where memberid=:memberid and membergid=:membergid and duedate=:duedate order by id asc ",
            ['memberid'=>$id,'membergid'=>$gid,'duedate'=>$payperiod]);

      return $results;
    }

    public function getSalaryRequestPayrollPeriod($id,$gid){

        $member=getMemberInformation($id,$gid);

        $partnerid= $member[0]->partnername;

        $pay_period=getCurrentPayrolPeriod($partnerid);

       

        $payperiod=$pay_period[0]->due_date;
        $results= DB::select("
        select * from (
        Select
        'Date Requested' As transaction,
        Date_Format(member_loans.dateapplied, '%M %e, %Y') As amount,
          member_loans.id As id,dateapplied,0 as seq
        From
          member_loans
          where member_loans.memberid='$id' and member_loans.membergid='$gid'
          and member_loans.payperiod='$payperiod'
        Union
        Select
        'Pay Advance Amount' As transaction,
          Format(member_loans.loanamount, 2) As amount,
          member_loans.id As id,dateapplied,1 as seq
        From
          member_loans
          where member_loans.memberid='$id' and member_loans.membergid='$gid' 
          and member_loans.payperiod='$payperiod'
        Union
        Select
        'Pay Advance Fee' As transaction,
          Format(member_loans.fee, 2) As amount,
          member_loans.id As id,dateapplied,2 as seq
        From
          member_loans
          where member_loans.memberid='$id' and member_loans.membergid='$gid'
          and member_loans.payperiod='$payperiod'
        Union
        Select
          Concat(biller.billername, ' (Bill Payment)') As transaction,
          Format(loan_billpayment.amount, 2) As amount,
          loan_billpayment.loanid As id,member_loans.dateapplied,3 as seq
        From
          loan_billpayment Inner Join
          biller
          On loan_billpayment.biller = biller.id
          Inner Join member_loans
          on loan_billpayment.loanid=member_loans.id
          where loan_billpayment.memberid='$id' and loan_billpayment.membergid='$gid'
          and loan_billpayment.payperiod='$payperiod'
          Union
          Select
          Concat(biller.billername, ' (Bill Payment Fee)') As transaction,
          Format(loan_billpayment.fee, 2) As amount,
          loan_billpayment.loanid As id,member_loans.dateapplied,4 as seq
        From
          loan_billpayment Inner Join
          biller
          On loan_billpayment.biller = biller.id
          Inner Join member_loans
          on loan_billpayment.loanid=member_loans.id
          where loan_billpayment.memberid='$id' and loan_billpayment.membergid='$gid'
          and loan_billpayment.payperiod='$payperiod'
          Union
        Select
          Concat(mobilesubscriber.subscriber, ' (Mobile Load)') As transaction,
          Format(loan_loadphone.amount, 2) As amount,
          loan_loadphone.loanid As id,member_loans.dateapplied,5 as seq
        From
          loan_loadphone Inner Join
          mobilesubscriber
            On loan_loadphone.subscriber = mobilesubscriber.id
             Inner Join member_loans
          on loan_loadphone.loanid=member_loans.id
          where loan_loadphone.memberid='$id' and loan_loadphone.membergid='$gid'
          and loan_loadphone.payperiod='$payperiod'
        union
        Select
          Concat(mobilesubscriber.subscriber, ' (Mobile Load Fee)') As transaction,
          Format(loan_loadphone.fee, 2) As amount,
          loan_loadphone.loanid As id,member_loans.dateapplied,6 as seq
        From
          loan_loadphone Inner Join
          mobilesubscriber
            On loan_loadphone.subscriber = mobilesubscriber.id
             Inner Join member_loans
          on loan_loadphone.loanid=member_loans.id
          where loan_loadphone.memberid='$id' and loan_loadphone.membergid='$gid'
          and loan_loadphone.payperiod='$payperiod'
        union
        Select
          Concat(onlinegame.product, ' (Online Game)') As transaction,
          Format(loan_onlinegame.amount, 2) As amount,
          loan_onlinegame.loanid As id,member_loans.dateapplied,7 as seq
        From
          loan_onlinegame Inner Join
          onlinegame
            On loan_onlinegame.product = onlinegame.id
            Inner Join member_loans
          on loan_onlinegame.loanid=member_loans.id
          where loan_onlinegame.memberid='$id' and loan_onlinegame.membergid='$gid'
          and loan_onlinegame.payperiod='$payperiod'
          Union
           Select
          Concat(onlinegame.product, ' (Online Game Fee)') As transaction,
          Format(loan_onlinegame.fee, 2) As amount,
          loan_onlinegame.loanid As id,member_loans.dateapplied,8 as seq
        From
          loan_onlinegame Inner Join
          onlinegame
            On loan_onlinegame.product = onlinegame.id
            Inner Join member_loans
          on loan_onlinegame.loanid=member_loans.id
          where loan_onlinegame.memberid='$id' and loan_onlinegame.membergid='$gid'
          and loan_onlinegame.payperiod='$payperiod'
          Union
          Select
        'Actual Amount Received' As transaction,
          Format(member_loans.cashreceived, 2) As amount,
          member_loans.id As id,dateapplied,9 as seq
            From
          member_loans
          where member_loans.memberid='$id' and member_loans.membergid='$gid' 
          and member_loans.payperiod='$payperiod'
          Union
          Select
        'Carry Over Balance' As transaction,
          Format(member_payables.balance, 2) As amount,
          member_payables.id As id,processdate as dateapplied, 10 as seq
            From
          member_payables
          where member_payables.memberid='$id' and member_payables.membergid='$gid' 
          and member_payables.duedate='$payperiod' and type='C'

          ) as history 
          order by id, seq");

      return $results;
    }

     public function getSalaryRequestPayment($id,$gid,$payperiod){

        $member=getMemberInformation($id,$gid);

        $partnerid= $member[0]->partnername;

       
        $results= DB::select("
        select * from (
        Select
        'Date Requested' As transaction,
        Date_Format(member_loans.dateapplied, '%M %e, %Y') As amount,
          member_loans.id As id,dateapplied,0 as seq
        From
          member_loans
          where member_loans.memberid='$id' and member_loans.membergid='$gid'
          and member_loans.payperiod='$payperiod'
        Union
        Select
        'Pay Advance Amount' As transaction,
          Format(member_loans.loanamount, 2) As amount,
          member_loans.id As id,dateapplied,1 as seq
        From
          member_loans
          where member_loans.memberid='$id' and member_loans.membergid='$gid' 
          and member_loans.payperiod='$payperiod'
        Union
        Select
        'Pay Advance Fee' As transaction,
          Format(member_loans.fee, 2) As amount,
          member_loans.id As id,dateapplied,2 as seq
        From
          member_loans
          where member_loans.memberid='$id' and member_loans.membergid='$gid'
          and member_loans.payperiod='$payperiod'
        Union
        Select
          Concat(biller.billername, ' (Bill Payment)') As transaction,
          Format(loan_billpayment.amount, 2) As amount,
          loan_billpayment.loanid As id,member_loans.dateapplied,3 as seq
        From
          loan_billpayment Inner Join
          biller
          On loan_billpayment.biller = biller.id
          Inner Join member_loans
          on loan_billpayment.loanid=member_loans.id
          where loan_billpayment.memberid='$id' and loan_billpayment.membergid='$gid'
          and loan_billpayment.payperiod='$payperiod'
          Union
          Select
          Concat(biller.billername, ' (Bill Payment Fee)') As transaction,
          Format(loan_billpayment.fee, 2) As amount,
          loan_billpayment.loanid As id,member_loans.dateapplied,4 as seq
        From
          loan_billpayment Inner Join
          biller
          On loan_billpayment.biller = biller.id
          Inner Join member_loans
          on loan_billpayment.loanid=member_loans.id
          where loan_billpayment.memberid='$id' and loan_billpayment.membergid='$gid'
          and loan_billpayment.payperiod='$payperiod'
          Union
        Select
          Concat(mobilesubscriber.subscriber, ' (Mobile Load)') As transaction,
          Format(loan_loadphone.amount, 2) As amount,
          loan_loadphone.loanid As id,member_loans.dateapplied,5 as seq
        From
          loan_loadphone Inner Join
          mobilesubscriber
            On loan_loadphone.subscriber = mobilesubscriber.id
             Inner Join member_loans
          on loan_loadphone.loanid=member_loans.id
          where loan_loadphone.memberid='$id' and loan_loadphone.membergid='$gid'
          and loan_loadphone.payperiod='$payperiod'
        union
        Select
          Concat(mobilesubscriber.subscriber, ' (Mobile Load Fee)') As transaction,
          Format(loan_loadphone.fee, 2) As amount,
          loan_loadphone.loanid As id,member_loans.dateapplied,6 as seq
        From
          loan_loadphone Inner Join
          mobilesubscriber
            On loan_loadphone.subscriber = mobilesubscriber.id
             Inner Join member_loans
          on loan_loadphone.loanid=member_loans.id
          where loan_loadphone.memberid='$id' and loan_loadphone.membergid='$gid'
          and loan_loadphone.payperiod='$payperiod'
        union
        Select
          Concat(onlinegame.product, ' (Online Game)') As transaction,
          Format(loan_onlinegame.amount, 2) As amount,
          loan_onlinegame.loanid As id,member_loans.dateapplied,7 as seq
        From
          loan_onlinegame Inner Join
          onlinegame
            On loan_onlinegame.product = onlinegame.id
            Inner Join member_loans
          on loan_onlinegame.loanid=member_loans.id
          where loan_onlinegame.memberid='$id' and loan_onlinegame.membergid='$gid'
          and loan_onlinegame.payperiod='$payperiod'
          Union
           Select
          Concat(onlinegame.product, ' (Online Game Fee)') As transaction,
          Format(loan_onlinegame.fee, 2) As amount,
          loan_onlinegame.loanid As id,member_loans.dateapplied,8 as seq
        From
          loan_onlinegame Inner Join
          onlinegame
            On loan_onlinegame.product = onlinegame.id
            Inner Join member_loans
          on loan_onlinegame.loanid=member_loans.id
          where loan_onlinegame.memberid='$id' and loan_onlinegame.membergid='$gid'
          and loan_onlinegame.payperiod='$payperiod'
          Union
          Select
        'Actual Amount Received' As transaction,
          Format(member_loans.cashreceived, 2) As amount,
          member_loans.id As id,dateapplied,9 as seq
            From
          member_loans
          where member_loans.memberid='$id' and member_loans.membergid='$gid' 
          and member_loans.payperiod='$payperiod'
          ) as history 
          order by id, seq");

      return $results;
    }

    public function getSalaryRequestTotal($loanid){
       $results= DB::select("Select Format(grandtotal, 2) As grandtotal from 
        member_loans
        where member_loans.id=:loanid",
        ['loanid'=>$loanid]);
      
      return $results;
    }

    public function getPendingUpdateRequest($id,$gid){
       $results= DB::select("Select id from members_updaterequest where status='F' and memberid=:memberid and membergid=:membergid",
        ['memberid'=>$id,'membergid'=>$gid]);
      
      return count($results);
    }


    public function getMemberInboxCount($id,$gid){
       $results= DB::select("select count(id) as cnt from member_inbox where readflag='N' and memberid=:id and membergid=:gid",
        ['id'=>$id,'gid'=>$gid]);

      return $results[0]->cnt;
    }

    public function getMemberInbox($id,$gid){
       $results= DB::select("select id,date_format(date,'%e-%M-%Y %h:%m %p') as date,subject,id,readflag from member_inbox where memberid=:id and membergid=:gid order by id desc",
        ['id'=>$id,'gid'=>$gid]);

      return $results;
    }

    public function getInboxMessage($id){
       $results= DB::select("select date_format(date,'%e-%M-%Y %h:%m %p') as date,subject,id,message from member_inbox where id=:id",
        ['id'=>$id]);

       DB::table('member_inbox')
            ->where('id',  $id)
            ->update(['readflag' =>  'Y']);

      return $results;
    }


     public function updateSecurityQuestion()
    {
        
        $whereArr = array('memberid' => Input::get('memberid'));
        DB::table('member_security_question')->where($whereArr)->delete();
        
        DB::table('member_security_question')->insert([
            'memberid' => Input::get('memberid'),
            'questionid' => Input::get('question1'),
            'answer'=>Input::get('answer1'),
            'seq'=>1,
            'datemodifed' => date("Y-m-d H:m:s")]);
        
         DB::table('member_security_question')->insert([
            'memberid' => Input::get('memberid'),
            'questionid' => Input::get('question2'),
            'answer'=>Input::get('answer2'),
            'seq'=>2,
            'datemodifed' => date("Y-m-d H:m:s")]);
        
         DB::table('member_security_question')->insert([
            'memberid' => Input::get('memberid'),
            'questionid' => Input::get('question3'),
            'answer'=>Input::get('answer3'),
            'seq'=>3,
            'datemodifed' => date("Y-m-d H:m:s")]);
        
         DB::table('member_security_question')->insert([
            'memberid' => Input::get('memberid'),
            'questionid' => Input::get('question4'),
            'answer'=>Input::get('answer4'),
            'seq'=>4,
            'datemodifed' => date("Y-m-d H:m:s")]);
        
         DB::table('member_security_question')->insert([
            'memberid' => Input::get('memberid'),
            'questionid' => Input::get('question5'),
            'answer'=>Input::get('answer5'),
            'seq'=>5,
            'datemodifed' => date("Y-m-d H:m:s")]);
        
        
         $birthday=date('Y-m-d', strtotime(Input::get('birthday'))); 
        $hiringdate=date('Y-m-d', strtotime(Input::get('hiringdate'))); 
        
        $password=Hash::make(Input::get('pin'));
        
        DB::table('members')
            ->where('id',  Input::get('memberid'))
            ->update(['password' =>  $password]);
        
       
    }



    public function changePin(){

      $message="";

      $pin=Hash::make(Input::get('newpin'));


      $results= DB::select("select password,emailaddress,firstname from members where id=:id and gid=:gid and active='A'",
        ['id'=>Input::get('memberid'),'gid'=>Input::get('membergid')]);
      
      if($results){
        if(password_verify(Input::get('oldpin'),$results[0]->password)){

          $email=$results[0]->emailaddress;
          $username=$results[0]->firstname;

           DB::table('members')
            ->where(array('id'=>Input::get('memberid'),'gid'=>Input::get('membergid')))
            ->update(['password' => $pin]);


            Mail::send('emails.sendMemberChangepin',['username' => $username], function ($message) use($email)
            {

                $message->subject('Payroll Club');

                $message->from('no_reply@payrollclub.co', 'Payroll Club');

                $message->to($email);

            });


        }else{
          $message="Incorrect old pin";
        }
      }else{
        $message="Invalid member";
      }

      return $message;
    }

    public function testemail(){
        $membername="francel";
        $netpay="PHP. 4,500.00";
        $partneremail="francel_aquino@yahoo.com";
        $loanid="123";

            /*Mail::send('emails.sendSalaryRequestApproval', ['membername' => $membername,'netpay'=>$netpay,'loanid'=>$loanid], function ($message) use($partneremail)
            {

                $message->subject('Salary Advance Request for Approval');

                $message->from('no_reply@payrollclub.co', 'Payroll Club');

                $message->to($partneremail);

            });*/

//$results= DB::select("select password,emailaddress,firstname from members ");

           return "f";  
    }
}
