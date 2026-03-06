<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP Farmacia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/">ERP Farmacia</a>
        <div class="navbar-nav">
            <a class="nav-link" href="/">Dashboard</a>
            <a class="nav-link" href="/productos">Productos</a>
            <a class="nav-link" href="/inventario">Inventario</a>
        </div>
    </div>
</nav>
<main class="container py-4">
    <?php require $viewPath; ?>
</main>
</body>
</html>
