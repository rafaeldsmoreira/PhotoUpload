<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        require '../action/registerSectionAwsAction.php';


        session_start(); //iniciamos a sessão que foi aberta
        session_destroy(); // destruimos a sessão ;)
        session_unset(); //limpamos as variaveis globais das sessões
         echo"<script> alert('Você foi deslogado!'); 
          window.location='../login/login.php';</script>";
        ?> 
    </body>
</html>



