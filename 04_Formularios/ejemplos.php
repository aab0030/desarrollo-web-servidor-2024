<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /**
     *  SINGLE PAGE FORM -> TODA LA INFORMACIÓN SE PROCESA EN LA MISMA PÁGINA
     * 
     *  MULTI PAGE FORM -> REENVÍAN A OTRA PÁGINA
     */
    ?>

    <form action="" method="post">
        <input type="text" name="mensaje">
        <input type="text" name="numero">
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        /**
         *  El servidor ejecutará este bloque de código cuando reciba 
         *  una petición a través del metodo POST
         */

         $mensaje = $_POST["mensaje"];
         $numero = (int)$_POST["numero"];
        $i = 1;
         while ($i < $numero) {
            echo $mensaje;
            $i++;
         }

         echo $mensaje;
         /**
          * Modificar el formulario anterior para que se pueda intoducir un n
          *El mensaj se mostrara tantas veces como indique el numero
          */
    }
    ?>
</body>
</html>