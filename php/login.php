<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=100%, initial-scale=1.0">
    <title>Login - Sudestour</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@800&family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style_login.css">
</head>
<body>
    <div class="container">
        <div class="container-cabecalho">
            <div class="c-bemvindo">
                <p>BEM-VINDO!</p>
            </div>
                <img src="../images/logos/sudestour_logo.png" width="100" height="85">
        </div>
        <?php
        if (isset($_SESSION["nao_autenticado"])) {
            echo "<script type='text/javascript'>alert('Usuário ou senha incorretos');</script>";
        }
        unset($_SESSION["nao_autenticado"]);
        ?>
        <form action="valida_login.php" method="POST">
            <div class="c-inputs">
                <input class="text" name="usuario" placeholder="E-MAIL" required/><br>
                <input class="text" type="password" name="senha" placeholder="SENHA" required/><br>
                <button class="esqueci" onclick="esqueciSenha();">Esqueci a senha</button>
            </div>
            <div class="c-buttons">
                <input type="radio" name="tipousr" class="radiobutton" value="anunciante">
                <label for="html">Anuciante</label>
                <input type="radio" name="tipousr" class="radiobutton" value="turista" style="margin-left:25%">
                <label for="css">Turista</label>
                <button class="botao">LOGIN</button><br>
                <button class="botao"><a href="cadastro.php" class="botao">CADASTRE-SE</a></button>
            </div>
        </form>
        <a href="index.php" class="voltar">Voltar à página inicial</a>
    </div>
    <script src="../js/login.js"></script>
</body>