<div class="container">
    <nav class="navbar navbar-inverse">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="http://uniserb.com" class="navbar-brand">UniSerb</a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        
    </nav>
</div>
<div class="container" ng-controller="adminController" ng-init="initLogin();">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-5 col-md-offset-4 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading" style="background-color:#209444;color:white">
                        <div class="panel-title">Sign In as Admin</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="username" type="text" class="form-control" name="username" value="" placeholder="enter your username">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="enter your password">
                                    </div>
                                    

                                
                        


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                    <button type="button" ng-click="checkLogin()" class="btn btn-green">Login</button>

                                    </div>
                                </div>


                               
                            </form>     



                        </div>                     
                    </div>  
        </div>
        
    