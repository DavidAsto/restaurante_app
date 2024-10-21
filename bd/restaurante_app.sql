-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2024 a las 06:07:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tfinal`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_borrar_bebida` (IN `beb_id` INT)   BEGIN
    DELETE FROM bebida WHERE bebida_id = beb_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_borrar_categoria` (IN `cod_cat` INT)   BEGIN
    DELETE FROM categoria WHERE categoria_id = cod_cat;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_borrar_cliente` (IN `cod_cli` INT)   begin
	DELETE FROM cliente where cliente_id= cod_cli;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_borrar_comida` (IN `com_id` INT)   begin
	DELETE FROM comida where comida_id = com_id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_bebida` (IN `beb_id` INT, IN `beb_nom` VARCHAR(50), IN `beb_stock` INT, IN `beb_precio` DECIMAL(10,2), IN `beb_categoria_id` INT)   BEGIN
    UPDATE bebida
    SET 
        bebida_desc = beb_nom,
        bebida_stock = beb_stock,
        bebida_precio = beb_precio,
        bebida_categoria_id = beb_categoria_id
    WHERE bebida_id = beb_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_categoria` (IN `cat_id` INT, IN `cat_nombre` VARCHAR(50))   BEGIN
    UPDATE categoria
    SET 
        categoria_nombre = cat_nombre
    WHERE categoria_id = cat_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_cliente` (IN `cli_id` INT, IN `cli_nom` VARCHAR(50), IN `cli_dni` VARCHAR(8), IN `cli_cel` VARCHAR(9), IN `cli_correo` VARCHAR(50))   BEGIN
    UPDATE cliente
    SET cliente_nombre = cli_nom, cliente_dni = cli_dni, cliente_celular = cli_cel, cliente_correo = cli_correo
    WHERE cliente_id = cli_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_comida` (IN `com_id` INT, IN `com_nom` VARCHAR(50), IN `com_dis` VARCHAR(2), IN `com_pre` DECIMAL(10,2))   BEGIN
    UPDATE comida
    SET comida_nombre = com_nom, comida_disponibilidad = com_dis, comida_precio = com_pre
    WHERE comida_id = com_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_filtrar_bebida` (IN `beb_desc` VARCHAR(100))   BEGIN
    SELECT * FROM bebida
    WHERE bebida_desc LIKE CONCAT(beb_desc, '%');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_filtrar_categoria` (IN `cat_nombre` VARCHAR(50))   BEGIN
    SELECT * FROM categoria
    WHERE categoria_nombre LIKE CONCAT(cat_nombre, '%');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_filtrar_cliente` (IN `cliente` VARCHAR(100))   begin
	SELECT * from cliente
    where cliente_nombre like CONCAT(cliente, "%");
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_filtrar_comida` (IN `com_nom` VARCHAR(100))   begin
	SELECT * from comida
    where comida_nombre like CONCAT(com_nom, "%");
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_bebida` ()   BEGIN
    SELECT * FROM bebida;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_categoria` ()   BEGIN
    SELECT * FROM categoria;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_cliente` ()   BEGIN
    SELECT * FROM cliente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_comida` ()   BEGIN
    SELECT * FROM comida;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_bebida_por_codigo` (IN `beb_id` INT)   BEGIN
    SELECT * FROM bebida WHERE bebida_id = beb_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_cliente_por_codigo` (IN `cod_cli` INT)   BEGIN
    SELECT * FROM cliente WHERE cliente_id = cod_cli;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_comida_por_codigo` (IN `com_id` INT)   BEGIN
    SELECT * FROM comida WHERE comida_id = com_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_bebida` (IN `beb_nom` VARCHAR(50), IN `beb_stock` INT, IN `beb_precio` DECIMAL(10,2), IN `beb_categoria_id` INT)   BEGIN
    INSERT INTO bebida(bebida_desc, bebida_stock, bebida_precio, bebida_categoria_id) 
    VALUES (beb_nom, beb_stock, beb_precio, beb_categoria_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_categoria` (IN `cat_nombre` VARCHAR(50))   BEGIN
    INSERT INTO categoria(categoria_nombre) 
    VALUES (cat_nombre);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_cliente` (IN `cli_nom` VARCHAR(50), IN `cli_dni` VARCHAR(8), IN `cli_cel` VARCHAR(9), IN `cli_correo` VARCHAR(50))   BEGIN
    INSERT INTO cliente(cliente_nombre, cliente_dni, cliente_celular, cliente_correo) 
    VALUES (cli_nom, cli_dni, cli_cel, cli_correo);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_comida` (IN `com_nom` VARCHAR(50), IN `com_dis` VARCHAR(2), IN `com_pre` DECIMAL(10,2))   BEGIN
    INSERT INTO comida(comida_nombre, comida_disponibilidad, comida_precio) 
    VALUES (com_nom, com_dis, com_pre);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebida`
--

CREATE TABLE `bebida` (
  `bebida_id` int(11) NOT NULL,
  `bebida_desc` varchar(50) NOT NULL,
  `bebida_stock` smallint(6) NOT NULL,
  `bebida_precio` decimal(10,2) NOT NULL,
  `bebida_categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bebida`
--

INSERT INTO `bebida` (`bebida_id`, `bebida_desc`, `bebida_stock`, `bebida_precio`, `bebida_categoria_id`) VALUES
(1, '1/2L Coca Cola', 50, 6.00, 1),
(2, '1L Coca Cola', 20, 8.00, 2),
(3, '1 jarra de chicha - 1L', 5, 8.00, 2),
(4, '1L Inka Cola', 20, 8.00, 1),
(6, '21', 21, 21.00, 1),
(7, '21', 21, 21.00, 2),
(8, '21', 21, 21.00, 1),
(9, '21', 12, 1221.00, 1),
(11, '12', 21, 12.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_nombre`) VALUES
(1, 'Gaseosa'),
(2, 'Jugo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL,
  `cliente_nombre` varchar(50) NOT NULL,
  `cliente_dni` varchar(8) NOT NULL,
  `cliente_celular` varchar(9) NOT NULL,
  `cliente_correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cliente_id`, `cliente_nombre`, `cliente_dni`, `cliente_celular`, `cliente_correo`) VALUES
