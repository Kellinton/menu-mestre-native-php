<?php

require_once('conexao.php');
 
class ProdutoClass
{
    // ATRIBUTOS
    public $idProduto;
    public $nomeProduto;
    public $descricaoProduto;
    public $valorProduto;
    public $categoriaProduto;
    public $fotoProduto;
    public $statusProduto;
 
    // MÉTODOS
    public function __construct($id = false) //verificar se o id foi passado
    {
        if($id){
            $this->idProduto = $id;
            $this->Carregar();
        }
    }


    public function listar(){
        $query = "SELECT * FROM tblprodutos ORDER BY idProduto DESC;";
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($query); // retorna o resultado que está na query
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function Inserir(){
        $query = "INSERT INTO tblprodutos (nomeProduto, descricaoProduto,  valorProduto, categoriaProduto, fotoProduto) 
                   VALUES('".$this->nomeProduto."', '".$this->descricaoProduto."', '".$this->valorProduto."', '".$this->categoriaProduto."', '".$this->fotoProduto."');";
        $conn = Conexao::LigarConexao();
        $conn->exec($query);
        //echo "<script>document.location='index.php?p=cardapio'</script>";

        echo "<script>
        Swal.fire({
            title: 'Produto adicionado!',
            text: 'Foi adicionado com sucesso.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?p=cardapio';
        });
      </script>";
    }

    public function Carregar(){
        $query = "SELECT * FROM tblprodutos WHERE idProduto = " . $this->idProduto;
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($query); 
        $lista = $resultado->fetchAll();

        foreach($lista as $linha){ //objeto que contém todos os dados

            $this->nomeProduto = $linha['nomeProduto'];
            $this->descricaoProduto = $linha['descricaoProduto'];
            $this->valorProduto = $linha['valorProduto'];
            $this->categoriaProduto = $linha['categoriaProduto'];
            $this->fotoProduto = $linha['fotoProduto'];
            $this->statusProduto = $linha['statusProduto'];
        }
    }

    public function Atualizar(){
        $query = "UPDATE tblprodutos SET 
            nomeProduto = '".$this->nomeProduto."', 
            descricaoProduto = '".$this->descricaoProduto."', 
            valorProduto = '".$this->valorProduto."',
            categoriaProduto = '".$this->categoriaProduto."',
            fotoProduto = '".$this->fotoProduto."'          
        WHERE tblprodutos.idProduto = " . $this->idProduto;

        $conn = Conexao::LigarConexao();
        $conn->exec($query);
        // echo "<script>document.location='index.php?p=cardapio'</script>";
        
        echo "<script>
        Swal.fire({
            title: 'Produto atualizado!',
            text: 'Foi atualizado com sucesso.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?p=cardapio';
        });
      </script>";

    }

    public function Desativar(){
        $query = "UPDATE tblprodutos SET 
            statusProduto = 'INATIVO' 
        WHERE tblprodutos.idProduto = " . $this->idProduto;
        
        $conn = Conexao::LigarConexao();
        $conn->exec($query);
        // echo "<script>document.location='index.php?p=cardapio'</script>";
         echo "<script>
         Swal.fire({
             title: 'Desativado!',
             text: 'O item não está mais visível no site.',
             icon: 'success',
             confirmButtonText: 'OK'
         }).then(() => {
             document.location.href = 'index.php?p=cardapio';
         });
       </script>";
    }
    
    public function Ativar(){
        $query = "UPDATE tblprodutos SET 
            statusProduto = 'ATIVO' 
        WHERE tblprodutos.idProduto = " . $this->idProduto;
        
        $conn = Conexao::LigarConexao();
        $conn->exec($query);
        // echo "<script>document.location='index.php?p=cardapio'</script>";
        echo "<script>
        Swal.fire({
            title: 'Ativado!',
            text: 'O item está visível no site.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?p=cardapio';
        });
      </script>";
    }
}