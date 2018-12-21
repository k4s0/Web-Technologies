<?php

namespace App\Controllers;

use \App\Models\MakeOrder;

/**
 * Order controller
 */
class Order extends \Core\Controller
{

    /**
     * Make an order
     */
    public function makeOrderAction()
    {
        session_start();
        $msg = MakeOrder::insertOrder();

        echo json_encode($msg);
    }
}