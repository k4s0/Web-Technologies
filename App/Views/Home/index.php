<!DOCTYPE html>
<html lang="it">
<head>
    <title>Home</title>
    <?php include '../App/Views/head.php'; ?>
</head>
<body>
<?php include '../App/Views/menu-bar.php' ?>
<?php include '../App/Views/login-modal.php' ?>

<select>
    <option value="">--- Select Category---</option>
    <?php
    foreach ($data as $row) {
        echo '<option value="' . $row['category_id'] . '">' . $row['name'] . '</option>';
    }
    ?>
</select>
<button id="ggwp" class="btn btn-primary">Send Ajax!!!</button>
<span id="ajax"></span>

<?php include '../App/Views/footer.php'; ?>

</body>
</html>


