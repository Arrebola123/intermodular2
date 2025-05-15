<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Variable: $title -->
    <title> <?= $title ?? 'Vota Películas' ?> </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php if (request()->routeIs('/index.php')): ?>
        <link rel="stylesheet" href="<?= BASE_URL . '/css/index.css'; ?>">
    <?php elseif (request()->routeIs('/about.php')): ?>
        <link rel="stylesheet" href="<?= BASE_URL . '/css/about.css'; ?>">
    <?php elseif (request()->routeIs('/productos/index.php')): ?>
        <link rel="stylesheet" href="<?= BASE_URL . '/css/productos.css'; ?>">
    <?php elseif (request()->routeIs('/showMarca.php')): ?>
        <link rel="stylesheet" href="<?= BASE_URL . '/css/productos.css'; ?>">
    <?php elseif (request()->routeIs('/productos/show.php')): ?>
        <link rel="stylesheet" href="<?= BASE_URL . '/css/productos_show.css'; ?>">
    <?php endif; ?>
</head>

<body>

    <?php require __DIR__ . '/partials/header.php'; ?>

    <main class="flex-grow-1 mt-2 mb-2">
        <!-- Variable: $content -->
        <?= $content ?>
    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>

</body>

</html>