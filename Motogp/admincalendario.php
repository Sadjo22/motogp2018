<!DOCTYPE html>
<?php 
	require_once'config.php'; 
	require_once'index_calendario.php'; 
	require_once'header.php';
	require_once'menu.php';
	require_once'footer.php';
?>
<html lang="it">
<head>
	<?php
		head();
		titolo(10);
	?>
</head>
<body>
	<button onclick="topFunction()" id="myBtn" title="Go to top">
		<img id="tornaSu" src='frecciasu.png' alt="bottone per tornare in cima alla pagina" />
	</button>
	<div id="header">
			<a href="adminhome.php"><img class="logo" src="motovrai.jpg" alt="Logo della MotoGP"  /></a>
			<div id="menu">
				<label class="tendina" for="toggle">&#9776;</label>
			</div>
			<input type="checkbox" id="toggle"/>
		    <ul id="navbar">
				<?php menulista(8); ?>           
			</ul>
    </div>

    <div class="insertlogo">
        <img  class="logohomeadmin" src="logo.png" alt='Logo della MotoGP'/>
    </div>
    <h1 class="toptitle">Gare</h1>
    <?php deletecalendario(); ?>
	<a class="insertdatiadmin" href="insert_calendario.php">Inserire circuito</a>
    <div id="calendario">
	    <?php calendarioadmin(); ?>
	</div>

</body>
</html>


