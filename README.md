# ERP Farmacia (Base MVC PHP 8)

Implementación base de un ERP para farmacia con arquitectura MVC, base de datos relacional y dashboard analítico.

## Stack

- PHP 8.x
- MySQL / MariaDB
- HTML5 + CSS + JavaScript
- Bootstrap 5
- Chart.js

## Estructura

- `public/`: punto de entrada web
- `app/Core/`: enrutador, controlador base, vista y DB
- `app/Controllers/`: controladores por módulo
- `app/Models/`: acceso a datos
- `app/Views/`: vistas y layout principal
- `database/`: esquema y datos demo

## Puesta en marcha rápida

1. Crear base de datos (ejemplo: `farmacia_erp`).
2. Ejecutar scripts SQL:
   - `database/schema.sql`
   - `database/seed_demo.sql`
3. Configurar credenciales en `config/database.php`.
4. Levantar servidor local:

```bash
php -S localhost:8000 -t public
```

5. Abrir:

- Dashboard: `http://localhost:8000/`
- Productos: `http://localhost:8000/productos`
- Inventario: `http://localhost:8000/inventario`

## Módulos base implementados

- Dashboard ejecutivo con KPIs y gráficos.
- Gestión de productos (listado con datos demo).
- Control de inventario (stock crítico y próximos a vencer).
- Modelo de datos para ventas, compras, clientes, proveedores, usuarios y alertas.

## Seguridad mínima incluida

- Conexión PDO con consultas preparadas.
- Manejo centralizado de errores de DB.
- Estructura lista para extender autenticación por roles.
