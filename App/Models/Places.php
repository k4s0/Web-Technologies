<?php

namespace App\Models;

use PDO;

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
}
