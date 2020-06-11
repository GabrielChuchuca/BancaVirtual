-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 01:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banca-virtual`
--

-- --------------------------------------------------------

--
-- Table structure for table `bv_cliente`
--

CREATE TABLE `bv_cliente` (
  `cli_id` int(11) NOT NULL,
  `cli_num_login` int(11) NOT NULL,
  `cli_num_inco` int(11) NOT NULL,
  `cli_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bv_cliente`
--

INSERT INTO `bv_cliente` (`cli_id`, `cli_num_login`, `cli_num_inco`, `cli_persona`) VALUES
(1, 1, 1, 26),
(25, 6, 0, 38);

-- --------------------------------------------------------

--
-- Table structure for table `bv_cuenta`
--

CREATE TABLE `bv_cuenta` (
  `cue_ncuenta` int(7) NOT NULL,
  `cue_saldo` double(11,2) NOT NULL,
  `cue_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cli_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bv_cuenta`
--

INSERT INTO `bv_cuenta` (`cue_ncuenta`, `cue_saldo`, `cue_fecha_registro`, `cli_id`) VALUES
(1, 11.10, '2020-06-10 23:03:44', 25);

-- --------------------------------------------------------

--
-- Table structure for table `bv_empleado`
--

CREATE TABLE `bv_empleado` (
  `emp_id` int(11) NOT NULL,
  `emp_cargo` varchar(50) NOT NULL,
  `emp_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bv_empleado`
--

INSERT INTO `bv_empleado` (`emp_id`, `emp_cargo`, `emp_persona`) VALUES
(1, 'CAJERO', 6),
(2, 'CAJERO', 4),
(3, 'CAJERO', 11),
(4, 'CAJERO', 1327);

-- --------------------------------------------------------

--
-- Table structure for table `bv_persona`
--

CREATE TABLE `bv_persona` (
  `per_id` int(11) NOT NULL,
  `per_cedula` varchar(10) NOT NULL,
  `per_nombre` varchar(200) NOT NULL,
  `per_apellido` varchar(200) NOT NULL,
  `per_direccion` varchar(200) NOT NULL,
  `per_telefono` varchar(10) NOT NULL,
  `per_fecha_nac` date NOT NULL,
  `per_correo` varchar(100) NOT NULL,
  `per_estado_civil` varchar(100) NOT NULL,
  `per_sexo` varchar(50) NOT NULL,
  `per_rol` varchar(50) NOT NULL,
  `per_password` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT ' 	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bv_persona`
--

