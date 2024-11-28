<?php
if (session_status() === PHP_SESSION_NONE) session_start();
// Conexão com o banco de dados
include_once 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login - Usuário</title>

</head>

<body>
    <div class="menu_home">
        <nav>
            <div class="logo">
                <a href="index.php">
                    <img src="img/VagasPinhal.svg" alt="">
                </a>


            </div>
        </nav>
    </div>
    <div class="container">

        <div class="form-container">
            <div class="image-container"></div>

            <form id="userForm" action="login.php" method="POST">
                <div class="form-text">
                    <h2>Logar</h2>
                </div>
                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Coloque seu Email">
                </div>

                <div class="input-box">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Coloque senha">
                </div>

                <div class="class">
                    <p>É uma empresa? <a href="login_empresa.php"> Conecte-se agora!</a></p>
                </div>

                <div class="btn-box">
                    <input type="submit" value="Entrar" id="btn-logar">
                </div>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $conn = mysqli_connect($url, $usuario, $senha, $database);

                    // Verifica conexão
                    if ($conn->connect_error) {
                        die("Conexão falhou: " . $conn->connect_error);
                    }

                    // Coleta dados do formulário
                    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

                    // Consulta no banco de dados para verificar se o email existe
                    $sql = "SELECT * FROM usuario WHERE email=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $name = $_POST['nome'];

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $senha_hash = $row['senha'];
                        // Verifica a senha
                        if (password_verify($senha, $senha_hash)) {
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['logo1'] = $row['logo'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['nome'] = $row['nome'];

                            header("Location: user-area.php");
                            exit();
                        } else {
                            echo "Senha incorreta.";
                        }
                    } else {
                        echo "Email não encontrado.";
                    }

                    $stmt->close();
                    $conn->close();
                }
                // if ($_SERVER["REQUEST_METHOD"] == "POST") {
                //     // Conectar ao banco de dados e verificar as credenciais

                //     $email = $_POST['email'];
                //     $password = $_POST['senha'];


                //     $sql = "SELECT * FROM usuario WHERE email='$email'";
                //     $res = $conexao->query($sql);

                //     if ($res && $res->num_rows > 0) {
                //         $usuario = $res->fetch_assoc();
                //         if (password_verify($password, $usuario['senha'])) {
                //             session_start();
                //             $_SESSION['loggedin'] = true;
                //             $_SESSION['email'] = $email;
                //             header("Location: user-area.php");
                //             exit;
                //         } else {
                //             echo "E-mail ou senha incorretos.";
                //         }
                //     } else {
                //         echo "E-mail ou senha incorretos.";
                //     }
                // }

                ?>

            </form>

        </div>
    </div>


</body>

</html>