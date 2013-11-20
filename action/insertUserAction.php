<?php


require '../classes/userClass.php';
require'../classes/albumDao.php';
require '../classes/userDao.php';
require '../classes/connectionFactoryClass.php';
require 'checksDate.php';
require '../classes/createS3.php';


$date = new checksDate();
$userobj = new userClass();
$c = new ConnectionFactory();
$db = $c->getConnection();
$userDao = new userDao($db);
$albumDao = new albumDao($db);
$userobj = new UserClass();
$s3 = new creates3();


$userobj->setName(ucwords($_POST['name']));
$userobj->setUser(strtoupper($_POST['user']));
$userobj->setEmail(strtolower($_POST['email']));
$userobj->setSenha(md5($_POST['password']));
$userobj->setDateCad($date->dataAtualSimples());

if (empty($_POST['id'])) {

    if ($userDao->getUserByNameUser($userobj->getUser())) {
        echo "<script> alert('Usuário exitente.'); 
          window.location='../login/newUser.php';</script>";
    } elseif ($userDao->getUserByEmail($userobj->getEmail())) {
        echo "<script> alert('E-Mail exitente.'); 
          window.location='../login/newUser.php';</script>";
    } else {

        $newUser = $userobj->getUser(); 
        $userDao->create($userobj);
        $s3->createBucketUser($newUser);
        
                  echo "Usuário gravado";
                  header('location:../index.php');
             
       
       

       
    }
} else {

    /* $userobj->setId($_POST['id']);
      $nameAlbum´ = $userobj->getUser();
      $userDao->update($userobj);

      session_start(); //iniciamos a sessão que foi aberta
      session_destroy(); //pei!!! destruimos a sessão ;)
      session_unset(); //limpamos as variaveis globais das sessões

      session_start();
      $_SESSION['user'] = $userobj->getUser();
      $_SESSION['password'] = $userobj->getSenha();
      $_SESSION['userId'] = $userobj->getId(); */
    header("location:../index.php");
}
?>
