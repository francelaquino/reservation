<?php

function getMemberInformation($id,$gid){

        $results= DB::select("
        	Select
		  	members.firstname, 
		  	members.familyname,
		  	members.emailaddress,	
		  	members.partnername,
		  	members.monthlysalary,
		  	members.dailyrate,
		  	members.hourlyrate,
		  	partners.loanapproval
			From
		  	members Inner Join
		  	partners
		    On members.partnername = partners.id
		    where members.id=:id and members.gid=:gid" ,['id'=>$id,'gid'=>$gid]);
        return $results;

}

function getAdminEmail(){

        $results= DB::select("Select emailaddress from admin limit 1");
        return $results;

}


function getPartnerEmail($id){
		  $partneremail = [];
               
        $results= DB::select("Select emailaddress from partners_representatives where partnername=:id and active='A'",['id'=>$id]);

        $x=0;
        foreach($results as $r){
        	$partneremail[$x]=$r->emailaddress;
        	$x++;
		}

        return $partneremail;

}

