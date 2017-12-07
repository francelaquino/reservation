
<div class="page-content-inner" id="partnerController" ng-controller="partnerController" ng-init="initPartnerPayment();"  >
    <div >
        <div>
            <div class="portlet  ">
                <div class="portlet-title ">
                    <div class="caption caption-md">
                        <span class="breadcrumb">Payroll <i class="fa fa-circle"></i> Partner Payment</span>
                    </div>
                </div>
                
                <div class="portlet-body  " >
                    
                         <div class="row">
                        <div class="col-md-3">
                            <label>Payroll Period </label>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        <select class="form-control " id="endday" ng-model="loan.endday">
                                                   <option value="" selected></option>
                                                    <option ng-repeat="pp in payperiods" value="{{ pp.endday }}">{{ pp.period }}</option>
                                                </select>
                        </div>
                       
                        <div class="col-md-9">
                            <button type="button" class="btn btn-default" ng-click="getMemberPayment()"  >
                            Search</button>
                            
                            <button class="btn btn-danger" style="float: right;display: none" ng-click="rejectMemberPayment()" id="btnreject">Reject</button>
                            <button class="btn btn-primary" style="margin-right:2px;float: right;display: none" ng-click="submitMemberPayment()" id="btnsubmit">Submit</button> 
                            <span id="status" style="float: right;padding:5px; min-width: 100px;" class="label label-sm label-danger"></span>
                        </div>
                        </div>
                        <hr/>
                        <div class="row" >

                            <div class="col-md-12" >
                                <table class="table table-striped table-bordered" id="memberpayment"  >
                                    <thead>
                                        <tr class="bg-primary" >
                                            <th>Payroll Date</th>
                                            <th>Date Posted</th>
                                            <th>Posted By</th>
                                            <th>Total Amount Due</th>
                                            <th>Total Payment</th>
                                            <th>Difference </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="loan in loans" ng-hide="loan.duedate==null"   >
                                            <td>{{ loan.due_date}}
                                            <td>{{ loan.dateposted}}
                                            <td>{{ loan.postedby}}
                                            <td style="text-align: right;">{{ loan.balance }}</td>
                                            <td style="text-align: right;">{{ loan.payment }} </td>
                                            <td style="text-align: right;">{{ loan.difference }}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
    $(document).ready(function () {



        $('#schedule_form').bootstrapValidator({
            submitHandler: function (validator, form, submitButton) {
                angular.element(document.getElementById('partnerController')).scope().savePayrollSchedule();
                $("#btnsubmit").attr("disabled", false);
            },
            framework: 'bootstrap',
            fields: {
                
                month: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                startday: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                
                 endday: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },

                
                processday: {
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