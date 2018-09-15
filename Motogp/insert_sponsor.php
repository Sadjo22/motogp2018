<!DOCTYPE html>
<?php
	require_once'index_sponsor.php';
	require_once'header.php';
?>
<html lang="it">
<head>
	<?php
		head();
		titolo(18);
	?>
</head>
<body>
	<img class="logohomeadmin" src="logo.png" alt='Logo della MotoGP'/>
	<div  class="insert"><h1>Inserire un nuovo sponsor</h1></div>
	<p class="notify">Tutti i campi con (*) devono essere compilati</p>

	<?php insertsponsor(); ?>
	<div class="body-content">
		<div class="module">
			<form  action="insert_sponsor.php" method="POST" onsubmit="return validateInsertSponsor()">
				<label for="per_im"><span class="pbol">*Percorso Immagine:</span></label>
				<input type="text" name="sponsor_immagine" id="per_im" placeholder="Percorso"><br>
				<label for="descr_im"><span class="pbol">*Alt immagine:</span></label>
				<input type='text' name='alt_sponsor' id="descr_im" placeholder="Descrizione">
				<button type="submit" name="submit" id="bt" class=' submit btn btn-blockadmin btn-primary'>Invia</button> 

			</form>

			<div class="li"> <a href="adminhome.php" lang="en" class="ilink
				"><span lang="en"> Home</span></a></div>


	</div>
	</div>
</body>
</html>