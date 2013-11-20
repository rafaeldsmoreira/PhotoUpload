<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require '../action/registerSectionAwsAction.php';
       
       
        $usuario = $_POST['user'];
        $senha = md5($_POST['password']);
         
        include('../action/userAction.php');
       
       
        
        if ($resultado && $senha == $resultado->getSenha()) {
            
          require '../classes/sessionDao.php';
          require '../action/checksDate.php';
          $date= new checksDate();
          //$sessionDao= new sessionDao($db);
          //$sessionDao->remove();
          //$resultado->setDateCad($date->dataAtual());
         // $resultado->setHora($date->horaAtual());
         // if(!$sessionDao->create($resultado)){
              //echo "<script> alert('Erro ao registrar.); 
            //window.location='login.php';</script>";
        //  }
                  
           

             //include '../action/registerSectionAwsAction.php';
            
             
             
            session_start();
            $_SESSION['user'] = $resultado->getUser();
            $_SESSION['password'] = $resultado->getSenha();
            $_SESSION['userId'] = $resultado->getId();
            echo "<script> alert('Seja bem vindo $usuario!'); 
            window.location='../home/home.php';</script>";
            
            
            header("Location: ../index.php");
            //echo "<script> 
            //window.location='../home/home.php';</script>";
            
           
            
        } else {
            echo "<script> alert('Usuário inválido!'); 
            window.location='login.php';</script>";
            //header("Location: login.php?login=falhou&causa=" . urlencode('User Inválido'));
              //ECHO"nao REGISTROU ";
            exit;
        }
        ?>

    </body>
</html>