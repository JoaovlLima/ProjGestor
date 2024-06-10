<?php
// Aqui você inclui o arquivo de conexão com o banco de dados
include_once('../Controller/conectaDB.php');

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos necessários foram preenchidos
    if (isset($_POST['id_patrimonio']) && isset($_POST['bloco']) && isset($_POST['sala'])) {
        // Obtém os dados do formulário
        $id_patrimonio = $_POST['id_patrimonio'];
        $novo_bloco = $_POST['bloco'];
        $nova_sala = $_POST['sala'];

        try {
            // Atualiza o bloco e sala do patrimônio
            $sql_update = "UPDATE patrimonio SET bloco_patrimonio = :novo_bloco, local_patrimonio    = :nova_sala WHERE id_patrimonio = :id_patrimonio";
            $stmt_update = $pdo->prepare($sql_update);
            $stmt_update->execute([
                'novo_bloco' => $novo_bloco,
                'nova_sala' => $nova_sala,
                'id_patrimonio' => $id_patrimonio
            ]);

            // Redireciona de volta para a página de informações do patrimônio
            header("Location: ../View/info-patrimonio.php?id=" . $id_patrimonio);
            exit();
        } catch (PDOException $e) {
            // Em caso de erro, exibe uma mensagem de erro
            echo "Erro ao transferir o patrimônio: " . $e->getMessage();
        }
    } else {
        // Se algum campo estiver faltando, exibe uma mensagem de erro
        echo "Por favor, preencha todos os campos.";
    }
} else {
    // Se o formulário não foi submetido via método POST, exibe uma mensagem de erro
    echo "Erro: o formulário deve ser submetido via método POST.";
}
?>
