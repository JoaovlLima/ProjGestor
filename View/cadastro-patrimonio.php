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
    <form action="../Controller/processa_cadastro_patrimonio.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="local_patrimonio" value="<?= htmlspecialchars($_GET['sala']) ?>">
        
        <p><label for="nome_patrimonio">Nome do Patrimônio:</label></p>
        <p><input type="text" id="nome_patrimonio" name="nome_patrimonio" required></p>
        
        <p><label for="codigo_patrimonio">Código do Patrimônio:</label></p>
        <p><input type="text" id="codigo_patrimonio" name="codigo_patrimonio" required></p>

        <p><label for="tipo_patrimonio">Tipo do Patrimônio:</label></p>
        <p>
            <select id="tipo_patrimonio" name="tipo_patrimonio" required>
                <option value="3">Tipo 1</option>
                <option value="4">Tipo 2</option>
                <!-- Adicione outras opções conforme necessário -->
            </select>
        </p>
        
        <p><label for="descricao_patrimonio">Descrição do Patrimônio:</label></p>
        <p><textarea id="descricao_patrimonio" name="descricao_patrimonio" required></textarea></p>
        
       
                <!-- Adicione outras opções conforme necessário -->
            </select>
        </p>
        
        <p><label for="img_patrimonio">Imagem do Patrimônio:</label></p>
        <p><input type="file" id="img_patrimonio" name="img_patrimonio" accept="image/*"></p>

        <input type="hidden" name="sala" value="<?= $_GET['sala'] ?>">
        
        <p><button type="submit">Cadastrar</button></p>
    </form>
</div>

</body>
</html>
