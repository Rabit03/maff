<?php

//Importar Clase
require_once "../php/";

//Instanciar objeto cliente
$objetoPersonal = new Personal();

//Comprobar existencis
if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $contrasena = $_GET['contrasena'];

    $objetoPersonal->BuscarCuenta($username, $password);


    if ($objetoPersonal->id_Usuario != null) {
        $objetoPersonal->BuscarDatos();

        $id_Personal = $objetoPersonal->id;
        $respuesta = "Valido";
    } else {
        //Valores predeterminados
        $username = "";
        $password = "";
        $respuesta = "NoValido";
    }
}
