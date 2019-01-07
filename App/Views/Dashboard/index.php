<!DOCTYPE html>
<html lang="it">
<head>
    <title>User Dashboard</title>
    <?php include '../App/Views/head.php'; ?>
</head>
<body>
<?php
if ($code == 0) {
    include '../App/Views/Dashboard/dashboard-client.php';
} elseif($code == 1){
    include '../App/Views/Dashboard/dashboard-producer.php';
} else {
    include '../App/Views/Dashboard/dashboard-admin.php';
}
?>
<?php include '../App/Views/footer.php'; ?>
<script src="/Assets/js/ajax.js"></script>
<script src="/Assets/js/categories-manager.js" type="text/javascript"></script>
<script src="/Assets/js/places-manager.js" type="text/javascript"></script>
</body>
</html>