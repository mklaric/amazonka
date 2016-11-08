<?php


require_once 'db.class.php';
require_once 'Proizvod.class.php';
require_once 'recenzija.class.php';

class Amazon
{
	

	//zasad samo ovo
	function getAllProizvods( )
	{
		
		$db = DB::getConnection();
		$st = $db->prepare( 'SELECT * FROM proizvodi ' );
		$proiz = $db->prepare( 'SELECT AVG(ocjena) AS srednja FROM recenzije WHERE id_proizvoda=:id_proizvoda' );
		$rec = $db->prepare( 'SELECT COUNT(*) AS broj_rec FROM recenzije WHERE id_proizvoda=:id_proizvoda' );
		$st->execute();
		

		$arr = array();
		while( $row = $st->fetch() )
		{
			$proiz->execute(array('id_proizvoda' => $row['id']));
			$rec->execute(array('id_proizvoda' => $row['id']));
			$avg= $proiz->fetch()['srednja'];
			$broj_rec= $rec->fetch()['broj_rec'];
			$arr[] = new Proizvod( $row['id'], $row['naziv'], $row['opis'], $row['cijena'],$broj_rec ,$avg );
		}

		return $arr;
	}

	function getRatings($id)
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( "SELECT id, id_proizvoda, ime_korisnika, ocjena, tekst FROM recenzije WHERE id_proizvoda=$id" );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$brojac=0; // s njim gledamo ima li uopće recenzija. ako nema, vraćamo nulu 
		while( $row = $st->fetch() )
		{
			$brojac +=1;
			$arr[] = new Recenzija( $row['id'], $row['id_proizvoda'], $row['ime_korisnika'], $row['ocjena'],$row['tekst']);
		}

		if ($brojac) return $arr; 
		else return 0;
	}

	function postojiProizvod($id)
	{
		//moramo pogledat jel postoji u proizvodima 
		$db = DB::getConnection();
		$rec = $db->prepare( "SELECT naziv AS broj_rec FROM proizvodi WHERE id=$id");
		$rec->execute();
		$broj_rec= $rec->fetch()['broj_rec'];
		return $broj_rec;
	}

	function ubaciRecenziju( $id_pro, $ime, $grad, $description )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'INSERT INTO recenzije( id_proizvoda, ime_korisnika, ocjena, tekst) VALUES ( :id_proizvoda, :ime_korisnika, :ocjena, :tekst)' );

			$st->execute( array( 'id_proizvoda' => $id_pro, 'ime_korisnika' => $ime, 'ocjena' => $grad, 'tekst' => $description) );
			
		}
		catch( PDOException $e ) {echo 'glupo'; exit( "PDO error #5: " . $e->getMessage() ); }


	}


};

?>

