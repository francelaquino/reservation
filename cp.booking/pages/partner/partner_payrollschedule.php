
<div class="page-content-inner" id="partnerController" ng-controller="partnerController" >
    <div class="portlet">
        <div class="portlet-title ">
            <div class="caption caption-md">
                <span class="breadcrumb">Payroll <i class="fa fa-circle"></i> Payroll Schedule</span>
            </div>
        </div>
        <div class="alert alert-block alert-success fade in" style="display: none;">
        </div>

        <div class="portlet-body  ">
            <div class="row" >
                <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover" ng-init="getPayrollSchedule()">
                        <thead>
                            <tr class="bg-primary">
                                <th>Month</th>
                                <th>Payroll Date</th>
                                <th>Processing Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="payroll in payrolls">
                                <td>{{ payroll.monthname }}</td>
                                <td>{{ payroll.monthname }} {{ payroll.startday }} - {{ payroll.endday }}</td>
                                <td>{{ payroll.monthname }} {{ payroll.processday }}</td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>