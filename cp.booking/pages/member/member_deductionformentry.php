
<div class="portlet">
    
        
        <div class="portlet-body" >
            
            <div class="loadphoneform alert alert-danger fade in" style="display: none;" >
                <p>Please fill request field(s) marked with (*)</p>
            </div>
            <div class="form-body " >
                
                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
                            <label>Deduction<span class="required">*</span></label>
                            <select class="form-control " name="deduction" id="deduction" ng-model="deduct.deduction">
                                <option value="" selected></option>
                                <option ng-repeat="d in ds" value="{{d.id}}">{{ d.deduction }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Amount<span class="required">*</span></label>
                            <input type="number" class="form-control text-right" name="amount" ng-model="deduct.amount" autocomplete="off" >
                            
                        </div>
                    </div>
                </div>
                
                
                
                
                <div class="row">
                    <div class="form-actions col-md-12 text-right " >
                    <hr/>
                        <button type="button" ng-click="addDeductionInfo()"  class="btn btn-primary">
                        Submit  </button>
                        <button type="button" onclick="$('#deductionformentry').modal('hide')"  class="btn btn-default">
                        Close  </button>
                        
                    </div>
                </div>
                
            </div>
            
            
        </div>
</div>