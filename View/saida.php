<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de Manutenção</title>
    <link rel="stylesheet" href="manutencao.css">
</head>
<body>
    <?php include 'hearderLateral.php'; ?>
    <?=template_header('GestorHeader')?>

    <div class="main_container">
        <div class="card">
            <h1>Saída</h1>
            <div class="table_container">
                <div class="table_patrimonio">
                    <h3>Patrimônio</h3>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Data de Envio</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Patrimônio A</td>
                            <td>Descrição do patrimônio A</td>
                            <td>01/06/2024</td>
                            <td>Em Manutenção</td>
                            <td>
                                <button class="update"><i class="fas fa-sync-alt"></i> Atualizar</button>
                                <button class="concluir"><i class="fas fa-check"></i> Concluir</button>
                                <button class="Darbaixa"><i class="fas fa-trash"></i> Dar baixa</button>

                            </td>
                        </tr>
                        <!-- Outras linhas da tabela -->
                    </tbody>
                </table>
                </div>
                <div class="table_estoque">
                    <h3>Estoque</h3>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Data de Envio</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Patrimônio A</td>
                            <td>Descrição do patrimônio A</td>
                            <td>01/06/2024</td>
                            <td>Em Manutenção</td>
                            <td>
                                <button class="update"><i class="fas fa-sync-alt"></i> Atualizar</button>
                                <button class="concluir"><i class="fas fa-check"></i> Concluir</button>
                                <button class="Darbaixa"><i class="fas fa-trash"></i> Dar baixa</button>

                            </td>
                        </tr>
                        <!-- Outras linhas da tabela -->
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
