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
	</div>
	<h1 class="version">
		v.0.1
	</h1>
</body>
</html>