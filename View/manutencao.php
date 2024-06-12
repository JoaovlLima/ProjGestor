<?php
// Aqui você inclui o arquivo de conexão com o banco de dados
include_once('../Controller/conectaDB.php');

session_start();

if (!isset($_SESSION['cpf'])) {
    header('Location: login.php');
    exit();}

// Consulta SQL para selecionar os dados da tabela de manutenção
$sql = "SELECT * FROM manutencao";
$stmt = $pdo->query($sql);
$manutencoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de Manutenção</title>
    <link rel="stylesheet" href="manutencao.css">
</head>
<body>
    <?php include 'hearderLateral.php'; ?>
    <?=template_header('GestorHeader')?>

    <div class="main_container">
        <div class="card">
            <h2>Manutenções</h2>
            <div class="table_container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Status</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($manutencoes as $manutencao): ?>
                            <tr>
                                <td><?= htmlspecialchars($manutencao['id_manutencao']) ?></td>
                                <td><?= htmlspecialchars($manutencao['status_manutencao']) ?></td>
                                <td><?= htmlspecialchars($manutencao['descricao_manutencao']) ?></td>
                                <td>
                                    <button class="update"><i class="fas fa-sync-alt"></i> Atualizar</button>
                                    <button class="concluir"><i class="fas fa-check"></i> Concluir</button>
                                    <button class="darbaixa"><i class="fas fa-trash"></i> Dar baixa</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>
