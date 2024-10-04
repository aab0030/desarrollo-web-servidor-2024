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
        $autobuses = [
            ["Málaga", "Ronda", 90, 10],
            ["Churriana", "Málaga", 20, 10],
            ["Málaga", "Granada", 120, 15],
            ["Torremolinos", "Málaga", 30, 3.5]
        ];

        /**
         * Ejercicio 1: Añadir dos líneas de autobús
         * 
         * Ejercicio 2: Ordenar por duración de mas a menos
         * 
         * Ejercicio 3: Mostrar las líneas de una tabla
         */

         array_push($autobuses,["Málaga", "Barcelona", 885, 28]);
         array_push($autobuses,["Málaga", "Madrid", 420, 19]);

         $_duracion = array_column($autobuses, 2);
         array_multisort($_duracion, SORT_DESC, $autobuses);
    ?>
        <style>
        table{
            margin: 100px auto;
            border: 1px solid black;
            border-collapse: collapse;
            transform: rotate(10deg);
            animation: tablaGiradora 15s infinite linear;
        }
        @keyframes tablaGiraora{
            0%{
                margin-left: 0%;
                transform: rotate(0deg);
            }
            25%{
                margin-left: 50%;
                transform: rotate(90deg);
            }
            50%{
                margin-left: 80%;
                transform: rotate(270deg);
            }
            75%{
                margin-left: 50%;
                transform: rotate(90deg);
            }
            100%{
                margin-left: 0%;
                transform: rotate(0deg);
            }
        }   
        td,th{
            padding: 1rem;
            border: 1px solid black;
        }
    </style>
    <table>
        <thead>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Duracion en min</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $_origen = array_column($autobuses, 0);
                $_duracion = array_column($autobuses, 2);
                array_multisort($_origen,SORT_ASC,$_duracion,SORT_ASC, $autobuses);

                /**
                 * Ejercicio 4: Insertat 3 autobuses más
                 * 
                 * Ejercicio 5: Ordenar, primero por el origen, luego por el destino
                 * 
                 * Ejercicio 6: Ordenar, primero por la duración, luego por el precio
                 */
                
                array_push($autobuses,["Marbella", "Malaga", 45, 10]);
                array_push($autobuses,["Jaen", "Málaga", 240, 28]);
                array_push($autobuses,["Málaga", "Córdoba", 180, 19]);

                $_origen = array_column($autobuses, 0);
                $_destino = array_column($autobuses, 1);

                array_multisort($_origen,SORT_ASC,$_destino,SORT_ASC, $autobuses);

                $_duracion = array_column($autobuses, 2);
                $_precio = array_column($autobuses, 3);

                array_multisort($_duracion,SORT_ASC,$_precio,SORT_ASC, $autobuses);

            foreach($autobuses as $linea){
                list($Origen, $Destino, $duracion, $Precio) = $linea;
                ?>
                <tr>
                    <td><?php echo $Origen ?></td>
                    <td><?php echo $Destino ?></td>
                    <td><?php echo $duracion ?></td>
                    <td><?php echo $Precio ?></td>
                </tr>

            <?php } ?>
            
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Duracion en min</th>
                <th>Precio</th>
                <th>Tipo</th>
            </tr>
        </thead>
    <?php 
        for ($i=0; $i < count($autobuses); $i++) { 
            $autobuses[$i][4] = "X";
        }
    
        foreach($autobuses as $linea){
            list($Origen, $Destino, $duracion, $Precio, $tipo) = $linea;
            if ($duracion < 60) $tipo = "Corta distancia"; 
            elseif ($duracion < 120) $tipo = "Media distancia";
            else $tipo = "Larga distancia";
            ?>
            <tr>
                <td><?php echo $Origen ?></td>
                <td><?php echo $Destino ?></td>
                <td><?php echo $duracion ?></td>
                <td><?php echo $Precio ?></td>
                <td><?php echo $tipo ?></td>
            </tr>

        <?php } ?>
            
        </tbody>
    </table>
</body>
</html>