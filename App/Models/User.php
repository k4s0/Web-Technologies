<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model
{

    /**
     * Perform the user authentication.
     * @param string $user
     * @param string $pwd
     * @return true/false
     */
    public static function signin($user, $pwd)
    {
        $db = static::getDB();
        try {
            $sql = "SELECT ID,username,password FROM users WHERE username='$user'";
            $result = $db->query($sql);
            if ($result->rowCount() > 0) {
                $row = $result->fetch();
                $_SESSION['user_id'] = $row['ID'];
                if (password_verify($pwd, $row['password'])) {
                    return true;
                } else {
                    return false;
                }
            } else {
                die("No records matching your query were found.");
            }
        } catch (PDOException $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }

    /**
     * Insert new client into DB
     * @param string $name
     * @param string $lastname
     * @param string $username
     * @param string $email
     * @param string $pwd
     * @param string $adddress
     * @param string $birth
     * @param int $permission
     * @return true o false
     */
    public static function insertClient($name, $lastname, $username, $email, $pwd, $adddress, $birth, $permission)
    {
        $db = static::getDB();
        try {
            $sql = "INSERT INTO users (name, lastname, email, username, password, permission) VALUES ('$name', '$lastname','$email','$username','$pwd','$permission')";
            $db->exec($sql);
            $last_id = $db->lastInsertId();
            $sql = "INSERT INTO client (client_id,address,birthday) VALUES ('$last_id', '$adddress','$birth')";
            $db->exec($sql);
        } catch (PDOException $e) {
            unset($db);
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
        return true;
    }

    /**
     * Insert new producer into DB
     * @param string $name
     * @param string $lastname
     * @param string $username
     * @param string $companyname
     * @param string $email
     * @param string $pwd
     * @param int $permission
     * @return true o false
     */
    public static function insertProducer($name, $lastname, $companyname, $username, $email, $pwd, $permission)
    {
        $db = static::getDB();
        try {
            $sql = "INSERT INTO users (name, lastname, email, username, password,permission) VALUES ('$name','$lastname','$email','$username','$pwd','$permission')";
            $db->exec($sql);
            $last_id = $db->lastInsertId();
            $sql = "INSERT INTO producer (ID,companyName) VALUES ('$last_id','$companyname')";
            $db->exec($sql);
        } catch (PDOException $e) {
            unset($db);
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
        unset($db);
        return true;
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public static function showClientOrder($user_id)
    {
        $db = static::getDB();
        try {
            $sql = "SELECT order_id, date, state, description FROM orders WHERE client_id ='$user_id'";
            $result = $db->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            unset($db);

        }

    }

    /**
     * @param $user_id
     * @return mixed
     */

    public static function showProducerOrder($user_id)
    {
        $db = static::getDB();
        try {
            $sql = "SELECT order_id, date, state, description FROM orders WHERE producer_id ='$user_id'";
            $result = $db->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            unset($db);

        }
    }


}
