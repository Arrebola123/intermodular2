 <div class="menu">
        <div class="logo"><img src=<?= BASE_URL . '/logos/logo.png'; ?> onclick="window.location.href= '<?= BASE_URL . '/index.php'; ?>'" alt=""></div>
        <nav>
    <ul class="menu">
        <div class="search-container">
            <button id="search-icon" class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
            </button>
            <input class="search" type="text" id="search" name="search" placeholder="Buscar productos o marcas">
            <div id="search-results"></div>
        </div>
          
        <li><a href="<?= BASE_URL . '/productos/index.php'; ?>">Productos</a></li>
        <li><a href="<?= BASE_URL . '/index.php#contact' ?>">Contacto</a></li>
        <li><a href="about.php">Sobre Nosotros</a></li>

        <?php if (isset($_SESSION['usuario_id'])): ?>
            <!-- Si el usuario está logueado, mostramos el perfil o el panel de control según el rol -->
            <?php if ($es_administrador == 1): ?>
                <li><a href="panel_control.html">Panel de Control</a></li>
            <?php else: ?>
                <li><a href="perfil.php"><?php echo $_SESSION['usuario_nombre']; ?> - Perfil</a></li>
            <?php endif; ?>
            <li><a href="Login_intermodular/cerrar_sesion.php">Cerrar sesión</a></li>
            <?php if ($es_administrador == 0): ?>
            <div class="carrito">
            <button class="icon" onclick="window.location.href= 'carrito.php'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="icon" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M6.854 8.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293z"/>
                </svg>
            </button>
        </div>
        <?php endif; ?>
        <?php else: ?>
            <!-- Si no está logueado, mostramos el botón de iniciar sesión -->
            <li><a href="Login_intermodular/formulario_iniciarSesion.html">Iniciar sesión</a></li>
        <?php endif; ?>

       
    </ul>
</nav>
    </div>
    <script src="<?= BASE_URL . '/js/buscador.js' ?>"></script>

