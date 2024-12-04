<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_titulo = $_POST["titulo"];
            if(isset($_POST["consola"])) $tmp_consola = $_POST["consola"];
            else $tmp_consola = "";
            $tmp_descripcion = $_POST["descripcion"];
            $tmp_fecha_lanzamiento = $_POST["fecha_lanzamiento"];

            if($tmp_titulo == '') {
                $err_titulo = "El título es obligatorio";
            } else {
                if(strlen($tmp_titulo) > 60) {
                    $err_titulo = "El título debe tener entre 1 y 60 caracteres";
                } else {
                    $patron = "/^[a-zA-Z0-9 ]+$/";
                    if(!preg_match($patron, $tmp_titulo)) {
                        $err_titulo = "El título solo puede contener 
                            letras, números y espacios en blanco";
                    } else {
                        $titulo = $tmp_titulo;
                    }
                }
            }

            if($tmp_consola == '') {
                $err_consola = "La consola es obligatoria";
            } else {
                $consolas_validas = ["ps4","ps5","switch","xboxsx","pc"];
                if(!in_array($tmp_consola, $consolas_validas)) {
                    $err_consola = "Elige una consola válida";
                } else {

                }
            }

            if(strlen($tmp_descripcion) > 255) {
                $err_descripcion = "La descripción no puede tener más de 255 caracteres";
            } else {
                $patron = "/^[a-zA-Z0-9 .,]+$/";
                if(!preg_match($patron, $tmp_descripcion)) {
                    $err_descripcion = "La descripción solo puede contener 
                        letras, números, espacios en blanco, puntos y comas";
                } else {
                    $descripcion = $tmp_descripcion;
                }
            }

            if($tmp_fecha_lanzamiento == '') {
                $err_fecha_lanzamiento = "La fecha de lanzamiento es obligatoria";
            } else {
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if(!preg_match($patron,$tmp_fecha_lanzamiento)) {
                    $err_fecha_lanzamiento = "El formato de la fecha es incorrecto";
                } else {
                    list($anno,$mes,$dia) = explode('-',$tmp_fecha_lanzamiento);
                    if($anno < 1947) {
                        $err_fecha_lanzamiento = "El año no puede ser anterior a 1947";
                    } else {
                        $anno_actual = date("Y");
                        $mes_actual = date("m");
                        $dia_actual = date("d");
                        if($anno - $anno_actual > 10) {
                            $err_fecha_lanzamiento = "El videojuego 
                                no puede lanzarse dentro de más de 10 años";
                        } elseif($anno - $anno_actual < 10) {
                            //  FECHA VÁLIDA
                            $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                        } else {
                            if($mes - $mes_actual < 0) {
                                //  FECHA VÁLIDA
                                $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                            } elseif($mes - $mes_actual > 0) {
                                $err_fecha_lanzamiento = "El videojuego 
                                    no puede lanzarse dentro de más de 10 años";
                            } else {
                                if($dia - $dia_actual > 0) {
                                    $err_fecha_lanzamiento = "El videojuego 
                                        no puede lanzarse dentro de más de 10 años";
                                } elseif($dia - $dia_actual <= 0) {
                                    $fecha_lanzamiento = $tmp_fecha_lanzamiento;
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
        <form class="col-6" action="" method="post">
            <div class="mb-3">
                <label class="form-label">Titulo</label>
                <input class="form-control" type="text" name="titulo">
                <?php if(isset($error_titulo)) echo "<span class='error'>$error_titulo</span>";?>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <textarea class="form-control" name="descripcion"></textarea>
                <?php if(isset($error_descripcion)) echo "<span class='error'>$error_descripcion</span>";?>
            </div>
            <div class="mb-3">
                <label class="form-label">Consola</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="consola" value="play4">
                    <label class="form-check-label">Play 4</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="consola" value="play5">
                    <label class="form-check-label">Play 5</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="consola" value="switch">
                    <label class="form-check-label">Switch</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="consola" value="xbox">
                    <label class="form-check-label">Xbox</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="consola" value="pc">
                    <label class="form-check-label">PC</label>
                </div>
                <?php if(isset($error_consola)) echo "<span class='error'>$error_consola</span>";?>
                <div class="mb-3">
                    <label class="form-label">Fecha de lanzamiento</label>
                    <input class="form-control" name="fecha_lanzamiento" type="date">
                    <?php if(isset($error_fecha)) echo "<span class='error'>$error_fecha</span>";?>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Enviar">
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>