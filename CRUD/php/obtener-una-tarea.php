<?php

include_once("database.php");

if(isset($_POST["id"])) {

    $id = $_POST["id"];

    $query = "SELECT * FROM almacen WHERE id = {$id} ";
    $result = mysqli_query($connecction, $query);

    if(!$result) {
        die("Hubo un error en la consulta". mysqli_error($connecction));
    }

    $json = array();

    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            "id"=>$row["id"],
            "producto"=>$row["producto"],
            "categoria"=>$row["categoria"],
            "stock"=>$row["stock"],
            "precio"=>$row["precio"]
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}