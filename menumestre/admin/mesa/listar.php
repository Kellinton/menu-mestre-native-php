<?php 
    // Inclui o arquivo da classe do cardápio para fazer a conexão com o banco de dados
    require_once('class/cardapio.php');

    // Instancia a classe ProdutoClass para listar os produtos
    $listaProduto = new ProdutoClass();

    // Chama o método Listar() para obter a lista de produtos
    $listar = $listaProduto->Listar();
?>

<!-- Inclui os estilos CSS -->
<link rel="stylesheet" href="./css/dashboard.css">
<link rel="stylesheet" href="./css/mesa.css">

<!-- Início do conteúdo HTML -->
<div class="container">
    
    <!-- Botões de filtro -->
    <div class="filtro-btn" id="botoes-filtro">
        <button id="filtro-btn-todos" class="filtro-ativo" onclick="filtrar('todos')" title="Todos">
            <i class="ri-checkbox-circle-fill"></i>
            <span>Disponível</span>
        </button>
        <button id="filtro-btn-comida" onclick="filtrar('comida')" title="Comida">
            <i class="ri-git-repository-private-fill"></i>
            <span>Ocupada</span>
        </button>
        <button id="filtro-btn-bebida" onclick="filtrar('bebida')" title="Bebida">
            <i class="ri-time-fill"></i>
            <span>Reservada</span>
        </button>
        <button id="filtro-btn-sobremesa" onclick="filtrar('sobremesa')" title="Sobremesa">
            <i class="ri-error-warning-fill"></i>
            <span>Manutenção</span>
        </button>
    </div>

    <!-- Container dos cards de produtos -->
    <div class="card-container" id="card-container">
        <!-- Card para adicionar novo prato -->
        <div class="card card-edit" onclick="window.location.href='index.php?p=cardapio&c=inserir'">
            <a href="index.php?p=cardapio&c=inserir">
                <div>
                    <span><i class="ri-add-line"></i></span>
                    <span>Adicionar mesa</span>
                </div>
            </a>
        </div>

        <!-- Loop para exibir os cards de produtos -->
        <?php
        // Obtém o ID mais alto da lista
        $maxId = max(array_column($listar, 'idProduto'));

        // Loop através dos produtos
        foreach($listar as $linha):
        ?>
            <div class="card card-show" data-categoria="<?php echo $linha['categoriaProduto']; ?>">
                <?php if ($linha['statusProduto'] == 'INATIVO' || $linha['statusProduto'] == ''): ?>
                <!-- Botão de ativação/desativação -->
                <div class="card-desativado">
                    <a class="card-desativado-btn" title="Desativado (Clique para ativar)" href="index.php?p=cardapio&c=ativar&id=<?php echo $linha['idProduto']?>">
                        <i class="ri-eye-off-line"></i>
                    </a>
                </div>
                <?php endif; ?>
                
                <!-- Informações do produto -->
                <div class="card-info" onclick="window.location.href='index.php?p=cardapio&c=atualizar&id=<?php echo $linha['idProduto']?>';">
                    <div class="card-stats">
                    <span>Disponivel</span><i class="ri-checkbox-circle-fill"></i>
                    </div>
                    <img src="img/icones/mesa.png" alt="Mesa">                         
                    <h3>Mesa 1</h3>
                    <p>Capacidade: 4</p>  
                    <div class="card-price-pessoas">
                        <span class="card-price">R$150.00</span> 
                        <span class="card-pessoas"><p>2</p><i class="ri-group-fill"></i></span>
                    </div>
                </div>
                
                <!-- Botão de edição -->
                <!-- <div class="card-edit-btn" onclick="window.location.href='index.php?p=cardapio&c=atualizar&id=<?php echo $linha['idProduto']?>';"> 
                    <a title="Editar Cardápio" href="index.php?p=cardapio&c=atualizar&id=<?php echo $linha['idProduto']?>">
                        <span><i class="ri-edit-2-line"></i></span>
                        <span>Mesa 01</span>
                    </a>                 
                </div> -->
            </div>
        <?php endforeach?>
    </div>
</div>
