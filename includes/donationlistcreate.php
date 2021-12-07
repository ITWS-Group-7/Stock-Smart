<?php  
require_once 'dbh_connect.php';
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}



$errors = '';
$id = $_SESSION['id'];



$food= $_POST['food'];
$group = $_POST['group'];




$dbOk = false;
  @ $db = new mysqli('localhost', 'root', '', 'stock_smart');
  if ($db->connect_error) {
      echo '<div class="messages">Could not connect to the database. Error: ';
      echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
    } 
  else {
    $dbOk = true; 
    }
    if ($dbOk) {

     

      $query = "INSERT INTO donation (`id`, `food_name`, `userid`, `expiration_date`, `donated`) VALUES (NULL, '$food',$id , '2021-12-08 09:18:59', '1')  ";
      $result = $db->query($query);
      
    
  }
         
      else {
          exit("user not found");
      }
     
    
  
  header ("refresh: 1; url = ../donation.php");
  exit;
?>