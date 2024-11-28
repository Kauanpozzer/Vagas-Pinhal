<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
    <link rel="shortcut icon" tpe="" href="img/VagasPinhal.svg" style="width: 800px;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Vagas Pinhal</title>
</head>

<body>
    <div class="containers">

        <nav>
            <div class="menu-bar">
                <div class="logo"><img src="img/VagasPinhal.svg" alt=""></div>
                <div class="div-botao">
                    <a href="login.php" style="text-decoration: none;">
                        <button id="entrar" style="color: #fff; display: block;">Entrar
                            <hr style="margin: 5;">
                        </button>
                    </a>
                    <a href="cadastro.php" class="link_cadastro">
                        <button id="cadastro">Cadastre-se Gratuitamente</button>
                    </a>
                </div>
            </div>

        </nav>

        <div class="header-area">
            <header class="header-login">
                <div class="formulario">

                    <p>Cadastre-se agora e <br> descubra a sua próxima <br> vaga e oportunidades <br> profissionais</p>
                    <form action="cadastro.php" method="POST">

                        <div class="input-items">
                            <label for="email">E-mail</label>

                            <input type="email" id="email" name="email">
                        </div>

                        <div>
                            <label for="senha">Senha</label>

                            <input type="password" id="senha" name="senha">
                        </div>

                        <div class="itemsCadastro">
                            <a href="login.php">Já tenho uma conta</a>
                            <a id="btnCriar" href="cadastro.php">Criar conta</a>
                        </div>


                    </form>

                </div>

            </header>
            <div class="imagem">
                <img src="img/homemtrabalhando.svg" alt="">
            </div>
        </div>
        <div class="conteudoSobre">
            <hr>

            <li>
                <div class="itens--pimg">
                    <p style="font-size: 30px;" class="animate__animated animate__bounce">Estamos ao seu lado <br>
                        para apoiar sua jornada <br>
                        profissional</p>

                    <img src="img/image.png" alt="" id="mulherRecebendoVagas">
                </div>

                <div class="all--box">
                    <div class="box-iten">
                        <span class="material-symbols-outlined">contacts_product</span>

                        <div>
                            <h3> Vagas de emprego para todos os perfis </h3>

                            <p>Estamos em todo o Brasil, com oportunidades para diversas
                                áreas. Além disso, não importa se é seu primeiro emprego
                                ou se você já tem uma carreira sólida. Divulgamos vagas de
                                trabalho para todos os níveis.</p>
                        </div>
                    </div>

                    <div class="box-iten">
                        <span class="material-symbols-outlined">menu_book</span>
                        <div>
                            <h3>Conteúdos para sua jornada profissional </h3>
                            <div class="box-iten-text">
                                <p>Não basta se candidatar às vagas, é preciso se <br>
                                    preparar para toda a jornada: do currículo à <br>
                                    entrevista de emprego. Por isso, conte com <br>
                                    conteúdos para todos os momentos.
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="box-iten">
                        <span class="material-symbols-outlined">public</span>

                        <div>
                            <h3>Grandes empresas estão no Vagas</h3>
                            <p>Mais de 2.000 empresas divulgam oportunidades de trabalho em nosso site de empregos.</p>
                        </div>
                    </div>
                </div>

            </li>

            <hr>
        </div>

        <section>
            <header class="header-box">
                <div class="tips__title-content">
                    <h2>Dicas para crescer profissionalmente</h2>
                </div>
                <p class="tips__subtitle">Fique por dentro</p>


                <ul class="tips__list">

                    <li class="tips__article-wrapper">
                        <article class="tips__article">
                            <a href="entrevista-emprego.html"><img class="tips__image" src="img/HomemComprimentando.png" height="363" width="281"></a>
                            <div class="tips__content">
                                <h5 class="tips__text">25 perguntas da entrevista de emprego e suas melhores
                                    respostas</h5>
                            </div>
                        </article>
                    </li>

                    <li class="tips__article-wrapper">
                        <a class="tips__item-link">
                            <article class="tips__article">
                                <a href="habilidades-e-competencias.html"><img class="tips__image" src="img/HomemSorrindo.png"></a>
                                <div class="tips__content">
                                    <h5 class="tips__text">15 habilidades e competências que valorizam o currículo</h5>
                                </div>
                            </article>
                        </a>
                    </li>

                    <li class="tips__article-wrapper">
                        <a class="tips__item-link">
                            <article class="tips__article">
                                <a href="resumo-profissional-qualificacoes-e-diferenciais.html"><img class="tips__image" src="img/Digitando.png"></a>
                                <div class="tips__content">
                                    <h5 class="tips__text">Resumo profissional: dicas e modelos para destacar seus
                                        diferenciais</h5>
                                </div>
                            </article>
                        </a>
                    </li>

                </ul>
            </header>
        </section>

        <div class="container">
            <footer>
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">

                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>

                </ul>

            </footer>
            <div>
                <p class="text-center text-body-secondary">© 2024 VagasPinhal, Inc</p>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>