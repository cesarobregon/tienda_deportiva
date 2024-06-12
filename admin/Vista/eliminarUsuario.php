<?php
require '../Modelo/Usuario.php';
require '../Controlador/Usuarios.php';

//Preparar Datos para ELIMINAR
if (isset($_GET["id"])) {

    $objetoUs = new Usuarios();
    if ($objetoUs->abrirConexion()) {

        $ob = new Usuario();
        $ob->setId($_GET['id']);

        if ($objetoUs->eliminar($ob)) {
            echo "<p>El Usuario se eliminó con exito. <a href='inicioUsuarios.php'>Ir al listado</a><p>";
        } else {
            echo "<p>Problemas al intentar eliminar al Usuario. <a href='inicioUsuarios.php'>Ir al listado</a><p>";
        }

        $objetoUs->cerrarConexion();
    } else {
        echo "Error al intentar conectar a la base de datos";
    }
}