<?php
    $request = request();
    $session = $request->session();
?>

<div class="container mt-4">

    <h1 class="mb-4">Lista de Directores</h1>

    <?php if ($session->hasFlash('success')): ?>
        <div class="alert alert-success">
            <?= $session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Nacionalidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($directores as $director): ?>
                <tr>
                    <td><?= htmlspecialchars($director->id) ?></td>
                    <td><?= htmlspecialchars($director->nombre) ?></td>
                    <td><?= htmlspecialchars($director->nacionalidad) ?></td>
                    <td>
                        <a href="show.php?id=<?= $director->id ?>" class="btn btn-info btn-sm">Ver</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
