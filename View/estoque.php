<!DOCTYPE html>
<html lang="en">
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
        <div class="search-container">
            <input type="text" id="search" placeholder="Pesquisar material..." >
        </div>
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
                <!-- Exemplo de item de estoque -->
                <tr>
                    <td>1</td>
                    <td>Papel A4</td>
                    <td class="celulaInput"><input type="number" value="1" min = "0"></td>
                    <td>ABC Fornecedores</td>
                    <td class="mais"><div>+</div></td>
                    <td class="menos"><div>-</div></td>
                </tr>
                <!-- Mais itens de estoque aqui -->
            </tbody>
           
        </table>
        <button onclick="window.location.href='cadastro-estoque.php'">Adicionar Item de Estoque</button>
    </section>
    </div>
</div>
<script>
    document.querySelectorAll('.mais div').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentElement.parentElement.querySelector('input[type="number"]');
            input.value = parseInt(input.value) + 1;
        });
    });

    document.querySelectorAll('.menos div').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentElement.parentElement.querySelector('input[type="number"]');
            if (input.value > 0) {
                input.value = parseInt(input.value) - 1;
            }
        });
    });
</script>
</body>
</html>
