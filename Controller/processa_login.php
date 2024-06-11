<?php
session_start();
print_r([$_REQUEST]); // Imprime as variáveis recebidas para depuração

if (isset($_POST['submit']) && !empty($_POST['cpf']) && !empty($_POST['senha'])) {
    include_once('conectaDB.php');

    $cpfLog = $_POST['cpf'];
    $senhaLog = $_POST['senha'];

    try {
        // Consulta SQL segura com prepared statements
        $sql = "SELECT * FROM usuario WHERE cpf_usuario = :cpf AND senha_usuario = :senha";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cpf', $cpfLog);
        $stmt->bindParam(':senha', $senhaLog);
        $stmt->execute();

        $num_rows = $stmt->rowCount();

        if ($num_rows < 1) {
            unset($_SESSION['cpf']);
            unset($_SESSION['senha']); 

            $emailExiste = false;
            header('Location: ../View/login.php?error=invalid_credentials'); // Redireciona com mensagem de erro
        } else {
            $_SESSION['cpf'] = $cpfLog;
            $_SESSION['senha'] = $senhaLog;
            header('Location: ../View/home.php');
        }
    } catch (PDOException $e) {
        // Trata erros de conexão e consulta ao banco de dados
        echo "Erro: " . $e->getMessage();
        exit();
    }
} else {
    header('Location: ../View/login.php?error=missing_fields'); // Redireciona com mensagem de erro
}
?>
