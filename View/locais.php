<?php
include_once('../Controller/conectaDB.php');

try {
    $sql = "
        SELECT 
            bloco_patrimonio.id_bloco_patrimonio AS bloco_id,
            bloco_patrimonio.nome_bloco_patrimonio,
            COUNT(DISTINCT local_patrimonio.id_local_patrimonio) AS qntd_salas,
            COUNT(DISTINCT patrimonio.id_patrimonio) AS num_patrimonios
        FROM 
            bloco_patrimonio
        LEFT JOIN 
            local_patrimonio ON bloco_patrimonio.id_bloco_patrimonio = local_patrimonio.id_bloco_patrimonio
        LEFT JOIN 
            patrimonio ON local_patrimonio.id_local_patrimonio = patrimonio.local_patrimonio
        GROUP BY 
            bloco_patrimonio.id_bloco_patrimonio
    ";
    $stmt = $pdo->query($sql);
    $blocos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="locais.css">
</head>
<body>
<?php include 'hearderLateral.php' ?>
  <?=template_header('GestorHeader')?>

<div class="main_container">
  <div class="titulo">
    <h1>Blocos:</h1>
  </div>
  
  <div class="areaCards">
  <?php foreach ($blocos as $bloco): ?>
      <div class="card" onclick="window.location.href='salas.php?bloco=<?= $bloco['bloco_id'] ?>'">
          <div class="bloco"><?= $bloco['nome_bloco_patrimonio'] ?></div>
          <div class="info">
            <p>Qntd de salas: <?= $bloco['qntd_salas'] ?></p>
            <p>Número de Patrimônios: <?= $bloco['num_patrimonios'] ?></p>
          </div>
      </div>
  <?php endforeach; ?>
  </div>
</div>
</body>
</html>
