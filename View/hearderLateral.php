<?php
// Inclui o arquivo de conexão com o banco de dados
include_once('../Controller/conectaDB.php');

// Inicia a sessão
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['cpf'])) {
    header("Location: login.php");
    exit();
}

// Obtém o ID do usuário logado
$cpf = $_SESSION['cpf'];

// Consulta SQL para obter os blocos e salas associadas ao usuário
$sql = "
    SELECT b.nome_bloco_patrimonio, s.nome_local_patrimonio 
    FROM bloco_patrimonio b
    JOIN local_patrimonio s ON b.id_bloco_patrimonio = s.id_bloco_patrimonio
    WHERE s.cpf_usuario = :cpf
";
$stmt = $pdo->prepare($sql);
$stmt->execute(['cpf' => $cpf]);
$blocos_salas = $stmt->fetchAll(PDO::FETCH_ASSOC);

function template_header($title) {
    global $blocos_salas; // Torna a variável global disponível dentro da função
    echo <<<EOT
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>$title</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    function toggleRooms(element) {
        var rooms = element.querySelector('.rooms');
        if (rooms.style.display === 'none' || rooms.style.display === '') {
            rooms.style.display = 'block';
        } else {
            rooms.style.display = 'none';
        }
    }
    </script>
</head>
<body>
<div class="wrapper">
    <div class="top_navbar">
        <div class="hamburger">
            <div class="one"></div>
            <div class="two"></div>
            <div class="three"></div>
        </div>
        <div class="top_menu">
            <div class="logo">
                Estoque Senai
            </div>
            <ul>
                <li><a href="validar_transferencias.php"><i class="fas fa-bell"></i></a></li>
                <li class="user-profile">
                    <a href="#"><i class="fas fa-user"></i></a>
                    <div class="profile-info">
                        <div class="widget-profile">
                            <div class="Areasalas">
                                <h3>Suas Salas:</h3>
EOT;
    foreach ($blocos_salas as $bloco_sala) {
        echo '<div class="block" onclick="toggleRooms(this)">';
        echo '<h3> Bloco - ' . htmlspecialchars($bloco_sala['nome_bloco_patrimonio']) . '</h3>';
        echo '<ul class="rooms">';
        echo '<li>' . htmlspecialchars($bloco_sala['nome_local_patrimonio']) . '</li>';
        echo '</ul></div>';
    }
    echo <<<EOT
                            </div>
                            <button onclick="window.location.href='logout.php'">Logout</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar">
        <ul>
            <li><a href="/View/home.php"><span class="icon"><i class="fas fa-home"></i></span><span class="title">Home</span></a></li>
            <li><a href="/View/locais.php"><span class="icon"><i class="fas fa-warehouse"></i></span><span class="title">Patrimônios</span></a></li>
            <li><a href="/View/estoque.php"><span class="icon"><i class="fas fa-boxes"></i></span><span class="title">Estoque</span></a></li>
            <li><a href="/View/manutencao.php"><span class="icon"><i class="fas fa-tools icon"></i></span><span class="title">Manutenção</span></a></li>
            <li><a href="/View/entrada.php"><span class="icon"><i class="fas fa-sign-in-alt"></i></span><span class="title">Entrada</span></a></li>
            <li><a href="/View/saida.php"><span class="icon"><i class="fas fa-sign-out-alt"></i></span><span class="title">Saída</span></a></li>
        </ul>
    </div>
    <script src="js/script.js"></script>
EOT;
}

?>