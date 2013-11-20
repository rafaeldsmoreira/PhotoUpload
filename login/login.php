<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         <link rel="stylesheet" href="../css/exemplo.css" type="text/css" />
         <link rel="stylesheet" href="../css/main.css" type="text/css" />
  <link rel="stylesheet" href="../css/demos2.css" type="text/css" />
   <script src="../js/capslookTrue.js"></script>
  

</script>
  <title>Galeria de Fotos</title>
    </head>
    <body>
        
        <div class="container">
<div class="row">
<div class="span12">
<div class="jc-demo-box">
    <div class="page-header">
    <h1>PHOTO UPLOAD</h1>
    </div>
        <form name="form1" method="post" action="loga.php">

            <label>Login</label> <input type="text" name="user" placeholder="E-mail ou usuário" style="text-transform:uppercase"/><BR>

            <label>Senha:</label> <input type="password" name="password" onKeyPress="checar_caps_lock(event)" placeholder="Senha"/><BR>
            
            

            <div id="aviso_caps_lock" style="visibility: hidden">
            <table border="0" style="background-color: #FFFFCC; border: 1 solid #FF0000">
            <tr>
            <td width="100%">Atenção: O Caps Lock esta ativado!</td>
            </tr>
            </table><br>
            </div>
            
            
            <input type="submit" name="logar" value="Logar"/>
            <a href="newUser.php">Registrar</a>
            
           

        </form>
            </div>
</div>
</div>
</div>
    </body>
</html>


