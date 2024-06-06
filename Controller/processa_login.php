<?php
session_start();
print_r([$_REQUEST]);

if(isset($_POST['submit']) && !empty($_POST['cpf']) && !empty($_POST['senha'])){
    include_once('conectaDB.php');

    $cpfLog = $_POST['cpf'];
    $senhaLog = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE cpf_usuario = '$cpfLog' and senha_usuario = '$senhaLog'";
    $stmt = $pdo->query($sql);
    $num_rows = $stmt->rowCount();

    if($num_rows < 1){
        unset($_SESSION['cpf']);
        unset($_SESSION['senha']); 

        $emailExiste = false;
        header('Location: ../View/login.php');
    } else {
        $_SESSION['cpf'] = $cpfLog;
        $_SESSION['senha'] = $senhaLog;
        header('Location: ../View/home.php');
    }
} else {
    header('Location: ../View/login.php');
}
?>
