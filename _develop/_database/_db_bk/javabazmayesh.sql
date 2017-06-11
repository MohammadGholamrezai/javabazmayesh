-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2017 at 10:41 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `javabazmayesh`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_groups`
--

DROP TABLE IF EXISTS `access_groups`;
CREATE TABLE `access_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cpAdmin' COMMENT 'cpAdmin,front... is name space',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `access_list`
--

DROP TABLE IF EXISTS `access_list`;
CREATE TABLE `access_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `access_group_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `employee_id` int(10) UNSIGNED DEFAULT NULL,
  `action_id` int(10) UNSIGNED DEFAULT NULL,
  `access` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `creator_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `actions_list`
--

DROP TABLE IF EXISTS `actions_list`;
CREATE TABLE `actions_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middleware` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `function` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `as_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uses` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `except` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` enum('get','post','put','any','delete','resource','controller') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'get',
  `params` text COLLATE utf8mb4_unicode_ci,
  `employee_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `latitude` double(14,6) DEFAULT NULL,
  `longitude` double(14,6) DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

DROP TABLE IF EXISTS `advertisements`;
CREATE TABLE `advertisements` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('image','video','flash') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `sort` smallint(6) NOT NULL DEFAULT '1',
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'is alias position',
  `params` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_show` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `employee_id` int(11) NOT NULL,
  `show_status` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisements_lang`
--

DROP TABLE IF EXISTS `advertisements_lang`;
CREATE TABLE `advertisements_lang` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `body_content` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(14,1) DEFAULT NULL,
  `tax` double(12,1) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

DROP TABLE IF EXISTS `booking_details`;
CREATE TABLE `booking_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `cd_id` int(10) UNSIGNED NOT NULL COMMENT 'calendar_details_id',
  `std_id` int(10) UNSIGNED NOT NULL COMMENT 'service_to_doctor',
  `price` double(14,1) DEFAULT NULL,
  `tax` double(12,1) DEFAULT NULL,
  `discount` double(14,1) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendars`
--

DROP TABLE IF EXISTS `calendars`;
CREATE TABLE `calendars` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_days` int(11) NOT NULL DEFAULT '365',
  `year` int(11) NOT NULL,
  `period_time` smallint(6) DEFAULT NULL COMMENT 'doreh har zaman',
  `off_period_time` smallint(6) DEFAULT NULL COMMENT 'tanafose har doreh',
  `lunch_time` smallint(6) DEFAULT NULL COMMENT 'zamane nahar be min',
  `dinner_time` smallint(6) DEFAULT NULL COMMENT 'zamane sham be min',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendar_details`
--

DROP TABLE IF EXISTS `calendar_details`;
CREATE TABLE `calendar_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `calendar_id` int(10) UNSIGNED NOT NULL,
  `period` datetime DEFAULT NULL,
  `reserved` tinyint(4) DEFAULT NULL COMMENT '1:open , 2:wait , 3:reserved',
  `is_off` tinyint(1) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` int(10) UNSIGNED NOT NULL,
  `geom` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `system` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `assessor_user_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `show_status` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments_media`
--

DROP TABLE IF EXISTS `comments_media`;
CREATE TABLE `comments_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `media_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `to_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'blog' COMMENT 'blog,news,static,weblog',
  `media_id` int(11) DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `author_id` int(11) NOT NULL DEFAULT '0',
  `employee_id` int(11) NOT NULL DEFAULT '0',
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents_lang`
--

DROP TABLE IF EXISTS `contents_lang`;
CREATE TABLE `contents_lang` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang_id` int(11) NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_content` text COLLATE utf8mb4_unicode_ci,
  `body_content` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_categories`
--

DROP TABLE IF EXISTS `content_categories`;
CREATE TABLE `content_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `content_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL DEFAULT '1',
  `used` int(11) NOT NULL DEFAULT '0',
  `private` tinyint(1) DEFAULT NULL COMMENT 'if true, use special group or users',
  `price` decimal(16,1) DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `available_date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons_details`
--

DROP TABLE IF EXISTS `coupons_details`;
CREATE TABLE `coupons_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupons_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `group_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons_log`
--

DROP TABLE IF EXISTS `coupons_log`;
CREATE TABLE `coupons_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupons_id` int(10) UNSIGNED NOT NULL,
  `coupons_details_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `params` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

