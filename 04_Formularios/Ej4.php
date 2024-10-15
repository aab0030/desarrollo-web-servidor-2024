<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <?php
    define("KELVIN",273.15);
    ?>
</head>
<body>
    <form action="" method="post">
        <label for="temperatura">Temperatura a convertir</label>
        <input type="number" name="temperatura" id="temperatura">
        <input type="submit" value="Enviar">
        <br>
        <select name="forma" id="forma">
            <option value="c">Celsius</option>
            <option value="f">Fahrenheit</option>
            <option value="k">Kevin</option>
        </select>
        <br><br>
        <label for="aConvertir">
            <select name="aConvertir" id="aConvertir">
                <option value="c">Celsius</option>
                <option value="f">Fahrenheit</option>
                <option value="k">Kevin</option>
            </select>
        </label>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temperatura = $_POST["temperatura"];
        $escala = $_POST["forma"];
        $escalaRes = $_POST["aConvertir"];
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
</body>
</html>