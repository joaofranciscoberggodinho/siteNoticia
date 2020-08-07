<?php
class Usuario{
    public $id;
    public $nome;
    public $email;
    public $senha;

    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function setNome($nome){
        $this->nome=$nome;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function setEmail($email){
        $this->email=$email;

    }
    
    public function getEmail(){
        return $this->email;
    }

    public function setSenha($senha){
        $this->senha=$senha;
    }
    
    public function getSenha(){
        return $this->senha;
    }


    public function index(){
        $this->listar();
    }

    public function listar(){

        if(!isset($_SESSION['usuario'])){
            header("Location: ".HOME_URI);
            return;
        }

        $conexao=Conexao::getInstance();

        $resultado=$conexao->query(
            "SELECT id, nome, email FROM usuario ORDER BY id ASC"
        );

        $usuarios=null;
        while($usuario=$resultado->fetch(PDO::FETCH_OBJ)){
            $usuarios[]=$usuario;
        }

        include HOME_DIR."view/paginas/usuarios/listar.php";
    }

    public function criar(){
        include HOME_DIR."view/paginas/usuarios/form_usuario.php";
    }

    public function salvar(){

        if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['email']) && !empty($_POST['email'])){

            $nomeR = $_POST['nome']; 
            $emailR = $_POST['email'];

            $conexao = Conexao::getInstance("localhost", "godinho", "100580", "news");

            $conexao->query("INSERT INTO usuario (id,nome,email,senha) VALUES (null,'{$nomeR}','{$emailR}',MD5('info123'))");
    
            $idS = $conexao->query("SELECT id FROM usuario WHERE nome = '$nomeR' AND email = '$emailR'");

            $id = $idS->fetch(PDO::FETCH_OBJ);

            var_dump($id);
            include HOME_DIR."view/paginas/usuarios/altera_senha.php";
        }else{
            echo "Erro ao criar usuário";
        }

    
    }

    public function alterar_senha(){

        $conexao = Conexao::getInstance("localhost", "godinho", "100580", "news");

        $senhaS = md5($_POST['senha']);
        $id = $_POST['id'];  

        $update = $conexao->prepare("UPDATE usuario SET senha = ? WHERE id = ?");
        $update->execute([$senhaS, $id]);


        include HOME_DIR."view/paginas/usuarios/login.php";
    }

    public function exibir($id){
        echo "O id do usuario é".$id;
    }

    public function login(){
        
        include HOME_DIR."view/paginas/usuarios/login.php";

    }

    public function autenticar(){
        $conexao = Conexao::getInstance("localhost", "godinho", "100580", "news");

        $emailR = $_POST['email'];
        $senhaS = md5($_POST['senha']);

        $login=$conexao->query("SELECT id, nome, email FROM usuario WHERE email = '$emailR' AND senha = '$senhaS'");

        if(!$login){
            return;
        }

        $usuario = $login->fetch(PDO::FETCH_OBJ);

        $_SESSION['usuario'] = array('id'=>$usuario->id,'nome'=>$usuario->nome,'email'=>$usuario->email);

        header("Location: ".HOME_URI."usuario");
    }

    public function logout(){
        unset($_SESSION['usuario']);
        header("Location: ".HOME_URI);
    }


}