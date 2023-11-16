<?php
  session_start();

  //se um usuário anunciante não estiver logado, voltar para a home
  if (!isset($_SESSION["Anunciante"])) {
    header("Location: index.php");
  }

  include "conecta.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=100%, initial-scale=1.0">
    <title>Adicionar um Ponto de Interesse</title>
    <link rel="shortcut icon" 
          href="../images/logos/sudestour_logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@800&family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style_cadastro_ponto.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</head>
<body style="background-color: #EAE8E8;">
    <nav>
        <ul class="menu">
            <div style="display:inline-block;">
                <li class="dropdown"><a href="index.php"><img src="../images/logos/sudestour_logo_claro.png" width="50" height="50" ></a></li>
            </div>
            <div class="opcoes_menu">
                <li class="dropdown"><a class="categorias-menu" href="pagamento.php"><b>Premium</b></a></li>
                <li class="dropdown"><a class="categorias-menu" href="#"><b>Adicionar Local</b></a></li>
                <li class="dropdown"><a class="categorias-menu" href="perfil.php"><b>Perfil</b></a></li>
            </div>
        </ul>
    </nav>
    
    <?php
        if (isset($_SESSION["sucesso"])) {
            echo "<script type='text/javascript'>alert('Ponto adicionado com sucesso');</script>";
        }
        unset($_SESSION["sucesso"]);
        if (isset($_SESSION["erro"])) {
            echo "<script type='text/javascript'>alert('Ocorreu um erro');</script>";
        }
        unset($_SESSION["erro"]);
    ?>
    <form action="insert_ponto.php" method="POST" enctype="multipart/form-data">
    <div class="container-principal">
        <div class="container-esquerda">
            <label id="lbl_img" class="escolher_img">
                <img src="../images/icones/add_imagem1.png" id="img_ponto">
                <input type="file" id="input" name="input_imagem">
            </label>
            <!-- 
                <label id="lbl_img" class="escolher_img" style="margin-left: 40%;">
                    <img src="../images/icones/adicionar-usuario.jpg" class="imagem-usuario">
                    <input type="file" id="input" name="input_imagem" style="display: none;">
                </label>
            -->
            <div class="hora_funcionamento">
                <p>HORÁRIO DE FUNCIONAMENTO</p><img src="../images/icones/ajuda.png" width="20px" title="Insira os dados no formato 00:00" style="margin-left:5px;">
                <table>
                    <tr>
                        <td><label>Segunda-feira</label></td>
                        <td><input type="text" name="SegAbre" class="hora"></td>
                        <td><input type="text" name="SegFecha" class="hora"></td>
                    </tr>
                    <tr>
                        <td>Terça-feira</td>
                        <td><input type="text" name="TerAbre" class="hora"></td>
                        <td><input type="text" name="TerFecha" class="hora"></td>
                    </tr>
                    <tr>
                        <td>Quarta-feira</td>
                        <td><input type="text" name="QuaAbre" class="hora"></td>
                        <td><input type="text" name="QuaFecha" class="hora"></td>
                    </tr>
                    <tr>
                        <td>Quinta-feira</td>
                        <td><input type="text" name="QuiAbre" class="hora"></td>
                        <td><input type="text" name="QuiFecha" class="hora"></td>
                    </tr>
                    <tr>
                        <td>Sexta-feira</td>
                        <td><input type="text" name="SextaAbre" class="hora"></td>
                        <td><input type="text" name="SextaFecha" class="hora"></td>
                    </tr>
                    <tr>
                        <td>Sábado</td>
                        <td><input type="text" name="SabAbre" class="hora"></td>
                        <td><input type="text" name="SabFecha" class="hora"></td>
                    </tr>
                    <tr>
                        <td>Domingo</td>
                        <td><input type="text" name="DomAbre" class="hora"></td>
                        <td><input type="text" name="DomFecha" class="hora"></td>
                    </tr>
                </table> 
            </div>        
        </div>

        <div class="container-direita">
            <!--<form action="adicionar_ponto.php" method="POST">-->
                <div class="primeira_linha" style="margin-top:1%">
                    <label class="label_formulario">Nome do Local:</label><br>
                    <input type="text" name="nome" class="texto_nome" required/><br>
                </div><br>
                

                <div class="linha_combobox">
                    <label class="label_formulario">Categoria:</label>
                    <select name="categoria" id="categoria" maxlength="30" required>
                        <option value=""></option>
                        <?php
                            $res = $mysqli->query("SELECT * FROM `categoria` ORDER BY `IdCategoria`"); 
                            while ($query = $res->fetch_assoc()) {
                                echo '<option value ="' . $query['IdCategoria'] . '">' . $query['NomeCategoria'] . '</option>';
                            }
                        ?>
                    </select>
                    <label class="label_formulario">Site:</label>
                    <input type="text" name="site" class="texto_site" required/><br>
                </div>
                <div class="segunda_linha" style="margin-top:1%">
                    <div>
                        <label class="label_formulario">CEP:</label><br>
                        <input type="text" name="CEP" class="texto_CEP" value="" id="cep" onblur="pesquisacep(this.value);" required/>
                        <script src="../js/add_ponto.js"></script>
                    </div>
                    <div class="bairro">
                        <label class="label_formulario">Bairro:</label><br>
                        <input type="text" name="bairro" class="texto_bairro" id="bairro" readonly/><br>
                    </div>
                </div><br>
                <div class="terceira-linha">
                    <label class="label_formulario">Logradouro:</label><br>
                    <input type="text" name="logradouro" class="texto_logradouro" id="rua" readonly/><br>
                </div><br>
                <div class="quarta_linha" style="margin-top:1%">
                    <div>
                        <label class="label_formulario">Cidade:</label><br>
                        <input type="text" name="cidade" class="texto_cidade" id="cidade" readonly/>
                    </div>
                    <div class="UF">
                        <label class="label_formulario">UF:</label><br>
                        <input type="text" name="UF" class="texto_UF" id="uf" readonly/>
                    </div>
                </div><br>
                <div class="quinta_linha" style="margin-top:1%">
                    <div>
                        <label class="label_formulario">Complemento:</label><br>
                        <input type="text" name="complemento" class="texto_complemento" required/><br>
                    </div>
                    <div class="numero">
                        <label class="label_formulario">Nº:</label><br>
                        <input type="text" name="numero" class="texto_No" required/><br>
                    </div>
                    <div class="telefone">
                        <label class="label_formulario">Telefone:</label><br>
                        <input type="text" name="telefone" class="texto_telefone" required/><br>
                    </div>
                </div><br>
                <div style="margin-top:1%">
                    <label class="label_formulario">Descrição:</label><br>
                    <textarea class="texto_descricao" name="descricao" id="descricao" required></textarea>  <br>   
                    Caracteres restantes: <span id="char" class="counter"></span>        
                </div>
                <button><a href="index.html" class="link">VOLTAR</a></button>
                <button type="submit" name='btnAdicionar' id="btnAdicionar">ADICIONAR</button>
            </div> 
         </div>
    </form>
    <label id="teste">a</label>
    <script src="../js/add_ponto.js"></script>
    <script>
        const getCurrentContentLength = (content, max) => {
            const maxLength = max;
            if (content.length > maxLength) {
                return false;
            } else {
                return true;
            }
        }
        const msgInput = document.querySelector('.texto_descricao');
        const counter = document.querySelector('.counter');
        const max = 100;
        var limite_atingido = false;
        // Nope
        // msgInput.addEventListener('keyup', (e) => {
        //   console.log(e);
        // });
        msgInput.onkeyup = function() {
            counter.innerHTML = max - this.value.length;
            //document.getElementById("teste").innerHTML = 'oi';
            /*if(!getCurrentContentLength(this.value, (max + 1))) {
                //msgInput.disabled = true;
                document.getElementById("teste").innerHTML = "oi";
                var limite_atingido = true;
            }*/
            if (counter.innerHTML < 0) {
                var botao = document.getElementById("btnAdicionar")
                botao.disabled = true;
                //botao.style.backgroundColor = gray;
                //limite_atingido = true;

            } else {
                var botao = document.getElementById("btnAdicionar")
                botao.disabled = false;
            }
        }
    </script>
</body>