INSERT INTO `bv_persona` (`per_id`, `per_cedula`, `per_nombre`, `per_apellido`, `per_direccion`, `per_telefono`, `per_fecha_nac`, `per_correo`, `per_estado_civil`, `per_sexo`, `per_rol`, `per_password`) VALUES
(4, '0104796230', 'xavier', 'jarro', 'tio puyo', '0983037178', '1995-03-25', 'xa@banquito.com', 'Casado/a', 'Masculino', 'admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, '0104796233', 'andrea', 'mercado', 'uncovia', '099283848', '1993-03-25', 'andrea@banquito.com', 'Casado/a', 'Femenino', 'usuario', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, '0105885875', 'DAVID', 'AGUIRRE', 'EL CEBOLLAR', '0983037178', '1978-07-07', 'david@banquito.com', 'SOLTERO/A', 'MASCULINO', 'empleado', '81dc9bdb52d04dc20036dbd8313ed055'),
(11, '0104796230', 'PRUEBA', 'PRUEBA', 'UPS', '0983037178', '1978-07-07', 'prueba@banquito.com', 'CASADO/A', 'MASCULINO', 'empleado', '81dc9bdb52d04dc20036dbd8313ed055'),
(23, '0105885875', 'UPS', 'JARRO', 'EL CEBOLLAR', '0983037178', '1995-03-25', 'ups@banquito.com', 'SOLTERO/A', 'MASCULINO', 'usuario', 'd0fb3ca22f8eeafbda026bebd7a67530'),
(24, '0105885875', 'MARGOTH', 'AGUIRRE', 'TIO PUYO', '0983037178', '1995-03-25', 'pruebaCon@banquito.com', 'SOLTERO/A', 'MASCULINO', 'usuario', '626f8c4b0808c9f88929bd662a404765'),
(25, '1111111111', 'UPS', 'UPS', 'TIO PUYO', '0983037178', '1995-03-25', 'upsNum@banquito.com', 'SOLTERO/A', 'MASCULINO', 'usuario', '842184c293be1ce2f25e2e6084310842'),
(26, '2222222222', 'MARGOTH', 'AGUIRRE', 'TIO PUYO', '0983037178', '1995-03-25', '123@banquito.com', 'SOLTERO/A', 'MASCULINO', 'usuario', '493b4be8d85e9ba771f28152d8fd89b4'),
(38, '0105662068', 'GABRIEL', 'CHUCHUCA', 'PASAJE NICANOR COBOS', '0969375242', '1997-09-24', 'gabrielchuchuca27@banquito.com', 'SOLTERO/A', 'MASCULINO', 'usuario', '42d92e2ad1b0753c0f6eae65ba852d9e'),
(1325, '0107137416', 'Andres', 'Loja', 'casa', '0984890578', '2020-06-02', 'aloja619@gmail.com', 'soltero', 'M', 'usuario', 'enanopavo'),
(1326, '1', '', '', '', '', '0000-00-00', '', '', '', '', ''),
(1327, '0106876642', 'CHRISTIAN', 'CHUCHUCA', 'FERIA', '0981248460', '1992-07-10', 'chis1892@banquito.com', 'SOLTERO/A', 'MASCULINO', 'empleado', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `bv_transferencia`
--

CREATE TABLE `bv_transferencia` (
  `tra_id` int(10) NOT NULL,
  `tra_fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tra_monto` double(11,2) NOT NULL,
  `tra_tipo` varchar(250) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `cli_id` int(10) NOT NULL,
  `cue_ncuenta` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bv_transferencia`
--

INSERT INTO `bv_transferencia` (`tra_id`, `tra_fecha`, `tra_monto`, `tra_tipo`, `emp_id`, `cli_id`, `cue_ncuenta`) VALUES
(1, '0000-00-00 00:00:00', 10.00, 'Deposito', 10, 10, 10),
(2, '2020-06-10 05:00:00', 125.00, 'Deposito', 25, 25, 10),
(3, '2020-06-10 05:00:00', 105.00, 'Deposito', 25, 25, 10),
(4, '2020-06-10 05:00:00', 5.00, 'retiro', 25, 25, 10),
(5, '2020-06-10 05:00:00', 105.00, 'Deposito', 25, 25, 111111),
(6, '2020-06-10 05:00:00', 130.00, 'Deposito', 25, 25, 1),
(7, '2020-06-10 05:00:00', 10.00, 'Deposito', 25, 25, 1),
(8, '2020-06-10 05:00:00', 100.50, 'Retiro', 25, 25, 1),
(9, '0000-00-00 00:00:00', 12.00, 'Deposito', 25, 25, 1),
(10, '2020-06-10 19:32:10', 11.00, 'Deposito', 25, 25, 1),
(11, '2020-06-10 07:34:00', 2.00, 'Deposito', 25, 25, 1),
(12, '2020-06-10 23:28:38', 7.00, 'Deposito', 25, 25, 1),
(13, '2020-06-10 16:35:56', 50.00, 'Retiro', 25, 38, 1),
(14, '2020-06-10 16:37:56', 0.10, 'Deposito', 25, 25, 1),
(15, '2020-06-10 19:44:05', 1.00, 'Retiro', 0, 25, 1),
(16, '2020-06-10 20:32:58', 1.00, 'Retiro', 0, 25, 1),
(17, '2020-06-10 20:33:44', 1.00, 'Retiro', 0, 25, 1),
(18, '2020-06-10 20:41:23', 1.00, 'Retiro', 0, 25, 1),
(19, '2020-06-10 20:44:59', 1.00, 'Retiro', 0, 25, 1),
(20, '2020-06-10 20:46:56', 2.00, 'Retiro', 0, 25, 1),
(21, '2020-06-10 20:49:12', 1.00, 'Retiro', 0, 25, 1),
(22, '2020-06-10 20:51:10', 1.00, 'Retiro', 0, 25, 1),
(23, '2020-06-10 22:56:16', 0.50, 'Retiro', 0, 25, 1),
(24, '2020-06-10 23:00:53', 0.50, 'Retiro', 0, 25, 1),
(25, '2020-06-10 23:03:44', 0.50, 'Retiro', 0, 25, 1),
(26, '2020-06-10 23:19:22', 0.00, 'Retiro', 4, 25, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bv_cliente`
--
ALTER TABLE `bv_cliente`
  ADD PRIMARY KEY (`cli_id`),
  ADD KEY `cli_persona` (`cli_persona`);

--
-- Indexes for table `bv_cuenta`
--
ALTER TABLE `bv_cuenta`
  ADD PRIMARY KEY (`cue_ncuenta`),
  ADD KEY `bv_cuenta_fk` (`cli_id`);

--
-- Indexes for table `bv_empleado`
--
ALTER TABLE `bv_empleado`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `emp_persona` (`emp_persona`);

--
-- Indexes for table `bv_persona`
--
ALTER TABLE `bv_persona`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `bv_transferencia`
--
ALTER TABLE `bv_transferencia`
  ADD PRIMARY KEY (`tra_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bv_cliente`
--
ALTER TABLE `bv_cliente`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `bv_cuenta`
--
ALTER TABLE `bv_cuenta`
  MODIFY `cue_ncuenta` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bv_empleado`
--
ALTER TABLE `bv_empleado`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bv_persona`
--
ALTER TABLE `bv_persona`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1328;

--
-- AUTO_INCREMENT for table `bv_transferencia`
--
ALTER TABLE `bv_transferencia`
  MODIFY `tra_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bv_cliente`
--
ALTER TABLE `bv_cliente`
  ADD CONSTRAINT `bv_cliente_ibfk_1` FOREIGN KEY (`cli_persona`) REFERENCES `bv_persona` (`per_id`);

--
-- Constraints for table `bv_cuenta`
--
ALTER TABLE `bv_cuenta`
  ADD CONSTRAINT `bv_cuenta_fk` FOREIGN KEY (`cli_id`) REFERENCES `bv_cliente` (`cli_id`);

--
-- Constraints for table `bv_empleado`
--
ALTER TABLE `bv_empleado`
  ADD CONSTRAINT `bv_empleado_ibfk_1` FOREIGN KEY (`emp_persona`) REFERENCES `bv_persona` (`per_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
