<?php
require_once '../Conexion/Conexion.php';
require_once '../../Modelo/Camiseta.php';
require_once '../../Controlador/Camisetas.php';

$objetoCam = new Camisetas();
if ($objetoCam->abrirConexion()) {
    $Productos = $objetoCam->listar("SELECT * FROM productos");
}else{
    echo "-No se pudo establecer la conexion-";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Administrador</title>
    <link rel="stylesheet" href="../Css/style.css">
</head>

<body>
    <header>
        <h1 class="titulo">Panel de Control</h1>
    </header>
    <div>
        <br><h1>Listado de Productos</h1><br>
        <form class="boton" action="../index.php"><button class="btn">Salir</button></form>
        <form class="boton" action="nuevoProducto.php"><button class="btn">Nuevo Producto</button></form>
        <form class="boton" action="inicioUsuarios.php"><button class="btn">Usuarios</button></form>
    </div>
    <table class="tabla-inicio">
        <thead>
            <tr>
                <th>Acción</th>
                <th>Imagen</th>
                <th>Id</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Id Categoria</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($Productos as $key => $value){
                $id = $value->getId();
                $descripcion = $value->getDescripcion();
                $precio = $value->getPrecio();
                $imagen = $value->getFoto();
                $id_categoria = $value->getId_categoria();
                if($value->getEstado() == 1){
                    $estado = "activo";
                }else{
                    $estado = "inactivo";
                }
                
                echo "<tr>";
                    echo "<td>";
                    echo "<a href='editarProducto.php?id=$id&descripcion=$descripcion&precio=$precio'><img src='../img/icon-editalt.png' width='24px' title='Editar'></a>";
                    echo "<a href='../Controlador/metodos_abm.php?id=$id'><img src='../img/icon-deletefile.png' width='24px' title='Eliminar'></a>";
                    echo "</td>";
                    
                    echo "<td><img src='../../img/camisetas/$imagen' alt='producto' width='80px' height='70px'></td>";
                    echo "<td>$id</td>";
                    echo "<td>$descripcion</td>";
                    echo "<td>$$precio</td>";
                    echo "<td>$id_categoria</td>";
                    echo "<td>$estado</td>";
                echo "</tr>";
            }?>
        </tbody>
    </table>
</body>

</html>