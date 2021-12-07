<?php
session_start();
?>
<?php





$errors = '';
$id = $_SESSION['id'];



$password_update = $_POST['password_update'];
$password_confirm = $_POST['password_confirm'];







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

      if($password_confirm == $password_update){

      $query = "update user_profile SET password ='$password_update'";
      $result = $db->query($query);
      
    }
  }
         
      else {
          exit("user not found");
      }
     
    
    $db->close();
  
  header ("refresh: 1; url = user_profile.php");
  exit;
?>