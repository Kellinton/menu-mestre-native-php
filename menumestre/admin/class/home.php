<?php

require_once('conexao.php');


class FuncionarioClass{

    //ATRIBUTOS

    public $numeroFuncionarios;


    //METODO


    public function listarFuncionarios(){
        $query = "SELECT * FROM vwnumerofuncionarios";
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }


}