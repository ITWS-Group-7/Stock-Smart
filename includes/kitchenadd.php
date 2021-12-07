<?php
require_once 'dbh_connect.php';
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}

$id = $_SESSION['id'];
if(isset($_POST['submit-kitchen'])){    
      // $id = Null;
      $food = $_POST['food'];
      $group = $_POST['group'];
      $PDate = $_POST['PDate'];
      $EDate = $_POST['EDate'];
      if($_POST['Open'] == "yes"){
          $Open = '1';
          } elseif($_POST['Open'] == "no") {
          $Open = '0';
      }
      if($_POST['group'] = "Dairy"){
        $food_id = '1';
      }elseif($_POST['group'] = "Fruits"){
        $food_id = '2';
      }elseif($_POST['group'] = "Vegetables"){
         $food_id = '3';
      }elseif($_POST['group'] = "Grains"){
         $food_id = '4';
      }elseif($_POST['group'] = "Proteins"){
         $food_id = '5';
      }
      $sql = "INSERT INTO food_items (id, food_name, food_group, purchase_date, expiration_date, item_opened,userid,food_id) VALUES (NULL, '$food', '$group','$PDate', '$EDate', '$Open', '$id', '$food_id');";
            $stmt = $conn->query($sql);
      if ($stmt) {
          // echo '
          // <script type="text/javascript">
          // location.reload();
          // </script>';
      } else {
          echo "Error: " . $sql;
      }
        header ("refresh: 1; url = ../kitchen.php");
    }
?>