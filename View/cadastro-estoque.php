<?php
include_once('../Controller/conectaDB.php');
session_start();

if (!isset($_SESSION['cpf'])) {
    header('Location: login.php');
    exit();}

// Recuperar materiais do banco de dados
try {
    $stmtMateriais = $pdo->query("SELECT * FROM material");
    $materiais = $stmtMateriais->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Tratar erros de consulta, se necessário
    exit("Erro ao recuperar materiais: " . $e->getMessage());
}

// Recuperar fornecedores do banco de dados
try {
    $stmtFornecedores = $pdo->query("SELECT * FROM fornecedor");
    $fornecedores = $stmtFornecedores->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Tratar erros de consulta, se necessário
    exit("Erro ao recuperar fornecedores: " . $e->getMessage());
}
?>

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
    <?= template_header('GestorHeader') ?>

    <div class="main_container">
        <div class="cadastro-estoque-container">
            <h2>Cadastro de Estoque</h2>
            <form action="../Controller/processa_cadastro_estoque.php" method="POST">
                <div class="form-group">
                    <label for="nome_material">Nome do Material</label>
                    <select id="nome_material" name="nome_material">
                    <option value="">Selecione um Material</option>
                        <?php foreach ($materiais as $material) : ?>
                            <option value="<?= htmlspecialchars($material['id_material']) ?>"><?= htmlspecialchars($material['nome_material']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" id="quantidade" name="quantidade" min="0">
                </div>
                <div class="form-group">
                    <label for="fornecedor">Fornecedor</label>
                    <select id="fornecedor" name="fornecedor">
                        <option value="">Selecione um fornecedor</option> <!-- Opção padrão -->
                        <?php foreach ($fornecedores as $fornecedor) : ?>
                            <option value="<?= htmlspecialchars($fornecedor['cnpj_fornecedor']) ?>"><?= htmlspecialchars($fornecedor['nome_fornecedor']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" name="cadastrar_estoque">Cadastrar Estoque</button>
            </form>
        </div>

        <div class="linha-divisoria"></div>

        <div class="cadastro-outros-container">
            <div class="cadastro-material-container">
                <h2>Cadastro de Material</h2>
                <form action="../Controller/processa_cadastro_estoque.php" method="POST">
                    <div class="form-group">
                        <label for="novo_material">Nome do Novo Material</label>
                        <input type="text" id="novo_material" name="novo_material">
                    </div>
                    <button type="submit" name="cadastrar_material">Adicionar Material</button>
                </form>
            </div>

            <div class="cadastro-fornecedor-container">
                <h2>Cadastro de Fornecedor</h2>
                <form action="../Controller/processa_cadastro_estoque.php" method="POST">
                    <div class="form-group">
                        <label for="nome_fornecedor">Nome do Novo Fornecedor</label>
                        <input type="text" id="nome_fornecedor" name="nome_fornecedor">
                        <label for="cnpj_fornecedor">CNPJ do Novo Fornecedor</label>
                        <input type="text" id="cnpj_fornecedor" name="cnpj_fornecedor" placeholder="00.000.000/0000-00">
                    </div>
                    <button type="submit" name="cadastrar_fornecedor">Adicionar Fornecedor</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>