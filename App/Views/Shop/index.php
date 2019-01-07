<!DOCTYPE html>
<html lang="it">
<head>
    <title>Shop</title>
    <?php include '../App/Views/head.php'; ?>
</head>
<body>
<?php
if(isset($_SESSION['user'])){
    include '../App/Views/menu-bar-client.php';
}else{
    include '../App/Views/menu-bar.php';
    include '../App/Views/login-modal.php';
}

?>
<div class="container">
    <div class="row" align="center" style="margin-bottom: 20px;">
        <div class="col-xs-2"></div>
        <div class="col-xs-8"><h1>Negozio</h1></div>
        <div class="col-xs-2"></div>
    </div>
</div>



<section id="products">
    <div class="container">
        <div class="row">

            <?php
            foreach ($data as $row) {
                echo '
            <div class="col-md-3">
                <div class="products">
                    <img class="product_image" src="..'. $row['image_path'].'" alt="'.$row['description'].'">
                    <h4>' .$row['productName'] . '</h4>
                    <h7>' .$row['companyName'] . '</h7>
                    <p class="price">' . $row['productPrice'] . '€</p>
                    <a class="view-link shutter">
                        <i class="fa fa-plus-circle"></i>Add To Cart</a>
                        <input type="hidden" id="producer_id" value=" '.$row['producer_id'].'">
                        <input type="hidden" id="product_id" value=" '.$row['product_id'].'">
                </div>
            </div>';
            }
            ?>
        </div>
    </div>
</section>



<?php include '../App/Views/footer.php'; ?>
<script src="/Assets/js/addChart.js"></script>

</body>
</html>


