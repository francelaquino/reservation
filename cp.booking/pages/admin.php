<div class="container" >
    <nav class="navbar navbar-inverse">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="http://10.80.39.54/booking/index.php" class="navbar-brand">UniSerb</a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">Property Owner
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#/admin/propertyownerforapproval">Registrations For Approval</a>
                        </li>
                        <li>
                            <a href="#/admin/propertyowner">Registered Propery Owner</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">Properties
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#/admin/propertiesforapproval">Properties For Approval</a>
                        </li>
                        <li>
                            <a href="#/admin/approvedproperties">Approved Properties</a>
                        </li>
                    </ul>
                </li>
               
               
            </ul>

            <ul class="nav navbar-nav navbar-right">
            <li><span style="line-height:50px;color:orange">Admin Control Panel</span></li>
                <li>
                
                    <a href="#/adminlogin">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div class="container">
    <div ui-view>

    </div>
</div>
