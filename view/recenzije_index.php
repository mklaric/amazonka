<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
<?php require_once 'view/_header.php'; 



if($listaRecenzija)
{
	foreach( $listaRecenzija as $rec )
	{
		echo '<div class="kocka">';
		echo '<p class="rate">'  ;

			//crtanje zvijezdica
			for($i=1; $i<= $rec->ocjena; $i++)
				echo '<i class="fa fa-star" aria-hidden="true"></i>';
			$i-=1;
			for(; $i< 5; ++$i)
				echo '<i class="fa fa-star-o" aria-hidden="true"></i>';


		echo '</p><div >' . $rec->tekst . ' ( '. $rec->ime_korisnika.' )</div>' ;
		echo '</div>';
	}
}

//rec->id_proizvoda je svima isti
?>


<form method="post" class="kocka" action="index.php?rt=recenzije/ubaci">

<dl>
<fieldset class="rate left">
    <input type="radio" id="rating5" name="rating" value="5" /><label for="rating5" title="5 stars"></label>
    <input type="radio" id="rating4" name="rating" value="4" /><label for="rating4" title="4 stars"></label>
    <input type="radio" id="rating3" name="rating" value="3" /><label for="rating3" title="3 stars"></label>
    <input type="radio" id="rating2" name="rating" value="2" /><label for="rating2" title="2 stars"></label>
    <input type="radio" id="rating1" name="rating" value="1" /><label for="rating1" title="1 star"></label>
</fieldset>
	
	<span class="right"><button type="submit" class="review ">Review</button></span><br><br>
	<dt ><label for="name"></label></dt>
	<dd>Nick<input type="text" id="name" name="name" value="" /></dd>
	<dt><label for="remark"></label></dt>
	
	<dd >Description<textarea name="remark" id="remark" rows="5" cols="40"></textarea></dd>
	<input type="hidden" name="id_proizvoda" value="<?php echo $id ?>" />

</dl>

	
</form>

<?php require_once 'view/_footer.php'; ?>