/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.19-MariaDB : Database - db_simlapd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_simlapd` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_simlapd`;

/*Table structure for table `tb_detail_spt` */

DROP TABLE IF EXISTS `tb_detail_spt`;

CREATE TABLE `tb_detail_spt` (
  `detailsptId` int(11) NOT NULL AUTO_INCREMENT,
  `detailsptKodeSpt` varchar(20) DEFAULT NULL,
  `detailsptNip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`detailsptId`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `tb_detail_spt` */

insert  into `tb_detail_spt`(`detailsptId`,`detailsptKodeSpt`,`detailsptNip`) values 
(16,'SPT20210723042040001','123456789'),
(17,'SPT20210723042241203','1234567890'),
(27,'SPT20210724025003204','123456789'),
(28,'SPT20210724025003204','1234567890'),
(29,'SPT20210724025003204','1234567894'),
(30,'SPT20210724025003204','1234567891'),
(31,'SPT20210725053737205','123456789'),
(32,'SPT20210725093208205','1234567894'),
(33,'SPT20210725093208205','1234567892');

/*Table structure for table `tb_keberangkatan` */

DROP TABLE IF EXISTS `tb_keberangkatan`;

CREATE TABLE `tb_keberangkatan` (
  `keberangkatanKode` varchar(20) NOT NULL,
  `keberangkatanSpt` varchar(20) DEFAULT NULL,
  `keberangkatanTujuan` int(11) DEFAULT NULL,
  `keberangkatanJangkaWaktu` varchar(20) DEFAULT NULL,
  `keberangkatanTanggalMulai` date DEFAULT NULL,
  `keberangkatanTanggalSelesai` date DEFAULT NULL,
  PRIMARY KEY (`keberangkatanKode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_keberangkatan` */

insert  into `tb_keberangkatan`(`keberangkatanKode`,`keberangkatanSpt`,`keberangkatanTujuan`,`keberangkatanJangkaWaktu`,`keberangkatanTanggalMulai`,`keberangkatanTanggalSelesai`) values 
('K001','SPT20210724025003204',15,'1','2021-07-23','2021-07-24'),
('K002','SPT20210723042241203',17,'1','2021-07-24','2021-07-25');

/*Table structure for table `tb_pegawai` */

DROP TABLE IF EXISTS `tb_pegawai`;

CREATE TABLE `tb_pegawai` (
  `pegawaiNip` varchar(20) NOT NULL,
  `pegawaiNama` varchar(100) DEFAULT NULL,
  `pegawaiJabatan` varchar(100) DEFAULT NULL,
  `pegawaiGolongan` varchar(100) DEFAULT NULL,
  `pegawaiAlamat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pegawaiNip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pegawai` */

insert  into `tb_pegawai`(`pegawaiNip`,`pegawaiNama`,`pegawaiJabatan`,`pegawaiGolongan`,`pegawaiAlamat`) values 
('123456789','Rahman Deswanda','Kadiv Humas','5','Jalan Ujung Gurun'),
('1234567890','Arif Rahman','Kadiv IT','4','Jl. Cempaka 14'),
('1234567891','Affan Yulizar','Anggota Divisi Humas','5','Jalan Empedu 17'),
('1234567892','Yasir Arafat','Anggota Divisi IT','4','Jalan Merdeka 2'),
('1234567894','Farid Ansyari Deva','Kadiv Penerangan','4','Jl. Perkutut 16');

/*Table structure for table `tb_pembiayaan` */

DROP TABLE IF EXISTS `tb_pembiayaan`;

CREATE TABLE `tb_pembiayaan` (
  `pembiayaanKode` varchar(20) NOT NULL,
  `pembiayaanKodeBerangkat` varchar(20) DEFAULT NULL,
  `pembiayaanPokok` int(11) DEFAULT NULL,
  `pembiayaanTransportasi` int(11) DEFAULT NULL,
  `pembiayaanPenginapan` int(11) DEFAULT NULL,
  `pembiayaanLainLain` int(11) DEFAULT NULL,
  `pembiayaanTotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`pembiayaanKode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pembiayaan` */

insert  into `tb_pembiayaan`(`pembiayaanKode`,`pembiayaanKodeBerangkat`,`pembiayaanPokok`,`pembiayaanTransportasi`,`pembiayaanPenginapan`,`pembiayaanLainLain`,`pembiayaanTotal`) values 
('P001','K001',50000,100000,100000,100000,350000),
('P002','K002',10000,1000,1000,100,12100);

/*Table structure for table `tb_sppd` */

DROP TABLE IF EXISTS `tb_sppd`;

CREATE TABLE `tb_sppd` (
  `sppdKode` varchar(20) NOT NULL,
  `sppdSpt` varchar(20) DEFAULT NULL,
  `sppdKendaraan` varchar(100) DEFAULT NULL,
  `sppdLainLain` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sppdKode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_sppd` */

insert  into `tb_sppd`(`sppdKode`,`sppdSpt`,`sppdKendaraan`,`sppdLainLain`) values 
('SPPD-2021-26001','SPT20210724025003204','Kendaraan Dinas',''),
('SPPD-2021-26002','SPT20210723042241203','Kendaraan Dinas','');

/*Table structure for table `tb_spt` */

DROP TABLE IF EXISTS `tb_spt`;

CREATE TABLE `tb_spt` (
  `sptKode` varchar(20) NOT NULL,
  `sptTanggal` timestamp NULL DEFAULT NULL,
  `sptAgenda` varchar(255) DEFAULT NULL,
  `sptTanggalKegiatan` date DEFAULT NULL,
  PRIMARY KEY (`sptKode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_spt` */

insert  into `tb_spt`(`sptKode`,`sptTanggal`,`sptAgenda`,`sptTanggalKegiatan`) values 
('SPT20210723042241203','2021-07-23 16:22:52','Perayaan HUT RI ke 73 di Istana Negara','2021-07-23'),
('SPT20210724025003204','2021-07-25 23:55:05','Dalam rangka melaksanakan verifikasi benih cengkeh pada kegiatan perluasan tanaham cengkeh ke Kabupaten Solok pada tanggal 24 Juli 2021.','2021-07-24'),
('SPT20210725093208205','2021-07-26 09:32:58','Dalam rangka push rank mobile legend push mytic 2021','2021-07-26');

/*Table structure for table `tb_temp` */

DROP TABLE IF EXISTS `tb_temp`;

CREATE TABLE `tb_temp` (
  `tempId` int(11) NOT NULL AUTO_INCREMENT,
  `tempKodeSpt` varchar(20) DEFAULT NULL,
  `tempNip` varchar(20) DEFAULT NULL,
  `tempUserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`tempId`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

/*Data for the table `tb_temp` */

/*Table structure for table `tb_tujuan` */

DROP TABLE IF EXISTS `tb_tujuan`;

CREATE TABLE `tb_tujuan` (
  `tujuanId` int(11) NOT NULL AUTO_INCREMENT,
  `tujuanNamaTempat` varchar(100) DEFAULT NULL,
  `tujuanKota` varchar(100) DEFAULT NULL,
  `tujuanProvinsi` varchar(100) DEFAULT NULL,
  `tujuanAlamat` varchar(255) DEFAULT NULL,
  `tujuanNoTelp` varchar(20) DEFAULT NULL,
  `tujuanPimpinan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tujuanId`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `tb_tujuan` */

insert  into `tb_tujuan`(`tujuanId`,`tujuanNamaTempat`,`tujuanKota`,`tujuanProvinsi`,`tujuanAlamat`,`tujuanNoTelp`,`tujuanPimpinan`) values 
(15,'Kebun Binatang','Bukittinggi','Sumatera Barat','Jl. Anggrek 21','0891324298899','Yasir Arafat'),
(16,'Museum','Padang','Sumatera Barat','Jl. Melati 21','0899424536421','Yasir Arafat'),
(17,'Hotel','Solok','Sumatera Barat','Jl. Mawar 18','0942984242523','Ayyub Zikri'),
(19,'Kantor Gubernur','Padang','Sumatera Barat','Jl. Tulip 20','08988984131','Yasir Arafat');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(100) DEFAULT NULL,
  `userNama` varchar(100) DEFAULT NULL,
  `userPassword` varchar(100) DEFAULT NULL,
  `userLevel` int(1) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`userId`,`userEmail`,`userNama`,`userPassword`,`userLevel`) values 
(6,'rahmandeswanda@gmail.com','Rahman Deswanda','$2y$10$XB3MfB7Lb/APoiXmOPBo7.DkrEngkomjlovQhiYVM2y68JC4feoTK',1),
(7,'superadmin@gmail.com','Super Admin','$2y$10$dScVRBtXCJPT5D2QuRMC.uw0Muy4G3AmD5HxiFuXWgFAC3wY/mkiu',0),
(9,'adminpertama@gmail.com','Admin Pertama','$2y$10$RsiJCB61BShM2oI4TckH6uHKxYpRCv1IM.P2dKfg7LRAzYkLunqYq',1),
(10,'adminkedua@gmail.com','Admin Kedua','$2y$10$TrBmiEQRfWSJKBSM7EIj9.ZVt2N.EMV9YEcWOxznlUJ7fFb0dFtIi',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
