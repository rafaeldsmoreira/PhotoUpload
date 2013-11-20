<?php

require dirname(__FILE__) . "/../classes/userClass.php";
require dirname(__FILE__) . "/../classes/userDao.php";
require dirname(__FILE__) . "/../classes/connectionFactoryClass.php";


$listUser = new userClass();
if (isset($_GET['id']) && (!empty($_GET['id']))) {

    $c = new ConnectionFactory();
    $db = $c->getConnection();
    $userDao = new userDao($db);
    @session_start();
    $userId = $_GET['id'];
    $listUser = $userDao->getUserById($userId);
}
?>
