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
		  <a href="administrator.php">
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
        <h3>Regisztrált felhasználók:</h3>
        </br>
	<div class="container usersLista" align="center" style="margin: 10px; width: 550px;">
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Keresés név alapján..." title="Adj meg egy nevet.">
		<div class="vertical-center">
		<table id="myTable" style="margin-top: 15px;">
			<tr>
				<th style="text-align: center;">Név</th>
				<th style="text-align: center;">Beküldött cikkek száma</th>
				<th style="text-align: center;">Admin</th>
				<th></th>
			</tr>
			<?php if ($result = $dbc->query($sql)) {
				while ($row = $result->fetch_assoc()) { ?>
			<tr>
				<td><?php print $row["uname"] ?></td>
				<td style="text-align: center;"><?php print $row["count(usent)"]; ?></td>
				<td style="text-align: center;"><?php print $row["admin"]; ?></td>
				<td>
				<form action="" method="post">
						<input type="hidden" name="cuid" value="<?php print $row["cuid"]; ?>">
						<button type="submit" name="event" value="torles">Törlés</button>
					</form>
				</td>
			</tr>
			<?php } 
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
	<script>
		function myFunction() {
			var input, filter, table, tr, td, i, txtValue;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			table = document.getElementById("myTable");
			tr = table.getElementsByTagName("tr");
			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[0];
				if (td) {
				txtValue = td.textContent || td.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
				}       
			}
		}
	</script>
</body>
</html>