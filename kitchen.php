<?php include('includes/dbh_connect.php') ?>
<?php
   session_start();
   // If the user is not logged in redirect to the login page...
   if (!isset($_SESSION['loggedin'])) {
   	header('Location: login.php');
   	exit;
   }
   
   $id = $_SESSION['id'];
   ?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="css/styles.css">
      <title>StockSmart</title>
   </head>
   <header>
      <div class="container">
         <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#"><img style="height: 200px;"
               src="images/logo_new.png"
               /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style = "margin-right: 300px;">
               <ul class="navbar-nav ml-lg-auto">
                  <li class="nav-item active">
                     <a class="nav-link menu"  href="#InMyKitchen">In My Kitchen <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link menu" href="grocery.php">Grocery List</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link menu" href="donation.php">Donation List</a>
                  </li>
                    <li class="nav-item">
                        <a class="nav-link menu" href="user_profile.php">Profile</a>
                    </li>
                  <!-- <li class="nav-item dropdown ">
                     <a class="nav-link dropdown-toggle menu_profile" href="#Profile" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style = "font-size: 16px; ">
                     Profile
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="user_profile.php">My profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Log out</a>
                     </div>
                  </li> -->
                  <hr>
               </ul>
            </div>
            <div class = "signup_login">
               <a href="includes/logout.inc.php" class="btn btn-primary login" >Logout</a>
            </div>
         </nav>
      </div>
   </header>
   <div class="container">
      <div class = "title">
         <h1>My Kitchen </h1>
         <hr class ="underline">
      </div>
      <!-- <div class= "p-2"> -->
         <!-- style  = "margin-left: 400px; " -->
         <form action="" method = "GET">
           <div class="row" style = "text-align: center; margin-top: 10px;">
            <div class="col-sm-1"></div>
               <?php
                  $food_query = "SELECT * FROM food_items WHERE userid = $id;";
                  $food_query_run = mysqli_query($conn, $food_query);
                  
                  $food_group_query = "SELECT * FROM food_groups ;";
                  $food_group_run = mysqli_query($conn, $food_group_query);
                  
                  
                  $image_counter = 1;
                  if(mysqli_num_rows($food_group_run) > 0){
                  
                    foreach( $food_group_run as $foodgroup){
                  
                     $checked = [];
                     if(isset($_GET['groups'])){
                       $checked= $_GET["groups"];
                     }
                   
                      ?>
                  <!-- <div class = "card-body"> -->
                  <div class="col-sm-2" id="hvr-float-shadow">
                  <div class="card " style = "border-radius: 10%; border-color: white;" >
                   <div class="card-body">
                  <input type="checkbox"  class="btn-check" autocomplete="off" name = "groups[]" value = "<?= $foodgroup["id"]; ?>"  id = "<?= $foodgroup["id"]; ?>" 
                     <?php if(in_array($foodgroup["id"], $checked)) {
                        echo "checked";
                        }?>
                   /> 
                  <?php 
                     if($image_counter == 1){
                     
                       echo '<img src="images/1.png" class="card-img-top" ><label class="btn btn-outline-success" for="1">DAIRY</label></div></div>';
                       
                     }
                     
                     elseif($image_counter == 2){
                       echo '<img src="images/2.png" class="card-img-top"> <label class="btn btn-outline-success" for="2">FRUITS</label></div></div>';
                     }
                     elseif($image_counter == 3){
                        echo '<img src="images/3.png" class="card-img-top" ><label class="btn btn-outline-success" for="3">VEGETABLES</label></div></div>';
                     }
                     
                     elseif($image_counter == 4){
                        echo '<img src="images/4.png" class="card-img-top"><label class="btn btn-outline-success" for="4">GRAINS</label></div></div>';
                     }
                     
                     elseif($image_counter == 5){
                         echo '<img src="images/5.png" class="card-img-top" ><label class="btn btn-outline-success" for="5">PROTEINS</label></div></div>';
                     }
                     
                     $image_counter = $image_counter + 1; 
                     
                     ?>
               </div>
               <?php
                  }
                  
                  
                  }
                  else{
                   echo "No Food Found";
                  }
                  
                  ?>
            </div>
            <div class="row">
              <div class="col text-center pt-5">
                  <button type ="submit" class = "btn btn-success btn float-end">Search Kitchen</button>
              </div>
            </div>
         </form>
      </div>
   </div>
   <div class="container pt-5 pb-5">
      <h4  class="sub_title pb-3" id="date"></h4>
      <table class="table " id = "food_table">
         <tr id="hvr-grow-shadow">
            <th scope="col">FOOD</th>
            <th scope="col">PURCHASE DATE</th>
            <th scope="col">EXPIRATION DATE</th>
            <th scope = "col">OPENED</th>
            <th scope="col">STATUS</th>
         </tr>
         <tbody>
            <?php if(isset($_GET["groups"])){
               $foodchecked= [];
               $foodchecked = $_GET["groups"];
               foreach($foodchecked as $fooditem){
               
                 $food_items = "SELECT * from food_items WHERE food_id IN ($fooditem) AND userid=$id  ";
               $food_items_run = mysqli_query($conn, $food_items);
               if(mysqli_num_rows($food_query_run)>0){
               foreach($food_items_run as $food_items):
                 
               
                 ?>
            <div class= "col-md-4">
               <!-- <div class = "border p-2"> -->
               <tr>
                  <td><?php echo $food_items["food_name"];?></td>
                  <td><?php echo substr($food_items["purchase_date"],0,-8);?></td>
                  <td><?php echo substr($food_items["expiration_date"],0,-8);?></td>
                  <td><?php 
                  if($food_items["item_opened"] == '0'){
                     echo "NO";
                  }else{
                    echo "Yes";
                  };
                  ?></td>
                   <td><?php  $diff = ceil(abs(strtotime($food_items["expiration_date"]) - strtotime($food_items["purchase_date"]))/60/60/24); 
                              $current_diff = ceil(abs(strtotime(date("Y-m-d")) - strtotime($food_items["purchase_date"]))/60/60/24); 
                              $today = date("Y-m-d");
                              $today_time = strtotime($today);
                              $expire_time = strtotime($food_items["expiration_date"]);
                            if($food_items["food_group"] = "Dairy" && $diff > 5 && $expire_time > $today_time){
                               $food = $food_items["food_name"];
                              echo
                              '<button type="button" class= "btn btn-success"  data-toggle="modal" data-target="#'.$food.'">VIEW MORE</button> <div class="modal fade" id="'.$food.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="success"  >ITEM INFORMATION</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body" >
                                                   <p>' .$food .' was purchased '. $current_diff.  ' days ago. It is reccomended that you finish this item or consider donating it. </p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary">Keep on List</button>
                                                  <button type="button" class="btn btn-primary">Donate</button>
                                                </div>
                                            </div>
                                          </div>
                                      </div>';
                           
                              }
                              elseif($food_items["food_group"] = "Dairy" && $diff <= 5 && $expire_time > $today_time){
                                 $food = $food_items["food_name"];

                                 echo  '<button type="button"  class="btn btn-warning"  data-toggle="modal" data-target="#'.$food.'">VIEW MORE</button> <div class="modal fade" id="'.$food.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <div class="modal-header ">
                                                     <h5 class="modal-title" id="success">ITEM INFORMATION</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                   </div>
                                                   <div class="modal-body" >
                                                      <p>' .$food .' was purchased '. $current_diff.  ' days ago. It is reccomended that you finish this item or consider donating it. </p>
                                                   </div>
                                                   <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary">Keep on List</button>
                                                     <button type="button" class="btn btn-primary">Donate</button>
                                                   </div>
                                               </div>
                                             </div>
                                         </div>';



                              }   
                              elseif($food_items["food_group"] ="Fruits" && $diff >= 14 && $expire_time > $today_time){
                                 $food = $food_items["food_name"];

                                 echo
                                 '<button type="button"   class= "btn btn-success"  data-toggle="modal" data-target="#'.$food.'">VIEW MORE</button> <div class="modal fade" id="'.$food.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <div class="modal-header good_alerts>
                                                     <h5 class="modal-title" id="success">ITEM INFORMATION</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                   </div>
                                                   <div class="modal-body" >
                                                      <p>' .$food .' was purchased '. $current_diff.  ' days ago. It is reccomended that you finish this item or consider donating it. </p>
                                                   </div>
                                                   <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary">Keep on List</button>
                                                     <button type="button" class="btn btn-primary">Donate</button>
                                                   </div>
                                               </div>
                                             </div>
                                         </div>';



                              }
                              elseif($food_items["food_group"] ="Fruits" && $diff < 14 &&  $expire_time > $today_time){
                                 $food = $food_items["food_name"];

                                 echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#'.$food.'">VIEW MORE</button> <div class="modal fade" id="'.$food.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                             <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <div class="modal-header bad_alerts">
                                                     <h5 class="modal-title" id="success">ITEM INFORMATION</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                   </div>
                                                   <div class="modal-body" >
                                                      <p>' .$food .' was purchased '. $current_diff.  ' days ago. It is reccomended that you finish this item or consider donating it. </p>
                                                   </div>
                                                   <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary">Keep on List</button>
                                                     <button type="button" class="btn btn-primary">Donate</button>
                                                   </div>
                                               </div>
                                             </div>
                                         </div>';
                              }
                              elseif($food_items["food_group"] ="Vegetables" && $diff >= 10 && $expire_time > $today_time){
                                 $food = $food_items["food_name"];

                                 echo
                                 '<button type="button"   class= "btn btn-success"  data-toggle="modal" data-target="#'.$food.'">VIEW MORE</button> <div class="modal fade" id="'.$food.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <div class="modal-header good_alerts>
                                                     <h5 class="modal-title" id="success">ITEM INFORMATION</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                   </div>
                                                   <div class="modal-body" >
                                                      <p>' .$food .' was purchased '. $current_diff.  ' days ago. It is reccomended that you finish this item or consider donating it. </p>
                                                   </div>
                                                   <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary">Keep on List</button>
                                                     <button type="button" class="btn btn-primary">Donate</button>
                                                   </div>
                                               </div>
                                             </div>
                                         </div>';
                              }
                              elseif($food_items["food_group"] ="Vegetables" && $diff < 10 &&  $expire_time > $today_time){
                                 $food = $food_items["food_name"];

                                 echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#'.$food.'">VIEW MORE</button> <div class="modal fade" id="'.$food.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                             <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <div class="modal-header bad_alerts">
                                                     <h5 class="modal-title" id="success">ITEM INFORMATION</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                   </div>
                                                   <div class="modal-body" >
                                                      <p>' .$food .' was purchased '. $current_diff.  ' days ago. It is reccomended that you finish this item or consider donating it. </p>
                                                   </div>
                                                   <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary">Keep on List</button>
                                                     <button type="button" class="btn btn-primary">Donate</button>
                                                   </div>
                                               </div>
                                             </div>
                                         </div>';
                              }
                              elseif($food_items["food_group"] ="Grains" && $diff >= 20 && $expire_time > $today_time){
                                 $food = $food_items["food_name"];

                                 echo
                                 '<button type="button"   class= "btn btn-success"  data-toggle="modal" data-target="#'.$food.'">VIEW MORE</button> <div class="modal fade" id="'.$food.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <div class="modal-header good_alerts>
                                                     <h5 class="modal-title" id="success">ITEM INFORMATION</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                   </div>
                                                   <div class="modal-body" >
                                                      <p>' .$food .' was purchased '. $current_diff.  ' days ago. It is reccomended that you finish this item or consider donating it. </p>
                                                   </div>
                                                   <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary">Keep on List</button>
                                                     <button type="button" class="btn btn-primary">Donate</button>
                                                   </div>
                                               </div>
                                             </div>
                                         </div>';
                              }
                              elseif($food_items["food_group"] ="Grains" && $diff < 20 &&  $expire_time > $today_time){
                                 $food = $food_items["food_name"];

                                 echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#'.$food.'">VIEW MORE</button> <div class="modal fade" id="'.$food.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                             <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <div class="modal-header bad_alerts">
                                                     <h5 class="modal-title" id="success">ITEM INFORMATION</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                   </div>
                                                   <div class="modal-body" >
                                                      <p>' .$food .' was purchased '. $current_diff.  ' days ago. It is reccomended that you finish this item or consider donating it. </p>
                                                   </div>
                                                   <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary">Keep on List</button>
                                                     <button type="button" class="btn btn-primary">Donate</button>
                                                   </div>
                                               </div>
                                             </div>
                                         </div>';
                              }
                               elseif($food_items["food_group"] ="Protien" && $diff >= 10 && $expire_time > $today_time){
                                 $food = $food_items["food_name"];

                                 echo
                                 '<button type="button"   class= "btn btn-success"  data-toggle="modal" data-target="#'.$food.'">VIEW MORE</button> <div class="modal fade" id="'.$food.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <div class="modal-header good_alerts>
                                                     <h5 class="modal-title" id="success">ITEM INFORMATION</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                   </div>
                                                   <div class="modal-body" >
                                                      <p>' .$food .' was purchased '. $current_diff.  ' days ago. It is reccomended that you finish this item or consider donating it. </p>
                                                   </div>
                                                   <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary">Keep on List</button>
                                                     <button type="button" class="btn btn-primary">Donate</button>
                                                   </div>
                                               </div>
                                             </div>
                                         </div>';
                              }
                                elseif($food_items["food_group"] ="Protien" && $diff < 10 &&  $expire_time > $today_time){
                                 $food = $food_items["food_name"];

                                 echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#'.$food.'">VIEW MORE</button> <div class="modal fade" id="'.$food.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                             <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <div class="modal-header bad_alerts">
                                                     <h5 class="modal-title" id="success">ITEM INFORMATION</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                   </div>
                                                   <div class="modal-body" >
                                                      <p>' .$food .' was purchased '. $current_diff.  ' days ago. It is reccomended that you finish this item or consider donating it. </p>
                                                   </div>
                                                   <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary">Keep on List</button>
                                                     <button type="button" class="btn btn-primary">Donate</button>
                                                   </div>
                                               </div>
                                             </div>
                                         </div>';
                              }
                              elseif($expire_time < $today_time){
                                 $food = $food_items["food_name"];

                                 echo '<button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#'.$food.'">VIEW MORE</button> <div class="modal fade" id="'.$food.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <div class="modal-header ">
                                                     <h5 class="modal-title" id="success">ITEM INFORMATION</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                   </div>
                                                   <div class="modal-body" >
                                                      <p>' .$food .' was purchased '. $current_diff.  ' days ago. It is reccomended that you finish this item or consider donating it if it is unopened. </p>
                                                   </div>
                                                   <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary">Keep on List</button>
                                                     <button type="button" class="btn btn-primary">Donate</button>
                                                   </div>
                                               </div>
                                             </div>
                                         </div>';



                              }else{
                                  $food = $food_items["food_name"];

                                 echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#'.$food.'">VIEW MORE</button> <div class="modal fade" id="'.$food.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                             <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <div class="modal-header bad_alerts">
                                                     <h5 class="modal-title" id="success">ITEM INFORMATION</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                   </div>
                                                   <div class="modal-body" >
                                                      <p>' .$food .' was purchased '. $current_diff.  ' days ago. It is reccomended that you finish this item or consider donating it. </p>
                                                   </div>
                                                   <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary">Keep on List</button>
                                                     <button type="button" class="btn btn-primary">Donate</button>
                                                   </div>
                                               </div>
                                             </div>
                                         </div>';
                              }                            
                            
                              ?></td>
            </div>
   </div>
   </tr>
   <?php
      endforeach;
      
      
      
      }
      else{
      echo "No food items found";
      }
            
      }
      
      }
      
      ?>
   </table>
   <!-- Modal -->
   <!-- Modal -->
  <?php
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
      if($group == "Dairy"){
        $food_id = 1;
      }elseif($group == "Fruits"){
        $food_id = 2;
      }elseif($group == "Vegetables"){
         $food_id = 3;
      }elseif($group == "Grains"){
         $food_id = 4;
      }elseif($group == "Proteins"){
         $food_id = 5;
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
        // header ("refresh: 1; url = ../kitchen.php");
    }
  ?>
   <div class = "table_footer">
      <button type="button" class="btn add_item" data-toggle="modal" data-target="#item_modal">ADD ITEM</button>
      <div class="modal fade" id="item_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add an Item</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                         <form action="" method="post">
                  <div class="mb-3">
                    <label for="exampleFormControlInput1">Food</label>
                    <input type="text" name ="food" class="form-control" id="exampleFormControlInput1" placeholder="Enter Food Name">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlSelect1">Select Food Group</label>
                    <select class="form-control" name ="group" id="exampleFormControlSelect1">
                      <option value ="Dairy">Dairy</option>
                      <option  value ="Fruits">Fruits</option>
                      <option value ="Vegetables">Vegetables</option>
                      <option value ="Grains">Grains</option>
                      <option value ="Protien">Protien</option>
                    </select>
                  </div>
                  
                  <div class="mb-3">
                    <label for="exampleFormControlInput1">Purchase Date</label>
                    <input type="date" class="form-control" name = "PDate"id="exampleFormControlInput1" placeholder="Enter Purchase Date MM-DD-YY">
                  </div>




                  <div class="mb-3">
                    <label for="exampleFormControlInput1">Expiration Date</label>
                    <input type="date" class="form-control" name ="EDate" id="exampleFormControlInput1" placeholder="Enter Expiration Date MM-DD-YY">
                  </div>


                  <div class="mb-3">
                    <label for="exampleFormControlInput1">Item Opened</label>
                    <input type="text" class="form-control" name ="Open" id="exampleFormControlInput1" placeholder="Enter yes or no">
                   
                  </div>
                  <div class="modal-footer">
                    <button type="submit" name ="submit-kitchen" class="btn add_item">Add Item</button>
                    </div>
              </form>
            </div>
         </div>
      </div>
   </div>
   </div>
   <body>
      <script src = "kitchen.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
</html>
