<!DOCTYPE html>
<html lang="it">
<head>
    <title>Shop Signin</title>
    <?php
    include '../App/Views/head.php';
    include '../App/Views/menu-bar.php';
    include '../App/Views/login-modal.php';
    ?>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div align="center" class="col-md-8">
            <?php
                if($errorCode == 1){
                    echo "<h2>PASSWORD ERRATA</h2>";
                } else {
                    echo "<h2>UTENTE NON TROVATO</h2>";
                }
            ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php include '../App/Views/footer.php'; ?>
</body>
</html>