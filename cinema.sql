-- MariaDB dump 10.17  Distrib 10.4.10-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	10.4.10-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auditorium`
--

DROP TABLE IF EXISTS `auditorium`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditorium` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `seats_no` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditorium`
--

LOCK TABLES `auditorium` WRITE;
/*!40000 ALTER TABLE `auditorium` DISABLE KEYS */;
INSERT INTO `auditorium` VALUES (1,'Audi 1',20),(2,'Audi 2',30),(3,'Velvet Room',20);
/*!40000 ALTER TABLE `auditorium` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `synopsis` varchar(255) NOT NULL,
  `time` int(255) NOT NULL,
  `age` varchar(255) DEFAULT NULL,
  `categories` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `casts` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `posterpath` varchar(255) DEFAULT NULL,
  `coverPath` varchar(255) DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  `year` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie`
--

LOCK TABLES `movie` WRITE;
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` VALUES (2,'The Dark Knight','Batman Himself','I\'m Batman',212,'G','[\"Action\"]','[\"Batman Himself\"]','movie/img/blyatman.jpg',NULL,'https://www.youtube.com/embed/A0ruIfT4GfU',2020),(3,'Captain Marvel','Ryan Fleck','Amidst a mission, Vers, a Kree warrior, gets separated from her team and is stranded on Earth. However, her life takes an unusual turn after she teams up with Fury, a S.H.I.E.L.D. agent.',111,'G','[\"Action\",\" Sci-Fi\"]','[\"Brie Larson\",\" Gemma Chan\",\" Samuel L.Jackson\",\" Ben Mendelsohn\"]','movie/img/captainmarvel.jpg',NULL,'https://www.youtube.com/embed/0LHxvxdRnYc',NULL),(19,'Kill Bill: Volume 1','Quentin Tarantino','A pregnant assassin, code-named The Bride, goes into a coma for four years after her ex-boss Bill brutally attacks her. When she wakes up, she sets out to seek revenge on him and his associates.',120,'G','[\"Funny\",\"Weeb\",\"Gore\"]','[\"Anna\",\"Guy Fieri\"]','movie/img/killbill_cover.jpg',NULL,'https://www.youtube.com/embed/499Aiwh_If0',NULL),(20,'Stranger Things','Duffer Brothers','After the mysterious and sudden vanishing of a young boy, the people of a small town begin to uncover secrets of a government lab, portals to another world and sinister monsters.',9,'G','[\"Mystery\",\"Sci-Fi\",\"Horror\"]','[\"Millie Bobby Brown\",\"Finn Wolfhard\",\"Gaten Matarazzo\"]','movie/img/Stranger Things.jpg',NULL,NULL,NULL),(21,'The Prestige','Christopher Nolan','Two friends and fellow magicians become bitter enemies after a sudden tragedy. As they devote themselves to this rivalry, they make sacrifices that bring them fame but with terrible consequences.',220,'R','[\"Thriller\",\"Mystery\"]','[\"Christian Bale\",\"Hugh Jackman\",\"Scarlett Johansson\"]','movie/img/ThePrestige.png',NULL,'',NULL),(22,'Weathering with You','Makoto Shinkai','A boy runs away to Tokyo and befriends a girl who appears to be able to manipulate the weather.',221,'G','[\"Animation\",\"Fantasy\"]','[\"Nana Mori\",\"Kotaro Daigo\"]','movie/img/WeatheringwithYou.jpg',NULL,'',NULL),(23,'Flower Garden','Bunga Citra Lestari','qwewqweqwe',122,'PG','[\"Fantasy\"]','[\"Flower\"]','movie/img/qwe.jpg',NULL,'',NULL),(25,'Horizon Zero Dawn','Mathijs de Jonge','The plot follows Aloy, a hunter in a world overrun by machines, who sets out to uncover her past.',1908,'G','[\"Action\"]','[\"Laura van Tol\",\"Ava Potter\",\"JB Blanc\"]','movie/img/HorizonZeroDawn.jpg',NULL,'https://www.youtube.com/embed/jOpchUhyfdA',NULL),(26,'The Wolf of Wall Street','Martin Scorsese','Introduced to life in the fast lane through stockbroking, Jordan Belfort takes a hit after a Wall Street crash. He teams up with Donnie Azoff, cheating his way to the top as his relationships slide.',180,'G','[\"Funny\"]','[\"Margot Robbie\",\"Leonardo DiCaprio\",\"Jonah Hill\"]','movie/img/TheWolfofWallStreet.jpg',NULL,'https://www.youtube.com/embed/iszwuX1AK6A',NULL),(27,'Hereditary','Ari Aster','When the matriarch of the Graham family passes away, her daughter and grandchildren begin to unravel cryptic and increasingly terrifying secrets about their ancestry, trying to outrun the sinister fate they have inherited.',127,'R','[\"Horror\",\"Drama\"]','[\"Milly Shapiro\",\"Alex Wolff\",\"Toni Collette\"]','movie/img/Hereditary.jpg',NULL,'https://www.youtube.com/embed/V6wWKNij_1M',NULL);
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
  `screening_id` bigint(11) NOT NULL,
  `seat_id` bigint(20) NOT NULL,
  `user_id` bigint(11) unsigned NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`screening_id`,`seat_id`),
  KEY `seat_id` (`seat_id`),
  KEY `screening_id` (`screening_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`screening_id`) REFERENCES `screening` (`id`),
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`seat_id`) REFERENCES `seat` (`id`),
  CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (7,1,2,'2020-05-29'),(7,2,2,'2020-05-29'),(7,4,4,'2020-05-29'),(7,5,4,'2020-05-29'),(7,7,2,'2020-05-29'),(7,8,7,'2020-06-01'),(7,9,2,'2020-05-29'),(7,10,1,'2020-05-31'),(7,12,2,'2020-05-29'),(7,13,4,'2020-05-29'),(7,14,4,'2020-05-29'),(7,15,4,'2020-05-29'),(7,16,2,'2020-05-29'),(7,19,2,'2020-05-29');
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `screening`
--

