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

    /**
     * Get all product of a specified producer_id
     * @param $producer_id
     * @return product array
     */
    public static function getProducerProduct($producer_id)
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT product_id,productName,productPrice,description,image_path FROM products WHERE producer_id = '$producer_id' ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function deleteProduct($product_id, $producer_id)
    {
        $db = static::getDB();
        try {
            $sql = "DELETE FROM products WHERE producer_id = '$producer_id' AND product_id = '$product_id'";
            $db->exec($sql);
        } catch (PDOException $e) {
            unset($db);
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
        unset($db);
        return true;
    }
}