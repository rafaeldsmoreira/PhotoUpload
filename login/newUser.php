<!DOCTYPE html>
<htm>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../css/exemplo.css" type="text/css" />
         <link rel="stylesheet" href="../css/main.css" type="text/css" />
  <link rel="stylesheet" href="../css/demos2.css" type="text/css" />
  <script type="text/javascript" src="../js/checksUser.js"></script>
  
        <title>Registro de usuário</title></head>
    <body>
        <div class="container">
            <div class="container">
        
         
<div class="row">
    
<div class="span12">
<div class="jc-demo-box">
    <div class="page-header">
    <h1>PHOTO UPLOAD-Registro de usuário</h1>
    </div>
    <li><a href="../index.php" title="Home">Home</a></li>
        <form id="newUser" method="post" action="../action/insertUserAction.php"> 
           <?php require '../action/editUserAction.php'; ?>

           <input type="text" id="name" name="name" placeholder="Nome completo"value="<?php echo $listUser->getName(); ?>" style="text-transform: uppercase"/>
            <input type="hidden" name="id" value="<?php echo $listUser->getId(); ?>">

            <label>E-Mail:</label>
            <input type="text" id="email" name="email" placeholder="E-mail"  value="<?php echo $listUser->getEmail(); ?>" style="text-transform: uppercase"/> 

            <label>Usuário:</label>
            <input type="text" id="user" name="user" placeholder="Usuário" value="<?php echo $listUser->getUser(); ?>" style="text-transform: uppercase"/>

             <label>Senha:</label> 
             <input type="password" id="password" name="password" required pattern="[a-z]{5}" placeholder="5 letras"  onchange="form.password.pattern = this.value;"/>
              <br />
            <label>Repita a senha:</label>  <input type="password" required pattern="[a-z]{5}" placeholder="5 letras"/> 

            <input type="submit" name="enviar" value="Registrar" onclick="setForm()"/>
            <input type="reset" value="Limpar" />
             
        </form>

    </div>
</div>
</div>
</div>
  

    </body>
</htm>


