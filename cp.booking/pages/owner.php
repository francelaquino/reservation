<div class="container" ng-controller="ownerController">
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
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="javscript:void(0)">Property
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#/owner/createproperty">Add New Property</a>
                        </li>
                        <li>
                            <a href="#/owner/properties">List of Properties</a>
                        </li>
                       
                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="javscript:void(0)">Booking
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#/owner/bookedproperty">Booked Property</a>
                        </li>
                        <li>
                            <a href="#/owner/confirmbooking">Confirmed Booking</a>
                        </li>
                        <li>
                            <a href="#/owner/canceledbooking">Canceled Booking</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#/ownerlogin">Logout</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
            <li><span style="line-height:50px;color:orange;margin-right:20px">Property Owner Control Panel</span></li>
                
                <li><span style="line-height:50px;color:white;margin-right:5px">Welcome : {{ firstname }}</span></li>
            </ul>
        </div>
    </nav>
</div>
<div class="container">
    <div ui-view>

    </div>
</div>
