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
        <label for="numero3">Numero 3</label>
        <input type="number" name="numero3" id="numero3">
        <input type="submit" value="Entregar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST["numero1"];
        $b = $_POST["numero2"];
        $c = $_POST["numero3"];

        echo "<h2>Multiplos de $a entre $b y $c</h2>";
        for ($b; $b <= $c ; $b++) { 
            $multiplo = ($b % 2 == 0) ? true : false ;
            if ($multiplo) {
                echo "<p>$b</p>";
            }
        }
    }
    ?>  
</body>
</html>