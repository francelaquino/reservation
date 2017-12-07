<div class="withBalance">
    <h5 style="margin-top:5%">You cannot request PayMeExpress Plan if you have PayPlus outstanding balance</h5>
</div>

<div class="withoutBalance">
    <h5>Access your pay as you earn it or for days you have actually worked.</h5>

    <div class="col-md-8 " style=" margin: auto; clear: both;float: none">
        <div class="col-md-6" style="padding: 0px;">
            <h5 style="line-height: 40px;vertical-align: middle;" class="text-left"></h5>
        </div>
        <div class="col-md-6" style="padding: 0px;">
            <h5 style="line-height: 40px;display: inline-block; width: 350px;float: right;padding: 0px; text-align: right;">Enter Amount
                <input id="loanamount" type="number" class="form-control input-circle text-center" style="width: 150px; font-size: 15px; display: inline-block;"
                    ng-change="payexpressupdateLoanSlider()" ng-model="loan.loanamount"></h5>
        </div>
    </div>

    <div class="col-md-8 round_white">
        <label class="col-md-2 control-label" id="payexpressSemiSalary"></label>
        <div class="col-md-8">
            <input id="payexpress_amount" type="text" />

        </div>
        <label class="col-md-2 control-label" id="payexpressLimit"></label>
    </div>


    <h3 style="color:white">Php. {{semiSalary | number:2}}</h3>
    <h5 style="color:silver;margin: 0px;">(Your estimated semi-monthly
        </br/>income this pay period)</h5><br>
    <h3 style="color:white">Php. {{remaining | number:2}}</h3>
    <h5 style="color:silver;margin: 0px;margin-bottom:10px;">(Remaining Balance)</h5>
    <h3 style="color:silver">Php. {{loan.prevloan | number:2}}</h3>
    <h5 style="color:silver;margin: 0px;margin-bottom:10px;">(Outstanding Balance)</h5>
    <button class="btn-cashout" ng-click="paymeexpressCashOut()">PayRoll Cash Out</button>
    <h3>Unlock your pay today!</h3>
    <br>
    <h4 class="summaryTitle">
        Pay<span style="color:#f6cf68;font-style: italic;font-weight: normal; ">MeExpress</span> Summary
    </h4>
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
</div>