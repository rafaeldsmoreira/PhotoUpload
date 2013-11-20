<?php

require dirname(__FILE__) . "/../classes/imageClass.php";
require dirname(__FILE__) . "/../classes/albumClass.php";
require dirname(__FILE__) . "/../classes/connectionFactoryClass.php";
require dirname(__FILE__) . "/../classes/imageDao.php";
require dirname(__FILE__) . "/../classes/albumDao.php";
require '../classes/createS3.php';


$idUser =$idUserSection;
$s3= new creates3();
$image = new ImageClass();
$album = new albumClass();
$c = new ConnectionFactory();
$db = $c->getConnection();
$imageDao = new imageDao($db);
$albumDao = new albumDao($db);

$allalbuns = $albumDao->getAlbuns($idUser, '');

$i=0;

if(!empty($allalbuns )){
foreach ($allalbuns  as $a){
   
   $urlf[$i]= $s3->listPhotoBucket($a->getNameUser(), $a->getNameAlbum(), $a->getPhotoCapa()) ;
   $i++; 
}
}
?>
