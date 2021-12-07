<?php

session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
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
      <script type="text/javascript" src="user_profile.js"></script>
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
                  <li class="nav-item">
                     <a class="nav-link menu"  href="kitchen.php">In My Kitchen <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link menu" href="grocery.php">Grocery List</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link menu" href="donation.php">Donation List</a>
                  </li>
                  <li class="nav-item active">
                     <a class="nav-link menu" href="user_profile.php">Profile</a>
                  </li>
                  <hr>
               </ul>
            </div>
            <div class = "signup_login">
            
               <a href="includes/logout.inc.php" class="btn btn-primary login" >Logout</a>
            </div>
         </nav>
      </div>
   </header>
   
   
   
   <body>


   <?php
    $id = $_SESSION['id'];
    $dbOk = false;
    @ $db = new mysqli('localhost', 'root', '', 'stock_smart');
    if ($db->connect_error) {
        echo '<div class="messages">Could not connect to the database. Error: ';
        echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
      } else {
        $dbOk = true; 
      }
    if ($dbOk) {
        $query = "select * from user_profile where userid=$id";
        $result = $db->query($query);
        $numRecords = $result->num_rows;
        if ($numRecords > 0) {
            $record = $result->fetch_assoc();
            $first = $record['first_name'];
            $last = $record['last_name'];
          
         
            $email = $record['email'];
            $pass = $record['password'];
            $image = $record['profile_image'];



            if (strlen($image) > 2){
               $image = $record['profile_image'];
             }
             else { 
               $image = 'profile.png';
             }
             $image_x = 'images/' . $image;

        }
           
           
        else {
            exit("User not found");
        }
       
      }
      $db->close();

?>










      <div class = "container">
         <div class="card-account-information">
            <div class="card-header">
               Account Information
            </div>
            <div class="card-body">
               <div class  = "row">
                  <div class = "col">
                     <p>Email</p>
                  </div>
                  <div class = "col">
                  <p><?php echo $email ?> </p>
                  </div>
                  <div class = "col">
                  </div>
                  <div class = "col">
                     <button type="button" class = "btn btn-primary change" data-toggle="modal" data-target="#EmailModal">Change</button>
                  </div>
                  <div class="modal fade" id="EmailModal" role="dialog">
                     <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                           <div class="modal-header">
                              <h3>Edit email address</h3>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>
                           <div class="modal-body">
                              <form action = "update_user_email.php" method = "post">
                                 <div class="form-group">
                                    <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" name = "email" placeholder="<?php echo $email ?> ">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                 </div>
                                 <div class="form-group">
                                    <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Email confirmation" name ="email_update">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                 </div>
                               
                                 <button type="submit" class="btn btn-primary float-right ml-2 change" >Cancel</button>
                                 <button type="submit" class="btn btn-primary float-right change" >Save</button>
                              </form>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-body">
         <div class  = "row">
            <div class = "col">
            <p>Password </p>
            </div>
            <div class = "col">
            <p><?php echo $pass ?> </p>
            </div>
            <div class = "col">
            </div>
            <div class = "col">
                  <button type="button" class = "btn btn-primary change" data-toggle="modal" data-target="#ModalPassword">Change</button>
                  <div class="modal fade" id="ModalPassword" role="dialog">
                     <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                           <div class="modal-header">
                              <h3>Change Password</h3>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>
                           <div class="modal-body">
                              <form method = "post" action = "update_user_password.php">
                                 <div class="form-group">
                                    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo $pass ?> " name = "password">
                                 </div>
                                 <div class="form-group">
                                    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="New Password" name = "password_update">
                                 </div>
                                 <div class="form-group">
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm new password" name = "password_confirm">
                                 </div>
                                 <button type="submit" class="btn btn-primary float-right ml-2 change" >Cancel</button>
                                 <button type="submit" class="btn btn-primary float-right change" >Save</button>
                              </form>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>
                  </div>
            </div>
            </div>
         </div>
      <div class="card-personal-information">
         <div class="card-header">
            Personal Information
         </div>
         <div class="card-body">
            <div class  = "row">
               <div class = "col">
                  <p>First Name</p>
               </div>
               <div class = "col">
                  <p><?php echo $first ?> </p>
               </div>
               <div class = "col">
              </div>
               <div class = "col">
                     <button type="button" class = "btn btn-primary change" data-toggle="modal" data-target="#ModalFirstLast">Change</button>
                     <div class="modal fade" id="ModalFirstLast" role="dialog">
                        <div class="modal-dialog">
                           <!-- Modal content-->
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h3>Edit Account Information</h3>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                 <form method = "post" action = "update_first_last.php">
                                    <div class="form-group">
                                       <input type="text" class="form-control" id="firstName"  placeholder= "<?php echo $first ?> " name = "first_name">
                                    </div>
                                    <div class="form-group">
                                       <input type="text" class="form-control" id="lastName"  placeholder= "<?php echo $last ?> "  name = "last_name">
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right ml-2 change">Cancel</button>
                                    <button type="submit" class="btn btn-primary float-right change">Save</button>
                                 </form>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                           </div>
                        </div>
                     </div>
               </div>
            </div>
            <div class  = "row">
               <div class = "col">
                  <p>Last Name</p>
               </div>
               <div class = "col">
               <p><?php echo $last ?> </p>
               </div>
               <div class = "col">
              </div>
              <div class = "col">
              </div>
            </div>
         </div>
      </div>
      <div class="card-personal-information">
         <div class="card-header">
            Acessibility
         </div>
         <div class="card-body">
            <div class  = "row">
               <div class = "col">
                  <p>Profile Mode</p>
               </div>
               <div class = "col">
                  <p >Personal (Private)</p>
               </div>
               <div class = "col">
              </div><div class = "col">
              </div>
            </div>
         </div>
      </div>




      <div class="card-personal-information">

      <form action="update_image.php" method = "post"  enctype="multipart/form-data">
         <div class="card-header">
            Profile Picture
         </div>
        
         <div class="row">
      <div class="col-25">




        <label for="major">Current Image: </label>
      </div>
      <div class="col-75">
        <input type="text" id="image1" name="image1" disabled value = "<?php echo $image ?>">
      </div>


      <div class = "col-75">
      <img class = "resize" src=<?php echo $image_x ?> style="width:80%; float: left; margin-left: 150px; margin-top: 40px;">
   </div>
  </div>




  <div class="row">
      <div class="col-25">
        <label for="image">Change Image: </label>
      </div>
      <div class="col-75">
		<input type="file" id="image" name="file" title = "<?php echo $image ?>">
     
      </div>
  </div>

            <div class = "row">
              <button type="submit" class="btn btn-primary change" name = "submit" >Change</button>
              </div>

           
   </form>

   
</div>
</div>


      







   
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
</html>