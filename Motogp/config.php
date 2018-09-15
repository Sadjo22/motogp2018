<?php

//faccio partire la sessione
session_start();
//$username =""; forse inutili
//$email =""; forse inutili
$errors = array();
$name="";
$username="";
$email="";
$avvenuta='0';
// creation of the connection with database oopheeTae8OopaiD

function getConnection(){
  $con= new PDO("mysql:host=localhost;dbname=speguyny;charset=utf8","speguyny","oopheeTae8OopaiD");
  $con->setATTRIBUTE(pdo::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $con;
}

function selectPiloti_squadre($query){
    $pdo=getConnection();

    $stmt= $pdo->query($query);
    return $stmt->fetchAll(); 
}

function updatePiloti_squadre($query){
    $pdo=getConnection();

    $stmt= $pdo->prepare($query);
    return $stmt->execute(); 
}

function insertPiloti_squadre($query){
    $pdo=getConnection();

    $stmt= $pdo->prepare($query);
    return $stmt->execute(); 

}
//funzioni per calendario
/*function getConnection(){
  $con= new PDO("mysql:host=localhost;dbname=motogp","root","");
  $con->setATTRIBUTE(pdo::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $con;
}*/

function selectCircuito($query){
    $pdo=getConnection();

    $stmt= $pdo->query($query);
    return $stmt->fetchAll(); 
}

function updateCircuito($query){
    $pdo=getConnection();

    $stmt= $pdo->prepare($query);
    return $stmt->execute(); 
}

function insertCircuito($query){
    $pdo=getConnection();

    $stmt= $pdo->prepare($query);
    return $stmt->execute(); 

}


/*
VARIABILI IN SESSIONE CON UTENTE LOGGATO
user_id
user_username
user_tipo
 */
//VARIABILI CONFIGURAZIONE GLOBALI
//define('redirect', true); //attiva/disattiva i redirect
//CREDENZIALI DATABASE
//$user_db = 'anfavero';
//$pass_db = 'gietoomoeJohdai8';
//$dbnm = 'anfavero';
function apri_con(){
    $conn = mysqli_connect("localhost", "speguyny", "oopheeTae8OopaiD", "speguyny");
    if($conn->connect_error){
        echo'<div ="n_riuscito">Database non disponibile, riprova piu tardi</div>';
    }
    else{
    mysqli_set_charset( $conn, "utf8");
    return $conn;
    }
}

//Chiudo la connessione al DB se necessario
function chiudi_con($conn){
    $conn->close();
}
// REGISTRAZIONE VARIABILI DA FORM
// registra una variabile nella pagina che richiama questa funzione, la variabile arriva da una form
// se non è registrata la imposta a vuota
function register($varname)
{
    global $$varname;
    if (isset($_REQUEST[$varname])) {
        $$varname = addslashes(stripslashes($_REQUEST[$varname])); // previene SQL injection
    } else {
        $$varname = null;
    }
}
// FUNZIONI PER INTERFACCIARSI AL DATABASE
// si connette al database -->



if(isset($_POST['register'])){
    $username = mysqli_real_escape_string(apri_con(), $_POST['username']);
    $email = mysqli_real_escape_string(apri_con(), $_POST['email']);
    $password_1 = mysqli_real_escape_string(apri_con(), $_POST['password_1']);
    $password_2= mysqli_real_escape_string(apri_con(), $_POST['password_2']);
                    
 // s assurer que toutes les cases du form soient remplies;
 
    if(empty($username)){
        array_push($errors, "*Username richiesto");
    }

    if(strlen($username)>10){
        array_push($errors, "*Lo username deve avere un massimo di 10 caratteri");
    }

    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        array_push($errors, "*Username non valido, usare solo minuscole, maiuscole e/o numeri");              
    }
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
       array_push($errors, "*Email non valida");              
    }
    if(empty($password_1)){
       array_push($errors, "*Password richiesta");               
    }
    
    if($password_1 != $password_2){
        array_push($errors, "*Le due password non combaciano");             
    }

    if(strlen($password_1)>8){
        array_push($errors, "*La password deve avere un massimo di 8 caratteri");
    }
