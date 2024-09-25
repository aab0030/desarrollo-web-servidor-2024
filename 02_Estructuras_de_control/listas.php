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
    <h3>Listas con DO WHILE</h3>

    <?php
    $i = 1;

    echo "<ul>";
    do {
        echo "<li>$i</li>";
        $i++;
    } while ($i <= 10);
    echo "</ul>";

    echo "<h3>Lista con for</h3>";

    echo "<ul>";
    for($i = 1; $i <= 10; $i++){
        echo "<li>$i</li>";
    }
    echo "</ul>";

    echo "<h3>Lista con for 2</h3>";

    echo "<ul>";
    for($i = 1; ; $i++){
        if ($i > 10) break;
        echo "<li>$i</li>";
    }
    echo "</ul>";

    ?>
</body>
</html>