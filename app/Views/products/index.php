<h1 class="h3 mb-4">Gestión de Productos</h1>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Principio activo</th>
                    <th>Categoría</th>
                    <th>Precio venta</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($products === []): ?>
                    <tr><td colspan="6" class="text-center text-muted">No hay productos cargados. Ejecute los scripts demo.</td></tr>
                <?php endif; ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars((string) $product['codigo']); ?></td>
                        <td><?= htmlspecialchars((string) $product['nombre']); ?></td>
                        <td><?= htmlspecialchars((string) $product['principio_activo']); ?></td>
                        <td><?= htmlspecialchars((string) ($product['categoria'] ?? 'Sin categoría')); ?></td>
                        <td>$<?= number_format((float) $product['precio_venta'], 0, ',', '.'); ?></td>
                        <td>
                            <?= (int) $product['stock_actual']; ?>
                            <?php if ((int) $product['stock_actual'] <= (int) $product['stock_minimo']): ?>
                                <span class="badge text-bg-warning">Crítico</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
