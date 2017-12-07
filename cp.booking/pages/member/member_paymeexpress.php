<style type="text/css">
    .table th,
    td {
        font-size: 12px !important;
    }

    .table tr th {
        background-color: #6083ab !important;
        color: white !important;
    }

    .summaryItems {
        color: gray;
        font-size: 16px;
    }

    .summaryItems .value {
        color: green;
        font-size: 15px;
    }

    .btn-warning {
        background-color: #e66826 !important;
        border: 1px solid #d35418 !important;
        font-size: 14px !important;
        width: 150px;
        height: 35px;
        -webkit-border-radius: 20px !important;
        -moz-border-radius: 20px !important;
        -ms-border-radius: 20px !important;
        -o-border-radius: 20px !important;
        border-radius: 20px !important;
    }


    .loansuccess p {
        color: #337ab7 !important;
        width: 94%;
        text-align: center;
        margin-top: 10%;
        font-size: 17px;
    }




    .timesheet .week-days h1 {
        width: 12%;
        margin: 5px;
        text-align: center;
        float: left;
        border-radius: 10px !important;
        font-size: 12px;
        height: 20px;
        padding-top: 4px;
        background-color: #06173f;
        color: white;
    }

    .timesheet .periodtitle {
        background-color: transparent;
        color: white;
        width: 92%;
        font-size: 20px;
        text-align: center;
    }

    .timesheet .period {
        background-color: #06173f;
        color: white;
        width: 500px;
        font-size: 13px;
        padding: 5px;
        text-align: center;
        border-radius: 10px !important;
        margin-left: 25%;
        text-transform: uppercase;
    }

    .timesheet .cal-days {
        background-color: white;
        width: 12%;
        height: 120px;
        margin: 5px;
        text-align: center;
        float: left;
        border: 2px solid #eff1f0;
        border-radius: 10px !important;
    }

    .timesheet .cal-days-disabled {
        background-color: silver;
    }

    .timesheet .cal-divider {
        width: 100%;
        float: left;
    }

    .timesheet .cal-day {
        width: 100%;
        height: 50px;
        font-size: 35px;
        color: #0f2558;
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .timesheet .cal-category {
        padding: 2px;
        border: 0px;
        outline: none;
        background-color: transparent;
        font-size: 12px;
    }

    .timesheet .selectWrapper {
        border-radius: 36px;
        display: inline-block;
        overflow: hidden;
        background-color: #06173f;
        border: 1px solid #cccccc;
        border-radius: 15px !important;
        width: 95%;
        margin: 0px;
        color: white;
    }

    .timesheet .cal-category option {
        color: black !important;
        text-align: center;
    }
</style>

<div class="page-content-inner" id="memberController" ng-controller="memberController" ng-init="initLoanForm('B');">
    <div class="portlet  ">
        <div class="portlet-title ">
            <div class="caption caption-md">
                <span class="breadcrumb">My Pay <i class="fa fa-circle"></i> Advance Salary Request</span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 timesheet" style="display: none" ng-include="'pages/member/member_loancalendar.php'">
            </div>

        </div>


        <div class="row">
            <div class="page-content-inner loansuccess" style="margin-top: 100px;display: none; color:white">
                <div class="col-md-12 text-center">
                    <h4>Your request has been submitted and waiting for approval</h4>
                </div>
            </div>
            <div class="page-content-inner loanpending" style="margin-top: 100px;display: none; color:white">
                <div class="col-md-12 text-center">
                    <h4>You still have pending salary advance request</h4>
                </div>
            </div>
            <div class="page-content-inner loanpayplus" style="margin-top: 100px;display: none; color:white">
                <div class="col-md-12 text-center">
                    <h4>You need to close your payplus request</h4>
                </div>
            </div>
            <div class="page-content-inner loanclosed" style="margin-top: 100px;display: none; color:white">
                <div class="col-md-12 text-center">
                    <h4>This page is close during salary process period</h4>
                </div>
            </div>
            <div class="portlet " style="display: none">
                <div class="col-md-12 loanrequest" style="margin-top: 50px; margin-bottom: 20px;">
                    <div class="text-center">
                        <a href="#/member/paynow" class=" btn-loan-curve ">Pay<span style="color:#5fd282;font-style: italic;font-weight: normal; ">Now</span></a>
                        <a href="#/member/paymeexpress" class="active btn-loan-curve">Pay<span style="color:#f6cf68;font-style: italic;font-weight: normal; ">MeExpress</span></a>
                        <a href="#/member/payplus" class="btn-loan-curve">Pay<span style="color:#1154a7;font-style: italic;font-weight: normal; ">Plus</span></a>
                        <div id="initialsummary">
                            <h5>Access your pay as you earn it or for days you have actually worked.</h5>
                            <h3>Enter Amount</h3>
                            <input type="number" class="form-control input-circle text-center" style="width: 200px;font-weight: bold; font-size: 19px; margin:auto"
                                ng-model="loan.loanamount"><br>
                            <h3 style="color:silver">Php. {{semiSalary | number:2}}</h3>
                            <h5 style="color:silver;margin: 0px;">(Your estimated semi-monthly
                                </br/>income this pay period)</h5><br>
                            <h3 style="color:silver">Php. {{remaining | number:2}}</h3>
                            <h5 style="color:silver;margin: 0px;margin-bottom:10px;">(Remaining Balance)</h5>
                            <button class="btn-cashout" ng-click="paymeexpressCashOut()">PayRoll Cash Out</button>
                            <h3>Unlock your pay today!</h3>
                            <br>
                            <h4 class="summaryTitle">Pay<span style="color:#5fd282;font-style: italic;font-weight: normal; ">Now</span> Summary</h4>
                            <br>
                            <div class="container-round ">
                                <h5>Your Admin Fee</h5>
                                <input type="text" class="form-control input-circle" ng-model="loan.fee" readonly>
                            </div>

                            <div class="container-round ">
                                <h5>Your Deduction Period</h5>
                                <input type="text" class="form-control input-circle payrollperiod" readonly>
                            </div>
                            <br>
                            <div class="container-round " style="width: 500px;padding: 15px; height: 90px">
                                <h5 style="margin:0px;color:#ececec">
                                    <p style="text-align: justify;margin: 0px;margin-bottom: 10px;">Important Reminder: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <p style="text-align: justify;margin: 0px;"><input type="checkbox" id="terms"> Ticking this box means you agree and understand to
                                        the terms stated.</p>
                                </h5>
                            </div>

                        </div>
                    </div>
                </div>







                <div class="container loanrequest">
                    <div id="summary" class="col-md-12 text-center " style="display: none">
                        <h4 class="summaryTitle">Pay<span style="color:#5fd282;font-style: italic;font-weight: normal; ">Now</span> Summary</h4>

                        <div class="portlet-body  ">
                            <div class="form-body ">
                                <div class="container-round ">
                                    <h5>Payroll Period</h5>
                                    <input type="text" class="form-control input-circle payrollperiod" readonly>
                                </div>

                                <div class="container-round ">
                                    <h5>Admin Fee</h5>
                                    <input type="text" class="form-control input-circle" ng-model="loan.fee" readonly>
                                </div>

                                <div class="container-round ">
                                    <h5>Amount</h5>
                                    <input type="text" class="form-control input-circle" readonly ng-model="loan.loanamount">
                                </div>

                                <div class="container-round  " style="width:81%;padding-bottom:20px;" ng-show="deductions.length>0">
                                    <h4>Deductions</h4>
                                    <table class="table table-striped " style="width:98% ; clear: both;margin:auto;margin-bottom: 10px;margin-top: 10px;">
                                        <thead>
                                            <tr>
                                                <th>Deduction</th>
                                                <th style="width: 200px">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="deduction in deductions">
                                                <td>{{ deduction.deductionname }}</td>
                                                <td class="text-right">{{ deduction.amount | number:2 }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="row" ng-show="deductions.length>0">
                                        <div class="col-md-12">
                                            <label>Total Deduction Amount </label>
                                            <input type="text" class="form-control input-circle" readonly ng-model="loan.deductionamount">
                                        </div>


                                    </div>
                                </div>

                                <div class="container-round  " style="width:81%;padding-bottom:20px" ng-hide="bills.length<=0 && phones.length<=0 && games.length<=0">
                                    <h4>Add Ons</h4>




                                    <table class="table table-striped " ng-show="bills.length>0" style="width:98% ; clear: both;margin:auto;margin-bottom: 10px;margin-top: 10px;">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Biller Name</th>
                                                <th>Bill Number / Receipt No. / Reference No.</th>
                                                <th style="width: 200px" class="text-right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="billpayment in bills">
                                                <td>Pay My Bills</td>
                                                <td>{{ billpayment.billername }}</td>
                                                <td>{{ billpayment.billno }}</td>
                                                <td class="text-right">{{ billpayment.amount | number:2 }}</td>

                                            </tr>

                                        </tbody>
                                    </table>
                                    <div class="row" ng-show="bills.length>0">
                                        <div class="col-md-4">
                                            <label>Bill Payment Admin Fee </label>
                                            <input type="text" class="form-control input-circle" readonly ng-model="loan.billpaymentadminfee">
                                        </div>

                                        <div class="col-md-4">
                                            <label>Total Admin Fee </label>
                                            <input type="text" class="form-control input-circle" readonly ng-model="loan.billpaymentfee">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Total Bill Payment Amount </label>
                                            <input type="text" class="form-control input-circle" readonly ng-model="loan.billpaymentamount">
                                        </div>
                                    </div>

                                    <table class="table table-striped " ng-show="phones.length>0" style="width:98% ; clear: both;margin:auto;margin-bottom: 10px;margin-top: 10px;">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Subscriber Name</th>
                                                <th>Mobile No.</th>
                                                <th style="width: 200px" class="text-right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="loadphone in phones">
                                                <td>Load My Phone</td>
                                                <td>{{ loadphone.subscribername }}</td>
                                                <td>{{ loadphone.mobileno }}</td>
                                                <td class="text-right">{{ loadphone.amount | number:2 }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div class="row" ng-show="phones.length>0">
                                        <div class="col-md-4">
                                            <label>Load My Phone Admin Fee </label>
                                            <input type="text" class="form-control input-circle" readonly ng-model="loan.loadphoneadminfee">
                                        </div>

                                        <div class="col-md-4">
                                            <label>Total Admin Fee </label>
                                            <input type="text" class="form-control input-circle" readonly ng-model="loan.loadphonefee">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Total Load My Phone Amount </label>
                                            <input type="text" class="form-control input-circle" readonly ng-model="loan.loadphoneamount">
                                        </div>
                                    </div>


                                    <table class="table table-striped " ng-show="games.length>0" style="width:98% ; clear: both;margin:auto;margin-top: 10px;">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Product</th>
                                                <th>Mobile No</th>
                                                <th>Quantity</th>
                                                <th style="width: 200px" class="text-right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="onlinegame in games">
                                                <td>Buy Online Gaming</td>
                                                <td>{{ onlinegame.productname }}</td>
                                                <td>{{ onlinegame.mobileno }}</td>
                                                <td>{{ onlinegame.quantity }}</td>
                                                <td class="text-right">{{ onlinegame.amount | number:2 }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div class="row" ng-show="games.length>0">
                                        <div class="col-md-4">
                                            <label>Buy Online Gaming Admin Fee </label>
                                            <input type="text" class="form-control input-circle" readonly ng-model="loan.onlinegameadminfee">
                                        </div>

                                        <div class="col-md-4">
                                            <label>Total Admin Fee </label>
                                            <input type="text" class="form-control input-circle" readonly ng-model="loan.onlinegamefee">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Total Buy Online Gaming Amount </label>
                                            <input type="text" class="form-control input-circle" readonly ng-model="loan.onlinegameamount">
                                        </div>
                                    </div>
                                </div>


                            </div>



                        </div>

                        <div class=" col-md-12 " style="margin-top: 10px;">
                            <button type="button" ng-click="resetPayAdvance()" class="btn btn-warning">Reset</button>
                            <button type="button" class="btn btn-warning" ng-click="savePayNowApplication('B')">Submit</button>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div id="paybillform" class="modal  fade" tabindex="-1" style="width: 700px">
        <div class="modal-header" style=" background-color: #5a7ea7; ">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title " style="color: white">Bill Payment</h4>
        </div>
        <div class="modal-body ">

            <div ng-include="'pages/member/member_paybillform.php'"></div>


        </div>
    </div>
    <!--End Bill Form -->
    <div id="loadphoneform" class="modal  fade" tabindex="-1" style="width: 700px">
        <div class="modal-header" style=" background-color: #5a7ea7; ">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title " style="color: white">Load My Phone</h4>
        </div>
        <div class="modal-body ">

            <div ng-include="'pages/member/member_loadphoneform.php'"></div>


        </div>
    </div>
    <!--End Load PHone Form -->
    <div id="onlinegameform" class="modal  fade" tabindex="-1" style="width: 700px">
        <div class="modal-header" style=" background-color: #5a7ea7; ">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title " style="color: white">Buy Online Game</h4>
        </div>
        <div class="modal-body ">

            <div ng-include="'pages/member/member_onlinegameform.php'"></div>


        </div>
    </div>
    <!--End Game Form -->



    <div id="billpaymentdetailsform" class="modal  fade" tabindex="-1" style="width: 700px">
        <div class="modal-header" style=" background-color: #5a7ea7; ">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title " style="color: white">Bill payment Details</h4>
        </div>
        <div class="modal-body ">

            <div ng-include="'pages/member/member_billpaymentdetailsform.php'"></div>

        </div>
    </div>


    <div id="mobileloaddetailsform" class="modal  fade" tabindex="-1" style="width: 700px">
        <div class="modal-header" style=" background-color: #5a7ea7; ">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title " style="color: white">Mobile Load</h4>
        </div>
        <div class="modal-body ">

            <div ng-include="'pages/member/member_mobileloaddetailsform.php'"></div>


        </div>
    </div>


    <div id="gameloaddetailsform" class="modal  fade" tabindex="-1" style="width: 700px">
        <div class="modal-header" style=" background-color: #5a7ea7; ">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title " style="color: white">Online Game</h4>
        </div>
        <div class="modal-body ">
            <div ng-include="'pages/member/member_gameloaddetailsform.php'"></div>


        </div>
    </div>






    <div id="deductionform" class="modal   fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-header" style="background-color: #5a7ea7">
            <h4 class="modal-title " style="color: white">Deductions</h4>
        </div>
        <div class="modal-body ">

            <div ng-include="'pages/member/member_deductionform.php'"></div>


        </div>
    </div>

    <!--End Deduction Form -->
    <div id="deductionformentry" class="modal  fade" tabindex="-1" style="width: 700px">
        <div class="modal-header" style=" background-color: #5a7ea7; ">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title " style="color: white">Enter Deduction</h4>
        </div>
        <div class="modal-body">
            <div ng-include="'pages/member/member_deductionformentry.php'"></div>

        </div>
    </div>



    <div id="addonsform" class="modal   fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-header" style="background-color: #5a7ea7">
            <h4 class="modal-title " style="color: white">Add Ons</h4>
        </div>
        <div class="modal-body ">
            <div ng-include="'pages/member/member_addonsform.php'"></div>




        </div>



    </div>

    <script src="assets/scripts/d3.min.js" type="text/javascript"></script>
    <script src="assets/scripts/d3pie.js" type="text/javascript"></script>
