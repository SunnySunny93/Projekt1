<?php
	if (! empty($_GET['spielstein'] or $_GET['farbe'])){
		header("Content-type: image/png");
		$form = $_GET['spielstein'];
		$farbe = $_GET['farbe'];

		$image = imagecreate(200, 200);
    $hex = ltrim($farbe,'#');
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));
		imagecolorallocatealpha( $image, 155, 155, 155, 127);
    $farbe = imagecolorallocate($image, $r, $g, $b);

		if($form == 'kreis'){
			imagefilledarc( $image, 100, 100, 150, 150, 0, 360, $farbe, IMG_ARC_PIE);
		} else if($form == 'quadrat') {
			imagefilledrectangle( $image, 25, 25, 175, 175, $farbe);
		} else if($form =='dreieck') {
			$points= array( 25, 175, 175, 175, 100, 25);
			imagefilledpolygon( $image, $points, 3, $farbe);
		}
		//imagefilledrectangle( $image, 50, 50, 150, 150, $farbe);
		imagepng($image);
	}
?>

<img src="spielericon.php" alt= "Ein Bild">
