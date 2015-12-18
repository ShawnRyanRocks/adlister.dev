<?php

class Auth
{
    public static $password;

    public static function attempt($email, $password)
    {
        // $log = new Log('users.login');

        $_SESSION['LOGGED_IN_USER'] = null;
        $_SESSION['LOGGED_IN'] = false;
        
        $user = User::findByUsername($email);
        $hashedPassword = $user->password;


        if( password_verify($password, $hashedPassword) )
        {   
            //echo 'loged in';
            $_SESSION['LOGGED_IN_USER'] = $user;
            $_SESSION['LOGGED_IN'] = true;
            // $log->logInfo("User {$user->username} loggin in");
            // unset($log);

            return true;
        } else {
            // $log->logError("{$email} tryed to log in");
            // unset($log);
            header("Location: /index.php");
            die();
        }
    }


    // return true or false if the user is logged in
    public static function check()
    {
        return isset($_SESSION['LOGGED_IN']) ? $_SESSION['LOGGED_IN'] : false;
    }

    public static function user()
    {
        return $_SESSION['LOGGED_IN_USER'];
    }

    public static function logout()
    {
        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();
    }
}