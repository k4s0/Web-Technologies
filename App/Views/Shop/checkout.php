<!DOCTYPE html>
<html lang="it">
<head>
    <title>Checkout</title>
    <?php include '../App/Views/head.php'; ?>
</head>
<body>
<?php include '../App/Views/menu.php' ?>


<div class="container">
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8"></div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Immagine</th>
                <th>Nome</th>
                <th>Fornitore</th>
                <th>Prezzo (€)</th>
                <th>Quantità</th>
                <th>Totale</th>
            </tr>
            </thead>
            <tbody id="table">
            <tr>
                <td><img class="checkoutIMG" src="/Assets/images/product-image-4.jpg" alt=""></td>
                <td>Pizza</td>
                <td>Latte Divino</td>
                <td>2.50</td>
                <td>2</td>
            </tr>
            <tr>
                <td><img class="checkoutIMG" src="/Assets/images/product-image-2.jpg" alt=""></td>
                <td>Patatine</td>
                <td>Latte Divino</td>
                <td>2.50</td>
                <td>2</td>
            </tr>
            <tr>
                <td><img class="checkoutIMG" src="/Assets/images/product-image-3.jpg" alt=""></td>
                <td>kebab</td>
                <td>Latte Divino</td>
                <td>2.50</td>
                <td>2</td>
            </tr>
            </tbody>
        </table>
        <div class="col-xs-2"></div>
    </div>
</div>

<?php include '../App/Views/footer.php'; ?>
<script src="/Assets/js/total.js" type="text/javascript"></script>

</body>
</html>