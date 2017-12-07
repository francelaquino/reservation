<table class="table table-striped table-bordered ">
            <thead>
                <tr class="bg-primary">
                    <th>Biller Name</th>
                    <th>Amount</th>
                    <th>Fee</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="billpayment in bills">
                    <td>{{ billpayment.billername }}</td>
                    <td class="text-right">{{ billpayment.amount | number:2 }}</td>
                    <td class="text-right">{{ loan.billpaymentadminfee | number:2 }}</td>
                </tr>
                
            </tbody>
        </table>
        <div class="row">
                    <div class="form-actions col-md-12 text-right " >
                    <hr/>
                        <button type="button" onclick="$('#billpaymentdetailsform').modal('hide')"  class="btn btn-default">
                        Close  </button>
                        
                    </div>
                </div>