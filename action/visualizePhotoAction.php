<?php

require dirname(__FILE__) . "/../classes/imageClass.php";
require dirname(__FILE__) . "/../classes/albumClass.php";
require dirname(__FILE__) . "/../classes/connectionFactoryClass.php";
require dirname(__FILE__) . "/../classes/imageDao.php";
require dirname(__FILE__) . "/../classes/albumDao.php";
require dirname(__FILE__) . "/../classes/createS3.php";
 //require '../login/checksLogged.php';


$userId = $idUserSection;
$userName= $userNameSection;
$photo = new ImageClass();
$s3= new creates3();
$album = new albumClass();
$c = new ConnectionFactory();
$db = $c->getConnection();
$imageDao = new imageDao($db);
$albumDao = new albumDao($db);

$urlPhoto=Array();


$idPhoto = $_GET['id'];
$url = $_GET['url'];
$photo = $imageDao->getById($idPhoto);



$albumId=$photo->getAlbumId();



$album = $albumDao->getAlbuns($userId,$albumId );


//$s3->listPhotoBucket2($userName, $photo->getAlbumName(), $photo->getName_photo());



?>
