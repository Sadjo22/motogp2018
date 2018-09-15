<!DOCTYPE html>


<?php
	require_once'config.php';
	require_once'index.php'; 
	require_once'header.php';
?>
<html lang="it">
<head>
	<?php
		head();
		titolo(23);
	?>
</head>

<body>
	<img class="logohomeadmin" src='logo.png' alt='Logo della MotoGP'/>
	<div class="insert"><h1>Modifica i dati del team</h1></div>
	<p class="notify">Tutti i campi con (*) devono essere compilati</p>
	<?php modificateam();?>
</body>
</html>
