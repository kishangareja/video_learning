/*
SQLyog Community v13.1.4  (64 bit)
MySQL - 10.1.32-MariaDB : Database - video_learning
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`video_learning` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `video_learning`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `creation_datetime` datetime NOT NULL,
  `modification_datetime` datetime DEFAULT NULL,
  `deletion_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`admin_id`,`email_id`,`password`,`status`,`is_deleted`,`creation_datetime`,`modification_datetime`,`deletion_datetime`) values 
(1,'admin@gmail.com','202cb962ac59075b964b07152d234b70',1,0,'2019-01-25 00:08:19','2019-06-03 10:53:07',NULL);

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `creation_datetime` datetime DEFAULT NULL,
  `modification_datetime` datetime DEFAULT NULL,
  `deletion_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `contact` */

insert  into `contact`(`id`,`name`,`email`,`message`,`is_deleted`,`creation_datetime`,`modification_datetime`,`deletion_datetime`) values 
(1,'John Smith','johnsmith@gmail.com','asasasas',1,'2020-01-22 16:41:01','2020-01-22 16:41:01','2020-01-22 16:47:03'),
(2,'John Smith','johnsmith@gmail.com','this is testing',0,'2020-02-01 11:43:18','2020-02-01 11:43:18',NULL),
(3,'John Smith','johnsmith@gmail.com','this is testing',0,'2020-02-01 11:43:57','2020-02-01 11:43:57',NULL),
(4,'John Smith','johnsmith@gmail.com','this is testing',0,'2020-02-01 11:49:38','2020-02-01 11:49:38',NULL),
(5,'ktest kishan','kishan.tecksky@gmail.com','this is dev testing',0,'2020-02-13 10:26:30','2020-02-13 10:26:30',NULL);

/*Table structure for table `domains` */

DROP TABLE IF EXISTS `domains`;

CREATE TABLE `domains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start_time` time DEFAULT NULL,
  `domain_date` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `fees` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `creation_datetime` datetime NOT NULL,
  `modification_datetime` datetime NOT NULL,
  `deletion_datetime` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `end_time` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `domains` */

insert  into `domains`(`id`,`title`,`start_time`,`domain_date`,`duration`,`fees`,`image`,`is_deleted`,`creation_datetime`,`modification_datetime`,`deletion_datetime`,`status`,`end_time`) values 
(1,'PLC','07:00:00','05/30/2020 - 06/01/2020','18 Days','200','domain_4580885001590555220.jpg',0,'2020-05-27 10:23:40','2020-05-30 18:44:49','0000-00-00 00:00:00',1,'09:00:00'),
(2,'Robotics',NULL,NULL,NULL,NULL,'domain_4123087561590555244.jpg',0,'2020-05-27 10:24:04','2020-05-27 10:24:04','0000-00-00 00:00:00',1,NULL),
(3,'Website',NULL,NULL,NULL,NULL,'domain_8175291441590555257.jpg',0,'2020-05-27 10:24:10','2020-05-27 10:24:17','0000-00-00 00:00:00',1,NULL),
(4,'Apps',NULL,NULL,NULL,NULL,'domain_3125973671590555264.jpg',0,'2020-05-27 10:24:24','2020-05-27 10:24:24','0000-00-00 00:00:00',1,NULL),
(5,'j','00:00:00','j','j','j','domain_6271164831590753377.jpg',1,'2020-05-29 17:26:17','2020-05-29 17:26:17','2020-05-31 08:36:40',1,NULL);

/*Table structure for table `projects` */

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `block_diagram` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `video_link` text NOT NULL,
  `tags` varchar(255) NOT NULL,
  `componet_nodes` varchar(255) NOT NULL,
  `software_link` varchar(255) NOT NULL,
  `related_document` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `creation_datetime` datetime NOT NULL,
  `modification_datetime` datetime NOT NULL,
  `deletion_datetime` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `projects` */

insert  into `projects`(`id`,`domain_id`,`name`,`block_diagram`,`description`,`video_link`,`tags`,`componet_nodes`,`software_link`,`related_document`,`images`,`is_deleted`,`creation_datetime`,`modification_datetime`,`deletion_datetime`,`status`) values 
(1,2,'test','block_diagram_9494368631591078476.jpg','test','http://localhost/dotcreative/admin/project/add/','1,2,3,4','','http://localhost/dotcreative/admin/project/add/','related_document_6651274681591078476.jpg','[\"image_1475933981591078476.jpg\",\"image_5270362551591078476.jpg\",\"image_3389383821591078476.jpg\",\"image_4491857291591078476.jpg\"]',0,'2020-06-02 11:44:36','2020-06-02 11:44:36','0000-00-00 00:00:00',1);

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `creation_datetime` datetime NOT NULL,
  `modification_datetime` datetime NOT NULL,
  `deletion_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tags` */

