<?php
// Start Session
session_start();

// Create Constant to store Non Repeating values
define('SITEURL', 'http://localhost/blackdiamonds/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'blackdiamond');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD); //database connection
$db_select = mysqli_select_db($conn, DB_NAME);



// <?php
// // Start Session
// session_start();

// // Create Constant to store Non Repeating values
// define('SITEURL', 'https://bluebugv2.bluebugsoft.com/');
// define('LOCALHOST', 'localhost');
// define('DB_USERNAME', 'bluebugs_connectifi');
// define('DB_PASSWORD', 'acr4RPSwl5$k');
// define('DB_NAME', 'bluebugs_blackdiamond');;

// $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD); //database connection
// $db_select = mysqli_select_db($conn, DB_NAME);
