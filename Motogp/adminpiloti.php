<!DOCTYPE html>
<?php
	require_once'config.php'; 
	require_once'index.php';
	require_once'header.php';
	require_once'menu.php';
	require_once'footer.php';
?>
<html lang="it">
<head>
	<?php
	head();
	titolo(13);
	?>
</head>
<body>
	<button onclick="topFunction()" id="myBtn" title="Go to top">
		<img id="tornaSu" src='frecciasu.png' alt="bottone per tornare in cima alla pagina" />
	</button>
	<div id="header">
			<a href="adminhome.php"><img class="logo" src="motovrai.jpg" alt="Logo della MotoGP"  /></a>
			<div id="menu">
				<label for="toggle">&#9776;</label>
			</div>
			<input type="checkbox" id="toggle"/>
			<ul id="navbar">
				<?php menulista(9); ?>
			</ul>
	</div>
	<div class="insertlogo">
        <img  class="logohomeadmin" src="logo.png" alt='Logo della MotoGP'/>
    </div>
   	<h1  class="toptitle">Piloti</h1>
   	<a class="insertdatiadmin" href='Insert_piloti.php'>Inserire piloti</a>
	<?php 
		deletepilota();
		deleteteam();
	?>

	<div class="pilotisquad">
       	<?php pilotiadmin(); ?>
	</div>
	<h2 class="teamtitle" lang="en">Team</h2>
	<a class="insertdatiadmin" href='Insert_team.php'>Inserire team</a>
    <div class="pilotisquad">
    	<?php 
    		teamadmin();
        ?>
	</div>
</body>
</html>