

<?php

header("Cache-Control: no-cache, must-revalidate");


// test.jpg é o nome da imagem que você quer girar

$degrees = 90; // Giro de 180 graus

// Content type
//header('Content-type: image/jpeg');
$filename=$_GET['filename'];
$id=$_GET['id'];
// Carrega a imagem
$source = imagecreatefromjpeg($filename);

// GIRA
$rotate = imagerotate($source, $degrees, 0);

// Imagem criada
imagejpeg($rotate,$filename);

echo"<script>  
        window.location='../home/visualizePhoto.php?id=$id';</script>";
//exit(0);


  
?>

