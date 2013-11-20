<?php

require '../vendor/aws-autoloader.php';
use Aws\S3\S3Client;
use Guzzle\Http\EntityBody;


class creates3 {

    //CRIAÇÃO DO BUCKET USUÁRIO
    public function createBucketUser($bucketUser) {
        //ARQUIVO DE CONFIGURAÇÃO
        require '../home/s3_config.php';
        //RECEBE AS CREDENCIAIS DE ACESSO AO S3
        $clientS3 = S3Client::factory(array(
                    'key' => $key,
                    'secret' => $secretkey
        ));

        //PERMITE TRATAR AMAZON S3 COMO UM SISTEMA DE ARQUIVOS
        $clientS3->registerStreamWrapper();
        //FUNÇAO PARA CRIA O BUCKET
        
        
        return mkdir("s3://$bucketUser");
    }
    
    
    

    //CRIA ALBUM E ARQUIVOS
    public function createS3Album($tmp, $bucket, $albumName, $fotoName) {
        //ARQUIVO DE CONFIGURAÇÃO
        require '../home/s3_config.php';
        $directoryBucket = $bucket . '/' . $albumName;
        //RECEBE AS CREDENCIAIS DE ACESSO AO S3
        $clientS3 = S3Client::factory(array(
                    'key' => $key,
                    'secret' => $secretkey
        ));
        //PERMITE TRATAR AMAZON S3 COMO UM SISTEMA DE ARQUIVOS
        //$clientS3->registerStreamWrapper();
        //SE ALBUM NÃO EXISTIR CRIA E SALVA OS ARQUIVOS 
        $response= $clientS3->putObject(array(
                'Bucket' => $bucket.'/'.$albumName,
                'Key' => $fotoName,
                'SourceFile' => $tmp,
                 'ACL'    => 'public-read',
                 'ContentType'=> 'image/jpeg'
            ));
        
        return $response;
    }

    //DELETA FOTO DO ALBUM
    public function deleS3AlbumPhoto($bucket, $albumName, $fotoName) {
        //ARQUIVO DE CONFIGURAÇÃO
        require '../home/s3_config.php';

        $directoryBucket = $bucket . '/' . $albumName;
        //RECEBE AS CREDENCIAIS DE ACESSO AO S3
        $clientS3 = S3Client::factory(array(
                    'key' => $key,
                    'secret' => $secretkey
        ));
        //PERMITE TRATAR AMAZON S3 COMO UM SISTEMA DE ARQUIVOS
        $clientS3->registerStreamWrapper();
        //DELETA O ARQUIVO 
        return unlink("s3://$bucket/$albumName/$fotoName");
    }
    
    
    public function listPhotoBucket($bucket,$albumName,$photo){
        require '../home/s3_config.php';


        $directoryBucket = $bucket . '/' . $albumName . '/' . $photo;
        //RECEBE AS CREDENCIAIS DE ACESSO AO S3
        $clientS3 = S3Client::factory(array(
                    'key' => $key,
                    'secret' => $secretkey
        ));

        $plain_url = $clientS3->getObjectUrl($bucket . '/' . $albumName, $photo);
        return $plain_url;
    }
    
    
    
     public function listPhotoBucket2($bucket,$albumName,$photo){
        require '../home/s3_config.php';
        

        $directoryBucket = $bucket . '/' . $albumName.'/'.$photo;
        //RECEBE AS CREDENCIAIS DE ACESSO AO S3
        $clientS3 = S3Client::factory(array(
                    'key' => $key,
                    'secret' => $secretkey
                    
        ));
        
        $clientS3->registerStreamWrapper();
        $dir = $bucket . '/' . $albumName . '/' . $photo;

        $file = $photo;
        $filepath = "c:/foto/";

        readfile("s3://$dir");
	

        
    }
    
    
    
    public function clearBucket($bucket){
        
         require '../home/s3_config.php';
        //RECEBE AS CREDENCIAIS DE ACESSO AO S3
        $clientS3 = S3Client::factory(array(
                    'key' => $key,
                    'secret' => $secretkey
                    
        ));
        
        //DELETA TODOS OS ALBUM EXISTENTE NESSE BUCKET
        $clientS3->clearBucket($bucket);
        
    }

}

?>
