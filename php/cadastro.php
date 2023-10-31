<?php
  include "conecta.php";
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
            <a href="index.html"><img src="../images/logos/sudestour_logo.png" width="70" height="62"></a>
            <p class="titulo"><b>BEM-VINDO AO SUDESTOUR!<br>
            QUE TIPO DE USUÁRIO VOCÊ É?</b></p>
        </div>
        
    </div>
    <div class="cadastro_anunciante">
        <div style="display: flex; justify-content: center; align-items: center;">
            <p class="tipo_conta">CADASTRO DO ANUNCIANTE</p>
            <img src="../images/icones/ajuda.png" width="15px" title="O usuário anunciante poderá sugerir locais de interesse para serem adicionados ao site" style="margin-left:5px;"><br>
        </div>

        <form action="cadastro.php" method="POST">
            <label>Nome:</label><br>
            <input type="text" name="nome" class="texto">
            <label>CNPJ:</label><br>
            <input type="text" name="cnpj" class="texto">
            <label>Senha:</label><br>
            <input type="text" name="senha" class="texto">
            <label>E-mail:</label><br>
            <input type="text" name="email" class="texto">
            <button type="submit" class="cadastrar">CADASTRAR</button>

            <!-- Código para cadastrar um usuário do tipo ANUNCIANTE -->
            <?php
                if(empty($_POST["nome"])||empty($_POST["cnpj"])||empty($_POST["senha"])||empty($_POST["email"])){
                    echo "<script type='text/javascript'>alert('Preencha todos os campos corretamente.');</script>";
                    exit;       
                } else {                       
                    $nome = $_POST["nome"];                
                    $cnpj = $_POST["cnpj"];
                    $senha = $_POST["senha"];   
                    $email = $_POST["email"];           
                    $query = "INSERT INTO anunciante(`Cnpj`, `SenhaAnunciante`,`EmailAnunciante`, `NomeAnunciante`) VALUES ('$cnpj', '$senha', '$email', '$nome')";                    
                if(mysqli_query($mysqli, $query)){ //se a query for bem sucedida, exiba um pop-up
                    echo "<script>document.getElementByName('cnpj').value=(''); </script>";
                    echo "<script>document.getElementByName('nome').value=(''); </script>";
                    echo "<script>document.getElementByName('senha').value=(''); </script>";
                    echo "<script>document.getElementByName('email').value=(''); </script>";
                    echo "<script type='text/javascript'>alert('Seu cadastrado foi realizado com sucesso :)');</script>"; 
                } else{ //se a query for mal sucedida, exiba outro pop-up
                    echo "<script type='text/javascript'>alert('Ocorreu um erro e nenhum dado foi inserido.');</script>";  
                    }                 
                }               
                mysqli_close($mysqli);              
            ?>    
        </form>
    </div>
    <div class="cadastro_turista">
        <div style="display: flex; justify-content: center; align-items: center;">
            <p class="tipo_conta">CADASTRO DO TURISTA</p>
            <img src="../images/icones/ajuda.png" width="20px" title="O usuário turista poderá consultar e avaliar pontos de interesse" style="margin-left:5px;"><br>
        </div>
        <label>Nome:</label><br>
        <input type="text" class="texto"><br>
        <label>CNPJ:</label><br>
        <input type="text" class="texto"><br>
        <label>Senha:</label><br>
        <input type="text" class="texto"><br>
        <label>E-mail:</label><br>
        <input type="text" class="texto"><br>
        <button class="cadastrar">CADASTRAR</button>
    </div>
</body>