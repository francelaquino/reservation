<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class GeneralController extends Controller {

	
  public function getNationality()
    {
        $results= DB::select("select id,country as nationality from countries  order by country asc");
        
        return $results;
    }  
    
    public function getCities($id)
    {
        $results= DB::select("select id,city from cities where country=:id order by city asc",['id'=>$id]);
        
        return $results;
    } 

    public function getAllCities()
    {
        $results= DB::select("select id,city from cities  order by city asc");
        
        return $results;
    } 


    

    public function getRentalType()
    {
        $results= DB::select("select id,rentaltype from rentaltype where active='A' order by rentaltype asc");
        
        return $results;
    }    

    public function getStudio()
    {
        $results= DB::select("select id,studio from studio where active='A' order by studio asc");
        
        return $results;
    }   

    public function getSleeps()
    {
        $results= DB::select("select id,sleeps from sleeps where active='A' order by sleeps asc");
        
        return $results;
    }  
    

	
}
