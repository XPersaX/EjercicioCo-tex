<?php include "layouts/header.php"; ?>
<?php include "layouts/sidebar.php"; ?>
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
                        <h3 class="card-title text-center">Editar Producto</h3>
                    </div>
                    <form action="index.php?action=actualizar_producto" method="POST">
                        <div class="card-body">
                            <input class="form-control form-control-lg" type="hidden" value="<?php echo $producto['id_producto']; ?>" name="id_producto">
                            <input class="form-control form-control-lg" type="text" value="<?php echo $producto['nombre']; ?>" name="nombre_producto" placeholder="Nombre del producto" required>
                            <br>
                            <input class="form-control form-control-lg" type="number" value="<?php echo $producto['cantidad']; ?>" name="cantidad_producto" placeholder="Cantidad del producto" required>
                            <br>
                            <select class="form-control form-control-lg" name="estado">
                                <?php
                                    if($producto['estado'] === "DISPONIBLE"){
                                        ?>
                                        <option value="DISPONIBLE" selected>DISPONIBLE</option>
                                        <option value="AGOTADO">AGOTADO</option>
                                        <?php
                                    }else{
                                        ?>
                                        <option value="DISPONIBLE">DISPONIBLE</option>
                                        <option value="AGOTADO"selected>AGOTADO</option>
                                        <?php
                                    }
                                 ?>
                            </select>
                            <div class="mt-2 text-center">
                                <a href="index.php" class="btn btn-danger">Cancelar</a>
                                <button type="submit"  class="btn btn-success">Actualizar</button>
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