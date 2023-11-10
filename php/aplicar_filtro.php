<?php
include("conecta.php");

$bairro = mysqli_real_escape_string($mysqli, $_POST['bairros']);
$cidade = mysqli_real_escape_string($mysqli, $_POST['cidades']);

$result = $mysqli->execute("SELECT * FROM local WHERE Bairro = '{$bairro}' AND Cidade = '{$cidade}'  ORDER BY `Bairro` ASC");


/*$cidade = $_GET['cidadeSelecionada'];

$result = $mysqli->prepare("SELECT DISTINCT `Bairro` FROM `local` WHERE IdCategoria =':cidadeSelecionada'  ORDER BY `Bairro` ASC");

$dado = ['cidadeSelecionada' => $cidade];
$result -> execute($dado);

while($row = $result->fetch_assoc()) {
    echo '<option value ="' . $row['Bairro'] . '">' . $row['Bairro'] . '</option>';
}*/

/*$categoria = $_GET['categoria'];

$query = $mysqli -> prepare("SELECT DISTINCT Bairro FROM local WHERE IdCategoria =':categoria'  ORDER BY `Bairro` ASC");

$data = ['categoria' => $categoria];
$query -> execute($data);

$registros = $query -> fetchAll(PDO::FETCH_ASSOC);
foreach ($registros as $option) {
?>
    <option value ="<?php echo $option['Bairro']?>"><?php echo $option['Bairro']?></option>
<?php
}*/
?>