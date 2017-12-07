<div class="withBalance">
    <h5 style="margin-top:5%">You cannot request PayPlus Plan if you have outstanding balance</h5>
</div>

<div class="withoutBalance">
    <h5>
        Customize your PayPlus that works for you!</h5>
    <div class="col-md-8 " style=" margin: auto; clear: both;float: none">
        <div class="col-md-6" style="padding: 0px;">
            <h5 style="line-height: 40px;vertical-align: middle;" class="text-left">Total Advance Pay</h5>
        </div>
        <div class="col-md-6" style="padding: 0px;">
            <h5 style="line-height: 40px;display: inline-block; width: 350px;float: right;padding: 0px; text-align: right;">Enter Amount
                <input id="loanamount" type="number" class="form-control input-circle text-center" style="width: 150px; font-size: 15px; display: inline-block;"
                    ng-change="updateLoanSlider()" ng-model="loan.loanamount"></h5>
        </div>
    </div>

    <div class="col-md-8 round_white">
        <label class="col-md-2 control-label" id="payplusSemiSalary"></label>
        <div class="col-md-8">
            <input id="payplus_amount" type="text" />

        </div>
        <label class="col-md-2 control-label" id="payplusLimit"></label>
    </div>

    <br/>
    <div class="col-md-8 " style=" margin: auto; clear: both;float: none">
        <div class="col-md-6" style="padding: 0px;">
            <h5 style="line-height: 40px;vertical-align: middle;" class="text-left">Deduction Terms</h5>
        </div>
        <div class="col-md-6" style="padding: 0px;">
            <h5 style="line-height: 40px;display: inline-block; width: 350px;float: right;padding: 0px; text-align: right;">Select Deduction Period
                <select class="form-control input-circle text-center" ng-change="updateTermsSlider()" id="loanterms" style="width: 150px; font-size: 15px; display: inline-block;text-align: center"
                    ng-model="loan.terms">
                <option ng-repeat="period in periods" value="{{ period.payrollperiod }}">{{ period.payrollperiod }}</option>
            </select>

            </h5>
        </div>
    </div>


    <div class="col-md-8 round_white">
        <label class="col-md-2 control-label" id="payplusDeductionMin"></label>
        <div class="col-md-8">
            <input id="payplus_deduction" type="text" />

        </div>
        <label class="col-md-2 control-label" id="payplusDeductionMax"></label>
    </div>

    <br/>

    <button class="btn-cashout" ng-click="payplusCashOut()">PayRoll Cash Out</button>
    <h3>Unlock your pay today!</h3>
    <br>
    <h4 class="summaryTitle">
        Pay<span style="color:#1154a7;font-style: italic;font-weight: normal; ">Plus</span> Summary
    </h4>
    <br>
    <div class="container-round ">
        <h5>Your deduction per pay period</h5>
        <input type="text" class="form-control input-circle" ng-model="loan.deduction" readonly>
    </div>
    <div class="container-round ">
        <h5>You admin fee per pay period deduction</h5>
        <input type="text" class="form-control input-circle" ng-model="loan.fee" readonly>
    </div>
    <br>
    <div class="container-round ">
        <h5>Your deduction starts</h5>
        <input type="text" class="form-control input-circle payrollperiodstart" readonly>
    </div>
    <div class="container-round ">
        <h5>Your deduction ends</h5>
        <input type="text" class="form-control input-circle payrollperiodend" readonly>
    </div>
    <br>

</div>