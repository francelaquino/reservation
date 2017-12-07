<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="index.html">Settings</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="index.html">Change Password</a>
        <i class="fa fa-circle"></i>
    </li>
    
</ul>
<div class="page-content-inner" id="partnerController" ng-controller="partnerController" ng-init="initPartner();">
    <div class="row">
        <div>
            <div class="portlet light ">
                <div class="portlet-title ">
                    <div class="caption caption-md">
                        <span class="captin-subject font-blue-madison  uppercase">Change Password</span>
                    </div>
                </div>
                <div class="alert alert-block alert-success fade in" style="display: none;">
                </div>
                
                <form id="form1" action="" method="post">
                    
                    <div class="portlet-body  " >
                        
                        
                        <div class="form-body " >
                           
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Password<span class="required">*</span></label>
                                        <input type="password" class="form-control" required maxlength="100" name="oldpassword" ng-model="login.oldpassword">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Password<span class="required">*</span></label>
                                        <input type="password" class="form-control" maxlength="100" name="newpassword" ng-model="login.newpassword">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm New Password<span class="required">*</span></label>
                                        <input type="password" class="form-control" maxlength="100" name="confirmpassword" ng-model="login.confirmpassword">
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                        </div>
                        
                    </div>
                    
                    
                   
                    <div class="row">
                        <div class="form-actions col-md-6 text-right">
                     <hr/>
                            
                            <button type="submit" id="btnsubmit" class="btn green"   >
                            Submit  </button>
                            
                        </div></div>
                    </div>
                    
                </div>
            </form>
        </div>
        
    </div>
</div>


<script type="application/javascript">
    $(document).ready(function () {

 

        $('#form1').bootstrapValidator({
            submitHandler: function (validator, form, submitButton) {
                angular.element(document.getElementById('partnerController')).scope().resetPassword();
                $("#btnsubmit").attr("disabled", false);
            },
            framework: 'bootstrap',
            fields: {
                
                oldpassword: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                 newpassword: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                        identical: {
                            field: 'confirmpassword',
                            message: 'The password does not match the confirm password'
                        },
                    }
                },

                confirmpassword: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                        identical: {
                            field: 'newpassword',
                            message: 'The password does not match the confirm password'
                        },
                    }
                },

                
            }

        });


    });



</script>