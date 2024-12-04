<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name = "cantidad">
        <input type="submit" value="Calcular IRPF">
    </form>
    <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sueldoBruto = $_POST["cantidad"];
        $cantidad = $_POST["cantidad"];
        $aPagar = 0;
        
        if ($cantidad - 12450 >= 0) {
            $aPagar = $aPagar + (12450 * 0.19);
            $cantidad = $cantidad - 12450;
            if ($cantidad - 7749 >= 0) {
                $aPagar = $aPagar + (7749 * 0.24);
                $cantidad = $cantidad - 7749;
                if ($cantidad - 14999 >= 0) {
                    $aPagar = $aPagar + (14999 * 0.30);
                    $cantidad = $cantidad - 14999;
                    if ($cantidad - 24799 >= 0) {
                        $aPagar = $aPagar + (24799 * 0.37);
                        $cantidad = $cantidad - 24799;
                        if ($cantidad - 239999 >= 0) {
                            $aPagar = $aPagar + (239999 * 0.45);
                            $cantidad = $cantidad - 239999;
                            
                            $aPagar = $aPagar + ($cantidad * 0.47);
                            
                        }else{
                            $aPagar = $aPagar + ($cantidad * 0.45);
                        }
                    }else{
                        $aPagar = $aPagar + ($cantidad * 0.37);
                    }
                }else{
                    $aPagar = $aPagar + ($cantidad * 0.30);
                }
            }else{
                $aPagar = $aPagar + ($cantidad * 0.24);
            }
        }else{
            $aPagar = $aPagar + ($cantidad * 0.19);
        }
        echo "<b>IRPF: $aPagar</b>";
        echo "<h1>El sueldo neto de $sueldoBruto es ".($sueldoBruto-$aPagar)."</h1>";
    }
    ?>
</body>
</html>