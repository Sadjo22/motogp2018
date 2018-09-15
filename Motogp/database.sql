-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 02, 2018 alle 13:34
-- Versione del server: 10.1.33-MariaDB
-- Versione PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motogp`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `circuito`
--

CREATE TABLE `circuito` (
  `c_id` int(11) NOT NULL,
  `c_nome` varchar(255) NOT NULL,
  `c_descr` varchar(1000) NOT NULL,
  `c_immagine` varchar(255) NOT NULL,
  `luogo` varchar(255) NOT NULL,
  `lunghezza_m` int(4) NOT NULL,
  `giro_record` varchar(255) NOT NULL,
  `detentore_record` varchar(2) NOT NULL,
  `giorno` int(2) NOT NULL,
  `mese` int(2) NOT NULL,
  `anno` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `circuito`
--

INSERT INTO `circuito` (`c_id`, `c_nome`, `c_descr`, `c_immagine`, `luogo`, `lunghezza_m`, `giro_record`, `detentore_record`, `giorno`, `mese`, `anno`) VALUES
(1, 'Sepang International Circuit', 'Dal 2007 è tappa di apertura del Motomondiale e dal 2008 si corre in notturna, grazie a un potente impianto di illuminazione. Conta 16 curve raccordate da brevi tratti rettilinei e un lungo rettilineo di circa 1 km, al termine del quale c’è una delle staccate più impegnative di tutto il Motomondiale.', '/Motogp/img_calendario/id1.png', 'Doha(Qatar)', 5400, '1&#039;54&quot;932', '99', 18, 3, 2018),
(2, 'Autodroma Termas de Rio Hondo', 'Dal 2014 il Motomondiale fa tappa all’Autodromo argentino Termas de Rio Hondo. Il tracciato è stato modificato nel 2012 riducendo di qualche centinaio di metri il rettilineo principale, che, comunque, con i suoi 1.076 metri resta uno dei più lunghi del mondiale. Nei lavori del 2012 sono state aggiunte anche tre curve (ora  sono quattordici), modificando così il raggio delle altre allo scopo di adattarle meglio alle caratteristiche delle attuali MotoGP e di favorire sorpassi e spettacolo.', '/Motogp/img_calendario/id2.png', 'Termas de Rio Hondo(Argentina)', 4800, '1&#039;38&quot;019', '46', 8, 4, 2018),
(3, 'Circuit of the Americas', 'Fa parte del Motomondiale dal 2013 e si tratta di uno dei circuiti più lunghi  e tortuosi (20 curve, 9 a destra e 11 a sinistra). Il circuito è stato il primo ad essere costruito appositamente per il Motomondiale negli Stati Uniti, vi si gira in senso antiorario ed è uno dei più completi e moderni del Motomondiale e può ospitare fino a 120.000 spettatori.', '/Motogp/img_calendario/id3.png', 'Austin(Texas)', 5500, '203&quot;575', '93', 22, 4, 2018),
(4, 'Circuito de Jerez', 'Costruito nel 1985, ha subito numerose modifiche fino ad arrivare all’attuale configurazione; è uno dei circuiti più  brevi ma  è anche uno dei più lenti dell’intero motomondiale con 13 curve e due brevi rettilinei. ', '/Motogp/img_calendario/id4.png', 'Jerez de la Frontera(Spagna)', 4400, '1&#039;38&quot;735', '99', 6, 5, 2018),
(5, ' Circuit des &quot;24 Heures du Mans”', 'È stato inserito nel calendario del Motomondiale per la prima volta nel 1969. Il tracciato, dopo il grave incidente di cui fu vittima il pilota spagnolo Albert Puig, è stato escluso dal calendario dal 1995 fino al 2000. Dello storico tracciato attualmente viene utilizzato solo il breve rettilineo dei box (450 m). Negli anni,  il circuito ha subito vari adattamenti e modifiche per migliorarne la sicurezza. Dopo gli interventi più recenti (effettuati nel 2008), ha 11 curve e percorrenza in senso orario. La pista è particolarmente stretta, le curve obbligano i piloti a fare brusche frenate e spesso le condizioni meteorologiche condizionano la gara.', '/Motogp/img_calendario/id5.png', 'Le Mans(Francia)', 4200, '1&#039;31&quot;975', '99', 20, 5, 2018),
(6, 'Autodromo del Mugello', 'Il circuito del Mugello, inaugurato nel 1974 è la sede storica del Gran Premio d&#039;Italia ed è uno dei più spettacolari della MotoGP. Conta quindici curve e il rettilineo più lungo del Motomondiale che permette alle MotoGP di raggiungere i 350 km/h. Il circuito difficile, molto tecnico e velocissimo, esalta le qualità del pilota, ma anche quelle del mezzo: serve tanto motore nel lunghissimo rettilineo e nei tratti in salita, ma anche la ciclistica deve essere perfettamente a punto per la varietà di curve da affrontare.', '/Motogp/img_calendario/id6.png', 'Firenze(Italia)', 5200, '1&#039;47&quot;639', '93', 3, 6, 2018),
(7, 'Circuit de Barcelona Catalunya', 'Il Gran Premio di Catalunya si corre sul circuito del Montmelò. Consta di 13 curve e un rettilineo, quello dei box, lungo 1.047 m. Presente nel calendario del Motomondiale dal 1996, ha ospitato alcune delle gare più spettacolari della MotoGP, una su tutte quella del 2009 con il duello fino all&#039;ultima curva tra Valentino Rossi e Jorge Lorenzo (vinto poi dal Dottore). Il tracciato è molto tecnico e caratterizzato da brusche frenate. Questo circuito è considerato uno dei migliori tracciati dell&#039;ultima generazione e ha ricevuto nel 2001 il premio, attribuito dall&#039;IRTA, come miglior GP dell&#039;anno. ', '/Motogp/img_calendario/id7.png', 'Barcellona(Spagna)', 4700, '1&#039;42&quot;182', '93', 17, 6, 2018),
(8, 'TT Circuit Assen', 'Assen è l’unico circuito ad essere stato sempre presente nel calendario sin dalla nascita del Motomondiale (nel 1949). Per tradizione si è sempre disputato nell’ultimo sabato di giugno, ma dal 2016 il Gran Premio olandese si uniforma a tutti gli altri andando in scena domenica (sempre l’ultima del mese di giugno). Il tracciato è stretto, con rapidi cambi di direzione: troviamo 18 curve in tutto, di cui solo tre abbastanza lente, raccordate da brevi rettilinei, il più lungo dei quali è poco meno di 500 metri. Il tracciato è molto “guidato” e non presenta brusche frenate. L’ultima sostanziale modifica è stata fatta nel 2005, con la riduzione della lunghezza dagli oltre 6.000 m originari agli attuali 4.555 m, modifiche che però non sono piaciute a piloti e appassionati che ancora rimpiangono le difficoltà del precedente tracciato (non a caso soprannominato l’università delle due ruote). ', '/Motogp/img_calendario/id8.png', 'Assen(Olanda)', 4500, '1&#039;33&quot;617', '93', 1, 7, 2018),
(9, 'Sachsenring', 'Il circuito del Sachsenring è il tracciato più corto dell&#039;intero Motomondiale. La pista è stata inaugurata nel marzo del 1996, ma nel corso degli anni ha subito numerose modifiche, per migliorarne la sicurezza, le ultime risalgono al 2011. Il Sachsenring ha 14 curve ed è uno dei circuiti più lenti del Motomondiale. Molto veloce invece il rettilineo del traguardo, lungo 700 metri, ma in discesa.', '/Motogp/img_calendario/id9.png', 'Chemnitz(Germania)', 3700, '1&#039;54&quot;932', '93', 15, 7, 2018),
(10, 'Automotodrom Brno', 'Il circuito di Brno, è la sede storica del Gran Premio Motociclistico della Repubblica Ceca e ospita il GP dal 1965. Consta di quattordici curve, raccordate da brevi rettilinei (il più lungo è di soli 636 m). Lungo e assai “mosso”, Brno  è un tracciato impegnativo per piloti e mezzi, caratterizzato da ampi curvoni e pochi rettilinei.', '/Motogp/img_calendario/id10.png', 'Brno(Repubblica Ceca)', 5400, '1&#039;54&quot;596', '93', 5, 8, 2018),
(11, 'Red Bull Ring', 'Dopo 19 anni di assenza, il circus del Motomondiale ritorna nel 2016 in Austria, sul Red Bull Ring. Il circuito è stato oggetto di varie modifiche dal 1996 ad oggi. Chiuso alla fine della stagione 2004, dopo alterne vicende è stato rilevato dalla Red Bull che, investendo circa 70 milioni di dollari, lo ha completamente ristrutturato per riaprirlo poi nel 2011. Il circuito presenta 8 curve, alcune cieche e altre adatte ai sorpassi e diversi saliscendi che lo rendono parecchio spettacolare. \r\n', '/Motogp/img_calendario/id11.png', 'Spielberg(Austria)', 4300, '1&#039;24&quot;312', '5', 12, 8, 2018),
(12, 'Silverstone', 'Il primo Gran Premio motociclistico di Silverstone si è tenuto nel 1977, ed è stato anche il primo ad essere disputato sul continente britannico. Prima del 1977, il round britannico del Campionato del Mondo si teneva dal 1949 sul circuito TT dell\'Isola di Man. Dal 1988 al 2009 le corse del campionato del mondo si trasferirono a Donington Park, ma tornarono a Silverstone nel 2010 dopo 23 anni di pausa.', '/Motogp/img_calendario/id12.png', 'Silverstone(Inghilterra)', 5891, '2\'01\"941', '26', 26, 8, 2018),
(13, 'Misano World Circuit Marco Simoncelli', 'Il Circuito di Misano Adriatico è stato inaugurato nel 1972 e fino al 1993 ha ospitato i GP d’Italia, alternandosi con i circuiti di Monza, Imola e Mugello, mentre dal 1985 al 1987 è stato valevole come GP di San Marino. Da allora il Motomondiale non ha più fatto tappa in Romagna, per rivederlo è stato necessario aspettare il 2007: grazie a importanti lavori che hanno cambiato il senso di marcia (da antiorario a orario), allungato il tracciato e allargato la sede stradale (misura adesso 14 metri). Il tracciato è caratterizzato da quindici curve e tre brevi rettilinei, il più lungo dei quali non raggiunge i 600 m. Nel 2012 il tracciato è stato intitolato all’indimenticato Marco Simoncelli. ', '/Motogp/img_calendario/id13.png', 'Misano Adriatico(Italia)', 4226, '1&#039;33&quot;273', '99', 9, 9, 2018),
(14, 'Motor Land Aragon', 'Il Motorland Aragón è stato inaugurato nel 2010 ed è l’ultimo arrivato dei quattro tracciati spagnoli che fanno parte Motomondiale (gli altri sono Jerez, Barcellona e Valencia). Presenta 17 curve e un rettilineo di poco più di 900 metri. ', '/Motogp/img_calendario/id14.png', 'Teruel(Spagna)', 5100, '1&#039;48&#039;565', '26', 23, 9, 2018),
(15, 'Chang International Circuit', 'Entra a far parte del calendario MotoGp nel 2018, la pista internazionale di Buriram è in Thailandia a 410 km dalla capitale Bangkok. Costruito nel 2014 e progettato da Hermann Tilke, è il primo circuito tailandese ad aver ottenuto le licenze FIA Grado 1 e FIM Grado A che lo rendono idoneo per l’organizzazione di competizioni motociclistiche ed automobilistiche di rilevanza Internazionale. Qui dal 2015 si disputa una prova del mondiale Superbike, che è stata la prima competizione iridata a disputarsi su questo tracciato.', '/Motogp/img_calendario/id15.png', 'Buriram(Thailandia)', 4554, '', '', 7, 10, 2018),
(16, 'Twin Ring Motegi', 'Il Twin Ring di Motegi è di proprietà di Honda, nato nel 1997 come pista per i test privati della casa giapponese, ospita dal 1999 il GP del Giappone. Il circuito, abbastanza tortuoso, conta 14 curve, per lo più lente e un rettilineo lungo poco meno di 800 metri e altri più brevi di raccordo. Si tratta di un tracciato impegnativo che mette sotto stress i freni: i dischi hanno poco tempo per raffreddarsi tra una staccata e un&#039;altra.', '/Motogp/img_calendario/id16.png', 'Motegi(Giappone)', 4800, '1&#039;45&quot;350', '99', 21, 10, 2018),
(17, 'Philip Island Gran Prix Circuit', 'Questa è una delle tappe più scenografiche del Motomondiale: la pista si sviluppa su un terreno ondulato e arriva sul ciglio della scogliera offrendo una meravigliosa vista sull&#039;oceano. Il GP d&#039;Australia si svolge qui dal 1997, ed è caratterizzato da un continuo susseguirsi di curve veloci e di ampio raggio (in tutto sono 12), senza staccate particolarmente insidiose. L’unico rettilineo, quello dei box, è piuttosto corto, ma è in discesa e quindi velocissimo.  Le temperature rigide e il meteo incerto condizionano spesso lo svolgimento della gara.', '/Motogp/img_calendario/id17.png', 'Philip Island(Australia)', 4400, '1&#039;28&quot;108', '93', 28, 10, 2018),
(18, 'Sepang International Circuit', 'Tristemente famoso per l’incidente costato la vita a Marco Simoncelli nel 2011, il circuito ospita da sempre il Gran Premio della Malesia. Il tracciato, è il più largo di tutto il Motomondiale (25 metri contro una media di circa 15 metri delle altre piste) e consente ai piloti un&#039;ampia scelta di traiettorie. I due velocissimi rettilinei di 900 metri ciascuno e le 11 curve altrettanto rapide favoriscono i sorpassi, ma ci sono anche quattro curve piuttosto lente, che richiedono alle moto buone doti di maneggevolezza. Da tenere presenti anche le difficoltà ambientali: le elevate temperature e l’alta', '/Motogp/img_calendario/id18.png', 'Sepang(Malesia)', 5500, '1&#039;58&quot;830', '99', 4, 11, 2018),
(19, 'Circuit Comunitat Valenciana Ricardo Tormo', 'Il Gran Premio della Comunitat Valenciana è la gara che chiude tradizionalmente la stagione, si corre sul circuito intitolato al pilota spagnolo Ricardo Tormo, due volte iridato della classe 50 e scomparso nel 1998 per una leucemia. Si percorre in senso antiorario ed è formata da brevi rettilinei e quattordici curve piuttosto lente, che obbligano i piloti a usare le marce basse. Il rettilineo del traguardo è lungo poco meno di 900 m. Valencia è una pista stretta con traiettorie “obbligate”: sorpassare è difficile ed è fondamentale partire bene.\r\n', '/Motogp/img_calendario/id19.png', 'Valencia(Spagna)', 4005, '1&#039;31&quot;367', '99', 18, 11, 2018);

-- --------------------------------------------------------

--
-- Struttura della tabella `gallery`
--

CREATE TABLE `gallery` (
  `g_id` int(11) NOT NULL,
  `g_immagine` text NOT NULL,
  `g_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `gallery`
