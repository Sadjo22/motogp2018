<?php

require_once'config.php';

 //get the array of all the records in the db
function deletefoto(){
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $delete="DELETE FROM gallery WHERE g_id=".$id;
        $deleteUser=updatePiloti_squadre($delete);

        if($deleteUser !=0){
            echo "<span class='messagedelete'>Eliminazione avvenuta con successo!</span>";
        }
        else{
            echo "<span class='messageerror'>Errore nell'eliminazione', riprovare</span>";
        }
    } 
}



//get the array of all the records in the db
 
function galleryadmin(){
    $sql="SELECT * FROM gallery order by g_id";
    $conn=apri_con();
    $result = $conn->query($sql);
    if(!$result){
        echo"error";
    }
    else{
        foreach($result as $r){
            echo "<div class='galleryadmin'><a href='".$r['g_immagine']."'data-lightbox='mygallery'data-title='".$r['g_desc']."'><img src=\"".$r['g_immagine']."\" alt='foto gallery dell ultima gara'></a><span class='gale'>".$r['g_desc']."</span><br/>
                <a class='changefoto' href='Modificafoto.php?id=".$r['g_id']."'>Modifica</a>
                <a class='changefoto' href='adminfoto.php?deleteid=".$r['g_id']."'>Elimina</a>
                </div>";
        }
    }
}

function modificafoto(){
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    } 

//$squadra= "SELECT squadra WHERE s_id=".$id ;
    $squadra="SELECT * FROM gallery WHERE g_id=".$id;
    $user=selectPiloti_squadre($squadra);

    if(isset($_POST['submit'])){
        $descr=htmlspecialchars($_POST['foto_descrizione'],ENT_QUOTES);
        $immagine=$_POST['gallery_immagine'];
            
        $query="UPDATE gallery SET g_desc=('$descr'),g_immagine=('$immagine') WHERE g_id='$id'";


        $update=updatePiloti_squadre($query);
        if($update != 0){
            echo"<div class='message'>Modifica avvenuta con successo!</div>";
        }
        else{
            echo "<div class='messageerror'>Errore, modifica non avvenuta, riprovare</div>";
        }
    }
      

    if(isset($_POST['submit'])){
        echo "<div class='body-content'>
            <div>
                <img src='$immagine' class='modificafotogall' alt='foto della corsa'>
            </div>
            <div class='module'>
                <form  method='post' action='#' onsubmit='return validateModificaFoto()'>
                    <label for='percorso'><div class='pbol'>*Percorso immagine:</label>
                    <input type='text' name='gallery_immagine' id='percorso' value='$immagine'><br>
                    <label for='descrizione'><div class='pbol'>*Descrizione immagine:</div></label>
                    <textarea rows='10' cols='50' id='descrizione' name='foto_descrizione'>$descr</textarea><br> 
                    <button type='submit' name='submit' class='submit btn btn-blockadmin btn-primary'>Modifica</button>    
                </form>

               <div class='li'> <a href='adminfoto.php' class='ilink'>Foto</a></div>
            </div>
        </div>";
    }
    else{
       echo "<div class='body-content-foto'>
        <div><img src=".$user[0]['g_immagine']." class='modificafotogall' alt='foto della corsa'>
        </div>
            <div class='module'>
        <form  method='post'>
            <label for='percorso'><div class='pbol'>*Percorso immagine:</span></label>
            <input type='text' name='gallery_immagine' value=".$user[0]['g_immagine']."><br>
            <label for='descrizione'><div class='pbol'>*Descrizione immagine:</span></label>
            <textarea rows='10' cols='50' name='foto_descrizione' id='descrizione' >".$user[0]['g_desc']."</textarea><br> 
            <button type='submit' name='submit' class='submit btn btn-blockadmin btn-primary'>Modifica</button>    
            </form>

             <div class='li'> <a href='adminfoto.php' class='ilink'>Foto</a></div>
        </div>
        </div>"; 
    }
}


function insertfoto(){
    if(isset($_POST['submit'])){
        $descr=htmlspecialchars($_POST['gallery_description'],ENT_QUOTES);
        $path=$_POST['foto_path'];

        $query= "INSERT INTO gallery (g_desc,g_immagine) VALUES('$descr','$path');";
        $insertion=insertPiloti_squadre($query);

        if($insertion != 0){
             echo "<div class='message'>Immagine inserita con successo!</div>";
        }
        else{  
            echo "<div class='messageerror'>Errore nell'inserimento dell'immagine</div>";
        }
    }
}

?>

