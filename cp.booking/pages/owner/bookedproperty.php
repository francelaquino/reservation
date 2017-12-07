<div class="portlet light bordered " id="ownerController" ng-controller="ownerController" ng-init="getBookedProperties()">
    <div class="portlet-body  ">

        <div class="form-body">
            <h1 class="form-title">List of Booking</h1>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="bg-tr">
                    <th>Booking ID</th>
                    <th>Date Booked</th>
                    <th>Property Name</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>No of Days</th>
                    <th >Status</th>
                    <th >Confirm</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="p in properties">
                    <td>{{p.id}}</td>
                    <td>{{p.datebooked}}</td>
                    <td>{{p.title}}</td>
                    <td>{{p.checkin}}</td>
                    <td>{{p.checkout}}</td>
                    <td>{{p.noofdays}}</td>
                    <td>{{p.status}}</td>
                    <td>{{p.confirm}}</td>
                    <td class="text-center" style="width:100px;">
                    <a href="#/owner/editproperty/{{p.propertyid}}/{{p.propertygid}}" class="btn btn-sm btn-default" style="margin-bottom:2px;width:130px">Property Details</a></br>
                            <input  ng-show="p.status=='Booked' && p.confirm!='Confirm'" type="button" class="btn btn-sm btn-default" style="margin-bottom:2px;width:130px" ng-click="confirmBooking(p.id)" value="Confirm Booking">
                            <input  ng-show="p.status=='Booked' && p.confirm!='Not Confirm'" type="button" class="btn btn-sm btn-default" style="margin-bottom:2px;width:130px" ng-click="unconfirmBooking(p.id)" value="Retract Booking">
                            <input  ng-show="p.status=='Booked'" type="button" class="btn btn-sm btn-default" style="margin-bottom:2px;width:130px" ng-click="cancelBooking(p.id)" value="Cancel Booking">
                            <a href="#/owner/bookingdetails/{{p.id}}" class="btn btn-sm btn-default" style="margin-bottom:2px;width:130px">Booking Details</a></br>
                        </td>

                    
                    

                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>