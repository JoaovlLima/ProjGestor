<?php
include_once('../Controller/conectaDB.php');

// Verifica se o ID da sala está presente na URL
if(isset($_POST['sala']) && !empty($_POST['sala'])) {
    $sala_id = $_POST['sala'];

    try {
        // Consulta para obter o ID do bloco da sala
        $consulta_bloco = "SELECT b.id_bloco_patrimonio FROM local_patrimonio l INNER JOIN bloco_patrimonio b ON l.id_bloco_patrimonio = b.id_bloco_patrimonio WHERE l.id_local_patrimonio = :sala_id";
        $stmt_bloco = $pdo->prepare($consulta_bloco);
        $stmt_bloco->bindParam(':sala_id', $sala_id, PDO::PARAM_INT);
        $stmt_bloco->execute();
        $bloco = $stmt_bloco->fetch(PDO::FETCH_ASSOC);
      
        // Verifica se o bloco foi encontrado
        if($bloco) {
            $id_bloco = $bloco['id_bloco_patrimonio'];
        } else {
            echo "Erro: Sala não encontrada.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        exit;
    }
} else {
    echo "Erro: ID da sala não especificado na URL.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_patrimonio = $_POST['nome_patrimonio'];
    $codigo_patrimonio = $_POST['codigo_patrimonio'];
    $tipo_patrimonio = $_POST['tipo_patrimonio'];
    $descricao_patrimonio = $_POST['descricao_patrimonio'];
    $status_patrimonio = 'Disponível'; // Define o status como Disponível por padrão
    $local_patrimonio = $_POST['local_patrimonio'];

    // Manipulação de upload de imagem
    $img_patrimonio = $_FILES['img_patrimonio'];
    $uploadDir = ''; // Diretório de destino dos uploads
    $uploadFile = $uploadDir . basename($img_patrimonio['name']);
    
    if (move_uploaded_file($img_patrimonio['tmp_name'], $uploadFile)) {
        // Concatena o caminho do diretório ao nome do arquivo
        $img_patrimonio = $uploadFile;
    } else {
        echo "Erro no upload da imagem.";
        exit;
    }

    try {
        $sql = "INSERT INTO patrimonio (nome_patrimonio, id_patrimonio, tipo_patrimonio, descricao_patrimonio, status_patrimonio, img_patrimonio, local_patrimonio, bloco_patrimonio) 
                VALUES (:nome_patrimonio, :codigo_patrimonio, :tipo_patrimonio, :descricao_patrimonio, :status_patrimonio, :img_patrimonio, :local_patrimonio, :bloco_patrimonio)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome_patrimonio', $nome_patrimonio);
        $stmt->bindParam(':codigo_patrimonio', $codigo_patrimonio);
        $stmt->bindParam(':tipo_patrimonio', $tipo_patrimonio);
        $stmt->bindParam(':descricao_patrimonio', $descricao_patrimonio);
        $stmt->bindParam(':status_patrimonio', $status_patrimonio);
        $stmt->bindParam(':img_patrimonio', $img_patrimonio);
        $stmt->bindParam(':local_patrimonio', $local_patrimonio);
        $stmt->bindParam(':bloco_patrimonio', $id_bloco); // Usando o ID do bloco
        
        $stmt->execute();
        
        // Redireciona para uma página de sucesso
        header("Location: ../View/tabela-sala.php?sala=".$local_patrimonio."!");
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
