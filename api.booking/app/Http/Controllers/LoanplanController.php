<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class LoanplanController extends Controller {

	public function getactiveloanplan($id="",$gid="")
    {

    	 $results= DB::select("Select membership from members where id=:id and gid=:gid",['id'=>$id, 'gid'=>$gid]);

    	 $membership="";

        if(!empty($results)){

            $membership=$results[0]->membership;
        }
        if($membership=="S"){
        	$results= DB::select("select code,loantype from loanplan  where active='A' and code='A' ");
        }else{
        	 $results= DB::select("select code,loantype from loanplan  where active='A' order by seq asc");
        }
       
        return $results;
    }

	
}
