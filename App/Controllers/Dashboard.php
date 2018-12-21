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
            View::render('Dashboard/index.php', array('code' => $_SESSION['permission']));
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

    /**
     * Increment the status order, when producer click on his dashboard button
     */
    public function changeOrderStatusAction(){
        $ajax_request = "nothing";
        if (isset($_POST['msg'])) {
            $order_id = $_POST['msg'];
            $ajax_request = User::changeOrderStatus($order_id);
        }
        echo json_encode($ajax_request);
    }
      /**
     *
     */
    public function modifyDataUserAction(){
        session_start();
        $dataUser = User::getDataUser($_SESSION['user_id'], $_SESSION['permission']);

        View::render("/Dashboard/modifyData.php", array('type'=> $_SESSION['permission'], 'data'=>$dataUser));
    }

    public function modifyAction(){
        session_start();
        $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_NUMBER_INT);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $companyname = filter_input(INPUT_POST, 'companyname', FILTER_SANITIZE_STRING);
        $pwd = $_POST['pwd'];
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        if ($code == 0) {
            $stmt = User::modifyClient($_SESSION['user_id'], $name, $lastname, $username, $pwd, $address);
            if ($stmt) {
                View::render('Dashboard/index.php', array('code' => $code));
            }
        } else {
            $stmt = User::modifyProducer($name, $lastname, $companyname, $username, $pwd, $_SESSION['user_id']);
            if ($stmt) {
                View::render('Dashboard/index.php', array('code' => $code));
            }
        }
    }

    /**
     *
     */

}
