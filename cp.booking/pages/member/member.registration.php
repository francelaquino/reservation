

<script type="text/javascript">


$(document).ready(function () {
	$('.datepicker').datetimepicker({
		format: 'DD-MMM-YYYY'
    });
	


 	$("#fileupload").change(function () {
            var filename = $('input[type=file]')[0].files[0].name;
            


            var file = $('#fileupload').get(0).files[0];
            if (!file) {
                return;
            }
            if ($('#fileupload').val() != "") {
                var ext = $('#fileupload').val().split('.').pop().toLowerCase();
                if ($.inArray(ext, ['jpg', 'png', 'bmp']) == -1) {
                    alert('Invalid file type');
                    return false;
                }
            }



            if (file.size >= 2307206) {
                alert("Filesize of " + file.size + " is too large. Maximum file size permitted is 2 MB");
            } else {

                var formData = new FormData();
                formData.append("txtid", $("#txtid").val());
                formData.append("txtgid", $("#txtgid").val());
                formData.append("txtdocument", $("#txtdocument").val());
                formData.append("file", file);
                $.ajax({
                    url: 'http://localhost:8000/member/uploaddocuments',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                       angular.element(document.getElementById('memberController')).scope().getmemberrequireddocuments();

                    }
                });
            }

        });


        $('#step1_form').bootstrapValidator({
            submitHandler: function (validator, form, submitButton) {
                angular.element(document.getElementById('memberController')).scope().saveMemberInfo();
                $("#btnsubmitstep1").attr("disabled", false);
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

                hiringdate: {
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

                department: {
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
                birthday: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                civilstatus: {
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
                mobileno: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                hoursperweek: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                

                
            }

        });

		$('#step3_form').bootstrapValidator({
            submitHandler: function (validator, form, submitButton) {
                angular.element(document.getElementById('memberController')).scope().saveLoanPlan();
                $("#btnsubmitstep3").attr("disabled", false);
            },
            framework: 'bootstrap',
            fields: {
                
                loanplan: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                loanamount: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
               

                months: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
            }

        });


        $('#step4_form').bootstrapValidator({
            submitHandler: function (validator, form, submitButton) {
                angular.element(document.getElementById('memberController')).scope().saveSecurityQuestion();
                $("#btnsubmitstep4").attr("disabled", false);
            },
            framework: 'bootstrap',
            fields: {
                
                question1: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                answer1: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
               

                question2: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },

                answer2: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                question3: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                answer3: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                question4: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                answer4: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },

                question5: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                answer5: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },

                pin: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                        identical: {
                    		field: 'retypepin',
                    		message: '6 digit pin and Re-type 6 digit pin are not the same'
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
                retypepin: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                        identical: {
                    		field: 'pin',
                    		message: '6 digit pin and Re-type 6 digit pin are not the same'
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



<style>
	body{
		background-color: white !important;
	}
	
</style>
<div class="col-md-10" style="margin-top: 20px; margin:auto; clear: both;  float: none" id="memberController" ng-controller="memberController" ng-init="initMemberForm()">
	
	<div class="col-md-12" >
		<div class="portlet light portlet-fit " >
			
			<div class="portlet-body"  >
				<img src="assets/images/logo_white.png">
				<div class="mt-element-step">
					<div class="row step-line">
						
						
						<div class="col-md-3 mt-step-col first active" id="step1">
						<div class="mt-step-number bg-white">1</div >
						<div class="mt-step-title uppercase font-grey-cascade">Member Information</div>
						<div class="mt-step-content font-grey-cascade">Personal and Employment Information</div>
					</div>
					<div class="col-md-3 mt-step-col " id="step2" >
					<div class="mt-step-number bg-white">2</div >
					<div class="mt-step-title uppercase font-grey-cascade">Proof of Identity</div>
					<div class="mt-step-content font-grey-cascade">Valid IDs and Documents</div>
				</div>
				<div class="col-md-3 mt-step-col "  id="step3">
					<div class="mt-step-number bg-white">3</div>
					<div class="mt-step-title uppercase font-grey-cascade">Application</div>
					<div class="mt-step-content font-grey-cascade">Loan Application</div>
				</div>
				<div class="col-md-3 mt-step-col last"  id="step4">
					<div class="mt-step-number bg-white">4</div>
					<div class="mt-step-title uppercase font-grey-cascade">Security</div>
					<div class="mt-step-content font-grey-cascade">Security Questions and pin</div>
				</div>
				
			</div>
		</div>
		
<div class="portlet-body" ng-show="steps.step1">
	
	<form id="step1_form" action="" method="post">
		<div class="timeline  ">
			<!-- TIMELINE ITEM -->
			<div class="timeline-item"  >
				<div class="timeline-badge" >
				<img class="timeline-badge-userpic" src="assets/images/1.png" > </div>
				<div class="timeline-body  " style="background-color: white;padding-bottom: 0px" >
					<div class="timeline-body-head">
						<div class="timeline-body-head-caption">
							<p  class="timeline-body-title font-blue-madison no_margin" ><h2 class="no_margin">Required Information</h2></p>
							<p class="no_margin">We have received your inforation from your company.</p>
							<p class="no_margin">Please review and make sure the informations are correct.</p>
						</div>
						
					</div>
					<div class="timeline-body-content">
						<div class="portlet  ">
							<div class="portlet-body form col-md-11" >
								
								<div class="form-body" style="padding-bottom: 0px">
									
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
												<input type="text" class="form-control datepicker"  name="hiringdate" ng-model="members.hiringdate" >
												
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									
									<div class="col-md-4">
										<div class="form-group">
											<label>Monthly Salary<span class="required">*</span></label>
											<input type="number" class="form-control" maxlength="100" name="monthlysalary" ng-model="members.monthlysalary">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Email Address<span class="required">*</span></label>
											<input type="text" class="form-control" maxlength="100"  name="emailaddress" ng-model="members.emailaddress">
										</div>
									</div>
									<div class="col-md-4">
											<div class="form-group">
												<label>Position<span class="required">*</span></label>
												<input type="text" class="form-control" maxlength="100" name="position" ng-model="members.position">
												
											</div>
										</div>
									
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END TIMELINE ITEM -->
		<div class="timeline  ">
			<!-- TIMELINE ITEM -->
			<div class="timeline-item"  >
				<div class="timeline-badge" >
				<img class="timeline-badge-userpic" src="assets/images/1.png" > </div>
				<div class="timeline-body  " style="background-color: white;padding-bottom: 0px" >
					<div class="timeline-body-head">
						<div class="timeline-body-head-caption">
							<p  class="timeline-body-title font-blue-madison no_margin" ><h2 class="no_margin">Required Information</h2></p>
							<p class="no_margin">We have received your inforation from your company.</p>
							<p class="no_margin">Please review and make sure the informations are correct.</p>
						</div>
						
					</div>
					<div class="timeline-body-content">
						<div class="portlet  ">
							<div class="portlet-body form col-md-11" >
								
								<div class="form-body" style="padding-bottom: 0px">
									
									<div class="row">
										
										

										<div class="col-md-4">
										<div class="form-group">
											<label>Department<span class="required">*</span></label>
											<select class="form-control" name="department" id="department" ng-model="members.department">
												<option value="" selected></option>
												<option ng-repeat="dep in department" value="{{ dep.id }}">{{ dep.department }}</option>
											</select>
										</div>
									</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Date of Birth<span class="required">*</span></label>
												<input type="text" class="form-control datepicker"  name="birthday" ng-model="members.birthday" >
												
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Civil Status<span class="required">*</span></label>
												<select class="form-control" id="civilstatus" name="civilstatus" ng-model="members.civilstatus">
													<option ng-repeat="cs in civilstatus" value="{{ cs.id }}">{{ cs.civilstatus }}</option>
												</select>
												
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
												<label>Total Hours Per Week<span class="required">*</span></label>
												<input type="number" class="form-control" maxlength="100" name="hoursperweek" ng-model="members.hoursperweek">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Address 1</label>
												<input type="text" class="form-control" name="address1" maxlength="500" ng-model="members.address1">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Address 2</label>
												<input type="text" class="form-control" name="address2" maxlength="500" ng-model="members.address2">
											</div>
										</div>
										
									</div>
									
								</div>
								
								<div class="form-actions col-md-12 text-right">
									
									<button type="submit" id="btnsubmitstep1" class="btn green" >
									Continue <i class="fa fa-angle-right"></i> </button>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END TIMELINE ITEM -->
	</form>
	
</div>
	<!--  -->
	<div class="portlet-body" ng-show="steps.step2">
		<div class="timeline  ">
			<!-- TIMELINE ITEM -->
			<div class="timeline-item"  >
				<div class="timeline-badge" >
				<img class="timeline-badge-userpic" src="assets/images/1.png" > </div>
				<div class="timeline-body  " style="background-color: white;padding-bottom: 0px" >
					<div class="timeline-body-head">
						<div class="timeline-body-head-caption">
							<p  class="timeline-body-title font-blue-madison no_margin" ><h2 class="no_margin">Proof of Identify</h2></p>
							<p class="no_margin">In order to protect your transaction with us, we would like to verify your identity.</p>
							<p class="no_margin">We require at least 1 of these two IDs: SSS and/or Tin No.</p>
						</div>
						
					</div>
					<div class="timeline-body-content">
						<div class="portlet  ">
							<div class="portlet-body form" >
								<input type="file" name="file" id="fileupload" class="hidden">
								<input type="text" id="txtid" value="{{ members.memberid }}" class="hidden">
                                <input type="text" id="txtgid" value="{{ members.membergid }}" class="hidden">
								<input type="text" id="txtdocument" class="hidden">
								
								<div class="form-body" style="padding-bottom: 0px">
									<div class="alert alert-block alert-danger fade in  col-md-11" style="display: none;">
									</div>
									<div class="row">
										<div class=" col-md-11">
											<table class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th col>Document</th>
														<th class="text-center" style="width: 20px">Status</th>
														<th class="text-center" style="width: 220px">Actions</th>
													</tr>
												</thead>
												<tbody>
													<tr ng-repeat="document in documents" >
														<td>{{ document.document }}</td>
														<td class="text-center"><span  ng-show="document.filename!=''" class="label label-sm label-success btn-circle"><i class="fa fa-check" aria-hidden="true"></i> </span>
														<span  ng-show="document.filename==''" class="label label-sm label-danger btn-circle"> <i class="fa fa-times" aria-hidden="true"></i> </span></td>
														<td >
															<button  type="button" ng-click="prepareUpload(document.docid)" class="btn btn-xs green btn-primary filter-submit margin-bottom btnPrepareUpload">
															<i class="fa fa-upload" aria-hidden="true"></i> Upload File
															</button>
															<button  ng-show="document.filename!=''" type="button" ng-click="removeFile(document.docid,document.member_id,document.filename)" class="btn btn-xs red btn-primary filter-submit margin-bottom btnPrepareUpload">
															<i class="fa fa-chain-broken" aria-hidden="true"></i> Remove File
															</button>
															
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="form-actions col-md-11 text-right">
									<button type="button" class="btn default" ng-click="goBack(1)">
									<i class="fa fa-angle-left"></i> Back</button>
									<button type="button" class="btn green" ng-click="saveValidID()"  >
									Continue <i class="fa fa-angle-right"></i> </button>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END TIMELINE ITEM -->
		
		
	</div>
</div>
<!--  -->
<div class="portlet-body" ng-show="steps.step3">

<form id="step3_form" action="" method="post">
	<div class="timeline  ">
		<!-- TIMELINE ITEM -->
		<div class="timeline-item"  >
			<div class="timeline-badge" >
			<img class="timeline-badge-userpic" src="assets/images/1.png" > </div>
			<div class="timeline-body  " style="background-color: white;padding-bottom: 0px" >
				<div class="timeline-body-head">
					<div class="timeline-body-head-caption">
						<p  class="timeline-body-title font-blue-madison no_margin" ><h2 class="no_margin">Loan Application</h2></p>
						<p class="no_margin">To activate new accounts, a first time loan application is required.</p>
					</div>
					
				</div>
				<div class="timeline-body-content">
					<div class="portlet  ">
						<div class="portlet-body form " >
							<div class="form-body col-md-11 " >
								<div class="alert alert-block alert-danger fade in  col-md-11" style="display: none;">
                                    </div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Loan Plan<span class="required">*</span></label>
											<select class="form-control" name="loanplan" ng-model="members.loanplan">
												<option ng-repeat="loanplan in loanplans" value="{{ loanplan.code }}">{{ loanplan.loantype }}</option>
											</select>
										</div>
									</div>
									
									<div class="col-md-4" >
										<div class="form-group">
											<label>Loan Amount<span class="required">*</span></label>
											<input type="number" class="form-control" maxlength="100"  name="loanamount" ng-model="members.loanamount">
										</div>
									</div>
									<div class="col-md-4" ng-show="members.loanplan=='B'">
										<div class="form-group">
											<label>Months<span class="required">*</span></label>
											<select class="form-control " name="months"  ng-model="members.months">
												<option value="" selected></option>
												<option value="3">3 Months</option>
												<option value="4">4 Months</option>
												<option value="5">5 Months</option>
												<option value="6">6 Months</option>
												<option value="7">7 Months</option>
												<option value="8">8 Months</option>
												<option value="9">9 Months</option>
												<option value="10">10 Months</option>
												<option value="11">11 Months</option>
												<option value="12">12 Months</option>
											</select>
										</div>
									</div>
									
								</div>
								
							</div>
							
							<div class="form-actions col-md-11 text-right">
								<button type="button" class="btn default" ng-click="goBack(2)">
								<i class="fa fa-angle-left"></i> Back</button>
								
								<button type="submit" id="btnsubmitstep3" class="btn green"  >
								Continue <i class="fa fa-angle-right"></i> </button>
							</div>
							
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END TIMELINE ITEM -->
</form>	
	
</div>

<div class="portlet-body" ng-show="steps.step4">
	
	<form id="step4_form" action="" method="post">
		<div class="timeline  ">
			<!-- TIMELINE ITEM -->
			<div class="timeline-item"  >
				<div class="timeline-badge" >
				<img class="timeline-badge-userpic" src="assets/images/1.png" > </div>
				<div class="timeline-body  " style="background-color: white;padding-bottom: 0px" >
					<div class="timeline-body-head">
						<div class="timeline-body-head-caption">
							<p  class="timeline-body-title font-blue-madison no_margin" ><h2 class="no_margin">Security  Questions</h2></p>
							<p class="no_margin">Answering the security question and providing 6-digit pin will secure you account.</p>
						</div>
						
					</div>
					<div class="timeline-body-content" >
						<div class="portlet  ">
							<div class="form-body col-md-11 " style="padding-left: 0px;margin-top: 20px">
								<div class="alert alert-block alert-danger fade in">
								</div>
								
								
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Question 1<span class="required">*</span></label>
											<select class="form-control" name="question1" ng-model="members.question1">
												<option value="" selected></option>
												<option ng-repeat="question in questions" value="{{ question.id }}">{{ question.question }}</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Answer 1<span class="required">*</span></label>
											<input type="text" class="form-control" maxlength="200"  name="answer1" ng-model="members.answer1">
										</div>
									</div>
									
									
									
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Question 2<span class="required">*</span></label>
											<select class="form-control" name="question2" ng-model="members.question2">
												<option value="" selected></option>
												<option ng-repeat="question in questions" value="{{ question.id }}">{{ question.question }}</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Answer 2<span class="required">*</span></label>
											<input type="text" class="form-control" maxlength="200"  name="answer2" ng-model="members.answer2">
										</div>
									</div>
									
									
									
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Question 3<span class="required">*</span></label>
											<select class="form-control" name="question3" ng-model="members.question3">
												<option value="" selected></option>
												<option ng-repeat="question in questions" value="{{ question.id }}">{{ question.question }}</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Answer 3<span class="required">*</span></label>
											<input type="text" class="form-control" maxlength="200"  name="answer3" ng-model="members.answer3">
										</div>
									</div>
									
									
									
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Question 4<span class="required">*</span></label>
											<select class="form-control" name="question4" ng-model="members.question4">
												<option value="" selected></option>
												<option ng-repeat="question in questions" value="{{ question.id }}">{{ question.question }}</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Answer 4<span class="required">*</span></label>
											<input type="text" class="form-control" maxlength="200"  name="answer4" ng-model="members.answer4">
										</div>
									</div>
									
									
									
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Question 5<span class="required">*</span></label>
											<select class="form-control" name="question5" ng-model="members.question5">
												<option value="" selected></option>
												<option ng-repeat="question in questions" value="{{ question.id }}">{{ question.question }}</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Answer 5<span class="required">*</span></label>
											<input type="text" class="form-control" maxlength="200"  name="answer5" ng-model="members.answer5">
										</div>
									</div>
									
									
									
								</div>
								
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="timeline-item"  >
				<div class="timeline-badge" >
				<img class="timeline-badge-userpic" src="assets/images/1.png" > </div>
				<div class="timeline-body  " style="background-color: white;padding-bottom: 0px" >
					<div class="timeline-body-head">
						<div class="timeline-body-head-caption">
							<p  class="timeline-body-title font-blue-madison no_margin" ><h2 class="no_margin">6 digit pin</h2></p>
							<p class="no_margin">Answering the security question and providing 6-digit pin will secure you account.</p>
						</div>
						
					</div>
					<div class="timeline-body-content" >
						<div class="portlet  ">
							<div class="portlet-body form " >
								<div class="form-body col-md-11 " style="padding-left: 0px;margin-top: 20px">
									<div class="alert alert-block alert-danger fade in">
									</div>
									
									
									<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>6 digit pin<span class="required">*</span></label>
											<input type="password" class="form-control" maxlength="6"  name="pin" ng-model="members.pin">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Re-type  6 digit pin<span class="required">*</span></label>
											<input type="password" class="form-control" maxlength="6"   name="retypepin" ng-model="members.retypepin">
										</div>
									</div>
									
									
									
								</div>

									
									
									
									
									
									
								</div>
								<div class="form-actions col-md-11 text-right" style="background-color: white">
									<button type="button" class="btn default" ng-click="goBack(3)">
									<i class="fa fa-angle-left"></i> Back</button>
									<button type="submit" id="btnsubmitstep4" class="btn green"   >
									Finish <i class="fa fa-angle-right"></i> </button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END TIMELINE ITEM -->
		</form>
	</div>
</div>

