<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Estoque</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/View/cadastro-estoque.css">
</head>
<body>
<?php include 'hearderLateral.php' ?>
  <?=template_header('GestorHeader')?>

  <div class="main_container">
        <div class="cadastro-estoque-container">
            <h2>Cadastro de Estoque</h2>
            <form>
                <div class="form-group">
                    <label for="nome_material">Nome do Material</label>
                    <select id="nome_material" name="nome_material">
                        <option value="Material1">Material 1</option>
                        <option value="Material2">Material 2</option>
                        <!-- Adicione mais opções conforme necessário -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" id="quantidade" name="quantidade">
                </div>
                <div class="form-group">
                    <label for="fornecedor">Fornecedor</label>
                    <select id="fornecedor" name="fornecedor">
                        <option value="Fornecedor1">Fornecedor 1</option>
                        <option value="Fornecedor2">Fornecedor 2</option>
                        <!-- Adicione mais opções conforme necessário -->
                    </select>
                </div>
                <button type="submit">Cadastrar Estoque</button>
            </form>
        </div>

        <div class="linha-divisoria">
      
        </div>

        <div class="cadastro-outros-container">
            <div class="cadastro-material-container">
                <h2>Cadastro de Material</h2>
                <form>
                    <div class="form-group">
                        <label for="novo_material">Nome do Novo Material</label>
                        <input type="text" id="novo_material" name="novo_material">
                    </div>
                    <button type="submit">Adicionar Material</button>
                </form>
            </div>
            
            <div class="cadastro-fornecedor-container">
                <h2>Cadastro de Fornecedor</h2>
                <form>
                    <div class="form-group">
                        <label for="nome_fornecedor">Nome do Novo Fornecedor</label>
                        <input type="text" id="nomw_fornecedor" name="nome_fornecedor">
                        <label for="cnpj_fornecedor">CNPJ do Novo Fornecedor</label>
                        <input type="text" id="cnpj_fornecedor" name="cnpj_fornecedor" placeholder="00.000.000/0000-00">
                    </div>
                    <button type="submit">Adicionar Fornecedor</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
