<?php
//conexão ao banco de dados

$conn = new PDO("sqlite:carros.sqlite");
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

//Criar no banco de dados
$modelo = "Triton";
$marca = "Mitsubishi";
$ano = 2016;
$km = 98000;
$km_litro = 6;

$preparo = $conn->prepare("INSERT INTO carros
    (modelo, marca, ano, km, km_por_litro)
    VALUES(:modelo, :marca, :ano, :km, :kmLitro); ");

$preparo->bindParam(":modelo", $modelo);
$preparo->bindParam(":marca", $marca);
$preparo->bindParam(":ano", $ano);
$preparo->bindParam(":km", $km);
$preparo->bindParam(":kmLitro", $km_litro);

//$preparo->execute();

//Excluir do banco de dados

//$id_delete = 8;

$preparo = $conn->prepare("DELETE FROM carros WHERE id=:id; ");
$preparo->bindParam(":id", $id_delete);
$preparo->execute();

$q = $conn->query("SELECT * FROM carros;");
$carros = $q->fetchAll();

echo("<pre>");
print_r($carros);
echo("</pre>");

?>