<?php
// Inclui o arquivo de conexão com o banco de dados
include_once('conectaDB.php');

// Inicia a sessão
session_start();

// Verifica se o usuário está logado e se tem permissão para validar transferências
if (!isset($_SESSION['cpf']) == "1234") {
    header("Location: login.php");
   
    exit();
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_transferencia = $_POST['id_transferencia'];
    $acao = $_POST['acao'];

    if ($acao === 'aceitar') {
        // Aceita a transferência e atualiza as informações do patrimônio
        $sql = "
            UPDATE patrimonio
            SET bloco_patrimonio = (SELECT novo_bloco FROM transferencias WHERE id_transferencia = :id_transferencia),
                local_patrimonio = (SELECT nova_sala FROM transferencias WHERE id_transferencia = :id_transferencia)
            WHERE id_patrimonio = (SELECT id_patrimonio FROM transferencias WHERE id_transferencia = :id_transferencia);
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id_transferencia' => $id_transferencia]);

        // Atualiza o status da transferência para 'Aceita'
        $sql = "UPDATE transferencias SET status = 'Aceita' WHERE id_transferencia = :id_transferencia";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id_transferencia' => $id_transferencia]);
    } elseif ($acao === 'negar') {
        // Atualiza o status da transferência para 'Negada'
        $sql = "UPDATE transferencias SET status = 'Negada' WHERE id_transferencia = :id_transferencia";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id_transferencia' => $id_transferencia]);
    }

    // Redireciona de volta para a página de validação
    header("Location: ../View/validar_transferencias.php");
    exit();
} else {
    // Se o formulário não foi enviado, redireciona o usuário de volta
    header("Location: ../View/home.php");
    exit();
}
?>
