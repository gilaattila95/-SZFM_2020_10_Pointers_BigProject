<?php require_once("action.php");?>
<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>SZFM_Fact_Portal</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
	<h2 class="header">
		Tény Portál
	</h2>
	<?php  if (isset($_SESSION["logged"]) && $_SESSION["logged"] == true){ ?>
    <div align="center">
      	<div class="vertical-center">	
			<a href="user_article.php">
				<button type="button" class="button1">
					Saját cikkek		
				</button>
			</a>
			<a href="user_send_article.php">
				<button type="button" class="button2">
					Cikk beküldése
				</button>
			</a>
			<a href="user_rank.php">
				<button type="button" class="button1">
					Rangsor
				</button>
			</a>
			<a href="logout.php" name="event" id="event" value="kilepes">
				<button type="button" class="button2">
					Kilépés
				</button>
			</a> 
        </div>
	</div>
	<div class="welcome" align="center" style="font-size:50px;margin-top: 20px; font-weight: bold; color:white;" >
		<?php
			$uname=$_SESSION['uname'];
			print ("Üdvüzlünk: $uname!");
		?>
	</div>
	<div class="userCikkLista" align="center" style="margin-top: 10px;">
		<div class="vertical-center">		
			<?php 		
				if ($result = $dbc->query($sql)) {
					while ($row = $result->fetch_assoc()) { ?>
			<div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s; width: 800px; background-color:white;">
				<div  style="padding: 2px 16px; text-align:left">
					<p><?php print truncate($row["ctext"], 60) ?></p>
				</div>
			</div> 
			<?php } 
				} else {
					$msg = ""; 
					
				}
			?>	
		</div>
	</div>
	<?php 
		} else {
            header("location:../login.php");
		}
	?>
    <h1 class="version">
    v.0.2
    </h1>
</body>
</html>