--

INSERT INTO `gallery` (`g_id`, `g_immagine`, `g_desc`) VALUES
(1, '/Motogp/images/qatar.jpg', 'Bagarre tra Marquez, Rossi e Dovizioso (Qatar)'),
(2, '/Motogp/images/qatar1.jpg', 'Dovizioso festeggia la vittoria con un&#039; impennata (Qatar)    	\r\n  '),
(3, '/Motogp/images/qatar2.jpg', ' Il gruppone di piloti poco dopo la partenza (Qatar)    	\r\n    '),
(4, '/Motogp/images/qatar3.jpg', ' La volata finale tra Marquez e il vincitore Dovizioso (Qatar)    	\r\n    '),
(5, '/Motogp/images/qatar4.jpg', 'Marevick Vinales giù in carena(Qatar)    	\r\n        	\r\n        	\r\n    '),
(6, '/Motogp/images/arg.jpg', ' I piloti alle prese con la prima curva dopo la partenza (Argentina)    	\r\n    '),
(7, '/Motogp/images/arg1.jpg', 'Il sorpasso di Crutchlow, poi vincitore, su Rins, terzo classificato (Argentina)'),
(8, '/Motogp/images/arg2.jpg', 'L&rsquo; incidente tra Marquez e Rossi che ha causato la caduta del 46 (Argentina)'),
(9, '/Motogp/images/arg3.jpg', ' Marquez all&#039; insenguimento dei piloti che lo precedono (Argentina)    	\r\n    '),
(10, '/Motogp/images/arg4.jpg', 'I piloti al via dopo il cambio gomme tranne per Miller, davanti a tutti (Argentina)'),
(11, '/Motogp/images/austin.jpg', '  Marquez(in basso), Vinales(a destra) e Iannone(in alto), rispettivamente primo, secondo e terzo, sul podio (Austin)    	\r\n        	\r\n    '),
(12, '/Motogp/images/austin1.jpg', 'Valentino Rossi all&#039;inseguimento di Andrea Iannone (Austin)\r\n        	\r\n        	\r\n    ');

