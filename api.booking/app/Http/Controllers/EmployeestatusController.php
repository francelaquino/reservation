<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class EmployeestatusController extends Controller {

	public function getemployeestatus()
    {
        $results= DB::select("SELECT id,employeestatus FROM employeestatus WHERE ACTIVE='A' ORDER BY employeestatus ASC ");
        return $results;
    }

	
}
