<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo date("j");

        // numero % 4
        $numero = 2;
        $dia = date("j");
        
        if($dia % 2 == 0) 
            echo "<p>El dia es par.</p>";
        else 
            echo "<p>El dia es impar</p>";
    ?>
</body>
</html>