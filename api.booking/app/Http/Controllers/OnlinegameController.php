<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class OnlinegameController extends Controller {

	
  public function getOnlineGame()
    {
        $results= DB::select("
        Select id,product from onlinegame where active='A' order by product asc");
        
        return $results;
    }    
    

	
}
