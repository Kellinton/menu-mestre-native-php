

<link rel="stylesheet" href="css/inserir.css">


<?php

    if(isset($_POST['nomeProduto'])){

        require_once('class/cardapio.php');

        $nomeProduto = $_POST['nomeProduto'];
        $descricaoProduto = $_POST['descricaoProduto'];
        $valorProduto = $_POST['valorProduto'];
        $categoriaProduto = $_POST['categoriaProduto'];
        // $statusProduto = $_POST['statusProduto'];


        $arquivo = $_FILES['fotoProduto'];

        if($arquivo['error']){
            throw new Exception('Error' . $arquivo['error']);
        }
 

        if(move_uploaded_file($arquivo['tmp_name'], './img/produtos/'. $categoriaProduto .'/' . $arquivo['name'] )){ //salvar na pasta
            $fotoProduto = $arquivo['name']; // gravar no banco de dados
        }else{
            throw new Exception('Error: Não foi possível realizar o upload da imagem');
        }

        $produto = new ProdutoClass();

        $produto->nomeProduto = $nomeProduto;
        $produto->descricaoProduto = $descricaoProduto;
        $produto->valorProduto = $valorProduto;
        $produto->categoriaProduto = $categoriaProduto;
        $produto->fotoProduto = $fotoProduto;
        // $produto->statusProduto = $statusProduto;

        $produto->Inserir();

    }
    
?>

<div class="container">
    <div class="inserir-container">
                                                                                                                                      
        <form class="form-container" action="index.php?p=cardapio&c=inserir" method="POST" enctype="multipart/form-data" class="form">
                <div class="c-container">
                    <div class="c-info">
                        <img src="img/dashboard/add-photo.svg"  id="imagemExibida" width="280px" height="300px">
                        <label required class="enviar-arquivo" for="inputImagem"><i class="ri-camera-fill"></i></label>
                        <input type="file" required name="fotoProduto" id="inputImagem">                   
                        <input required type="text" id="nomeProduto" name="nomeProduto" maxlength="20" placeholder="Título do produto: ">
                        <textarea required name="descricaoProduto" id="descricaoProduto" cols="30" rows="10" maxlength="100" placeholder="Descrição do produto: "></textarea>
                        <input required type="text" name="valorProduto" id="valorProduto" pattern="^[0-9]+(\.[0-9]{1,2})?$" maxlength="7" placeholder="Preço do produto: ">
                    </div>
                    <div>
                        <input required type="radio" id="comida" name="categoriaProduto" value="comida">  
                        <label class="categoria-btn"  for="comida">Comida</label>
                        <input required type="radio" id="bebida" name="categoriaProduto" value="bebida">
                        <label class="categoria-btn" for="bebida">Bebida</label>
                        <input required type="radio" id="sobremesa" name="categoriaProduto" value="sobremesa">
                        <label class="categoria-btn" for="sobremesa">Sobremesa</label>
                    </div>
                    <input class="formBtn" type="submit" value="Confirmar">
                </div>
        </form>

    </div>
</div>

<script>

    document.getElementById('imagemExibida').addEventListener('click', function(){
        document.getElementById('inputImagem').click();
    });

    document.getElementById('inputImagem').addEventListener('change', function(event){ //muda, atualiza
        let imagemExibida = document.getElementById('imagemExibida');
        let arquivo = event.target.files[0]; // um alvo

        if(arquivo){
            let carregar = new FileReader();
            
            carregar.onload = function(e){ 
                imagemExibida.src = e.target.result;
            };

            carregar.readAsDataURL(arquivo);//fazendo recarregamento do arquivo
        }

    });


</script>
