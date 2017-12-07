
<div class="page-content-inner " id="memberController" ng-controller="memberController" ng-init="getmember()">
            <div class="portlet  " >
             <div class="portlet-title ">
                    <div class="caption caption-md">
                        <span class="breadcrumb">My Profile <i class="fa fa-circle"></i> General Information</span>
                    </div>
                </div>
                 <span class="caption-subject  font-blue-madison  uppercase">General Information</span>
        <hr class="title">

                    <div class="alert alert-block alert-success fade in  col-md-12" style="display: none;"></div>
                
                 <form id="member_form" action="" method="post" >
                
                <div class="portlet-body "   >
                    
                    
                    <div class="form-body " >
          
                    <div class="row " style="margin-bottom: 10px;">
                    <div class="col-md-4">
                    <span class="captin-subject font-red-sunglo  " style="margin-bottom: 10px">Personal Details</span>
                    </div>
                    </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>First Name<span class="required">*</span></label>
                                    <input type="text" class="form-control" required maxlength="100" name="firstname" ng-model="members.firstname">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Middle Name<span class="required">*</span></label>
                                    <input type="text" class="form-control" maxlength="100" name="middlename" ng-model="members.middlename">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Family Name<span class="required">*</span></label>
                                    <input type="text" class="form-control" maxlength="100" name="familyname" ng-model="members.familyname">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date of Birth<span class="required">*</span></label>
                                    <input type="text" class="form-control datepicker" id="birthday"  name="birthday" ng-model="members.birthday">
                                    
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Civil Status<span class="required">*</span></label>
                                    <select class="form-control" id="civilstatus" name="civilstatus" ng-model="members.civilstatus">
                                        <option value="" selected></option>
                                        <option ng-repeat="cs in civilstatus" value="{{ cs.id }}">{{ cs.civilstatus }}</option>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email Address<span class="required">*</span></label>
                                    <input type="text" class="form-control" maxlength="100"  name="emailaddress" ng-model="members.emailaddress">
                                </div>
                            </div>
                            
                            
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Gender<span class="required">*</span></label>
                                    <select class="form-control" name="gender" ng-model="members.gender">
                                        <option value="" selected></option>
                                        <option value="Male">Male</option>
                                        <option value="Female" >Female</option>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile No.<span class="required">*</span></label>
                                    <input type="text" class="form-control" maxlength="100" name="mobileno" ng-model="members.mobileno">
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Telephone No.</label>
                                    <input type="text" class="form-control" maxlength="100" name="telephoneno" ng-model="members.telephoneno">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                           
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>SSS No. </label>
                                    <input type="text" class="form-control" maxlength="100" name="sssno" ng-model="members.sssno">
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tin No.</label>
                                    <input type="text" class="form-control" maxlength="100" name="tinno" ng-model="members.tinno">
                                </div>
                            </div>
                             <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address 1</label>
                                    <input type="text" class="form-control" name="address1" maxlength="500" ng-model="members.address1">
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            
                            
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address 2</label>
                                    <input type="text" class="form-control" name="address2" maxlength="500" ng-model="members.address2">
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="portlet-body  "  >
                    
                    
                    <div class="form-body " >
                         <div class="row " style="margin-bottom: 10px;">
                    <div class="col-md-4">
                    <span class="captin-subject font-red-sunglo  " style="margin-bottom: 10px;">Employment Details</span>
                    </div>
                    </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Employee No.<span class="required">*</span></label>
                                    <input type="text" class="form-control"  maxlength="100" name="employeeno" ng-model="members.employeeno">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Employee Status<span class="required">*</span></label>
                                    <select class="form-control " name="employeestatus" id="employeestatus"  ng-model="members.employeestatus">
                                        <option value="" selected></option>
                                        <option ng-repeat="es in empstat" value="{{ es.id }}">{{ es.employeestatus }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Hiring Date<span class="required">*</span></label>
                                    <input type="text" class="form-control datepicker" id="hiringdate" name="hiringdate" ng-model="members.hiringdate" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Position<span class="required">*</span></label>
                                    <input type="text" class="form-control" maxlength="100" name="position" ng-model="members.position">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Department<span class="required">*</span></label>
                                <select class="form-control" name="department" id="department" ng-model="members.department">
                                    <option value="" selected></option>
                                    <option ng-repeat="dep in department" value="{{ dep.id }}">{{ dep.department }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Monthly Salary<span class="required">*</span></label>
                                <input type="number" class="form-control" maxlength="100" name="monthlysalary" ng-model="members.monthlysalary">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Total Hours Per Week<span class="required">*</span></label>
                                <input type="number" class="form-control" maxlength="100" name="hoursperweek" ng-model="members.hoursperweek">
                            </div>

                             <div class="form-group col-md-4">
                                <label>Hourly Rate<span class="required">*</span></label>
                                <input type="number" class="form-control" maxlength="100" name="hourlyrate" ng-model="members.hourlyrate">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Contract End<span class="required">*</span></label>
                                    <input type="text" class="form-control datepicker" id="enddate" name="hiringdate" ng-model="members.contractend" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <hr/>
                            <div class="form-actions col-md-12 text-right">
                                
                                <button type="submit" id="btnsubmit" class="btn btn-primary"   >
                                Update  </button>
                               
                                
                            </div></div>
                        </div>
                        
                    </div>
                     </form>
                </div>
                
            </div>
        </div>


<script type="application/javascript">
    $(document).ready(function () {

 $('.datepicker').datetimepicker({
        format: 'DD-MMM-YYYY',
        viewMode: 'years'
    });

        $('#member_form').bootstrapValidator({
            submitHandler: function (validator, form, submitButton) {
                angular.element(document.getElementById('memberController')).scope().updateMemberInfo();
                $("#btnsubmit").attr("disabled", false);
            },
            framework: 'bootstrap',
            fields: {
                
                firstname: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                middlename: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                
                 lastname: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },

                
                emailaddress: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                        emailAddress: {
                            message: 'Please supply a valid email address'
                        }
                    }
                },
                employeeno: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                employeestatus: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
               
                monthlysalary: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                hourlyrate: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                
                 position: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },

                
            }

        });


    });



</script>