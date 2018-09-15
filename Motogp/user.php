<!DOCTYPE html>
<?php
    require_once'config.php'; 
    require_once('header.php');
    require_once('menu.php');
    require_once('footer.php');
?>
<html lang="it">
<head>
    <?php
        head(); 
        titolo(8);
    ?>
</head>
<body>
  <button onclick="topFunction()" id="myBtn" title="Go to top">
    <img id="tornaSu" src='frecciasu.png' alt="bottone per tornare in cima alla pagina" />
</button>


    <div id="header">
        <a href="home.php">
            <img class="logo" src="motovrai.jpg" alt="motogp logo" />
        </a>
        <div id="menu">
            <label for="toggle">&#9776;</label>
        </div>
        <input type="checkbox" id="toggle"/>
        <ul id="navbar">
            <?php menulista(6);  ?>
        </ul>
    </div>

     <div class="insertlogo">
        <img  class="logohomeadmin" src="logo.png" alt='Logo della MotoGP'/>
    </div>
    <a href="home.php?logout='1'" class="buttonlogout">
        <span>Logout</span>
    </a>

    <div class="containerdati">
      <h1 class="titledati">Dati personali</h1>
       <div class="errore">
           <?php
                errori_data($errors);
            ?>
        </div>
        <form method="get" action="#" onsubmit="return Modificadati()">
          <div class="row">
                <div class="col-25">
                    <label for="fname">Nome:</label>
                </div>
                <div class="col-75">
                    <?php
                        nome(); 
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Cognome:</label>
                </div>
                <div class="col-75">
                    <?php
                        cognome();
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="Uname">Username:</label>
                </div>
                <div class="col-75">
                    <?php 
                        user_modify();
                    ?>
                </div>
            </div>
                <div class="row">
                    <div class="col-25">
                        <label for="Ename">Email:</label>
                    </div>
                    <div class="col-75">
    
                        <div id="email">
                            <?php
                                email();
                            ?>
                        </div>
                           
                    </div>
                </div>
           
            <div class="row">
                <input class="invio_dati" type="submit"  value="Aggiorna i tuoi dati" name="aggiornadati">
            </div>
        </form>
    </div>

    <div class="containerdati">
      <h2 class="titledati">Modifica la tua password</h2>
      <div class="errore">
        <?php 
            errori_psw($errors); 
        ?>
      </div>
      <form method="get" action="user.php" onsubmit="return validatedatipers()">
            <div class="row">
                <div class="col-25">
                    <label for="asd">Vecchia password:</label>
                </div>
                <div class="col-75">
                    <input class="textData" type="password" id="asd" name="oldpsw" placeholder="Inserisci la tua vecchia password">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="vpsd">Nuova password:</label>
                </div>
                <div class="col-75">
                    <input class="textData" type="password" id="vpsd" name="newpsw" placeholder="Inserisci la tua nuova password">
                </div>
            </div>
            <div class="row">

                <div class="col-25">
                    <label for="yname">Ripeti nuova password:</label>
                </div>
                <div class="col-75">
                    <input class="textData" type="password" id="yname" name="confirm_newpsw" placeholder="Conferma la tua password">
                    

                </div>
      
                <div class="row">
                    <input class="invio_dati" type="submit" name="aggiornapsw" value="Aggiorna la tua password">
                </div>
            </div>
        </form>
    </div>
<?php Footer(); ?>
</body>
</html>
