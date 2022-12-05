<html>
<head>
    <title>Logando....</title>
    </head>
<body>
<?php
    session_start();
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    
    require_once 'classes.php';

    $login = new Login();

    $login->logar($nome, $senha);
    ?>    
    
</body>
</html>