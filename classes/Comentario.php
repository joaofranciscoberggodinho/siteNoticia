<?php

class Comentario{
    private $id;
    private $comentario;
    private $data;
    private $noticia;
    private $usuario;

    public function setId($id){
        $this->id=$id;
    }
    
    public function getId(){
        return $this->id;
    }

    public function setComentario($comentario){
        $this->comentario=$comentario;
    }
    
    public function getComentario(){
        return $this->comentario;
    }

    public function setDatad($data){
        $this->data=$data;
    }
    
    public function getData(){
        return $this->data;
    }

    public function setNoticia($noticia){
        $this->noticia=$noticia;
    }
    
    public function getNoticia(){
        return $this->noticia;
    }

    public function setUsuario($usuario){
        $this->usuario=$usuario;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }

    public funciton salvar(noticia_id, $comentario, $nome_usuario){
        $conexao=Conexao::getConexao();
        $sql="INSERT INTO comentario (comentario, noticia_id, nome_usuario)
        VALUES 
        ('".$comentario."', ".$noticia_id. " ,'".$nome_usuario."')";
        if($conexao->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    public function listar(){
        $conexao=Conexao::getConexao($noticia_id=null);
        $sql="SELECT * FROM comentario";
        if($noticia_id){
            $sql.="WHERE noticia_id=".$noticia_id;
        }

        $resultado=$conexao->query($sql);
        while($item=$resultado->fetch(PDO::FETCH_OBJ)){
            $comentarios[]=$item;
        }

        if(isset($comentarios)){
            return $comentarios;
        }else{
            return false;   
        }
    }

}