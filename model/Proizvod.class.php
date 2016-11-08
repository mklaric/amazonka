<?php

class Proizvod
{
	protected $id, $naziv, $opis, $cijena, $br_rec, $avg_oc;

	function __construct( $id, $naziv, $opis, $cijena, $br_rec, $avg_oc )
	{
		$this->id = $id;
		$this->naziv = $naziv;
		$this->opis = $opis;
		$this->cijena = $cijena;
		$this->br_rec = $br_rec;
		$this->avg_oc=$avg_oc;
	}

	function __get( $prop ) { return $this->$prop; }
	function __set( $prop, $val ) { $this->$prop = $val; return $this; }
}

?>

