
<div class="page-content-inner " id="memberController" ng-controller="memberController" ng-init="getmembership()">
    <div class="portlet  ">
        <div class="portlet-title ">
            <div class="caption caption-md">
                <span class="captin-subject font-blue-madison  uppercase">Membership</span>
            </div>
        </div>

        <div class="alert alert-block alert-success fade in" style="display: none;">
        </div>

        <form id="member_form" action="" method="post" class="form-horizontal">

            <div class="portlet-body ">


            <div class="form-body ">
            <div class="form-group">
            <label class="col-md-3 control-label">Username</label>
            <div class="col-md-6">
            <input type="text" class="form-control" ng-model="members.username" readonly="readonly">
            </div>
            </div>
            <div class="form-group">
            <label class="col-md-3 control-label">Membership</label>
            <div class="col-md-6">
            <input type="text" class="form-control" ng-model="members.type" readonly="readonly">
            </div>
            </div>
            <div class="form-group">
            <label class="col-md-3 control-label">Date Joined</label>
            <div class="col-md-6">
            <input type="text" class="form-control" ng-model="members.datejoined" readonly="readonly">
            </div>
            </div>
            <div class="form-group">
            <label class="col-md-3 control-label">Status</label>
            <div class="col-md-6">
            <input type="text" class="form-control" ng-model="members.active" readonly="readonly">
            </div>
            </div>




            </div>

            </div>

        </form>
    </div>

</div>
        </div>

