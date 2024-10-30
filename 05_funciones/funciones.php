<?php
    function comprobarEdad($nombre,$edad){
        if ($nombre != '' and $edad != '') echo "$nombre tiene $edad años.";
        else echo "Por favor, introduce datos.";
    }
    function potencia($base,$exponente){
        $resultado = 1;
        for($i=0;$i<$exponente;$i++){
            $resultado = $resultado * $base;
        }
        return $resultado;
    }
    function calcularIva($precio,$tipo_IVA){
        define("GENERAL", 1.21);
        define("REDUCIDO", 1.1);
        define("SUPERREDUCIDO", 1.04);

        $precio = match ($tipo_IVA) {
            "general" => ($precio * GENERAL),
            "reducido" => ($precio * REDUCIDO),
            "superreducido" => ($precio * SUPERREDUCIDO),
        };
        echo "<p>PVP: ".$precio."</p>";
    }

    function calcularIRPF($sueldoBruto,$cantidad){
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
        return ($sueldoBruto-$aPagar);
    }

    function rangoPrimos($num1,$num2){
        $contPrimo = 0;
        echo "<h2>Los primos entre $num1 y $num2.</h2>";
        for ($num1; $num1 <= $num2; $num1++) { 
            for ($i=1; $i <= $num1/2; $i++) { 
                if ($num1 % $i == 0) {
                    $contPrimo++;
                }
            }
            if ($contPrimo == 1) {
                echo $num1 . " ";
            }
            $contPrimo = 0;
        }
    }
    function conversorTemp($temperatura,$escala,$escalaRes){
        define("KELVIN",273.15);
        $res = 0;
        $res = match ($escala) {
            "c" => match ($escalaRes) {
                "c"  => $temperatura,
                "f"  => $temperatura * (9/5) + 32,
                "k"  => $temperatura + KELVIN ,
            },
            "f" => match ($escalaRes) {
                "c"  => ($temperatura - 32) * 5/9,
                "f"  => $temperatura,
                "k"  => ($temperatura - 32) * 5/9 + KELVIN,
              },
            "k" => match ($escalaRes) {
                "c"  => $temperatura - KELVIN,
                "f"  => ($temperatura - KELVIN) * 9/5 + 32,
                "k"  => $temperatura,
              },
        };
        echo "$res";
    }
?>