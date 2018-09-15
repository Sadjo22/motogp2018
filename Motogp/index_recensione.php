<?php

 require_once'config.php';

function deleterec(){
    if(isset($_GET['deleteidrec'])){
        $idrec=$_GET['deleteidrec'];

        $delete="DELETE FROM recensioni  WHERE  r_id='$idrec'";
        $deleteUser=updatePiloti_squadre($delete);

        if($deleteUser !=0){
            echo "<div class='messagedelete'>Eliminazione avvenuta con successo!</div>";
        }
        else{
            echo "<div class='messagedelte'>Errore nell'eliminazione', riprovare</div>";
        }
    } 
}


function recensioneadmin(){
    $sql="SELECT utente,recensione,r_id FROM recensioni order by r_id desc";
    $conn=apri_con();
    $result = $conn->query($sql);
    foreach($result as $r) {
        echo "<div class='user'>".$r['utente'].":</div>";
        echo "<div><a class='delrec' href='adminrecensioni.php?deleteidrec=".$r['r_id']."'>Elimina</a></div>"; 
        echo "<div class='recensione'>" .$r['recensione']."</div>";    
    }
}


?>