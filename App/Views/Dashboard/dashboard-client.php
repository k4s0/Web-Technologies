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
                <li class="active"><a href="/Home/index">HOME</a></li>
                <li><a href="/Shop/index">NEGOZIO</a></li>
                <li class="dropdown">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <?php echo $_SESSION['user'] ?>
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

<div class="container" id="bt-client">

    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <a  id="showOrder"  class="btn btn-primary btn-lg clientButton" type="button">
                Visualizza Ordini
            </a>
        </div>
        <div class="col-xs-2"></div>
    </div>
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <a href="/Dashboard/modifyDataUser"  class="btn btn-primary btn-lg clientButton" type="button">
                Modifica Dati
            </a>
        </div>
        <div class="col-xs-2"></div>
    </div>
</div>
<div class="container">
    <div class="row">

        <div align="center" id="client-table">

        </div>


    </div>

    <div class="row">
        <div class="col-xs-2">

        </div>
        <div align="center" class="col-xs-8" >
            <a class="btn btn-primary btn-lg" id="client-btn-dash" href="/Dashboard/index" style="display: none;">Torna alla dashboard</a>
        </div>
        <div class="col-xs-2">

        </div>

    </div>

</div>