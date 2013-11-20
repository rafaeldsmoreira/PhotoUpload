<!DOCTYPE html>
<html lang="en">
<head>
  <title>Live Cropping Demo</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <script src="../js/libs/jquery.min.js"></script>
  <!script src="../js/libs/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="../css/main.css" type="text/css" />
  <!link rel="stylesheet" href="../css/demos.css" type="text/css" />
  <!link rel="stylesheet" href="../css/jquery.Jcrop.css" type="text/css" />
  <script src="../js/cutCrop.js"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="jc-demo-box">
                    <div class="page-header">
                    <h1>Photo Upload-Recortando Foto</h1> 
                    <li><a href="../home/home.php" title="Home">Home</a></li>
                    </div>
                    
                    
                        <?php echo"url:". $filename=$_GET['filename'];?>
                    <h3>Em desenvolvimento</h3>
                        <img src=<?php echo '../imagess/dow.png'?> id="cropbox" />
                        <form action="../action/cutPhotoAction.php?filename=<?php echo $filename?>"  method="post" onsubmit="return checkCoords();">
                                <input type="hidden" id="x" name="x" />
                                <input type="hidden" id="y" name="y" />
                                <input type="hidden" id="w" name="w" />
                                <input type="hidden" id="h" name="h" />
                                <input type="hidden" name="filename"  value="<?php echo $filename?>"/>
                                <input type="" value="Recortar" class="btn btn-large btn-inverse" />
                        </form>
                </div>
            </div>
	</div>
    </div>
</body>
</html>
