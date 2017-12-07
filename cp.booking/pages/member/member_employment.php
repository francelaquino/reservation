
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="index.html">Account</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="index.html">Employment Information</a>
        <i class="fa fa-circle"></i>
    </li>
    
</ul>
<div class="page-content-inner">
    <div class="row">
        <div ui-view>
            <div class="portlet light ">
                <div class="portlet-title ">
                    <div class="caption caption-md">
                        <span class="captin-subject font-blue-madison  uppercase">Employment Details</span>
                    </div>
                </div>
                <div class="portlet-body  " style="display: block;float: none;min-height: 470px;">
                  
                    
                    <div class="form-body " >

                        <div class="note note-info">
                    <p>Lorem ipsum dolor sit amet, veniam numquam has te. No suas nonumes recusabo mea, est ut graeci definitiones. His ne melius vituperata scriptorem, cum paulo copiosae conclusionemque at. Facer inermis ius in, ad brute nominati referrentur vis. Dicat erant sit ex. Phaedrum imperdiet scribentur vix no, ad latine similique forensibus vel.</p>
                                        
                                        
                </div>
                    
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>First Name<span class="required">*</span></label>
                                    <input type="text" class="form-control" required maxlength="100" name="firstname" ng-model="members.firstname">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Middle Name<span class="required">*</span></label>
                                    <input type="text" class="form-control" maxlength="100" name="middlename" ng-model="members.middlename">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Family Name<span class="required">*</span></label>
                                    <input type="text" class="form-control" maxlength="100" name="familyname" ng-model="members.familyname">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Employee No.<span class="required">*</span></label>
                                    <input type="text" class="form-control"  maxlength="100" name="employeeno" ng-model="members.employeeno">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Employee Status<span class="required">*</span></label>
                                    <select class="form-control " name="employeestatus" id="employeestatus"  ng-model="members.employeestatus">
                                        <option value="" selected></option>
                                        <option ng-repeat="es in empstat" value="{{ es.id }}">{{ es.employeestatus }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Hiring Date<span class="required">*</span></label>
                                    <input type="text" class="form-control datepicker" name="hiringdate" ng-model="members.hiringdate" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Position<span class="required">*</span></label>
                                    <input type="text" class="form-control" maxlength="100" name="position" ng-model="members.position">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Department<span class="required">*</span></label>
                                <select class="form-control" name="department" id="department" ng-model="members.department">
                                    <option value="" selected></option>
                                    <option ng-repeat="dep in department" value="{{ dep.id }}">{{ dep.department }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Monthly Salary<span class="required">*</span></label>
                                <input type="number" class="form-control" maxlength="100" name="monthlysalary" ng-model="members.monthlysalary">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Total Hours Per Week<span class="required">*</span></label>
                                <input type="number" class="form-control" maxlength="100" name="hoursperweek" ng-model="members.hoursperweek">
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="form-actions col-md-12 text-right">
                                
                                <button type="button" class="btn blue" ng-click="saveMemberInfo()"  >
                                Submit  </button>
                                
                            </div></div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>