<?php require_once("action.php");?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>SZFM_Fact_Portal</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
	<h2 class="header">
		Tény Portál
	</h2>
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
			<a href="../index.php?event=kilepes" name="event" id="event" value="user_kilepes">
				<button type="button" class="button2">
					Kilépés
				</button>
			</a>  
		</div>
		<h1 style="color:white;">Saját cikkek rangsora like-számok alapján</h1>
		<div style="display:inline-flex">
			<div style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border: 2px solid black;width: 200px; background-color:grey; font-size: 25px;">
				<p>Likeszám</p>
			</div>
			<div style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border: 2px solid black; width: 600px; background-color:white;font-size: 25px;">
				<p>Cikk</p>
			</div>
		</div>
		<?php
			if ($result = $db->query($sql)) {
				while ($row = $result->fetch_assoc()) { ?>
					<div style="display:inline-flex">
						<div style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); width: 200px; background-color:grey;">
							<p><?php print $row["likes"] ?></p>
						</div>
						<div style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); width: 600px; background-color:white;">
							<p><?php print truncate($row["ctext"], 60);?></p>
						</div>
					</div>
		<?php } 
			} else { 	
			}
		?>
	</div>
	<h1 class="version">
		v.0.1
	</h1>
</body>
</html>