<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
<?php require_once 'view/_header.php'; 


foreach( $ListaProizvoda as $product )
{
	echo '<div class="kocka">';
	echo '<span class="ime_prod">' . $product->naziv . '</span>'.		 
		 '<span class="right">' . $product->cijena. ' kn</span><br><br><div>'  ;

		//crtanje zvijezdica
		for($i=1; $i<= $product->avg_oc; $i++)
			echo '<i class="fa fa-star" aria-hidden="true"></i>';
		$i-=1;
		if($i<5 && $product->avg_oc -$i >= 0.5)
		{
			echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
			$i +=1;
		}
		for(; $i< 5; ++$i)
			echo '<i class="fa fa-star-o" aria-hidden="true"></i>';


	echo '<form action="index.php" method="get">'.
		'<input type="hidden" name="id" value="'. $product->id.'">'.
		 '<input type="submit" class="link" value=" (' . $product->br_rec . ' reviews)"></form></div>'.

		 '<p class="manje">' . $product->opis . '</p>' ;
	echo '</div>';

}
//index.php?rt=recenzije/index
?>

<?php require_once 'view/_footer.php'; ?>


