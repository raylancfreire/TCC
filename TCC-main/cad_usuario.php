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

    // Código do pop-up com checkbox de confirmação
    echo "
    <script>
        function confirmRedirect() {
            if (document.getElementById('checkbox').checked) {
                window.location.href = 'outra_pagina.php'; // Redireciona para a página desejada
            }
        }
    </script>
    <div id='popup' style='display: flex; flex-direction: column; align-items: center;'>
        <h3>Confirmação</h3>
        <p>Você concorda com os termos e condições?</p>
        <input type='checkbox' id='checkbox' required>
        <button onclick='confirmRedirect()'>Continuar</button>
    </div>
    ";
}
?>
