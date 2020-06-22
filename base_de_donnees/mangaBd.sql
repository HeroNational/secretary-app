/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.13-MariaDB : Database - manga
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`manga` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `manga`;

/*Table structure for table `client` */

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `idC` int(11) NOT NULL AUTO_INCREMENT,
  `nomC` varchar(200) CHARACTER SET latin1 NOT NULL,
  `descriptionC` text CHARACTER SET latin1 NOT NULL,
  `email` varchar(200) CHARACTER SET latin1 NOT NULL,
  `dateInsc` varchar(200) CHARACTER SET latin1 NOT NULL,
  `telephone` varchar(25) CHARACTER SET latin1 NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`idC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `client` */

/*Table structure for table `document` */

DROP TABLE IF EXISTS `document`;

CREATE TABLE `document` (
  `idD` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) CHARACTER SET latin1 NOT NULL,
  `dateDeb` varchar(200) CHARACTER SET latin1 NOT NULL,
  `delai` varchar(200) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `secretaire` int(11) NOT NULL,
  `etatD` int(11) NOT NULL,
  `proprietaire` int(11) NOT NULL,
  PRIMARY KEY (`idD`),
  KEY `fk_document_proprietaire` (`proprietaire`),
  KEY `fk_document_secretaire` (`secretaire`),
  CONSTRAINT `fk_document_proprietaire` FOREIGN KEY (`proprietaire`) REFERENCES `client` (`idC`),
  CONSTRAINT `fk_document_secretaire` FOREIGN KEY (`secretaire`) REFERENCES `secretaire` (`idS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `document` */

/*Table structure for table `secretaire` */

DROP TABLE IF EXISTS `secretaire`;

CREATE TABLE `secretaire` (
  `idS` int(11) NOT NULL AUTO_INCREMENT,
  `nomS` varchar(200) CHARACTER SET latin1 NOT NULL,
  `etatS` int(11) NOT NULL,
  `dateAjout` varchar(200) CHARACTER SET latin1 NOT NULL,
  `emailS` varchar(200) NOT NULL,
  `telephoneS` varchar(200) NOT NULL,
  `descriptionS` text NOT NULL,
  PRIMARY KEY (`idS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `secretaire` */

/*Table structure for table `utilisateurs` */

DROP TABLE IF EXISTS `utilisateurs`;

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text CHARACTER SET latin1 NOT NULL,
  `password` text CHARACTER SET latin1 NOT NULL,
  `etat` int(11) NOT NULL,
  `role` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `utilisateurs` */

insert  into `utilisateurs`(`id`,`login`,`password`,`etat`,`role`) values (1,'defaut','defaut',1,'admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
