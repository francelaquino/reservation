app.factory('generalService', function($http) {
    var general = {};


    //var baseURL = "http://localhost/api.booking/index.php/";
    //var baseURL = "http://10.80.39.54/api.booking/index.php/";
    var baseURL = "http://api.uniserb.com/index.php/";

    general.getNationality = function() {
        return $http.get(baseURL + "general/getNationality")
            .then(function(response) {
                return response.data;
            });
    }

    general.getCities = function($id) {
        return $http.get(baseURL + "general/getCities/" + $id)
            .then(function(response) {
                return response.data;
            });
    }

    general.toggleSuccess = function($data) {
        $(".note-info").html($data);
        $(".note-info").show();
        setTimeout(function() {
            $(".note-info").hide();
        }, 10000);
    }





    return general;
});