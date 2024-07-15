-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: laravel-inventory-system
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_05_27_065142_create_tbl_customer_table',1),(5,'2024_05_28_101158_create_tbl_orders_table',2),(6,'2024_05_28_102209_create_tbl_product_table',3),(7,'2024_05_28_102017_create_tbl_orderdetail_table',4),(8,'2024_05_28_103221_create_tbl_expances_table',5),(9,'2024_05_28_103411_create_tbl_payment_table',6),(10,'2024_05_28_103740_create_tbl_refund_table',7),(11,'2024_05_28_103954_create_tbl_income_table',8),(12,'2024_06_02_114328_create_tbl_orders',9),(13,'2024_06_02_114408_create_tbl_orderdetail',9),(14,'2024_06_02_114544_create_tbl_orderdetail',10),(15,'2024_06_04_111539_create_order_view',11),(16,'2024_06_05_073545_create_order_view',12),(17,'2024_06_08_063738__create_tbl_payment',13),(18,'2024_06_12_070250_create_products_orderdetails_view',14),(19,'2024_06_12_071030_create_products_orderdetails_view',15),(20,'2024_06_12_071207_create_products_orderdetails_view',16),(21,'2024_06_25_053533_create_order_view',17),(22,'2024_07_06_064741_create_tbl_company',18),(23,'2024_07_10_065033_create_product_price_view',19),(24,'2024_07_10_065033_create_product_price_view copy',20),(25,'2024_07_10_070507_create_product_price_view copy',21),(26,'2024_07_10_070808_create_product_price_view',22),(27,'2024_07_10_071559_create_product_price_view',23),(28,'2024_07_10_073725_create_product_price_view',24);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `order_view`
--

