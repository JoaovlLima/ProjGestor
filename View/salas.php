<?php
include_once('../Controller/conectaDB.php');

session_start();

if (!isset($_SESSION['cpf'])) {
    header('Location: login.php');
    exit();}

// Recupera o ID do bloco da URL
$id_bloco = isset($_GET['bloco']) ? intval($_GET['bloco']) : 0;

if ($id_bloco <= 0) {
    echo "Bloco inválido.";
    exit;
}

try {
    // Consulta para recuperar as salas do bloco específico
    $sql = "SELECT * FROM local_patrimonio WHERE id_bloco_patrimonio = :id_bloco";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_bloco', $id_bloco, PDO::PARAM_INT);
    $stmt->execute();
    $salas = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Salas do Bloco <?php echo htmlspecialchars($id_bloco); ?></title>
    <link rel="stylesheet" href="/View/sala.css">
</head>
<body>
<?php include 'hearderLateral.php' ?>
<?=template_header('GestorHeader')?>

<div class="main_container">
  <h2>Salas do Bloco <?= htmlspecialchars($id_bloco) ?></h2>
  <div class="areaCards">
    <?php foreach ($salas as $sala): ?>
    <div class="card" onclick="window.location.href='tabela-sala.php?sala=<?= $sala['id_local_patrimonio'] ?>'">
      <div class="info">
        <div class="icon-sala"><i class="fas fa-door-closed"></i></div>
        <div class="details">
          <p><?= htmlspecialchars($sala['nome_local_patrimonio']) ?></p>
          <p>Status: Disponível</p> <!-- Aqui você pode adicionar lógica para mostrar o status real -->
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
</body>
</html>
