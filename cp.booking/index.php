<!DOCTYPE html>
<html lang="en" ng-app="Booking">
    <head>
        <meta charset="utf-8" />
        <title>Online Booking</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" /> -->
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/uniform/css/uniform.default.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/css/components.css" rel="stylesheet" id="style_components" type="text/css" />
        
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!--<link href="assets/layouts/css/layout.css" rel="stylesheet" type="text/css" />-->
        <link href="assets/layouts/css/custom.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
        

        <link href="assets/pages/css/profile.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout3/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout3/css/default.css" rel="stylesheet" type="text/css" id="style_color" />
        <!--[if lt IE 9]>
        <script src="assets/global/plugins/respond.min.js"></script>
        <script src="assets/global/plugins/excanvas.min.js"></script>
        <![endif]-->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
        <script src="assets/pages/scripts/ui-extended-modals.min.js" type="text/javascript"></script>
        
        <script src="assets/global/plugins/bootstrap-validator/bootstrapvalidator.min.js" type="text/javascript"></script>
        <script src="assets/pages/scripts/moment-with-locales.js"></script>
        <script src="assets/pages/scripts/printThis.js"></script>
        <script src="assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
        <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="assets/global/plugins/moment.js" type="text/javascript"></script>
        <script src="assets/layouts/scripts/jsFunction.js" type="text/javascript"></script>

        <script src="assets/angular/1.2.13/angular.js"></script>
        
        <script src="assets/angular/0.2.8/angular-ui-router.min.js"></script>
        <script src="assets/angular/angular-resource.js"></script>
        <script src="assets/angular/ngStorage.min.js"></script>
        
        
        
        <script src="assets/angular/app.js" type="text/javascript"></script>
        <script src="assets/angular/controller/adminController.js" type="text/javascript"></script>
        <script src="assets/angular/controller/ownerController.js" type="text/javascript"></script>
        <script src="assets/angular/service/adminService.js" type="text/javascript"></script>
        <script src="assets/angular/service/ownerService.js" type="text/javascript"></script>
        <script src="assets/angular/service/generalService.js" type="text/javascript"></script>
        
        
        <link rel="shortcut icon" href="favicon.ico" />
        
        
        </script>
    </head>
    
    <body >
        <div ui-view  ></div>
        
        <div id="progressWindow" class="modal  " tabindex="9999999"  data-backdrop="static" data-keyboard="false" >
        <p>Please wait</p>
        <img src="assets/images/spinner.gif" />

        </div>
    </body>
    
</html>