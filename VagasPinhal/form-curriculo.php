<?php
if (session_status() === PHP_SESSION_NONE) session_start(); // Iniciar sessão

//verifica a sessão
if (!isset($_SESSION['id'])) {
    header('Location: logoff.php');
    exit;
}
include_once 'conexao.php';

$sql = "SELECT * FROM  usuario;";
$resultado = mysqli_query($conexao, $sql);

$dados_form = filter_input_array(INPUT_POST, FILTER_DEFAULT);



if (!empty($dados_form['btn_salvar'])) {
    $arquivo = $_FILES['foto'];
    //  var_dump($dados_form);
    //    var_dump($arquivo);
    //  echo 'oi';

    if ((isset($arquivo['name']))) {
        $nome = $_POST['nome'];
        $cargo = $_POST['cargo'];
        $foto = $_FILES['foto']['name'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $resumo = $_POST['resumo'];


        $sql = "INSERT INTO curriculos (nome, cargo, foto, endereco, telefone, email, resumo) VALUES ('$nome', '$cargo', '$foto', '$endereco', '$telefone', '$email', '$resumo')";

        $cad_curriculo = mysqli_query($conexao, $sql);
        if ($cad_curriculo) {
            echo "<p style='color:Green;'>user cadastrado com sucesso</p>";
        } else {
            echo "<p style='color:#f00;'>Erro: user nao cadastrado com sucesso</p>";
        }
    }
}




?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Gerador de Currículo</title>
    <style>
        #perfilLogo {
            width: 50px;
            height: 50px;
        }

        #foto_edit {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>

    <header>
        <a href="index.php">
            <img src="img/VagasPinhal.svg" alt="" class="img_vagasPinhal">
        </a>
        <div id="nav_bar1">
            <a href="user-area.php">
                <div id="nav_home">
                    <span class="material-symbols-outlined">Home</span>
                    <a href="user-area.php">HOME
                        <hr>
                    </a>
                </div>
            </a>

            <a href="#">
                <span class="material-symbols-outlined">work</span>
            </a>

            <a href="#">
                <span class="material-symbols-outlined">chat</span>
            </a>

            <a href="#">
                <span class="material-symbols-outlined">notifications</span>
            </a>

            <a href="#">
                <span class="material-symbols-outlined">grid_view</span>
            </a>
        </div>
        <div id="nav_usuario" class="d-flex h-7">

            <div class="User_name">
                <div id="userName" style="color: white;"><?php echo $_SESSION['nome']; ?></div>
            </div>
            <div class="dropdown">
                <div id="iten-imgArrow">
                    <div class="logo">
                        <?php
                        if (!$_SESSION['id'] = 0) {
                            $sql = "SELECT * FROM  usuario";
                            $result = mysqli_query($conexao, $sql);
                            $dados = $result->fetch_assoc();
                            $fotopf = $dados['logo_perfil'];
                            $_foto = "<a href='form-curriculo.php'><img src='logo/$fotopf' class='user-menu'></a>";

                            echo "$_foto";
                        }
                        ?>
                    </div>
                    <div class="dropdown">
                        <span class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none;"></span>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="logoff.php">Desconectar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
    </header>

    <div class="area_perfil">
        <div class="logo d-flex flex-column align-items-center g-5">
            <?php
            if (!$_SESSION['id'] = 0) {
                $sql = "SELECT * FROM  usuario";
                $result = mysqli_query($conexao, $sql);
                $dados = $result->fetch_assoc();
                $fotopf = $dados['logo_perfil'];
                $_foto = "<a href='form-curriculo.php'><img src='logo/$fotopf' id='form-img'></a>";

                echo "$_foto";
                echo $_SESSION['nome'];
            }
            ?>

        </div>
    </div>

    <main class="curriculo d-flex flex-column align-items-center" style="margin-top:20px">

        <form name="cad_curriculo" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Informações gerais</h4>

                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="cargo">Cargo pretendido</label>
                                <input type="text" class="form-control" name="cargo" id="cargo">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control" name="foto" id="foto">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" name="endereco" id="endereco">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control" name="telefone" id="telefone">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="resumo">Resumo</label>
                        <textarea class="form-control" name="resumo" id="resumo"></textarea>
                    </div>
                </div>

                <div class="card-body" id="div-formacoes">
                    <h4 class="card-title">Formação</h4>
                    <button class="btn btn-sm right" id="btn-adicionar-formacao" title="Adicionar formação">Adicionar formação</button>
                </div>

                <div class="card-body" id="div-experiencias">
                    <h4 class="card-title">Experiência</h4>
                    <button class="btn btn-sm right" id="btn-adicionar-experiencia" title="Adicionar experiência">Adicionar experiência</button>
                </div>

                <div class="card-body" id="div-experiencias">
                    <h4 class="card-title">Modelo de currículo</h4>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="modelo" id="modelo1" value="modelo1" checked> Moderno preto
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="modelo" id="modelo2" value="modelo2"> Moderno azul
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="modelo" id="modelo3" value="modelo3"> Básico
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <input type="submit" name="btn_salvar" value="Salvar">
                    <button class="btn btn-default" type="reset">Limpar campos</button>
                </div>
            </div>
        </form>

    </main>

    <?php
    $sql = "SELECT * FROM curriculos WHERE id LIMIT 1";
    $resultado = $conexao->query($sql);
    $id_user = $_SESSION['id'];
    //print_r($resultado);

    while ($curriculo_info = mysqli_fetch_assoc($resultado)) {
        if ($curriculo_info['id'] = $id_user) {
            var_dump($curriculo_info);
            echo "<p>" . $curriculo_info['nome'] . "</p>";
            echo "<p>" . $curriculo_info['cargo'] . "</p>";
            echo "<p>" . $curriculo_info['foto'] . "</p>";
            echo "<p>" . $curriculo_info['endereco'] . "</p>";
            echo "<p>" . $curriculo_info['telefone'] . "</p>";
            echo "<p>" . $curriculo_info['email'] . "</p>";
            echo "<p>" . $curriculo_info['resumo'] . "</p>";
        }else{
            echo "";
        }
    }



    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>