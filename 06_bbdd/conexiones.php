<?php
    $_servidor = "localhost"; //ó "127.0.0.1" (LOOPBACK)
    $_usuario = "estudiante";
    $_constrasena = "estudiante";
    $_bbdd = "animes_bd";

    //Tenemos dos opciones para crear una conexion con bbdds
    //MYsql (mas simple) o PDO (mas completa)
    $_conexion = new Mysqli($_servidor,$_usuario,$_constrasena,$_bbdd)
        or die("Error de conexión");
    

?>