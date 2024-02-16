<!-- Este código PHP verifica o valor da variável 'c' na URL usando $_GET.
Dependendo do valor de 'c', ele incluirá dinamicamente diferentes arquivos PHP. -->

<?php


$pagina = @$_GET['c'];

if($pagina == NULL){
    require_once('listar.php');
}else{
    if($pagina == 'inserir'){
        require_once('inserir.php');
    }
    if($pagina == 'atualizar'){
        require_once('atualizar.php');
    }
    if($pagina == 'desativar'){
        require_once('desativar.php');
    }
    if($pagina == 'ativar'){
        require_once('ativar.php');
    }
}
