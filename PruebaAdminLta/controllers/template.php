<?php
require_once "models/Productos.php";
class TemplateController{
    // Metodo para mostrar la lista de los productos en la vista principal
    public function template(){
        session_start();
        $modelo = new ProductoModelo();
        $productos = $modelo->obtenerProductos();
        include "views/template.php";
    }

    //Metodo para mostrar la vista para registar un  nuevo producto
    public function vistaCrearProducto(){
        include "views/createProduct.php";
    }

    // Metodo Para Registar el producto
    public function registrarProducto(){
        // Verificar si se han enviado datos del formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombre_producto"]) && !empty($_POST["cantidad_producto"])) {
            $nombre = $_POST["nombre_producto"];
            $cantidad = $_POST["cantidad_producto"];
            $fecha_registro = date("Y-m-d");
            $estado = "DISPONIBLE";

            $modelo = new ProductoModelo();
            $producto = $modelo->insertarProducto($nombre, $cantidad,$fecha_registro,$estado);
             // Verificar si se ha registrado el producto correctamente
            if ($producto) {
                $_SESSION['mensaje'] = "¡Producto registrado exitosamente!";
                header("Location: index.php");
                exit();
            } else {
                $_SESSION['error'] = "¡Error al registrar el producto!";
            }
        }else{
            header("Location: index.php?action=crear_producto");
            $_SESSION['error'] = "¡Debes Llenar todos los campos!";
            exit();
        }
    }

    public function vistaEditarProducto(){
        if (isset($_GET['action']) && !empty($_GET['action'])) {
            $id_producto = $_GET['id'];
            
            // Llamar al modelo para obtener los datos del producto
            $modelo = new ProductoModelo();
            $producto = $modelo->obtenerProducto($id_producto);
            
            // Verificar si se obtuvieron los datos del producto
            if ($producto) {
                // Incluir la vista para editar el producto y pasarle los datos del producto
                include "views/editProduct.php";
            } else {
                // Manejar el caso en que no se encuentre el producto
                echo "El producto no existe";
            }
        } else {
            // Manejar el caso en que no se proporcionó un ID de producto válido
            echo "ID de producto no válido";
        }
    }

    // Metodo Para Actualizar el producto
    public function actualizarProductos(){
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Verificar si se proporcionó un ID de producto válido
            if (isset($_POST['id_producto']) && !empty($_POST['id_producto'])) {
                // Obtener los datos del formulario
                $id_producto = $_POST['id_producto'];
                $nombre_producto = $_POST['nombre_producto'];
                $cantidad_producto = $_POST['cantidad_producto'];
                $estado = $_POST['estado'];
                
                // Llamar al modelo para actualizar el producto
                $modelo = new ProductoModelo();
                $exito = $modelo->actualizarProducto($id_producto, $nombre_producto, $cantidad_producto, $estado);
                
                // Verificar si la actualización fue exitosa
                if ($exito) {
                    // Redirigir a la página principal
                    header("Location: index.php");
                    exit();
                } else {
                    // Manejar el caso de fallo en la actualización
                    echo "Error: No se pudo actualizar el producto.";
                }
            } else {
                // Manejar el caso de falta de ID de producto válido
                echo "Error: ID de producto no válido.";
            }
        } else {
            // Manejar el caso de solicitud incorrecta
            echo "Error: Solicitud incorrecta para actualizar el producto.";
        }
    }


    public function actualizarEstado(){
        if (isset($_GET['action']) && !empty($_GET['action'])) {
            $id_producto = $_GET['id'];
            
            // Llamar al modelo para obtener los datos del producto
            $modelo = new ProductoModelo();
            $producto = $modelo->deleteProduct($id_producto);
            
            // Verificar si se obtuvieron los datos del producto
            if ($producto) {
                //Volver a la vista de index
                header("Location: index.php");
            } else {
                // Manejar el caso en que no se encuentre el producto
                echo "No se ha podido eliminar el producto";
            }
        } else {
            // Manejar el caso en que no se proporcionó un ID de producto válido
            echo "ID de producto no válido";
        }
    }
}
?>