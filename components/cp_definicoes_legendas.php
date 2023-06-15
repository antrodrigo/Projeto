<!DOCTYPE html>
<html>
<head>
    <h1 class="titulos">LEGENDAS</h1>
    <p class="texto_grande">PRECISAS DE LEGENDAS?</p>
    <style>
        .hidden {
            display: none;
        }

        .center{
            text-align: center;
        }
    </style>

</head>
<body>
<!-- Primeiro par de imagens -->
<div class="center">
    <img id="imagem1" src="./images/certo.png" onclick="alternarImagem(1)">
    <img id="imagem2" src="./images/certo_verde.png" class="hidden">
</div>

<!-- Segundo par de imagens -->
<div class="center">
    <img id="imagem3" src="./images/errado.png" onclick="alternarImagem(2)">
    <img id="imagem4" src="./images/errado_verde.png" class="hidden">
</div>

<script>
    var imagens = {
        1: {
            original: "./images/certo.png",
            substituta: "./images/certo_verde.png"
        },
        2: {
            original: "./images/errado.png",
            substituta: "./images/errado_verde.png"
        }
    };

    function alternarImagem(parImagens) {
        var imagem1, imagem2;

        if (parImagens === 1) {
            imagem1 = document.getElementById("imagem1");
            imagem2 = document.getElementById("imagem2");
        } else if (parImagens === 2) {
            imagem1 = document.getElementById("imagem3");
            imagem2 = document.getElementById("imagem4");
        }

        var original = imagens[parImagens].original;
        var substituta = imagens[parImagens].substituta;

        if (imagem1.classList.contains("hidden")) {
            imagem1.classList.remove("hidden");
            imagem2.classList.add("hidden");
        } else {
            imagem1.classList.add("hidden");
            imagem2.classList.remove("hidden");
        }

    }

</script>

<form class="center" action="sc_guardar_definicao_legendas.php" method="POST">
    <!-- Input oculto para armazenar o ID do avatar escolhido -->
    <input type="hidden" name="avatar_id" id="avatar_id" value="">
    <!-- Botão de envio do formulário -->
    <button type="submit" class="btn-continuar botão">OK</button>
</form>
</body>
</html>