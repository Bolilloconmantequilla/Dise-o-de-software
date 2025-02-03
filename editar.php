<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "uacm");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Agregar una noticia
if (isset($_POST['agregar_noticia'])) {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $stmt = $conn->prepare("INSERT INTO noticias (titulo, contenido) VALUES (?, ?)");
    $stmt->bind_param("ss", $titulo, $contenido);
    $stmt->execute();
    header("Location: editar.php");
    exit();
}

// Eliminar una noticia
if (isset($_GET['eliminar_noticia'])) {
    $id = $_GET['eliminar_noticia'];
    $stmt = $conn->prepare("DELETE FROM noticias WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: editar.php");
    exit();
}

// Agregar un enlace
if (isset($_POST['agregar_enlace'])) {
    $nombre = $_POST['nombre'];
    $url = $_POST['url'];
    $stmt = $conn->prepare("INSERT INTO enlaces (nombre, url) VALUES (?, ?)");
    $stmt->bind_param("ss", $nombre, $url);
    $stmt->execute();
    header("Location: editar.php");
    exit();
}

// Eliminar un enlace
if (isset($_GET['eliminar_enlace'])) {
    $id = $_GET['eliminar_enlace'];
    $stmt = $conn->prepare("DELETE FROM enlaces WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: editar.php");
    exit();
}

// Obtener todas las noticias y enlaces
$noticias = $conn->query("SELECT * FROM noticias");
$enlaces = $conn->query("SELECT * FROM enlaces");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contenido</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Contenido</h1>

    <!-- Noticias -->
    <section>
        <h2>Noticias</h2>
        <form method="post">
            <label>Título:</label>
            <input type="text" name="titulo" required>
            <label>Contenido:</label>
            <textarea name="contenido" required></textarea>
            <button type="submit" name="agregar_noticia">Agregar Noticia</button>
        </form>
        <ul>
            <?php while ($noticia = $noticias->fetch_assoc()): ?>
                <li>
                    <strong><?= htmlspecialchars($noticia['titulo']) ?></strong>: <?= htmlspecialchars($noticia['contenido']) ?>
                    <a href="?eliminar_noticia=<?= $noticia['id'] ?>">Eliminar</a>
                </li>
            <?php endwhile; ?>
        </ul>
    </section>

    <!-- Enlaces -->
    <section>
        <h2>Enlaces</h2>
        <form method="post">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            <label>URL:</label>
            <input type="url" name="url" required>
            <button type="submit" name="agregar_enlace">Agregar Enlace</button>
        </form>
        <ul>
            <?php while ($enlace = $enlaces->fetch_assoc()): ?>
                <li>
                    <strong><?= htmlspecialchars($enlace['nombre']) ?></strong>: 
                    <a href="<?= htmlspecialchars($enlace['url']) ?>" target="_blank"><?= htmlspecialchars($enlace['url']) ?></a>
                    <a href="?eliminar_enlace=<?= $enlace['id'] ?>">Eliminar</a>
                </li>
            <?php endwhile; ?>
        </ul>
    </section>

    <section>
        <h2>Tramites de egresados</h2>
        <form method="post">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            <label>URL:</label>
            <input type="url" name="url" required>
            <button type="submit" name="agregar_enlace">Agregar Enlace</button>
        </form>

        <section>
        <h2>Tramites escolares</h2>
        <form method="post">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            <label>URL:</label>
            <input type="url" name="url" required>
            <button type="submit" name="agregar_enlace">Agregar Enlace</button>
        </form>

        <section>
        <h2>Servicios</h2>
        <form method="post">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            <label>URL:</label>
            <input type="url" name="url" required>
            <button type="submit" name="agregar_enlace">Agregar Enlace</button>
        </form>

</body>
</html>
