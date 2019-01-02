<?php

namespace App\Models;

use PDO;
use \PDOException;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Categories extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT category_id,name FROM categories');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     *Delete a category
     *
     */
    public static function deleteCategory($id)
    {
        $db = static::getDB();
        try {
            $sql = "DELETE FROM categories WHERE category_id = '$id'";
            $db->exec($sql);
            unset($db);
        } catch (PDOException $e) {
            return "DB problems";
        }
        return self::getAll();
    }

    public static function addCategory($name){
        try{
            $db = static::getDB();
            $sql = "INSERT INTO categories (name) VALUES ('$name')";
            $db->exec($sql);
        }catch (PDOException $e){
            return "DB problems";
        }
        return "ok";

        /*$db = static::getDB();
        try {
            $sql = "INSERT INTO users (name, lastname, email, username, password, permission) VALUES ('$name', '$lastname','$email','$username','$pwd','$permission')";
            $db->exec($sql);
            $last_id = $db->lastInsertId();
            $sql = "INSERT INTO client (client_id,address,birthday) VALUES ('$last_id', '$adddress','$birth')";
            $db->exec($sql);
        } catch (PDOException $e) {
            unset($db);
            return 1;
        }
        return 0;*/
    }
}
