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
		titolo(5);
	?>
</head>
<body>
	
	<button onclick="topFunction()" id="myBtn" title="Go to top">
		<img id="tornaSu" src='frecciasu.png' alt="bottone per tornare in cima alla pagina" />
	</button>
<div class="container">
    <div id="header">
			<a href="home.php">
				<img class="logo" src="motovrai.jpg" alt="Logo della MotoGP"/>
			</a>
		
		<div id="menu">
		    <label for="toggle">&#9776;</label>
		</div>
		
		<input type="checkbox" id="toggle"/>
        <ul id="navbar">
        	<?php menulista(4); ?>
        </ul>
    </div>
    <div class="insertlogo">
        <img  class="logohomeadmin" src="logo.png" alt='Logo della MotoGP'/>
    </div>
	<div class="containergallery">
	    <?php
	    	gallery(); 
	    ?>
	</div>
<div id="push"></div>
</div>
<div id="footer"><?php Footer(); ?></div>
</body>
</html>