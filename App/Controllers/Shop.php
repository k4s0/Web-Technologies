<?php
/**
 * Created by PhpStorm.
 * User: Simone Del Gatto
 * Date: 19/12/2018
 * Time: 15:17
 */
namespace App\Controllers;

use App\Models\User;
use Core\Model;
use \Core\View;

/**
 * Login controller
 *
 * PHP version 7.0
 */
class Shop extends \Core\Controller
{


    /**
     * Show the registration page for new users.
     *
     * @return void
     */
    public function indexAction()
    {
        View::render('Shop/index.php');
    }

    /**
     * Receive new user data with an ajax request.
     *
     * @return void
     */
    public function checkoutAction()
    {

        View::render('Shop/checkout.php');

    }


}