
<?php 
	session_start(); // starting the session, necessary for using session variables

	// DBMS connection code -> hostname, username, password, database name
	$db = mysqli_connect('localhost', 'root', '', 'bigproject');
	$sql = "set names utf8";
	mysqli_query($db, $sql);

	// declaring and hosting the variables
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// registration code
	if (isset($_POST['reg_user'])) {

		// receiving the values entered and storing in the variables
		//data sanitization is done to prevent SQL injections
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// ensuring that the user has not left any input field blank
		// error messages will be displayed for every blank input
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
	
		//checking if the passwords match
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		
		$sql_u = "SELECT * FROM ceg_userek WHERE uname='$username'";
		$sql_e = "SELECT * FROM ceg_userek WHERE email='$email'";
		$res_u = mysqli_query($dbc, $sql_u);
		$res_e = mysqli_query($dbc, $sql_e);
  
		if (mysqli_num_rows($res_u) > 0) {
			array_push($errors, "Username already taken!"); 	
		}
		
		if(mysqli_num_rows($res_e) > 0){
			array_push($errors, "Email already taken!"); 	
		}	

		// if the form is error free, then register the user
		if (count($errors) == 0) {
			$password = md5($password_1);//password encryption to increase data security
			$query = "INSERT INTO ceg_userek (`email`, `jelszo`, `uname`, `aktiv`) 
					  VALUES('$email', '$password','$username', '1' )"; //inserting data into table
			mysqli_query($db, $query);

			//storing username of the logged in user, in the session variable
			$_SESSION['username'] = $username;
			header('location: ../src/user/user_article.php'); 
			//page on which the user will be redirected after logging in
		}

	}

	// user login
	if (isset($_POST['login_user'])) {
		//data sanitization to prevent SQL injection
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		//error message if the input field is left blank
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		//checking for the errors
		if (count($errors) == 0) {
			$password = md5($password); //password matching
			$query = "SELECT * FROM ceg_userek WHERE uname='$username' AND jelszo='$password'";
			$results = mysqli_query($db, $query);

			// $results = 1 means that one user with the entered username exists
			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username; //storing username in session variable
				header('location:../src/user/user_article.php'); //page on which the user is sent to after logging in
			}else {
				array_push($errors, "Username or password incorrect"); 
				//if the username and password doesn't match
			}
		}
	}

    //HA HOSSZÚ A SZÖVEG, LEGYEN RÖVID ÉS '...'
    function truncate($str, $chars, $end = '...') {
        if (strlen($str) <= $chars) return $str;
        $new = substr($str, 0, $chars + 1);
        return substr($new, 0, strrpos($new, ' ')) . $end;
	}

?>