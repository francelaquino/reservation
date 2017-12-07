<div class="withBalance">
    <h5 style="margin-top:5%">You cannot request PayNow Plan if you have PayPlus outstanding balance</h5>
</div>

<div class="withoutBalance">
    <h5>
        Access your pay as you earn it or for days you have actually worked.</h5>
    <div style=" height:500px;width:334px ; background: transparent url('assets/images/phone.png') no-repeat right center;padding-top:100px; margin:auto">
        <h3 style="color:white">Php. {{estimatedSalary | number:2}}</h3>
        <h5 style="color:silver;margin: 0px;">( Your estimated earned income to date)</h5>
        <h3 style="color:white">Php. {{remaining | number:2}}</h3>
        <h5 style="color:silver;margin: 0px;margin-bottom:10px;">(Remaining Balance)</h5>
        <h3>Enter Amount</h3>
        <input type="number" class="form-control input-circle text-center" style="width: 200px;font-weight: bold; font-size: 19px; margin:auto"
            ng-model="loan.loanamount"><br>
        <button class="btn-cashout" ng-click="paynowCashOut()">PayRoll Cash Out</button>
        <h3>Unlock your pay today!</h3>
        <br>
    </div>





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
</div>