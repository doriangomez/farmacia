# Alcance del Sistema ERP para Farmacia

## 1. Objetivo General

Desarrollar un ERP web especializado para farmacias que centralice la operación comercial, logística y administrativa en un solo sistema. El objetivo es controlar de forma integral:

- Ventas
- Inventario
- Compras
- Proveedores
- Clientes
- Control de medicamentos (lotes y vencimientos)
- Facturación
- Reportes operativos
- Analítica financiera

El sistema debe incluir un **dashboard ejecutivo** con indicadores clave y gráficos dinámicos sobre datos reales o simulados.

---

## 2. Alcance Funcional

### 2.1 Dashboard Ejecutivo (Analytics)

Pantalla principal con KPIs y visualizaciones de alto impacto para toma de decisiones.

**Indicadores principales:**

- Ventas del día
- Ventas del mes
- Medicamentos más vendidos
- Productos próximos a vencer
- Rotación de inventario
- Margen de utilidad
- Compras del mes
- Stock crítico

**Gráficos incluidos:**

- Ventas por día (línea)
- Ventas por categoría (dona)
- Top medicamentos vendidos (barras)
- Evolución mensual de ventas (área)
- Inventario por categoría (barras horizontales)
- Medicamentos próximos a vencer (alertas visuales)

**Datos demo recomendados:**

- Ventas últimos 7 días (tabla diaria)
- Top 5 medicamentos por unidades vendidas

---

### 2.2 Gestión de Productos

Módulo para administrar medicamentos y productos farmacéuticos.

**Funcionalidades:**

- Crear, editar y eliminar productos
- Categorización
- Asociación de código de barras
- Gestión por lotes
- Control de fecha de vencimiento
- Control de inventario mínimo y máximo

**Campos principales:**

- Código
- Nombre comercial
- Principio activo
- Laboratorio
- Categoría
- Precio de compra
- Precio de venta
- Stock mínimo
- Fecha de vencimiento
- Lote

---

### 2.3 Control de Inventario

Gestión completa de movimientos y estado del inventario.

**Funcionalidades:**

- Entradas de inventario
- Salidas de inventario
- Ajustes manuales
- Histórico de movimientos
- Inventario físico
- Alertas de stock bajo
- Alertas por vencimiento

**Reportes:**

- Inventario actual
- Productos sin rotación
- Inventario por laboratorio
- Inventario valorizado

---

### 2.4 Módulo de Ventas (POS Farmacia)

Punto de venta orientado a mostrador con flujo rápido.

**Funcionalidades:**

- Búsqueda por nombre
- Búsqueda por código de barras
- Venta rápida
- Cálculo automático de subtotal, impuestos y total
- Aplicación de descuentos
- Impresión / generación de factura
- Registro o selección de cliente

**Flujo de venta:**

1. Selección de producto
2. Ingreso de cantidad
3. Cálculo automático
4. Registro de pago
5. Generación de factura

---

### 2.5 Gestión de Clientes

**Campos:**

- Nombre
- Documento
- Teléfono
- Correo
- Dirección

**Funcionalidades:**

- Historial de compras
- Frecuencia de compra
- Ticket promedio
- Segmentación de clientes

---

### 2.6 Gestión de Proveedores

**Campos:**

- Nombre proveedor
- Contacto
- Teléfono
- Correo
- Ciudad
- Condiciones de pago

**Funcionalidades:**

- Historial de compras
- Ranking de proveedores
- Productos asociados

---

### 2.7 Compras y Abastecimiento

**Flujo operacional:**

1. Creación de orden de compra
2. Recepción de mercancía
3. Ingreso al inventario
4. Actualización de stock y costos

**Reportes:**

- Compras por mes
- Compras por proveedor
- Compras por categoría

---

### 2.8 Control de Medicamentos con Vencimiento

Módulo crítico para cumplimiento sanitario y reducción de pérdidas.

**Funciones:**

- Alertas automáticas de vencimiento
- Listado de medicamentos próximos a vencer
- Identificación de lotes afectados
- Reporte de productos vencidos

---

### 2.9 Reportes Gerenciales

**Ventas:**

- Ventas por día
- Ventas por mes
- Ventas por producto
- Ventas por categoría

**Inventario:**

- Rotación
- Stock crítico
- Inventario valorizado

**Financieros:**

- Margen por producto
- Utilidad mensual
- Ticket promedio

---

### 2.10 Gestión de Usuarios y Seguridad

**Roles base:**

- Administrador
- Cajero
- Inventario
- Supervisor

**Funciones de seguridad:**

- Alta/baja/edición de usuarios
- Asignación de permisos por rol
- Auditoría de acciones
- Control de sesiones
- Hashing de contraseñas
- Protección ante SQL Injection

---

## 3. Alcance Técnico

### 3.1 Stack tecnológico

- **Backend:** PHP 8.x
- **Arquitectura:** MVC modular
- **Base de datos:** MySQL / MariaDB (relacional)
- **Frontend:** HTML5 + CSS + JavaScript + Bootstrap
- **Visualización:** Chart.js o ApexCharts

### 3.2 Requisitos no funcionales

- Rendimiento adecuado para operación diaria en mostrador
- Integridad transaccional en ventas, compras e inventario
- Trazabilidad de cambios en módulos críticos
- Diseño responsive para escritorio y tablet
- Escalabilidad por módulos

---

## 4. Modelo de Datos (Simplificado)

**Tablas principales:**

- usuarios
- roles
- clientes
- proveedores
- categorias
- productos
- lotes
- inventario
- movimientos_inventario
- ventas
- detalle_ventas
- compras
- detalle_compras
- alertas_vencimiento

Relaciones esperadas:

- `usuarios` pertenece a `roles`
- `productos` pertenece a `categorias`
- `lotes` pertenece a `productos`
- `inventario` referencia `productos` y/o `lotes`
- `detalle_ventas` referencia `ventas` y `productos`
- `detalle_compras` referencia `compras` y `productos`

---

## 5. Datos Iniciales (Demo)

Para asegurar una demostración completa desde el primer despliegue:

- 200 medicamentos precargados
- 100 clientes demo
- 10 proveedores
- 6 meses de ventas simuladas

**Ejemplos de productos demo:**

- Acetaminofén 500mg – 1.200
- Ibuprofeno 400mg – 1.800
- Amoxicilina – 3.500
- Omeprazol – 2.200

---

## 6. Entregables Esperados

1. ERP web funcional bajo arquitectura MVC
2. Base de datos relacional con script de creación
3. Módulos operativos descritos en este alcance
4. Dashboard analítico con KPIs y gráficos dinámicos
5. Datos demo precargados para pruebas y presentación
6. Reportes operativos y gerenciales exportables

---

## 7. Fuera de Alcance (Inicial)

Para la primera versión, no se considera obligatorio:

- Integración con e-commerce
- Integración con sistemas contables externos
- App móvil nativa
- Firma electrónica avanzada

Estos puntos pueden abordarse como fase 2.
