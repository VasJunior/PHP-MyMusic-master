<html>
    <head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="estilo/main.css">
    </head>
    
    <body>
        
        <?php 
require_once 'classes.php';
$navBar = new NavBar();
$navBar->gerarNav();
    ?><br>
        
    <?php
    if($_GET['back'] == "erro"){
        ?><center><div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Aviso!</strong> usuario ou senha incorretos !
        </div></center><?php
    }
    ?>
    <?php
    if($_GET['back'] == "success"){
        ?><center><div class="confirm">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Sucesso!</strong> Conta criada com sucesso, por favor efetue seu login!
        </div></center><?php
    }
    ?>
        
    
    <center><div>
    <form name="signup" method="post" action="logando.php">
    <input type="text" name="nome" placeholder="Nome de Usuario ou E-mail"/><br>
    <input type="password" name="senha" placeholder="Senha"/><br>
    <input type="submit" value="Login" class="button"/>
    </form>
    <a href = "index.php?pagina"><button class="button2">Voltar</button></a>
</div></center>    

    
    
    </body>
</html>