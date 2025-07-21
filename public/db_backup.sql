-- MySQL dump 10.13  Distrib 8.0.42, for Linux (x86_64)
--
-- Host: localhost    Database: tall
-- ------------------------------------------------------
-- Server version	8.0.42-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ads`
--

DROP TABLE IF EXISTS `ads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estate_product_id` bigint unsigned DEFAULT NULL,
  `estate_type_id` bigint unsigned DEFAULT NULL,
  `estate_transactions_id` bigint unsigned DEFAULT NULL,
  `city_id` bigint unsigned DEFAULT NULL,
  `district_id` bigint unsigned DEFAULT NULL,
  `car_type_id` bigint unsigned DEFAULT NULL,
  `car_model_id` bigint unsigned DEFAULT NULL,
  `model_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `car_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_motor_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `financing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_when_call` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` text COLLATE utf8mb4_unicode_ci,
  `images` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` int DEFAULT NULL,
  `facade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mileage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pieceLength` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `space` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ads_estate_product_id_foreign` (`estate_product_id`),
  KEY `ads_estate_type_id_foreign` (`estate_type_id`),
  KEY `ads_estate_transactions_id_foreign` (`estate_transactions_id`),
  KEY `ads_city_id_foreign` (`city_id`),
  KEY `ads_district_id_foreign` (`district_id`),
  KEY `ads_car_type_id_foreign` (`car_type_id`),
  KEY `ads_car_model_id_foreign` (`car_model_id`),
  CONSTRAINT `ads_car_model_id_foreign` FOREIGN KEY (`car_model_id`) REFERENCES `car_models` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ads_car_type_id_foreign` FOREIGN KEY (`car_type_id`) REFERENCES `car_types` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ads_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ads_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ads_estate_product_id_foreign` FOREIGN KEY (`estate_product_id`) REFERENCES `estate_products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ads_estate_transactions_id_foreign` FOREIGN KEY (`estate_transactions_id`) REFERENCES `estate_product_transactions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ads_estate_type_id_foreign` FOREIGN KEY (`estate_type_id`) REFERENCES `estate_product_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ads`
--

