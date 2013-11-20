<!DOCTYPE html>
<htm>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link rel="stylesheet" type="text/css" href="../css/default.css">
        <link rel="stylesheet" type="text/css" href="../css/menu.css">
    </head>
<body>
       
    <div id="menu">
        <ul class="menu">
              <li><a href="visualizeAllAlbum.php" title="Albuns">ALBUNS</a></li>
              <li><a href="home.php" title="Fotos">FOTOS</a></li>
              <li><a href="upload.php" title="Fotos">NOVO ALBUM</a></li>
              <li><a href="../action/deleteFromAction.php">DELETAR TODOS</a> </li>
              <li><a href="../login/logout.php">LOGOUT</a> </li>
              <li><a href="../login/newUser.php?id=<?php echo $idUserSection?>">EDITAR USUÁRIO</a></li>
        </ul>
    </div>
    
    <div id="span"> 
        <span id="newCliError" class="error"></span>
    </div>
        
</body>
</htm>
