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
    ?>
</body>
</html>