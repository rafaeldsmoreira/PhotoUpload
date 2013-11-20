<?php

require '../classes/imageClass.php';
require '../classes/albumClass.php';
require '../classes/connectionFactoryClass.php';
require '../classes/imageDao.php';
require '../classes/albumDao.php';
require '../classes/validates.php';
require './createS3.php';


$s3= new creates3();
$image = new ImageClass();
$album = new AlbumClass();
$c = new ConnectionFactory();
$db = $c->getConnection();
$imageDao = new imageDao($db);
$albumDao = new albumDao($db);
$valid = new validates();

//buscando albuns
$albuns = $albumDao->getAlbuns('', '');


if ($albuns) {
    
    
    
    foreach ($albuns as $album){
        $album->getNameUser();
        $s3->clearBucket($album->getNameUser());
        
    }
   
    
    
    
    
    
    if ($imageDao->removeAll()) {
        if ($albumDao->removeAll()) {
            echo"<script> alert('Todas as fotos foram deletadas.'); 
          window.location='../index.php';</script>";
        }echo"<script> alert('Não foi possível deletar.'); 
          window.location='../home/home.php';</script>";
    }
    else
        echo"<script> alert('Não foi possível deletar.'); 
          window.location='../home/home.php';</script>";

  
}
else
    echo"<script> alert('Não existe registros.'); 
          window.location='../index.php';</script>";
?>

