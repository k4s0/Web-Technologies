<?php


namespace App\Models;

use PDO;

/**
 * Model for coupon management
 */
class Total extends \Core\Model{


    /**
     * calculate total prize of orders
     */
    public static function getTotal(){
        session_start();

        $total = 0;
        if(isset($_SESSION['products'])){
            foreach ($_SESSION['products'] as $p) {

                $total += $p[2] * $p[3];
            }

            if(isset($_SESSION['coupons'])){
                foreach ($_SESSION['coupons'] as $c){
                    $total-= $c['ammount'];
                }
            }
            return $total < 0 ? 0 : $total;

        } else {
            return "PROBLEM: NO PRODUCTS IN CHART";
        }








    }
}