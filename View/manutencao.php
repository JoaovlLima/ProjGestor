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

$sql ="SELECT id_patrimonio from vai_manutencao where id_manutencao = :id_manutencao";
$stmt = $pdo->query($sql);
$stmt->execute(['id_manutencao' => $manutencao['id_manutencao']]);
$id_patrimonio = $stmt->fetchColumn();

$sql ="SELECT nome_patrimonio from patrimonio where id_patrimonio = :id_patrimonio";
$stmt = $pdo->query($sql);
$stmt->execute(['id_primonio' => $id_patrimonio]);
$nome_patrimonio = $stmt->fetchColumn();



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
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($manutencoes as $manutencao): ?>
                            <tr>
                                <td><?= htmlspecialchars($manutencao['id_manutencao']) ?></td>
                                <td><?= htmlspecialchars($manutencao['status_manutencao']) ?></td>
                                <td><?= htmlspecialchars($manutencao['descricao_manutencao']) ?></td>
                                <td><?= $nome_patrimonio?></td>
                                <td>
                                <form action="../Controller/acoesManutencao.php" method="post">
                                        <input type="hidden" name="id_manutencao" value="<?= $manutencao['id_manutencao'] ?>">
                                        <button type="submit" name="acao" value="atualizar">Atualizar</button>
                                        <button type="submit" name="acao" value="concluir">Concluir</button>
                                        <button type="submit" name="acao" value="darbaixa">Dar Baixa</button>
                                    </form>
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
