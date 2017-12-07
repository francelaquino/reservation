<h4 class="summaryTitle">
    Pay<span style="color:#5fd282;font-style: italic;font-weight: normal; ">Now</span> Summary
</h4>

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
    <button type="button" class="btn btn-warning" onclick="$('#declarationform').modal('show')">Submit</button>

</div>