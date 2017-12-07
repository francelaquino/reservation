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
<h4>Hi $membername,</h4>
<h4>This is to acknowledge receipt of your salary advance request with the following details:</h4>
<h4>Salary Advance Amount : <?php echo $loanamount; ?> </h4>
<h4>Salary Advance Fee : <?php echo $loanfee; ?> </h4>
<h4>Bill Payment Amount : <?php echo $billpaymentamount; ?> </h4>
<h4>Bill Payment Fee : <?php echo $billpaymentfee; ?> </h4>
<h4>Phone Load Amount : <?php echo $phoneloadamount; ?> </h4>
<h4>Phone Loan Fee : <?php echo $phoneloadfee; ?> </h4>
<h4>Online Game Amount : <?php echo $onlinegameamount; ?> </h4>
<h4>Online Game  Fee : <?php echo $onlinegamefee; ?> </h4>
</div>
</div>
</body>
</html>
