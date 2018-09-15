<?php

require_once'config.php';

function deletesponsor(){
	if(isset($_GET['deleteidsp'])){
	    $idsp=$_GET['deleteidsp'];

	    $delete="DELETE FROM sponsor  WHERE  sp_id='$idsp'";
	    $deleteUser=updatePiloti_squadre($delete);

	    if($deleteUser !=0){
	        echo "<div class='messagedelete'>Eliminazione avvenuta con successo!</div>";
	    }
	    else{
	        echo "<div class='messageerror'>Errore nell'eliminazione', riprovare</div>";
	    }
	}
} 

function sponsoradmin(){
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
            	echo "<a class='changefoto' href='modifica_sponsor.php?idsp=".$r['sp_id']."'>Modifica</a>";
            	echo "<a class='changefoto' href='adminhome.php?deleteidsp=".$r['sp_id']."'>Elimina</a>";                     
        }  
            
    }
}

function modificasponsor(){
	if(isset($_GET['idsp'])){
		$id=$_GET['idsp'];
	} 

	//$squadra= "SELECT squadra WHERE s_id=".$id ;
	$sponsor="SELECT * FROM sponsor WHERE sp_id='$id'";
	$user=selectPiloti_squadre($sponsor);

	if(isset($_POST['submit'])){
		$immagine=$_POST['sponsor_immagine'];
			
		$query="UPDATE sponsor SET sp_immagine=('$immagine') WHERE sp_id='$id'";

		$update=updatePiloti_squadre($query); 
		if($update != 0){
			echo "<div class='message'>Modifica avvenuta con successo!</div>";	
		}
		else{
			echo "<div class='messageerror'>Errore nella modifica, query non modificata, riprovare</div>";
		}
	}
	if(isset($_POST['submit'])){
		echo "<div class='body-content'>
			<img class='modificafototeam' src='$immagine' alt='Foto dello sponsor da modificare'/>
			<div class='module'>
				<form  method='post' action='#' onsubmit='return validateModificaSponsor()'>
				<label for='descr_ima'><span class='pbol'>*Percorso immagine:</span></label>
				<input type='text' name='sponsor_immagine' id='descr_im' value='$immagine'><br>
				<button type='submit' id='bt' name='submit' class=' submit btn btn-blockadmin btn-primary'>Modifica</button>	
				</form>

				<div class='li'> <a href='adminhome.php' lang='en' class='ilink'>Home</a></div>

			</div>
		</div>";
	}
	else{
		echo "<div class='body-content'>
		<img class='modificafototeam' src=".$user[0]['sp_immagine']." alt='Foto dello sponsor da modificare'/>
			<div class='module'>
			<form  method='post' action='#' onsubmit='return validateModificaSponsor()'>
			<label for='descr_ima'><span class='pbol'>*Percorso immagine:</span></label>
			<input type='text' id='descr_im' name='sponsor_immagine' value=".$user[0]['sp_immagine']."><br>
			<button type='submit' id='bt' name='submit' class=' submit btn btn-blockadmin btn-primary'>Modifica</button>	
		</form>

		<div class='li'> <a href='adminhome.php' lang='en' class='ilink'>Home</a></div>
		</div>
		</div>";
	}
}

	function insertsponsor(){
		if(isset($_POST['submit'])){
			$immagine=$_POST['sponsor_immagine'];
			$alt=$_POST['alt_sponsor'];
		//$punteggio=$_POST['squadra_punteggio'];

	    	$query= "INSERT INTO sponsor (sp_immagine, sp_alt) VALUES('$immagine', '$alt');";
		
			$insertion=insertPiloti_squadre($query);
			if($insertion != 0){
	       		echo "<div class='message'>Inserimento avvenuto con successo!</div>";
			}
			else{
				 echo "<div class='messageerror'>Errore nell'inserimento della query, query non inserita, riprovare</div>";
			}
		}
	}

?>