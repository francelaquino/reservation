<style type="text/css">
    .mt-step-title {
        font-size: 15px !important;
        font-weight: bold !important;
    }

    .required {
        color: red !important;
    }
</style>


<div class="page-content-inner" id="partnerController" ng-controller="partnerController" ng-init="initMemberRegistrationForm()">

    <div class="portlet">
        <div class="portlet-title ">
            <div class="caption caption-md">
                <span class="captin-subject font-blue-madison  uppercase">Registration</span>
                <span class="breadcrumb">Members <i class="fa fa-circle"></i> Registration</span>
            </div>
        </div>
        <hr class="title">

    </div>

    <div class="row">
        <div class="portlet  ">

            <div class="portlet-body">
                <div class="mt-element-step">
                    <div class="row step-line">

                        <div class="col-md-4 mt-step-col first active" id="step1">
                            <div class="mt-step-number bg-white">1</div>
                            <div class="mt-step-title uppercase font-grey-cascade">Member Information</div>
                            <div class="mt-step-content font-grey-cascade">Personal and Employment Information</div>
                        </div>
                        <div class="col-md-4 mt-step-col " id="step2">
                            <div class="mt-step-number bg-white">2</div>
                            <div class="mt-step-title uppercase font-grey-cascade">Proof of Identity</div>
                            <div class="mt-step-content font-grey-cascade">Valid IDs and Documents</div>
                        </div>

                        <div class="col-md-4 mt-step-col last" id="step3">
                            <div class="mt-step-number bg-white">3</div>
                            <div class="mt-step-title uppercase font-grey-cascade">Security</div>
                            <div class="mt-step-content font-grey-cascade">Security Questions and pin</div>
                        </div>

                    </div>
                </div>

                <div class="portlet-body ready" ng-show="steps.step1">
                    <form id="step1_form" action="" method="post">

                        <div class="portlet  ">
                            <div class="portlet-body form ">
                                <div class="form-body" style="padding-bottom: 0px">
                                    
                                    <div class="row " style="margin-bottom: 10px;">
                                        <div class="alert alert-block alert-success fade in  col-md-12" style="display: none;"></div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12" style="margin-bottom: 10px">
                                            <span class="captin-subject font-red-sunglo  uppercase" style="margin-bottom: 10px">Personal and Employment Information<span>
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
                                                <label>Employee No.<span class="required">*</span></label>
                                                <input type="text" class="form-control" maxlength="100" name="employeeno" ng-model="members.employeeno">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email Address<span class="required">*</span></label>
                                                <input type="text" class="form-control" maxlength="100" name="emailaddress" ng-model="members.emailaddress">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Position<span class="required">*</span></label>
                                                <input type="text" class="form-control" maxlength="100" name="position" ng-model="members.position">

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
                                                <label>Hourly Rate<span class="required">*</span></label>
                                                <input type="number" class="form-control" maxlength="100" name="hourlyrate" ng-model="members.hourlyrate">
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Employee Status<span class="required">*</span></label>
                                                <select class="form-control " name="employeestatus" id="employeestatus" ng-model="members.employeestatus">
                                                            <option value="" selected></option>
                                                            <option ng-repeat="es in empstat" value="{{ es.id }}">{{ es.employeestatus }}</option>
                                                        </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select class="form-control" name="department" id="department" ng-model="members.department">
                                                        <option ng-repeat="dep in department" value="{{ dep.id }}">{{ dep.department }}</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date of Birth<span class="required">*</span></label>
                                                <input type="text" class="form-control datepicker" name="birthday" id="birthday" ng-model="members.birthday">

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
                                                <label>Hiring Date<span class="required">*</span></label>
                                                <input type="text" class="form-control datepicker" name="hiringdate" id="hiringdate" ng-model="members.hiringdate">

                                            </div>
                                        </div>
                                        <div class="col-md-4 enddate" style="display: none">
                                            <div class="form-group">
                                                <label>End of Contract<span class="required">*</span></label>
                                                <input type="text" class="form-control datepicker ignore" name="enddate" id="enddate" ng-model="members.enddate">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
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
                            </div>
                        </div>
                        <div class="form-actions text-right">
                            <div class="col-md-12">
                                <hr>
                                <button type="submit" id="btnsubmitstep1" class="btn btn-primary">
                Continue <i class="fa fa-angle-right"></i> </button>
                            </div>
                        </div>
                        <br>
                        <br>
                    </form>
                </div>
                <!--  -->

                <div class="portlet-body  ready" ng-show="steps.step2">
                    <div class="portlet  ">
                        <div class="portlet-body form">
                            <input type="file" name="file" id="fileupload" class="hidden">
                            <input type="text" id="txtid" value="{{ members.memberid }}" class="hidden">
                            <input type="text" id="txtgid" value="{{ members.membergid }}" class="hidden">
                            <input type="text" id="txtdocument" class="hidden">
                            <div class="form-body" style="padding-bottom: 0px">
                                <div class="alert alert-block alert-success fade in  col-md-12" style="display: none;"></div>



                                <div class="row">
                                    <div class="col-md-12" style="margin-bottom: 10px">
                                        <span class="captin-subject font-red-sunglo  uppercase" style="margin-bottom: 10px">Valid IDs and Documents<span>
                                </div>
                                    <div class=" col-md-12">
                                        <table class="table  table-bordered  table-striped ">
                                            <thead>
                                                <tr class="bg-primary">
                                                    <th col>Document</th>
                                                    <th class="text-center" style="width: 20px"></th>
                                                    <th class="text-center" style="width: 300px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="document in documents">
                                                    <td>{{ document.document }} <span ng-show="$index<=2" class="required">*</span></td>
                                                    <td class="text-center">
                                                        <span ng-show="document.filename!=''" class="label label-sm label-success btn-circle"><i class="fa fa-check" aria-hidden="true"></i> </span>
                                        <span ng-show="document.filename==''" class="label label-sm label-danger btn-circle"> <i class="fa fa-times" aria-hidden="true"></i> </span>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" ng-click="prepareUpload(document.docid)" class="btn btn-sm  btn-default margin-bottom btnPrepareUpload">
                                                          Upload File
                                                        </button>
                                            <button ng-show="document.filename!=''" type="button" ng-click="removeFile(document.docid,document.memberid,document.filename)"
                                                class="btn btn-sm  btn-default  margin-bottom btnPrepareUpload">
                                                            Remove File
                                                        </button>

                                        </td>
                                        </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="text-right">
                                    <hr>
                                    <button type="button" class="btn btn-default" ng-click="goBackValidID()">
                                        <i class="fa fa-angle-left"></i> Back
                                    </button>
                                    <button type="button" class="btn btn-primary" ng-click="saveValidID()">
                                        Continue <i class="fa fa-angle-right"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>

                <div class="portlet-body  ready" ng-show="steps.step3">

                    <form id="step3_form" action="" method="post">
                        <div class="portlet  ">
                            <div class="portlet-body form ">

                                <div class="form-body" style="padding-bottom: 0px">
                                    <div class="row " style="margin-bottom: 10px;">
                                        <div class="col-md-12">
                                            <span class="captin-subject font-red-sunglo  uppercase" style="margin-bottom: 10px">Security Question</span>
                                        </div>
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
                                                <input type="text" class="form-control" maxlength="200" name="answer1" ng-model="members.answer1">
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
                                                <input type="text" class="form-control" maxlength="200" name="answer2" ng-model="members.answer2">
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
                                                <input type="text" class="form-control" maxlength="200" name="answer3" ng-model="members.answer3">
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
                                                <input type="text" class="form-control" maxlength="200" name="answer4" ng-model="members.answer4">
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
                                                <input type="text" class="form-control" maxlength="200" name="answer5" ng-model="members.answer5">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="portlet  ">
                                <div class="portlet-body form ">

                                    <div class="form-body" style="padding-bottom: 0px">
                                        <div class="row " style="margin-bottom: 10px;">
                                            <div class="col-md-4">
                                                <span class="captin-subject font-red-sunglo  uppercase" style="margin-bottom: 10px">6 Digit Pin</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>6 digit pin<span class="required">*</span></label>
                                                    <input type="number" class="form-control" maxlength="6" name="pin" ng-model="members.pin" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Re-type  6 digit pin<span class="required">*</span></label>
                                                    <input type="number" class="form-control" maxlength="6" name="retypepin" ng-model="members.retypepin" autocomplete="off">
                                                </div>
                                            </div>



                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-actions text-right">
                                        <hr>
                                        <button type="button" class="btn btn-default" ng-click="goBackPin()">
                                            <i class="fa fa-angle-left"></i> Back
                                        </button>
                                        <button type="submit" id="btnsubmitstep3" class="btn btn-primary">
                                            Submit <i class="fa fa-angle-right"></i>
                                        </button>

                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="documents" class="modal container fade" tabindex="-1">
        <div class="modal-header" style=" background-color: #45b6af; ">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title " style="color: white">Document</h4>
        </div>
        <div class="modal-body " style="background-color: #f6fbfc; text-align:center;  " id="modal-body">
            <img style="clear:both;float:none;max-height: 100%;max-width:100%;margin: auto" src="" id="memberDoc" />
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

        $("#fileupload").change(function () {
            uploadMemberDocuments('partner');

        });

        $("#employeestatus").change(function () {
            if ($("#employeestatus").val() == "2") {
                $("#enddate").removeClass("ignore");
                $(".enddate").show();
            } else {
                $("#enddate").addClass("ignore");
                $(".enddate").hide();
            }

        });


        $('#step1_form').bootstrapValidator({
            submitHandler: function (validator, form, submitButton) {
                angular.element(document.getElementById('partnerController')).scope().saveMemberInfoStep1();
                $("#btnsubmitstep1").attr("disabled", false);
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

                familyname: {
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
                hourlyrate: {
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
                enddate: {
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
                angular.element(document.getElementById('partnerController')).scope().saveSecurityQuestion();
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
                            min: 6,
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
                            min: 6,
                            max: 6,
                            message: 'Please enter 6 digit pin'
                        }

                    }
                },
            }

        });


    });
</script>