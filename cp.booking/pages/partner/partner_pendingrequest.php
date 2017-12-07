
<div class="page-content-inner" ng-controller="partnerController" ng-init="getPendingSalaryRequest()">

        <div class="portlet  ">
              <div class="portlet-title ">
                    <div class="caption caption-md">
                        <span class="captin-subject font-blue-madison  uppercase">Confirm Netpay</span>
                        <span class="breadcrumb">Payroll <i class="fa fa-circle"></i> Confirm Netpay</span>
                    </div>
                </div>
            <hr class="title" />
             <div class="alert alert-block alert-success fade in" style="display: none;">
                </div>
            <div class="portlet-body  " style="display: block;float: none;min-height: 470px;">
                
                <div class="tableContainer" style="display: none" >
                    <table class="table table-striped table-bordered " id="tblrequest">
                        <thead>
                            <tr class="bg-primary">
                                <th>Request No.</th>
                                <th>Date Requested</th>
                                <th>Payroll Period</th>
                                <th>Member Name</th>
                                <th>Previous Net Pay</th>
                                <th style="width: 100px"></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="loan in loans" >
                                <td>{{ loan.loanid }}</td>
                                <td>{{ loan.dateapplied }}</td>
                                <td>{{ loan.payperiod }}</td>
                                <td>{{ loan.firstname}} {{loan.familyname}} </td>
                                <td class="text-right">{{ loan.previousnetsal }}</td>
                                <td class="text-center">
                                <a  href="#/partner/pendingrequestdetails?id={{loan.loanid}}"  class="btn btn-default btn-sm">Confirm  </a>
                                </td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                </div>
                
            </div>
            
        </div>

    <!--Terms-->
</div>