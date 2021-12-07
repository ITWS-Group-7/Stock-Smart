<?php
session_start();
?>
<?php
$errors = '';
$id = $_SESSION['id'];
$image = basename($_FILES["file"]["name"]);
$targetDir = "images/";
$targetFilePath = $targetDir . $image;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$allowTypes = array('jpg','png','jfif','jpeg','gif','pdf');



if (strlen($image) > 0){
    if(in_array($fileType, $allowTypes)){
    
    
    if (move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)){

        $dbOk = false;
        @ $db = new mysqli('localhost', 'root', '', 'stock_smart');
        if ($db->connect_error) {
            echo '<div class="messages">Could not connect to the database. Error: ';
            echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
          } else {
            $dbOk = true; 
          }
          if ($dbOk) {
    
            $query = "update user_profile SET  profile_image = '$image' where userid=$id";
            $result = $db->query($query);
            
          }
               
            else {
                exit("Student not found");
            }
           
          
          $db->close();







    }


}

else{
    $statusMsg = "Sorry, you uploaded a non-valid file or you didn't upload a file at all. Only JPG, JFIF, PNG, JPEG, GIF, PDF files are allowed";
    echo $statusMsg;
    header ("refresh: 4; url = user_profile.php");
    exit;
}
}





header ("refresh: 1; url = user_profile.php");
exit;














?>
