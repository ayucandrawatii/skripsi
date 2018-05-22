/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.1.13-MariaDB : Database - pengaduan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pengaduan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pengaduan`;

/*Table structure for table `instansi` */

DROP TABLE IF EXISTS `instansi`;

CREATE TABLE `instansi` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `instansi` */

insert  into `instansi`(`id`,`nama`) values (1,'Sekretariat Daerah Kota Denpasar'),(2,'DPRD Kota Denpasar'),(3,'Inspektorat Kota Denpasar'),(4,'BAPPEDA Kota Denpasar'),(5,'Badan Pengelolaan Keuangan dan Aset Daerah Kota Denpasar');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id`,`nama`) values (1,'Hardware'),(2,'Software'),(3,'Jaringan');

/*Table structure for table `tabelpengaduan` */

DROP TABLE IF EXISTS `tabelpengaduan`;

CREATE TABLE `tabelpengaduan` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idInstansi` int(5) NOT NULL,
  `idKategori` int(5) NOT NULL,
  `comment` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT 'belum diproses',
  `nomorSurat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `tabelpengaduan` */

insert  into `tabelpengaduan`(`id`,`idInstansi`,`idKategori`,`comment`,`timestamp`,`status`,`nomorSurat`) values (4,1,2,'Komputer Hang Ketika Proses Shutdown','2017-09-07 16:25:04','belum diproses','801/3000/ASDF'),(5,5,1,'Kerusakan pada power supply','2017-10-13 19:52:13','belum diproses','800/3562/DKIS'),(7,2,1,'pc rusak','2017-08-22 19:13:37','belum diproses',NULL),(12,4,1,'monitor rusak','2017-07-23 10:47:51','belum diproses',NULL),(13,1,1,'monitor bluescreen','2017-06-23 10:50:19','belum diproses',NULL),(15,1,1,'monitor rusak','2017-05-23 11:46:03','belum diproses',''),(17,1,1,'speaker rusak','2017-04-23 12:29:20','belum diproses',NULL),(19,5,3,'kabel rusak','2017-03-23 12:44:26','belum diproses','321/4332/trew'),(20,1,1,'cpu rusak, monitor rusak','2017-02-23 15:39:24','status diproses',''),(21,1,1,'speaker rusak','2017-01-23 22:48:23','status diproses','111/1234/zxvv'),(22,2,2,'Shutdown berjalan sangat lambat','2017-11-30 08:44:51','belum diproses',NULL),(23,3,3,'Modem rusak','2017-10-30 08:44:51','belum diproses',NULL),(24,4,2,'Komputer Hang Ketika Proses Shutdown','2017-12-20 09:54:33','belum diproses',NULL);

/*Table structure for table `tbadmin` */

DROP TABLE IF EXISTS `tbadmin`;

CREATE TABLE `tbadmin` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbadmin` */

insert  into `tbadmin`(`id`,`username`,`password`) values (1,'admin','12345');

/*Table structure for table `tbuser` */

DROP TABLE IF EXISTS `tbuser`;

CREATE TABLE `tbuser` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbuser` */

insert  into `tbuser`(`id_user`,`username`,`password`) values (5,'candra','827ccb0eea8a706c4c34a16891f84e7b'),(6,'geby','827ccb0eea8a706c4c34a16891f84e7b'),(8,'haha','827ccb0eea8a706c4c34a16891f84e7b');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
