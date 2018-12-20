<?php

namespace App\Models;

use PDO;

/**
 * Model for recover products
 *
 * PHP version 7.0
 */
class Products extends \Core\Model
{

    /**
     * Get all the products as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM products as pr JOIN producer as pd ON(pr.producer_id = pd.ID)');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}