DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES
(1,'user','12345','2016-08-26 08:56:00');
UNLOCK TABLES;



DROP TABLE IF EXISTS `device`;
CREATE TABLE `device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` smallint(4) unsigned NOT NULL,
  `chanel_number` enum('1','2','3') NOT NULL,
  `time_sanitization` date NOT NULL,
  `time_interval` time DEFAULT NULL,
  `configuration` enum('HW_BASE','HW_PLUMBING','HW_MIXER_1FM','HW_MIXER_4FM') NOT NULL,
  `fluid resistance_1` tinyint(1) NOT NULL,
  `fluid resistance_2` tinyint(1) NOT NULL,
  `water_volume_stage_1` smallint(2) NOT NULL,
  `water_volume_stage_2` smallint(2) NOT NULL,
  `water_volume_stage_3` smallint(2) NOT NULL,
  `holding_time_stage_2` smallint(2) NOT NULL,
  `concentrate_volume` smallint(2) NOT NULL,
  `water_volume` smallint(2) NOT NULL,
  `pump_capacity_1` smallint(2) NOT NULL,
  `pump_capacity_2` smallint(2) NOT NULL,
  `flowmeter_performance_1` smallint(2) NOT NULL,
  `flowmeter_performance_2` smallint(2) NOT NULL,
  `flowmeter_performance_3` smallint(2) NOT NULL,
  `flowmeter_performance_4` smallint(2) NOT NULL,
  `UTC_deviation` smallint(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

LOCK TABLES `device` WRITE;
INSERT INTO `device` VALUES
  (1,1,'1','2016-08-26','06:00:00','HW_BASE',16,18,5000,6000,8000,120,400,4000,10,15,1800,2200,1500,2000,120,'2016-08-28 14:11:15'),
  (2,1,'1','2016-08-27','06:00:00','HW_BASE',16,18,5000,6000,8000,120,400,4000,10,15,1800,2200,1500,2000,120,'2016-08-28 14:11:15'),
  (3,1,'1','2016-08-27','12:00:00','HW_MIXER_4FM',16,18,3000,4000,5000,120,600,4000,10,15,1800,2200,1500,2000,120,'2016-08-28 14:11:15'),
  (4,1,'1','2016-08-27','12:00:00','HW_MIXER_4FM',16,18,3000,4000,5000,120,600,4000,10,15,1800,2200,1500,2000,120,'2016-08-28 14:11:15'),
  (5,1,'1','2016-08-28','24:00:00','HW_PLUMBING',16,18,5000,6000,8000,120,700,4000,10,15,1800,2200,1500,2000,120,'2016-08-28 14:11:15');
UNLOCK TABLES;


DROP TABLE IF EXISTS `user_device`;
CREATE TABLE `user_device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `installation_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `installation_address` varchar(64) NOT NULL,
  `inventory_number` varchar(16) NOT NULL,
  `responsible_person` varchar(45) NOT NULL,
  `person_id` int(11) NOT NULL,
  `device_id` smallint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inventory_number_UNIQUE` (`inventory_number`),
  KEY `person_id` (`person_id`),
  CONSTRAINT `user_device_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


LOCK TABLES `user_device` WRITE;
INSERT INTO `user_device` VALUES 
(1,'2016-07-25 21:00:00.000000','г. Харьков, проспект Науки, 17','01 0001','Ivan Ivanov',1,1,'2016-07-26 09:00:00');
UNLOCK TABLES;



