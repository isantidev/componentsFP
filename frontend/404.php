<?php include '../config.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ROOT_PATH . 'inc/head.php' ?>
</head>

<body>
    <header>
        <?php
        include ROOT_PATH . 'inc/nav_bar.php';
        ?>
    </header>
    <main>
        <div class="page_error_contenedor">
            <main class="page_error">
                <h2>404</h2>
                <hr>
                <p>ALGO FUE MAL, PORFAVOR INGRESA UNA DIRECCIÓN CORRECTA</p>
            </main>
        </div>
    </main>
    <footer>
        <?php
        include ROOT_PATH . 'frontend/footer.php';
        ?>
    </footer>
</body>

</html>