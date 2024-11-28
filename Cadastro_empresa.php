<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro_empresa.css">
    <title>Cadastro - Empresa</title>
</head>

<body>
    <nav>
        <div class="logo">
            <a href="index.php"><img src="img/VagasPinhal.svg" alt=""></a>
        </div>

    </nav>

    <div class="container">
        <div class="form-container">
            <div class="image-container"></div>
            <div class="form-text">
                <h2>Cadastre Sua Empresa</h2>
            </div>

            <form id="empresaForm" action="cadastro_empresa.php" method="post">
                <div class="input-box">
                    <label for="nome_empresa">Nome da Empresa:</label>
                    <input type="text" id="nome_empresa" name="nome_empresa" placeholder="Nome da empresa">
                </div>

                <div class="input-box">
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" id="cnpj" name="cnpj" placeholder="CNPJ">
                </div>

                <div class="input-box">
                    <label for="email_empresa">Email Corporativo:</label>
                    <input type="email" id="email_empresa" name="email_empresa" placeholder="Nome da empresa">
                </div>

                <div class="input-box">
                    <label for="senha_empresa">Senha:</label>
                    <input type="password" id="senha_empresa" name="senha_empresa" placeholder="Sua senha">
                </div>

                <div class="input-box">
                    <label for="endereco_empresa">Endereço:</label>
                    <input type="text" id="endereco_empresa" name="endereco_empresa" placeholder="Localização">
                </div>


                <p>Já tem uma conta? <a href="login_empresa.php">Conectar-se</a></p>
                <p>É um usuário? <a href="cadastro.php">Cadastre-se Grátis aqui!</a></p>
                <div class="btn_criar">
                    <input type="submit" value="Criar Conta">
                </div>
                <?php
                // Conexão com o banco de dados
                include_once 'conexao.php';

                // Coleta dados do formulário e filtra
                $nome_empresa = filter_input(INPUT_POST, 'nome_empresa', FILTER_SANITIZE_STRING);
                $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);
                $email_empresa = filter_input(INPUT_POST, 'email_empresa', FILTER_SANITIZE_EMAIL);
                $senha_empresa = filter_input(INPUT_POST, 'senha_empresa', FILTER_SANITIZE_STRING);
                $endereco = filter_input(INPUT_POST, 'endereco_empresa', FILTER_SANITIZE_STRING);

                // Hash da senha antes de salvar no banco
                $senhaHash = password_hash($senha_empresa, PASSWORD_DEFAULT);

                if (empty($nome_empresa) || empty($cnpj) || empty($email_empresa) || empty($senha_empresa) || empty($endereco)) {
                    echo "Todos os campos obrigatórios devem ser preenchidos.";
                    exit;
                }
                // Insere dados na tabela 'empresas'
                $sql = "INSERT INTO empresas (nome_empresa, cnpj, email, senha, endereco) VALUES (?,?,?,?,?)";
                $stmt = $conexao->prepare($sql);
                $stmt->bind_param("sssss", $nome_empresa, $cnpj, $email_empresa, $senhaHash, $endereco);


                if ($stmt->execute()) {
                    echo "Cadastro realizado com sucesso!";
                    header("Location: login_empresa.php");
                    exit();
                } else {
                    echo "Erro ao cadastrar: " . $conn->error;
                }

                $stmt->close();
                $conexao->close();
                ?>
            </form>
            <footer></footer>
        </div>
    </div>
</body>

</html>