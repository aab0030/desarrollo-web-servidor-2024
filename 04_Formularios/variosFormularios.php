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
<form action="" method="post">
        <input type="text" name="nombre" placeholder="Nombre"><br><br>
        <input type="text" name="edad"placeholder="Edad"><br><br>
        <input type="hidden" name="accion" value = "formulario_edad">
        <input type="submit" value="Comprobar">
    </form>
    <br><br>
    <form action="" method="post">
        <input type="text" name="base" placeholder="base"><br><br>
        <input type="text" name="exponente" placeholder="exponente"><br><br>
        <input type="hidden" name="accion" value = "formulario_potencia">
        <input type="submit" value="Calcular">

    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
        if ($_POST["accion"] == "formulario_edad") {
            // Comprobar campos vacios
            if ($_POST["nombre"] != '' and $_POST["edad"] != '') {
                $nombre= $_POST ["nombre"];
                $edad = $_POST ["edad"];
            }
        }

        if ($_POST["accion"] == "formulario_potencia") {
            
            if ($_POST["base"] != '' and $_POST["exponente"] != '') {
                $base = $_POST ["base"];
                $exponente = $_POST ["exponente"];
            }
        }
    }
    ?>
</body>
</html>