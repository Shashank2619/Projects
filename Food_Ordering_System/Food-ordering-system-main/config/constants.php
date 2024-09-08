<?php
//starting session
session_start();
define('SITEURL','http://localhost/FOOD_ORDERING/');
/* define('LOCALHOST','localhost');
 define('DB_USERNAME','root');
 define('DB_PASSWORD','');
 define('DB_NAME','food-order');
*/
 $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn)); 
 $db_select=mysqli_select_db($conn,'food-order') or die(mysqli_error($conn));
?>