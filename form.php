<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Carro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<h1>Cadastrar carro</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="form.php">Cadastrar carro</a></li>
        </ul>
    </nav>
    <main>
        <?php
        $id=0;
        $carro = null;
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $conn = new PDO("sqlite:carros.sqlite");
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $p = $conn->prepare("SELECT * FROM carros WHERE id = :id; ");
            $p->bindParam(":id", $id);
            $p->execute();
            $carro = $p->fetch();
        };

        ?>
        <form action="ws/salvar.php" method="get" class="container">

            <input type="hidden" name="id" value="<?= $id?>">

            <div class="form-group">                   
                <label for="txtModelo">Modelo:</label>
                <input class="form-control" type="text" name="modelo" id="txtModelo" value="<?= is_null($carro)? '':$carro->modelo ?>">
            </div>
            <div class="form-group"> 
                <label for="txtMarca">Marca:</label>
                <input class="form-control" type="text" name="marca" id="txtMarca" value="<?= is_null($carro)? '':$carro->marca?>">
            </div>
            <div class="form-group"> 
                <label for="numAno">Ano:</label>
                <input class="form-control" type="number" name="ano" id="numAno" value="<?= is_null($carro)? '':$carro->ano?>">
            </div>
            <div class="form-group"> 
                <label for="numKm">Km:</label>
                <input class="form-control" type="number" name="km" id="numKm" value="<?= $id==0? '':$carro->km?>"> 
            </div>
            <div class="form-group"> 
                <label for="numKmLitro">Km por litro:</label>
                <input class="form-control" type="number" name="kmLitro" id="numKmLitro" step="0.1" value="<?= is_null($carro)? '':$carro->km_por_litro?>">
            </div>
                <input class="btn btn-success" type="submit" value="Cadastrar">
                <a class="btn btn-secondary" href="index.php">Cancelar</a>
            
        </form>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>