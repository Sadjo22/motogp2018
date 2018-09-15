<?php
require_once('config.php');

function menulista($list){

	switch ($list) {

		case 0:
			echo "<li class='seiqui' lang='it'>Home</li>";
			echo "<li><a href='classifica.php'>Classifiche</a></li>";
			echo "<li><a href='calendario.php'>Calendario</a></li>";
		    echo "<li><a  href='piloti.php'>Team &amp; Piloti</a></li>";
			echo "<li><a href='recensioni.php'>Recensioni</a></li>";
			echo "<li><a href='foto.php'>Foto</a></li>";
			echo "<li>";menu();"</li>"; 
		break;

		case 1:
			echo "<li><a href='home.php' lang='en'>Home</a></li>";
			echo "<li><a href='classifica.php'>Classifica</a></li>";
			echo "<li class='seiqui'>Calendario</li>";
		    echo "<li><a  href='piloti.php'>Team &amp; Piloti</a></li>";
			echo "<li><a href='recensioni.php'>Recensioni</a></li>";
			echo "<li><a href='foto.php'>Foto</a></li>";
			echo "<li>";menu();"</li>"; 
		break;

		case 2:
			echo "<li><a href='home.php'>Home</a></li>";
			echo "<li><a  href='classifica.php'>Classifica</a></li>";
			echo "<li><a href='calendario.php'>Calendario</a></li>";
		    echo "<li class='seiqui'>Team &amp; Piloti</li>";
			echo "<li><a href='recensioni.php'>Recensioni</a></li>";
			echo "<li><a href='foto.php'>Foto</a></li>";
			echo "<li>";menu();"</li>";
		break;

		case 3:
			echo "<li><a href='home.php' lang='en'>Home</a></li>";
			echo "<li><a  href='classifica.php'>Classifica</a></li>";
			echo "<li><a href='calendario.php'>Calendario</a></li>";
		    echo "<li><a href='piloti.php'>Team &amp; Piloti</a></li>";
		    echo "<li class='seiqui'>Recensioni</li>";
			echo "<li><a href='foto.php'>Foto</a></li>";
			echo "<li>";menu();"</li>";
		break;

		case 4:
			echo "<li><a href='home.php' lang='en'>Home</a></li>";
			echo "<li><a  href='classifica.php'>Classifica</a></li>";
			echo "<li><a href='calendario.php'>Calendario</a></li>";
		    echo "<li><a href='piloti.php'>Team &amp; Piloti</a></li>";
			echo "<li><a href='recensioni.php'>Recensioni</a></li>";
			echo "<li class='seiqui'>Foto</li>";
			echo "<li>";menu();"</li>"; 
		break;

		case 5:
			echo "<li><a href='home.php' lang='en'>Home</a></li>";
			echo "<li><a  href='classifica.php'>Classifica</a></li>";
			echo "<li><a href='calendario.php'>Calendario</a></li>";
		    echo "<li><a href='piloti.php'>Team &amp; Piloti</a></li>";
			echo "<li><a href='recensioni.php'>Recensioni</a></li>";
			echo "<li><a href='foto.php'>Foto</a></li>";
			echo "<li class='seiqui'>Login</li>";
		break;
			
		case 6:
			echo "<li><a href='home.php' lang='en'>Home</a></li>";
          	echo "<li><a href='classifica.php'>Classifiche</a></li>";
          	echo "<li><a href='calendario.php'>Calendario</a></li>";
          	echo" <li><a href='piloti.php'>Team &amp; Piloti</a></li>";
          	echo "<li><a href='recensioni.php'>Recensioni</a></li>";
          	echo "<li><a href='foto.php'>Foto</a></li>";
          	echo "<li class='ko'>";menu();"</li>"; 
          	
          	break;

        case 7:
			echo "<li class='seiqui' lang='en'>Home</li>";
			echo "<li><a href='classifica.php'>Classifiche</a></li>";
			echo "<li><a href='admincalendario.php'>Calendario</a></li>";
		    echo "<li><a  href='adminpiloti.php'>Team &amp; Piloti</a></li>";
			echo "<li><a href='adminrecensioni.php'>Recensioni</a></li>";
			echo "<li><a href='adminfoto.php'>Foto</a></li>";
			echo "<li><a href='home.php?logout=1'>Logout</a></li>"; 
		break;

		case 8:
			echo "<li><a href='adminhome.php' lang='en'>Home</a></li>";
			echo "<li><a href='classifica.php'>Classifica</a></li>";
			echo "<li class='seiqui'>Calendario</li>";
		    echo "<li><a  href='adminpiloti.php'>Team &amp; Piloti</a></li>";
			echo "<li><a href='adminrecensioni.php'>Recensioni</a></li>";
			echo "<li><a href='adminfoto.php'>Foto</a></li>";
			echo "<li><a href='home.php?logout=1'>Logout</a></li>"; 
		break;

		case 9:
			echo "<li><a href='adminhome.php' lang='en'>Home</a></li>";
			echo "<li><a  href='classifica.php'>Classifica</a></li>";
			echo "<li><a href='admincalendario.php'>Calendario</a></li>";
		    echo "<li class='seiqui'>Team &amp; Piloti</li>";
			echo "<li><a href='adminrecensioni.php'>Recensioni</a></li>";
			echo "<li><a href='adminfoto.php'>Foto</a></li>";
			echo "<li><a href='home.php?logout=1'>Logout</a></li>";
		break;

		case 10:
			echo "<li><a href='adminhome.php' lang='en'>Home</a></li>";
			echo "<li><a  href='classifica.php'>Classifica</a></li>";
			echo "<li><a href='admincalendario.php'>Calendario</a></li>";
		    echo "<li><a href='adminpiloti.php'>Team &amp; Piloti</a></li>";
		    echo "<li class='seiqui'>Recensioni</li>";
			echo "<li><a href='adminfoto.php'>Foto</a></li>";
			echo "<li><a href='home.php?logout=1'>Logout</a></li>";
		break;

		case 11:
			echo "<li><a href='adminhome.php'>Home</a></li>";
			echo "<li><a  href='classifica.php'>Classifica</a></li>";
			echo "<li><a href='admincalendario.php'>Calendario</a></li>";
		    echo "<li><a href='adminpiloti.php'>Team &amp; Piloti</a></li>";
			echo "<li><a href='adminrecensioni.php'>Recensioni</a></li>";
			echo "<li class='seiqui'>Foto</li>";
			echo "<li><a href='home.php?logout=1'>Logout</a></li>"; 
		break;

		
		
	}
}

?>