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
        $conn = Conexao::LigarConexao();
        $query = "";
        $params = [];
    
        if (isset($this->emailFuncionario)) {
            $query = "SELECT * FROM tblfuncionarios WHERE emailFuncionario = :emailFuncionario AND senhaFuncionario = :senhaFuncionario";
            $params = [
                ':emailFuncionario' => $this->emailFuncionario,
                ':senhaFuncionario' => $this->senhaFuncionario,
            ];
        } else if (isset($this->idFuncionario)) {
            $query = "SELECT * FROM tblfuncionarios WHERE idFuncionario = :idFuncionario";
            $params = [
                ':idFuncionario' => $this->idFuncionario,
            ];
        }
    
        $stmt = $conn->prepare($query);
        $stmt->execute($params);
        $lista = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $lista;
    }


}