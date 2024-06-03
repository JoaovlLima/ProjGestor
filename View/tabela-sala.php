<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/View/tabela-sala.css">
</head>
<body>
<?php include 'hearderLateral.php' ?>
  <?=template_header('GestorHeader')?>

<div class="main_container">
<div class="left_side">
    <h2>Informações da Sala</h2>
    <p><strong>Número da Sala:</strong> 101</p>
    <p><strong>Bloco:</strong> A</p>
    <p><strong>Status:</strong> Disponível</p>
    <p><strong>Capacidade:</strong> 30 alunos</p>
    <p><strong>Recursos:</strong> Projetor, Ar Condicionado, Wi-Fi</p>
    
  </div>

  <div class="right_side">
        <h2>Patrimônios</h2>
        <div class="search-container">
            <input type="text" id="search" placeholder="Pesquisar patrimônio..." >
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Estado</th>
                   
                </tr>
            </thead>
            <tbody>
                <tr class="clickable-cell" onclick="location.href='info-patrimonio.php?id=1'">
                    <td>1</td>
                    <td >Computador</td>
                    <td>10</td>
                    <td>Bom</td>
                   
                </tr>
                <tr class="clickable-cell" onclick="location.href='info-patrimonio.php?id=2'">
                    <td>2</td>
                    <td >Projetor</td>
                    <td>1</td>
                    <td>Bom</td>
                   
                </tr>
                <tr class="clickable-cell" onclick="location.href='info-patrimonio.php?id=3'">
                    <td>3</td>
                    <td >Quadro Branco</td>
                    <td>1</td>
                    <td>Bom</td>
                    
                </tr>
       
      </tbody>
      
      
    </table>
    <button onclick="window.location.href='cadastro-patrimonio.php?sala=<?= $_GET['sala'] ?>'">Adicionar Patrimônio</button>
  </div>
  
  </div>
</body>
</html>