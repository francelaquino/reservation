
<div class="page-content-inner" ng-controller="memberController" ng-init="getSalaryRequest()">
            <div class="portlet  ">
                 <div class="portlet-title ">
                    <div class="caption caption-md">
                        <span class="breadcrumb">My Pay <i class="fa fa-circle"></i> Request Status</span>
                    </div>
                </div>

                <div class="portlet-body  " style="display: block;float: none;min-height: 470px;">
                    
                    
                    <div class="form-body " style="display: none;">
                        
                        
                        <table class="table table-striped table-bordered table-hover"  id="requestdetails">
                            <thead>
                                <tr class="bg-primary">
                                    <th>Request No.</th>
                                     <th>Plan</th>
                                     <th>Date Requested</th>
                                     <th>Pay Period</th>
                                   
                                    <th>Pay Advance Amount</th>
                                    <th>Status</th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="loan in loans" >
                                    <td>{{ loan.id }}</td>
                                    <td>{{ loan.loantype }}</td>
                                    <td>{{ loan.dateapplied }}</td>
                                    <td>{{ loan.payperiod }}</td>
                                    
                                    
                                    <td class="text-right">{{ loan.loanamount }}</td>
                                    <td >{{ loan.status  }}</td>
                                    <td class="text-center">
                                         <button type="button" ng-click="getSalaryRequestDetails(loan.id,loan.loantypeid)"  class="btn btn-default btn-sm">See Details  </button>
                                        
                                    </td>
                                </tr>
                                
                                
                            </tbody>
                        </table>
                        
                    </div>
                    
                </div>
            </div>


<div id="requestModal" class="modal  fade" tabindex="-1">
    <div class="modal-header" style=" background-color: #5a7ea7; ">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title " style="color: white"></h4>
    </div>
    <div class="modal-body balance" style="background-color: #f6fbfc; " >
    <h5 style="color: #268744">Request Details</h5>
        <table class="table table-striped table-bordered table-hover font-14" >
            
            <tbody>
                <tr><td>Plan</td><td style="width: 150px">{{ requestdetails.plan }}</td></tr>
                <tr ><td>Date Requested</td><td>{{ requestdetails.dateapplied }}</td></tr>
                <tr><td>Requested Amount</td><td>{{ requestdetails.loanamount }}</td></tr>
                <tr ng-show="requestdetails.plan=='PayPlus'"><td>Deduction Terms</td><td>{{ requestdetails.terms }} payroll period</td></tr>
                <tr ng-show="requestdetails.plan=='PayPlus'"><td>Payment Start</td><td>{{ requestdetails.paymentstart }}</td></tr>
                <tr ng-show="requestdetails.plan=='PayPlus'"><td>Payment End</td><td>{{ requestdetails.paymentend }}</td></tr>
                <tr ng-show="requestdetails.plan=='PayPlus'"><td>Admin Fee Per Period</td><td>{{ requestdetails.feeperperiod }}</td></tr>
                <tr ng-show="requestdetails.plan=='PayPlus'"><td>Deduction Per Period</td><td>{{ requestdetails.deductionperperiod }}</td></tr>
                <tr ng-show="requestdetails.plan!='PayPlus'"><td>Admin Fee</td><td>{{ requestdetails.adminfee }}</td></tr>
        </tbody>
        </table>
        <h5  style="color: #268744" ng-show="deductiondetails.length>0">Deductions</h5>
        <table class="table table-striped table-bordered table-hover  font-14 "  ng-show="deductiondetails.length>0">
            
            <tbody>
                <tr ng-repeat="deductions in deductiondetails">
                <td>{{ deductions.deduction }}</td>
                <td  style="width: 150px">{{ deductions.amount }}</td>
                </tr>
        </tbody>
        </table>
        <h5  style="color: #268744" ng-show="addondetails.length>0">Add Ons</h5>
        <table class="table table-striped table-bordered table-hover  font-14"  ng-show="addondetails.length>0">
            
            <tbody>
                <tr ng-repeat="addon in addondetails">
                <td>{{ addon.transaction }}</td>
                <td style="width: 150px">-{{ addon.amount }}</td>
                </tr>
        </tbody>
        </table>
        <table class="table table-striped table-bordered table-hover  font-14" >
            
            <tbody>
                <tr><td>Total Cash Received</td><td style="width: 150px">{{ requestdetails.cashreceived }}</td></tr>
        </tbody>
        </table>
    <div class="row">
    <div class="form-actions col-md-12 text-right " >
    <hr/>
        <button type="button" onclick="$('#requestModal').modal('hide')" class="btn btn-default">
        Close  </button>
        
    </div>
</div>
</div>
</div>
</div>
