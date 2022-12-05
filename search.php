<html>
    <head>
        <title>Pesquisando</title>
        <link rel="stylesheet" type="text/css" href="estilo/main.css">
    </head>
    <body>
    <?php 
require_once 'classes.php';
$navBar = new NavBar();
$navBar->gerarNav();
    ?>
    <br>
    <?php
    require_once "classes.php";

    $a = $_POST['pesquisar'];
    $pesquisar = new Search();
    $pesquisar->pesquisar($a);
        ?>
    </body>
    </html>