DROP TABLE IF EXISTS `credits`;
CREATE TABLE `credits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cash` double(14,1) DEFAULT NULL,
  `paid` double(14,1) DEFAULT NULL COMMENT 'pardakht shodeh',
  `cost` double(14,1) DEFAULT NULL COMMENT 'hazine shodeh',
  `income` double(14,1) DEFAULT NULL COMMENT 'kasb daramad',
  `block_income` double(14,1) DEFAULT NULL COMMENT 'block shodeh',
  `block_cost` double(14,1) DEFAULT NULL COMMENT 'block shodeh',
  `pay_status` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit_transactions`
--

DROP TABLE IF EXISTS `credit_transactions`;
CREATE TABLE `credit_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `credit_id` int(10) UNSIGNED NOT NULL COMMENT 'or recipient',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'income,callback,settle is +, cost,paid is -',
  `user_id` int(10) UNSIGNED NOT NULL,
  `price` double(14,1) NOT NULL,
  `is_block` tinyint(1) DEFAULT NULL,
  `ref_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'name ref, sample ersal baraye doctor LRFT',
  `au_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'authority',
  `settle_status` tinyint(4) DEFAULT NULL COMMENT 'vaziat pardakht',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_expertise`
--

DROP TABLE IF EXISTS `doctor_expertise`;
CREATE TABLE `doctor_expertise` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `expertise_id` int(10) UNSIGNED NOT NULL,
  `university_id` int(10) UNSIGNED NOT NULL,
  `reg_date` date DEFAULT NULL COMMENT 'zamane gereftane madrak',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_password_resets`
--

DROP TABLE IF EXISTS `employee_password_resets`;
CREATE TABLE `employee_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

DROP TABLE IF EXISTS `expertise`;
CREATE TABLE `expertise` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `params` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs_lang`
--

DROP TABLE IF EXISTS `faqs_lang`;
CREATE TABLE `faqs_lang` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infringement_notification`
--

DROP TABLE IF EXISTS `infringement_notification`;
CREATE TABLE `infringement_notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `system` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'is danger or ...',
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insurances`
--

DROP TABLE IF EXISTS `insurances`;
CREATE TABLE `insurances` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_results`
--

DROP TABLE IF EXISTS `lab_results`;
CREATE TABLE `lab_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `lab_id` int(10) UNSIGNED NOT NULL COMMENT 'relation to users',
  `reg_date` datetime DEFAULT NULL,
  `expire_date` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'owner result',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` int(10) UNSIGNED NOT NULL COMMENT 'staff in lab',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_results_transactions`
--

DROP TABLE IF EXISTS `lab_results_transactions`;
CREATE TABLE `lab_results_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `lab_result_id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(10) UNSIGNED NOT NULL COMMENT 'is user id in lab_result',
  `description` text COLLATE utf8mb4_unicode_ci,
  `only_one_response` tinyint(1) DEFAULT NULL COMMENT 'if user need to 1 response from doctor',
  `params` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_result_reply_transaction`
--

DROP TABLE IF EXISTS `lab_result_reply_transaction`;
CREATE TABLE `lab_result_reply_transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `lrft_id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(10) UNSIGNED NOT NULL COMMENT 'sample: doctor_id',
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_result_services`
--

DROP TABLE IF EXISTS `lab_result_services`;
CREATE TABLE `lab_result_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `lab_result_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_result_transactions_forward`
--

