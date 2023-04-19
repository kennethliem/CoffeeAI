-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 02:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeeai`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_features`
--

CREATE TABLE `app_features` (
  `uuid` varchar(50) NOT NULL,
  `feature_name` varchar(100) NOT NULL,
  `feature_description` varchar(255) NOT NULL,
  `icon_url` varchar(255) NOT NULL,
  `icon_alternate` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `last_modified_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `app_features`
--

INSERT INTO `app_features` (`uuid`, `feature_name`, `feature_description`, `icon_url`, `icon_alternate`, `created_at`, `updated_at`, `last_modified_by`) VALUES
('3883c722-aa3e-4f99-885e-938085d3cea4', 'Have accurate coffee bean type classification results', 'Using CNN Deep Learning technology using tensorflow so that it can improve classification accuracy', '1681619770_caa72b53cc39ae55c7de.png', 'Icon Feature 3', '2023-04-16 04:36:10', '2023-04-16 04:36:10', 'Kenneth Liem Hardadi'),
('62d0becf-0f5e-40b2-bdeb-abcc3b2df973', 'Accessible through various media', 'Can be accessed using a website or using an API so that it is possible to use it in other applications.', '1681619740_60f7fbbaf9a96e6afc83.png', 'Icon Feature 2', '2023-04-16 04:35:41', '2023-04-16 04:35:41', 'Kenneth Liem Hardadi'),
('7ebc26ba-e9d5-4aee-8e18-52aa00904862', 'Classification of types of coffee beans ', 'Can classify the types of coffee beans using photos of coffee beans', '1679903974_bf0375ace96635009715.png', 'Icon Feature 1', '2023-03-27 07:23:38', '2023-03-29 05:31:41', 'Kenneth Liem Hardadi');

-- --------------------------------------------------------

--
-- Table structure for table `app_informations`
--

CREATE TABLE `app_informations` (
  `uuid` varchar(50) NOT NULL,
  `app_name` varchar(100) NOT NULL,
  `app_description` varchar(255) NOT NULL,
  `app_copyright` varchar(255) NOT NULL,
  `count_happy_users` int(8) NOT NULL,
  `count_total_datasets` int(8) NOT NULL,
  `last_model_accuracy` int(3) NOT NULL,
  `app_address` varchar(255) NOT NULL,
  `app_phone_number` varchar(15) NOT NULL,
  `app_email` varchar(70) NOT NULL,
  `app_operational_hours` varchar(50) NOT NULL,
  `updated_at` datetime NOT NULL,
  `last_modified_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `app_informations`
--

INSERT INTO `app_informations` (`uuid`, `app_name`, `app_description`, `app_copyright`, `count_happy_users`, `count_total_datasets`, `last_model_accuracy`, `app_address`, `app_phone_number`, `app_email`, `app_operational_hours`, `updated_at`, `last_modified_by`) VALUES
('bb287301-c0a3-47f0-be85-7b58e304a39e', 'CoffeeAI', 'We understand the importance of knowing the exact type of coffee beans used in coffee-making, and have made it our mission to provide accurate and detailed information about each type of coffee bean. Through our website, users can learn about the origins,', 'CoffeeAI 2023', 100, 100, 80, 'Gading Serpong, Tangerang, Indonesia', '0811202604', 'hello@coffeeai.online', 'Monday - Friday 9:00AM - 05:00PM', '2023-04-16 04:37:56', 'Kenneth Liem Hardadi');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `uuid` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`uuid`, `email`, `fullname`, `password_hash`, `created_at`, `updated_at`) VALUES
('a9155b09-4477-4e94-bbef-0cfd5bc477e9', 'robert.theo@gmail.com', 'Robert Theo', '$2y$10$GpSjefncheqIlgnMktF7/.bW486sQADbYTccR8aWxXNMydnWhAIwK', '2023-04-16 06:26:29', '2023-04-16 06:26:29'),
('aa4a85ac-ce55-4f72-9b1b-a421dbe79c51', 'kennethliem991@gmail.com', 'Kenneth Liem Hardadi', '$2y$10$GySch3aWeIaaF6A0L8gE1epNeRv8q1..H717WtseTPYpwQvh3O/ka', '2023-04-19 11:12:44', '2023-04-19 11:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `coffee_beans`
--

CREATE TABLE `coffee_beans` (
  `uuid` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `photo_alternate` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `last_modified_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `coffee_beans`
--

INSERT INTO `coffee_beans` (`uuid`, `name`, `class_name`, `type`, `description`, `photo_url`, `photo_alternate`, `created_at`, `updated_at`, `last_modified_by`) VALUES
('31b32224-220a-4d31-b0ba-d88a4c640e91', 'Robusta Gayo', 'robustaGayo', 'Robusta', 'Robusta Gayo coffee beans are grown at a lower altitude and are often used to add body and depth to coffee blends. These beans are perfect for those who prefer a strong and bold taste in their coffee.', '1681621414_f5015ffb18813bd6ac11.png', 'Robusta Gayo', '2023-03-27 08:31:04', '2023-04-16 15:07:11', 'Kenneth Liem Hardadi'),
('5b81c7fe-6516-4909-a292-e1b6ba482ca2', 'Arabica Gayo', 'arabicaGayo', 'Arabica', '100% Organic Arabica Beans From Indonesia. Kopi Aceh Gayo is grown organically, which promotes long-term environmental sustainability. Not only that, but the geographical advantage is one of the reasons why Kopi Aceh Gayo is well-known worldwide.', '1681621461_90174d1b45c13a123319.png', 'Arabica Gayo', '2023-04-16 05:04:21', '2023-04-16 15:07:21', 'Kenneth Liem Hardadi');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `uuid` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumbnail_url` varchar(255) NOT NULL,
  `thumbnail_alternate` varchar(50) NOT NULL,
  `content_url` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `last_modified_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`uuid`, `title`, `description`, `thumbnail_url`, `thumbnail_alternate`, `content_url`, `created_at`, `updated_at`, `last_modified_by`) VALUES
('76843b79-396a-4238-b228-9d9b52751a39', 'Is Coffee Good for You?', 'We’ve come a long way from the cans of Folgers that filled our grandparents’ cupboards, with our oat milk lattes, cold brews and Frappuccinos. Some of us are still very utilitarian about the drink while others perform elaborate rituals.', '1681620602_45c55cc186e75a33aa8a.png', 'Is Coffee Good for You? thumbnail', 'https://www.nytimes.com/2020/02/13/style/self-care/coffee-benefits.html', '2023-04-16 04:50:02', '2023-04-16 04:50:02', 'Kenneth Liem Hardadi'),
('ec8d741f-d3bf-40ed-9095-97430acb8def', 'Coffee', 'Coffee is one of the three most popular beverages in the world (alongside water and tea) and one of the most profitable international commodities.', '1681620170_97926cfa16c7f1183c61.jpeg', 'Coffee Thumbnail', 'https://www.britannica.com/topic/coffee', '2023-04-16 04:42:50', '2023-04-16 04:42:50', 'Kenneth Liem Hardadi'),
('fbe8defd-caad-478f-bd05-11be24e276ea', 'The Health Benefits of Coffee', 'Drinking coffee has been linked to a reduced risk of all kinds of ailments, including Parkinson’s disease, melanoma, prostate cancer, even suicide.', '1681620250_efcd274ab2bc957e0a80.png', 'The Health Benefits of Coffee Thumbnail', 'https://www.nytimes.com/2021/06/14/well/eat/coffee-health-benefits.html', '2023-04-16 04:44:10', '2023-04-16 04:44:10', 'Kenneth Liem Hardadi');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `uuid` varchar(50) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `last_modified_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`uuid`, `question`, `answer`, `created_at`, `updated_at`, `last_modified_by`) VALUES
('17d3e156-ec3b-413d-ad7a-7f057cf16129', 'Is the website accessible on all devices?', 'Yes, our website is responsive and accessible on all devices, from desktop computers to mobile phones.', '2023-04-16 05:20:14', '2023-04-16 05:20:14', 'Kenneth Liem Hardadi'),
('2ee27327-7743-4799-ba1d-06b69df34416', 'Is the information on the website accurate?', 'Yes, we strive to provide accurate and up-to-date information about each type of coffee bean. Our team of content writers and researchers works diligently to ensure that the information provided on the website is as accurate as possible.', '2023-04-16 05:20:03', '2023-04-16 05:20:03', 'Kenneth Liem Hardadi'),
('523fdf4d-5bae-4e49-a739-f147944ac31d', 'How can I provide feedback or suggestions?', 'We welcome your feedback and suggestions! You can reach out to us through the &quot;Contact Us&quot; page on our website, or by sending us an email at [email protected] We value your input and will take your feedback into consideration as we continue to i', '2023-04-16 05:20:24', '2023-04-16 05:20:24', 'Kenneth Liem Hardadi'),
('771f4f12-33ae-4d13-b19b-d7f2cd31dce9', 'What types of coffee beans are included on the website?', 'Our website includes information on a wide variety of coffee beans, including Arabica, Robusta, and more. We are constantly updating and expanding our database of coffee beans, so be sure to check back often for new additions.', '2023-04-16 05:19:53', '2023-04-16 05:19:53', 'Kenneth Liem Hardadi'),
('e575bafa-4d54-44d6-909d-36a5898b1e42', 'How do I use the website?', 'Using our website is simple. Just navigate to the homepage and select the type of coffee bean you are interested in learning about. Our website will provide you with detailed information about the bean, including its taste profile and brewing techniques.', '2023-04-16 05:19:43', '2023-04-16 05:19:43', 'Kenneth Liem Hardadi'),
('e6c2217c-3fe6-4afe-aa8d-e3ae7dcb9774', 'What is the purpose of this website?', 'The purpose of this website is to assist coffee enthusiasts in identifying different types of coffee beans. We provide accurate and detailed information about each type of coffee bean, including their origins, taste profiles, and brewing techniques.', '2023-03-29 05:44:36', '2023-03-29 05:44:36', 'Kenneth Liem Hardadi');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-03-02-045559', 'App\\Database\\Migrations\\Users', 'default', 'App', 1678552056, 1),
(2, '2023-03-02-045605', 'App\\Database\\Migrations\\Clients', 'default', 'App', 1678552057, 1),
(3, '2023-03-02-045614', 'App\\Database\\Migrations\\ModelVersions', 'default', 'App', 1678552057, 1),
(4, '2023-03-02-045624', 'App\\Database\\Migrations\\Contents', 'default', 'App', 1678552058, 1),
(5, '2023-03-02-045635', 'App\\Database\\Migrations\\CoffeeBeans', 'default', 'App', 1678552058, 1),
(6, '2023-03-02-045644', 'App\\Database\\Migrations\\AppInformations', 'default', 'App', 1678552058, 1),
(7, '2023-03-02-045651', 'App\\Database\\Migrations\\AppFeatures', 'default', 'App', 1678552059, 1),
(8, '2023-03-02-045658', 'App\\Database\\Migrations\\WorkingTeams', 'default', 'App', 1678552059, 1),
(9, '2023-03-02-045703', 'App\\Database\\Migrations\\Sponsors', 'default', 'App', 1678552060, 1),
(10, '2023-03-02-045707', 'App\\Database\\Migrations\\Faqs', 'default', 'App', 1678552060, 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_versions`
--

CREATE TABLE `model_versions` (
  `uuid` varchar(50) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `version` varchar(5) NOT NULL,
  `model_location` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_history`
--

CREATE TABLE `request_history` (
  `id` int(5) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `code` varchar(3) DEFAULT NULL,
  `result` varchar(100) NOT NULL,
  `is_error` int(1) NOT NULL,
  `through` varchar(5) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_history`
--

INSERT INTO `request_history` (`id`, `email`, `code`, `result`, `is_error`, `through`, `created_at`) VALUES
(9, 'kennethliem991@gmail.com', '200', 'Robusta Gayo', 0, 'API', '2023-04-19 19:19:10'),
(10, 'kennethliem991@gmail.com', '200', 'Arabika Gayo', 0, 'WEB', '2023-04-19 19:26:18'),
(11, 'robert.theo@gmail.com', '200', 'Arabika Gayo', 0, 'WEB', '2023-04-19 19:26:44'),
(12, 'robert.theo@gmail.com', '200', 'Robusta Gayo', 0, 'API', '2023-04-19 19:26:59'),
(13, 'robert.theo@gmail.com', '200', 'Arabika Gayo', 0, 'WEB', '2023-04-19 19:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `uuid` varchar(50) NOT NULL,
  `sponsor_name` varchar(120) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `photo_alternate` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `last_modified_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uuid` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(120) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uuid`, `email`, `full_name`, `phone`, `address`, `password_hash`, `token`, `role`, `created_at`, `updated_at`, `updated_by`, `is_active`) VALUES
('bb287301-c0a3-47f0-be85-7b58e304a39e', 'kennethliem991@gmail.com', 'Kenneth Liem Hardadi', '0811202604', 'Pabuaran Residence, Cluster Catleya C3-15', '$2y$10$wPegi0MzNxFz8s/AH24gcexkWbK15aFcCk/HBuL.2LA6qV5.lL3yC', '', 1, '2023-03-12 05:17:05', '2023-04-16 12:51:17', 'Kenneth Liem Hardadi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `working_teams`
--

CREATE TABLE `working_teams` (
  `uuid` varchar(50) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `position` varchar(50) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `photo_alternate` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `last_modified_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_features`
--
ALTER TABLE `app_features`
  ADD PRIMARY KEY (`uuid`);

--
-- Indexes for table `app_informations`
--
ALTER TABLE `app_informations`
  ADD PRIMARY KEY (`uuid`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`uuid`);

--
-- Indexes for table `coffee_beans`
--
ALTER TABLE `coffee_beans`
  ADD PRIMARY KEY (`uuid`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_versions`
--
ALTER TABLE `model_versions`
  ADD PRIMARY KEY (`uuid`);

--
-- Indexes for table `request_history`
--
ALTER TABLE `request_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`uuid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uuid`);

--
-- Indexes for table `working_teams`
--
ALTER TABLE `working_teams`
  ADD PRIMARY KEY (`uuid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `request_history`
--
ALTER TABLE `request_history`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
