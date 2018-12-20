<?php
/**
 * Created by PhpStorm.
 * User: Simone Del Gatto
 * Date: 19/12/2018
 * Time: 15:17
 */
namespace App\Controllers;

use \App\Models\Products;
use \Core\View;

/**
 * Login controller
 *
 * PHP version 7.0
 */
class Shop extends \Core\Controller
{


    /**
     * Show the registration page for new users.
     *
     */
    public function indexAction()
    {   session_start();

        $products = new Products();
        $dataArr = $products::getAll();
        View::render('Shop/index.php', array('data' => $dataArr));
    }

    /**
     * Receive new user data with an ajax request.
     *
     */
    public function checkoutAction()
    {
        session_start();
        if(isset($_SESSION['products'])){
            View::render('Shop/checkout.php', array('products' => $_SESSION['products']));
        } else {
            View::render('Dashboard/Deny');
        }


    }

    /**
     * update the current client chart
     */
    public function updateCartAction(){
        session_start();
        $products = 'nothing';
        if (isset($_POST['products'])) {
            $products= $_POST['products'];
            $_SESSION['products'] = $products;
            echo json_encode($_SESSION['products']);
        }

    }

    /**
     * if session is started return the current chart
     */
    public function requestChart(){
        session_start();
        if(isset($_SESSION['products'])){
            echo json_encode($_SESSION['products']);
        }

    }


}