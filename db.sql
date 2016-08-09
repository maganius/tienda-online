-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-02-2014 a las 17:37:25
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_cat` int(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `contiene` int(6) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_cat`, `nombre`, `contiene`) VALUES
(1, 'Electronica', 10),
(2, 'Electrodomesticos', 10),
(3, 'Muebles', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `idcompra` int(4) NOT NULL AUTO_INCREMENT,
  `id_producto` int(6) NOT NULL,
  `idusuario` int(3) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcompra`),
  KEY `id_producto` (`id_producto`),
  KEY `idusuario` (`idusuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `compra`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
  `idcontacto` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` varchar(40) NOT NULL,
  PRIMARY KEY (`idcontacto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`idcontacto`, `nombre`, `correo`, `mensaje`, `fecha`) VALUES
(5, 'demo', 'demo@live', 'esto es una demostracion del sistema de contacto para todos ustedes.', '1,  5 February 2014');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(6) NOT NULL AUTO_INCREMENT,
  `id_cat` int(6) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `fabricante` varchar(32) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `imagen` varchar(30) NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `categoria` (`id_cat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcar la base de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_cat`, `nombre`, `fabricante`, `precio`, `imagen`, `descripcion`) VALUES
(1, 1, 'Celeron Dual Core E3400', 'Intel', '53.00', 'acc393.jpg', 'Modelo:Celeron E3400\r\nFrecuencia 2.6Ghz\r\nFSB:800mhz'),
(2, 1, 'Core i3 2100 3.01Ghz', 'Intel', '100.00', 'acc395.jpg', 'Modelo:Core i3 2100 3.0Ghz\r\n3MB De cach'),
(3, 1, 'Celeron 430', 'Intel', '52.00', 'acc396.jpg', 'Modelo:Celeron 430\r\nFrecuencia: 1.8Ghz\r\nFSB:800Mhz\r\n1MB de cach'),
(4, 1, 'Athlon II X2 250', 'AMD', '85.00', 'acc27.jpg', 'Marca:AMD\r\nModelo:ADX250OCGQBOX\r\nSocket:Socket AM3\r\nN'),
(5, 1, 'Athlon II X4 640', 'AMD', '129.00', 'acc30.jpg', 'Frecuencia:3.0GHz\r\nEnergia:95W\r\nSocket:Socket AM2/AM3'),
(6, 1, 'AMD Phenom II x4 850', 'AMD', '143.00', 'default.jpg', 'Modelo: HDX850WFGMBOX\r\n3.3 GHz\r\n2.0 MB Cache Total\r\nSocket AM3\r\nIncluye Disipador de Calor'),
(7, 1, 'A4 3300', 'AMD', '93.00', 'acc548.jpg', 'Serie: A-Series APU\r\nSocket: Socket FM1\r\n2.5ghz\r\nVideo Integrado: Radeon HD 6410\r\nCache: 2 x 512KB'),
(8, 1, 'AMD APU A6 3650', 'AMD', '159.00', 'acc556.jpg', 'Modelo: A6 3650\r\nVelocidad:2.6GHz\r\nMemoria Cache:4.0MB\r\nSocket FM1\r\nHD 6530D GPU'),
(9, 1, 'Intel Pentium G620 2.6Ghz', 'Intel', '90.00', 'acc549.jpg', 'Modelo: BX80623G620\r\nSocket: LGA 1155\r\nSerie:Pentium\r\nDual Core 2.6 Ghz\r\nVideo Integrado: Intel '),
(10, 1, 'Intel Core i5 2300', 'Intel', '260.00', 'acc406.jpg', 'Modelo: Core i5 2300\r\nVelocidad 2.8Ghz\r\n4 N'),
(11, 1, 'Gigabyte 880GM-USB3L', 'Gigabyte', '109.00', 'm_board01.jpg', 'Socket AM3\r\nSupport for AMD AM3 Phenom'),
(12, 2, 'Asus M4A78LT-M LX', 'Asus', '74.50', 'm_board02.jpg', 'Modelo:M4A78LT-M LX\r\nSocket AM3\r\nCore unlocker\r\nVideo intergrado ATI'),
(13, 2, 'Asus M4N68T-M V2', 'Asus', '69.00', 'm_board03.jpg', 'Modelo:M4N68T-M V2\r\nSocket AM3\r\n2 Ranuras de memoria DDR3\r\nChipset NVIDIA Geforce 7025/nForce 630a\r\nmicroATX'),
(14, 2, 'Asus E35M1-I', 'Asus', '167.00', 'm_board04.jpg', 'Modelo:Asus E35M1-I\r\nProcesador APU AMD E-350 Dual Core\r\n2 Ranuras de memoria DD3\r\nVideo integrado Radeon 6310\r\nSATA 6Gbp'),
(15, 2, 'Asus Crosshair V Formula Thunder', 'Asus', '399.00', 'm_board05.jpg', 'AM3+ CPU\r\nAMD 990FX Chipset\r\nHyperTransport'),
(16, 2, 'F1A75-V PRO', 'Asus', '154.00', 'm_board06.jpg', 'AMD Socket FM1 A- Series\r\nSupports AMD'),
(17, 2, 'F1A75', 'Asus', '110.00', 'm_board07.jpg', 'AMD Socket FM1 A-Series\r\nAMD A75 FCH (Hudson D3)\r\n4 x DIMM, Max. 64GB, DDR3 2250(O.C.)/1866/1600/1333/1066 MHz\r\nAMD'),
(18, 2, 'ASUS P6X58D-E', 'Asus', '270.00', 'm_board08.jpg', 'Modelo:P6X58D-E\r\nSocket:Intel'),
(19, 2, 'ASUS P8Z68-V', 'Asus', '239.99', 'm_board09.jpg', 'Modelo: P8Z68-V\r\nSocket:LGA 1155\r\nCPU Soportados: Core i7 / i5 / i3 (LGA1155)\r\nMemoria:4'),
(20, 2, 'INTEL DH61WW', 'Intel', '86.00', 'm_board10.jpg', 'Modelo:BOXDH61WWB3\r\nSocket: LGA 1155\r\nCPU Soportados: Core i7 / i5 / i3 / Pentium (LGA1155)\r\nMemoria:2'),
(21, 3, 'RAM PNY 6GB XLR8', '', '115.00', 'm_ram01.jpg', 'Modelo:MD6144KD3-1600-X8\r\nCapacidad 6GB (kit 3x2GB)\r\nVelocidad:1600Mhz\r\nVoltaje: 1.65\r\nCAS 8'),
(22, 3, 'RAM PNY 8GB 1333Mhz', '', '110.00', 'm_ram02.jpg', 'Modelo:MD8192KD3-1333\r\nCapacidad 8GB (2x4GB)\r\nVelocidad: 1333Mhz'),
(23, 3, 'Memoria Kingston DDR3 2Gb', 'Kingston', '19.00', 'm_ram03.jpg', 'Modelo:KVR1333D3S8N9/2G\r\nCapacidad: 2 Gb\r\nTipo: DDR3\r\nVelocidad: 1333 Mhz\r\nPins: 240pin\r\nLatencia: CL9\r\nVoltaje: 1,5 Volts\r\nTecnolog'),
(24, 3, 'Memoria RAM Patriot 1GB DDR', 'Patriot', '39.00', 'm_ram04.jpg', 'Modelo:PSD1G400\r\nTipo: DDR PC3200\r\n400Mhz\r\n2.6v'),
(25, 3, 'Memoria RAM Corsair 2GB DDR3', 'Corsair', '19.00', 'm_ram05.jpg', 'Modelo:VS2GB1333D3\r\nCapacidad 2GB\r\nTipo DDR3\r\nVelocidad: 1333MHZ\r\nVoltaje: 1.5V'),
(26, 3, 'Memoria RAM Corsair 4GB DDR3', 'Corsair', '49.00', 'm_ram06.jpg', 'Modelo:CMV4GX3M2A1333C9\r\nCapacidad 4GB\r\nKit 2x2GB\r\nVelocidad 1333Mhz'),
(27, 3, 'Memoria RAM Corsair XMS3 4GB DDR3', 'Corsair', '59.00', 'm_ram07.jpg', 'Modelo:CMX4GX3M2A1600C9\r\nCapacidad 4GB\r\nKit de 2x2GB\r\nVelocidad de 1600Mhz\r\nTipo DDR3'),
(28, 3, 'Memoria RAM Corsair Vengeance 4GB DDR3', 'Corsair', '62.00', 'm_ram08.jpg', 'Modelo:CMZ4GX3M1A1600C9\r\nCapacidad 4GB\r\nVelocidad 1600Mhz\r\nVoltaje 1.5'),
(29, 3, 'Memoria RAM Corsair Vengeance 4GB DDR3', 'Corsair', '62.00', 'm_ram09.jpg', 'Modelo:CMZ4GX3M1A1600C9B\r\nCapacidad 4GB\r\nVelocidad 1600Mhz\r\nVoltaje 1.5'),
(30, 4, 'adasd', 'asdas', '12.00', '17262_1.jpg', 'sadmsdmasdasd'),
(31, 1, 'Intel Sandy Bridge Extreme Edition', 'Intel', '200.00', 'acc557.jpg', 'De m');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL,
  `img4` varchar(100) NOT NULL,
  `img5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `slider`
--

INSERT INTO `slider` (`img1`, `img2`, `img3`, `img4`, `img5`) VALUES
('01', '02', '03', '04', '05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(3) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `contrasena` varchar(40) NOT NULL,
  `fechaingreso` varchar(40) NOT NULL,
  `rango` int(1) NOT NULL,
  `baneo` int(1) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nickname`, `nombre`, `apellido`, `pais`, `ciudad`, `correo`, `contrasena`, `fechaingreso`, `rango`, `baneo`) VALUES
(1, 'demo', 'demo', 'demo', 'Mexico', 'Baja California Sur', 'demo@live.com.mx', '1234', '1,  3 January 2014', 1, 0);
