<?php
  include "conecta.php";
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Criar nova conta</title>
    <link rel="shortcut icon" 
          href="../images/logos/sudestour_logo.png">
    <link rel="stylesheet" href="../css/style_cadastro.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@800&family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>
    <div class="cabecalho">
        
        <div class="div_titulo">
            <a href="index.php"><img src="../images/logos/sudestour_logo.png" width="70" height="62"></a>
            <p class="titulo"><b>BEM-VINDO AO SUDESTOUR!<br>
            QUE TIPO DE USUÁRIO VOCÊ É?</b></p>
        </div>
        
    </div>
    <div class="cadastro_anunciante">
        <div style="display: flex; justify-content: center; align-items: center;">
            <p class="tipo_conta">CADASTRO DO ANUNCIANTE</p>
            <img src="../images/icones/ajuda.png" width="15px" title="O usuário anunciante poderá sugerir locais de interesse para serem adicionados ao site" style="margin-left:5px;"><br>
        </div>

        <!-- Exibirá um pop-up caso o usuário tenha sido cadastrado com sucesso ou não -->
        <?php
            if(isset($_SESSION["usuario_cadastrado"])) {
                //echo $_SESSION["usuario_cadastrado"];
                echo "<script type='text/javascript'>alert('Você foi cadastrado com sucesso!');</script>";
            }
            unset($_SESSION['usuario_cadastrado']);

            if(isset($_SESSION['nao_cadastrado'])) {
                echo "<script type='text/javascript'>alert('Ocorreu um erro em seu cadastro.');</script>";
                //echo "<p class='text-danger'>Houve um erro.</p><p>Nenhum dado foi inserido.</p>".mysqli_error($mysqli);   
            }
            unset($_SESSION["nao_cadastrado"]);
        ?>
        <form action="efetuar_cadastroAnunciante.php" method="POST" style="height:100%">
            <label>Nome:</label><br>
            <input type="text" name="nomeAnunciante" class="texto" required/>
            <label>CNPJ:</label><br>
            <input type="text" name="cnpjAnunciante" class="texto" onblur="validarCNPJ(this.value)" required/>
            <label>Senha:</label><br>
            <input type="password" name="senhaAnunciante" id="senha" class="texto" pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Sua senha deve conter uma letra maiúscula, uma minúscula e pelo menos 8 caracteres" required/>
            <label>E-mail:</label><br>
            <input type="email" name="emailAnunciante" class="texto" required/>
            <button type="submit" name="btnAnunciante" class="cadastrar">CADASTRAR</button>
        </form>
    </div>
    <div class="cadastro_turista">
        <div style="display: flex; justify-content: center; align-items: center;">
            <p class="tipo_conta">CADASTRO DO TURISTA</p>
            <img src="../images/icones/ajuda.png" width="20px" title="O usuário turista poderá consultar e avaliar pontos de interesse" style="margin-left:5px;"><br>
        </div>

        <!-- Exibirá um pop-up caso o usuário tenha sido cadastrado com sucesso ou não -->
        <?php
            if(isset($_SESSION["usuario_cadastrado"])) {
                //echo $_SESSION["usuario_cadastrado"];
                echo "<script type='text/javascript'>alert('Você foi cadastrado com sucesso!');</script>";
            }
            unset($_SESSION['usuario_cadastrado']);

            if(isset($_SESSION['nao_cadastrado'])) {
                echo "<script type='text/javascript'>alert('Ocorreu um erro em seu cadastro.');</script>";
                //echo "<p class='text-danger'>Houve um erro.</p><p>Nenhum dado foi inserido.</p>".mysqli_error($mysqli);   
            }
            unset($_SESSION["nao_cadastrado"]);
        ?>
        <form action="efetuar_cadastroTurista.php" method="POST" style="height:100%">
            <label>Nome:</label><br>
            <input type="text" name="nomeTurista" class="texto" required/>
            <label>CPF:</label><br>
            <input type="text" name="cpfTurista" class="texto" onblur="validarCPF(this.value);" required/>
            <label>Senha:</label><br>
            <input type="password" name="senhaTurista" id="senha" class="texto" pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Sua senha deve conter uma letra maiúscula, uma minúscula e pelo menos 8 caracteres" required/>
            <label>E-mail:</label><br>
            <input type="email" name="emailTurista" class="texto" required/>
            <button type="submit" name="btnTurista" class="cadastrar">CADASTRAR</button>
        </form>
    </div>
    <script src="../js/cadastro_usuario.js"></script>
</body>