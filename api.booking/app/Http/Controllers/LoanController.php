<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoanController extends Controller {


	 public function getTwelvePayPeriod($id,$gid){

        $member=getMemberInformation($id,$gid);

        $partnerid= $member[0]->partnername;


        $payperiod=getCurrentPayrolPeriod($partnerid);

        
       $array[12]=["","","","","","","","","","","",""];


        $results=DB::select("SELECT 
            date_format(
          Str_To_Date(Concat(month, '/',
          endday, '/', year), '%m/%d/%Y'),'%e-%b-%Y') as payrollperiod
             FROM partners_payrollschedule
                where  STR_TO_DATE(concat(month,'/',endday,'/',year),'%m/%d/%Y')>=:payperiod and partnerid=:partnerid  order by STR_TO_DATE(concat(month,'/',endday,'/',year),'%m/%d/%Y') limit 12" , 
                ['payperiod'=>$payperiod[0]->due_date,'partnerid'=>$partnerid]);

      
        return $results;
    }
    
    

    
  

    

    

   

    

	
}
