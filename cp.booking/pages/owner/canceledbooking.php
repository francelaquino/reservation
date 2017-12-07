<div class="portlet light bordered " id="ownerController" ng-controller="ownerController" ng-init="getCanceledProperties()" >
    <div class="portlet-body  ">

        <div class="form-body">
            <h1 class="form-title">Canceled Booking</h1>
            <div class="row" style="margin-bottom: 10px;">
                        
                        <div class="col-md-2">
                            <input type="text" class="form-control datepicker" id="from"   >
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control datepicker" id="to"  >
                        </div>
                       
                        <div class="col-md-3">
                            <button type="button" class="btn btn-default" ng-click="getCanceledProperties()"  >
                            Search</button>
                            <button type="button" class="btn btn-default"  onclick="printReport();">
                            Print</button>
                        </div>
                       
                       
                        
                        </div>
                        <div id="reportContainer">
                        </br>
                        <h5 class="title">Canceled Booking Reports</h5>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="bg-tr">
                    <th>Booking ID</th>
                    <th>Date Booked</th>
                    <th>Date Canceled</th>
                    <th>Property Name</th>
                    <th>Client Name</th>
                    <th>Client Mobile No.</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>No of Days</th>
                    <th>Total Price</th>
                    <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="p in properties">
                    <td>{{p.id}}</td>
                    <td>{{p.datebooked}}</td>
                    <td>{{p.datecanceled}}</td>
                    <td>{{p.title}}</td>
                    <td>{{p.fullname}}</td>
                    <td>{{p.mobileno}}</td>
                    <td>{{p.checkin}}</td>
                    <td>{{p.checkout}}</td>
                    <td>{{p.noofdays}}</td>
                    <td>{{p.totalprice}}</td>
                    <td><a href="#/owner/bookingdetails/{{p.id}}" class="btn btn-sm btn-default" >More Info</a></td>

                    </tr>


                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

<script type="application/javascript">
$(document).ready(function () {
$('.datepicker').datetimepicker({
format: 'DD-MMM-YYYY',
});
});
</script>