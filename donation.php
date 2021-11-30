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

    include_once 'donation.php';
    if(isset($_POST['submit-donate']))
    {    
     $food = $_POST['food'];
     $group = $_POST['group'];
     $sql = "INSERT INTO donation (`id`, `food_name`, `username`, `expiration_date`, `donated`) VALUES (NULL, '$food', 'test', '2021-12-08 09:18:59', '1');";
     $stmt = $dbconn->query($sql);
     if ($stmt) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql;
     }
    
}
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$query = $dbh->query('SELECT * FROM donation');
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
      body{
        text-align:center;
      }


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
                    <li class="nav-item active">
                      <a class="nav-link menu"  href="./kitchen.html">In My Kitchen <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link menu" href="grocery.html">Grocery List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu" href="donationlist.html">Donation List</a>
                      </li>
      
      
                  
                    <li class="nav-item dropdown ">
                      <a class="nav-link dropdown-toggle menu_profile" href="#Profile" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style = "font-size: 16px; ">
                        Profile
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">My profile</a>
                        <a class="dropdown-item" href="#">Switch Account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Log out</a>
                      </div>
                    </li>
      
      
                 
                   <hr>
      
      
                  
                  
      
                  </ul>
                </div>
      
                <div class = "signup_login">
                  <a href="./signup.html" class="btn btn-primary signup">Sign Up</a>
                  <a href="./login.html" class="btn btn-primary login" >Login</a>
                </div>
      
      
      
      
            
              </nav>
             
        </div>
      </header>




    <!--Graph-->
    <div class="container">
      <h1>Donation list</h1>
      <div class="modal-body">
        <table class = "table  table-bordered">
          <thead class ="thead-light">
            <tr>
              <th scope = "col">Close to expire</th>
              <th scope = "col">Food</th>
              <th scope = "col">Expiration</th>
              <th scope = "col">Donated</th>
            </tr>
          </thead>
            <tbody>
            
            <?php
            while ($row = $query->fetch()) 
            {
              
              echo "<tr>";
              echo "<th scope='row'>". $row['id'] ."</th>";
            echo "<td>" . $row['food_name'] ."</td>";
            echo "<td>" . $row['expiration_date'] . "</td>";
            echo '<td><div class="form-check">';
            if($row['donated'] =1){
              echo "Yes";
            } else {
              echo "No";
            }
           // echo '<input class="form-check-input" type="checkbox" name ="bought" value="" id="flexCheckDefault">';
            //echo '<label class="form-check-label" for="flexCheckDefault"></label>';
            echo '</div>';
 
            echo "</tr>";
            
            }
            ?>
              
            
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
                  <form action="" method="post">
                      <div class="form-group">
                        <label for="food">Food</label>
                        <input class="form-control"name ='food' type="text" placeholder="Input food item">
                      </div>
                      <div class="form-group">
                          <label for="food-group">Food Group</label>
                          <input class="form-control" name = 'group' type="text" placeholder="Input location for Donation">
                          <small id="emailHelp" class="form-text text-muted">Please put down the specific name or location</small>
                        </div>

                      <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                         <div class="modal-footer">
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
 