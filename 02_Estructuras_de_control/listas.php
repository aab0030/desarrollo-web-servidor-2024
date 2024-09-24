<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $i = 1;
    echo "<h3>Lista 1</h3>";
    echo "<ul>";
    while($i < 10){
        echo "<li>$i</li>";
        $i++;
    }
    echo "</ul>";
    ?>

    <?php
    $i = 1;
    echo "<h3>Lista 2</h3>";
    echo "<ul>";
    while($i < 10):
        echo "<li>$i</li>";
        $i++;
    endwhile;
    echo "</ul>";

    /*Con un while y las estructuras de control, mostrar en la lista sin ordenar los multiplo de 3*/ 
    $i = 1;
    echo "<ul>";
    while ($i <= 30){
        if ($i % 3 == 0) echo "<li> El numero $i es multiplo de 3</li>";
        $i++;
    }
    echo "</ul>";
    ?>
</body>
</html>