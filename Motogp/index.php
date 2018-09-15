<?php

 require_once'config.php';
 //get the array of all the records in the db

$errors=array();

function deletepilota(){
if(isset($_GET['deleteid'])){
	$id=$_GET['deleteid'];

	$delete="DELETE FROM piloti WHERE p_id='$id'";
	$deleteUser=updatePiloti_squadre($delete);

	if($deleteUser !=0){
		echo "<span class='messagedelete'>Eliminazione avvenuta con successo!</span>";
	}
	else{
		echo "<span class='messageerror'>Errore nell'eliminazione', riprovare</span>";
	}
} 
}


function deleteteam(){
if(isset($_GET['deleteid1'])){
	$id1=$_GET['deleteid1'];

	$delete="DELETE FROM squadra  WHERE  s_id='$id1'";
	$deleteUser=updatePiloti_squadre($delete);

	if($deleteUser !=0){
		echo "<span class='messagedelete'>Eliminazione avvenuta con successo!</span>";
	}
	else{
		echo "<span class='messageerror'>Errore nell'eliminazione', riprovare</span>";
	}
} 
}

function pilotiadmin(){
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
            echo "<p>Team: ".$r['s_nome']."</p>";     
            echo "<a class='changefoto' href='Modificare_piloti.php?id=".$r['p_id']."'>Modifica</a>";
            echo "<a class='changefoto' href='adminpiloti.php?deleteid=".$r['p_id']."'>Elimina</a></div>";       
        }           
    }
}

function teamadmin(){
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
            echo "<p>".$r['s_info']."</p><br />";    
            echo "<a class='changefoto' href='Modificare_team.php?id1=".$r['s_id']."'>Modifica</a>";
            echo "<a class='changefoto' href='adminpiloti.php?deleteid1=".$r['s_id']."'>Elimina</a></div>";          
        }           
    }
}
/*function insertpilo(){
	if(isset($_POST['submit'])){
	$id=$_POST['Pilota_id'];
	$nome=$_POST['Pilota_nome'];
	$cognome=$_POST['Pilota_cognome'];
	$eta=$_POST['Pilota_eta'];
	$nazione=$_POST['Pilota_nazione'];
	$team=$_POST['Pilota_team'];
	$punteggio=$_POST['Pilota_punteggio'];
	$ultgara=$_POST['Pilota_ultima_gara'];
	$p_immagine=$_POST['Pilota_immagine'];
	$query2="SELECT p_id FROM piloti WHERE p_id='$id'";
	$conn=apri_con();
    $result = $conn->query($query2);
    $check=0;
    if(mysqli_num_rows($result)>0){
    	echo "<div class='messaggio_errore'> *Numero del pilota già esistente</div>";
    	$check=1;
	}
    if ($eta<18) {
    	echo "<div class='messaggio_errore'> *Età inserita non valida, deve essere maggiore di 18</div>";
    	$check=1;
    }
    if ($id<1) {
    	echo "<div class='messaggio_errore'> *Numero inserito non valido, deve essere compreso fra 1 e 99</div>";
    	$check=1;
    }
    if(!preg_match("/^[a-zA-Z]*$/",$nome)){
    	echo "<div class='messaggio_errore'> *Nome inserito non valido, deve essere composto da sole lettere</div>";
    	$check=1;
    }
    if(!preg_match("/^[a-zA-Z]*$/",$cognome)){
    	echo "<div class='messaggio_errore'> *Cognome inserito non valido, deve essere composto da sole lettere</div>";
    	$check=1;
    }
	if(!preg_match("/^[a-zA-Z]*$/",$nazione)){
		echo "<div class='messaggio_errore'> *Nazione inserita non valida, deve essere composta da sole lettere</div>";
		$check=1;
	}
	if($ultgara<0){
		echo "<div class='messaggio_errore'> *Posizione ultima gara non valida, deve essere maggiore o uguale a 1 </div>";
		$check=1;
	}
    if($check==0){
	$query1= "INSERT INTO piloti(p_id,p_nome,p_cognome,p_eta,p_nazione,p_team,p_punteggio, ultima_gara,p_immagine) VALUES('$id','$nome','$cognome','$eta','$nazione','$team','$punteggio','$ultgara','$p_immagine');";
	$insertion=insertPiloti_squadre($query1);
	if($ultgara==1){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+25 WHERE p_id='$id'";
	}
	if($ultgara==2){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+20 WHERE p_id='$id'";
	}
	if($ultgara==3){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+16 WHERE p_id='$id'";
	}
	if($ultgara==4){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+13 WHERE p_id='$id'";
	}
	if($ultgara==5){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+11 WHERE p_id='$id'";
	}
	if($ultgara==6){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+10 WHERE p_id='$id'";
	}
	if($ultgara==7){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+9 WHERE p_id='$id'";
	}
	if($ultgara==8){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+8 WHERE p_id='$id'";
	}
	if($ultgara==9){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+7 WHERE p_id='$id'";
	}
	if($ultgara==10){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+6 WHERE p_id='$id'";
	}
	if($ultgara==11){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+5 WHERE p_id='$id'";
	}
	if($ultgara==12){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+4 WHERE p_id='$id'";
	}
	if($ultgara==13){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+3 WHERE p_id='$id'";
	}
	if($ultgara==14){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+2 WHERE p_id='$id'";
	}
	if($ultgara==15){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+1 WHERE p_id='$id'";
	}
	if($ultgara>15 or $ultgara==0){
		$query1="UPDATE piloti SET p_punteggio=p_punteggio WHERE p_id='$id'";
	}

	$insertion=insertPiloti_squadre($query1);
	if($insertion != 0){
       echo "<div class='messaggio_errore'> Pilota inserito con successo!</div>";
	}
	else{
		echo "<div class='messaggio_errore'>Errore nell'inserimento della query, query non inserita</div>";
	}
	}
 }
}*/


