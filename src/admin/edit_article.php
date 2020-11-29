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
        <h1 class="cikk-header">
		    Cikk módosítása
	    </h1>
		<form action="" method="post" enctype="multipart/form-data">
		  <textarea class="cikk-place" 
		  			type="text" 
				 	cols="60"
					rows="10"
                    placeholder="IDE KELL KERÜLNIE A MÁR MEGLÉVŐ TÉNYNEK"
                    name="ctext" style="margin-bottom:  10px;" required></textarea>
			<br>
			<label for="kategoria">Kategória módosítása: </label>
			<select name="kategoria" id="kategoria" style="margin-bottom:  10px;">
				<option value="érdekes">Érdekes</option>
				<option value="vicces">Vicces</option>
			</select>
			</br>
			<input type="file" name="kep" value=""/>
			<br>
			<input type="hidden" name="event" id="event" value="cikkFel">
			<br>
		    <button class="cikk-button" type="submit" >Frissít!</button>
		</form>
        <h1 class="version">
            v.0.1
        </h1>
    </div>
</body>
</html>