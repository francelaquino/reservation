<?php

function getFee($plan){


        $fee=0;

         $results= DB::select("select fee from loanplan 
                where active='A' and code=:code" ,['code'=>$plan]);

            if(!empty($results)){
                $fee=$results[0]->fee;
            }

        return $fee;

}

function getInterest($plan){

        $interest=0;

         $results= DB::select("select allowpercentage from loanplan 
                where active='A' and code=:code" ,['code'=>$plan]);

            if(!empty($results)){
                $interest=$results[0]->allowpercentage;
            }

        return $interest;

}

function getLoanRequestDetails($id){

         $results= DB::select("select memberid,membergid,Date_Format(dateapplied, '%M %e, %Y') As dateapplied, loanamount from member_loans
                where id=:id" ,['id'=>$id]);


        return $results;

}




function getOnPaydayDuedate($partnerid){
  $results=DB::select("SELECT STR_TO_DATE(concat(month,'/',endday,'/',YEAR(CURDATE())),'%m/%d/%Y') as duedate FROM partners_payrollschedule
                where CURDATE()+INTERVAL 3 DAY<STR_TO_DATE(concat(month,'/',processday,'/',YEAR(CURDATE())),'%m/%d/%Y') and partnerid=:partnerid order by month,startday asc limit 1" , 
                ['partnerid'=>$partnerid]);

  return $results[0]->duedate;
}



function getCurrentDate(){

        $results= DB::select("SELECT curdate   FROM settings");

        return $results[0]->curdate;

}

function getCurrentPayrolPeriod($id){


        $currdate=getCurrentDate();

        $results= DB::select("SELECT Str_To_Date(Concat(month, '/',
          startday, '/', year), '%m/%d/%Y') as start_date,Str_To_Date(Concat(month, '/',
          endday, '/', year), '%m/%d/%Y') as due_date,
          date_format(
          Str_To_Date(Concat(month, '/',
          endday, '/', year), '%m/%d/%Y'),'%e-%M-%Y') as duedate FROM partners_payrollschedule
          where  '$currdate'<Str_To_Date(Concat(month, '/',
          processday, '/', year), '%m/%d/%Y') and partnerid=:partnerid order by  Str_To_Date(Concat(month, '/',processday, '/', year), '%m/%d/%Y')  limit 1",['partnerid'=>$id]);

        return $results;

}

function getPartnerPayrolPeriod($id){

        $results= DB::select("SELECT Str_To_Date(Concat(month, '/',
          endday, '/', year), '%m/%d/%Y') as due_date,
          date_format(
          Str_To_Date(Concat(month, '/',
          endday, '/', year), '%m/%d/%Y'),'%e-%M-%Y') as duedate FROM partners_payrollschedule
          where  (SELECT curdate FROM settings)<Str_To_Date(Concat(month, '/',
          endday, '/', year), '%m/%d/%Y') and partnerid=:partnerid order by  Str_To_Date(Concat(month, '/',processday, '/', year), '%m/%d/%Y')  limit 1",['partnerid'=>$id]);

        return $results;

}

function checkPayrollPeriodStatus($id,$duedate){
        $status="C";
        
        $processday=getProcessDate($id,$duedate);

        $results= DB::select("select id from partner_payment where payperiod=:payperiod and partnerid=:partnerid",['payperiod'=>$duedate,'partnerid'=>$id]);

        if(!empty($results)){
          $curdate=strtotime(getCurrentDate());
          if(strtotime($curdate)>=strtotime($processday[0]->processdate) && strtotime($curdate)<=strtotime($processday[0]->enddate)){
              $results[0]->isopen='Y';
          }else{
            $results[0]->isopen='N';
          }

        } 
        return $results;

}

function getProcessDate($id,$duedate){

        $results= DB::select("SELECT STR_TO_DATE(concat(month,'/',processday,'/',YEAR(CURDATE())),'%m/%d/%Y') as processdate,
          STR_TO_DATE(concat(month,'/',endday,'/',YEAR(CURDATE())),'%m/%d/%Y') as enddate
         FROM partners_payrollschedule
          where  STR_TO_DATE(concat(month,'/',endday,'/',YEAR(CURDATE())),'%m/%d/%Y')=:duedate and partnerid=:partnerid",['duedate'=>$duedate,'partnerid'=>$id]);

        return $results;

}

function getProcessDateExtension($id,$duedate){

        $currdate=getCurrentDate();

        $results= DB::select("SELECT id from partner_payment_extesion where partnerid=:partnerid and payperiod=:payperiod and datevalid>=:currdate ",['partnerid'=>$id,'payperiod'=>$duedate,'currdate'=>$currdate]);

        return $results;

}



function getAdminFee(){
  $results=DB::select("SELECT Format(adminfee, 2) as adminfee  from settings");

  return $results[0]->adminfee;
}

function checkAdminFee($amount){
 
    $results= DB::select("SELECT fee FROM  carryoverfees where $amount between fromamount and toamount");


  return $results[0]->fee;
}

function checkPayNowAdminFee(){
 
    $results= DB::select("SELECT fee FROM  loanplan where code='A' and active='A'");


  return $results[0]->fee;
}

 

function checkLoanableAmount($id,$gid,$plan){
        

        $results= DB::select("Select monthlysalary from members where id=:id and gid=:gid",
            ['id'=>$id, 'gid'=>$gid]);

        $monthlySalary=1;
        $loanableAmount=0;
        if(!empty($results)){

            $monthlySalary=$results[0]->monthlysalary;
        }
        if($plan=="A"){
            $loanableAmount=(($monthlySalary/2)*.8);    
        }else if($plan=="B"){
            $loanableAmount=($monthlySalary*.8)*3;
        }

        return $loanableAmount;


}

function checkMemberExistingLoan($id,$gid){
        $loan['id']="";
        $loan['loanplan']="";
        $results= DB::select("
            Select
            loanplan.loantype,
            member_loans.loantype As loancode
            From
            member_loans Inner Join
            loanplan
            On member_loans.loantype = loanplan.code
            where member_loans.memberid=:id and member_loans.membergid=:gid and member_loans.status='O'",
            ['id'=>$id, 'gid'=>$gid]);

             if(!empty($results)){
                $loan['id']=$results[0]->loancode;
                $loan['loanplan']=$results[0]->loantype;
             }

             return $loan;
}

function checkOutstandingBalance($id,$gid){
      $count=0;
      $results= DB::select("select ifnull(sum(balance),0) as balance from member_payables where status='O' and memberid=:id and membergid=:gid",['id'=>$id, 'gid'=>$gid]);
        if(!empty($results)){
          $count=$results[0]->balance;
        }


      return $count;
}


function checkMemberPaydayBalance($id,$gid){
        $balance=0;
        $results= DB::select("
             Select
              ifnull(sum(member_payables.balance),0) as balance
              From
              member_loans Inner Join
              member_payables
              On member_loans.id = member_payables.loanid
              Where
              member_loans.loantype = 'A' And
              member_loans.status = 'O' And
              member_payables.status = 'O' and
              member_loans.memberid=:id and member_loans.membergid=:gid",
              ['id'=>$id, 'gid'=>$gid]);

             if(!empty($results)){
                $balance=$results[0]->balance;
             }

             return $balance;
    }



    function saveMemberLoanApplication($id,$gid,$plan,$amount,$months,$type){

        $interest=getInterest($plan);

        $interest=$amount * $interest;
        $balance=$interest + $amount;

        $member=getMemberInformation($id,$gid);

        $partnerid= $member[0]->partnername;

        
        $loanid=DB::table('member_loans')->insertGetId([
                'memberid'=>$id,
                'membergid'=>$gid,
                'loantype'=>$plan,
                'principal'=>$amount,
                'partnerid'=>$partnerid,
                'interest'=>$interest,
                'status'=>'F',
                'type'=>$type,
                'months'=>$months,
                'totalamount'=>$balance,
                'dateapplied'=>date("Y-m-d H:m:s")]);





    }

    function insertMemberInbox($id,$gid,$subject,$message){

       
        DB::table('member_inbox')->insert([
                'memberid'=>$id,
                'membergid'=>$gid,
                'subject'=>$subject,
                'readflag'=>'N',
                'message'=>$message,
                'date'=>date("Y-m-d H:m:s")]);





    }


    function getPaymentEnd($id,$gid,$terms){

        $member=getMemberInformation($id,$gid);

        $partnerid= $member[0]->partnername;


        $payperiod=getCurrentPayrolPeriod($partnerid);

        


        $results=DB::select("select * from (select 
          Str_To_Date(Concat(month, '/',
          endday, '/', year), '%m/%d/%Y') as payrollperiod
             FROM partners_payrollschedule
                where  STR_TO_DATE(concat(month,'/',endday,'/',YEAR(CURDATE())),'%m/%d/%Y')>=:payperiod and partnerid=:partnerid  order by month,startday desc limit :terms) as partners_payrollschedule order by payrollperiod desc limit 1" , 
                ['payperiod'=>$payperiod[0]->due_date,'partnerid'=>$partnerid,'terms'=>$terms]);

      
        return $results[0]->payrollperiod;
    }