DROP TABLE IF EXISTS `screening`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `screening` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `movie_id` bigint(11) NOT NULL,
  `auditorium_id` bigint(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auditorium_id` (`auditorium_id`),
  KEY `screening_ibfk_1` (`movie_id`),
  CONSTRAINT `screening_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `screening_ibfk_2` FOREIGN KEY (`auditorium_id`) REFERENCES `auditorium` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `screening`
--

LOCK TABLES `screening` WRITE;
/*!40000 ALTER TABLE `screening` DISABLE KEYS */;
INSERT INTO `screening` VALUES (7,2,1,'2020-05-29','25:11:11.000'),(8,3,2,'2020-05-29','25:00:00.000'),(9,21,1,'2020-06-01','14:18:00.000');
/*!40000 ALTER TABLE `screening` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seat`
--

DROP TABLE IF EXISTS `seat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seat` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `row` varchar(255) NOT NULL,
  `number` bigint(11) NOT NULL,
  `auditorium_id` bigint(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auditorium_id` (`auditorium_id`),
  CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`auditorium_id`) REFERENCES `auditorium` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seat`
--

LOCK TABLES `seat` WRITE;
/*!40000 ALTER TABLE `seat` DISABLE KEYS */;
INSERT INTO `seat` VALUES (1,'A',1,1),(2,'A',2,1),(3,'A',3,1),(4,'A',4,1),(5,'A',5,1),(6,'A',6,1),(7,'A',7,1),(8,'A',8,1),(9,'A',9,1),(10,'A',10,1),(11,'B',1,1),(12,'B',2,1),(13,'B',3,1),(14,'B',4,1),(15,'B',5,1),(16,'B',6,1),(17,'B',7,1),(18,'B',8,1),(19,'B',9,1),(20,'B',10,1),(21,'A',1,3),(22,'A',2,3),(23,'A',3,3),(24,'A',4,3),(25,'A',5,3),(26,'A',6,3),(27,'B',1,3),(28,'B',2,3),(29,'B',3,3),(30,'B',4,3),(31,'B',5,3),(32,'B',6,3),(33,'C',1,3),(34,'C',2,3),(35,'C',3,3),(36,'C',4,3),(37,'C',5,3),(38,'C',6,3),(39,'D',1,3),(40,'D',2,3);
/*!40000 ALTER TABLE `seat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@admin.com',NULL,'$2y$10$05hUCfrZXjaRenbfOSzJiO3JFkCVufWqeTdWK97JT/9Jsqv3MboZm','1990-02-01','4yPqaxjkx2KWYR06EbRxSdv0goMGghOnxsf8nl62hpd9HnXsSTQAUFULU3TJ','2020-05-27 20:15:18','2020-05-27 20:15:18'),(2,'aaaaa','a@a.com',NULL,'$2y$10$m8p.vXhrCr8v9c.kR3YzUeVGn1FuwBXrXc32PzdhGFow/KaYCBK8e','2000-01-16',NULL,'2020-05-16 08:22:28','2020-05-16 08:22:28'),(3,'admin3','sssssssssssssss@admin.com',NULL,'$2y$10$nz/Kwox1wwuYuF4.NHlogOLMroq9E.LWKrJ2WSLgV0Fo43qmmjatC','2020-05-18',NULL,'2020-05-17 19:07:21','2020-05-17 19:07:21'),(4,'123','123@123.com',NULL,'$2y$10$gG9JFDDkLbzfs0C7dE1N7.1qVjG3YUaaR85E0QkTohWbxHjsEGcK.','2211-11-22','UHcbrtOjkvacFBzwkfUQnWHtlzAFSXhfic8u8ibf8EeYz5fQnYon9votsNbq','2020-05-25 01:25:26','2020-05-25 01:25:26'),(5,'ffffffff','ax@ax.com',NULL,'$2y$10$d8rpACL9QEi6.J3eDJ7WxOL5kUk0GKgmmI.MuR4FrUmVICBYi/sWW','2321-12-31',NULL,'2020-05-27 00:41:26','2020-05-27 00:41:26'),(7,'Michael','michael@gmail.com',NULL,'$2y$10$7Fpv9A91aptrcbIeZxCihORA5LQDzz21hn2k6YW/HGmb60sftW6QK','2000-01-27',NULL,'2020-05-31 09:05:29','2020-05-31 09:05:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-01 16:56:55
