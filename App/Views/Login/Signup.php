<!DOCTYPE html>
<html lang="it">
<head>
    <title>SignUp Page</title>
    <?php include '../App/Views/head.php'; ?>
</head>
<body>
<?php include '../App/Views/menu-bar.php' ?>
<?php include '../App/Views/login-modal.php' ?>


<?php
if ($type == 0) {
    echo '
<div class="container">
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8"><h1 align="center">Pagina Registrazione Cliente</h1></div>
        <div class="col-xs-2"></div>
    </div>
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <form action="/Login/signup" method="post">
                <input type="hidden" name="code" value="0">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="lastnome">Cognome:</label>
                    <input type="text" class="form-control" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="pwd" required>
                </div>
                <div class="form-group">
                    <label for="address">Indirizzo:</label>
                    <input type="text" class="form-control" name="address" required>
                </div>
                <div class="form-group">
                    <label for="birth">Data di Nascita:</label>
                    <input type="date" class="form-control" name="birth" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-default ">Registrati !</button>
                </div>
            </form>
        </div>
        <div class="col-xs-2"></div>
    </div>
</div>
';
} else {
    echo '
<div class="container">
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8"><h1 align="center">Pagina Registrazione Fornitore</h1></div>
        <div class="col-xs-2"></div>
    </div>
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <form action="/Login/signup" method="post">
                <input type="hidden" name="code" value="1">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="lastnome">Cognome:</label>
                    <input type="text" class="form-control" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="companyname">Nome Produttore:</label>
                    <input type="text" class="form-control" name="companyname" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="pwd" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-default ">Registrati !</button>
                </div>
            </form>
        </div>
        <div class="col-xs-2"></div>
    </div>
</div>
';
}
?>

<?php include '../App/Views/footer.php'; ?>

</body>
</html>


