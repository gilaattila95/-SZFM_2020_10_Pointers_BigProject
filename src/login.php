<?php
  require_once("user/action.php");
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>SZFM_Fact_Portal</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
	<h2 class="header">
		Tény Portál
	</h2>
    <div class="container" align="center">
		<div class="vertical-center">	
		  <a href="index.php">
			 <button type="button" class="button1">
			   Érdekességek 		
			 </button>
		  </a>
		  <a href="vicces.php">
			  <button type="button" class="button2">
			   Viccesek
			  </button>
		  </a>
		  <a href="reg.php">
			  <button type="button" class="button2">
			   Regisztráció
			  </button>
		  </a>
          <a href="login.php">
			  <button type="button" class="button1">
			   Belépés
			  </button>
		  </a>
          <a href="admin.php">
			  <button type="button" class="button2">
			   Admin 
			  </button>
		  </a>
          <a href="rank.php">
			  <button type="button" class="button1">
			   Rangsor
			  </button>
		  </a>
		</div>
		<form method="post" action="login.php"> 
   
   <?php include('errors.php'); ?> 

   <div class="login"> 
	   <label>Felhasználónév:</label> <br>
	   <input type="text" name="username" > <br>
	   <label>Jelszó:</label> <br>
	   <input type="password" name="password"> <br><br>
	   <button type="submit" class="admin-button" name="login_user">Belépés</button> 
   </div> 
   <p> 
	   Még nincs fiókod? 
	   <a href="reg.php"> 
		Katt ide!
	   </a> 
   </p> 
</form> 
	<h1 class="version">
		v.0.2
	</h1>
    </div>
</body>
</html>