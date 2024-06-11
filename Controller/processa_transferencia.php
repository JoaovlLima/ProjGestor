<?php
session_start();
// Inclui o arquivo de conexão com o banco de dados
include_once('conectaDB.php');

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $id_patrimonio = $_POST['id_patrimonio'];
    $novo_bloco = $_POST['bloco'];
    $nova_sala = $_POST['sala'];
    $cpf = $_SESSION['cpf']; // CPF do usuário que solicitou a transferência

    // Consulta SQL para inserir a solicitação de transferência na tabela de transferências
    $sql = "INSERT INTO transferencias (id_patrimonio, novo_bloco, nova_sala, cpf_usuario, status)
            VALUES (:id_patrimonio, :novo_bloco, :nova_sala, :cpf_usuario, 'Pendente')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id_patrimonio' => $id_patrimonio,
        'novo_bloco' => $novo_bloco,
        'nova_sala' => $nova_sala,
        'cpf_usuario' => $cpf
    ]);

    // Redireciona o usuário para uma página de confirmação
    header("Location: ../View/transferencia_confirmacao.php");
    exit();
} else {
    // Se o formulário não foi enviado, redireciona o usuário de volta
    header("Location: ../View/home.php");
    exit();
}
?>
