<?php
//connecção ao banco de dados

$conn = new PDO("sqlite:carros.sqlite");
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$modelo = "Onix";
$marca = "Chevrolet";
$ano = 2023;
$km = 1600;
$km_litro = 19;

$preparo = $conn->prepare("INSERT INTO carros
    (modelo, marca, ano, km, km_por_litro)
    VALUES(:modelo, :marca, :ano, :km, :kmLitro); ");

$preparo->bindParam(":modelo", $modelo);
$preparo->bindParam(":marca", $marca);
$preparo->bindParam(":ano", $ano);
$preparo->bindParam(":km", $km);
$preparo->bindParam(":kmLitro", $km_litro);



$q = $conn->query("SELECT * FROM carros;");
$carros = $q->fetchAll();

echo("<pre>");
print_r($carros);
echo("</pre>");

?>