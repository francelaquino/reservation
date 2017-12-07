app.factory('ownerService', function($http, $stateParams) {
    var owner = {};

    //var baseURL = "http://localhost/api.booking/index.php/";
    //var baseURL = "http://10.80.39.54/api.booking/index.php/";
    var baseURL = "http://api.uniserb.com/index.php/";
    owner.savePropertyOwner = function($data) {
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

    owner.saveProperty = function($data) {
        return $http({
                method: 'POST',
                url: baseURL + 'admin/saveProperty',
                data: $.param($data),
                headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }
            })
            .success(function(response) {
                return response;
            })
    }

    owner.owerchecklogin = function($data) {
        return $http({
                method: 'POST',
                url: baseURL + 'admin/owerchecklogin',
                data: $.param($data),
                headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }
            })
            .success(function(response) {
                return response;
            })
    }

    owner.updateProperty = function($data) {
        return $http({
                method: 'POST',
                url: baseURL + 'admin/updateProperty',
                data: $.param($data),
                headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }
            })
            .success(function(response) {
                return response;
            })
    }

    owner.uploadProperty = function($formData) {

        return $.ajax({
            url: baseURL + 'admin/uploadProperty',
            type: 'POST',
            data: $formData,
            processData: false,
            contentType: false,
            success: function(data) {

            }
        });
    }





    owner.getOwnerForApproval = function($data) {
        return $http.get(baseURL + "admin/getOwnerForApproval")
            .then(function(response) {
                return response.data;
            });
    }
    owner.getPropertyInfo = function($id, $gid) {
        return $http.get(baseURL + "admin/getPropertyInfo/" + $id + "/" + $gid)
            .then(function(response) {
                return response.data;
            });
    }


    owner.getPropertyOwners = function($data) {
        return $http.get(baseURL + "admin/getPropertyOwners")
            .then(function(response) {
                return response.data;
            });
    }

    owner.getBookingDetails = function($id) {
        return $http.get(baseURL + "property/getBookingDetails/" + $id)
            .then(function(response) {
                return response.data;
            });
    }



    owner.getProperties = function($id) {
        return $http.get(baseURL + "admin/getProperties/" + $id)
            .then(function(response) {
                return response.data;
            });
    }

    owner.getConfirmedProperties = function($from, $to, $id) {
        if ($from == "") {
            $from = 0;
        }
        if ($to == "") {
            $to = 0;
        }
        return $http.get(baseURL + "admin/getConfirmedProperties/" + $from + "/" + $to + "/" + $id)
            .then(function(response) {
                return response.data;
            });
    }

    owner.getCanceledProperties = function($from, $to, $id) {
        if ($from == "") {
            $from = 0;
        }
        if ($to == "") {
            $to = 0;
        }
        return $http.get(baseURL + "admin/getCanceledProperties/" + $from + "/" + $to + "/" + $id)
            .then(function(response) {
                return response.data;
            });
    }


    owner.getBookedProperties = function($id) {
        return $http.get(baseURL + "admin/getBookedProperties/" + $id)
            .then(function(response) {
                return response.data;
            });
    }




    owner.getRentalType = function($data) {
        return $http.get(baseURL + "general/getRentalType")
            .then(function(response) {
                return response.data;
            });
    }

    owner.getStudio = function($data) {
        return $http.get(baseURL + "general/getStudio")
            .then(function(response) {
                return response.data;
            });
    }

    owner.getPropertyAvailability = function($id) {
        return $http.get(baseURL + "property/getPropertyAvailability/" + $id)
            .then(function(response) {
                return response.data;
            });
    }



    owner.getSleeps = function($data) {
        return $http.get(baseURL + "general/getSleeps")
            .then(function(response) {
                return response.data;
            });
    }
    owner.postProperty = function($id) {
        return $http.get(baseURL + "admin/postProperty/" + $id)
            .then(function(response) {
                return response.data;
            });
    }

    owner.deleteProperty = function($id) {
        return $http.get(baseURL + "admin/deleteProperty/" + $id)
            .then(function(response) {
                return response.data;
            });
    }



    owner.cancelBooking = function($id) {
        return $http.get(baseURL + "admin/cancelBooking/" + $id)
            .then(function(response) {
                return response.data;
            });
    }

    owner.confirmBooking = function($id) {
        return $http.get(baseURL + "admin/confirmBooking/" + $id)
            .then(function(response) {
                return response.data;
            });
    }

    owner.unconfirmBooking = function($id) {
        return $http.get(baseURL + "admin/unconfirmBooking/" + $id)
            .then(function(response) {
                return response.data;
            });
    }



    owner.unpostProperty = function($id) {
        return $http.get(baseURL + "admin/unpostProperty/" + $id)
            .then(function(response) {
                return response.data;
            });
    }


    owner.savePropertyCalendar = function($data) {
        return $http({
                method: 'POST',
                url: baseURL + 'property/savePropertyCalendar',
                data: $data,
            })
            .success(function(response) {
                return response;
            })
    }



    owner.approvePropertyOwner = function($data) {
        return $http({
                method: 'POST',
                url: baseURL + 'admin/approvePropertyOwner',
                data: $.param($data),
                headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }
            })
            .success(function(response) {
                return response;
            })
    }

    owner.removeProperyImage = function($data) {
        return $http({
                method: 'POST',
                url: baseURL + 'admin/removeProperyImage',
                data: $.param($data),
                headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }
            })
            .success(function(response) {
                return response;
            })
    }


    owner.disapprovePropertyOwner = function($data) {
        return $http({
                method: 'POST',
                url: baseURL + 'admin/disapprovePropertyOwner',
                data: $.param($data),
                headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }
            })
            .success(function(response) {
                return response;
            })
    }

    owner.setInactiveProperty = function($data) {
        return $http({
                method: 'POST',
                url: baseURL + 'admin/setInactiveProperty',
                data: $.param($data),
                headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }
            })
            .success(function(response) {
                return response;
            })
    }



    owner.approveProperty = function($data) {
        return $http({
                method: 'POST',
                url: baseURL + 'admin/approveProperty',
                data: $.param($data),
                headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }
            })
            .success(function(response) {
                return response;
            })
    }


    owner.disapproveProperty = function($data) {
        return $http({
                method: 'POST',
                url: baseURL + 'admin/disapproveProperty',
                data: $.param($data),
                headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }
            })
            .success(function(response) {
                return response;
            })
    }








    return owner;
});