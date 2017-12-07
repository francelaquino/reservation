<div class="container">
    <nav class="navbar navbar-inverse">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="http://uniserb.com" class="navbar-brand">UniSerb</a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        
    </nav>
</div>
<div class="container"  >
<div class="portlet light bordered "  id="ownerController" ng-controller="ownerController" ng-init="initOwnerForm()">

    <div class="portlet-body  ">
    
        <form role="form" id="form" >
            <div class="form-body">
			<div class="row">
				<div class="col-md-12">
                    <h4 class="form-title">Property Owner Registration</h4>
				</div>
				
				</div>
                <div class="row">
				<div class="col-md-12">
				<div class="note note-info" style="display:none">
    Your registration has been submitted and sent to admin for approval.</div>
	</div></div>

                <div class="row">

                    <div class="form-group col-md-4">
                        <label>First Name
                            <span class="required">*</span>
                        </label>
                        <input type="text" class="form-control" maxlength="100" name="firstname" ng-model="owner.firstname">
                    </div>

                    <div class="form-group col-md-4">
                        <label>Middle Name
                            <span class="required">*</span>
                        </label>
                        <input type="text" class="form-control" maxlength="100" name="middlename" ng-model="owner.middlename">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Last Name</label>
                        <input type="text" class="form-control " maxlength="100" name="lastname" id="lastname" ng-model="owner.lastname">

                    </div>
                </div>
                <div class="row">
					<div class="form-group col-md-4">
                        <label>Country of Nationality
                            <span class="required">*</span>
                        </label>
                        <select class="form-control" name="nationality" ng-model="owner.nationality">
                            <option value="" selected="selected"></option>
                            <option ng-repeat="n in nationality" value="{{ n.id }}">{{ n.nationality }}</option>
                        </select>

                    </div>
                    <div class="form-group col-md-4">
                        <label>Gender
                            <span class="required">*</span>
                        </label>
                        <select class="form-control" id="gender" name="gender" ng-model="owner.gender">
                            <option value="" selected="selected"></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Birthdate
                            <span class="required">*</span>
                        </label>
                        <div style="position:relative">
                        <input type="text" class="form-control datepicker" id="birthdate" name="birthdate" ng-model="owner.birthdate">
                    </div>
                    </div>


                </div>
                <div class="row">
				<div class="form-group col-md-12">
                        <label>Address</label>
                        <input type="text" class="form-control" maxlength="300" name="address" ng-model="owner.address">
                    </div>
                </div>

                <div class="row">

				<div class="form-group col-md-4">
                        <label>Mobile No.
                            <span class="required">*</span>
                        </label>
                        <input type="text" class="form-control" maxlength="50" name="mobileno" ng-model="owner.mobileno">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Telephone No.</label>
                        <input type="text" class="form-control" maxlength="50" name="telephoneno" ng-model="owner.telephoneno">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Email Address
                            <span class="required">*</span>
                        </label>
                        <input type="text" class="form-control" maxlength="50" name="emailaddress" ng-model="owner.emailaddress">
                    </div>
                </div>

                
                <div class="row">
				<div class="form-group col-md-4">
                        <label>Password
                            <span class="required">*</span>
                        </label>
                        <input type="password" class="form-control" maxlength="50" name="password" ng-model="owner.password">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Confirm Password
                            <span class="required">*</span>
                        </label>
                        <input type="password" class="form-control" maxlength="50" name="confirmpassword" ng-model="owner.confirm">
                    </div>

                </div>




                <div class="row no-margin">
                <div class="form-group span4">
                    <button type="submit" class="btn btn-green ">Submit</button>
                    <button type="button" ng-click="initOwnerForm();" class="btn btn-default">Reset</Button>
                </div>
                </div>
                <div class="row no-margin">
                <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Do you have an account?
                                        <a href="#/ownerlogin" >
                                            Sign In Here
                                        </a>
                                        </div>
                                    </div>
                                    </div>
               
        </form>
        </div>
    </div>

</div>
</div>





<script type="text/javascript">
$(document).ready(function () {

   


	$('.datepicker').datetimepicker({
		format: 'DD-MMM-YYYY'
	});

	$('.datepicker').on('dp.change', function (e) {
		$(this).trigger('input');
	})



	

   

	$('#form').bootstrapValidator({
		submitHandler: function (validator, form, submitButton) {
			angular.element(document.getElementById('ownerController')).scope().savePropertyOwner();
			$("#btnsubmit").attr("disabled", false);
		},
		excluded: [':disabled', ':hidden', ':not(:visible)', '.ignore'],
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

			

			nationality: {
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
			mobileno: {
				validators: {
					notEmpty: {
						message: 'This field is required'
					}
				}
			},
			address: {
				validators: {
					notEmpty: {
						message: 'This field is required'
					}
				}
			},

			gender: {
				validators: {
					notEmpty: {
						message: 'This field is required'
					}
				}
			},
			birthdate: {
				validators: {
					notEmpty: {
						message: 'This field is required'
					}
				}
			},

			password: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                        identical: {
							field: 'confirmpassword',
							message: 'Password and Confirm Password are not the same'
                		},
                    }
                },
                confirmpassword: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                        identical: {
                    		field: 'password',
                    		message: 'Password and Confirm Password are not the same'
                		},

                    }
                },

			





		}

	});




});


</script>
