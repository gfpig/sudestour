<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=100%, initial-scale=1.0">
    <title>Pague seu pacote premium</title>
    <link rel="shortcut icon" 
          href="../images/logos/sudestour_logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@800&family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style_pagamento.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <ul class="menu">
            <div style="display:inline-block;">
                <li class="dropdown"><a href="index.php"><img src="../images/logos/sudestour_logo_claro.png" width="50" height="50" ></a></li>
            </div>
            <div class="opcoes_menu">
                <li class="dropdown"><a class="categorias-menu" href="#">Premium</a></li>
                <li class="dropdown"><a class="categorias-menu" href="adicionar_ponto.php">Adicionar Local</a></li>
                <li class="dropdown"><a class="categorias-menu" href="perfil.php">Perfil</a></li>
            </div>
        </ul>
    </nav>
    <div class="container">
        <div class="container-cabecalho">
            <div class="c-pacote_premium">
                <p class="titulo">PACOTE PREMIUM</p>
            </div>
        </div>
        <!--<div class="c-inputs">-->
        <div class="txt_premium">
            <p class="p_premium">Assine o pacote premium para destacar seu estabelecimento.<br>Quando os turistas pesquisarem pontos de interesse no estado desejado, o seu terá prioridade na busca e aparecerá em destaque.</p><br>
        </div>
        <div class="txt_preco">
            R$ 14,99
            <label class="txt_mes">/MÊS</label>
        </div>
        <div class="txt_upqrcode">
            PARA EFETUAR O PAGAMENTO, BASTA SCANNEAR O QRCODE :)
        </div>
        <!--</div>-->
        <div class="container-imagem">
            <?php
                if(isset($_SESSION['erro_premium'])) {
                    echo "<script type='text/javascript'>alert('Ocorreu um erro no pagamento :(');</script>";
                }
                unset($_SESSION['erro_premium']);
            ?>
            <form action="ativar_premium.php" method="POST">
                <center><button class="botao_qrcode"><img src="../images/qrcode.png" class="imagem-qrcode"></button></center><br>
            </form>
        </div>    
       
    </div>
    <script src="../js/login.js"></script>
</body>