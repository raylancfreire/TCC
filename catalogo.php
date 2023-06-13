<?php
require("conn.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';

$tabela = $pdo->prepare("SELECT id_produto, nome_produto, descricao, marca, categoria, preco, quantidade_produto, imagem, path FROM produtos;");
$tabela->execute();
$rowTabela = $tabela->fetchAll();

if (empty($rowTabela)) {
    echo "<script>
    alert('Tabela vazia!!!');
    </script>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<div class="container">
    <div class="row">
      <div class="col mt-5">   
      <div class="catalog">
      <div class="container">
        <div class="row">
        <div class="container">
    <div class="row">
      <?php
      foreach ($rowTabela as $linha) {
        if (!empty($search) && stripos($linha['nome_produto'], $search) === false) {
          continue;
        }
        }
        ?>
        <!-- Código para exibir os itens da tabela de produtos -->
        <div class="col-md-4">
          <div class="card">
            <img src="<?php echo $linha['path']; ?>" class="card-img-top" alt="Imagem do produto">
            <div class="card-body">
              <h5 class="card-title"><?php echo $linha['nome_produto']; ?></h5>
              <p class="card-text"><?php echo $linha['descricao']; ?></p>
              <p class="card-text">Preço: R$<?php echo $linha['preco']; ?></p>
              <p class="card-text">Quantidade: <?php echo $linha['quantidade_produto']; ?></p>
            </div>
          </div>
        </div>
              <?php
              require("conn.php");

              // Consulta os dados da tabela "produtos"
              $sql = "SELECT path, nome_produto, descricao, preco FROM produtos";
              $result = $pdo->query($sql);

              // Exibe os produtos em forma de catálogo
              if ($result->rowCount() > 0) {
                echo "<div class='catalog'>"; // Início do catálogo

                foreach ($result as $row) {
                  // Exibe os detalhes do produto
                  echo "<div class='product'>";
                  echo "<img class='product-image' src='upload/{$row['path']}' alt='Imagem do produto'>";
                  echo "<h3 class='product-name'>{$row['nome_produto']}</h3>";
                  echo "<p class='product-description'>{$row['descricao']}</p>";
                  echo "<p class='product-price'>Preço: R$ {$row['preco']}</p>";
                  echo "<button class='botao-comprar'>Comprar</button>";
                  echo "</div>";
                }
            echo "</div>"; // Fim do catálogo
              } else {
                echo "<p>Nenhum produto encontrado.</p>";
              }
              switch(@$_REQUEST["page"]){
                case "catalogo":
              include("catalogo.php");
                break;
              case"cadprod":
            include("cadastrar_produto.php");
            break;
            default:
            }
    ?>
</html>
              
