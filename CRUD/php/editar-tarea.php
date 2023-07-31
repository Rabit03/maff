<?php
include_once("database.php");

if(isset($_POST["id"])) {
    $task_id = $_POST["id"];
    $task_producto = $_POST["producto"];
    $task_categoria = $_POST["categoria"];
    $task_stock = $_POST["stock"];
    $task_precio = $_POST["precio"];


    $query = "UPDATE almacen SET producto = '$task_producto', categoria = '$task_categoria', stock = '$task_stock', precio = '$task_precio' WHERE id = '$task_id'";
    $result = mysqli_query($connecction, $query);

    if(!$result){
        die("Hubo un error en la consulta" . mysqli_error($connecction));
    }

    echo "La tarea ha sido actualizada";
}