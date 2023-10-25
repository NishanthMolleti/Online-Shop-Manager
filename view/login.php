<!DOCTYPE html>
<html>

    <head>
        <title>CS5130 Online Shop</title>
        <link rel="stylesheet" href="main.css"/>
    </head>
    <body>
        <header>
            <h1>CS5130 Online Shop</h1>
        </header>
        <main>
            <h1>Login</h1>

            <form action="." method="post" id="login_form" class="aligned"  >
                <input type="hidden" name="action" value="login">

                <label>Email:</label>
                <input type="email" class="text" name="email">
                <br>

                <label>Password:</label>
                <input type="password" class="text" name="password">
                <br>

                <label>&nbsp;</label>
                <!-- <a href="index.php?action=show_admin_menu"> -->
                <input type="submit" value="Login" >
                </a>
            </form>

            <p><?php echo $login_message; ?></p>
        </main>
    </body>
</html>
<?php
 session_start();

 // Assume that we have obtained the username and password from a login form
 if($_POST['email']!=''&&$_POST['password']!=''){
 $username = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
 $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
 }
 // Encrypt the username and password before storing in a cookie
 $encrypted_username = base64_encode($username);
 $encrypted_password = base64_encode($password);
 if(!isset($_COOKIE['visit'])) {
    $visit_count = 1;
} else {
    $visit_count = $_COOKIE['visit'] + 1;
}
if(!isset($_COOKIE['visit'])) {
    setcookie('visit', $visit_count, time() + (86400 ), "/");
    echo "This is your first visit. Welcome!";
} else {
    setcookie('visit', $visit_count, time() + (86400), "/");
    echo "Welcome back! You have visited this site " . $visit_count . " times before.";
}
 // Set the cookie to expire in 1 month (2678400 seconds)
 $cookie_expiration_time =  time()+86400;
 
 // Set the username and password cookies
 setcookie('email', $encrypted_username, $cookie_expiration_time, '/');
 setcookie('password', $encrypted_password, $cookie_expiration_time, '/');
 
 // Store the encrypted username and password in the session variables for future use
 $_SESSION['email'] = $encrypted_username;
 $_SESSION['password'] = $encrypted_password;
 // header("Location: index.php?action=show_admin_menu");
    require_once 'model/pdo.php';
 //   require_once 'index.php';
 if(isset($_POST)){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
}
    // Check if the username exists
    $sql = 'SELECT email,password FROM administrators WHERE email = :email';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $account = $stmt->fetch(PDO::FETCH_ASSOC);
    if(empty($email)||empty($password)){
      //  echo "Please enter your credentials";
      exit();
    }
    else if (!$account) {
        // Display an error message
        echo 'Username or password is not correct!';
    } else {
        // Compare the provided password and saved password
        if (password_verify($password, $account['password'])) {
            include('admin_menu.php');
            // add the data back if it doesnt work
        } else {
            // Display an error message
            echo 'Username or password is not correct!';
        }
    }

    

?>