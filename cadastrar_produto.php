<?php
require("conn.php");



?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Cadastro de Solicitacoes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body style="background:#BEBEBE">
    <div class="container">
        <h1 style="text-align:center;">Registrar Entrada</h1>
        <br>
        <form action="" method="post" id="formulario">
            <div class="form-group offset-md-3">
                <div class="col-md-6">
                    <label for="">Nome do Produto: </label>
                    <input type="text" name="nome_produto" id="" class="form-control">
                </div>
            </div>
            <br>
            <div class="form-group offset-md-3">
                <div class="col-md-6">
                    <label for="">Descrição do Produto: </label>
                    <input type="text" name="descricao" id="" class="form-control">
                </div>
            </div>
            <div class="form-group offset-md-3">
                <div class="col-md-6">
                    <label for="">Marca do Produto: </label>
                    <input type="text" name="marca" id="" class="form-control">
                </div>
            </div>
            <div class="form-group offset-md-3">
                <div class="col-md-6">
                    <label for="">Categoria do Produto: </label>
                    <input type="text" name="categoria" id="" class="form-control">
                </div>
            </div>
            <br>
            <div class="form-group offset-md-3">
                <div class="col-md-6">
                    <label for="">Preço do Produto: </label>
                    <input type="number" name="preco" placeholder="Digite o valor  " step="0.01" min="0" required>
                </div>
            </div>
            <div class="form-group offset-md-3">
                <div class="col-md-6">
                    <label for="">Quantidade do Produto: </label>
                    <input type="number" name="quantidade" id="" class="form-control">
                </div>
            </div>
            <div class="form-group offset-md-3">
                <div class="col-md-6">
                    <label for="">Imagens do Produto: </label>
                    <input type="file" name="imagem" accept="image/*">
                </div>
            </div>
            <br>
            <br>
            <div class="form-group offset-md-3">
                <div class="col-md-6">
                    <input type="hidden" name="data_cadastro" value="<?php echo date('Y-m-d H:i:s'); ?>">
                </div>
            </div>
            <br>
            <div class="form-group offset-md-0">
                <div class="col-md-6">
                    <input type="submit" class="btn btn-success" value="CADASTRAR PRODUTO">
                    <a href="tabela.php" type="button" class="btn btn-primary float-end">Tabela Geral</a>
                </div>
            </div>
        </form>
        <div id="resultado"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        $("#formulario").submit(function() {
            event.preventDefault();
            var dados = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'CRUD/cad_prod.php',
                data: dados,
                success: function(data) {
                    $("#resultado").html(data);
                }
            });
        });
    </script>
</body>
</html>