//au cas ou il n ya pas d erreurs:

 if(count($errors) == 0){
    $user=" SELECT * from utenti where username='$username'";
    $result_user = mysqli_query(apri_con(), $user);
    $emaildb="SELECT * from utenti where email='$email'";
    $result_email = mysqli_query(apri_con(), $emaildb);
        if(mysqli_num_rows($result_user)>= 1){
            array_push($errors, "*Username già in uso");
        }
        if(mysqli_num_rows($result_email)>= 1){
            array_push($errors, "*Email già in uso");
        }
        if(mysqli_num_rows($result_user)== 0 AND mysqli_num_rows($result_email)== 0){
            $password_1 = md5($password_1); //coder le mot de passe;
            $sql = " INSERT INTO utenti (username, email, password) 
               VALUES('$username', '$email', '$password_1')"; 
            mysqli_query(apri_con(), $sql);
    
            $_SESSION['name'] = $username;
            header('location: register.php');
    } 
 }
}
 
 //log user in from login page
    if(isset($_POST['login'])){
            $username = mysqli_real_escape_string(apri_con(), $_POST['username']);
            //$email = mysqli_real_escape_string(apri_con(), $_POST['username']);
            $password= mysqli_real_escape_string(apri_con(), $_POST['password']);
             
            if(empty($username)){
               array_push($errors, "*Username o Email richiesti");               
            }
            if(empty($password)){
               array_push($errors, "*Password richiesta");               
            }
            $check_email="SELECT * FROM utenti WHERE BINARY email='$username'";
            $result_e=mysqli_query(apri_con(), $check_email);
            $check_user="SELECT * FROM utenti WHERE BINARY username='$username'";
            $result_u=mysqli_query(apri_con(), $check_user);
            /*if(mysqli_num_rows($result_e)== 0 AND mysqli_num_rows($result_u)== 0){
                array_push($errors, "*Username e/o password errati");
            }*/
            if (mysqli_num_rows($result_e)== 0 and mysqli_num_rows($result_u)== 0) {
                array_push($errors, "*Utente non registrato");
            }
            if(count($errors) == 0 AND mysqli_num_rows($result_e)== 1){
               $password = md5($password); //coder le mot de passe;
               $query = " SELECT * FROM  utenti  WHERE email = '$username' AND password = '$password'"; 
               $result = mysqli_query(apri_con(), $query);
                if(mysqli_num_rows($result)== 1){
                            $nomeuser="SELECT username FROM utenti WHERE email='$username'";
                            $result_nu=mysqli_query(apri_con(),$nomeuser);
                            $row=mysqli_fetch_array($result_nu);
                            $_SESSION['username'] = $row['username'];  
                            $_SESSION['success'] = $username;
                            header('location: home.php');
                }
                else{
                    array_push($errors, "*Username e/o password errati");
                }
            }
            if(count($errors) == 0 AND mysqli_num_rows($result_u)== 1){
                if($username=='admin' AND  $password=='admin'){
                    $_SESSION['nomeadmin']=$username;
                    header('location: adminhome.php');
                }
                else{
               $password = md5($password); //coder le mot de passe;
               $query = " SELECT * FROM  utenti  WHERE username = '$username' AND password = '$password'"; 
               $result = mysqli_query(apri_con(), $query);
                if(mysqli_num_rows($result)== 1){
                            $_SESSION['username'] = $username;
                            $_SESSION['success'] = $username;
                            header('location: home.php');
                }
                else{
                    array_push($errors, "*Username e/o password errati");
                }
            }
    } 
}


 //logout
    if(isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: home.php');
    }   

function agg_rec(){
    echo "Commento avvenuto con successo!";
}
if(isset($_POST['invia'])){
    if(isset($_SESSION['nomeadmin'])){
        $username=$_SESSION['nomeadmin'];
    }    
    if(isset($_SESSION['username'])){
        $username=$_SESSION['username'];
    }

    $recensione=mysqli_real_escape_string(apri_con(), $_POST['recensione']);
    if(empty($username)){
        array_push($errors, "*Utente non registrato"); 
    }
    if(empty($recensione) and $username){
        array_push($errors, "*Scrivere un commento");
    }
    if (count($errors)==0){
        $comment="INSERT INTO recensioni (utente,recensione) 
               VALUES('$username', '$recensione')";
        mysqli_query(apri_con(), $comment);
        $avvenuta='1';
       
    }
}

function recensioneok($avvenuta){
    if($avvenuta){
        echo "<span class='messagerec'>Commento avvenuto con successo!</span>";
    }
    $avvenuta='0';
}

