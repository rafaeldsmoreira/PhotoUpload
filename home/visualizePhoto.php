<!DOCTYPE html>
<html>
    <head><title> Editar foto</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/album.css">
        <link rel="stylesheet" href="../css/main.css" type="text/css" />
        <link rel="stylesheet" href="../css/demos.css" type="text/css" />
  

        
   </head>
<body>

    
    <div class="container">
        <div class="jc-demo-box">
        <div class="row">
            <div class="span12">
                <div class="page-header">
                    <h1>Photo Upload-Editar foto</h1>
                </div>
                        <?php
                        
                            require '../login/checksLogged.php';
                            echo 'Usuário:'.$_SESSION['user'];
                            
                            include 'menu.php';
                            echo"<br><br>" ;
                            include '../action/visualizePhotoAction.php';
                            
                            ?>
                    
                    <form id="form" name="upload" method="POST" action="../action/editPhotoAction.php?dir=<?php echo$dir?>" onsubmit="return checkCoords();" >
                        <label>legeda <input type='text' name='legend' value="<?php echo $photo->getLegend(); ?>"></label>
                        <label>Data de inclusão <input type='text' name='dateInclusion' value="<?php echo $photo->getDateInclusionPhoto(); ?>"></label>
                        
                        <a href="../action/deletePhotoAction.php?id=<?php echo $photo->getId(); ?>&idUser=<?php echo $idUserSection; ?>&user=<?php echo $userSection; ?>">Delete</a>
                        <a href="cutPhoto.php?filename=<?php echo $url?> "> recorte </a>
                        <a href=""> Girar </a>
                        
                         <img src='<?php echo $url; ?>'id="cropbox"  width="250" height=250 border=3 />
                        <input name="enviar" type="submit" id="enviar" value="Salvar..." class="btn btn-large btn-inverse" /> 
                        <input type='hidden'name='id' value="<?php echo $photo->getId(); ?>">
                    </form>
                    
                 </div>
            </div>
        </div>
    </div>
</body>
</htn>
