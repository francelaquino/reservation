    
<div class="portlet  ">
    
    <form id="member_form" action="" method="post">
        
        <div class="portlet-body  " >
            
            <div class="onlinegameform alert alert-danger fade in" style="display: none;" >
                <p>Please fill request field(s) marked with (*)</p>
            </div>
            <div class="form-body " >
                
                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
                            <label>Product<span class="required">*</span></label>
                            <select class="form-control " name="product" id="product" ng-model="game.product">
                                <option value="" selected></option>
                                <option ng-repeat="product in products" value="{{product.id}}">{{ product.product }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" >
                        <div class="form-group">
                            <label>Mobile No.<span class="required">*</span></label>
                            <input type="text" class="form-control" name="mobileno" maxlength="50" ng-model="game.mobileno" autocomplete="off" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Quantity<span class="required">*</span></label>
                            <input type="number" class="form-control text-right" name="quantity" ng-model="game.quantity" autocomplete="off" >
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Amount<span class="required">*</span></label>
                            <input type="number" class="form-control text-right" name="amount" ng-model="game.amount" autocomplete="off" >
                            
                        </div>
                    </div>
                </div>
                
                
                
                
                <div class="row">
                    <div class="form-actions col-md-12 text-right " >
                    <hr/>
                        <button type="button" ng-click="addOnlineGameInfo()"  class="btn btn-primary">
                        Submit  </button>
                        <button type="button" onclick="$('#onlinegameform').modal('hide')"  class="btn ">
                        Close  </button>
                        
                    </div>
                </div>
                
            </div>
            
            
        </div>
    </form>
</div>