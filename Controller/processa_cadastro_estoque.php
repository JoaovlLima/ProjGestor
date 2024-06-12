<?php
include_once('../Controller/conectaDB.php');

// Função para redirecionar com mensagem de erro
function redirectWithError($message) {
    header("Location: ../View/cadastro-estoque.php?error=" . urlencode($message));
    exit();
}

// Processamento do formulário de cadastro de estoque
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cadastrar_estoque'])) {
        $id_material = $_POST['nome_material'];
        $quantidade = $_POST['quantidade'];
        $cnpj_fornecedor = $_POST['fornecedor'];

        if (empty($id_material) || empty($quantidade) || empty($cnpj_fornecedor)) {
            redirectWithError("Todos os campos são obrigatórios.");
        }

        try {
            $sql = "INSERT INTO estoque (id_material, quantidade, cnpj_fornecedor) VALUES (:id_material, :quantidade, :cnpj_fornecedor)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_material', $id_material, PDO::PARAM_INT);
            $stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
            $stmt->bindParam(':cnpj_fornecedor', $cnpj_fornecedor, PDO::PARAM_STR);
            $stmt->execute();
            header("Location: ../View/estoque.php");
        } catch (PDOException $e) {
            redirectWithError("Erro ao cadastrar estoque: " . $e->getMessage());
        }
    }

    // Processamento do formulário de cadastro de material
    if (isset($_POST['cadastrar_material'])) {
        $nome_material = $_POST['novo_material'];

        if (empty($nome_material)) {
            redirectWithError("Nome do material é obrigatório.");
        }

        try {
            $sql = "INSERT INTO material (nome_material) VALUES (:nome_material)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome_material', $nome_material, PDO::PARAM_STR);
            $stmt->execute();
            header("Location: ../View/cadastro-estoque.php");
        } catch (PDOException $e) {
            redirectWithError("Erro ao cadastrar material: " . $e->getMessage());
        }
    }

    // Processamento do formulário de cadastro de fornecedor
    if (isset($_POST['cadastrar_fornecedor'])) {
        $nome_fornecedor = $_POST['nome_fornecedor'];
        $cnpj_fornecedor = $_POST['cnpj_fornecedor'];

        if (empty($nome_fornecedor) || empty($cnpj_fornecedor)) {
            redirectWithError("Nome e CNPJ do fornecedor são obrigatórios.");
        }

        try {
            $sql = "INSERT INTO fornecedor (cnpj_fornecedor, nome_fornecedor) VALUES (:cnpj_fornecedor, :nome_fornecedor)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome_fornecedor', $nome_fornecedor, PDO::PARAM_STR);
            $stmt->bindParam(':cnpj_fornecedor', $cnpj_fornecedor, PDO::PARAM_STR);
            $stmt->execute();
            header("Location: ../View/cadastro-estoque.php");
        } catch (PDOException $e) {
            redirectWithError("Erro ao cadastrar fornecedor: " . $e->getMessage());
        }
    }
} else {
    redirectWithError("Método de requisição inválido.");
}
    