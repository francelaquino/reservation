<style type="text/css">
    body,
    html {
        overflow: hidden;
    }

    .form-signin {
        padding: 15px;
        margin: 0 auto;
    }

    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 10px;
    }





    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .account-wall {
        margin-top: 50px;
        padding: 40px 0px 20px 0px;
        background-color: #f7f7f7;
        border-radius: 5px !important;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    }

    .account-wall label {
        color: #222222 !important;
    }

    .login-title {
        color: #555;
        font-size: 18px;
        font-weight: 400;
        display: block;
    }

    .profile-img {
        width: 96px;
        height: 96px;
        margin: 0 auto 10px;
        display: block;
        -moz-border-radius: 50% !important;
        -webkit-border-radius: 50% !important;
    }

    .need-help {
        margin-top: 10px;
    }


    .form-group label {
        font-size: 17px;
        margin-bottom: 10px;
    }

    .form-group .form-control {
        padding: 10px !important;
        height: 40px;
    }

    button {
        height: 40px !important;
        font-size: 18px !important;
    }

    .homepage-hero-module {
        border-right: none;
        border-left: none;
        position: relative;
    }
    /*
.no-video .video-container video,
.touch .video-container video {
    display: none;
}
.no-video .video-container .poster,
.touch .video-container .poster {
    display: block !important;
}
.video-container {
    position: relative;
    bottom: 0%;
    left: 0%;
    height: 100%;
    width: 100%;
    overflow: hidden;
    background: #000;
}*/

    .video-container .poster img {
        width: 100%;
        bottom: 0;
        position: absolute;
    }

    .video-container .filter {
        z-index: 100;
        position: absolute;
        background: rgba(0, 0, 0, 0.4);
        width: 100%;
    }

    .video-container video {
        position: absolute;
        z-index: 0;
        bottom: 0;
    }

    .video-container video.fillWidth {
        width: 100%;
    }
</style>
</style>
<div class="homepage-hero-module" >
    <div >
        <div class="filter"></div>
        <video autoplay loop class="fillWidth">
            <source src="assets/video/Sunset-Lapse.mp4" type="video/mp4" />
        </video>
        <div class="container" style="position:absolute;z-index:999999;top:0px;width:100%;margin-top:5%" ng-controller="partnerController" id="partnerController">
            <div class="row">
                <div style="width:400px;margin:auto">
                    <h1 class="text-center login-title"><img src="assets/images/logo.png"/></h1>
                    
                    <div class="account-wall login">
                        <form id="partner_formlogin" action="" class="form-signin" method="post">
                            
                            <div class="alert alert-block alert-success fade in" style="display: none;">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" required maxlength="100" id="username" name="username" ng-model="partner.username" placeholder="Username" autofocus autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" required maxlength="100" name="password" ng-model="partner.password" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <button class="btn  btn-green btn-block  " id="btnsubmit" type="submit" style="margin-bottom: 20px;">Sign in</button>
                            
                            <a href="#/partnerforgotpassword" class="pull-right need-help">Forgot your password? </a><span class="clearfix"></span>
                        </form>
                    </div>
                    <div class="account-wall reset" style="display: none;">
                        <form id="partner_formreset" action="" class="form-signin" method="post">
                            
                            <div class="alert alert-block alert-success fade in" style="display: none;">
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" required maxlength="100" name="newpassword" ng-model="partner.newpassword" placeholder="New Password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" required maxlength="100" name="confirmpassword" ng-model="partner.confirmpassword" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                            <button class="btn  btn-primary btn-block" id="btnreset" type="submit">Submit</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="application/javascript">

function scaleVideoContainer() {

    var height = $(window).height() + 5;
    var unitHeight = parseInt(height) + 'px';
    $('.homepage-hero-module').css('height',unitHeight);

}

function initBannerVideoSize(element){

    $(element).each(function(){
        $(this).data('height', $(this).height());
        $(this).data('width', $(this).width());
    });

    scaleBannerVideoSize(element);

}

function scaleBannerVideoSize(element){

    var windowWidth = $(window).width(),
    windowHeight = $(window).height() + 5,
    videoWidth,
    videoHeight;


    $(element).each(function(){
        var videoAspectRatio = $(this).data('height')/$(this).data('width');

        $(this).width(windowWidth);

        if(windowWidth < 1000){
            videoHeight = windowHeight;
            videoWidth = videoHeight / videoAspectRatio;
            $(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});

            $(this).width(videoWidth).height(videoHeight);
        }

        $('.homepage-hero-module .video-container video').addClass('fadeIn animated');

    });
}

    $(document).ready(function () {

        

        $('#partner_formlogin').bootstrapValidator({
            submitHandler: function (validator, form, submitButton) {
                angular.element(document.getElementById('partnerController')).scope().partnerLogin();
                $("#btnsubmit").attr("disabled", false);
            },
            framework: 'bootstrap',
            fields: {
                
                username: {
                    validators: {
                        notEmpty: {
                            message: 'Enter your username'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Enter your password'
                        }
                    }
                },
             
            }

        });

        $('#partner_formreset').bootstrapValidator({
            submitHandler: function (validator, form, submitButton) {
                angular.element(document.getElementById('partnerController')).scope().partnerLoginReset();
                $("#btnreset").attr("disabled", false);
            },
            framework: 'bootstrap',
            fields: {
                
                newpassword: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                        identical: {
                            field: 'confirmpassword',
                            message: 'The password does not match the confirm password'
                        },
                    }
                },

                confirmpassword: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                        identical: {
                            field: 'newpassword',
                            message: 'The password does not match the confirm password'
                        },
                    }
                },
             
            }

        });


    });



</script>