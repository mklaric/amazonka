<?php

class Recenzija
{
	protected $id, $id_proizvoda, $ime_korisnika, $ocjena, $tekst;

	function __construct( $id, $id_proizvoda, $ime_korisnika, $ocjena, $tekst )
	{
		$this->id = $id;
		$this->id_proizvoda = $id_proizvoda;
		$this->ime_korisnika = $ime_korisnika;
		$this->ocjena=$ocjena;
		$this->tekst=$tekst;
	}

	function __get( $prop ) { return $this->$prop; }
	function __set( $prop, $val ) { $this->$prop = $val; return $this; }
}

?>