DROP TABLE IF EXISTS `order_view`;
/*!50001 DROP VIEW IF EXISTS `order_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `order_view` AS SELECT
 1 AS `Order_ID`,
  1 AS `Customer_ID`,
  1 AS `O_Description`,
  1 AS `O_Date`,
  1 AS `Customer_Name`,
  1 AS `Address`,
  1 AS `OrderDetail_IDs`,
  1 AS `OrderPrices`,
  1 AS `OrderUnits`,
  1 AS `ProductNames`,
  1 AS `ProductBarcodes`,
  1 AS `TotalPrice` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
INSERT INTO `password_reset_tokens` VALUES ('admin@gmail.com','$2y$12$8RSYgJjV/MSvQgQM1949geipM827YOm0d7TrygFNZZX.ydOmFS.pG','2024-06-24 01:42:17'),('emransultanzai99@gmail.com','$2y$12$bZ6GaiGaDBsboJ189mrwc.LIu5CeEvJIkVCnqnesuqC3LnG93OW.2','2024-06-24 03:34:13');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `product_price_view`
--

DROP TABLE IF EXISTS `product_price_view`;
/*!50001 DROP VIEW IF EXISTS `product_price_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `product_price_view` AS SELECT
 1 AS `id`,
  1 AS `P_Name`,
  1 AS `P_Price`,
  1 AS `O_unit`,
  1 AS `latest_order_date` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('r0lcdMBPVjJIQKi7YyxOZbW4EmRNB5qv1rK0YWSe',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSzJ1SjlnQ2V4R3dyejg5OXlrQWhJZExDdUc0NTlQTGV4R3B5NXpQNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=',1721030993),('suD1A6hfgzYPVGxVOHa3sayEzJGB1vyedZCyHmhG',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZjBKclUxcjVnemtzS3ZXYVhnc1QxRGlMMFh1QlZCTEtuTzJBYmpWMCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9',1721038052);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_company`
--

DROP TABLE IF EXISTS `tbl_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_company` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `C_Name` varchar(255) NOT NULL,
  `C_Phone` varchar(255) NOT NULL,
  `C_Description` varchar(255) DEFAULT NULL,
  `C_Amount` int(11) NOT NULL,
  `C_Status` varchar(255) NOT NULL,
  `C_Type` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_company`
--

LOCK TABLES `tbl_company` WRITE;
/*!40000 ALTER TABLE `tbl_company` DISABLE KEYS */;
INSERT INTO `tbl_company` VALUES (1,'META BAR Company','4465434','asdasda',5000,'Completed','Cash','2024-07-10','2024-07-15'),(2,'Geek Bar 15K company','5465165154','asas',500,'Completed','ZELLE','2024-07-11','2024-07-15'),(7,'fff','1111','sadad',1000,'Completed','Cash','2024-07-16','2024-07-15'),(8,'zzxa','1233','asdad',1000,'Completed','Cash','2024-07-17','2024-07-15'),(9,'AVC','123',NULL,222,'Completed','Cash','2024-07-15','2024-07-15');
/*!40000 ALTER TABLE `tbl_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_customer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Balance` double NOT NULL DEFAULT 0,
  `Phone` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_customer`
--

LOCK TABLES `tbl_customer` WRITE;
/*!40000 ALTER TABLE `tbl_customer` DISABLE KEYS */;
INSERT INTO `tbl_customer` VALUES (1,'Emran','1650 undercliff avenue',0,'12312512123125','2024-07-11 07:09:59','2024-07-11'),(2,'Alex','ABC',220,'4564621651','2024-07-14 00:36:18','2024-07-11');
/*!40000 ALTER TABLE `tbl_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_expances`
--

DROP TABLE IF EXISTS `tbl_expances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_expances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `E_Name` varchar(255) NOT NULL,
  `E_Descriptio` varchar(255) NOT NULL,
  `E_Amount` int(11) NOT NULL,
  `E_Date` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_expances`
--

LOCK TABLES `tbl_expances` WRITE;
/*!40000 ALTER TABLE `tbl_expances` DISABLE KEYS */;
INSERT INTO `tbl_expances` VALUES (1,'NEW','Testing insertion data',2000,'2024-07-14','2024-07-14 01:02:25','2024-07-14'),(2,'Emran','Testing insertion data',2000,'2024-07-14','2024-07-14 01:02:33','2024-07-14'),(3,'NEW','Testing insertion data',2000,'2024-07-14','2024-07-14 01:02:42','2024-07-14');
/*!40000 ALTER TABLE `tbl_expances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_orderdetail`
--

DROP TABLE IF EXISTS `tbl_orderdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_orderdetail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `O_Price` double NOT NULL,
  `O_unit` int(11) NOT NULL,
  `Order_ID` bigint(20) unsigned NOT NULL,
  `Product_ID` bigint(20) unsigned NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `tbl_orderdetail_order_id_foreign` (`Order_ID`),
  KEY `tbl_orderdetail_product_id_foreign` (`Product_ID`),
  CONSTRAINT `tbl_orderdetail_order_id_foreign` FOREIGN KEY (`Order_ID`) REFERENCES `tbl_orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_orderdetail_product_id_foreign` FOREIGN KEY (`Product_ID`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_orderdetail`
--

LOCK TABLES `tbl_orderdetail` WRITE;
/*!40000 ALTER TABLE `tbl_orderdetail` DISABLE KEYS */;
INSERT INTO `tbl_orderdetail` VALUES (1,20,5,1,2,'2024-07-11'),(2,20,5,1,1,'2024-07-11'),(3,20,1,2,1,'2024-07-14');
/*!40000 ALTER TABLE `tbl_orderdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_orders`
--

DROP TABLE IF EXISTS `tbl_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `O_Description` text DEFAULT NULL,
  `O_Date` date DEFAULT current_timestamp(),
  `Customer_ID` bigint(20) unsigned NOT NULL,
  `updated_at` date DEFAULT current_timestamp(),
  `created_at` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `tbl_orders_customer_id_foreign` (`Customer_ID`),
  CONSTRAINT `tbl_orders_customer_id_foreign` FOREIGN KEY (`Customer_ID`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_orders`
--

LOCK TABLES `tbl_orders` WRITE;
/*!40000 ALTER TABLE `tbl_orders` DISABLE KEYS */;
INSERT INTO `tbl_orders` VALUES (1,'Mix flavor,','2024-07-11',2,'2024-07-11','2024-07-11'),(2,NULL,'2024-07-14',2,'2024-07-14','2024-07-14');
/*!40000 ALTER TABLE `tbl_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_payment`
--

DROP TABLE IF EXISTS `tbl_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_payment` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `P_Amount` int(11) NOT NULL,
  `P_Remining` double NOT NULL,
  `P_Type` varchar(255) NOT NULL,
  `P_Status` varchar(255) NOT NULL,
  `P_Date` date NOT NULL DEFAULT current_timestamp(),
  `Order_ID` bigint(20) unsigned NOT NULL,
  `Customer_ID` bigint(20) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT current_timestamp(),
  `created_at` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `tbl_payment_order_id_foreign` (`Order_ID`),
  KEY `tbl_payment_customer_id_foreign` (`Customer_ID`),
  CONSTRAINT `tbl_payment_customer_id_foreign` FOREIGN KEY (`Customer_ID`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_payment_order_id_foreign` FOREIGN KEY (`Order_ID`) REFERENCES `tbl_orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_payment`
--

LOCK TABLES `tbl_payment` WRITE;
/*!40000 ALTER TABLE `tbl_payment` DISABLE KEYS */;
INSERT INTO `tbl_payment` VALUES (1,0,200,'N/A','Unpaid','2024-07-11',1,2,'2024-07-11','2024-07-11'),(9,200,0,'Cash','Completed','2024-07-15',1,NULL,'2024-07-15','2024-07-15'),(12,10,10,'Cash','Under Process','2024-07-15',2,NULL,'2024-07-15','2024-07-15'),(13,10,0,'Cash','Completed','2024-07-15',2,NULL,'2024-07-15','2024-07-15');
/*!40000 ALTER TABLE `tbl_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `P_Name` varchar(255) NOT NULL,
  `P_Description` text DEFAULT NULL,
  `P_Units` int(11) NOT NULL,
  `P_Price` double NOT NULL,
  `P_Status` varchar(255) NOT NULL,
  `P_Date` date NOT NULL DEFAULT current_timestamp(),
  `Barcode` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product`
--

LOCK TABLES `tbl_product` WRITE;
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` VALUES (1,'Geek Bar 15K',NULL,10,5.92,'In Stock','2024-07-11','546546531315','2024-07-11 07:11:25','2024-07-11'),(2,'META BAR',NULL,10,4.99,'In Stock','2024-07-11',NULL,'2024-07-11 07:11:51','2024-07-11');
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'admin','admin@gmail.com',NULL,'$2y$12$JtH15E61iooxd1eHKDXXvudhLmVm.x6kjh9dhR4UvGxK6qrtDNvC2',NULL,'2024-06-23 23:40:02','2024-06-23 23:40:02'),(4,'Masood','masoodhabibi@gmail.com',NULL,'$2y$12$06vF/D3F2UzEGFDR1W8kK.9VcS.96gQOXBkxpdrK/9LTK7niFMu8y',NULL,'2024-06-29 01:21:23','2024-06-29 01:21:23');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `view_product_orderdetails`
--

DROP TABLE IF EXISTS `view_product_orderdetails`;
/*!50001 DROP VIEW IF EXISTS `view_product_orderdetails`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_product_orderdetails` AS SELECT
 1 AS `ID`,
  1 AS `P_Name`,
  1 AS `P_Price`,
  1 AS `P_Units`,
  1 AS `P_Status`,
  1 AS `Barcode`,
  1 AS `P_Date`,
  1 AS `Available_Units` */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `order_view`
