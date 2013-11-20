<!DOCTYPE html>
<html>
    <head><title> Fotos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/album.css">
        <link rel="stylesheet" type="text/css" href="../css/main.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="../css/demos.css" type="text/css" />


    </head>
    <body>
        <div class="container">
             <div class="jc-demo-box">
            <div class="row">
                <div class="span12">
                   <div class="page-header">
                    <h1>Photo Upload-Albuns</h1>
                   </div>
               <?php
                    
                    require '../login/checksLogged.php';
                    echo 'Usuário:'.$_SESSION['user'];
                    include 'menu.php';
                   // echo"<br><br>"
                    include '../action/listAlbunsAction.php';
                    
                    if ($allalbuns) {
                        $i=0;
                                foreach ($allalbuns as $album) {
                                    ?>
                                    <ul class="fotos">
                                        <li>
                                            
                                                    <a href="home.php?album=<?php echo $album->getIdAlbum(); ?>">
                                                    <img src="<?php echo $urlf[$i]?>" width=80 height=80 border=3 >
                                                    <?php echo $album->getNameAlbum(); ?>
                                                    
                                                </a>
                                        </li>
                                    </ul>  

                                    <?php
                                    $i++;
                                }
                                        } else  echo"Nem um registro encontrado.";
                    ?>
        
                </div>
            </div>
        </div>
    </div>
</body>

</html>
