<?php
    $usuario  = 'root';
    $senha    = '';
    $server   = 'localhost';
    $database = 'loginsystem';
    
    $conexao = new mysqli($server, $usuario, $senha, $database) or die('Erro de conexão com BD');
    
    // Verifica se a conexão foi bem sucedida
    //if (!$conexao) {
    //    die("Falha na conexão: " . mysqli_connect_error());
    //}
    
    // Se chegou aqui, a conexão foi bem sucedida
    //echo "Conexão bem sucedida!";
