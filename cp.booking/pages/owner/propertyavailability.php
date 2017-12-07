
<script src="assets/zabuto_calendar/zabuto_calendar.js"></script>
<link rel="stylesheet" type="text/css" href="assets/zabuto_calendar/zabuto_calendar.css"/>




<div class="portlet light bordered " id="ownerController" ng-controller="ownerController" ng-init="getPropertyAvailability()">

    <div class="portlet-body  ">

        <form role="form" id="form">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="form-title">Manage Availability</h4>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="note note-info" style="display:none">
                            </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12" style="min-height:400px;">
                    <div id="calendar"></div>
                    </div>
                </div>



        

        <div class="row">
            <div class="col-md-12">
                <div class="form-actions">
                    <button type="button" ng-click="savePropertyCalendar()" class="btn btn-green ">Save Availability</button>
                </div>
            </div>
        </div>
        </div>

        </form>
    </div>
</div>

</div>



