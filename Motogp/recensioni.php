<!DOCTYPE html>
<?php 
	require_once'config.php'; 
	require_once'header.php';
	require_once'menu.php';
	require_once'footer.php';
?>
<html lang="it">
<head>
	<?php
		head();
		titolo(4);
	?>
</head>
<body>
	<button onclick="topFunction()" id="myBtn" title="Go to top" >
		<img id="tornaSu" src='frecciasu.png' alt="Bottone per tornare in cima alla pagina" />
	</button>

<div class="container">
	<div id="header">
			<a href="home.php"><img class="logo" src="motovrai.jpg" alt="Logo della MotoGP"/></a>
			<div id="menu">
			    <label for="toggle">&#9776;</label>
			</div>
			<input type="checkbox" id="toggle"/>
		    <ul id="navbar">
		   		<?php menulista(3); ?>
			</ul>
	</div>
	 <div class="insertlogo">
        <img  class="logohomeadmin" src="logo.png" alt='Logo della MotoGP'/>
    </div>
	<div id="recTitle">
		<h1><span class="comment"> Lascia un commento!</span></h1>
		<p class="colora">In questa sezione ti è permesso lasciare un commento su tutto quello che riguarda la MotoGP.<br/>
		Dai piloti ai team, dai circuiti alla classifica. Chi è il tuo favorito per la vittoria finale?<br/>
		Registrati nel sito e facci conoscere il tuo pensiero! E buon motomondiale!</p>
	</div>
	<h2 ><span class="welcome">Ricordati di effettuare il <span lang="en"><?php login_rec(); ?></span> prima di commentare!</span></h2>
	<?php recensioneok($avvenuta); ?>
	<div  class="textcent">
		<form id="commenta" method="post" action="recensioni.php" onsubmit="return validaterecensioni()">
			<?php require_once'errors.php';?>
				<label for="recen" class="visuallyhidden">rec</label>
				<textarea  name="recensione" rows="5" id="recen" cols="100" placeholder="Lascia un commento..."></textarea>
				<label for="bton" class="visuallyhidden">bton</label>
				<input type="submit" id="bton" name="invia"  value="Invia" class="btn  btn-primary"/>
			
		</form>
	</div>

	<div id="content_rec">
		<?php recensione(); ?>
	</div>
	<div id="push"></div>
</div>
<div id="footer"><?php Footer(); ?></div>
</body>
</html>