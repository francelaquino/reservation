 
<?php

function insertPasswordResetLogs($id,$gid,$type){


 	DB::table('passwordreset_logs')->insert([
                'usertype'=>$type,
                'userid'=>$id,
                'usergid'=>$gid,
                'insertdate' => date("Y-m-d H:m:s")]);

}


function insertLoginLogs($username,$usertype){

  DB::table('login_logs')->insert([
                'logindate' => date("Y-m-d H:m:s"),
                'username' => $username,
                'usertype'=>$usertype]);
}

function insertMemberUpdateLogs($username,$usertype){
    DB::table('members_update_logs')->insert([
                'username'=>$username,
                'usertype'=>$usertype,
                'insertdate' => date("Y-m-d H:m:s")]);
}



function insertMemberLoanLogs($loanid,$action,$username,$usertype){

	DB::table('member_loans_logs')->insert([
                'action'=>$action,
                'loanid'=>$loanid,
                'actiondate' => date("Y-m-d H:m:s"),
                'username' => $username,
                'usertype'=>$usertype]);
}