if(isset($_GET['aggiornadati'])){
    $nome=mysqli_real_escape_string(apri_con(), $_GET['firstname']);
    $cognome=mysqli_real_escape_string(apri_con(), $_GET['lastname']);
    $user_modifica=mysqli_real_escape_string(apri_con(), $_GET['usermodifica']);
    $userquery=$_SESSION['username'];
    $controllo_user="SELECT username FROM utenti WHERE username='$user_modifica'";
    $control_result=mysqli_query(apri_con(), $controllo_user);
    if(empty($nome) and empty($cognome) and empty($user_modifica)){

            array_push($errors, "*Non ci sono dati da aggiornare");
        
    }
    if(mysqli_num_rows($control_result)==1){
        array_push($errors, "*Username già in uso");
    }
    elseif (count($errors)==0){
        if(!empty($nome)){
            $nomedb="UPDATE utenti  
               SET nome=('$nome') WHERE username='$userquery'";
            mysqli_query(apri_con(), $nomedb);
        }
        if(!empty($cognome)){
            $cognomedb="UPDATE utenti 
               SET cognome=('$cognome') WHERE username='$userquery'";
        mysqli_query(apri_con(), $cognomedb);
        }
        if(!empty($user_modifica)){
            $user_modificadb="UPDATE utenti 
               SET username=('$user_modifica') WHERE username='$userquery'";
            mysqli_query(apri_con(), $user_modificadb);
            $scrittore_rec="UPDATE recensioni
                SET utente=('$user_modifica') WHERE utente='$userquery'";
            mysqli_query(apri_con(), $scrittore_rec);
            $_SESSION['username']=$user_modifica;
            
        }
    }
}



if(isset($_GET['aggiornapsw'])){
    $oldpsw=mysqli_real_escape_string(apri_con(), $_GET['oldpsw']);
    $newpsw=mysqli_real_escape_string(apri_con(), $_GET['newpsw']);
    $newpsw_1=mysqli_real_escape_string(apri_con(), $_GET['confirm_newpsw']);

    if(empty($oldpsw)){
        array_push($errors, "*Inserire la vecchia password");
    }
    else{
        $check_dati=$_SESSION['username'];
        $oldpsw = md5($oldpsw);
        $check_old="SELECT password FROM utenti WHERE password='$oldpsw' and username='$check_dati'";
        $old_result=mysqli_query(apri_con(), $check_old);
        if(mysqli_num_rows($old_result) == 0){
            array_push($errors, "*Vecchia password errata");
        }

    }
    if(empty($newpsw)){
        array_push($errors, "*Inserire la nuova password");
    }
    if(empty($newpsw_1)){
        array_push($errors, "*Confermare la nuova password");
    }
    if($newpsw!=$newpsw_1){
        array_push($errors, "*Le nuove password non combaciano");
    }
    if(count($errors)==0){
        $newpsw=md5($newpsw);
        $update_psw="UPDATE utenti
            SET password=('$newpsw') WHERE password='$oldpsw'";
        mysqli_query(apri_con(), $update_psw);
    }

}
function nome(){ 
          $us=$_SESSION['username'];
          $nameuser="SELECT nome FROM utenti WHERE username='$us'";
          $conn=apri_con();
          $result_name = mysqli_query(apri_con(),$nameuser);
          $row=mysqli_fetch_array($result_name);
          if (!$row['nome']){
                echo "<input class='textData' type='text' id='fname' name='firstname' placeholder=\"Inserisci il tuo nome\">";
          }
         else{
                echo "<input class='textData' type='text' id='lname' name='firstname' placeholder=\"".$row['nome']."\">";
         }
        
}
function cognome(){ 
          $us=$_SESSION['username'];
          $nameuser="SELECT cognome FROM utenti WHERE username='$us'";
          $conn=apri_con();
          $result_name = mysqli_query(apri_con(),$nameuser);
          $row=mysqli_fetch_array($result_name);
          
         if (!$row['cognome']){
                echo "<input class='textData' type='text' id='lname' name='lastname' placeholder=\"Inserisci il tuo cognome\">";
         }
           else{
                echo "<input class='textData' type='text' id='lname' name='lastname' placeholder=\"".$row['cognome']."\">";
           }
      }
