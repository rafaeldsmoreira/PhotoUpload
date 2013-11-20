<?php
require '../classes/imageClass.php';
        require '../classes/albumClass.php';
        require'../classes/connectionFactoryClass.php';
        require'../classes/imageDao.php';
        require'../classes/albumDao.php';
        require'../classes/validates.php';

require'checksDate.php';
require './createS3.php';
require 'saves3.php';
$saves3 = new save3();
$date = new checksDate();
$creates3 = new creates3();


$album = new albumClass();
$image = new ImageClass();
$c = new ConnectionFactory();
$db = $c->getConnection();
$imageDao = new imageDao($db);
$albumDao = new albumDao($db);
$valid = new validates();
$albumCadastro = new albumClass(); 

$directoryTemp = '../temp/';
echo'user'.$userName = $_POST['userSection'];
$userId = $_POST['idUserSection'];
$sizeMax=8388608;
$bucket=$userName;
//***************************


$directory='';
//************************/

$fileFotoType = array();
$tmpFilePath = array();
$novoFile=  Array();
$fotosExistentes = Array();


 //Preparando a variável do arquivo
$tamanho=0;
$idAlbum='';
$fi=$_FILES['upload']['size'];
$tamanho=array_sum ($fi);
 
//echo"tamanho:". file_size ($tamanho);

$filesize=$valid->formatSizeUnits($tamanho);



if ($tamanho <6291456  ) //6mb

{
$fileFoto = $_FILES['upload']['name'];
$fileFotoType = $_FILES['upload']['type'];
$tmpFile = $_FILES['upload']['tmp_name'];
$albumname = $_POST['album'];

$directory='2013rafa';

$albumExiste=False;



        if (!empty($albumname)) 
            {
               $albumExiste=$albumDao->getAlbumByNameEqual($albumname, $userId);


                if ($albumExiste) 
                    {
                        echo "<script> if (confirm('Album existe. Deseja gravar as fotos no album  ?'))
                        {var r=1;}else{window.location='../home/upload.php';}</script>";
                        
                       }  
                    
                    
                    
                    $albumExiste = "<script>document.write(r)</script>";
                    
                        
                                   $album->setIdUser($userId);
                                    $album->setNameAlbum($albumname);
                                    $album->setPhotoCapa($fileFoto[0]);
                                    $album->setDirectory($directory);
                                  $album->setDateInclusionAlbum($date->dataAtual());
                                  
                                  $albumCriado = $albumDao->create($album);
                               
                               
                               
                               $creates3->createS3Album($bucket, $albumname);
                    
                               
                               if($albumCadastro  = $albumDao->getAlbumByNameEqual($albumname, $userId)){
                               
                        
                        $idAlbum = $albumCadastro->getIdAlbum();
                        $image->setAlbumId($idAlbum);
                               }
                               else echo'album não encontrado';
                      
                    
                    
                    
               

                //Percorre o array filefoto
                for ($i = 0; $i < count($fileFoto); $i++)
                {
                    //recebe o tipo de foto
                    $fotoType = $fileFotoType[$i];
                    //recebe o caminho temporário 
                    

                    //Pega extensão do arquivo
                    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $fileFoto[$i], $ext);

                    // Gera um nome único para a imagem
                    $fileFoto[$i]=$foto =time().'_'.$date->dataAtual() . "." . $ext[1];

                    //Recebe  o caminho completo da foto incluindo o nome  ;
                    //$newFilePath = $directoryTemp . $foto;

                    //Verifica se foto foi selecionada
                    if ($foto)
                        {
                            if ($tmpFilePath != "")
                                {
                                //Verifica se a foto possuí os formatos jpg, png, gif 
                                    if ($valid->validatesPhoto($fotoType)) 
                                        {
                                            //verifica se  ja existe a foto no banco 
                                            if (!$imageDao->getPhotosByName($foto,$userId)) 
                                                {
                                                
                                                
                                                    $novoFile[] = $foto;
                                                    $newFileType[] = $fileFotoType [$i];
                                                    
                                                    
                                $image->setName_photo($fileFoto[$i]);
                                $image->setType($fileFotoType[$i]);
                                $image->setLegend('');
                               
                                $image->setDateInclusionPhoto($date->dataAtual());

                              
                                $result = $imageDao->create($image);
                                
                                    
                                  $saves3->saves3($tmpFile[$i], $bucket,$albumname,$fileFoto[$i]);
                                                    
                                                    
                                                 } else {
                                                            $fotosExistentes[] = $foto;
                                                        }
                                         } else {
                                                        echo "<script> alert('O arquivo . $fileFoto[$i];. não é uma Foto valida'); 
                                                        window.location='upload.php';</script>";
                                                  }
                                } else {
                                        echo "<script> alert('O arquivo . $fileFoto[$i];. não é uma Foto valida'); 
                                        window.location='upload.php;</script>";
                                       }
                    } else {
                                echo "<script> alert('Selecione um arquivo'); 
                                window.location='upload.php';</script>";
                            }
                }//fim do for
                
                
            } else {
                echo "<script> alert('Selecione um album.')
                window.location='upload.php';</script>";
                }
        
         } else {
        echo "<script> alert('Tamanho do arquivo muito grande!')
        window.location='upload.php';</script>";
        }
        
        
 echo"<br/>Tamanho:".$filesize;
?>

