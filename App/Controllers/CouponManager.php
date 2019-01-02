<?php

namespace App\Controllers;

use \App\Models\Coupon;
use \Core\View;

/**
 * CouponManager controller
 *
 * PHP version 7.0
 */
class CouponManager extends \Core\Controller
{

    public function releaseCouponsAction(){
        session_start();
        if(isset($_SESSION['user_id']) && isset($_POST['amount'])){
            $msg = Coupon::releaseCoupons($_SESSION['user_id'], $_POST['amount']);
            echo json_encode($msg);
        } else {
            echo json_encode("problem");
        }


    }


}
