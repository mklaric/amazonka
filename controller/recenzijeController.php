<?php 

require_once 'model/Amazon.class.php';

class recenzijeController
{
	public function index($route) 
	{
		
		$ls = new Amazon();

		if ($ime= $ls->postojiProizvod($route)) //gledamo postoji li uopće sa tim id-em proizvod
		{
			$title = "Recenzije za $ime";
			$listaRecenzija = $ls->getRatings($route);
			$id=$route;

			require_once 'view/recenzije_index.php';
		}
		else 
		{
			$title = 'Proizvod ne postoji';

			require_once 'view/404_index.php';
		}
	}

	public function ubaci() //ubacujemo recenziju
	{
		
		$ls = new Amazon();

		$title = 'Recenzije ';
		$id= $_POST['id_proizvoda'];

		if( isset( $_POST['name'] ) && preg_match( '/^[a-zA-Z ,-.]+$/', $_POST['name']) && isset( $_POST['rating'] ) )
		{
			$ls->ubaciRecenziju($_POST['id_proizvoda'],$_POST['name'], $_POST['rating'], $_POST['remark'] );
			unset($_POST['name']); unset($_POST['rating']);
			header( "Location: index.php?id=$id");

		}

		$listaRecenzija = $ls->getRatings($id);

		require_once 'view/recenzije_index.php';
	}



	
}; 

?>
