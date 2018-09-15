
function validatelogin(){       

    var user = document.getElementById("username");
    var pass = document.getElementById("Password");

     if((!user.value.match(/[A-Za-z|è|é|à|ò|]+/)) && (!pass.value.match(/[A-Za-z|è|é|à|ò|]+/))){
            alert("*Inserire Username e Password ");
            return false;
     }

    if(!user.value.match(/[A-Za-z|è|é|à|ò|]+/) ){
            alert("*Inserire Username ");
            return false;
    }
    if(!pass.value.match(/[A-Za-z|è|é|à|ò|]+/) ){
            alert("*Inserire Password ");
            return false;
    }


    if(user.value.length<1 || user.value.length>10){
        alert("*Il Username deve contenere al piu 10 caratteri.");
        return false;
    }

   
     if(pass.value.length<1 || pass.value.length>8){
        alert("*La password deve contenere al piu 8 caratteri.");
        return false;
    }
    
    return true;

}

function validateModificaTeam(){
    var inf = document.getElementById("info");
    var name = document.getElementById("nome");
    var ima = document.getElementById("immagine");

    if(!inf.value.match(/[A-Za-z]+/)){
        alert("*Inserire informazioni del team");
        return false;
    }

    if(!name.value.match(/[A-Za-z|è|é|à|ò|]+/)){
        alert("*Nome inserito non valido");
        return false;
    }

    if(!ima.value.match(/[A-Za-z]+/)){
        alert("*Percorso immagine inserito non valido");
        return false;
    }
    
    return true;    
}

        
function validateInserirePilota(){
    var id = document.getElementById("pilota_id");
    var nome = document.getElementById("pilota_nome");
    var cognome = document.getElementById("pilota_cognome");
    var nazione = document.getElementById("pilota_nazione");
    var eta = document.getElementById("pilota_eta");
   // var pilota_team = document.getElementById("pilota_team");
    var pilota_punt = document.getElementById("pilota_punteggio");
    var ultima_gara = document.getElementById("pilota_ultima_gara");
    var pilota_im = document.getElementById("pilota_immagine");

    var numero=parseInt(id.value);
    var eta_p=parseInt(eta.value);
    var punteggio=parseInt(pilota_punt.value);
    var posizione=parseInt(ultima_gara.value);

     if(isNaN(numero) || numero > 99 || numero <1){
        alert("*Pilota Id non valido,deve essere compreso tra 1 e 99");
        return false;
    }
    
    if(!nome.value.match(/[A-Za-z]+/)){
        alert("*Nome inserito non valido,deve essere composto solo da lettere");
        return false;
    }

    if(!cognome.value.match(/[A-Za-z]+/)){
        alert("*Cognome inserito non valido,deve essere composto solo da lettere");
        return false;
    }        

    if(isNaN(eta_p) || eta_p > 60 || eta_p <16){
        alert("*Eta inserito non valido,deve essere compreso tra 16 e 60");
        return false;
    }

     if(!nazione.value.match(/[A-Za-z]+/)){
        alert("*Nazione inserita non valida");
        return false;
    }
   
    if(isNaN(punteggio) || punteggio > 200|| punteggio<0){
        alert("*Punteggio inserito non valido,deve essere compreso tra 0 e 200");
        return false;
    }

    if(isNaN(posizione) || posizione > 30  || posizione <1){
        alert("Posizione inserita non valida, deve essere compresa tra 1 e 30");
        return false;
    }

    if(!pilota_im.value.match(/[A-Za-z]+/)){
        alert("Percorso_immagine inserito non valido");
        return false;
    }

    return true;

}

function validateInserireTeam(){
    var nome = document.getElementById("s_nome");
    var nazione = document.getElementById("s_nazione");
    var immagine = document.getElementById("s_immagine");
    var info = document.getElementById("s_info");

    if(!nome.value.match(/[A-Za-z|è|é|à|ò]+/)){
        alert("Inserire il nome del circuito");
        return false;
    }

    if(!nazione.value.match(/[A-Za-z|è|é|à|ò]+/)){
        alert("Nazione inserita non valida");
        return false;
    }

    if(!immagine.value.match(/[A-Za-z|è|é|à|ò]+/)){
        alert("Percorso_immagine inserito non valido");
        return false;
    }

    if(!info.value.match(/[A-Za-z|è|é|à|ò]+/)){
        alert("Inserire informazioni");
        return false;
    }

    return true;

}

function validateModificaFoto(){
    var descrizioneF = document.getElementById("descrizione");  
    var percorsoF = document.getElementById("percorso");

    if(!descrizioneF.value.match(/[A-Za-z|è|é|à|ò|\|.|]+/)){
        alert("Inserire una descrizione");
        return false;
    }

    if(!percorsoF.value.match(/[A-Za-z|è|é|à|ò]+/)){
        alert("Percorso inserito non valido");
        return false;
    }

    return true    
}

