<div class="portlet light bordered " id="ownerController" ng-controller="ownerController" ng-init="getBookingDetails()">
    <div class="portlet-body  ">

        <div class="form-body">
            <h1 class="form-title">Booking Details</h1>
            <div id="reportContainer">
                        </br>
            <table  class="table  table-bordered" cellspacing="0" width="100%">
							
							<tbody>
                            <tr><th style="width:200px;">Booking ID</th><td>{{booking.id}}</td></tr>
                            <tr><th>Date Booked</th><td>{{booking.datebooked}}</td></tr>
                            <tr><th>Property Name</th><td>{{booking.title}}</td></tr>
                            <tr><th>Owner Name</th><td>{{booking.firstname}} {{booking.lastname}}</td></tr>
                            <tr><th>Client Name</th><td>{{booking.fullname}}</td></tr>
                            <tr><th>Client Mobile No.</th><td>{{booking.mobileno}}</td></tr>
                            <tr><th>Client Email Address</th><td>{{booking.emailaddress}}</td></tr>
                            <tr><th>Guest</th><td>{{booking.guest}}</td></tr>
                            <tr><th>Check-In Date</th><td>{{booking.checkin}}</td></tr>
                            <tr><th>Check-Out Date</th><td>{{booking.checkout}}</td></tr>
                            <tr><th>No of Day(s)</th><td>{{booking.noofdays}} day(s)</td></tr>
                            <tr><th>Rate Per Day</th><td>{{booking.currency}} {{booking.rate}}</td></tr>
                            <tr><th>Discount</th><td>{{booking.currency}} {{booking.discount}}</td></tr>
                            <tr><th>Total</th><td>{{booking.currency}} {{booking.totalprice}}</td></tr>
                            <tr><th>Reservation Fee</th><td>{{booking.currency}} {{booking.reservationfeetotal}}</td></tr>
                            <tr><th>Remaining Due Amount</th><td>{{booking.currency}} {{booking.remainingdueamount}}</td></tr>
                            <tr><th>Guarantee/Deposit Fee</th><td>{{booking.currency}} {{booking.depositfee}}</td></tr>
                            <tr><th>Total amount to settle upon checkin</th><td>{{booking.currency}} {{booking.totalamountcheckin}}</td></tr>
                            <tr><th>Status</th><td>{{booking.status}}</td></tr>
                            <tr><th>Confirm</th><td>{{booking.confirm}}</td></tr>
							</tbody>
						</table>
                        </div>
                        <div class="row ">
                                <div class=" col-md-3">
                                    <a href="#/owner/bookedproperty" class="btn btn-green ">Back</a>
                                    <button type="button" class="btn btn-default"  onclick="printReport();">
                            Print</button>
                                </div>
                            </div>
                           
        </div>
    </div>
</div>