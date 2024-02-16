<?php

require_once('conexao.php');

class Login{

    //ATRIBUTOS

    public $idFuncionario;
    public $nomeFuncionario;
    public $dataNascFuncionario;
    public $especialidadeFuncionario;
    public $emailFuncionario;
    public $senhaFuncionario;
    public $telefoneFuncionario;
    public $dataContratoFuncionario;
    public $statusFuncionario;
    public $fotoFuncionario;

    //MÉTODOS

    public function VerificarLogin(){

        if(isset($this->emailFuncionario)){
            $query = "SELECT * FROM tblfuncionarios WHERE emailFuncionario = '".$this->emailFuncionario."' AND senhaFuncionario = '".$this->senhaFuncionario."'";
        }else{
            if(isset($this->idFuncionario)){
                $query = "SELECT * FROM tblfuncionarios WHERE idFuncionario = ".$this->idFuncionario;
            }
        }

        // $query = "SELECT * FROM tblFuncionario WHERE emailFuncionario = '".$this->emailUsuario."' AND senhaUsuario = '".$this->senhaUsuario."'";

        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($query);
        $lista = $resultado->fetch(PDO::FETCH_ASSOC);

        return $lista;

    }


}