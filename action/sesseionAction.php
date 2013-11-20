<?php
require'../classes/connectionFactoryClass.php';
require '../classes/sessionDao.php';
require '../classes/userClass.php';
 $c = new ConnectionFactory();
$db = $c->getConnection();
$session = new sessionDao($db);





?>
