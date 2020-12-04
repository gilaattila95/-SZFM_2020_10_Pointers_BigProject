<?php
 session_start();
 
 // Adatbázis csatlakozás
$dbc = mysqli_connect("localhost", "root", "", "bigproject");
$sql = "set names utf8";
mysqli_query($dbc, $sql);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

// Eseménykezelés
$pEvent = htmlspecialchars(filter_input(INPUT_POST, "event"));
$gEvent = htmlspecialchars(filter_input(INPUT_GET, "event"));
$uname = htmlspecialchars(filter_input(INPUT_POST, "uname"));
$psw = htmlspecialchars(filter_input(INPUT_POST, "psw"));
$ctext = htmlspecialchars(filter_input(INPUT_POST, "ctext"));
$kategoria = filter_input(INPUT_POST, "kategoria");
$_SESSION['success'] = "";
$uzenet = "";
$errors = array();
$username = "";
$email    = "";

// registration code
if (isset($_POST['reg_user'])) {

	// receiving the values entered and storing in the variables
	//data sanitization is done to prevent SQL injections
	$username = mysqli_real_escape_string($dbc, $_POST['username']);
	$email = mysqli_real_escape_string($dbc, $_POST['email']);
	$password_1 = mysqli_real_escape_string($dbc, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($dbc, $_POST['password_2']);

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
		mysqli_query($dbc, $query);
		$amsg = "Sikeres Regisztráció!"; 
        phpAlert($amsg);
		//page on which the user will be redirected after logging in
	}

}
		
// Bejelentkezés	
if ($pEvent == "user_login") {
	$sqlf = "select * from ceg_userek where uname = '$uname'";
		
	if($result = mysqli_query($dbc, $sqlf)) {
		$row = mysqli_fetch_row($result);
		if(md5($psw) == $row[2]) {// Beléphet
			$_SESSION['logged'] = true;
			$_SESSION["cuid"] = $row[0];
			$_SESSION["uname"] = $row[3];
			if($_SESSION['logged'] == true && isset($_SESSION['uname'])) {
				header("location:../src/user/user_article.php");
			}
		} else { // Nem léphet be
			$uzenet = "Sikertelen belépés!";
			phpAlert($uzenet);
		}  
	}

}

//User saját cikkeinek a kilistázása 
if (pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) == "user_article") {
    if (isset($_SESSION["cuid"])) {
		$cuid=$_SESSION["cuid"];
        $sql ="select * from cikkek where usent=$cuid";
        $cikkek = mysqli_query($dbc, $sql);
	}
}

//Rangsor kilistázása like-ok alapján
if (pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) == "user_rank") {
	$cuid = $_SESSION["cuid"];
    $sql ="select * from cikkek inner join likes_number on cikkek.cid=likes_number.cid where usent=(SELECT cuid FROM ceg_userek WHERE cuid='$cuid') order by likes desc ";
    $cikkek = mysqli_query($dbc, $sql);
}

//HA HOSSZÚ A SZÖVEG, LEGYEN RÖVID ÉS '...'
function truncate($str, $chars, $end = '...') {
	if (strlen($str) <= $chars) return $str;
	$new = substr($str, 0, $chars + 1);
	return substr($new, 0, strrpos($new, ' ')) . $end;
}

//Cikk feltöltés
function phpAlert($msg) {
    echo  '<div align="center"> <div class="alert" style=" width: 450px; padding: 20px; background-color: #51A9F6; color: white; margin-bottom: 15px;">';
    echo '<span class="closebtn" onclick="this.parentElement.style.display=\'none\'"';
    echo ' style="margin-left: 15px; color: white; font-weight: bold; float: right; font-size: 22px; line-height: 20px; cursor: pointer; transition: 0.3s;"';
    echo '>&times;</span>';
    echo $msg;
    echo '</div></div>'; 
}

if (pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) == "user_send_article") {
    if (isset($_SESSION["cuid"])) { 
        $cuid = $_SESSION["cuid"];
        if($pEvent == "cikkFel") { 
            if ($_FILES['kep']['size'] == 0 && $_FILES['kep']['error'] == 0) {
                $sql = "insert into cikkek (ctext, kep, asent, usent, aktiv, kategoria) values ('$ctext', '', 0, $cuid, 0, '$kategoria')";
                if(mysqli_query($dbc, $sql)) {
                    $_SESSION['msg'] ="A cikkfeltöltés sikeres!";
                    header("location: users_articles.php");
                    exit;
                    
                } else {
                    $msg ="A cikkfeltöltés sikertelen!";
                    phpAlert($msg);
                }
            } else {
                $filename = $_FILES["kep"]["name"]; 
                $tempname = $_FILES["kep"]["tmp_name"];     
                $folder = "../images/".$filename; 
            
                if (($_FILES["kep"]["type"] == "image/jpeg" || $_FILES["kep"]["type"] == "image/pjpeg") || $_FILES["kep"]["type"] == "image/png" || $_FILES["kep"]["type"] == "image/jpg" || $_FILES["kep"]["size"] == 0 && isset($ctext) ) {
                    $sql = "insert into cikkek (ctext, kep, asent, usent, aktiv, kategoria) values ('$ctext', '$filename', 0, $cuid, 0, '$kategoria')";
                    if(mysqli_query($dbc, $sql)) {
                        if (move_uploaded_file($tempname, $folder))  { 
                            $msg = "A képfeltöltés sikeres!"; 
                            //phpAlert($msg);
                        
                        } else { 
                            $msg = "A képfeltöltés sikertelen!"; 
                            //phpAlert($msg);
                        }
                        $msg = "A cikkfeltöltés sikeres!"; 
                        phpAlert($msg);
                    } else {
                        $msg = "A cikkfeltöltés sikertelen!"; 
                        phpAlert($msg);
                    }
                } else {
                    $msg = "A képformátum nem megfelelő!"; 
                    phpAlert($msg);
                }
            }
        }
    } 
}
?>