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
} else {
    include '../App/Views/Dashboard/dashboard-producer.php';
}
?>
<?php include '../App/Views/footer.php'; ?>
<script src="/Assets/js/ajax.js"></script>
</body>
</html>