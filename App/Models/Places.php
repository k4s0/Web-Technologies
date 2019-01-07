<?php

namespace App\Models;

use PDO;
use \PDOException;

/**
 * All delivery places
 */
class Places extends \Core\Model
{

    /**
     * Get all the delivery places as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM places');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function deletePlace($id){
        $db = static::getDB();
        try {
            $sql = 'DELETE FROM places WHERE place_id = "'.$id.'"';
            $db->exec($sql);
            unset($db);
        } catch (PDOException $e) {
            return "DB problems";
        }
        return $sql;
    }

    public static function addPlace($place_id){
        try{
            $db = static::getDB();
            $sql = 'INSERT INTO places (place_id) VALUES ("'.$place_id.'")';
            $db->exec($sql);
        }catch (PDOException $e){
            return "DB problems";
        }
        return "ok";
    }
}
