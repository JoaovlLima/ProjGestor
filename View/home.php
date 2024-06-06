<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="home.css">
  
</head>

<body>

  <?php include 'hearderLateral.php' ?>
  <?=template_header('GestorHeader')?>

  

    <div class="main_container">
    <br>
      <div class="banner">
        <img src="https://i.ytimg.com/vi/OQJyP75Ev08/maxresdefault.jpg" alt="Banner de Anúncio">
        <button class="saiba-mais-btn">Saiba Mais</button>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <h2>Dashboards</h2>
    <br> 
    <br>
      <div class="dashboard-container">
        <div class="dashboard patrimonios">
            <div class="box-title1">
                <h2>Total de Quantidade de Patrimônios</h2>
            </div>
            <div class="box-quantity">
                <p>$500,000</p>
            </div>
        </div>
        <div class="dashboard produtos">
            <div class="box-title2">
                <h2>Total de Quantidade de Produtos</h2>
            </div>
            <div class="box-quantity">
                <p>100</p>
            </div>
        </div>
        <div class="dashboard aleatorio">
            <div class="box-title3">
                <h2>Total de Quantidade de Salas</h2>
            </div>
            <div class="box-quantity">
                <p>12</p>
            </div>
        </div>
    </div>
    <br>
    <div class="dashboard-container">
      <div class="dashboard patrimonios">
          <div class="box-title1">
              <h2>Total de Quantidade de </h2>
          </div>
          <div class="box-quantity">
              <p>$500,000</p>
          </div>
      </div>
      <div class="dashboard produtos">
          <div class="box-title2">
              <h2>Total de Quantidade de Produtos</h2>
          </div>
          <div class="box-quantity">
              <p>100</p>
          </div>
      </div>
      <div class="dashboard aleatorio">
          <div class="box-title3">
              <h2>Dashboard Aleatório</h2>
          </div>
          <div class="box-quantity">
              <p>Conteúdo aleatório aqui</p>
          </div>
      </div>
  </div>
    </div>
    
  <br>
  <br>
  <br>

  <section id="suporte">
    <div class="container">
        <h2>Suporte e Ajuda</h2>
        <p>Estamos aqui para ajudar. Se você precisar de assistência ou tiver alguma dúvida, entre em contato conosco preenchendo o formulário abaixo.</p>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" name="mensagem" rows="4" required></textarea>
            </div>
            <button type="submit">Enviar Mensagem</button>
        </form>
        <div class="links-suporte">
            <h3>Recursos Úteis:</h3>
            <ul>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Guia do Usuário</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </div>
    </div>
</section>

  
</div>  
<br>
<br>
<br>
<br>
<br>
<br>
</div>
  </div>

</body>

</html>