insert  into `tags`(`id`,`name`,`status`,`is_deleted`,`creation_datetime`,`modification_datetime`,`deletion_datetime`) values 
(1,'Plateforms',1,0,'2020-05-31 10:00:40','2020-05-31 10:01:00','0000-00-00 00:00:00'),
(2,'Technology',1,0,'2020-05-31 10:01:29','2020-05-31 10:01:29','0000-00-00 00:00:00'),
(3,'Keywords',1,0,'2020-05-31 10:01:35','2020-05-31 10:01:35','0000-00-00 00:00:00'),
(4,'Component',1,0,'2020-05-31 10:01:42','2020-05-31 10:01:42','0000-00-00 00:00:00'),
(5,'I',1,0,'2020-06-05 08:57:36','2020-06-05 08:57:36','0000-00-00 00:00:00');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL COMMENT '1=active',
  `required_seats` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waitlist` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL COMMENT '1=deleted',
  `creation_datetime` datetime NOT NULL,
  `modification_datetime` datetime NOT NULL,
  `deletion_datetime` datetime DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

/*Data for the table `users` */

insert  into `users`(`user_id`,`fname`,`lname`,`title`,`company`,`email`,`phone`,`service_id`,`service_code`,`status`,`required_seats`,`waitlist`,`is_deleted`,`creation_datetime`,`modification_datetime`,`deletion_datetime`,`state`) values 
(1,'655665','6545','Lorem ipsum dolor sit amet,','','6546@test.com','545655',209,'952039',0,'',0,0,'2020-01-22 12:28:07','2020-01-22 12:28:07',NULL,''),
(2,'655665','6545','Lorem ipsum dolor sit amet,','','6546@test.com','545655',209,'952039',0,'',0,0,'2020-01-22 12:28:15','2020-01-22 12:28:15',NULL,''),
(3,'655665','6545','Lorem ipsum dolor sit amet,','','6546@test.com','545655',209,'952039',0,'1',1,0,'2020-01-22 12:28:55','2020-01-22 12:28:55',NULL,''),
(4,'655665','6545','Lorem ipsum dolor sit amet,','','6546@test.com','545655',207,'2222',0,'',0,0,'2020-01-22 12:29:15','2020-01-22 12:29:15',NULL,''),
(5,'655665','6545','Lorem ipsum dolor sit amet,','','6546@test.com','545655',207,'2222',0,'',0,0,'2020-01-22 12:29:22','2020-01-22 12:29:22',NULL,''),
(6,'655665','6545','Lorem ipsum dolor sit amet,','','6546@test.com','545655',209,'952039',0,'1',1,0,'2020-01-22 12:29:41','2020-01-22 12:29:41',NULL,''),
(7,'655665','6545','Lorem ipsum dolor sit amet,','test 123','6546@test.com','545655',209,'952039',0,'1',1,0,'2020-01-22 12:31:22','2020-01-22 12:31:22',NULL,''),
(8,'John','Smith','Lorem ipsum dolor sit amet,','test 123','johnsmith@gmail.com','226262626',209,'952039',0,'1',1,0,'2020-01-23 11:28:51','2020-01-23 11:28:51',NULL,''),
(9,'John','Smith','Lorem ipsum dolor sit amet,','test 123','johnsmith@gmail.com','226262626',209,'952039',0,'1',1,0,'2020-01-23 11:30:18','2020-01-23 11:30:18',NULL,''),
(10,'John','Smith','','','johnsmith@gmail.com','226262626',209,'952039',0,'2',1,0,'2020-01-30 10:17:26','2020-01-30 10:17:26',NULL,''),
(11,'Dinesh','Ninave','','','dinesh.ninave88@gmail.com','545655',209,'952039',0,'1',1,0,'2020-01-31 10:42:39','2020-01-31 10:42:39',NULL,''),
(12,'John','Smith','Lorem ipsum dolor sit amet,','test 123','johnsmith@gmail.com','+44226262626',207,'2222',0,'',0,0,'2020-01-31 10:43:14','2020-01-31 10:43:14',NULL,''),
(13,'Dinesh','Ninave','Lorem ipsum dolor sit amet,','test 123','dinesh.ninave88@gmail.com','545655',207,'2222',0,'',0,0,'2020-01-31 10:44:01','2020-01-31 10:44:01',NULL,''),
(14,'Dinesh','Ninave','Lorem ipsum dolor sit amet,','test 123','dinesh.ninave88@gmail.com','545655',207,'2222',0,'',0,0,'2020-01-31 11:17:49','2020-01-31 11:17:49',NULL,'GUJARAT'),
(15,'ktest','kishan','','','kishan@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-01 10:18:56','2020-02-01 10:18:56',NULL,''),
(16,'kishan','gareja','','','kishan.tecksky@gmail.com','(987) 654-3210',209,'952039',0,'3',1,0,'2020-02-01 11:33:34','2020-02-01 11:33:34',NULL,''),
(17,'kishan','gareja','','','kishan.tecksky@gmail.com','(987) 654-3210',209,'952039',0,'3',1,0,'2020-02-01 11:35:44','2020-02-01 11:35:44',NULL,''),
(18,'ktest','kishan','','','kishan.tecksky@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-01 11:37:56','2020-02-01 11:37:56',NULL,''),
(19,'ktest','kishan','','','kishangareja1994@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-01 11:40:50','2020-02-01 11:40:50',NULL,''),
(20,'kishan','sasasasa','','','kishangareja1994@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-01 11:41:49','2020-02-01 11:41:49',NULL,''),
(21,'Dinesh','Ninave','','','dinesh.ninave88@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-01 11:56:33','2020-02-01 11:56:33',NULL,''),
(22,'Dinesh','Ninave','','','kishan.tecksky@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-01 11:58:51','2020-02-01 11:58:51',NULL,''),
(23,'Dinesh','Ninave','','','kishan.tecksky@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-01 12:01:18','2020-02-01 12:01:18',NULL,''),
(24,'Dinesh','Ninave','','','kishan.tecksky@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-01 12:02:15','2020-02-01 12:02:15',NULL,''),
(25,'Dinesh','Ninave','','','kishan.tecksky@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-01 12:06:17','2020-02-01 12:06:17',NULL,''),
(26,'Dinesh','Ninave','','','kishan.tecksky@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-01 12:08:36','2020-02-01 12:08:36',NULL,''),
(27,'655665','6545','','','6546@test.com','(545) 655',209,'952039',0,'1',1,0,'2020-02-01 13:49:43','2020-02-01 13:49:43',NULL,''),
(28,'John','Ninave','','','kishan.tecksky@gmail.com','(987) 656-4213',209,'952039',0,'1',1,0,'2020-02-07 09:54:55','2020-02-07 09:54:55',NULL,''),
(29,'John','Smith','','','kishan.tecksky@gmail.com','(897) 654-3121',209,'952039',0,'1',1,0,'2020-02-08 07:39:00','2020-02-08 07:39:00',NULL,''),
(30,'John','Smith','','','kishan.tecksky@gmail.com','(879) 849-5431',209,'952039',0,'1',1,0,'2020-02-08 07:42:28','2020-02-08 07:42:28',NULL,''),
(31,'John','Smith','','','kishan.tecksky@gmail.com','(879) 849-5431',209,'952039',0,'1',1,0,'2020-02-08 07:42:29','2020-02-08 07:42:29',NULL,''),
(32,'ktest','kishan','','','kishan.tecksky@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-13 10:06:02','2020-02-13 10:06:02',NULL,''),
(33,'ktest','kishan','','','kishangareja241@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-13 10:12:47','2020-02-13 10:12:47',NULL,''),
(34,'ktest','kishan','','','kishan.tecksky@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-13 10:14:45','2020-02-13 10:14:45',NULL,''),
(35,'ktest','kishan','','','kishan.tecksky@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-13 10:16:04','2020-02-13 10:16:04',NULL,''),
(36,'ktest','kishan','','','kishan.tecksky@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-13 10:18:04','2020-02-13 10:18:04',NULL,''),
(37,'ktest','kishan','','','kishan.tecksky@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-13 10:19:00','2020-02-13 10:19:00',NULL,''),
(38,'ktest','kishan','','','kishangareja241@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-13 10:21:06','2020-02-13 10:21:06',NULL,''),
(39,'Dinesh','Ninave','','','dinesh.ninave88@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-13 10:22:06','2020-02-13 10:22:06',NULL,''),
(40,'kishan gareja','kishan','','','kishangareja241@gmail.com','(968) 731-1505',209,'952039',0,'1',1,0,'2020-02-14 08:48:07','2020-02-14 08:48:07',NULL,''),
(41,'krupa ','pandit','','','kishangareja241@gmail.com','(814) 117-6098',209,'952039',0,'1',1,0,'2020-02-14 09:06:47','2020-02-14 09:06:47',NULL,'');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
