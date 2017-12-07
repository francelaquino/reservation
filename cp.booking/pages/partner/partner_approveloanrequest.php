<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="index.html">Loans</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="index.html">Pending Loan</a>
        <i class="fa fa-circle"></i>
    </li>
    
</ul>
<div class="page-content-inner" ng-controller="partnerController" ng-init="getPendingLoans()">
    <div class="row">
        <div class="portlet light ">
            <div class="portlet-title ">
                <div class="caption caption-md">
                    <span class="captin-subject font-blue-madison  uppercase">Pending Loan for Approval</span>
                </div>
            </div>
             <div class="alert alert-block alert-success fade in" style="display: none;">
                </div>
            <div class="portlet-body  " style="display: block;float: none;min-height: 470px;">
                
                
                    <table class="table table-striped table-bordered table-hover" id="tblrequest" >
                        <thead>
                            <tr>
                                <th>Loan ID</th>
                                <th>Date Applied</th>
                                <th>Member Name</th>
                                <th>Loan Amount</th>
                                <th style="width: 80px"></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="loan in loans" >
                                <td>{{ loan.loanid }}</td>
                                <td>{{ loan.dateapplied }}</td>
                                <td>{{ loan.firstname}} {{loan.familyname}} </td>
                                <td class="text-right">{{ loan.principal }}</td>
                                <td><button  type="button" ng-click="prepareApproval(loan,'A')" class="btn btn-sm blue btn-outline "><i class="fa fa fa-list-alt"></i> Details</button>
                                </td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                
                
            </div>
            
        </div>
    </div>

    <!--Terms-->
<div id="approvalform" class="modal  fade" tabindex="-1" style="width: 500px !important" >
<div class="modal-header" style=" background-color: #00b050; ">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title " style="color: white">Loan Details</h4>
</div>
<div class="modal-body "  >
<form id="member_form" action="" method="post">
        
        <div class="portlet-body  " >
            
            <div class="form-body " >
                
                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
                            <label>Loan ID</label>
                            <input type="text"  class="form-control " ng-model="loan.loanid" disabled="disabled" >
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
                            <label>Date Applied</label>
                            <input type="text" class="form-control " ng-model="loan.dateapplied" disabled="disabled" >
                            
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
                            <label>Member Name</label>
                            <input type="text" class="form-control " ng-model="loan.membername" disabled="disabled" >
                            
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
                            <label>Loan Amount</label>
                            <input type="text"  class="form-control text-right" ng-model="loan.principal" disabled="disabled" >
                            
                        </div>
                    </div>
                </div>
               
                
                
                
                
                <div class="row">
                    <div class="form-actions col-md-12 text-right " >
                        <hr/>
                        <button type="button" id="btnapprove" ng-click="ApproveLoan('A')"  class="btn btn-primary">
                        Approve  </button>
                        <button type="button" id="btndisapprove" ng-click="ApproveLoan('D')"  class="btn btn-danger">
                        Disapprove  </button>
                        <button type="button" onclick="$('#approvalform').modal('hide')"  class="btn btn-default">
                        Close  </button>
                        
                    </div>
                </div>
                
            </div>
            
            
        </div>
    </form>
</div>
</div>
    
</div>