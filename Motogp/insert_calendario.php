<!DOCTYPE html>
<?php
	require_once'config.php';
	require_once'index_calendario.php';
	require_once'header.php';
?>
<html lang="it">
<head>
	<?php
		head();
		titolo(20);
	?>
</head>
<body>
	<img class="logohomeadmin" src="logo.png" alt='Logo della MotoGP'/>
	<div class="insert"><h1>Inserisci i dati del circuito</h1></div>
	<p class="notify">Tutti i campi con (*) devono essere compilati</p>
	<?php esitocalendario(); ?>
		<div class="body-content">
			<div class="module">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return validateInserireCalendario()">

					<label for="c_giorno"><span class="pbol">*Inserisci il giorno:</span></label>
				    <input type="number" name="giorno" id="c_giorno" placeholder="Giorno"><br>                          
				    <label for="c_mese"><span class="pbol">*Inserisci il mese:</span></label>
				    <input type="number" name="mese" id="c_mese" placeholder="Mese"><br>
				    <label for="c_anno"><span class="pbol">*Inserisci l'anno:</span></label>
				    <input type="number" name='anno' id="c_anno" placeholder="Anno"><br>
				    <label for="c_nome"><span class="pbol">*Nome del circuito:</span></label>    
					<input type="text" name="circuito_nome" id="c_nome" placeholder="Nome"> <br>
					<label for="c_imma"><span class="pbol">*Percorso Immagine:</span></label>
					<input type="text" name="circuito_immagine" id="c_imma" placeholder="Percorso"><br>
					<label for="c_luogo"><span class="pbol">*Luogo:</span></label>
					<input type="text" name="circuito_luogo" id="c_luogo" placeholder="Luogo"><br>
					<label for="c_lunghezza"><span class="pbol">*Lunghezza(m):</span></label>
					<input type="number" name="circuito_lunghezza" id="c_lunghezza"  placeholder="Lunghezza"><br>
					<label for="c_record"><span class="pbol">*Record:</span></label>
					<input type="text" name="giro_record_circuito" id="c_record" placeholder="Record"><br>
					<label for="c_detentore"><span class="pbol">*Detentore Record:</span></label>
					<input type="number" name="circuito_detentore_record" id="c_detentore" placeholder="Detentore"><br>
					<label for="c_descrizione"><span class="pbol">*Descrizione:</span></label>
					<textarea rows="10" cols="41"  name="circuito_descr" id="c_descrizione" placeholder="Descrizione"></textarea><br>
					<button type="submit" name="submit" class=" submit btn btn-blockadmin btn-primary">Invia</button> 
					
				</form>

				<div class="li"> <a href="admincalendario.php" lang="en" class="ilink">Calendario</a></div>
			
		</div>
	</div>
</body>
</html>