<?php
require_once('config.php');

function titolo($tit){
    switch ($tit) {
    	case 0: echo "<title>Home - MotoGP</title>";
    		break;

    	case 1: if(isset($_SESSION['nomeadmin'])){echo "<title>Admin Classifiche - MotoGP</title>";}
                else {echo "<title>Classifiche - MotoGP</title>";}
    		    break;

    	case 2: echo "<title>Calendario - MotoGP</title>";
    		break;

    	case 3: echo "<title>Team &amp; Piloti - MotoGP</title>";
    		break;

        case 4: echo "<title>Recensioni - MotoGP</title>";
    		break;

    	case 5: echo "<title>Foto - MotoGP</title>";
    		break;

        case 6: echo "<title>Login - MotoGP</title>";
            break;

        case 7: echo "<title>Registrati - MotoGP</title>";
            break;

        case 8: echo "<title>Login_user - MotoGP</title>";
            break;

        case 9: echo "<title>Admin Home - MotoGP</title>";
            break;
        
        case 10: echo "<title>Admin Calendario - MotoGP</title>";
            break;

        case 11: echo "<title>Admin Recensioni - MotoGP</title>";
            break;

        case 12: echo "<title>Admin Foto - MotoGP</title>";
            break;

        case 13: echo "<title>Admin Team &amp; Piloti  - MotoGP</title>";
            break;

        case 14: echo "<title>Modifica Pilota - MotoGP</title>";
            break;

        case 15: echo "<title>Modifica Calendario - MotoGP</title>";
            break;

        case 16: echo "<title>Modifica Sponsor - MotoGP</title>";
            break;

        case 17: echo "<title>Modifica Foto - MotoGP</title>";
            break;

        case 18: echo "<title>Inserisci Sponsor - MotoGP</title>";
            break;

        case 19: echo "<title>Inserisci Foto - MotoGP</title>";
            break;

        case 20: echo "<title>Inserisci Circuito - MotoGP</title>";
            break;

        case 21: echo "<title>Inserisci Pilota - MotoGP</title>";
            break; 

        case 22: echo "<title>Inserisci Team - MotoGP</title>";
            break;

        case 23: echo"<title>Modifica Team - MotoGP</title>";
            break;
    } 
}

?>