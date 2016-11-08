<?php 

require_once 'model/Amazon.class.php';

class proizvodController
{
	public function index() 
	{
		$ls = new Amazon();

		$title = 'Dobro došli u naš webshop';
		$ListaProizvoda = $ls->getAllProizvods();

		require_once 'view/proizvodi_index.php';
	}
}; 

?>