--

/*!50001 DROP VIEW IF EXISTS `order_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `order_view` AS select `tbl_orders`.`id` AS `Order_ID`,`tbl_orders`.`Customer_ID` AS `Customer_ID`,`tbl_orders`.`O_Description` AS `O_Description`,`tbl_orders`.`O_Date` AS `O_Date`,`tbl_customer`.`Name` AS `Customer_Name`,`tbl_customer`.`Address` AS `Address`,group_concat(`tbl_orderdetail`.`id` separator ',') AS `OrderDetail_IDs`,group_concat(`tbl_orderdetail`.`O_Price` separator ',') AS `OrderPrices`,group_concat(`tbl_orderdetail`.`O_unit` separator ',') AS `OrderUnits`,group_concat(`tbl_product`.`P_Name` separator ',') AS `ProductNames`,group_concat(`tbl_product`.`Barcode` separator ',') AS `ProductBarcodes`,sum(`tbl_orderdetail`.`O_Price` * `tbl_orderdetail`.`O_unit`) AS `TotalPrice` from (((`tbl_orders` join `tbl_orderdetail` on(`tbl_orders`.`id` = `tbl_orderdetail`.`Order_ID`)) join `tbl_customer` on(`tbl_orders`.`Customer_ID` = `tbl_customer`.`id`)) join `tbl_product` on(`tbl_orderdetail`.`Product_ID` = `tbl_product`.`id`)) group by `tbl_orders`.`id`,`tbl_orders`.`Customer_ID`,`tbl_orders`.`O_Description`,`tbl_orders`.`O_Date`,`tbl_customer`.`Name`,`tbl_customer`.`Address` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `product_price_view`
--

/*!50001 DROP VIEW IF EXISTS `product_price_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `product_price_view` AS select `p`.`id` AS `id`,`p`.`P_Name` AS `P_Name`,`p`.`P_Price` AS `P_Price`,`od`.`O_unit` AS `O_unit`,`od`.`latest_order_date` AS `latest_order_date` from (`tbl_product` `p` left join (select `tbl_orderdetail`.`Product_ID` AS `Product_ID`,`tbl_orderdetail`.`O_unit` AS `O_unit`,max(`tbl_orderdetail`.`created_at`) AS `latest_order_date` from `tbl_orderdetail` where `tbl_orderdetail`.`O_unit` is not null and `tbl_orderdetail`.`created_at` is not null group by `tbl_orderdetail`.`Product_ID`,`tbl_orderdetail`.`O_unit`) `od` on(`p`.`id` = `od`.`Product_ID`)) where `od`.`O_unit` is not null and `od`.`latest_order_date` is not null and `od`.`latest_order_date` <> 0 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_product_orderdetails`
--

/*!50001 DROP VIEW IF EXISTS `view_product_orderdetails`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_product_orderdetails` AS select `p`.`id` AS `ID`,`p`.`P_Name` AS `P_Name`,`p`.`P_Price` AS `P_Price`,`p`.`P_Units` AS `P_Units`,`p`.`P_Status` AS `P_Status`,`p`.`Barcode` AS `Barcode`,`p`.`P_Date` AS `P_Date`,coalesce(`p`.`P_Units` - sum(`od`.`O_unit`),`p`.`P_Units`) AS `Available_Units` from (`tbl_product` `p` left join `tbl_orderdetail` `od` on(`p`.`id` = `od`.`Product_ID`)) group by `p`.`id`,`p`.`P_Name`,`p`.`P_Price`,`p`.`P_Units`,`p`.`P_Status`,`p`.`Barcode`,`p`.`P_Date` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-15 18:07:37
