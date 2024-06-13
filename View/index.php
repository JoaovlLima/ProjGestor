<?php
session_start();

// Inclui o arquivo de conexão com o banco de dados
include_once('../Controller/conectaDB.php');

// Pega a URI requisitada
$request_uri = trim($_SERVER['REQUEST_URI'], '/');

// Roteamento básico
switch ($request_uri) {
    case '':
    case 'home':
        include('home.php');
        break;
    case 'login':
        include('login.php');
        break;
    case 'manutencao':
        include('manutencao.php');
        break;
    case 'validar-transferencias':
        include('validar_transferencias.php');
        break;
    // Adicione outros casos conforme necessário
    default:
        http_response_code(404);
        echo "Página não encontrada.";
        break;
}
?>
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

    <div class="main_container">
    <?php
include_once ('../Controller/conectaDB.php') 


?>

      <div class="item">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut sapiente adipisci nemo atque eligendi
        reprehenderit minima blanditiis eum quae aspernatur!
      </div>
      <div class="item">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut sapiente adipisci nemo atque eligendi
        reprehenderit minima blanditiis eum quae aspernatur!
      </div>
      <div class="item">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut sapiente adipisci nemo atque eligendi
        reprehenderit minima blanditiis eum quae aspernatur!
      </div>
      <div class="item">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut sapiente adipisci nemo atque eligendi
        reprehenderit minima blanditiis eum quae aspernatur!
      </div>
    </div>
  </div>
  <script src="js/script.js"></script>
</body>

</html>