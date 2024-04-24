<?php
    session_start(); // Inicia la sesión si aún no se ha iniciado
    include "layouts/header.php"; 
    include "layouts/sidebar.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar Producto</title>
    <link rel="stylesheet" href="views/dist/css/adminlte.min.css">
</head>
<body>
   <div class="content-wrapper">
       <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card card-success">
                    <div class="card-header ">
                        <h3 class="card-title text-center">Formulario Producto</h3>
                    </div>
                    <form action="index.php" method="POST">
                        <div class="card-body">
                            <?php
                                // Mostrar mensaje de éxito si está disponible
                                if(isset($_SESSION['mensaje'])) {
                                    echo '<div class="alert alert-success">' . $_SESSION['mensaje'] . '</div>';
                                    unset($_SESSION['mensaje']); // Eliminar el mensaje de la sesión
                                }
                                if(isset($_SESSION['error'])) {
                                    echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                                    unset($_SESSION['error']); // Eliminar el mensaje de la sesión
                                }
                            ?>
                            <input class="form-control form-control-lg" type="text" name="nombre_producto" placeholder="Nombre del producto" required >
                            <br>
                            <input class="form-control form-control-lg" type="number" name="cantidad_producto" placeholder="Cantidad del producto" required>

                            <div class="mt-2 text-center">
                                <a href="index.php"  class="btn btn-danger">Cancelar</a>
                                <button  type="submit" class="btn btn-success" >Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
           
    <?php include "layouts/sidebar.php"; ?>
    <?php include "layouts/footer.php"; ?>
</body>
</html>