function validateInsertSponsor(){
    var percorso=document.getElementById("per_im");
    var alt=document.getElementById("descr_im");

     if(!percorso.value.match(/[A-Za-z|è|é|à|ò]+/)){
        alert("*Percorso inserito non valido");
        return false;
    }

     if(!alt.value.match(/[A-Za-z|è|é|à|ò]+/)){
        alert("*Descrizione imagine inserita non valida");
        return false;
    }
    return true;
}


function validateModificaSponsor(){

    var alt=document.getElementById("descr_ima");

    if(!alt.value.match(/[A-Za-z|è|é|à|ò]+/)){
        alert("*Descrizione imagine inserita non valida");
        return false;
    }
    return true;
}

function validateModificaCircuito(){

    var giorno = document.getElementById("c_giorno");
    var mese = document.getElementById("c_mese");
    var anno = document.getElementById("c_anno");
    var nome = document.getElementById("c_nome");
    var luogo = document.getElementById("c_luogo");
    var immagine = document.getElementById("c_immagine");
    var lunghezza = document.getElementById("c_lunghezza");
    var record = document.getElementById("c_record");
    var detentore = document.getElementById("c_detentore");

    var g = parseInt(giorno.value);
    var a= parseInt(anno.value);
    var l= parseInt(lunghezza.value);
    var r=parseInt(record.value);

    if(isNan(g) || g > 31 || g <1){
        alert("Giorno inserito non valido");
        return false;
    }
    
    if(!mese.value.match(/[A-Za-z]+/)){
        alert("Mese inserito non valido");
        return false;
    }
    
    if(isNAN(a) || a<2018){
        return false;
    }
    
    if(!nome.value.match(/[A-Za-z]+/)){
        alert("nome inserito non valido");
        return false;
    }
    
    if(!luogo.value.match(/[A-Za-z]+/)){
        alert("Luogo inserito non valido");
        return false;
    }

    if(!immagine.value.match(/[A-Za-z]+/)){
        alert("Luogo inserito non valido");
        return false;
    }

     if(isNan(l)){
        alert("Lunghezza inserito non valido");
        return false;
    }

     if(isNan(r)){
        alert("Giro_record inserito non valido");
        return false;
    }

    if(!detentore.value.match(/[A-Za-z]+/)){
        alert("Detentore inserito non valido");
        return false;
    }

    return true;
}

function validateInserireCalendario(){
    var giorno = document.getElementById("c_giorno");
    var mes = document.getElementById("c_mese");
    var anno = document.getElementById("c_anno");
    var nome = document.getElementById("c_nome");
    var luogo = document.getElementById("c_luogo");
    var immagine = document.getElementById("c_imma");
    var lunghezza = document.getElementById("c_lunghezza");
    var record = document.getElementById("c_record");
    var detentore = document.getElementById("c_detentore");
    var descrizione = document.getElementById("c_descrizione");

    var g = parseInt(giorno.value);
    var a= parseInt(anno.value);
    var l= parseInt(lunghezza.value);
    var r=parseInt(record.value);
    var m=parseInt(mes.value);
    var d=parseInt(detentore.value);

    if(isNaN(g)){
        alert("*Inserire il giorno della gara");
        return false;
    }

     if(g > 31 || g <1){
        alert("*Giorno inserito non valido,deve essere un numero compreso tra 1 e 31");
        return false;
    }

    if (isNaN(m)) {
         alert("*Inserire il mese della gara");
         return false;
    }

    if( m<1 || m>12){
        alert("*Mese inserito non valido,deve essere un numero compreso tra 1 e 12");
        return false;
    }

    if(isNaN(a) ){
         alert("*Inserire l'anno della gara");
         return false;
    }

    if(a<2018){
        alert("*Anno inserito non valido,deve essere maggiore dell'anno corrente");
        return false;
    }


     if(!nome.value.match(/[A-Za-z]+/)){
        alert("*Nome inserito non valido,deve essere composto solo di caratteri ");
        return false;
    }

    if(!immagine.value.match(/[A-Za-z]+/)){
        alert("*Percorso_immagine inserito non valido");
        return false;
    }


    if(!luogo.value.match(/[A-Za-z]+/)){
        alert("*Luogo inserito non valido,deve essere composto solo di caratteri");
        return false;
    }

     if(isNaN(l)){
        alert("*Inserire la lunghezza del circuito");
        return false;
    }

    if(l<3000){
        alert("*La lunghezza del circuito deve essere maggiore di 2999")
    }
    
    if(isNaN(r)){
        alert("*Inserire un Giro_record valido");
        return false;
    }


    if(d<1 || d>99){
        alert("*Detentore inserito non valido,deve essere un numero compreso tra 1 e 99");
        return false;
    }

    if(!descrizione.value.match(/[A-Za-z]+/)){
        alert("*Descrizione inserita non valida");
        return false;
    }
    
   
    return true;
}

