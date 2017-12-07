<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class DepartmentController extends Controller {

	public function getactivedepartment()
    {
        $results= DB::select("SELECT id,department FROM department WHERE ACTIVE='A' ORDER BY department ASC ");
        return $results;
    }

	
}
