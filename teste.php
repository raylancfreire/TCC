<!DOCTYPE html>
<html>

<head>

    <title>Tela Inicial</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>

<body>
    <header class="navbar">
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="#">Explorar</a></li>
                <li><a href="#">Meus Pedidos</a></li>
                <li><a href="#">Restaurantes</a></li>
                <li><a href="#">Ofertas</a></li>
                <li><a href="#">Perfil do Usuário</a></li>
            </ul>
        </nav>
        <div class="search-box">
            <input type="text" placeholder="Pesquisar">
            <button type="submit">Buscar</button>
        </div>
    </header>

    <div class="slideshow-container">
        <div class="slides">
            <div class="color-square red-square"></div>
            <div class="color-square green-square"></div>
            <div class="color-square blue-square"></div>
        </div>
    </div>
    <?php
    require("conn.php");
    // Consultar os produtos no banco de dados
    $sql = "SELECT * FROM produtos";
    $result = $conn->query($sql);

    // Exibir os produtos na <div>
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $produtoHTML = '
            <div class="produto">
                <img src="' . $row["imagem"] . '" alt="Imagem do produto">
                <div class="nome">' . $row["nome_produto"] . '</div>
                <div class="preco">R$ ' . $row["preco"] . '</div>
                <button class="comprar">Comprar</button>
            </div>
        ';
            echo $produtoHTML;
        }
    } else {
        echo "Nenhum produto encontrado.";
    }
    ?>


    <!-- Restante do código HTML -->

    <section class="highlight">
        <!-- Banners promocionais aqui -->
    </section>

    <section class="food-categories">
        <!-- Categorias de alimentos aqui -->
    </section>

    <section class="personalized-recommendations">
        <!-- Recomendações personalizadas aqui -->
    </section>

    <section class="restaurant-list">
        <!-- Lista de restaurantes aqui -->
    </section>

    <footer class="footer">
        <!-- Rodapé aqui -->
    </footer>

    <script>
        var slideIndex = 0;
        showSlide();

        function showSlide() {
            var i;
            var slides = document.getElementsByClassName("color-square");

            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1;
            }

            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlide, 2000); // Altera o slide a cada 2 segundos (2000 milissegundos)
        }
    </script>
</body>

</html>