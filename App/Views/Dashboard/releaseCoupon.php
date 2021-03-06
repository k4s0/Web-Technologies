<!DOCTYPE html>
<html lang="it">
<head>
    <title>User Uploader</title>
    <?php
    include '../App/Views/head.php';;
    include '../App/Views/menu-bar-producer.php';
    ?>
</head>
<body>


<div class="container" >
    <div class="row">
        <div class="col-md-2"></div>
        <div id="column" align="center" class="col-md-8">
            <h1 class="modify-data">Rilascia un coupon e attira i clienti!!!</h1>
            <input type="range" min="0.50" max="10" value="2.00" class="slider" step="0.01" id="sliderCoupon">
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div id="column" align="center" class="col-md-8">
            <button  type="button" id="release" class="btn btn-primary btn-lg">Rilascia</button>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div id="alerts" align="center" class="col-md-8"></div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-xs-2">

        </div>
        <div align="center" class="col-xs-8" >
            <a class="btn btn-primary btn-lg" id="client-btn-dash" href="/Dashboard/index">Torna alla dashboard</a>
        </div>
        <div class="col-xs-2">

        </div>

    </div>
</div>
<?php include '../App/Views/footer.php'; ?>
<script src="/Assets/js/releaseCoupon.js" type="text/javascript"></script>
</body>
</html>