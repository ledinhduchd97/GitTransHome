-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 29, 2018 lúc 03:05 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_transhome`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `aboutuses`
--

CREATE TABLE `aboutuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_signature` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `aboutuses`
--

INSERT INTO `aboutuses` (`id`, `title`, `short_description`, `detail_description`, `image_avatar`, `image_signature`, `created_at`, `updated_at`) VALUES
(1, 'About Us', '3F Group chúng tôi là ai ?', '3F Group là công ty chuyên cung cấp các giải pháp về phần mềm trên nền Web và tư vấn thiết kế Website theo yêu cầu. Với mục tiêu giúp đỡ các doanh nghiệp gia tăng doanh số bán hàng cùng với sự chuyên nghiệp hóa và hiện đại hóa. 3F Group đem đến cho bạn? Phần mềm: 3F Group chuyên cung cấp các giải pháp về Phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp, phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp', 'frontend/images/person_img1.png', 'frontend/images/chuki.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `birthday`, `phone`, `address`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Malachi', 'Rippin', 't2xfd@gmail.com', '2009-03-28', '(777)3430494', '3872 Ziemann Inlet Suite 078\nDibbertshire, NE 74716-4902', NULL, '2001-02-24 12:48:09', NULL, NULL),
(2, 'Emory', 'O\'Keefe', 'Dz2A3@gmail.com', '2015-10-27', '(935)4797626', '79297 Sienna Mills Apt. 348\nWuckertside, NJ 74557', NULL, '1988-06-14 09:21:35', NULL, NULL),
(3, 'Irving', 'Hauck', 'sjEuf@gmail.com', '2017-07-09', '(518)3485047', '186 Larkin Villages\nWest Sebastian, MA 99390', NULL, '2005-11-14 03:51:10', NULL, NULL),
(4, 'Jermaine', 'Ortiz', '2Xi6v@gmail.com', '2010-06-16', '(552)4254321', '42820 Langworth Walk\nWest Finnchester, IL 94141-1586', NULL, '1986-05-18 06:03:07', NULL, NULL),
(5, 'Alysson', 'Toy', 'LGsDS@gmail.com', '2012-07-13', '(293)7561409', '880 Kohler Neck Suite 061\nLake Michaelmouth, WI 17297-4269', NULL, '1984-11-04 08:59:31', NULL, NULL),
(6, 'Kathryne', 'Auer', 'EuaT1@gmail.com', '2009-02-04', '(316)4374841', '333 Anya Hollow Apt. 735\nWest Charlesstad, WI 02605-7715', NULL, '2008-07-10 13:32:14', NULL, NULL),
(7, 'Ellis', 'Upton', '8hN49@gmail.com', '2004-03-22', '(217)8982733', '17845 Bogisich Club\nEast Cecilport, OR 29015', NULL, '2015-04-29 13:02:51', NULL, NULL),
(8, 'Toby', 'Wunsch', 'du4o4@gmail.com', '2018-07-11', '(437)3771293', '3203 Susanna Expressway\nSawaynport, CT 70700', NULL, '1978-12-12 04:00:19', NULL, NULL),
(9, 'Fletcher', 'Keebler', '3ULQR@gmail.com', '2010-11-05', '(620)8815874', '594 Thompson Fall\nPinkieberg, GA 91755', NULL, '1980-08-05 20:47:51', NULL, NULL),
(10, 'Ike', 'Cummerata', 'acKU4@gmail.com', '2007-01-04', '(122)9821749', '6444 Zieme Fords Apt. 173\nWest Annalise, MO 39844-0669', NULL, '2002-02-06 13:17:22', NULL, NULL),
(11, 'Helga', 'Tromp', 'MIiwV@gmail.com', '2011-08-27', '(677)2469627', '7626 Hudson Motorway\nEmmystad, WY 01278-6363', NULL, '2009-08-24 14:54:14', NULL, NULL),
(12, 'Claire', 'McCullough', 'McjPV@gmail.com', '2018-08-16', '(910)2127459', '193 Mann Fall Apt. 784\nNorth Kristina, NC 06810', NULL, '1999-02-02 02:01:14', NULL, NULL),
(13, 'Easter', 'Zieme', 'W8FHQ@gmail.com', '2007-11-05', '(625)2718215', '529 Cartwright Ports Suite 325\nCartwrightbury, WI 55529', NULL, '1973-03-30 04:07:29', NULL, NULL),
(14, 'Kaycee', 'Tillman', 'A4wYu@gmail.com', '2016-06-07', '(233)5378923', '78400 Rossie Turnpike Apt. 620\nClairebury, AL 31216-0338', NULL, '1994-11-03 16:48:13', NULL, NULL),
(15, 'Leonel', 'Bode', 'OorpF@gmail.com', '2014-06-01', '(766)3971864', '59553 Alessandra Squares\nEduardoview, NJ 46601-4771', NULL, '1999-03-22 01:50:42', NULL, NULL),
(16, 'Skylar', 'Gerhold', '6YgJx@gmail.com', '2006-09-01', '(695)7913076', '652 Heaney Tunnel Suite 402\nLaurynshire, OK 15666', NULL, '2016-10-28 16:40:48', NULL, NULL),
(17, 'Kassandra', 'Denesik', 'g44wG@gmail.com', '2005-10-17', '(247)9963034', '93043 Pfannerstill Pine Apt. 808\nPort Margarette, NV 72327-8466', NULL, '1986-06-07 03:17:01', NULL, NULL),
(18, 'Delbert', 'Larson', 'Zc1lK@gmail.com', '2011-08-01', '(681)6421356', '130 Armstrong Ways Suite 087\nWest Brauliobury, NE 64723', NULL, '1994-05-05 15:51:26', NULL, NULL),
(19, 'Arden', 'Crist', 'NxeLz@gmail.com', '2013-08-14', '(431)3842051', '3936 Trudie Centers Suite 008\nGibsonstad, SC 94771', NULL, '2002-05-31 00:24:49', NULL, NULL),
(20, 'Cora', 'Hermann', 'UvfWd@gmail.com', '2016-06-14', '(742)4271326', '388 Wintheiser Vista Suite 928\nPort Theronchester, MA 29255-4740', NULL, '1999-03-29 08:51:49', NULL, NULL),
(21, 'Lyda', 'Kessler', 'SwEu8@gmail.com', '2017-07-16', '(219)7290937', '53758 Gertrude Mall\nPort Clintonborough, PA 61985', NULL, '2010-12-14 06:42:55', NULL, NULL),
(22, 'Zakary', 'Blanda', 'SL5Wp@gmail.com', '2004-07-05', '(615)1463458', '656 Cathy Streets\nCamrynchester, ID 94201-5648', NULL, '2006-02-26 06:29:03', NULL, NULL),
(23, 'Dan', 'Cruickshank', '6ZBCn@gmail.com', '2018-04-18', '(191)6070259', '75517 Jaclyn Street Suite 902\nPort Ludiemouth, ND 68274-0695', NULL, '2006-08-02 12:00:13', NULL, NULL),
(24, 'Josianne', 'Wehner', 'vkFWB@gmail.com', '2015-02-05', '(805)2012927', '482 Heller Avenue\nEast Gracielastad, IA 99364', NULL, '2006-01-31 15:23:06', NULL, NULL),
(25, 'Wilbert', 'Heathcote', 'mL9sn@gmail.com', '2005-12-05', '(964)1197849', '416 Vincenzo Mountain Suite 275\nNew Luellafurt, AL 04284', NULL, '1991-01-07 12:10:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_notes`
--

