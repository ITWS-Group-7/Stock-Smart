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
                      <a class="nav-link menu" href="./grocery.html">Grocery List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu" href="./donationlist.html">Donation List</a>
                      </li>


                  
                    <li class="nav-item dropdown ">
                      <a class="nav-link dropdown-toggle menu_profile" href="#Profile" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style = "font-size: 16px; ">
                        Profile
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="user_profile.php">My profile</a>
                        <a class="dropdown-item" href="#">Switch Account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="includes/logout.inc.php">Log out</a>
                      </div>
                    </li>


                 
                   <hr>


                  
                  

                  </ul>
                </div>

                <div class = "signup_login">

                  <a href="includes/logout.inc.php" class="btn btn-primary signup">Logout</a>
                  

                </div>
      




            
              </nav>
             
        </div>
    </header>

<div class="container">
    <div class = "title">
      <h1>Food Group</h1>
      <hr class ="underline">
    </div>
    <div class="row" style = "text-align: center; margin-top: 10px;">
      <div class="col-sm-1"></div>
      <div class="col-sm-2">
       
        <div class="card " style = "border-radius: 10%; border-color: white;    " >
          <img src="images/1.png" class="card-img-top" alt="...">

          <div class="card-body">
         
            <a href="#" class="btn btn-primary food_group" id = "food_group_dairy">DAIRY</a>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="card" style = "border-radius: 10%; border-color: white; ">
          <img src="images/2.png" class="card-img-top" alt="...">
          <div class="card-body">
         
         
           
            <a href="#" class="btn btn-primary food_group" id = "food_group_fruits">FRUITS</a>
          </div>
        </div>
      </div>

      <div class="col-sm-2">
        <div class="card" style = "border-radius: 10%; border-color: white;">
          <img src="images/3.png" class="card-img-top" alt="...">
          <div class="card-body">
           
            
            
            <a href="#" class="btn btn-primary food_group" id = "food_group_vegetables">VEGETABLES</a>
          </div>
        </div>
        </div>
      

      <div class="col-sm-2">
        <div class="card" style = "border-radius: 10%; border-color: white;">
          <img src="images/4.png" class="card-img-top" alt="...">
          <div class="card-body">
           
           
            <a href="#" class="btn btn-primary food_group" id  = "food_group_grains">GRAINS</a>
          </div>
        </div>
      </div>
    

      <div class="col-sm-2">
        <div class="card" style = "border-radius: 10%; border-color: white;">
          <img src="images/5.png" alt="">
          <div class="card-body">
      
            
            <a href="#" class="btn btn-primary food_group" id = "food_group_protien">PROTIEN</a>
          </div>
        </div>
      </div>
    </div>
  </div>



    
    <div class="container pt-5">
      <div class = "title">
        <h1>My Kitchen</h1>
        <hr id  ="underline_kitchen">
      </div>
     
      <h4  class="sub_title pb-3" id="date"></h4>
      

      <table class="table " id = "food_table">
     
          <tr>
           
            <th scope="col">FOOD</th>
            <th scope="col">PURCHASE DATE</th>
            <th scope="col">EXPIRATION</th>
            <th scope = "col">OPENED</th>
            <th scope="col">STATUS</th>

            
          </tr>

          
       
</table>

<!-- Modal -->
<div class="modal fade" id="success_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header good_alerts">
        <h5 class="modal-title" id="success">ITEM INFORMATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Whole Milk was purchased two days ago. It is reccomended that you finish this item within the next 5 days or consider donating it. </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary">Keep on List</button>
        <button type="button" class="btn btn-primary">Donate</button>
      </div>
    </div>
  </div>
</div>









<!-- Modal -->
<div class="modal fade" id="warning_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bad_alerts">
        <h5 class="modal-title" id="failure">ITEM INFORMATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Sour cream was purchased 11 days ago. This item is unopened and will expire in 4 days. It is reccomended that you donate or finish the item.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" >Prioritize: Move to Top of List</button>
        <button type="button" class="btn btn-primary">Donate</button>
      </div>
    </div>
  </div>
</div>



      <div class = "table_footer pb-5">


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


                <form>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Food</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Food Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Food Group</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>Dairy</option>
                      <option>Fruits</option>
                      <option>Vegetables</option>
                      <option>Grains</option>
                      <option>Protien</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Purchase Date</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Purchase Date MM-DD-YY">
                  </div>




                  <div class="form-group">
                    <label for="exampleFormControlInput1">Expiration Date</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Expiration Date MM-DD-YY">

                    
                   
                
                  </div>


                  <div class="form-group">
                    <label for="exampleFormControlInput1">Item Opened</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter yes or no">
                   
                  </div>


        </div>
              <div class="modal-footer">
               
                <button type="button" class="btn add_item">Add Item</button>
              </div>
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
