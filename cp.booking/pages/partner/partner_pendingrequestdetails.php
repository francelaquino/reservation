
<div class="page-content-inner" ng-controller="partnerController" ng-init="getPendingSalaryRequestDetails()">

        <div class="portlet  ">
              <div class="portlet-title ">
                    <div class="caption caption-md">
                        <span class="captin-subject font-blue-madison  uppercase">Confirm Netpay</span>
                        <span class="breadcrumb">Payroll <i class="fa fa-circle"></i> Confirm Netpay </span>
                    </div>
                </div>
                 <hr class="title" />
             <div class="alert alert-block alert-success fade in" style="display: none;">
                </div>

                <form id="form1" action="" method="post">
                        <div class="page-content-inner loansuccess" style="margin-top: 100px;display: none"  >
                     <div class="col-md-12 text-center">
                        <h4 class="success"></h4>
                    </div>
                    </div>

                    <div class="portlet-body  " >
                        
                        
                        <div class="form-body " >
                           
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Request No.</label>
                                        <input type="text" class="form-control" readonly="readonly" ng-model="loan.loanid">
                                    </div>
                                </div>
                                
                               
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date Requested</label>
                                        <input type="text" class="form-control" readonly="readonly"  ng-model="loan.dateapplied">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Pay Period</label>
                                        <input type="text" class="form-control" readonly="readonly"  ng-model="loan.payperiod">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Employee No.</label>
                                        <input type="text" class="form-control"  readonly="readonly" ng-model="loan.employeeno">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Member Name</label>
                                        <input type="text" class="form-control"  readonly="readonly" ng-model="loan.membername">
                                    </div>
                                </div>
                           
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Netpay</label>
                                        <input type="text" class="form-control text-right" readonly="readonly"  ng-model="loan.previousnetsal">
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                        </div>
                        
                    
                    
                    
                   
                    <div class="row">
                        <div class="form-actions col-md-12 text-right">
                     <hr/>
                            <a   class="btn btn-default">Print  </a>
                            <button id="btnapprove"  ng-click="AprroveSalaryRequest(loan.loanid,'A')"  type="button"  class="btn btn-primary">Approve  </button>
                            <button id="btndisapprove" type="button" ng-click="AprroveSalaryRequest(loan.loanid,'D')" class="btn btn-red red">Disapprove  </button>
                            
                        </div></div>
                        </div>
                    </div>
                    
                </div>
            </form>
            
        </div>

    <!--Terms-->
</div>