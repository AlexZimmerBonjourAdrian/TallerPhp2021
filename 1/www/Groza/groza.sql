-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-06-2021 a las 16:46:32
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `groza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `IdCli` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `PassCli` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_cs NOT NULL,
  `NomCli` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_cs NOT NULL,
  `ApellidoCli` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_cs NOT NULL,
  `EmailCli` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_cs NOT NULL,
  `SexoCli` enum('Masculino','Femenino') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_cs NOT NULL,
  `NicknameCli` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_cs NOT NULL,
  PRIMARY KEY (`IdCli`),
  UNIQUE KEY `EmailCli` (`EmailCli`),
  UNIQUE KEY `NicknameCli` (`NicknameCli`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`IdCli`, `PassCli`, `NomCli`, `ApellidoCli`, `EmailCli`, `SexoCli`, `NicknameCli`) VALUES
(3, '81dc9bdb52d04dc20036dbd8313ed055', 'Daniela', 'pato', 'alexzimmer.zimmer1@gmail.com', 'Femenino', 'locky'),
(4, 'f5f4eee83ca7dea92b6982caebc2d5b5', 'Alex', 'Zimmer', 'revista@gmail.com', 'Masculino', 'locks'),
(5, '81dc9bdb52d04dc20036dbd8313ed055', '2', '2', '2@gmail.com', 'Masculino', '2'),
(6, '81dc9bdb52d04dc20036dbd8313ed055', '5', '5', '5@gmail.com', 'Masculino', '5'),
(7, '81dc9bdb52d04dc20036dbd8313ed055', '8', '8', '8@gmail.com', 'Masculino', '8'),
(8, '81dc9bdb52d04dc20036dbd8313ed055', 'Al', 'Al', 'Al@gmail.com', 'Masculino', 'Al');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `IdProv` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `PassProv` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_cs NOT NULL,
  `NomProv` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_cs NOT NULL,
  `ApellidoProv` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_cs NOT NULL,
  `EmailProv` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_cs NOT NULL,
  `SexoProv` enum('Masculino','Femenino') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_cs NOT NULL,
  `NicknameProv` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_cs NOT NULL,
  PRIMARY KEY (`IdProv`),
  UNIQUE KEY `EmailProv` (`EmailProv`),
  UNIQUE KEY `NicknameProv` (`NicknameProv`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`IdProv`, `PassProv`, `NomProv`, `ApellidoProv`, `EmailProv`, `SexoProv`, `NicknameProv`) VALUES
(3, 'c4ca4238a0b923820dcc509a6f75849b', 's', 's', 'otros@gmail.com', 'Masculino', 's'),
(4, '81dc9bdb52d04dc20036dbd8313ed055', '1', '1', '1@gmail.com', 'Masculino', '1'),
(5, '81dc9bdb52d04dc20036dbd8313ed055', '4', '4', '4@gmail.com', 'Masculino', '4'),
(6, '81dc9bdb52d04dc20036dbd8313ed055', '6', '6', '6@gmail.com', 'Femenino', '6'),
(7, '81dc9bdb52d04dc20036dbd8313ed055', '7', '7', '7@gmail.com', 'Masculino', '7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

DROP TABLE IF EXISTS `recurso`;
CREATE TABLE IF NOT EXISTS `recurso` (
  `idRec` int NOT NULL AUTO_INCREMENT,
  `NomRec` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_cs NOT NULL,
  `Descript` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_cs,
  `Tipo` enum('Articulo','Revista','Libro','Video') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_cs NOT NULL,
  `TipoPlan` enum('Gold','Silver','Free') DEFAULT NULL,
  `Enlace` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_as_cs NOT NULL,
  `IdProv` int UNSIGNED NOT NULL,
  PRIMARY KEY (`idRec`),
  KEY `IdProv` (`IdProv`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `recurso`
--

INSERT INTO `recurso` (`idRec`, `NomRec`, `Descript`, `Tipo`, `TipoPlan`, `Enlace`, `IdProv`) VALUES
(1, 'Libro del doctor zoos', 'Libros infantiles perfectos ', 'Libro', 'Free', 'google.com', 1),
(2, 'sew323', 'sadasd', 'Libro', 'Free', 'adasda', 6),
(3, '231321', '123132', 'Articulo', 'Free', '12313', 6),
(4, 'sdada', 'sadad', 'Articulo', 'Free', 'asdad', 6),
(5, 'Libros de conan Doil', 'libros de horror', 'Libro', 'Free', 'google.com', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

DROP TABLE IF EXISTS `suscripcion`;
CREATE TABLE IF NOT EXISTS `suscripcion` (
  `idSuscript` int NOT NULL AUTO_INCREMENT,
  `precio` float DEFAULT NULL,
  `TpoPlan`  enum('Free','Silver','Gold') DEFAULT 'Free',
  `IdCli` int DEFAULT NULL,
  PRIMARY KEY (`idSuscript`),
  UNIQUE KEY `IdCli` (`IdCli`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `suscripcion`
--

INSERT INTO `suscripcion` (`idSuscript`, `precio`, `IdCli`) VALUES
(11, 19.99, 7),
(12, 19.99, 8);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
