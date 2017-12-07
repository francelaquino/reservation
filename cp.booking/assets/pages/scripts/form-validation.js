var FormValidation = function() {

    // basic validation
    var member_form_validation = function() {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation
        debug: true
        var member_form = $('#member_form');

        member_form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input

            rules: {
                firstname: {
                    required: true,
                }
            },

            highlight: function(element) { // hightlight error inputs
                if ($(element).hasClass('select2')) {
                    $(element).insertAfter($(element).next('span'));
                } else {
                    $(element).closest('.form-group').addClass('has-error');
                }
            },

            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function(form) {
                angular.element(document.getElementById('loginController')).scope().checkPatientCredentials();
            }
        });


    }


    return {
        //main function to initiate the module
        init: function() {
            member_form_validation();

        }

    };

}();

jQuery(document).ready(function() {
    FormValidation.init();
});
