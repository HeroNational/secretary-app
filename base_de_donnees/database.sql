-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour secretary
CREATE DATABASE IF NOT EXISTS `secretary` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `secretary`;

-- Listage de la structure de la table secretary. client
CREATE TABLE IF NOT EXISTS `client` (
  `idC` int(11) NOT NULL AUTO_INCREMENT,
  `nomC` varchar(200) CHARACTER SET latin1 NOT NULL,
  `descriptionC` text CHARACTER SET latin1 NOT NULL,
  `email` varchar(200) CHARACTER SET latin1 NOT NULL,
  `dateInsc` varchar(200) CHARACTER SET latin1 NOT NULL,
  `telephone` varchar(25) CHARACTER SET latin1 NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`idC`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table secretary. document
CREATE TABLE IF NOT EXISTS `document` (
  `idD` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) CHARACTER SET latin1 NOT NULL,
  `dateDeb` varchar(200) CHARACTER SET latin1 NOT NULL,
  `delai` varchar(200) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `prix` int(20) unsigned DEFAULT NULL,
  `secretaire` int(11) NOT NULL,
  `etatD` int(11) NOT NULL,
  `proprietaire` int(11) NOT NULL,
  PRIMARY KEY (`idD`),
  KEY `fk_document_proprietaire` (`proprietaire`),
  KEY `fk_document_secretaire` (`secretaire`),
  CONSTRAINT `fk_document_proprietaire` FOREIGN KEY (`proprietaire`) REFERENCES `client` (`idC`),
  CONSTRAINT `fk_document_secretaire` FOREIGN KEY (`secretaire`) REFERENCES `secretaire` (`idS`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la vue secretary. documentclient
-- Création d'une table temporaire pour palier aux erreurs de dépendances de VIEW
CREATE TABLE `documentclient` (
	`idC` INT(11) NOT NULL,
	`nomC` VARCHAR(200) NOT NULL COLLATE 'latin1_swedish_ci',
	`descriptionC` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`email` VARCHAR(200) NOT NULL COLLATE 'latin1_swedish_ci',
	`dateInsc` VARCHAR(200) NOT NULL COLLATE 'latin1_swedish_ci',
	`telephone` VARCHAR(25) NOT NULL COLLATE 'latin1_swedish_ci',
	`etat` INT(11) NOT NULL,
	`idD` INT(11) NOT NULL,
	`titre` VARCHAR(200) NOT NULL COLLATE 'latin1_swedish_ci',
	`dateDeb` VARCHAR(200) NOT NULL COLLATE 'latin1_swedish_ci',
	`delai` VARCHAR(200) NOT NULL COLLATE 'latin1_swedish_ci',
	`description` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`secretaire` INT(11) NOT NULL,
	`etatD` INT(11) NOT NULL,
	`proprietaire` INT(11) NOT NULL
) ENGINE=MyISAM;

-- Listage de la structure de la table secretary. secretaire
CREATE TABLE IF NOT EXISTS `secretaire` (
  `idS` int(11) NOT NULL AUTO_INCREMENT,
  `nomS` varchar(200) CHARACTER SET latin1 NOT NULL,
  `etatS` int(11) NOT NULL,
  `dateAjout` varchar(200) CHARACTER SET latin1 NOT NULL,
  `emailS` varchar(200) NOT NULL,
  `telephoneS` varchar(200) NOT NULL,
  `descriptionS` text NOT NULL,
  PRIMARY KEY (`idS`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table secretary. utilisateurs
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text CHARACTER SET latin1 NOT NULL,
  `password` text CHARACTER SET latin1 NOT NULL,
  `etat` int(11) NOT NULL,
  `role` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la vue secretary. documentclient
-- Suppression de la table temporaire et création finale de la structure d'une vue
DROP TABLE IF EXISTS `documentclient`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `documentclient` AS SELECT * from client,document where client.idC=document.idD ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

INSERT INTO `secretary`.`utilisateurs` (`login`, `password`, `etat`, `role`) VALUES ('defaut', 'defaut', '1', 'admin');
