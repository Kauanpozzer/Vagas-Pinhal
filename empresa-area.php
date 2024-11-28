<?php
if (session_status() === PHP_SESSION_NONE) session_start(); // Iniciar sessão

if (!isset($_SESSION['id'])) {
    header('Location: logoff.php');
    exit;
}

include_once 'conexao.php';
include_once 'upload_file.php';

$empresa_id = 0;

if (isset($_POST['btn_enviar'])) {
    $tituloVaga = $_POST['titulo'];
    $descricaoVaga = $_POST['descricao'];
    $data_cadastro = date('d/m/Y');
    $empresa_id = $_SESSION['id'];
    $nome_imagem = imagem();
    $nome_daEmpresa = $_SESSION['nomeEmpresa'];


    if (isset($nome_imagem)) {
        $sql = "INSERT INTO vagas (empresa_id, titulo, descricao, data_cadastro, imagem, nome_da_empresa) 
                VALUES 
                ('$empresa_id', '$tituloVaga', '$descricaoVaga', '$data_cadastro', '$nome_imagem', '$nome_daEmpresa')";

        $sql1 = "SELECT * FROM vagas 
                 WHERE titulo = '$tituloVaga' AND descricao = '$descricaoVaga' AND nome_da_empresa = '$nome_daEmpresa'";

        $verifica = $conexao->query($sql1);

        if ($conexao->query($sql) === TRUE) {
            //
        } else {
            echo "Error: " . $sql . "<br>" . $conexao->error;
        }
    } else {
        echo 'imagem nao selecionada';
    }
}

if (isset($_POST['idvaga'])) {
    $idvaga = $_POST['idvaga'];
    $sql = "DELETE FROM vagas WHERE id='$idvaga'";
    $consulta = $conexao->query($sql);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vagas Pinhal Empresas</title>
    <link rel="stylesheet" href="user.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid p-0">
        <header>
            <a href="index.php">
                <img src="img/VagasPinhal.svg" alt="" class="img_vagasPinhal">
            </a>

            <div id="nav_bar1">
                <a href="index.php">
                    <div id="nav_home">
                        <span class="material-symbols-outlined">
                            Home
                        </span>

                        <a href="index.php">HOME
                            <hr>
                        </a>
                    </div>
                </a>
                <a href="#">

                    <span class="material-symbols-outlined">
                        work
                    </span>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">
                        chat
                    </span>
                </a>

                <a href="area_curriculos.php">
                    <span class="material-symbols-outlined">
                        notifications
                    </span>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">
                        grid_view
                    </span>
                </a>
            </div>
            <div id="nav_usuario">
                <div class="User_name">
                    <div id="userName" style="color: white;"><?php echo $_SESSION['nomeEmpresa']; ?></div>
                </div>
                <div class="dropdown">
                    <div id="iten-imgArrow">
                    <div>
                        <?php
                        if (!$_SESSION['id'] = 0) {
                            $sql = "SELECT * FROM  usuario";
                            $result = mysqli_query($conexao, $sql);
                            $dados = $result->fetch_assoc();
                            $fotopf = $dados['logo_perfil'];
                            $_foto = "<img src='logo/$fotopf' class='user-menu' style='width: 50px;'>";

                            echo "$_foto";
                        }
                        ?>
                    </div>
                        <div class="dropdown">
                            <span class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none;">
                            </span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="logoff.php">Desconectar</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="row d-flex justify-content-start align-items-center m-3 g-5">
            <div class="col-3 d-flex justify-content-center align-items-center flex-column p-5">
                <div class="imgFundo">
                    <img src="img/fundo_blue.svg" alt="" id="cavalo">
                </div>
                <div  class="d-flex justify-content-center align-items-center">
                    <div>
                        <?php
                        if (!$_SESSION['id'] = 0) {
                            $sql = "SELECT * FROM  usuario";
                            $result = mysqli_query($conexao, $sql);
                            $dados = $result->fetch_assoc();
                            $fotopf = $dados['logo_perfil'];
                            $_foto = "<a href='form-curriculo.php'><img src='logo/$fotopf' style='width: 75px;'></a>";

                            echo "$_foto";
                        }
                        ?>
                    </div>
                </div>

                <div class="info-user d-flex justify-content-center align-items-center">
                    <div class="row col-12">
                        <p id="name-user" class="col-12 text-center"><?php echo $_SESSION['nomeEmpresa']; ?></p>
                        <hr style="width: 220px;">
                    </div>
                </div>
            </div>

            <div class="postagem col-4  d-flex justify-content-center align-items-center">
                <form method="POST" action="" enctype="multipart/form-data">

                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Titulo da vaga</label>
                        <input type="text" name="titulo" class="form-control" id="exampleFormControlInput1" placeholder="Título da vaga">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">O que deseja postar?</label>
                        <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <div class="mb-3 flex-row p-3">
                            <label for="formFile" class="form-label">O que deseja postar</label>
                            <input class="form-control" type="file" name="fileToUpload" id="fileToUpload" required>
                            <div class="btn-group p-2" role="group">
                                <button type="submit" name="btn_enviar" class="btn btn-primary">Publicar Vaga</button>
                            </div>
                        </div>
                    </div>



                </form>
            </div>

            <?php
            $sql = "SELECT * FROM vagas WHERE empresa_id=$empresa_id";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
                while ($dados = $resultado->fetch_assoc()) {
                    $nome_empresa = $dados['nome_da_empresa'];
                    $descricao = $dados['descricao'];
                    $imagem = $dados['imagem'];
                    $idvaga = $dados['id'];
                    $date = date_create($dados['data_cadastro']);
                    $datacad = date_format($date, 'd/m/Y');
                    $fotopf = $dados['logo_perfil'];

                    echo "<div class='row d-flex justify-content-center align-items-center'>
                            <div class='col-6 m-4'>
                                <div class='card shadow-sm p-4 col-8'>
                                    <div class='row p-2'>
                                        <div class='col-2'><img src='logo/$fotopf' alt='' class='w-100'></div>
                                        <div class='col-6 p-2'><p class='h5'>$nome_empresa</p></div>
                                    </div>
                                    <p class='card-text'>$descricao</p>
                                        <img src='$imagem' alt='' class='w-100'>
                                            <div class='card-body'>                              
                                                <div class='d-flex justify-content-between align-items-center'>
                                                    <div class='btn-group'>
                                                        <form method='post' action='empresa-area.php'>
                                                            <input type='hidden' name='idvaga' >
                                                            <button class='btn btn-sm btn-outline-secondary' value='$idvaga'>Excluir</button>
                                                        </form>    
                                                        <button type='button' class='btn btn-sm btn-outline-secondary'>Editar</button>
                                                    </div>
                                                    <small class='text-body-secondary'>
                                                        $datacad
                                                    </small>
                                                </div>
                                            </div>
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
        </div>
    </div>
</body>

</html>