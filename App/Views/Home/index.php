<!DOCTYPE html>
<html lang="it">
<head>
    <title>Home</title>
    <?php include '../App/Views/head.php'; ?>
</head>
<body>
<?php
if(isset($_SESSION['user'])){
    include '../App/Views/menu-bar-user.php';
}else{
    include '../App/Views/menu-bar.php';
    include '../App/Views/login-modal.php';
}
?>


<?php include '../App/Views/footer.php'; ?>

</body>
</html>


