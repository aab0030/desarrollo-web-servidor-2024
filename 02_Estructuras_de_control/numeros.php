<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $numero = 0;

        /*if($numero > 0)
            echo "<p>El numero es positivo.</p>";  

        if($numero > 0)
            echo "<p>El numero es positivo.</p>" ;
        elseif($numero == 0)
            echo "<p>El numero es igual a 0</p>";
        else 
            echo "<p>El numero es negativo.</p>";*/

        //$numero = 3;

        # Rangos: [-10,0), [0,10], (10,20]

        //If de la vida cotidiana
        /*if ($numero >= -10 && $numero < 0)
            echo "<p> El numero $numero esta en el rango [-10,0)</p>";
        elseif ($numero >= 0 && $numero <= 10)
            echo "<p> El numero $numero esta en el rango [0,10]</p>";
        elseif ($numero > 10 && $numero <= 20)
            echo "<p> El numero $numero esta en el rango (10,20]</p>";
        else
            echo "<p> El numero $numero no esta en ningun rango</p>";*/

        //If de PL/sql
        /*if ($numero >= -10 && $numero < 0):
            echo "<p> El numero $numero esta en el rango [-10,0)</p>";
        elseif ($numero >= 0 && $numero <= 10):
            echo "<p> El numero $numero esta en el rango [0,10]</p>";
        elseif ($numero > 10 && $numero <= 20):
            echo "<p> El numero $numero esta en el rango (10,20]</p>";
        else:
            echo "<p> El numero $numero no esta en ningun rango</p>";
        endif;*/

        //Ejercicio 1

        $numero1 = 3;
        $numero2 = 4;

        if ($numero1 < $numero2)
            echo "<p> El $numero1 es menor que $numero2</p>";
        elseif ($numero2 < $numero1)
            echo "<p> El $numero1 es mayor que $numero2</p>";
        else echo "<p> Los dos numeros son iguales</p>";

        if ($numero1 < $numero2):
            echo "<p> El $numero1 es menor que $numero2</p>";
        elseif ($numero2 < $numero1):
            echo "<p> El $numero1 es mayor que $numero2</p>";
        else: 
            
            echo "<p> Los dos numeros son iguales</p>";
        endif;
        ?>
</body>
</html>