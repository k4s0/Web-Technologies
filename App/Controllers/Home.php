<?php

namespace App\Controllers;

use \App\Models\Categories;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        session_start();
        View::render('Home/index.php');
    }

    /**
     * get ajax request
     *
     * @return void
     */
    public function ajaxAction()
    {
        $ajax_request = 'nothing';
        if (isset($_POST['msg'])) {
            $ajax_request = $_POST['msg'];
        }
        echo json_encode($ajax_request);
    }


}
