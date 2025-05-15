<div class="container mt-5">
    <h2>Detalles del Director</h2>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?= htmlspecialchars($director->nombre) ?></h4>
            <p class="card-text"><strong>Nacionalidad:</strong> <?= htmlspecialchars($director->nacionalidad) ?></p>
            <table class="table"><tbody>
                <?php foreach ($director->peliculas() as $pelicula): ?>
                    <tr>
                        <td><?= htmlspecialchars($pelicula->titulo) ?></td>
                        <td><a href="<?= BASE_URL ?>/peliculas/show.php?id=<?= $pelicula->id ?>" class="btn btn-info btn-sm">Ver</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody></table>
        </div>
    </div>
    <div class="mt-3">
        <a href="index.php" class="btn btn-secondary">Volver</a>
    </div>
</div>

