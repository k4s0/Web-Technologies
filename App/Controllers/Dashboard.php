<?php

namespace App\Controllers;

use App\Models\Products;
use App\Models\Upload;
use App\Models\User;
use \Core\View;
use \App\Models\Categories;
/**
 * Dashboard controller
 *
 * PHP version 7.0
 */
class Dashboard extends \Core\Controller
{

    /**
     * Show the Dashboard for the correct user page
     *
     */
    public function indexAction()
    {
        session_start();
        if (isset($_SESSION['permission'])) {
            $categories = Categories::getAll();
            View::render('Dashboard/index.php', array('code' => $_SESSION['permission'], 'categories' => $categories));
            die();
        } elseif (isset($_REQUEST['code'])) {

            $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_NUMBER_INT);
            $user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $pwd = $_POST['pwd'];
            $returnValue = User::signin($user, $pwd);
            if ($returnValue == 0) {
                if ($code == 0) {
                    $_SESSION['permission'] = 0;
                    $_SESSION['user'] = $user;
                    View::render('Dashboard/index.php', array('code' => $code));
                } elseif($code == 1) {
                    $_SESSION['permission'] = 1;
                    $_SESSION['user'] = $user;
                    View::render('Dashboard/index.php', array('code' => $code));
                } else {
                    $_SESSION['permission'] = 2;
                    $_SESSION['user'] = $user;

                    $categories = Categories::getAll();
                    View::render('Dashboard/index.php', array('code' => $code, 'categories' => $categories));
                }

            } else {
                View::render('Dashboard/error-login.php', array('errorCode' => $returnValue));
            }

        } else {
            echo 'Accesso Negato';
        }


    }


    public function showClientOrderAction()
    {
        session_start();
        $ajax_request = "nothing";
        if (isset($_POST['msg'])) {
            $ajax_request = User::showClientOrder($_SESSION['user_id']);
        }
        echo json_encode($ajax_request);
    }

    public function showProducerOrderAction()
    {
        session_start();
        $ajax_request = "nothing";
        if (isset($_POST['msg'])) {
            $ajax_request = User::showProducerOrder($_SESSION['user_id']);
        }
        echo json_encode($ajax_request);
    }

    /**
     * Increment the status order, when producer click on his dashboard button
     */
    public function changeOrderStatusAction()
    {
        $ajax_request = "nothing";
        if (isset($_POST['msg'])) {
            $order_id = $_POST['msg'];
            $ajax_request = User::changeOrderStatus($order_id);
        }
        echo json_encode($ajax_request);
    }

    /**
     *
     */
    public function modifyDataUserAction()
    {
        session_start();
        $dataUser = User::getDataUser($_SESSION['user_id'], $_SESSION['permission']);

        View::render("/Dashboard/modifyData.php", array('type' => $_SESSION['permission'], 'data' => $dataUser));
    }

    public function modifyAction()
    {
        session_start();
        $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_NUMBER_INT);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $companyname = filter_input(INPUT_POST, 'companyname', FILTER_SANITIZE_STRING);
        $pwd = $_POST['pwd'];
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        if ($code == 0) {
            $stmt = User::modifyClient($_SESSION['user_id'], $name, $lastname, $username, $pwd, $address);
            if ($stmt) {
                View::render('Dashboard/index.php', array('code' => $code));
            }
        } else {
            $stmt = User::modifyProducer($name, $lastname, $companyname, $username, $pwd, $_SESSION['user_id']);
            if ($stmt) {
                View::render('Dashboard/index.php', array('code' => $code));
            }
        }
    }

    public function showProductAction()
    {
        session_start();
        $array = Products::getProducerProduct($_SESSION['user_id']);
        View::render('Dashboard/addProduct.php', array('product' => $array));
    }

    public function deleteProductAction()
    {
        session_start();
        $product_id = $_POST['msg'];
        $status = Products::deleteProduct($product_id, $_SESSION['user_id']);
        echo json_encode($status);
    }

    public function addProductAction()
    {
        session_start();
        $productName = filter_input(INPUT_POST, 'productName', FILTER_SANITIZE_STRING);
        $productDesc = filter_input(INPUT_POST, 'productDesc', FILTER_SANITIZE_STRING);
        $productPrice = filter_input(INPUT_POST, 'productPrice', FILTER_SANITIZE_NUMBER_FLOAT);
        $category = 1;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if file was uploaded without errors
            if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["photo"]["name"];
                $filetype = $_FILES["photo"]["type"];
                $filesize = $_FILES["photo"]["size"];
                $fileTmp = $_FILES["photo"]["tmp_name"];

                // Verify file extension
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) die("Errore: inserisci un formato corretto.");

                // Verify file size - 5MB maximum
                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize) die("Errore: File piu' grande di 5mb.");

                // Verify MYME type of the file
                Upload::uploadImage($filetype, $allowed, $filename, $_SESSION['user_id'], $fileTmp, $productName, $productDesc, $productPrice, $category);

            } else {
                echo "Errore: " . $_FILES["photo"]["error"];
            }

        }
        echo json_encode(true);
    }

    public function releaseCouponAction(){
        session_start();
        View::render('Dashboard/releaseCoupon.php');
    }

    public function deleteCategoryAction(){
        $ajax = "problems";
        if(isset($_POST['toDelete']))
        {
            $ajax = Categories::deleteCategory($_POST['toDelete']);
        }
        echo json_encode($ajax);
    }

    public function addCategoryAction(){
        $ajax = "problems";
        if(isset($_POST["toAdd"])){
            $ajax = Categories::addCategory($_POST['toAdd']);
        }
        echo json_encode($ajax);
    }

}
