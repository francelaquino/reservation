
<div class="page-content-inner"  ng-controller="partnerController" ng-init="getMembers()">
            <div class="portlet  ">
                <div class="portlet-title ">
                    <div class="caption caption-md">
                        <span class="breadcrumb">Members <i class="fa fa-circle"></i> List of Members</span>
                    </div>
                </div>
                <div class="portlet-body  " style="display: block;float: none;min-height: 470px;">
                    
                    
                    <div class="form-body " style="display: none;" >
                        
                        
                        <table class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr class="bg-primary">
                                            <th>Member Id.</th>
                                            <th>Employee No.</th>
                                            <th>Employee Name</th>
                                            <th>Position</th>
                                            <th style="width: 100px">Status</th>
                                            <th style="width: 100px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="member in members">
                                                <td> {{ member.username }}</td>
                                                <td> {{ member.employeeno }}</td>
                                                <td> {{ member.firstname }} {{ member.familyname }}</td>
                                                <td> {{ member.position }}</td>
                                                <td> {{ member.active }}</td>
                                                <td>
                                                <a style="width: 100px" type="button"  href="#/partner/editmember/{{member.id}}/{{member.gid}}" class="btn btn-sm  btn-default "> Edit </a>


                                                 
                                                </td>

                                            </tr>

                                           
                                        </tbody>
                                    </table>
                        
                    </div>
                    
                </div>
            </div>
            
</div>