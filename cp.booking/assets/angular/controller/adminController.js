app.controller('adminController', function($scope, $http, $stateParams, $location, $window, $rootScope, ownerService, generalService, adminService) {

    $scope.owner = {};
    $scope.property = {}
    $scope.adminid=localStorage.getItem("adminid");

    $scope.getPropertiesForApproval = function() {
        $("#progressWindow").show();
        adminService.getPropertiesForApproval().then(function(response) {
            $scope.properties = response;
            $("#progressWindow").hide();
        });
    }

    $scope.getApprovedProperties = function() {
        $("#progressWindow").show();
        adminService.getApprovedProperties().then(function(response) {
            $scope.properties = response;
            $("#progressWindow").hide();
        });
    }

    $scope.getApprovedProperties = function() {
        $("#progressWindow").show();
        adminService.getApprovedProperties().then(function(response) {
            $scope.properties = response;
            $("#progressWindow").hide();
        });
    }

    $scope.checkLogin=function(){
        $scope.data={};
        $scope.data.username=$("#username").val();
        $scope.data.password=$("#password").val();
        adminService.adminchecklogin($scope.data).then(function(response) {
            if (response.data.trim() == "") {
                localStorage.setItem("adminid",response.data.id);
                window.location.href = '#/admin/propertyownerforapproval';
                
                } else {
                alert(response.data.trim());
            }
        });
    }

    $scope.initLogin=function(){
        localStorage.setItem("adminid","");
    }

    $scope.approveProperty = function($id) {
        if (confirm("Are you sure you want to approve the property?") == true) {
            $("#progressWindow").show();
            $scope.data = {};
            $scope.data.username = "admin";
            $scope.data.id = $id;
            ownerService.approveProperty($scope.data).then(function(response) {
                $scope.getPropertiesForApproval();
            });
        }
    }

    $scope.setActiveProperty = function($id) {
        if (confirm("Are you sure you want to active the property?") == true) {
            $("#progressWindow").show();
            $scope.data = {};
            $scope.data.username = "admin";
            $scope.data.id = $id;
            ownerService.approveProperty($scope.data).then(function(response) {
                $scope.getApprovedProperties();
            });
        }
    }


    $scope.disapproveProperty = function($id) {
        if (confirm("Are you sure you want to disapprove the property?") == true) {
            $("#progressWindow").show();
            $scope.data = {};
            $scope.data.username = "admin";
            $scope.data.id = $id;
            ownerService.disapproveProperty($scope.data).then(function(response) {
                $scope.getPropertiesForApproval();
            });
        }
    }

    $scope.setInactiveProperty = function($id) {
        if (confirm("Are you sure you want to inactivate the property?") == true) {
            $("#progressWindow").show();
            $scope.data = {};
            $scope.data.username = "admin";
            $scope.data.id = $id;
            ownerService.setInactiveProperty($scope.data).then(function(response) {
                $scope.getApprovedProperties();
            });
        }
    }

    






});