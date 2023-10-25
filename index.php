<?php
// Start session management and include necessary functions

require_once('model/pdo.php');

// if(isset($_SESSION['email'])) {
//     // The session has a value for 'username'
//     $action = "show_admin_menu";
// } else {
//     // The session does not have a value for 'username'
//     $action = "login";
// }
if (isset($_COOKIE['email'])) {
    // A session is active
    //$action = "show_admin_menu";
    include('view/admin_menu.php');
    
} else {
    // No session is active
    $action = "login";
}
//$action = "login";

// Perform the specified action
switch($action) {
    case 'login':
        //In case login was successful
        //header("Location: .");

        //In case ogin was not successful
        $login_message = 'You must login to view this page.';
        include('view/login.php');
        break;
    case 'show_admin_menu':
        include('view/admin_menu.php');
        break;
    case 'show_users':
        include('view/users.php');
        break;
    case 'show_product':
        include('view/product.php');
        break;
    case 'logout':
        //Session destory
        $cookie_expiration_time =  time()-86400;
 
        // Set the username and password cookies
        setcookie('email', $encrypted_username, $cookie_expiration_time, '/');
        setcookie('password', $encrypted_password, $cookie_expiration_time, '/');
        session_destroy();
        session_start();
        $login_message = 'You have been logged out.';
        include('view/login.php');
        break;
}

?>