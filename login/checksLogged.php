<?php

require '../action/registerSectionAwsAction.php';

session_start();

if (!isset($_SESSION['user']) || !isset($_SESSION['password'])) {
   
    header("location: ../login/login.php");
    
     
} else {
   $userNameSection=$_SESSION['user'] ;
   $idUserSection=$_SESSION['userId'];
   
}


?>
