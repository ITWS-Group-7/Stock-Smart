<?php session_start(); 


if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit;
}

  require_once 'includes/dbh_connect.php';

?>




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
        $query = "select * from donation where userid=$id";
        $result = $db->query($query);
        $numRecords = $result->num_rows;
        if ($numRecords > 0) {
            $record = $result->fetch_assoc();
            $food_name = $record['food_name'];
            $expiration_date = $record['expiration_date'];
          
         
            $donated = $record['donated'];
            


           
            
          

        }
           
           
        
       
      }
      $db->close();

?>




<html>
    <head>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="css/styles.css">
    </head>
  <body>
    <style>
      
      table, th, td {
        border:1px solid black;
        text-align:center;
        margin-left: auto;
        margin-right: auto;
      }
      /* #id01{
        display:none;
        margin-left:0;
        margin-right: 0;
        text-align:center;
        padding:20px;
      } */
      /* body{
        text-align:center;
      } */


      </style>

      <!-- Navbar-->
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
                    <li class="nav-item active">
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




    <!--Graph-->
    <div class="container">
      <h1 style="text-align: center">Donation list</h1>
      <div class="modal-body">
        <table class = "table  table-bordered">
          <thead class ="thead-light">
            <tr id="hvr-grow-shadow">
             
              <th scope = "col">Food</th>
              <th scope = "col">Expiration</th>
              <th scope = "col">Donated</th>
              <th scope = "col">Close to expire</th>
            </tr>
          </thead>
            <tbody>
            
            <?php foreach ($result as $row) {  ?>
                <tr id="hvr-grow-shadow"">
                <td><?php echo $row ['food_name']; ?></td>
                <td><?php echo $row ['expiration_date']; ?></td>
                <td><?php echo $row ['donated']; ?></td>
                 <td><?php echo 0 ?></td>
                </tr>
                <?php } ?>
              
            
          </tbody>
        </div>
        </div>
          
          </table>

    
      <!-- Button trigger modal -->
      <div class="container">
        <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#exampleModal">
          Add to Donation List
        </button>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title">Add to Donation List</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                  <form action = "includes/donationlistcreate.php" method = "POST">
                      <div class="form-group">
                        <label for="food">Food</label>
                        <input class="form-control"name ="food" type="text" placeholder="Input food item">
                      </div>
                      <div class="mb-3">
                    <label for="exampleFormControlSelect1">Select Food Group</label>
                    <select class="form-control" name ="group" id="exampleFormControlSelect1">
                      <option value ="Dairy">Dairy</option>
                      <option  value ="Fruits">Fruits</option>
                      <option value ="Vegetables">Vegetables</option>
                      <option value ="Grains">Grains</option>
                      <option value ="Protien">Protein</option>
                    </select>
                  </div>
                        <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark" name='submit-donate'>Submit</button> 
                        </div>
                       
                    </form>
              </div>
             
          </div>
          </div>
      </div>



        


    </body>

    
    
 
</html>
 