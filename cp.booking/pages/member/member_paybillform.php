<div class="portlet  ">
    
    <form id="member_form" action="" method="post">
        
        <div class="portlet-body  " >
            
            <div class="paybillform alert alert-danger fade in" style="display: none;" >
                <p>Please fill request field(s) marked with (*)</p>
            </div>
            <div class="form-body " >
                
                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
                            <label>Biller Name<span class="required">*</span></label>
                            <select class="form-control " name="biller" id="biller" ng-model="bill.biller">
                                <option value="" selected></option>
                                <option ng-repeat="biller in billers" value="{{biller.id}}">{{ biller.billername }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
                            <label>Bill Number/Receipt No./Reference No.<span class="required">*</span></label>
                            <input type="text" class="form-control" name="billno" maxlength="200" ng-model="bill.billno" autocomplete="off" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Amount<span class="required">*</span></label>
                            <input type="number" class="form-control text-right" name="amount" ng-model="bill.amount" autocomplete="off" >
                            
                        </div>
                    </div>
                </div>
                
                
                
                
                <div class="row">
                    <div class="form-actions col-md-12 text-right " >
                    <hr/>
                        <button type="button" ng-click="addPayBillInfo()"  class="btn btn-primary">
                        Submit  </button>
                        <button type="button" onclick="$('#paybillform').modal('hide')"  class="btn btn-default">
                        Close  </button>
                        
                    </div>
                </div>
                
            </div>
            
            
        </div>
    </form>
</div>