<?php
include_once('../Controller/conectaDB.php');

session_start();

if (!isset($_SESSION['cpf'])) {
    header('Location: login.php');
    exit();}

// Recupera o ID da sala da URL
$id_sala = isset($_GET['sala']) ? intval($_GET['sala']) : 0;

if ($id_sala <= 0) {
    echo "Sala inválida.";
    exit;
}

try {
    // Consulta para recuperar as informações da sala específica
    $sqlSala = "SELECT lp.*, bp.nome_bloco_patrimonio FROM local_patrimonio lp 
                JOIN bloco_patrimonio bp ON lp.id_bloco_patrimonio = bp.id_bloco_patrimonio 
                WHERE lp.id_local_patrimonio = :id_sala";
    $stmtSala = $pdo->prepare($sqlSala);
    $stmtSala->bindParam(':id_sala', $id_sala, PDO::PARAM_INT);
    $stmtSala->execute();
    $sala = $stmtSala->fetch(PDO::FETCH_ASSOC);

    if (!$sala) {
        echo "Sala não encontrada.";
        exit;
    }

    // Verifica se foi enviado um termo de pesquisa
    if(isset($_POST['submit'])) {
        $search = trim($_POST['search']);
        if(empty($search)) {
            // Se o campo de pesquisa estiver vazio, busca todos os patrimônios
            $sqlPatrimonios = "SELECT * FROM patrimonio WHERE local_patrimonio = :id_sala";
            $stmtPatrimonios = $pdo->prepare($sqlPatrimonios);
            $stmtPatrimonios->bindParam(':id_sala', $id_sala, PDO::PARAM_INT);
        } elseif(is_numeric($search)) {
            // Se o termo de pesquisa for um número, busca por ID
            $sqlPatrimonios = "SELECT * FROM patrimonio WHERE local_patrimonio = :id_sala AND id_patrimonio = :search";
            $stmtPatrimonios = $pdo->prepare($sqlPatrimonios);
            $stmtPatrimonios->bindParam(':id_sala', $id_sala, PDO::PARAM_INT);
            $stmtPatrimonios->bindParam(':search', $search, PDO::PARAM_INT);
        } else {
            // Caso contrário, busca pelo nome do patrimônio
            $search = "%{$search}%";
            $sqlPatrimonios = "SELECT * FROM patrimonio WHERE local_patrimonio = :id_sala AND nome_patrimonio LIKE :search";
            $stmtPatrimonios = $pdo->prepare($sqlPatrimonios);
            $stmtPatrimonios->bindParam(':id_sala', $id_sala, PDO::PARAM_INT);
            $stmtPatrimonios->bindParam(':search', $search, PDO::PARAM_STR);
        }
    } else {
        // Se nenhum termo de pesquisa foi enviado, busca todos os patrimônios
        $sqlPatrimonios = "SELECT * FROM patrimonio WHERE local_patrimonio = :id_sala";
        $stmtPatrimonios = $pdo->prepare($sqlPatrimonios);
        $stmtPatrimonios->bindParam(':id_sala', $id_sala, PDO::PARAM_INT);
    }

    $stmtPatrimonios->execute();
    $patrimonios = $stmtPatrimonios->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sala <?= htmlspecialchars($sala['nome_local_patrimonio']) ?> - Bloco <?= htmlspecialchars($sala['nome_bloco_patrimonio']) ?></title>
    <link rel="stylesheet" href="/View/tabela-sala.css">
</head>
<body>
<?php include 'hearderLateral.php' ?>
<?=template_header('GestorHeader')?>

<div class="main_container">
    <div class="left_side">
        <h2>Informações da Sala</h2>
        <p><strong>Número da Sala:</strong> <?= htmlspecialchars($sala['nome_local_patrimonio']) ?></p>
        <p><strong>Bloco:</strong> <?= htmlspecialchars($sala['nome_bloco_patrimonio']) ?></p>
        <p><strong>Status:</strong> <?= htmlspecialchars($sala['status_sala'] ?? 'Disponível') ?></p>
        <p><strong>Capacidade:</strong> <?= htmlspecialchars($sala['capacidade_sala'] ?? 'Não especificada') ?> </p>
    </div>

    <div class="right_side">
        <h2>Patrimônios</h2>
        <form method="POST">
            <div class="search-container">
                <input type="text" id="search" name="search" placeholder="Pesquisar patrimônio...">
                <button type="submit" name="submit">Pesquisar</button>
            </div>
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patrimonios as $patrimonio): ?>
                <tr class="clickable-cell" onclick="location.href='info-patrimonio.php?id=<?= $patrimonio['id_patrimonio'] ?>'">
                    <td><?= htmlspecialchars($patrimonio['id_patrimonio']) ?></td>
                    <td><?= htmlspecialchars($patrimonio['nome_patrimonio']) ?></td>
                    <td><?= htmlspecialchars($patrimonio['status_patrimonio']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="window.location.href='cadastro-patrimonio.php?sala=<?= $id_sala ?>'">Adicionar Patrimônio</button>
    </div>
</div>
</body>
</html>
