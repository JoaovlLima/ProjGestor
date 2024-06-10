<?php
// Inclui o arquivo de conexão com o banco de dados
include_once('../Controller/conectaDB.php');

// Verifica se o parâmetro "bloco" está presente na URL
if(isset($_GET['bloco'])) {
    $id_bloco = $_GET['bloco'];

    // Consulta SQL para obter as salas do bloco
    $sql = "SELECT * FROM local_patrimonio WHERE id_bloco_patrimonio = :id_bloco";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_bloco' => $id_bloco]);
    $salas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Verifica se há salas disponíveis
    if ($salas) {
        // Gera as opções do select
        foreach ($salas as $sala) {
            echo "<option value='" . htmlspecialchars($sala['id_local_patrimonio']) . "'>" . htmlspecialchars($sala['nome_local_patrimonio']) . "</option>";
        }
    } else {
        echo "<option value=''>Nenhuma sala encontrada</option>";
    }
} else {
    echo "<option value=''>Erro: bloco não especificado</option>";
}
?>
