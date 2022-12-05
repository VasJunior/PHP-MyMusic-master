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
    if($_GET['back'] == "success"){
        ?><center><div class="confirm">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Sucesso!</strong> Musica adicionado com sucesso !
        </div></center><?php
    }
    ?>
    
    <center><div>
    <form method="post" action="upando.php" enctype="multipart/form-data">
        
    <input type="file" name="file" id="file" class="upload" />
    <label for="file">Escolha um arquivo</label><br>
        
    <input type="text" name="name" placeholder="Nome da musica"/>
    <br><br><br><br><br>
        
    <input type="submit" value="Upload" class="button" name="sendMusic"/>
    </form>
    <a href = "index.php?pagina"><button class="button2">Voltar</button></a>
    </div></center>        

    
    
    </body>
</html>