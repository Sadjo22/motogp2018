<?php

    require_once 'config.php';
 //get the array of all the records in the db

    function deletecalendario(){

        if(isset($_GET['deleteid'])){
            $id=$_GET['deleteid'];
            $delete="DELETE FROM circuito WHERE c_id='$id'";
            $deleteUser=updateCircuito($delete);

            if($deleteUser !=0){

                echo "<span class='messagedelete'>Eliminazione avvenuta con successo!</span>";
            }
            else{
                echo "<span class='messageerror'>Errore nell 'eliminazione, riprovare</span>";
            }
        } 
    }

    function calendarioadmin(){
        $sql="SELECT /*DATE_FORMAT(data, '%d/%c/%Y') AS 'data2',*/  giorno, mese, anno, c_id, /*CURDATE() as 'datacur',*/ /*DATE_FORMAT(CURDATE(), '%d/%c/%Y') as datacur,*/ c_nome, c_immagine, luogo, lunghezza_m, giro_record, p_nome, p_cognome, c_descr FROM circuito JOIN piloti where detentore_record=p_id order by anno,mese,giorno ";
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
                        echo "<span class='decri'>".$r['c_descr']."</span><br /><br />";
                        echo "<a class='changefoto' href='Modifica_calendario.php?id=".$r['c_id']."'>Modifica</a>";
                        echo " <a class='changefoto' href='admincalendario.php?deleteid=".$r['c_id']."'>Elimina</a></div>";
                        $count=1;
                    } 
                    else{
                        echo "<div class='date'><h1>".$r['giorno']." ".$nomemese[$r['mese']]." ".$r['anno']."</h1><br /><br />";
                        echo "<h2 class='nome_circuito'>".$r['c_nome']."</h2><br /><br />" ;
                        echo "<img class='c_immagine' src=\"".$r['c_immagine']."\" alt='Tracciato del \"".$r['c_nome']."\"'><br /><br/>";
                        echo "<p>Luogo: ".$r['luogo']."</p><br />";
                        echo "<p>Lunghezza (m): ".$r['lunghezza_m']."</p><br />";
                        echo "<p>Giro Record: ".$r['giro_record']."</p><br />";
                        echo "<p>Detentore Record: ".$r['p_nome']." ".$r['p_cognome']."</p><br />";
                        
                        echo "<span class='decri'>".$r['c_descr']."</span><br /><br />";
                        echo "<a class='changefoto' href='Modifica_calendario.php?id=".$r['c_id']."'>Modifica</a>";
                        echo "<a class='changefoto' href='admincalendario.php?deleteid=".$r['c_id']."'>Elimina</a></div>";   
                    }       
                }

            }

    }


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

