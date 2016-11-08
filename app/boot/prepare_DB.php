<?php

// Manualno inicijaliziramo bazu ako već nije.
require_once 'db.class.php';

$db = DB::getConnection();

try
{
	$st = $db->prepare( 
		'CREATE TABLE IF NOT EXISTS proizvodi (' .
		'id int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
		'naziv varchar(255) NOT NULL,' .
		'opis varchar(1000) NOT NULL,' .
		'cijena double NOT NULL)'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error #1: " . $e->getMessage() ); }

echo "Napravio tablicu proizvodi.<br />";

try
{
	$st = $db->prepare( 
		'CREATE TABLE IF NOT EXISTS recenzije (' .
		'id int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
		'id_proizvoda int NOT NULL,' .
		'ime_korisnika varchar(50) NOT NULL,'.
		'ocjena int NOT NULL,'.
		'tekst varchar(1000) NOT NULL)'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error #2: " . $e->getMessage() ); }

echo "Napravio tablicu recenzije.<br />";





// Ubaci neke proizvode unutra
try
{
	$st = $db->prepare( 'INSERT INTO proizvodi(id, naziv, opis, cijena) VALUES (:id, :naziv, :opis, :cijena)' );

	$st->execute( array( 'id' => '1447', 'naziv' => 'BOSCH MUM48R1', 'opis' =>'Multipraktik 600W, 4 brzine, crveni.Snaga: 600W . 4 radne brzine, pozicija parkiranja  ', 'cijena' => '999.00') );
	$st->execute( array( 'id' => '1586', 'naziv' => 'ROWENTA CV5062', 'opis' => 'SUŠILO ZA KOSU 2300W POWERLINE. 3 postavke temperature, 2 postavke jačine puhanja. Funkcija puhanja hladnog zraka za učvršćenje frizure ', 'cijena' => '229.00' ) );
	$st->execute( array( 'id' => '1623', 'naziv' => 'VIVAX TS-7501WH', 'opis' =>'Toster, Bijela boja inox detalj, Snaga: 750 W, 
		svjetlosni indikator rada, fiksna grill 
		rešetka ', 'cijena' => '119.00'  ) );
	$st->execute( array( 'id' => '1784', 'naziv' => 'DIRT DEVIL M319', 'opis' =>'Parni čistač, 3bara,1500W
		Uz laku kontrolu i biorazgradivu dezinfekciju Clean, dezinficirati i štiti kupaonicu, kuhinju, tvrde podove i tepihe. ', 'cijena' => '699.30'  ) );
	$st->execute( array( 'id' => '1955', 'naziv' => 'GORENJE R506E', 'opis' => 'Rezalica, metalna, 160W, 19cm oštrica, Metalno kućište 
		Gumirane nožice 
		Tehničke karakteristike', 'cijena' => '549.00' ) );
}
catch( PDOException $e ) { exit( "PDO error #4: " . $e->getMessage() ); }

echo "Ubacili smo proizvode.<br />";



try
{
	$st = $db->prepare( 'INSERT INTO recenzije(id, id_proizvoda, ime_korisnika, ocjena, tekst) VALUES (:id, :id_proizvoda, :ime_korisnika, :ocjena, :tekst)' );

	$st->execute( array( 'id' => '1', 'id_proizvoda' =>'1447', 'ime_korisnika' => 'Maja Curkovic', 'ocjena' => '5', 'tekst'=> 'nisam ni znala kaj sve s ovim mogu dok nisam kupila') );
	$st->execute( array( 'id' => '3', 'id_proizvoda' =>'1623', 'ime_korisnika' => 'jozek', 'ocjena' => '3', 'tekst'=> 'kolko para tolko muzike') );
	$st->execute( array( 'id' => '4', 'id_proizvoda' =>'1623', 'ime_korisnika' => 'ana', 'ocjena' => '2', 'tekst'=> 'pukla mi je ručkica za zatvaranje drugi dan') );
	$st->execute( array( 'id' => '5', 'id_proizvoda' =>'1784', 'ime_korisnika' => 'homequeen', 'ocjena' => '4', 'tekst'=> 'snizenje je nemoguce, platila bi i duplo vise za dirt devila') );
	$st->execute( array( 'id' => '6', 'id_proizvoda' =>'1955', 'ime_korisnika' => 'Juraj V', 'ocjena' => '4', 'tekst'=> 'ok'));
	$st->execute( array( 'id' => '7', 'id_proizvoda' =>'1955', 'ime_korisnika' => 'neko', 'ocjena' => '4', 'tekst'=> 'neki tekst'));
	$st->execute( array( 'id' => '8', 'id_proizvoda' =>'1955', 'ime_korisnika' => 'lepi', 'ocjena' => '2', 'tekst'=> 'neki tekst'));


}
catch( PDOException $e ) { exit( "PDO error #5: " . $e->getMessage() ); }

echo "Ubacio recenzije jej <br />";



?> 
