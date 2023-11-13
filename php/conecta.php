<?php
  $mysqli = new mysqli("localhost", "root", "", "sudestour2");
  if ($mysqli->connect_errno) {        
    echo "<head><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'></head>";        
    echo "<body class='bg-dark text-center'>";        
    echo "<div class='row text-center fw-bold bg-dark mt-5'>";        
    echo "<p class='text-danger fs-1 mt-5'>Ocorreu um erro na conexão com o banco de dados</p><br>";        
    echo "<a href='index.php' class='btn btn-primary fs-1 fw-bold mt-5 rounded-3 col-sm-8 offset-sm-2'>Voltar</a>";        
    echo "</div></body>";        
    exit;    
  }    
  mysqli_set_charset($mysqli, 'utf8');
?>