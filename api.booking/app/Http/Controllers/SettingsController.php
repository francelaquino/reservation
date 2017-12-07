<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller {

	public function getSecurityQuestion()
    {
        $results= DB::select("select id,question from security_questions");
        return $results;
    }

    public function getTimesheetCategory()
    {
        $results= DB::select("select id,category from category order by category asc");
        return $results;
    }

    public function getMembershipAdminFee()
    {
        $results= getAdminFee();
        return $results;
    }
    
    public function saveSecurityQuestion()
    {
        
        $whereArr = array('memberid' => Input::get('memberid'));
        DB::table('member_security_question')->where($whereArr)->delete();
        
        DB::table('member_security_question')->insert([
			'memberid' => Input::get('memberid'),
			'questionid' => Input::get('question1'),
            'answer'=>Input::get('answer1'),
            'datemodifed' => date("Y-m-d H:m:s")]);
        
         DB::table('member_security_question')->insert([
			'memberid' => Input::get('memberid'),
			'questionid' => Input::get('question2'),
            'answer'=>Input::get('answer2'),
            'datemodifed' => date("Y-m-d H:m:s")]);
        
         DB::table('member_security_question')->insert([
			'memberid' => Input::get('memberid'),
			'questionid' => Input::get('question3'),
            'answer'=>Input::get('answer3'),
            'datemodifed' => date("Y-m-d H:m:s")]);
        
         DB::table('member_security_question')->insert([
			'memberid' => Input::get('memberid'),
			'questionid' => Input::get('question4'),
            'answer'=>Input::get('answer4'),
            'datemodifed' => date("Y-m-d H:m:s")]);
        
         DB::table('member_security_question')->insert([
			'memberid' => Input::get('memberid'),
			'questionid' => Input::get('question5'),
            'answer'=>Input::get('answer5'),
            'datemodifed' => date("Y-m-d H:m:s")]);
        
        
         $birthday=date('Y-m-d', strtotime(Input::get('birthday'))); 
        $hiringdate=date('Y-m-d', strtotime(Input::get('hiringdate'))); 
        
        $password=Hash::make(Input::get('pin'));
        
        DB::table('members')
            ->where('id',  Input::get('memberid'))
            ->update(['password' =>  $password]);
        
       
    }

	
}
