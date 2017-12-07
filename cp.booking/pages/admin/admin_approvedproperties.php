
<div class="portlet light bordered "  ng-controller="adminController" ng-init="getApprovedProperties()">
    <div class="portlet-body  ">

        <div class="form-body">

    <h1 class="form-title">Approved Properties</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr class="bg-tr">
            <th >ID</th>
            <th>Date Created</th>
            <th>Owner</th>
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
            <td> {{ p.firstname }} {{ p.lastname }}</td>
            <td> {{ p.title }}</td>
                <td> {{ p.rentaltype }}</td>
                <td> {{ p.occupancy }}</td>
                <td> {{ p.bathroom }}</td>
                <td> {{ p.bedrooms }}</td>
                <td> {{ p.status }}</td>
                
                <td> {{ p.posted }}</td>
                <td class="text-center" style="width:100px;">
                <a href="#/admin/viewproperty/{{p.id}}/{{p.gid}}" style="margin-bottom:2px;" class="btn btn-sm btn-default" >More Info</a>
                    <input type="button" ng-show="p.statusid=='A'" class="btn btn-sm btn-default" ng-click="setInactiveProperty(p.id)" value="Set to Inactive">
                    <input type="button" ng-show="p.statusid=='I'" class="btn btn-sm btn-default" ng-click="setActiveProperty(p.id)" value="Set to Active">
                </td>

            </tr>


        </tbody>
    </table>
    <div>
    <div>
    <div>