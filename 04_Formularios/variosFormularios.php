<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );

    require('../05_funciones/funciones.php');
    ?>
</head>
<body>
<form action="" method="post">
        <input type="text" name="nombre" placeholder="Nombre"><br><br>
        <input type="text" name="edad"placeholder="Edad"><br><br>
        <input type="hidden" name="accion" value = "formulario_edad">
        <input type="submit" value="Comprobar">
    </form>
    <--filter_var($tmp_base, FILTER_VALIDATE_INT) ->
    <?php
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
        if ($_POST["accion"] == "formulario_edad") {
            // Comprobar campos vacios
            $nombre= $_POST ["nombre"];
            $edad = $_POST ["edad"];
            comprobarEdad($nombre,$edad);
        }
    }
    ?>
    <br><br>
    <form action="" method="post">
        <input type="text" name="base" placeholder="base"><br><br>
        <input type="text" name="exponente" placeholder="exponente"><br><br>
        <input type="hidden" name="accion" value = "formulario_potencia">
        <input type="submit" value="Calcular">

    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
        if ($_POST["accion"] == "formulario_potencia") {
            $tmp_base = $_POST ["base"];
            $tmp_exponente = $_POST ["exponente"];

            if ($tmp_base == '') {
                echo "Por favor, introduce base.";
            }else{
                if (filter_var($tmp_base, FILTER_VALIDATE_INT) === FALSE) {
                    echo "Introduce un numero entero.";
                }else 
                    if($tmp_base < 0) echo "La base debe ser mayor a 0";
                    else $base = $tmp_base;
            }

            if ($tmp_exponente == '') {
                echo "Por favor, introduce exponente.";
            }else{
                if (filter_var($tmp_exponente, FILTER_VALIDATE_INT) === FALSE) {
                    echo "Introduce un numero entero.";
                }else 
                    if($tmp_exponente < 0) echo "La exponente debe ser mayor a 0";
                    else $tmp_exponente = $tmp_exponente;
            }
        }
    }
    ?>
</body>
</html>