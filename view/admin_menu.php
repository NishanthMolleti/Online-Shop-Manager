<!DOCTYPE html>
<html>
    <script>
        document.body.innerHTML="";
    </script>
    <head>
        <title>CS5130 Online Shop Manager</title>
        <link rel="stylesheet" href="main.css"/>
    </head>
    <body>
        <header>
            <h1>CS5130 Online Shop Manager</h1>
        </header>
        <main>
        <form action="." method="post" id="admin_menu" class="aligned" target="_self" >
            <h1>Admin Menu</h1>
            <!-- <a href="index.php?action=show_users"> -->
                <input type="submit" value="User" >
            </a>
            <p><a href="index.php?action=show_users" value='off'>User</a></p>
            <p><a href="index.php?action=show_product">Product</a></p>
            <p><a href="index.php?action=logout">Logout</a></p>
        </form>
        </main>
    </body>
</html>
<?php

require_once 'login.php';
//echo "email ".$email." password ".$password;
if(!empty($email)&&!empty($password)){
  //  include ('users.php');
}

?>