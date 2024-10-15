<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action="" method="post">
        <label for="numero1">Numero 1</label>
        <input type="number" name="numero1" id="numero1">
        <br>
        <label for="numero2">Numero 2</label>
        <input type="number" name="numero2" id="numero2">
        <br>
        <label for="numero3">Numero 3</label>
        <input type="number" name="numero3" id="numero3">
        <input type="submit" value="Entregar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $candidato = $_POST["numero1"];
        $num1 = $_POST["numero2"];
        $num2 = $_POST["numero3"];

        if ($candidato < $num1) {
            $candidato = $num1;
        }
        if ($candidato < $num2) {
            $candidato = $num2;
        }

        echo "<h2>El numero mayor es $candidato</h2>";
    }
    ?>  
</body>
</html>