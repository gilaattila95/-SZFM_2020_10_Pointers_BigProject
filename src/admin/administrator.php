<?php
  require_once("action.php");
?>
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
    <div class="container" align="center">
		<div class="vertical-center">	
		  <a href="administrator.php"> <!--innen egy legördülő menüből választhatjuk ki, melyik kategóriára szeretnénk szűrni-->
			 <button type="button" class="button1">
			   Összes cikk
			 </button>
		  </a>

		  <a href="users_articles.php">
			<button type="button" class="button2">
			  Felhasználók cikkei		
			</button>
		 </a>

		  <a href="admin_send_article.php">
			<button type="button" class="button1">
			  Cikkfeltöltés		
			</button>
		 </a>

		 <a href="add_admin.php">
			<button type="button" class="button2">
			  Admin hozzáadása	
			</button>
		 </a>

		 <a href="registered_users.php">
			<button type="button" class="button1">
			  Felhasználók		
			</button>
		 </a>

	   <a href="../index.php?event=kilepes" name="event" id="event" value="kilepes">
            <button type="button1" class="button2">Admin kilépés</button>
		</a>
	</div>
	<div class="container adminCikkLista" align="center" style="margin-top: 10px;;">
		<div class="vertical-center">
		<div>
				<form action="" method="post">
					<select name="articles" class = "form-control" id="articles">
						<option value="all" selected>Összes cikkek</option>
						<option value="érdekes">Érdekes cikkek</option>
						<option value="vicces">Vicces cikkek</option>
					</select>
					<input type="submit" name="submit" value="Listázás">
				</form>
			</div>

			<?php 
			if ($result = $dbc->query($sql)) {
				while ($row = $result->fetch_assoc()) { ?>
					<div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s; width: 800px; background-color:white;">
						<div class="container" style="padding: 2px 16px; text-align:left">
							<p><?php print truncate($row["ctext"], 60) ?></p>
						</div>
					</div> 
			<?php } 
			} else {
				$msg = "Nincs adminisztrátori jogosultságod!"; 	
			}
			?>
		</div>
	</div>
	<h1 class="version">
		v.0.2
	</h1>
    </div>
</body>
</html>