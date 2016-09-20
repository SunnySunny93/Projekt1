<?php
	//function spielstein($form, $farbe){
		
		print "<img src="
			header("Content-type: image/png");
			$form = .$_POST['spielstein'];
			$farbe = .$_POST['farbe'];
			
			$image = imagecreate(200, 200);
			$grau = imagecolorallocate( $image, 155,155,155);
			if($form == 'kreis'){
				imagefilledarc( $image, 100, 100, 50, 50, 0, 360, $farbe);
			} else if($form == 'quadrat') {
				imagefilledrectangle( $image, 50, 50, 150, 150, $farbe);
			} else if($form =='dreieck') {
				$points= array( 50, 100, 150, 25, 150, 75);
				imagefilledpolygon( $image, $points, 3, $farbe);
			}
			imagepng $image;
		"alt= 'Hier entsteht der Spielstein'>";
	 //}
?>