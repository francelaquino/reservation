
<div class="page-content-inner"  ng-controller="partnerController" ng-init="getInactiveMembers()">
            <div class="portlet  ">
                <div class="portlet-title ">
                    <div class="caption caption-md">
                        <span class="captin-subject font-blue-madison  uppercase">Activate Member</span>
                    </div>
                </div>
                <div class="portlet-body  " style="display: block;float: none;min-height: 470px;">
                    
                    
                    <div class="form-body " style="display: none;">
                        
                        
                        <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr class="bg-primary">
                                            <th>Member Id.</th>
                                            <th>Employee No.</th>
                                            <th>Member Name</th>
                                            <th>Department</th>
                                            <th>Last Sent</th>
                                            <th>Link Expiration</th>
                                            <th >Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="member in members">
                                                <td> {{ member.id }}</td>
                                                <td> {{ member.employeeno }}</td>
                                                <td> {{ member.firstname }}  {{ member.middlename }} {{ member.familyname }}</td>
                                                <td> {{ member.department }}</td>
                                                <td> {{ member.linksent }}</td>
                                                 <td> {{ member.linkexpiration }}</td>

                                                <td>
                                                <button ng-click="activateMember(member.id,member.gid)" type="button"  class="btn btn-sm blue btn-outline "><i class="fa fa-check"></i> Sent Activation Link </button>
                                                <a  type="button"  href="#/partner/editmember/{{member.id}}/{{member.gid}}" class="btn btn-sm  btn-primary "> Edit </a>


                                                 
                                                </td>

                                            </tr>

                                           
                                        </tbody>
                                    </table>
                        
                        
                    </div>
                    
                </div>
    </div>
</div>