<?php

$dbServername = "localhost";
$dbUsername = "root"; //it's root since I'm using xampp and not an online server
$dbPassword = "";
$dbName = "stock_smart";
// $dbconn = new PDO("mysql:host=localhost;dbname=stock_smart",$dbUsername,$dbPassword);
// echo("Connected\n");
// } catch (Exception $e) {
//     echo("Error");
// }
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); //connecting to database
?>