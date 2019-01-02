<!DOCTYPE html>
<html lang="it">
<head>
    <title>Correct submit</title>
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
            if($code == 0){
                echo "<h2>CLIENTE NON REGISTRATO: USERNAME O EMAIL GIA' PRESENTE</h2>";
            } else {
                echo "<h2>PRODUTTORE NON REGISTRATO: USERNAME O EMAIL GIA' PRESENTE</h2>";
            }
            ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php include '../App/Views/footer.php'; ?>
</body>
</html>