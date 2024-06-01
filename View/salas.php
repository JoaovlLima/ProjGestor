<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salas do Bloco <?php echo htmlspecialchars($_GET['bloco']); ?></title>
    <link rel="stylesheet" href="/View/sala.css">
</head>
<body>
<?php include 'hearderLateral.php' ?>
<?=template_header('GestorHeader')?>

<div class="main_container">
  <h2>Salas do Bloco <?= htmlspecialchars($_GET['bloco']) ?></h2>
  <div class="areaCards">
    <?php for ($i = 1; $i <= 10; $i++): // Supondo 10 salas como exemplo ?>
    <div class="card" onclick="window.location.href='tabela-sala.php?sala=<?=$i?>'">
      <div class="info">
        <div class="icon-sala"><i class="fas fa-door-closed"></i></div>
        <div class="details">
          <p>Sala <?= $i ?></p>
          <p>Status: Disponível</p>
        </div>
      </div>
    </div>
    <?php endfor; ?>
  </div>
</div>
</body>
</html>
