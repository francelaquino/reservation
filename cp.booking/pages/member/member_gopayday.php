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


    .round_white {
        background-color: white;
        min-height: 70px;
        clear: both;
        margin: auto;
        float: none !important;
        -webkit-border-radius: 20px !important;
        -moz-border-radius: 20px !important;
        -ms-border-radius: 20px !important;
        -o-border-radius: 20px !important;
        border-radius: 20px !important;
        color: white;
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .round_white label {
        color: #585a59 !important;
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
        font-size: 40px;
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

<link href="assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
<script src="assets/global/plugins/ion.rangeslider/js/ion.rangeSlider.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>



<div class="page-content-inner" id="memberController" ng-controller="memberController" ng-init="initLoanForm()">

    <div class="portlet  ">
        
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
           
            <div class="page-content-inner loanclosed" style="margin-top: 100px;display: none; color:white">
                <div class="col-md-12 text-center">
                    <h4>This page is close during salary process period</h4>
                </div>
            </div>
            <div class="portlet " style="display: none">
                <div id="initialsummary" class="col-md-12 loanrequest" style="margin-top: 50px; margin-bottom: 20px;">
                    <div class="text-center">
                        <a href="javascript:void(0)" id='btnpaynow' ng-click="loan.loanamount='';showPlan('A')" class="active btn-loan-curve ">Pay<span style="color:#5fd282;font-style: italic;font-weight: normal; ">Now</span></a>
                        <a href="javascript:void(0)" id='btnpayexpress' ng-click="loan.loanamount='';showPlan('B')" class="btn-loan-curve">Pay<span style="color:#f6cf68;font-style: italic;font-weight: normal; ">MeExpress</span></a>
                        <a href="javascript:void(0)" id='btnpayplus' ng-click="loan.loanamount='';showPlan('C')" class="btn-loan-curve">Pay<span style="color:#1154a7;font-style: italic;font-weight: normal; ">Plus</span></a>

                        <div id='paynowplan' style="display:none" ng-include src="'pages/member/member_paynowplan.php'"></div>
                        <div id='paymeexpressplan' style='display:none' ng-include src="'pages/member/member_paymeexpressplan.php'"></div>
                        <div id='payplusplan' style='display:none' ng-include src="'pages/member/member_payplusplan.php'"></div>
                        <div id="payagreement"  class="container-round reminder" >
                            <h5 style="margin:0px;color:#ececec">
                                <p style="text-align: justify;margin: 0px;margin-bottom: 10px;">Important Reminder: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                <p style="text-align: justify;margin: 0px;"><input type="checkbox" id="terms"> Ticking this box means you agree and understand to the
                                    terms stated.</p>
                            </h5>
                        </div>
                    </div>

                </div>







                <div class="container loanrequest">
                    <div id="summary" class="col-md-12 text-center " style="display: none">
                        <ng-include src="planPath"></ng-include>

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
        <div class="modal-body">

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

    <!--Declaration-->
    <div id="declarationform" class="modal  fade" tabindex="-1" style="width: 500px !important">
        <div class="modal-header" style=" background-color: #4878cb; ">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title " style="color: white">Declaration</h4>
        </div>
        <div class="modal-body " style="background-color: #2f5597;color:white">
            <p><input type="checkbox" id="deccheck1" ng-click="isDeclarationComplete()"> 1. I Agree that if my net pay was not
                enough to pay the amount XXXX due to deductions, LWOP and others, difference of the amount shall be rolled
                over to next pay pay period as new salary advance plus applicable interest and service fees. </p>
            <p><input type="checkbox" id="deccheck2" ng-click="isDeclarationComplete()"> 2. I Agree that if my net pay was not
                enough to pay the amount XXXX due to deductions, LWOP and others, difference of the amount shall be rolled
                over to next pay pay period as new salary advance plus applicable interest and service fees. </p>
            <p><input type="checkbox" id="deccheck3" ng-click="isDeclarationComplete()"> 3. I Agree that if my net pay was not
                enough to pay the amount XXXX due to deductions, LWOP and others, difference of the amount shall be rolled
                over to next pay pay period as new salary advance plus applicable interest and service fees.
            </p>
            <div class="row">
                <div class="form-actions col-md-12 text-right ">

                    <button type="button" id="iAgree" ng-click="saveApplication()" disabled="disabled" class="btn btn-warning">
        Submit  </button>

                </div>
            </div>
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
