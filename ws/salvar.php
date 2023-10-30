<?php
//conexão ao banco de dados

$conn = new PDO("sqlite:../carros.sqlite");
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$id = $_GET["id"];
$modelo = $_GET["modelo"];
$marca = $_GET["marca"];
$ano = $_GET["ano"];
$km = $_GET["km"];
$km_litro = $_GET["kmLitro"];

if($id == 0){
    $preparo = $conn->prepare("INSERT INTO carros
    (modelo, marca, ano, km, km_por_litro)
    VALUES(:modelo, :marca, :ano, :km, :kmLitro); ");
}else{
    $preparo = $conn->prepare("UPDATE carros
    SET modelo=:modelo, marca=:marca, ano=:ano, km=:km, km_por_litro=:kmLitro
    WHERE id=:id;");
    $preparo->bindParam(":id", $id);
}

$preparo->bindParam(":modelo", $modelo);
$preparo->bindParam(":marca", $marca);
$preparo->bindParam(":ano", $ano);
$preparo->bindParam(":km", $km);
$preparo->bindParam(":kmLitro", $km_litro);

$preparo->execute();

header("Location:../index.php");