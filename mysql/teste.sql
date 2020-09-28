SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `tab_vendas`;
CREATE TABLE `tab_vendas` (
  `pedido_id` int NOT NULL AUTO_INCREMENT,
  `vendedor_id` int NOT NULL,
  `valor_comissao` float NOT NULL,
  `valor_venda` float NOT NULL,
  `data_venda` text NOT NULL,
  PRIMARY KEY (`pedido_id`),
  KEY `vendedor_id` (`vendedor_id`),
  CONSTRAINT `tab_vendas_ibfk_1` FOREIGN KEY (`vendedor_id`) REFERENCES `tab_vendedores` (`vendedor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `tab_vendedores`;
CREATE TABLE `tab_vendedores` (
  `vendedor_id` int NOT NULL AUTO_INCREMENT,
  `vendedor_nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vendedor_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vendedor_comissao_total` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`vendedor_id`),
  UNIQUE KEY `vendedor_email` (`vendedor_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
