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
    titolo(7);
  ?>
</head>
<body>
  <button onclick="topFunction()" id="myBtn" title="Go to top">
    <img id="tornaSu" src='frecciasu.png' alt="Bottone per tornare in cima alla pagina" />
  </button>
<div class="container">
    <div id="header">
      <a href="home.php"><img class="logo" src="motovrai.jpg" alt="Logo della MotoGP"  /></a>
      <div id="menu">
      <label for="toggle">&#9776;</label>
      </div>
      <input type="checkbox" id="toggle"/>
      
      <ul id="navbar">
        <?php menulista(5); ?>
      </ul>
 
    </div>

     <div class="insertlogo">
        <img class="logohomeadmin" src="logo.png" alt='Logo della MotoGP'/>
    </div>
    <div class="body-content">
        <div class="module">
            <h1 class="loginTitle">Crea un <span lang="en">account</span></h1>
            <h2 class="pbol">Se sei già un utente torna al <a class="linklog" href="login.php"><span lang="en">Login!</span></a></h2>
            <p class="pbol">Tutti i campi con(*) devono essere compilati</p>
            <?php
              benvenuto(); 
            ?>
            <form method="post" action="register.php" onsubmit="return  validateRegister()">
              <!--display validation errors -->
                <div class="errore">
                  <?php 
                    require_once'errors.php';
                  ?>
                </div>
                <label for="username" lang="en"><span lang="en" class="pbol">*Username:</span></label>
                <input type="text" placeholder="Username" name="username" id="username" />
                <label for="Email" lang="en" ><span lang="en" class="pbol">*Email:</span></label>
                <input type="email" placeholder="Email" name="email" id="Email" />
                <div class="errore">
                  <?php 
                    require_once'errors.php';
                  ?>
                </div>
                <label for="Password" lang="en"><span class="pbol">*Password:</span></label>
                <input type="password" placeholder="Password_1" name="password_1" id="Password"  autocomplete="new-password" />
                <div class="errore">
                  <?php 
                    require_once'errors.php';
                  ?>
                </div>
                <label for="Conferma_Password"><span class="pbol">*Conferma <span lang="en"> Password:</span></span></label>
                <input type="password" placeholder="Password_2" name="password_2" id="Conferma_Password" autocomplete="new-password" />
                <div class="errore">
                  <?php 
                    require_once'errors.php';
                  ?>
                </div>
               <input type="submit" value="Registrati" name="register" class="btn btn-block btn-primary" />
            </form>
        </div>
    </div>
    <div id="push"></div>
</div>
<div id="footer"><?php Footer(); ?></div>
</body>
</html>
