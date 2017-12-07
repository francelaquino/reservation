<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class NonmemberController extends Controller
{
   

  public function getCreditLoan()
  {

    $results= DB::select("SELECT id,gid,Date_Format(dateapplied, '%e-%b-%Y') as dateapplied,
    completename,emailaddress,employername,format(loanamount,2) loanamount,terms,trasactionstatus.status  FROM creditapplications
    inner join trasactionstatus on code=creditapplications.applicationstatus 
    order by dateapplied");
      
      return $results;

  }

  public function getNonMemberPerMonthInt()
  {

    $results= DB::select("SELECT nonmemberpermonthint from settings");
      
      return $results;

  }

  public function getCreditLoanApproval()
  {

    $results= DB::select("SELECT id,gid,Date_Format(dateapplied, '%e-%b-%Y') as dateapplied,
    completename,emailaddress,employername,format(loanamount,2) loanamount,terms,trasactionstatus.status  FROM creditapplications
    inner join trasactionstatus on code=creditapplications.applicationstatus 
    where upper(applicationstatus) in ('F') order by dateapplied");
      
      return $results;

  }

  public function getActiveLoans()
  {

    $results= DB::select("SELECT id,gid,Date_Format(dateapplied, '%e-%b-%Y') as dateapplied,paymentmethod,
completename,emailaddress,employername,format(loanamount,2) loanamount,format(loanamount+interest,2) as totalloanwithinterest,
(SELECT case when format(sum(amount),2) is null then 0  else format(sum(amount),2) end FROM nonmember_transactions WHERE transactiontype='Payment' and activeloanid=A.id) as amountpaid,
(select format(sum(scheduleamount)+sum(carryoverbalance),2) from creditapplications_paymentschedule where loanid=A.id and amountpaid<=0) as totalbalance,
( SELECT case when scheduleamount+carryoverbalance is null then 0 else format(scheduleamount+carryoverbalance,2) end FROM creditapplications_paymentschedule where amountpaid<=0  and loanid=A.id order by seq asc limit 1) as nextpayamount,terms,trasactionstatus.status  FROM creditapplications A
    inner join trasactionstatus on code=A.applicationstatus 
    where activeloan='Y' and applicationstatus='B' order by dateapplied");
      
      return $results;

  }

  public function getNonMemberTransactions()
  {

    $results= DB::select("select A.id,date_format(A.datecreated, '%e-%b-%Y') as datecreated,A.createdby,A.activeloanid,A.transactiontype,
C.category,A.checknumber,date_format(A.encashmentdate, '%e-%b-%Y') as encashmentdate,A.paidto,A.receivedfrom,D.accountsource,format(A.amount,2) as amount from nonmember_transactions A
left join transactioncategory C on A.category=C.id and C.type=A.transactiontype
left join accountsource D on A.accountsource=D.id order by A.id");
      
      return $results;

  }

  

  public function getTransactionCategory($id,$gid)
  {
    if($id=="Disbursement"){
      $results= DB::select("SELECT id,category from transactioncategory where type=:type and active='A'",
      ['type'=>$id]);
    }else{
      $results= DB::select("SELECT A.seq as id ,B.payment as category FROM creditapplications_paymentschedule A
      INNER JOIN paymentsequence B ON  A.seq=B.id AND B.active='A'
      WHERE A.loanid=:loanid and amountpaid<=0
      ORDER BY B.id ASC",
      ['loanid'=>$gid]);
    }
      
      return $results;

  }

  public function getAccountSource($id)
  {

    $results= DB::select("SELECT id,accountsource from accountsource where type=:type and active='A'",['type'=>$id]);
      
      return $results;

  }

  public function getActiveLoanID()
  {

    $results= DB::select("SELECT id,completename from creditapplications where applicationstatus='B' and activeloan='Y' order by id");
    return $results;

  }


  public function getCreditLoanDetails($id,$gid)
  {

    $results= DB::select("SELECT creditapplications.id,gid,completename,civilstatus.civilstatus,Date_Format(effectivitydate, '%e-%b-%Y') as effectivitydate,Date_Format(birthdate, '%e-%b-%Y') as birthdate ,mobileno,emailaddress,completeaddress,tinno,sssno,employername,
    workphone,jobtitle,workaddress,workdurationyear,workdurationmonth,salaryphp,salaryper,famcompletename,fammobileno,famemailaddress,applicationstatus,trasactionstatus.status,
    famcompleteaddress,comakercompletename,comakermobileno,comakeremailaddress,comakeraddress,comakerrelation,comakertimeknown,loanamount,terms,dateapplied,paymentmethod
    FROM creditapplications
    inner join civilstatus on civilstatus.id=creditapplications.civilstatus
    inner join trasactionstatus on trasactionstatus.code =creditapplications.applicationstatus
     where creditapplications.id=:id and gid=:gid",['id'=>$id,'gid'=>$gid]);
      
      return $results;

  }

  public function getCreditLoanDetailsApproval($id,$gid)
  {

    $results= DB::select("SELECT creditapplications.id,gid,completename,civilstatus.civilstatus,Date_Format(birthdate, '%e-%b-%Y') as birthdate ,mobileno,emailaddress,completeaddress,tinno,sssno,employername,
    workphone,jobtitle,workaddress,workdurationyear,workdurationmonth,salaryphp,salaryper,famcompletename,fammobileno,famemailaddress,applicationstatus,
    famcompleteaddress,comakercompletename,comakermobileno,comakeremailaddress,comakeraddress,comakerrelation,comakertimeknown,loanamount,terms,dateapplied,paymentmethod
    FROM creditapplications
    inner join civilstatus on civilstatus.id=creditapplications.civilstatus
     where creditapplications.id=:id and gid=:gid",['id'=>$id,'gid'=>$gid]);
      
      return $results;

  }

  public function getCreditLoanDetailsUpdate($id,$gid,$refno)
  {

    $results= DB::select("SELECT id,gid,completename,civilstatus,mobileno,emailaddress,completeaddress,tinno,sssno,employername,
    workphone,jobtitle,workaddress,workdurationyear,workdurationmonth,salaryphp,salaryper,famcompletename,fammobileno,famemailaddress,
    famcompleteaddress,loanamount,terms,Date_Format(dateapplied, '%e-%b-%Y') as dateapplied,Date_Format(birthdate, '%e-%b-%Y') as birthdate 
    FROM creditapplications  where id=:id and gid=:gid and refno=:refno",['id'=>$id,'gid'=>$gid,'refno'=>$refno]);
      
      return $results;

  }

  public function getNonMemberNextPayment($id)
  {

    $results= DB::select("SELECT max(seq)+1 as id,(select payment from paymentsequence where Max(A.seq)+1= paymentsequence.id) as payment 
    FROM creditapplications_paymentschedule A where A.loanid=:id",['id'=>$id]);
      
      return $results;

  }
  public function getActiveLoanProfile($id,$gid)
  {

    $results= DB::select("SELECT id,gid,completename,employername,date_format(dateapplied, '%e-%b-%Y') as dateapplied,emailaddress,jobtitle,
mobileno,completeaddress,paymentmethod,
(SELECT C.accountsource FROM nonmember_transactions B
inner join accountsource C on B.accountsource=C.id and C.type=B.transactiontype 
where B.activeloanid=A.id and B.transactiontype='Disbursement' order by B.datecreated asc limit 1) as funddisbursement,
(SELECT B.checknumber FROM nonmember_transactions B
where B.activeloanid=A.id and B.transactiontype='Disbursement' order by B.datecreated asc limit 1) as checknumber,format(A.interest,2) as interest,date_format(A.effectivitydate, '%e-%b-%Y') as effectivitydate,
concat(terms,' Month/s') as terms,format(loanamount,2) as loanamount,format(loanamount+A.interest,2) as loanplusinterest FROM creditapplications A where id=:id and gid=:gid",['id'=>$id,'gid'=>$gid]);
      
      return $results;

  }

  
  
  

    public function saveCreditApplication()
    {

      $birthdate=date('Y-m-d', strtotime(Input::get('birthdate'))); 
      $refno=$random = substr(md5(mt_rand()), 0, 10);
      $gid=md5(uniqid(rand(), true));
        $results="";
          DB::table('creditapplications')->insert([
                'gid'=>$gid,
                'refno'=>$refno,
                'completename'=>Input::get('completename'),
                'civilstatus'=>Input::get('civilstatus'),
                'birthdate'=>$birthdate,
                'mobileno'=>Input::get('mobileno'),
                'emailaddress'=>Input::get('emailaddress'),
                'completeaddress'=>Input::get('completeaddress'),
                'tinno'=>Input::get('tinno'),
                'sssno'=>Input::get('sssno'),
                'employername'=>Input::get('employername'),
                'workphone'=>Input::get('workphone'),
                'jobtitle'=>Input::get('jobtitle'),
                'workaddress'=>Input::get('workaddress'),
                'workdurationyear'=>Input::get('workdurationyear'),
                'workdurationmonth'=>Input::get('workdurationmonth'),
                'salaryphp'=>Input::get('salaryphp'),
                'salaryper'=>Input::get('salaryper'),
                'famcompletename'=>Input::get('famcompletename'),
                'fammobileno'=>Input::get('fammobileno'),
                'famemailaddress'=>Input::get('famemailaddress'),
                'famcompleteaddress'=>Input::get('famcompleteaddress'),
                'terms'=>Input::get('terms'),
                'loanamount'=>Input::get('loanamount'),
                'applicationstatus' => "N",
                'activeloan' => "N",
                'dateapplied' => date("Y-m-d H:m:s")]);

          return $results;
    }


    public function saveNonMemberTransaction()
    {
      $encashmentdate="";
      if(Input::get('encashmentdate')!=""){
        $encashmentdate=date('Y-m-d', strtotime(Input::get('encashmentdate'))); 
      }
      $gid=md5(uniqid(rand(), true));
        $results="";
          DB::table('nonmember_transactions')->insert([
                'gid'=>$gid,
                'activeloanid'=>Input::get('activeloanid'),
                'transactiontype'=>Input::get('transactiontype'),
                'encashmentdate'=>$encashmentdate,
                'category'=>Input::get('category'),
                'checknumber'=>Input::get('checknumber'),
                'accountsource'=>Input::get('accountsource'),
                'amount'=>Input::get('amount'),
                'paidto'=>Input::get('paidto'),
                'latepayment'=>Input::get('latepayment'),
                'notes'=>Input::get('notes'),
                'receivedfrom'=>Input::get('receivedfrom'),
                'auditstatus'=>'OnProgress',
                'createdby'=>Input::get('username'),
                'datecreated' => date("Y-m-d H:m:s")]);


                if(Input::get('transactiontype')=="Payment"){
                  
                  DB::table('creditapplications_paymentschedule')
                  ->where('loanid', Input::get('activeloanid'))
                  ->where('seq', Input::get('category'))
                  ->update([ 'latepayment'=>Input::get('latepayment'),
                  'amountpaid'=>Input::get('amount')]);

                  $results= DB::select("select scheduleamount+carryoverbalance+latefee as amountdue from creditapplications_paymentschedule where seq=:seq and loanid=:loanid",
                  ['seq'=>Input::get('category'),'loanid'=>Input::get('activeloanid')]);
                  $amountdue=0;
                      
                  if(!empty($results)){
                          $amountdue=$results[0]->amountdue;
                  }





                  $results= DB::select("select nonmemberunpaidinterest,nonmemberlatepaymentfee,nonmemberlatepaymentamount from settings");
                  
                  if(!empty($results)){
                    $nonmemberunpaidinterest=$results[0]->nonmemberunpaidinterest;
                    $nonmemberlatepaymentfee=$results[0]->nonmemberlatepaymentfee;
                    $nonmemberlatepaymentamount=$results[0]->nonmemberlatepaymentamount;
                    
                  }

                  $latepaymentfee=0;

                  if(Input::get('latepayment')=="Y"){
                    $latepaymentfee=$amountdue*$nonmemberlatepaymentfee;
                    if($latepaymentfee<$nonmemberlatepaymentamount){
                      $latepaymentfee=$nonmemberlatepaymentamount;
                    }
                  }
                  $carryoverbalance=0;

                  if(Input::get('amount')<$amountdue){
                    $carryoverbalance=($amountdue-Input::get('amount'));
                    $carryoverbalance=$carryoverbalance+($carryoverbalance*$nonmemberunpaidinterest);
                  }
            

                  if($latepaymentfee>0 || $carryoverbalance>0){
                   
                    DB::table('creditapplications_paymentschedule')
                    ->where('loanid', Input::get('activeloanid'))
                    ->where('seq', Input::get('category')+1)
                    ->update(['carryoverbalance'=>$carryoverbalance,
                    'latefee'=>$latepaymentfee]);
                  }
                  
                 
            
                      

                }
          return $results;
    }

    public function saveNonMemberPaymentSchedule()
    {
      $paymentdate=date('Y-m-d', strtotime(Input::get('paymentdate'))); 
        $results="";
          DB::table('creditapplications_paymentschedule')->insert([
                'loanid'=>Input::get('activeloanid'),
                'seq'=>Input::get('payment'),
                'scheduledate'=>$paymentdate,
                'scheduleamount'=>Input::get('amount'),
                'carryoverbalance'=>0,
                'loanamount'=>0,
                'amountpaid'=>0,
                'encodedby'=>Input::get('username'),
                'dateencoded' => date("Y-m-d H:m:s")]);

          return $results;
    }


    public function updateCreditApplication()
    {

      $birthdate=date('Y-m-d', strtotime(Input::get('birthdate'))); 
      $refno=Input::get('refno');
      $id=Input::get('id');
      $gid=Input::get('gid');

      DB::table('creditapplications')
      ->where('id', $id)
      ->where('refno', $refno)
      ->where('gid', $gid)
      ->update(['completename'=>Input::get('completename'),
      'civilstatus'=>Input::get('civilstatus'),
      'birthdate'=>$birthdate,
      'mobileno'=>Input::get('mobileno'),
      'emailaddress'=>Input::get('emailaddress'),
      'completeaddress'=>Input::get('completeaddress'),
      'tinno'=>Input::get('tinno'),
      'sssno'=>Input::get('sssno'),
      'employername'=>Input::get('employername'),
      'workphone'=>Input::get('workphone'),
      'jobtitle'=>Input::get('jobtitle'),
      'workaddress'=>Input::get('workaddress'),
      'workdurationyear'=>Input::get('workdurationyear'),
      'workdurationmonth'=>Input::get('workdurationmonth'),
      'salaryphp'=>Input::get('salaryphp'),
      'salaryper'=>Input::get('salaryper'),
      'famcompletename'=>Input::get('famcompletename'),
      'fammobileno'=>Input::get('fammobileno'),
      'famemailaddress'=>Input::get('famemailaddress'),
      'famcompleteaddress'=>Input::get('famcompleteaddress'),
      'terms'=>Input::get('terms'),
      'loanamount'=>Input::get('loanamount'),
      'applicationstatus' => "F",]);


        
          return "";
    }

}
