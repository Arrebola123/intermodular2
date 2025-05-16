<?php

use App\Core\Session;

$session = new Session();
$old = $session->getFlash('old', []);
$errors = $session->getFlash('errors', []);
?>

<div class="container mt-4">
    <h2>Iniciar Sesión</h2>

    <!-- Mostrar errores validación -->
    <?php if (!empty($errors) && is_array($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Mostrar fallo autenticación -->
    <?php if (session()->hasFlash('message')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlash('message'); ?>
        </div>
    <?php endif; ?>

    <!-- Formulario de Login -->
    <form action="login.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                id="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>">
            <?php if (isset($errors['email'])): ?>
                <div class="invalid-feedback"><?= htmlspecialchars($errors['email']) ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                id="password" name="password">
            <?php if (isset($errors['password'])): ?>
                <div class="invalid-feedback"><?= htmlspecialchars($errors['password']) ?></div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Entrar</button>
        <a href="<?= previousUrl() ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
