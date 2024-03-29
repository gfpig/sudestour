<?php
    session_start();
    include("conecta.php");

    //LÓGICA PARA USUÁRIO NÃO LOGADO NÃO ACESSAR A PÁGINA
    if(!isset($_SESSION['Anunciante']) && !isset($_SESSION['Turista'])) {
        header('Location: index.php');
    }

    //PREENCHER OS DADOS SE FOR ANUNCIANTE
    if(isset($_SESSION['Anunciante'])) {
        $user = $_SESSION['cnpj'];
        $query = "SELECT * from anunciante where Cnpj='{$user}'";
        $result = mysqli_query($mysqli, $query);
        $row = $result->fetch_assoc();
        $nome = $row["NomeAnunciante"];
        $documento = $row["Cnpj"];
        $email = $row["EmailAnunciante"];
        $img_src = $row["FotoAnunciante"];

        if($row['statusPremium'] == 1) {
            echo '
            <style>
                p {
                    color: #545454;
                }
                .container {
                    background: linear-gradient(to right, #BF953F, #FCF6BA, #FBF5B7, #AA771C);
                }

                .botao{
                    background-color: #daa425;
                }
            </style>';
        } else {
            echo '
            <style>
                p {
                    color: #EAE8E8;
                }
                .container {
                    background-color: #545454;
                }

                .botao {
                    background-color: #8d8787;
                }
            </style>';
        }
    }

    //PREENCHER OS DADOS SE FOR TURISTA
    if(isset($_SESSION['Turista'])) {
        $user = $_SESSION['cpf'];
        $query = "SELECT * from turista where Cpf='{$user}'";
        $result = mysqli_query($mysqli, $query);
        $row = $result->fetch_assoc();
        $nome = $row["NomeTurista"];
        $documento = $row["cpf"];
        $email = $row["EmailTurista"];
        $img_src = $row["FotoTurista"];

        ?>
        <style>
            .categorias-menu {
                display:none;
            }

            p {
                color: #EAE8E8;
            }
            .container {
                background-color: #545454;
            }

            .botao {
                background-color: #8d8787;
            }
        </style>
        <?php
    }

    /*if($img_src == null) {
        //$img_src = "../images/icones/adicionar-usuario.jpg";
        echo 'oi';
    }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=100%, initial-scale=1.0">
    <title>Perfil do usuário</title>
    <link rel="shortcut icon" 
          href="../images/logos/sudestour_logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@800&family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style_perfil.css">
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
                <li class="dropdown"><a class="categorias-menu" href="pagamento.php">Premium</a></li>
                <li class="dropdown"><a class="categorias-menu" href="adicionar_ponto.php">Adicionar Local</a></li>
                <!--<li class="dropdown"><a class="categorias-menu" href="riodejaneiro.html">Perfil</a></li>-->
            </div>
        </ul>
    </nav>
    <div class="container">
        <div class="container-cabecalho">
            <div class="c-carteira_anunciante">
                <?php if(isset($_SESSION['Anunciante'])): ?>
                    <p><i>CARTEIRA DO ANUNCIANTE</i></p>
                <?php else: ?>
                    <p><i>CARTEIRA DO TURISTA</i></p>
                <?php endif; ?>
            </div>
        </div>
        <?php
            if (isset($_SESSION['sucesso'])) {
                echo "<script type='text/javascript'>alert('Dados atualizados com sucesso!');</script>";
            }
            unset($_SESSION["sucesso"]);
        ?>
        <div class="container-dados">    
            <div class="container-esquerda">
                <form action="valida_edita_perfil.php" method="POST" enctype="multipart/form-data">
                    <?php echo '
                        <div class="c-inputs">
                            <label>Nome</label><br>
                            <input class="text" name="nome" placeholder="Digite o nome" value="'.$nome.'" required><br>
                        </div>
                        
                        <div class="c-inputs">
                            <label>Nº DOCUMENTO</label><br>
                                <input class="text" name="documento" placeholder="Digite o CPF/CNPJ" value='.$documento.'><br>
                        </div>
                        <div class="c-inputs">
                            <label>Email</label><br>
                                <input class="text" name="email" placeholder="Digite o seu EMAIL" value='.$email.' required><br>
                        </div>';
                    ?>
                </form>
            </div>
                  
            <div class="container-descricao">
                <div class="container-imagem">
                    <form action="valida_edita_perfil.php" method="POST" enctype="multipart/form-data">
                        <label id="lbl_img" class="escolher_img" style="margin-left: 40%;">
                            <?php if($img_src == null): ?>
                                <img src="../images/icones/adicionar-usuario.jpg" id="foto_perfil" class="imagem-usuario">
                            <?php else: ?>
                                <img src= "<?php echo 'data:image/png;base64,'.base64_encode($img_src) ?>" id="foto_perfil" class="imagem-usuario">
                            <?php endif ?>
                            <input type="file" id="input" name="input_imagem" style="display:none;">
                        </label>
                </div>
            </div>            
        </div>
            <div class="botoes">
                    <button type="submit" name="editar" class="botao">EDITAR PERFIL</button>
                    </form>
                        <button class="botao" name="favoritos"><a class="link_btn" href="favoritos.php">FAVORITOS</a></button>
                    <form action="logout.php" method="POST">
                        <button class="botao" name="sair" style="background-color: red;">SAIR</button>
                    </form>
                </div> 

            <?php
                if (isset($_POST['favoritos']) || isset($_POST['sair'])) {
                    header('Location: perfil.php');
                    exit();
                }
            ?>
        
    </div>

    <script src="../js/perfil.js"></script>
</body>