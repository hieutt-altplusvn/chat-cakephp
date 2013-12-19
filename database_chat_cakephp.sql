/*
SQLyog Ultimate v8.71 
MySQL - 5.5.35-log : Database - chat_cakephp
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`chat_cakephp` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `chat_cakephp`;

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `is_actived` int(1) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `messages` */

insert  into `messages`(`message_id`,`message`,`user_id`,`room_id`,`username`,`time`,`update_time`,`is_actived`) values (1,'sfsdfsdfsdfsd',2,1,'demo',1387445587,1387445701,1),(2,'erdd',2,1,'demo',1387445707,1387448091,1),(3,'asd',2,1,'demo',1387445728,1387446543,0),(4,'a',1,1,'admin',1387446260,1387446703,0),(5,'a',1,1,'admin',1387446750,1387446762,0),(6,'a',2,1,'demo',1387448081,1387448084,0),(7,'ad',2,1,'demo',1387448095,1387448868,0),(8,'a',2,1,'demo',1387448199,1387448875,1),(9,'a',2,1,'demo',1387448359,1387448865,0),(10,'d',2,1,'demo',1387448562,1387448609,0),(11,'b',2,1,'demo',1387448877,1387448877,1),(12,'a',1,1,'admin',1387449306,1387449308,0);

/*Table structure for table `rooms` */

DROP TABLE IF EXISTS `rooms`;

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `rooms` */

insert  into `rooms`(`room_id`,`name`,`user_id`,`created_by`,`time`,`update_time`) values (1,'demo for fun o||o',1,'admin',1387435552,1387435552),(2,'testing order',1,'admin',1387435729,1387435729),(3,'redirect room',1,'admin',1387449274,1387449274);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_actived` int(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci CHECKSUM=1;

/*Data for the table `users` */

insert  into `users`(`user_id`,`username`,`password`,`email`,`is_actived`) values (1,'admin','9a2afef75ebc5e369979e3d7456aa49f8a675bc5','admin@local.host',NULL),(2,'demo','5a05b6bc31218fa4e9bd88fcafd7c42a97399e2d','demo@demo.com',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
