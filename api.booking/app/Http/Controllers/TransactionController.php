<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class TransactionController extends Controller {

    
	public function saveFirstLoanTransaction()
    { 
        $message="";
        $loanPlan=Input::get('loanplan');
        $basicSalary=Input::get('basicsalary');
        $loanAmount=Input::get('loanamount');
        $months=Input::get('months');
	    $results= DB::select('select allowpercentage,loantype from loanplan where code=:code' ,['code'=>$loanPlan]);
        
        $allowpercentage=$results[0]->allowpercentage;
        
        
        
        //get earnings per payday
        if($loanPlan=='A'){
            $basicSalary=$basicSalary/2;
        }
        
        //get maximum amount to loan for Payday Plan(A)
        if($months=="" || $months<=0){
            $allowedAmount=$basicSalary*$allowpercentage;
        }else{
            $allowedAmount=($basicSalary*$months)*$allowpercentage;
        }
            
        if($loanAmount>$allowedAmount){
            if($loanPlan=='A'){
                $message="The maximum loanable amount is Php. ".$allowedAmount;
            }else if($loanPlan=='B'){
                $message="The maximum loanable amount for ".$months." months is Php. ".$allowedAmount;
            }
        }
        else{
            //delete the first loan, there should be only one first loan
            $whereArr = array('memberid' => Input::get('memberid'),'membergid' => Input::get('membergid'),'flag' => '1','status' => 'F');
            DB::table('loanapplications')->where($whereArr)->delete();
            
            
            //save the first loan
            DB::table('loanapplications')->insert([
			'memberid' => Input::get('memberid'),
            'membergid' => Input::get('membergid'),
            'loantype' => $loanPlan,
            'loanamount'=>$loanAmount,
            'noofmonths'=>$months,
            'status' => 'F',
			'flag' => '1',
            'dateapplied' => date("Y-m-d H:m:s")]);
        }
        
        return $message;
        
        
		
           
    }

    private function checkLoanableAmount($id,$gid,$plan){
        

        $results= DB::select("Select monthlysalary from members where id=:id and gid=:gid",
            ['id'=>$id, 'gid'=>$gid]);

        $monthlySalary=1;
        $loanableAmount=0;
        if(!empty($results)){

            $monthlySalary=$results[0]->monthlysalary;
        }
        if($plan=="A"){
            $loanableAmount=($monthlySalary*.8);    
        }else if($plan=="B"){
            $loanableAmount=($monthlySalary*.8)*3;
        }

        return $loanableAmount;


    }

    private function checkExistingLoan($id,$gid){
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

    private function checkPaydayBalance($id,$gid){
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

    public function saveLoanApplication(){


        $results="";
        $id=Input::get('memberid');
        $gid=Input::get('membergid');
        $loanAmount=Input::get('loanamount');
        $loanPlan=Input::get('loanplan');
        
        //Check loanable amount as per loan plan 
        $loanableAmount=$this->checkLoanableAmount($id,$gid,$loanPlan);

        
        //Check member existing loan
        
        if($results==""){
            
            $loan=$this->checkExistingLoan($id,$gid);

            if($loan["id"]=="B"){
                //member can only apply 1 open flexi pay plan
                $results="You have an existing ".$loan["loanplan"]." Loan";
            }else if($loan["id"]=="A"){
                 $paydayBalance=$this->checkPaydayBalance($id,$gid);   

            }

        }
        if($results==""){
            
            if($loanableAmount<$loanAmount){
                $results="The maximum amount the you are allowed to loan is : ".$loanableAmount;
            }
        }

        return $results;

    }

    public function approveFirstLoan()
    { 
        $id=Input::get('id');
        $gid=Input::get('gid');
        $appid=Input::get('appid');

        $interest=0;
        $loanAmount=0;
        $noOfMonths=0;
        $loanPlan="";
        $partnerId="";
        $dateApplied="";


        $results= DB::select("Select
          loanapplications.loanamount,
          loanapplications.noofmonths,
          loanapplications.loantype,
          loanapplications.dateapplied,
          members.firstname,
          members.emailaddress,
          members.partnername
          From
          loanapplications Inner Join
          members
          On loanapplications.memberid = members.id And loanapplications.membergid =
          members.gid
          where flag='1' and status='F' and  memberid=:id and membergid=:gid" ,
          ['id'=>$id, 'gid'=>$gid]);

        if(!empty($results)){

            $loanAmount=$results[0]->loanamount;
            $loanPlan=$results[0]->loantype;
            $noOfMonths=$results[0]->noofmonths;
            $partnerId=$results[0]->partnername;
            $dateApplied=$results[0]->dateapplied;
            $emailladdress=$results[0]->emailaddress;
            $firstname=$results[0]->firstname;


            //Loan Plan Interest
            $results= DB::select("select allowpercentage from loanplan 
                where active='A' and code=:code" ,['code'=>$loanPlan]);

            if(!empty($results)){
                $interest=$results[0]->allowpercentage;
            }

            //Save Member Loan
            $interestAmount=Number($interest)*Number($loanAmount);
            $totalAmount=(Number($interest)*Number($loanAmount))+Number($loanAmount);


           $loanid=DB::table('loans')->insertGetId([
                'memberid'=>$id,
                'membergid'=>$gid,
                'appid'=>$appid,
                'loantype'=>$loanPlan,
                'principal'=>$loanAmount,
                'interest'=>$interestAmount,
                'status'=>'O',
                'totalamount'=>$totalAmount,
                'dateapplied'=>$dateApplied,
                'dateapproved'=>date("Y-m-d H:m:s"),
                'approvedby'=>'admin']);




           

            if($noOfMonths<=0){
                $noOfMonths=1;    
            }else{
                $noOfMonths=$noOfMonths*2;
            }


            $interest=($loanAmount/$noOfMonths)*$interest;
            $principal=($loanAmount/$noOfMonths);
            $balance=$principal+$interest;

            $results= DB::select("SELECT STR_TO_DATE(concat(month,'/',endday,'/',YEAR(CURDATE())),'%m/%d/%Y') as duedate FROM partners_payrollschedule
                where CURDATE()+INTERVAL 3 DAY<STR_TO_DATE(concat(month,'/',processday,'/',YEAR(CURDATE())),'%m/%d/%Y') and partnerid=:partnerid order by month,startday asc limit $noOfMonths" , 
                ['partnerid'=>$partnerId]);
            $x=0;
            $status='D';
            foreach($results as $r){

                DB::table('loan_breakdown')->insert([
                    'loanid'=>$loanid,
                    'memberid'=>$id,
                    'membergid'=>$gid,
                    'appid'=>$appid,
                    'principal'=>$principal,
                    'interest'=>$interest,
                    'balance'=>$balance,
                    'interest'=>$interest,
                    'status'=>$status,
                    'duedate'=>$r->duedate]);

                    $status='O';
                    
                if($x==0){
                    
                     DB::table('loandue')->insert([
                    'loantype'=>$loanPlan,
                    'principal'=>$principal,
                    'interest'=>$interest,
                    'amountdue'=>$balance,
                    'status'=>'O',
                    'duedate'=>$r->duedate,
                    'memberid'=>$id,
                    'membergid'=>$gid,
                    'loanid'=>$loanid]);

                    $x=1;
                }
            }

             DB::table('members')
            ->where('id', $id)
            ->where('gid', $gid)
            ->update(['active' => 'A','registration' => 'A','datejoined' => date("Y-m-d H:m:s"),'membership'=>Input::get('membership')]);


             Mail::send('emails.sendLoanApproved', ['name' => $firstname], function ($message) use($emailladdress)
            {


                $message->subject('Payroll Club Loan Application');

                $message->from('registration@payrollclub.co', 'Payroll Club');

                $message->to($emailladdress);

            });

             return "Membership registration and loan application successfully approved";


        }
           
    }

	
}
