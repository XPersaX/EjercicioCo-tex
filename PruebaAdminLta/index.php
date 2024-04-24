<?php
require_once "controllers/template.php";

// Verifico si se ha enviado una acción
if(isset($_GET['action'])) {
    $action = $_GET['action'];

    // Verifico la acción
    switch($action) {
        case 'crear_producto':
            // Incluyo el controlador de Producto y llamar al método correspondiente
            $template = new TemplateController();
            $template->vistaCrearProducto();
            break;
        case 'editar_producto':
            // Verifico si se proporcionó un ID de producto para editar
            if(isset($_GET['id'])) {
                // Obtener el ID del producto desde $_GET
                $id_producto = $_GET['id'];
                // Llamar al método en el controlador para mostrar la vista de edición
                $template = new TemplateController();
                $template->vistaEditarProducto($id_producto);
            } else {
                // Si no se proporcionó un ID, vuelvo a la página de error o a la página principal
                header("Location: index.php");
                exit();
            }
            break;
        case 'eliminar_producto':
            if(isset($_GET['id'])) {
                // Obtener el ID del producto desde $_GET
                $id_producto = $_GET['id'];
                // Llamar al método en el controlador para mostrar la vista de edición
                $template = new TemplateController();
                $template->actualizarEstado($id_producto);
            } else {
                // Si no se proporcionó un ID, redirigir a alguna página de error o a la página principal
                header("Location: index.php");
                exit();
            }
            break;

        case 'actualizar_producto':
            // Verificar si se han enviado los datos de actualización
            if(isset($_POST['id_producto']) && isset($_POST['nombre_producto']) && isset($_POST['cantidad_producto']) && isset($_POST['estado'])) {
                // Obtener los datos del formulario
                $id_producto = $_POST['id_producto'];
                $nombre_producto = $_POST['nombre_producto'];
                $cantidad_producto = $_POST['cantidad_producto'];
                $estado = $_POST['estado'];
                // Llamar al método en el controlador para actualizar el producto
                $template = new TemplateController();
                $template->actualizarProductos($id_producto, $nombre_producto, $cantidad_producto, $estado);
            } else {
                // Si faltan datos, redirigir o mostrar un mensaje de error
                header("Location: index.php");
                exit();
            }
            break;
        default:
            // Si la acción no coincide con ninguna de las opciones, se muestra la plantilla predeterminada
            $template = new TemplateController();
            $template->template();
            break;
    }
} 
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombre_producto"]) && !empty($_POST["cantidad_producto"])) {
    // Si se ha enviado el formulario de registro de producto, llamar al método registrarProducto()
    $template = new TemplateController();
    $template->registrarProducto();
}else {
    // Si no se ha enviado ninguna acción ni formulario de registro, simplemente mostramos la plantilla predeterminada
    $template = new TemplateController();
    $template->template();
}
?>
