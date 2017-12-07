<h5 style="border-bottom: 1px solid #4f5153; padding-bottom: 5px; display: inline-block;width:100%">
    <span>Pay My Bills</span>
    <button class="btn btn-default  btn-sm pull-right" ng-click="loadPayBillForm()" type="button">Choose</button>
</h5>

<div class="table-scrollable" style="width:100%; " ng-show="bills.length>0">
    <table class="table table-striped table-bordered table-advance table-hover">
        <thead>
            <tr>
                <th>Biller Name</th>
                <th>Bill Number / Receipt No. / Reference No.</th>
                <th>Amount</th>
                <th style="width: 80px"></th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="billpayment in bills">
                <td>{{ billpayment.billername }}</td>
                <td>{{ billpayment.billno }}</td>
                <td class="text-right">{{ billpayment.amount | number:2 }}</td>
                <td class="text-center">
                    <a href="javascript:void(0)" ng-click="removeBillPayment($index)">Remove</i></a>
                </td>

            </tr>

        </tbody>
    </table>
</div>

<h5 style="border-bottom: 1px solid #4f5153; padding-bottom: 5px; display: inline-block;width:100%"><span>Load My Phone</span>
    <button class="btn btn-default  btn-sm pull-right" ng-click="loadPhoneForm()" type="button">Choose</button></h5>
<div class="table-scrollable" style="width:700px; " ng-show="phones.length>0">
    <table class="table table-striped table-bordered table-advance table-hover">
        <thead>
            <tr>
                <th>Subscriber Name</th>
                <th>Mobile No.</th>
                <th>Amount</th>
                <th style="width: 80px"></th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="loadphone in phones">
                <td>{{ loadphone.subscribername }}</td>
                <td>{{ loadphone.mobileno }}</td>
                <td class="text-right">{{ loadphone.amount | number:2 }}</td>
                <td class="text-center">
                    <a href="javascript:void(0)" ng-click="removeLoadPhone($index)">Remove</i></a>
                </td>
            </tr>

        </tbody>
    </table>
</div>

<h5 style="border-bottom: 1px solid #4f5153; padding-bottom: 5px; display: inline-block;width:100%"><span>Buy Online Gaming</span>
    <button class="btn btn-default  btn-sm pull-right" ng-click="loadGameForm()" type="button">Choose</button>

</h5>
<div class="table-scrollable" style="width:700px; " ng-show="games.length>0">
    <table class="table table-striped table-bordered table-advance table-hover">
        <thead>
            <tr class="bg-primary">
                <th>Product</th>
                <th>Mobile No</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th style="width: 80px"></th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="onlinegame in games">
                <td>{{ onlinegame.productname }}</td>
                <td>{{ onlinegame.mobileno }}</td>
                <td>{{ onlinegame.quantity }}</td>
                <td class="text-right">{{ onlinegame.amount | number:2 }}</td>
                <td class="text-center">
                    <a href="javascript:void(0)" ng-click="removeOnlineGame($index)">Remove</i></a>
                </td>

            </tr>

        </tbody>
    </table>
</div>

<div class="row">

    <div class="form-actions col-md-12 text-right ">
        <button type="button" ng-click="showDeductions()" class="btn btn-primary">
                        Back  </button>
        <button type="button" ng-click="showSummary();" class="btn btn-primary">
                        Next  </button>
        <button type="button" onclick="$('#addonsform').modal('hide')" class="btn">
                        Cancel  </button>


    </div>
</div>
</div>