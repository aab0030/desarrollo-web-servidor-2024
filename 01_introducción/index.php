<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        define("EDAD",25);

        $var = "Hola mundo";
        //echo $var;
        var_dump($var);

        $var = 3;
    
        var_dump($var);

        echo EDAD;

        echo "<br>";

        echo "<h2 style = 'color: orange'>La variable es $var</h2>";

        $frase1 = "Hola";
        $frase2 = "mundo";

        echo "<p> $frase1 " . "$frase2</p>";
    ?>

</body>
</html>