/*function esitocalendario(){
    if(isset($_POST['submit'])){
    $nome=($_POST['circuito_nome']);
    $descr=test_input($_POST['circuito_descr']);
    $img=test_input($_POST['circuito_immagine']);
    $luogo=test_input($_POST['circuito_luogo']);
    $lung=test_input($_POST['circuito_lunghezza']);
    $giro=htmlspecialchars($_POST['giro_record_circuito'],ENT_QUOTES);
    $detentore=test_input($_POST['circuito_detentore_record']);
    $giorno=$_POST['giorno'];
    $mese=$_POST['mese'];
    $anno=$_POST['anno'];
if(($giorno>31 || $giorno<1 || $giorno=="")||($mese>12 || $mese<1 ||$mese=="")||($anno<date('Y') || $anno=="") || ($nome=="") || ($descr=="") || ($img=="") || ($luogo=="") || ($lung=="") ||($giro=="") || ($detentore=="")) {


     if(empty($giorno))
        echo "<div class='messaggio_errore'>*Inserire il giorno della gara</div>";
    if(empty($lung))
        echo "<div class='messaggio_errore'>*Inserire la lunghezza del circuito</div>";
    if(empty($giro))
        echo "<div class='messaggio_errore'>*Inserire il giro record </div>";
    if(empty($detentore))
        echo "<div class='messaggio_errore'>*Inserire il detentore_record del circuito</div>";
    if(empty($mese))
        echo "<div class='messaggio_errore'>*Inserire il mese della gara</div>";
    if(empty($anno))
        echo "<div class='messaggio_errore'>*Inserire l anno della gara</div>";

    if($giorno>31 || $giorno<1)
        echo "<div class='messaggio_errore'>*Giorno inserito non valido, </div>";

    if($mese>12 || $mese<1 )
        echo "<div class='messaggio_errore'>*Mese inserito non valido,deve essere un numero compresa tra 1 e 12</div>";
 
    if($anno<date('Y'))
        echo "<div class='messaggio_errore'>*Anno inserito non valido,deve essere maggiore dell anno corrente</div>";
    if($lung<3000)
        echo "<div class='messaggio_errore'>* La lunghezza del circuito deve essere maggiore di 3000</div>";

    if($detentore<1)
        echo "<div class='messaggio_errore'>*Numero non valido, inserire numero del pilota che detiene il record</div>";
        
    if(!preg_match("/^[a-zA-Z]*$/",$luogo))
        echo "<div class='messaggio_errore'>*Luogo inserito non valido, deve essere composto da sole lettere</div>";
            
    if(!preg_match("/^[a-zA-Z]*$/",$nome))
         echo "<div class='messaggio_errore'>*Nome inserito non valido, deve essere composto da sole lettere</div>";

}else{
    
    $query= "INSERT INTO circuito (c_nome,c_descr,c_immagine,luogo,lunghezza_m,giro_record, detentore_record,giorno,mese,anno) VALUES('$nome','$descr','$img','$luogo','$lung','$giro','$detentore','$giorno','$mese','$anno');";
  
    
    $insertion=insertCircuito($query);
    if($insertion != 0){
        //header("Location: index1.php");
        echo "<div class='message'>Circuito inserito con successo!</div>";
    }
    else{
        echo "<div class='message'>Errore nell'inserimento del circuito, riprovare</div>";
        echo "<form action='admincalendario.php'>
            <button type='submit' name='back' class='btn btn-block btn-primary'>Torna sulla Home</button>
            </form>";
    }
}
}
}
*/
 
function esitocalendario(){
    if(isset($_POST['submit'])){
    $nome=($_POST['circuito_nome']);
    $descr=htmlspecialchars($_POST['circuito_descr'],ENT_QUOTES);
    $img=test_input($_POST['circuito_immagine']);
    $luogo=test_input($_POST['circuito_luogo']);
    $lung=test_input($_POST['circuito_lunghezza']);
    $giro=htmlspecialchars($_POST['giro_record_circuito'],ENT_QUOTES);
    $detentore=test_input($_POST['circuito_detentore_record']);
    $giorno=$_POST['giorno'];
    $mese=$_POST['mese'];
    $anno=$_POST['anno'];
    $query2="SELECT giorno,mese,anno FROM circuito WHERE (giorno = '$giorno' AND mese = '$mese') AND anno = '$anno'";
    $conn=apri_con();
    $result = $conn->query($query2); //AGGIUNTA $query2
if((!preg_match("/^[a-zA-Z() ]*$/",$luogo)) || (!preg_match("/^[a-zA-Z ]*$/",$nome)) || $giorno=="" || $giorno>31 || $giorno<1 || $giorno=="" ||($mese>12 || $mese<1 ||$mese=="")||($anno<date('Y') || $anno=="") || ($nome=="") || ($descr=="") || ($img=="") || ($luogo=="") || ($lung=="") || $lung<3000 || $detentore<1 || $detentore>99 || ($giro=="") || ($detentore=="") || mysqli_num_rows($result)>0) {//AGGIUNTO mysqli_num_rows e modificato l'if


     if(empty($giorno))
        echo "<div class='messaggio_errore'>*Inserire il giorno della gara</div>";
    if(empty($lung))
        echo "<div class='messaggio_errore'>*Inserire la lunghezza del circuito</div>";
    if(empty($giro))
        echo "<div class='messaggio_errore'>*Inserire il giro record </div>";
    if(empty($detentore))
        echo "<div class='messaggio_errore'>*Inserire il detentore del record del circuito</div>";
    if(empty($mese))
        echo "<div class='messaggio_errore'>*Inserire il mese della gara</div>";
    if(empty($anno))
        echo "<div class='messaggio_errore'>*Inserire l'anno della gara</div>";

    if($giorno>31 || $giorno<1)
        echo "<div class='messaggio_errore'>*Giorno inserito non valido, </div>";

    if($mese>12 || $mese<1 )
        echo "<div class='messaggio_errore'>*Mese inserito non valido,deve essere un numero compresa tra 1 e 12</div>";
 
    if($anno<date('Y'))
        echo "<div class='messaggio_errore'>*Anno inserito non valido,deve essere maggiore o uguale all' anno corrente</div>";
    if($lung<3000)
        echo "<div class='messaggio_errore'>* La lunghezza del circuito deve essere maggiore di 3000</div>";

    if($detentore<1 || $detentore>99)
        echo "<div class='messaggio_errore'>*Numero non valido, inserire numero del pilota che detiene il record (tra 1 e 99) </div>";
        
    if(!preg_match("/^[a-zA-Z()]*$/",$luogo))
        echo "<div class='messaggio_errore'>*Luogo inserito non valido, deve essere composto da sole lettere</div>";
            
    if(!preg_match("/^[a-zA-Z ]*$/",$nome))
         echo "<div class='messaggio_errore'>*Nome inserito non valido, deve essere composto da sole lettere</div>";
    if(mysqli_num_rows($result)>0)
        echo "<span class='messaggio_errore'>*Data inserita non valida, circuito già presente in quella data<br>";//AGGIUNTO QUESTO IF

}
else{
    
    $query= "INSERT INTO circuito (c_nome,c_descr,c_immagine,luogo,lunghezza_m,giro_record, detentore_record,giorno,mese,anno) VALUES('$nome','$descr','$img','$luogo','$lung','$giro','$detentore','$giorno','$mese','$anno');";
  
    
    $insertion=insertCircuito($query);
    if($insertion != 0){
        //header("Location: index1.php");
        echo "<div class='message'>Circuito inserito con successo!</div>";
    }
    else{
        echo "<div class='message'>Errore nell'inserimento del circuito, riprovare</div>";
        echo "<form action='admincalendario.php'>
            <button type='submit' name='back' class='btn btn-block btn-primary'>Torna sulla Home</button>
            </form>";
    }
}
}
}


