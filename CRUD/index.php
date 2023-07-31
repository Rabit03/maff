<?php
session_start();

if (isset($_SESSION['usuario'])) {
  include('php/database.php');
} else {
  header('Location: login.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="es-AR">
<head>
  <meta charset="UTF-8">

  <!-- IE-EDGE -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- VIEWPORT -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- TITTLE -->
  <title>TGestiona | CRUD-AJAX</title>

  <!-- STYLES -->
   <link rel="stylesheet" href="./css/bootstrap.min.css">
   <link rel="stylesheet" href="./css/style.css">
</head>
<body>

  <nav class="navbar bg-primary">
    <div class="container-fluid">
      <a href="index.php" class="navbar-brand fw-bold text-light">TGestiona</a>
      <form class="d-flex">
        <input type="search" id="search" placeholder="Buscar" class="form-control me-2">
        <button type="submit" class="btn btn-warning">Buscar</button>
      </form>
    </div>
  </nav>

  <div class="container my-5">
    <div class="row p-4">

      <!--IJNICA "INTRODUCIR DATOS"-->
      <div class="col-md-5">
        <div class="card">
          <div class="card-body">
            <form id="task-form">
              <div class="form-group">
                <input type="text" id="producto" placeholder="Producto..." class="form-control my-2">
              </div>
              <div class="form-group">
                <input type="text" id="categoria" placeholder="Categoria..." class="form-control my-2">
              </div>
              <div class="form-group">
                <input type="number" id="stock" placeholder="Stock..." class="form-control my-2">
              </div>
              <div class="form-group">
                <input type="number" id="precio" placeholder="Precio..." class="form-control my-2">
              </div>
              <input type="hidden" id="taskId">
              <button type="submit" class="btn btn-primary text-center w-100">GUARDAR</button>
            </form>
          </div>
        </div>
      </div>
      <!--FIN "INTRODUCIR DATOS"-->
      <div class="col-md-7">

        <div class="card my-4" id="task-result">
          <div class="card-body">
            <ul id="container"></ul>
          </div>
        </div>


        <!--INICIA LISTA -->
        <table class="table table-bordered table-sm">
          <thead>
            <tr>
              <td class="text-center">ID</td>
              <td class="text-center">Producto</td>
              <td class="text-center">Categoria</td>
              <td class="text-center">Stock</td>
              <td class="text-center">Precio</td>
            </tr>
          </thead>
          <tbody id="tasks"></tbody>
        </table>
        <!--FIN LISTA-->


      </div>
    </div>
  </div>
  
<footer>
<div class="container-fluid bg-primary fixed-bottom">
  <div class="row  text-center">
    <a class="navbar-brand text-light py-3" href="https://www.youtube.com/watch?v=jHWBFyZcLPg">
      Desarrollado por: 1302519@senati.pe || Copyright &copy; <?php echo date('Y / M'); ?> &mdash; SENATI
    </a>
  </div>
</div>
</footer>
<script src="./js/jquery.js"></script>
<script src="./js/ajax.js"></script>
</body>
</html>



