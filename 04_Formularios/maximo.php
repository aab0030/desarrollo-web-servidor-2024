<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--
    CREAR CON NÚMEROS ALETORIOS UN ARRAY CON 10 ENTEROS DEL 1 AL 50

    MOSTRAR DICHOS NÚMEROS DE LA FORMA QUE MAS OS GUSTE

    CREAR UN FORMULARIO DONDE SE INTENTE INTRODUCIR EL MÁXIMO VALOR Y SE COMPRUEBE SI HAS ACERTADO
-->
    <?php
        $array = [1,2,3,4,5,6,7,8];
    ?>
    <form action="" method = "post">
        <label for="maximo">Máximo</label>
        <input type="text" name ="maximo" id="maximo" placeholder ="Introduce el maximo: ">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero = $_POST["maximo"];

            $candidato = $array[0];

            for ($i=1; $i < count($array); $i++) { 
                if($array[$i] > $candidato) $candidato = $array[$i];
            }

            if ($candidato == $numero)
                echo "<h1>Has acertado</h1>";
            else
                echo "<h1>Has fallado</h1>";
        }
    ?>
</body>
</html>