USE farmacia_erp;

INSERT INTO roles (nombre) VALUES
('Administrador'), ('Cajero'), ('Inventario'), ('Supervisor');

INSERT INTO usuarios (rol_id, nombre, email, password_hash) VALUES
(1, 'Admin Principal', 'admin@farmacia.local', SHA2('admin123', 256)),
(2, 'Cajero Demo', 'cajero@farmacia.local', SHA2('cajero123', 256));

INSERT INTO categorias (nombre) VALUES
('Analgésicos'), ('Antibióticos'), ('Gastrointestinal'), ('Alergias');

INSERT INTO productos (categoria_id, codigo, nombre, principio_activo, laboratorio, precio_compra, precio_venta, stock_actual, stock_minimo) VALUES
(1, 'MED-0001', 'Acetaminofén 500mg', 'Acetaminofén', 'Lab Salud', 800, 1200, 80, 20),
(1, 'MED-0002', 'Ibuprofeno 400mg', 'Ibuprofeno', 'Lab Andino', 1100, 1800, 50, 20),
(2, 'MED-0003', 'Amoxicilina 500mg', 'Amoxicilina', 'Pharma Plus', 2100, 3500, 22, 15),
(3, 'MED-0004', 'Omeprazol 20mg', 'Omeprazol', 'GastroMed', 1300, 2200, 12, 15),
(4, 'MED-0005', 'Loratadina 10mg', 'Loratadina', 'BioCare', 900, 1500, 30, 10);

INSERT INTO lotes (producto_id, lote_codigo, fecha_vencimiento, cantidad_disponible) VALUES
(1, 'L-ACE-2501', DATE_ADD(CURDATE(), INTERVAL 180 DAY), 80),
(2, 'L-IBU-2501', DATE_ADD(CURDATE(), INTERVAL 50 DAY), 50),
(3, 'L-AMO-2501', DATE_ADD(CURDATE(), INTERVAL 90 DAY), 22),
(4, 'L-OME-2501', DATE_ADD(CURDATE(), INTERVAL 25 DAY), 12),
(5, 'L-LOR-2501', DATE_ADD(CURDATE(), INTERVAL 200 DAY), 30);

INSERT INTO clientes (nombre, documento, telefono, correo, direccion) VALUES
('Juan Pérez', '1001001', '3001112233', 'juan@example.com', 'Calle 1 #10-20'),
('Laura Gómez', '1001002', '3001112244', 'laura@example.com', 'Calle 2 #20-30');

INSERT INTO proveedores (nombre, contacto, telefono, correo, ciudad, condiciones_pago) VALUES
('Distribuidora Andina', 'Carlos Ruiz', '3100000001', 'compras@andina.com', 'Bogotá', '30 días'),
('Laboratorios Salud Total', 'Ana Torres', '3100000002', 'ventas@saludtotal.com', 'Medellín', 'Contado');

INSERT INTO compras (proveedor_id, usuario_id, fecha_compra, total) VALUES
(1, 1, DATE_SUB(NOW(), INTERVAL 20 DAY), 6200000),
(2, 1, DATE_SUB(NOW(), INTERVAL 5 DAY), 5800000);

INSERT INTO detalle_compras (compra_id, producto_id, cantidad, costo_unitario, subtotal) VALUES
(1, 1, 200, 800, 160000),
(1, 2, 150, 1100, 165000),
(2, 3, 100, 2100, 210000),
(2, 4, 80, 1300, 104000);

INSERT INTO ventas (cliente_id, usuario_id, fecha_venta, subtotal, descuento, impuesto, total) VALUES
(1, 2, DATE_SUB(NOW(), INTERVAL 6 DAY), 1100000, 0, 100000, 1200000),
(2, 2, DATE_SUB(NOW(), INTERVAL 5 DAY), 1300000, 0, 150000, 1450000),
(1, 2, DATE_SUB(NOW(), INTERVAL 4 DAY), 900000, 0, 80000, 980000),
(2, 2, DATE_SUB(NOW(), INTERVAL 3 DAY), 1500000, 0, 120000, 1620000),
(1, 2, DATE_SUB(NOW(), INTERVAL 2 DAY), 1900000, 0, 150000, 2050000),
(2, 2, DATE_SUB(NOW(), INTERVAL 1 DAY), 2600000, 0, 200000, 2800000),
(1, 2, NOW(), 1000000, 0, 100000, 1100000);

INSERT INTO detalle_ventas (venta_id, producto_id, cantidad, precio_unitario, subtotal) VALUES
(1, 1, 20, 1200, 24000),
(2, 2, 18, 1800, 32400),
(3, 3, 10, 3500, 35000),
(4, 4, 12, 2200, 26400),
(5, 1, 25, 1200, 30000),
(6, 5, 20, 1500, 30000),
(7, 1, 22, 1200, 26400);

INSERT INTO alertas_vencimiento (lote_id, nivel, mensaje) VALUES
(2, 'urgente', 'Lote de Ibuprofeno vence en menos de 60 días'),
(4, 'urgente', 'Lote de Omeprazol vence en menos de 30 días');
