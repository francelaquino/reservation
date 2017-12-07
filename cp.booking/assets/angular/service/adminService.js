app.factory('adminService', function($http, $stateParams) {
    var admin = {};

    //var baseURL = "http://localhost/api.booking/index.php/";
    var baseURL = "http://api.uniserb.com/index.php/";
    //var baseURL = "http://10.80.39.54/api.booking/index.php/";

    admin.savePropertyOwner = function($data) {
        return $http({
                method: 'POST',
                url: baseURL + 'admin/savePropertyOwner',
                data: $.param($data),
                headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }
            })
            .success(function(response) {
                return response;
            })
    }


    admin.getPropertiesForApproval = function($data) {
        return $http.get(baseURL + "admin/getPropertiesForApproval")
            .then(function(response) {
                return response.data;
            });
    }
    admin.adminchecklogin = function($data) {
        return $http({
                method: 'POST',
                url: baseURL + 'admin/adminchecklogin',
                data: $.param($data),
                headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }
            })
            .success(function(response) {
                return response;
            })
    }

    admin.getApprovedProperties = function($data) {
        return $http.get(baseURL + "admin/getApprovedProperties ")
            .then(function(response) {
                return response.data;
            });
    }



    admin.getApprovedProperties = function($data) {
        return $http.get(baseURL + "admin/getApprovedProperties")
            .then(function(response) {
                return response.data;
            });
    }











    return admin;
});