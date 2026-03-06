<?php
$currency = static fn (float $value): string => '$' . number_format($value, 0, ',', '.');
?>
<h1 class="h3 mb-4">Dashboard Ejecutivo</h1>

<div class="row g-3 mb-4">
    <div class="col-md-4 col-lg-2"><div class="card"><div class="card-body"><small>Ventas del día</small><div class="fw-bold"><?= $currency($metrics['ventasDia']); ?></div></div></div></div>
    <div class="col-md-4 col-lg-2"><div class="card"><div class="card-body"><small>Ventas del mes</small><div class="fw-bold"><?= $currency($metrics['ventasMes']); ?></div></div></div></div>
    <div class="col-md-4 col-lg-2"><div class="card"><div class="card-body"><small>Compras del mes</small><div class="fw-bold"><?= $currency($metrics['comprasMes']); ?></div></div></div></div>
    <div class="col-md-6 col-lg-3"><div class="card border-warning"><div class="card-body"><small>Stock crítico</small><div class="fw-bold text-warning"><?= (int) $metrics['stockCritico']; ?> productos</div></div></div></div>
    <div class="col-md-6 col-lg-3"><div class="card border-danger"><div class="card-body"><small>Próximos a vencer (60 días)</small><div class="fw-bold text-danger"><?= (int) $metrics['proximosVencer']; ?> lotes</div></div></div></div>
</div>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">Ventas últimos 7 días</div>
            <div class="card-body"><canvas id="sales7Days"></canvas></div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">Ventas por categoría</div>
            <div class="card-body"><canvas id="salesByCategory"></canvas></div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">Top medicamentos vendidos</div>
            <div class="card-body"><canvas id="topProducts"></canvas></div>
        </div>
    </div>
</div>

<script>
    const sales7Days = <?= json_encode($sales7Days, JSON_UNESCAPED_UNICODE); ?>;
    const topProducts = <?= json_encode($topProducts, JSON_UNESCAPED_UNICODE); ?>;
    const salesByCategory = <?= json_encode($salesByCategory, JSON_UNESCAPED_UNICODE); ?>;

    new Chart(document.getElementById('sales7Days'), {
        type: 'line',
        data: {
            labels: sales7Days.map(r => r.dia),
            datasets: [{ label: 'Ventas', data: sales7Days.map(r => Number(r.total)), borderColor: '#0d6efd', fill: false, tension: 0.3 }]
        }
    });

    new Chart(document.getElementById('salesByCategory'), {
        type: 'doughnut',
        data: {
            labels: salesByCategory.map(r => r.categoria),
            datasets: [{ data: salesByCategory.map(r => Number(r.total)) }]
        }
    });

    new Chart(document.getElementById('topProducts'), {
        type: 'bar',
        data: {
            labels: topProducts.map(r => r.nombre),
            datasets: [{ label: 'Unidades', data: topProducts.map(r => Number(r.unidades)), backgroundColor: '#198754' }]
        }
    });
</script>