function insertpilo(){
	if(isset($_POST['submit'])){
	$id=$_POST['Pilota_id'];
	$nome=$_POST['Pilota_nome'];
	$cognome=$_POST['Pilota_cognome'];
	$eta=$_POST['Pilota_eta'];
	$nazione=$_POST['Pilota_nazione'];
	$team=$_POST['Pilota_team'];
	$punteggio=$_POST['Pilota_punteggio'];
	$ultgara=$_POST['Pilota_ultima_gara'];
	$p_immagine=$_POST['Pilota_immagine'];
	$query2="SELECT p_id FROM piloti WHERE p_id='$id'";
	$conn=apri_con();
    $result = $conn->query($query2);
    $check=0;
    if(mysqli_num_rows($result)>0){
    	echo "<div class='messaggio_errore'> *Numero del pilota già esistente</div>";
    	$check=1;
	}
    if ($eta<16) {// CAMBIATO DA 18 A 16
    	echo "<div class='messaggio_errore'> *Età inserita non valida, deve essere maggiore di 18</div>";
    	$check=1;
    }
    if ($id<1 || $id>99) {//AGGIUNTO || $ID>99
    	echo "<div class='messaggio_errore'> *Numero inserito non valido, deve essere compreso fra 1 e 99</div>";
    	$check=1;
    }
    if(!preg_match("/^[a-zA-Z]*$/",$nome)){
    	echo "<div class='messaggio_errore'> *Nome inserito non valido, deve essere composto da sole lettere</div>";
    	$check=1;
    }
    if(!preg_match("/^[a-zA-Z ]*$/",$cognome)){//AGGIUNTO LO SPAZIO
    	echo "<div class='messaggio_errore'> *Cognome inserito non valido, deve essere composto da sole lettere</div>";
    	$check=1;
    }
	if(!preg_match("/^[a-zA-Z ]*$/",$nazione)){//AGGIUNTO LO SPAZIO
		echo "<div class='messaggio_errore'> *Nazione inserita non valida, deve essere composta da sole lettere</div>";
		$check=1;
	}
	if($ultgara<0){
		echo "<div class='messaggio_errore'> *Posizione ultima gara non valida, deve essere maggiore o uguale a 0 </div>";//MODIFICATO DEVE ESSERE MAGGIORE O UGUALE A 0(PRIMA ERA A 1)
		$check=1;
	}
    if($check==0){
	$query1= "INSERT INTO piloti(p_id,p_nome,p_cognome,p_eta,p_nazione,p_team,p_punteggio, ultima_gara,p_immagine) VALUES('$id','$nome','$cognome','$eta','$nazione','$team','$punteggio','$ultgara','$p_immagine');";
	$insertion=insertPiloti_squadre($query1);
	if($ultgara==1){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+25 WHERE p_id='$id'";
	}
	if($ultgara==2){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+20 WHERE p_id='$id'";
	}
	if($ultgara==3){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+16 WHERE p_id='$id'";
	}
	if($ultgara==4){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+13 WHERE p_id='$id'";
	}
	if($ultgara==5){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+11 WHERE p_id='$id'";
	}
	if($ultgara==6){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+10 WHERE p_id='$id'";
	}
	if($ultgara==7){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+9 WHERE p_id='$id'";
	}
	if($ultgara==8){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+8 WHERE p_id='$id'";
	}
	if($ultgara==9){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+7 WHERE p_id='$id'";
	}
	if($ultgara==10){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+6 WHERE p_id='$id'";
	}
	if($ultgara==11){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+5 WHERE p_id='$id'";
	}
	if($ultgara==12){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+4 WHERE p_id='$id'";
	}
	if($ultgara==13){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+3 WHERE p_id='$id'";
	}
	if($ultgara==14){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+2 WHERE p_id='$id'";
	}
	if($ultgara==15){
	$query1="UPDATE piloti SET p_punteggio=p_punteggio+1 WHERE p_id='$id'";
	}
	if($ultgara>15 or $ultgara==0){
		$query1="UPDATE piloti SET p_punteggio=p_punteggio WHERE p_id='$id'";
	}

	$insertion=insertPiloti_squadre($query1);
	if($insertion != 0){
       echo "<div class='messagedelete'> Pilota inserito con successo!</div>";
	}
	else{
		echo "<div class='messagedelete'>Errore nell'inserimento della query, query non inserita</div>";
	}
	}
 }
}


