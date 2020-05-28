-- CREATION DE BD
CREATE DATABASE IF NOT EXISTS brikole;
USE brikole;
-- ---
DROP TABLE IF EXISTS `ville`;
CREATE TABLE `ville` (
  `id_ville` int(11) NOT NULL,
  `nom_ville` char(50) DEFAULT NULL,
  `trending` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ---
