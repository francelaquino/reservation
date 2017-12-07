<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class SubscriberController extends Controller {

	
  public function getSubscriberName()
    {
        $results= DB::select("
        Select id,subscriber from mobilesubscriber where active='A' order by subscriber asc");
        
        return $results;
    }    
    

	
}
