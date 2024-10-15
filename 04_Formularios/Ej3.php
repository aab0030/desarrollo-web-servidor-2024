<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="numero1">Numero 1</label>
        <input type="number" name="numero1" id="numero1">
        <br>
        <label for="numero2">Numero 2</label>
        <input type="number" name="numero2" id="numero2">
        <br>        
        <input type="submit" value="Entregar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["numero1"];
        $num2 = $_POST["numero2"];

        $contPrimo = 0;
        echo "<h2>Los primos entre $num1 y $num2.</h2>";
        for ($num1; $num1 <= $num2; $num1++) { 
            for ($i=1; $i <= $num1/2; $i++) { 
                if ($num1 % $i == 0) {
                    $contPrimo++;
                }
            }
            if ($contPrimo == 1) {
                echo $num1 . " ";
            }
            $contPrimo = 0;
        }
    }
    ?>  
</body>
</html>