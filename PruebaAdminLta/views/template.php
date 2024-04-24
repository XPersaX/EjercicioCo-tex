
<?php include "layouts/header.php"; ?>
<?php include "layouts/sidebar.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mis Productos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <!-- <li class="breadcrumb-item active">Starter Page</li> -->
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Nombre</th>
          <th>Cantidad</th>
          <th>Fecha Registro</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
          <?php if (empty($productos)) : ?>
            <tr class="text-center">
              <td colspan="5">No hay productos disponibles.</td>
            </tr>
          <?php else : ?>
            <?php foreach ($productos as $producto): ?>
              <tr>
                <td><?php echo $producto['nombre']; ?></td>
                <td><?php echo $producto['cantidad']; ?></td>
                <td><?php echo $producto['fecha_registro']; ?></td>
                <?php if ($producto['estado'] === "DISPONIBLE") : ?>
                  <td class="bg-success"><?php echo $producto['estado']; ?></td>
                <?php else : ?>
                  <td class="bg-danger"><?php echo $producto['estado']; ?></td>
                <?php endif; ?>
                <td>
                  <a href="index.php?action=editar_producto&id=<?php echo $producto['id_producto']; ?>">
                    <i class="far fa-edit" style="color: #1851b4;"></i>
                  </a>
                  <a href="index.php?action=eliminar_producto&id=<?php echo $producto['id_producto']; ?>">
                    <i class="fas fa-trash-alt" style="color: #b90e0e;"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include "layouts/footer.php"; ?>
</body>
</html>
