<?php
require_once '../Conexion/Conexion.php';
require_once '../Modelo/Camiseta.php';
require_once '../Controlador/Camisetas.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Cesar Lautaro Obregon">
    <meta name="description" content="Venta de Camisetas de Futbol, Envios a todo el pais.">

    <meta name="keywords" content="palabra clave 1, palabra clave 2, palabra clave 3">
    <meta name="robots" content="index,noindex,follow,nofollow">

    <title>Tienda Deportiva</title>
    <link rel="shortcut icon" href="img/diegoblanco.png">
    <link rel="stylesheet" href="../Css/style.css">
    <script src="https://kit.fontawesome.com/1c6e8b5b7a.js" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <img class="logo" src="../img/diegoblanco.png">
        <h1 class="titulo">Tienda Deportiva</h1>
        <nav>
            <ul class="menu-horizontal">
                <li><a href="../index.html">Menu principal</a></li>
                <li>
                    <a href="productos.php">Productos</a>
                </li>
                <li>
                    <a href="carrito.php">Carrito</a>
                </li>
            </ul>
        </nav>
    </header>
    <nav>
        <p class="mensaje-inferior">Envios a todo el pais a partir de $40.000</p>
    </nav>

    <?php
    $objetoCam = new Camisetas();
    if ($objetoCam->abrirConexion()) {
        $Camisetas = $objetoCam->listar("SELECT * FROM productos WHERE activo=1");
    ?>
    <div class="container-items">
        <?php
        foreach ($Camisetas as $key => $value) {
        ?>
        <div class="item">
            <?php
            $id = $value->getId();
            $imagen = $value->getFoto();
            ?>
            <figure>
                <?php echo"<img src='../img/camisetas/$imagen' alt='producto'>";?>
            </figure>
            <div class="info-producto">
                <h2><?php echo $value->getDescripcion();?></h2>
                <p class="precio">$<?php echo number_format($value->getPrecio(), 2, ",", ".");?></p>
                <a href="producto.php?id=<?php echo $value->getId();?>" class="boton">
                    <p>Comprar</p>
                </a>
            </div>
        </div>
        <?php }
         $objetoCam->cerrarConexion(); 
         }
         ?>
    </div>
    
    <nav class="pago">
        <img src="../img/pagos.jpg" alt="">
    </nav>
</body>

<footer class="pie">
    <div class="grupo-1">
        <div class="box">
            <figure>
                <a href="">
                    <img class="logo" src="../img/diegoblanco.png" alt="logo">
                </a>
            </figure>
        </div>
        <div class="box">
            <h2>SOBRE NOSOTROS</h2>
            <p><b>Tienda Deportiva</b> es una empresa líder en la venta de productos deportivos. Con más de 30 años de
                experiencia en el mercado, contamos con operaciones en 20 sucursales físicas y en nuestra Tienda Online.
            </p>
        </div>
        <div class="box">
            <h2>SIGUENOS</h2>
            <div class="redsocial">
                <a href="https://www.facebook.com/"><img src="../img/fac.png" alt="facebook"></a>
                <a href="https://www.instagram.com/"><img src="../img/inst.png" alt="instagram"></a>
                <a href="https://twitter.com/?lang=es"><img src="../img/x2.png" alt="twitter"></a>
                <a href="https://www.youtube.com/"><img src="../img/you.webp" alt="youtube"></a>
            </div>
        </div>
    </div>
    <div class="grupo-2">
        <small>&copy; 2023 <b>Tienda Deportiva</b> - Todos los Derechos Reservados</small>
    </div>
</footer>

</html>