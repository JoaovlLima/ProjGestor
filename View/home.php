<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
</head>

<body>

  <?php include 'hearderLateral.php' ?>
  <?=template_header('GestorHeader')?>

    <div class="sidebar">
      <ul>
          <li><a href="#">
              <span class="icon"><i class="fas fa-home"></i></span>
              <span class="title">Home</span>
          </a></li>
          <li><a href="#">
              <span class="icon"><i class="fas fa-chalkboard-teacher"></i></span>
              <span class="title">Salas</span>
          </a></li>
          <li><a href="#">
              <span class="icon"><i class="fas fa-boxes"></i></span>
              <span class="title">Estoque</span>
          </a></li>
          <li><a href="#">
              <span class="icon"><i class="fas fa-warehouse"></i></span>
              <span class="title">Patrimônios</span>
          </a></li>
          <li><a href="#" class="active">
              <span class="icon"><i class="fas fa-sign-in-alt"></i></span>
              <span class="title">Entrada</span>
          </a></li>
          <li><a href="#">
              <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
              <span class="title">Saída</span>
          </a></li>
      </ul>
  </div>

    <div class="main_container">
      <div class="item">
       <h1>Home</h1>
    </div>
  </div>
  <script src="js/script.js"></script>
</body>

</html>