<?php
    include("conecta.php");
    session_start();

    $Cep = $_REQUEST["Cep"];

    if($Cep == null) {
        header("Location: index.php");
    }

    $query = "SELECT * from local where Cep='{$Cep}'";
    $result = mysqli_query($mysqli, $query);
    $row = $result->fetch_assoc();

    $queryHoras = "SELECT * from horafuncionamento WHERE horafuncionamento.CepPonto = '{$row['Cep']}'";
    $resultHoras = mysqli_query($mysqli, $queryHoras);
    $num = mysqli_num_rows($resultHoras);
  
    if(isset($_SESSION['Anunciante'])) {
        $queryFotoPerfil = "SELECT FotoAnunciante from anunciante where Cnpj='{$_SESSION['cnpj']}'";
        $resultFotoPerfil = mysqli_query($mysqli, $queryFotoPerfil);
        $rowFotoPerfil = $resultFotoPerfil->fetch_assoc();
        $img_src = $rowFotoPerfil["FotoAnunciante"];
      }
  
      if(isset($_SESSION['Turista'])) {
        $queryFotoPerfil = "SELECT FotoTurista from turista where Cpf='{$_SESSION['cpf']}'";
        $resultFotoPerfil = mysqli_query($mysqli, $queryFotoPerfil);
        $rowFotoPerfil = $resultFotoPerfil->fetch_assoc();
        $img_src = $rowFotoPerfil["FotoTurista"];
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Detalhes Ponto</title>
    <link rel="shortcut icon" 
          href="../images/logos/sudestour_logo.png">
    <link rel="stylesheet" href="../css/style_detalhes.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <ul class="menu">
            <li class="dropdown"><a href="index.php"><img src="../images/logos/sudestour_logo_claro.png" width="50" height="50" ></a></li>
            <li class="dropdown"><a class="categorias-menu" href="espiritosanto.php"><b>Espírito Santo</b></a></li>
            <li class="dropdown"><a class="categorias-menu" href="minasgerais.php"><b>Minas Gerais</b></a></li>
            <li class="dropdown"><a class="categorias-menu" href="riodejaneiro.php"><b>Rio de Janeiro</b></a></li>
            <li class="dropdown"><a class="categorias-menu" href="saopaulo.php"><b>São Paulo</b></a></li>
            <?php
                if(isset($_SESSION['usuario'])): //caso o usuário esteja logado, o botão ficará com o nome dele
            ?>
            <div style="float:right;">
            <li class="dropdown" id="botao"><button id="botao-login" class="botaoLogin"><a href="perfil.php" class="link_botao"><img src="<?php echo 'data:image/png;base64,'.base64_encode($img_src) ?>" class="foto_perfil"><?php echo $_SESSION['usuario'];else:?></a></button></li>
            </div>
            <div style="float:right;">
                <li class="dropdown" id="botao"><button id="botao-login" class="botaoLogin"><a href="login.php" class="link_botao"><img src="../images/icones/usuario-login.png" width="40" height="40">Login<?php endif; ?></a></button></li>
            </div>
        </ul>
    </nav>
    <div class="container-principal">
        <div class="container-direita">
            <div class="container-imagem">
                <img src="<?php echo "data:image/png;base64,". base64_encode($row["Imagem"]) ?>" class="imagem-ponto"><br>
                <!-- src = "data:image/png;base64,' .base64_encode($_SESSION['resultados_busca']['imagem'][$i]). '" -->
                <div class="container-dados">
                    <p class="legenda"><?php echo $row['NomeLocal']; ?></p><br>
                    <p class="legenda"><?php echo $row['Logradouro']; ?></p>
                </div>
                <?php
                    //DESCOBRINDO SE O PONTO ESTÁ FAVORITADO PELO USUARIO
                    if(isset($_SESSION['usuario'])) {
                    if(isset($_SESSION['Anunciante'])) {
                        $queryFavoritado = "SELECT CepPonto, CnpjAnunciante from favoritos WHERE CepPonto='{$Cep}' AND CnpjAnunciante='{$_SESSION['cnpj']}'";
                        $resultFavoritado = mysqli_query($mysqli, $queryFavoritado);
                        $qtd_row = mysqli_num_rows($resultFavoritado);
                    } 

                    if(isset($_SESSION['Turista'])) {
                        $queryFavoritado = "SELECT CepPonto, CpfTurista from favoritos WHERE CepPonto='{$Cep}' AND CpfTurista='{$_SESSION['cpf']}'";
                        $resultFavoritado = mysqli_query($mysqli, $queryFavoritado);
                        $qtd_row = mysqli_num_rows($resultFavoritado);
                    }
                        if($qtd_row > 0):
                    
                ?>
                <a href="desfavoritar.php?Cep=<?php echo $Cep; ?>"><button class="btn_favorito" onclick="favoritar()"><img src="../images/icones/fav_ativado.png" class="icon-fav"></button></a><?php else: ?>
                <a href="favoritar.php?Cep=<?php echo $Cep; ?>"><button class="btn_favorito" onclick="favoritar()"><img src="../images/icones/fav_desativado.png" class="icon-fav"></button></a><?php endif; } else{ ?>
                    <a href="favoritar.php?Cep=<?php echo $Cep; ?>"><button class="btn_favorito" onclick="favoritar()"><img src="../images/icones/fav_desativado.png" class="icon-fav"></button></a><?php } ?>
                
                <!-- <a href=detalhes_ponto.php?Cep='.$_SESSION['resultados_busca']['cep'][$i].'>
                     <a href=detalhes_ponto.php?Cep='.$row["Cep"].'>-->
            </div>    
            <div class="container-descricao">
                <!--<div class="opcoes">
                    <button class="opcao" style="margin:0 auto; display: inline-block;">SOBRE</button>
                    <div class="vl"></div>
                    <button class="opcao">AVALIAÇÕES</button><br>
                </div>-->
                <div class="tab">
                    <button class="opcao" onclick="trocaAba(event, 'sobre')" style="margin:0 auto; display: inline-block;">SOBRE</button>
                    <div class="vl"></div>
                    <button class="opcao" onclick="trocaAba(event, 'avaliacao')">AVALIAÇÕES</button>
                </div>

                <!-- CONTEÚDO DA ABA SOBRE -->
                <div id="sobre" class="tabcontent">
                    <div class="descricao">
                        <label class="descricao_ponto"><?php echo $row['Descricao']; ?></label><br>
                    </div>
                    <div id="sobre" class="container-infos">
                        <img src="../images/icones/icon_local.png"><label class="endereco_ponto"><?php echo $row['Logradouro'].', '. $row['Numero'] . ' - '. $row['Cidade'].', '.$row['Uf'].', '.$row['Cep']; ?></label><br>
                        <img src="../images/icones/icon_redes.png"><label class="redes_sociais"><?php echo $row['RedeSocial']; ?></label><br>
                        <img src="../images/icones/icon_abertura.png"><button onclick="mostrarTabela()" class="horario_abertura">Horários ↓</button>
                    </div>
                    <div class="tabela_horas" id="tabela_horas" style="width: 100%; margin: 0 auto;">
                        <table style="margin-left: auto; margin-right: auto;">
                            <tr>
                                <th>Dia Semana</th>
                                <th>Abertura</th>
                                <th>Fechamento</th>
                            </tr>
                            <?php
                                while ($rowHoras = $resultHoras ->fetch_assoc()){
                            ?>
                                <tr style="border: 2px solid #737373;">
                                    <td><?php echo $rowHoras['diaSemana'] ?></td>
                                    <td><?php echo $rowHoras['HoraAbertura']  ?></td>
                                    <td><?php echo $rowHoras['HoraFechamento'] ?></td>
                                </tr>
                            <?php } ?>
                        </table><br>
                        <p id="teste"></p>
                    </div>
                </div>

                <!-- CONTEÚDO DA ABA AVALIAÇÕES -->
                <div id="avaliacao" class="tabcontent" style="display:none;">
                <?php
                    if(isset($_SESSION["nao_logado"])) {
                        //echo $_SESSION["usuario_cadastrado"];
                        echo "<script type='text/javascript'>alert('Para fazer um comentário, você deve fazer o login');</script>";
                    }
                    unset($_SESSION['nao_logado']);
                ?>
                    <form action="adicionar_avaliacao.php?Cep=<?php echo $Cep; ?>" method="POST">
                        <div class="nota_avaliar">
                            <p class="nota"><b><i>4.3</i></b></p>
                            <img src="../images/icones/estrela_vazia.png" style="width:20px;" name="um" id='1' onclick=darNota(1)>
                            <img src="../images/icones/estrela_vazia.png" style="width:20px;" name="dois" id='2' onclick=darNota(2)>
                            <img src="../images/icones/estrela_vazia.png" style="width:20px;" name="tres" id='3' onclick=darNota(3)>
                            <img src="../images/icones/estrela_vazia.png" style="width:20px;" name="quatro" id='4' onclick=darNota(4)>
                            <img src="../images/icones/estrela_vazia.png" style="width:20px;" name="cinco" id='5' onclick=darNota(5)>
                            <input id="input_nota" name="input_nota" value="0" style="display:none;">
                            <button type="submit" class="comentar"><img src="../images/icones/comentario.png" style="width:20px;">COMENTAR</button>
                        </div>
                        <div class="areatext_comentario" style="margin: 0 auto;">
                            <textarea class="area_comentario" placeholder="Avaliação" name="comentario_usuario" required></textarea>
                        </div>
                    </form>
                    <!--<div class="comentario">
                        <img src="../images/icones/usuario-login.png" class="icone-perfil"></img>
                        <div class = "perfil">
                            <p>Janete</p>
                        </div>
                        <div class="nota_usuario">
                            <img src="../images/icones/estrela.png" style="width:15px;">
                            <img src="../images/icones/estrela.png" style="width:15px;">
                            <img src="../images/icones/estrela.png" style="width:15px;">
                            <img src="../images/icones/estrela.png" style="width:15px;">
                        </div>-->
                        <!-- PREENCHER OS COMENTÁRIOS COM PHP DE ACORDO COM O BANCO DE DADOS -->
                        <!--<div class = "texto_comentario"><p>Já havia visitado a anos atrás e tive a oportunidade de revisitar atualmente com o olhar mais maduro e com mais entendimento sobre arte. Foi uma experiência incrível, saí da visita com o coração cheio de novas e boas memórias, além disso na lojinha do museu há várias lembrancinhas com um ótimo valor, levei canecas lindas pra casa como recordação dessa visita.</p></div>-->
                        <div>
                            <?php 
                                $queryComentarios = "SELECT avaliacao.Comentario, avaliacao.nota, turista.NomeTurista, turista.FotoTurista FROM avaliacao INNER JOIN turista ON avaliacao.CpfTurista = turista.cpf AND avaliacao.CepPonto = '{$Cep}'";
                                $resultComentarios = mysqli_query($mysqli, $queryComentarios);
                                //echo $queryComentarios;
                                if (mysqli_num_rows($resultComentarios) > 0) {
                                    while($row = $resultComentarios->fetch_assoc()) {      
                                            echo '<div class = "comentario">
                                            <img src="data:image/png;base64,'.base64_encode($row['FotoTurista']).'" class="icone-perfil"></img>
                                            <div class = "perfil">
                                                <p>'.$row['NomeTurista'].'</p>
                                            </div>
                                            <div class = "texto_comentario"><p>'.$row['Comentario'].'</p></div>
                                            </div>
                                            ';
                                        /*echo '<a href=detalhes_ponto.php?Cep='.$_SESSION['resultados_busca']['cep'][$i].'>
                                    <figure>
                                    <img class = "img_ponto" src = "data:image/png;base64,' .base64_encode($_SESSION['resultados_busca']['imagem'][$i]). '"></img>
                                    <p class = legenda>'.$_SESSION['resultados_busca']["nome"][$i].'</p>
                                    <p class = legenda>'.$_SESSION['resultados_busca']["logradouro"][$i].'</p>
                                    </figure>
                                    </a>';*/
                                    }
                                } else {
                                   echo "<p style='text-align:center'>Nenhum comentário ainda.";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/detalhes_ponto.js">
        /*function mostrarTabela() {
            var tb = document.getElementById("tabela_horas");
            if(tb.style.display == "none") {
                tb.style.display = "block";
            } else{
                tb.style.display = "none";
            }
        }*/
    </script>
    <script>
        function darNota(i) {
            document.getElementById(i).onclick = function() {
                nota = i;
                document.getElementById('input_nota').value = i;
                for(j = 1; j <= i; j++) {
                //this.src = "../images/icones/estrela_vazia.png";
                    document.getElementById(j).src = "../images/icones/estrela.png";;
                }
                for(j = 5; j > i; j--) {
                //this.src = "../images/icones/estrela_vazia.png";
                    document.getElementById(j).src = "../images/icones/estrela_vazia.png";;
                }
            }
        }
    </script>
</body>