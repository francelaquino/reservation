app.controller('ownerController', function($scope, $http, $stateParams, $location, $window, $rootScope, ownerService, generalService) {
    //var baseURL = "http://localhost/api.booking/index.php";
    var baseURL = "http://api.uniserb.com/index.php/";
    //var baseURL = "http://10.80.39.54/api.booking/index.php/";
    $scope.owner = {};
    $scope.ownerid = localStorage.getItem("ownerid");
    $scope.firstname = localStorage.getItem("firstname");
    $scope.property = {}
    $scope.availability = {};
    var p = $location.path();
    if ($scope.ownerid == "") {

        if (!p.includes("ownerlogin") &&
            !p.includes("ownerregistration") &&
            !p.includes("propertyownerforapproval") &&
            !p.includes("approvedproperties") &&
            !p.includes("propertyowner") &&
            !p.includes("propertiesforapproval") &&
            !p.includes("viewproperty")) {
            window.location.href = "#/ownerlogin";
        }
    }

    $scope.initOwnerForm = function() {
        $scope.owner = {};
        generalService.getNationality().then(function(response) {
            $scope.nationality = response;
        });

        $("#fileupload1").val("");
        $("#fileupload2").val("");
        $("#fileupload3").val("");
        $("#fileupload4").val("");
    }



    $scope.savePropertyOwner = function() {
        $scope.owner.birthdate = $("#birthdate").val();
        ownerService.savePropertyOwner($scope.owner).then(function(response) {

            if (response.data.trim() == "") {
                generalService.toggleSuccess("Congratulations!!  You have successfully registered as Property Owner!!");
                $scope.initOwnerForm();
                $("html, body").animate({ scrollTop: 0 }, "slow");
            } else {
                generalService.toggleSuccess(response.data.trim());
            }
        });
    }

    $scope.checkLogin = function() {
        $scope.data = {};
        $scope.data.username = $("#username").val();
        $scope.data.password = $("#password").val();
        ownerService.owerchecklogin($scope.data).then(function(response) {
            if (response.data.message == "") {
                localStorage.setItem("ownerid", response.data.id);
                localStorage.setItem("firstname", response.data.firstname);
                window.location.href = '#/owner/properties';

            } else {
                alert(response.data.message);
            }
        });
    }



    $scope.getOwnerForApproval = function() {
        $("#progressWindow").show();
        ownerService.getOwnerForApproval().then(function(response) {
            $scope.owners = response;
            $("#progressWindow").hide();
        });
    }

    $scope.setAvailability = function($id) {
        $("#calendar").empty();
        $date = $id.replace("calendar_", "");
        $ifFound = 0;
        for (var i = 0; i < $scope.availability.length; i++) {
            if ($scope.availability[i].date == $date) {
                $scope.availability.splice(i, 1);
                $ifFound = 1;
                i = $scope.availability.length + 1;

            }
        }
        if ($ifFound == 0) {
            $scope.availability.push({
                date: $date,

            });
        }
        $scope.initCalendar();

    }

    $scope.initCalendar = function() {
        $("#calendar").zabuto_calendar({

            data: $scope.availability,
            cell_border: true,
            show_days: false,
            weekstartson: 0,
            action: function() {
                return $scope.setAvailability(this.id);
            },

        });
    }

    $scope.savePropertyCalendar = function() {

        for (var x = 0; x < $scope.availability.length; x++) {
            $scope.availability[x].propertyid = $stateParams.id;
        }
        ownerService.savePropertyCalendar($scope.availability).then(function(response) {});

        generalService.toggleSuccess("Property availability has been save successfuly");

    }

    $scope.getPropertyAvailability = function() {
        $id = $stateParams.id;
        $("#progressWindow").show();
        ownerService.getPropertyAvailability($id).then(function(response) {
            $scope.availability = response;
            $scope.initCalendar();


            $("#progressWindow").hide();
        });
    }
    $scope.getPropertyOwners = function() {
        $("#progressWindow").show();
        ownerService.getPropertyOwners().then(function(response) {
            $scope.owners = response;
            $("#progressWindow").hide();
        });
    }

    $scope.getProperties = function() {
        var p = $location.path();
        if ($scope.ownerid == "") {

            if (!p.includes("ownerlogin") &&
                !p.includes("ownerregistration") &&
                !p.includes("propertyownerforapproval") &&
                !p.includes("approvedproperties") &&
                !p.includes("propertyowner") &&
                !p.includes("propertiesforapproval") &&
                !p.includes("viewproperty")) {
                window.location.href = "#/ownerlogin";
            }
        } else {
            $("#progressWindow").show();
            ownerService.getProperties($scope.ownerid).then(function(response) {
                $scope.properties = response;
                $("#progressWindow").hide();
            });
        }

    }


    $scope.getConfirmedProperties = function() {
        $("#progressWindow").show();
        ownerService.getConfirmedProperties($("#from").val(), $("#to").val(), $scope.ownerid).then(function(response) {
            $scope.properties = response;
            $("#progressWindow").hide();
        });
    }

    $scope.getCanceledProperties = function() {
        $("#progressWindow").show();
        ownerService.getCanceledProperties($("#from").val(), $("#to").val(), $scope.ownerid).then(function(response) {
            $scope.properties = response;
            $("#progressWindow").hide();
        });
    }

    $scope.getBookedProperties = function() {
        $("#progressWindow").show();
        ownerService.getBookedProperties($scope.ownerid).then(function(response) {
            $scope.properties = response;
            $("#progressWindow").hide();
        });
    }



    $scope.getPropertyInfo = function() {
        $("#progressWindow").show();
        $id = $stateParams.id;
        $gid = $stateParams.gid;
        setTimeout(function() {

            ownerService.getPropertyInfo($id, $gid).then(function(response) {
                $scope.property = response[0];
                $scope.property.rateperday = Number($scope.property.rateperday);
                $scope.property.depositfee = Number($scope.property.depositfee);
                $scope.getCities($scope.property.country);



                $("#txtlat_o").val($scope.property.lat);
                $("#txtlon_o").val($scope.property.lat);

                setTimeout(function() {
                    $("#city").val($scope.property.city);
                    $("#progressWindow").hide();
                }, 1000);
            });
        }, 1000);
    }


    $scope.getBookingDetails = function() {

        $("#progressWindow").show();
        $id = $stateParams.id;
        ownerService.getBookingDetails($id).then(function(response) {
            $scope.booking = response[0];
            $("#progressWindow").hide();
        });

    }

    $scope.approvePropertyOwner = function($id) {
        if (confirm("Are you sure you want to approve the registration?") == true) {
            $("#progressWindow").show();
            $scope.data = {};
            $scope.data.username = "admin";
            $scope.data.id = $id;
            ownerService.approvePropertyOwner($scope.data).then(function(response) {
                $scope.getOwnerForApproval();
            });
        }
    }

    $scope.postProperty = function($id, $status) {
        if ($status == 'F') {
            alert("Posting property is not allowed for not yet approve property");
            return false;
        }
        $("#progressWindow").show();
        ownerService.postProperty($id).then(function(response) {
            $scope.getProperties();
            $("#progressWindow").hide();
        });
    }
    $scope.deleteProperty = function($id) {
        if (confirm("Are you sure you want to delete the property?") == true) {
            $("#progressWindow").show();
            ownerService.deleteProperty($id).then(function(response) {
                $scope.getProperties();
            });
        }
    }

    $scope.confirmBooking = function($id) {
        if (confirm("Are you sure you want to confirm the booking?") == true) {
            $("#progressWindow").show();
            ownerService.confirmBooking($id).then(function(response) {
                $scope.getBookedProperties();
            });
        }
    }
    $scope.cancelBooking = function($id) {
        if (confirm("Are you sure you want to cancel the booking?") == true) {
            $("#progressWindow").show();
            ownerService.cancelBooking($id).then(function(response) {
                $scope.getBookedProperties();
            });
        }
    }


    $scope.unconfirmBooking = function($id, $status) {
        if (confirm("Are you sure you want to retract booking confirmation?") == true) {
            $("#progressWindow").show();
            ownerService.unconfirmBooking($id).then(function(response) {
                $scope.getBookedProperties();
            });
        }
    }


    $scope.unpostProperty = function($id) {
        $("#progressWindow").show();
        ownerService.unpostProperty($id).then(function(response) {
            $scope.getProperties();
            $("#progressWindow").hide();
        });
    }

    $scope.disapprovePropertyOwner = function($id) {
        if (confirm("Are you sure you want to disapprove the registration?") == true) {
            $("#progressWindow").show();
            $scope.data = {};
            $scope.data.username = "admin";
            $scope.data.id = $id;
            ownerService.disapprovePropertyOwner($scope.data).then(function(response) {
                $scope.getOwnerForApproval();
            });
        }
    }

    $scope.initPropertyForm = function() {

        $scope.property = {};
        $scope.property.owner = $scope.ownerid;
        $scope.property.rentaltype = "";
        $scope.property.studio = "";
        $scope.property.sleeps = "";
        $scope.property.bedrooms = "";
        $scope.property.title = "";
        $scope.property.description = "";
        $scope.property.country = "";
        $scope.property.street = "";
        $scope.property.city = "";
        $scope.property.airconditioning = "N";
        $scope.property.linen = "N";
        $scope.property.washingmachine = "N";
        $scope.property.internet = "N";
        $scope.property.wirelessinternet = "N";
        $scope.property.pool = "N";
        $scope.property.elevator = "N";
        $scope.property.wheelchair = "N";
        $scope.property.fridge = "N";
        $scope.property.kettle = "N";
        $scope.property.microwave = "N";
        $scope.property.stove = "N";
        $scope.property.satelitetv = "N";
        $scope.property.balcony = "N";
        $scope.property.climbingframe = "N";
        $scope.property.patio = "N";

        generalService.getNationality().then(function(response) {
            $scope.country = response;

        });

        ownerService.getRentalType().then(function(response) {
            $scope.rentaltype = response;
        });







    }

    $scope.getCities = function($id) {
        generalService.getCities($id).then(function(response) {
            $scope.cities = response;
        });
    }

    $scope.saveProperty = function() {

        var file1;
        var file2;
        var file3;
        var file4;
        if ($("#txtlat_o").val() == "" || $("#txtlon_o").val() == "") {
            alert("Please select map location");
            return false;
        }
        if ($('#fileupload1').val() == "" &&
            $('#fileupload2').val() == "" &&
            $('#fileupload3').val() == "" &&
            $('#fileupload4').val() == "") {
            alert("Please provide atlesat one property image");
            return false;
        }

        if ($('#fileupload1').val() != "") {
            var ext = $('#fileupload1').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['jpg', 'png', 'bmp']) == -1) {
                alert('Invalid file type');
                return false;
            }
            var file1 = $('#fileupload1').get(0).files[0];
            if (file1.size >= 2307206) {
                alert("Filesize of " + file.size + " is too large. Maximum file size permitted is 2 MB");
                return false;
            }
        }

        if ($('#fileupload2').val() != "") {
            var ext = $('#fileupload2').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['jpg', 'png', 'bmp']) == -1) {
                alert('Invalid file type');
                return false;
            }
            var file2 = $('#fileupload2').get(0).files[0];
            if (file2.size >= 2307206) {
                alert("Filesize of " + file.size + " is too large. Maximum file size permitted is 2 MB");
                return false;
            }
        }

        if ($('#fileupload3').val() != "") {
            var ext = $('#fileupload3').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['jpg', 'png', 'bmp']) == -1) {
                alert('Invalid file type');
                return false;
            }
            var file3 = $('#fileupload3').get(0).files[0];
            if (file3.size >= 2307206) {
                alert("Filesize of " + file.size + " is too large. Maximum file size permitted is 2 MB");
                return false;
            }
        }

        if ($('#fileupload4').val() != "") {
            var ext = $('#fileupload4').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['jpg', 'png', 'bmp']) == -1) {
                alert('Invalid file type');
                return false;
            }
            var file4 = $('#fileupload4').get(0).files[0];
            if (file4.size >= 2307206) {
                alert("Filesize of " + file.size + " is too large. Maximum file size permitted is 2 MB");
                return false;
            }
        }


        $scope.property.lat = $("#txtlat_o").val();
        $scope.property.lng = $("#txtlon_o").val();
        $scope.property.maplocation = $("#txtmaplocation").val();
        ownerService.saveProperty($scope.property).then(function(response) {
            if (response.data.trim() != "") {
                $id = response.data.trim();

                var formData = new FormData();
                formData.append("id", $id);
                formData.append("file", file1);
                formData.append("field", "1");

                ownerService.uploadProperty(formData).then(function(response) {});

                var formData = new FormData();
                formData.append("id", $id);
                formData.append("file", file2);
                formData.append("field", "2");
                ownerService.uploadProperty(formData).then(function(response) {});

                var formData = new FormData();
                formData.append("id", $id);
                formData.append("file", file3);
                formData.append("field", "3");

                ownerService.uploadProperty(formData).then(function(response) {});

                var formData = new FormData();
                formData.append("id", $id);
                formData.append("file", file4);
                formData.append("field", "4");

                ownerService.uploadProperty(formData).then(function(response) {});

                alert("Property successfully added.");
                window.location.reload();
            } else {
                generalService.toggleSuccess(response.data.trim());
            }
        });
    }

    $scope.updateProperty = function() {
        var file1;
        var file2;
        var file3;
        var file4;

        if ($("#txtlat_o").val() == "" || $("#txtlon_o").val() == "") {
            alert("Please select map location");
            return false;
        }
        /*if($('#fileupload1').val()=="" && 
        $('#fileupload2').val()=="" && 
        $('#fileupload3').val()=="" && 
        $('#fileupload4').val()==""){
            alert("Please provide atlesat one property image");
            return false;
        }*/

        if ($('#fileupload1').val() != "") {
            var ext = $('#fileupload1').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['jpg', 'png', 'bmp']) == -1) {
                alert('Invalid file type');
                return false;
            }
            var file1 = $('#fileupload1').get(0).files[0];
            if (file1.size >= 2307206) {
                alert("Filesize of " + file.size + " is too large. Maximum file size permitted is 2 MB");
                return false;
            }
        }

        if ($('#fileupload2').val() != "") {
            var ext = $('#fileupload2').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['jpg', 'png', 'bmp']) == -1) {
                alert('Invalid file type');
                return false;
            }
            var file2 = $('#fileupload2').get(0).files[0];
            if (file2.size >= 2307206) {
                alert("Filesize of " + file.size + " is too large. Maximum file size permitted is 2 MB");
                return false;
            }
        }

        if ($('#fileupload3').val() != "") {
            var ext = $('#fileupload3').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['jpg', 'png', 'bmp']) == -1) {
                alert('Invalid file type');
                return false;
            }
            var file3 = $('#fileupload3').get(0).files[0];
            if (file3.size >= 2307206) {
                alert("Filesize of " + file.size + " is too large. Maximum file size permitted is 2 MB");
                return false;
            }
        }

        if ($('#fileupload4').val() != "") {
            var ext = $('#fileupload4').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['jpg', 'png', 'bmp']) == -1) {
                alert('Invalid file type');
                return false;
            }
            var file4 = $('#fileupload4').get(0).files[0];
            if (file4.size >= 2307206) {
                alert("Filesize of " + file.size + " is too large. Maximum file size permitted is 2 MB");
                return false;
            }
        }

        $("#progressWindow").modal("show");
        $scope.property.id = $stateParams.id;


        $scope.property.lat = $("#txtlat_o").val();
        $scope.property.lng = $("#txtlon_o").val();
        $scope.property.maplocation = $("#txtmaplocation").val();





        ownerService.updateProperty($scope.property).then(function(response) {
            var formData = new FormData();
            formData.append("id", $scope.property.id);
            formData.append("file", file1);
            formData.append("field", "1");

            ownerService.uploadProperty(formData).then(function(response) {});

            var formData = new FormData();
            formData.append("id", $scope.property.id);
            formData.append("file", file2);
            formData.append("field", "2");
            ownerService.uploadProperty(formData).then(function(response) {});

            var formData = new FormData();
            formData.append("id", $scope.property.id);
            formData.append("file", file3);
            formData.append("field", "3");

            ownerService.uploadProperty(formData).then(function(response) {});

            var formData = new FormData();
            formData.append("id", $scope.property.id);
            formData.append("file", file4);
            formData.append("field", "4");

            ownerService.uploadProperty(formData).then(function(response) {});



            alert("Property successfully updated.");
            window.location.reload();
        });
    }

    $scope.initLogin = function() {
        localStorage.setItem("ownerid", "");
        localStorage.setItem("firstname", "");
    }
    $scope.removeProperyImage = function($id) {
        $scope.data = {};
        $scope.data.image = $id;
        $scope.data.id = $stateParams.id;
        $scope.data.gid = $stateParams.gid;
        ownerService.removeProperyImage($scope.data).then(function(response) {
            window.location.reload();
        });
    }
    $scope.viewProperyImage = function($filename) {

        $docUrl = baseURL + "admin/getPropertyImage/";
        $("#property_Image").attr("src", $docUrl + $filename);
        $("#propertyImage").modal('show');

    }



});