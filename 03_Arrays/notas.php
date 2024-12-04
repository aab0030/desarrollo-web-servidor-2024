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
    $notas = [
        ["Paco", "Desarrollo web servidor"],
        ["Paco", "Desarrollo web cliente"],
        ["Manu", "Desarrollo web servidor"],
        ["Manu", "Desarrollo web cliente"],
    ];
        /**
         * Ejercicio 1: Añadir al array 4 estudiante con sus asignaturas
         * 
         * Ejercicios 2: Eliminar 1 estudiante y su asignatura a libre elección
         * 
         * Ejercicio 3: Añadir una tercera columna que será la nota, obtenida aleatoriamente entre 1 y 10
         *
         * Ejercicio 4: Añadir una cuarta columna que indique APTO o NO APTO,
         * dependiendo de si la nota es igual o superior a 5 o no.
         * 
         * Ejercicio 5: Ordenar alfabéticamente por los alumnos y luego por
         * nota.SI hay varias filas con el mismo nombre y la misma nota,ordenar 
         * por la asignatura alfabéticamente.
         * 
         * Ejercicio 6:Mostrarlo todo en una tabla.
         */

        array_push($notas,["Migue", "Inglés"]);
        array_push($notas,["Migue", "Diseño de Interfaces Web"]);
        array_push($notas,["Sofia", "Despliegue de Aplicaciones"]);
        array_push($notas,["Sofia", "Empresa"]);

        unset($notas[0]);
        $notas = array_values($notas);

        for ($i=0; $i < count($notas); $i++) { 
            $notas[$i][2] = rand(1,10);
        }

        for ($i=0; $i < count($notas); $i++) { 
            if ($notas[$i][2] >= 5) {
                $notas[$i][3] = "Apto";
            }else 
                $notas[$i][3] = "No apto";
        }

        $_nombre = array_column($notas, 0);
        $_notas = array_column($notas, 2);
        $_asignatura = array_column($notas, 1);

        //array_multisort($_nombre,SORT_ASC,$_notas,SORT_ASC,$_asignatura,SORT_ASC,$notas);
    ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Asignatura</th>
                <th>Notas</th>
                <th>Apto¿?</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($notas as $alumno){
                list($nombre, $asignatura, $nota, $apto) = $alumno;
                ?>
                <tr>
                    <td><?php echo $nombre ?></td>
                    <td><?php echo $asignatura ?></td>
                    <td><?php echo $nota ?></td>
                    <td><?php echo $apto ?></td>
                </tr>
            <?php } ?>
            
        </tbody>
    </table>
</body>
</html>