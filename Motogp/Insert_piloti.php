<!DOCTYPE html>
<?php 
	require_once'index.php';  
	require_once'header.php';
?>
<html lang="it">
<head>
	<?php
		head();
		titolo(21);
	?>
</head>
<body>
	<img class="logohomeadmin" src="logo.png" alt='Logo della MotoGP'/>
	<div  class="insert"><h1>Inserisci i dati del pilota</h1></div>
	<p class="notify">Tutti i campi con (*) devono essere compilati</p>
	<?php insertpilo(); ?>
	<div class="body-content">
		<div class="module">
			<form  action="Insert_piloti.php" method="POST" onsubmit="return validateInserirePilota()">
				<label for="pilota_id"><span class="pbol">* Numero:</span></label>
				<input type="number" name="Pilota_id" id="pilota_id"  placeholder="Numero"><br>
				<label for="pilota_nome"><span class="pbol">*Nome:</span></label>
				<input type="text" name="Pilota_nome" id="pilota_nome"  placeholder="Nome"><br>
				<label for="pilota_cognome"><span class="pbol">*Cognome:</span></label>
				<input type="text" name="Pilota_cognome" id="pilota_cognome"  placeholder="Cognome"><br>
				<label for="pilota_eta"><span class="pbol">*Età:</span></label>
				<input type="number" name="Pilota_eta" id="pilota_eta"  placeholder="Età"><br>
				<label for="pilota_nazione"><span class="pbol">*Nazione:</span></label>
				<input type="text" name="Pilota_nazione" id="pilota_nazione"  placeholder="Nazione"><br>
				<label for="pilota_team"><span class="pbol">*Team:</span></label>
				<select name="Pilota_team" id="pilota_team">
				<?php selectTeam(); ?>
				</select>
				<br>
				<label for="pilota_punteggio"><span class="pbol">*Punteggio totale:</span></label>
				<input type="number" name="Pilota_punteggio" id="pilota_punteggio"  placeholder="Punteggio"><br>
				<label for="pilota_ultima_gara"><span class="pbol">*Posizione ultima gara:</span></label>
				<input type="number" name="Pilota_ultima_gara" id="pilota_ultima_gara" placeholder="Posizione"><br>
				<label for="pilota_immagine"><span class="pbol">*Percorso immagine:</span></label>
				<input type="text" name="Pilota_immagine" id="pilota_immagine" placeholder="Percorso"><br>
				<button type="submit" name="submit" class="submit btn btn-blockadmin btn-primary">Invia</button> 
				
			</form>
			<div class="li"> <a href="adminpiloti.php" lang="en" class="ilink">Team&Piloti</a></div>
		</div>
	</div>
</body>
</html>