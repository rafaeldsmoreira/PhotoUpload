<?php
session_start();
require '../classes/imageClass.php';
require '../classes/albumClass.php';
require'../classes/connectionFactoryClass.php';
require'../classes/imageDao.php';
require'../classes/albumDao.php';
require'../classes/validates.php';
require'checksDate.php';


//$image = new ImageClass();
$albuns=new AlbumClass();
$date = new checksDate();
$c = new ConnectionFactory();
$db = $c->getConnection();
$imageDao = new imageDao($db);
$albumDao = new albumDao($db);
$valid = new validates();
$userId=$_SESSION['userId'];

$nameAlbum=$_GET['name'];
$albuns=$albumDao->getAlbumByNameContains($nameAlbum,$userId);
foreach ($albuns as $a){
    $name=$a->getNameAlbum();
    //$nome = addslashes($nome);


$html = preg_replace("/(" .$nameAlbum . ")/i", "<span style=\"font-weight:bold\">\$1</span>", $name);

echo "<li onselect=\"this.setText('$name');\">$html ($name)</li>\n";

    
    
}


?>
