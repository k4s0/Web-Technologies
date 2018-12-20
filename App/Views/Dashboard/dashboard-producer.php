<!-- LOGO Start
    ================================================== -->

<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="#">
                    <img class="logo" src="/Assets/images/logo.jpg" alt="logo">
                </a>
            </div>
        </div>
    </div>
</header>


<!-- MENU Start
================================================== -->

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fliud">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav nav-main">
                <li class="active"><a href="/Home/Index">HOME</a></li>
                <li><a href="/Home/Shop">USER</a></li>

                <li class="dropdown">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        USER
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/Login/logout">
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- BUTTONS start
=================================================-->

<div class="container" id="bt-producer">
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <button id="showProducerOrder" style="width: 100%" class="btn btn-primary btn-lg">
                Visualizza Ordini
            </button>
        </div>
        <div class="col-xs-2"></div>
    </div>
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <button href="#" style="margin-bottom: 100px; margin-top: 10%; width:100%" class="btn btn-primary btn-lg">
                Modifica Dati
            </button>
        </div>
        <div class="col-xs-2"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-2">

        </div>
        <div class="col-xs-8" id="producer-table">

        </div>
        <div class="col-xs-2">

        </div>

    </div>

    <div class="row">
        <div class="col-xs-2">

        </div>
        <div align="center" class="col-xs-8" >
            <a class="btn btn-primary btn-lg" id="producer-btn-dash" href="/Dashboard/index" style="display: none;">Torna alla dashboard</a>
        </div>
        <div class="col-xs-2">

        </div>

    </div>

</div>