<?php
    session_start();
    include("conecta.php");

    if (empty($_POST['$nomeAnunciante']) || empty($_POST('cnpjAnunciante')) || empty($_POST('senhaAnunciante')) || empty($_POST('emailAnunciante'))) {
        header('Location: cadastro.php');
        echo "<script type='text/javascript'>alert('Preencha todos os campos corretamente.');</script>";
    }
    if (isset($_POST['btnAnunciante'])) { //envia o formulário apenas quando o botão for clicado               
        $nomeAnunciante = $_POST["nomeAnunciante"];                
        $cnpjAnunciante = $_POST["cnpjAnunciante"];
        $senhaAnunciante = $_POST["senhaAnunciante"];   
        $emailAnunciante = $_POST["emailAnunciante"];           
        $queryAnunciante = "INSERT INTO anunciante(`Cnpj`, `SenhaAnunciante`,`EmailAnunciante`, `NomeAnunciante`, `statusPremium`) VALUES ('$cnpjAnunciante', '$senhaAnunciante', '$emailAnunciante', '$nomeAnunciante', 0)";    
                        
        if(mysqli_query($mysqli, $queryAnunciante)){ //se a query for bem sucedida, exiba um pop-up
            echo "<script>document.getElementByName('cnpjAnunciante').value=(''); </script>";
            echo "<script>document.getElementByName('nomeAnunciante').value=(''); </script>";
            echo "<script>document.getElementByName('senhaAnunciante').value=(''); </script>";
            echo "<script>document.getElementByName('emailAnunciante').value=(''); </script>";
            echo "<script type='text/javascript'>alert('Seu cadastrado foi realizado com sucesso :)');</script>";
            header("location: {$_SERVER['PHP_SELF']}");
            exit; 
        } 
        else{ //se a query for mal sucedida, exiba outro pop-up
            echo "<script type='text/javascript'>alert('Ocorreu um erro e nenhum dado foi inserido.');</script>";  
        }                 
       // }               
            mysqli_close($mysqli);  
        //}
    } 
?>

