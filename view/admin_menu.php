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
        <form action="." method="post" id="admin_menu" class="aligned"  target='_self'>
            <h1>Admin Menu</h1>

            <p><a href="view/users.php" name='user'>User</a></p>
            <p><a href="view/product.php">Product</a></p>
            <p><a href="view/login.php" name='logout'>Logout</a></p>
            <!-- <a type='hidden' name='user'></a> -->
        </form>
        </main>
    </body>
</html>