function user_modify(){
          $us=$_SESSION['username'];
                echo "<input class='textData' type='text' id='Uname' name='usermodifica' placeholder=\"".$us."\">";
}

function email(){
          $us=$_SESSION['username'];
          $emailuser="SELECT email FROM utenti WHERE username='$us'";
          $conn=apri_con();
          $result_email = mysqli_query(apri_con(),$emailuser);
          $row=mysqli_fetch_array($result_email);
          //echo "<span id='em'>".$row['email']."</span>";
          echo "<input class='textData' type='text' id='Ename' name='usermail' placeholder=\"".$row['email']."\">";
}

function errori_data($errors){
      if(isset($_GET['aggiornadati'])){ 
        if(count($errors)>0){
            require_once('errors.php'); 
        }
        if(count($errors)==0){
            echo "Aggiornamento avvenuto con successo!";
        }
      }
}
function errori_psw($errors){//da sistemare, se cambia psw stampa il messaggio di cambiamento avvenuto, ma col refresh stampa vecchia psw sbagliata
    if(isset($_GET['aggiornapsw'])){
        if(count($errors)>0){
        require_once('errors.php');
        }
        if(count($errors)==0){
        echo "Password aggiornata con successo!";
        }
    }
}

function menu(){
    if (isset($_SESSION['username'])){
        echo "<a href='user.php'>".$_SESSION['username']."</a>";
    }
    else{
        echo "<a href='login.php'>Login</a>";
    }
    
}

function menuclassifica(){
    if(isset($_SESSION['nomeadmin'])){
        echo"<a href='adminhome.php'><img class='logo' src='motovrai.jpg' alt='motogp logo'/></a>
                    <div id='menu'>
            <label for='toggle'>&#9776;</label>
            </div>
            <input type='checkbox' id='toggle'/>
            <ul id='navbar'>
                <li><a href='adminhome.php'></span>Home</a></li>
                <li class='seiqui'></span>Classifiche</li>
                <li><a href='admincalendario.php'></span>Calendario</a></li>
                <li><a href='adminpiloti.php'></span>Team &amp; Piloti</a></li>
                <li><a href='adminrecensioni.php'></span>Recensioni</a></li>
                <li><a href='adminfoto.php'></span>Foto</a></li>
                <li><a href='home.php?logout='1''>Logout</a></li>
            </ul>";
        
    }
    else{
        if (isset($_SESSION['username'])){
            echo "<a href='home.php'><img class='logo' src='motovrai.jpg' alt='motogp logo'/></a>
                                <div id='menu'>
            <label for='toggle'>&#9776;</label>
            </div>
            <input type='checkbox' id='toggle'/>
                <ul id='navbar'>
                    <li><a href='home.php'>Home</a></li>
                    <li class='seiqui'>Classifiche</li>
                    <li><a href='calendario.php'>Calendario</a></li>
                    <li><a href='piloti.php'>Team &amp; Piloti</a></li>
                    <li><a href='recensioni.php'>Recensioni</a></li>
                    <li><a href='foto.php'></span>Foto</a></li>
                    <li><a href='user.php'>".$_SESSION['username']."</a></li>
                </ul>";
            
        }
        else{
            echo "<a href='home.php'><img class='logo' src='motovrai.jpg' alt='motogp logo'/></a>
                                <div id='menu'>
            <label for='toggle'>&#9776;</label>
            </div>
            <input type='checkbox' id='toggle'/>
                <ul id='navbar'>
                    <li><a href='home.php'>Home</a></li>
                    <li class='seiqui'>Classifiche</li>
                    <li><a href='calendario.php'>Calendario</a></li>
                    <li><a href='piloti.php'>Team &amp; Piloti</a></li>
                    <li><a href='recensioni.php'>Recensioni</a></li>
                    <li><a href='foto.php'>Foto</a></li>
                    <li><a href='login.php'>Login</a></li>
                </ul>";
        }
    }
}



function benvenuto(){//cambiando pagina il messaggio resta, come farlo scomparire?
    if (isset($_SESSION['name'])){
        
        echo "<p class='register'>Registrazione avvenuta con successo! Benvenuto/a <span class='colore'>" .$_SESSION['name']."!</span> Entra nel sito e interagisci con noi!</p>";

    }
    //unset($_SESSION['name']);
}

