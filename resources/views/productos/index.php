<section id="productos">
    <div class="productos-grid">
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
                <div class="name-flex">
                    <div class="product" onclick="window.location.href='show.php?id=<?= $producto->id; ?>'">
                        <?php if (!empty($producto->imagen1)): ?>
                            <img class="imgs_relojes" src="<?= htmlspecialchars('../' . $producto->imagen1); ?>" alt="Imagen del producto">
                        <?php else: ?>
                            <div class="sin-imagen">Sin imagen</div>
                        <?php endif; ?>
                    </div>
                    <div class="product_info">
                        <div>
                            <h3><?= htmlspecialchars($producto->marca->nombre); ?></h3>
                            <p><?= htmlspecialchars($producto->nombre); ?></p>
                        </div>
                        <div>
                            <h3 class="precio"><?= number_format($producto->precio, 2, ',', '.'); ?> €</h3>  
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos disponibles.</p>
        <?php endif; ?>
    </div>
</section>