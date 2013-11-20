<?php

$idUser = $idUserSection;
$userName = $userNameSection;

$nameAlbum = $_POST['album'];
$albumExistee = $albumDao->getAlbumByNameContains($nameAlbum, $idUser);
?>
