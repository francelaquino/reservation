
<div class="page-content-inner" ng-controller="partnerController">

        <div class="portlet  ">
            <div class="portlet-title ">
                <div class="caption caption-md">
                    <span class="breadcrumb">Payroll <i class="fa fa-circle"></i> Search Member Payment</span>
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
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-3">
                            <input type="text" class="form-control datepicker" id="from"   ng-model="loan.from">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control datepicker" id="to"  ng-model="loan.to">
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-primary" ng-click="searchMemberPayment()"  >
                            Search</button>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="tableContainer" >
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr class="bg-primary">
                                <th>Member Name</th>
                                <th>Payment Date</th>
                                <th>Date Posted</th>
                                <th>Due Amount</th>
                                <th>Payment Amount</th>
                                <th>Balance</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                                <tr ng-repeat="loan in loans" >
                                <td>{{ loan.firstname}} {{loan.familyname}} </td>
                                <td>{{ loan.duedate }}</td>
                                <td>{{ loan.dateposted }}</td>
                                <td class="text-right">{{ loan.balance }}</td>
                                <td class="text-right">{{ loan.payment }}</td>
                                <td class="text-right">{{ loan.difference }}</td>
                                </tr>
                            
                            
                        </tbody>
                    </table>
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