<?php
    include("conn.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuarios = $pdo->prepare('SELECT * FROM usuarios WHERE email = :email AND senha_hash = :senha');
    $usuarios->execute(array(':email' => $email, ':senha_hash' => $senha));

    $rowTabela = $usuarios->fetchAll();
    
    if (empty($rowTabela)){
        echo "<script>
        alert('Usuário e/ou senha inválidos!!!');
        window.location.href = 'index.php'; // Redireciona para a página de login novamente
        </script>";
    } else {
        $sessao = $rowTabela[0];

        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['id_usuarios'] = $sessao['id_usuarios'];
        $_SESSION['email'] = $sessao['email'];

        // Código do pop-up com checkbox de confirmação
        echo "
        <script>
            function confirmRedirect() {
                if (document.getElementById('checkbox').checked) {
                    window.location.href = 'tabela.php'; // Redireciona para a página desejada
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
