<?php
require_once 'dbh_connect.php';
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'stock_smart');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $first = mysqli_real_escape_string($db, $_POST['firstnm']);
  $last = mysqli_real_escape_string($db, $_POST['lastnm']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $pass = mysqli_real_escape_string($db, $_POST['pw']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($first)) { array_push($errors, "First name is required"); }
  if (empty($last)) { array_push($errors, "Last name is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  
  if (empty($pass)) { array_push($errors, "Password is required"); }
 

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  
  	$query = "INSERT INTO users (first_name, last_name, email,username, password) 
  			  VALUES('$first', '$last','$email','$username', '$pass')";

$query2 = "INSERT INTO user_profile (first_name, last_name, email,password, profile_image) 
VALUES('$first', '$last','$email', '$pass', 'profile.png')";
  	mysqli_query($db, $query);
    mysqli_query($db, $query2);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('Location:../login.php');
  }
}

// ... 