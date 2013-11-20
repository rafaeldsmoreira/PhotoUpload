<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
       <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="../js/libs/autocomplete.js"></script>
        <!script type="text/javascript" src="../js/libs/jquery-1.3.2.min.js"><!script>
        <script type="text/javascript" src="../js/autoCompliteAlbum.js"></script> 
        <link rel="stylesheet" type="text/css" href="../css/album.css">
        <link rel="stylesheet" href="../css/exemplo.css" type="text/css" />
        <link rel="stylesheet" href="../css/main.css" type="text/css" />
  <link rel="stylesheet" href="../css/demos.css" type="text/css" />
        
    </head>
<body>
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="jc-demo-box">
                    <div class="page-header">
                    <h1>Photo Upload-Upload</h1> 
                    </div>
                     <?php
                     
                     require '../login/checksLogged.php';
                     echo 'Usuário:'.$_SESSION['user'];
                     include 'menu.php';

                     ?>
        <br>
        <br>
            
                    <form id="form" name="uploadd" method="POST" action="../action/checkPhotoAndInsertAction.php" enctype="multipart/form-data" >
                         <br>
                               <label for id="retornoAlbum">Nome do album</label>
                               <input type="text" name="album" id="album" placeholder="Nome do album" style="text-transform: uppercase;"/>
                               <input type="hidden" name="idUserSection" value="<?php echo $idUserSection?> "/>
                               <input type="hidden" name="userSection" value="<?php echo $userSection?>"/>
                               <span class="file-wrapper">
                               <input type="file" id="image-file" name="upload[]" size="300" multiple="multiple"/> 
                               <input name="enviar" type="submit" id="enviar" value="Enviar..." /> 
                               </span>
                    </form>
                 </div>
            </div>
        </div>
     </div>
 </body>
</html>


 
