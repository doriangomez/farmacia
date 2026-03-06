CREATE DATABASE IF NOT EXISTS farmacia_erp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE farmacia_erp;

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rol_id INT NOT NULL,
    nombre VARCHAR(120) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    activo TINYINT(1) NOT NULL DEFAULT 1,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (rol_id) REFERENCES roles(id)
);

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(120) NOT NULL,
    documento VARCHAR(30) NOT NULL UNIQUE,
    telefono VARCHAR(30),
    correo VARCHAR(150),
    direccion VARCHAR(200)
);

CREATE TABLE proveedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(120) NOT NULL,
    contacto VARCHAR(120),
    telefono VARCHAR(30),
    correo VARCHAR(150),
    ciudad VARCHAR(80),
    condiciones_pago VARCHAR(120)
);

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoria_id INT,
    codigo VARCHAR(50) NOT NULL UNIQUE,
    nombre VARCHAR(140) NOT NULL,
    principio_activo VARCHAR(140),
    laboratorio VARCHAR(120),
    precio_compra DECIMAL(12,2) NOT NULL DEFAULT 0,
    precio_venta DECIMAL(12,2) NOT NULL DEFAULT 0,
    stock_actual INT NOT NULL DEFAULT 0,
    stock_minimo INT NOT NULL DEFAULT 0,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);

CREATE TABLE lotes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT NOT NULL,
    lote_codigo VARCHAR(60) NOT NULL,
    fecha_vencimiento DATE NOT NULL,
    cantidad_disponible INT NOT NULL,
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

CREATE TABLE inventario_movimientos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT NOT NULL,
    tipo ENUM('entrada','salida','ajuste') NOT NULL,
    cantidad INT NOT NULL,
    referencia VARCHAR(80),
    fecha_movimiento DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

CREATE TABLE ventas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT,
    usuario_id INT,
    fecha_venta DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    subtotal DECIMAL(12,2) NOT NULL,
    descuento DECIMAL(12,2) NOT NULL DEFAULT 0,
    impuesto DECIMAL(12,2) NOT NULL DEFAULT 0,
    total DECIMAL(12,2) NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE detalle_ventas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    venta_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(12,2) NOT NULL,
    subtotal DECIMAL(12,2) NOT NULL,
    FOREIGN KEY (venta_id) REFERENCES ventas(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

CREATE TABLE compras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    proveedor_id INT NOT NULL,
    usuario_id INT,
    fecha_compra DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(12,2) NOT NULL,
    FOREIGN KEY (proveedor_id) REFERENCES proveedores(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE detalle_compras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    compra_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    costo_unitario DECIMAL(12,2) NOT NULL,
    subtotal DECIMAL(12,2) NOT NULL,
    FOREIGN KEY (compra_id) REFERENCES compras(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

CREATE TABLE alertas_vencimiento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lote_id INT NOT NULL,
    nivel ENUM('informativa','urgente','vencido') NOT NULL,
    mensaje VARCHAR(255) NOT NULL,
    creada_en DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (lote_id) REFERENCES lotes(id)
);
