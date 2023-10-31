<?php
  include "conecta.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=100%, initial-scale=1.0">
    <title>Adicionar um Ponto de Interesse</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@800&family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style_cadastro_ponto.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <ul class="menu">
            <div style="display:inline-block;">
                <li class="dropdown"><a href="index.html"><img src="../images/logos/sudestour_logo_claro.png" width="50" height="50" ></a></li>
            </div>
            <div class="opcoes_menu">
                <li class="dropdown"><a class="categorias-menu" href="espiritosanto.html">Premium</a></li>
                <li class="dropdown"><a class="categorias-menu" href="#">Adicionar Local</a></li>
                <li class="dropdown"><a class="categorias-menu" href="riodejaneiro.html">Perfil</a></li>
            </div>
        </ul>
    </nav>
    <div class="container-principal">
        <div class="container-esquerda">
            <!--<form action="/action_page.php">
                <input type="file" id="img_ponto" name="fachada_ponto">
                <input type="submit">
            </form>
            É IMPORTANTE COLOCAR NO FORM DEPOIS PARA FAZER O BACKEND (EU ACHO)-->
            <label id="lbl_img" class="escolher_img">
                <img src="../images/icones/add_imagem1.png" id="img_ponto">
                <input type="file" id="input">
            </label>
            <div class="hora_funcionamento">
                <p>HORÁRIO DE FUNCIONAMENTO</p><img src="../images/icones/ajuda.png" width="20px" title="Insira os dados no formato 00:00" style="margin-left:5px;">
                <table>
                    <tr>
                      <td><label>Segunda-feira</label></td>
                      <td><input type="text" class="hora"></td>
                      <td><input type="text" class="hora"></td>
                    </tr>
                    <tr>
                      <td>Terça-feira</td>
                      <td><input type="text" class="hora"></td>
                      <td><input type="text" class="hora"></td>
                    </tr>
                    <tr>
                      <td>Quarta-feira</td>
                      <td><input type="text" class="hora"></td>
                      <td><input type="text" class="hora"></td>
                    </tr>
                    <tr>
                        <td>Quinta-feira</td>
                        <td><input type="text" class="hora"></td>
                        <td><input type="text" class="hora"></td>
                    </tr>
                    <tr>
                        <td>Sexta-feira</td>
                        <td><input type="text" class="hora"></td>
                        <td><input type="text" class="hora"></td>
                    </tr>
                    <tr>
                        <td>Sábado</td>
                        <td><input type="text" class="hora"></td>
                        <td><input type="text" class="hora"></td>
                    </tr>
                    <tr>
                        <td>Domingo</td>
                        <td><input type="text" class="hora"></td>
                        <td><input type="text" class="hora"></td>
                    </tr>
                  </table> 
            </div>        
        </div>
        <div class="container-direita">
            <div class="primeira_linha" style="margin-top:1%">
                <label class="label_formulario">Nome do Local:</label><br>
                <input type="text" class="texto_nome"><br>
            </div><br>
            <div class="linha_combobox">
                <label class="label_formulario">Categoria:</label>
                <select name="categoria" id="categoia" maxlength="30" onchange="this.form.submit();">
                    
                    <option value=""></option>
                    <?php
                    //$val = $_POST['NomeCategoria']?:'';
    
                    //$sql = "SELECT `NomeCategoria` FROM `categoria` ORDER BY `NomeCategoria`";
                    $res = $mysqli->query("SELECT `NomeCategoria` FROM `categoria` ORDER BY `IdCategoria`"); //$mysqli->query("SELECT * FROM `clientes`"); 
                    while ($query = $res->fetch_assoc()) {
                        //$selected = ($val == $row1['NomeCategoria'] ? 'selected="selected"' : '');
                        echo '<option value ="' . $query['NomeCategoria'] . '" '. $selected .'>' . $query['NomeCategoria'] . '</option>';
                    }
                    ?>
                </select><br>
            </div>
            

            <div class="segunda_linha" style="margin-top:1%">
                <div>
                    <label class="label_formulario">CEP:</label><br>
                    <input type="text" class="texto_CEP" value="" id="cep" onblur="pesquisacep(this.value);" >
                </div>
                <div class="bairro">
                    <label class="label_formulario">Bairro:</label><br>
                    <input type="text" class="texto_bairro" id="bairro"><br>
                </div>
            </div><br>
            <div class="terceira-linha">
                <label class="label_formulario">Logradouro:</label><br>
                <input type="text" class="texto_logradouro" id="rua"><br>
            </div><br>
            <div class="quarta_linha" style="margin-top:1%">
                <div>
                    <label class="label_formulario">Cidade:</label><br>
                    <input type="text" class="texto_cidade" id="cidade">
                </div>
                <div class="UF">
                    <label class="label_formulario">UF:</label><br>
                    <input type="text" class="texto_UF" id="uf">
                </div>
            </div><br>
            <div class="quinta_linha" style="margin-top:1%">
                <div>
                    <label class="label_formulario">Complemento:</label><br>
                    <input type="text" class="texto_complemento"><br>
                </div>
                <div class="numero">
                    <label class="label_formulario">Nº:</label><br>
                    <input type="text" class="texto_No"><br>
                </div>
                <div class="telefone">
                    <label class="label_formulario">Telefone:</label><br>
                    <input type="text" class="texto_telefone"><br>
                </div>
            </div><br>
            <div style="margin-top:1%">
                <label class="label_formulario">Descrição:</label><br>
                <textarea class="texto_descricao"></textarea>             
            </div>
            <button><a href="index.html" class="link">VOLTAR</a></button>
            <button>ADICIONAR</button>
        </div>
    </div>
    <script src="../js/add_ponto.js"></script>
</body>