<style>
.payment{
    width: 120px;
    margin:0px !important;
    text-align: :right;
}
</style>

<div class="page-content-inner" id="partnerController" ng-controller="partnerController" ng-init="initMemberPayment();" >
            <div class="portlet  ">
                <div class="portlet-title ">
                    <div class="caption caption-md">
                        <span class="breadcrumb">Payroll <i class="fa fa-circle"></i> Member Upcomming Payment </span>
                    </div>

                </div>
                
                <div class="alert alert-block alert-success fade in" style="display: none;">
                </div>
                
                
                
                <div class="portlet-body  " style="display: none" >
                <h5 style="margin-bottom: 40px; color:white">* List of member transactions  subject for processing
                <button class="btn btn-primary" style="float: right;display: none" ng-click="postMemberPayment()" id="btnsubmit">Submit</button>
                </h5>
                       <div class="row">
                        <div class="col-md-3">
                            <label>Payroll Period </label>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        <select class="form-control " id="endday" ng-model="loan.endday">
                                                   <option value="" selected></option>
                                                    <option ng-repeat="pp in payperiods" value="{{ pp.endday }}">{{ pp.period }}</option>
                                                </select>
                        </div>
                       
                        <div class="col-md-9">
                            <button type="button" class="btn btn-default" ng-click="getMemberDuePayment()"  >
                            Search</button>
                            <span id="status" style="float: right;padding: 5px;min-width: 100px;" class="label label-sm label-danger"></span>
                        </div>
                    </div>
                    <hr/>
                        <div class="row" >
                            <div class="col-md-12">
                                <h4 class="isOpen" style="display: none">Payroll Processing is not yet open</h4>
                                <div class="tableContainer" style="display: none">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>Payroll Date</th>
                                            <th >Employee No.</th>
                                            <th>Name</th>
                                            
                                            <th  class="text-right">Amount Due</th>
                                            <th  class="text-right">Payment</th>
                                            <th  class="text-right">Difference</th>
                                            <th style="width: 80px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="loan in loans" >
                                             <td>{{ loan.duedate }}  
</td>
                                            <td>{{ loan.employeeno }}</td>
                                            <td>{{ loan.firstname }} {{ loan.middlename }} {{ loan.familyname }}</td>
                                           
                                            <td class="text-right">{{ loan.balance }}</td>
                                            <td  class="text-right">
                                            <input ng-show="loan.status==''"  id="{{loan.memberid}}" ng-change="memberPaymentChange(loan.memberid)" type="number" class="form-control payment text-right" ng-model="loan.payment" style="height:30px;width:100px;float:right;" autocomplete="off">
                                            <span ng-show="loan.status!=''">{{ loan.payment }}</span>

                                            </td>
                                            <td class="text-right">{{ loan.difference | number : 2 }}</td>
                                            <td class="text-center">
                                                
                                                 <button ng-show="loan.status=='' "  type="button" ng-click="saveMemberPayment(loan.memberid,loan.partnername,loan.duedate,loan.balance,loan.payment,$index)" class="btn btn-sm btn-default  "> <i class="fa fa-check-circle" ng-show="loan.save>0"></i> Save</button>
                                                  <span  ng-show="loan.status!=''" class="label label-sm label-danger"> {{ loan.status }} </span>
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
