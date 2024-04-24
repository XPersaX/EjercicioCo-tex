<?php
class ProductoModelo {

    private $conexion;

    public function __construct(){
        $this->conexion = new mysqli("localhost","root","","productos");
    }

    public function insertarProducto($nombre,$cantidad,$fecha_registro,$estado) {
        // Preparar la consulta SQL con parámetros
        $query = "INSERT INTO productos (nombre,cantidad,fecha_registro,estado) VALUES (?, ?, ?, ?)";
        
        // Preparar la sentencia SQL
        $statement = $this->conexion->prepare($query);
        
        // Asignar los valores a los parámetros y ejecutar la consulta
        $statement->bind_param("siss", $nombre, $cantidad, $fecha_registro, $estado);
        $resultado = $statement->execute();
        
        // Verificar si la consulta se ejecutó correctamente
        if ($resultado) {
            return true; // Retorna true si el producto se insertó correctamente
        } else {
            return false; // Retorna false si hubo un error al insertar el producto
        }
    }

    public function obtenerProductos() {
        $resultados = $this->conexion->query('SELECT * FROM productos');
        return $resultados->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerProducto($id_producto) {
        $resultados = $this->conexion->query("SELECT id_producto,nombre,cantidad,estado FROM productos WHERE id_producto = $id_producto");
        // Verifica si la consulta se ejecutó correctamente
        if ($resultados) {
            // Devuelve los resultados como un array asociativo
            return $resultados->fetch_assoc();
        } else {
            // Si la consulta falla, devuelve un mensaje de error
            return null; 
        }
    }


    public function actualizarProducto($id_producto,$nombre_producto,$cantidad_producto,$estado) {
        // Preparar la consulta SQL
        $query = "UPDATE productos SET nombre = ?, cantidad = ?, estado = ? WHERE id_producto = ?";
        
        // Preparar la sentencia
        $statement = $this->conexion->prepare($query);
        
        // Vincular los parámetros
        $statement->bind_param("sssi", $nombre_producto, $cantidad_producto, $estado, $id_producto);
        
        // Ejecutar la sentencia
        if ($statement->execute()) {
            // La actualización fue exitosa
            return true;
        } else {
            // La actualización falló
            return false;
        }
    }

    public function deleteProduct($id_producto) {
        // Preparar la consulta SQL para actualizar el estado del producto
        $query = "UPDATE productos SET estado = ? WHERE id_producto = ?";
        
        // Preparar la sentencia SQL
        $statement = $this->conexion->prepare($query);
        
        // Asignar los valores a los parámetros y ejecutar la consulta
        $estado = "AGOTADO";
        $statement->bind_param("si",$estado, $id_producto);
        $resultado = $statement->execute();
        
        // Verificar si la consulta se ejecutó correctamente
        if ($resultado) {
            return true; // Retorna true si el estado del producto se actualizó correctamente
        } else {
            return false; // Retorna false si hubo un error al actualizar el estado del producto
        }
    }
}
?>
