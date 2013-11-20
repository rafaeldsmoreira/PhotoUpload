<?php

require dirname(__FILE__) . "/../classes/imageClass.php";
require dirname(__FILE__) . "/../classes/albumClass.php";
require dirname(__FILE__) . "/../classes/connectionFactoryClass.php";
require dirname(__FILE__) . "/../classes/imageDao.php";
require dirname(__FILE__) . "/../classes/albumDao.php";
require '../classes/createS3.php';

$idUser = $idUserSection;
$userName=$userNameSection;
$s3= new creates3();
$image = new ImageClass();
$album = new AlbumClass();
$c = new ConnectionFactory();
$db = $c->getConnection();
$imageDao = new imageDao($db);
$albumDao = new albumDao($db);
$allPhotos = Array();
$urlf =  Array();;
if (isset($_GET['album'])) {
    $idAlbum = $_GET['album'];


    
     $allPhotos=$imageDao->getAllPhotosByIdUserAndIdAlbum($idUser,$idAlbum);
     
     
    if(!empty( $allPhotos)){
        $u=0;
    foreach ($allPhotos as $f){
        $albumName=$f->getAlbumName();
        $photoName=$f->getName_photo();
        
        $urlf[$u]= $s3->listPhotoBucket($userName, $albumName, $photoName);
       $u++;
    }}
     
    
} else {
    //retorna todos os albuns

    //$albumlist = $albumDao->getAlbuns($idUser, '');
    $allPhotos=$imageDao->getAllPhotosByIdUserAndIdAlbum($idUser,'');
    if(!empty( $allPhotos)){
         $u=0;
    foreach ($allPhotos as $f){
        $albumName=$f->getAlbumName();
        $photoName=$f->getName_photo();
       
        $urlf[$u]= $s3->listPhotoBucket($userName, $albumName, $photoName);
       $u++;
    }
    
    
    }
    
    

    //if ($albumlist) {
        //cria uma array com fotos separadas por album 
        //$i = 0;
        //foreach ($albumlist as $l) {
            //echo $l->getIdAlbum();

            //$allPhotos[$i] = $imageDao->getAllPhotosByAlbum($l->getIdAlbum());
            ///$i++;
        //}
    //}
}
?>
