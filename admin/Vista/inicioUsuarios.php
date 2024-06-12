<?php
require_once '../Conexion/Conexion.php';
require_once '../../Modelo/Usuario.php';
require_once '../../Controlador/Usuarios.php';

$objetoUs = new Usuarios();
if ($objetoUs->abrirConexion()) {
    $Usuarios = $objetoUs->listar("select * from usuarios");
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
        <br><h1>Listado de Usuarios</h1><br>
        <form class="boton" action="inicio.php"><button class="btn">Atras</button></form>
        <form class="boton" action="nuevoUsuario.php"><button class="btn">Nuevo Usuario</button></form>
    </div>
    <table class="tabla-inicio">
        <thead>
            <tr>
                <th>Acción</th>
                <th>Id</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Clave</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($Usuarios as $key => $value){
                $id = $value->getId();
                $usuario = $value->getUsuario();
                $nombre = $value->getNombre();
                $apellido = $value->getApellido();
                $clave = $value->getClave();
                
                echo "<tr>";
                    echo "<td>";
                    echo "<a href='editarUsuario.php?id=$id&usuario=$usuario&nombre=$nombre&apellido=$apellido&clave=$clave'><img src='../img/icon-editalt.png' width='24px' title='Editar'></a>";
                    echo "<a href='eliminarUsuario.php?id=$id'><img src='../img/icon-deletefile.png' width='24px' title='Eliminar'></a>";
                    echo "</td>";
                    
                    echo "<td>$id</td>";
                    echo "<td>$usuario</td>";
                    echo "<td>$nombre</td>";
                    echo "<td>$apellido</td>";
                    echo "<td>$clave</td>";
                echo "</tr>";
            }?>
        </tbody>
    </table>
</body>

</html>