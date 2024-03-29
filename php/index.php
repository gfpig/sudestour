<?php
    session_start();
    include("conecta.php");

    if(isset($_SESSION['Anunciante'])) {
      $query = "SELECT FotoAnunciante from anunciante where Cnpj='{$_SESSION['cnpj']}'";
      $result = mysqli_query($mysqli, $query);
      $row = $result->fetch_assoc();

      if($row["FotoAnunciante"] == null) {
        $nulo = true;
      } else {
        $nulo = false;
        $img_src = $row["FotoAnunciante"];
      }
    }

    if(isset($_SESSION['Turista'])) {
      $query = "SELECT FotoTurista from turista where Cpf='{$_SESSION['cpf']}'";
      $result = mysqli_query($mysqli, $query);
      $row = $result->fetch_assoc();
      
      if($row["FotoTurista"] == null) {
        $nulo = true;
        } else {
          $nulo = false;
          $img_src = $row["FotoTurista"];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descubra o melhor lugar para você - Sudestour</title>
    <link rel="shortcut icon" 
          href="../images/logos/sudestour_logo.png">
    <link rel="stylesheet" href="../css/style_index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <ul class="menu">
          <div style="margin-left:8%; width:80%; display:contents">
            <li class="dropdown"><a href="#"><img src="../images/logos/sudestour_logo_claro.png" width="50" height="50" ></a></li>
            <li class="dropdown"><a class="categorias-menu" href="espiritosanto.php"><b>Espírito Santo</b></a></li>
            <li class="dropdown"><a class="categorias-menu" href="minasgerais.php"><b>Minas Gerais</b></a></li>
            <li class="dropdown"><a class="categorias-menu" href="riodejaneiro.php"><b>Rio de Janeiro</b></a></li>
            <li class="dropdown"><a class="categorias-menu" href="saopaulo.php"><b>São Paulo</b></a></li>
          </div>
          <?php
            if(isset($_SESSION['usuario'])): //caso o usuário esteja logado, o botão ficará com o nome dele
          ?>
          <div style="float:right;">
            <li class="dropdown" id="botao"><button id="botao-login" class="botaoLogin"><a href="perfil.php" class="link_botao"><img src="<?php if($nulo == true) { echo '../images/icones/usuario-login.png'; } else{ echo 'data:image/png;base64,'.base64_encode($img_src); } ?>" class="foto_perfil"><?php echo $_SESSION['usuario'];else:?></a></button></li>
          </div>
          <div style="float:right;">
            <li class="dropdown" id="botao"><button id="botao-login" class="botaoLogin"><a href="login.php" class="link_botao"><img src="../images/icones/usuario-login.png" width="40" height="40">Login<?php endif; ?></a></button></li>
          </div>
        </ul>
    </nav>
    <div class="container-principal">
      <div class="container-esquerda">
        <div class="slogan">
            <h1>ENCONTRE O LUGAR CERTO PARA VOCÊ!</h1>
            <div class="container-busca" style="display: none;">
              <input class="texto" type=text id="categoria_lugar" placeholder="O que você está procurando?"><br>
              <input class="texto" type=text id="cidade_lugar" placeholder="Onde?"><br>
              <button class="btn btn-secondary rounded-2">BUSCAR</button>
            </div>
        </div>
      </div>
      <div class="container-direita">
        <div class="container-carrossel">
          <div id="CarrosselSudestour" class="carousel-slide" data-bs-ride="carousel">
                <div class="carousel-item active">
                  <img src="../images/bondinho-rj.webp" class="d-block w-100" alt="..." style="width:100%;">
                </div>
                <div class="carousel-item">
                  <img src="../images/ouro_preto" class="d-block w-100" alt="..." style="width:100%;">
                </div>
                <div class="carousel-item">
                  <img src="../images/masp.jpg" class="d-block w-100" alt="..." style="width:100%;">
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
</body>