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
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
<?php
    function depurar(string $entrada) : string {
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        $salida = preg_replace('/\s+/', ' ', $salida);
        return $salida;
    }
    ?>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_nombre = depurar($_POST["nombre"]);
        $tmp_peso = depurar($_POST["peso"]);
        $tmp_tipo = depurar($_POST["tipo"]);
        $tmp_fecha_captura = depurar($_POST["fecha_captura"]);
        $tmp_descripcion = depurar($_POST["descripcion"]);

        if ($tmp_nombre == "") {
            $err_nombre = "El nombre no puede estar vacio.";
        }else{
            if(strlen($tmp_nombre) > 30 or strlen($tmp_nombre) < 3){
                $err_nombre = "El nombre solo pude tener entre 3 y 30 carácteres.";
            }else{
                $patron = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/";
                if (!preg_match($patron,$tmp_nombre)) {
                    $err_nombre = "El nombre solo pude contener letras en mayúsculas, minúsculas, con tildes y la ñ .";
                }else{
                    $nombre = $tmp_nombre;
                }
            }
        }

        if($tmp_peso == '') {
            $err_peso = "El peso es obligatorio.";
        } else {
            if(filter_var($tmp_peso, FILTER_VALIDATE_FLOAT) === FALSE) {
                $err_peso = "El peso debe ser un número.";
            } else {
                if($tmp_peso < 0.1) {
                    $err_peso = "El peso debe ser mayor que 0,1.";
                } elseif($tmp_peso > 999.99){
                    $err_peso = "El peso debe ser menor que 999,99.";
                }else{
                    $peso = $tmp_peso;
                }
            }
        }
    
        if (isset($_POST["genero"])) {
            $tmp_genero = $_POST["genero"];
            if ($tmp_genero != "hembra" and $tmp_genero != "macho") {
                $err_genero = "Seleccione una opción válida, macho o hembra.";
            }else $genero = $tmp_genero;
        }else $genero = "Desconocido";


        $arr_tipos = ["agua","fuego","volador","planta","electrico"];
        if (!in_array($tmp_tipo,$arr_tipos)) {
            $err_tipo = "Seleccione una opcion correcta.";
        }else $tipo = $tmp_tipo;

        if($tmp_fecha_captura == '') {
            $err_fecha_captura = "La fecha de lanzamiento es obligatoria";
        } else {
            $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if(!preg_match($patron,$tmp_fecha_captura)) {
                $err_fecha_captura = "El formato de la fecha es incorrecto";
            } else {
                list($anno,$mes,$dia) = explode('-',$tmp_fecha_captura);
                if($anno < 1994) {
                    $err_fecha_captura = "El año no puede ser anterior a 1994";
                } else {
                    $anno_actual = date("Y");
                    $mes_actual = date("m");
                    $dia_actual = date("d");
                    if($anno - $anno_actual > 0) {
                        $err_fecha_captura = "El pokemon 
                            no puede capturarse en el futuro";
                    } elseif($anno - $anno_actual < 0) {
                        //  FECHA VÁLIDA
                        $fecha_captura = $tmp_fecha_captura;
                    } else {
                        if($mes - $mes_actual < 0) {
                            //  FECHA VÁLIDA
                            $fecha_captura = $tmp_fecha_captura;
                        } elseif($mes - $mes_actual > 0) {
                            $err_fecha_captura = "El pokemon 
                            no puede capturarse en el futuro";
                        } else {
                            if($dia - $dia_actual > 0) {
                                $err_fecha_captura = "El pokemon 
                            no puede capturarse en el futuro";
                            } elseif($dia - $dia_actual <= 0) {
                                $fecha_captura = $tmp_fecha_captura;
                            }
                        }
                    }
                }
            }
        }
        if ($tmp_descripcion != "") {
            if(strlen($tmp_descripcion) > 200){
                $err_descripcion = "El nombre solo pude tener menos de 200 carácteres.";
            }else{
                $patron = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/";
                if (!preg_match($patron,$tmp_descripcion)) {
                    $err_descripcion = "El nombre solo pude contener letras en mayúsculas, minúsculas, con tildes, la ñ y espacios en blanco.";
                }else{
                    $nombre = $tmp_descripcion;
                }
            }
        }
    }
    ?>
    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <?php if (isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
        <br><br>

        <label for="peso">Peso</label>
        <input type="text" name="peso" id="peso">
        <?php if (isset($err_peso)) echo "<span class='error'>$err_peso</span>" ?>
        <br><br>

        <label>Género</label><br><br>
        <input type="radio" name="genero" value="macho">
        <label >Macho</label>
        <br><br>
        <input type="radio" name="genero" value="hembra">
        <label>Hembra</label>
        <?php if (isset($err_genero)) echo "<span class='error'>$err_genero</span>" ?>
        <br><br>

        <label for="tipo">Tipo</label><br>
        <select name="tipo" id="tipo">
            <option value="agua">Agua</option>
            <option value="fuego">Fuego</option>
            <option value="volador">Volador</option>
            <option value="planta">Planta</option>
            <option value="electrico">Eléctrico</option>
        </select>
        <?php if (isset($err_tipo)) echo "<span class='error'>$err_tipo</span>" ?>
        <br><br>

        <label for="fecha_captura">Fecha de captura</label>
        <input type="date" name="fecha_captura" id="fecha_captura">
        <?php if (isset($err_fecha_captura)) echo "<span class='error'>$err_fecha_captura</span>" ?>
        <br><br>

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" id="descripcion"></textarea>
        <?php if (isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>" ?>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>