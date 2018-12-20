<!DOCTYPE html>
<html lang="it">
<head>
    <title>User Board</title>
    <?php include '../App/Views/head.php'; ?>
</head>
<body>
<?php
    if ($type == 0) {
         include '../App/Views/User/dashboardbar-client.php';
    }else {
        include '../App/Views/User/dashboardbar-producers.php';
    }
?>

<?php include '../App/Views/footer.php'; ?>

</body>
</html>