
    const nav = document.getElementById('menu');
    const gridContainer = document.querySelector('.grid-container');
    const sections = document.querySelectorAll('section');
    const titleSpans = nav.querySelectorAll('.nav-title');
    const contentDiv = document.getElementById('botoes-filtro');


    nav.addEventListener('mouseleave', () => {
        gridContainer.style.gridTemplateColumns = '100px 1fr';
        const titleSpans = nav.querySelectorAll('.nav-title');
        titleSpans.forEach(span => {
            span.style.display = 'none';
        });
        contentDiv.style.opacity = '1'; // aparecer botoes de filtro
        contentDiv.style.visibility = 'visible'; // aparecer botoes de filtro
    });

    nav.addEventListener('mouseenter', () => {
        gridContainer.style.gridTemplateColumns = '300px 1fr';
        const titleSpans = nav.querySelectorAll('.nav-title');
        titleSpans.forEach(span => {
            span.style.display = 'inline-block';
        });
        contentDiv.style.opacity = '0'; // ocultar botoes de filtro
        contentDiv.style.visibility = 'hidden'; // ocultar botoes  de filtro
    });
    titleSpans.forEach(span => {
        span.addEventListener('click', () => {
            // Remove a classe 'ativo' de todas as .nav-title
            titleSpans.forEach(span => {
                span.classList.remove('ativo');
            });

            // Adiciona a classe 'ativo' apenas à .nav-title clicada
            span.classList.add('ativo');

            // Obtém o índice da .nav-title clicada
            const index = Array.from(titleSpans).indexOf(span);

            // Mostra a seção correspondente e oculta as outras
            sections.forEach((section, i) => {
                if (i === index) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });
        });
    });


    function filtrar(categoria) {
        const cardContainer = document.getElementById('card-container');
        const cards = cardContainer.getElementsByClassName('card-show');

        // botões
        const btnTodos = document.getElementById('filtro-btn-todos');
        const btnComida = document.getElementById('filtro-btn-comida');
        const btnBebida = document.getElementById('filtro-btn-bebida');
        const btnSobremesa = document.getElementById('filtro-btn-sobremesa');


        for (const card of cards) {
            const categoriaProduto = card.getAttribute('data-categoria');
            
            if (categoria === 'todos' || categoria === categoriaProduto) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        }

        // Remova a classe 'ativo' de todos os botões
        btnTodos.classList.remove('filtro-ativo');
        btnComida.classList.remove('filtro-ativo');
        btnBebida.classList.remove('filtro-ativo');
        btnSobremesa.classList.remove('filtro-ativo');


        // Adicione a classe 'ativo' apenas ao botão clicado
        if (categoria === 'todos') {
        btnTodos.classList.add('filtro-ativo');
        } else if (categoria === 'comida') {
        btnComida.classList.add('filtro-ativo');
        } else if (categoria === 'bebida') {
        btnBebida.classList.add('filtro-ativo');
        } else if (categoria === 'sobremesa') {
        btnSobremesa.classList.add('filtro-ativo');    
        }
    }

    // Verificação de usuário
    function acessoNegado() {
        Swal.fire({
            icon: 'error',
            title: 'Acesso Negado!',
            text: 'Você não tem permissão para acessar esta página como Chef de Cozinha.',
        });
    }

    // Obter o elemento onde a data atual será exibida
    var dataAtualElement = document.getElementById('data-atual');

    // Obter a data atual
    var dataAtual = new Date();

    // Array de meses
    var meses = ["JANEIRO", "FEVEREIRO", "MARÇO", "ABRIL", "MAIO", "JUNHO", "JULHO", "AGOSTO", "SETEMBRO", "OUTUBRO", "NOVEMBRO", "DEZEMBRO"];

    // Formatar a data no formato desejado
    var dataFormatada = meses[dataAtual.getMonth()] + ' ' + dataAtual.getDate() + ', ' + dataAtual.getFullYear();

    // Exibir a data atual no elemento
    dataAtualElement.textContent = dataFormatada;