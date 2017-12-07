<style type="text/css">

    .form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}



.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50% !important;
    -webkit-border-radius: 50% !important;
    border-radius: 50% !important;
}
.need-help
{
    margin-top: 10px;
}
</style>
<div class="container" style="margin-top: 5%;" ng-controller="memberController" id="memberController" ng-cloak>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title"><img src="assets/images/logo_full.png"/></h1>
            
            <div class="account-wall login">
                 <form id="member_form" action="" class="form-signin" method="post">

                 
                
                <h4>Forgot Member ID and 6 Digit Pin?</h4>                
 <div class="alert alert-block alert-success fade in" style="display: none;">
                </div>
                <div class="row" >

                 <div class="col-md-12">
                 <p>To retrieve your member id and 6 digit pin, type the full email address you used to register and we'll send you an e-mail with your login details.</p>   
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control" required maxlength="100" id="username" name="username" ng-model="members.email" placeholder="Email Address" autofocus autocomplete="off">
                                </div>
                            </div>
                            </div>

                            

                <button class="btn  btn-primary btn-block" type="button" ng-click="recoverLoginDetails()">Submit</button>
               

             

                </form>
            </div>

            
        </div>
    </div>
</div>