function validateInserireFoto(){
    var descrizioneF = document.getElementById("descrizione");  
    var percorsoF = document.getElementById("percorso");

    if(!descrizioneF.value.match(/[A-Za-z|è|é|à|ò|\|.|]+/)){
        alert("Inserire una descrizione");
        return false;
    }

    if(!percorsoF.value.match(/[A-Za-z|è|é|à|ò]+/)){
        alert("Percorso inserito non valido");
        return false;
    }

    return true;
}

function validateModificaFotoPilota(){
    var teamID = document.getElementById("teamID");  
    var punteggio_pilota = document.getElementById("punteggio_pilota");
    var posizione_ult_gara = document.getElementById("posizione_ult_gara");
    var percorso_immagine = document.getElementById("percorso_immagine");

    var teamID = parseInt(teamID.value);
    var punteggio_pilota = parseInt(punteggio_pilota.value);
    var posizione = parseInt(posizione_ult_gara.value);

    if(isNaN(teamID)||(teamID<0)||(teamID>99)){
        alert("Team_Id  inserito non valido");
        return false;
    }

    if(isNaN(punteggio_pilota) ||punteggio_pilota>25 || punteggio_pilota<0){
        alert("Punteggio inserito non valido");
        return false;
    }

    if(isNaN(posizione) ||posizione>99 || posizione<1){
        alert(" la posizione del pilota nell ultima gara non è valida");
        return false;
    }

    if(!percorso_immagine.value.match(/[A-Za-z]+/)){
        alert("percorso immagine inserito non valido");
        return false;
    }
    return true;
    
}

function validateModificaFoto(){
    var descrizioneF = document.getElementById("descrizione"); 
    var percorsoImmagine = document.getElementById("immagine"); 
     if (!descrizioneF.value.match(/[A-Za-z]+/)){
        alert("Inserire una descrizione della foto");
        return false;
    } 

    if (!percorsoImmagine.value.match(/[A-Za-z]+/)){
        alert("Inserire un percorso valido");
        return false;
    } 

    return true;
}

function validateRegister(){

    var user = document.getElementById("username");
    var emailID = document.getElementById("Email");
    var pass = document.getElementById("Password");
    var confpass = document.getElementById("Conferma_Password");
    // utente puo comportare lettere numeri e segni: (_,.,-).
    if (!user.value.match(/[A-Za-z0-9|.|_|-]+$/)){
        alert("*Username inserito non valido");
        return false;
    } 

    if(user.value.length<1 || user.value.length>10){
        alert("*Il Username deve avere al piu 10 caratteri.");
        return false;
    }
   
    if (emailID.value.indexOf("@", 0) < 0)                
    {
        alert("*Inserire un Email valido.Esempio:(a@sample.it)");
        return false;
    }
  
    if (emailID.value.indexOf(".", 0) < 0)                
    {
        alert("Inserire un Email valido,Esempio:(a@sample.it).");
        return false;
    }

     if(pass.value.length<1 || pass.value.length>8){
        alert("*La Password deve avere al piu 8 caratteri.");
        return false;
    }

    if (!pass.value.match(/[A-Za-z]+/)){
        alert("*Inserire una Password coretta");
        return false;
    }

     
   
    if(!confpass.value.match(/[A-Za-z]+/)){
        alert("*Confermare la password");
        return false;
    } 

    if(pass1.value.match(/[A-Za-z]+/)!= confpass.value.match(/[A-Za-z]+/)){
        alert("*Le due Password non combacciono.");
        return false;
    }
    
    return true;  
}


function validateDatiPersonali(){

    var vpass=getElementById("vpass");
    var npass=getElementById("npass");
    var conpass=getElementById("cnpass");


     if(!vpass.value.match(/[A-Za-z]+/)){
        alert("Inserire la vecchia password");
        return false;
    } 

    if(!npass.value.match(/[A-Za-z]+/)){
        alert("Inserire la nuova password");
        return false;
    } 

     if(!conpass.value.match(/[A-Za-z]+/)){
        alert("Confermare la nuova password");
        return false;
    } 

    if(npass.value.match(/[A-Za-z]+/) != conpass.value.match(/[A-Za-z]+/)){
        alert("Le password inserite non combaciano password");
        return false;
    }

    return true;
}


