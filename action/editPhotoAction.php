

<?php

require dirname(__FILE__) . "/../classes/imageClass.php";
require dirname(__FILE__) . "/../classes/connectionFactoryClass.php";
require dirname(__FILE__) . "/../classes/imageDao.php";
require dirname(__FILE__) . "/../classes/validates.php";



$image = new ImageClass();
$c = new ConnectionFactory();
$db = $c->getConnection();
$imageDao = new imageDao($db);
$valid = new validates();



$directoryTemp = 'temp/';


$error = array();
$errophoto = array();
$idex = 0;
//$fileFoto = array();
$fileFotoType = array();
$tmpFilePath = array();

$image->setId($_POST['id']);
$image->setLegend($_POST['legend']);
$image->setDateInclusionPhoto($_POST['dateInclusion']);


$dir = $_GET['dir'];

$result = $imageDao->editPhoto($image);




if ($result) {
    echo"<script> alert('Foto foi alterada com sucesso.'); 
          window.location='../index.php';</script>";
}
else
    echo"<script> alert('Não foi possível alterar a foto.'); 
          window.location='../index.php';</script>";
?>


