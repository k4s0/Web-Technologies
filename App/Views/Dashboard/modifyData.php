<!DOCTYPE html>
<html lang="it">
<head>
    <title>SignUp Page</title>
    <?php include '../App/Views/head.php'; ?>
</head>
<body>

<?php
if ($type == 0) {
    include '../App/Views/menu-bar-client.php';
    echo '
<div class="container">
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8"><h1 class="modify-data" align="center">Modifica Dati Cliente</h1></div>
        <div class="col-xs-2"></div>
    </div>
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <form action="/Dashboard/modify" method="post">
                <input type="hidden" name="code" value="0">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" value="' . $data["name"] . '"  name="name" required>
                </div>
                <div class="form-group">
                    <label for="lastnome">Cognome:</label>
                    <input type="text" class="form-control"  value="' . $data["lastName"] . '" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" value="' . $data["username"] . '" name="username" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control"  name="pwd" >
                </div>
                <div class="form-group">
                    <label for="address">Indirizzo:</label>
                    <input type="text" class="form-control" value="' . $data["address"] . '" name="address" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-default btn-lg ">Modifica !</button>
                </div>
            </form>
        </div>
        <div class="col-xs-2"></div>
    </div>
</div>
';
} else {
    include '../App/Views/menu-bar-producer.php';
    echo '
<div class="container">
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8"><h1 class="modify-data" align="center">Modifica Dati Fornitore</h1></div>
        <div class="col-xs-2"></div>
    </div>
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <form action="/Dashboard/modify" method="post">
                <input type="hidden" name="code" value="1">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" value="' . $data["name"] . '" name="name" required>
                </div>
                <div class="form-group">
                    <label for="lastnome">Cognome:</label>
                    <input type="text" class="form-control" value="' . $data["lastName"] . '"name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" value="' . $data["username"] . '" name="username" required>
                </div>
                <div class="form-group">
                    <label for="companyname">Nome Produttore:</label>
                    <input type="text" class="form-control" value="' . $data["companyName"] . '" name="companyname" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control"  name="pwd" >
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-default btn-lg">Modifica !</button>
                </div>
            </form>
        </div>
        <div class="col-xs-2"></div>
    </div>
</div>
';
}
?>
<div class="container back-to-dash">
    <div class="row">
        <div class="col-xs-2">

        </div>
        <div align="center" class="col-xs-8">
            <a class="btn btn-primary btn-lg" id="client-btn-dash" href="/Dashboard/index">Torna alla dashboard</a>
        </div>
        <div class="col-xs-2">

        </div>

    </div>

</div>

<?php include '../App/Views/footer.php'; ?>

</body>
</html>


