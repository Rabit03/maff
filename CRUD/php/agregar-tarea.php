<?php

include_once("database.php");

if(isset($_POST["producto"])){
    $task_producto = $_POST["producto"];
    $task_categoria = $_POST["categoria"];
    $task_stock = $_POST["stock"];
    $task_precio = $_POST["precio"];

    $query = "INSERT INTO almacen (producto, categoria, stock, precio) VALUES ('$task_producto', '$task_categoria', '$task_stock', '$task_precio')";
    $result = mysqli_query($connecction, $query);

    if(!$result) {
        die("ERROR en la consulta". mysqli_error($connecction));
    }

    echo "encontrado";
}