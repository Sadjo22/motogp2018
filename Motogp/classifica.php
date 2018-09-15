<!DOCTYPE html>
<?php 
	require_once'config.php'; 
	require_once'header.php';
	require_once'footer.php';
?>
<html lang="it">
<head>
	<?php
		head();
		titolo(1);
	?>
</head>
<body>
	<button onclick="topFunction()" id="myBtn" title="Go to top">
		<img id="tornaSu" src='frecciasu.png' alt="bottone per tornare in cima alla pagina" />
	</button>
<div class="container">
	<div id="header">
			<?php 
				menuclassifica(); 
				
			?>
  	</div>
  	 <div class="insertlogo">
        <img  class="logohomeadmin" src="logo.png" alt='Logo della MotoGP'/>
    </div>
    <div class="p">
        <table class="pcg" summary="Tabella che mostra la posizione generale nel campionato, il team di appartenenza, la nazionalità e il punteggio di ogni pilota durante l'arco della stagione"> 
    		<caption id="tab1title">Classifica Generale Piloti</caption>
	
			
			<thead>
		    	<tr>
				    <th scope="col" class="pos"><abbr title="Posizione">Pos.</abbr></th>
					<th scope="col" class="pil">Pilota</th>
					<th scope="col" class="squadra"><span lang="en">Team</span></th>
					<th scope="col" class="naz">Nazione</th>
					<th scope="col" class="punt">Punteggio</th>
				</tr>
			</thead>
			<tbody>
			    <?php 
			    classifica_piloti(); 
			    ?>
			</tbody>
			<tfoot>
		    	<tr>
				    <th scope="col" class="pos"><abbr title="Posizione">Pos.</abbr></th>
					<th scope="col" class="pil">Pilota</th>
					<th scope="col" class="squadra"><span lang="en">Team</span></th>
					<th scope="col" class="naz">Nazione</th>
					<th scope="col" class="punt">Punteggio</th>
				</tr>
			</tfoot>
	    </table>
    </div>
 
	<div class="p">
		<table class="pcg" summary="Tabella che mostra la posizione generale nel campionato, la nazione di appartenenza e il punteggio di un team accumulato durante l'arco della stagione">
		    <caption id="tab2title">Classifica Generale Costruttori</caption>
		    
			<thead>
				<tr>
					<th scope="col" class="pos"><abbr title="Posizione">Pos.</abbr></th>
					<th scope="col" class="squadra">Team</th>
					<th scope="col" class="naz">Nazione</th>
					<th scope="col" class="punt">Punteggio</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					classifica_team(); 
				?>
			</tbody>
			<tfoot>
				<tr>
					<th scope="col" class="pos"><abbr title="Posizione">Pos.</abbr></th>
					<th scope="col" class="squadra"><span lang="en">Team</span></th>
					<th scope="col" class="naz">Nazione</th>
					<th scope="col" class="punt">Punteggio</th>
				</tr>
			</tfoot>
        </table>
    </div>
    	<div id="push"></div>
</div>
    <div id="footer"><?php Footer(); ?></div>
</body>
</html>