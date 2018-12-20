<!DOCTYPE html>
<html lang="it">
<head>
    <title>Checkout</title>
    <?php include '../App/Views/head.php'; ?>
</head>
<body>
<?php include '../App/Views/menu-bar-user.php' ?>


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



            <?php
            foreach ($products as $p){
                echo '
                <tr>
                    <td><img class="checkoutIMG" src="'. $p[4] .'" alt=""></td>
                    <td>'. $p[0] .'</td>
                    <td>'. $p[6] .'</td>
                    <td>'. $p[3] .'</td>
                    <td>'. $p[2] .'</td>
                </tr>';
            }
            ?>

            </tbody>
        </table>
        <div class="col-xs-2"></div>
    </div>
</div>



<?php include '../App/Views/footer.php'; ?>
<script src="/Assets/js/total.js" type="text/javascript"></script>

</body>
</html>