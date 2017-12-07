
<div class="page-content-inner" ng-controller="memberController" ng-init="getPayrollPeriod()">
        <div class="portlet  ">
            <div class="portlet-title ">
                <div class="caption caption-md">
                    <span class="breadcrumb">Transaction <i class="fa fa-circle"></i> Payments</span>
                </div>
            </div>

              <span class="caption-subject  font-blue-madison  uppercase">Payments</span>
        <hr class="title">
            <div class="portlet-body  " style="display: block;float: none;min-height: 470px;">
                
                
                <div class="form-body " >
                <div class="row">
                        <div class="col-md-3">
                            <label>Payroll Period </label>
                        </div>
                        
                    </div>
                 <div class="row " style="margin-bottom: 10px;">
                        <div class="col-md-3">
                        <select class="form-control " id="endday" ng-model="loan.endday">
                                                   <option value="" selected></option>
                                                    <option ng-repeat="pp in payperiods" value="{{ pp.endday }}">{{ pp.period }}</option>
                                                </select>
                        </div>
                       
                        <div class="col-md-3">
                            <button type="button" class="btn btn-default" ng-click="getPaymentHistory()"  >
                            Search</button>
                        </div>
                        </div>
                    
                    
                    <div class="tableContainer">
                    <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr class="bg-primary">
                                    <th>Payroll Date</th>
                                    <th>Amount Due</th>
                                    <th>Payment</th>
                                    <th>Balance</th>
                                    <th>Interest</th>
                                    <th>Balance</th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="payment in payments" >
                                    <td>{{ payment.duedate }}</td>
                                    <td class="text-right">{{ payment.dueamount }}</td>
                                    <td class="text-right">{{ payment.payment }}</td>
                                    <td class="text-right">{{ payment.balance }}</td>
                                    <td class="text-right">{{ payment.interest }}</td>
                                    <td class="text-right">{{ payment.carryoverbalance }}</td>
                                     <td class="text-center">
                                         <button type="button" ng-click="getSalaryRequestPayment(payment)"  class="btn btn-default btn-sm">See Details  </button>
                                        
                                    </td>
                                   
                            </tr>
                            
                            
                        </tbody>
                    </table>
                    </div>
                    
                </div>
                
            </div>
        </div>
        
        <div id="prevtranform" class="modal   fade" tabindex="-1" style="width: 700px">
    <div class="modal-header" style=" background-color: #00b050; ">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title " style="color: white">Previous Transaction</h4>
    </div>
    <div class="modal-body "  >
        
        
        <table class="table table-striped table-bordered " id="prevtranformTable">
            
            <tbody>
                <tr ng-repeat="his in history">
                    <td ng-show="his.seq!=0">{{ his.transaction }}</td>
                    <td ng-show="his.seq==0" class="bg-primary">{{ his.transaction }}</td>
                    <td  ng-show="his.seq==0" class=" bg-primary text-right">{{ his.amount }}</td>
                    <td  ng-show="his.seq!=0 && his.seq!=1 && his.seq!=9" class="text-right">- {{ his.amount }}</td>
                    <td  ng-hide=" his.seq!=1 && his.seq!=9" class="text-right"> {{ his.amount }}</td>
                </tr>
                
            </tbody>
        </table>
        <h5 class="text-right">Total Amount Due: <span class="numberContainer">{{ amountDue }}</span></h5>
        <h5 class="text-right">Payment Amount : <span class="numberContainer">{{ payment }}</span></h5>
        <h5 class="text-right">Balance : <span class="numberContainer">{{ balance }}</span></h5>
        <h5 class="text-right">Interest : <span class="numberContainer">{{ interest | number:2 }}</span></h5>
        <h5 class="text-right">Carry Over Balance : <span class="numberContainer">{{ carryOverBalance }}</span></h5>
        <div class="row">

                    <div class="form-actions col-md-12 text-right " >
                    <hr/>
                        <button type="button" onclick="$('#prevtranform').modal('hide')"  class="btn btn-default">
                        Close  </button>
                        
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