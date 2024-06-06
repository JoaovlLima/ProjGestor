<?php

function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
    <link rel="stylesheet" href="style.css">
	</head>
	<body>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
 
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="wrapper">

    <div class="top_navbar">
      <div class="hamburger">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
      </div>
      <div class="top_menu">
        <div class="logo">
          Estoque Senai
        </div>
        
        <ul>
         
          <li><a href="#">
              <i class="fas fa-bell"></i>
            </a></li>
            <li class="user-profile">
    <a href="#">
        <i class="fas fa-user"></i>
    </a>
    <div class="profile-info">
<div class="widget-profile">
<div class="Areasalas">
    <h3>Suas Salas:</h3>

    <div class="block" onclick="toggleRooms(this)">
    <h3>Bloco A</h3>
    <ul class="rooms">
      <li>Sala 101</li>
      <li>Sala 102</li>
      
    </ul>
  </div>

  <div class="block" onclick="toggleRooms(this)">
    <h3>Bloco B</h3>
    <ul class="rooms">
    
      <li>Sala 203</li>
    </ul>
  </div>
        </div>
        <button onclick="window.location.href='logout.php'">Logout</button>
        </div>
    </div>
</li>

        </ul>
      </div>
    </div>

    <div class="sidebar">
      <ul>
          <li><a href="/View/home.php">
              <span class="icon"><i class="fas fa-home"></i></span>
              <span class="title">Home</span>
          </a></li>
          <li><a href="/View/locais.php">   
              <span class="icon"><i class="fas fa-warehouse"></i></span>
              <span class="title">Patrimônios</span>
          </a></li>
          <li><a href="/View/estoque.php">
              <span class="icon"><i class="fas fa-boxes"></i></span>
              <span class="title">Estoque</span>
          </a></li>
          <li><a href="/View/manutencao.php" class="active">
          <span class="icon"><i class="fas fa-tools icon"></i></span>
          <span class="title">Manutenção</span>
      </a></li>
          <li><a href="/View/entrada.php" class="active">
              <span class="icon"><i class="fas fa-sign-in-alt"></i></span>
              <span class="title">Entrada</span>
          </a></li>
  
          <li><a href="/View/saida.php">
              <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
              <span class="title">Saída</span>
          </a></li>
      </ul>
  </div>
  <script src="js/script.js"></script>
EOT;
}

?>