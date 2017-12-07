<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="index.html">Payment</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="index.html">Bills Payment</a>
        <i class="fa fa-circle"></i>
    </li>
    
</ul>
<div class="page-content-inner" id="memberController" ng-controller="memberController" ng-init="initBillPaymentForm();">
    <div class="row">
        <div class="portlet light ">
            <div class="portlet-title ">
                <div class="caption caption-md">
                    <span class="captin-subject font-blue-madison  uppercase">Bill Payment Request </span>
                </div>
            </div>
            <form id="member_form" action="" method="post">
            
                <div class="portlet-body  " style="display: block;float: none;min-height: 470px;">
                   <div class="note note-info">
                                <p> Display a note</p>
                            </div>
                            <div class=" alert alert-block alert-success fade in" style="display: none;">

                         </div>
                    <div class="form-body " >
                        
                         <div class="row">
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label>Biller Name<span class="required">*</span></label>
                                    <select class="form-control " name="biller" ng-model="bill.biller">
                                            <option value="" selected></option>     
                                        <option ng-repeat="biller in billers" value="{{biller.id}}">{{ biller.billername }}</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label>Bill Number/Receipt No./Reference No.<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="billno" maxlength="200" ng-model="bill.billno">
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bill Amount<span class="required">*</span></label>
                                    <input type="number" class="form-control text-right" name="amount" ng-model="bill.amount" >
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label>Note</label>
                                    <input type="text" class="form-control" maxlength="200" ng-model="bill.note">
                                </div>
                            </div>
                        </div>
                       
                        
                       
                        <div class="row">
                            <div class="form-actions col-md-6 text-right " >
                                <hr/>
                                <button type="submit" id="btnsubmit" class="btn green">
                                Submit  </button>
                                
                                
                            </div>
                        </div>
                        
                    </div>
                    
                    
                </div>
            </form>
        </div>
        
        
        
    </div>
</div>

<script type="application/javascript">
    $(document).ready(function () {


        $('#member_form').bootstrapValidator({
            submitHandler: function (validator, form, submitButton) {
                angular.element(document.getElementById('memberController')).scope().saveBillPaymentApplication();
                $("#btnsubmit").attr("disabled", false);
            },
            framework: 'bootstrap',
            fields: {
                biller: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                billno: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                
                 amount: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },


                
            }

        });


    });



</script>