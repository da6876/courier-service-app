-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 02:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courier-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `change_log`
--

CREATE TABLE `change_log` (
  `log_id` int(10) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `operation_type` enum('INSERT','UPDATE','DELETE') NOT NULL,
  `record_id` int(10) NOT NULL,
  `old_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`old_data`)),
  `new_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`new_data`)),
  `changed_by` varchar(50) NOT NULL,
  `change_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `change_log`
--

INSERT INTO `change_log` (`log_id`, `table_name`, `operation_type`, `record_id`, `old_data`, `new_data`, `changed_by`, `change_date`) VALUES
(1, 'pro_info', 'UPDATE', 11040001, '{\"product_name\": \"Test 122\", \"product_type_id\": 11010000, \"Categorie_id\": 11020000, \"sub_Categorie_id\": 11030000, \"shot_decs\": \"asdad22\", \"decs\": \"0\", \"Gm\": \"GM\", \"Pcs_Per_Ctn\": \"53\", \"dp_unit\": 0, \"rp_unit\": 0, \"mrp_unit\": 0, \"product_sku_code\": \"SKU-99E23D8B\", \"product_image\": \"323222\", \"product_image2\": \"No Image\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 02:01:33\", \"update_by\": \"2\", \"update_date\": \"2024-09-13 11:12:05\"}', '{\"product_name\": \"Test 12211\", \"product_type_id\": 11010001, \"Categorie_id\": 11020001, \"sub_Categorie_id\": 11030001, \"shot_decs\": \"asdad22222\", \"decs\": \"0\", \"Gm\": \"KG\", \"Pcs_Per_Ctn\": \"53\", \"dp_unit\": 0, \"rp_unit\": 0, \"mrp_unit\": 0, \"product_sku_code\": \"SKU-99E23D8B\", \"product_image\": \"3232222\", \"product_image2\": \"No Image\", \"status\": \"I\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 02:01:33\", \"update_by\": \"2\", \"update_date\": \"2024-09-13 11:23:27\"}', 'root@localhost', '2024-09-13 11:23:27'),
(2, 'pro_type', 'UPDATE', 11010000, '{\"uid\": \"cb9c3e36-47f5-47c7-8f15-1dc4f1b53fe0\", \"name\": \"Test\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 00:49:06\", \"update_by\": \"0\", \"update_date\": \"0\"}', '{\"uid\": \"cb9c3e36-47f5-47c7-8f15-1dc4f1b53fe0\", \"name\": \"Biscuits\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 00:49:06\", \"update_by\": \"2\", \"update_date\": \"2024-09-15 23:56:47\"}', 'root@localhost', '2024-09-15 23:56:47'),
(3, 'pro_type', 'UPDATE', 11010001, '{\"uid\": \"e38459ae-208e-45d1-b39d-bda93401a646\", \"name\": \"Test11\", \"status\": \"I\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 00:49:12\", \"update_by\": \"2\", \"update_date\": \"2024-09-12 00:49:37\"}', '{\"uid\": \"e38459ae-208e-45d1-b39d-bda93401a646\", \"name\": \"Breads\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 00:49:12\", \"update_by\": \"2\", \"update_date\": \"2024-09-15 23:56:57\"}', 'root@localhost', '2024-09-15 23:56:57'),
(4, 'pro_type', 'UPDATE', 11010002, '{\"uid\": \"ffc33288-fe7b-420f-b84c-f527b0aecb83\", \"name\": \"dsfsf\", \"status\": \"Deleted\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 00:49:44\", \"update_by\": \"2\", \"update_date\": \"2024-09-12 00:49:47\"}', '{\"uid\": \"ffc33288-fe7b-420f-b84c-f527b0aecb83\", \"name\": \"Cake\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 00:49:44\", \"update_by\": \"2\", \"update_date\": \"2024-09-12 00:49:47\"}', 'root@localhost', '2024-09-15 23:58:52'),
(5, 'pro_category', 'UPDATE', 11020000, '{\"uid\": \"2c789134-661e-4591-a74e-d21c6e069f9a\", \"name\": \"Test\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 00:27:00\", \"update_by\": \"0\", \"update_date\": \"0\"}', '{\"uid\": \"2c789134-661e-4591-a74e-d21c6e069f9a\", \"name\": \"Biscuits\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 00:27:00\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 00:06:38\"}', 'root@localhost', '2024-09-16 00:06:38'),
(6, 'pro_category', 'UPDATE', 11020001, '{\"uid\": \"24e95fed-1c43-4f04-b936-078fa8e11e73\", \"name\": \"Test 1\", \"status\": \"I\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 00:27:09\", \"update_by\": \"2\", \"update_date\": \"2024-09-12 00:44:33\"}', '{\"uid\": \"24e95fed-1c43-4f04-b936-078fa8e11e73\", \"name\": \"Breads\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 00:27:09\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 00:06:47\"}', 'root@localhost', '2024-09-16 00:06:47'),
(7, 'pro_category', 'UPDATE', 11020003, '{\"uid\": \"d5401564-0a66-4ef9-871a-3846ba166bd7\", \"name\": \"TTTTT111\", \"status\": \"I\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 00:41:37\", \"update_by\": \"2\", \"update_date\": \"2024-09-12 00:44:27\"}', '{\"uid\": \"d5401564-0a66-4ef9-871a-3846ba166bd7\", \"name\": \"Cake\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 00:41:37\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 00:06:56\"}', 'root@localhost', '2024-09-16 00:06:56'),
(8, 'pro_sub_category', 'UPDATE', 11030000, '{\"uid\": \"5eec7f4b-f7de-4d69-9dd0-3cbc95f57570\", \"name\": \"Test\", \"cat_id\": 11020000, \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 01:01:32\", \"update_by\": \"0\", \"update_date\": \"0\"}', '{\"uid\": \"5eec7f4b-f7de-4d69-9dd0-3cbc95f57570\", \"name\": \"Salt Biscuit\", \"cat_id\": 11020000, \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 01:01:32\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 00:08:21\"}', 'root@localhost', '2024-09-16 00:08:21'),
(9, 'pro_sub_category', 'UPDATE', 11030001, '{\"uid\": \"2ab08954-ae33-4bf6-b567-f3fd7910e8e4\", \"name\": \"Test 1\", \"cat_id\": 11020001, \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 01:01:45\", \"update_by\": \"2\", \"update_date\": \"2024-09-12 01:02:25\"}', '{\"uid\": \"2ab08954-ae33-4bf6-b567-f3fd7910e8e4\", \"name\": \"Biscuit\", \"cat_id\": 11020000, \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 01:01:45\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 00:09:08\"}', 'root@localhost', '2024-09-16 00:09:08'),
(10, 'pro_info', 'UPDATE', 11040000, '{\"product_name\": \"Test1\", \"product_type_id\": 11010001, \"Categorie_id\": 11020001, \"sub_Categorie_id\": 11030001, \"shot_decs\": \"Test\", \"decs\": \"0\", \"Gm\": \"KG\", \"Pcs_Per_Ctn\": \"100\", \"dp_unit\": 0, \"rp_unit\": 0, \"mrp_unit\": 0, \"product_sku_code\": \"SKU-99E2322A\", \"product_image\": \"aAAAA\", \"product_image2\": \"No Image\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 01:58:45\", \"update_by\": \"2\", \"update_date\": \"2024-09-12 02:10:15\"}', '{\"product_name\": \"Dia Salt Biscuit\", \"product_type_id\": 11010000, \"Categorie_id\": 11020000, \"sub_Categorie_id\": 11030000, \"shot_decs\": \"Dia Salt Biscuit\", \"decs\": \"0\", \"Gm\": \"PCS\", \"Pcs_Per_Ctn\": \"10\", \"dp_unit\": 0, \"rp_unit\": 0, \"mrp_unit\": 0, \"product_sku_code\": \"SKU-99E2322A\", \"product_image\": \"AAA\", \"product_image2\": \"No Image\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 01:58:45\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 00:09:53\"}', 'root@localhost', '2024-09-16 00:09:53'),
(11, 'pro_info', 'UPDATE', 11040001, '{\"product_name\": \"Test 12211\", \"product_type_id\": 11010001, \"Categorie_id\": 11020001, \"sub_Categorie_id\": 11030001, \"shot_decs\": \"asdad22222\", \"decs\": \"0\", \"Gm\": \"KG\", \"Pcs_Per_Ctn\": \"53\", \"dp_unit\": 0, \"rp_unit\": 0, \"mrp_unit\": 0, \"product_sku_code\": \"SKU-99E23D8B\", \"product_image\": \"3232222\", \"product_image2\": \"No Image\", \"status\": \"I\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 02:01:33\", \"update_by\": \"2\", \"update_date\": \"2024-09-13 11:23:27\"}', '{\"product_name\": \"Econo Dia Salt Biscuit\", \"product_type_id\": 11010000, \"Categorie_id\": 11020000, \"sub_Categorie_id\": 11030000, \"shot_decs\": \"Econo Dia Salt Biscuit\", \"decs\": \"0\", \"Gm\": \"PCS\", \"Pcs_Per_Ctn\": \"12\", \"dp_unit\": 0, \"rp_unit\": 0, \"mrp_unit\": 0, \"product_sku_code\": \"SKU-99E23D8B\", \"product_image\": \"3232222\", \"product_image2\": \"No Image\", \"status\": \"I\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 02:01:33\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 00:10:19\"}', 'root@localhost', '2024-09-16 00:10:19'),
(12, 'pro_info', 'UPDATE', 11040003, '{\"product_name\": \"Test Pro\", \"product_type_id\": 11010000, \"Categorie_id\": 11020000, \"sub_Categorie_id\": 11030000, \"shot_decs\": \"Test Pro Decs\", \"decs\": \"0\", \"Gm\": \"GM\", \"Pcs_Per_Ctn\": \"50\", \"dp_unit\": 0, \"rp_unit\": 0, \"mrp_unit\": 0, \"product_sku_code\": \"SKU-F1A89F83\", \"product_image\": \"AAAAAA\", \"product_image2\": \"No Image\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-13 11:11:07\", \"update_by\": \"N\", \"update_date\": \"N\"}', '{\"product_name\": \"Horlicks Biscuit\", \"product_type_id\": 11010000, \"Categorie_id\": 11020000, \"sub_Categorie_id\": 11030001, \"shot_decs\": \"Horlicks Biscuit\", \"decs\": \"0\", \"Gm\": \"PCS\", \"Pcs_Per_Ctn\": \"15\", \"dp_unit\": 0, \"rp_unit\": 0, \"mrp_unit\": 0, \"product_sku_code\": \"SKU-F1A89F83\", \"product_image\": \"AAAAAA\", \"product_image2\": \"No Image\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-13 11:11:07\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 00:10:44\"}', 'root@localhost', '2024-09-16 00:10:44'),
(13, 'pro_type', 'UPDATE', 11010001, '{\"uid\": \"31839b4d-7f77-4175-8754-9892e1da3346\", \"name\": \"Breads\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:10:08\", \"update_by\": null, \"update_date\": null}', '{\"uid\": \"31839b4d-7f77-4175-8754-9892e1da3346\", \"name\": \"Cake\", \"status\": \"I\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:10:08\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 11:10:17\"}', 'root@localhost', '2024-09-16 11:10:17'),
(14, 'pro_type', 'INSERT', 11010003, NULL, '{\"uid\": \"b334dff5-11b6-4c72-84d1-3adbaba2f62a\", \"name\": \"AAA\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:17:03\", \"update_by\": null, \"update_date\": null}', 'root@localhost', '2024-09-16 11:17:03'),
(15, 'pro_type', 'UPDATE', 11010003, '{\"uid\": \"b334dff5-11b6-4c72-84d1-3adbaba2f62a\", \"name\": \"AAA\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:17:03\", \"update_by\": null, \"update_date\": null}', '{\"uid\": \"b334dff5-11b6-4c72-84d1-3adbaba2f62a\", \"name\": \"AAA222\", \"status\": \"I\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:17:03\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 11:17:11\"}', 'root@localhost', '2024-09-16 11:17:11'),
(16, 'pro_type', 'UPDATE', 11010001, '{\"uid\": \"31839b4d-7f77-4175-8754-9892e1da3346\", \"name\": \"Cake\", \"status\": \"I\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:10:08\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 11:10:17\"}', '{\"uid\": \"31839b4d-7f77-4175-8754-9892e1da3346\", \"name\": \"Breads\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:10:08\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 11:18:47\"}', 'root@localhost', '2024-09-16 11:18:47'),
(17, 'pro_type', 'UPDATE', 11010002, '{\"uid\": \"0449c061-f3f6-4ca8-afee-8ffcdff46694\", \"name\": \"Breads\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:10:41\", \"update_by\": null, \"update_date\": null}', '{\"uid\": \"0449c061-f3f6-4ca8-afee-8ffcdff46694\", \"name\": \"Cake\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:10:41\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 11:18:51\"}', 'root@localhost', '2024-09-16 11:18:51'),
(18, 'pro_category', 'INSERT', 11020009, NULL, '{\"uid\": \"37d397ed-f9d3-4b6f-92b0-58599145e8cb\", \"name\": \"hj\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:37:26\", \"update_by\": \"0\", \"update_date\": \"0\"}', 'root@localhost', '2024-09-16 11:37:26'),
(19, 'pro_sub_category', 'INSERT', 11030005, NULL, '{\"uid\": \"3ae92ab1-af5c-4642-a9ed-3ef66881023d\", \"name\": \"Test\", \"cat_id\": 11020000, \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:46:31\", \"update_by\": \"0\", \"update_date\": \"0\"}', 'root@localhost', '2024-09-16 11:46:31'),
(20, 'pro_sub_category', 'UPDATE', 11030005, '{\"uid\": \"3ae92ab1-af5c-4642-a9ed-3ef66881023d\", \"name\": \"Test\", \"cat_id\": 11020000, \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:46:31\", \"update_by\": \"0\", \"update_date\": \"0\"}', '{\"uid\": \"3ae92ab1-af5c-4642-a9ed-3ef66881023d\", \"name\": \"Testaaa\", \"cat_id\": 11020009, \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:46:31\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 11:46:40\"}', 'root@localhost', '2024-09-16 11:46:40'),
(21, 'pro_type', 'INSERT', 11010004, NULL, '{\"uid\": \"ae315405-d3fb-46c9-a67b-9fb58f4a7ab6\", \"name\": \"adad\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:47:43\", \"update_by\": null, \"update_date\": null}', 'root@localhost', '2024-09-16 11:47:43'),
(22, 'pro_type', 'UPDATE', 11010004, '{\"uid\": \"ae315405-d3fb-46c9-a67b-9fb58f4a7ab6\", \"name\": \"adad\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:47:43\", \"update_by\": null, \"update_date\": null}', '{\"uid\": \"ae315405-d3fb-46c9-a67b-9fb58f4a7ab6\", \"name\": \"adad\", \"status\": \"Deleted\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:47:43\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 11:49:13\"}', 'root@localhost', '2024-09-16 11:49:13'),
(23, 'pro_type', 'UPDATE', 11010003, '{\"uid\": \"b334dff5-11b6-4c72-84d1-3adbaba2f62a\", \"name\": \"AAA222\", \"status\": \"I\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:17:03\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 11:17:11\"}', '{\"uid\": \"b334dff5-11b6-4c72-84d1-3adbaba2f62a\", \"name\": \"AAA222\", \"status\": \"Deleted\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:17:03\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 11:49:41\"}', 'root@localhost', '2024-09-16 11:49:41'),
(24, 'pro_type', 'INSERT', 11010005, NULL, '{\"uid\": \"aa8b9675-59b0-4fc1-9cdf-654f8fcab8d4\", \"name\": \"Test\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-16 11:49:57\", \"update_by\": null, \"update_date\": null}', 'root@localhost', '2024-09-16 11:49:57'),
(25, 'pro_info', 'UPDATE', 11040000, '{\"product_name\": \"Dia Salt Biscuit\", \"product_type_id\": 11010000, \"Categorie_id\": 11020000, \"sub_Categorie_id\": 11030000, \"shot_decs\": \"Dia Salt Biscuit\", \"decs\": \"0\", \"Gm\": \"PCS\", \"Pcs_Per_Ctn\": \"10\", \"dp_unit\": 0, \"rp_unit\": 0, \"mrp_unit\": 0, \"product_sku_code\": \"SKU-99E2322A\", \"product_image\": \"AAA\", \"product_image2\": \"No Image\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 01:58:45\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 00:09:53\"}', '{\"product_name\": \"Dia Salt Biscuit\", \"product_type_id\": 11010000, \"Categorie_id\": 11020000, \"sub_Categorie_id\": 11030000, \"shot_decs\": \"Dia Salt Biscuit\", \"decs\": \"0\", \"Gm\": \"PCS\", \"Pcs_Per_Ctn\": \"10\", \"dp_unit\": 0, \"rp_unit\": 0, \"mrp_unit\": 0, \"product_sku_code\": \"SKU-99E2322A\", \"product_image\": \"assets/product_img/66e7ca643b649.png\", \"product_image2\": \"No Image\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 01:58:45\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 12:04:20\"}', 'root@localhost', '2024-09-16 12:04:20'),
(26, 'pro_info', 'UPDATE', 11040000, '{\"product_name\": \"Dia Salt Biscuit\", \"product_type_id\": 11010000, \"Categorie_id\": 11020000, \"sub_Categorie_id\": 11030000, \"shot_decs\": \"Dia Salt Biscuit\", \"decs\": \"0\", \"Gm\": \"PCS\", \"Pcs_Per_Ctn\": \"10\", \"dp_unit\": 0, \"rp_unit\": 0, \"mrp_unit\": 0, \"product_sku_code\": \"SKU-99E2322A\", \"product_image\": \"assets/product_img/66e7ca643b649.png\", \"product_image2\": \"No Image\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 01:58:45\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 12:04:20\"}', '{\"product_name\": \"Dia Salt Biscuit\", \"product_type_id\": 11010000, \"Categorie_id\": 11020000, \"sub_Categorie_id\": 11030000, \"shot_decs\": \"Dia Salt Biscuit\", \"decs\": \"0\", \"Gm\": \"PCS\", \"Pcs_Per_Ctn\": \"10\", \"dp_unit\": 0, \"rp_unit\": 0, \"mrp_unit\": 0, \"product_sku_code\": \"SKU-99E2322A\", \"product_image\": \"assets/product_img/66e7cab01d995.png\", \"product_image2\": \"No Image\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 01:58:45\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 12:05:36\"}', 'root@localhost', '2024-09-16 12:05:36'),
(27, 'pro_info', 'UPDATE', 11040001, '{\"product_name\": \"Econo Dia Salt Biscuit\", \"product_type_id\": 11010000, \"Categorie_id\": 11020000, \"sub_Categorie_id\": 11030000, \"shot_decs\": \"Econo Dia Salt Biscuit\", \"decs\": \"0\", \"Gm\": \"PCS\", \"Pcs_Per_Ctn\": \"12\", \"dp_unit\": 0, \"rp_unit\": 0, \"mrp_unit\": 0, \"product_sku_code\": \"SKU-99E23D8B\", \"product_image\": \"3232222\", \"product_image2\": \"No Image\", \"status\": \"I\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 02:01:33\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 00:10:19\"}', '{\"product_name\": \"Econo Dia Salt Biscuit\", \"product_type_id\": 11010000, \"Categorie_id\": 11020000, \"sub_Categorie_id\": 11030000, \"shot_decs\": \"Econo Dia Salt Biscuit\", \"decs\": \"0\", \"Gm\": \"PCS\", \"Pcs_Per_Ctn\": \"12\", \"dp_unit\": 0, \"rp_unit\": 0, \"mrp_unit\": 0, \"product_sku_code\": \"SKU-99E23D8B\", \"product_image\": \"assets/product_img/66e7cad0d80de.jpg\", \"product_image2\": \"No Image\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-12 02:01:33\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 12:06:08\"}', 'root@localhost', '2024-09-16 12:06:08'),
(28, 'pro_info', 'UPDATE', 11040003, '{\"product_name\": \"Horlicks Biscuit\", \"product_type_id\": 11010000, \"Categorie_id\": 11020000, \"sub_Categorie_id\": 11030001, \"shot_decs\": \"Horlicks Biscuit\", \"decs\": \"0\", \"Gm\": \"PCS\", \"Pcs_Per_Ctn\": \"15\", \"dp_unit\": 0, \"rp_unit\": 0, \"mrp_unit\": 0, \"product_sku_code\": \"SKU-F1A89F83\", \"product_image\": \"AAAAAA\", \"product_image2\": \"No Image\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-13 11:11:07\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 00:10:44\"}', '{\"product_name\": \"Horlicks Biscuit\", \"product_type_id\": 11010000, \"Categorie_id\": 11020000, \"sub_Categorie_id\": 11030001, \"shot_decs\": \"Horlicks Biscuit\", \"decs\": \"0\", \"Gm\": \"PCS\", \"Pcs_Per_Ctn\": \"15\", \"dp_unit\": 0, \"rp_unit\": 0, \"mrp_unit\": 0, \"product_sku_code\": \"SKU-F1A89F83\", \"product_image\": \"assets/product_img/66e7cae9d464f.png\", \"product_image2\": \"No Image\", \"status\": \"A\", \"create_by\": \"2\", \"create_date\": \"2024-09-13 11:11:07\", \"update_by\": \"2\", \"update_date\": \"2024-09-16 12:06:33\"}', 'root@localhost', '2024-09-16 12:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(20) NOT NULL,
  `tracking_number` varchar(100) DEFAULT NULL,
  `uid` varchar(100) DEFAULT NULL,
  `store_id` int(10) DEFAULT NULL,
  `prod_type_id` int(10) DEFAULT NULL,
  `merchant_order_id` int(10) DEFAULT NULL,
  `recipient_phone` varchar(20) DEFAULT NULL,
  `recipient_sec_phone` varchar(20) DEFAULT NULL,
  `recipient_name` varchar(150) DEFAULT NULL,
  `recipient_address` varchar(255) DEFAULT NULL,
  `div_id` int(10) DEFAULT NULL,
  `dis_id` int(10) DEFAULT NULL,
  `out_id` int(10) DEFAULT NULL,
  `thn_id` int(10) DEFAULT NULL,
  `special_remark` varchar(255) DEFAULT NULL,
  `delivery_type` varchar(25) DEFAULT NULL,
  `total_weight` varchar(20) DEFAULT NULL,
  `quantity` varchar(20) DEFAULT NULL,
  `amount_to_collect` varchar(20) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `item_description` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `create_by` varchar(20) DEFAULT NULL,
  `create_date` varchar(20) DEFAULT NULL,
  `update_by` varchar(20) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `tracking_number`, `uid`, `store_id`, `prod_type_id`, `merchant_order_id`, `recipient_phone`, `recipient_sec_phone`, `recipient_name`, `recipient_address`, `div_id`, `dis_id`, `out_id`, `thn_id`, `special_remark`, `delivery_type`, `total_weight`, `quantity`, `amount_to_collect`, `price`, `item_description`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, NULL, '45fd9fb1-6687-4a6d-a83d-b2195c89b166', 1, 110000, NULL, '018423669', '0123695233', 'Sabikun Nahar', 'Mirpur-13,Dhaka', 11000, 12000, 14000, 12, 'Test Special Remark', '1', '12', '1', '5580', '5500', 'Mobile Phone', 'Deleted', '15', '2024-10-07 16:34:12', '15', '2024-10-07 16:53:02'),
(2, NULL, '30457975-5a28-400a-96cd-46c54f97d78b', 1, 110000, NULL, '+1 (954) 584-2147', '+1 (155) 295-3379', 'Kristen Bryan', 'Cillum velit libero', 11000, 12000, 14001, 8, 'Ullam soluta sunt a', '1', 'Labore vel officia n', '1', '5580', '5500', 'Pariatur Tenetur nu', 'Deleted', '15', '2024-10-07 16:39:24', '15', '2024-10-07 16:53:06'),
(3, 'DB241007YCKKDT2Z', 'cfe4d3da-a11e-4443-b4f4-e48517182dac', 1, 110000, NULL, '+1 (618) 833-7286', '+1 (622) 116-4353', 'Nathan Beach', 'Et vero ut velit iu', 11000, 12000, 14001, 8, 'Non veniam facere p', '2', 'Sunt eos aliquip mod', '0', '2060', '2000', 'Id veritatis blandit', 'Received', '15', '2024-10-07 16:51:55', '0', '0'),
(4, 'DB2410074U8R03HB', '32587504-84c4-448f-b144-03ff6fbf6323', 1, 110000, NULL, '+1 (334) 786-5357', '+1 (304) 644-3334', 'Travis England', 'Ullam labore volupta', 11000, 12000, 14001, 8, 'Debitis et at recusa', '2', 'Eos esse minima bl', '0', '1580', '1500', 'In nobis earum exerc', 'Pending', '15', '2024-10-07 16:53:18', '0', '0'),
(5, 'DB241007PPLBHTTZ', '0c3e90b9-9efa-449e-b9ba-8d348c860c38', 1, 110000, NULL, '+1 (866) 173-8342', '+1 (181) 767-7467', 'Lisandra Gallegos', 'Cumque natus ipsa i', 11000, 12000, 14001, 8, 'Sint eum consequat', '1', '33', '1', '200', '140', 'Exercitationem digni', 'Pending', '15', '2024-10-07 17:23:16', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_type`
--

