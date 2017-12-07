<style type="text/css">

body,html{
    overflow: hidden;
}

    .form-signin
{
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}





.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 50px;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    border-radius: 5px !important;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50% !important;
    -webkit-border-radius: 50% !important;
}
.need-help
{
    margin-top: 10px;
}


.form-group label{
    font-size: 17px;
    margin-bottom: 10px;
}

.form-group .form-control{
    padding:10px !important;
    height: 40px;

}

button{
    height: 40px !important;
    font-size: 18px !important;

}

.homepage-hero-module {
    border-right: none;
    border-left: none;
    position: relative;
}
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
}
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


<div class="homepage-hero-module">
    <div class="video-container">
        <div class="filter"></div>
        <video autoplay loop class="fillWidth">
            <source src="assets/video/Sunset-Lapse.mp4" type="video/mp4" />
        </video>
        <div class="container" style="margin-top: 5%;" ng-controller="partnerController" id="partnerController" ng-cloak>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title"><img src="assets/images/logo.png"/></h1>
            
                    <div class="account-wall login">
                        <form id="member_form" action="" class="form-signin" method="post">
                            
                            
                            <h4 class="text-center">Forgot Username and Password?</h4>
                            <div class="alert alert-block alert-success fade in" style="display: none;">
                            </div>
                            <div class="row" >
                                <div class="col-md-12">
                                    <p>To retrieve your username and password, type the full email address and we'll send you an e-mail with your login details.</p>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" class="form-control" required maxlength="100" id="username" name="username" ng-model="partners.email" placeholder="Email Address" autofocus autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            
                            <button class="btn  btn-primary btn-block" type="button" ng-click="recoverLoginDetails()">Submit</button>
                            
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

        scaleVideoContainer();

        initBannerVideoSize('.video-container .poster img');
        initBannerVideoSize('.video-container .filter');
        initBannerVideoSize('.video-container video');

        $(window).on('resize', function() {
            scaleVideoContainer();
            scaleBannerVideoSize('.video-container .poster img');
            scaleBannerVideoSize('.video-container .filter');
            scaleBannerVideoSize('.video-container video');
        });




    });



</script>