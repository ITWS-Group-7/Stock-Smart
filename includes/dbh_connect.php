<?php 

$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "stock_smart";

$conn = mysqli_connect($serverName ,$username ,$password,$dbname);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>