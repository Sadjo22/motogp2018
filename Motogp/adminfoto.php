<!DOCTYPE html>
<?php 
	require_once'config.php';
	require_once'index_foto.php'; 
	require_once'header.php';
	require_once'menu.php';
	require_once'footer.php';
?>
<html lang="it">
<head>
	<?php
		head();
		titolo(12);
	?>
</head>
<body>
	<button onclick="topFunction()" id="myBtn" title="Go to top">
		<img id="tornaSu" src='frecciasu.png' alt="bottone per tornare in cima alla pagina" />
	</button>


	<div id="header">
		<div id="logo">
			<a href="adminhome.php">
				<img class="logo" src="motovrai.jpg" alt="Logo della MotoGP" />
			</a>
		</div>
		<div id="menu">
			<label for="toggle">&#9776;</label>
		</div>
		<input type="checkbox" id="toggle"/>
		<ul id="navbar">
			<?php menulista(11); ?>
        </ul>
   	</div>
    <div class="insertlogo">
        <img class="logohomeadmin" src="logo.png" alt='Logo della MotoGP'/>
    </div>
	<?php deletefoto(); ?>
	<a class="insertdatiadmin" href='insert_foto.php'>Inserire foto</a>
	<div class="containergallery">
		<?php galleryadmin(); ?>
	</div>
</body>
</html>