<?php include '../config.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ROOT_PATH . 'inc/head.php' ?>
    <link rel="stylesheet" href="../styles/not-found.css">
</head>

<body>
    <header>
        <?php
        include ROOT_PATH . 'inc/nav_bar.php';
        ?>
    </header>
    <main>
        <div class="error-container">
            <div class="error-content">
                <img src="../icons/icon-notFound.svg" alt="Error 404">
                <h1 class="error-title">Oops! Página no encontrada</h1>
                <p class="error-message">La página que estás buscando no se encuentra en nuestro servidor.</p>
                <a href="../index.php" class="error-link">Volver a la página principal</a>
            </div>
        </div>
    </main>
    <footer>
        <?php
        include ROOT_PATH . 'frontend/footer.php';
        ?>
    </footer>
</body>

</html>