-- --------------------------------------------------------

--
-- Struttura della tabella `piloti`
--

CREATE TABLE `piloti` (
  `p_id` int(2) NOT NULL,
  `p_nome` varchar(255) NOT NULL,
  `p_cognome` varchar(255) NOT NULL,
  `p_eta` int(2) NOT NULL,
  `p_nazione` varchar(255) NOT NULL,
  `p_team` varchar(255) NOT NULL,
  `p_punteggio` int(3) NOT NULL,
  `ultima_gara` int(2) NOT NULL,
  `p_immagine` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `piloti`
--

INSERT INTO `piloti` (`p_id`, `p_nome`, `p_cognome`, `p_eta`, `p_nazione`, `p_team`, `p_punteggio`, `ultima_gara`, `p_immagine`) VALUES
(4, 'Andrea', 'Dovizioso', 32, 'Italia', 'Ducati', 25, 1, '/Motogp/img_piloti/dov.jpg'),
(5, 'Johann', 'Zarco', 27, 'Francia', 'Monster Yamaha Tech 3', 25, 0, '/Motogp/img_piloti/zar.jpg'),
(9, 'Danilo', 'Petrucci', 27, 'Italia', 'Alma Pramac Racing', 0, 0, '/Motogp/img_piloti/pet.jpg'),
(10, 'Xavier', 'Simeon', 28, 'Belgio', 'Reale Avintia Racing', 0, 0, '/Motogp/img_piloti/sim.jpg'),
(12, 'Thomas', 'Luthi', 31, 'Svizzera', 'EG 0,0 Marc VDS', 0, 0, '/Motogp/img_piloti/lut.jpg'),
(17, 'Karel', 'Abraham', 28, 'Repubblica Ceca', 'Angel Nieto Team', 71, 2, '/Motogp/img_piloti/abr.jpg'),
(19, 'Alvaro', 'Bautista', 33, 'Spagna', 'Angel Nieto Team', 25, 1, '/Motogp/img_piloti/bau.jpg'),
(21, 'Franco', 'Morbidelli', 23, 'Italia', 'EG 0,0 Marc VDS', 0, 0, '/Motogp/img_piloti/mor.jpg'),
(25, 'Maverick', 'Vinales', 23, 'Spagna', 'Movistar Yamaha MotoGP', 25, 1, '/Motogp/img_piloti/vin.jpg'),
(26, 'Dani', 'Pedrosa', 32, 'Spagna', 'Repsol Honda', 25, 1, '/Motogp/img_piloti/ped.jpg'),
(29, 'Andrea', 'Iannone', 28, 'Italia', 'Suzuki', 25, 1, '/Motogp/img_piloti/ian.jpg'),
(30, 'Takaaki', 'Nakagami', 26, 'Giappone', 'LCR Honda', 0, 0, '/Motogp/img_piloti/nak.jpg'),
(35, 'Cal', 'Crutchlow', 32, 'Inghilterra', 'LCR Honda', 33, 0, '/Motogp/img_piloti/crutch.jpg'),
(38, 'Bradley', 'Smith', 27, 'Inghilterra', 'KTM', 25, 1, '/Motogp/img_piloti/smith.jpg'),
(41, 'Aleix', 'Espargaro', 28, 'Spagna', 'Aprilia Racing Team Gresini', 25, 1, '/Motogp/img_piloti/alesp.jpg'),
(42, 'Alex', 'Rins', 22, 'Spagna', 'Suzuki', 25, 1, '/Motogp/img_piloti/rins.jpg'),
(43, 'Jack ', 'Miller', 23, 'Australia', 'Alma Pramac Racing', 33, 0, '/Motogp/img_piloti/mill.jpg'),
(44, 'Pol', 'Espargaro', 27, 'Spagna', 'KTM', 25, 1, '/Motogp/img_piloti/polesp.jpg'),
(45, 'Scott', 'Redding', 25, 'Inghilterra', 'Aprilia Racing Team Gresini', 25, 1, '/Motogp/img_piloti/red.jpg'),
(46, 'Valentino', 'Rossi', 39, 'Italia', 'Movistar Yamaha MotoGP', 25, 1, '/Motogp/img_piloti/ros.jpg'),
(53, 'Tito', 'Rabat', 29, 'Spagna', 'Reale Avintia Racing', 0, 0, '/Motogp/img_piloti/rab.jpg'),
(55, 'Hafizh', 'Syahrin', 24, 'Malesia', 'Monster Yamaha Tech 3', 25, 1, '/Motogp/img_piloti/sya.jpg'),
(93, 'Marc', 'Marquez', 25, 'Spagna', 'Repsol Honda', 25, 1, '/Motogp/img_piloti/mar.jpg'),
(99, 'Jorge', 'Lorenzo', 31, 'Spagna', 'Ducati', 25, 1, '/Motogp/img_piloti/lor.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `recensioni`
--

CREATE TABLE `recensioni` (
  `r_id` int(4) NOT NULL,
  `utente` text NOT NULL,
  `recensione` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `sponsor`
--

CREATE TABLE `sponsor` (
  `sp_id` int(3) NOT NULL,
  `sp_immagine` text NOT NULL,
  `sp_alt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `sponsor`
--

INSERT INTO `sponsor` (`sp_id`, `sp_immagine`, `sp_alt`) VALUES
(1, '/Motogp/img_sponsor/tissot.png', 'Sponsor Tissot'),
(2, '/Motogp/img_sponsor/singhia.png', 'Sponsor Singhia'),
(4, '/Motogp/img_sponsor/dhl.png', 'Sponsor dhl'),
(5, '\\Motogp\\img_sponsor\\car.png', 'Sponsor bmw'),
(6, '\\Motogp\\img_sponsor\\michelin.png', 'Sponsor Michelin');

-- --------------------------------------------------------

--
-- Struttura della tabella `squadra`
--

CREATE TABLE `squadra` (
  `s_id` int(11) NOT NULL,
  `s_nome` varchar(255) NOT NULL,
  `s_info` text NOT NULL,
  `s_nazione` varchar(255) NOT NULL,
  `s_immagine` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `squadra`
--

INSERT INTO `squadra` (`s_id`, `s_nome`, `s_info`, `s_nazione`, `s_immagine`) VALUES
(9, 'Alma Pramac Racing', ' Team satellite della Ducati, Pramac decide di confermare il pilota italiano Danilo Petrucci e piazza il colpo assicurandosi le prestazioni di Jack Miller. Notizia di inizio anno inoltre  lingaggio per il 2019 e 2020 del pilota italiano Pecco Bagnaia che per questanno correr in moto2. ', 'Italia', '/Motogp/img_team/alma.png'),
(5, 'Angel Nieto Team', ' Cambio di nome per il team Aspar di Jorge Martinez, in omaggio al grande rider spagnolo morto ad agosto 2017. I piloti restano però gli stesso dello scorso anno: Karel Abraham e Alvaro Bautista.', 'Spagna', '/Motogp/img_team/aspar.png'),
(7, 'Aprilia Racing Team Gresini', 'Aprilia decide di confermare lo spagnolo Aleix Espargar e di sostituire l&#039;inglese Sam Lowes con la scommessa Scott Redding. ', 'Italia', '/Motogp/img_team/aprilia.png'),
(2, 'Ducati', 'Il team italiano prosegue sull&#039;onda dell&#039;anno passato confermando il pilota italiano Andrea Dovizioso in grande crescita e &quot;el porfuera&quot; Jorge Lorenzo.', 'Italia', '/Motogp/img_team/ducati.png'),
(8, 'EG 0,0 Marc VDS', 'Il team presenta due nuovi arrivati, entrambi dalla classe inferiore,la moto2. Si tratta del pilota italobrasiliano Franco Morbidelli, iridato della moto2 e dello svizzero Thomas Luthi.', 'Belgio', '/Motogp/img_team/vds.png'),
(12, 'KTM', 'I piloti sotto contratto sono lo spagnolo Pol Espargaro e l&#039;inglese Bradley Smith, due ragazzi che si conoscono bene, poiché compagni di squadra per tre anni nel team Tech3.', 'Austria', '/Motogp/img_team/ktm.png'),
(10, 'LCR Honda', 'Il team satellite del team Repsol Honda ingaggia il giapponese Takaaki Nakagami che va ad affiancare il confermato Cal Crutchlow.', 'Italia', '/Motogp/img_team/lcr.png'),
(3, 'Monster Yamaha Tech 3', ' Il team satellite della Yamaha ufficiale ha confermato il pilota Johann Zarco, ma si è trovata costretta a sostituire Jonas Folger con il giovane malesiano Hafizh Syahrin. ', 'Francia', '/Motogp/img_team/tech3.png'),
(4, 'Movistar Yamaha MotoGP', 'Il team Yamaha MotoGP ha confermato il duo costituito dal nove volte campione del mondo Valentino Rossi e  dal giovane Marverick Vinales per questa stagione.', 'Giappone', '/Motogp/img_team/yamaha.png'),
(11, 'Reale Avintia Racing', '     Il team ingaggia il rookie Xavier Simeon, primo belga in motoGP e lo spagnolo Tito Rabat, per il quale si tratta di un ritorno a casa avendo lui esordito ai tempi della moto3 proprio con questo team.', 'Spagna', '/Motogp/img_team/avintia.png'),
(1, 'Repsol Honda', 'Il team Repsol Honda si presenta per questo campionato del mondo con i confermatissimi Marc Marquez iridato e il veterano Dani Pedrosa.', 'Giappone', '/Motogp/img_team/honda.png'),
(6, 'Suzuki', 'Il team Suzuki ha rinnovato il contratto con i suoi piloti (Andrea Iannone e Alex Rins) fino all&#039;anno 2020.', 'Giappone', '/Motogp/img_team/suzuki.png');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `username` varchar(10) NOT NULL,
  `email` text NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `cognome` varchar(20) DEFAULT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`username`, `email`, `nome`, `cognome`, `password`) VALUES
('abcdefghil', 'yu@yu.y', NULL, NULL, '7ce8636c076f5f42316676f7ca5ccfbe'),
('abdMakkk', 'mamam@m.m', 'abdul', 'makkarib', 'b74df323e3939b563635a2cba7a7afba'),
('admin', 'admin@admin.it', 'franco', NULL, 'admin'),
('alepanz', 'alp@alp.alp', 'alessio', 'panzone', '786957b81c3db271a0b7b88ae2d5c982'),
('aloa', 'aloa@aloa.it', 'aio', 'aiu', '4b083b285a8b85a1e6025645dad39ce3'),
('alp22', 'alo@alo.alo', 'alessandra', 'stupidaaaajaja', '1b2ccf52b54ea2c9468ca24fbe164919'),
('alpo', 'alpo@alpo.it', NULL, NULL, 'ed5478a551b3f4c0f67c55d194153192'),
('ermenegi', 'er@minio.it', 'eraios', 'marotti', '818f9c45cfa30eeff277ef38bcbe9910'),
('fran', 'frab@l.i', 'franco', NULL, '2c20cb5558626540a1704b1fe524ea9a'),
('franbar', 'franbar@libero.it', 'franco', NULL, 'edb10aaf76404f74c9a14a6d34996be5'),
('frano', 'fra@no.it', NULL, NULL, 'ffe7470430a737c4ce6dc74bea0155d5'),
('ila', 'ila@rio.it', 'ilarione', NULL, 'c01151097a14267d086c2fa5bbc899e5'),
('marco', 'mar@co.it', NULL, NULL, '5fa9db2e335ef69a4eeb9fe7974d61f4'),
('marina', 'Fra9@libero.it', 'Francesco', 'Barbanti', 'ffe7470430a737c4ce6dc74bea0155d5'),
('poiopo', 'yu@yi.y', NULL, NULL, '1cee3293ba6324487ef3ffdaf75339a4'),
('pot', 'po@t.iu', NULL, NULL, 'f6122c971aeb03476bf01623b09ddfd4'),
('re', 're@ere.it', NULL, NULL, '12eccbdd9b32918131341f38907cbbb5'),
('regist', 'regist@r.it', NULL, NULL, '33c0ee425e2c0efe834afc1aa1e33a4c'),
('rettore', 'rett@ore.it', NULL, NULL, '58b60c631bca049b5ee2fd31b70b25a9'),
('retty', 're@ty.iy', NULL, NULL, '12eccbdd9b32918131341f38907cbbb5'),
('tre', 'tre@li.i', NULL, NULL, 'd70c1e5d44de8a9150eb91ecff563578'),
('treno', 'tre@no.it', NULL, NULL, '7e764aa6b7529530855f0373606d1886'),
('trezzi', 'tr@ezi.it', NULL, NULL, '7e764aa6b7529530855f0373606d1886'),
('username', 'email@l.it', NULL, NULL, '7bb483729b5a8e26f73e1831cde5b842'),
('wert', 'we@rt.iy', NULL, NULL, '12eccbdd9b32918131341f38907cbbb5');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `circuito`
--
ALTER TABLE `circuito`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `Detentore Record` (`detentore_record`);

--
-- Indici per le tabelle `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`g_id`);

--
-- Indici per le tabelle `piloti`
--
ALTER TABLE `piloti`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_team` (`p_team`);

--
-- Indici per le tabelle `recensioni`
--
ALTER TABLE `recensioni`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `username` (`utente`(255));

--
-- Indici per le tabelle `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indici per le tabelle `squadra`
--
ALTER TABLE `squadra`
  ADD PRIMARY KEY (`s_nome`) USING BTREE;

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`username`,`email`(255)) USING BTREE,
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `circuito`
--
ALTER TABLE `circuito`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la tabella `gallery`
--
ALTER TABLE `gallery`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `recensioni`
--
ALTER TABLE `recensioni`
  MODIFY `r_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `sp_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `piloti`
--
ALTER TABLE `piloti`
  ADD CONSTRAINT `piloti_ibfk_1` FOREIGN KEY (`p_team`) REFERENCES `squadra` (`s_nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
