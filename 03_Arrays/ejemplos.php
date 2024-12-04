<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php 
    $array = array(
        1 => "Manzana",
        2 => "Naranja",
        3 => "Cereza"
    );
    
    $frutas= [
        1 => "Manzana",
        2 => "Naranja",
        3 => "Cereza"
    ];

    $frutas2= [
        1 => "Naranja",
        2 => "Manzana",
        3 => "Cereza"
    ];

    $numeros1 = [1,2,3,4,5];
    $numeros2 = ["1","2","3","4","5"];

    if ($numeros1 === $numeros2) {
        echo "<h3>Los array son iguales.</h3>"; 
    }else
        echo "<h3>Los array no son iguales.</h3>"; 

    /*
        CREAR UN ARRAY CON UNA LISTADE PERSONAS DONDE LA CLAVE SEA EL DNI Y EL VALOR EL NOMBRE
        MIN 3 PERSONAS
        MOSTRAR EL ARRAY Y A ALGUNA PERSONA

        AÑADIR ELEMENTOS CON Y SIN CLAVE 

        BORRAR ALGUN  ELEMENTO

        REORDENAR LAS CLAVES
    */

    $personas = [
        "06171047D" => "Estela",
        "07817362F" => "Luis",
        "54417782N" => "Enya",
        "14460986N" => "Emilio"
    ];

    print_r($personas);
    echo "<br>";
    $personas["59965961Q"] = "Isma";
    print_r($personas);
    echo "<br>";
    unset($personas["59965961Q"]);
    print_r($personas);
    echo "<br>";
    $personas = array_values($personas); // Reordena el array reseteando los valores

    count($personas); // Devuelve la longitud del array
    print_r($personas);
    echo "<br>";

    // for each

    foreach ($frutas as $clave => $fruta) {
        echo "<li>$clave, $fruta</li>";
    }
    ?>
    <table border = "1">
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($personas as $clave => $persona) { ?>
                <tr>
                <td><?php echo $clave ?></td>
                <td><?php echo $persona ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <table border ="1">
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Profesor</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $profesores = [
                    "Desarrolo web servidor" => "Alejandra",
                    "Diseño de interfaces" => "José",
                    "Despliegue" => "Ale",
                    "Empresa" => "Gloria",
                    "inglés" => "Virginia",
                ];
                ksort($profesores);
            ?>
            <?php
                foreach ($profesores as $clave => $profesor){ ?>
                    <tr>
                        <td><?php echo $clave ?></td>
                        <td><?php echo $profesor ?></td>
                    </tr>
                <?php } ?>
            
        </tbody>
    </table>

    <table border ="1">
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Nota</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $alumnos = [
                    "Guillermo" => 3,
                    "Daiana" => 5,
                    "Angel" => 8,
                    "Ayyoub" => 7,
                    "Mateo" => 9,
                    "Joaquín" => 4,
                ];
            ?>
            <?php
                $color = "";
                foreach ($alumnos as $alumno => $nota){ 
                    ?>
                    <tr bgcolor = "<?php if($nota < 5) echo "red"; else echo "green" ?>">
                        <td><?php echo $alumno ?></td>
                        <td><?php echo $nota ?></td>
                        <td>
                        <?php
                            if ($nota < 5) 
                                echo "SUSPENSO";
                            elseif ($nota < 7)
                                echo "APROBADO";
                            elseif ($nota < 9)
                                echo "Notable";
                            elseif ($nota <= 10)
                                echo "sobresaliente";
                        ?>
                        </td>
                    </tr>
                <?php } ?>
            
        </tbody>
    </table>
</body>
</html>