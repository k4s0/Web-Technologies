<?php

namespace App\Models;

use PDO;

/**
 * Make order
 *
 */
class MakeOrder extends \Core\Model
{


    /**
     * Create order in DB
     *
     */
    public static function insertOrder($selectedPlace)
    {

        if(isset($_SESSION['products'])) {
            $products = $_SESSION['products'];

            while (!empty($products)) {
                self::composeArray($products[0], $products, $selectedPlace);
                $products = $_SESSION['products'];
            }

            self::deleteCoupons();
        }
    }

    private static function deleteCoupons()
    {
        if (isset($_SESSION['coupons'])) {
            $coupons = $_SESSION['coupons'];

            foreach ($coupons as $key => $value){
                try{
                    $db = static::getDB();
                    $sql = "DELETE FROM coupon WHERE coupon_id = '$key'";
                    $db->exec($sql);
                } catch (PDOException $e){
                    unset($db);
                    return false;
                }
            }
            unset($db);
            $_SESSION['coupons'] = [];
        }
    }

    private static function toStringOrder($order, $isCouponUsed, $selectedPlace){
        $string = '';
        foreach ($order as $product){
            $string = $string .'product: ' .$product[0]. ' qnt: ' . $product[2] . ' <br/> ';
        }

        if($isCouponUsed === true){
            $string = $string . 'Utilizzato Coupon<br/>';
        }
        $string = $string . 'In consegna presso: ' . $selectedPlace ;
        return $string;
    }

    private static function insertIntoDB($producer_id, $description, $selectedPlace){
        $client_id = $_SESSION['user_id'];
        $date = date('Y-m-d');
        try{
            $db = static::getDB();
            $sql = "INSERT INTO orders (client_id, producer_id, state, date, deliveryPlace, description) 
                        VALUES ('$client_id', '$producer_id',0,'$date','$selectedPlace','$description')";
            $db->exec($sql);
            unset($db);
            return true;
        } catch (PDOException $e){
            unset($db);
            return false;
        }
    }

    private static function couponUsed($prod) {
        if(isset($_SESSION['coupons'])){
            $n = sizeof($_SESSION['coupons']);
            if($n > 0){
                $c = $_SESSION['coupons'];
                foreach ($c as $e){
                    if($e['producer_id'] === $prod){
                        return true;
                    }
                }
            }
        }
        return false;
    }

    private static function composeArray($p0, $products, $selectedPlace){
            $toSend = [];
            array_push($toSend, $p0);
            if (false !== $key = array_search($p0, $products)) {
                array_splice($products, $key, 1);
            }
            foreach ($products as $p1){
                if($p0[1] === $p1[1]){
                    array_push($toSend, $p1);
                    if (false !== $key = array_search($p1, $products)) {
                        array_splice($products, $key, 1);
                    }
                }
            }


            $isCouponUsed = self::couponUsed($p0[1]);
            $string =  self::toStringOrder($toSend, $isCouponUsed, $selectedPlace);
            $problem = self::insertIntoDB($p0[1], $string, $selectedPlace);

            if($problem !== true){
                return "Error in DB"; //you can use this value for notify error
            }

            $_SESSION['products'] = $products;

    }
}
