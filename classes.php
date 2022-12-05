<?php
class Conexao{
    
    protected $host = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $database = "mymusic";
    
    
    function conectar(){
       
        $host = $this->host;
        $username = $this->username;
        $password = $this->password;
        $database = $this->database;
        
        $token = new MySQLi($host, $username, $password, $database);
        if($token->connect_error){
            echo "Desconectado! Erro: " . $token->connect_error;
        }else{
            echo "Conectado!";
        }
    }
}

class Login extends Conexao{
    
    function logar($nome, $senha){
        
        $host = $this->host;
        $username = $this->username;
        $password = $this->password;
        $database = $this->database;
        
        
        $token = new MySQLi($host, $username, $password, $database);
        $sql = "SELECT * FROM usuarios WHERE usuario_nome = '$nome' AND usuario_senha = '$senha'";

       
        $verifica = mysqli_query($token, $sql);
        session_start();
        
        if (mysqli_num_rows($verifica)>0){
            $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha;
            header('Location: index.php?pagina');
        }else{
            unset ($_SESSION['nome']);
            unset ($_SESSION['senha']);
            header('Location: login.php?back=erro');
        }
        
    }
}

class SignUp extends Conexao{
    
    function cadastrar($nome, $senha, $email){
        
        $host = $this->host;
        $username = $this->username;
        $password = $this->password;
        $database = $this->database;
  
        
        $token = new MySQLi($host, $username, $password, $database); 
        $sqlinsert = "INSERT INTO usuarios (usuario_nome, usuario_senha, usuario_email) VALUES ('$nome' , '$senha' , '$email');";
        $sqlBusca = "SELECT * FROM usuarios WHERE usuario_nome = '$nome' OR usuario_email = '$nome' AND usuario_senha = '$senha'";
        
        $verifica = mysqli_query($token, $sqlBusca);
        
        if(mysqli_num_rows($verifica) == 0){
            if (mysqli_query($token, $sqlinsert)) {
                header('Location: login.php?back=success');
            } else {
                header('Location: cadastro.php?back=erroDb');
        }
        } else {
            header('Location: cadastro.php?back=erroVerifica');
        }
        
        
        
        
    }
}

class Audio extends Conexao{
    
    private $nome;
    private $id;
    private $src;
    
    function listarMusicas(){
        
        $host = $this->host;
        $username = $this->username;
        $password = $this->password;
        $database = $this->database;
        
        //receber o numero da pagina
        $paginaAtual = $_GET['pagina'];
        $pagina = (!empty($paginaAtual)) ? $paginaAtual : 1;
        
        //setar a quantidade de itens por pagina
        $qntResultPg = 3;
        
        //calcular inicio da visualizacao
        $inicio = ($qntResultPg * $pagina) - $qntResultPg;
        
        $token = new MySQLi($host, $username, $password, $database);
        $sql = "SELECT * FROM musicas LIMIT $inicio, $qntResultPg";
        $resultado = mysqli_query($token, $sql);
        
        while($row_musica = mysqli_fetch_assoc($resultado)){
            
            $id = $row_musica['id_musica'];
            $nome = $row_musica['musica_nome'];
            $src = $row_musica['src_musica'];
            
            $player = new Player();
            $player->playerMusica($nome, $id, $src);
        }
        //paginacao - soma a quantidade de musicas
        $queryPg = "SELECT COUNT(id_musica) AS num_result FROM musicas";
        $resultPg = mysqli_query($token, $queryPg);
        $row_pg = mysqli_fetch_assoc($resultPg);
        
        //quantidade de paginas
        $quantidadePg = ceil($row_pg['num_result'] / $qntResultPg);
        
        //limitar os links antes e depois
        $max_links = 2;
        echo "<br><center>";
        $paginar = new Paginacao();
        $paginar -> paginar($pagina, $max_links, $quantidadePg);
        echo "</center>";
        
    }
}

class Upload extends Conexao{
    