/* function modificacale(){
    if(isset($_GET['id'])){
    $id=$_GET['id'];
} 

$circuito= "SELECT * FROM circuito WHERE c_id=".$id ;

$user=selectCircuito($circuito);



if(isset($_POST['submit'])){
    $nome=$_POST['circuito_nome'];
    $descr=htmlspecialchars($_POST['circuito_descr'], ENT_QUOTES);
    $img=$_POST['circuito_immagine'];
    $luogo=$_POST['circuito_luogo'];
    $lung=$_POST['circuito_lunghezza'];
    $giro=htmlspecialchars($_POST['giro_record_circuito'], ENT_QUOTES);
    $detentore=$_POST['circuito_detentore_record'];
    $giorno=$_POST['giorno'];
    $mese=$_POST['mese'];
    $anno=$_POST['anno'];
if(($giorno>31 || $giorno<1)||($mese>12 || $mese<1)||($anno<date('Y'))){

 if($giorno>31 || $giorno<1)
    echo "<div class='messaggio_errore'>*Giorno inserito non valido, riprova</div>";

 if($mese>12 || $mese<1)
    echo "<div class='messaggio_errore'>*Mese inserito non valido, riprova</div>";
 
  if($anno<date('Y'))
    echo "<div class='messaggio_errore'>*Anno inserito non valido, riprova</div>";
 

} else{
    $query="UPDATE circuito SET c_nome=('$nome'),c_descr=('$descr'),c_immagine=('$img'),luogo=('$luogo'),lunghezza_m=('$lung'),giro_record=('$giro'),detentore_record=('$detentore'), giorno=('$giorno'), mese=('$mese'), anno=('$anno') WHERE c_id='$id'";


    $update=updateCircuito($query);
    if($update != 0){
        
         echo"<div class='message'>Modifica avvenuta con successo!</div>";
    }
    else{
        echo "<div class='message'>Errore, modifica non avvenuta, riprovare</div>";
    }
}

}

//fare controlli sulla data

echo"<div class='body-content'>
    <div class='module'>
        <form  method='post' onsubmit='return validateModificaCalendario()'>
                <label for='c_giorno'><span class='pbol'>*Inserisci il giorno:</span></label>
                <input type='number' name='giorno' id='c_giorno' value=".$user[0]['giorno']."><br>                          
                <label for='c_mese'><span class='pbol'>*Inserisci il mese:</span></label>
                <input type='number' name='mese' id='c_mese' value=".$user[0]['mese']."><br>
                <label for='c_anno'><span class='pbol'>*Inserisci l'anno:</pbol></label>
                <input type='number' name='anno' id='c_anno' value=".$user[0]['anno']."><br>
                <label for='c_nome'><span class='pbol'>*Inserisci il nome del circuito:</span></label>    
                <input type='text' name='circuito_nome' id='c_nome' value=\"".$user[0]['c_nome']."\"><br>
                <label for='c_imma'><span class='pbol'>*Percorso immagine:</span></label>
                <input type='text' name='circuito_immagine' id='c_imma' value=".$user[0]['c_immagine']."><br>
                <label for='c_luogo'><span class='pbol'>*Luogo:</span></label>
                <input type='text' name='circuito_luogo'  id='c_luogo' value=\"".$user[0]['luogo']."\"><br>
                <label for='c_lunghezza'><span class='pbol'>*Lunghezza (m):</span></label>
                <input type='text' name='circuito_lunghezza' id='c_lunghezza' value=".$user[0]['lunghezza_m']."><br>
                <label for='c_record'><span class='pbol'>*Giro Record:</span></label>
                <input type='text' name='giro_record_circuito'  id='record' value=".$user[0]['giro_record']."><br>
                <label for='c_detentore'><span class='pbol'>*Detentore record:</span></label>
                <input type='text' name='circuito_detentore_record' id='c_detentore' value=".$user[0]['detentore_record']."><br>
                <label for='c_descrizione'><span class='pbol'>*Descrizione circuito:</span></label>
                <textarea rows='10' cols='41' id='c_descrizione' name='circuito_descr'>".$user[0]['c_descr']."</textarea> <br>
                <button type='submit' name='submit' class='btn btn-blockadmin btn-primary submit'>Modifica</button>
                
        </form>
        <div class='li'> <a href='admincalendario.php' class='ilink'>Calendario</a></div>
    </div>
</div>";
}*/


