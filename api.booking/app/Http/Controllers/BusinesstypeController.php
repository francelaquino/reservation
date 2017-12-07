<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class BusinesstypeController extends Controller {

	public function getActiveBusinesstype()
    {
        $results= DB::select("Select id,businesstype FROM businesstype WHERE ACTIVE='A' ORDER BY BUSINESSTYPE ASC ");
        return $results;
    }

	
}
