<div class="portlet light bordered " id="ownerController" ng-controller="ownerController" ng-init="getProperties()">
    <div class="portlet-body  ">

        <div class="form-body">
            <h1 class="form-title">Properties</h1>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="bg-tr">
                        <th >ID</th>
                        <th>Date Created</th>
                        <th>Title</th>
                        <th>Rental Type</th>
                        <th>Max Occupancy</th>
                        <th>Bathroom</th>
                        <th>Bedrooms</th>
                        <th>Status</th>
                        <th>Posted</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="p in properties">
                    <td> {{ p.id }}</td>
                    <td> {{ p.datecreated }}</td>
                    <td> {{ p.title }}</td>
                        <td> {{ p.rentaltype }}</td>
                        <td> {{ p.occupancy }}</td>
                        <td> {{ p.bathroom }}</td>
                        <td> {{ p.bedrooms }}</td>
                        
                        <td> {{ p.status }}</td>
                        <td> {{ p.posted }}</td>
                        <td class="text-center" style="width:100px;">
                            <a href="#/owner/editproperty/{{p.id}}/{{p.gid}}" class="btn btn-sm btn-default" style="margin-bottom:2px;width:130px">More Info</a>
                            <span ng-show="p.status=='Approved'">
                            <input ng-show="p.posted=='Not Posted'" type="button" class="btn btn-sm btn-default" style="margin-bottom:2px;width:130px" ng-click="postProperty(p.id,p.statusid)" value="Post">
                            <input ng-show="p.posted=='Posted'"  type="button" class="btn btn-sm btn-default" style="margin-bottom:2px;width:130px" ng-click="unpostProperty(p.id)" value="Unpost">
                            <input   type="button" class="btn btn-sm btn-default" style="margin-bottom:2px;width:130px" ng-click="deleteProperty(p.id)" value="Delete">
                            </span>
                            
                            <a href="#/owner/propertyavailability/{{p.id}}/{{p.gid}}" class="btn btn-sm btn-default" style="margin-bottom:2px;width:130px">Manage Availability</a>
                        </td>
                </td>

                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>