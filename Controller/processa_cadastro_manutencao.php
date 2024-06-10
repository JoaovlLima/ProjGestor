<?php
// Aqui você inclui o arquivo de conexão com o banco de dados
include_once('../Controller/conectaDB.php');

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos necessários foram preenchidos
    if (isset($_POST['id_patrimonio']) && isset($_POST['descricao'])) {
        // Obtém os dados do formulário
        $id_patrimonio = $_POST['id_patrimonio'];
        $descricao_manutencao = $_POST['descricao'];

        // Define o status da manutenção
        $status_manutencao = "Em Manutenção";

        try {
            // Inicia a transação
            $pdo->beginTransaction();

            // Insere a nova manutenção no banco de dados
            $sql_insert_manutencao = "INSERT INTO manutencao (id_patrimonio, status_manutencao, descricao_manutencao) VALUES (:id_patrimonio, :status_manutencao, :descricao_manutencao)";
            $stmt_insert_manutencao = $pdo->prepare($sql_insert_manutencao);
            $stmt_insert_manutencao->execute([
                'id_patrimonio' => $id_patrimonio,
                'status_manutencao' => $status_manutencao,
                'descricao_manutencao' => $descricao_manutencao
            ]);

            // Atualiza o status do patrimônio para "Em Manutenção"
            $sql_update_patrimonio = "UPDATE patrimonio SET status_patrimonio = :status_patrimonio WHERE id_patrimonio = :id_patrimonio";
            $stmt_update_patrimonio = $pdo->prepare($sql_update_patrimonio);
            $stmt_update_patrimonio->execute([
                'status_patrimonio' => $status_manutencao,
                'id_patrimonio' => $id_patrimonio
            ]);

            // Confirma a transação
            $pdo->commit();

            // Redireciona de volta para a página de informações do patrimônio
            header("Location: info-patrimonio.php?id=" . $id_patrimonio);
            exit();
        } catch (PDOException $e) {
            // Em caso de erro, cancela a transação e exibe uma mensagem de erro
            $pdo->rollBack();
            echo "Erro ao cadastrar a manutenção: " . $e->getMessage();
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
