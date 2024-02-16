<?php 

// Inclui o arquivo da classe home para fazer a conexão
require_once('class/home.php');

// Instancia a classe FuncionarioClass para listar os funcionários
$listaFuncionario = new FuncionarioClass();
$listarF = $listaFuncionario->ListarFuncionarios();

?>

<!-- Inclui os estilos CSS -->
<link rel="stylesheet" href="css/dashboard.css">
<link rel="stylesheet" href="css/home.css">

<!-- Início do conteúdo HTML -->
<div class="home-container">
    <!-- Container das estatísticas -->
    <div class="home-estatisticas">
        <!-- Cabeçalho com o nome do funcionário e a data atual -->
        <div class="cabecalho-container">
            <h2>Olá, <?php echo $dadosFuncionario['nomeFuncionario']?></h2>
            <p id="data-atual"></p>
        </div>
        <!-- Container das estatísticas -->
        <div class="estatisticas-container">
            <!-- Estatísticas de clientes -->
            <div class="estatisticas">
                <div class="estatisticas-info">
                    <h4>22</h4>
                    <span>Clientes</span>
                    <p>Clientes registrados.</p>
                </div>
                <div class="estatisticas-icon"  style="background-color: rgba(226, 208, 45, 0.568);">
                    <i class="ri-user-smile-fill"  style="color: rgb(226, 208, 45);"></i>                 
                </div>
            </div>
            <!-- Estatísticas de pedidos -->
            <div class="estatisticas">
                <div class="estatisticas-info">
                    <h4>10</h4>
                    <span>Pedidos</span>
                    <p>Pedidos realizados.</p>
                </div>
                <div class="estatisticas-icon" style="background-color: rgba(45, 169, 226, 0.568);">
                    <i class="ri-file-list-3-fill" style="color: rgb(45, 169, 226);"></i>
                </div>
            </div>
            <!-- Estatísticas de vendas -->
            <div class="estatisticas">
                <div class="estatisticas-info">
                    <h4>15</h4>
                    <span>Vendas</span>
                    <p>Vendas feitas.</p>
                </div>
                <div class="estatisticas-icon" style="background-color: rgba(61, 236, 38, 0.568);">
                    <i class="ri-money-dollar-circle-fill" style="color: rgb(61, 236, 38);"></i>
                </div>
            </div>
            <!-- Estatísticas de funcionários -->
            <div class="estatisticas">
                <div class="estatisticas-info">
                    <h4>4</h4>
                    <span>Funcionários</span>
                    <p>Funcionários registrados.</p>
                </div>
                <div class="estatisticas-icon" style="background-color: rgba(179, 8, 8, 0.568)">
                    <i class="ri-user-2-fill" style="color: rgb(179, 8, 8);"></i>
                </div>
            </div>
            <!-- Estatísticas de pratos -->
            <div class="estatisticas">
                <div class="estatisticas-info">
                    <h4>310</h4>
                    <span>Pratos</span>
                    <p>Itens registrados no cardápio.</p>
                    
                </div>
                <!-- Condição que verifica se o funcionário é Chef de Cozinha -->
                <?php if ($dadosFuncionario['especialidadeFuncionario'] === 'Chef de Cozinha') : ?>
                    <!-- Se for, exibe o link de acesso negado -->
                    <a href="#" class="link-lock" onclick="acessoNegado(); return false;">Acessar <span class="lock"><i class="ri-lock-line"></i></span></a>
                <?php else : ?>
                    <!-- Se não for, exibe o link para acessar o cardápio -->
                    <a href="index.php?p=cardapio">Acessar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Container dos pedidos (aqui você pode adicionar conteúdo relacionado aos pedidos, se necessário) -->
    <div class="home-pedidos">
        <div class="teste2">

        </div>
    </div>
  
    <!-- <div class="user-container">
        <div class="home.top">
        </div>
        <div class="home.stats">
            <div class="funcionarios.stats">Func</div>
            <div class="produtos.stats">Prod</div>
            <div class="vendas.stats">Venda</div>
        </div> 
    </div> -->
</div>
