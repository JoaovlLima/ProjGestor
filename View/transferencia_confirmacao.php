<?php 
session_start();

if (!isset($_SESSION['cpf'])) {
    header('Location: login.php');
    exit();}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferência Solicitada</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main_container">
        <div class="card">
            <h2>Transferência Solicitada</h2>
            <p>Sua solicitação de transferência foi enviada e está aguardando validação.</p>
            <a href="home.php">Voltar à página inicial</a>
        </div>
    </div>
</body>
</html>
