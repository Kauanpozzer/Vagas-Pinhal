<?php
if (session_status() === PHP_SESSION_NONE) session_start(); // Iniciar sessão

if (!isset($_SESSION['id'])) {
    header('Location: logoff.php');
    exit;
}

include_once 'conexao.php';
$sql = "SELECT * FROM curriculos WHERE id";
$resultado = $conexao->query($sql);
$id_user = $_SESSION['id'];
//print_r($resultado);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="user.css">
    <title>Curriculos</title>
</head>

<body>
    <header>
        <a href="index.php">
            <img src="img/VagasPinhal.svg" alt="" class="img_vagasPinhal">
        </a>
        <div id="nav_bar1">
            <a href="empresa-area.php">
                <div id="nav_home">
                    <span class="material-symbols-outlined">Home</span>
                    <a href="empresa-area.php">HOME
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
        
    </header>

    <div class="tabelas_ususario">
        <h1 class="text-center p-5">Curriculos Cadastrados</h1>
        <table class="table">
            <thead>
                <tr>

                    <th scope="col">Nome</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Endereco</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($curriculo_info = mysqli_fetch_assoc($resultado)) {

                    // var_dump($curriculo_info);
                    echo "<tr>";
                    echo "<td>" . $curriculo_info['nome'] . "</td>";
                    echo "<td>" . $curriculo_info['cargo'] . "</td>";
                    echo "<td>" . $curriculo_info['foto'] . "</td>";
                    echo "<td>" . $curriculo_info['endereco'] . "</td>";
                    echo "<td>" . $curriculo_info['telefone'] . "</td>";
                    echo "<td>" . $curriculo_info['email'] . "</td>";
                    echo "<td> 
                           <a class='btn btn-sm btn-primary' href='view.php?id=$curriculo_info[id]'>Visualizar</a>
                          </td>";
                    echo "</tr>";
                }

                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>