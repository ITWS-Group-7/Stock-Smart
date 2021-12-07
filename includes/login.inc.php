<?php 
require_once 'dbh_connect.php';

session_start(); 
if ( !isset($_POST['usrnm'], $_POST['psw']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare('SELECT id, password FROM users WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['usrnm']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
  if ($stmt->num_rows > 0) {
  	$stmt->bind_result($id, $psw);
  	$stmt->fetch();
    if ($_POST['psw'] === $psw) {

  		// Verification success! User has loggedin!
  		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
  		session_regenerate_id();
  		$_SESSION['loggedin'] = TRUE;
  		$_SESSION['usrnm'] = $_POST['usrnm'];
  		$_SESSION['id'] = $id;
      header('Location: ../kitchen.php');
      

}
  else {
  	// Incorrect username
  	echo 'Incorrect username and/or password!';
  }
}else{
  echo 'Incorrect username and/or password!';
}


	$stmt->close();
}