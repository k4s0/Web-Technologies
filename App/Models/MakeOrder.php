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
    public static function insertOrder()
    {

        if(isset($_SESSION['products'])) {
            $products = $_SESSION['products'];

            while (!empty($products)) {

                self::composeArray($products[0], $products);
                $products = $_SESSION['products'];
            }

            
        }
    }

    private static function toStringOrder($order){
        $string = '';
        foreach ($order as $product){
            $string = $string .'product: ' .$product[0]. ' qnt: ' . $product[2] . '<br/> ';
        }
        return $string;
    }

    private static function insertIntoDB($producer_id, $description){
        $client_id = $_SESSION['user_id'];
        $date = date('Y-m-d');
        try{
            $db = static::getDB();

            $sql = "INSERT INTO orders (client_id, producer_id, state, date, deliveryPlace, description) 
                        VALUES ('$client_id', '$producer_id',0,'$date','a casa tua','$description')";

            $db->exec($sql);
            unset($db);
            return true;
        } catch (PDOException $e){
            unset($db);
            return false;
        }
    }

    private static function composeArray($p0, $products){
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

            $string =  self::toStringOrder($toSend);
            $problem = self::insertIntoDB($p0[1], $string);

            if($problem !== true){
                return "Error in  DB";
            }

            $_SESSION['products'] = $products;

    }
}
