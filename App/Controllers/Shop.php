<?php
/**
 * Created by PhpStorm.
 * User: Simone Del Gatto
 * Date: 19/12/2018
 * Time: 15:17
 */
namespace App\Controllers;

use \App\Models\Products;
use \App\Models\Coupon;
use \App\Models\Total;
use \App\Models\Places;
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
        if(isset($_SESSION['permission'])){
            if($_SESSION['permission']!=0){
                die("sei fornitore");
            }else{
                $products = new Products();
                $dataArr = $products::getAll();
                View::render('Shop/index.php', array('data' => $dataArr));
            }

        }else{
            View::render('Shop/signin.php');
        }
    }

    /**
     * Receive new user data with an ajax request.
     *
     */
    public function checkoutAction()
    {
        session_start();

        $coupon = new Coupon();
        $dataArr = $coupon::getAll();
        $places = Places::getAll();
        if(isset($_SESSION['products']) && (!empty($_SESSION['products']))){
            View::render('Shop/checkout.php', array('products' => $_SESSION['products'], 'coupon' => $dataArr,
                'places' => $places, 'client_id' => $_SESSION['user_id']));
        } else {
            View::render('Dashboard/Deny');
        }


    }

    /**
     * update the current client chart
     */
    public function updateCartAction(){
        session_start();
        if (isset($_POST['products'])) {
            $products= $_POST['products'];
            $_SESSION['products'] = $products;
            echo json_encode($_SESSION['products']);
        } else if(isset($_POST['deleteAll'])){
            $_SESSION['products'] = [];
        }

    }

    /**
     * if session is started return the current chart
     */
    public function requestChartAction(){
        session_start();
        if(isset($_SESSION['products'])){
            echo json_encode($_SESSION['products']);
        }

    }

    /**
     * update coupon that client want use
     */
    public function addCouponAction(){
        session_start();
        if (isset($_POST['coupon_id']) && isset($_POST['producer_id']) && isset($_POST['client_id']) &&
                isset($_POST['ammount']) && isset($_POST['companyName'])) {

            $array = ['producer_id' => $_POST['producer_id'],
                'client_id' => $_POST['client_id'],
                'ammount' => $_POST['ammount'],
                'companyName' => $_POST['companyName']];

            $_SESSION['coupons'][$_POST['coupon_id']] = $array;
            echo json_encode($_SESSION['coupons']);
        }

    }

    /**
     * delete a coupon saved
     */
    public function deleteCouponAction(){
        session_start();

        if(isset($_POST['toDelete'])){
            unset($_SESSION['coupons'][$_POST['toDelete']]);
            echo json_encode($_SESSION['coupons']);
        }
    }

    /**
     * return the total
     */
    public function getTotalAction(){
        if(isset($_POST['msg'])){
            $t = new Total();
            $total = $t::getTotal();
            echo json_encode($total);
        }

    }
}