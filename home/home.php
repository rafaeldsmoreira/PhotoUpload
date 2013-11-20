<!DOCTYPE html>
<html>
    <head><title> Fotos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/album.css">
        <link rel="stylesheet" href="../css/exemplo.css" type="text/css" />
        <link rel="stylesheet" href="../css/main.css" type="text/css" />
  <link rel="stylesheet" href="../css/demos.css" type="text/css" />
       


    </head>
    <body>
        
        <div id="container">
            
        <div class="container">
            <div class="jc-demo-box">
            
            <div class="row">
                <div class="span12">
                    
                        <div class="page-header">
                        <h1>Photo Upload-Lista de Fotos</h1>
                       
                         </div>
                        <?php
                         $i = 0;
                        
                        //session_start();
                        require ('../login/checksLogged.php'); 
                        echo 'Usuário:'.$_SESSION['user'];
                        require ('menu.php');
                         
                        require '../action/listAllPhotosAction.php';
                       
                        if (isset($allPhotos) && (!empty($allPhotos))) {
                           
                            
                            foreach ($allPhotos as $value) {
                                
                                ?>
                       
                                <ul class="fotos">
                                    
                                    <li> 
                                        <a href="visualizePhoto.php?id=<?php echo $value->getId(); ?>&url=<?php echo $urlf[$i] ?>">
                                            <?php 
                                            
                                            //echo $urlf[$i] ;
                                            echo $value->getLegend(); ?>
                                            <img src="<?php echo $urlf[$i] ?>" width=80 height=80 border=3> 
                                        </a>
                                    </li> 
                                </ul>

                                <?php
                                $i++;
                            }
                        }
                        else
                            echo"<br><br>Não existe registros.";
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
            
    </body>
</html>
