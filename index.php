<?php
//conexão ao banco de dados

$conn = new PDO("sqlite:carros.sqlite");
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1>Carros BD</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="form.php">Cadastrar carro</a></li>
        </ul>
    </nav>
    <main>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Ano</th>
                <th>Km</th>
                <th>Km por litro</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            <?php
            $q = $conn->query("SELECT * FROM carros;");
            $carros = $q->fetchAll();

            foreach($carros as $c):
            ?>
            <tr>
                <td><?= $c->id ?></td>
                <td><?= $c->modelo ?></td>
                <td><?= $c->marca ?></td>
                <td><?= $c->ano ?></td>
                <td><?= $c->km ?></td>
                <td><?= $c->kmLitro?></td>
                <td><a href="#" class="btn btn-primary">Editar</button> </td>
                <td><button class="btn btn-danger">Excluir</button> </td>
            </tr>
            <?php
            endforeach;
            ?>
        </table>
    </main>
    
</body>
</html>