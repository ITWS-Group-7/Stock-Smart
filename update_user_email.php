<?php
session_start();
?>
<?php





$errors = '';
$id = $_SESSION['id'];


$email = $_POST['email'];
$email_update = $_POST['email_update'];








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

      if($email_update == $email){

      $query = "update user_profile SET email ='$email'";
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