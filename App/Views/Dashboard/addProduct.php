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
<div class="container">
    <div id="prod_producer_table">
    <div align="center" class="row" >
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <h2 class="modify-data">I tuoi prodotti</h2>
        </div>
        <div class="col-xs-2"></div>
    </div>
    <div align="center" class="row">
        <div class="col-xs-12">
            <table class="table table-hover" id="tableCheckout">
                <thead>
                <tr>
                    <th>Immagine</th>
                    <th>Nome Prodotto</th>
                    <th>Prezzo (€)</th>
                    <th>Descrizione</th>
                    <th>Azioni</th>
                </tr>
                </thead>
                <tbody id="table">


                <?php
                foreach ($product as $p) {
                    echo '
                <tr>
                    <td><img class="checkoutIMG" src="' . $p['image_path'] . '" alt=""></td>
                    <td>' . $p['productName'] . '</td>
                    <td>' . $p['productPrice'] . '</td>
                    <td>' . $p['description'] . '</td>
                    <td><button value="'.$p['product_id'].'" class="btn btn-danger del">Elimina</button></td>
                </tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <div prod_producer_card>
    <div class="row" id="prod_producer_card">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">

            <?php
            foreach($product as $p)
                echo'<div class="card">
                    <img class="checkoutIMG" src="'. $p['image_path'] .'" alt="immagine prodotto">
                    <div class="card-body">
                    <h5 class="card-title">'.$p['productName'].'</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span class="productInfo">Price: </span> '.$p['productPrice'].'€</li>
                        <li class="list-group-item"><button value="'.$p['product_id'].'" class="btn btn-danger del">Elimina</button></li>
                    </ul>
                </div>
                </div>';
            ?>

        </div>
        <div class="col-xs-2"></div>
    </div>
    </div>






    <div align="center" class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <h2 class="modify-data">Aggiungi Prodotto</h2>
        </div>
        <div class="col-xs-2"></div>
    </div>
    <div align="center" class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <form action="/Dashboard/addProduct" method="post" enctype="multipart/form-data">
                <label for="fileSelect">Carica immagine:</label>
                <input type="file" name="photo" id="fileSelect">
                <div class="form-group">
                    <label for="productName">Nome prodotto:</label>
                    <input type="text" class="form-control"  name="productName" >
                </div>
                <div class="form-group">
                    <label for="comment">Descrizione prodotto:</label>
                    <textarea class="form-control" rows="5" name="productDesc"></textarea>
                </div>
                <div class="form-group">
                    <label for="productPrice">Prezzo prodotto:</label>
                    <input type="number" step="0.01" class="form-control"  name="productPrice" >
                </div>

                <div class="form-group">
                    <label for="sel1">Categoria prodotto:</label>
                    <select class="form-control" name="category">
                        <?php
                        foreach ($category as $c){
                            echo '<option>'.$c['category_id'].' '.$c['name'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <input id="addProduct" class="btn-lg" type="submit" value="Carica" id="addProductButton" name="submit">
            </form>
        </div>
        <div class="col-xs-2"></div>
    </div>
    <div class="row">
        <div class="col-xs-2">

        </div>
        <div align="center" class="col-xs-8" >
            <a class="btn btn-primary btn-lg" id="client-btn-dash" href="/Dashboard/index" >Torna alla dashboard</a>
        </div>
        <div class="col-xs-2">

        </div>

    </div>
</div>

<?php include '../App/Views/footer.php';?>
<script src="/Assets/js/deleteProduct.js" type="text/javascript"></script>
</body>
</html>