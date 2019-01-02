
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
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div align="center" class="col-md-8">
            <h2>CATEGORIE PRODOTTI</h2>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <table id="categoryTable" class="table table-hover" id="tableCheckout">
                <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Elimina</th>
                </tr>
                </thead>
                <tbody id="table">

                <?php
                if(isset($categories)){
                    foreach ($categories as $c) {
                        echo '
                <tr>
                    <td>'.$c['name'].'</td>
                    <td><button type="button" class="btn btn-danger deleteCategory">Elimina</button>
                    <input type="hidden" class="category_id" value=" '.$c['category_id'].'"></td>
                </tr>';
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-xs-2"></div>
    </div>
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <input type="text" class="form-control" id="cat_name_input"/>
        </div>
        <div class="col-xs-2"></div>
    </div>

    <div class="row">
        <div class="col-xs-2"></div>
        <div class="align-items-center col-xs-8">
            <td><button type="button" class="btn btn-success" id="addCategory">Aggiungi Categoria</button>
        </div>
        <div class="col-xs-2"></div>
    </div>

</div>
