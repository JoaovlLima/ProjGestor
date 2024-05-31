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
  <div class="card" onclick="window.location.href='salas.php?bloco=A'">
      <div class="bloco">A</div>
      <div class="info">
        <p>Qntd de salas: 10</p>
        <p>Numero de Patrimonios: 50</p>
      </div>
    </div>
   
  <div class="card" onclick="window.location.href='salas.php?bloco=B'">
      <div class="bloco">B</div>
      <div class="info">
        <p>Qntd de salas: 8</p>
        <p>Numero de Patrimonios: 40</p>
      </div>
    </div>
    <div class="card" onclick="window.location.href='salas.php?bloco=C'">
      <div class="bloco">C</div>  
      <div class="info">
        <p>Qntd de salas: 12</p>
        <p>Numero de Patrimonios: 60</p>
      </div>
    </div>
    <div class="card" onclick="window.location.href='salas.php?bloco=D'">
      <div class="bloco">D</div>
      <div class="info">
        <p>Qntd de salas: 7</p>
        <p>Numero de Patrimonios: 35</p>
      </div>
    </div>
  </div>
  </div>
</body>
</html>