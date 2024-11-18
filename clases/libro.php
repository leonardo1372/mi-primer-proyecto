<?php

require_once('../conexion.php');

class libro{
    public $titulo, $autor, $editorial, $año_publicacion, $genero;
    public $conexion;

    public function __construct($conexion, $titulo = null, $autor = null, $editorial = null, $año_publicacion = null, $genero = null)
    {
        $this->conexion = $conexion;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->editorial = $editorial;
        $this->año_publicacion = $año_publicacion;
        $this->genero = $genero;

    }

    public function registrarLibro()
    {
        $sql = "INSERT INTO `libro`(`id`, `titulo`, `autor`, `editorial`, `año_publicacion`, `genero`) VALUES ('$this->titulo', $this->autor, '$this->año_publicacion', '$this->genero')";
        if (mysqli_query($this->conexion, $sql)) {
            echo " libro registrado correctamente";
        } else {
            echo "Error al registrar el libro: " . mysqli_error($this->conexion);
        }
    }

    public static function mostrarLibro($conexion)
    {
        $sql = "SELECT * FROM libro";
        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "ID: " . $fila["id"] . " - titulo: " . $fila["titulo"] . " - autor: " . $fila["autor"] . " - editorial: " . $fila["editorial"] . " - año_publicacion: " . $fila["año_publicacion"] . " - genero: " . $fila["genero"] ."<br>";
            }
        } else {
            echo "0 resultados";
        }
    }

    public function eliminarLibro($id)
    {
        $sql = "DELETE FROM estudiante WHERE id=$id";
        if (mysqli_query($this->conexion, $sql)) {
            echo " eliminado correctamente";
        } else {
            echo "Error al eliminar el estudiante: " . mysqli_error($this->conexion);
        }
    }
}
?>