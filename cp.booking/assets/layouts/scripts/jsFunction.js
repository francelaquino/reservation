function uploadMemberDocuments(id) {
    if ($('#fileupload').get(0).files.length === 0) {
        return false;
    }

    var filename = $('input[type=file]')[0].files[0].name;
    var file = $('#fileupload').get(0).files[0];
    if (!file) {
        return;
    }
    if ($('#fileupload').val() != "") {
        var ext = $('#fileupload').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['jpg', 'png', 'bmp']) == -1) {
            alert('Invalid file type');
            return false;
        }
    }


    if (file.size >= 2307206) {
        alert("Filesize of " + file.size + " is too large. Maximum file size permitted is 2 MB");
    } else {
        $("#progressWindow").modal("show");

        var formData = new FormData();
        formData.append("txtid", $("#txtid").val());
        formData.append("txtgid", $("#txtgid").val());
        formData.append("txtdocument", $("#txtdocument").val());
        formData.append("file", file);
        $.ajax({
            //url: 'http://localhost:8000/member/uploaddocuments/?rnd=' + new Date().getTime(),
            url: 'http://api.payrollclub.co/index.php/member/uploaddocuments/?rnd=' + new Date().getTime(),

            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                setTimeout(function() {

                    if (id == 'partner') {
                        angular.element(document.getElementById('partnerController')).scope().checkmemberdocuments();
                        $("#progressWindow").modal("hide");
                    } else if (id == 'admin') {
                        angular.element(document.getElementById('adminController')).scope().checkmemberdocuments();
                        $("#progressWindow").modal("hide");
                    } else if (id == 'member') {
                        angular.element(document.getElementById('memberController')).scope().checkmemberdocuments();
                        $("#progressWindow").modal("hide");
                    }
                }, 2500);

            }
        });
    }

}

function printReport() {
    $("#reportContainer").printThis({
        debug: false,
        importCSS: false,
        printContainer: true,
        loadCSS: '../accounts.payrollclub/assets/layouts/css/report.css',
        pageTitle: "",
        removeInline: false
    });

}