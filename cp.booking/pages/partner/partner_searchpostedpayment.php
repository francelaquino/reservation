<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="index.html">Payroll</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="index.html">Search Posted Payment</a>
        <i class="fa fa-circle"></i>
    </li>
    
</ul>
<div class="page-content-inner" ng-controller="partnerController">
    <div class="row">
        <div class="portlet light ">
            <div class="portlet-title ">
                <div class="caption caption-md">
                    <span class="captin-subject font-blue-madison  uppercase">Posted Payment History</span>
                </div>
            </div>
            <div class="portlet-body  " style="display: block;float: none;min-height: 470px;">
                
                
                <div class="form-body " >
                    <div class="row">
                        <div class="col-md-3">
                            <label>Payroll Date From</label>
                        </div>
                        <div class="col-md-3">
                            <label>Payroll Date To</label>
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
                            <button type="button" class="btn green" ng-click="searchPostedPayment()"  >
                            Search</button>
                        </div>
                    </div>
                    
                    
                    
                    
                    <hr>
                    <div class="tableContainer">
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th>Payment Date</th>
                                <th>Date Posted</th>
                                <th>Balance Amount</th>
                                <th>Payment Amount</th>
                                <th>Difference</th>
                                <th style="width:300px">Note</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                                <tr ng-repeat="loan in loans" >
                                <td>{{ loan.duedate }}</td>
                                <td>{{ loan.dateposted }}</td>
                                <td class="text-right">{{ loan.balance }}</td>
                                <td class="text-right">{{ loan.payment }}</td>
                                <td class="text-right">{{ loan.difference }}</td>
                                <td>{{ loan.note }}</td>
                                </tr>
                            
                            
                        </tbody>
                    </table>
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