
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="index.html">Loans</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="index.html">Loan Request Status</a>
        <i class="fa fa-circle"></i>
    </li>
    
</ul>
<div class="page-content-inner" ng-controller="memberController" ng-init="getMemberLoans()">
    <div class="row">
        <div ui-view>
            <div class="portlet light ">
                <div class="portlet-title ">
                    <div class="caption caption-md">
                        <span class="captin-subject font-blue-madison  uppercase">Loan Request Status</span>
                    </div>
                </div>
                <div class="portlet-body  " style="display: block;float: none;min-height: 470px;">
                    
                    
                    <div class="form-body " style="display: none;">
                        
                        
                        <table class="table table-striped table-bordered table-hover" >
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
</div>
