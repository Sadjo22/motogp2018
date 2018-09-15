<!DOCTYPE html>
<?php 
	require_once'index.php';
	require_once'header.php';

?>
<html lang="it">
<head>
	<?php
		head();
		titolo(22);
	?>
</head>
<body>
	<img class="logohomeadmin" src="logo.png" alt='Logo della MotoGP'/>
	<div class="insert"><h1>Inserisci i dati del team</h1></div>
	<p class="notify">Tutti i campi con (*) devono essere compilati</p>

	<?php insertteam(); ?>
	<div class="body-content">
		<div class="module">
			<form  action="insert_team.php" method="POST" onsubmit="return validateInserireTeam()">
				<label for="s_nome"><span class="pbol">*Nome</span></label>
				<input type="text" name="squadra_nome" id="s_nome" placeholder="Nome "><br>
				<label for="s_info"><span class="pbol">*Info</span></label>
				<textarea rows="10" cols="41" name="squadra_info" id="s_info" placeholder="Informazioni..."></textarea></br>
				<label for="s_nazione"><span class="pbol">*Nazione</span></label>
				<input type="text" name="squadra_nazione" id="s_nazione" placeholder="Nazione"><br>
				<label for="s_immagine
				"><span class="pbol">*Percorso Immagine</span></label>
				<input type="text" name="squadra_immagine" id="s_immagine" placeholder="Percorso Immagine"><br>
				<button type="submit" name="submit" class=' submit btn btn-blockadmin btn-primary'>Invia</button> 
			</form>
			<div class="li"> <a href="adminpiloti.php" lang="en" class="ilink">Team&Piloti</a></div>
				
	</div>
	</div>
</body>
</html>