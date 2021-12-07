<?php include('includes/dbh_connect.php') ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/signup.css">
    <title>StockSmart</title>
  </head>
  <body>
    <section class="vh-100" style="background-color: green;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-120">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row ">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img
                      src="images/logo.svg"
                      alt="login form"
                      class="img-fluid" 
                    />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form action = "includes/register.inc.php" method ="POST">
      
                        <div class="wrapper ">
                          <ul class = "top_bar">
                          <li class = "sign_up">
                              <a href="signup.php">SIGN UP</a>
                          </li>
                          <li class = "login">
                            <a href="login.php">LOGIN</a>
                        </li>
                        <hr>
                        </ul>
                        </div>
                        
                      
                        
                        <div class="form-outline mb-4">
                          <input type="text" id="form2Example17" class="form-control form-control-lg" placeholder="First Name" name = "firstnm" />
                          
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="text" id="form2Example27" class="form-control form-control-lg" placeholder="Last Name" name = "lastnm" />
                          
                        </div>
                        <div class="form-outline mb-4">
                            <input type="email" id="form2Example27" class="form-control form-control-lg" placeholder="Email" name = "email"/>
                            
                          </div>




                          <div class="form-outline mb-4">
                            <input type="text" id="form2Example27" class="form-control form-control-lg" placeholder="Username" name = "username"/>
                            
                          </div>
                          <div class="form-outline mb-4">
                            <input type="password" id="form2Example27" class="form-control form-control-lg" placeholder="Password" name = "pw"/>
                            
                          </div>
      
                        <div class="pt-1 mb-4">
                        <button type="submit" class="btn btn-dark btn-lg btn-block" name= "submit">SIGN UP</button>
                         
                        </div>
      
                    
                      </form>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
   
   
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>