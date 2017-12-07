<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="index.html">Account</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="index.html">Account Details</a>
        <i class="fa fa-circle"></i>
    </li>
    
    
</ul>
<div class="page-content-inner" ng-controller="memberController" ng-init="getAccountDetails()">
    <div class="row">
        <div ui-view>
            <div class="portlet light ">
                <div class="portlet-title ">
                    <div class="caption caption-md">
                        <span class="captin-subject font-blue-madison  uppercase">Account Details</span>
                    </div>
                </div>
                <div class="portlet-body  " style="display: block;float: none;min-height: 470px;">
                    <div class="form-body " >
                        
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Member ID</th>
                                    <th>Account Type</th>
                                    <th>Total Balance</th>
                                    <th>Amount Due</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr >
                                    <td>{{ accounts.username }}</td>
                                    <td>{{ accounts.type }}</td>
                                    <td class="text-right"><a href="javascript:void(0)" ng-click="getAccountBalanceDetails()"> {{ accounts.totalbalance }}</a></td>
                                    <td class="text-right"><a href="javascript:void(0)" ng-click="getDuePayments()"> {{ accounts.amountdue }}</a></td>
                                </td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                    
                    
                </div>
                
            </div>
        </div>
        
    </div>
    <div id="dues" class="modal container fade" tabindex="-1">
        <div class="modal-header" style=" background-color: #45b6af; ">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title " style="color: white">Payment Due Details</h4>
        </div>
        <div class="modal-body dues" style="background-color: #f6fbfc; ">
            <div class="note note-info">
                <p> Display a note </p>
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Loan ID</th>
                        <th>Loan Type</th>
                        <th>Payroll Date</th>
                        <th>Principal Amount</th>
                        <th>Interest</th>
                        <th>Amount Due</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="due in dues" >
                        <td>{{ due.loanid }}</td>
                        <td>{{ due.loantype }}  </td>
                        <td>{{ due.duedate }}</td>
                        <td class="text-right">{{ due.principal }}</td>
                        <td class="text-right">{{ due.interest }}</td>
                        <td class="text-right">{{ due.balance }}</td>
                        
                        
                    </td>
                </tr>
                
                
            </tbody>
        </table>
        
    </div>
<div id="balance" class="modal container fade" tabindex="-1">
    <div class="modal-header" style=" background-color: #45b6af; ">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title " style="color: white">Account Balance Details</h4>
    </div>
    <div class="modal-body balance" style="background-color: #f6fbfc; " >
        <div class="note note-info">
            <p> Display a note </p>
        </div>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Loan ID</th>
                    <th>Loan Type</th>
                    <th>Payroll Date</th>
                    <th>Principal Amount</th>
                    <th>Interest</th>
                    <th>Amount Due</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="balance in balances" >
                    <td>{{ balance.loanid}} </td>
                    <td>{{ balance.loantype }}</td>
                    <td>{{ balance.duedate }}</td>
                    <td class="text-right">{{ balance.principal }}</td>
                    <td class="text-right">{{ balance.interest }}</td>
                    <td class="text-right">{{ balance.balance }}</td>
                    
                    
                </td>
            </tr>
            
            
        </tbody>
    </table>
</div>
</div>