function selectTeam(){
	$selectquery="SELECT s_nome FROM squadra";
	$conn=apri_con();
    $select= $conn->query($selectquery);
	if(!$select){
        echo"<option>error</option>";
        
    }
    else{
        foreach($select as $s) {   
        echo "<option value='".$s['s_nome']."'>".$s['s_nome']."</option>"; 
		}
	}
}

function selectTeamodify($team,$id){
	$selectquery="SELECT s_nome FROM squadra join piloti WHERE s_nome!='$team' and p_id='$id'";
	$conn=apri_con();
    $select= $conn->query($selectquery);
	if(!$select){
        echo"<option>error</option>";
        
    }
    else{
        foreach($select as $s) {   
        echo "<option value='".$s['s_nome']."'>".$s['s_nome']."</option>"; 
		}
	}
}

function modificapilo(){
	if(isset($_GET['id'])){
	$id=$_GET['id'];
} 

$piloti= "SELECT * FROM piloti WHERE p_id='$id'" ;
$user=selectPiloti_squadre($piloti);

if(isset($_POST['invio'])){
	$eta=$_POST['pilota_eta'];
	$team=$_POST['pilota_team'];
	$punt=$_POST['pilota_punteggio'];
	$ult=$_POST['pilota_ultima_gara'];
	$immag=$_POST['pilota_immagine'];
	if($ult==1){
	$query="UPDATE piloti SET p_punteggio=('$punt'), p_eta=('$eta'), p_punteggio=p_punteggio+25, p_team=('$team'),ultima_gara=('$ult'), p_immagine=('$immag') WHERE p_id='$id'";
	}
	if($ult==2){
	$query="UPDATE piloti SET p_punteggio=('$punt'), p_eta=('$eta'),p_punteggio=p_punteggio+20, p_team=('$team'),ultima_gara=('$ult'), p_immagine=('$immag') WHERE p_id='$id'";
	}
	if($ult==3){
	$query="UPDATE piloti SET p_punteggio=('$punt'), p_eta=('$eta'),p_punteggio=p_punteggio+16, p_team=('$team'),ultima_gara=('$ult'), p_immagine=('$immag') WHERE p_id='$id'";
	}
	if($ult==4){
	$query="UPDATE piloti SET p_punteggio=('$punt'), p_eta=('$eta'),p_punteggio=p_punteggio+13, p_team=('$team'),ultima_gara=('$ult'), p_immagine=('$immag') WHERE p_id='$id'";
	}
	if($ult==5){
	$query="UPDATE piloti SET p_punteggio=('$punt'), p_eta=('$eta'),p_punteggio=p_punteggio+11, p_team=('$team'),ultima_gara=('$ult'), p_immagine=('$immag') WHERE p_id='$id'";
	}
	if($ult==6){
	$query="UPDATE piloti SET p_punteggio=('$punt'), p_eta=('$eta'),p_punteggio=p_punteggio+10, p_team=('$team'),ultima_gara=('$ult'), p_immagine=('$immag') WHERE p_id='$id'";
	}
	if($ult==7){
	$query="UPDATE piloti SET p_punteggio=('$punt'), p_eta=('$eta'),p_punteggio=p_punteggio+9, p_team=('$team'),ultima_gara=('$ult'), p_immagine=('$immag') WHERE p_id='$id'";
	}
	if($ult==8){
	$query="UPDATE piloti SET p_punteggio=('$punt'), p_eta=('$eta'),p_punteggio=p_punteggio+8, p_team=('$team'),ultima_gara=('$ult'), p_immagine=('$immag') WHERE p_id='$id'";
	}
	if($ult==9){
	$query="UPDATE piloti SET p_punteggio=('$punt'), p_eta=('$eta'),p_punteggio=p_punteggio+7, p_team=('$team'),ultima_gara=('$ult'), p_immagine=('$immag') WHERE p_id='$id'";
	}
	if($ult==10){
	$query="UPDATE piloti SET p_punteggio=('$punt'), p_eta=('$eta'),p_punteggio=p_punteggio+6, p_team=('$team'),ultima_gara=('$ult'), p_immagine=('$immag') WHERE p_id='$id'";
	}
	if($ult==11){
	$query="UPDATE piloti SET p_punteggio=('$punt'), p_eta=('$eta'),p_punteggio=p_punteggio+5, p_team=('$team'),ultima_gara=('$ult'), p_immagine=('$immag') WHERE p_id='$id'";
	}
	if($ult==12){
	$query="UPDATE piloti SET p_punteggio=('$punt'), p_eta=('$eta'),p_punteggio=p_punteggio+4, p_team=('$team'),ultima_gara=('$ult'), p_immagine=('$immag') WHERE p_id='$id'";
	}
	if($ult==13){
	$query="UPDATE piloti SET p_punteggio=('$punt'), p_eta=('$eta'),p_punteggio=p_punteggio+3, p_team=('$team'),ultima_gara=('$ult'), p_immagine=('$immag') WHERE p_id='$id'";
	}
	if($ult==14){
	$query="UPDATE piloti SET p_punteggio=('$punt'), p_eta=('$eta'),p_punteggio=p_punteggio+2, p_team=('$team'),ultima_gara=('$ult'), p_immagine=('$immag') WHERE p_id='$id'";
	}
	if($ult==15){
	$query="UPDATE piloti SET p_punteggio=('$punt'), p_eta=('$eta'),p_punteggio=p_punteggio+1, p_team=('$team'),ultima_gara=('$ult'), p_immagine=('$immag') WHERE p_id='$id'";
	}
	if($ult>15 or $ult==0 or empty($ult)){
	$query="UPDATE piloti SET p_punteggio=('$punt'), p_eta=('$eta'),p_team=('$team'),ultima_gara=('$ult'), p_immagine=('$immag') WHERE p_id='$id'";
	}
	if($ult<0){
		echo "<div class='messaggio_errore'>*Posizione ultima gara non valida, deve essere maggiore o uguale a 0</div>";
	}
	if($ult>=0){
	$update=updatePiloti_squadre($query);
	if($update != 0){
		echo "<div class='messagedelete'>Modifica avvenuta con successo!</div>";
	}
	else{
		echo "<div class='messagedelete'>Errore nella modifica, query non modificata, riprovare</div>";
	}
}
}
if(isset($_POST['invio'])){
	echo "<div class='body-content'>
		<img class='modificafoto' src='$immag' alt='Foto del pilota da modificare'/>
		<div class='module'>
		<form  method='post' action='#' onsubmit='return validateModificaDatiPilota()' >
			<label><span class='pbol'>*Team:</span></label>
			<select name='pilota_team'>
			<option value=\"$team\">$team</option>";
			selectTeamodify($team,$id);
			echo "</select>
			<label for='p_eta'><span class='pbol'>*Età:</span></label>
			<input type='number' name='pilota_eta' id='p_eta' value='$eta'><br>
			<label for='p_punteggio'><span class='pbol'>*Punteggio totale:</span></label>
			<input type='number' name='pilota_punteggio' id='p_punteggio' value='$punt'><br>
			<label for='p_posizione'><span class='pbol'>*Posizione ultima gara:</span></label>
			<input type='number' name='pilota_ultima_gara' id='p_posizione' placeholder='posizione'><br>
			<label for='p_immagine'><span class='pbol'>*Percorso immagine:</span></label>
			<input type='text' name='pilota_immagine' id='p_immagine' value='$immag'><br>
			<button type='submit' name='invio' class='submit btn btn-blockadmin btn-primary'>Modifica</button>	
		</form>
		 <div class='li'> <a href='adminpiloti.php' class='ilink'>Team&Piloti</a></div>
		 </div></div>";
}
else{
	echo "<div class='body-content'>
		<img class='modificafoto' src=".$user[0]['p_immagine']." alt='Foto del pilota da modificare'/>
		<div class='module'>
		<form  method='post' >
		<label><span class='pbol'>*Team:</span></label>
		<select name='pilota_team'>
		<option value=\"".$user[0]['p_team']."\">".$user[0]['p_team']."</option>";
		selectTeamodify($user[0]['p_team'],$id);

		/*<input type='text' name='pilota_team' value=\"".$user[0]['p_team']."\"><br>*/
		echo "</select>
		<label for='p_eta'><span class='pbol'>*Età:</span></label>
		<input type='number' name='pilota_eta' value=".$user[0]['p_eta']."><br>
		<label for='p_punteggio'><span class='pbol'>*Punteggio totale:</span></label>
		<input type='number' name='pilota_punteggio' id='p_punteggio' value=".$user[0]['p_punteggio']."><br>
		<label for='p_ultima_gara'><span class='pbol'>*Posizione ultima gara:</span></label>
		<input type='number' name='pilota_ultima_gara' id='p_ultima_gara' placeholder='posizione'><br>
		<label for='p_immagine'><span class='pbol'>*Percorso immagine:</span></label>
		<input type='text' name='pilota_immagine' id='p_immagine' value=".$user[0]['p_immagine']."><br>
		<button type='submit' name='invio' class='submit btn btn-blockadmin btn-primary'>Modifica</button>
		
	</form>
	 <div class='li'> <a href='adminpiloti.php' class='ilink'>Team&Piloti</a></div>
	</div></div>";
}
}