CREATE TABLE `customer_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer_notes`
--

INSERT INTO `customer_notes` (`id`, `content`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 'This is note 1', 1, '2018-12-26 08:42:45', NULL),
(2, 'This is note 2', 2, '2018-12-26 08:42:45', NULL),
(3, 'This is note 3', 3, '2018-12-26 08:42:45', NULL),
(4, 'This is note 4', 4, '2018-12-26 08:42:45', NULL),
(5, '<p>aaaaaaaaaaaaaaa</p>', 16, '2018-12-26 10:19:20', '2018-12-26 10:19:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_task_to_dos`
--

CREATE TABLE `customer_task_to_dos` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `ranking` int(11) DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer_task_to_dos`
--

INSERT INTO `customer_task_to_dos` (`id`, `customer_id`, `title`, `type`, `deadline`, `status`, `ranking`, `note`, `created_at`, `updated_at`) VALUES
(1, 21, 'Sales Representative', 'I beg your.', '2004-02-19 20:32:21', NULL, 0, 'Alice hastily replied; \'only one.', '1981-03-14 06:09:39', NULL),
(2, 24, 'Nuclear Technician', 'What happened to.', '1996-01-20 09:37:30', NULL, 1, 'And she tried to open it; but, as the.', '1973-01-13 14:26:04', NULL),
(3, 19, 'Operations Research Analyst', 'NO mistake about.', '2010-01-12 09:06:35', NULL, 0, 'Cat, and vanished again. Alice waited.', '1971-02-17 14:57:39', NULL),
(4, 5, 'Surgeon', 'I\'ve finished.\' So.', '1996-06-11 07:07:40', NULL, 0, 'I get it home?\' when it grunted again.', '1988-03-30 04:53:55', NULL),
(5, 12, 'Ship Carpenter and Joiner', 'I\'ll tell him--it.', '2015-03-22 11:58:22', NULL, 0, 'Caterpillar. \'I\'m afraid I can\'t put.', '1983-04-21 07:43:04', NULL),
(6, 10, 'MARCOM Director', 'March Hare. Alice.', '1992-12-12 05:44:43', NULL, 1, 'Because he knows it teases.\' CHORUS.', '2011-07-23 22:15:53', NULL),
(7, 15, 'Hunter and Trapper', 'I\'m sure _I_.', '1989-07-10 23:33:17', NULL, 0, 'Alice, who felt ready to talk about.', '1992-11-11 13:04:31', NULL),
(8, 8, 'Lifeguard', 'I think it was,\'.', '2013-10-28 23:38:35', NULL, 1, 'I only knew the name again!\' \'I won\'t.', '1990-02-07 02:36:27', NULL),
(9, 15, 'Illustrator', 'Why, there\'s.', '1974-06-24 10:59:08', NULL, 0, 'Gryphon. \'Turn a somersault in the.', '1983-07-01 20:22:47', NULL),
(10, 4, 'Radio Operator', 'Caterpillar.', '1978-02-22 23:19:05', NULL, 0, 'Paris, and Paris is the use of.', '1999-12-22 17:02:00', NULL),
(11, 6, 'Crane and Tower Operator', 'CAN all that.', '1981-10-12 23:28:14', NULL, 1, 'March Hare interrupted in a court of.', '1982-08-21 17:37:58', NULL),
(12, 17, 'Physical Therapist Assistant', 'Gryphon.', '2009-11-08 05:49:14', NULL, 0, 'I wonder?\' Alice guessed in a low.', '2017-01-12 23:51:13', NULL),
(13, 6, 'Precision Devices Inspector', 'If they had a.', '2017-04-17 19:20:49', NULL, 0, 'I shall be a person of authority over.', '1991-12-09 03:05:40', NULL),
(14, 23, 'Benefits Specialist', 'No, I\'ve made up.', '1974-10-07 22:36:21', NULL, 0, 'This speech caused a remarkable.', '1980-10-04 18:28:05', NULL),
(15, 23, 'Psychology Teacher', 'And in she went.', '2009-01-21 06:12:38', NULL, 0, 'Alice, who felt very lonely and.', '1977-06-12 05:49:23', NULL),
(16, 13, 'Fashion Designer', 'I know is, it.', '2018-01-16 14:19:08', NULL, 0, 'I used to do:-- \'How doth the.', '2000-09-19 00:47:19', NULL),
(17, 15, 'Utility Meter Reader', 'Queen say only.', '1985-03-01 06:00:41', NULL, 0, 'Soon her eye fell on a crimson velvet.', '1984-02-10 14:22:20', NULL),
(18, 14, 'Healthcare Support Worker', 'But said I could.', '1988-06-21 05:35:43', NULL, 1, 'M?\' said Alice. \'Off with her head.', '2005-11-20 13:52:25', NULL),
(19, 7, 'Chemical Engineer', 'Alice got up very.', '1989-08-22 13:41:38', NULL, 0, 'Caterpillar. \'I\'m afraid I can\'t.', '1986-06-16 16:17:03', NULL),
(20, 14, 'Tailor', 'I hadn\'t drunk.', '1997-05-14 03:19:44', NULL, 1, 'Alice for some time busily writing in.', '1995-01-05 15:45:36', NULL),
(21, 7, 'Operating Engineer', 'Lory. Alice.', '2001-07-01 03:13:50', NULL, 1, 'Just at this corner--No, tie \'em.', '2010-05-25 03:16:14', NULL),
(22, 11, 'Stone Cutter', 'Caterpillar.', '1988-04-18 03:11:15', NULL, 1, 'But do cats eat bats, I wonder?\' As.', '2000-09-04 22:06:11', NULL),
(23, 5, 'Preschool Education Administrators', 'LESS,\' said the.', '1972-04-17 21:34:55', NULL, 0, 'And it\'ll fetch things when you come.', '2017-11-28 20:53:50', NULL),
(24, 24, 'Respiratory Therapy Technician', 'It was the fan and.', '2000-03-30 07:39:46', NULL, 1, 'I breathe\"!\' \'It IS the use of a.', '1983-01-20 23:43:34', NULL),
(25, 16, 'Job Printer', 'I could show you.', '2008-07-12 00:00:00', 0, 1, 'I suppose, by being drowned in my.', '2017-09-17 17:00:00', '2018-12-26 10:21:35'),
(26, 16, 'Công việc khẩn cấp', 'Khách hàng vip', '2018-12-27 00:00:00', 1, 0, 'abcccc', '2018-12-07 17:00:00', '2018-12-26 08:47:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `header_footers`
--

CREATE TABLE `header_footers` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `header_footers`
--

INSERT INTO `header_footers` (`id`, `phone`, `email`, `description`, `address`, `created_at`, `updated_at`) VALUES
(1, '(906) 678-6789', 'ledinhduchd97', '3F Group cam kết tư vấn và thiết kế cho khách hàng một sản phẩm chất lượng, chuyên nghiệp, hiện đại và tối ưu nhất.', '14 xóm Đình - Minh Khai\r\n            Bắc Từ Liêm, Hà Nội', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `houses`
--

CREATE TABLE `houses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_bedroom` int(11) NOT NULL,
  `number_bathroom` int(11) NOT NULL,
  `area_gross_floor` double(8,2) NOT NULL,
  `site_area` double(8,2) NOT NULL,
  `price` double(12,2) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `builded_year` int(11) NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brokerage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mls` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `active_status` tinyint(4) NOT NULL,
  `user_update` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `houses`
--

INSERT INTO `houses` (`id`, `name`, `code`, `user_id`, `address`, `number_bedroom`, `number_bathroom`, `area_gross_floor`, `site_area`, `price`, `description`, `phone`, `area`, `zipcode`, `builded_year`, `note`, `video`, `brokerage`, `mls`, `license`, `agent`, `unit`, `status`, `active_status`, `user_update`, `created_at`, `updated_at`) VALUES
(1, 'Home in LA', 'TH001', 1, 'Ha Noi, Viet Nam', 6, 9, 200.00, 300.00, 100.00, 'Day la mot ngoi nha cua TransHome', '0123456789', 'Arab Saudi', '1111111', 19950105, 'Fixer Upper', 'https://www.youtube.com/watch?v=oqmK3xLXw9c', 'Luong', 'Luong', '123asdasasd', 'Luong', 0, 1, 1, NULL, '2018-12-26 08:42:35', NULL),
(2, 'Home in LA', 'TH002', 1, 'Ha Noi, Viet Nam', 6, 9, 200.00, 300.00, 100.00, 'Day la mot ngoi nha cua TransHome', '0123456789', 'Arab Saudi', '1111111', 19950105, 'Fixer Upper', 'https://www.youtube.com/watch?v=oqmK3xLXw9c', 'Luong', 'Luong', '123asdasasd', 'Luong', 0, 1, 1, NULL, '2018-12-26 08:42:35', NULL),
(3, 'Home in LA', 'TH003', 1, 'Ha Noi, Viet Nam', 6, 9, 200.00, 300.00, 100.00, 'Day la mot ngoi nha cua TransHome', '0123456789', 'Arab Saudi', '1111111', 19950105, 'Fixer Upper', 'https://www.youtube.com/watch?v=oqmK3xLXw9c', 'Luong', 'Luong', '123asdasasd', 'Luong', 0, 1, 1, NULL, '2018-12-26 08:42:35', NULL),
(4, 'Home in LA', 'TH004', 1, 'Ha Noi, Viet Nam', 6, 9, 200.00, 300.00, 100.00, 'Day la mot ngoi nha cua TransHome', '0123456789', 'Arab Saudi', '1111111', 19950105, 'Fixer Upper', 'https://www.youtube.com/watch?v=oqmK3xLXw9c', 'Luong', 'Luong', '123asdasasd', 'Luong', 0, 1, 1, NULL, '2018-12-26 08:42:35', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `house_id` int(10) UNSIGNED NOT NULL,
  `level` tinyint(4) NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `house_id`, `level`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'frontend/images/bigSlider1.png', '2018-12-26 08:42:36', NULL),
(2, 1, 2, 'frontend/images/video_slider_img1.png', '2018-12-26 08:42:36', NULL),
(3, 1, 3, 'frontend/images/other_apartiment_img.png', '2018-12-26 08:42:36', NULL),
(4, 2, 1, 'frontend/images/bigSlider1.png', '2018-12-26 08:42:36', NULL),
(5, 2, 2, 'frontend/images/video_slider_img1.png', '2018-12-26 08:42:36', NULL),
(6, 2, 3, 'frontend/images/other_apartiment_img.png', '2018-12-26 08:42:37', NULL),
(7, 3, 1, 'frontend/images/bigSlider1.png', '2018-12-26 08:42:37', NULL),
(8, 3, 2, 'frontend/images/video_slider_img1.png', '2018-12-26 08:42:37', NULL),
(9, 3, 3, 'frontend/images/other_apartiment_img.png', '2018-12-26 08:42:37', NULL),
(10, 4, 1, 'frontend/images/bigSlider1.png', '2018-12-26 08:42:37', NULL),
(11, 4, 2, 'frontend/images/video_slider_img1.png', '2018-12-26 08:42:37', NULL),
(12, 4, 3, 'frontend/images/other_apartiment_img.png', '2018-12-26 08:42:37', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(486, '2014_10_12_000000_create_users_table', 1),
(487, '2014_10_12_100000_create_password_resets_table', 1),
(488, '2018_10_05_032416_create_houses_table', 1),
(489, '2018_10_05_032445_create_images_table', 1),
(490, '2018_10_05_032454_create_page_indices_table', 1),
(491, '2018_10_05_032504_create_page_details_table', 1),
(492, '2018_10_05_074230_create_header_footers_table', 1),
(493, '2018_10_05_103440_create_customers_table', 1),
(494, '2018_10_12_022841_create_page_freecashes_table', 1),
(495, '2018_10_16_130327_create_partners_table', 1),
(496, '2018_10_31_022010_create_about_uses_table', 1),
(497, '2018_11_06_084343_create_partner_views_table', 1),
(498, '2018_11_06_125424_create_set_ups_table', 1),
(499, '2018_11_06_220721_create_tasktodos_table', 1),
(500, '2018_11_23_111118_create_partner_notes_table', 1),
(501, '2018_11_24_150024_create_customer_notes_table', 1),
(502, '2018_11_24_224455_create_partner_task_to_dos_table', 1),
(503, '2018_11_25_210731_create_customer_task_to_dos_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page_details`
--

CREATE TABLE `page_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page_freecashes`
--

CREATE TABLE `page_freecashes` (
  `id` int(10) UNSIGNED NOT NULL,
  `form_information_title_h3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_information_title_h4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `how_we_item_title_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `how_we_item_desc_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `how_we_item_title_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `how_we_item_desc_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `how_we_item_title_3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `how_we_item_desc_3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `how_we_table_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `how_we_table_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `modal_map_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `modal_map_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `modal_thanks_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `modal_thanks_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `modal_thanks_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `page_freecashes`
--

INSERT INTO `page_freecashes` (`id`, `form_information_title_h3`, `form_information_title_h4`, `how_we_item_title_1`, `how_we_item_desc_1`, `how_we_item_title_2`, `how_we_item_desc_2`, `how_we_item_title_3`, `how_we_item_desc_3`, `how_we_table_title`, `how_we_table_desc`, `modal_map_title`, `modal_map_desc`, `modal_thanks_title`, `modal_thanks_desc`, `modal_thanks_phone`, `created_at`, `updated_at`) VALUES
(1, 'How we buy Houses For Cash in the Los Angeles Area', 'Three simple steps to getting you cash for your house...', 'Fill out a form or call', 'To get started, fill out the quick form on this website or just call us. We\" ll then take the info and start our research.', 'Get a fair offer FAST', 'We’ll get you a fair offer in as little as 48 hours (or after inspection of the property).', 'Close and get paid!', 'If you like our offer , you pick a closing date that suits you. Thats It! And remember - you never pay frees or commissions.', 'Selling To On Faith Properties LLC vs. Listing With A Local California Agent', 'Phần mềm: 3F Group chuyên cung cấp các giải pháp về Phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp, phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp', 'Got it!', 'Enter your info Here !', 'Thanks You!', 'We have received you information. We will get back to you as soon as possible. If you’d like to speak to someone immediately, please call our office at ', '(949) 682-3437', '2018-12-26 08:42:37', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page_indices`
--

CREATE TABLE `page_indices` (
  `id` int(10) UNSIGNED NOT NULL,
  `sell_content_question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_content_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_content_btn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_us_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_us_subtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_us_des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_subtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_menu__title_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_menu__des_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_menu__title_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_menu__des_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `page_indices`
--

INSERT INTO `page_indices` (`id`, `sell_content_question`, `sell_content_title`, `sell_content_btn`, `about_us_title`, `about_us_subtitle`, `about_us_des`, `partner_title`, `partner_subtitle`, `partner_des`, `partner_menu__title_1`, `partner_menu__des_1`, `partner_menu__title_2`, `partner_menu__des_2`, `created_at`, `updated_at`) VALUES
(1, 'Need to Sell your House Fast?', 'Get a competitive offer for your house,as-is. No repairs, no fees.', 'Get Your Free Cash Offer Now', 'About Us', '3F Group chúng tôi là ai ?', '3F Group là công ty chuyên cung cấp các giải pháp về phần mềm trên nền Web và tư vấn thiết kế Website theo yêu cầu. Với mục tiêu giúp đỡ các doanh nghiệp gia tăng doanh số bán hàng cùng với sự chuyên nghiệp hóa và hiện đại hóa.\r\n                3F Group đem đến cho bạn?\r\n                Phần mềm: 3F Group chuyên cung cấp các giải pháp về Phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp, phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp', 'Partner Of Tranhomes', 'Bạn có muốn tham gia với chúng tôi', '3F Group đem đến cho bạn?\r\n                Phần mềm: 3F Group chuyên cung cấp các giải pháp về Phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp, phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp', '3F Group đem đến cho bạn?', '3F Group chuyên cung cấp các giải pháp về Phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp', '3F Group đem đến cho bạn?', '3F Group chuyên cung cấp các giải pháp về Phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_recycle` int(11) NOT NULL DEFAULT '1',
  `user_update` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `partners`
--

INSERT INTO `partners` (`id`, `fullname`, `email`, `phone`, `date_of_birth`, `address`, `partner_type`, `status`, `status_recycle`, `user_update`, `created_at`, `updated_at`) VALUES
(1, 'Murl Jacobs', 'telly70@king.com', '896-647-4413 x797', NULL, NULL, NULL, '-', 1, NULL, '2014-11-01 19:30:06', NULL),
(2, 'Kareem Gottlieb', 'river.breitenberg@predovic.com', '423-512-8961 x25537', NULL, NULL, NULL, '-', 1, NULL, '1998-12-01 03:34:24', NULL),
(3, 'Joannie Botsford Sr.', 'cathy88@anderson.com', '(428) 212-1912', NULL, NULL, NULL, '-', 1, NULL, '1997-12-07 02:06:52', NULL),
(4, 'Fletcher Watsica', 'rreichel@lubowitz.com', '+1-324-557-4484', NULL, NULL, NULL, '-', 1, NULL, '1975-03-28 05:02:23', NULL),
(5, 'Mrs. Vena Christiansen', 'tracy08@nikolaus.org', '(749) 260-6463 x8731', NULL, NULL, NULL, '-', 1, NULL, '1993-04-11 12:18:52', NULL),
(6, 'Heidi Maggio', 'tlangworth@hotmail.com', '+1.494.823.7622', NULL, NULL, NULL, '-', 1, NULL, '1991-12-03 20:16:37', NULL),
(7, 'Flavio O\'Kon', 'gbergnaum@gmail.com', '718-659-8641 x723', NULL, NULL, NULL, '-', 1, NULL, '1976-02-22 07:43:37', NULL),
(8, 'Mr. Kamryn Bailey', 'brock57@torp.com', '+1 (340) 383-1352', NULL, NULL, NULL, '-', 1, NULL, '2017-04-17 17:36:02', NULL),
(9, 'Lindsay Powlowski', 'elaina25@sanford.com', '313.478.9733 x247', NULL, NULL, NULL, '-', 1, NULL, '1971-05-04 16:44:08', NULL),
(10, 'Wendy Brekke', 'anderson.casimer@gmail.com', '1-764-867-1696', NULL, NULL, NULL, '-', 1, NULL, '2006-09-23 07:32:19', NULL),
(11, 'Alisa Barton V', 'meggie24@gmail.com', '512-889-5605 x68793', NULL, NULL, NULL, '-', 1, NULL, '2017-09-23 17:13:11', NULL),
(12, 'Taryn Kohler', 'cmills@gmail.com', '245-522-1802 x410', NULL, NULL, NULL, '-', 1, NULL, '1991-10-02 01:57:28', NULL),
(13, 'Carmel Bergnaum', 'dane78@yahoo.com', '1-218-359-4898 x6145', NULL, NULL, NULL, '-', 1, NULL, '1973-10-06 12:11:19', NULL),
(14, 'Magdalena Cummings', 'myrna07@yahoo.com', '426-210-8993 x8998', NULL, NULL, NULL, '-', 1, NULL, '1970-10-12 22:36:40', NULL),
(15, 'Rex Ledner', 'idell.tremblay@yahoo.com', '985.355.6102', NULL, NULL, NULL, '-', 1, NULL, '1995-01-08 04:06:28', NULL),
(16, 'Nikko Green MD', 'macie17@gutmann.biz', '(242) 325-3173', NULL, NULL, NULL, '-', 1, NULL, '1989-09-11 08:49:34', NULL),
(17, 'Reanna Feest', 'cathrine.ziemann@hotmail.com', '1-961-679-2545', NULL, NULL, NULL, '-', 1, NULL, '2018-12-04 23:31:52', NULL),
(18, 'Dr. Lela Wolf', 'champlin.isadore@homenick.com', '(782) 703-5408', NULL, NULL, NULL, '-', 1, NULL, '2012-01-08 08:22:40', NULL),
(19, 'Avis Schamberger', 'mbednar@quitzon.com', '+1-693-468-0500', NULL, NULL, NULL, '-', 1, NULL, '1979-06-15 23:57:57', NULL),
(20, 'Cody Nienow II', 'cecilia.robel@yahoo.com', '(436) 265-0167 x85524', NULL, NULL, NULL, '-', 1, NULL, '1980-01-09 05:22:39', NULL),
(21, 'Jasper Denesik', 'morris96@hotmail.com', '920-318-9069', NULL, NULL, NULL, '-', 1, NULL, '2005-10-11 18:24:23', NULL),
(22, 'Dr. General Ratke', 'granville29@gmail.com', '614.236.9288 x341', NULL, NULL, NULL, '-', 1, NULL, '2011-09-01 14:07:09', NULL),
(23, 'Ms. Nina Bradtke MD', 'uthompson@gmail.com', '804.259.9337 x866', NULL, NULL, NULL, '-', 1, NULL, '2016-12-25 03:19:29', NULL),
(24, 'Ms. Yasmeen Hane Sr.', 'langworth.barton@larkin.com', '(527) 540-6149', NULL, NULL, NULL, '-', 1, NULL, '1970-06-06 23:09:06', NULL),
(25, 'Mr. Friedrich Howell III', 'cwatsica@mosciski.com', '1-790-322-9339 x959', NULL, NULL, NULL, '-', 1, NULL, '1999-10-19 17:07:29', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `partner_notes`
--

CREATE TABLE `partner_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `partner_notes`
--

INSERT INTO `partner_notes` (`id`, `content`, `partner_id`, `created_at`, `updated_at`) VALUES
(1, 'This is note 1', 1, '2018-12-26 08:42:45', NULL),
(2, 'This is note 2', 2, '2018-12-26 08:42:45', NULL),
(3, 'This is note 3', 3, '2018-12-26 08:42:45', NULL),
(4, 'This is note 4', 4, '2018-12-26 08:42:45', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `partner_task_to_dos`
--

CREATE TABLE `partner_task_to_dos` (
  `id` int(10) UNSIGNED NOT NULL,
  `partner_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `update` int(11) DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `invest` double DEFAULT NULL,
  `contract` double DEFAULT NULL,
  `ranking` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `partner_task_to_dos`
--

INSERT INTO `partner_task_to_dos` (`id`, `partner_id`, `title`, `age`, `update`, `type`, `deadline`, `status`, `invest`, `contract`, `ranking`, `created_at`, `updated_at`) VALUES
(1, 11, 'Animal Husbandry Worker', 25, 4, 'I beat him when he.', '2015-08-05 03:02:29', 0, 1000000, 2000000, 0, '1997-05-15 05:10:14', NULL),
(2, 17, 'Respiratory Therapist', 27, 1, 'For, you see, so.', '1992-10-29 02:55:19', 0, 1000000, 2000000, 0, '1989-04-22 08:54:37', NULL),
(3, 24, 'Train Crew', 18, 14, 'Our family always.', '2014-04-14 12:02:23', 0, 1000000, 2000000, 1, '1990-04-06 02:20:24', NULL),
(4, 2, 'Assessor', 16, 7, 'And so it was.', '1989-11-28 19:02:52', 0, 1000000, 2000000, 0, '1998-08-14 11:11:06', NULL),
(5, 3, 'Shampooer', 22, 7, 'On which Seven.', '1988-03-13 12:52:29', 1, 1000000, 2000000, 0, '1978-01-14 18:11:42', NULL),
(6, 5, 'Health Educator', 28, 6, 'Next came an angry.', '2001-01-12 23:33:52', 0, 1000000, 2000000, 0, '1994-03-01 00:21:03', NULL),
(7, 13, 'Program Director', 22, 3, 'Queen say only.', '1972-12-02 05:07:15', 1, 1000000, 2000000, 0, '2012-05-08 16:38:41', NULL),
(8, 7, 'Fashion Designer', 29, 6, 'Gryphon whispered.', '1973-08-18 01:10:10', 1, 1000000, 2000000, 0, '1975-12-31 18:45:51', NULL),
(9, 18, 'Loan Officer', 24, 1, 'Oh! won\'t she be.', '1978-04-05 10:33:35', 0, 1000000, 2000000, 0, '1974-07-13 14:33:25', NULL),
(10, 1, 'Gas Pumping Station Operator', 30, 12, 'ME,\' but.', '1981-03-23 18:48:26', 1, 1000000, 2000000, 1, '1972-11-14 17:13:44', NULL),
(11, 12, 'Agricultural Crop Farm Manager', 22, 9, 'The Mock Turtle.', '2001-09-26 17:20:21', 0, 1000000, 2000000, 1, '1991-11-24 15:03:50', NULL),
(12, 9, 'Appliance Repairer', 21, 6, 'At last the Mock.', '1998-04-25 01:07:44', 1, 1000000, 2000000, 0, '2003-08-11 09:34:05', NULL),
(13, 4, 'Central Office Operator', 24, 2, 'Alice, \'to pretend.', '2005-04-10 05:59:38', 0, 1000000, 2000000, 1, '1976-06-17 12:31:30', NULL),
(14, 6, 'Postal Service Mail Sorter', 26, 2, 'Queen. \'It proves.', '1974-09-13 18:54:23', 1, 1000000, 2000000, 0, '2014-08-29 15:15:50', NULL),
(15, 19, 'Economics Teacher', 27, 10, 'While she was now.', '1981-07-24 15:24:09', 1, 1000000, 2000000, 0, '2003-04-02 17:36:16', NULL),
(16, 10, 'Automotive Technician', 26, 12, 'White Rabbit with.', '1985-09-30 09:37:00', 0, 1000000, 2000000, 1, '1998-06-08 10:00:10', NULL),
(17, 24, 'Credit Checker', 17, 7, 'Those whom she.', '1999-10-10 18:35:54', 0, 1000000, 2000000, 0, '1980-05-24 00:10:32', NULL),
(18, 5, 'Personnel Recruiter', 21, 11, 'Dormouse go on.', '2018-01-14 16:50:53', 0, 1000000, 2000000, 0, '2009-10-30 15:40:21', NULL),
(19, 17, 'Nursing Aide', 23, 5, 'Mock Turtle. \'Hold.', '2000-09-03 14:31:09', 1, 1000000, 2000000, 0, '2011-07-03 13:09:11', NULL),
(20, 19, 'Communication Equipment Repairer', 30, 10, 'Then it got down.', '2018-11-13 15:56:31', 0, 1000000, 2000000, 0, '2013-05-19 23:34:12', NULL),
(21, 7, 'Corporate Trainer', 29, 10, 'SOMEBODY ought to.', '2007-12-03 07:04:05', 1, 1000000, 2000000, 0, '1991-07-10 11:09:31', NULL),
(22, 9, 'Carver', 30, 9, 'MINE,\' said the.', '2015-02-17 19:08:06', 0, 1000000, 2000000, 0, '2000-01-13 04:21:05', NULL),
(23, 15, 'Petroleum Technician', 22, 11, 'Alice, \'it\'s very.', '1985-09-25 14:00:01', 0, 1000000, 2000000, 0, '1986-10-15 02:52:25', NULL),
(24, 22, 'Claims Adjuster', 20, 13, 'For, you see.', '1988-07-08 19:08:07', 1, 1000000, 2000000, 1, '1980-04-16 11:56:29', NULL),
(25, 18, 'Custom Tailor', 30, 8, 'Alice had begun to.', '1970-09-27 17:22:11', 0, 1000000, 2000000, 1, '1988-04-06 11:42:00', NULL),
(26, 1, 'About Uss', 11111, 11, 'aaaaaaaa', '2018-12-30 00:00:00', 0, 3, 7, 0, '2018-12-19 17:00:00', '2018-12-26 09:41:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `partner_views`
--

CREATE TABLE `partner_views` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `partner_views`
--

INSERT INTO `partner_views` (`id`, `title`, `short_desc`, `detail_desc`, `image_avatar`, `created_at`, `updated_at`) VALUES
(1, 'Partner Of Tranhomes', 'Bạn có muốn tham gia với chúng tôi ? ', '3F Group đem đến cho bạn? Phần mềm: 3F Group chuyên cung cấp các giải pháp về Phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp, phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp', 'frontend/images/person_img2.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `set_ups`
--

CREATE TABLE `set_ups` (
  `id` int(10) UNSIGNED NOT NULL,
  `website_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `logo_header` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_footer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thank_you` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_my_home` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lisence` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `set_ups`
--

INSERT INTO `set_ups` (`id`, `website_name`, `description`, `logo_header`, `logo_footer`, `thank_you`, `sell_my_home`, `phone`, `email`, `lisence`, `address`, `facebook`, `instagram`, `twitter`, `created_at`, `updated_at`) VALUES
(1, 'transhome.com', 'I think?\' he said to herself; \'his eyes are so.', 'https://via.placeholder.com/150', 'https://via.placeholder.com/150', 'We have received you information. We will get back to you as soon as possible. If you’d like to speak to someone immediately, please call our office at (949) 682-3437.', 'Phần mềm: 3F Group chuyên cung cấp các giải pháp về Phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp, phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp', '+8586906529151', 'kuhn.melvina@bernhard.com', 'This is my lisence', '22095 Cruickshank Locks Apt. 941\nHaileyshire, AK 17351', 'https://www.fb.me/Anonsn0r4', 'https://www.instagram.com/minhnora98', 'https://www.twitter.com/minhnora98', '1971-10-16 12:18:27', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tasktodos`
--

CREATE TABLE `tasktodos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_do_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_task` datetime NOT NULL,
  `duration` datetime DEFAULT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` datetime NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ranking` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `assigned` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tasktodos`
--

INSERT INTO `tasktodos` (`id`, `title`, `to_do_type`, `start_task`, `duration`, `age`, `deadline`, `note`, `ranking`, `status`, `assigned`, `customer_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cong viec 1', 'Di lam viec quan trong', '2019-01-04 15:42:43', '2018-10-12 20:13:28', '0', '2019-01-25 15:42:43', 'Khách hàng khó tính', 0, 0, 'Tranhomes', 1, '1977-08-12 05:48:35', NULL, NULL),
(2, 'Cong viec 2', 'Di lam viec quan trong', '2019-01-03 15:42:00', '2018-03-10 20:44:23', '6', '2019-01-09 15:42:00', '<p>Khách hàng khó tính</p>', 0, 1, 'Tranhomes', 2, '2012-01-15 08:36:51', '2018-12-26 10:30:44', NULL),
(3, 'Cong viec 3', 'Di lam viec quan trong', '2018-12-29 15:42:43', '2018-03-13 14:50:39', '0', '2019-01-13 15:42:43', 'Khách hàng khó tính', 0, 0, 'Tranhomes', 3, '2012-01-30 20:21:43', '2018-12-26 10:27:12', '2018-12-26 10:27:12'),
(4, 'Cong viec 4', 'Di lam viec quan trong', '2018-12-29 15:42:43', '2018-08-06 23:00:23', '0', '2019-01-25 15:42:43', 'Khách hàng khó tính', 0, 0, 'Tranhomes', 4, '1973-12-15 13:18:10', '2018-12-26 10:27:07', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `status_active` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `gender`, `phone`, `address`, `position`, `birthday`, `comment`, `email`, `password`, `status`, `status_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Nora', 1, '01667998642', 'Ha Dong, Ha Noi, Viet Nam', 1, '1998/01/30', 'Developer at 3F Group', 'admin@gmail.com', '$2y$10$mVDmqPqHv8TAXXIANF.8Megg.UuMu0DjHPGjxvwg7IPtgUPh7fdYa', 1, 1, NULL, '2018-12-26 08:42:35', NULL),
(2, 'member', 'Duc', 0, '01667998642', 'Ha Dong, Ha Noi, Viet Nam', 2, '1998/01/30', 'Developer at 3F Group', 'member@gmail.com', '$2y$10$AUzTX5oolA9F9Ej06Rp/seogwND6nUJDlg2D9camn6VqdKw1Vud1u', 0, 1, NULL, '2018-12-26 08:42:35', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `aboutuses`
--
ALTER TABLE `aboutuses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Chỉ mục cho bảng `customer_notes`
--
ALTER TABLE `customer_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_notes_customer_id_index` (`customer_id`);

--
-- Chỉ mục cho bảng `customer_task_to_dos`
--
ALTER TABLE `customer_task_to_dos`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `header_footers`
--
ALTER TABLE `header_footers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `houses_user_id_index` (`user_id`),
  ADD KEY `houses_user_update_index` (`user_update`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_house_id_index` (`house_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `page_details`
--
ALTER TABLE `page_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `page_freecashes`
--
ALTER TABLE `page_freecashes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `page_indices`
--
ALTER TABLE `page_indices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partners_user_update_index` (`user_update`);

--
-- Chỉ mục cho bảng `partner_notes`
--
ALTER TABLE `partner_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partner_notes_partner_id_index` (`partner_id`);

--
-- Chỉ mục cho bảng `partner_task_to_dos`
--
ALTER TABLE `partner_task_to_dos`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `partner_views`
--
ALTER TABLE `partner_views`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `set_ups`
--
ALTER TABLE `set_ups`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tasktodos`
--
ALTER TABLE `tasktodos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasktodos_customer_id_index` (`customer_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `aboutuses`
--
ALTER TABLE `aboutuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `customer_notes`
--
ALTER TABLE `customer_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `customer_task_to_dos`
--
ALTER TABLE `customer_task_to_dos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `header_footers`
--
ALTER TABLE `header_footers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;

--
-- AUTO_INCREMENT cho bảng `page_details`
--
ALTER TABLE `page_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `page_freecashes`
--
ALTER TABLE `page_freecashes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `page_indices`
--
ALTER TABLE `page_indices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `partner_notes`
--
ALTER TABLE `partner_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `partner_task_to_dos`
--
ALTER TABLE `partner_task_to_dos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `partner_views`
--
ALTER TABLE `partner_views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `set_ups`
--
ALTER TABLE `set_ups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tasktodos`
--
ALTER TABLE `tasktodos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `customer_notes`
--
ALTER TABLE `customer_notes`
  ADD CONSTRAINT `customer_notes_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `houses`
--
ALTER TABLE `houses`
  ADD CONSTRAINT `houses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `houses_user_update_foreign` FOREIGN KEY (`user_update`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `partners_user_update_foreign` FOREIGN KEY (`user_update`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `partner_notes`
--
ALTER TABLE `partner_notes`
  ADD CONSTRAINT `partner_notes_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tasktodos`
--
ALTER TABLE `tasktodos`
  ADD CONSTRAINT `tasktodos_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
