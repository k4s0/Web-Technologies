<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Upload extends \Core\Model
{

    public static function uploadImage($filetype, $allowed, $file, $user, $file_tmp, $productName, $description, $price, $category)
    {
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("upload/" . $user . "/" . $file)) {
                echo $file . " gia' presente.";
            } else {
                if (!mkdir("upload/" . $user, 777, true)) {
                    echo('Impossibile creare cartella.');
                }
                if (move_uploaded_file($file_tmp, "upload/" . $user . "/" . $file)) {
                    echo "La tua foto è stata caricata con successo.";

                } else {
                    echo "errore spostamento cartella";
                }

            }
            self::uploadDBImage("/upload/" . $user . "/" . $file, $user, $productName, $description, $price, $category);
        } else {
            echo "Errore: C'e' stato un errore durante l'upload della foto. Ritenta.";
        }
    }

    private static function uploadDBImage($path, $user_id, $productName, $description, $price, $category)
    {
        try {
            $db = static::getDB();

            $sql = "INSERT INTO products (producer_id, productName, availability, description, productPrice, category, image_path)
                    VALUES ('$user_id', '$productName', 1, '$description', '$price', '$category', '$path')";
            $db->exec($sql);
            unset($db);
        } catch (PDOException $e) {
            die("ERROR" . $e->getMessage());
            unset($db);
        }


    }

}
