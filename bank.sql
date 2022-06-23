-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for agiota
DROP DATABASE IF EXISTS `agiota`;
CREATE DATABASE IF NOT EXISTS `agiota` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `agiota`;

-- Dumping structure for table agiota.bairro
DROP TABLE IF EXISTS `bairro`;
CREATE TABLE IF NOT EXISTS `bairro` (
  `bairro_id` int(11) NOT NULL,
  `nome1` varchar(50) NOT NULL,
  PRIMARY KEY (`bairro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table agiota.bairro: ~6 rows (approximately)
INSERT INTO `bairro` (`bairro_id`, `nome1`) VALUES
	(1, 'Paraiso do Sol'),
	(2, 'Castanheiras'),
	(3, 'Araujo'),
	(4, 'Novo Horizonte'),
	(5, 'Cerejeiras'),
	(6, 'Michigan');

-- Dumping structure for table agiota.cliente
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `data_nasc` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `cidade_cli` varchar(50) NOT NULL,
  `bairro_cli` varchar(50) NOT NULL,
  `rua_cli` varchar(50) NOT NULL,
  `numero_cli` int(11) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `bairro_id` int(11) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `horario` varchar(50) NOT NULL,
  `valor` decimal(20,6) NOT NULL,
  `juros` decimal(20,6) NOT NULL,
  `parcela` decimal(20,6) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `celular` (`celular`),
  UNIQUE KEY `cnpj` (`cnpj`),
  UNIQUE KEY `email` (`email`),
  KEY `FK_cliente_bairro` (`bairro_id`),
  CONSTRAINT `FK_cliente_bairro` FOREIGN KEY (`bairro_id`) REFERENCES `bairro` (`bairro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

-- Dumping data for table agiota.cliente: ~1 rows (approximately)
INSERT INTO `cliente` (`id`, `nome`, `email`, `data_nasc`, `cpf`, `celular`, `cidade_cli`, `bairro_cli`, `rua_cli`, `numero_cli`, `empresa`, `cnpj`, `bairro_id`, `rua`, `numero`, `horario`, `valor`, `juros`, `parcela`) VALUES
	(92, 'Luric de Souza Oliveira', 'luric.dev@gmail.com', '02/01/1995', '130.719.456-71', '(12) 99663-5605', 'São José dos Campos', 'Paraiso do Sol', 'Dr. João Gomes Batista Neto', 304, 'iur1 Tech', '31.231.231/0001-12', 1, 'Thurubabos Thurubangos', 48, '16/06/2022 - 13:47:46', 1000.000000, 300.000000, 40.000000),
	(102, 'andre', NULL, '', '', '', '', '', '', 0, '', '', 5, '', 0, '', 0.000000, 300.000000, 0.000000);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
