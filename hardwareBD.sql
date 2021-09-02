CREATE DATABASE hardwareBD;

USE hardwareBD;

CREATE TABLE usuario
(
  idUsuario INT NOT NULL IDENTITY(1,1),
  usuario VARCHAR(50) NOT NULL,
  password VARBINARY(MAX) NOT NULL,
  tipo VARCHAR(30) NOT NULL,
  estado INT NOT NULL DEFAULT 1,
  PRIMARY KEY (idUsuario)
);


CREATE TABLE empleado
(
  idEmpleado INT NOT NULL IDENTITY(1,1),
  nombre VARCHAR(50) NOT NULL,
  apellidoP VARCHAR(30) NOT NULL,
  apellidoM VARCHAR(30) NOT NULL,
  direccion VARCHAR(40) NOT NULL,
  telefono VARCHAR(50) NOT NULL,
  puesto VARCHAR(50) NOT NULL,
  idUsuario INT NOT NULL,
  PRIMARY KEY (idEmpleado),
  FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario)
);

CREATE TABLE cliente
(
  idCliente INT NOT NULL IDENTITY(1,1),
  nombre VARCHAR(50) NOT NULL,
  apellidoP VARCHAR(50) NOT NULL,
  apellidoM VARCHAR(50) NOT NULL,
  direccion VARCHAR(100) NOT NULL,
  telefono VARCHAR(50) NOT NULL,
  correo VARCHAR(50) NOT NULL,
  idUsuario INT NOT NULL,
  PRIMARY KEY (idCliente),
  FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario)
);

CREATE TABLE producto
(
  idProducto INT NOT NULL IDENTITY(1,1),
  imagen VARCHAR(255) DEFAULT '../img/no-imagen.jpg',
  nombre VARCHAR(100) NOT NULL,
  marca VARCHAR(50) NOT NULL,
  descripcion VARCHAR(MAX) NOT NULL,
  precio DECIMAL(8,2) NOT NULL,
  stock INT NOT NULL,
  estado INT NOT NULL DEFAULT 1,
  categoria INT NOT NULL,
  PRIMARY KEY (idProducto)
);


CREATE TABLE venta
(
  idVenta INT NOT NULL IDENTITY(1,1),
  fechaVenta DATE NOT NULL DEFAULT GETDATE(),
  estado INT NOT NULL DEFAULT 1,
  total DECIMAL(8,2) NOT NULL,
  idCliente INT NOT NULL,
  PRIMARY KEY (idVenta),
  FOREIGN KEY (idCliente) REFERENCES cliente(idCliente)
);

CREATE TABLE producto_venta
(
  idVenta INT NOT NULL,
  idProducto INT NOT NULL,
  cantidad INT NOT NULL,
  PRIMARY KEY (idVenta, idProducto),
  FOREIGN KEY (idVenta) REFERENCES venta(idVenta),
  FOREIGN KEY (idProducto) REFERENCES producto(idProducto)
);

CREATE TABLE carrito
(
  idCliente INT NOT NULL,
  idProducto INT NOT NULL,
  cantidad INT NOT NULL,
  FOREIGN KEY (idCliente) REFERENCES cliente(idCliente),
  FOREIGN KEY (idProducto) REFERENCES producto(idProducto)
);



GO
/*V_TODOS LOS PRODUCTOS*/
CREATE VIEW v_productoTodo
AS
SELECT * FROM producto WHERE estado = 1;

GO
/*P_PRODUCTOS CATEGORIA*/
CREATE PROCEDURE p_productoCategoria
@categoria VARCHAR(50)
AS
SELECT * FROM producto WHERE estado = 1 AND categoria = @categoria;
GO
/*V_NUEVOS PRODUCTOS*/
CREATE VIEW v_nuevoProducto
AS
SELECT TOP 10 * FROM producto WHERE estado = 1 ORDER BY idProducto DESC;

