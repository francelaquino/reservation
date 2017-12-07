<div class="page-content-inner" ng-controller="memberController" ng-init="getAccountDetails()">
    <div class="portlet  ">
        <div class="portlet-title ">
            <div class="caption caption-md">

                <span class="breadcrumb">Transaction <i class="fa fa-circle"></i> Upcomming Payments </span>
            </div>
        </div>
        <span class="caption-subject  font-blue-madison  uppercase">Upcomming Payments</span>
        <hr class="title">

        <div class="portlet-body  " style="display: block;float: none;min-height: 470px;">
            <div class="form-body ">

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="bg-primary">
                            <th>Payroll Date</th>
                            <th class="text-right" style="width: 200px">Amount Due</th>
                            <th class="isHide" style="width: 100px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ accounts.duedate }}</td>
                            <td class="text-right">{{ accounts.amountdue }}</td>
                            <td class="isHide" >
                                <button type="button" ng-click="getDuePayments(accounts.duedate)" class="btn  btn-sm btn-default">Details  </button>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>


        <div id="requestModal" class="modal  fade" tabindex="-1">
            <div class="modal-header" style=" background-color: #5a7ea7; ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title " style="color: white">Upcomming Payment Details</h4>
            </div>
            <div class="modal-body balance" style="background-color: #f6fbfc; ">
                <table class="table table-striped table-bordered table-hover" id="requestdetails">

                    <tbody>


                        <tr ng-repeat="his in requestdetails">
                            <td>{{ his.type }}</td>
                            <td class="text-right">{{ his.balance }}</td>
                        </tr>

                    </tbody>


                    </tbody>
                </table>
                <h5 class="text-right">Total : {{ requestdetails[0].totalbalance }}</h5>
                <div class="row">
                    <div class="form-actions col-md-12 text-right ">
                        <hr/>
                        <button type="button" onclick="$('#requestModal').modal('hide')" class="btn btn-default">
        Close  </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>