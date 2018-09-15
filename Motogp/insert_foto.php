<!DOCTYPE html>
<?php
	require_once'index_foto.php';
	require_once'header.php';
?>
<html lang="it">
<head>
	<?php
		head();
		titolo(19);
	?>
</head>
<body>
	<img class="logohomeadmin" src="logo.png" alt='Logo della MotoGP'/>
	<div class="insert"><h1>Inserisci nuova immagine</h1></div>
	<p class="notify">Tutti i campi con (*) devono essere compilati</p>
	<?php insertfoto(); ?>
	<div class="body-content">
		<div class="module">
			<form  action="insert_foto.php" method="POST" onsubmit="return validateInserireFoto()">
				<label for="descrizione"><span class='pbol'>*Didascalia:</span></label>
				<textarea rows="10" cols="41" name="gallery_description" id="descrizione" placeholder="Descrizione Immagine"></textarea><br> 
				<label for="percorso"><span class='pbol'>*Percorso Immagine:</span></label>
				<input type="text" name="foto_path" id="percorso" placeholder="Percorso"><br>
				<button type="submit" name="submit" class='submit btn btn-blockadmin btn-primary'>Invia</button> 	
			</form>
			<div class="li"> <a href="adminfoto.php" lang="en" class="ilink">Foto</a></div>
	</div>
	</div>
</body>
</html>