var app = angular.module('Booking', ['ui.router', 'ngResource', 'ngStorage']);

app.config(function($stateProvider, $urlRouterProvider, $locationProvider) {



    $stateProvider
        .state('admin', {
            url: '/admin',
            templateUrl: 'pages/admin.php'
        })

    .state('owner', {
        url: '/owner',
        templateUrl: 'pages/owner.php'
    })

    .state('admin.propertyownerforapproval', {
        url: '/propertyownerforapproval',
        templateUrl: 'pages/admin/admin_propertyownerforapproval.php'
    })

    .state('admin.approvedproperties', {
        url: '/approvedproperties',
        templateUrl: 'pages/admin/admin_approvedproperties.php'
    })

    .state('admin.propertyowner', {
        url: '/propertyowner',
        templateUrl: 'pages/admin/admin_propertyowner.php'
    })

    .state('admin.propertiesforapproval', {
        url: '/propertiesforapproval',
        templateUrl: 'pages/admin/admin_propertiesforapproval.php'
    })

    .state('admin.viewproperty', {
        url: '/viewproperty/:id/:gid',
        templateUrl: 'pages/admin/admin_viewproperty.php'
    })



    .state('ownerregistration', {
        url: '/ownerregistration',
        templateUrl: 'pages/owner/registration.php'
    })

    .state('owner.createproperty', {
        url: '/createproperty',
        templateUrl: 'pages/owner/createproperty.php'
    })

    .state('owner.properties', {
        url: '/properties',
        templateUrl: 'pages/owner/properties.php'
    })

    .state('owner.editproperty', {
        url: '/editproperty/:id/:gid',
        templateUrl: 'pages/owner/editproperty.php'
    })

    .state('owner.propertyavailability', {
        url: '/propertyavailability/:id/:gid',
        templateUrl: 'pages/owner/propertyavailability.php'
    })


    .state('owner.bookedproperty', {
        url: '/bookedproperty',
        templateUrl: 'pages/owner/bookedproperty.php'
    })

    .state('owner.confirmbooking', {
        url: '/confirmbooking',
        templateUrl: 'pages/owner/confirmbooking.php'
    })

    
    .state('owner.canceledbooking', {
        url: '/canceledbooking',
        templateUrl: 'pages/owner/canceledbooking.php'
    })

    
    .state('owner.bookingdetails', {
        url: '/bookingdetails/:id',
        templateUrl: 'pages/owner/bookingdetails.php'
    })
    .state('ownerlogin', {
        url: '/ownerlogin',
        templateUrl: 'pages/owner/ownerlogin.php'
    })


    .state('adminlogin', {
        url: '/adminlogin',
        templateUrl: 'pages/admin/adminlogin.php'
    })



});