CREATE TABLE `delivery_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` varchar(36) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `create_by` varchar(10) DEFAULT NULL,
  `create_date` varchar(20) DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_type`
--

INSERT INTO `delivery_type` (`id`, `uid`, `name`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, 'adad332323', 'Normal Delivery', 'A', 'system', 'aaaa', NULL, NULL),
(2, '44fsfsdf', 'Hub Delivery', 'A', 'system', 'asadad', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` varchar(20) DEFAULT 'I',
  `create_by` varchar(20) DEFAULT NULL,
  `create_date` varchar(20) DEFAULT NULL,
  `update_by` varchar(20) DEFAULT 'N',
  `update_date` varchar(20) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `uid`, `title`, `url`, `icon`, `parent_id`, `order`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, '3d011d40-5f68-48bf-96b1-a077dadasb66', 'Dashboard', 'dashboard', 'typcn typcn-device-desktop', NULL, 1, 'A', '2024-09-02 19:07:45', '2024-09-02 19:07:45', '2', '2024-09-22 01:02:49'),
(2, '3d011d40-5f68-48bf-96b1-a077232abb66', 'Location Config', '#', 'typcn typcn-document-text', NULL, 8, 'A', '2024-09-02 19:07:45', '2024-09-02 19:07:45', '2', '2024-09-22 01:04:16'),
(4, '3d011d40-5f68-48bf-2234-a077d8a6bb66', 'User Config', '#', 'typcn typcn-chart-pie-outline', NULL, 3, 'A', '2024-09-02 19:07:45', '2024-09-02 19:07:45', '2', '2024-09-22 01:04:26'),
(8, '1a3d7bc1-780f-11ef-9165-d8bbc14c2e2b', 'Division Info', 'DivisionInfo', 'bi', 2, 1, 'A', '2024-09-02 19:07:45', '2024-09-02 19:07:45', '2', '2024-09-22 01:04:42'),
(9, '1a3d91ba-780f-11ef-9165-d8bbc14c2e2b', 'District Info', 'DistrictInfo', 'bi', 2, 2, 'A', '2024-09-02 19:07:45', '2024-09-02 19:07:45', '2', '2024-09-22 01:04:46'),
(10, '1a3d9237-780f-11ef-9165-d8bbc14c2e2b', 'Thana Info', 'ThanaInfo', 'bi', 2, 3, 'A', '2024-09-02 19:07:45', '2024-09-02 19:07:45', '2', '2024-09-22 01:05:01'),
(20, '1a3d9419-780f-11ef-9165-d8bbc14c2e2b', 'Area Info', 'AreaInfo', 'bi', 2, 3, 'A', '2024-09-02 19:07:45', '2024-09-02 19:07:45', '2', '2024-09-22 01:05:38'),
(26, '1a3d954d-780f-11ef-9165-d8bbc14c2e2b', 'Merchant Info', 'merchant-info', 'bi', 4, 1, 'A', '2024-09-02 19:07:45', '2024-09-02 19:07:45', '2', '2024-09-22 01:06:07'),
(27, '1a3d9588-780f-11ef-9165-d8bbc14c2e2b', 'User Info', 'UserInfo', 'bi', 4, 1, 'A', '2024-09-02 19:07:45', '2024-09-02 19:07:45', '2', '2024-09-22 01:06:03'),
(30, '1a3d95fd-780f-11ef-9165-d8bbc14c2e2b', 'Settings', 'WebSettings', 'typcn typcn-weather-snow', NULL, 11, 'A', '2024-09-02 19:07:45', '2024-09-02 19:07:45', '2', '2024-09-22 01:30:40'),
(32, '1a3d9676-780f-11ef-9165-d8bbc14c2e2b', 'Menus Config', '#', 'typcn typcn-th-menu', NULL, 7, 'A', '2024-09-02 19:07:45', '2024-09-02 19:07:45', '2', '2024-09-22 01:30:25'),
(33, '1a3d96b0-780f-11ef-9165-d8bbc14c2e2b', 'Menu Info', 'menu-info', 'bi', 32, 1, 'A', '2024-09-02 19:07:45', '2024-09-02 19:07:45', '2', '2024-09-22 01:30:20'),
(44, '1a3d9930-780f-11ef-9165-d8bbc14c2e2b', 'Roles', 'roles', 'bi', 4, 1, 'A', '2024-09-02 19:07:45', '2024-09-02 19:07:45', '2', '2024-09-22 01:29:16'),
(45, '1a3d9973-780f-11ef-9165-d8bbc14c2e2b', 'Permissions', 'permission', 'bi', 4, 1, 'A', '2024-09-02 19:07:45', '2024-09-02 19:07:45', '2', '2024-09-22 01:29:09'),
(51, 'bd8ddff3-ca32-44c8-9d13-fe9a2e296c06', 'Deliverys', 'deliverys', 'typcn typcn-map', NULL, 2, 'A', '2', '2024-10-05 16:06:14', '2', '2024-10-07 16:18:54'),
(52, '4e487795-08f3-44b3-955b-232841cdc2ae', 'Store', 'store', 'typcn typcn-home-outline', NULL, 3, 'A', '2', '2024-10-05 16:08:26', 'N', 'N'),
(53, 'd009b7c8-9fb4-4c6e-a5b6-3f34e85e4bea', 'Invoices', 'invoices', 'typcn typcn-clipboard', NULL, 4, 'A', '2', '2024-10-05 16:09:25', 'N', 'N'),
(59, '36d3d3e3-8010-4900-a47f-b7b534931572', 'Pricing Plan', 'pricing.plan', 'typcn typcn-credit-card', NULL, 7, 'A', '2', '2024-10-07 16:11:00', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `uid` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_phone` varchar(255) NOT NULL,
  `owner_email` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_phone` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `create_by` varchar(255) NOT NULL,
  `create_date` varchar(255) NOT NULL,
  `update_date` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`id`, `user_id`, `uid`, `owner_name`, `owner_phone`, `owner_email`, `company_name`, `company_phone`, `company_email`, `address`, `status`, `create_by`, `create_date`, `update_date`, `update_by`) VALUES
