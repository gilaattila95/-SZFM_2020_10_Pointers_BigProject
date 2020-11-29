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
            <button type="button" class="button2">Admin kilépés</button>
		</a>

	</div>
        <br>
        <h3>Aktív Adminok:</h3>
        </br>
	<div class="container usersLista" align="center" style="margin: 10px;">
		<div class="vertical-center">
		<table id="myTable" style="width: 500px;">
			<tr>
				<th>Név</th>
				<th style="text-align: center;">Admin</th>
				<th></th>
			</tr>
			<?php if ($result = $dbc->query($sql)) {
				while ($row = $result->fetch_assoc()) { 
					if($row["admin"] == 1) { ?>
			<tr>
				<td><?php print $row["uname"] ?></td>
				<td style="text-align: center;"><?php print $row["admin"] ?></td>
				<td></td>
			</tr>
			<?php } }
			} else {
				$msg = "Nincs adminisztrátori jogosultságod!"; 
			}
			?>
			</table>
		</div>
	</div>
	<br>

	<br>
        <h3>Adminok hozzáadása:</h3>
        </br>
	<div class="container usersLista" align="center" style="margin: 10px;">
		<div class="vertical-center">
		<table id="myTable" style="width: 500px;">
			<tr>
				<th>Név</th>
				<th style="text-align: center;">Admin</th>
				<th></th>
			</tr>
			<?php if ($result = $dbc->query($sql)) {
				while ($row = $result->fetch_assoc()) { 
					if($row["admin"] == 0) {?>
			<tr>
				<td><?php print $row["uname"] ?></td>
				<td style="text-align: center;"><?php print $row["admin"] ?></td>
				<td style="text-align: center;">
					<form action="" method="post">
						<input type="hidden" name="cuid" value="<?php print $row["cuid"] ?>">
						<input type="submit" name="event" value="aktivalas">
					</form>
				</td>
			</tr>
			<?php } }
			} else {
				$msg = "Nincs adminisztrátori jogosultságod!"; 
			}
			?>
			</table>
		</div>
	</div>
	<br>

	<h1 class="version">
		v.0.2
	</h1>
    </div>
</body>
</html>