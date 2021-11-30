<?php
/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=stock_smart", $username, $password);
    $dbconn = new PDO("mysql:host=$hostname;dbname=stock_smart",$username,$password);
    echo 'Connected to database';
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

    include_once 'grocery.php';
    if(isset($_POST['submit-grocery']))
    {    
      $id = Null;
     $food = $_POST['food'];
     $group = $_POST['group'];
     if(isset($_POST['bought'])){
      $bought = '1';
      } else {
      $bought = '0';
      }
     $sql = "INSERT INTO grocery (id,food_name,bought,food_group,userid) VALUES (NULL,'$food','$bought','$group','1');";
     $stmt = $dbconn->query($sql);
     if ($stmt) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql;
     }
     header("Location:grocery.php");
    
}


if(isset($_POST['add']))
    {    
      $dbh = new PDO("mysql:host=$hostname;dbname=stock_smart", $username, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      $num = $_POST['add'];
      echo "$num";
      $query = $dbh->query("SELECT * FROM grocery where id ='$num'");
      $row = $query->fetch();
     $food = $row['food_name'];
     $group = $_POST['food_group'];
     $sql = "INSERT INTO `food_items` (`id`, `food_name`, `food_group`, `purchase_date`, `expiration_date`, `item_opened`, `userid`) VALUES (NULL, '$food', '$group', current_timestamp(), current_timestamp(), '', '');";
     $stmt = $dbh->query($sql);
     if ($stmt) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql;
     }
     header("Location:grocery.php");
    
}

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$query = $dbh->query('SELECT * FROM grocery');
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
                    <li class="nav-item active">
                      <a class="nav-link menu"  href="kitchen.php">In My Kitchen <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link menu" href="grocery.php">Grocery List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu" href="donation.php">Donation List</a>
                      </li>
      
      
                  
                    <li class="nav-item dropdown ">
                      <a class="nav-link dropdown-toggle menu_profile" href="#Profile" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style = "font-size: 16px; ">
                        Profile
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="user_profile.php">My profile</a>
                        <a class="dropdown-item" href="#">Switch Account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Log out</a>
                      </div>
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




    <!--Graph-->
    <div class="container">
        <h1 class="title">MY GROCERY LIST:</h1> <h4  class="sub_title pb-3" id="date"></h4>
        <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col">#</th>
            <th scope="col">FOOD</th>
            <th scope="col">FOOD GROUP</th>
            <th scope="col">BOUGHT</th>
            <th scope="col">ADD TO KITCHEN</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $query->fetch()) 
            {
              echo "<tr>";
              echo "<th scope='row'>". $row['id'] ."</th>";
            echo "<td>" . $row['food_name'] ."</td>";
            echo "<td>" . $row['food_group'] . "</td>";
            echo '<td><div class="form-check">';
            if($row['bought'] == 1){
              echo "Yes";
            } else {
              echo "No";
            }
           // echo '<input class="form-check-input" type="checkbox" name ="bought" value="" id="flexCheckDefault">';
            //echo '<label class="form-check-label" for="flexCheckDefault"></label>';
            echo '</div>';
            echo '</td>';
            echo '<td>';
            echo '<div class="form-check">';
            echo '<form name="form" action="" method="post">';
                   echo' <button type="submit" class="btn btn-dark" name="add" value ="'.$row['id'].'">Submit</button>';
                   echo ' <label class="form-check-label" for="flexCheckDefault"></label>';
            echo '</form></div>';
            echo '</td>';
            echo "</tr>";
            }
            ?>
            
        </tbody>
        </table>
        </div>
        <div class="container">
        <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#exampleModal">
          Add to Grocery List
        </button>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title">Add to Grocery List</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                  <form action="" method="post">
                      <div class="form-group">
                        <label for="food">Food</label>
                        <input class="form-control" name ='food' type="text" placeholder="Input food item">
                      </div>
                      <div class="form-group">
                          <label for="food-group">Food Group</label>
                          <input class="form-control" name = 'group' type="text" placeholder="Input location for Donation">
                          <small id="emailHelp" class="form-text text-muted">Please put down the specific name or location</small>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" name ='bought' id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Bought</label>
                        </div>

                      <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                         <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark" name='submit-grocery'>Submit</button>
              </div>
                    </form>
              </div>
          </div>
          </div>
      </div>
        
    </body>
    <script src = "kitchen.js"></script>
</html>
 