<?php
session_start();
?>
<?php





$errors = '';
$id = $_SESSION['id'];



$first_update = $_POST['first_name'];
$last_update = $_POST['last_name'];







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

     

      $query = "update user_profile SET first_name ='$first_update', last_name = '$last_update'";
      $result = $db->query($query);
      
    
  }
         
      else {
          exit("user not found");
      }
     
    
    $db->close();
  
  header ("refresh: 1; url = user_profile.php");
  exit;
?>