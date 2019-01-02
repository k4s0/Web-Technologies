<?php
/**
 * Created by PhpStorm.
 * User: lorenzo
 * Date: 12/19/18
 * Time: 10:20 AM
 */

namespace App\Controllers;

use App\Models\User;
use App\Controllers\Dashboard;
use \Core\View;

/**
 * Login controller
 *
 * PHP version 7.0
 */
class Login extends \Core\Controller
{


    /**
     * Show the registration page for new users.
     *
     * @return void
     */
    public function indexAction()
    {
        $type = '';
        if (isset($_POST['login-code'])) {
            $type = $_POST['login-code'];
        }
        View::render('Login/Signup.php', array('type' => $type));
    }

    /**
     * Receive new user data with an ajax request.
     *
     */
    public function signupAction()
    {
        $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_NUMBER_INT);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $companyname = filter_input(INPUT_POST, 'companyname', FILTER_SANITIZE_STRING);
        $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $birth = filter_input(INPUT_POST, 'birth', FILTER_SANITIZE_STRING);

        if ($code == 0) {
            $stmt = User::insertClient($name, $lastname, $username, $email, $pwd, $address, $birth, $code);
            if ($stmt == 0) {
                View::render('Login/succes.php', array('code' => $code));
            } else {
                View::render('Login/unsuccess.php', array('code' => $code));
            }
        } else {
            $stmt = User::insertProducer($name, $lastname, $companyname, $username, $email, $pwd, $code);
            if ($stmt == 0) {
                View::render('Login/succes.php', array('code' => $code));
            } else {
                View::render('Login/unsuccess.php', array('code' => $code));
            }
        }

    }

    /**
     * Perform the logout action
     * @return void
     */
    public function logoutAction()
    {
        // Initialize the session
        session_start();
        // Unset all of the session variables
        $_SESSION = array();
        // Destroy the session.
        session_destroy();
        View::render('Home/index.php');
    }

}
