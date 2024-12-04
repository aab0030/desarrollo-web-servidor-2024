<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario furbo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
<!--
    Formulario equipos de futbol de España
    - Equipo: entre 3 y 20 caracteres. Puede contener letras, espacios en blanco y puntos.
    - Iniciales 3 caracteres exactos.
    - Liga: opciones con select, Liga EA Sports, Liga Hypermotion, Primera RFEF
    - Numero de jugadore: entre 26 y 32.
    - Fecha de fundación: entre hoy y 18 de diciembre de 1889.
-->
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_equipo = $_POST["equipo"];
        $tmp_iniciales = $_POST["iniciales"];
        $tmp_liga = $_POST["liga"];
        $tmp_jugadores = $_POST["numeroJugadores"];
        $tmp_fecha_fundacion = $_POST["fecha_fundacion"];

        if ($tmp_equipo == "") {
            $err_equipo = "El equipo no puede estar vacio.";
        }else{
            $patron = "/^[a-zA-Z0-9 .]{3,20}$/";
            if (!preg_match($patron,$tmp_equipo)) {
                $err_equipo = "El equipo solo pude contener letras en mayúsculas y minúsculas, espacios en blanco, puntos y tener entre 3 y 20 carácteres.";
            }else{
                $equipo = $tmp_equipo;
            }
        }

        if ($tmp_iniciales == "") {
            $err_iniciales = "Las iniciales no pueden estar vacias.";
        }else{
            $patron = "/^[A-Z]{3}$/";
            if (!preg_match($patron,$tmp_iniciales)) {
                $err_iniciales = "Las iniciales solo pueden ser 3 letras en mayúsculas.";
            }else{
                $iniciales = $tmp_iniciales;
            }
        }
        $ligas = ["motion","easports","primeraRFEF"];
        if (!in_array($tmp_liga,$ligas)) {
            $err_liga = "Seleccione un valor correcto.";
        }else{
            $liga = $tmp_liga;
        }

        if ($tmp_jugadores == "") {
            $error_num_jugadores = "no puedes dejar el numero de jugadores vacio";
        }else{
            $tmp_jugadores = intval($tmp_jugadores);
            if (!is_int($tmp_jugadores)) {
                $error_num_jugadores = "Los jugadores tienen que ser numeros enteros.";
            }else {
                if ($tmp_jugadores < 26 or $tmp_jugadores > 32) {
                    $error_num_jugadores = "No puede haber menos de 26 jugadores ni menos de 32.";
                }else{
                    $num_jugadores = $tmp_jugadores;
                }
            }
        }
        if($tmp_fecha_fundacion == '') {
            $err_fecha_fundacion = "La fecha de lanzamiento es obligatoria";
        } else {
            $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if(!preg_match($patron,$tmp_fecha_fundacion)) {
                $err_fecha_fundacion = "El formato de la fecha es incorrecto";
            } else {
                list($anno,$mes,$dia) = explode('-',$tmp_fecha_fundacion);
                if(($anno < 1889) || ($anno == 1889 and $mes <12) || ($anno == 1889 and $mes == 12 and $dia < 18)) {
                    $err_fecha_fundacion = "El año no puede ser anterior a 1889";
                } else {
                    $anno_actual = date("Y");
                    $mes_actual = date("m");
                    $dia_actual = date("d");
                    if($anno - $anno_actual > 0) {
                        $err_fecha_fundacion = "El equipo no puede crearse en el futuro.";
                    } elseif($anno - $anno_actual < 0) {
                        //  FECHA VÁLIDA
                        $fecha_lanzamiento = $tmp_fecha_fundacion;
                    } else {
                        if($mes - $mes_actual < 0) {
                            //  FECHA VÁLIDA
                            $fecha_lanzamiento = $tmp_fecha_fundacion;
                        } elseif($mes - $mes_actual > 0) {
                            $err_fecha_fundacion = "El equipo no puede crearse en el futuro.";
                        } else {
                            if($dia - $dia_actual > 0) {
                                $err_fecha_fundacion = "El equipo no puede crearse en el futuro.";
                            } elseif($dia - $dia_actual <= 0) {
                                $fecha_lanzamiento = $tmp_fecha_fundacion;
                            }
                        }
                    }
                }
            }
        }
    }
    ?>
    <div class="container">
        <h1>Formulario</h1>
        <form class="col-5" action="" method="post"> 
            <div class="mb-3">
                <label for="equipo" class="form-label">Equipo</label>
                <input type="text" class="form-control" name="equipo" id="equipo">
                <?php if (isset($err_equipo)) echo "<span class='error'>$err_equipo</span>" ?>
            </div>
            <div class="mb-3">
                <label for="iniciales" class="form-label">Iniciales</label>
                <input type="text" class="form-control" name="iniciales" id="iniciales">
                <?php if (isset($err_iniciales)) echo "<span class='error'>$err_iniciales</span>" ?>
            </div>
            <div class="mb-4">
                <label for="liga" class="form-label">Ligas</label>
                <select name="liga" class="form-select" id="liga">
                    <option value="motion">Liga hypermotion</option>
                    <option value="easports">Liga EA Sports</option>
                    <option value="primeraRFEF">Liga Primera RFEF</option>
                </select>
                <?php if (isset($err_liga)) echo "<span class='error'>$err_liga</span>" ?>
            </div>
            <div class="mb-3">
                <label for="numeroJugadores" class="form-label">Número de jugadores</label>
                <input type="number" class="form-control" name="numeroJugadores" id="numeroJugadores">
                <?php if (isset($error_num_jugadores)) echo "<span class='error'>$error_num_jugadores</span>" ?>
            </div>
            <div class="mb-3">
                <label for="fecha_fundacion" class="form-label">Fecha de fundación</label>
                <input type="date" class="form-control" name="fecha_fundacion" id="fecha_fundacion">
                <?php if (isset($err_fecha_fundacion)) echo "<span class='error'>$err_fecha_fundacion</span>" ?>
            </div>
            <div class="mb-3">
                <input type="submit" value="Enviar" class="btn btn-primary">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>