function validateModificaDatiPilota(){
    var eta = document.getElementById("p_eta");  
    var punteggio = document.getElementById("p_punteggio");  
    var posizione = document.getElementById("p_posizione");  
    var immagine = document.getElementById("p_immagine");  
    var eta_p=parseInt(eta.value);
    var punteggio=parseInt(punteggio.value);
    var pos=parseInt(posizione.value);
       

    if(isNaN(eta_p) || eta_p > 60 || eta_p <16){
        alert("*Eta inserito non valido,deve essere compreso tra 16 e 60");
        return false;
    }
  
    if(isNaN(punteggio) || punteggio > 200 || punteggio<0){
        alert("*Punteggio inserito non valido,deve essere compreso tra 0 e 200");
        return false;
    }

    if(isNaN(pos) || pos > 30  || pos <1){
        alert("*Posizione all' ultima gara inserita non valida,deve essere compresa tra 1 e 30");
        return false;
    }

    if(!immagine.value.match(/[A-Za-z|è|é|à|ò|]+/)){
        alert("*Percorso_immagine inserito non valido");
        return false;
    }

    return true;
  
}



function validatedatipers(){
    var pswd = document.getElementById("asd");  
    var surname = document.getElementById("vpsd");
    var kname = document.getElementById("yname");
    if(!pswd.value.match(/[A-Za-z]+/)){
        alert("*Inserire una password valida");
        return false;
    } 

     if(!surname.value.match(/[A-Za-z|è|é|à|ò|]+/)){
        alert("*Inserire una nuova password valida");
        return false;
    }

     if(!kname.value.match(/[A-Za-z|è|é|à|ò|]+/)){
        alert("*Inserire una nuova password valida");
        return false;
    }
    return true;

}



function Modificadati(){
    var nom = document.getElementById("fname");
    var pre = document.getElementById("lname");
    
    if(!nom.value.match(/[A-Za-z]+/)){
        alert("*Inserire un nome");
        return false;
    }  

    if(!pre.value.match(/[A-Za-z]+/)){
        alert("*Inserire un cognome");
        return false;
    }  
    return true;
}

function validateModificaCalendario(){
    var giorno = document.getElementById("c_giorno");
    var mes = document.getElementById("c_mese");
    var anno = document.getElementById("c_anno");
    var nome = document.getElementById("c_nome");
    var luogo = document.getElementById("c_luogo");
    var immagine = document.getElementById("c_imma");
    var lunghezza = document.getElementById("c_lunghezza");
    var record = document.getElementById("c_record");
    var detentore = document.getElementById("c_detentore");
    var descrizione = document.getElementById("c_descrizione");

    var g = parseInt(giorno.value);
    var a= parseInt(anno.value);
    var l= parseInt(lunghezza.value);
    var r=parseInt(record.value);
    var m=parseInt(mes.value);
    var d=parseInt(detentore.value);

    if(isNaN(g)){
        alert("*Inserire il giorno della gara");
        return false;
    }

     if(g > 31 || g <1){
        alert("*Giorno inserito non valido,deve essere un numero compreso tra 1 e 31");
        return false;
    }

    if (isNaN(m)) {
         alert("*Inserire il mese della gara");
         return false;
    }

    if( m<1 || m>12){
        alert("*Mese inserito non valido,deve essere un numero compreso tra 1 e 12");
        return false;
    }

    if(isNaN(a) ){
         alert("*Inserire l'anno della gara");
         return false;
    }

    if(a<2018){
        alert("*Anno inserito non valido,deve essere maggiore dell'anno corrente");
        return false;
    }


     if(!nome.value.match(/[A-Za-z]+/)){
        alert("*Nome inserito non valido,deve essere composto solo di caratteri ");
        return false;
    }

    if(!immagine.value.match(/[A-Za-z]+/)){
        alert("*Percorso_immagine inserito non valido");
        return false;
    }


    if(!luogo.value.match(/[A-Za-z]+/)){
        alert("*Luogo inserito non valido,deve essere composto solo di caratteri");
        return false;
    }

     if(isNaN(l)){
        alert("*Inserire la lunghezza del circuito");
        return false;
    }

    if(l<3000){
        alert("*La lunghezza del circuito deve essere maggiore di 2999")
    }
    
    if(isNaN(r)){
        alert("*Inserire un Giro_record valido");
        return false;
    }


    if(d<1 || d>99){
        alert("*Detentore inserito non valido,deve essere un numero compreso tra 1 e 99");
        return false;
    }

    if(!descrizione.value.match(/[A-Za-z]+/)){
        alert("*Descrizione inserita non valida");
        return false;
    }
    
   
    return true;


}




function  validaterecensioni(){
   var re = document.getElementById("recen");  
    
     if(!re.value.match(/[A-Za-z]+/)){
        alert("*Inserire una recensione  ");
        return false;
    }  
    return true; 
}




function  validaterecensioniadmin(){
   var r = document.getElementById("rec");  
    
     if(!r.value.match(/[A-Za-z]+/)){
        alert("*Inserire una recensione  ");
        return false;
    }  
    return true; 
}