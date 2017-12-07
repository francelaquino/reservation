<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
	
	public function test(){
		return "test";
	}
	
	public function test1(){


		 $results=array([{'startday' =>  '','endday'=>'','message'=>'1'},'startday' =>  '','endday'=>'','message'=>'1']);

		 //$results= DB::select("select startday,endday from partners_payrollschedule");

		return $results;
	}
}
