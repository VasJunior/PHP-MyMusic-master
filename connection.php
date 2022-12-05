<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "mymusic";


$conexao = new MySQLi($host, $username, $password, $db);
if($conexao->connect_error){
   echo "Desconectado! Erro: " . $conexao->connect_error;
}else{
   echo "Conectado!";
}


?>