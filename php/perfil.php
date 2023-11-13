<?php
    session_start();
    include("conecta.php");
    $user = $_SESSION['email'];
    $query = "SELECT * from anunciante where EmailAnunciante='{$user}'";
    $result = mysqli_query($mysqli, $query);
    $row = $result->fetch_assoc();
    $nome = $row["NomeAnunciante"];
    $cnpj = $row["Cnpj"];
    $email = $row["EmailAnunciante"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=100%, initial-scale=1.0">
    <title>Perfil do usuário</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@800&family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style_perfil.css">
</head>
<body>
    <nav>
        <ul class="menu">
            <div style="display:inline-block;">
                <li class="dropdown"><a href="index.php"><img src="../images/logos/sudestour_logo_claro.png" width="50" height="50" ></a></li>
            </div>
            <div class="opcoes_menu">
                <li class="dropdown"><a class="categorias-menu" href="pagamento.php">Premium</a></li>
                <li class="dropdown"><a class="categorias-menu" href="adicionar_ponto.php">Adicionar Local</a></li>
                <!--<li class="dropdown"><a class="categorias-menu" href="riodejaneiro.html">Perfil</a></li>-->
            </div>
        </ul>
    </nav>
    <div class="container">
        <div class="container-cabecalho">
            <div class="c-carteira_anunciante">
                <p><i>CARTEIRA DO ANUNCIANTE</i></p>
            </div>
        </div>
        <?php
            //echo $_SESSION["sucesso"];
            /*if(isset($_SESSION["sucesso"])) {
                echo 'oi';
                echo "<script type='text/javascript'>alert('Dados alterados com sucesso!');</script>";
            }
            unset($_SESSION["sucesso"]);*/
            //echo $_SESSION['sucesso'];
            if (isset($_SESSION['sucesso'])) {
                echo "<script type='text/javascript'>alert('Usuário ou senha incorretos');</script>";
            }
            unset($_SESSION["teste"]);
        ?>
        <form action="valida_edita_perfil.php" method="POST">
            <div class="container-esquerda">
            <div>
                    <div class="c-inputs">
                        <label>Nome</label><br>
                        <input class="text" name="nome" placeholder="Digite o nome" value=<?php echo $nome;?>><br>
                    </div>
                    
                    <div class="c-inputs">
                    <label>CPF/CNPJ</label><br>
                        <input class="text" name="documento" placeholder="Digite o CPF/CNPJ" value=<?php echo $cnpj;?>><br>
                    </div>
                    <div class="c-inputs">
                    <label>Email</label><br>
                        <input class="text" name="email" placeholder="Digite o seu EMAIL" value=<?php echo $email;?>><br>
                    </div>
                </div>
            </div>
          
            <div class="container-descricao">
                <div class="container-imagem">
                    <img src="../images/icones/adicionar-usuario.jpg" class="imagem-usuario">
                </div>
                <div class="botoes">
                    <button class="botao"><a href="favoritos.html">FAVORITOS</a></button>
                    <button type="submit" class="botao"><a href="#">EDITAR PERFIL</a></button>
                    </form>
                    <form action="logout.php" method="POST">
                        <button class="botao" style="background-color: red;"><a href="favoritos.html">SAIR</a></button>
                    </form>
                </div>           
            </div>
        
    </div>

    <script src="../js/login.js"></script>
</body>