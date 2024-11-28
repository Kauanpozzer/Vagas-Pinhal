<?php
if (session_status() === PHP_SESSION_NONE) session_start(); // Iniciar sessão

if (!isset($_SESSION['id'])) {
    header('Location: logoff.php');
    exit;
}

include_once 'conexao.php';
$sql = "SELECT * FROM  usuario;";
$resultado = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vagas Pinhal Usuario</title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        #perfilLogo {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <div class="resultado row container-fluid p-0">

        <header>
            <a href="index.php">
                <img src="img/VagasPinhal.svg" alt="" class="img_vagasPinhal">
            </a>
            <div id="nav_bar1">
                <a href="index.php">
                    <div id="nav_home">
                        <span class="material-symbols-outlined">Home</span>
                        <a href="index.php">HOME
                            <hr>
                        </a>
                    </div>
                </a>

                <a href="index.php">
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
            <div id="nav_usuario">

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
                                $_foto = "<a href='form-curriculo.php'><img src='logo/$fotopf' id='perfilLogo'></a>";

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
            </div>
        </header>

        <div class="col-3 d-flex justify-content-center align-items-center flex-column p-5">
            <div class="imgFundo">
                <img src="img/fundo_blue.svg" alt="" id="cavalo">
            </div>
            <div class="d-flex justify-content-center align-items-center m-5">
                <div>
                    <?php
                    if (!$_SESSION['id'] = 0) {
                        $sql = "SELECT * FROM  usuario";
                        $result = mysqli_query($conexao, $sql);
                        $dados = $result->fetch_assoc();
                        $fotopf = $dados['logo_perfil'];
                        $_foto = "<a href='form-curriculo.php'><img src='logo/$fotopf' id='perfilLogo' style='height: 75px; width:75px;'></a>";

                        echo "$_foto";
                    }
                    ?>

                </div>
            </div>

            <div class="info-user d-flex justify-content-center align-items-center">
                <div class="row">
                    <p id="name-user" class="col-12 text-center"><?php echo $_SESSION['nome']; ?></p>
                    <hr style="width: 220px;">
                </div>
            </div>
        </div>


        <?php

        include_once 'conexao.php';
        $sql = "SELECT * FROM vagas";
        $resultado = $conexao->query($sql);
        if ($resultado->num_rows > 0) {
            while ($dados = $resultado->fetch_assoc()) {
                $nomeempresa = $dados['nome_da_empresa'];
                $descricao = $dados['descricao'];
                $imagem = $dados['imagem'];
                $data_cadastro = $dados["data_cadastro"];


                if (!$_SESSION['id'] = 0) {
                    $sql = "SELECT * FROM  usuario";
                    $result = mysqli_query($conexao, $sql);
                    $dados = $result->fetch_assoc();
                    $fotopf = $dados['logo_perfil'];
                    $_foto = "<img src='logo/$fotopf' id='perfilLogo'>";
                }
                echo "<div class='d-flex justify-content-center align-items-center'>
                            <div class='col-6 m-4'>
                                <div class='card shadow-sm p-4 col-8'>
                                    <div class='row p-2'>
                                        <div class='col-2'>$_foto</div>
                                        <div class='col-6 p-2'><p class='h5'>$nomeempresa</p></div>                                        
                                    </div>
                                        <p class='card-text'>$descricao</p>
                                            <img src='$imagem' alt='' class='w-100'>
                                                <div class='card-body'>                              
                                                    <div class='d-flex justify-content-between align-items-center'>
                                                        <div class='btn-group'>
                                                            <form>
                                                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>Candidatar-se</button>                                                              
                                                            </form>
                                                        </div>
                                                        <small class='text-body-secondary'>$data_cadastro</small>
                                                    </div>
                                                </div>
                                </div>
                            </div>
                        </div>";
            }
        } else {
            echo "0 results";
        }
        ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Informações enviadas com sucesso!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Suas Informações foram enviadas para uma área que a empresa poderão entrar no seu perfil
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>