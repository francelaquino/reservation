<html>
<head>
<style type="text/css">

.green-gradient{
   
	width:800px;
	background-color: #d7e9ca;
	padding:30px;
	border-radius:5px !Important;
}

.green-gradient-inner{
    border:3px solid #00b050;
    min-height:300px;
    padding:15px;
	border-radius:5px !Important;
	
    
    
}
.button a:hover{
	cursor:hand;
	cursor:pointer;
	
}
.button{
	width:130px;
	display:block;
	
	background-color:#eb7d3c;
	line-height:40px;
	border-radius:5px !Important;
	border:2px solid white;
	overflow:hidden;
	text-align:center;
	color:white;
	text-decoration:none;
	font-size:19px;
}
</style>

</head>
<body style="font-family: arial">
<div class="green-gradient">
<div class="green-gradient-inner">
<img style="width:180px;" src="http://account.payrollclub.co/assets/images/logo_green_email.png"/>
</br>
<h4>Dear <?php echo $username; ?> </h4>
<p>Your pin was changed on <?php echo date("F j, Y, g:i a"); ?></p>
<p>If you made this change, you don't need to do anything. You can use your pin the next time you log in.</p>
<p>If you didn't change your pin, please contact support@payrollclub.co</p>
<h5>Payroll Club Team</h5>

<p style="font-size:10px;color:gray">* This is a system generated email. Please do not reply</p>
<p style="font-size:10px;color:gray">Payroll Club - Confidential Communication
This e-mail message including any of its attachments is intended solely for the addressee(s) and may contain privileged information. If you are not the addressee or you have received this email message in error. Please notify the sender and delete the email destroying any hard copies of the original e-mail message and The sender will remove your details from its database. You are not authorised to read, copy, disseminate, distribute or use this e-mail message or any attachment to it in any manner.</p>

</div>
</div>
</body>
</html>