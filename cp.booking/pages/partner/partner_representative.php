
<div class="page-content-inner"  ng-controller="partnerController" ng-init="getPartnersRep()">
            <div class="portlet  ">
                <div class="portlet-title ">
                    <div class="caption caption-md">
                        <span class="breadcrumb">My Profile <i class="fa fa-circle"></i>Partner  Representatives  </span>
                    </div>
                </div>
                <div class="portlet-body  " style="display: block;float: none;min-height: 470px;">
                    
                    <div class="form-body " >
                        
                      
                        <table class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr class="bg-primary">
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Email Address</th>
                                            <th>Mobile No</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="partner in partners">
                                                <td> {{ partner.contactname }}</td>
                                                <td> {{ partner.contacttitle }}</td>
                                                <td> {{ partner.emailaddress }}</td>
                                                <td> {{ partner.mobileno }}</td>
                                                <td> {{ partner.username }}</td>
                                                <td> {{ partner.active }}</td>
                                                <td class="text-center">
                                                <a type="button" class="btn btn-sm btn-default " href="#/partner/representativedetails/{{partner.id}}/{{partner.gid}}" > Details</a>
                                              
                                                </td>

                                            </tr>

                                           
                                        </tbody>
                                    </table>
                        
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
