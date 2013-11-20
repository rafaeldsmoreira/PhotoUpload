<?php
require '../classes/imageClass.php';
require '../classes/albumClass.php';
require'../classes/connectionFactoryClass.php';
require'../classes/imageDao.php';
require'../classes/albumDao.php';
require'../classes/validates.php';
require'checksDate.php';
require'../action/createS3.php';



$s3=new creates3();
$albuns = new AlbumClass();
$image = new ImageClass();
$date = new checksDate();
$c = new ConnectionFactory();
$db = $c->getConnection();
$imageDao = new imageDao($db);
$albumDao = new albumDao($db);
$albumDeletado = false;
$imageDeletada=false;
$result=false;


$valid = new validates();
$id = $_GET['id'];
$userName= $_GET['user'];
$idUser= $_GET['idUser'];


$photo = $imageDao->getById($id);

if ($photo) {
    
    
    
}
    $idAlbum = $photo->getAlbumId();
    $albuns = $albumDao->getById($idAlbum);

    
$result1=$s3->deleS3AlbumPhoto($userName, $albuns->getNameAlbum(), $photo->getName_photo());

if($result1){
    
     $result=$imageDao->delete($id);
    
    }
    
    if(!$imageDao->getAllPhotosByIdUserAndIdAlbum($idUser, $idAlbum)){
        $albumDao->removeByIdalbum($idAlbum);
    }
  

?>

<script>



    //<meta http-equiv="content-type" content="text/html;charset=utf-8" />;
    var cadTest = <?php echo $result; ?>;


    if (cadTest) {

        alert("Foto deletada com sucesso!");
        setTimeout("document.location = '../index.php'", 500);

    } else {

        alert("Não Foi Possível Deletar essa foto!");
        setTimeout("document.location = '../index.php'", 500);
    }


</script>

