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
<div class="container" style="margin-top: 5%;" ng-controller="partnerController" id="partnerController" ng-cloak>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title"><img src="assets/images/logo_full.png"/></h1>
            
            <div class="account-wall login">
                <form id="member_form" action="" class="form-signin" method="post">
                    
                    
                    <h4 class="row1">Password Reset</h4>
                    <div class="alert alert-block alert-success fade in" style="display: none;">
                    </div>
                    <p></p>
                    <div class="row " >
                        <div class="col-md-12 row1">
                            <div class="form-group">
                                <label>New Password<span class="required">*</span></label>
                                <input type="password" class="form-control"   name="newpassword" ng-model="partners.newpassword">
                            </div>
                        </div>
                        <div class="col-md-12 row1">
                            <div class="form-group">
                                <label>Re-type  6 digit pin<span class="required">*</span></label>
                                <input type="password" class="form-control"   name="retypepassword" ng-model="partners.retypepassword">
                            </div>
                        </div>
                        
                     <div class="col-md-12 row1">
                    
                    <button class="btn  btn-primary btn-block" id="btnsubmit" type="submit" >Submit</button>
                    </div>
                     <div class="col-md-12 row2" style="display: none">
                    
                    <a class="btn  btn-primary btn-block" href="#/partnerlogin"  >Login</a>
                    </div>
                    </div>
                    
                </form>
            </div>
            
        </div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function () {
    
        
        $('#member_form').bootstrapValidator({
            submitHandler: function (validator, form, submitButton) {
                angular.element(document.getElementById('partnerController')).scope().resetPartnerPassword();
                $("#btnsubmit").attr("disabled", false);
            },
            framework: 'bootstrap',
            fields: {
                
                newpassword: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                        identical: {
                            field: 'newpassword',
                            message: 'New password and Re-type password are not the same'
                        },
                    }
                },
                retypepassword: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                        identical: {
                            field: 'retypepassword',
                             message: 'New password and Re-type password are not the same'
                        },

                    }
                },
            }

        });
    

    });



</script>