    function uploadMusica($nome, $nomeDb, $src){
        $host = $this->host;
        $username = $this->username;
        $password = $this->password;
        $database = $this->database;
        
        ini_set('upload-max-filesize', '10M');
        ini_set('post_max_size', '10M');
        
        $dbTemp = "musicas/".$nomeDb;
        
        $token = new MySQLi($host, $username, $password, $database);
        $sql = "INSERT INTO musicas (musica_nome, src_musica) VALUES ('$nome', '$dbTemp')";
        
        mysqli_query($token, $sql);
        
        $diretorio = 'musicas/';
        
        if(!is_dir($diretorio)){
        mkdir($diretorio, 0777);
        }
        
        move_uploaded_file($src, $diretorio.$nomeDb);
        
        header('Location: upload.php?back=success');
    }
}

class Player{

    function playerMusica($nome, $id, $src){
        ?> 
        <center><div style="background-color:#000000;">
        <h2 style="font-family: cursive; color: #ffffff;"><?php echo $nome; ?></h4>
        <audio id="<?php echo $id ?>" src="<?php echo $src ?>" controls></audio>
        </div></center>
        <?php
    }
    
}

class Paginacao extends Conexao{
    
    
    function paginar($pagina, $max_links, $quantidadePg){
    
        echo "<a href = 'index.php?pagina=1'><button class='button2'>Primeira</button></a>";
        
        for($pagAnt = $pagina - $max_links; $pagAnt < $pagina; $pagAnt++){
            if($pagAnt >= 1){
            echo "<a href = 'index.php?pagina=$pagAnt'><button class='button2'>$pagAnt</button></a>";
            }
        }
        
        echo "<button class='button2' style = 'background-color:#fff; color:#000;'>$pagina</button>";
        
        for($pagSuc = $pagina + 1; $pagSuc <= $pagina+$max_links; $pagSuc++){
            if($pagSuc <= $quantidadePg){
            echo "<a href = 'index.php?pagina=$pagSuc'><button class='button2'>$pagSuc</button></a>";
            }
        }
        
        echo "<a href = 'index.php?pagina=$quantidadePg'><button class='button2'>Ultima</button></a>";
        
    }
}

class Logout {
    
    function deslogar(){
    session_start();
    session_destroy();
    header('Location: index.php?pagina');
    }
}

class Search extends Conexao{
    
    function Pesquisar($pesquisar){
        $host = $this->host;
        $username = $this->username;
        $password = $this->password;
        $database = $this->database;
        
        $token = new MySQLi($host, $username, $password, $database);
        $result = "SELECT * FROM musicas WHERE musica_nome LIKE '%$pesquisar%' LIMIT 5";
        
        $result_final = mysqli_query($token, $result);
        
        while ($row_musica = mysqli_fetch_array($result_final)){
            $id = $row_musica['id_musica'];
            $nome = $row_musica['musica_nome'];
            $src = $row_musica['src_musica'];
            
            $player = new Player();
            $player->playerMusica($nome, $id, $src);
        }
    }
}

class NavBar {

    function gerarNav(){
        
        ?><center><img src="estilo/images/logoMyMusic2.png" style="width:300px;height:170px;"></center>    
        <br><br><?php
        
        session_start();
        if((!isset ($_SESSION['nome']) == true) and (!isset ($_SESSION['senha']) == true))
        {
            $logado = False;
            echo "<center><a class = 'texto'>Ninguem logado</a>";
        }else{
            $logado = True;
            $user = $_SESSION['nome'];
            echo "<center><a class = 'texto'>Bem vindo $user </a>";
        }
        
?>
<br><br>
<ul>
<?php 
if($logado == True){
    
?>      <li class="liMenu"><a href = "logout.php">Logout</a></li>
        <li class="liMenu"><a href = "perfil.php">Perfil</a></li>
<?php
if($user == "admin"){
    
?>      <li class="liMenu"><a href = "upload.php?back">Upload</a></li><?php
        }
}else{
?>
    <li class="liMenu"><a href = "cadastro.php?back">Criar Conta</a></li>
    <li class="liMenu"><a href="login.php?back">Login</a></li>
<?php
}
?>

    <li style = "background-color: #6f0000;"><a href = index.php?pagina>Inicio</a></li>
    <form method="post" action="search.php">
        <li class="liMenu"><input type="submit" value="Ir" ></li>
        <li class="liMenu"><input type="text" name="pesquisar" placeholder="pesquisar"></li>
    </form>
    
</ul><?php    
    }
}
?>

