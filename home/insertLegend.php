<!DOCTYPE html>
<html>
    <head><title> Lista de fotos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!link rel="stylesheet" type="text/css" href="css/album.css">
        <link rel="stylesheet" href="../css/exemplo.css" type="text/css" />
        <link rel="stylesheet" href="../css/main.css" type="text/css" />
        <link rel="stylesheet" href="../css/album.css" type="text/css" />
        <link rel="stylesheet" href="../css/demos.css" type="text/css" />
    </head>

<body>
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="jc-demo-box">
                    <?php
                    session_start();
                    require '../login/checksLogged.php';
                    //include '../action/listImagetempAction.php';
                    include 'menu.php';
                        ?>
        <br>
        <br>
        <form id="form" name="upload" method="POST" action="../action/insertImageAction.php" enctype="multipart/form-data" >
            <br>
            <label>Nome do Album</label>
            <br>
            <input type="text" name="album" style="text-transform: uppercase;" id="legend" value="<?php echo $_POST['album']; ?>"  />
                
                <?php
                    if ($novoFile) {
                        for ($i = 0; $i < count($novoFile); $i++) {
                     ?>
                            <br>
                            <img src="<?php echo '../temp/' . $novoFile[$i] ?>" width=80 height=80 border=3 >
                                    <?php 
                                   $existe=true;
                                   if(!$albumExisting){
                                       echo"<label>Capa</label><input type='checkbox' name='capa' id='capa' value=$novoFile[$i]>";
                                                    }else
                                                        echo"<input type='hidden' name='existe' id='capa' value=$existe/>";
                                           ?>
                 <br><br>

              <input type="text" name="legend[]"   id="legend"  />
              <input type="hidden" name="fotoname[]"   id="name" value="<?php echo $novoFile[$i] ?> " />
              <input type="hidden" name="fototype[]"   id="type" value="<?php echo $newFileType[$i] ?>" />
                    <br>

                    <?php
                                   }
                            } else if ($photoExisting > 0) {
                                $mesagem=null;
                                    foreach ($photoExisting as $photo) {
                                    $mesagem.='\n' . $photo;
                                }
                                $mesagem.='\n';
                                echo"<script> alert('Fotos:$mesagem já cadastradas.'); window.location='../action/listAllPhotos.php';</script>";
                            }
                            else
                                echo"Nem um registro encontrado.";
                         ?>


            <input name="enviar" type="submit" id="enviar" value="Enviar..." /> 
        </form>
                            </div>
            </div>
         </div>
    </div>
</body>
</html>
