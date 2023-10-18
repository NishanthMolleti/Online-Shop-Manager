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

    require_once 'model/pdo.php';
 //   require_once 'index.php';
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    // Check if the username exists
    $sql = 'SELECT email,password FROM administrators WHERE email = :email';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $account = $stmt->fetch(PDO::FETCH_ASSOC);
    if(empty($email)||empty($password)){
      //  echo "Please enter your credentials";
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