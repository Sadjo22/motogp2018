<!DOCTYPE html>
<html lang="it">
<?php 
	require_once'config.php';
	require_once'header.php';
	require_once'menu.php';
	require_once'footer.php';
?>

<head>
	<?php
		head();
		titolo(0);
	?>
</head>
<body>
	<button onclick="topFunction()" id="myBtn" title="Go to top">
		<img id="tornaSu" src='frecciasu.png' alt="bottone per tornare in cima alla pagina" />
	</button>
<div class="container">
    <div id="header">
			<img class="logo" src="motovrai.jpg" alt="Logo della MotoGP"/>
			<div id="menu">
			    <label for="toggle">&#9776;</label>
			</div>
			<input type="checkbox" id="toggle"/>
		    <ul id="navbar">
			    <?php menulista(0); ?>
		    </ul>
    </div>
	<div class="bod">
	     <div class="insertlogo">
	        <img  class="logohomeadmin" src="logo.png" alt="Logo della MotoGP"/>
	    </div>

		<div>
			<img id="fimpiloti" src="sfondoh1.jpg" alt="Foto di gruppo dei piloti che parteciperanno a MotoGP 2018 "/>
		</div>

		<div >
		    <?php
		    	next_event();
		    ?>
		</div>
	</div>
	<div class="sponsor">
		<?php
			sponsor();
	    ?>
	</div>
	<div id="push"></div>
</div>
<div id="footer"><?php Footer(); ?></div>
</body>
</html>