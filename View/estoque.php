<?php
include_once('../Controller/conectaDB.php');
session_start();

if (!isset($_SESSION['cpf'])) {
    header('Location: login.php');
    exit();}

// Função para buscar materiais e fornecedores
function fetchMaterials($pdo, $search = null) {
    $sqlEstoque = "SELECT e.*, m.nome_material, f.nome_fornecedor FROM estoque e
                   JOIN material m ON e.id_material = m.id_material
                   JOIN fornecedor f ON e.cnpj_fornecedor = f.cnpj_fornecedor";
    
    if ($search) {
        $search = "%{$search}%";
        $sqlEstoque .= " WHERE m.nome_material LIKE :search OR CAST(e.id_estoque AS TEXT) LIKE :search";
        $stmtEstoque = $pdo->prepare($sqlEstoque);
        $stmtEstoque->bindParam(':search', $search, PDO::PARAM_STR);
    } else {
        $stmtEstoque = $pdo->prepare($sqlEstoque);
    }

    $stmtEstoque->execute();
    return $stmtEstoque->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST['submit'])) {
    $search = trim($_POST['search']);
    $materiais = fetchMaterials($pdo, $search);
} else {
    $materiais = fetchMaterials($pdo);
}

// Função para atualizar a quantidade de materiais
if (isset($_POST['update'])) {
    $id_estoque = $_POST['id_estoque'];
    $quantidade = $_POST['quantidade'];

    try {
        $sqlUpdate = "UPDATE estoque SET quantidade = :quantidade WHERE id_estoque = :id_estoque";
        $stmtUpdate = $pdo->prepare($sqlUpdate);
        $stmtUpdate->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
        $stmtUpdate->bindParam(':id_estoque', $id_estoque, PDO::PARAM_INT);
        $stmtUpdate->execute();
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/View/estoque.css">
</head>
<body>
<?php include 'hearderLateral.php' ?>
<?=template_header('GestorHeader')?>

<div class="main_container">
    <div class="container-estoque">
        <section id="estoque">
            <h2>Estoque</h2>
            <form method="POST">
                <div class="search-container">
                    <input type="text" id="search" name="search" placeholder="Pesquisar material ou ID...">
                    <button type="submit" name="submit">Pesquisar</button>
                </div>
            </form>
            <form method="POST">
                <table>
                    <thead>
                        <tr>
                            <th>ID Estoque</th>
                            <th>Nome do Material</th>
                            <th>Quantidade</th>
                            <th>Fornecedor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($materiais as $material): ?>
                        <tr>
                            <td><?= htmlspecialchars($material['id_estoque']) ?></td>
                            <td><?= htmlspecialchars($material['nome_material']) ?></td>
                            <td class="celulaInput">
                                <input type="number" name="quantidade" value="<?= htmlspecialchars($material['quantidade']) ?>" min="0">
                                <input type="hidden" name="id_estoque" value="<?= htmlspecialchars($material['id_estoque']) ?>">
                            </td>
                            <td><?= htmlspecialchars($material['nome_fornecedor']) ?></td>
                            <td class="mais"><div>+</div></td>
                            <td class="menos"><div>-</div></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="submit" name="update">Atualizar Estoque</button>
            </form>
            <button onclick="window.location.href='cadastro-estoque.php'">Adicionar Item de Estoque</button>
        </section>
    </div>
</div>
<script>
    document.querySelectorAll('.mais div').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentElement.parentElement.querySelector('input[name="quantidade"]');
            input.value = parseInt(input.value) + 1;
        });
    });

    document.querySelectorAll('.menos div').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentElement.parentElement.querySelector('input[name="quantidade"]');
            if (input.value > 0) {
                input.value = parseInt(input.value) - 1;
            }
        });
    });
</script>
</body>
</html>
