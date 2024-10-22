<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muchosss!!</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );

    require('../05_funciones/funciones.php');
    ?>
</head>
<body>
    <?php
    /**
     * Crear en esta página formularios y funciones para los ejercicios:
     * 
     *  - iva
     *  - irpf
     *  - Primos rango
     *  - temperaturas
     */
    ?>
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
        <input type="hidden" name="accion" value = "formulario_iva">
        <input type="submit" value="Calcular PVP">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if ($_POST["accion"] == "formulario_iva") {
            $tipo_IVA = $_POST["iva"];
            $precio = $_POST["precio"];
            
            if ($precio == "" or $tipo_IVA == "")
                echo "Por favor, introduzca datos.";
            else{
                calcularIva($precio,$tipo_IVA);
            }
        }
    }
    ?>

    <form action="" method="post">
        <input type="text" name = "cantidad">
        <input type="submit" value="Calcular IRPF">
        <input type="hidden" name="accion" value = "formulario_IRPF">
    </form>
    <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["accion"] == "formulario_IRPF") {
            $sueldoBruto = $_POST["cantidad"];
            $cantidad = $_POST["cantidad"];
            if ($sueldoBruto != "" or $cantidad != "")
                calcularIRPF($sueldoBruto,$cantidad);
            else
                echo "Introduce datos.";
        }
    }
    ?>

    <form action="" method="post">
        <label for="numero1">Numero 1</label>
        <input type="number" name="numero1" id="numero1">
        <br>
        <label for="numero2">Numero 2</label>
        <input type="number" name="numero2" id="numero2">
        <input type="hidden" name="accion" value = "formulario_primo">
        <br>        
        <input type="submit" value="Entregar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["accion"] == "formulario_primo") {
            $num1 = $_POST["numero1"];
            $num2 = $_POST["numero2"];

            if ($num1 != "" or $num2 != "")
                rangoPrimos($num1,$num2);
            else
                echo "Introduce datos.";
        }
    }
    ?>  

<form action="" method="post">
        <label for="temperatura">Temperatura a convertir</label>
        <input type="number" name="temperatura" id="temperatura">
        <input type="hidden" name="accion" value = "formulario_temp">
        <input type="submit" value="Enviar">
        <br>
        <select name="forma" id="forma">
            <option value="c">Celsius</option>
            <option value="f">Fahrenheit</option>
            <option value="k">Kevin</option>
        </select>
        <br><br>
        <label for="aConvertir">
            <select name="aConvertir" id="aConvertir">
                <option value="c">Celsius</option>
                <option value="f">Fahrenheit</option>
                <option value="k">Kevin</option>
            </select>
        </label>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["accion"] == "formulario_temp") {
            $temperatura = $_POST["temperatura"];
            $escala = $_POST["forma"];
            $escalaRes = $_POST["aConvertir"];
            
            if ($temperatura != "") conversorTemp($temperatura,$escala,$escalaRes);
            else echo "Introduce datos.";
        }
    }
    ?>  
</body>
</html>