function modificateam(){
	if(isset($_GET['id1'])){
		$id=$_GET['id1'];
	} 

	//$squadra= "SELECT squadra WHERE s_id=".$id ;
	$squadra="SELECT * FROM squadra WHERE s_id='$id'";
	$user=selectPiloti_squadre($squadra);

	if(isset($_POST['submit'])){
		$nome=htmlspecialchars($_POST['squadra_nome'],ENT_QUOTES);
		$info=htmlspecialchars($_POST['squadra_info'], ENT_QUOTES);
		$immagine=$_POST['squadra_immagine'];
			
		$query="UPDATE squadra SET s_info=('$info'),s_immagine=('$immagine'),s_nome=('$nome') WHERE s_id='$id'";

		$update=updatePiloti_squadre($query); 
		if($update != 0){
			echo "<div class='messagedelete'>Modifica avvenuta con successo!</div>";	
		}
		else{
			echo "<div class='messagedelete'>Errore nella modifica, query non modificata, riprovare</div>";
		}
	}
	if(isset($_POST['submit'])){
		echo "<div class='body-content'>
			<img class='modificafototeam' src='$immagine' alt='foto del team da modificare'/>
			<div class='module'>
				<form  method='post' action='#' onsubmit='return validateModificaTeam()'>
				    <label><span class='pbol'>*Info</span></label>
					<textarea rows='10' cols='41' id='info' name='squadra_info'>$info</textarea><br>
					<label><span class='pbol'>*Nome</span></label>
					<input type='text' name='squadra_nome' id='nome' value=\"$nome\"><br>
					<label><span class='pbol'>*Percorso immagine</span></label>
					<input type='text' name='squadra_immagine' id='immagine' value='$immagine'><br>
					<button type='submit' name='submit' class=' submit btn btn-blockadmin btn-primary'>Modifica</button>	
				</form>

				<div class='li'> <a href='adminpiloti.php' lang='en' class='ilink'><span lang='en'>Team&Piloti</span></a></div>
			</div>
		</div>";
	}
	else{
		echo "<div class='body-content'>
		<img class='modificafototeam' src=".$user[0]['s_immagine']." alt='foto del team da modificare'/>
			<div class='module'>
			<form  method='post'>
			<label><span class='pbol'>*Info</span></label>
			<textarea rows='10' cols='41' name='squadra_info'>".$user[0]['s_info']."</textarea><br>
			<label><span class='pbol'>*Nome</span></label>
			<input type='text' name='squadra_nome' value=\"".$user[0]['s_nome']."\"><br>
			<label><span class='pbol'>*Percorso immagine</span></label>
			<input type='text' name='squadra_immagine' value=".$user[0]['s_immagine']."><br>
			<button type='submit' name='submit' class=' submit btn btn-blockadmin btn-primary'>Modifica</button>	
		</form>
	<div class='li'> <a href='adminpiloti.php' lang='en' class='ilink'><span lang='en'>Team&Piloti</span></a></div>
		</div>
		</div>";
	}
}

function insertteam(){
	if(isset($_POST['submit'])){
		$nome=$_POST['squadra_nome'];
		$info=htmlspecialchars($_POST['squadra_info'],ENT_QUOTES);
		$nazione=$_POST['squadra_nazione'];
		$immagine=$_POST['squadra_immagine'];
		//$punteggio=$_POST['squadra_punteggio'];
		if(!preg_match("/^[a-zA-Z]*$/",$nazione)){
			echo "<div class='messaggio_errore'>*Nazione inserita non valida, deve essere composta da sole lettere</div>";
		}
		else{
		    $query= "INSERT INTO squadra (s_nome,s_info,s_nazione,s_immagine) VALUES('$nome','$info','$nazione','$immagine');";
			
			$insertion=insertPiloti_squadre($query);
			if($insertion != 0){
		       echo "<span class='message'>Team inserito con successo!</span>";
			}
			else{
				 echo "<div class='messagedelete'>Errore nell'inserimento della query, query non inserita</div>";
			}
		}
	}
}
?>