<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Home</title>
    <?php include '../App/Views/head.php'; ?>
</head>
<body>
<?php
if (isset($_SESSION['user'])) {
    if($_SESSION['permission']!=0){
        include '../App/Views/menu-bar-producer.php';
    }else{
        include '../App/Views/menu-bar-client-home.php';
    }

} else {
    include '../App/Views/menu-bar.php';
    include '../App/Views/login-modal.php';
}
?>
<!-- SLIDER Start
================================================== -->


<section id="slider-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="/Assets/images/slider.jpg" alt="cibo 3">
                        </div>

                        <div class="item">
                            <img src="/Assets/images/slider1.jpg" alt="cibo 2">
                        </div>

                        <div class="item">
                            <img src="/Assets/images/slider2.jpg" alt="cibo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FEATURES Start
================================================== -->

<section id="features">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-left" href="#">
                            <i class="fa fa-mobile-alt"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Ordina Veloce</h4>
                            <p>Ordina direttamente dalla nostra comoda App..</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-left" href="#">
                            <i class=" fa fa-utensils"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Piatti Gustosi</h4>
                            <p>Scegliamo solo gli alimenti più freschi e gustosi. Tutto a KM 0.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="media">
                        <div class="pull-left" href="#">
                            <i class=" fa fa-shipping-fast"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Consegna Lampo</h4>
                            <p>Spediamo in men che non si dica il tuo prodotto!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Mission -->
<section>
    <div class="container" style="background-color: lightgrey; border-radius: 40% 0% 40% 0%">
        <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-8"><div class="block-heading">
                    <h2>MISSION</h2>
                </div></div>
            <div class="col-xs-2"></div>
        </div>
        <div class="row" align="center">
            <div class="col-xs-2"></div>
            <div class="col-xs-8" style="font-size: 18px;">
                <p><span style="color:#df3039;">Food Fighters</span> non è un servizio ma una necessità.</br> La necessita di centinaia di studenti che si trovano a dover affrontare dopo intense ore di studio il nemico più terribile:<dt>LA FAME.</dt>
                    E' l'opportunità decisiva per decine di attivtà di ristorazione che vogliono investire nella risorsa più importante di questa città:</br><dt>I RAGAZZI DEL CAMPUS.</dt>L'ora di pranzo universitaria è una lotta e c'è solo un'arma per combatterla
                <dt style="color:#df3039;"></br>Food Fighters.</dt>
                </p>
            </div>
            <div class="col-xs-2"></div>
        </div>
    </div>
</section>


<!-- CATAGORIE Start
    ================================================== -->

<section id="catagorie">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-heading">
                        <h2>COSA OFFRIAMO</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <a href="/Shop/index" class="catagotie-head">
                                    <img src="/Assets/images/prodotti/filetto.jpg" alt="...">
                                    <h3>Filetto di Manzo con Patatine</h3>
                                </a>
                                <div class="caption">
                                    <br>-Filetto di Manzo scelto</br>-Patate BIO
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <a href="/Shop/index" class="catagotie-head">
                                    <img src="/Assets/images/prodotti/sugo.jpg" alt="...">
                                    <h3>Pasta al sugo con olive nere</h3>
                                </a>
                                <div class="caption">
                                    <br>-Pasta integrale</br>-Passata con pomodoro DOP</br>-Olive nere pugliesi</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <a href="/Shop/index" class="catagotie-head">
                                    <img style="height: 220px" src="/Assets/images/prodotti/insalata.jpg" alt="...">
                                    <h3>Insalata con pollo croccante</h3>
                                </a>
                                <div class="caption">
                                    <p>-Insalata a Km 0</br>-Pollo ruspante allevato a terra</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../App/Views/footer.php'; ?>

</body>
</html>


