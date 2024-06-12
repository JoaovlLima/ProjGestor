<?php
// Aqui você inclui o arquivo de conexão com o banco de dados
include_once('../Controller/conectaDB.php');
session_start();

if (!isset($_SESSION['cpf'])) {
    header('Location: login.php');
    exit();}

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
        $img_patrimonio = $patrimonio['img_patrimonio']; // Esta é a imagem em formato base64

        // Agora você pode usar as variáveis $nome_patrimonio, $descricao_patrimonio e $imagem_patrimonio
        // para preencher os campos HTML da página
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Patrimônio</title>
    <link rel="stylesheet" href="info-patrimonio.css">
    <!-- Link para o ícone Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <!-- Inclui o cabeçalho lateral -->
    <?php include 'hearderLateral.php'; ?>
    <?=template_header('GestorHeader')?>

    <div class="main_container">
        <div class="card">
            <!-- Exibe a imagem do patrimônio -->
          <img src="<?= "../img/".$img_patrimonio ?>" alt="Imagem do Patrimônio">

            <div class="info">
                <!-- Exibe o nome do patrimônio -->
                <h2><?= $nome_patrimonio ?></h2>
            </div>

            <div class="description">
                <!-- Exibe a descrição do patrimônio -->
                <h3>Descrição</h3>
                <p><?= $descricao_patrimonio ?></p>
            </div>

            <div class="buttons">
                <div class="editExcluir">
                    <button class="edit"><i class="fas fa-edit"></i> Editar</button>
                    <button class="delete"><i class="fas fa-trash"></i> Dar Baixa</button>
                </div>
                <div class="manuTrans">
                    <button class="manutencao" onclick="openOverlay()"><i class="fas fa-tools"></i> Enviar para Manutenção</button>
                    <a href="transferencia-patrimonio.php?id=<?= $id_patrimonio ?>" class="transferencia"><i class="fas fa-exchange-alt icon"></i> Transferência</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sobreposição -->
    <div id="overlay" class="overlay">
        <div class="overlay-content">
            <!-- Botão para fechar a sobreposição -->
            <span class="close-btn" onclick="closeOverlay()">&times;</span>
            <!-- Formulário para adicionar a descrição da manutenção -->
            <form action="../Controller/processa_cadastro_manutencao.php" method="post">
                <input type="hidden" name="id_patrimonio" value="<?php echo $id_patrimonio; ?>">
                <label for="descricao">Descrição da Manutenção:</label><br>
                <textarea id="descricao" name="descricao" rows="4" cols="50" required></textarea><br>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>

    <!-- Script para controlar a visibilidade da sobreposição -->
    <script>
        function openOverlay() {
            document.getElementById("overlay").style.display = "flex";
        }

        function closeOverlay() {
            document.getElementById("overlay").style.display = "none";
        }
    </script>
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