function next_event(){
          $giorno = date("d");
          $mese = date("m");
          $anno = date("Y");
          $conn=apri_con();
          $nextevent="SELECT /*DATE_FORMAT(data, '%d/%c/%Y') AS 'dita',*/ giorno,mese,anno,c_immagine, c_nome FROM circuito WHERE (giorno>=$giorno and mese=$mese) or mese>$mese  ";
          $data=mysqli_query(apri_con(),$nextevent);
          $nextdata=mysqli_fetch_array($data);
          $nomemese = array (1 => "Gennaio", 2 => "Febbraio", 3 => "Marzo", 4 => "Aprile", 5 =>"Maggio", 6 => "Giugno", 7 => "Luglio", 8 => "Agosto", 9 => "Settembre", 10 => "Ottobre", 11 => "Novembre", 12 => "Dicembre");
          echo "<div id='nextevent'><p id='pross'>Prossimo evento:</p><br/><br/>";
          echo "<p id='dataita'>".$nextdata['giorno']." ".$nomemese[$nextdata['mese']]." ".$nextdata['anno']."</p><br/><br />";
          echo "<p id='nameevent'>".$nextdata['c_nome']."</p>";
          echo "<img id='nextCircuit' src=\"".$nextdata['c_immagine']."\" alt='Tracciato del \"".$nextdata['c_nome']."\"'><br/><br/>";
          echo "<a href='calendario.php' class='moreinfo'>Informazioni sul circuito</a></div>";
    
}

function sponsor(){
            $sql="SELECT * FROM sponsor";
            $conn=apri_con();
            $result = $conn->query($sql);
            if(!$result){
                echo"error";
                exit();
            }
            else{
                foreach($result as $r) {                
                    echo "<img class='s_img' src=\"".$r['sp_immagine']."\" alt=\"".$r['sp_alt']."\">";                
                }           
            }
}



function calendario(){
    $sql="SELECT /*DATE_FORMAT(data, '%d/%c/%Y') AS 'data2',*/  giorno, mese, anno, /*CURDATE() as 'datacur',*/ /*DATE_FORMAT(CURDATE(), '%d/%c/%Y') as datacur,*/ c_nome, c_immagine, luogo, lunghezza_m, giro_record, p_nome, p_cognome, c_descr FROM circuito JOIN piloti where detentore_record=p_id order by mese ";
    $conn=apri_con();
    $result = $conn->query($sql);
    if(!$result){
        echo"error";
        exit();
    }
    else{
        $count=0;
        foreach($result as $r) {
            $giorno = date("d");
            $mese = date("m");
            $anno = date("Y");
            
            $nomemese = array (1 => "Gennaio", 2 => "Febbraio", 3 => "Marzo", 4 => "Aprile", 5 =>"Maggio", 6 => "Giugno", 7 => "Luglio", 8 => "Agosto", 9 => "Settembre", 10 => "Ottobre", 11 => "Novembre", 12 => "Dicembre");
            if(($r['mese']==$mese and $r['giorno']>=$giorno or $r['mese']>$mese) and $count==0){        
                echo "<div class='date'><h1 id='pross2'>Prossimo evento</h1>";
                echo "<h1 class='dat'>".$r['giorno']." ".$nomemese[$r['mese']]." ".$r['anno']."</h1><br /><br />";
                echo "<h2 class='nome_circuito'>".$r['c_nome']."</h2><br /><br />" ;
                echo "<img class='c_immagine' src=\"".$r['c_immagine']."\" alt='Tracciato del \"".$r['c_nome']."\"'><br /><br />";
                echo "<p>Luogo: ".$r['luogo']."</p><br />";
                echo "<p>Lunghezza (m): ".$r['lunghezza_m']."</p><br />";
                echo "<p>Giro Record: ".$r['giro_record']."</p><br />";
                echo "<p>Detentore Record: ".$r['p_nome']." ".$r['p_cognome']."</p><br />";
                echo "<span class='decri'>".$r['c_descr']."</span></div><br /><br />";
                $count=1;
            } 
            else{
                echo "<div class='date'><h1 class='dat'>".$r['giorno']." ".$nomemese[$r['mese']]." ".$r['anno']."</h1><br /><br />";
                echo "<h2 class='nome_circuito'>".$r['c_nome']."</h2><br /><br />" ;
                echo "<img class='c_immagine' src=\"".$r['c_immagine']."\" alt='Tracciato del \"".$r['c_nome']."\"'><br /><br/>";
                echo "<p>Luogo: ".$r['luogo']."</p><br />";
                echo "<p>Lunghezza (m): ".$r['lunghezza_m']."</p><br />";
                echo "<p>Giro Record: ".$r['giro_record']."</p><br />";
                echo "<p>Detentore Record: ".$r['p_nome']." ".$r['p_cognome']."</p><br />";
                
                echo "<span class='decri'>".$r['c_descr']."</span></div><br /><br />";
            }       
        }
    }
}
function login_rec(){
    if (isset($_SESSION["username"])){
        echo "login";
    }
    else{
        echo "<a class='linklog' href='login.php'>login</a>";
    }
}

