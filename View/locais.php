<?php
include_once('../Controller/conectaDB.php');

try {
    $sql = "SELECT * FROM bloco_patrimonio";
    $stmt = $pdo->query($sql);
    $blocos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
      <div class="card" onclick="window.location.href='salas.php?bloco=<?= $bloco['nome_bloco'] ?>'">
          <div class="bloco"><?= $bloco['nome_bloco'] ?></div>
          <div class="info">
            <p>Qntd de salas: </p>
            <p>Numero de Patrimonios: </p>
          </div>
      </div>
    <?php endforeach; ?>
  </div>
  </div>
</body>
</html>