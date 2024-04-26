create table sucato.categoria (
id_categoria INT NOT NULL AUTO_INCREMENT,
descripcion VARCHAR(30) NOT NULL,
activo boolean,
PRIMARY KEY (id_categoria));


create table sucato.producto (
id_producto INT NOT NULL AUTO_INCREMENT,
id_categoria INT NOT NULL,
nombre VARCHAR(30) NOT NULL,
descripcion VARCHAR(250),
peso int,
precio double,
existencias int,
ruta_imagen varchar(1024),
activo boolean,
PRIMARY KEY (id_producto),
foreign key fk_producto_caregoria (id_categoria)
references categoria(id_categoria));


create table sucato.usuario (
id_usuario INT NOT NULL AUTO_INCREMENT,
username varchar(20) NOT NULL,
password varchar(512) NOT NULL,
nombre VARCHAR(20) NOT NULL,
primer_apellido VARCHAR(30) NOT NULL,
segundo_apellido VARCHAR(30) NOT NULL,
correo VARCHAR(25) NULL,
telefono VARCHAR(15) NULL,
activo boolean,
PRIMARY KEY (`id_usuario`));


create table sucato.rol (
id_rol INT NOT NULL AUTO_INCREMENT,
tipoRol varchar(20),
id_usuario int,
PRIMARY KEY (id_rol),
foreign key fk_rol_usuario (id_usuario) references
usuario(id_usuario));


create table sucato.factura (
id_factura INT NOT NULL AUTO_INCREMENT,
id_usuario INT NOT NULL,
fecha date,
total double,
PRIMARY KEY (id_factura),
foreign key fk_factura_usuario (id_usuario) references
usuario(id_usuario)); 


create table sucato.venta (
id_venta INT NOT NULL AUTO_INCREMENT,
id_factura INT NOT NULL,
id_producto INT NOT NULL,
precio double,
cantidad int,
PRIMARY KEY (id_venta),
foreign key fk_ventas_factura (id_factura) references
factura(id_factura),
foreign key fk_ventas_producto (id_producto)
references producto(id_producto));



INSERT INTO sucato.categoria (descripcion, activo) 
VALUES ('Frutas deshidratadas', true ), ('Vegetales deshidratados', true );


INSERT INTO sucato.producto (id_categoria, nombre, descripcion, peso, precio, existencias, ruta_imagen, activo) 
VALUES 
(1, 'Rodajas de piña', 'Sin azúcares añadidos', 150, 1200, 20, 'piña-empacada.jpg', true), 
(1, 'Mango deshidratado', 'Gluten free', 100, 1350, 20, 'mango.jpg', true),
(1, 'Mix tropical de frutas', 'Piña, Banano, Papaya, Mango, Coco', 150, 1950, 20, 'Tropical-mixto.jpg', true),
(1, 'Meriendas Saludables', '6 packs', 300, 2500, 20, 'meriendasaludable1.jpg', true),
(1, 'Chocolate Banano', 'Bolitas de chocolate rellenas de banano deshidratado', 130, 2350, 12, 'Chocolate-banano.jpg', true), 
(1, 'Mix tropical de frutas', 'Gluten free', 80, 3500, 18, 'mix-frutas.jpg', true),
(1, 'Meriendas saludables', '6 packs', 300, 2450, 10, 'meriendasaludable2.jpg', true);


INSERT INTO ROL (tipoRol, id_usuario) 
VALUES ('Admin', 1);