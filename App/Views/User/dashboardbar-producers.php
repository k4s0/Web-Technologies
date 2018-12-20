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
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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
                            <a data-toggle="modal" data-target="#ModalCliente" href="#">
                                Visualizza storico ordini
                            </a>
                        </li>
                        <li>
                            <a data-toggle="modal" data-target="#ModalFornitore" href="#">
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


<div class="container">
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-4">
            <button href="" class="btn btn-primary btn-outline btn-lg">
                Visualizza ordini in preparazione
            </button>
        </div>
        <div class="col-xs-4">
            <button href="" class="btn btn-primary btn-outline btn-lg">
                Modifica dati personali
            </button>
        </div>
        <div class="col-xs-2"></div>
    </div>
</div>