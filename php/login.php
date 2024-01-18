<?php
    session_start();

    //se um usuário já estiver logado, impedimos ele de acessar a página
    if (isset($_SESSION["Anunciante"]) || isset($_SESSION["Turista"])) { 
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=100%, initial-scale=1.0">
    <title>Login - Sudestour</title>
    <link rel="shortcut icon" 
          href="../images/logos/sudestour_logo.png">
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
                <img src="../images/logos/sudestour_logo.png" width="100" height="85" style="margin-top: 25%;">
        </div>
        <?php
            if (isset($_SESSION["nao_autenticado"])) {
                echo "<script type='text/javascript'>alert('Usuário ou senha incorretos');</script>";
            }
            unset($_SESSION["nao_autenticado"]);

            if (isset($_SESSION["senha_trocada"])) {
                echo "<script type='text/javascript'>alert('Senha alterada com sucesso!!');</script>";
            }
            unset($_SESSION["senha_trocada"]);

            if (isset($_SESSION["nao_trocada"])) {
                echo "<script type='text/javascript'>alert('Usuário ou senha incorretos');</script>";
            }
            unset($_SESSION["nao_trocada"]);
        ?>
        <form action="trocar_senha.php" id="troca_senha" method="POST" style="display: none";>
            <div class="c-inputs">
                <label style="width: 300px;">E-mail: </label><br>
                <input class="text" name="email_esqueci_senha" id="email_esqueci_senha" required/><br>
                <label>Nova senha: </label><br>
                <input class="text" type="password" name="nova_senha" id="nova_senha" pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}" title="A senha deve conter uma letra maiúscula, uma minúscula e pelo menos 8 caracteres" required/>
            </div>
            <div class="c-buttons">
                <input type="radio" id="novo_anunciante" name="tipousr" class="radiobutton" value="anunciante">
                <label for="novo_anunciante">Anuciante</label>
                <input type="radio" id="novo_turista" name="tipousr" class="radiobutton" value="turista" style="margin-left:5%">
                <label for="novo_turista">Turista</label>
                <button class="botao">CONFIRMAR</button>
            </div>
        </form>
        <form action="valida_login.php" id="form_login" method="POST">
            <div class="c-inputs" id="inputs">
                <input class="text" name="usuario" placeholder="E-MAIL" required/><br>
                <input class="text" type="password" name="senha" placeholder="SENHA" required/><br>
                <button class="esqueci" onclick="esqueciSenha();">Esqueci a senha</button>
            </div>
            <div class="c-checkboxes">
                <input type="radio" id="anunciante" name="tipousr" class="radiobutton" value="anunciante">
                <label for="anunciante">Anuciante</label>
                <input type="radio" id="turista" name="tipousr" class="radiobutton" value="turista" style="margin-left:15%">
                <label for="turista">Turista</label>
            </div>
            <div class="c-buttons" id="botoes">
                <!--<input type="radio" id="anunciante" name="tipousr" class="radiobutton" value="anunciante">
                <label for="anunciante">Anuciante</label>
                <input type="radio" id="turista" name="tipousr" class="radiobutton" value="turista" style="margin-left:15%">
                <label for="turista">Turista</label>-->
                <button class="botao">LOGIN</button><br>
                <button class="botao"><a href="cadastro.php" class="botao">CADASTRE-SE</a></button>
            </div>
        </form>
        <a href="index.php" class="voltar">Voltar à página inicial</a>
    </div>
    <script src="../js/login.js"></script>
</body>