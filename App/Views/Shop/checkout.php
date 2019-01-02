<!DOCTYPE html>
<html lang="it">
<head>
    <title>Checkout</title>
    <?php include '../App/Views/head.php'; ?>
</head>
<body>
<?php include '../App/Views/menu-bar-client-home.php' ?>


<div class="container">
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8"></div>
        <table class="table table-hover" id="tableCheckout">
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
    </div>
</div>


<div class="container">
        <?php
        $producers = [];
        for($i = 0; $i < sizeof($products); $i++){
            $producers[$i] = $products[$i][1];
        }
        array_unique($producers);
        foreach ($coupon as $c){
            if(in_array($c['producer_id'], $producers) && $c['client_id'] == $client_id){
                echo
                    '<div class="row">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-8">
                        <div class="checkbox">
                            <label><input type="checkbox" class="coupon" value="">' .$c['companyName']. '<span  class = "badge">' .$c['ammount']. '€</span></label>
                             <input type="hidden" id="coupon_id" value=" '.$c['coupon_id'].'">
                             <input type="hidden" id="producer_id" value=" '.$c['producer_id'].'">
                             <input type="hidden" id="client_id" value=" '.$c['client_id'].'">
                             <input type="hidden" id="ammount" value=" '.$c['ammount'].'">
                             <input type="hidden" id="companyName" value=" '.$c['companyName'].'">
                        </div>
                    </div>
                    <div class="col-xs-2"></div>
                </div>';
            }
        }
        ?>

    <div class="row">
        <div class="col-md-2" style="padding-bottom: 100px">
            <select id="placeSelectMenu"  class="form-control">
                <?php
                echo '<option selected>'.'Ingresso'.'</option>';
                foreach ($places as $p)
                {
                    if($p['place_id'] !== "Ingresso")
                        echo '<option value="' . $p['place_id'] . '">' . $p['place_id'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="col-md-8">

        </div>
        <div class="col-md-2">

        </div>
    </div>


    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8" align="center" style="padding-bottom: 200px">
            <a href="/Dashboard/index"><button  type="button" id="completeOrder" class="btn btn-primary">Completa l'ordine</button></a>
        </div>
        <div class="col-xs-2">

        </div>
    </div>
</div>




<?php
if(isset($_SESSION['coupons'])){
    $_SESSION['coupons'] = [];
}
?>
<?php include '../App/Views/footer.php'; ?>
<script src="/Assets/js/checkbox.js" type="text/javascript"></script>
<script src="/Assets/js/makeOrder.js" type="text/javascript"></script>

</body>
</html>