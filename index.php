<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ROOT_PATH . 'inc/head.php' ?>
    <link rel="stylesheet" href="styles/index-slider.css">
    <link rel="stylesheet" href="styles/index-card.css">

</head>

<body>
    <header>
        <?php
        include ROOT_PATH . 'inc/nav_bar.php';
        ?>
    </header>
    <main>
        <section class="slider__container">
            <div class="slider__container-wrapper">
                <div class="slider">
                    <img id="slider__img-1" class="slider__img" src="/images/img-producto/img-zhimocha-producto.png" alt="">
                    <img id="slider__img-2" class="slider__img" src="/images/img-producto/img-zhimocha-producto.png" alt="">
                    <img id="slider__img-3" class="slider__img" src="/images/img-producto/img-zhimocha-producto.png" alt="">
                </div>
                <div class="slider__nav">
                    <a href="#slider__img-1"></a>
                    <a href="#slider__img-2"></a>
                    <a href="#slider__img-3"></a>
                </div>
            </div>
        </section>

        <section class="info">
            <div class="info__wrapper">
                <div class="info__container-img">
                    <img class="info__img" src="/components/img/img-vertical-2x3.jpg" alt="">
                    <img class="info__img" src="/components/img/img-1x1.jpg" alt="">
                    <img class="info__img" src="/components/img/img-1x1.jpg" alt="">
                </div>
                <article class="info__container-text">
                    <h2 class="info__title">Conocenos</h2>
                    <p class="info__text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores suscipit corrupti reprehenderit nisi commodi obcaecati accusamus placeat voluptate deleniti eos doloremque neque in, id temporibus velit dolorem maxime, at ullam? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto commodi accusamus corporis incidunt, doloribus provident culpa blanditiis ducimus, suscipit amet impedit ipsam nulla autem ab numquam sint soluta maiores iure. </p>
                </article>
            </div>
        </section>

        <section class="products" id="product">
            <h2> Los mejores productos</h2>
            <article class="section__product">
                <div class="slider__product">
                    <a href="#producto__0101">
                        <div class="product__card">
                            <img class="product__img" src="/components/img/img-horizontal-3x2.jpg" alt="">
                            <div class="product__info">
                                <h3 class="product__name">Cocozhi</h3>
                                <p class="product__description">
                                    Lorem psum dolor sit amet consectetur adipisicing elit. Quidem, quaerat.
                                </p>
                            </div>
                        </div>
                    </a>

                    <a href="#producto__0101">
                        <div class="product__card">
                            <img class="product__img" src="/components/img/img-1x1.jpg" alt="">
                            <div class="product__info">
                                <h3 class="product__name">Cocozhi</h3>
                                <p class="product__description">
                                    Lorem psum dolor sit amet consectetur adipisicing elit. Quidem, quaerat.
                                </p>
                            </div>
                        </div>
                    </a>

                    <a href="#producto__0101">
                        <div class="product__card">
                            <img class="product__img" src="/components/img/img-vertical-2x3.jpg" alt="">
                            <div class="product__info">
                                <h3 class="product__name">Cocozhi</h3>
                                <p class="product__description">
                                    Lorem psum dolor sit amet consectetur adipisicing elit. Quidem, quaerat.
                                </p>
                            </div>
                        </div>
                    </a>

                    <a href="#producto__0101">
                        <div class="product__card">
                            <img class="product__img" src="/components/img/img-vertical-2x3.jpg" alt="">
                            <div class="product__info">
                                <h3 class="product__name">Cocozhi</h3>
                                <p class="product__description">
                                    Lorem psum dolor sit amet consectetur adipisicing elit. Quidem, quaerat.
                                </p>
                            </div>
                        </div>
                    </a>

                </div>
            </article>
        </section>
    </main>
    <footer>
        <?php
        include ROOT_PATH . 'frontend/footer.php';
        ?>
    </footer>
</body>

</html>