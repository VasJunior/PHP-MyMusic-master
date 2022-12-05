<html>
<head>
    <title>upando sua musica...</title>
    <link rel="stylesheet" type="text/css" href="estilo/main.css">
</head>
    
<body>
    <?php
        require_once "classes.php";

        $nomeDb = $_FILES['file']['name'];
        $src = $_FILES['file']['tmp_name'];
        $nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            
        $upload = new Upload();
        $upload->uploadMusica($nome, $nomeDb, $src);
    
    ?>
    
</body>
</html>