<?php

$src = $_POST['filename'];
       
if ($_SERVER['REQUEST_METHOD'] == 'POST')
    
 
{
	$targ_w = $targ_h = 150;
	$jpeg_quality = 90;

	
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);

	
        
        
	imagejpeg($dst_r,$src,$jpeg_quality);
        //echo "<img src=$src width=400 height=400 />";


echo "<script>  window.location='../home';</script>";


exit(0);
}
        ?>