function modificacale(){
    if(isset($_GET['id'])){
    $id=$_GET['id'];
} 

$circuito= "SELECT * FROM circuito WHERE c_id=".$id ;

$user=selectCircuito($circuito);



if(isset($_POST['submit'])){
    $nome=htmlspecialchars($_POST['circuito_nome'],ENT_QUOTES);
    $descr=htmlspecialchars($_POST['circuito_descr'], ENT_QUOTES);
    $img=$_POST['circuito_immagine'];
    $luogo=$_POST['circuito_luogo'];
    $lung=$_POST['circuito_lunghezza'];
    $giro=htmlspecialchars($_POST['giro_record_circuito'], ENT_QUOTES);
    $detentore=$_POST['circuito_detentore_record'];
    $giorno=$_POST['giorno'];
    $mese=$_POST['mese'];
    $anno=$_POST['anno'];
    //da qui all'else escluso ho modificato tutto l'if 
    $query1="SELECT giorno,mese,anno FROM circuito WHERE (giorno = '$giorno' AND mese = '$mese') AND anno = '$anno'";
    $conn=apri_con();
    $result = $conn->query($query1);
if((!preg_match("/^[a-zA-Z() ]*$/",$luogo)) || (!preg_match("/^[a-zA-Z ]*$/",$nome)) || $giorno=="" || $giorno>31 || $giorno<1 || $giorno=="" ||($mese>12 || $mese<1 ||$mese=="")||($anno<date('Y') || $anno=="") || ($nome=="") || ($descr=="") || ($img=="") || ($luogo=="") || ($lung=="") || $lung<3000 || $detentore<1 || $detentore>99 || ($giro=="") || ($detentore=="") || mysqli_num_rows($result)>0) {


     if(empty($giorno))
        echo "<div class='messaggio_errore'>*Inserire il giorno della gara</div>";
    if(empty($lung))
        echo "<div class='messaggio_errore'>*Inserire la lunghezza del circuito</div>";
    if(empty($giro))
        echo "<div class='messaggio_errore'>*Inserire il giro record </div>";
    if(empty($detentore))
        echo "<div class='messaggio_errore'>*Inserire il detentore del record del circuito</div>";
    if(empty($mese))
        echo "<div class='messaggio_errore'>*Inserire il mese della gara</div>";
    if(empty($anno))
        echo "<div class='messaggio_errore'>*Inserire l'anno della gara</div>";

    if($giorno>31 || $giorno<1)
        echo "<div class='messaggio_errore'>*Giorno inserito non valido, </div>";

    if($mese>12 || $mese<1 )
        echo "<div class='messaggio_errore'>*Mese inserito non valido,deve essere un numero compresa tra 1 e 12</div>";
 
    if($anno<date('Y'))
        echo "<div class='messaggio_errore'>*Anno inserito non valido,deve essere maggiore o uguale all' anno corrente</div>";
    if($lung<3000)
        echo "<div class='messaggio_errore'>* La lunghezza del circuito deve essere maggiore di 3000</div>";

    if($detentore<1 || $detentore>99)
        echo "<div class='messaggio_errore'>*Numero non valido, inserire numero del pilota che detiene il record (tra 1 e 99) </div>";
        
    if(!preg_match("/^[a-zA-Z()]*$/",$luogo))
        echo "<div class='messaggio_errore'>*Luogo inserito non valido, deve essere composto da sole lettere</div>";
            
    if(!preg_match("/^[a-zA-Z ]*$/",$nome))
         echo "<div class='messaggio_errore'>*Nome inserito non valido, deve essere composto da sole lettere</div>";
    if(mysqli_num_rows($result)>0)
        echo "<span class='messaggio_errore'>*Data inserita non valida, circuito già presente in quella data<br>";

} else{
    $query="UPDATE circuito SET c_nome=('$nome'),c_descr=('$descr'),c_immagine=('$img'),luogo=('$luogo'),lunghezza_m=('$lung'),giro_record=('$giro'),detentore_record=('$detentore'), giorno=('$giorno'), mese=('$mese'), anno=('$anno') WHERE c_id='$id'";


    $update=updateCircuito($query);
    if($update != 0){
        
         echo"<div class='message'>Modifica avvenuta con successo!</div>";
    }
    else{
        echo "<div class='message'>Errore, modifica non avvenuta, riprovare</div>";
    }
}

}

//fare controlli sulla data

echo"<div class='body-content' onsubmit='return validateModificaCalendario()'>
    <div class='module'>
        <form  method='post' onsubmit='return validateModificaCalendario()'>
                <label><span class='pbol'>*Inserisci il giorno:</span></label>
                <input type='number' name='giorno' value=".$user[0]['giorno']."><br>                          
                <label><span class='pbol'>*Inserisci il mese:</span></label>
                <input type='number' name='mese' value=".$user[0]['mese']."><br>
                <label><span class='pbol'>*Inserisci l'anno:</pbol></label>
                <input type='number' name='anno' value=".$user[0]['anno']."><br>
                <label><span class='pbol'>*Inserisci il nome del circuito:</span></label>    
                <input type='text' name='circuito_nome' value=\"".$user[0]['c_nome']."\"><br>
                <label><span class='pbol'>*Percorso immagine:</span></label>
                <input type='text' name='circuito_immagine' value=".$user[0]['c_immagine']."><br>
                <label><span class='pbol'>*Luogo:</span></label>
                <input type='text' name='circuito_luogo' value=\"".$user[0]['luogo']."\"><br>
                <label><span class='pbol'>*Lunghezza (m):</span></label>
                <input type='text' name='circuito_lunghezza' value=".$user[0]['lunghezza_m']."><br>
                <label><span class='pbol'>*Giro Record:</span></label>
                <input type='text' name='giro_record_circuito' value=".$user[0]['giro_record']."><br>
                <label><span class='pbol'>*Detentore record:</span></label>
                <input type='text' name='circuito_detentore_record' value=".$user[0]['detentore_record']."><br>
                <label><span class='pbol'>*Descrizione circuito:</span></label>
                <textarea rows='10' cols='41' id='description' name='circuito_descr'>".$user[0]['c_descr']."</textarea> <br>
                <button type='submit' name='submit' class='btn btn-blockadmin btn-primary submit'>Modifica</button>
                
        </form>
        <div class='li'> <a href='admincalendario.php' class='ilink'>Calendario</a></div>
    </div>
</div>";
}


  