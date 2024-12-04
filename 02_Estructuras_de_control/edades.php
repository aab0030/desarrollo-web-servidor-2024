<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /*
    Con If y con Match
    -Si la persona tiene entre 0 y 4 es un bebe
    -Si la persona tiene entre 5 y 17 es menor de edad
    -Si la persona tiene entre 18 y 65 es adulto
    -Si la persona tiene entre 65 y 120 es jubilado
    -Si la edad esta fuera de rango error.
    */

    $edad = rand(-10, 140);

    if ($edad < 0 || $edad > 120)
        echo "<p>La edad esta fueran de rango</p>";
    elseif ($edad <= 4)
        echo "<p>Eres un niño de $edad años</p>";
    elseif ($edad <= 17) 
        echo "<p>Eres un menor de edad de $edad años</p>";
    elseif ($edad <= 65)
        echo "<p>Eres un adulto de $edad años</p>";
    else 
        echo "<p>Eres un muy viejales de $edad años</p>";
    

    $result = match (true) {
         $edad < 0 || $edad > 120 => "<p>La edad esta fueran de rango</p>",
         $edad <= 4 => "<p>Eres un niño de $edad años</p>",
         $edad <= 17 => "<p>Eres un menor de edad de $edad años</p>",
         $edad <= 65 => "<p>Eres un adulto de $edad años</p>",
         default => "<p>Eres un muy viejales de $edad años</p>",
};
    echo $result;
    ?>
</body>
</html>