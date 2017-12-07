
<div class="page-content-inner" id="adminController" ng-controller="adminController" ng-init="initPartnerForm();getPartnerRepInfo()">
            <div class="portlet  ">
                <div class="portlet-title ">
                    <div class="caption caption-md">
                        <span class="breadcrumb">My Profile <i class="fa fa-circle"></i> Representatives <i class="fa fa-circle"></i> Representative Details </span>
                    </div>
                </div>

                
                <div class="alert alert-block alert-success fade in" style="display: none;">
                </div>
                
                
                <form id="member_form" action="" method="post">
                   
                    
                    <div class="portlet-body  " >
                        
                        
                        <div class="form-body " >
                            <div class="form-body">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Partner Name</label>
                                        <input type="text" class="form-control" maxlength="200" name="partnername" ng-model="partner.partnername" readonly="readonly">
                                         <input type="text" class="hidden"  ng-model="partner.id" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Business Type</label>
                                    <input type="text" class="form-control" maxlength="200" name="businesstype" ng-model="partner.businesstype" readonly="readonly">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contact Name </label>
                                        <input type="text" class="form-control" maxlength="200" name="contactname" ng-model="partner.contactname" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Contact Title </label>
                                    <input type="text" class="form-control" maxlength="200" name="contacttitle" ng-model="partner.contacttitle" readonly="readonly">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Email Address </label>
                                    <input type="text" class="form-control" name="emailaddress" maxlength="50" ng-model="partner.emailaddress" readonly="readonly">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Mobile No. </label>
                                    <input type="text" class="form-control" name="mobileno" maxlength="50" ng-model="partner.mobileno" readonly="readonly">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Telephone No.</label>
                                    <input type="text" class="form-control" name="telephoneno" maxlength="50" ng-model="partner.telephoneno" readonly="readonly" >
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fax No.</label>
                                        <input type="text" class="form-control" name="faxno" maxlength="50" ng-model="partner.faxno" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            
                         
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Username </label>
                                    <input type="text" class="form-control" name="username" maxlength="50" ng-model="partner.username" readonly="readonly">
                                </div>
                                 <div class="form-group col-md-6">
                                    <label>Active </label>
                                    <select  class="form-control" name="username"  ng-model="partner.active" readonly="readonly">
                                        <option value="A">Active</option>
                                        <option value="I">Inactive</option>

                                    </select>
                                </div>
                               
                            </div>
                            
                            
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
