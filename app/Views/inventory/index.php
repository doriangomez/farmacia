<h1 class="h3 mb-4">Control de Inventario</h1>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Stock crítico</div>
            <div class="card-body table-responsive">
                <table class="table table-sm">
                    <thead><tr><th>Código</th><th>Producto</th><th>Stock</th><th>Mínimo</th></tr></thead>
                    <tbody>
                    <?php if ($criticalStock === []): ?>
                        <tr><td colspan="4" class="text-muted text-center">Sin alertas de stock crítico.</td></tr>
                    <?php endif; ?>
                    <?php foreach ($criticalStock as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars((string) $item['codigo']); ?></td>
                            <td><?= htmlspecialchars((string) $item['nombre']); ?></td>
                            <td class="text-danger fw-bold"><?= (int) $item['stock_actual']; ?></td>
                            <td><?= (int) $item['stock_minimo']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Medicamentos próximos a vencer</div>
            <div class="card-body table-responsive">
                <table class="table table-sm">
                    <thead><tr><th>Producto</th><th>Lote</th><th>Vence</th><th>Cantidad</th></tr></thead>
                    <tbody>
                    <?php if ($expiringSoon === []): ?>
                        <tr><td colspan="4" class="text-muted text-center">Sin lotes próximos a vencer.</td></tr>
                    <?php endif; ?>
                    <?php foreach ($expiringSoon as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars((string) $item['nombre']); ?></td>
                            <td><?= htmlspecialchars((string) $item['lote_codigo']); ?></td>
                            <td class="text-warning fw-bold"><?= htmlspecialchars((string) $item['fecha_vencimiento']); ?></td>
                            <td><?= (int) $item['cantidad_disponible']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
