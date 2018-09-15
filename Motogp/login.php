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
        titolo(6);
    ?>
</head>
<body>
	<button onclick="topFunction()" id="myBtn" title="Go to top">
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
                <?php menulista(5); ?>
            </ul>
	</div>
    <div class="insertlogo">
        <img  class="logohomeadmin" src="logo.png" alt='Logo della MotoGP'/>
    </div>

    <div class="body-content">
        <div class="module">
		    <h1 class="loginTitle">Login</h1>
    	    <p class="pbol">Non sei ancora registrato? Non perdere tempo! <a class="linklog" href="register.php">Registrati!!</a></p>
             <p class="pbol">Tutti i campi con(*) devono essere compilati</p>
            <form method="post" action="login.php" onsubmit="return validatelogin()">
               <div class="errore"> 
                    <?php 
                	   require_once'errors.php'; 
                    ?>
                </div>
                <label for="username"><span class="pbol" lang="en">*Username/Email:</span></label>
                <input type="text" name="username" id="username" placeholder="Username/Email" />
                <label for="Password"><span class="pbol" lang="en">*Password</span></label>
                <input type="password" name="password" placeholder="Password" id="Password" />
                <input type="submit" value=" Login" name="login" class="btn btn-block btn-primary"/>
            </form>
        </div>
    </div>
    <div id="push"></div>
</div>
<div id="footer"><?php Footer(); ?></div>
</body>
</html>
