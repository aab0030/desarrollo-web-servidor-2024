<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de multiplicar</title>
</head>
<body>
<!--
    Crear un formulario que reciba un número. Se mostrara en una tabla HTML
    la tabla de multipcar de ese numero.
-->

    <form action="" method="post">
        <input type="text" name="numero" id="numero">
        <input type="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["numero"];
        $res = 0;
        ?>
        <table>
            <thead>
                <tr>
                    <th>Operacion</th>
                    <th>Resultado</th>
                </tr>
            </thead>
            <tbody>

            
        <?php
        for ($i=1; $i <= 10; $i++) { 
            $res = $numero * $i;
            ?>
            <tr>
                <td><?php echo "$numero x $i" ?></td>
                <td><?php echo "$res" ?></td>
            </tr>
        <?php
        } ?>
            </tbody>
        </table>

    <?php
    }
    ?>
</body>
</html>