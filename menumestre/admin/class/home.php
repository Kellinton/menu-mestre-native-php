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
        $lista = $resultado->fetch(PDO::FETCH_ASSOC);
        return $lista;
    }


}

class ItensClass{

    //ATRIBUTOS


    public $numeroItens;


    //METODO


    public function listarItens(){
        $query = "SELECT * FROM vwnumeroitens";
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($query);
        $lista = $resultado->fetch(PDO::FETCH_ASSOC);
        return $lista;
    }

}

class VendasClass{

    
    //ATRIBUTOS


    public $totalVendas;


    //METODO


    public function listarTotalVendas(){
        $query = "SELECT * FROM vwnumerovendas";
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($query);
        $lista = $resultado->fetch(PDO::FETCH_ASSOC);
        return $lista;
    }
}

class PratosClass{

    
    //ATRIBUTOS


    public $idProduto;
    public $nomeProduto;
    public $descricaoProduto;
    public $valorProduto;
    public $categoriaProduto;
    public $fotoProduto;
    public $statusProduto;
    public $totalPedidos;


    //METODO


    public function listar(){
        $query = "SELECT * FROM vwpratosmaispedidos";
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($query); // retorna o resultado que está na query
        $lista = $resultado->fetchAll();
        return $lista;
    }
}