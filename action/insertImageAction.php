<?php
session_start();

require '../classes/imageClass.php';
require '../classes/albumClass.php';
require'../classes/connectionFactoryClass.php';
require'../classes/imageDao.php';
require'../classes/albumDao.php';
require'../classes/validates.php';

require'../classes/createFolderClass.php';

$image = new ImageClass();
$album = new AlbumClass();
$albumRegistered = new AlbumClass();
$date = new checksDate();
$c = new ConnectionFactory();
$db = $c->getConnection();
$imageDao = new imageDao($db);
$albumDao = new albumDao($db);
$valid = new validates();
$folder = new createFolderClass();



$directory = 'uploads/';
$directoryTmp = '../temp/';
$userName = $_SESSION['user'];
$userId = $_SESSION['userId'];

$filePhoto = array();
$filePhotoType = array();
$filePhotoLegend = array();

$filePhotoName = $_FILES['upload']['name'];
$filePhotoType = $_FILES['upload']['type'];
$tmpFile = $_FILES['upload']['tmp_name'];
$albumName = $_POST['album'];



$continue = false;
$result = false;
$albumExisting = false;
$photoCapa = null;
$albumCriado = null;
$folderCreated = false;
$dirPhoto = '';
$tmpFilePath = '';
$newAlbum = '';




$photoCapa = $filePhotoName[0];
$album->setIdUser($userId);
$album->setNameAlbum($albumName);
$album->setPhotoCapa($photoCapa);
$album->setDirectory($directory);
$album->setDateInclusionAlbum($date->dataAtual());

$albumCriado = $albumDao->create($album);
$newAlbum = $albumName . $date->dateTime();
require './createS3.php';




$albumRegistered = $albumDao->getAlbumByNameEqual($albumName, $userId);
$idAlbum = $albumRegistered->getIdAlbum();
$image->setAlbumId($idAlbum);





for ($i = 0; $i < count($filePhotoName); $i++) {
    $image->setName_photo($filePhotoName[$i]);
    $image->setType($filePhotoType[$i]);
    $image->setLegend('');
    $tmpFilePath = $directoryTmp . $filePhotoName[$i];
    $image->setDateInclusionPhoto($date->dataAtual());

    $dir = $newFilePath = '../' . $directory . '/' . $userName . '/' . $albumName . '/' . $image->getName_photo();

    $result = $imageDao->create($image);


    require './saves32.php';
    $s3 = new save3();
    echo'temp:' . $tmpFile[$i];
    $s3->createS3Album($tmpFile[$i], $newAlbum);
}//Fim do for
?>





<script>

    //<meta http-equiv="content-type" content="text/html;charset=utf-8" />;
    var result = <?php echo $result; ?>;


    if (result) {

        alert("Upload realizado com sucesso!");
        setTimeout("document.location = '../index.php'", 500);

    } else {

        alert("Não Foi Possível Realizar o upload!");
        setTimeout("document.location = '../index.php'", 500);
    }


</script>

