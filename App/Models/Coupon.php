<?php


namespace App\Models;

use PDO;

/**
 * Model for coupon management
 */
class Coupon extends \Core\Model
{

    /**
     * Get all the coupon as an associative array
     *
     *
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM coupon as c JOIN producer as p ON(c.producer_id = p.ID)');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function releaseCoupons($id_producer, $amount){

        try{
            $db = static::getDB();
            $stmt = $db->query('SELECT client_id FROM client');
            $client = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($client as $c){
                $client_id = $c['client_id'];
                $sql = "INSERT INTO coupon (producer_id, client_id, ammount) 
                        VALUES ('$id_producer','$client_id',' $amount')";
                $db->exec($sql);
            }
        } catch (PDOException $e){
            unset($db);
            return "DB error";
        }
        unset($db);
        return "ok";
    }
}