<?php
// Aqui você inclui o arquivo de conexão com o banco de dados
include_once('../Controller/conectaDB.php');

// Verifica se o parâmetro "id" está presente na URL
if(isset($_GET['id'])) {
    // Obtém o ID do patrimônio da URL
    $id_patrimonio = $_GET['id'];

    // Consulta SQL para obter as informações do patrimônio com base no ID
    $sql = "SELECT * FROM patrimonio WHERE id_patrimonio = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id_patrimonio]);
    $patrimonio = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o patrimônio foi encontrado
    if($patrimonio) {
        // Preenche os campos HTML com as informações do patrimônio
        $nome_patrimonio = htmlspecialchars($patrimonio['nome_patrimonio']);
        $descricao_patrimonio = htmlspecialchars($patrimonio['descricao_patrimonio']);

        // Consulta SQL para obter o nome do bloco atual com base no ID
        $sql_bloco_atual = "SELECT nome_bloco_patrimonio FROM bloco_patrimonio WHERE id_bloco_patrimonio = :bloco_atual";
        $stmt_bloco_atual = $pdo->prepare($sql_bloco_atual);
        $stmt_bloco_atual->execute(['bloco_atual' => $patrimonio['bloco_patrimonio']]);
        $bloco_atual_nome = $stmt_bloco_atual->fetchColumn();

        // Consulta SQL para obter o nome da sala atual com base no ID
        $sql_sala_atual = "SELECT nome_local_patrimonio FROM local_patrimonio WHERE id_local_patrimonio = :sala_atual";
        $stmt_sala_atual = $pdo->prepare($sql_sala_atual);
        $stmt_sala_atual->execute(['sala_atual' => $patrimonio['local_patrimonio']]);
        $sala_atual_nome = $stmt_sala_atual->fetchColumn();

        // Consulta SQL para obter todos os blocos
        $sql_blocos = "SELECT * FROM bloco_patrimonio";
        $stmt_blocos = $pdo->prepare($sql_blocos);
        $stmt_blocos->execute();
        $blocos = $stmt_blocos->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferência de Patrimônio</title>
    <link rel="stylesheet" href="transferencia-patrimonio.css">
    <!-- Link para o ícone Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script>
    // Função para carregar as salas de um bloco selecionado
    function loadSalas(blocoId) {
        console.log('Carregando salas para o bloco:', blocoId); // Log para verificar a chamada

        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../Controller/get_salas.php?bloco=' + blocoId, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    document.getElementById('sala').innerHTML = xhr.responseText;
                } else {
                    console.error('Erro ao carregar salas:', xhr.status, xhr.statusText); // Log para verificar erros
                    console.error(xhr.responseText); // Log para verificar a resposta do servidor
                }
            }
        };
        xhr.send();
    }
</script>
</head>
<body>
    <!-- Inclui o cabeçalho lateral -->
    <?php include 'hearderLateral.php'; ?>
    <?=template_header('GestorHeader')?>

    <div class="main_container">
        <div class="card">
            <h2>Transferência de Patrimônio</h2>
            <form action="../Controller/processa_transferencia.php" method="post">
                <input type="hidden" name="id_patrimonio" value="<?php echo $id_patrimonio; ?>">
                <div class="field">
                    <label for="bloco">Bloco Atual:</label>
                    <input type="text" id="bloco_atual" name="bloco_atual" value="<?= $bloco_atual_nome ?>" disabled>
                </div>
                <div class="field">
                    <label for="sala">Sala Atual:</label>
                    <input type="text" id="sala_atual" name="sala_atual" value="<?= $sala_atual_nome ?>" disabled>
                </div>
                <div class="field">
                    <label for="bloco">Novo Bloco:</label>
                    <select id="bloco" name="bloco" onchange="loadSalas(this.value)" required>
                        <option value="">Selecione um bloco</option>
                        <?php foreach ($blocos as $bloco): ?>
                            <option value="<?= $bloco['id_bloco_patrimonio'] ?>"><?= $bloco['nome_bloco_patrimonio'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="field">
                    <label for="sala">Nova Sala:</label>
                    <select id="sala" name="sala" required>
                        <option value="">Selecione um bloco primeiro</option>
                    </select>
                </div>
                <button type="submit">Transferir</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php
    } else {
        // Se o patrimônio não for encontrado, exibe uma mensagem de erro
        echo "Patrimônio não encontrado.";
    }
} else {
    // Se o parâmetro "id" não estiver presente na URL, exibe uma mensagem de erro
    echo "ID do patrimônio não fornecido.";
}
?>
