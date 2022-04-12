-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           8.0.28 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para reserva
CREATE DATABASE IF NOT EXISTS `reserva` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `reserva`;

-- Copiando estrutura para tabela reserva.cars
CREATE TABLE IF NOT EXISTS `cars` (
  `id_cars` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `marca` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `motorizacao` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `anomodelo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `placa` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_cars`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela reserva.cars: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` (`id_cars`, `nome`, `marca`, `motorizacao`, `anomodelo`, `placa`) VALUES
	(1, 'VOYAGEM', 'Volkswagen', '2.0', '2011/2012', 'JPK2030'),
	(2, 'ONIX LT', 'Chevrolet', '1.9', '2020/2020', 'ABC2023'),
	(3, 'FERRARI', 'Ferrari', '2.0', '2021/2021', 'QYC8224'),
	(5, 'CORSA', 'Chevrolet', '1.0', '2010/2011', 'ACC1212');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;

-- Copiando estrutura para tabela reserva.km_veiculo
CREATE TABLE IF NOT EXISTS `km_veiculo` (
  `id_km` int NOT NULL AUTO_INCREMENT,
  `reservas_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `km_inicial` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `km_final` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `informacao` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id_km`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela reserva.km_veiculo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `km_veiculo` DISABLE KEYS */;
/*!40000 ALTER TABLE `km_veiculo` ENABLE KEYS */;

-- Copiando estrutura para tabela reserva.reservas
CREATE TABLE IF NOT EXISTS `reservas` (
  `id_reservas` int NOT NULL AUTO_INCREMENT,
  `id_users` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `veiculo` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `placa` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_start` datetime DEFAULT NULL,
  `data_end` datetime DEFAULT NULL,
  `repeticao` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `duracao` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `km_entrada` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `km_saida` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `comentario` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `informacao` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `situacao` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_reservas`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela reserva.reservas: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;

-- Copiando estrutura para tabela reserva.reservas_salas
CREATE TABLE IF NOT EXISTS `reservas_salas` (
  `id_reservas` int NOT NULL AUTO_INCREMENT,
  `id_users` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sala` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `departamento` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_start` datetime DEFAULT NULL,
  `data_end` datetime DEFAULT NULL,
  `repeticao` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `duracao` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `comentario` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `situacao` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_reservas`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela reserva.reservas_salas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reservas_salas` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservas_salas` ENABLE KEYS */;

-- Copiando estrutura para tabela reserva.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_users` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nivel` enum('SA','A') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'SA',
  `ativo` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Y',
  PRIMARY KEY (`id_users`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela reserva.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_users`, `nome`, `email`, `senha`, `nivel`, `ativo`) VALUES
	(1, 'Admin', 'adm@adm.com', '21232f297a57a5a743894a0e4a801fc3', 'SA', 'Y');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
