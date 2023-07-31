<?php
//Inportar database
require_once "database.php";

class usuario
{
    //Propiedades
    var $username;



    //Metodos
function BuscarCuenta($username, $password)
    {
        //database
        $database = database::ConectarMysql();

        //Prepar sentencia
        $sentencia = $database->prepare("select * from usuario where username = :username and pasword = :PASSWORD ;");

        //Pasar Valores a Parametro
        $sentencia->bindValue(":USERNAME", $username);
        $sentencia->bindValue(":PASSWORD", $password);

        //Ejecutar sentencia y Recoger Resultado
        $sentencia->execute();
        $fila = $sentencia->fetch();

        if ($fila == True) {
            $this->username = $fila['username'];
        } else {
            $this->id_Usuario = null;
        }
    }
}


