<?php

require './requireAllclasses.php';
require '../login/checksLogged.php';

//Inicializando variáveis

$userId = $idUserSection;
$userName= $userNameSection;

$sizeMax = 8388608;
$bucket = $userName;
$directory = '';
$fileFotoType = array();
$tmpFilePath = array();
$novoFile = Array();
$photoExisting = Array();
$PhtoRecorded = Array();
$totalPhotoSize = 0;
$idAlbum = '';
$resp = '';




$photoSize = $_FILES['upload']['size'];
$fileFoto = $_FILES['upload']['name'];
$fileFotoType = $_FILES['upload']['type'];
$tmpFile = $_FILES['upload']['tmp_name'];
$albumName = $_POST['album'];

//Soma o tamanho de todas as fotos
$totalPhotoSize = array_sum($photoSize);
//Formata tamanho 
$filesize = $valid->formatSizeUnits($totalPhotoSize);


if ($totalPhotoSize < 6291456) { //6mb
    $albumExisting = False;
    if (!empty($albumName)) {
        $albumExisting = $albumDao->getAlbumByNameEqual($albumName, $userId);
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $fileFoto[0], $ext);
        // Gera um nome único para a imagem
        $photocapa = $photo = time() . '_' . $date->dataAtual() . "." . $ext[1];

        // se album não existe cadastra 
        if (!$albumExisting) {
            $album->setIdUser($userId);
            $album->setNameAlbum($albumName);
            $album->setPhotoCapa($photocapa);
            $album->setDirectory($directory);
            $album->setDateInclusionAlbum($date->dataAtual());
            $albumCriado = $albumDao->create($album);
        }



        if ($albumRegistered = $albumDao->getAlbumByNameEqual($albumName, $userId)) {
            $idAlbum = $albumRegistered->getIdAlbum();
            $image->setAlbumId($idAlbum);
        }
        else
            echo'album não encontrado';

        //Percorre o array filefoto
        for ($i = 0; $i < count($fileFoto); $i++) {


            //recebe o tipo de foto
            $fotoType = $fileFotoType[$i];
            //recebe o caminho temporário 
            //Pega extensão do arquivo
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $fileFoto[$i], $ext);

            // Gera um nome único para a imagem
            $fileFoto[$i] = $photo = time() . '_' . $date->dataAtual() . "." . $ext[1];

            if ($i == 0) {
                $fileFoto[0] = $photocapa;
            }

            //Verifica se foto foi selecionada
            if ($photo) {
                if ($tmpFilePath != "") {
                    //Verifica se a foto possuí os formatos jpg, png, gif 
                    if ($valid->validatesPhoto($fotoType)) {
                        //verifica se  ja existe a foto no banco 
                        if (!$imageDao->getPhotosByName($photo, $userId)) {
                            $novoFile[] = $photo;
                            $newFileType[] = $fileFotoType [$i];
                            $image->setName_photo($fileFoto[$i]);
                            $image->setType($fileFotoType[$i]);
                            $image->setLegend('');
                            $image->setDateInclusionPhoto($date->dataAtual());
                            $result = $imageDao->create($image);
                            

                            $PhtoRecorded[] = $creates3->createS3Album($tmpFile[$i], $bucket, $albumName, $fileFoto[$i]);
                        } else {
                            $photoExisting[] = $photo;
                        }
                    } else {
                        echo "<script> alert('O arquivo . $fileFoto[$i];. não é uma Foto valida'); 
                                                        window.location='../home/upload.php';</script>";
                    }
                } else {
                    echo "<script> alert('O arquivo . $fileFoto[$i];. não é uma Foto valida'); 
                                        window.location='../home/upload.php;</script>";
                }
            } else {
                echo "<script> alert('Selecione um arquivo'); 
                                window.location='../home/upload.php';</script>";
            }
        }//fim do for
    } else {
        echo "<script> alert('Selecione um album.')
                window.location='../home/upload.php';</script>";
    }
} else {
    echo "<script> alert('Tamanho do arquivo muito grande!')
        window.location='../home/upload.php';</script>";
}

if ($PhtoRecorded > 0) {
    echo "<script> alert('Upload Realizado com sucesso!')
        window.location='../home/visualizeAllAlbum.php';</script>";
} else {
    echo "<script> alert('Algumas fotos não foram gravadas!')
        window.location='../home/visualizeAllAlbum.php';</script>";
}





echo"<br/>Tamanho:" . $filesize;
?>

