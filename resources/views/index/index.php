<?php

use App\Core\Auth;

if (Auth::check()) {
    // Recuperar el ID del usuario desde la sesión
    $usuario_id = Auth::id();

    // Realiza una consulta a la base de datos para obtener el valor del campo "administrador"
    $sql = "SELECT administrador FROM usuarios WHERE id = '$usuario_id'";
    $result = mysqli_query($conn, $sql);
    $usuario = mysqli_fetch_assoc($result);

    // Ahora puedes obtener el valor de administrador
    $es_administrador = $usuario['administrador']; // Será 0 o 1
}
?>

<header id="home">
    <section class="hero">
        <video class="video" autoplay loop muted id="video_background" preload="auto">
            <source src="<?= BASE_URL . '/media/video_entrada2.mp4'; ?>" type="video/mp4" />
            Tu navegador no soporta el video.
        </video>
        <div class="txtHeader">
            <h1>Bienvenido a la Tienda de Relojes de Lujo</h1>
            <p>Descubre nuestra exclusiva colección de relojes de alta gama.</p>
            <a href="#products" class="btn">Ver Productos destacados</a>
        </div>
    </section>
</header>

<!-- Aquí sigue el resto del contenido de la página como ya lo tenías -->


<section id="products">
    <div>
        <h2>Productos destacados</h2>
    </div>
    <div class="carousel">
        <div class="list">
            <?php if (!empty($productos)) : ?>
                 <?php foreach ($productos as $producto):  ?>
                    <div class="item">
                        <img class="productos" src="<?= $producto->imagen1; ?>" alt="">
                        <div class="introduce">
                            <div class="title">DISEÑADO POR</div>
                            <div class="topic"><img class="logo-marca" src="<?= $producto->marca->logo; ?>" alt="no se ha encontrado el logo"></div>
                            <div class="des">
                                <?= $producto->nombre; ?>
                            </div>
                            <button class="seeMore">VER MAS &#8599</button>
                        </div>
                        <div class="detail">
                            <div class="title"><?= $producto->nombre; ?></div>
                            <div class="des">
                                <?= $producto->descripcion; ?>
                            </div>
                            <ul class="specifications">
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-watch" viewBox="0 0 16 16">
                                        <path d="M8.5 5a.5.5 0 0 0-1 0v2.5H6a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5z" />
                                        <path d="M5.667 16C4.747 16 4 15.254 4 14.333v-1.86A6 6 0 0 1 2 8c0-1.777.772-3.374 2-4.472V1.667C4 .747 4.746 0 5.667 0h4.666C11.253 0 12 .746 12 1.667v1.86a6 6 0 0 1 1.918 3.48.502.502 0 0 1 .582.493v1a.5.5 0 0 1-.582.493A6 6 0 0 1 12 12.473v1.86c0 .92-.746 1.667-1.667 1.667zM13 8A5 5 0 1 0 3 8a5 5 0 0 0 10 0" />
                                    </svg> <strong>Materiales:</strong> <?= $producto->materiales; ?></li>
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
                                        <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5m0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78zM5.048 3.967l-.087.065zm-.431.355A4.98 4.98 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8zm.344 7.646.087.065z" />
                                    </svg> <strong>Movimiento:</strong> <?= $producto->movimiento; ?></li>
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-droplet" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M7.21.8C7.69.295 8 0 8 0q.164.544.371 1.038c.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8m.413 1.021A31 31 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10a5 5 0 0 0 10 0c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z" />
                                        <path fill-rule="evenodd" d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87z" />
                                    </svg> <strong>Resistente al agua:</strong> <?= $producto->resistencia_al_agua; ?></li>
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield" viewBox="0 0 16 16">
                                        <path d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                                    </svg> <strong>Cristal:</strong> <?= $producto->cristal; ?></li>
                            </ul>

                            <div class="price">
                                <p><?= $producto->precio; ?> €</p>
                            </div>

                            <div class="checkout">
                                <button type="submit" onclick="window.location.href='añadir_al_carrito.php?id=<?= $producto->id; ?>'">AÑADIR AL CARRITO</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php else : ?>
                <p>No hay productos disponibles.</p>
            <?php endif ?>
        </div>
    </div>
    <div class="arrows">
        <button id="prev"><</button>
                <button id="next">></button>
                <button id="back">Ver todos &#8599</button>
    </div>
    </div>
</section>



<section id="marcas">
    <h2>Marcas</h2>
    <?php if (!empty($marcas)): ?>
        <div class="marcas-grid">
       <?php foreach ($marcas as $marca): ?>
                <div class="name-flex">
                    <div class="marca" onclick="window.location.href='showMarca.php?id=<?= $marca->id; ?>'">
                        <img class="logo" src="<?= $marca->logo; ?>" alt="logo">
                       
                    </div>
                </div>
            <?php endforeach ?>
        <?php else : ?>
            <p>No hay marcas disponibles.</p>
        <?php endif ?>
            </div>
</section>
<section id="contact">
    <h2>Contacto</h2>
    <p>Si tienes alguna pregunta, no dudes en contactarnos.</p>
    <form>
        <input placeholder="Tu Nombre" type="text" required>
        <input placeholder="Tu Correo" type="email" required>
        <textarea placeholder="Tu Mensaje" rows="5" required></textarea>
        <button type="submit">Enviar</button>
    </form>
</section>
<script src="<?= BASE_URL . '/js/index.js'; ?>"></script>
<?php
?>