(1, 'Josue Villa', '021', '92121', 'josue@senati.com'),
(2, 'David Asto', '00000002', '900000002', 'david@senati.com'),
(3, 'Jose Belleza', '00000023', '900000032', 'jose@senati.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comida`
--

CREATE TABLE `comida` (
  `comida_id` int(11) NOT NULL,
  `comida_nombre` varchar(50) NOT NULL,
  `comida_disponibilidad` varchar(2) NOT NULL,
  `comida_precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comida`
--

INSERT INTO `comida` (`comida_id`, `comida_nombre`, `comida_disponibilidad`, `comida_precio`) VALUES
(2, 'Causa rellena', 'Si', 12.00),
(3, 'Chaufa', 'Si', 16.00),
(4, 'Causa rellena', 'Si', 10.00),
(5, '312', '12', 23.00),
(8, '1231', 'Si', 0.00),
(9, '12', 'si', 1.20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `detalle_id` int(11) NOT NULL,
  `detalle_pedido_id` int(11) NOT NULL,
  `detalle_comida_id` int(11) NOT NULL,
  `detalle_cCantidad` smallint(6) NOT NULL,
  `detalle_bebida_id` int(11) DEFAULT NULL,
  `detalle_bCantidad` smallint(6) DEFAULT NULL,
  `detalle_descuento` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `pedido_id` int(11) NOT NULL,
  `pedido_cliente_id` int(11) NOT NULL,
  `pedido_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`bebida_id`),
  ADD KEY `bebida_categoria_id` (`bebida_categoria_id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indices de la tabla `comida`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`comida_id`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`detalle_id`),
  ADD KEY `detalle_pedido_id` (`detalle_pedido_id`),
  ADD KEY `detalle_comida_id` (`detalle_comida_id`),
  ADD KEY `detalle_bebida_id` (`detalle_bebida_id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `pedido_cliente_id` (`pedido_cliente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bebida`
--
ALTER TABLE `bebida`
  MODIFY `bebida_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `comida`
--
ALTER TABLE `comida`
  MODIFY `comida_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `detalle_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bebida`
--
ALTER TABLE `bebida`
  ADD CONSTRAINT `bebida_ibfk_1` FOREIGN KEY (`bebida_categoria_id`) REFERENCES `categoria` (`categoria_id`);

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`detalle_pedido_id`) REFERENCES `pedido` (`pedido_id`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`detalle_comida_id`) REFERENCES `comida` (`comida_id`),
  ADD CONSTRAINT `detalle_ibfk_3` FOREIGN KEY (`detalle_bebida_id`) REFERENCES `bebida` (`bebida_id`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`pedido_cliente_id`) REFERENCES `cliente` (`cliente_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
