<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Patrimônio</title>
    <link rel="stylesheet" href="/View/cadastro.css">
</head>
<body>


<div class="cadastro-container">
        <h2>Cadastro de Patrimônio</h2>
        <form action="processa_cadastro.php" method="POST">
            <p><label for="nome_patrimonio">Nome do Patrimônio:</label></p>
            <p><input type="text" id="nome_patrimonio" name="nome_patrimonio"></p>
            <p><label for="codigo_patrimonio">Codigo do Patrimônio:</label></p>
            <p><input type="text" id="codigo_patrimonio" name="codigo_patrimonio"></p>



            <p><label for="tipo_patrimonio">Tipo do Patrimônio:</label></p>
            <p><select id="tipo_patrimonio" name="tipo_patrimonio">
                <option value="1">Tipo 1</option>
                <option value="2">Tipo 2</option>
                <option value="3">Tipo 3</option>
                <!-- Adicione outras opções conforme necessário -->
            </select></p>

            <p><button type="submit">Cadastrar</button></p>
        </form>
    </div>
   
</body>
</html>
