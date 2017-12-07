<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class CivilstatusController extends Controller {

	public function getcivilstatus()
    {
        $results= DB::select("SELECT id,civilstatus FROM civilstatus WHERE ACTIVE='A' ORDER BY id ASC ");
        return $results;
    }

	
}