(1, NULL, '61ac550b-ed8c-4ad6-afb6-be4e2c3da4b0', 'Merchant Name', '014785236', 'namedis@gmail.com', 'Merchant Company Name', '0147852366', 'merchantcompanyname@gmail.com', 'Dhaka,Bangladesh', 'A', '2', '2024-09-15 19:13:46', '2024-10-05 12:56:09', '2'),
(2, NULL, '4aedfed6-36e9-44ad-8689-a457dca4193c', 'Blossom Workman', '+1 (673) 646-7197', '38', 'moqeqeliv@mailinator.com', NULL, NULL, NULL, 'A', '38', '2024-10-05 14:04:33', '0', '0'),
(3, NULL, '8299c9dc-2fb4-4c3c-ab63-f6ca26f11aa0', 'Zoe Strong', '+1 (702) 164-3553', '85', 'pogecyfa@mailinator.com', NULL, NULL, NULL, 'A', '85', '2024-10-05 14:36:28', '0', '0'),
(4, NULL, '6959aa59-9e04-4d08-85ba-5a9d894ac899', 'Jocelyn Dejesus', '+1 (197) 532-8769', '75', 'porero@mailinator.com', NULL, NULL, NULL, 'A', '75', '2024-10-05 14:37:12', '0', '0'),
(5, NULL, '78ac578e-dd7b-4a3f-86f0-06c7cb8e25f2', 'Clare Swanson', '+1 (424) 782-6565', '66', 'wizimovo@mailinator.com', NULL, NULL, NULL, 'A', '66', '2024-10-05 14:53:35', '0', '0'),
(13, NULL, '771bb9c7-c3a3-4021-8608-3f00726e779d', 'Jeremy Bowen', '+1 (951) 397-4823', '44', 'abirdhali6876@gmail.com', NULL, NULL, NULL, 'A', '44', '2024-10-05 15:39:48', '0', '0'),
(14, NULL, 'a58f6c33-5688-4a19-986c-b03c290c0238', 'Jin Adams', '40', 'abirdhaliaaaa6876@gmail.com', 'Cline and Boyer Co', NULL, NULL, NULL, 'A', 'abirdhali6876@gmail.com', '2024-10-05 15:43:11', '0', '0'),
(16, NULL, '873d1965-1d57-49b5-afb9-1519bf88ab21', 'Rifat Hossion', '0186324666', 'abirdhali49@gmail.com', 'Source Of Capacity', NULL, NULL, NULL, 'A', 'abirdhali49@gmail.com', '2024-10-05 15:58:34', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2024_09_02_194001_create_menus_table', 1),
(6, '2014_10_12_000000_create_users_table', 2),
(21, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(22, '2024_09_05_063457_create_sessions_table', 3),
(23, '2019_08_19_000000_create_failed_jobs_table', 4),
(24, '2024_09_16_161228_create_role_menu_permissions_table', 5),
(25, '2024_09_21_152717_create_roles_table', 6),
(26, '2024_09_21_152749_create_permissions_table', 6),
(27, '2024_09_21_152812_create_role_user_table', 6),
(28, '2024_09_21_152831_create_permission_role_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `menu_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `menu_id`, `created_at`, `updated_at`) VALUES
(214, 'view', '1', NULL, NULL),
(215, 'create', '1', NULL, NULL),
(216, 'edit', '1', NULL, NULL),
(217, 'delete', '1', NULL, NULL),
(230, 'view', '2', NULL, NULL),
(231, 'create', '2', NULL, NULL),
(232, 'edit', '2', NULL, NULL),
(233, 'delete', '2', NULL, NULL),
(234, 'view', '3', NULL, NULL),
(235, 'create', '3', NULL, NULL),
(236, 'edit', '3', NULL, NULL),
(237, 'delete', '3', NULL, NULL),
(238, 'view', '4', NULL, NULL),
(239, 'create', '4', NULL, NULL),
(240, 'edit', '4', NULL, NULL),
(241, 'delete', '4', NULL, NULL),
(242, 'view', '5', NULL, NULL),
(243, 'create', '5', NULL, NULL),
(244, 'edit', '5', NULL, NULL),
(245, 'delete', '5', NULL, NULL),
(246, 'view', '6', NULL, NULL),
(247, 'create', '6', NULL, NULL),
(248, 'edit', '6', NULL, NULL),
(249, 'delete', '6', NULL, NULL),
(250, 'view', '7', NULL, NULL),
(251, 'create', '7', NULL, NULL),
(252, 'edit', '7', NULL, NULL),
(253, 'delete', '7', NULL, NULL),
(254, 'view', '8', NULL, NULL),
(255, 'create', '8', NULL, NULL),
(256, 'edit', '8', NULL, NULL),
(257, 'delete', '8', NULL, NULL),
(258, 'view', '9', NULL, NULL),
(259, 'create', '9', NULL, NULL),
(260, 'edit', '9', NULL, NULL),
(261, 'delete', '9', NULL, NULL),
(266, 'view', '10', NULL, NULL),
(267, 'create', '10', NULL, NULL),
(268, 'edit', '10', NULL, NULL),
(269, 'delete', '10', NULL, NULL),
(270, 'view', '11', NULL, NULL),
(271, 'create', '11', NULL, NULL),
(272, 'edit', '11', NULL, NULL),
(273, 'delete', '11', NULL, NULL),
(274, 'view', '12', NULL, NULL),
(275, 'create', '12', NULL, NULL),
(276, 'edit', '12', NULL, NULL),
(277, 'delete', '12', NULL, NULL),
(278, 'view', '13', NULL, NULL),
(279, 'create', '13', NULL, NULL),
(280, 'edit', '13', NULL, NULL),
(281, 'delete', '13', NULL, NULL),
(286, 'view', '14', NULL, NULL),
(287, 'create', '14', NULL, NULL),
(288, 'edit', '14', NULL, NULL),
(289, 'delete', '14', NULL, NULL),
(294, 'view', '15', NULL, NULL),
(295, 'create', '15', NULL, NULL),
(296, 'edit', '15', NULL, NULL),
(297, 'delete', '15', NULL, NULL),
(298, 'view', '16', NULL, NULL),
(299, 'create', '16', NULL, NULL),
(300, 'edit', '16', NULL, NULL),
(301, 'delete', '16', NULL, NULL),
(302, 'view', '20', NULL, NULL),
(303, 'create', '20', NULL, NULL),
(304, 'edit', '20', NULL, NULL),
(305, 'delete', '20', NULL, NULL),
(306, 'view', '21', NULL, NULL),
(307, 'create', '21', NULL, NULL),
(308, 'edit', '21', NULL, NULL),
(309, 'delete', '21', NULL, NULL),
(310, 'view', '22', NULL, NULL),
(311, 'create', '22', NULL, NULL),
(312, 'edit', '22', NULL, NULL),
(313, 'delete', '22', NULL, NULL),
(314, 'view', '23', NULL, NULL),
(315, 'create', '23', NULL, NULL),
(316, 'edit', '23', NULL, NULL),
(317, 'delete', '23', NULL, NULL),
(322, 'view', '28', NULL, NULL),
(323, 'create', '28', NULL, NULL),
(324, 'edit', '28', NULL, NULL),
(325, 'delete', '28', NULL, NULL),
(326, 'view', '27', NULL, NULL),
(327, 'create', '27', NULL, NULL),
(328, 'edit', '27', NULL, NULL),
(329, 'delete', '27', NULL, NULL),
(330, 'view', '26', NULL, NULL),
(331, 'create', '26', NULL, NULL),
(332, 'edit', '26', NULL, NULL),
(333, 'delete', '26', NULL, NULL),
(334, 'view', '24', NULL, NULL),
(335, 'create', '24', NULL, NULL),
(336, 'edit', '24', NULL, NULL),
(337, 'delete', '24', NULL, NULL),
(338, 'view', '45', NULL, NULL),
(339, 'create', '45', NULL, NULL),
(340, 'edit', '45', NULL, NULL),
(341, 'delete', '45', NULL, NULL),
(342, 'view', '44', NULL, NULL),
(343, 'create', '44', NULL, NULL),
(344, 'edit', '44', NULL, NULL),
(345, 'delete', '44', NULL, NULL),
(346, 'view', '43', NULL, NULL),
(347, 'create', '43', NULL, NULL),
(348, 'edit', '43', NULL, NULL),
(349, 'delete', '43', NULL, NULL),
(354, 'view', '42', NULL, NULL),
(355, 'create', '42', NULL, NULL),
(356, 'edit', '42', NULL, NULL),
(357, 'delete', '42', NULL, NULL),
(358, 'view', '41', NULL, NULL),
(359, 'create', '41', NULL, NULL),
(360, 'edit', '41', NULL, NULL),
(361, 'delete', '41', NULL, NULL),
(362, 'view', '40', NULL, NULL),
(363, 'create', '40', NULL, NULL),
(364, 'edit', '40', NULL, NULL),
(365, 'delete', '40', NULL, NULL),
(366, 'view', '39', NULL, NULL),
(367, 'create', '39', NULL, NULL),
(368, 'edit', '39', NULL, NULL),
(369, 'delete', '39', NULL, NULL),
(370, 'view', '38', NULL, NULL),
(371, 'create', '38', NULL, NULL),
(372, 'edit', '38', NULL, NULL),
(373, 'delete', '38', NULL, NULL),
(374, 'view', '37', NULL, NULL),
(375, 'create', '37', NULL, NULL),
(376, 'edit', '37', NULL, NULL),
(377, 'delete', '37', NULL, NULL),
(378, 'view', '36', NULL, NULL),
(379, 'create', '36', NULL, NULL),
(380, 'edit', '36', NULL, NULL),
(381, 'delete', '36', NULL, NULL),
(382, 'view', '35', NULL, NULL),
(383, 'create', '35', NULL, NULL),
(384, 'edit', '35', NULL, NULL),
(385, 'delete', '35', NULL, NULL),
(394, 'view', '34', NULL, NULL),
(395, 'create', '34', NULL, NULL),
(396, 'edit', '34', NULL, NULL),
(397, 'delete', '34', NULL, NULL),
(398, 'view', '33', NULL, NULL),
(399, 'create', '33', NULL, NULL),
(400, 'edit', '33', NULL, NULL),
(401, 'delete', '33', NULL, NULL),
(402, 'view', '32', NULL, NULL),
(403, 'create', '32', NULL, NULL),
(404, 'edit', '32', NULL, NULL),
(405, 'delete', '32', NULL, NULL),
(410, 'view', '31', NULL, NULL),
(411, 'create', '31', NULL, NULL),
(412, 'edit', '31', NULL, NULL),
(413, 'delete', '31', NULL, NULL),
(418, 'view', '30', NULL, NULL),
(419, 'create', '30', NULL, NULL),
(420, 'edit', '30', NULL, NULL),
(421, 'delete', '30', NULL, NULL),
(426, 'view', '52', NULL, NULL),
(427, 'create', '52', NULL, NULL),
(428, 'edit', '52', NULL, NULL),
(429, 'delete', '52', NULL, NULL),
(430, 'view', '53', NULL, NULL),
(431, 'create', '53', NULL, NULL),
(432, 'edit', '53', NULL, NULL),
(433, 'delete', '53', NULL, NULL),
(438, 'view', '56', NULL, NULL),
(439, 'create', '56', NULL, NULL),
(440, 'edit', '56', NULL, NULL),
(441, 'delete', '56', NULL, NULL),
(462, 'view', '59', NULL, NULL),
(463, 'create', '59', NULL, NULL),
(464, 'edit', '59', NULL, NULL),
(465, 'delete', '59', NULL, NULL),
(466, 'view', '51', NULL, NULL),
(467, 'create', '51', NULL, NULL),
(468, 'edit', '51', NULL, NULL),
(469, 'delete', '51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `menu_id`, `permission_id`) VALUES
(1, 1, 214),
(1, 1, 215),
(1, 1, 216),
(1, 1, 217),
(1, 2, 230),
(1, 2, 231),
(1, 2, 232),
(1, 2, 233),
(1, 4, 238),
(1, 4, 239),
(1, 4, 240),
(1, 4, 241),
(1, 8, 254),
(1, 8, 255),
(1, 8, 256),
(1, 8, 257),
(1, 9, 258),
(1, 9, 259),
(1, 9, 260),
(1, 9, 261),
(1, 10, 266),
(1, 10, 267),
(1, 10, 268),
(1, 10, 269),
(1, 20, 302),
(1, 20, 303),
(1, 20, 304),
(1, 20, 305),
(1, 26, 330),
(1, 26, 331),
(1, 26, 332),
(1, 26, 333),
(1, 27, 326),
(1, 27, 327),
(1, 27, 328),
(1, 27, 329),
(1, 30, 418),
(1, 30, 419),
(1, 30, 420),
(1, 30, 421),
(1, 32, 402),
(1, 32, 403),
(1, 32, 404),
(1, 32, 405),
(1, 33, 398),
(1, 33, 399),
(1, 33, 400),
(1, 33, 401),
(1, 44, 342),
(1, 44, 343),
(1, 44, 344),
(1, 44, 345),
(1, 45, 338),
(1, 45, 339),
(1, 45, 340),
(1, 45, 341),
(4, 1, 214),
(4, 1, 215),
(4, 1, 216),
(4, 1, 217),
(4, 30, 418),
(4, 51, 466),
(4, 51, 467),
(4, 51, 468),
(4, 51, 469),
(4, 52, 426),
(4, 52, 427),
(4, 52, 428),
(4, 52, 429),
(4, 53, 430),
(4, 53, 431),
(4, 53, 433),
(4, 59, 462),
(4, 59, 463),
(4, 59, 464),
(4, 59, 465);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` varchar(36) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `create_by` varchar(10) DEFAULT NULL,
  `create_date` varchar(20) DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `uid`, `name`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(110000, 'test5959', 'Parcel', 'A', 'system', 'asdadad', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'root', 'Root', '2024-09-21 09:34:01', '2024-09-21 09:34:01'),
(2, 'admin', 'Admin', '2024-09-21 09:34:01', '2024-09-21 09:34:01'),
(3, 'Administrator', 'Administrator', '2024-09-21 09:34:01', '2024-09-21 09:34:01'),
(4, 'merchant', 'Merchant', '2024-09-21 09:34:01', '2024-10-05 09:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('M4y8zkW51dGWPRp5Bp2MBQ4MR0dkiR9XPkD9EX3D', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ05YcDI1NEkwT2NucmFyZHlWQTQxMUF6NlRHR0ZnZXQySVd1ckM3UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9nZXREZWxpdmVyeVRvdGFscyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1728299037),
('Ngj67kCpmfkKR3j8qGW4xkBtur9QksuUPTlOlO3S', 15, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidmNRVTVucGl1MFZ5U05HcFhrajhZbEhUUkptdkJvcmVnT0VwcDdvSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kZWxpdmVyeXMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNTt9', 1728302562);

-- --------------------------------------------------------

--
-- Table structure for table `soc_area`
--

CREATE TABLE `soc_area` (
  `id` int(10) NOT NULL,
  `dis_id` int(10) DEFAULT NULL,
  `div_id` int(10) DEFAULT NULL,
  `tha_id` int(10) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soc_area`
--

INSERT INTO `soc_area` (`id`, `dis_id`, `div_id`, `tha_id`, `uid`, `name`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(14000, 12000, 11000, 12, 'a94cbf4d-d26d-4aa3-ac15-dbb7f2d4834b', 'Mirpur 1', 'A', '2', '2024-09-13 17:51:22', '0', '0'),
(14001, 12000, 11000, 8, '41f3e441-755f-4505-b0fa-9231407577d5', 'Adabor 13', 'A', '2', '2024-09-13 17:52:16', '2', '2024-09-13 17:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `soc_districts`
--

CREATE TABLE `soc_districts` (
  `id` int(10) NOT NULL,
  `div_id` int(10) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soc_districts`
--

INSERT INTO `soc_districts` (`id`, `div_id`, `uid`, `name`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(12000, 11000, 'f1b957c1-65bd-47bf-a194-8ea303fa23f7', 'Dhaka', 'A', '2', '2024-09-13 15:46:24', '0', '0'),
(12001, 11004, 'a3d46342-ef59-4297-b544-2adbfc2a8989', 'Natore', 'A', '2', '2024-09-13 15:46:48', '0', '0'),
(12002, 11004, '82852619-945f-49c0-b55d-52ebeefec2f5', 'Sirajganj', 'A', '2', '2024-09-13 15:47:06', '0', '0'),
(12003, 11004, 'f3ac8594-4ab9-4aaa-ae40-e78a078a3a83', 'Pabna', 'A', '2', '2024-09-13 15:47:14', '0', '0'),
(12004, 11004, '1a2ecebb-e0cb-4361-8524-339f4bffcd6b', 'Bogura', 'A', '2', '2024-09-13 15:47:24', '0', '0'),
(12005, 11004, '1c9285a0-77fd-4aea-b7d2-1037646b2ca2', 'Chapainawabganj', 'A', '2', '2024-09-13 15:47:34', '0', '0'),
(12006, 11004, '600b3c6e-3f4f-4c14-b55a-3cb4fba55407', 'Naogaon', 'A', '2', '2024-09-13 15:47:42', '0', '0'),
(12007, 11004, '32a41c42-2602-4b51-9b6c-5f9c650443a4', 'Joypurhat', 'A', '2', '2024-09-13 15:47:52', '0', '0'),
(12008, 11000, 'f6925f65-de00-4902-88a5-7f2d8dbedaaf', 'Dhaka District', 'A', '2', '2024-09-13 15:48:06', '0', '0'),
(12009, 11000, '6037525d-20d4-4992-8dde-6c8ed78a638c', 'Gazipur District', 'A', '2', '2024-09-13 15:48:38', '0', '0'),
(12010, 11000, '78958e4e-07e3-4277-a609-fb702457e29b', 'Kishoreganj District', 'A', '2', '2024-09-13 15:48:56', '0', '0'),
(12011, 11000, 'a9f1fa6c-a50e-426d-9437-24f495278cc0', 'Manikganj', 'A', '2', '2024-09-13 15:49:07', '0', '0'),
(12012, 11000, '0a90cae0-2947-4bd0-bd08-aab088a9898a', 'Munshiganj', 'A', '2', '2024-09-13 15:49:12', '0', '0'),
(12013, 11000, '7c3c2885-6cfa-469f-92a6-42cf1742202a', 'Narayanganj', 'A', '2', '2024-09-13 15:49:19', '0', '0'),
(12014, 11000, 'ff1a903b-7665-4ad9-bdeb-038cf86bf33f', 'Narsingdi', 'A', '2', '2024-09-13 15:49:24', '0', '0'),
(12015, 11000, 'f965ada9-6e57-4fda-b9e6-9ca6c0ae92b9', 'Tangail', 'A', '2', '2024-09-13 15:49:30', '0', '0'),
(12016, 11000, '018f339d-1bb8-4747-af1b-db99a20b6efb', 'Faridpur', 'A', '2', '2024-09-13 15:49:35', '0', '0'),
(12017, 11000, '16963db1-d079-4c8a-9eee-e26b4b5c46fe', 'Gopalganj', 'A', '2', '2024-09-13 15:49:40', '0', '0'),
(12018, 11000, '11d6f8b3-b810-4901-b5be-9b331578fd62', 'Madaripur', 'A', '2', '2024-09-13 15:49:46', '0', '0'),
(12019, 11000, '791abf63-81c7-44ca-9c3a-96e7cfd8fa93', 'Rajbari', 'A', '2', '2024-09-13 15:49:50', '0', '0'),
(12020, 11000, 'b0844589-396d-4846-ac40-e147277854ae', 'Shariatpur', 'A', '2', '2024-09-13 15:49:55', '0', '0'),
(12021, 11007, '828c89a7-f597-4b8e-a1ca-34c47c360939', 'Brahmanbaria', 'A', '2', '2024-09-13 15:51:03', '0', '0'),
(12022, 11007, '5c5f1dd8-87ba-441e-b3ed-793f02638bd0', 'Comilla', 'A', '2', '2024-09-13 15:51:15', '0', '0'),
(12023, 11007, '625df7e6-d419-43d1-8b09-cf5ffb6a8057', 'Chandpur', 'A', '2', '2024-09-13 15:51:21', '0', '0'),
(12024, 11007, 'a7079fb3-1406-4ee1-bbd9-57249e827d0d', 'Lakshmipur', 'A', '2', '2024-09-13 15:51:27', '0', '0'),
(12025, 11007, 'c5cc1626-77ae-4d73-ae85-29832b7f3389', 'Maijdee', 'A', '2', '2024-09-13 15:51:32', '0', '0'),
(12026, 11007, '51f147d9-015f-4cc3-877f-b94b8a207d18', 'Feni', 'A', '2', '2024-09-13 15:51:37', '0', '0'),
(12027, 11007, 'd1b4e637-f470-460e-8715-cc55bb619b09', 'Khagrachhari', 'A', '2', '2024-09-13 15:51:42', '0', '0'),
(12028, 11007, 'aa10b6f4-f73c-4ec5-b2eb-ddef8068ea0d', 'Rangamati', 'A', '2', '2024-09-13 15:51:47', '0', '0'),
(12029, 11007, 'fd2cbe16-8619-4fb0-8bdb-4fd1e03191d2', 'Bandarban', 'A', '2', '2024-09-13 15:51:53', '0', '0'),
(12030, 11007, 'a91f2b79-5f98-41f5-b8a0-96b113a64ba6', 'Chittagong', 'A', '2', '2024-09-13 15:52:00', '0', '0'),
(12031, 11007, '0f303eb5-a81e-49fe-a8fa-e6dfb6525f10', 'Cox\'s Bazar', 'A', '2', '2024-09-13 15:52:09', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `soc_divisions`
--

CREATE TABLE `soc_divisions` (
  `id` int(10) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soc_divisions`
--

INSERT INTO `soc_divisions` (`id`, `uid`, `name`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(11000, '55239c43-584f-4085-9e4d-beaa8a0a9d98', 'Dhaka Division', 'A', '2', '2024-09-13 15:37:49', '0', '0'),
(11001, '1d559410-edd3-4677-a568-22da24d0fd31', 'Khulna Division', 'A', '2', '2024-09-13 15:38:18', '0', '0'),
(11002, '1604f9c8-393c-44af-a2c0-69c3c43bc874', 'Mymensingh Division', 'A', '2', '2024-09-13 15:38:26', '0', '0'),
(11003, '35a4e864-fe43-4356-97bf-630fb4423913', 'Barisal Division', 'A', '2', '2024-09-13 15:38:35', '0', '0'),
(11004, '860a4140-2ea8-4a33-9408-b154f7804b0a', 'Rajshahi Division', 'A', '2', '2024-09-13 15:38:44', '0', '0'),
(11005, 'e9739c53-be46-40de-9e20-e5ac9f2952d7', 'Rangpur Division', 'A', '2', '2024-09-13 15:38:52', '0', '0'),
(11006, '1254bf8b-db55-4b7c-998e-2c0b89f20a7f', 'Sylhet Division', 'A', '2', '2024-09-13 15:39:01', '0', '0'),
(11007, '5137da04-6c1a-41e6-adfc-24ed2e162d92', 'Chittagong Division', 'A', '2', '2024-09-13 15:50:48', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `soc_outlet`
--

CREATE TABLE `soc_outlet` (
  `id` int(10) NOT NULL,
  `div_id` int(10) NOT NULL,
  `dis_id` int(10) NOT NULL,
  `tha_id` int(10) NOT NULL,
  `ara_id` int(10) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soc_outlet`
--

INSERT INTO `soc_outlet` (`id`, `div_id`, `dis_id`, `tha_id`, `ara_id`, `uid`, `name`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(15000, 11000, 12000, 12, 14000, '3931d713-6cc2-45cd-889d-87dadd2ff543', 'Test', 'A', '2', '2024-09-13 19:24:48', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `soc_thana`
--

CREATE TABLE `soc_thana` (
  `id` int(10) NOT NULL,
  `div_id` int(10) NOT NULL,
  `dis_id` int(10) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soc_thana`
--

INSERT INTO `soc_thana` (`id`, `div_id`, `dis_id`, `uid`, `name`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, 11007, 12022, '90f75386-2f5a-4d99-b7c3-8bb1da64b586', 'Barura Upazila', 'A', '2', '2024-09-13 17:20:02', '0', '0'),
(2, 11007, 12022, 'd1b3b7e3-25c9-463e-8781-cd7efd09d94c', 'Brahmanpara Upazila', 'A', '2', '2024-09-13 17:20:14', '0', '0'),
(3, 11007, 12022, 'd5c5c4d7-a247-4e14-98ec-7ce1609412e0', 'Burichong Upazila', 'A', '2', '2024-09-13 17:20:27', '0', '0'),
(4, 11007, 12030, 'a7aa4004-59e8-4841-bbb8-77514711dd35', 'Akbar Shah Thana', 'A', '2', '2024-09-13 17:20:57', '0', '0'),
(5, 11007, 12030, '936d66a4-52ab-44a9-8b79-7c78fc06c3a2', 'Bakoliya Thana', 'A', '2', '2024-09-13 17:21:10', '0', '0'),
(6, 11007, 12030, '1807981c-66a0-48b3-8c4e-dca3202e27f9', 'Bandar Thana', 'A', '2', '2024-09-13 17:21:20', '0', '0'),
(7, 11007, 12030, 'c5af9a19-f70b-43ab-a276-475daf539f8e', 'Chandgaon Thana', 'A', '2', '2024-09-13 17:21:33', '0', '0'),
(8, 11000, 12000, '1dd218b7-196e-4189-bb9d-46c601ac3ee1', 'Adabar Thana', 'A', '2', '2024-09-13 17:40:21', '0', '0'),
(9, 11000, 12000, '22d97eeb-db36-4d2b-a72d-a7df416df8cc', 'Badda Thana', 'A', '2', '2024-09-13 17:40:43', '0', '0'),
(10, 11000, 12000, '9be2eb80-535c-4254-87d8-21b2e1c5efc0', 'Cantonment Thana', 'A', '2', '2024-09-13 17:41:00', '0', '0'),
(11, 11000, 12000, '0c21b800-9e0b-4b77-afe2-793644153998', 'Lalbagh Thana', 'A', '2', '2024-09-13 17:41:13', '0', '0'),
(12, 11000, 12000, '69de14ae-4f4f-466f-9d78-16e00a251589', 'Mirpur Model Thana', 'A', '2', '2024-09-13 17:41:29', '0', '0'),
(13, 11000, 12000, '450528ca-74ea-41e5-841b-49f6a37804c1', 'Mohammadpur Thana', 'A', '2', '2024-09-13 17:41:39', '0', '0'),
(14, 11000, 12000, '711924ef-9d4f-45c3-86e2-1f9b298b6009', 'Mirpur-1', 'Deleted', '2', '2024-09-13 17:41:58', '2', '2024-09-13 17:51:42'),
(15, 11000, 12000, 'f85667fd-1a2d-45ac-b16a-5ba84b83390a', 'Mirpur-2', 'Deleted', '2', '2024-09-13 17:42:10', '2', '2024-09-13 17:51:52'),
(16, 11000, 12000, '191fda37-116a-42ce-86f0-d6e3f483257c', 'Adabar 12', 'Deleted', '2', '2024-09-13 17:43:36', '2', '2024-09-13 17:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `uid` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `store_name` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(15) DEFAULT NULL,
  `secondary_phone` varchar(15) DEFAULT NULL,
  `div_id` int(10) DEFAULT NULL,
  `dis_id` int(10) DEFAULT NULL,
  `out_id` int(10) DEFAULT NULL,
  `thn_id` int(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `create_by` varchar(10) DEFAULT NULL,
  `create_date` varchar(20) DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `user_id`, `uid`, `email`, `store_name`, `address`, `contact_phone`, `secondary_phone`, `div_id`, `dis_id`, `out_id`, `thn_id`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, 15, '9f3f2e3c-9db9-4534-99f5-2bd96e7252e6', 'teststore@gmail.com', 'Test Store', 'Dhaka', '01315007287', '455454', 11000, 12000, 14001, 8, 'A', '15', '2024-10-06 16:54:26', '15', '2024-10-06 17:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `role_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `mac` varchar(255) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `status` varchar(10) DEFAULT 'I',
  `create_by` varchar(255) NOT NULL,
  `create_date` varchar(255) NOT NULL,
  `update_date` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `role_id`, `name`, `user_name`, `email`, `email_verified_at`, `password`, `longitude`, `latitude`, `ip`, `mac`, `last_login`, `status`, `create_by`, `create_date`, `update_date`, `update_by`, `token`) VALUES
(1, 'admin001', 2, 'Admin User', 'adminuser', 'admin@example.com', '2024-09-05 01:36:50', '$2y$10$YHLibwvE5HlgD6J4XAWRreZ2RIoKwVjALBKey.Gam3Rbjuatg9b/6', '90.361361', '23.7857505', '103.112.236.26', '00:00:00:00:00:00', '2024-09-14 01:20:18', 'A', 'system', '2024-09-05 07:36:50', '2024-09-23 01:05:28', '2', 'z4Jmb8VgX8nuDefCXtW9FIA6arX7xxexFR9ozB7Z'),
(2, 'superadmin001', 1, 'Super Admin', 'superadmin', 'superadmin@example.com', '2024-09-05 01:36:50', '$2y$10$hpF5dW9/hiTn0/lHZMOCe.qqD9j3mNAIXFNbNHPYtnQtEBXhT7Kdy', '90.413607', '23.741911', '163.53.150.94', '00:00:00:00:00:01', '2024-10-07 13:16:30', 'A', 'system', '2024-09-05 07:36:50', 'gNXp254I0OcnrardyVA411Az6TGGFget2IWurC7S', '2', 'gNXp254I0OcnrardyVA411Az6TGGFget2IWurC7S'),
(10, 'cf1ba2ab-8f08-4cde-a50d-8e134ae5c170', NULL, 'Test44', 'TCZI13', 'test33@gmail.com', NULL, '$2y$10$cQIJBCClH2mmvEY5ng4nYO.JAhivqfDO04/CBD5E5x3sWqc02RAUK', '0.0', '0.0', '0.0', '0.0', '1970-01-01 06:00:00', 'Deleted', '2', '2024-09-09 02:23:36', '2024-09-15 17:28:48', '2', 'ziBbKqYjYLajmT69JHJnrsnEbd0Nf0ZxybzxWIE2OmHoWq1QvF26ctE9LTg7'),
(11, '6da584ba-c720-4ca0-8682-736a3deb7ddf', 11050004, 'Distributor1', 'KJDD64', 'distributor1@gmail.com', NULL, '$2y$10$UgUueWj56KKQNfmQCXbzUuT/bN2IQRJaYXLZCfI5KtGkJL0XRD3Qq', '90.3613563', '23.7857501', '103.112.236.26', '0.0', '2024-09-22 01:36:14', 'A', '2', '2024-09-15 18:23:39', '6T4qaTIvqukBiGfIZIlkJaWEmXP7jO3AHgU7m1MM', '11', '6T4qaTIvqukBiGfIZIlkJaWEmXP7jO3AHgU7m1MM'),
(12, '68863927-e812-46f7-8f66-a0e762b9dea1', 11050004, 'Distributor2', 'HQBI84', 'distributor2@gmail.com', NULL, '$2y$10$Rge8gbnK8U6K..FCYGcqAePISUw/kA1YaI0zFl3msgV6Owz4imEuG', '0.0', '0.0', '0.0', '0.0', '1970-01-01 06:00:00', 'A', '2', '2024-09-15 18:24:06', '2024-09-15 19:04:51', '2', '2TSsQXNjl7v8XawbSQkPGYa2xdmzws7nUccDNKII2IL32MzJSBSngF2C6Ku1'),
(14, '66ee788be50a0', 3, 'Admin User', 'admin', 'admin@soc.com', NULL, '$2y$10$uWCnzuh6.2o1cmd7P18dzOq4pxoD85rfbZscoxFwf0yMpb.w1pv.2', '0', '0', '127.0.0.1', '00:00:00:00:00:00', '2024-09-21 13:40:59', 'A', 'system', '2024-09-21 13:40:59', '2024-09-23 01:05:41', '2', 'dBbH0KzwFKrPtxnydo8AL7RhyzCNGzOhdyQvuQGVKUmREyZoS2e67GXcZeVs'),
(15, 'c38316ac-7ff7-490f-86f7-feb029d05dd9', 4, 'Rifat Hossion', 'SALL15', 'abirdhali49@gmail.com', NULL, '$2y$10$7XiEVKqIMKLdJEoMZhxa/.fuPHH5xtKnBi01EsrlxNYU02iRUKrgm', '90.4137876', '23.7426165', '163.53.150.94', '0.0', '2024-10-07 12:55:13', 'A', 'abirdhali49@gmail.com', '2024-10-05 15:58:34', 'vcQU5npiu0VySNGpXkj8YlHTRJmvBoregOEpp7oJ', '15', 'vcQU5npiu0VySNGpXkj8YlHTRJmvBoregOEpp7oJ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `change_log`
--
ALTER TABLE `change_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `distributors_uid_unique` (`uid`),
  ADD UNIQUE KEY `distributors_owner_email_unique` (`owner_email`),
  ADD UNIQUE KEY `distributors_company_email_unique` (`company_email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`role_id`,`menu_id`,`permission_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_emnu_id_foreign` (`menu_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `soc_area`
--
ALTER TABLE `soc_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soc_districts`
--
ALTER TABLE `soc_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soc_divisions`
--
ALTER TABLE `soc_divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soc_outlet`
--
ALTER TABLE `soc_outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soc_thana`
--
ALTER TABLE `soc_thana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uid_unique` (`uid`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `change_log`
--
ALTER TABLE `change_log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=470;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110001;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `soc_area`
--
ALTER TABLE `soc_area`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14002;

--
-- AUTO_INCREMENT for table `soc_districts`
--
ALTER TABLE `soc_districts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12032;

--
-- AUTO_INCREMENT for table `soc_divisions`
--
ALTER TABLE `soc_divisions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11008;

--
-- AUTO_INCREMENT for table `soc_outlet`
--
ALTER TABLE `soc_outlet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15001;

--
-- AUTO_INCREMENT for table `soc_thana`
--
ALTER TABLE `soc_thana`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_emnu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
