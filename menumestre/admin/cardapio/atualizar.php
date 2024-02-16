<?php

    $id = $_GET['id'];
    require_once('class/cardapio.php');
    $produto = new ProdutoClass($id);




    if(isset($_POST['nomeProduto'])){

        

        $nomeProduto = $_POST['nomeProduto'];
        $descricaoProduto = $_POST['descricaoProduto'];
        $valorProduto = $_POST['valorProduto'];
        $categoriaProduto = $_POST['categoriaProduto'];


        if(!empty($_FILES['fotoProduto']['name'])){ // se nõa estiver vazia o campo do file

            $arquivo = $_FILES['fotoProduto'];

            if($arquivo['error']){
                throw new Exception('Error' . $arquivo['error']);
            }

            if(move_uploaded_file($arquivo['tmp_name'], './img/produtos/'. $categoriaProduto . '/' . $arquivo['name'] )){ //salvar na pasta
                $fotoProduto = $arquivo['name']; // gravar no banco de dados
            }else{
                throw new Exception('Error: Não foi possível realizar o upload da imagem');
            }

        }else{ // se estiver vazia
            $fotoProduto = $produto->fotoProduto;
        }

        

        

        $produto->nomeProduto = $nomeProduto;
        $produto->fotoProduto = $fotoProduto;
        $produto->descricaoProduto = $descricaoProduto;
        $produto->valorProduto = $valorProduto;
        $produto->categoriaProduto = $categoriaProduto;
        $produto->fotoProduto = $fotoProduto;


        $produto->Atualizar();

    }
?>



<link rel="stylesheet" href="css/dashboard.css">
<link rel="stylesheet" href="css/inserir.css">


<!-- Página Atualizar -->
<div class="container">
    <div class="inserir-container">
        
        <form class="form-container" action="index.php?p=cardapio&c=atualizar&id=<?php echo $produto->idProduto?>" method="POST" enctype="multipart/form-data" class="form">
                <div class="c-container">
                    <div class="c-info">
                        <img src="<?php echo './img/produtos/'. $produto->categoriaProduto . '/' . $produto->fotoProduto?>"  id="imagemExibida" width="150px">
                        <label required class="enviar-arquivo" for="inputImagem"><i class="ri-camera-fill"></i></label>
                        <input type="file" required name="fotoProduto" id="inputImagem"> 
                        <input required type="text" id="nomeProduto" name="nomeProduto" maxlength="20" placeholder="Título do produto: " value="<?php echo $produto->nomeProduto?>">
                        <textarea required name="descricaoProduto" id="descricaoProduto" cols="30" rows="10" maxlength="100" placeholder="Descrição do produto: "><?php echo $produto->descricaoProduto?></textarea>
                        <input required type="text" name="valorProduto" id="valorProduto" pattern="^[0-9]+(\.[0-9]{1,2})?$" maxlength="7" placeholder="Preço do produto: " value="<?php echo $produto->valorProduto?>">
                    </div>
                    <div>
                        <input required type="radio" id="comida" name="categoriaProduto" value="Comida">
                        <label class="categoria-btn"  for="comida">Comida</label>
                        <input required type="radio" id="bebida" name="categoriaProduto" value="Bebida">
                        <label class="categoria-btn" for="bebida">Bebida</label>
                        <input required type="radio" id="sobremesa" name="categoriaProduto" value="Sobremesa">
                        <label class="categoria-btn" for="sobremesa">Sobremesa</label>
                    </div>
                    <input class="formBtn" type="submit" value="Confirmar">             
                </div>

        </form>

    </div>

</div>
    <script>
        // Este script JavaScript permite ao usuário clicar na imagem exibida para abrir a caixa de diálogo do seletor de arquivos.
        document.getElementById('imagemExibida').addEventListener('click', function(){
            document.getElementById('inputImagem').click();
        });

        // Este script JavaScript atualiza a imagem exibida na página quando um novo arquivo é selecionado usando o seletor de arquivos.
        document.getElementById('inputImagem').addEventListener('change', function(event){
            // Obtém a referência para a imagem exibida e o arquivo selecionado.
            let imagemExibida = document.getElementById('imagemExibida');
            let arquivo = event.target.files[0]; // Seleciona o primeiro arquivo da lista.

            if(arquivo){
                // Se um arquivo foi selecionado, cria um objeto FileReader para ler o conteúdo do arquivo.
                let carregar = new FileReader();
                
                // Quando o arquivo é carregado com sucesso, atualiza a fonte da imagem exibida com o conteúdo do arquivo.
                carregar.onload = function(e){ 
                    imagemExibida.src = e.target.result;
                };

                // Inicia o carregamento do arquivo como um URL de dados.
                carregar.readAsDataURL(arquivo);
            }
        });
    </script>