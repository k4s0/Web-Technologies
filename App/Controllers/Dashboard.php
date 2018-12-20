<?php

namespace App\Controllers;

use App\Models\User;
use \Core\View;

/**
 * Dashboard controller
 *
 * PHP version 7.0
 */
class Dashboard extends \Core\Controller
{

    /**
     * Show the Dashboard for the correct user page
     *
     * @return void
     */
    public function indexAction()
    {
        session_start();
        if (isset($_SESSION['permission'])) {
            View::render('Dashboard/index.php', array('code' => $_SESSION['permission'], 'user' => $_SESSION['user']));
            die();
        } elseif (isset($_REQUEST['code'])) {

            $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_NUMBER_INT);
            $user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $pwd = $_POST['pwd'];
            if (User::signin($user, $pwd)) {
                if ($code == 0) {
                    $_SESSION['permission'] = 0;
                    $_SESSION['user'] = $user;
                    View::render('Dashboard/index.php', array('code' => $code));
                } else {
                    $_SESSION['permission'] = 1;
                    $_SESSION['user'] = $user;
                    View::render('Dashboard/index.php', array('code' => $code));
                }

            } else {
                echo "password sbagliata";
            }

        } else {
            echo 'Accesso Negato';
        }


    }


    public function showClientOrderAction()
    {
        session_start();
        $ajax_request = "nothing";
        if (isset($_POST['msg'])) {
            $ajax_request = User::showClientOrder($_SESSION['user_id']);
        }
        echo json_encode($ajax_request);
    }

    public function showProducerOrderAction()
    {
        session_start();
        $ajax_request = "nothing";
        if (isset($_POST['msg'])) {
            $ajax_request = User::showProducerOrder($_SESSION['user_id']);
        }
        echo json_encode($ajax_request);
    }


}
