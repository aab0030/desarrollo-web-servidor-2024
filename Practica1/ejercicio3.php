<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="numero" >
        <br><br>
        <select name="tipo" id="iva">
            <option value="par">Par</option>
            <option value="primo">Primo</option>
        </select><br><br>
        <input type="submit" value="Comprobar">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $numero = intval($_POST["numero"]);
        $comprobacion = $_POST["tipo"];

        if ($comprobacion == "par"){
            if ($numero % 2 == 0) echo "<p>Es par</p>";
            else echo "<p>No es par</p>";
        }else{
            $contPrimo = 0;
            for ($i=1; $i <= $numero/2; $i++) { 
                if ($numero % $i == 0) {
                    $contPrimo++;
                }
            }
            if ($contPrimo == 1) {
                echo "<p>Es primo</p>";
            }else echo "<p>No es primo</p>";
        }  
    }
    ?>
</body>
</html>