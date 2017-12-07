<table class="table table-striped table-bordered ">
            <thead>
                <tr class="bg-primary">
                    <th>Subscriber Name</th>
                    <th>Amount</th>
                    <th>Fee</th>
                </tr>
            </thead>
            <tbody>
                
                <tr ng-repeat="loadphone in phones">
                    <td>{{ loadphone.subscribername }}</td>
                    <td class="text-right">{{ loadphone.amount | number:2 }}</td>
                    <td class="text-right">{{ loan.loadphoneadminfee | number:2 }}</td>
                </tr>
                
            </tbody>
        </table>
        <div class="row">
                    <div class="form-actions col-md-12 text-right " >
                    <hr/>
                        <button type="button" onclick="$('#mobileloaddetailsform').modal('hide')"  class="btn btn-default">
                        Close  </button>
                        
                    </div>
                </div>