GO
/*P_DETALLE PRODUCTOS*/
CREATE PROCEDURE p_productoDetalle
@idProducto INT
AS
SELECT * FROM producto WHERE idProducto = @idProducto;

GO
/*REGISTRO USUARIO*/
CREATE PROCEDURE p_registroUsuario
@usuario VARCHAR(50),
@pass VARCHAR(50),
@tipo VARCHAR(20)
AS
INSERT INTO usuario(usuario, password, tipo) VALUES (@usuario, ENCRYPTBYPASSPHRASE('secreto', @pass), @tipo);

GO
/*REGISTRO CLIENTE*/
CREATE PROCEDURE p_registroCliente
@nombre VARCHAR(50),
@apellidoP VARCHAR(80),
@apellidoM VARCHAR(80),
@direccion VARCHAR(120),
@telefono VARCHAR(50),
@correo VARCHAR(50),
@idUsuario INT
AS
INSERT INTO cliente (nombre, apellidoP, apellidoM, direccion, telefono, correo, idUsuario) VALUES (@nombre, @apellidoP, @apellidoM, @direccion, @telefono, @correo, @idUsuario)

GO
/*P_ REGISTRO EMPLEADO*/
CREATE PROCEDURE p_registroEmpleado
@nombre VARCHAR(50),
@apellidoP VARCHAR(80),
@apellidoM VARCHAR(80),
@direccion VARCHAR(120),
@telefono VARCHAR(50),
@puesto VARCHAR(50),
@idUsuario INT
AS
INSERT INTO empleado(nombre, apellidoP, apellidoM, direccion, telefono,puesto, idUsuario) VALUES(@nombre, @apellidoP, @apellidoM, @direccion, @telefono, @puesto, @idUsuario)

GO
/*VALIDAR USUARIO CLIENTE*/
CREATE PROCEDURE p_validarUsuarioCliente
@usuario VARCHAR(50),
@pass VARCHAR(50)
AS
SELECT u.idUsuario ,u.usuario, CONVERT(VARCHAR(MAX), DECRYPTBYPASSPHRASE('secreto', u.password)) 'password', u.tipo, u.estado, c.* FROM usuario u JOIN cliente c ON u.idUsuario = c.idUsuario WHERE u.usuario = @usuario AND CONVERT(VARCHAR(MAX), DECRYPTBYPASSPHRASE('secreto', u.password)) = @pass;

GO
/*P_REALIZAR VENTA*/
CREATE PROCEDURE p_realizarVenta
@total DECIMAL(8,2),
@idCliente INT
AS
INSERT INTO venta(total, idCliente) VALUES(@total, @idCliente);

GO
/*P_GUARDA DETALLE VENTA*/
CREATE PROCEDURE p_guardarDetalleVenta
@idVenta INT,
@idProducto INT,
@cantidad INT
AS
INSERT INTO producto_venta VALUES(@idVenta, @idProducto, @cantidad);

GO
/*TR_ACTUALIZA STOCK*/
CREATE TRIGGER t_actualizaStock
ON producto_venta
FOR INSERT
AS
DECLARE @idProducto INT
DECLARE @cantidad INT
SELECT @idProducto = idProducto FROM INSERTED
SELECT @cantidad = cantidad FROM INSERTED
UPDATE producto SET stock = stock - @cantidad WHERE idProducto = @idProducto

GO
/*P_VER DETALLE DE VENTA*/
CREATE PROCEDURE p_detalleVenta
@idVenta INT
AS
SELECT p.*, pv.*, v.* FROM producto p JOIN producto_venta pv ON p.idProducto = pv.idProducto JOIN venta v ON v.idVenta = pv.idVenta  WHERE pv.idVenta = @idVenta;


GO
/*P_ CONSULTA VENTAS*/
CREATE PROCEDURE p_consultaPedidosCliente
@idCliente INT
AS
SELECT * FROM venta WHERE idCliente = @idCliente ORDER BY idVenta DESC;

SET ansi_warnings OFF


