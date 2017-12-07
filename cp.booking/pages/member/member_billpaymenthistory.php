<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="index.html">Payment</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="index.html">Bills Payment History</a>
        <i class="fa fa-circle"></i>
    </li>
    
</ul>
<div class="page-content-inner" ng-controller="memberController">
    <div class="row">
        <div class="portlet light ">
            <div class="portlet-title ">
                <div class="caption caption-md">
                    <span class="captin-subject font-blue-madison  uppercase">Bills Payment History</span>
                </div>
            </div>
            <div class="portlet-body  " style="display: block;float: none;min-height: 470px;">
                
                
                <div class="form-body " >
                    <div class="row">
                        <div class="col-md-3">
                            <label>Transaction Date From</label>
                        </div>
                        <div class="col-md-3">
                            <label>Transaction Date To</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" class="form-control datepicker" id="from"   ng-model="loan.from">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control datepicker" id="to"  ng-model="loan.to">
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn green" ng-click="getMemberBillPaymentHistory()"  >
                            Search</button>
                        </div>
                    </div>
                    
                    
                    
                    
                    <hr>
                    <div class="tableContainer">
                    <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Loan ID</th>
                                    <th>Date Applied</th>
                                    <th>Biller</th>
                                    <th>Bill No</th>
                                    <th>Bill Amount</th>
                                    <th>Interest</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="loan in loans" >
                                    <td>{{ loan.id }}</td>
                                    <td>{{ loan.dateapplied }}</td>
                                    <td>{{ loan.billername }}</td>
                                    <td>{{ loan.billno }}</td>
                                    <td class="text-right">{{ loan.principal }}</td>
                                    <td class="text-right">{{ loan.interest }}</td>
                                    <td class="text-right">{{ loan.totalamount }}</td>
                                    <td>
                                    <span class="label label-sm label-info" ng-show="loan.statusid=='F'"> {{ loan.status }} </span>
                                    <span class="label label-sm label-danger" ng-show="loan.statusid=='L' || loan.statusid=='D'"> {{ loan.status }} </span>
                                    <span class="label label-sm label-warning" ng-show="loan.statusid=='O'"> {{ loan.status }} </span>
                                    <span class="label label-sm label-success" ng-show="loan.statusid=='C'"> {{ loan.status }} </span>
                                    

                                    </td>
                                   
                            </tr>
                            
                            
                        </tbody>
                    </table>
                    </div>
                    
                </div>
                
            </div>
        </div>
        
    </div>
    
    
    
</div>
</div>
</div>
<script type="application/javascript">
$(document).ready(function () {
$('.datepicker').datetimepicker({
format: 'DD-MMM-YYYY',
//viewMode: 'years'
});
});
</script>