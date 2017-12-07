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
<p>Hi <?php echo $firstname; ?>,</p>
<p>OnPayDay request has been disapproved. Details are as follows:</p>
<p>Request No. : <?php echo $loanid; ?> </p>
<p>Date Requested : <?php echo $dateapplied; ?> </p>
<p>Date Disapproved : <?php echo $dateapproved; ?> </p>
<p>Salary Advance Amount : PHP. <?php echo $loanamount; ?></p>
<h5>Payroll Club Team</h5>

<p style="font-size:10px;color:gray">* This is a system generated email. Please do not reply</p>
<p style="font-size:10px;color:gray">Payroll Club - Confidential Communication
This e-mail message including any of its attachments is intended solely for the addressee(s) and may contain privileged information. If you are not the addressee or you have received this email message in error. Please notify the sender and delete the email destroying any hard copies of the original e-mail message and The sender will remove your details from its database. You are not authorised to read, copy, disseminate, distribute or use this e-mail message or any attachment to it in any manner.</p>

</div>
</div>
</body>
</html>