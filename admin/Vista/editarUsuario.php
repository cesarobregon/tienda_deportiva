<?php
if (isset($_GET['id']) && isset($_GET['usuario']) && isset($_GET['clave'])) {
    $id = $_GET['id'];
    $usuario = $_GET['usuario'];
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    $clave = $_GET['clave'];

} else {
    echo "Faltan parámetros en la URL.";
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../Css/style.css">
</head>

<body>
    <header>
        <h1 class="titulo">Panel de Control</h1>
    </header>
    <div>
        <br><h1>Formulario de Edicion: Usuarios</h1><br>
        <form class="boton" action="inicioUsuarios.php"><button>Atras</button></form>
    </div>
    <form class="form" method="post" name="frmEditar" action="../Controlador/metodos_abm.php" enctype="multipart/form-data">
        <h1>Modificar Datos</h1><br>
        <label for="id">ID</label><br>
        <input type="text" name="id" value="<?php echo $id; ?>" readonly><br>
        <br><label for="nombre">NOMBRE</label><br>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>" required><br>
        <br><label for="apellido">APELLIDO</label><br>
        <input type="text" name="apellido" value="<?php echo $apellido; ?>" required><br>
        <br><label for="usuario">USUARIO</label><br>
        <input type="text" name="usuario" value="<?php echo $usuario; ?>" required><br>
        <br><label for="clave">CONTRASEÑA</label><br>
        <input type="password" name="clave" value="<?php echo $clave; ?>" required><br>

        
        <br><input type="submit" value="Guardar" name="editarUsuario">
    </form>
</body>

</html>