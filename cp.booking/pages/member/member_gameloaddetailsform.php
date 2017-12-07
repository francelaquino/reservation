<table class="table table-striped table-bordered ">
             <thead>
                <tr class="bg-primary">
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Fee</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="onlinegame in games">
                    <td>{{ onlinegame.productname }}</td>
                    <td class="text-right">{{ onlinegame.amount | number:2 }}</td>
                    <td class="text-right">{{ loan.onlinegameadminfee | number:2 }}</td>
                </tr>
                
            </tbody>
        </table>
        <div class="row">
                    <div class="form-actions col-md-12 text-right " >
                    <hr/>
                        <button type="button" onclick="$('#gameloaddetailsform').modal('hide')"  class="btn btn-default">
                        Close  </button>
                        
                    </div>
                </div>