<div class="portlet  ">
    
    <form id="member_form" action="" method="post">
        
        <div class="portlet-body  " >
            
            <div class="loadphoneform alert alert-danger fade in" style="display: none;" >
                <p>Please fill request field(s) marked with (*)</p>
            </div>
            <div class="form-body " >
                
                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
                            <label>Subscriber Name<span class="required">*</span></label>
                            <select class="form-control " name="subscriber" id="subscriber" ng-model="phone.subscriber">
                                <option value="" selected></option>
                                <option ng-repeat="subscriber in subscribers" value="{{subscriber.id}}">{{ subscriber.subscriber }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
                            <label>Mobile No.<span class="required">*</span></label>
                            <input type="text" class="form-control" name="mobileno" maxlength="50" ng-model="phone.mobileno" autocomplete="off" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Amount<span class="required">*</span></label>
                            <input type="number" class="form-control text-right" name="amount" ng-model="phone.amount" autocomplete="off" >
                            
                        </div>
                    </div>
                </div>
                
                
                
                
                <div class="row">
                    <div class="form-actions col-md-12 text-right " >
                    <hr/>
                        <button type="button" ng-click="addLoadPhoneInfo()"  class="btn btn-primary">
                        Submit  </button>
                        <button type="button" onclick="$('#loadphoneform').modal('hide')"  class="btn btn-default">
                        Close  </button>
                        
                    </div>
                </div>
                
            </div>
            
            
        </div>
    </form>
</div>