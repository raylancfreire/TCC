<?php
require('../conn.php');

$nome_usuario = $_POST['nome_usuario'];
$email = $_POST['email'];
$senha = $_POST['senha_hash'];

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

if (empty($nome_usuario) || empty($email) || empty($senha_hash)) {
    echo "Os valores não podem ser vazios";
} else {
    $cad_usuarios = $pdo->prepare("INSERT INTO usuarios(nome_usuario, email, senha_hash) 
        VALUES(:nome_usuario, :email, :senha_hash)");
    $cad_usuarios->execute(array(
        ':nome_usuario' => $nome_usuario,
        ':email' => $email,
        ':senha_hash' => $senha_hash
    ));

    echo "<script>
        alert('Usuário cadastrado com sucesso!');
        </script>";
}
?>
