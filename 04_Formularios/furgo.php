<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
    <form action="" method="post"> 
        <label for="equipo">Equipo</label>
        <input type="text" name="equipo" id="equipo">

        <label for="iniciales">Iniciales</label>
        <input type="text" name="iniciales" id="iniciales">

        <label for="liga">Ligas</label>
        <select name="liga" id="liga">
            <option value="motion">Liga hypermotion</option>
            <option value="motion">Liga EA Sports</option>
            <option value="motion">Liga Primera RFEF</option>
        </select>

        <label for="numeroJugadores">Número de jugadores</label>
    </form>
</body>
</html>