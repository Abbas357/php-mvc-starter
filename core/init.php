<?php ob_start();
require 'database/connection.php';
require 'classes/main.php';
require 'classes/user.php';
require 'classes/news.php';

global $pdo;

if(!isset($_SESSION)){
   session_start();
}

$main = new Main($pdo);
$user = new User($pdo);
$news = new News($pdo);

const BASE_URL = 'http://localhost/cwmis/';

?>

<?php
// session_start();

// require 'database/connection.php';
// require 'classes/main.php';
// require 'classes/user.php';
// require 'classes/news.php';

// // Error handling for database connection
// try {
//     $pdo = new PDO($dsn, $username, $password, $options);
// } catch (PDOException $e) {
//     die('Database connection failed: ' . $e->getMessage());
// }

// // Class instantiations
// try {
//     $main = new Main($pdo);
//     $user = new User($pdo);
//     $news = new News($pdo);
// } catch (Exception $e) {
//     die('Error initializing classes: ' . $e->getMessage());
// }

// define('BASE_URL', 'http://localhost/cwmis/');
?>
