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
                <li><a href="/Shop/index">NEGOZIO</a></li>
                <li class="cart dropdown">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        CARRELLO
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropup">
                        <span class="caret"></span>
                        <ul class="media-list">
                            <li class="media">
                                <img class="pull-left" src="/Assets/images/product-item.jpg" alt="">
                                <div class="media-body">
                                    <h6>Italian Sauce
                                        <span>$250</span>
                                    </h6>
                                </div>
                            </li>
                        </ul>
                        <button class="btn btn-primary btn-sm">Checkout</button>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        ACCEDI
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a data-toggle="modal" data-target="#ModalCliente" href="#">
                                Cliente
                            </a>
                        </li>
                        <li>
                            <a data-toggle="modal" data-target="#ModalFornitore" href="#">
                                Fornitore
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
