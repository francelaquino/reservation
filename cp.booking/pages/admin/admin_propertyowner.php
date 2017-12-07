<div class="portlet light bordered "  ng-controller="ownerController" ng-init="getPropertyOwners()">
    <div class="portlet-body  ">

        <div class="form-body">

    <h1 class="form-title">Property Owners</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr class="bg-tr">
                <th>Request No.<hr>Date Requested</th>
                <th>Fist Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Nationality</th>
                <th>Gender</th>
                <th>Birthdate</th>
                <th>Email Address</th>
                <th>Mobile No.<hr>Telephone No.</th>
                <th>Property Count</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="o in owners">
                <td> {{ o.id }}<hr>{{ o.datecreated }}</td>
                <td> {{ o.firstname }}</td>
                <td> {{ o.middlename }}</td>
                <td> {{ o.lastname }}</td>
                <td> {{ o.nationality }}</td>
                <td> {{ o.gender }}</td>
                <td> {{ o.birthdate }}</td>
                <td> {{ o.emailaddress }}</td>
                <td> {{ o.mobileno }}<hr>{{ o.telephoneno }}</td>
                <td> {{ o.propertycount }}</td>

            </tr>


        </tbody>
    </table>
    <div>
    <div>
    <div>