DROP TABLE IF EXISTS `lab_result_transactions_forward`;
CREATE TABLE `lab_result_transactions_forward` (
  `id` int(10) UNSIGNED NOT NULL,
  `lrt_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_services`
--

DROP TABLE IF EXISTS `lab_services`;
CREATE TABLE `lab_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `lab_id` int(10) UNSIGNED NOT NULL COMMENT 'relation to user id',
  `service_id` int(10) UNSIGNED NOT NULL,
  `price` double(12,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_format` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_format_full` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `is_rtl` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `iso_code`, `language_code`, `date_format`, `date_format_full`, `active`, `is_rtl`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 'en-US', 'Y-m-d', 'Y-m-d H:i:s', 1, 0, 1, NULL, NULL),
(2, 'Farsi', 'fa', 'fa', 'Y-m-d', 'Y-m-d H:i:s', 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `system` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `media_id` int(11) DEFAULT NULL,
  `params` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `employee_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'employee is admin panel user',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_modules`
--

DROP TABLE IF EXISTS `media_modules`;
CREATE TABLE `media_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `media_id` int(10) UNSIGNED NOT NULL,
  `system` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `item_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT NULL,
  `is_public` tinyint(1) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `employee_id` int(10) UNSIGNED DEFAULT NULL,
  `sort` tinyint(4) NOT NULL DEFAULT '50',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_employees_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2017_05_21_045617_create_table1_services', 1),
(5, '2017_05_21_050228_create_table_type_services', 1),
(6, '2017_05_21_051310_create_table_lab_services', 1),
(7, '2017_05_21_051856_create_table_user_type', 1),
(8, '2017_05_21_054017_create_table_staff', 1),
(9, '2017_05_21_054436_create_table_lab_results', 1),
(10, '2017_05_21_060649_created_media_table', 1),
(11, '2017_05_21_061229_created_media_modules_table', 1),
(12, '2017_05_21_062238_create_table_lab_result_services', 1),
(13, '2017_05_21_062850_create_table_lab_result_transaction', 1),
(14, '2017_05_21_063638_create_table_lab_result_forward_transaction', 1),
(15, '2017_05_23_061809_create_table_lab_result_reply_transaction', 1),
(16, '2017_05_23_063227_create_table_insurances', 1),
(17, '2017_05_23_064726_create_table_credits', 1),
(18, '2017_05_23_065815_create_table_credit_transactions', 1),
(19, '2017_05_23_071715_create_table_doctor_expertises', 1),
(20, '2017_05_23_073255_create_table_expertise', 1),
(21, '2017_05_23_073343_create_table_universities', 1),
(22, '2017_05_23_073813_create_secreteries', 1),
(23, '2017_05_23_074707_create_table_telephones', 1),
(24, '2017_05_23_075115_creare_table_addresses', 1),
(25, '2017_05_23_075442_create_provinces', 1),
(26, '2017_05_23_075647_create_cities', 1),
(27, '2017_05_23_080021_create_services_to_experties', 1),
(28, '2017_05_23_080302_create_user_insurance', 1),
(29, '2017_05_23_082540_create_table_calendar', 1),
(30, '2017_05_23_083405_create_table_calendar_details', 1),
(31, '2017_05_23_083849_create_booking', 1),
(32, '2017_05_23_084154_create_booking_details', 1),
(33, '2017_05_23_084709_create_service_to_doctor', 1),
(34, '2017_05_24_035146_create_relation_with_tables', 1),
(35, '2017_05_28_051725_create_employees_password_reset_table', 1),
(36, '2017_05_30_062330_create_table_parameters', 1),
(37, '2017_05_30_063904_create_table_links', 1),
(38, '2017_05_30_064339_create_table_likes', 1),
(39, '2017_05_30_064549_create_table_languages', 1),
(40, '2017_05_30_064952_create_table_faq', 1),
(41, '2017_05_30_065018_create_table_faq_lang', 1),
(42, '2017_05_30_065310_create_content_category', 1),
(43, '2017_05_30_065359_create_content_lang', 1),
(44, '2017_05_30_065425_create_contents', 1),
(45, '2017_05_30_070056_create_contact_us', 1),
(46, '2017_05_30_070227_create_comments', 1),
(47, '2017_05_30_070338_create_comments_media', 1),
(48, '2017_05_30_070554_create_advertisments', 1),
(49, '2017_05_30_070633_create_advertisments_lang', 1),
(50, '2017_05_30_071545_create_actions_list', 1),
(51, '2017_05_30_071711_create_access_list', 1),
(52, '2017_05_30_071950_create_access_groups', 1),
(53, '2017_05_30_072409_create_user_acces_group', 1),
(54, '2017_05_30_073806_create_rate', 1),
(55, '2017_05_30_074222_create_coupons', 1),
(56, '2017_05_30_074900_create_coupons_details', 1),
(57, '2017_05_30_075150_create_coupons_log', 1),
(58, '2017_05_30_080350_create_tickets', 1),
(59, '2017_05_31_105208_create_newsletter', 1),
(60, '2017_05_31_112952_create_infringment_notification', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE `newsletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parameters`
--

DROP TABLE IF EXISTS `parameters`;
CREATE TABLE `parameters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('pay','image','system','email','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `params` text COLLATE utf8mb4_unicode_ci,
  `employee_id` int(11) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geom` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

DROP TABLE IF EXISTS `rates`;
CREATE TABLE `rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `system` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `secretaries`
--

DROP TABLE IF EXISTS `secretaries`;
CREATE TABLE `secretaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'sample: doctor_id',
  `secretary_id` int(10) UNSIGNED NOT NULL COMMENT 'user_id',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_service_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_to_users`
--

DROP TABLE IF EXISTS `services_to_users`;
CREATE TABLE `services_to_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'sample: doctor_id',
  `price` double(14,1) DEFAULT NULL,
  `tax` smallint(6) DEFAULT NULL COMMENT 'with % percent',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_type`
--

DROP TABLE IF EXISTS `services_type`;
CREATE TABLE `services_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `params` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_to_expertise`
--

DROP TABLE IF EXISTS `service_to_expertise`;
CREATE TABLE `service_to_expertise` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `expertise_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telephones`
--

DROP TABLE IF EXISTS `telephones`;
CREATE TABLE `telephones` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` enum('mobile','work','fax','home','pager') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'work',
  `number` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `employee_id` int(10) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `show_status` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

DROP TABLE IF EXISTS `universities`;
CREATE TABLE `universities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type_id` int(11) NOT NULL COMMENT 'relation to users_type',
  `city_id` int(11) DEFAULT NULL COMMENT 'default user city',
  `cash` double(12,2) DEFAULT NULL COMMENT 'cash of user in time',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_staff`
--

DROP TABLE IF EXISTS `users_staff`;
CREATE TABLE `users_staff` (
  `id` int(10) UNSIGNED NOT NULL,
  `employer` int(10) UNSIGNED NOT NULL COMMENT 'user is employer, relation users',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'user is staff, relation users',
  `expire_date` date DEFAULT NULL,
  `params` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_type`
--

DROP TABLE IF EXISTS `users_type`;
CREATE TABLE `users_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `params` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_access_group`
--

DROP TABLE IF EXISTS `user_access_group`;
CREATE TABLE `user_access_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `access_group_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_insurances`
--

DROP TABLE IF EXISTS `user_insurances`;
CREATE TABLE `user_insurances` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `insurance_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'private' COMMENT 'private baraye shakhs hast, public baraye doctor hast bime tarafe hesab',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_groups`
--
ALTER TABLE `access_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access_list`
--
ALTER TABLE `access_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_list_access_group_id_index` (`access_group_id`),
  ADD KEY `access_list_user_id_index` (`user_id`),
  ADD KEY `access_list_employee_id_index` (`employee_id`),
  ADD KEY `access_list_action_id_index` (`action_id`);

--
-- Indexes for table `actions_list`
--
ALTER TABLE `actions_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actions_list_controller_index` (`controller`),
  ADD KEY `actions_list_function_index` (`function`),
  ADD KEY `actions_list_as_url_index` (`as_url`),
  ADD KEY `actions_list_uses_index` (`uses`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_index` (`user_id`),
  ADD KEY `addresses_city_id_index` (`city_id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisements_lang`
--
ALTER TABLE `advertisements_lang`
  ADD KEY `advertisements_lang_id_index` (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_index` (`user_id`),
  ADD KEY `bookings_code_index` (`code`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_details_booking_id_index` (`booking_id`),
  ADD KEY `booking_details_cd_id_index` (`cd_id`),
  ADD KEY `booking_details_std_id_index` (`std_id`);

--
-- Indexes for table `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calendars_user_id_index` (`user_id`);

--
-- Indexes for table `calendar_details`
--
ALTER TABLE `calendar_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calendar_details_calendar_id_index` (`calendar_id`),
  ADD KEY `calendar_details_period_index` (`period`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_name_index` (`name`),
  ADD KEY `cities_province_id_index` (`province_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_item_id_index` (`item_id`),
  ADD KEY `comments_parent_id_index` (`parent_id`),
  ADD KEY `comments_user_id_index` (`user_id`);

--
-- Indexes for table `comments_media`
--
ALTER TABLE `comments_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_media_comment_id_index` (`comment_id`),
  ADD KEY `comments_media_media_id_index` (`media_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents_lang`
--
ALTER TABLE `contents_lang`
  ADD KEY `contents_lang_id_index` (`id`);

--
-- Indexes for table `content_categories`
--
ALTER TABLE `content_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_categories_content_id_index` (`content_id`),
  ADD KEY `content_categories_category_id_index` (`category_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons_code_index` (`code`);

--
-- Indexes for table `coupons_details`
--
ALTER TABLE `coupons_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons_details_coupons_id_index` (`coupons_id`),
  ADD KEY `coupons_details_user_id_index` (`user_id`),
  ADD KEY `coupons_details_group_id_index` (`group_id`);

--
-- Indexes for table `coupons_log`
--
ALTER TABLE `coupons_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons_log_coupons_id_index` (`coupons_id`),
  ADD KEY `coupons_log_coupons_details_id_index` (`coupons_details_id`),
  ADD KEY `coupons_log_user_id_index` (`user_id`),
  ADD KEY `coupons_log_order_id_index` (`order_id`);

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credits_user_id_index` (`user_id`);

--
-- Indexes for table `credit_transactions`
--
ALTER TABLE `credit_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credit_transactions_credit_id_index` (`credit_id`),
  ADD KEY `credit_transactions_user_id_index` (`user_id`);

--
-- Indexes for table `doctor_expertise`
--
ALTER TABLE `doctor_expertise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_expertise_doctor_id_index` (`doctor_id`),
  ADD KEY `doctor_expertise_expertise_id_index` (`expertise_id`),
  ADD KEY `doctor_expertise_university_id_index` (`university_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD UNIQUE KEY `employees_mobile_unique` (`mobile`);

--
-- Indexes for table `employee_password_resets`
--
ALTER TABLE `employee_password_resets`
  ADD KEY `employee_password_resets_email_index` (`email`),
  ADD KEY `employee_password_resets_token_index` (`token`);

--
-- Indexes for table `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs_lang`
--
ALTER TABLE `faqs_lang`
  ADD KEY `faqs_lang_id_index` (`id`);

--
-- Indexes for table `infringement_notification`
--
ALTER TABLE `infringement_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infringement_notification_user_id_index` (`user_id`),
  ADD KEY `infringement_notification_system_index` (`system`),
  ADD KEY `infringement_notification_item_id_index` (`item_id`),
  ADD KEY `infringement_notification_type_index` (`type`);

--
-- Indexes for table `insurances`
--
ALTER TABLE `insurances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_results`
--
ALTER TABLE `lab_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lab_results_lab_id_index` (`lab_id`),
  ADD KEY `lab_results_user_id_index` (`user_id`),
  ADD KEY `lab_results_staff_id_index` (`staff_id`);

--
-- Indexes for table `lab_results_transactions`
--
ALTER TABLE `lab_results_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lab_results_transactions_lab_result_id_index` (`lab_result_id`),
  ADD KEY `lab_results_transactions_owner_id_index` (`owner_id`);

--
-- Indexes for table `lab_result_reply_transaction`
--
ALTER TABLE `lab_result_reply_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lab_result_reply_transaction_lrft_id_index` (`lrft_id`),
  ADD KEY `lab_result_reply_transaction_owner_id_index` (`owner_id`);

--
-- Indexes for table `lab_result_services`
--
ALTER TABLE `lab_result_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lab_result_services_lab_result_id_index` (`lab_result_id`),
  ADD KEY `lab_result_services_service_id_index` (`service_id`);

--
-- Indexes for table `lab_result_transactions_forward`
--
ALTER TABLE `lab_result_transactions_forward`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lab_result_transactions_forward_lrt_id_index` (`lrt_id`),
  ADD KEY `lab_result_transactions_forward_doctor_id_index` (`doctor_id`);

--
-- Indexes for table `lab_services`
--
ALTER TABLE `lab_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lab_services_lab_id_index` (`lab_id`),
  ADD KEY `lab_services_service_id_index` (`service_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_item_id_index` (`item_id`),
  ADD KEY `likes_user_id_index` (`user_id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_user_id_index` (`user_id`),
  ADD KEY `media_employee_id_index` (`employee_id`);

--
-- Indexes for table `media_modules`
--
ALTER TABLE `media_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_modules_media_id_index` (`media_id`),
  ADD KEY `media_modules_system_index` (`system`),
  ADD KEY `media_modules_item_id_index` (`item_id`),
  ADD KEY `media_modules_is_default_index` (`is_default`),
  ADD KEY `media_modules_is_public_index` (`is_public`),
  ADD KEY `media_modules_user_id_index` (`user_id`),
  ADD KEY `media_modules_employee_id_index` (`employee_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rates_item_id_index` (`item_id`),
  ADD KEY `rates_user_id_index` (`user_id`);

--
-- Indexes for table `secretaries`
--
ALTER TABLE `secretaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `secretaries_user_id_index` (`user_id`),
  ADD KEY `secretaries_secretary_id_index` (`secretary_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_type_service_id_index` (`type_service_id`),
  ADD KEY `services_name_index` (`name`);

--
-- Indexes for table `services_to_users`
--
ALTER TABLE `services_to_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_to_users_service_id_index` (`service_id`),
  ADD KEY `services_to_users_user_id_index` (`user_id`);

--
-- Indexes for table `services_type`
--
ALTER TABLE `services_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_type_name_index` (`name`);

--
-- Indexes for table `service_to_expertise`
--
ALTER TABLE `service_to_expertise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_to_expertise_service_id_index` (`service_id`),
  ADD KEY `service_to_expertise_expertise_id_index` (`expertise_id`);

--
-- Indexes for table `telephones`
--
ALTER TABLE `telephones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `telephones_user_id_index` (`user_id`),
  ADD KEY `telephones_city_id_index` (`city_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_media_id_index` (`media_id`),
  ADD KEY `tickets_parent_id_index` (`parent_id`),
  ADD KEY `tickets_user_id_index` (`user_id`),
  ADD KEY `tickets_employee_id_index` (`employee_id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `universities_city_id_index` (`city_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD KEY `users_user_type_id_index` (`user_type_id`),
  ADD KEY `users_city_id_index` (`city_id`);

--
-- Indexes for table `users_staff`
--
ALTER TABLE `users_staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_staff_employer_index` (`employer`),
  ADD KEY `users_staff_user_id_index` (`user_id`);

--
-- Indexes for table `users_type`
--
ALTER TABLE `users_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_group`
--
ALTER TABLE `user_access_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_access_group_user_id_index` (`user_id`),
  ADD KEY `user_access_group_employee_id_index` (`employee_id`),
  ADD KEY `user_access_group_access_group_id_index` (`access_group_id`);

--
-- Indexes for table `user_insurances`
--
ALTER TABLE `user_insurances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_insurances_user_id_index` (`user_id`),
  ADD KEY `user_insurances_insurance_id_index` (`insurance_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_groups`
--
ALTER TABLE `access_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `access_list`
--
ALTER TABLE `access_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `actions_list`
--
ALTER TABLE `actions_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `calendar_details`
--
ALTER TABLE `calendar_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments_media`
--
ALTER TABLE `comments_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content_categories`
--
ALTER TABLE `content_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coupons_details`
--
ALTER TABLE `coupons_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coupons_log`
--
ALTER TABLE `coupons_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `credit_transactions`
--
ALTER TABLE `credit_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doctor_expertise`
--
ALTER TABLE `doctor_expertise`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expertise`
--
ALTER TABLE `expertise`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infringement_notification`
--
ALTER TABLE `infringement_notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `insurances`
--
ALTER TABLE `insurances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lab_results`
--
ALTER TABLE `lab_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lab_results_transactions`
--
ALTER TABLE `lab_results_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lab_result_reply_transaction`
--
ALTER TABLE `lab_result_reply_transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lab_result_services`
--
ALTER TABLE `lab_result_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lab_result_transactions_forward`
--
ALTER TABLE `lab_result_transactions_forward`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lab_services`
--
ALTER TABLE `lab_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media_modules`
--
ALTER TABLE `media_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parameters`
--
ALTER TABLE `parameters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `secretaries`
--
ALTER TABLE `secretaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services_to_users`
--
ALTER TABLE `services_to_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services_type`
--
ALTER TABLE `services_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service_to_expertise`
--
ALTER TABLE `service_to_expertise`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `telephones`
--
ALTER TABLE `telephones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_staff`
--
ALTER TABLE `users_staff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_type`
--
ALTER TABLE `users_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_access_group`
--
ALTER TABLE `user_access_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_insurances`
--
ALTER TABLE `user_insurances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`),
  ADD CONSTRAINT `booking_details_cd_id_foreign` FOREIGN KEY (`cd_id`) REFERENCES `calendar_details` (`id`),
  ADD CONSTRAINT `booking_details_std_id_foreign` FOREIGN KEY (`std_id`) REFERENCES `services_to_users` (`id`);

--
-- Constraints for table `calendars`
--
ALTER TABLE `calendars`
  ADD CONSTRAINT `calendars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `calendar_details`
--
ALTER TABLE `calendar_details`
  ADD CONSTRAINT `calendar_details_calendar_id_foreign` FOREIGN KEY (`calendar_id`) REFERENCES `calendars` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Constraints for table `credits`
--
ALTER TABLE `credits`
  ADD CONSTRAINT `credits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `credit_transactions`
--
ALTER TABLE `credit_transactions`
  ADD CONSTRAINT `credit_transactions_credit_id_foreign` FOREIGN KEY (`credit_id`) REFERENCES `credits` (`id`),
  ADD CONSTRAINT `credit_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `doctor_expertise`
--
ALTER TABLE `doctor_expertise`
  ADD CONSTRAINT `doctor_expertise_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `doctor_expertise_expertise_id_foreign` FOREIGN KEY (`expertise_id`) REFERENCES `expertise` (`id`),
  ADD CONSTRAINT `doctor_expertise_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`);

--
-- Constraints for table `lab_results`
--
ALTER TABLE `lab_results`
  ADD CONSTRAINT `lab_results_lab_id_foreign` FOREIGN KEY (`lab_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `lab_results_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users_staff` (`id`),
  ADD CONSTRAINT `lab_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `lab_results_transactions`
--
ALTER TABLE `lab_results_transactions`
  ADD CONSTRAINT `lab_results_transactions_lab_result_id_foreign` FOREIGN KEY (`lab_result_id`) REFERENCES `lab_results` (`id`),
  ADD CONSTRAINT `lab_results_transactions_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `lab_result_reply_transaction`
--
ALTER TABLE `lab_result_reply_transaction`
  ADD CONSTRAINT `lab_result_reply_transaction_lrft_id_foreign` FOREIGN KEY (`lrft_id`) REFERENCES `lab_result_transactions_forward` (`id`),
  ADD CONSTRAINT `lab_result_reply_transaction_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `lab_result_services`
--
ALTER TABLE `lab_result_services`
  ADD CONSTRAINT `lab_result_services_lab_result_id_foreign` FOREIGN KEY (`lab_result_id`) REFERENCES `lab_results` (`id`),
  ADD CONSTRAINT `lab_result_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `lab_result_transactions_forward`
--
ALTER TABLE `lab_result_transactions_forward`
  ADD CONSTRAINT `lab_result_transactions_forward_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `lab_result_transactions_forward_lrt_id_foreign` FOREIGN KEY (`lrt_id`) REFERENCES `lab_results_transactions` (`id`);

--
-- Constraints for table `lab_services`
--
ALTER TABLE `lab_services`
  ADD CONSTRAINT `lab_services_lab_id_foreign` FOREIGN KEY (`lab_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `lab_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `media_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `media_modules`
--
ALTER TABLE `media_modules`
  ADD CONSTRAINT `media_modules_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `media_modules_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`),
  ADD CONSTRAINT `media_modules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `secretaries`
--
ALTER TABLE `secretaries`
  ADD CONSTRAINT `secretaries_secretary_id_foreign` FOREIGN KEY (`secretary_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `secretaries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_type_service_id_foreign` FOREIGN KEY (`type_service_id`) REFERENCES `services_type` (`id`);

--
-- Constraints for table `services_to_users`
--
ALTER TABLE `services_to_users`
  ADD CONSTRAINT `services_to_users_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `services_to_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `service_to_expertise`
--
ALTER TABLE `service_to_expertise`
  ADD CONSTRAINT `service_to_expertise_expertise_id_foreign` FOREIGN KEY (`expertise_id`) REFERENCES `expertise` (`id`),
  ADD CONSTRAINT `service_to_expertise_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `telephones`
--
ALTER TABLE `telephones`
  ADD CONSTRAINT `telephones_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `telephones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `users_staff`
--
ALTER TABLE `users_staff`
  ADD CONSTRAINT `users_staff_employer_foreign` FOREIGN KEY (`employer`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_staff_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_insurances`
--
ALTER TABLE `user_insurances`
  ADD CONSTRAINT `user_insurances_insurance_id_foreign` FOREIGN KEY (`insurance_id`) REFERENCES `insurances` (`id`),
  ADD CONSTRAINT `user_insurances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