LOCK TABLES `ads` WRITE;
/*!40000 ALTER TABLE `ads` DISABLE KEYS */;
/*!40000 ALTER TABLE `ads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `affiliate_admins`
--

DROP TABLE IF EXISTS `affiliate_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `affiliate_admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int NOT NULL DEFAULT '0',
  `number1` int DEFAULT NULL,
  `number2` int DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `total` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affiliate_admins`
--

LOCK TABLES `affiliate_admins` WRITE;
/*!40000 ALTER TABLE `affiliate_admins` DISABLE KEYS */;
INSERT INTO `affiliate_admins` VALUES (1,'3',NULL,0,0,0,1,0,'2025-06-11 21:48:33','2025-06-11 21:48:33'),(2,'3','emt',0,0,0,1,0,'2025-06-11 21:49:04','2025-06-11 21:49:04'),(3,'3','mt',50,0,0,1,0,'2025-06-11 21:49:49','2025-06-11 21:49:49'),(4,'2','mmt',100,0,0,1,0,'2025-06-11 21:51:32','2025-06-11 21:51:32'),(5,'2','mmt',100,0,0,1,0,'2025-06-11 21:51:37','2025-06-11 21:51:37');
/*!40000 ALTER TABLE `affiliate_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bills` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `plan_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bills`
--

LOCK TABLES `bills` WRITE;
/*!40000 ALTER TABLE `bills` DISABLE KEYS */;
/*!40000 ALTER TABLE `bills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business_settings`
--

DROP TABLE IF EXISTS `business_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `business_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_settings`
--

LOCK TABLES `business_settings` WRITE;
/*!40000 ALTER TABLE `business_settings` DISABLE KEYS */;
INSERT INTO `business_settings` VALUES (1,'system_default_currency','1','2020-10-11 04:43:44','2021-06-04 15:25:29'),(2,'language','[{\"id\":\"1\",\"name\":\"english\",\"direction\":\"ltr\",\"code\":\"en\",\"status\":1,\"default\":true},{\"id\":\"2\",\"name\":\"arabic\",\"direction\":\"rtl\",\"code\":\"ar\",\"status\":1,\"default\":true}]','2020-10-11 04:53:02','2024-12-02 16:38:23'),(3,'mail_config','{\"status\":0,\"name\":\"demo\",\"host\":\"mail.demo.com\",\"driver\":\"SMTP\",\"port\":\"587\",\"username\":\"info@demo.com\",\"email_id\":\"info@demo.com\",\"encryption\":\"TLS\",\"password\":\"demo\"}','2020-10-12 07:29:18','2021-07-06 09:32:01'),(4,'cash_on_delivery','{\"status\":\"1\"}',NULL,'2021-05-25 18:21:15'),(6,'ssl_commerz_payment','{\"status\":\"0\",\"environment\":\"sandbox\",\"store_id\":\"\",\"store_password\":\"\"}','2020-11-09 06:36:51','2023-01-10 03:51:56'),(7,'paypal','{\"status\":\"0\",\"environment\":\"sandbox\",\"paypal_client_id\":\"\",\"paypal_secret\":\"\"}','2020-11-09 06:51:39','2023-01-10 03:51:56'),(8,'stripe','{\"status\":\"0\",\"api_key\":null,\"published_key\":null}','2020-11-09 07:01:47','2021-07-06 09:30:05'),(10,'company_phone','000000000',NULL,'2020-12-08 12:15:01'),(11,'company_name','EslamSSoft',NULL,'2021-02-27 16:11:53'),(12,'company_web_logo','2021-05-25-60ad1b313a9d4.png',NULL,'2021-05-25 18:43:45'),(13,'company_mobile_logo','2021-02-20-6030c88c91911.png',NULL,'2021-02-20 12:30:04'),(14,'terms_condition','<p>terms and conditions</p>',NULL,'2021-06-10 22:51:36'),(15,'about_us','<p>this is about us page. hello and hi from about page description..</p>',NULL,'2021-06-10 22:42:53'),(16,'sms_nexmo','{\"status\":\"0\",\"nexmo_key\":\"custo5cc042f7abf4c\",\"nexmo_secret\":\"custo5cc042f7abf4c@ssl\"}',NULL,NULL),(17,'company_email','Copy@6amtech.com',NULL,'2021-03-15 10:29:51'),(18,'colors','{\"primary\":\"#32a466\",\"secondary\":\"#000000\",\"primary_light\":\"#CFDFFB\"}','2020-10-11 10:53:02','2023-10-30 09:02:55'),(19,'company_footer_logo','2021-02-20-6030c8a02a5f9.png',NULL,'2021-02-20 12:30:24'),(20,'company_copyright_text','CopyRight 6amTech@2021',NULL,'2021-03-15 10:30:47'),(21,'download_app_apple_stroe','{\"status\":\"1\",\"link\":\"https:\\/\\/www.target.com\\/s\\/apple+store++now?ref=tgt_adv_XS000000&AFID=msn&fndsrc=tgtao&DFA=71700000012505188&CPNG=Electronics_Portable+Computers&adgroup=Portable+Computers&LID=700000001176246&LNM=apple+store+near+me+now&MT=b&networ',NULL,'2020-12-08 10:54:53'),(22,'download_app_google_stroe','{\"status\":\"1\",\"link\":\"https:\\/\\/play.google.com\\/store?hl=en_US&gl=US\"}',NULL,'2020-12-08 10:54:48'),(23,'company_fav_icon','2021-03-02-603df1634614f.png','2020-10-11 10:53:02','2021-03-02 12:03:48'),(24,'fcm_topic','',NULL,NULL),(25,'fcm_project_id','',NULL,NULL),(26,'push_notification_key','Put your firebase server key here.',NULL,NULL),(27,'order_pending_message','{\"status\":\"1\",\"message\":\"order pen message\"}',NULL,NULL),(28,'order_confirmation_msg','{\"status\":\"1\",\"message\":\"Order con Message\"}',NULL,NULL),(29,'order_processing_message','{\"status\":\"1\",\"message\":\"Order pro Message\"}',NULL,NULL),(30,'out_for_delivery_message','{\"status\":\"1\",\"message\":\"Order ouut Message\"}',NULL,NULL),(31,'order_delivered_message','{\"status\":\"1\",\"message\":\"Order del Message\"}',NULL,NULL),(32,'razor_pay','{\"status\":\"0\",\"razor_key\":null,\"razor_secret\":null}',NULL,'2021-07-06 09:30:14'),(33,'sales_commission','0',NULL,'2021-06-11 15:13:13'),(34,'seller_registration','1',NULL,'2021-06-04 18:02:48'),(35,'pnc_language','[\"en\"]',NULL,NULL),(36,'order_returned_message','{\"status\":\"1\",\"message\":\"Order hh Message\"}',NULL,NULL),(37,'order_failed_message','{\"status\":null,\"message\":\"Order fa Message\"}',NULL,NULL),(40,'delivery_boy_assign_message','{\"status\":0,\"message\":\"\"}',NULL,NULL),(41,'delivery_boy_start_message','{\"status\":0,\"message\":\"\"}',NULL,NULL),(42,'delivery_boy_delivered_message','{\"status\":0,\"message\":\"\"}',NULL,NULL),(43,'terms_and_conditions','',NULL,NULL),(44,'minimum_order_value','1',NULL,NULL),(45,'privacy_policy','<p>my privacy policy</p>\r\n\r\n<p>&nbsp;</p>',NULL,'2021-07-06 08:09:07'),(46,'paystack','{\"status\":\"0\",\"publicKey\":null,\"secretKey\":null,\"paymentUrl\":\"https:\\/\\/api.paystack.co\",\"merchantEmail\":null}',NULL,'2021-07-06 09:30:35'),(47,'senang_pay','{\"status\":\"0\",\"secret_key\":null,\"merchant_id\":null}',NULL,'2021-07-06 09:30:23'),(48,'currency_model','single_currency',NULL,NULL),(49,'social_login','[{\"login_medium\":\"google\",\"client_id\":\"\",\"client_secret\":\"\",\"status\":\"\"},{\"login_medium\":\"facebook\",\"client_id\":\"\",\"client_secret\":\"\",\"status\":\"\"}]',NULL,NULL),(50,'digital_payment','{\"status\":\"1\"}',NULL,NULL),(51,'phone_verification','',NULL,NULL),(52,'email_verification','',NULL,NULL),(53,'order_verification','0',NULL,NULL),(54,'country_code','BH',NULL,NULL),(55,'pagination_limit','10',NULL,NULL),(56,'shipping_method','inhouse_shipping',NULL,NULL),(57,'paymob_accept','{\"status\":\"0\",\"api_key\":\"\",\"iframe_id\":\"\",\"integration_id\":\"\",\"hmac\":\"\"}',NULL,NULL),(58,'bkash','{\"status\":\"0\",\"environment\":\"sandbox\",\"api_key\":\"\",\"api_secret\":\"\",\"username\":\"\",\"password\":\"\"}',NULL,'2023-01-10 03:51:56'),(59,'forgot_password_verification','email',NULL,NULL),(60,'paytabs','{\"status\":0,\"profile_id\":\"\",\"server_key\":\"\",\"base_url\":\"https:\\/\\/secure-egypt.paytabs.com\\/\"}',NULL,'2021-11-21 01:01:40'),(61,'stock_limit','10',NULL,NULL),(62,'flutterwave','{\"status\":0,\"public_key\":\"\",\"secret_key\":\"\",\"hash\":\"\"}',NULL,NULL),(63,'mercadopago','{\"status\":0,\"public_key\":\"\",\"access_token\":\"\"}',NULL,NULL),(64,'announcement','{\"status\":null,\"color\":null,\"text_color\":null,\"announcement\":null}',NULL,NULL),(65,'fawry_pay','{\"status\":0,\"merchant_code\":\"\",\"security_key\":\"\"}',NULL,'2022-01-18 07:46:30'),(66,'recaptcha','{\"status\":0,\"site_key\":\"\",\"secret_key\":\"\"}',NULL,'2022-01-18 07:46:30'),(67,'seller_pos','0',NULL,NULL),(68,'liqpay','{\"status\":0,\"public_key\":\"\",\"private_key\":\"\"}',NULL,NULL),(69,'paytm','{\"status\":0,\"environment\":\"sandbox\",\"paytm_merchant_key\":\"\",\"paytm_merchant_mid\":\"\",\"paytm_merchant_website\":\"\",\"paytm_refund_url\":\"\"}',NULL,'2023-01-10 03:51:56'),(70,'refund_day_limit','0',NULL,NULL),(71,'business_mode','multi',NULL,NULL),(72,'mail_config_sendgrid','{\"status\":0,\"name\":\"\",\"host\":\"\",\"driver\":\"\",\"port\":\"\",\"username\":\"\",\"email_id\":\"\",\"encryption\":\"\",\"password\":\"\"}',NULL,NULL),(73,'decimal_point_settings','2',NULL,NULL),(74,'shop_address','manama',NULL,NULL),(75,'billing_input_by_customer','1',NULL,NULL),(76,'wallet_status','0',NULL,NULL),(77,'loyalty_point_status','0',NULL,NULL),(78,'wallet_add_refund','0',NULL,NULL),(79,'loyalty_point_exchange_rate','0',NULL,NULL),(80,'loyalty_point_item_purchase_point','0',NULL,NULL),(81,'loyalty_point_minimum_point','0',NULL,NULL),(82,'minimum_order_limit','1',NULL,NULL),(83,'product_brand','1',NULL,NULL),(84,'digital_product','1',NULL,NULL),(85,'delivery_boy_expected_delivery_date_message','{\"status\":0,\"message\":\"\"}',NULL,NULL),(86,'order_canceled','{\"status\":0,\"message\":\"\"}',NULL,NULL),(87,'refund-policy','{\"status\":1,\"content\":\"\"}',NULL,'2023-03-04 04:25:36'),(88,'return-policy','{\"status\":1,\"content\":\"\"}',NULL,'2023-03-04 04:25:36'),(89,'cancellation-policy','{\"status\":1,\"content\":\"\"}',NULL,'2023-03-04 04:25:36'),(90,'offline_payment','{\"status\":0}',NULL,'2023-03-04 04:25:36'),(91,'temporary_close','{\"status\":0}',NULL,'2023-03-04 04:25:36'),(92,'vacation_add','{\"status\":0,\"vacation_start_date\":null,\"vacation_end_date\":null,\"vacation_note\":null}',NULL,'2023-03-04 04:25:36'),(93,'cookie_setting','{\"status\":0,\"cookie_text\":null}',NULL,'2023-03-04 04:25:36'),(94,'maximum_otp_hit','0',NULL,'2023-06-13 10:04:49'),(95,'otp_resend_time','0',NULL,'2023-06-13 10:04:49'),(96,'temporary_block_time','0',NULL,'2023-06-13 10:04:49'),(97,'maximum_login_hit','0',NULL,'2023-06-13 10:04:49'),(98,'temporary_login_block_time','0',NULL,'2023-06-13 10:04:49'),(99,'maximum_otp_hit','0',NULL,'2023-10-13 02:34:53'),(100,'otp_resend_time','0',NULL,'2023-10-13 02:34:53'),(101,'temporary_block_time','0',NULL,'2023-10-13 02:34:53'),(102,'maximum_login_hit','0',NULL,'2023-10-13 02:34:53'),(103,'temporary_login_block_time','0',NULL,'2023-10-13 02:34:53'),(104,'apple_login','[{\"login_medium\":\"apple\",\"client_id\":\"\",\"client_secret\":\"\",\"status\":0,\"team_id\":\"\",\"key_id\":\"\",\"service_file\":\"\",\"redirect_url\":\"\"}]',NULL,'2023-10-13 02:34:53'),(105,'ref_earning_status','0',NULL,'2023-10-13 02:34:53'),(106,'ref_earning_exchange_rate','0',NULL,'2023-10-13 02:34:53'),(107,'guest_checkout','0',NULL,'2023-10-13 08:34:53'),(108,'minimum_order_amount','0',NULL,'2023-10-13 08:34:53'),(109,'minimum_order_amount_by_seller','0',NULL,'2023-10-13 08:34:53'),(110,'minimum_order_amount_status','0',NULL,'2023-10-13 08:34:53'),(111,'admin_login_url','admin',NULL,'2023-10-13 08:34:53'),(112,'employee_login_url','employee',NULL,'2023-10-13 08:34:53'),(113,'free_delivery_status','0',NULL,'2023-10-13 08:34:53'),(114,'free_delivery_responsibility','admin',NULL,'2023-10-13 08:34:53'),(115,'free_delivery_over_amount','0',NULL,'2023-10-13 08:34:53'),(116,'free_delivery_over_amount_seller','0',NULL,'2023-10-13 08:34:53'),(117,'add_funds_to_wallet','0',NULL,'2023-10-13 08:34:53'),(118,'minimum_add_fund_amount','0',NULL,'2023-10-13 08:34:53'),(119,'maximum_add_fund_amount','0',NULL,'2023-10-13 08:34:53'),(120,'user_app_version_control','{\"for_android\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"},\"for_ios\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"}}',NULL,'2023-10-13 08:34:53'),(121,'seller_app_version_control','{\"for_android\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"},\"for_ios\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"}}',NULL,'2023-10-13 08:34:53'),(122,'delivery_man_app_version_control','{\"for_android\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"},\"for_ios\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"}}',NULL,'2023-10-13 08:34:53'),(123,'whatsapp','{\"status\":1,\"phone\":\"00000000000\"}',NULL,'2023-10-13 08:34:53'),(124,'currency_symbol_position','left',NULL,'2023-10-13 08:34:53'),(125,'maximum_otp_hit','0',NULL,'2023-10-30 09:02:55'),(126,'otp_resend_time','0',NULL,'2023-10-30 09:02:55'),(127,'temporary_block_time','0',NULL,'2023-10-30 09:02:55'),(128,'maximum_login_hit','0',NULL,'2023-10-30 09:02:55'),(129,'temporary_login_block_time','0',NULL,'2023-10-30 09:02:55'),(130,'ref_earning_status','0',NULL,'2023-10-30 09:02:55'),(131,'ref_earning_exchange_rate','0',NULL,'2023-10-30 09:02:55'),(132,'guest_checkout','0',NULL,'2023-10-30 09:02:55'),(133,'minimum_order_amount','0',NULL,'2023-10-30 09:02:55'),(134,'minimum_order_amount_by_seller','0',NULL,'2023-10-30 09:02:55'),(135,'minimum_order_amount_status','0',NULL,'2023-10-30 09:02:55'),(136,'admin_login_url','admin',NULL,'2023-10-30 09:02:55'),(137,'employee_login_url','employee',NULL,'2023-10-30 09:02:55'),(138,'free_delivery_status','0',NULL,'2023-10-30 09:02:55'),(139,'free_delivery_responsibility','admin',NULL,'2023-10-30 09:02:55'),(140,'free_delivery_over_amount','0',NULL,'2023-10-30 09:02:55'),(141,'free_delivery_over_amount_seller','0',NULL,'2023-10-30 09:02:55'),(142,'add_funds_to_wallet','0',NULL,'2023-10-30 09:02:55'),(143,'minimum_add_fund_amount','0',NULL,'2023-10-30 09:02:55'),(144,'maximum_add_fund_amount','0',NULL,'2023-10-30 09:02:55'),(145,'user_app_version_control','{\"for_android\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"},\"for_ios\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"}}',NULL,'2023-10-30 09:02:55'),(146,'seller_app_version_control','{\"for_android\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"},\"for_ios\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"}}',NULL,'2023-10-30 09:02:55'),(147,'delivery_man_app_version_control','{\"for_android\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"},\"for_ios\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"}}',NULL,'2023-10-30 09:02:55'),(148,'company_reliability','[{\"item\":\"delivery_info\",\"title\":\"Fast Delivery all across the country\",\"image\":\"\",\"status\":1},{\"item\":\"safe_payment\",\"title\":\"Safe Payment\",\"image\":\"\",\"status\":1},{\"item\":\"return_policy\",\"title\":\"7 Days Return Policy\",\"image\":\"\",\"status\":1},{\"item\":\"auth',NULL,NULL),(149,'ref_earning_status','0',NULL,'2024-09-14 17:25:48'),(150,'ref_earning_exchange_rate','0',NULL,'2024-09-14 17:25:49'),(151,'timezone','UTC',NULL,NULL),(152,'default_location','{\"lat\":null,\"lng\":null}',NULL,NULL);
/*!40000 ALTER TABLE `business_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_models`
--

DROP TABLE IF EXISTS `car_models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `car_models` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `car_type_id` bigint unsigned NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `car_models_car_type_id_foreign` (`car_type_id`),
  CONSTRAINT `car_models_car_type_id_foreign` FOREIGN KEY (`car_type_id`) REFERENCES `car_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=512 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_models`
--

LOCK TABLES `car_models` WRITE;
/*!40000 ALTER TABLE `car_models` DISABLE KEYS */;
INSERT INTO `car_models` VALUES (1,85,'لاندكروزر',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(2,85,'كامري',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(3,85,'افالون',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(4,85,'هايلوكس',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(5,85,'كورولا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(6,85,'اف جي',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(7,85,'ربع',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(8,85,'شاص',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(9,85,'يارس',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(10,85,'برادو',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(11,85,'فورتشنر',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(12,85,'اوريون',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(13,85,'كرسيدا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(14,85,'سيكويا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(15,85,'باص',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(16,85,'انوفا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(17,85,'راف فور',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(18,85,'XA',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(19,85,'ايكو',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(20,85,'تندرا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(21,85,'بريفيا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(22,85,'سوبرا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(23,85,'تويوتا 86',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(24,85,'افانزا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(25,85,'هايلاندر',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(26,85,'بريوس',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(27,85,'راش',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(28,85,'جرانفيا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(29,85,'C-HR',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(30,85,'كورولا كروس',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(31,85,'رايز',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(32,85,'فيلوز',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(33,85,'كراون',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(34,85,'اوربان كروزر',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(35,86,'موستانج',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(36,86,'اكسبلورر',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(37,86,'F-150',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(38,86,'ايدج',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(39,86,'فوكس',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(40,86,'فيوجن',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(41,86,'توروس',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(42,86,'اكسبيديشن',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(43,86,'رينجر',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(44,86,'برونكو',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(45,86,'اسكيب',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(46,86,'ايفرست',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(47,86,'ترانزيت',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(48,86,'F-250',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(49,86,'F-350',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(50,86,'F-450',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(51,87,'كورفيت',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(52,87,'تاهو',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(53,87,'كامارو',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(54,87,'ماليبو',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(55,87,'سيلفرادو',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(56,87,'سوبربان',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(57,87,'ترافرس',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(58,87,'بليزر',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(59,87,'تريل بليزر',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(60,87,'اكسبيرس',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(61,87,'كابتيفا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(62,87,'امبالا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(63,87,'كروز',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(64,87,'سبارك',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(65,87,'افيو',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(66,87,'اوبترا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(67,88,'جميع أنواع القطع والإكسسوارات لجميع الماركات',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(68,89,'باترول',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(69,89,'صني',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(70,89,'التيما',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(71,89,'ماكسيما',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(72,89,'باثفايندر',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(73,89,'اكستيرا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(74,89,'نافارا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(75,89,'جوك',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(76,89,'قشقاي',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(77,89,'سنترا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(78,89,'تيدا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(79,89,'كيكس',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(80,89,'370Z',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(81,89,'GT-R',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(82,89,'ليف',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(83,89,'ارمادا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(84,90,'النترا',NULL,NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(85,90,'سوناتا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(86,90,'اكسنت',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(87,90,'توسان',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(88,90,'سنتافي',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(89,90,'كونا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(90,90,'كريتا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(91,90,'باليسيد',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(92,90,'ازيرا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(93,90,'فيلوستر',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(94,90,'i10',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(95,90,'i20',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(96,90,'i30',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(97,90,'H1',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(98,91,'G70',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(99,91,'G80',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(100,91,'G90',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(101,91,'GV70',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(102,91,'GV80',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(103,92,'ES',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(104,92,'LS',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(105,92,'IS',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(106,92,'RX',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(107,92,'NX',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(108,92,'GX',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(109,92,'LX',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(110,92,'RC',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(111,92,'LC',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(112,92,'UX',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(113,93,'يوكون',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(114,93,'سييرا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(115,93,'اكاديا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(116,93,'تيرين',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(117,93,'سافانا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(118,93,'كانيون',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(119,94,'شاحنات مرسيدس',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(120,94,'مان',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(121,94,'فولفو',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(122,94,'سكانيا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(123,94,'ايسوزو',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(124,94,'فوسو',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(125,94,'حفارات',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(126,94,'جرافات',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(127,94,'رافعات',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(128,94,'خلاطات',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(129,95,'C-Class',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(130,95,'E-Class',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(131,95,'S-Class',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(132,95,'A-Class',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(133,95,'CLA-Class',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(134,95,'CLS-Class',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(135,95,'GLA-Class',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(136,95,'GLB-Class',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(137,95,'GLC-Class',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(138,95,'GLE-Class',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(139,95,'GLS-Class',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(140,95,'G-Class',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(141,95,'Sprinter',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(142,95,'Vito',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(143,95,'Actros',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(144,95,'Atego',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(145,95,'Arocs',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(146,96,'سيفيك',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(147,96,'اكورد',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(148,96,'CR-V',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(149,96,'HR-V',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(150,96,'بايلوت',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(151,96,'اوديسي',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(152,96,'سيتي',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(153,97,'الفئة الثالثة',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(154,97,'الفئة الخامسة',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(155,97,'الفئة السابعة',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(156,97,'X1',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(157,97,'X3',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(158,97,'X4',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(159,97,'X5',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(160,97,'X6',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(161,97,'X7',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(162,97,'Z4',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(163,97,'i3',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(164,97,'i8',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(165,97,'M Models',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(166,98,'دراجات نارية رياضية',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(167,98,'دراجات نارية تجوال',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(168,98,'ماركات متعددة',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(169,99,'سيراتو',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(170,99,'سبورتاج',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(171,99,'اوبتيما',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(172,99,'ريو',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(173,99,'سورينتو',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(174,99,'تيلورايد',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(175,99,'سيلتوس',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(176,99,'بيكانتو',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(177,99,'كارنيفال',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(178,99,'ستينجر',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(179,99,'سول',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(180,99,'K3',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(181,99,'K8',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(182,99,'K9',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(183,100,'تشارجر',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(184,100,'تشالنجر',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(185,100,'دورانجو',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(186,100,'رام',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(187,101,'300C',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(188,101,'باسيفيكا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(189,101,'فوياجر',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(190,102,'رانجلر',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(191,102,'جراند شيروكي',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(192,102,'شيروكي',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(193,102,'كومباس',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(194,102,'رينيجيد',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(195,102,'جلاديتور',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(196,103,'لانسر',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(197,103,'باجيرو',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(198,103,'ASX',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(199,103,'اوتلاندر',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(200,103,'مونتيرو سبورت',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(201,103,'L200',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(202,103,'اكليبس كروس',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(203,103,'اتراج',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(204,103,'اكسباندر',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(205,104,'مازدا 3',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(206,104,'مازدا 6',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(207,104,'CX-3',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(208,104,'CX-5',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(209,104,'CX-9',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(210,104,'MX-5',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(211,104,'BT-50',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(212,105,'رينج روفر',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(213,105,'رينج روفر سبورت',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(214,105,'رينج روفر ايفوك',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(215,105,'ديسكفري',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(216,105,'ديسكفري سبورت',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(217,105,'ديفندر',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(218,106,'دي ماكس',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(219,106,'ام يو اكس',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(220,106,'N-Series',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(221,106,'F-Series',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(222,107,'اسكاليد',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(223,107,'CT4',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(224,107,'CT5',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(225,107,'CT6',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(226,107,'XT4',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(227,107,'XT5',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(228,107,'XT6',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(229,108,'911',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(230,108,'718',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(231,108,'كايين',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(232,108,'ماكان',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(233,108,'باناميرا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(234,108,'تايكان',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(235,109,'A3',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(236,109,'A4',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(237,109,'A5',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(238,109,'A6',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(239,109,'A7',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(240,109,'A8',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(241,109,'Q3',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(242,109,'Q5',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(243,109,'Q7',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(244,109,'Q8',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(245,109,'TT',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(246,109,'R8',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(247,109,'e-tron',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(248,110,'سويفت',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(249,110,'فيتارا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(250,110,'جيمني',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(251,110,'سياز',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(252,110,'ديزاير',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(253,110,'ارتيجا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(254,110,'بالينو',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(255,111,'Q50',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(256,111,'Q60',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(257,111,'QX50',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(258,111,'QX55',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(259,111,'QX60',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(260,111,'QX80',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(261,112,'H2',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(262,112,'H3',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(263,112,'Hummer EV',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(264,113,'نافيجيتور',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(265,113,'كونتيننتال',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(266,113,'أفياتور',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(267,113,'كورسير',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(268,113,'نوتيلوس',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(269,114,'جولف',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(270,114,'باسات',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(271,114,'تيجوان',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(272,114,'طوارق',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(273,114,'جيتا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(274,114,'بولو',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(275,114,'أرتيون',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(276,114,'T-Roc',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(277,114,'T-Cross',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(278,114,'أماروك',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(279,115,'تيريوس',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(280,115,'سيريون',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(281,115,'جران ماكس',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(282,116,'كولراي',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(283,116,'امجراند',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(284,116,'ازكارا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(285,116,'توجيلا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(286,116,'اوكافانجو',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(287,117,'Grand Marquis',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(288,117,'Milan',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(289,117,'Mountaineer',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(290,118,'XC40',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(291,118,'XC60',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(292,118,'XC90',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(293,118,'S60',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(294,118,'S90',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(295,118,'V60',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(296,118,'V90',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(297,119,'208',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(298,119,'308',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(299,119,'508',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(300,119,'2008',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(301,119,'3008',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(302,119,'5008',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(303,119,'بارتنر',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(304,119,'اكسبيرت',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(305,120,'كونتيننتال جي تي',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(306,120,'فلاينج سبير',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(307,120,'بينتايجا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(308,121,'XE',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(309,121,'XF',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(310,121,'XJ',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(311,121,'F-Pace',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(312,121,'E-Pace',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(313,121,'I-Pace',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(314,121,'F-Type',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(315,122,'امبريزا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(316,122,'فورستر',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(317,122,'اوت باك',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(318,122,'XV',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(319,122,'ليجاسي',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(320,122,'WRX',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(321,123,'ZS',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(322,123,'HS',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(323,123,'RX5',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(324,123,'MG5',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(325,123,'MG6',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(326,123,'T60',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(327,124,'جراند تايجر',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(328,124,'لاند مارك',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(329,125,'ألسفن',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(330,125,'CS35',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(331,125,'CS75',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(332,125,'CS85',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(333,125,'CS95',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(334,125,'ايدو',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(335,126,'داستر',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(336,126,'سيمبول',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(337,126,'ميغان',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(338,126,'كوليوس',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(339,126,'كابتشر',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(340,126,'تاليسمان',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(341,126,'دوكر',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(342,127,'أنكليف',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(343,127,'لاكروز',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(344,127,'ريجال',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(345,127,'أنكور',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(346,127,'إنفيجن',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(347,128,'جيبلي',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(348,128,'كواتروبورتي',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(349,128,'ليفانتي',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(350,128,'جريكال',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(351,128,'MC20',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(352,129,'فانتوم',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(353,129,'جوست',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(354,129,'كولينان',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(355,129,'رايث',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(356,129,'دون',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(357,130,'أوروس',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(358,130,'هوراكان',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(359,130,'أفينتادور',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(360,131,'كورسا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(361,131,'استرا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(362,131,'انسينيا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(363,131,'جراند لاند',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(364,131,'موكا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(365,131,'كروس لاند',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(366,132,'اوكتافيا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(367,132,'سوبيرب',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(368,132,'كودياك',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(369,132,'كاروك',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(370,132,'كاميك',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(371,132,'فابيا',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(372,133,'روما',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(373,133,'بورتوفينو',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(374,133,'F8 Tributo',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(375,133,'SF90 Stradale',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(376,133,'812 Superfast',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(377,134,'C3',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(378,134,'C4',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(379,134,'C5',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(380,134,'C3 Aircross',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(381,134,'C5 Aircross',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(382,134,'بيرلينجو',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(383,135,'تيجو 2',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(384,135,'تيجو 4',NULL,NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(385,135,'تيجو 7',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(386,135,'تيجو 8',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(387,135,'اريزو',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(388,136,'ليون',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(389,136,'ايبيزا',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(390,136,'اتيكا',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(391,136,'ارونا',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(392,136,'تاراكو',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(393,137,'Lanos',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(394,137,'Nubira',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(395,137,'Leganza',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(396,138,'9-3',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(397,138,'9-5',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(398,139,'500',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(399,139,'500X',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(400,139,'تيبو',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(401,139,'دوبلو',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(402,139,'فولباك',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(403,140,'تيفولي',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(404,140,'كوراندو',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(405,140,'ريكستون',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(406,140,'موسو',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(407,141,'DB11',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(408,141,'DBS Superleggera',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(409,141,'Vantage',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(410,141,'DBX',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(411,142,'ساجا',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(412,142,'بيرسونا',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(413,142,'اكسورا',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(414,142,'X50',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(415,142,'X70',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(416,143,'H2',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(417,143,'H6',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(418,143,'H9',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(419,143,'جوليان',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(420,144,'GS3',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(421,144,'GS4',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(422,144,'GS5',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(423,144,'GS8',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(424,144,'GA4',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(425,144,'GA8',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(426,145,'وينجل',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(427,145,'باور',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(428,146,'T77',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(429,146,'T99',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(430,146,'Bestune B70',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(431,146,'X40',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(432,146,'X80',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(433,147,'تشكيلة من السيارات الكهربائية والهجينة',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(434,148,'جوليا',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(435,148,'ستيلفيو',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(436,149,'نيكسون',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(437,149,'هارير',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(438,149,'سفاري',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(439,149,'تياجو',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(440,149,'التيروز',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(441,150,'فيكتوس',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(442,150,'بوردينج',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(443,151,'X70',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(444,151,'X90',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(445,151,'X95',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(446,151,'داشينج',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(447,152,'Z7',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(448,153,'تونلاند',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(449,153,'سافانا',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(450,153,'View',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(451,153,'Aumark',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(452,154,'V1',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(453,155,'X60',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(454,156,'T60',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(455,156,'T70',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(456,156,'T90',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(457,156,'D60',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(458,156,'D90',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(459,156,'G10',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(460,156,'G20',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(461,156,'G50',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(462,157,'720S',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(463,157,'765LT',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(464,157,'GT',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(465,157,'Artura',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(466,158,'J7',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(467,158,'S3',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(468,158,'S4',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(469,158,'S7',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(470,158,'T6',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(471,158,'T8',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(472,159,'X3',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(473,159,'X5',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(474,159,'X7',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(475,159,'BJ40',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(476,159,'BJ80',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(477,159,'M50S',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(478,159,'M60',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(479,160,'AX7',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(480,160,'ريتش',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(481,161,'TXL',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(482,161,'VX',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(483,161,'LX',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(484,162,'موديل 3',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(485,162,'موديل S',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(486,162,'موديل X',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(487,162,'موديل Y',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(488,163,'DX3',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(489,163,'DX5',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(490,163,'DX7',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(491,164,'Scorpio',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(492,164,'XUV500',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(493,165,'T600',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(494,166,'H5',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(495,166,'H7',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(496,166,'H9',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(497,166,'HS5',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(498,166,'HS7',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(499,166,'E-HS9',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(500,167,'Fortwo',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(501,167,'Forfour',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(502,168,'300',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(503,168,'500',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(504,169,'01',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(505,169,'02',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(506,169,'03',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(507,169,'05',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(508,169,'06',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(509,169,'09',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(510,170,'Air',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(511,171,'Grenadier',NULL,NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35');
/*!40000 ALTER TABLE `car_models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_types`
--

DROP TABLE IF EXISTS `car_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `car_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_types`
--

LOCK TABLES `car_types` WRITE;
/*!40000 ALTER TABLE `car_types` DISABLE KEYS */;
INSERT INTO `car_types` VALUES (85,'تويوتا',NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(86,'فورد',NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(87,'شيفروليه',NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(88,'قطع غيار وملحقات',NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(89,'نيسان',NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(90,'هيونداي',NULL,'active','2025-07-06 15:53:33','2025-07-06 15:53:33'),(91,'جنسس',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(92,'لكزس',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(93,'جي ام سي',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(94,'شاحنات ومعدات ثقيلة',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(95,'مرسيدس',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(96,'هوندا',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(97,'بي ام دبليو',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(98,'دبابات',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(99,'كيا',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(100,'دودج',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(101,'كرايزلر',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(102,'جيب',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(103,'ميتسوبيشي',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(104,'مازدا',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(105,'لاند روفر',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(106,'ايسوزو',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(107,'كاديلاك',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(108,'بورش',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(109,'أودي',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(110,'سوزوكي',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(111,'انفنيتي',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(112,'همر',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(113,'لنكولن',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(114,'فولكس فاجن',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(115,'دايهاتسو',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(116,'جيلي',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(117,'ميركوري',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(118,'فولفو',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(119,'بيجو',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(120,'بنتلي',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(121,'جاكوار',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(122,'سوبارو',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(123,'MG',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(124,'ZXAUTO',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(125,'شانجان',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(126,'رينو',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(127,'بويك',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(128,'مازيراتي',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(129,'رولز رويس',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(130,'لامبورجيني',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(131,'أوبل',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(132,'سكودا',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(133,'فيراري',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(134,'سيتروين',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(135,'شيري',NULL,'active','2025-07-06 15:53:34','2025-07-06 15:53:34'),(136,'سيات',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(137,'دايو',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(138,'ساب',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(139,'فيات',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(140,'سانج يونج',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(141,'أستون مارتن',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(142,'بروتون',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(143,'هافال',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(144,'جي ايه سي GAC',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(145,'جريت وول Great Wall',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(146,'فاو FAW',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(147,'BYD',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(148,'الفا روميو',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(149,'تاتا',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(150,'جى ام سي JMC',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(151,'جيتور',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(152,'سي ام سي CMC',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(153,'فوتون',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(154,'فيكتوري اوتو',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(155,'ليفان',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(156,'ماكسيس',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(157,'ماكلارين',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(158,'جاك JAC',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(159,'بايك',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(160,'دونج فينج',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(161,'اكسيد',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(162,'تسلا',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(163,'ساوايست',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(164,'ماهيندرا',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(165,'زوتي',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(166,'هونشي',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(167,'سمارت',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(168,'تانك',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(169,'لينك اند كو',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(170,'لوسيد',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35'),(171,'اينيوس',NULL,'active','2025-07-06 15:53:35','2025-07-06 15:53:35');
/*!40000 ALTER TABLE `car_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23696 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'تبوك','Tabuk','2025-07-06 17:37:01','2025-07-06 17:37:01'),(3,'الرياض','Riyadh','2025-07-06 17:37:02','2025-07-06 17:37:02'),(5,'الطائف','Taif','2025-07-06 20:39:43','2025-07-06 20:39:43'),(6,'مكة المكرمة','Makkah','2025-07-06 20:39:43','2025-07-06 20:39:43'),(10,'حائل','Hail','2025-07-06 20:39:43','2025-07-06 20:39:43'),(11,'بريدة','Buraidah','2025-07-06 20:39:43','2025-07-06 20:39:43'),(13,'الدمام','Dammam','2025-07-06 20:39:43','2025-07-06 20:39:43'),(14,'المدينة المنورة','Medina','2025-07-06 20:39:43','2025-07-06 20:39:43'),(15,'ابها','Abha','2025-07-06 20:39:43','2025-07-06 20:39:43'),(17,'جازان','Jazan','2025-07-06 20:39:43','2025-07-06 20:39:43'),(18,'جدة','Jeddah','2025-07-06 20:39:43','2025-07-06 20:39:43'),(24,'المجمعة','Majmaah','2025-07-06 20:39:43','2025-07-06 20:39:43'),(31,'الخبر','Khobar','2025-07-06 20:39:43','2025-07-06 20:39:43'),(80,'عنيزة','Unaizah','2025-07-06 20:39:43','2025-07-06 20:39:43'),(168,'الارطاوية','Artawiyah','2025-07-06 20:39:43','2025-07-06 20:39:43'),(227,'الظهران','Dhahran','2025-07-06 20:39:43','2025-07-06 20:39:43'),(243,'بقيق','Buqayq','2025-07-06 20:39:43','2025-07-06 20:39:43'),(253,'صلاصل','Salasil','2025-07-06 20:39:43','2025-07-06 20:39:43'),(270,'الزلفي','Zulfi','2025-07-06 20:39:43','2025-07-06 20:39:43'),(306,'الغاط','Ghat','2025-07-06 20:39:43','2025-07-06 20:39:43'),(377,'رابغ','Rabigh','2025-07-06 20:39:43','2025-07-06 20:39:43'),(443,'ثادق','Thadiq','2025-07-06 20:39:43','2025-07-06 20:39:43'),(444,'الروبضة / رغبة','Al Rawbdah / Raghbah','2025-07-06 20:39:43','2025-07-06 20:39:43'),(796,'ملهم','Mulham','2025-07-06 20:39:43','2025-07-06 20:39:43'),(828,'الدرعية','Diriyah','2025-07-06 20:39:43','2025-07-06 20:39:43'),(834,'العمارية','Al Amariyah','2025-07-06 20:39:43','2025-07-06 20:39:43'),(990,'المزاحمية','Al Muzahimiyah','2025-07-06 20:39:43','2025-07-06 20:39:43'),(1061,'الخرج','Al Kharj','2025-07-06 20:39:43','2025-07-06 20:39:43'),(1801,'محايل','Muhayil','2025-07-06 20:39:43','2025-07-06 20:39:43'),(2421,'الرس','Ar Rass','2025-07-06 20:39:43','2025-07-06 20:39:43'),(2522,'يدمة','Yadamah','2025-07-06 20:39:43','2025-07-06 20:39:43'),(3417,'نجران','Najran','2025-07-06 20:39:43','2025-07-06 20:39:43'),(3479,'صبيا','Sabya','2025-07-06 20:39:43','2025-07-06 20:39:43'),(3499,'ضمد','Damad','2025-07-06 20:39:43','2025-07-06 20:39:43'),(3525,'ابو عريش','Abu Arish','2025-07-06 20:39:43','2025-07-06 20:39:43'),(3618,'البديع والقرفي','Al Badi & Al Qarafi','2025-07-06 20:39:43','2025-07-06 20:39:43'),(3652,'احد المسارحة','Ahad Al Masarihah','2025-07-06 20:39:43','2025-07-06 20:39:43'),(3677,'الاحساء','Al Ahsa','2025-07-06 20:39:43','2025-07-06 20:39:43'),(23695,'مدينة الملك عبدالله الاقتصادية','KAEC','2025-07-06 20:39:43','2025-07-06 20:39:43');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `districts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `districts_city_id_foreign` (`city_id`),
  CONSTRAINT `districts_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10700001065 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `districts`
--

LOCK TABLES `districts` WRITE;
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
INSERT INTO `districts` VALUES (10100003001,'حي العمل','Al Amal Dist.',3,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10100003002,'حي النموذجية','Al Namudhajiyah Dist.',3,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10100003003,'حي الجرادية','Al Jarradiyah Dist.',3,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10100003004,'حي الصناعية','Al Sinaiyah Dist.',3,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10100003005,'حي منفوحة الجديدة','Manfuha Al Jadidah Dist.',3,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10100003006,'حي الفاخرية','Al Fakhiriyah Dist.',3,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10100003007,'حي الديرة','Al Dirah Dist.',3,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10100003008,'حي ام الحمام الشرقي','East Umm Al Hamam Dist.',3,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10100003009,'حي الشرفية','Al Sharafiyah Dist.',3,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10100003010,'حي الهدا','Al Hada Dist.',3,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10100003011,'حي المعذر الشمالي','North Mathar Dist.',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003012,'حي ام الحمام الغربي','West Umm Al Hamam Dist.',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003013,'حي الرحمانية','Al Rahmaniyah Dist.',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003014,'حي لبن','Laban Dist.',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003015,'حي الرفيعة','Al Rafeah Dist.',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003016,'حي الشهداء','Al Shohda Dist.',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003017,'حي الملك فهد','King Fahd Dist.',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003018,'حي السويدي','Al Suwaidi Dist.',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003019,'حي الحزم','Al Hazm Dist.',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003020,'حي عتيقة','Utayqah Dist.',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003021,'حي المربع','Al Murabba Dist.',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003022,'حي الفلاح','Al Falah Dist.',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003023,'حي الندى','Al Nada Dist.',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003024,'حي المرسلات','Al Mursalat Dist.',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003025,'حي النزهة','Al Nuzha Dist.',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003026,'حي الورود','Al Woroud Dist.',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003027,'حي الملك فيصل','King Faisal Dist.',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003028,'المدينة الصناعية الثانية','2Nd Industrial City',3,'2025-07-06 17:37:03','2025-07-06 17:37:03'),(10100003029,'حي العزيزية','Al Aziziyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003030,'حي المنصورة','Al Mansurah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003031,'حي غبيرة','Ghobairah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003032,'حي الفاروق','Al Farooq Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003033,'حي الفيصلية','Al Faisaliyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003034,'حي الخالدية','Al Khalidiyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003035,'حي الجزيرة','Al Jazeerah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003036,'حي السعادة','Al Saadah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003037,'حي الناصرية','Al Nasiriyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003038,'حي المناخ','Al Manakh Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003039,'حي الدفاع','Al Difaa Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003040,'حي النور','Al Noor Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003041,'حي الملك عبدالله','King Abdullah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003042,'حي الملك سلمان','King Salman Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003043,'حي صلاح الدين','Salahuddin Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003044,'حي الملك عبدالعزيز','King Abdulaziz Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003045,'حي الوزارات','Al Wizarat Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003046,'حي سكيرينة','Skirinah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003047,'حي الربوة','Al Rabwah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003048,'حي جرير','Jareer Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003049,'حي المعذر','Al Mathar Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003050,'حي الصالحية','As Salhiyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003051,'حي الملز','Al Malaz Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003052,'حي منفوحة','Manfuhah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003053,'حي عليشة','Olaishah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003054,'حي النهضة','Al Nahdah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003055,'حي الخليج','Al Khaleej Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003056,'حي الضباط','Al Dhubbat Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003057,'حي السويدي الغربي','West Suwaidi Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003058,'حي ديراب','Dirab Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003059,'حي احد','Ohod Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003060,'حي نمار','Namar Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003061,'حي الشفا','Al Shifa Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003062,'حي المحمدية','Al Muhammadiyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003063,'حي السليمانية','Al Sulaimaniyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003064,'حي المروة','Al Marwah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003065,'حي عكاظ','Okaz Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003066,'حي شبرا','Shubra Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003067,'حي الزهرة','Al Zahrah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003068,'حي صياح','Siyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003069,'حي سلطانة','Sultanah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003070,'حي اليمامة','Al Yamamah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003071,'حي البديعة','Al Badeah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003072,'حي المصانع','Al Masani Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003073,'حي القادسية','Al Qadisiyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003074,'حي الصفا','Al Safa Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003075,'حي العليا','Al Olaya Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003076,'حي الدريهمية','Al Duraihemiyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003077,'حي الاسكان','Al Iskan Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003078,'حي السلام','Al Salam Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003079,'حي المنار','Al Manar Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003080,'حي النسيم الشرقي','East Naseem Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003081,'حي القدس','Al Quds Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003082,'حي الوادي','Al Wadi Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003083,'حي النفل','Al Nafel Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003084,'حي المصيف','Al Maseef Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003085,'حي التعاون','Al Taawun Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003086,'حي الازدهار','Al Ezdihar Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003087,'حي الاندلس','Al Andalus Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003088,'حي الروضة','Al Rawdah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003089,'حي الروابي','Al Rawabi Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003090,'حي الريان','Al Rayan Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003091,'حي ظهرة البديعة','Dhahrat Al Badeah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003092,'حي النظيم','Al Nadheem Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003093,'حي الرماية','Al Rimayah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003094,'حي البرية','Al Bariyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003095,'حي طيبة','Taybah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003096,'حي المنصورية','Mansuriyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003097,'حي ضاحية نمار','Dahiyat Namar Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003098,'حي المصفاة','Al Misfat Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003099,'حي السفارات','Assafarat Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003100,'خشم العان','Khashm Al An',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003101,'حي قرطبة','Qurtubah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003102,'حي طويق','Tuwaiq Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003103,'حي العوالي','Al Awaly Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003104,'حي الربيع','Al Rabie Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003105,'حي المغرزات','Al Mughrazat Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003106,'حي السلي','Al Sulay Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003107,'حي العقيق','Al Aqeeq Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003108,'حي النخيل','Al Nakheel Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003109,'حي الغدير','Al Ghadeer Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003110,'حي المروج','Al Muruj Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003111,'حي العود','Al Oud Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003112,'حي ثليم','Thulaim Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003113,'حي الشميسي','Al Shumaisi Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003114,'حي الوشام','Al Wisham Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003115,'منتزه سلام','Salam Park',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003116,'حي الدوبية','Al Dubiyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003117,'حي معكال','Meakal Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003118,'حي جبرة','Jabrah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003119,'حي القرى','Al Qura Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003120,'حي المرقب','Al Marqab Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003121,'حي الفوطة','Al Futah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003122,'حي ام سليم','Umm Saleem Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003123,'حي الصحافة','Al Sahafah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003125,'حي الرائد','Al Raed Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003126,'حي العريجاء الغربي','West Oraija Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003127,'حي العريجاء','Al Uraija Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003128,'حي العريجاء الوسطى','Middle Oraija Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003129,'حي الحمراء','Al Hamra Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003130,'حي الدار البيضاء','Al Dar Al Baida Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003131,'حي البطيحا','Al Butaiha Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003132,'حي الزهراء','Al Zahra Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003133,'حي الفيحاء','Al Fayha Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003134,'حي المؤتمرات','Al Mutamarat Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003135,'حي الوسيطاء','Al Wusayta Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003136,'حي الجنادرية','Al Janadriyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003137,'حي اشبيلية','Ishbiliyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003138,'حي المعيزلة','Al Maizalah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003139,'حي اليرموك','Al Yarmuk Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003140,'حي المونسية','Al Munisiyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003141,'حي الخزامى','Al Khuzama Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003142,'عرقة','Irqah',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003143,'حي ظهرة لبن','Dhahrat Laban Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003144,'حي حطين','Hitteen Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003145,'حي الملقا','Al Malqa Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003146,'حي القيروان','Al Qairawan Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003147,'حي الياسمين','Al Yasmeen Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003148,'حي العارض','Al Arid Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003149,'مطار الملك خالد','King Khalid International Airport',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003150,'حي النرجس','Al Narjis Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003151,'جامعة الامام محمد بن سعود الاسلامية','Imam Muhammed Bin Saud Islamic University',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003152,'حي بنبان','Banban Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003153,'حي الرمال','Al Rimal Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003155,'حي غرناطة','Ghirnatah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003156,'حي الدحو','Al Dahou Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003157,'حي العماجية','Al Ammajiyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003158,'حي هيت','Hyt Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003159,'حي الحائر','Al Haer Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003161,'حي ام الشعال','Umm Al Shaal Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003162,'حي الغنامية','Al Ghannamiyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003163,'حي عريض','Oraid Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003164,'حي بدر','Badr Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003165,'حي المهدية','Al Mahdiyah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003166,'جامعة الملك سعود','King Saud University',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003167,'حي النسيم الغربي','West Naseem Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003168,'حي المشاعل','Al Mishael Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003169,'حي الندوة','Al Nadwah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003172,'حي وادي لبن','Wady Laban Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003174,'حي السدرة','Al Sidrah Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003175,'حي التضامن','Al Tadamon Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003176,'مدينة الملك عبدالله للطاقة','King Abdullah City For Energy',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003178,'حي الرحاب','Al Rihab Dist.',3,'2025-07-06 17:37:04','2025-07-06 17:37:04'),(10100003179,'حي المجد','Al Majd Dist.',3,'2025-07-06 17:37:05','2025-07-06 17:37:05'),(10100003180,'حي الدانة','Al Danah Dist.',3,'2025-07-06 17:37:05','2025-07-06 17:37:05'),(10100003182,'حي الرسالة','Al Risalah Dist.',3,'2025-07-06 17:37:06','2025-07-06 17:37:06'),(10100003183,'حي الخير','Al Khair Dist.',3,'2025-07-06 17:37:06','2025-07-06 17:37:06'),(10100003184,'حي الفرسان','Al Fursan Dist.',3,'2025-07-06 17:37:06','2025-07-06 17:37:06'),(10100003185,'حي الشعلة','Al Sholah Dist.',3,'2025-07-06 17:37:06','2025-07-06 17:37:06'),(10100003186,'حي الراية','Al Rayah Dist.',3,'2025-07-06 17:37:06','2025-07-06 17:37:06'),(10100003187,'حي الزهور','Al Zahour Dist.',3,'2025-07-06 17:37:06','2025-07-06 17:37:06'),(10100003188,'حي الزاهر','Al Zaher Dist.',3,'2025-07-06 17:37:06','2025-07-06 17:37:06'),(10100003189,'حي المرجان','Al Marjan Dist.',3,'2025-07-06 17:37:06','2025-07-06 17:37:06'),(10100003190,'حي البيان','Al Bayan Dist.',3,'2025-07-06 17:37:06','2025-07-06 17:37:06'),(10100003191,'حي العلا','Al Ula Dist.',3,'2025-07-06 17:37:06','2025-07-06 17:37:06'),(10100003192,'حي المشرق','Al Mashriq Dist.',3,'2025-07-06 17:37:06','2025-07-06 17:37:06'),(10100003193,'حي النخبة','Al Nakhbah Dist.',3,'2025-07-06 17:37:06','2025-07-06 17:37:06'),(10100003194,'حي السحاب','Al Sahab Dist.',3,'2025-07-06 17:37:06','2025-07-06 17:37:06'),(10100003195,'حي الوسام','Al Wasam Dist.',3,'2025-07-06 17:37:06','2025-07-06 17:37:06'),(10700001001,'حي الإسكان','Al Iskan Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001002,'حي العين','Al Ain Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001003,'حي الشفا','Al Shifa Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001004,'حي الصفا','Al Safa Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001005,'حي الاخضر','Al Akhdar Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001006,'حي البوادي','Al Bawadi Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001007,'حي اليرموك','Al Yarmuk Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001008,'الأحياء الجنوبية','Southern Districts',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001009,'حي النظيم','Al Nadheem Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001010,'حي غرب الخالدية','Khalidiyah West Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001011,'حي البساتين','Al Basatin Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001012,'حي الحمراء','Al Hamra Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001013,'البلدة القديمة','Down Town',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001014,'حي السعادة','Al Saadah Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001015,'حي سلطانة','Sultanah Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001016,'حي الفيصلية الجنوبية','Faisaliyah South Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001017,'حي الفيصلية الشمالية','Faisaliyah North Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001018,'حي النهضة','Al Nahdah Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001019,'حي الروضة','Al Rawdah Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001020,'حي المصيف الاول','Al Masif 1 Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001021,'حي المروج الثاني','Al Muruj 2 Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001022,'حي الريان','Al Rayan Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001023,'حي الورود','Al Wurud Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001024,'مخطط الراجحي','Al Rajhi Subdivision Plan',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001025,'المدينة الجامعية','University City',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001026,'حي الفلاح','Al Falah Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001027,'حي الزهراء','Al Zahra Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001028,'حي رايس','Rise Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001029,'الدوائر الحكومية و','Government Departments Area F',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001030,'الدوائر الحكومية ب','Government Departments Area B',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001031,'الدوائر الحكومية د','Government Departments Area D',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001032,'الدوائر الحكومية أ','Government Departments Area A',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001033,'حي الجامعة','Al Jamiah Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001034,'الدوائر الحكومية ج','Government Departments Area C',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001035,'الدوائر الحكومية هـ','Government Departments Area E',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001036,'منطقة خاصة','Private Area',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001037,'حي الدفاع','Al Difa Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001038,'منطقة الخدمات أ','Services Area A',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001039,'منطقة الخدمات ب','Services Area B',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001040,'المدينة الصناعية','Industrial City',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001041,'حي الندى','Al Nada Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001042,'حي الهجن','Al Hejin Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001043,'مطــار الامير سلطان بن عبدالعزيز الدولي','Prince Sultan Bin Abdulaziz International Airport',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001044,'حي القادسية الثاني','Al Qadisiyah 2 Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001045,'حى طيبة','Taibah Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001046,'المنطقة الصناعية','Industrial Area',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001047,'حي القدس','Al Quds Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001048,'حي التعاون','Al Taawun Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001049,'حي القادسية الاول','Al Qadisiyah 1 Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001050,'حي غرناطة','Ghirnatah Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001051,'حي النخيل','Al Nakheel Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001052,'الاستاد الرياضي','Sports Stadium',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001053,'حي الياسمين','Al Yasmin Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001054,'حي السليمانية','Al Sulimaniyah Dist.',1,'2025-07-06 17:37:01','2025-07-06 17:37:01'),(10700001055,'حي الاشرافية','Al Ishrafiyah Dist.',1,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10700001056,'حي السلام','Al Salam Dist.',1,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10700001057,'حي قرطبة','Qurtubah Dist.',1,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10700001058,'حي المروج الثالث','Al Muruj 3 Dist.',1,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10700001059,'حي المروج الاول','Al Muruj 1 Dist.',1,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10700001060,'حي الربوة','Al Rabwah  Dist.',1,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10700001061,'حي المهرجان أ','Al Mahrajan A Dist.',1,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10700001062,'حي المهرجان ب','Al Mahrajan B Dist.',1,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10700001063,'حي الصالحية','As Salhiyah Dist.',1,'2025-07-06 17:37:02','2025-07-06 17:37:02'),(10700001064,'حي العزيزية القديمة','Al Aziziyah Al Qadimah Dist.',1,'2025-07-06 17:37:02','2025-07-06 17:37:02');
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estate_product_transactions`
--

DROP TABLE IF EXISTS `estate_product_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estate_product_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estate_product_transactions_product_type_id_foreign` (`product_type_id`),
  CONSTRAINT `estate_product_transactions_product_type_id_foreign` FOREIGN KEY (`product_type_id`) REFERENCES `estate_product_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estate_product_transactions`
--

LOCK TABLES `estate_product_transactions` WRITE;
/*!40000 ALTER TABLE `estate_product_transactions` DISABLE KEYS */;
INSERT INTO `estate_product_transactions` VALUES (1,'any',1,NULL,NULL),(2,'any thing',2,NULL,NULL);
/*!40000 ALTER TABLE `estate_product_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estate_product_types`
--

DROP TABLE IF EXISTS `estate_product_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estate_product_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estate_product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estate_product_types_estate_product_id_foreign` (`estate_product_id`),
  CONSTRAINT `estate_product_types_estate_product_id_foreign` FOREIGN KEY (`estate_product_id`) REFERENCES `estate_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estate_product_types`
--

LOCK TABLES `estate_product_types` WRITE;
/*!40000 ALTER TABLE `estate_product_types` DISABLE KEYS */;
INSERT INTO `estate_product_types` VALUES (1,'commercal',1,NULL,NULL),(2,'management',2,NULL,NULL);
/*!40000 ALTER TABLE `estate_product_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estate_products`
--

DROP TABLE IF EXISTS `estate_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estate_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estate_products`
--

LOCK TABLES `estate_products` WRITE;
/*!40000 ALTER TABLE `estate_products` DISABLE KEYS */;
INSERT INTO `estate_products` VALUES (1,'apartment',NULL,NULL),(2,'twonhouse',NULL,NULL);
/*!40000 ALTER TABLE `estate_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `main_orders`
--

DROP TABLE IF EXISTS `main_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `main_orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint unsigned NOT NULL,
  `ads_id` bigint unsigned NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_orders`
--

LOCK TABLES `main_orders` WRITE;
/*!40000 ALTER TABLE `main_orders` DISABLE KEYS */;
INSERT INTO `main_orders` VALUES (1,2,7,'any things','pending','2025-07-10 16:03:16','2025-07-10 16:03:16');
/*!40000 ALTER TABLE `main_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_11_23_161103_create_tenants_table',1),(6,'2025_01_04_101904_create_subscriptions_table',1),(7,'2025_01_04_103253_create_bills_table',1),(8,'2025_01_04_111005_create_tenant_stors_table',1),(9,'2025_03_19_160949_create_affiliate_admins_table',1),(10,'2025_03_19_172932_create_plan_requsts_table',1),(12,'2025_01_04_113201_create_stores_table',2),(14,'2025_07_06_163020_create_car_types_table',3),(15,'2025_07_06_184428_create_car_models_table',4),(18,'2025_07_06_202746_create_cities_table',5),(19,'2025_07_06_202820_create_districts_table',5),(20,'2025_07_07_134711_create_estate_products_table',6),(21,'2025_07_07_135107_create_estate_product_types_table',6),(22,'2025_07_07_135126_create_estate_product_transactions_table',6),(23,'2025_07_07_135832_create_translations_table',7),(24,'2025_07_07_140910_create_business_settings_table',7),(25,'2025_07_07_210002_create_ads_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (6,'App\\Models\\User',21,'eslam','c7b23d860e9fdd19b116b377606c5d3194558f0377e545e9eedcd81ff0522409','[\"*\"]',NULL,NULL,'2025-07-08 04:50:51','2025-07-08 04:50:51'),(7,'App\\Models\\User',21,'access-token','1d9feffe2cdf864f0927a16dbaeb0a93bc06c5d7d5fff49e6bbf740c20fe8494','[\"*\"]','2025-07-08 06:07:16',NULL,'2025-07-08 06:03:08','2025-07-08 06:07:16'),(8,'App\\Models\\User',22,'eslam','3c928a744d4034837460af5cb295b578f8071b613ce0c6e3727c224f8ed01f88','[\"*\"]','2025-07-08 09:08:33',NULL,'2025-07-08 06:14:29','2025-07-08 09:08:33'),(10,'App\\Models\\User',22,'access-token','410ae706c9fbb4d32125453e4edbbf09727ccbb2bb6f8256dcee93bdb7117ebc','[\"*\"]','2025-07-08 09:13:16',NULL,'2025-07-08 06:50:40','2025-07-08 09:13:16'),(11,'App\\Models\\User',22,'access-token','1ac1d570b5ff13956e4245b2015c6ffce7c5bc642c4e7df7913a0d81895e5e2d','[\"*\"]','2025-07-08 09:08:24',NULL,'2025-07-08 07:40:05','2025-07-08 09:08:24'),(12,'App\\Models\\User',42,'eslam','805150b1e0c02056373861c9461f667a7656b8c42ca197f5fed59cbe04cadf2e','[\"*\"]','2025-07-09 08:34:50',NULL,'2025-07-09 08:30:30','2025-07-09 08:34:50'),(13,'App\\Models\\User',43,'eslam','60cb8da6a9669161633d21cf0849e7ce13bae550073ab7f1625963f1fe407c5b','[\"*\"]',NULL,NULL,'2025-07-09 08:34:38','2025-07-09 08:34:38'),(14,'App\\Models\\User',42,'access-token','af0e66d2d1e311fa94419d40cb9d7c941c55b0a1be027c7eefc213cf53e09d13','[\"*\"]',NULL,NULL,'2025-07-09 09:57:01','2025-07-09 09:57:01'),(15,'App\\Models\\User',42,'access-token','5ddbfa77d5e6931e9c0f86b6ad99ce6bd5c130b0a23880722dc79251d8bbcc65','[\"*\"]',NULL,NULL,'2025-07-09 09:57:14','2025-07-09 09:57:14'),(16,'App\\Models\\User',44,'eslam','7ecf7e80ac4d2c1335796ded783754e7899e9404236f667d8f11c9131ae98343','[\"*\"]',NULL,NULL,'2025-07-09 09:58:42','2025-07-09 09:58:42'),(17,'App\\Models\\User',42,'access-token','c464c343b0b5a910b2d4b6054a5f41ae74ee325f5af8f0dd1a6930ad96f8d338','[\"*\"]','2025-07-09 17:00:12',NULL,'2025-07-09 12:15:26','2025-07-09 17:00:12'),(18,'App\\Models\\User',42,'access-token','4cbda34bf8a34a76aac6b3f62a3de4a2fe7847d978c40e0a39cf1e4c42b2b0d1','[\"*\"]','2025-07-09 16:24:01',NULL,'2025-07-09 12:28:15','2025-07-09 16:24:01'),(19,'App\\Models\\User',49,'qweqwe','571159946109a00d363c6ccf594c103dccb3a39cb456de78a9eed9414e90062d','[\"*\"]',NULL,NULL,'2025-07-09 12:46:09','2025-07-09 12:46:09'),(20,'App\\Models\\User',42,'access-token','d8937ef3c2f055c6cbb14bec9927e6530bfa4180dd9e500aa971b4ca8ecf0fcc','[\"*\"]',NULL,NULL,'2025-07-09 16:43:45','2025-07-09 16:43:45'),(21,'App\\Models\\User',51,'eslam','012eff9a79da8c56592880122db22940ea7fb812fc9b31dc8064ac9a18301713','[\"*\"]',NULL,NULL,'2025-07-09 16:45:31','2025-07-09 16:45:31'),(22,'App\\Models\\User',52,'sdfsdf','4abe3f8796c2cc2e9ef660f283460870fa737fb4fdf2271caab7d3a55fc03959','[\"*\"]',NULL,NULL,'2025-07-09 17:15:51','2025-07-09 17:15:51'),(23,'App\\Models\\User',53,'dfgfg','c2cc1bdcfec8381e54217dcd53ecd8fbc9f7858d392fb99a6b8d4736755eebe2','[\"*\"]',NULL,NULL,'2025-07-09 17:19:55','2025-07-09 17:19:55'),(24,'App\\Models\\User',54,'hjkhjk','0c5412294b2e40422b2639801368172daa1e9965573089905453a2def0ea2e07','[\"*\"]',NULL,NULL,'2025-07-09 17:24:32','2025-07-09 17:24:32'),(25,'App\\Models\\User',55,'hjkghk','af83b4767f5963f32594c6ebd112d3f63af53ca35bb07f50667b77cdf13c0ce8','[\"*\"]',NULL,NULL,'2025-07-09 18:01:44','2025-07-09 18:01:44'),(26,'App\\Models\\User',42,'access-token','0242d215da0273361cdf3bbcfd28f1ea1e6d706d0992861c86a8010deb9e0f79','[\"*\"]','2025-07-09 18:38:07',NULL,'2025-07-09 18:37:06','2025-07-09 18:38:07'),(27,'App\\Models\\User',42,'access-token','7628aa64214813492e823ba97f2db5f066de827bd9605ecfa9697468ad46661f','[\"*\"]',NULL,NULL,'2025-07-09 18:57:37','2025-07-09 18:57:37'),(28,'App\\Models\\User',42,'access-token','e9e4cdd568c463ef0337479f01762824cd8f29ac6db8db536c31a1e9d0032bb7','[\"*\"]',NULL,NULL,'2025-07-09 19:22:57','2025-07-09 19:22:57'),(29,'App\\Models\\User',42,'access-token','5db670def075323904e72b92d9076cd3fa736a2a6790d3f5ef15dc544be2987b','[\"*\"]','2025-07-10 08:29:26',NULL,'2025-07-09 19:41:50','2025-07-10 08:29:26'),(30,'App\\Models\\User',56,'gfhfghghf','a9a3bc651162b8299153e867bebf2d24b5273333b849f809c9a85016b9088da8','[\"*\"]',NULL,NULL,'2025-07-10 08:30:19','2025-07-10 08:30:19'),(31,'App\\Models\\User',57,'ghjjhghjg','45bf3e626c6557aead0cbde96636a3ccbf01ebc5f036fef0c8ee60e4caf21238','[\"*\"]',NULL,NULL,'2025-07-10 08:36:51','2025-07-10 08:36:51'),(32,'App\\Models\\User',58,'fggf','719069dc3eafeb568a01bd190521eed18ff46176bc2d7efa8f0f9f15c6b3c373','[\"*\"]','2025-07-10 08:53:53',NULL,'2025-07-10 08:46:44','2025-07-10 08:53:53'),(33,'App\\Models\\User',59,'access-token','3054fcea514fbbb36899e2f1b8f17336806c9c419cbfbce7aab8202748886f24','[\"*\"]','2025-07-12 13:36:00',NULL,'2025-07-10 08:53:38','2025-07-12 13:36:00'),(34,'App\\Models\\User',60,'micheal','12397b664ba532a53f9558fec6ffba94aab3666d954f3195548f8e88289d1d7d','[\"*\"]','2025-07-10 09:00:56',NULL,'2025-07-10 08:58:10','2025-07-10 09:00:56'),(35,'App\\Models\\User',59,'access-token','a2086afa77160ad9cdb3f69f6dd708b3df5c3bff6954bd05536ea0fee281f579','[\"*\"]','2025-07-11 10:04:36',NULL,'2025-07-10 09:03:14','2025-07-11 10:04:36'),(36,'App\\Models\\User',61,'hgjghjh','f8869e6fd967a46a3055138ee005040a1dc9a70873f6f70b31254dcc9e78aee6','[\"*\"]','2025-07-10 11:20:39',NULL,'2025-07-10 10:00:08','2025-07-10 11:20:39'),(37,'App\\Models\\User',59,'access-token','8781b885c52af0710fcf83b69108eac3e062212b2866afc9bc62943d57eaebc9','[\"*\"]','2025-07-10 12:27:33',NULL,'2025-07-10 11:52:36','2025-07-10 12:27:33'),(38,'App\\Models\\User',59,'access-token','a0dc8633470868dae8a0f1bd821ff7a7790bdf0e043ceb5e68c85ed7cc93c174','[\"*\"]','2025-07-10 12:08:27',NULL,'2025-07-10 12:08:19','2025-07-10 12:08:27'),(39,'App\\Models\\User',59,'access-token','4123b4002151260af546d12752a3a08bc803976ccca3154b43aefb695ddd8b0f','[\"*\"]','2025-07-10 12:17:43',NULL,'2025-07-10 12:11:56','2025-07-10 12:17:43'),(40,'App\\Models\\User',59,'access-token','b23fd05bec5aec98e41835c74d012cddc46689b6162f4e1cd5361914cda348c4','[\"*\"]','2025-07-10 12:22:46',NULL,'2025-07-10 12:20:34','2025-07-10 12:22:46'),(41,'App\\Models\\User',59,'access-token','1f6df56c09a46f2b808f6412bef9c912f5188b59e85a274a97a984a1b02d6557','[\"*\"]','2025-07-11 18:59:04',NULL,'2025-07-10 12:23:53','2025-07-11 18:59:04'),(42,'App\\Models\\User',62,'eslam','b68c4ac20322ed45e77c7f98a311d154786c81aeeb55446ad404a2fafd69fac0','[\"*\"]','2025-07-10 16:44:28',NULL,'2025-07-10 15:59:46','2025-07-10 16:44:28'),(43,'App\\Models\\User',59,'access-token','cb9ba47c3d0ba4bf95426feb84d415e5c244c7cb7a6b3a3598af49f79c27a9e7','[\"*\"]','2025-07-11 10:36:17',NULL,'2025-07-11 10:36:01','2025-07-11 10:36:17'),(44,'App\\Models\\User',63,'qwqw','21c19ef139223bcccd26f893c06faf7da0a05739e8c2997454854b25d62acf64','[\"*\"]','2025-07-11 19:03:18',NULL,'2025-07-11 19:00:56','2025-07-11 19:03:18'),(45,'App\\Models\\User',64,'999','7aa9d6a88d0f574eaeed64d9417067e97d97ac60217fe53c58868ab22562873e','[\"*\"]','2025-07-11 19:24:33',NULL,'2025-07-11 19:06:03','2025-07-11 19:24:33'),(46,'App\\Models\\User',65,'hhh','115a0df1687afdd874867f388e217f5d2b5723abd77bbc73eea5bbd1cd1aae00','[\"*\"]','2025-07-11 19:38:39',NULL,'2025-07-11 19:37:46','2025-07-11 19:38:39'),(47,'App\\Models\\User',66,'w','e34f3d933093fc80a003f515f54f4647853a7ae27ecb4f294625543baf02998b','[\"*\"]','2025-07-11 19:43:28',NULL,'2025-07-11 19:43:16','2025-07-11 19:43:28'),(48,'App\\Models\\User',67,'werwer','f0712106ed292899ecd1e80fd62a5385b3211d89ba01a5f05ad19ab141302486','[\"*\"]',NULL,NULL,'2025-07-11 19:45:19','2025-07-11 19:45:19'),(49,'App\\Models\\User',68,'y','dff43b1a3070b3e1ff5be3684ac972fa7c48d8a2bb3e1d66586d8ee8de0f9ea1','[\"*\"]','2025-07-11 19:47:35',NULL,'2025-07-11 19:47:09','2025-07-11 19:47:35'),(50,'App\\Models\\User',69,'a','ce26a800336b741d514835da7d13a4a934fb1fbe5bfbbffec0700c6347254683','[\"*\"]',NULL,NULL,'2025-07-11 19:57:02','2025-07-11 19:57:02'),(51,'App\\Models\\User',70,'s','a897e5bb362b568f590b812121bc5c4a3396c29d0339787f69984aaa12be4003','[\"*\"]','2025-07-11 20:17:46',NULL,'2025-07-11 19:58:40','2025-07-11 20:17:46'),(52,'App\\Models\\User',71,'sd','c3e66b8d06e575fe1578f4d4fee749921678f5b9cfa789de6e8729354a3d4e76','[\"*\"]','2025-07-11 20:20:52',NULL,'2025-07-11 20:20:04','2025-07-11 20:20:52'),(53,'App\\Models\\User',72,'asd','0c489f5b15624c44b9a11a280d17cde3127f0ac844c33fb5f5eb3ff43aa5a5bf','[\"*\"]','2025-07-11 20:21:33',NULL,'2025-07-11 20:21:23','2025-07-11 20:21:33'),(54,'App\\Models\\User',73,'gh','49a5676ede028960ab3224c5989c92eefbd8bf5ef297bfa97757bb67211ce26e','[\"*\"]','2025-07-11 20:28:30',NULL,'2025-07-11 20:27:11','2025-07-11 20:28:30'),(55,'App\\Models\\User',74,'uiiuo','414ff800e5c87715440d9fe81e27b512933c1a017f7263d1ad9e4b6d6a964158','[\"*\"]','2025-07-11 20:32:11',NULL,'2025-07-11 20:31:50','2025-07-11 20:32:11'),(56,'App\\Models\\User',75,'fg','216b4307c397d03f5d9a89d72349fc23661b12c4c17dd079c0039f41c0ba39f0','[\"*\"]','2025-07-11 20:37:41',NULL,'2025-07-11 20:36:05','2025-07-11 20:37:41'),(57,'App\\Models\\User',76,'gfh','f54c16ff6470d9f953183ed85912b28e3e79dae0163d20ebeefdd64f0b0d3ba5','[\"*\"]',NULL,NULL,'2025-07-11 20:40:12','2025-07-11 20:40:12'),(58,'App\\Models\\User',77,'asd','51c633cd0c4e64261bb7599f16ca5db9d87b136493523ead13d1d2fd767275c0','[\"*\"]','2025-07-11 20:46:38',NULL,'2025-07-11 20:46:26','2025-07-11 20:46:38'),(59,'App\\Models\\User',77,'access-token','498772a02854f15d8b32f39dfec28157e4ed684da13027d0872e93eb688f2397','[\"*\"]','2025-07-12 08:08:27',NULL,'2025-07-11 20:47:38','2025-07-12 08:08:27'),(60,'App\\Models\\User',59,'access-token','84970ba325ee00835f65d28535f2ae43bd671bb70e1ca5f7a02c4fba663897ee','[\"*\"]','2025-07-12 13:11:07',NULL,'2025-07-12 08:04:58','2025-07-12 13:11:07'),(61,'App\\Models\\User',79,'asdf','939304ab1e2641e20799ea010a19efda19b2447adc0476dbfa4ceef0ae8cd271','[\"*\"]','2025-07-12 08:11:53',NULL,'2025-07-12 08:10:02','2025-07-12 08:11:53'),(62,'App\\Models\\User',80,'poi','e7e5058f31823952b5d37efecf71b0040c43713335d20f44932f691638872c16','[\"*\"]','2025-07-12 08:42:20',NULL,'2025-07-12 08:18:23','2025-07-12 08:42:20'),(63,'App\\Models\\User',81,'fgh','d56a83f2b6f92eb236c044ae08f872ae309af29300b76574b53b7456b8c6108d','[\"*\"]','2025-07-12 13:23:28',NULL,'2025-07-12 08:44:32','2025-07-12 13:23:28'),(64,'App\\Models\\User',59,'access-token','912997ab74990ec7d214cc1b579a2750358576927f13f5cc92e808875ed33eba','[\"*\"]',NULL,NULL,'2025-07-12 12:16:30','2025-07-12 12:16:30'),(65,'App\\Models\\User',83,'vnvbn','d351e91908ed9d9e47ac0737dd2618ce58636153f00b86dabf6de2aea0f44390','[\"*\"]','2025-07-12 16:37:50',NULL,'2025-07-12 13:18:50','2025-07-12 16:37:50'),(66,'App\\Models\\User',83,'access-token','37fa78fb128d01e9aab2c52abfd77c3878f29402116ead2d8d66a3fefb51b819','[\"*\"]','2025-07-12 15:45:22',NULL,'2025-07-12 13:25:25','2025-07-12 15:45:22'),(67,'App\\Models\\User',88,'asdf','66492c9e267e85404c8c193619ab16fc0ec19bdb71bca3e1700390171e3f3f7f','[\"*\"]','2025-07-12 17:25:32',NULL,'2025-07-12 17:12:47','2025-07-12 17:25:32'),(68,'App\\Models\\User',88,'access-token','92861bf9a43fd9b238cadbb9c2498d2e6326acdc25aeb2e757da137623c450c7','[\"*\"]','2025-07-20 15:51:24',NULL,'2025-07-12 17:28:22','2025-07-20 15:51:24'),(69,'App\\Models\\User',91,'eslam','ad98ea12929e23090d45bf3c0e4b7afe2f7e6e2f985ae166ef42636c3a7be6e7','[\"*\"]',NULL,NULL,'2025-07-17 15:23:42','2025-07-17 15:23:42'),(70,'App\\Models\\User',94,'eslam','d75b3ab2e95a304e5269c8b4a3c10885e60d24c68c708acea60a28d0e02d5321','[\"*\"]',NULL,NULL,'2025-07-17 15:31:49','2025-07-17 15:31:49'),(71,'App\\Models\\User',94,'access-token','cff9efa6d3cc9049cebb7388536db0a6073d2b0b457b9bf35a9ebcc1573ed018','[\"*\"]','2025-07-18 19:05:02',NULL,'2025-07-17 15:32:20','2025-07-18 19:05:02'),(72,'App\\Models\\User',95,'micheal','07f2edb17d0d008b0444d3ae85a6511b0b85f44c9ce90fe05e491266c06e3bc3','[\"*\"]','2025-07-18 10:05:21',NULL,'2025-07-18 10:04:37','2025-07-18 10:05:21'),(73,'App\\Models\\User',98,'John Doe','5ac900277b1c1e346da99bce8bf1f62fe51a5a2d1ab8f868519417e7b1ede78a','[\"*\"]',NULL,NULL,'2025-07-19 20:49:44','2025-07-19 20:49:44'),(74,'App\\Models\\User',97,'access-token','d03c1b3b7894ebabd30e37071289305fc87e0af03788c7b245fe685e9f0e4c28','[\"*\"]',NULL,NULL,'2025-07-19 20:54:32','2025-07-19 20:54:32'),(75,'App\\Models\\User',99,'eslamass','c6a17ccdd4a38761b1fa419342d2727c128399dd4e0065428b1c828d14af31e6','[\"*\"]',NULL,NULL,'2025-07-20 10:37:00','2025-07-20 10:37:00'),(76,'App\\Models\\User',97,'access-token','9c7e99da65a2c1b8ce1d801a02277de9c576ee5fd392269629f8225dccde313f','[\"*\"]',NULL,NULL,'2025-07-20 10:46:27','2025-07-20 10:46:27'),(77,'App\\Models\\User',101,'asda','812399677126f4b0829e604f7d81d39406744d5367dfe0da2ca0703b9a921966','[\"*\"]',NULL,NULL,'2025-07-20 11:27:24','2025-07-20 11:27:24'),(78,'App\\Models\\User',104,'asd','e651633c703af577622b4f31b1f6c1de1537b675257431ea9ff2617855941c2d','[\"*\"]','2025-07-20 15:40:38',NULL,'2025-07-20 11:35:39','2025-07-20 15:40:38'),(79,'App\\Models\\User',105,'mohamed fathy','a823f47b8c7d4c2505667b49ccc27879daf91a780aa94419bc5af0db7652a74e','[\"*\"]','2025-07-20 11:57:00',NULL,'2025-07-20 11:37:54','2025-07-20 11:57:00'),(80,'App\\Models\\User',108,'dfgh','51d8a8bcab427d1d1b44ebe4cc10a906da6d70fcdb1371fe203169ff8c96e982','[\"*\"]','2025-07-20 15:46:00',NULL,'2025-07-20 15:43:28','2025-07-20 15:46:00');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan_requsts`
--

DROP TABLE IF EXISTS `plan_requsts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plan_requsts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `plan_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan_requsts`
--

LOCK TABLES `plan_requsts` WRITE;
/*!40000 ALTER TABLE `plan_requsts` DISABLE KEYS */;
/*!40000 ALTER TABLE `plan_requsts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenant_id` tinyint DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `domains` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `database_options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `stores_chk_1` CHECK (json_valid(`database_options`))
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stores`
--

LOCK TABLES `stores` WRITE;
/*!40000 ALTER TABLE `stores` DISABLE KEYS */;
INSERT INTO `stores` VALUES (98,'eslam badawy','theme1',110,'active','admin','{\"dbname\":\"tall_98\"}','2025-07-20 15:53:29','2025-07-20 15:53:29');
/*!40000 ALTER TABLE `stores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `duration` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_orders` int NOT NULL DEFAULT '10',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tenant_stors`
--

DROP TABLE IF EXISTS `tenant_stors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tenant_stors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tenant_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `subscription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tenant_stors_tenant_id_unique` (`tenant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tenant_stors`
--

LOCK TABLES `tenant_stors` WRITE;
/*!40000 ALTER TABLE `tenant_stors` DISABLE KEYS */;
/*!40000 ALTER TABLE `tenant_stors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tenants`
--

DROP TABLE IF EXISTS `tenants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tenants` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nametxt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `db` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domains` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tenants_username_unique` (`username`),
  UNIQUE KEY `tenants_domain_unique` (`domain`),
  UNIQUE KEY `tenants_db_unique` (`db`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tenants`
--

LOCK TABLES `tenants` WRITE;
/*!40000 ALTER TABLE `tenants` DISABLE KEYS */;
/*!40000 ALTER TABLE `tenants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `super` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `affiliate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (110,'eslam badawy','admin','115009801','e@badawy.e','1',NULL,'1',NULL,'0','$2y$12$XDYbZvJi2zHxoLADyoODiOaSehzSN/c/pdy0aoDLNYQcoiqVtvhue','0',NULL,NULL,NULL,'2025-07-20 15:53:29','2025-07-20 15:53:29');
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

-- Dump completed on 2025-07-20 19:29:58
