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
}