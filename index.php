<?php
// Start session management and include necessary functions

require_once('model/pdo.php');

// admin: joel@ucmo.edu/joeldb, admin@ucmo.edu/admin, sys@ucmo.edu/syspswd
// user: joel@ucmo.edu/joeldb, brian@ucmo.edu/briangood, ted@ucmo.edu/tedbest

$cookie_name = "test";
$cookie_value = "Test";
setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day

$action = "login";

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
        $login_message = 'You have been logged out.';
        include('view/login.php');
        break;
}
?>