<?php

 session_start(); //iniciar sessão


 //se acessar a página admin, ele carrega a página do login por padrão
 if(!isset($_SESSION['login'])) {//isset verifica se foi inicializado algum valor. (lógica: se não estiver logado, não existir 'login' como parâmetro)
    header("Location:login.php"); //puxando a página do login
 }

 require_once('class/login.php');
 $funcionario = new Login();
 $funcionario->idFuncionario = $_SESSION['idUser'];
 $dadosFuncionario = $funcionario->VerificarLogin();

 //var_dump($dadosFuncionario);
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Menu Mestre | Dashboard</title>
    <link rel="shortcut icon" href="./img/dashboard/logo.png" type="image/x-icon">


    <!--ICONES-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" integrity="sha512-HXXR0l2yMwHDrDyxJbrMD9eLvPe3z3qL3PPeozNTsiHJEENxx8DH2CxmV05iwG0dwoz5n4gQZQyYLUNt1Wdgfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />



    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.12.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.12.6/dist/sweetalert2.min.css">

    <!--CSS-->
    <link rel="stylesheet" href="./css/dashboard.css">

</head>

<body>

    <div class="grid-container">
        <header>
                <img class="logo" src="./img/logo/MM-Logo-dark.svg" alt="">
            <div>
                <div class="perfil-info">
                    <div class="funcionario-img">
                        <?php echo '<img class="" src="./img/' . $dadosFuncionario['fotoFuncionario'] . '">' ?>
                        <span title="Ativo!"></span>
                    </div>
                    <div class="perfil-title">
                        <span class="perfil-nome"><?php echo $dadosFuncionario['nomeFuncionario']?></span> 
                        <span class="perfil-cargo"><?php echo ($dadosFuncionario['especialidadeFuncionario']) === 'Gerente' ? 'Gerente' : 'Atendente'?></span>
                    </div>
                </div>
                <form class="login" action="logout.php" method="POST">                 
                    <button class="btn-sair" title="Sair"><span class="sair-icon"><i class="ri-logout-circle-r-line"></i></span></i><span>Sair</span></button>
                </form>
            </div>
        </header>
        <nav id="menu">
            <div class="navbar">
                <ul> 

                    <li><a href="index.php?p=home"><span class="nav-icon"><i class="ri-community-fill"></i></span><span class="nav-title">Home</span></a></li>
                    <li><a href="index.php?p=mesa"><span class="nav-icon"><i class="ri-calendar-todo-fill"></i></span><span class="nav-title">Mesas</span></a></li>                  
                                    
                    <!-- Verificação se é Gerente ou Atendente -->
                    <?php if ($dadosFuncionario['especialidadeFuncionario'] === 'Atendente') : ?>
                        <li class="acesso-negado" >
                            <a href="#" onclick="acessoNegado(); return false;">
                                <span class="nav-icon"><i class="ri-restaurant-line"></i></span>
                                <span class="nav-title">Cardápio</span>
                            </a><span class="lock"><i class="ri-lock-line"></i></span>
                        </li>
                    <?php else : ?>
                        <li>
                            <a href="index.php?p=cardapio">
                                <span class="nav-icon"><i class="ri-restaurant-line"></i></span>
                                <span class="nav-title">Cardápio</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <!-- <li><a href="index.php?p=funcionario"><span class="nav-icon"><i class="ri-shake-hands-line"></i></span><span class="nav-title">Funcionários</span></a> 
                    <li><a href="index.php?p=configuracao"><span class="nav-icon"><i class="ri-settings-2-line"></i></span><span class="nav-title">Configurações</span></a> 
                    <li><a href="index.php?p=perfil"><span class="nav-icon"><i class="ri-user-line"></i></span><span class="nav-title">Perfil</span></a></li>  -->
                        
                    </li>
                </ul>
            </div>
        </nav>

        <main>

          <?php


            $pagina = @$_GET['p'];

            switch ($pagina) {
                case 'home':
                    require_once('home/home.php');
                    break;
                case 'cardapio':
                    require_once('cardapio/cardapio.php');
                    break;
                case 'mesa':
                    require_once('mesa/mesa.php');
                    break;
                default:
                    require_once('home/home.php');
                    break;
            }



            // if($pagina == NULL){
            //     echo "Dashboard";
            // }else{
            //     if($pagina == 'servico'){
            //         require_once('servico/servico.php');
            //     }
            // }

           ?>


        </main>
    </div>



<!--js-->
<script src="./scripts/main.js"></script>

</body>
</html>
