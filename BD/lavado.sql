-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.31 - MySQL Community Server - GPL
-- SO del servidor:              Linux
-- HeidiSQL Versión:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para lavado
CREATE DATABASE IF NOT EXISTS `lavado` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `lavado`;

-- Volcando estructura para tabla lavado.AreasLavado
CREATE TABLE IF NOT EXISTS `AreasLavado` (
  `IdArea` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `Ubicacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdArea`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla lavado.AreasLavado: ~3 rows (aproximadamente)
INSERT INTO `AreasLavado` (`IdArea`, `Nombre`, `Ubicacion`) VALUES
	(1, 'Lava', 'SI'),
	(2, NULL, NULL),
	(3, NULL, NULL);

-- Volcando estructura para tabla lavado.Clientes
CREATE TABLE IF NOT EXISTS `Clientes` (
  `idClientes` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Contraseña` varchar(100) DEFAULT NULL,
  `Sexo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idClientes`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla lavado.Clientes: ~4 rows (aproximadamente)
INSERT INTO `Clientes` (`idClientes`, `Nombre`, `Direccion`, `Correo`, `Telefono`, `Contraseña`, `Sexo`) VALUES
	(1, 'Marta', 'Mexico-La marquesa', 'jorgonzsu025@outlook.com', '+527291156057', '123456789', 'femenino'),
	(2, 'Jorge', 'Mexico-La marquesa', 'jorge@gmail.com', '+527291156057', '123456789', 'masculino'),
	(3, 'Jorge Luis', 'Mexico-La marquesa', 'sdf', '+527291156057', '123456789', 'masculino'),
	(4, 'Jorge Suarez', 'Mexico-La marquesa', 'df', '+527291156057', '123456789', 'masculino');

-- Volcando estructura para tabla lavado.Empleado
CREATE TABLE IF NOT EXISTS `Empleado` (
  `IdEmpleado` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `IdArea` int DEFAULT NULL,
  `Puesto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdEmpleado`),
  KEY `IdArea` (`IdArea`),
  CONSTRAINT `Empleado_ibfk_1` FOREIGN KEY (`IdArea`) REFERENCES `AreasLavado` (`IdArea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla lavado.Empleado: ~0 rows (aproximadamente)

-- Volcando estructura para tabla lavado.TicketCompra
CREATE TABLE IF NOT EXISTS `TicketCompra` (
  `IdTicket` int NOT NULL AUTO_INCREMENT,
  `IdCliente` int DEFAULT NULL,
  `IdArea` int DEFAULT NULL,
  `IdEmpleado` int DEFAULT NULL,
  `FechaCompra` date DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`IdTicket`),
  KEY `IdCliente` (`IdCliente`),
  KEY `IdArea` (`IdArea`),
  KEY `IdEmpleado` (`IdEmpleado`),
  CONSTRAINT `TicketCompra_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `Clientes` (`idClientes`),
  CONSTRAINT `TicketCompra_ibfk_2` FOREIGN KEY (`IdArea`) REFERENCES `AreasLavado` (`IdArea`),
  CONSTRAINT `TicketCompra_ibfk_3` FOREIGN KEY (`IdEmpleado`) REFERENCES `Empleado` (`IdEmpleado`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla lavado.TicketCompra: ~5 rows (aproximadamente)
INSERT INTO `TicketCompra` (`IdTicket`, `IdCliente`, `IdArea`, `IdEmpleado`, `FechaCompra`, `Total`) VALUES
	(2, 2, 1, NULL, '2023-05-23', 12.00),
	(3, 2, 1, NULL, '2023-05-23', 10.00),
	(4, 2, 1, NULL, '2023-05-23', 10.00),
	(5, 2, 1, NULL, '2023-05-23', 10.00),
	(6, 2, 3, NULL, '2023-05-23', 12.00),
	(7, 2, 3, NULL, '2023-05-23', 12.00),
	(8, 2, 3, NULL, '2023-05-23', 15.00),
	(9, 2, 1, NULL, '2023-05-23', 12.00),
	(10, 2, 3, NULL, '2023-05-23', 9.00),
	(11, 2, 1, NULL, '2023-05-23', 5050.00);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
