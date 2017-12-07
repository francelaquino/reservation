
<div class="page-content-inner" id="memberController" ng-controller="memberController" ng-init="initSecurityQuestion()">
    <div class="portlet  ">
        

        <div class="portlet-title ">
                    <div class="caption caption-md">
                        <span class="breadcrumb">My Profile <i class="fa fa-circle"></i> Security Question </span>
                    </div>
                </div>

        <div class="alert alert-block alert-success fade in" style="display: none;">
        </div>

        <form id="member_form" action="" method="post">


            <div class="portlet-body  ">


                <div class="form-body ">
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

                    <div class="row">
                    <div class="form-actions col-md-12 text-right">
                    <hr>
                        <button type="submit" id="btnsubmit" class="btn btn-primary">
                            Update
                        </button>
                        </div>

                    </div>
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
                   angular.element(document.getElementById('memberController')).scope().updateSecurityQuestion();
                   $("#btnsubmit").attr("disabled", false);
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


               }

           });


       });



</script>