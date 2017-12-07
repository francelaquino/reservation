<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="index.html">Loans</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="index.html">Loan History</a>
        <i class="fa fa-circle"></i>
    </li>
    
</ul>
<div class="page-content-inner" ng-controller="memberController">
    <div class="row">
        <div class="portlet light ">
            <div class="portlet-title ">
                <div class="caption caption-md">
                    <span class="captin-subject font-blue-madison  uppercase">Loan History</span>
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
                            <button type="button" class="btn green" ng-click="searchLoanHistory()"  >
                            Search</button>
                        </div>
                    </div>
                    
                    
                    
                    
                    <hr>
                     <div class="tableContainer">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Loan ID</th>
                                <th>Loan Plan</th>
                                <th>Date Applied</th>
                                <th>Principal Amount</th>
                                <th>Interest</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="loan in loans" >
                                <td>{{ loan.id }}</td>
                                <td>{{ loan.loantype }}</td>
                                <td>{{ loan.dateapplied }}</td>
                                <td class="text-right">{{ loan.principal }}</td>
                                <td class="text-right">{{ loan.interest }}</td>
                                <td class="text-right">{{ loan.totalamount }}</td>
                                <td>
                                    <span class="label label-sm label-info" ng-show="loan.statusid=='F'"> {{ loan.status }} </span>
                                    <span class="label label-sm label-danger" ng-show="loan.statusid=='L' || loan.statusid=='D'"> {{ loan.status }} </span>
                                    <span class="label label-sm label-warning" ng-show="loan.statusid=='O'"> {{ loan.status }} </span>
                                    <span class="label label-sm label-success" ng-show="loan.statusid=='C'"> {{ loan.status }} </span>
                                    
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm green btn-outline" ng-click="getLoanDetails(loan.id)" green btn-outline filter-cancel"><i class="fa fa-list-alt"></i> Details</button>
                                    <button ng-show="loan.statusid=='F'" type="button" ng-click="cancelLoanApplication(loan.id)" class="btn btn-sm red btn-outline filter-cancel"><i class="fa fa-times"></i> Cancel</button>
                                </td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                    
                </div>
                </div>
                
            </div>
        </div>
        
    </div>
    
    <div id="loandetails" class="modal container fade" tabindex="-1">
        <div class="modal-header" style=" background-color: #45b6af; ">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title " style="color: white">Loan Details</h4>
        </div>
        <div class="modal-body balance" style="background-color: #f6fbfc; " >
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Loan ID</th>
                        <th>Due Date</th>
                        <th>Principal Amount</th>
                        <th>Interest</th>
                        <th>Amount Due</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="loandetail in loandetails" >
                        <td>{{ loandetail.loanid}} </td>
                        <td>{{ loandetail.duedate }}</td>
                        <td class="text-right">{{ loandetail.principal }}</td>
                        <td class="text-right">{{ loandetail.interest }}</td>
                        <td class="text-right">{{ loandetail.balance }}</td>
                        <td>{{ loandetail.status}}</td>
                        
                        
                    </td>
                </tr>
                
                
            </tbody>
        </table>
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