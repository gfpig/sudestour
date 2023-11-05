<?php
    include("conecta.php");
    session_start();

    $diretorio = addslashes(file_get_contents($_FILES["input_imagem"]["tmp_name"]));
    //$cover = addslashes(file_get_contents($_FILES["cover"]["tmp_name"]));

    $nome = $_POST["nome"];                
    $cep = $_POST["CEP"];
    $bairro = $_POST["bairro"];   
    $logradouro = $_POST["logradouro"];                 
    $cidade = $_POST["cidade"];             
    $uf = $_POST["UF"];   
    $complemento = $_POST["complemento"]; 
    $numero = $_POST["numero"]; 
    $telefone = $_POST["telefone"]; 
    $descricao = $_POST["descricao"];
    //$imagem = $_POST["LOAD_FILE('$diretorio')"];
    
    $query = "INSERT INTO local(`Cep`, `Bairro`,`Logradouro`, `Complemento`, `Telefone`, `Imagem`, `Uf`, `Cidade`, `NomeLocal`,`Numero`, `Descricao`) VALUES ('$cep', '$bairro', '$logradouro', '$complemento', '$telefone', '$diretorio', '$uf', '$cidade','$nome', '$numero', '$descricao')";                    
    if(mysqli_query($mysqli, $query)){                     
        //echo "<p style='color:green;'>Os dados foram inseridos corretamente. Verifique o resultado na aba Exibir.</p>"; 
        //echo "<script type='text/javascript'>alert('Ponto de interesse cadastrado com sucesso.');</script>"; 
        $_SESSION["sucesso"] = true; 
        header('Location: adicionar_ponto.php');
    } else{                   
        //echo "alert('')"  .mysqli_error($mysqli);
        //echo "<script type='text/javascript'>alert('Ocorreu um erro e nenhum dado foi inserido.');</script>";  
        $_SESSION["erro"] = true; 
        header('Location: adicionar_ponto.php');
    }                 
    // }               
    mysqli_close($mysqli); 
?>