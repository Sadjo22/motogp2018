<!DOCTYPE html>
<?php
	
	require_once'config.php'; 
	require_once'index_recensione.php'; 
	require_once'header.php';
	require_once'menu.php';
	require_once'footer.php';
?>
<html lang="it">
<head>
	<?php
		head();
		titolo(11);
	?>
</head>
<body>
	<button onclick="topFunction()" id="myBtn" title="Go to top">
		<img id="tornaSu" src='frecciasu.png' alt="bottone per tornare in cima alla pagina" />
	</button>

	<div id="header">
			<a href="adminhome.php"><img class="logo" src="motovrai.jpg" alt="Logo della MotoGP"/></a>
			<div id="menu">
			    <label for="toggle">&#9776;</label>
			</div>
			<input type="checkbox" id="toggle"/>
		    <ul id="navbar">
		   		<?php menulista(10); ?>
			</ul>
	</div>
	<div class="ok">
	 <div class="insertlogo">
        <img  class="logohomeadmin" src="logo.png" alt='Logo della MotoGP'/>
    </div>
	
	<h1 id="recbenvenuto"> Controlla i commenti degli utenti</h1>
	<?php 
		recensioneok($avvenuta); 
		deleterec();
	?>
	<div class="textcent">
		<form id="commenta" method="post" action="adminrecensioni.php" onsubmit="return validaterecensioniadmin()">
			<label for="rec" class="visuallyhidden">rec</label>
				<textarea  name="recensione" rows="5" id="rec" cols="100" placeholder="commento dell' amministratore..."></textarea>
				<label for="bton" class="visuallyhidden">bton</label>
			<input  type="submit" name="invia" id="bton" value="Invia"  class="back btn btn-blockadmin btn-primary"/>
		<?php require_once('errors.php');?>
		</form>
	</div>
	<div id="content_rec">
		<?php recensioneadmin(); ?>
	</div>
</div>
</body>
</html>