INSERT INTO producto (imagen, nombre, marca, descripcion, precio, stock, estado, categoria) VALUES 
('../img/redes1.jpg', 'Switch 16 puertos TP-Link 10','Tp-Link', 'Switch 16 puertos TP-Link 10/100 / TL-SF1016D', '539.00', '40', '1', '1');
INSERT INTO producto (imagen, nombre, marca, descripcion, precio, stock, estado, categoria) VALUES 
('../img/redes2.jpg', 'Router Inalambrico Asus RT-AC1200 v2','Asus', 'Router Inalambrico Asus RT-AC1200 v2 / Cuadruple antena / Doble banda', '1259.00', '5', '1', '1');
INSERT INTO producto (imagen, nombre, marca, descripcion, precio, stock, estado, categoria) VALUES 
('../img/seguridad1.jpg', 'Hikvision Cámara IP Domo IR','Hikvision', 'DS-2CD1131-I, Alámbrico, 2304 x 1296 Pixeles', '1319.00', '80', '1', '4');
/*------------------ MAS INSERT'S --------------------------*/
/*CAT1*/
INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/redes3.jpg','Switch Cisco SG250-08HP', 'Cisco', 'Cisco SG250-08HP 8-Port Gigabit PoE Smart Switch', 5465, 12, 1,1);

INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/redes4.jpg','Bobina cable UTP Categoría 5E Enson', 'Enson', 'Bobina cable UTP Categoría 5E Enson 100 metros color negro 12251B100', 280, 25, 1,1);

INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/redes5.jpg','Extensor de rango TP-LINK N300 300Mbps', 'Tp-link', 'Velocidad inalámbrica de 300 Mbps. 1

Estándares inalámbricos IEEE 802.11n/g/b. 2

Seguridad inalámbrica WPA-PSK / WPA2-PSK', 439, 38, 1,1);

INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/redes6.jpg','TP-Link Archer C6 Banda Dual MU-MIMO', 'Tp-link', ' Gigabit WiFi Router Router Inalámbrico AC1200 ,2.4GHz a 300Mbps y 5GHz a 867Mbps', 987, 40, 1,1);

INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/redes7.png','ROUTER CISCO GIGABIT ETHERNET CON FIREWALL RV345 16X RJ-45 3G/4G', 'Cisco', ' Estándares de red IEEE 802.1x
Tipo de interfaz ethernet	Gigabit Ethernet
Tecnología de cableado	10/100/1000Base-T(X)
Memoria Flash	256 MB
Memoria interna	1024 MB
Certificación	FCC Class A, CE Class B, UL, cUL, CB, CCC, BSMI, KC, Anatel', 987, 40, 1,1);

INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/redes8.jpg','Cisco RV260W Wireless-AC VPN Router', 'Cisco', '
Conexiones	Wi-Fi Built In, Ethernet
Sistema operativo	Cisco IOS
Tipo de conexión inalámbrica	802.11ac
Cantidad de puertos	8', 6178, 9, 1,1);

INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/redes9.jpg','TP-LINK TL-PA4010KIT AV600 Nano Powerline Adapter 600Mbps', 'Tp-link', ' Gigabit WiFi Router Router Inalámbrico AC1200 ,2.4GHz a 300Mbps y 5GHz a 867Mbps', 987, 40, 1,1);


/*CAT2*/
INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/hw1.jpg','Disco duro para servidor', 'HP', 'Disco duro para servidor HP Enterprise de 1.2TB 2.5 10,000RPM SAS HP', 6699, 200, 1,2);

INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/hw2.jpg','Fuente de Poder EVGA 0600-K1 80 PLUS Bronze, 24-pin ATX, 120mm, 600W', 'EVGA', 'Potencia nominal: 600 W
Diámetro de ventilador: 12 cm
Factor de forma: ATX
Alimentador de energía: 24-pin ATX
Número de conectores SATA: 6
Certificación 80 PLUS: 80 PLUS Bronze', 1949, 50, 1,2);

INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/hw3.jpg','MEMORIA RAM DDR4 ADATA 8GB PREMIER SERIES 2400MHZ 1.2V C17', 'ADATA', 'Latencia:
CAS 17
Voltaje de Operación:
1.2V
Tipo:
Single Channel
Capacidad:
8Gb
Velocidad de Memoria:
2400 MHz', 849, 104, 1,2);
INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/hw1.jpg','MOTHERBOARD GIGABYTE PRIME SOCKET 1151 MICRO ATX B365 USB 3.1 DDR4', 'GIGABYTE','MOTHER (1151) GIGABYTE B365M DS3H', 2056, 57, 1,2);

/*CAT3*/
INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/pc1.jpg','Laptop Lenovo Ideapad 3', 'Lenovo', 'Laptop Lenovo Ideapad 3 Intel Core i3 Gen 10th 8GB RAM 256GB SSD', 12999, 20,1, 3);

INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/pc2.jpg','Asus- Laptop ROG STRIX G531GT-BQ095T de 15.6"', 'ASUS', '
Capacidad de Almacenamiento Total	1256 GB
Capacidad disco duro	1000 GB
Memoria Ram	8 GB
Tarjeta Gráfica	NVIDIA GeForce GTX 1650
Procesador	Intel 9th Generation Core i5 2.4GHz
Windows 10 Home
Sincronización	SmartThings
Duración de la bateria	6 horas', 23399, 10,1, 3);


INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/pc3.jpg','MacBook Air de 13 pulgadas', 'APPLE', '
Chip M1 de Apple con CPU de 8 núcleos,
Memoria unificada de 8 GB,
SSD de 512 GB,
Touch ID,
Dos puertos Thunderbolt/USB 4', 22999, 5,1, 3);


INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/pc4.jpg','Computadora Compaq CQ1110LA - E-450 - 2GB - 500GB - Win 7 Starter', 'COMPAQ', 'Sistema operativo
Windows® 7 Starter 32
Memoria (RAM) 2GB
Tamaño de pantalla
Monitor LCD widescreen Compaq S1922a de 18,5"', 2458, 4,1, 3);

INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/pc5.jpg','Dell Gaming G3 15 3500 Intel Core I5 8Gb 256Gb Negro', 'Dell', '
Capacidad de Almacenamiento Total	1256 GB
Capacidad disco duro	1000 GB
Memoria Ram	8 GB
Tarjeta Gráfica	NVIDIA GeForce GTX 1650
Procesador	Intel 10th Generation Core i5 4.5GHz
Windows 10 Home
', 30599, 17,1,3);


INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/pc6.jpg','All in One HP 21-b0015la', 'HP', 'Procesador Intel® Core™ i3 de 10.ª generación
Windows 10 Home 64
4 GB de SDRAM DDR4-3200 (1 x 4 GB)
Disco duro SATA de 1 TB y 7200 rpm
Gráficos Intel® UHD
4,1 kg
20.7" diagonal, FHD (1920 x 1080), anti-glare, 200 nits, 72% NTSC', 14499, 35,1, 3);

/*CAT4*/
INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/seguridad2.jpg','DVR DAHUA XVR5216AX', 'Dahua', 'DVR DAHUA XVR5216AX 16 CANALES HDCVI 1080P/4MP/720P/IP 16+8', 3167, 14, 1,4);

INSERT INTO producto(imagen, nombre, marca, descripcion, precio, stock, estado,categoria) VALUES('../img/seguridad3.jpg','Dahua Cámara Smart WiFi Domo IR para Interiores IPC-A35', 'Dahua', 'Dahua Europe IPC-A35. Tipo: Cámara de seguridad IP, Colocación soportada: Interior, Tecnología de conectividad: Inalámbrico y alámbrico. Factor de forma: Almohadilla.', 1659, 10, 1,4);
