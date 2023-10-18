<?php
// class Database {
//     private static $dsn = 'mysql:host=127.0.0.1;dbname=shop';
//     private static $username = 'root';
//     private static $password = '';
//     private static $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
//     private static $db;

//     private function __construct() {}

//     public static function getDB () {
//         if (!isset(self::$db)) {
//             try {
//                 $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
//                 self::$db = new PDO(self::$dsn,
//                                     self::$username,
//                                     self::$password,
//                                     self::$options);
//                                     print("Connection Successful");
//             } catch (PDOException $e) {
//                 $error = $e->getMessage();
//                 print($error);
//                 include('view/error.php');
//                 exit();
//             }
//         }
//         return self::$db;
//     }
// }

$pdo = new PDO('mysql:host=127.0.0.1;dbname=shop;','root',''); //localhost
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement = $pdo->query("select 'Hello, dear MySql user!' as _message from dual");
echo htmlentities($row['_message']);
?>