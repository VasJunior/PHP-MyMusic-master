<html>
<head>
<title>My Music</title>
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
        <strong>Cuidado!</strong> Cada campo deve ter no minimo 3 CARACTERES
        </div></center><?php
    }
    ?>
    <?php
    if($_GET['back'] == "erroBd"){
        ?><center><div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Erro!</strong> Ocorreu um erro ao criar sua conta, Repita o processo por favor tente novamente
        </div></center><?php
    }
    ?>
    <?php
    if($_GET['back'] == "erroVerifica"){
        ?><center><div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Erro!</strong> Usuário já cadastrado
        </div></center><?php
    }
    ?>
    
<center><div>
<form name="signup" method="post" action="cadastrando.php">
    <input type="text" name="nome" placeholder="Nome de Usuario"/><br>
    <input type="password" name="senha" placeholder="Senha"/><br>
    <input type="text" name="email" placeholder="E-Mail"/>
    <br><br>
    <input type="submit" value="Cadastrar" class="button"/>
</form>
    <a href = "index.php?pagina"><button class="button2">Voltar</button></a>
</div></center>    

</body>

</html>


