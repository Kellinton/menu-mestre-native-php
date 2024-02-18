<?php 

// Inclui o arquivo da classe home para fazer a conexão
require_once('class/home.php');

// Instancia a classe FuncionarioClass para listar os funcionários
$listaFuncionario = new FuncionarioClass();
$listarF = $listaFuncionario->ListarFuncionarios();

//Estatísticas Itens
$listaItens = new ItensClass();
$listarI = $listaItens->listarItens();

//Estatísticas Vendas Totais
$listaTotalVendas = new VendasClass();
$listarTV = $listaTotalVendas->listarTotalVendas();

//Pratos mais pedidos
$listaPrato = new PratosClass();
$listarP = $listaPrato->Listar();
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
            <!-- Estatísticas de funcionários -->
            <div class="estatisticas">
                <div class="estatisticas-info">
                    <h4><?php echo $listarF['numeroFuncionarios']?></h4>
                    <span>Funcionários</span>
                    <p>Funcionários registrados.</p>
                </div>
                <div class="estatisticas-icon" style="background-color: rgba(179, 8, 8, 0.568)">
                    <i class="ri-user-2-fill" style="color: rgb(179, 8, 8);"></i>
                </div>
            </div>
            <!-- Estatísticas de vendas -->
            <div class="estatisticas">
                <div class="estatisticas-info">
                    <h4>$<?php echo $listarTV['totalVendas']?></h4>
                    <span>Vendas Totais</span>
                    <p>Vendas totais realizadas.</p>
                </div>
                <div class="estatisticas-icon" style="background-color: rgba(61, 236, 38, 0.568);">
                    <i class="ri-money-dollar-circle-fill" style="color: rgb(61, 236, 38);"></i>
                </div>
            </div>
            <!-- Estatísticas de pratos -->
            <div class="estatisticas">
                <div class="estatisticas-info">
                    <h4><?php echo $listarI['numeroItens']?></h4>
                    <span>Pratos</span>
                    <p>Itens registrados.</p>
                    
                </div>
                <!-- Condição que verifica se o funcionário é Atendente -->
                <?php if ($dadosFuncionario['especialidadeFuncionario'] === 'Atendente') : ?>
                    <!-- Se for, exibe o link de acesso negado -->
                    <a href="#" class="link-lock" onclick="acessoNegado(); return false;">Acessar <span class="lock"><i class="ri-lock-line"></i></span></a>
                <?php else : ?>
                    <!-- Se não for, exibe o link para acessar o cardápio -->
                    <a href="index.php?p=cardapio">Acessar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Container dos pedidos (aqui você pode adicionar conteúdo relacionado aos pratos, se necessário) -->
    <div class="home-pratos">
        <div class="pratos-container">
            <div class="pratos-info">
                <div>
                    <h2>Pratos mais pedidos</h2>
                    <p>Visualizar pratos mais pedidos</p>
                </div>
                <div class="pratos-filtro">
                    <button id="filtro-btn-mensal" class="filtro-ativo-prato" onclick="filtrar('todos')" title="Todos">
    
                      <span>Mensal</span>
                    </button>
                    <button id="filtro-btn-semanal" onclick="filtrar('comida')" title="Comida">

                         <span>Semanal</span>
                     </button>
                    <button id="filtro-btn-diario" onclick="filtrar('bebida')" title="Bebida">

                        <span>Diário</span>
                    </button>
                </div>
           </div>
           <div class="pratos-lista">
           <?php foreach($listarP as $linha):?>
              <div class="pratos-elemento">
                <div class="pratos-elemento-info">
                    <div>
                    <?php echo '<img src="./img/produtos/'. $linha['categoriaProduto'] .'/'. $linha['fotoProduto'] . '">' ?>
                    </div>
                    <div>
                        <h4><?php echo $linha['nomeProduto']?></h4>
                        <p><?php echo $linha['descricaoProduto']?></p>
                        <span>Pedido por <?php echo $linha['totalPedidos']?> clientes.</span>
                    </div>
                </div>
                <div class="pratos-elemento-price">
                    <span>R$<?php echo $linha['valorProduto']?></span>
                </div>
              </div>
            <?php endforeach?>
           </div>
        </div>
    </div>
</div>
