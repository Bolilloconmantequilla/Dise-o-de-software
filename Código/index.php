<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "uacm");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener todas las noticias
$noticias = $conn->query("SELECT * FROM noticias");

// Obtener todos los enlaces
$enlaces = $conn->query("SELECT * FROM enlaces");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - Universidad</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js" defer></script>
</head>
<body>
    <!-- Encabezado con barra de búsqueda -->
    <header>
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <h1>Bienvenidos a la Universidad</h1>
        <form class="search-form" action="buscar.html" method="get">
            <input type="text" name="query" placeholder="Buscar..." required>
            <button type="submit">🔍</button>
        </form>
    </header>

   <!-- Menú horizontal con vistas previas -->
   <nav class="nav-main">
        <ul>
            <li class="menu-item">
                <a href="index.html">Inicio</a>
                
            </li>
            <li class="menu-item">
                <a href="mapa.html">Mapa del Plantel</a>
                <div class="preview">
                    <img src="mapa.jpg" alt="Vista previa de Mapa">
                </div>
            </li>
            <li class="menu-item">
                <a href="faq.html">Preguntas Frecuentes</a>
                <div class="preview">
                    <img src="faq.jpg" alt="Vista previa de Preguntas Frecuentes">
                </div>
            </li>
            <li class="menu-item">
                <a href="servicios.html">Servicios</a>
                <div class="preview">
                    <img src="su.jpg" alt="Vista previa de Servicios">
                </div>
            </li>
            <li class="menu-item">
                <a href="tramites-escolares.html">Trámites Escolares</a>
                <div class="preview">
                    <img src="te.jpg" alt="Vista previa de Trámites Escolares">
                </div>
            </li>
            <li class="menu-item">
                <a href="tramites-egresados.html">Trámites de Egresados</a>
                <div class="preview">
                    <img src="teg.jpg" alt="Vista previa de Trámites de Egresados">
                </div>
            </li>
            <li class="menu-item">
                <a href="tramites-documentos.html">Trámites de Documentos</a>
                <div class="preview">
                    <img src="tdu.jpg" alt="Vista previa de Trámites de Documentos">
                </div>
            </li>
        </ul>
    </nav>


    <!-- Carrete de imágenes -->
    <section class="carousel">
        <div class="carousel-container">
            <div class="carousel-item active"><img src="centro.jpg" alt="Imagen 1"></div>
            <div class="carousel-item"><img src="plantel.jpg" alt="Imagen 2"></div>
            <div class="carousel-item"><img src="biblioteca.jpg" alt="Imagen 3"></div>
        </div>
        <button class="carousel-control prev">❮</button>
        <button class="carousel-control next">❯</button>
    </section>

    <!-- Noticias -->
    <main>
        <h2 class="main-title">Sección de Noticias</h2>
        <?php if ($noticias->num_rows > 0): ?>
            <ul>
                <?php while ($noticia = $noticias->fetch_assoc()): ?>
                    <li>
                        <h3><?= htmlspecialchars($noticia['titulo']) ?></h3>
                        <p><?= htmlspecialchars($noticia['contenido']) ?></p>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No hay noticias disponibles.</p>
        <?php endif; ?>

        <!-- Enlaces Útiles -->
        <h3 class="main-title">Enlaces</h3>
        <?php if ($enlaces->num_rows > 0): ?>
            <ul>
                <?php while ($enlace = $enlaces->fetch_assoc()): ?>
                    <li>
                        <a href="<?= htmlspecialchars($enlace['url']) ?>" target="_blank"><?= htmlspecialchars($enlace['nombre']) ?></a>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No hay enlaces disponibles.</p>
        <?php endif; ?>
        <br><br><br>
    </main>

    <!-- Pie de página -->
    <footer>
        <p>© 2024 Universidad Autónoma. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