function recensione(){
    $sql="SELECT utente,recensione FROM recensioni order by r_id desc";
    $conn=apri_con();
    $result = $conn->query($sql);
    //$tab1=$result->fetch_assoc();
    foreach($result as $r) {
        echo"<div class='user'>".$r['utente'].":</div>";
        echo "<div class='recensione'>" .$r['recensione']."</div>";
    }
}

function piloti(){
    $sql="SELECT * FROM piloti JOIN squadra where p_team=s_nome order by s_nome ";
    $conn=apri_con();
    $result = $conn->query($sql);
    if(!$result){
        echo"error";
        exit();
    }
    else{
        foreach($result as $r) {
            echo "<div class='pilo'><img class='fototp' src=\"".$r['p_immagine']."\" alt='Primo piano di ".$r['p_nome']." ".$r['p_cognome']."'><br />";
            echo "<p>Nome: ".$r['p_nome']." ".$r['p_cognome']."</p>";
            echo "<p>Numero: ".$r['p_id']."</p>";
            echo "<p>Età: ".$r['p_eta']."</p>";
            echo "<p>Nazione: ".$r['p_nazione']."</p>";
            echo "<p>Team: ".$r['s_nome']."</p></div>";                
        }           
    }
}

function team(){
    $sql="SELECT * FROM squadra order by s_id ";
    $conn=apri_con();
    $result = $conn->query($sql);
    if(!$result){
        echo"error";
        exit();
    }
    else{
        foreach($result as $r) {                
            echo "<div class='squad'><img class='fototp' src=\"".$r['s_immagine']."\" alt='Immagine della moto del team ".$r['s_nome']."'><br />";
            echo "<p>Nome: ".$r['s_nome']."</p>";
            echo "<p>Nazione: ".$r['s_nazione']."</p><br />";
            echo "".$r['s_info']."</div>";             
        }           
    }
}

function classifica_piloti(){
    $sql="SELECT * FROM piloti JOIN squadra where p_team=s_nome order by p_punteggio desc";
    $conn=apri_con();
    $result = $conn->query($sql);
    $i=1;
    foreach($result as $r) {
        echo"<tr><td class='p_id'>".$i."</td>
            <td class='p_no'>".$r['p_nome']." ".$r['p_cognome']."</td>
            <td class='p_te'>".$r['p_team']."</td>
            <td class='p_naz'>".$r['p_nazione']."</td>
            <td class='p_pun'>".$r['p_punteggio']."</td></tr>";
        $i++;
    }
}

function classifica_team(){
    $sql="SELECT s_nome, s_nazione, SUM(p_punteggio) as t_punteggio FROM squadra JOIN piloti where s_nome=p_team group by s_nome order by t_punteggio desc";
    $conn=apri_con();
    $result = $conn->query($sql);
    $i=1;
    foreach($result as $r) {
        echo"<tr><td class='p_id'>".$i."</td>
            <td class='p_no'>".$r['s_nome']."</td>
            <td class='p_te'>".$r['s_nazione']."</td>
            <td class='p_pun'>".$r['t_punteggio']."</td></tr>";
        $i++;
    }
}

function gallery(){
    $sql="SELECT * FROM gallery order by g_id";
    $conn=apri_con();
    $result = $conn->query($sql);
    if(!$result){
        echo"error";
    }
    else{
        foreach($result as $r){
            echo "<div class='gallery'><a href='".$r['g_immagine']."'data-lightbox='mygallery'data-title='".rawurldecode($r['g_desc'])."'><img src=\"".$r['g_immagine']."\" alt='".$r['g_desc']."'></a>".$r['g_desc']."</div>";
        }
    }
}
?>