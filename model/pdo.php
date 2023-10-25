<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=shop;','root',''); //localhost
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $statement = $pdo->query("select 'Hello, dear MySql user!' as _message from dual");
// echo htmlentities($row['_message']);

// $admin_pdo = new PDO('mysql:host=127.0.0.1;dbname=shop;','root','');
// $admin_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $admin_query=$admin_pdo->query("select * from ");
?>