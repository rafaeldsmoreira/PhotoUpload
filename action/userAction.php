<?php

//session_start();
require dirname(__FILE__) . "/../classes/userClass.php";
require dirname(__FILE__) . "/../classes/userDao.php";
require dirname(__FILE__) . "/../classes/connectionFactoryClass.php";





$userName = new userClass();
$c = new ConnectionFactory();
$db = $c->getConnection();
$userDao = new userDao($db);



$resultado = $userDao->getUserByUserPassword($usuario, $senha);

if(!$resultado){
   $resultado= $userDao->getUserByEmailPassword($usuario,$senha );
}
?>
