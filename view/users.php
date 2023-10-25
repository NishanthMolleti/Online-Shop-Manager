
<!DOCTYPE html>
<html>
    <!-- <script>
        document.body.innerHTML="";
    </script> -->
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
                <?php
               // require_once 'model/pdo.php';
                $pdo = new PDO('mysql:host=127.0.0.1;dbname=shop;','root',''); //localhost
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //$stmt = $pdo->query("SELECT * FROM administrators");
                $stmt = $pdo->query("select * from administrators");
           //     $stmt1 = $pdo->prepare($stmt);
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //        print_r($rows);
        //         $stmt1->execute();
            foreach ( $rows as $row ) {
            // echo "<tr><td>";
            // echo($row['lastname']);
            echo("</td><td>");
            echo($row['email']);
            echo("</td><td>");
            echo($row['password']);
            echo("</td><td>");
            echo('<form method="post"><input type="hidden" name="adminID" value=""'.$row['adminID'].'">'."\n");
            echo('<input type="submit" value="Del" name="delete">');
            echo("\n</form>\n");
            echo("</td></tr>\n");
            }
            ?>
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
            <p><a href="admin_menu.php">Admin Menu</a></p>
            <p><a href="product.php">Product</a></p>
            <p><a href="login.php">Logout</a></p>
        </main>
    </body>
</html>
<?php
//$encrypted_username = $_COOKIE['email'];
//$encrypted_password = $_COOKIE['password'];

// Decrypt the username and password
// $username = base64_decode($encrypted_username);
// $password = base64_decode($encrypted_password);
//echo "username is: ".$username." password is: ".$password;
//print_r($_POST);
if(isset($_POST)){
if($_POST['email']!=''){
 //   echo "email present";
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=shop;','root','');  //localhost
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql1='select count(*) from administrators where email= :email';
    $stmt1 = $pdo->prepare($sql1);
    $stmt1->bindParam(':email', $email);
    $stmt1->execute();
    $count = $stmt1->fetchColumn();

    if ($count > 0) {
        // Display an error message
        echo 'Username already exists, please choose another!';
        exit();
    }
    $sql_query="insert into administrators(email,password,firstname,lastname) values (:email,:password,:firstname,:lastname)";
    $stmt2=$pdo->prepare($sql_query);
//    $stmt2 = $pdo->query("insert into administrators(email,password,firstname,lastname) values (:email,:password,:firstname,:lastname)");
    $stmt2->bindParam(':email',$email);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $stmt2->bindParam(':password',$password);
    $stmt2->bindParam(':firstname',$firstname);
    $stmt2->bindParam(':lastname',$lastname);
    $stmt2->execute();
}else if($_POST['delete']=="Del"){
 //   print_r($_POST);
   // echo "ADMIN ID IS : ".$_POST['adminID'];
    if (isset($_POST['adminID'])) {
        $userID = $_POST['adminID'];
     //   echo "The user ID is: " . $userID;
     } else {
      //  echo "The user ID is not set.";
     }

}else if($_POST=="") {

}
}
//print_r($_POST);
  
?>