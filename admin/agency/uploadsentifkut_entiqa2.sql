-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 08, 2023 at 07:59 AM
-- Server version: 10.5.20-MariaDB-cll-lve-log
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `entifkut_entiqa2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_prev` int(11) NOT NULL COMMENT '1 : الادمن \r\n2: فريق الخدمة \r\n3 : المدرب\r\n',
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`, `admin_email`, `admin_prev`, `cat_name`) VALUES
(1, 'admin', 'SHA256,MD5,Salt,BCRYPT/BLOWFISH,ARGON2ID tZbE$em&G%2^b7_f3T+mQ]y}*9}NXZjSPKKTsBKFUrKYE9h9QvKkVtKN-jM5[c>%du6j(y!&sg2eDQH.pJ.XpQfHrngsXg♠4C7C♫S@wg%=}$ryh7{⚡%>*g84E)xGuH.a,2f56d4160755fcf38f5b424bd2cd8cc599e96578d98ec0799fffd8cba7554502,aacd19d9d4dee67fe745', 'sup.web07@gmail.com', 1, ''),
(2, 'admin2', 'aW1>B1M.4d&P$rbyv71C:@a6Z7~`\\8WtR)M@:~o2pa9q*{y>lj', 'Saherkhayat@hotmail.com', 2, ''),
(3, 'admin3', 'admin3', 'mohamedramadan2930@outlook.com', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `batch_id` int(11) NOT NULL,
  `batch_name` varchar(255) NOT NULL,
  `batch_coach` varchar(255) NOT NULL,
  `batch_start` varchar(255) NOT NULL,
  `batch_min` varchar(255) NOT NULL,
  `batch_max` varchar(255) NOT NULL,
  `batch_created_at` varchar(255) NOT NULL,
  `ind_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`batch_id`, `batch_name`, `batch_coach`, `batch_start`, `batch_min`, `batch_max`, `batch_created_at`, `ind_num`) VALUES
(5, 'الدفعة المجانيه ', '8', '2023-06-22', '5', '10', '', 3),
(6, 'دفعة التجريبيه ', '8', '2023-06-22', '1', '2', '', 2),
(7, 'الدفعه الاخيرة', '8', '2023-08-13', '5', '5', '', 1),
(8, 'الدفعة الاولى', '8', '2023-08-01', '15', '2', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `batches_notification`
--

CREATE TABLE `batches_notification` (
  `id` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `cosh` int(11) DEFAULT NULL,
  `ind` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batches_notification`
--

INSERT INTO `batches_notification` (`id`, `batch`, `cosh`, `ind`, `status`) VALUES
(34, 6, NULL, 165, 1),
(35, 5, NULL, 171, 1),
(36, 7, NULL, 171, 1),
(37, 0, NULL, 171, 1),
(38, 6, NULL, 165, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `from_person` varchar(255) NOT NULL,
  `to_person` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `msg_files` longtext DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `send_type` varchar(100) DEFAULT NULL,
  `admin_noti` int(11) NOT NULL DEFAULT 0,
  `ind_noti` int(11) NOT NULL DEFAULT 0,
  `com_noti` int(11) NOT NULL DEFAULT 0,
  `coash_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `from_person`, `to_person`, `msg`, `msg_files`, `date`, `send_type`, `admin_noti`, `ind_noti`, `com_noti`, `coash_id`) VALUES
(266, 'samsung_1', 'khloud', 'السلام عليكم', '', '2023-08-08', 'com', 1, 1, 0, 0),
(267, 'samsung_1', 'khloud', 'كيف حالك خلود؟', '', '2023-08-08', 'com', 1, 1, 0, 0),
(268, 'khloud', 'samsung_1', 'وعليكم السلام ورحمه الله وبركاته', '', '2023-08-08', 'ind', 1, 0, 1, 0),
(269, 'khloud', 'samsung_1', 'تمام الحمدالله', '', '2023-08-08', 'ind', 1, 0, 1, 0),
(270, 'admin', '', 'مرحبا سارة تشرفنا بستجيلك معانا', ',', '2023-08-09', 'admin', 1, 1, 1, 0),
(271, 'admin', '', 'مرحبا سارة', ',', '2023-08-09', 'admin', 1, 1, 1, 0),
(272, 'admin', '', 'مرحبا انسة سارة', ',', '2023-08-09', 'admin', 1, 1, 1, 0),
(273, 'admin', '', 'مرحبا انسة سارة', ',', '2023-08-09', 'admin', 1, 1, 1, 0),
(274, 'admin', 'khloud', 'اهلا خلود', ',', '2023-08-09', 'admin', 1, 1, 1, 0),
(275, 'admin', 'samsung_1', 'السلام عليكم', ',', '2023-08-09', 'admin', 1, 1, 1, 0),
(276, 'admin', '', 'السلام عليكم', ',', '2023-08-09', 'admin', 1, 1, 1, 0),
(277, 'admin', 'khalid cars', 'السلام عليكم', ',', '2023-08-09', 'admin', 1, 1, 1, 0),
(278, 'admin', '', 'سلام عليكم عزيزتي سارة ', ',', '2023-08-09', 'admin', 1, 1, 1, 0),
(279, 'admin', '', 'سلام عليكم ', ',', '2023-08-09', 'admin', 1, 1, 1, 0),
(280, 'admin', '', 'سلام عليكم ', ',', '2023-08-09', 'admin', 1, 1, 1, 0),
(281, 'admin', '', 'مرحبا سارة', ',', '2023-08-09', 'admin', 1, 1, 1, 0),
(282, 'admin', 'khalid cars', 'سلام عليكم ', ',', '2023-08-09', 'admin', 1, 1, 1, 0),
(283, 'admin', '', 'السلام عليكم\r\n', ',', '2023-08-09', 'admin', 1, 1, 1, 0),
(284, 'admin', 'hanouf', 'السلام عليكم', ',', '2023-08-10', 'admin', 1, 1, 1, 0),
(285, 'admin', '', 'السلام عليكم\r\n', ',', '2023-08-10', 'admin', 1, 1, 1, 0),
(286, 'admin', '', 'مرحبا عزيزتي شهد حياك الله معانا ', ',', '2023-08-10', 'admin', 1, 1, 1, 0),
(287, 'admin', 'شهد', 'السلام عليكم', ',', '2023-08-10', 'admin', 1, 1, 1, 0),
(288, 'شهد', 'admin', 'وعليكم السلام', '', '2023-08-10', 'ind', 1, 0, 1, 0),
(289, 'samsung_1', 'admin', 'وعليكم السلام', '', '2023-08-10', 'com', 1, 0, 0, 0),
(290, 'admin', 'thelastone', 'السلام عليكم اي اخبارك سارة\r\n', ',', '2023-08-10', 'admin', 1, 1, 1, 0),
(291, 'khloud', 'admin', 'اهلين فيكم', '', '2023-08-10', 'ind', 1, 0, 1, 0),
(292, 'admin', 'شهد', 'مرحبا ', ',', '2023-08-10', 'admin', 1, 1, 1, 0),
(293, 'شهد', 'admin', 'هلا\r\n', '', '2023-08-10', 'ind', 1, 0, 1, 0),
(294, 'شهد', 'admin', 'هلا\r\n', '', '2023-08-10', 'ind', 1, 0, 1, 0),
(295, 'شهد', 'admin', 'بطيء جداً ويبيله تعديل على ايقونة الاشعار مايبين \r\n', '', '2023-08-10', 'ind', 1, 0, 1, 0),
(296, 'admin', 'شهد', 'راح ارسل لك عقد للدفع ', 'عقدوساطةلتوظيفمتدربين.pdf,', '2023-08-10', 'admin', 1, 1, 1, 0),
(297, 'admin', 'samsung_1', 'كيف حالك؟', ',', '2023-08-10', 'admin', 1, 1, 1, 0),
(298, 'samsung_1', 'admin', 'تمام الحمدالله', '', '2023-08-10', 'com', 1, 0, 0, 0),
(299, 'admin', 'شهد', 'بعد التوقيع عزيزتي راح يكون عندك ايقونة الدفع بعد الدفع ارسلي لنا ايصال الدفع وراح يتم تفعيل عضويتك وانضمامك الى دفعة التدريب مع المدرب ', ',', '2023-08-10', 'admin', 1, 1, 1, 0),
(300, 'شهد', 'admin', 'تمام, تفضلي العقد', 'عقدوساطةلتوظيفمتدربين.pdf,', '2023-08-10', 'ind', 1, 0, 1, 0),
(301, 'شهد', 'admin', 'هلا', '', '2023-08-10', 'ind', 1, 0, 1, 0),
(302, 'شهد', 'admin', 'تفضلي', 'عقدوساطةلتوظيفمتدربين.pdf,', '2023-08-10', 'ind', 1, 0, 1, 0),
(303, 'شهد', 'admin', 'كيفكم', 'care4.pdf,', '2023-08-10', 'ind', 1, 0, 1, 0),
(304, 'شهد', 'admin', 'الفكرة انو لازم لما ترفع مرفق لازم تحط عنوان مناسب للمرفق\r\n#م.محمود', 'care4.pdf,', '2023-08-10', 'ind', 1, 0, 1, 0),
(305, 'شهد', 'admin', 'ايقونة المرفق نفسها تعلق ماتشتغل مباشرة يلزم تحديث الصفحه والخروج والدخول ', '', '2023-08-10', 'ind', 1, 0, 1, 0),
(306, 'cup_2023', 'khloud', 'السلام عليكم', '', '2023-08-10', 'com', 1, 1, 0, 0),
(307, 'admin', 'شهد', 'عزيزتي ارسلي صورة من فاتورة الدفع ', ',', '2023-08-10', 'admin', 1, 1, 1, 0),
(308, 'شهد', 'admin', 'مايقبل يرفع صيغة غير الPDF الصيغ الاخرى لا استطيع ارفاقها', '', '2023-08-10', 'ind', 1, 0, 1, 0),
(309, 'admin', '', '؟', ',', '2023-08-10', 'admin', 1, 1, 1, 0),
(310, 'شهد', 'admin', 'سلام ', '', '2023-08-10', 'ind', 1, 0, 1, 0),
(311, 'admin', 'شهد', 'مرحبا ', ',', '2023-08-10', 'admin', 1, 1, 1, 0),
(312, 'admin', '', 'سلام ', ',', '2023-08-10', 'admin', 1, 1, 1, 0),
(313, 'admin', 'شهد', 'تمت اضافتك في الدفعة التجريبية وسيتم التواصل معك عن طريق المدرب في اقرب وقت لتزويدك بملف الدورة ومحتوياته والتواريخ لجميع الحصص والاختبارات \r\nنتمنى لك التوفيق ولا تتردد بالتواصل معنا لأي استفسار \r\n\r\n\r\n', ',', '2023-08-11', 'admin', 1, 1, 1, 0),
(314, 'شهد', 'admin', 'شكراً لكم ', '', '2023-08-11', 'ind', 1, 0, 1, 0),
(315, 'coash', 'شهد', 'السلام عليكم ورحمة الله وبركاته \r\n\r\nارحب بالجميع في منصة انتقاء التي سوف تضيف لكم الكثير بإذن الله الى مهاراتكم وخبراتكم المهنية \r\nانا المدرب عبدالله راح اكون مدربكم خلال رحلتكم معنا في انتقاء ونسأل الله انه ينفع بنا وبكم \r\n\r\nتم ارفاق ملف لـ محتويات الدور', ',', '2023-08-11', 'coash', 1, 1, 0, 8),
(316, 'coash', 'شهد', 'السلام عليكم ورحمة الله وبركاته ارحب بالجميع في منصة انتقاء \r\nمعاكم المدرب عبدالله وراح اكون مدربكم خلال رحلتكم في انتقاء \r\nتم ارفاق ملف بجميع محتويات الدورة والتواريخ والاوقات لجميع الحصص والاختبارات \r\nفي حال وجود اي استفسار لا تترددون بالتواصل معي او مع', ',', '2023-08-11', 'coash', 1, 1, 0, 8),
(317, 'coash', 'شهد', 'السلام عليكم  ارحب بالجميع في منصة انتقاء معاكم المدرب عبدالله وراح اكون مدربكم خلال رحلتكم في انتقاء تم ارفاق ملف بجميع محتويات الدورة  والتواريخ لجميع الحصص والاختبارات في حال وجود اي استفسار لا تترددون بالتواصل معي او مع فريق الخدمة', ',', '2023-08-11', 'coash', 1, 1, 0, 8),
(318, 'coash', 'شهد', 'السلام عليكم   ارحب بالجميع في منصة انتقاء معاكم المدرب عبدالله وراح اكون مدربكم خلال رحلتكم في انتقاء تم ارفاق ملف بجميع محتويات الدورة  في حال وجود اي استفسار لا تترددون بالتواصل معي او مع فريق الخدمة\r\nتحياتي', ',', '2023-08-11', 'coash', 1, 1, 0, 8),
(319, 'coash', 'شهد', 'السلام عليكم ورحمة الله وبركاته \r\nارحب بالجميع في منصة انتقاء. \r\n', ',', '2023-08-11', 'coash', 1, 1, 0, 8),
(320, 'coash', 'شهد', 'معاكم المدرب عبدالله وراح اكون معاكم طوال رحلتكم في منصة انتقاء \r\nاللي راح تضيف لكم الكثير ان شاء الله في مسيرتكم المهنية للمبيعات ', ',', '2023-08-11', 'coash', 1, 1, 0, 8),
(321, 'coash', 'شهد', ' تم ارفاق ملف بجميع محتويات الدورة والتواريخ والاوقات لجميع الحصص والاختبارات\r\nوراح يوصلكم رابط الدخول للحصة قبل بدايتها ب عشر دقائق لتفادي اي مشاكل بالدخول \r\n', ',', '2023-08-11', 'coash', 1, 1, 0, 8),
(322, 'coash', 'شهد', ' في حال وجود اي استفسار لا تترددون بالتواصل معي او مع فريق الخدمة \r\nتحياتي', ',', '2023-08-11', 'coash', 1, 1, 0, 8),
(324, 'admin', 'Alrajhi_Bank', 'اهلا بكم في منصة انتقاء', ',', '2023-08-11', 'admin', 1, 1, 1, 0),
(325, 'Alrajhi_Bank', 'admin', 'حياكم الله , ممكن شرح طريقة الدفع ؟ ', '', '2023-08-11', 'com', 1, 1, 0, 0),
(326, 'admin', 'Alrajhi_Bank', 'يتم تحميل  العقد الموجود في صفحتك , ومن ثم ارسالها لنا - ومن ثم شحن المبلغ الموجودة ايضا بالمنصة ', ',', '2023-08-11', 'admin', 1, 1, 1, 0),
(327, 'Alrajhi_Bank', 'شهد', 'مرحبا اخت شهد ', '', '2023-08-11', 'com', 1, 1, 0, 0),
(328, 'شهد', 'Alrajhi_Bank', 'اهلاً ', '', '2023-08-11', 'ind', 1, 0, 1, 0),
(329, 'Alrajhi_Bank', 'شهد', 'اعجبنا تقيمك وحابين نعمل معاك مقابلة ', '', '2023-08-11', 'com', 1, 1, 0, 0),
(330, 'شهد', 'Alrajhi_Bank', 'متى حابين واي وقت ؟ ', '', '2023-08-11', 'ind', 1, 0, 1, 0),
(331, 'Alrajhi_Bank', 'شهد', 'راح نختار الوقت المناسب لك ونرسل لك رابط اللوكيشن ', '', '2023-08-11', 'com', 1, 1, 0, 0),
(332, 'شهد', 'Alrajhi_Bank', 'تمام بإنتظاركم ', '', '2023-08-11', 'ind', 1, 0, 1, 0),
(333, 'شهد', 'Alrajhi_Bank', 'وصلني الموعد لكن ممكن ترسلون الموقع؟ ', '', '2023-08-11', 'ind', 1, 0, 1, 0),
(334, 'Alrajhi_Bank', 'شهد', 'https://www.google.com/maps/search/%D9%85%D9%88%D9%82%D8%B9+%D8%A7%D9%84%D8%B1%D8%A7%D8%AC%D8%AD%D9%8A%E2%80%AD/@24.1578572,47.3602469,13z/data=!3m1!4b1?entry=ttu', '', '2023-08-11', 'com', 1, 1, 0, 0),
(335, 'Alrajhi_Bank', 'شهد', 'بانتظارك باذن الله على الموعد ', '', '2023-08-11', 'com', 1, 1, 0, 0),
(336, 'Alrajhi_Bank', 'admin', 'نعم .... شكرا لكم', '', '2023-08-12', 'com', 1, 1, 0, 0),
(337, 'admin', '', 'السلام عليكم ... كيف حال', ',', '2023-08-12', 'admin', 1, 1, 1, 0),
(338, 'admin', '', 'السلام عليكم', ',', '2023-08-12', 'admin', 1, 1, 1, 0),
(339, 'admin', '', 'السلام عليكم', ',', '2023-08-12', 'admin', 1, 1, 1, 0),
(340, 'admin', '', 'السلام عليكم', ',', '2023-08-12', 'admin', 1, 1, 1, 0),
(341, 'admin', '', 'السلام عليكم', ',', '2023-08-12', 'admin', 1, 1, 1, 0),
(342, 'admin', '', 'السلام عليكم', ',', '2023-08-12', 'admin', 1, 1, 1, 0),
(343, 'admin', '', 'hi', ',', '2023-08-12', 'admin', 1, 1, 1, 0),
(344, 'admin', '', 'السلام عليكم', ',', '2023-08-12', 'admin', 1, 1, 1, 0),
(345, 'admin', '', 'hi', ',', '2023-08-12', 'admin', 1, 1, 1, 0),
(346, 'admin', 'Watan', 'السلام عليكم', ',', '2023-08-12', 'admin', 1, 1, 1, 0),
(347, 'admin', 'Helloo', 'السلام عليكم', ',', '2023-08-12', 'admin', 1, 1, 1, 0),
(348, 'admin', 'Remot', 'كيف الحال', ',', '2023-08-12', 'admin', 1, 1, 1, 0),
(349, 'admin', 'Noura_2023', 'سلام عليكم ', ',', '2023-08-12', 'admin', 1, 1, 1, 0),
(350, 'admin', 'Noura_2023', 'اهلا فيك استاذة نورة ', ',', '2023-08-12', 'admin', 1, 1, 1, 0),
(351, 'Noura_2023', 'admin', 'وعليكم السلام ', '', '2023-08-12', 'ind', 1, 0, 1, 0),
(352, 'admin', 'Noura_2023', 'عزيزتي لأستكمال التسجيل للدورة يرجى توقيع العقد وارفاقه ومن ثم الدفع ليتم تفعيل حسابك ', 'عقدتدريبعبرشبكةالانترنت.pdf,', '2023-08-12', 'admin', 1, 1, 1, 0),
(353, 'Noura_2023', 'admin', 'تفضلي\r\n', '74198800-F85E-4C9C-9F7F-A7EF3F68091F.pdf,', '2023-08-12', 'ind', 1, 0, 1, 0),
(354, 'coash', 'Noura_2023', 'مرحبا بكم جميعا ', ',', '2023-08-12', 'coash', 1, 1, 0, 8),
(355, 'Yamaha_School', 'Noura_2023', 'سلام عليكم ', '', '2023-08-13', 'com', 1, 1, 0, 0),
(356, 'Noura_2023', 'Yamaha_School', 'وعليكم السلام , اطلعت على نشاط الشركة انتم مدرسة موسيقية صحيح ؟ , كيف حيكون دوري معاكم ', '', '2023-08-13', 'ind', 1, 0, 1, 0),
(357, 'Yamaha_School', 'Noura_2023', 'صحيح , حيكون دورك تتواصلي مع العملاء المهتمين بالتعليم وانتي تقنعيهم بالتسجيل وطبعا الداتا حيكون دائما جديد ونحتاج اشخاص محترفين يعرفون يتعاملون مع هذي الارقام ', '', '2023-08-13', 'com', 1, 1, 0, 0),
(358, 'Noura_2023', 'Yamaha_School', 'تمام موافقه ', '', '2023-08-13', 'ind', 1, 0, 1, 0),
(359, 'Yamaha_School', 'Noura_2023', 'حنرسل لك عمل مقابلة شخصية وراح نحدد الموعد ', '', '2023-08-13', 'com', 1, 1, 0, 0),
(360, 'admin', 'Yamaha_School', 'مرحبا', ',', '2023-08-15', 'admin', 1, 0, 1, 0),
(361, 'Yamaha_School', 'admin', 'اهلا بكم ', '', '2023-08-15', 'com', 1, 0, 0, 0),
(362, 'admin', 'Yamaha_School', '؟كيف حالك', ',', '2023-08-17', 'admin', 1, 0, 1, 0),
(363, 'admin', 'Yamaha_School', '؟كيف حالك', ',', '2023-08-17', 'admin', 1, 0, 1, 0),
(364, 'admin', 'Yamaha_School', '؟كيف حالك هه', ',', '2023-08-17', 'admin', 1, 0, 1, 0),
(365, 'admin', 'Yamaha_School', 'لسلام ', ',', '2023-08-26', 'admin', 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coash_notification`
--

CREATE TABLE `coash_notification` (
  `id` int(11) NOT NULL,
  `ind_id` int(11) NOT NULL,
  `noti_desc` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `noti_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `coash_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `coash_notification`
--

INSERT INTO `coash_notification` (`id`, `ind_id`, `noti_desc`, `status`, `noti_date`, `coash_id`) VALUES
(1, 127, 'انتهاء اختبار ', 0, '2023-06-17 21:00:00', NULL),
(2, 127, 'انتهاء اختبار ', 1, '2023-06-17 21:00:00', 2),
(3, 127, 'انتهاء اختبار ', 0, '2023-06-18 21:00:00', NULL),
(4, 127, 'انتهاء اختبار ', 0, '2023-06-18 21:00:00', NULL),
(5, 136, 'انتهاء اختبار ', 1, '2023-06-22 04:00:00', 8),
(6, 136, 'انتهاء اختبار ', 1, '2023-07-03 04:00:00', 8),
(7, 165, 'انتهاء اختبار ', 1, '2023-08-11 04:00:00', 8),
(8, 171, 'انتهاء اختبار ', 1, '2023-08-13 04:00:00', 8);

-- --------------------------------------------------------

--
-- Table structure for table `company_register`
--

CREATE TABLE `company_register` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(255) NOT NULL,
  `com_name_en` varchar(255) NOT NULL,
  `com_username` varchar(255) NOT NULL,
  `com_email` varchar(255) NOT NULL,
  `com_phone` varchar(100) DEFAULT NULL,
  `com_image` varchar(255) DEFAULT NULL,
  `com_password` varchar(255) NOT NULL,
  `com_num` varchar(255) NOT NULL,
  `com_active` varchar(255) NOT NULL,
  `com_place` varchar(255) NOT NULL,
  `com_braches` varchar(255) NOT NULL,
  `com_founded` varchar(255) NOT NULL,
  `com_work_h` varchar(255) NOT NULL,
  `com_work_libs` varchar(255) NOT NULL,
  `com_weekend_num` varchar(100) NOT NULL,
  `com_work_type` varchar(255) NOT NULL,
  `com_salary` varchar(100) NOT NULL,
  `com_commission` varchar(100) NOT NULL,
  `com_info` longtext DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `com_status` varchar(255) NOT NULL DEFAULT '0',
  `com_confirm` varchar(255) NOT NULL DEFAULT '0',
  `com_balance` varchar(255) NOT NULL DEFAULT '0',
  `com_updated` int(11) NOT NULL DEFAULT 0,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `active_status` int(11) DEFAULT 0,
  `active_status_code` varchar(300) DEFAULT NULL,
  `order_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_register`
--

INSERT INTO `company_register` (`com_id`, `com_name`, `com_name_en`, `com_username`, `com_email`, `com_phone`, `com_image`, `com_password`, `com_num`, `com_active`, `com_place`, `com_braches`, `com_founded`, `com_work_h`, `com_work_libs`, `com_weekend_num`, `com_work_type`, `com_salary`, `com_commission`, `com_info`, `code`, `com_status`, `com_confirm`, `com_balance`, `com_updated`, `start_date`, `active_status`, `active_status_code`, `order_number`) VALUES
(1, 'Mohamed Ramadan', 'lamar', 'Mohamed ', 'mr319242@gmail.com', NULL, NULL, '11111111', '1222133655add', 'التجارة الالكترونية', 'القاهرة', 'دمنعور', '2022', 'من 8 صباحا الي 8 مساءا', '2', '2', ' عمل ميداني ', '1000', '100', NULL, NULL, '1', '0', '0', 1, '2023-06-10 07:35:18', 0, '25ce309213fdc26a27eaeb6d38004991', NULL),
(2, 'samsung', 'samsung', 'samsung_1', 'orang_2023@outlook.sa', '', '1691534792_Samsung-Logo.jpg', 'hanouf5501562', '11005874765', 'تكنلوجيا', 'USA', 'جميع مناطق العالم ', '1995', ' و من الساعه 7 صباحا حتى الـ4 مساءً - من الساعه 12 ظهرا حتى الثامنه مساءً', '2 ', 'يوم واحد ', ' عمل ميداني ', '7000', '50%', 'نحن شركة رائدة في عالم التكنلوجيا والصناعه ونسعى في استقطاب مميزين للانضمام في الفريق معنا \r\n', NULL, '1', '1', '9900', 1, '2023-06-10 07:48:30', 0, '60701d43819f5d5aba610b0f58eff99a', NULL),
(3, 'Cup', 'كوب', 'cup_2023', 'cup_2023@outlook.sa', '', '1691534587_contact.jpg', 'hanouf5501562', '11005874765', 'منتج اكواب معدنيه', 'جده', 'الرياض وجده الشرقيه', '2012', ' و من الساعه 7 صباحا حتى الـ4 مساءً - من الساعه 12 ظهرا حتى الثامنه مساءً', '2', 'يوم واحد ', ' عمل مكتبي ', '7000', '50%', '', NULL, '1', '0', '900', 1, '2023-06-13 20:20:18', 0, '70a410c53ddf561db37df04d8e636908', NULL),
(5, 'hassan', 'com', 'lamar', 'mohamedramadan2930@gmail.com', NULL, NULL, '123456789', '1222133655add', 'نمةن', 'qw', 'دمنعور', '2022', 'من 8 صباحا الي 8 مساءا', '2', '2', ' عمل مكتبي ', '1000', '2%', NULL, NULL, '1', '0', '0', 1, '2023-06-20 21:26:11', 0, 'db5e616e0a33a51b8c3430a0a915addf', NULL),
(6, 'موبايل', 'mobile', 'mobile', 'mobile_2023@outlook.sa', NULL, NULL, 'hanouf5501562', '11005874765', 'تكنلوجيا', 'جده', 'الرياض وجده الشرقيه', '1990', ' و من الساعه 7 صباحا حتى الـ4 مساءً - من الساعه 12 ظهرا حتى الثامنه مساءً', '2 ', 'يوم واحد ', ' عمل ميداني ', '7000', '50%', NULL, NULL, '0', '0', '0', 1, '2023-06-21 00:57:33', 0, '59a2810c26a67257917b09ba2d6b4121', NULL),
(7, 'ايفون', 'iphone', 'iphone_2023', 'iphone_2023@outlook.sa', NULL, NULL, 'hanouf5501562', '11005874765', 'تكنلوجيا', 'جده', 'الرياض وجده الشرقيه', '1990', ' و من الساعه 7 صباحا حتى الـ4 مساءً - من الساعه 12 ظهرا حتى الثامنه مساءً', '2 ', 'يوم واحد ', ' عمل مكتبي ', '7000', '50%', NULL, NULL, '0', '0', '0', 1, '2023-06-21 01:02:01', 0, '000d156086ebb1f8295e757d10eba394', NULL),
(8, 'شركة تيبل العالميه', 'table international company', 'TABLE', 'table_2023@outlook.sa', NULL, NULL, 'hanouf5501562', '1100587458', 'الكترونيه ', 'جده', 'الرياض وجده الشرقيه', '1990', ' و من الساعه 7 صباحا حتى الـ4 مساءً - من الساعه 12 ظهرا حتى الثامنه مساءً', '2 ', 'يوم واحد ', ' عمل مكتبي ', '4550', '50%', NULL, NULL, '0', '0', '0', 1, '2023-07-10 17:47:31', 0, '11758bffe99bdd9814b7005b99bd5cad', NULL),
(9, 'تيبل العالميه ', 'table international company', 'TABLE_2023', 'tt_2023@outlook.sa', NULL, NULL, 'hanouf5501562', '1100587458', 'الكترونيه ', 'جده', 'الرياض وجده الشرقيه', '1990', ' و من الساعه 7 صباحا حتى الـ4 مساءً - من الساعه 12 ظهرا حتى الثامنه مساءً', '2 ', 'يوم واحد ', ' عمل مكتبي ', '4550', '50%', NULL, NULL, '0', '0', '0', 1, '2023-07-10 18:03:45', 0, '2dc61b4b2138c2d18abdc6975a4ce5db', NULL),
(10, 'محمود', 'mahmoud', 'mamhoud', 'mamhoudabuha@gmail.com', NULL, NULL, '123456789', '1000231', 'تجاري', 'الرياض', '1', '2011', '2', '2', '2', ' عمل مكتبي ', '1000$', '10$', NULL, NULL, '0', '0', '0', 1, '2023-08-08 20:52:58', 0, '1033d20dd033b6c1bbb1a8a1f216c347', NULL),
(11, 'محمود', 'mahmoud', 'Ahmed', 'wrtegerr20gefg@gmail.com', NULL, NULL, '123456789', '1000231', 'تجاري', 'زلفي', '1', '2011', '2', '2', '2', ' عمل مكتبي ', '1000$', '10$', NULL, NULL, '0', '0', '0', 1, '2023-08-08 20:54:52', 0, '9e53f757b9b297a17bd9b0b0bfb7b814', NULL),
(12, 'mahmoud', 'mahmoud', 'ali', 'rafikabuhs1999@gmail.com', NULL, NULL, '123456789', '1000231', 'تجاري', 'عنيزة', '1', '2011', '2', '2', '2', ' عمل ميداني ', '1100$', '20$', NULL, NULL, '0', '0', '0', 1, '2023-08-08 21:07:09', 0, 'f9887eef770b79f46382cf7bfb5b6dc3', NULL),
(20, 'شركة الاضائات الوطنيه', 'the light company', 'The light', 'the_light@outlook.sa', NULL, NULL, 'hanouf5501562', '11005874765', 'الكترونيه ', 'جدة', 'جميع مناطق العالم ', '1990', ' و من الساعه 7 صباحا حتى الـ4 مساءً - من الساعه 12 ظهرا حتى الثامنه مساءً', '2', 'يوم واحد ', ' عمل ميداني ', '7000', '50%', NULL, NULL, '0', '0', '0', 1, '2023-08-09 11:37:42', 0, '5ab4c7f36f76de265c3553ae54e8f825', NULL),
(21, 'شركة النوتات الرقمية', 'the note company', 'the note', 'hhk471920@gmail.com', NULL, NULL, 'hanouf5501562', '11005874765', 'تكنلوجيا', 'جدة', 'جميع مناطق العالم ', '1990', ' و من الساعه 7 صباحا حتى الـ4 مساءً - من الساعه 12 ظهرا حتى الثامنه مساءً', '2', 'يوم واحد ', ' عمل ميداني ', '7000', '50%', NULL, NULL, '0', '0', '0', 1, '2023-08-09 11:56:50', 0, 'd4c67e83bd66c3b20865c66f736b8d80', NULL),
(25, 'hanouf', 'hanoufcomp', 'hanouf', 'work47283@gmail.com', NULL, NULL, '123456789', '1010101', 'hanoufc', 'مكة', '2', '2019', '12', '2', '2', ' عمل ميداني ', '1000', '200', NULL, NULL, '0', '0', '0', 1, '2023-08-09 12:48:36', 0, 'b5ccc69a99a3616c7de28b2c8f60f78d', NULL),
(26, 'cars company', 'cars company', 'khalid cars', 'ka5456676@gmail.com', NULL, NULL, '5501562', '1100111', 'cars', 'الرياض', '3', '1995', '2', '2', '2', ' عمل ميداني ', '2', '222', NULL, '16932', '0', '0', '0', 1, '2023-08-09 12:55:45', 0, '53092efabb22a181c1f04447ba7a2f44', NULL),
(28, 'comadd', 'comadd', 'ahmeedd', 'sup.web07@gmail.com', NULL, NULL, '123456789', '1025888', 'com', 'زلفي', '2', '2022', '2', '2', '2', ' عمل مكتبي ', '2222', '200', NULL, NULL, '0', '0', '0', 1, '2023-08-10 20:31:11', 0, 'e2d02e79cd4448e7e7bcd35b525b41c3', NULL),
(29, 'بنك الراجحي', 'Alrajhi Bank', 'Alrajhi_Bank', 'jhra07519@gmail.com', '966532982054', '1691780773_ON7gVwpe_400x400.jpg', 'hanouf5501562', '1100587458', 'مصرفي', 'الرياض', 'الرياض وجده الشرقيه', '1990', ' و من الساعه 7 صباحا حتى الـ4 مساءً - من الساعه 12 ظهرا حتى الثامنه مساءً', '2 ', 'يوم واحد ', ' عمل ميداني ', '4550', '50%', '', NULL, '1', '0', '-948', 1, '2023-08-11 18:55:57', 0, 'ee2eebc9f049556ee33c85410bbcefcb', NULL),
(30, 'مدرسة ياما للموسيقى ', 'Yamaha music school', 'Yamaha_School', 'the_note2023@outlook.com', '', '1691871217_gallery_angle_front_black__50834.1473481420.500.659__65081.jpg', 'hanouf5501562', '1100587458', 'تعليم موسيقى', 'الرياض', 'الرياض وجده الشرقيه', '1990', ' و من الساعه 7 صباحا حتى الـ4 مساءً - من الساعه 12 ظهرا حتى الثامنه مساءً', '2 ', 'يوم واحد ', ' عمل مكتبي ', '4550', '50%', 'مدرسة موسيقية للتعليم  جميع انواع الموسيقى ', NULL, '1', '0', '-949', 1, '2023-08-12 20:10:30', 0, 'd85c5716d671135079ef6e82db128fd3', NULL),
(31, 'e', 'e', 'test', 'ss@gmai.l.com', NULL, NULL, '123456', '6556', '5444444444444', 'الرياض', 's', '474747474758', 'sss', 'sss', 'sss', ' عمل ميداني ', '11xxxxxxxxx', 'sss', NULL, NULL, '0', '0', '0', 1, '2023-09-06 07:35:09', 0, '2a70ba77ae628e31552ccb34ff12c2e7', NULL),
(32, 'esss', 'esss', 'testsss', 'ssnn@gmai.l.com', NULL, NULL, '123456', '6556', '5444444444444', 'زلفي', 's', '474747474758', 'sss', 'sss', 'sss', ' عمل مكتبي ', '11xxxxxxxxx', 'sss', NULL, NULL, '0', '0', '0', 1, '2023-09-06 07:36:26', 0, '592bb11e2e9b5c518e01d1f27341677f', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_review`
--

CREATE TABLE `company_review` (
  `rev_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `com_review` longtext NOT NULL,
  `rev_show` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_review`
--

INSERT INTO `company_review` (`rev_id`, `com_id`, `com_review`, `rev_show`, `date`) VALUES
(1, 14, 'sdsddf', 1, '2022-12-22 00:00:00'),
(2, 18, ' تقيم جيد جدا ', 0, '2023-04-10 17:17:36'),
(3, 30, 'اعجبني ولي العودة بالتأكيد ', 1, '2023-08-26 06:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `admin_noti` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`con_id`, `first_name`, `last_name`, `email`, `mobile`, `message`, `date`, `admin_noti`) VALUES
(1, 'mohamed', 'ramadan', 'mr319242@gmail.com', '', 'السلام عليكم ورحمة الله', '', 1),
(2, 'mohamed', 'ramadan', 'mr319242@gmail.com', '', 'السلام عليكم ورحمة الله', '', 1),
(3, 'mohamed', 'ramadan', 'mr319242@gmail.com', '', '4ص5ص', '', 1),
(5, 'hassan', '', '', '', '', '', 1),
(6, 'الهنوف', 'سعد', 'alhanouf.alqhtani@hotmail.com', '', 'سلام عليكم\r\n تم الدفع للمنصة ولم يتم التفعيل ولا التواصل ', '', 1),
(8, 'خالد ', 'عبدالله', 'khalid.abdallaj@hotmail.com', '0532982054', 'السلام عليكم ممكن احد يتواصل معاي حاب استفسر', '', 1),
(9, 'Raleigh Godley', 'Raleigh Godley', 'raleigh.godley@gmail.com', '260-403-5290', '���� Attention music lovers! ����\r\n\r\nWow, All the best Sax Summer music  !!!\r\n\r\n�� Spotify: https://open.spotify.com/artist/6ShcdIT7rPVVaFEpgZQbUk\r\n�� Apple Music: https://music.apple.com/fr/artist/jimmy-sax-black/1530501936\r\n�� YouTube: https://music.you', '', 0),
(10, '', '', '', '', '', '', 0),
(11, '', '', '', '', '', '', 0),
(12, '', '', '', '', '', '', 0),
(13, '', '', '', '', '', '', 0),
(14, '', '', '', '', '', '', 0),
(15, '', '', '', '', '', '', 0),
(16, '', '', '', '', '', '', 0),
(17, '', '', '', '', '', '', 0),
(18, '', '', '', '', '', '', 0),
(19, '', '', '', '', '', '', 0),
(20, '', '', '', '', '', '', 0),
(21, '', '', '', '', '', '', 0),
(22, '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contract_cancel`
--

CREATE TABLE `contract_cancel` (
  `con_cancel_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `ind_id` int(11) NOT NULL,
  `cancel_reason` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `sender` int(11) NOT NULL DEFAULT 0,
  `recieve` int(11) NOT NULL DEFAULT 0,
  `update_at` varchar(300) NOT NULL DEFAULT '0',
  `cancel_com_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_complete`
--

CREATE TABLE `contract_complete` (
  `con_com_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `ind_id` int(11) NOT NULL,
  `con_com_price` varchar(255) NOT NULL,
  `con_com_date` datetime NOT NULL DEFAULT current_timestamp(),
  `sender` int(11) DEFAULT NULL,
  `recieve` int(11) DEFAULT NULL,
  `update_at` varchar(200) NOT NULL DEFAULT '0',
  `con_com_admin` int(11) NOT NULL DEFAULT 0,
  `ind_noti` int(11) NOT NULL DEFAULT 0,
  `com_noti` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contract_complete`
--

INSERT INTO `contract_complete` (`con_com_id`, `company_id`, `ind_id`, `con_com_price`, `con_com_date`, `sender`, `recieve`, `update_at`, `con_com_admin`, `ind_noti`, `com_noti`) VALUES
(24, 2, 131, '100', '2023-06-11 07:06:27', NULL, NULL, '23-06-11', 1, 0, 0),
(25, 3, 136, '100', '2023-06-26 15:28:04', NULL, NULL, '23-06-26', 1, 0, 0),
(26, 29, 165, '950', '2023-08-11 18:01:06', NULL, NULL, '23-08-11', 1, 0, 0),
(27, 30, 171, '950', '2023-08-13 07:08:05', NULL, NULL, '23-08-13', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coshes`
--

CREATE TABLE `coshes` (
  `co_id` int(11) NOT NULL,
  `co_name` varchar(255) NOT NULL,
  `co_password` varchar(255) NOT NULL,
  `co_phone` varchar(255) NOT NULL,
  `co_email` varchar(255) NOT NULL,
  `co_services` varchar(255) NOT NULL,
  `co_exper` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coshes`
--

INSERT INTO `coshes` (`co_id`, `co_name`, `co_password`, `co_phone`, `co_email`, `co_services`, `co_exper`) VALUES
(1, 'المدرب الاول  بعد التعديل', 'new', '01011642731', 'mr319242@gmail.com', 'مقدم خدمات ', '4'),
(2, 'orshe', 'orshe', '01011642731', 'mr319242@gmail.com', 'مقدم خدمات ', '8'),
(3, 'new', 'new', '100000100', 'بسلايب', 'ds', '10'),
(4, 'mai', 'mai', '1111', 'mai@gmail.com', 'تدريب ', '10'),
(5, 'أحمد حسين ', '5501562', '', 'newnew_2023@outlook.com', '', '5'),
(6, 'أحمد حسين ', '5501562', '', 'newnew_2023@outlook.com', '', '5'),
(7, 'hassan', 'hassan', '01011642731', 'mr319242@gmail.com', 'مقدم خدمات ', '4'),
(8, 'Abdallah', 'hanouf5501562', '+966532982054', 'abdalla@gmail.com', 'مبيعات ', '5'),
(9, 'Coach_Ahmad', '5501562', '0500054342', 'remot_2023@outlook.com', 'مدرب مبيعات', '10'),
(10, 'mahmoud ahmed', '123456789', '0105677745', 'mmm@gmail.com', '2', '200'),
(11, 'mahmoud ahmed', '123456789', '0105677745', 'mmm@gmail.com', '2', '200'),
(12, 'mahmoud ahmed', '123456789', '0105677745', 'mmm@gmail.com', '2', '200'),
(13, 'mahmoud ahmed', '123456789', '0105677745', 'mmm@gmail.com', '2', '200'),
(14, 'احمد', '123456', '012323123', 'ِasfkdg@gmail.com', '2', '300');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `ex_id` int(11) NOT NULL,
  `ex_title` varchar(255) NOT NULL,
  `ex_total_question` varchar(100) NOT NULL,
  `ex_time` varchar(100) NOT NULL,
  `ex_date_publish` varchar(255) NOT NULL,
  `ex_desc` text DEFAULT NULL,
  `ex_type` varchar(200) NOT NULL,
  `ex_batch_num` varchar(200) NOT NULL,
  `coash_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ex_id`, `ex_title`, `ex_total_question`, `ex_time`, `ex_date_publish`, `ex_desc`, `ex_type`, `ex_batch_num`, `coash_id`) VALUES
(13, 'الاختبار التجريبي ', '5', '10', '2023-06-08', 'للتجربه ', 'قصير', '5', NULL),
(16, 'الاختبار النهائي ', '6', '1', '2023-06-11', 'اختبار نهائي للطلاب المرحلة الاولى ', 'نهائي', '5', NULL),
(23, 'الاختبار الثاني ', '2', '10', '2023-06-19', NULL, 'نهائي', '5', NULL),
(27, 'الاختبار الاول ', '2', '3', '2023-06-19', NULL, 'قصير', '5', NULL),
(30, 'الاختبار الاول ', '2', '10', '2023-06-21', NULL, 'قصير', '-- اختر رقم الدفعه --', 7),
(34, 'أختبار  كيفية تحديد عميلك و فهم مشاكله. ', '3', '15', '2023-08-11', NULL, 'قصير', '6', 8),
(35, 'مبادئ مبيعات', '2', '5', '2023-08-13', NULL, 'قصير', '7', 8),
(36, 'مبادئ مبيعات', '1', '1', '2023-08-15', NULL, 'قصير', '-- اختر رقم الدفعه --', 8),
(37, 'اختبار قصير', '10', '5', '2023-08-20', NULL, 'قصير', '-- اختر رقم الدفعه --', NULL),
(38, 'r', '4', '4', '2023-08-22', NULL, 'نهائي', '6', 3);

-- --------------------------------------------------------

--
-- Table structure for table `exam_noti`
--

CREATE TABLE `exam_noti` (
  `id` int(11) NOT NULL,
  `ex_id` int(11) NOT NULL,
  `ind_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ind_congrat`
--

CREATE TABLE `ind_congrat` (
  `id` int(11) NOT NULL,
  `ind_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ind_congrat`
--

INSERT INTO `ind_congrat` (`id`, `ind_id`, `name`, `description`, `status`, `date`) VALUES
(1, 130, 'تأهيل', ' مبروك تم تأهيلك معنا في المنصة , يمكنك مشاهدة النتائج في صفحتك مع الشهادة المستحقة المرفقه لديك  ', 0, '2023-06-19 16:19:41'),
(2, 127, 'تأهيل', ' مبروك تم تأهيلك معنا في المنصة , يمكنك مشاهدة النتائج في صفحتك مع الشهادة المستحقة المرفقه لديك  ', 1, '2023-06-19 16:20:34'),
(3, 136, 'تأهيل', ' مبروك تم تأهيلك معنا في المنصة , يمكنك مشاهدة النتائج في صفحتك مع الشهادة المستحقة المرفقه لديك  ', 1, '2023-07-03 07:59:24'),
(4, 165, 'تأهيل', ' مبروك تم تأهيلك معنا في المنصة , يمكنك مشاهدة النتائج في صفحتك مع الشهادة المستحقة المرفقه لديك  ', 1, '2023-08-11 16:36:47'),
(5, 171, 'تأهيل', ' مبروك تم تأهيلك معنا في المنصة , يمكنك مشاهدة النتائج في صفحتك مع الشهادة المستحقة المرفقه لديك  ', 1, '2023-08-13 10:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `ind_register`
--

CREATE TABLE `ind_register` (
  `ind_id` int(11) NOT NULL,
  `ind_username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ind_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ind_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ind_birthdate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ind_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ind_phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ind_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ind_nationality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ind_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ind_gender` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ind_transfer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ind_english` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ind_sub_exam` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ind_final_exam` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ind_exer_exam` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ind_attend` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ind_degree_percen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ind_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ind_status_show` int(11) NOT NULL DEFAULT 0,
  `ind_status2` int(11) NOT NULL DEFAULT 0,
  `ind_emp` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ind_review`
--

CREATE TABLE `ind_review` (
  `rev_id` int(11) NOT NULL,
  `ind_id` int(11) NOT NULL,
  `ind_review` longtext NOT NULL,
  `rev_show` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interview_notificaion`
--

CREATE TABLE `interview_notificaion` (
  `noti_id` int(11) NOT NULL,
  `noti_title` varchar(255) NOT NULL,
  `noti_person_link` varchar(255) NOT NULL,
  `noti_com_link` varchar(255) NOT NULL,
  `interview_date` varchar(255) NOT NULL,
  `interview_time` varchar(255) NOT NULL,
  `sender` int(11) NOT NULL DEFAULT 0,
  `recieve` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` varchar(255) NOT NULL DEFAULT '0',
  `inter_admin_noti` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interview_notificaion`
--

INSERT INTO `interview_notificaion` (`noti_id`, `noti_title`, `noti_person_link`, `noti_com_link`, `interview_date`, `interview_time`, `sender`, `recieve`, `created_at`, `update_at`, `inter_admin_noti`) VALUES
(18, '  طلب مقابلة شخصية ', '128', '3', '2023-07-11', '23:21', 0, 0, '2023-07-11 17:21:27', '23-08-14', 0),
(19, '  طلب مقابلة شخصية ', '130', '3', '2023-06-22', '12:24', 0, 0, '2023-07-11 17:21:54', '0', 0),
(20, '  طلب مقابلة شخصية ', '127', '3', '2023-08-23', '13:35', 0, 0, '2023-08-10 18:31:25', '0', 0),
(21, '  طلب مقابلة شخصية ', '165', '29', '2023-08-11', '11:35', 0, 0, '2023-08-11 19:35:48', '23-08-12', 0),
(22, '  طلب مقابلة شخصية ', '171', '30', '2023-08-13', '14:09', 0, 0, '2023-08-13 11:07:21', '23-08-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ques_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `ques_ques` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ques_id`, `exam_id`, `ques_ques`) VALUES
(8, 4, 'السوال الثاني'),
(9, 5, 'السوال الثاني'),
(10, 5, 'ماهي لغه php'),
(11, 5, 'السوال الثاني'),
(12, 8, 'السوال الاول '),
(13, 8, 'السوال الثاني'),
(14, 8, 'السوال الثالث'),
(15, 10, 'السوال الاول '),
(16, 10, 'السوال الثاني'),
(17, 10, 'السوال الثالث'),
(18, 13, 'السوال الاول '),
(19, 13, 'السوال الثاني '),
(20, 12, 'السوال الاول '),
(21, 12, 'السوال الثاني'),
(22, 12, 'السوال الثالث'),
(24, 13, 'ماهي الوان الاشارة المروة'),
(25, 13, '5 + 5 '),
(28, 16, 'ناتج 3*3'),
(29, 16, 'حاصل ناتيج 1+1'),
(30, 25, 'first q'),
(31, 25, 'السوال الثاني '),
(32, 28, 'السوال الثاني '),
(33, 29, 'السوال الثاني '),
(34, 30, 'ماهي لغه  php '),
(36, 31, 'كم عدد السعرات الحرارية الطبيعية التي يأكلها الانسان في اليوم '),
(37, 31, 'كم عدد ايام السنه ؟'),
(38, 31, 'كم عدد ايام الاسبوع '),
(41, 0, 'من اين صنعت اول قهوه في العالم'),
(42, 0, 'ماهي الوان الاشارة الثلاثة'),
(43, 0, 'كم سم في المتر '),
(44, 34, 'عندما يكون العميل زائراً كيف ستحدد  اذا كان عميل محتمل ام غير محتمل '),
(45, 34, 'عندما يطرح العميل اسئلة كيف ستتعامل معه'),
(46, 34, 'عندما يخبرك العميل بانه محتاراً للشراء '),
(47, 35, 'كيف تساعد العميل في احتياجة'),
(48, 35, 'كيف تتعامل مع عميل متردد'),
(49, 36, 'متى ولد النبي'),
(50, 38, 'كم عدد حبات الرمل؟');

-- --------------------------------------------------------

--
-- Table structure for table `question_option`
--

CREATE TABLE `question_option` (
  `option_id` int(11) NOT NULL,
  `option_text` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL,
  `is_right` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_option`
--

INSERT INTO `question_option` (`option_id`, `option_text`, `question_id`, `is_right`) VALUES
(45, 'a', 12, 1),
(46, 'b', 12, 0),
(47, 'c', 12, 0),
(48, 'd', 12, 0),
(49, 'ش', 13, 0),
(50, 'لا', 13, 0),
(51, 'ؤ', 13, 1),
(52, 'ي', 13, 0),
(53, 'ahmed', 14, 0),
(54, 'mohamed', 14, 0),
(55, 'ali', 14, 0),
(56, 'hassan', 14, 1),
(57, 'a', 15, 0),
(58, 'b', 15, 0),
(59, 'c', 15, 0),
(60, 'd', 15, 1),
(61, 'a', 16, 0),
(62, 'b', 16, 0),
(63, 'c', 16, 1),
(64, 'd', 16, 0),
(65, 'a', 17, 0),
(66, 'b', 17, 0),
(67, 'c', 17, 0),
(68, 'd', 17, 1),
(69, 'a', 18, 0),
(70, 'b', 18, 0),
(71, 'c', 18, 0),
(72, 'd', 18, 1),
(73, 'a', 19, 0),
(74, 'b', 19, 0),
(75, 'c', 19, 1),
(76, 'd', 19, 0),
(77, 'a', 20, 0),
(78, 'b', 20, 0),
(79, 'c', 20, 1),
(80, 'd', 20, 0),
(81, 'a', 21, 1),
(82, 'b', 21, 0),
(83, 'c', 21, 0),
(84, 'd', 21, 0),
(85, 'a', 22, 0),
(86, 'b', 22, 0),
(87, 'c', 22, 0),
(88, 'd', 22, 1),
(93, 'اصفر احمر ازرق', 24, 0),
(94, 'اصفر احمر اخضر', 24, 1),
(95, 'اصفر اخضر ازرق', 24, 0),
(96, 'احمر اخضر  ابيض ', 24, 0),
(97, 'الناتيج 10 ', 25, 1),
(98, 'الناتج 11', 25, 0),
(99, 'الناتج 21', 25, 0),
(100, 'الناتج 3', 25, 0),
(105, 'جدة', 26, 0),
(106, 'الرياض', 26, 1),
(107, 'الدمام', 26, 0),
(108, 'الباحة', 26, 0),
(109, '4', 26, 0),
(110, '5', 26, 0),
(111, '6', 26, 1),
(112, '9', 26, 1),
(113, '2', 29, 1),
(114, '5', 29, 0),
(115, '6', 29, 1),
(116, '9', 29, 1),
(117, 'a', 30, 0),
(118, 'b', 30, 0),
(119, 'cd', 30, 0),
(120, 'd', 30, 1),
(121, 'الاخيار الاول ', 31, 0),
(122, 'الاخيار الثاني ', 31, 0),
(123, 'الاخيار الثالث', 31, 0),
(124, 'الاخيار الرابع ', 31, 1),
(125, 's', 32, 0),
(126, 'd', 32, 0),
(127, 's', 32, 0),
(128, 'f', 32, 1),
(129, 'ي', 33, 0),
(130, 'ب', 33, 0),
(131, 'يب', 33, 0),
(132, 'بي', 33, 1),
(133, 'هي لغة برمجة ويب ومواقع الكترونية ', 34, 1),
(134, 'هي برمجة تطبيقات الموبايل ', 34, 0),
(135, 'لغه برمجة ديسك ', 34, 0),
(136, 'يبابخابابع9ا', 34, 0),
(141, '2000 سعره ', 36, 0),
(142, '3500 سعره ', 36, 0),
(143, 'حسب وزنه ', 36, 1),
(144, 'حسب طولة ', 36, 0),
(145, '365', 37, 1),
(146, '255', 37, 0),
(147, '328', 37, 0),
(148, '335', 37, 0),
(149, '11', 38, 0),
(150, '12', 38, 0),
(151, '7', 38, 1),
(152, '6', 38, 0),
(161, 'اليمن ', 41, 1),
(162, 'أثيوبيا', 41, 0),
(163, 'كولومبيا', 41, 0),
(164, 'الصين', 41, 0),
(165, 'احمر اخضر   اصفر', 42, 1),
(166, 'احمر ابيض بنفسجي', 42, 0),
(167, 'احمر ازرق اصفر', 42, 0),
(168, 'احمر اصفر برتقالي', 42, 0),
(169, '150 سم ', 43, 0),
(170, '200 سم', 43, 0),
(171, '100سم', 43, 1),
(172, '140 سم ', 43, 0),
(173, 'اطرح اسئلة التحليلية لكي لا اضيع وقتي مع العميل', 44, 1),
(174, 'احاول اقناعه وتشويقة للمنتج ', 44, 0),
(175, 'اتركه لوحده يأتي ويسأل ', 44, 0),
(176, 'ارحب به واكون علاقة معه ', 44, 0),
(177, 'اجيب على الاسئلة فقط', 45, 0),
(178, 'استمع لمشكلته اولا لايجاد حل يناسب رغبته', 45, 1),
(179, 'اشرح له تفاصيل المنتج ولا اجعله يذهب حتى يقتنع ', 45, 0),
(180, 'اجعله يجرب المنتج او الخدمة فوراً ليقرر الشراء ', 45, 0),
(181, 'اطرح اسئلة التي تجعله متردد ومحتار لأيجاد حلاً لها ليطمئن بعد الشراء', 46, 1),
(182, 'اتركة ولا اضيع وقتا معه ', 46, 0),
(183, 'اجعله ياخذ عينه يجربها ليقرر لاحقا ', 46, 0),
(184, 'اخذ رقمة للتواصل عندما يؤكد القرار ', 46, 0),
(185, 'اسئلة ماذا يحتاج', 47, 0),
(186, 'اسئلة عن البدجت ', 47, 0),
(187, 'اتركة يختار وينظر بنفسة', 47, 0),
(188, 'اسمع مايريد', 47, 1),
(189, 'اقنعه فورا ولا اجعله يزداد توترا', 48, 0),
(190, 'اعطية خيارات افضل واساعدة ', 48, 1),
(191, 'اتركة يقرر ', 48, 0),
(192, 'اتابع مايريد', 48, 0),
(193, 'عام الفيل', 49, 1),
(194, 'قبل الميلاد ', 49, 0),
(195, '1250 هجري', 49, 0),
(196, '1250', 49, 0),
(197, 'عدد لا نهائي', 50, 1),
(198, '100مليار', 50, 0),
(199, '3مليار', 50, 0),
(200, '500مليون', 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_team`
--

CREATE TABLE `service_team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `service_team`
--

INSERT INTO `service_team` (`id`, `name`, `email`, `password`) VALUES
(2, 'mohamed', 'mohamedramadan2930@gmail.com', '123456789'),
(6, 'mamhoud service', 'mmabuhassira@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `ind_subscribe` varchar(100) NOT NULL DEFAULT '1',
  `company_subscribe` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `ind_subscribe`, `company_subscribe`) VALUES
(2, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `with_method` varchar(255) NOT NULL,
  `with_price` varchar(200) NOT NULL,
  `with_email` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `with_status` int(11) NOT NULL DEFAULT 0,
  `with_admin_noti` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `batches_notification`
--
ALTER TABLE `batches_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `coash_notification`
--
ALTER TABLE `coash_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ind_exam` (`ind_id`),
  ADD KEY `coash_exam` (`coash_id`);

--
-- Indexes for table `company_register`
--
ALTER TABLE `company_register`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `company_review`
--
ALTER TABLE `company_review`
  ADD PRIMARY KEY (`rev_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `contract_cancel`
--
ALTER TABLE `contract_cancel`
  ADD PRIMARY KEY (`con_cancel_id`);

--
-- Indexes for table `contract_complete`
--
ALTER TABLE `contract_complete`
  ADD PRIMARY KEY (`con_com_id`);

--
-- Indexes for table `coshes`
--
ALTER TABLE `coshes`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `exam_noti`
--
ALTER TABLE `exam_noti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ind_congrat`
--
ALTER TABLE `ind_congrat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ind_cong` (`ind_id`);

--
-- Indexes for table `ind_review`
--
ALTER TABLE `ind_review`
  ADD PRIMARY KEY (`rev_id`);

--
-- Indexes for table `interview_notificaion`
--
ALTER TABLE `interview_notificaion`
  ADD PRIMARY KEY (`noti_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ques_id`),
  ADD KEY `ques_exam` (`exam_id`);

--
-- Indexes for table `question_option`
--
ALTER TABLE `question_option`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `ques_option` (`question_id`);

--
-- Indexes for table `service_team`
--
ALTER TABLE `service_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `batches_notification`
--
ALTER TABLE `batches_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT for table `coash_notification`
--
ALTER TABLE `coash_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company_register`
--
ALTER TABLE `company_register`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `company_review`
--
ALTER TABLE `company_review`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contract_cancel`
--
ALTER TABLE `contract_cancel`
  MODIFY `con_cancel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contract_complete`
--
ALTER TABLE `contract_complete`
  MODIFY `con_com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `coshes`
--
ALTER TABLE `coshes`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `exam_noti`
--
ALTER TABLE `exam_noti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ind_congrat`
--
ALTER TABLE `ind_congrat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ind_review`
--
ALTER TABLE `ind_review`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `interview_notificaion`
--
ALTER TABLE `interview_notificaion`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `ques_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `question_option`
--
ALTER TABLE `question_option`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `service_team`
--
ALTER TABLE `service_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coash_notification`
--
ALTER TABLE `coash_notification`
  ADD CONSTRAINT `coash_exam` FOREIGN KEY (`coash_id`) REFERENCES `coshes` (`co_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ind_exam` FOREIGN KEY (`ind_id`) REFERENCES `ind_register` (`ind_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ind_congrat`
--
ALTER TABLE `ind_congrat`
  ADD CONSTRAINT `ind_cong` FOREIGN KEY (`ind_id`) REFERENCES `ind_register` (`ind_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
