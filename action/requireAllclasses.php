<?php
require '../classes/imageClass.php';
require '../classes/albumClass.php';
require'../classes/connectionFactoryClass.php';
require'../classes/imageDao.php';
require'../classes/albumDao.php';
require'../classes/validates.php';
require'checksDate.php';
require '../classes/createS3.php';




$date = new checksDate();
$creates3 = new creates3();
$album = new albumClass();
$image = new ImageClass();
$c = new ConnectionFactory();
$db = $c->getConnection();
$imageDao = new imageDao($db);
$albumDao = new albumDao($db);
$valid = new validates();
$albumRegistered = new albumClass();
?>
