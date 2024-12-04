<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IVA</title>
</head>
<body>
    <form action="" method="post">
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio">
        <br>
        <label for="iva">IVA</label>
        <select name="iva" id="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducido</option>
        </select><br>
        <input type="submit" value="Calcular PVP">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tipo_IVA = $_POST["iva"];
        $precio = $_POST["precio"];
        if ($precio == "" or $tipo_IVA == "")
            echo "Por favor, introduzca datos.";
        else{
            define("GENERAL", 1.21);
            define("REDUCIDO", 1.1);
            define("SUPERREDUCIDO", 1.04);

            $precio = match ($tipo_IVA) {
                "general" => ($precio * GENERAL),
                "reducido" => ($precio * REDUCIDO),
                "superreducido" => ($precio * SUPERREDUCIDO),
            };
            echo "<p>PVP: ".$precio."</p>";
        }
    }
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $tipo_IVA = $_GET["iva"];
        $precio = $_GET["precio"];
        define("GENERAL", 1.21);
        define("REDUCIDO", 1.1);
        define("SUPERREDUCIDO", 1.04);

        $precio = match ($tipo_IVA) {
            "general" => ($precio * GENERAL),
            "reducido" => ($precio * REDUCIDO),
            "superreducido" => ($precio * SUPERREDUCIDO),
        };
        echo "<p>PVP: ".$precio."</p>";
    }
    ?>
</body>
</html>