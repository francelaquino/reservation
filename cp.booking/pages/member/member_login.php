<style type="text/css">

html,body{
    height: 100%;
    width: 100%;
    /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#1d405d+0,5897ab+55,c2e7e4+100 */
    background: #1d405d; /* Old browsers */
    background: -moz-linear-gradient(top, #1d405d 0%, #5897ab 55%, #c2e7e4 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top, #1d405d 0%,#5897ab 55%,#c2e7e4 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, #1d405d 0%,#5897ab 55%,#c2e7e4 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1d405d', endColorstr='#c2e7e4',GradientType=0 ); /* IE6-9 */
}

    .form-signin
{
    max-width: 330px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
}



.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{

    padding: 40px 0px 0px 0px;
    border: 1px solid white;
    width:100%;


}
input{
    height: 50px !important;
    font-size: 16px !important;

}
button{
    height: 50px !important;
    font-size: 18px !important;

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
label{
    color:#dfaf1b;
    margin-bottom: 15px;
    font-size: 18px;
}
.need-help
{
    margin-top: 10px;
    color:black;
}

.need-help a{
    font-size: 14px;
    color: #dfaf1b;
}

.copyright{
    font-size: 12px;
    color:black;
    margin:auto;
    text-align: center;
    padding: 10px;
    width: 100%;
    margin-top: 20px;
    display: inline-block;;
}
</style>

 <div style="height: 600px; width: 90%;margin: auto;padding-top: 10%;">
<div class="col-md-7" style="padding: 0px !important ;  margin:0px;" >
    <img src="assets/images/main_content.png" style="max-width: 900px;width:100%">
</div>
<div class="col-md-5"   >
    
    <div   ng-controller="memberController" id="memberController" ng-init="clearSession();" ng-cloak>

    <div  style="width: 400px;clear:both;" >
            
            <div class="account-wall login">
                 <form id="member_form" action="" class="form-signin" method="post">

                 
                 <div class="alert alert-block alert-danger fade in" style="display: none;">
                </div>

                <div class="row" style="margin-bottom: 20px;">

                 <div class="col-md-12">
                                <div class="form-group">
                                    <label>Member ID</label>
                                    <input type="text" class="form-control" required maxlength="100" id="username" name="username" ng-model="members.username" placeholder="Member ID" autofocus autocomplete="off">
                                </div>
                            </div>
                            </div>

                            <div class="row" >
                 <div class="col-md-12">
                                <div class="form-group">
                                    <label>6 digit pin</label>
                                    <input type="password" class="form-control" required maxlength="100" name="password" ng-model="members.password" placeholder="6 digit pin">
                                </div>
                            </div>
                            </div>

                <button class="btn  btn-green btn-block" id="btnsubmit" type="submit">Sign in</button>
               
                <a href="#/memberforgotpassword" style="margin-bottom: 30px;" class="pull-right need-help">Forgot password? </a><span class="clearfix"></span>

                <p class="need-help" >Not yet enrolled? <a href="#">Click here</a></p>
                </form>

            </div>

            <div class="account-wall question" style="display: none;padding-bottom: 10px;">
                <img class="profile-img" src="assets/images/photo.png"/>
                 <form id="member_form" action="" class="form-signin" method="post">

                 
                 <div class="alert alert-block alert-success fade in" style="display: none;">
                </div>

                <div class="row" >

                 <div class="col-md-12">
                                <div class="form-group">
                                      <label ng-bind="login.question">6 digit pin</label>
                                </div>
                            </div>
                            </div>

                            <div class="row">
                 <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"  id="answer"  name="answer" ng-model="members.answer" >
                                </div>
                            </div>
                            </div>

                <button class="btn  btn-green btn-block" ng-click="submitAnswer()" type="submit">Submit</button>
               
                </form>
            </div>
            <p class="copyright"><i>Copyright © 2017 Payroll Club Lending Inc. All rights reserved</i></p>
    </div>
</div>
</div>

 </div>





<script type="application/javascript">
    $(document).ready(function () {


        $('#member_form').bootstrapValidator({
            submitHandler: function (validator, form, submitButton) {
                angular.element(document.getElementById('memberController')).scope().memberLogin();
                $("#btnsubmit").attr("disabled", false);
            },
            framework: 'bootstrap',
            fields: {
                
                username: {
                    validators: {
                        notEmpty: {
                            message: 'Enter your member id'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Enter your 6 digit pin'
                        }
                    }
                },
             
            }

        });


    });



</script>
