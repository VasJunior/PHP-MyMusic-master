<html>
<head><title>Cadastrando...</title></title></head>
<body>
    
<?php
require_once 'classes.php';
$conexao = new Conexao();//instancia a classe conexao na variavel conexao
$cadastro = new SignUp();//instancia a classe conexao na variavel cadastro

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];

$tamanhoN = strlen($nome);
$tamanhoS = strlen($senha);
$tamanhoE = strlen($email);

if($tamanhoN >= 3 and $tamanhoS >= 3 and $tamanhoE >= 3){
    $conexao->conectar();//chama o metodo conectar da classe conexao
    $cadastro->cadastrar($nome, $senha, $email);//chama o metodo cadastrar da classe conexao
}else{
    
    header('Location: cadastro.php?back=erro');
}


?>
    

</body>
</html>
