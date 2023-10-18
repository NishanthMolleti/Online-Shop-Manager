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
            <h1>User Manager</h1>
            <h2>Users</h2>
            <table border="2">
            </table>
            <h2>Add User</h2>
            <form method="post">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <label for="password">Password</label>
                <input type="password" name="password" id="password"><br>
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" id="firstname">
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" id="lastname">
                <input type="submit">
            </form>
            <p><a href="index.php?action=show_admin_menu">Admin Menu</a></p>
            <p><a href="index.php?action=show_product">Product</a></p>
            <p><a href="index.php?action=logout">Logout</a></p>
        </main>
    </body>
</html>