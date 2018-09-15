<!DOCTYPE html>
<?php 
	require_once'config.php'; 
	require_once'index_sponsor.php'; 
	require_once'header.php';
	require_once'menu.php';
	require_once'footer.php';
?>
<html lang="it">
<head>
	<?php
		head();
		titolo(9);
	?>
</head>
<body>
	<button onclick="topFunction()" id="myBtn" title="Go to top">
		<img id="tornaSu" src='frecciasu.png' alt="bottone per tornare in cima alla pagina" />
	</button>

	<div id="header">
		<img class="logo" src="motovrai.jpg" alt='Logo della MotoGP'/>
		<div id="menu">
			<label for="toggle">&#9776;</label>
		</div>
		<input type="checkbox" id="toggle"/>
		<ul id="navbar">
			<?php menulista(7); ?>                
		</ul>
	</div>

	<div class="insertlogo">
        <img  class="logohomeadmin" src="logo.png" alt='Logo della MotoGP'/>
    </div>
	<?php deletesponsor();?>
	<div>
		<img id="fimpiloti" src='sfondoh.jpg' alt="Foto di gruppo dei piloti della MotoGP di quest'anno"/>
	</div>

	<a class="insertdatiadmin" href='insert_sponsor.php'>Inserire sponsor</a>
	
	<div class="sponsor">
		<?php 
		    sponsoradmin();
		?>
	</div>

</body>
</html>