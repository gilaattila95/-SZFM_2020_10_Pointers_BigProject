<?php require_once("action.php");?>
<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>SZFM_Fact_Portal</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
	<h2 class="header">
		Tény Portál
	</h2>
    <div align="center">
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
				<button type="button" class="button3">
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
			<h1 class="article">
				<?php if ($result = $dbc->query($sql)) {
				$vicces = $result->fetch_assoc(); 
				print $vicces['ctext'];
				}?>
			<h1> 
			<img src="images/<?php print $vicces["kep"] ?>" class="fact_pic" width="30%" height="30%"></p>
			<div class="thumbs">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
				<?php
				$lnid=$vicces["lnid"];
				$x=$vicces["likes"];
				$x++;
				$sql="UPDATE `likes_number` SET `likes`=1,`dislikes`=1 where lnid=$lnid"; 
				?>
				<i id="fa fa-thumbs-up" class="fa fa-thumbs-up" ></i>
				Likes:<?php print $vicces["likes"]?><i>&nbsp;&nbsp;</i>
				<i id="fa fa-thumbs-down" class="fa fa-thumbs-down"></i>
				Dislikes:<?php print $vicces["dislikes"]?><i>&nbsp;&nbsp;</i>
			</div>
			<a href="">
				<button type="button" class="back">	
							Vissza
				</button>
			</a>
			<a href="vicces.php">
				<button type="button" class="forward">
					Következő
				</button>
			</a>
		</div>
    </div>
    <h1 class="version">
    v.0.2
    </h1>
</body>

</html>
