
<div class="page-content-inner" id="memberController" ng-controller="memberController">
 
            <div class="portlet  ">
               
                 <div class="portlet-title ">
                    <div class="caption caption-md">
                        <span class="breadcrumb">My Profile <i class="fa fa-circle"></i> Change Pin </span>
                    </div>
                </div>
                <div class="alert alert-block alert-success fade in" style="display: none;">
                </div>
                
                <form id="form1" action="" class="form-horizontal" method="post">
                    
                    <div class="portlet-body  " >
                        
                        
                        <div class="form-body " >
                            <div class="form-group">
                            <label class="col-md-3 control-label">Old Pin<span class="required">*</span></label>
                            <div class="col-md-6">
                            <input type="password" class="form-control" required maxlength="100" name="oldpin" ng-model="login.oldpin">
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-md-3 control-label">New Pin<span class="required">*</span></label>
                            <div class="col-md-6">
                             <input type="password" class="form-control" maxlength="100" name="newpin" ng-model="login.newpin">
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-md-3 control-label">Confirm New Pin<span class="required">*</span></label>
                            <div class="col-md-6">
                            <input type="password" class="form-control" maxlength="100" name="confirmpin" ng-model="login.confirnpin">
                            </div>
                            </div>

                           
                           
                         
                            <div class="row">

                                <div class="form-actions col-md-12 text-right">
                                <hr>
                                    <button type="submit" id="btnsubmit" class="btn btn-primary"   >
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
                angular.element(document.getElementById('memberController')).scope().changePin();
                $("#btnsubmit").attr("disabled", false);
            },
            framework: 'bootstrap',
            fields: {
                
                oldpin: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                newpin: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                        identical: {
                            field: 'confirmpin',
                            message: '6 digit pin and confirm pin 6 digit pin are not the same'
                        },
                        integer: {
                            message: 'Please enter number only'
                        },
                        stringLength: {
                        min:6,
                        max: 6,
                        message: 'Please enter 6 digit pin'
                        }
                    }
                },
                confirmpin: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                        identical: {
                            field: 'newpin',
                            message: '6 digit pin and confirm pin 6 digit pin are not the same'
                        },
                        integer: {
                            message: 'Please enter number only'
                        },
                        stringLength: {
                        min:6,
                        max: 6,
                        message: 'Please enter 6 digit pin'
                        }

                    }
                },

                
            }

        });


    });



</script>