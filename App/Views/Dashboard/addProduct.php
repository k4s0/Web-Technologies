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
    <div align="center" class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <h2>I tuoi prodotti</h2>
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
                    <td><button id="del" value="'.$p['product_id'].'" class="btn btn-danger">Elimina</button></td>
                </tr>';
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
    <div align="center" class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <h2>Aggiungi Prodotto</h2>
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
                <input id="addProduct" type="submit" value="Carica" name="submit">
            </form>
        </div>
        <div class="col-xs-2"></div>
    </div>
</div>

<?php include '../App/Views/footer.php';?>
<script src="/Assets/js/deleteProduct.js" type="text/javascript"></script>
</body>
</html>