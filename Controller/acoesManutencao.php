<?php
// Inclui o arquivo de conexão com o banco de dados
include_once('../Controller/conectaDB.php');

session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['cpf'])) {
    header('Location: ../View/login.php');
    exit();
}

// Verifica se o ID da manutenção foi passado
if (!isset($_POST['id_manutencao'])) {
    header('Location: manutencao.php');
    exit();
}

$id_manutencao = $_POST['id_manutencao'];

// Verifica qual ação foi solicitada
if (isset($_POST['acao'])) {
    $acao = $_POST['acao'];
    
    switch ($acao) {
        case 'atualizar':
            // Lógica para atualizar a manutenção
           
            break;
        case 'concluir':
            // Lógica para concluir a manutenção e atualizar o status do patrimônio
            // Primeiro, obter o id_patrimonio e a descrição da manutenção
            $sql = "SELECT id_patrimonio, defeito FROM vai_manutencao WHERE id_manutencao = :id_manutencao";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id_manutencao' => $id_manutencao]);
            $manutencao = $stmt->fetch(PDO::FETCH_ASSOC);
            $id_patrimonio = $manutencao['id_patrimonio'];
      
            
            // Atualizar o status do patrimônio para 'Disponível'
            $sql = "UPDATE patrimonio SET status_patrimonio = 'Disponível' WHERE id_patrimonio = :id_patrimonio";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id_patrimonio' => $id_patrimonio]);

            // Atualizar o status da manutenção para 'Concluído'
            $sql = "UPDATE manutencao SET status_manutencao = 'Concluído' WHERE id_manutencao = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $id_manutencao]);

            // Inserir um registro na tabela saida
            $sql = "INSERT INTO sai (data, descricao, id_manutencao, id_patrimonio) VALUES (NOW(), :descricao, :id_manutencao, :id_patrimonio)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'descricao' => 'concluido',
                'id_manutencao' => $id_manutencao,
                'id_patrimonio' => $id_patrimonio
            ]);
            break;
        case 'darbaixa':
            // Lógica para dar baixa na manutenção
              $sql = "SELECT id_patrimonio from vai_manutencao Where id_manutencao = :id ";
              $stmt = $pdo->prepare($sql);
              $stmt->execute(['id' => $id_manutencao]);
              $id_patrimonio = $stmt->fetchColumn();

           
            $sql = "DELETE FROM sai WHERE id_manutencao = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $id_manutencao]);

            $sql = "DELETE FROM vai_manutencao WHERE id_manutencao = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $id_manutencao]);

            $sql = "DELETE FROM patrimonio WHERE id_patrimonio = :id_patrimonio";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id_patrimonio' => $id_patrimonio]);


            $sql = "DELETE FROM manutencao WHERE id_manutencao = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $id_manutencao]);

          
            break;

        default:
            // Se a ação não for reconhecida, redireciona para a página de manutenção
            header('Location: ../View/manutencao.php');
            exit();
    }
}

// Redireciona para a página de manutenção após a ação ser realizada
header('Location: ../View/manutencao.php');
exit();
?>
