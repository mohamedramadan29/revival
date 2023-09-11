-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 02:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revivals`
--

-- --------------------------------------------------------

--
-- Table structure for table `addition_section`
--

CREATE TABLE `addition_section` (
  `add_id` int(11) NOT NULL,
  `add_name` varchar(255) NOT NULL,
  `add_name_en` varchar(255) NOT NULL,
  `add_desc` longtext NOT NULL,
  `add_desc_en` longtext NOT NULL,
  `add_sub_desc` longtext NOT NULL,
  `add_sub_desc_en` longtext NOT NULL,
  `event_page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addition_section`
--

INSERT INTO `addition_section` (`add_id`, `add_name`, `add_name_en`, `add_desc`, `add_desc_en`, `add_sub_desc`, `add_sub_desc_en`, `event_page`) VALUES
(3, 'لماذا مدينة الذكاء الاصطناعي والواقع الافتراضي AIVR', 'Why AIVR City?', 'لأنها مدينة تستثمر في المواهب والمعرفة لتطوير وصناعة إبتكارات وتقنيات في المجالات المختلفة في الذكاء الاصطناعي لاستخدامها في عالم الميتافيرس من خلال نخبة من المواهب في العالم العربي والإسلامي والتي تعمل على رسم مستقبل الميتافيرس في العالم الإسلامي والعربي', 'Because it is a city that invests in talents and knowledge to develop and manufacture innovations and technologies in various fields of artificial intelligence for use in the world of metavirs through a selection of talents in the Arab and Islamic world that works to draw the future of metaverses in the Islamic and Arab world', '', '', 'الذكاء الإصطناعي'),
(4, 'الرؤيا المستقبلية', 'future vision', 'نقل الواقع الحقيقي بمؤسساته وتقنياته من الواقع الافتراضي لعالم الميتافيرس بطريقة إبداعية تحاكي الواقع لمواكبة التطور العالمي\r\n\r\nالميتافيرس عالم من الحقيقة بين عينيك', 'Transferring the real reality with its institutions and technologies from the virtual reality to the world of metavirs in a creative way that simulates reality to keep pace with global development\r\n\r\nMetaverse is a world of truth between your eyes', '', '', 'الذكاء الإصطناعي'),
(5, 'الأنشطة الرئيسية', 'main activities', '', '', 'تطوير تقنيات الذكاء الاصطناعي ,\r\n دعم الأبحاث لابتكار مشاريع وتقنيات في مجال الذكاء الإصطناعي والميتافيرس ,\r\n استثمار المواهب وتطوير خبراتهم لتحويلها إلى مشاريع عالمية ,\r\n تطوير مشروع مدينة الذكاء الاصطناعي والواقع ع الافتراض ,\r\n تنفيذ فعالية إبداعية ومبتكرة في مجال الذكاء الاصطناعي والميتافيرس ,', 'development of artificial intelligence techniques,\r\n  Supporting research to create projects and technologies in the field of artificial intelligence and metaviruses,\r\n  Investing talents and developing their expertise to transform them into global projects,\r\n  The development of the project of the city of artificial intelligence and virtual reality,\r\n  Implementing a creative and innovative event in the field of artificial intelligence and metavirus,', 'الذكاء الإصطناعي'),
(6, 'المجالات التي سيتم تطوير أجهزة وتقنيات في الذكاء الاصطناعي', 'Areas in which artificial intelligence devices and technologies will be developed', '', '', ' الطب ,\r\n الصناعات ,\r\n النقل ,\r\n الالكترونيات ,\r\n الهندسة المعمارية ,\r\n التقنية ,', 'Medicine ,\r\n  industries ,\r\n  Transport ,\r\n  electronics ,\r\n  architecture ,\r\n  Technology ,', 'الذكاء الإصطناعي');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_title_en` varchar(255) NOT NULL,
  `article_desc` longtext NOT NULL,
  `article_desc_en` longtext NOT NULL,
  `article_category` varchar(255) NOT NULL,
  `article_date` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_title`, `article_title_en`, `article_desc`, `article_desc_en`, `article_category`, `article_date`, `image1`, `image2`) VALUES
(1, 'مقال جديد في الذكاء الاصطناعي', 'first article in artificial', ' هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص الذين لا يدركون بأن السعادة لا بد أن نستشعرها بصورة أكثر عقلانية ومنطقية فيعرضهم هذا لمواجهة الظروف الأليمة، وأكرر بأنه لا يوجد من يرغب في الحب ونيل المنال ويتلذذ بالآلام، الألم هو الألم ولكن نتيجة لظروف ما قد تكمن السعاده فيما نتحمله من كد وأسي.', 'Generate Lorem Ipsum placeholder text. Select the number of characters, words, sentences or paragraphs, and hit generate!', 'art_int', '', '23888067.ai.png', '88720394.ai_logo.png'),
(2, 'المقال الاول في الموضة', 'first article in fashion', '   هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص الذين لا يدركون بأن السعادة لا بد أن نستشعرها بصورة أكثر عقلانية ومنطقية فيعرضهم هذا لمواجهة الظروف الأليمة، وأكرر بأنه لا يوجد من يرغب في الحب ونيل المنال ويتلذذ بالآلام، الألم هو الألم ولكن نتيجة لظروف ما قد تكمن السعاده فيما نتحمله من كد وأسي. \r\n\r\n<li>  النقطة الاولي  </li>\r\n<li>  النقطة الاولي  </li>\r\n<li>  النقطة الاولي  </li>', ' Generate Lorem Ipsum placeholder text. Select the number of characters, words, sentences or paragraphs, and hit generate!', 'fashion', '', '90781244.course_image_overlay.jpg', '23280981.course_image_overlay.jpg'),
(3, 'لااى ثقفاى ثقفى ثقى ', 'The importance of our services', 'e-0 u0guugeu joureg0u9vduj0wuvu ', 'poo09bu90lmjaub0du j0gu0u9i j0ufg90 ij0eu09bv', 'art_int', '', '63941407.ai.png', '4156367.ai_logo.png'),
(4, 'لااى ثقفاى ثقفى ثقى ', 'The importance of our services', 'e-0 u0guugeu joureg0u9vduj0wuvu ', 'poo09bu90lmjaub0du j0gu0u9i j0ufg90 ij0eu09bv', 'art_int', '', '63991148.ai.png', '20487081.ai_logo.png'),
(5, 'لااى ثقفاى ثقفى ثقى ', 'The importance of our services', 'e-0 u0guugeu joureg0u9vduj0wuvu ', 'poo09bu90lmjaub0du j0gu0u9i j0ufg90 ij0eu09bv', 'art_int', '', '91846147.ai.png', '2860141.ai_logo.png'),
(6, 'لااى ثقفاى ثقفى ثقى ', 'The importance of our services', 'e-0 u0guugeu joureg0u9vduj0wuvu ', 'poo09bu90lmjaub0du j0gu0u9i j0ufg90 ij0eu09bv', 'art_int', '', '93081622.ai.png', '56718299.ai_logo.png'),
(7, 'لااى ثقفاى ثقفى ثقى ', 'The importance of our services', '5435', '35456y', 'art_int', '', '58217155.back2.png', '79672050.back1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artificial_event_register`
--

CREATE TABLE `artificial_event_register` (
  `reg_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `files` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `event_id` varchar(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `trasnaction_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `sport_reservation` varchar(255) NOT NULL,
  `train_reservation` varchar(255) NOT NULL,
  `all_day_reservation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artificial_event_register`
--

INSERT INTO `artificial_event_register` (`reg_id`, `first_name`, `last_name`, `email`, `mobile`, `country`, `files`, `user_status`, `event_id`, `payment_mode`, `trasnaction_id`, `price`, `sport_reservation`, `train_reservation`, `all_day_reservation`) VALUES
(9, 'lamar', 'mohamed ramadan', 'mr319242@gmail.com', '01011642731', 'EG', '', '', '4', 'pay with paypal', '25E17018YF990173H', '400', '', '', ''),
(10, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', '', '', '4', 'pay with paypal', '1YS79210M88901740', '300', '<br />\n<b>Warning</b>:  Undefined variable $sport_reservation in <b>C:\\xampp\\htdocs\\revival\\event\\main_event\\checkout.php</b> on line <b>161</b><br />\n', '', ''),
(11, 'hassan', 'mohamed', 'mr319242@gmail.com', '01011642731', 'EG', '', '', '4', 'pay with paypal', '7T208570PN1224439', '400', '[', '', ''),
(12, 'shima', 'essam', 'mr319242@gmail.com', '01011642731', 'EG', '', '', '4', 'pay with paypal', '58L48162JU159235C', '100', '[', '', ''),
(13, 'Mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', '', '', '4', 'pay with paypal', '6DT21996C9450423D', '400', '5,13', '', ''),
(14, 'hassan', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', '', '', '4', 'pay with paypal', '3A75036496602701K', '800', '5', '5', '3');

-- --------------------------------------------------------

--
-- Table structure for table `art_register`
--

CREATE TABLE `art_register` (
  `art_register_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `talent_image` varchar(255) NOT NULL,
  `country` varchar(200) NOT NULL,
  `specialist` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `work_field` varchar(255) NOT NULL,
  `field` varchar(255) NOT NULL,
  `sub_field` varchar(255) NOT NULL,
  `register_type` varchar(255) NOT NULL,
  `experience_info` varchar(255) NOT NULL,
  `language_speak` varchar(255) NOT NULL,
  `project_details` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_field` varchar(255) NOT NULL,
  `project_tools` varchar(255) NOT NULL,
  `project_date` varchar(255) NOT NULL,
  `project_design` varchar(300) NOT NULL,
  `project_prototype` varchar(300) NOT NULL,
  `project_video` varchar(300) NOT NULL,
  `project_certificate` varchar(300) NOT NULL,
  `project_competation` varchar(300) NOT NULL,
  `project_prize` varchar(300) NOT NULL,
  `passport_number` varchar(300) NOT NULL,
  `national_id` varchar(300) NOT NULL,
  `certificate_image` varchar(300) NOT NULL,
  `last_certificate` varchar(300) NOT NULL,
  `cv` varchar(300) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` varchar(200) NOT NULL,
  `user_status` varchar(255) NOT NULL DEFAULT '0',
  `user_show` varchar(200) NOT NULL,
  `personal_image` varchar(255) NOT NULL,
  `personal_information` varchar(255) NOT NULL,
  `customer_message` varchar(255) NOT NULL,
  `talent_images` longtext NOT NULL,
  `video1` varchar(255) NOT NULL,
  `video2` varchar(255) NOT NULL,
  `video3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `art_register`
--

INSERT INTO `art_register` (`art_register_id`, `first_name`, `last_name`, `email`, `mobile`, `talent_image`, `country`, `specialist`, `certificate`, `work_field`, `field`, `sub_field`, `register_type`, `experience_info`, `language_speak`, `project_details`, `project_name`, `project_field`, `project_tools`, `project_date`, `project_design`, `project_prototype`, `project_video`, `project_certificate`, `project_competation`, `project_prize`, `passport_number`, `national_id`, `certificate_image`, `last_certificate`, `cv`, `username`, `password`, `code`, `user_status`, `user_show`, `personal_image`, `personal_information`, `customer_message`, `talent_images`, `video1`, `video2`, `video3`) VALUES
(41, 'mohamed', 'essam', 'mohamed@gmail.com', '01011642731', 'Capture.PNG ', 'EG', 'رياضي', '  بكالوريوس  ', '', '9', 'المجال الفرعي الاول ', 'وسيط / منشأة', '   ', '  ', '  ', '', '', '   ', '', '', '', '', '', '  ', '  ', '', '', '', '', '', 'mohamed', '11111111', '', 'active', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `company_register`
--

CREATE TABLE `company_register` (
  `reg_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `talent_image` varchar(255) NOT NULL,
  `country` varchar(200) NOT NULL,
  `specialist` varchar(300) NOT NULL,
  `certificate` varchar(300) NOT NULL,
  `work_field` varchar(300) NOT NULL,
  `field` varchar(200) NOT NULL,
  `sub_field` varchar(200) NOT NULL,
  `experience_info` varchar(300) NOT NULL,
  `language_speak` varchar(300) NOT NULL,
  `project_details` varchar(300) NOT NULL,
  `project_name` varchar(300) NOT NULL,
  `project_field` varchar(300) NOT NULL,
  `project_tools` varchar(300) NOT NULL,
  `project_date` varchar(300) NOT NULL,
  `project_design` varchar(300) NOT NULL,
  `project_prototype` varchar(300) NOT NULL,
  `project_video` varchar(300) NOT NULL,
  `project_certificate` varchar(300) NOT NULL,
  `project_competation` varchar(300) NOT NULL,
  `project_prize` varchar(300) NOT NULL,
  `passport_number` varchar(300) NOT NULL,
  `project_certificate_image` varchar(300) NOT NULL,
  `national_id` varchar(300) NOT NULL,
  `certificate_image` varchar(300) NOT NULL,
  `last_certificate` varchar(300) NOT NULL,
  `cv` varchar(300) NOT NULL,
  `videos` varchar(300) NOT NULL,
  `user_status` varchar(300) NOT NULL,
  `user_show` varchar(200) NOT NULL,
  `personal_information` varchar(300) NOT NULL,
  `customer_message` varchar(300) NOT NULL,
  `team_name` varchar(300) NOT NULL,
  `team_register` varchar(300) NOT NULL,
  `player_weight` varchar(300) NOT NULL,
  `player_position` varchar(300) NOT NULL,
  `player_taller` varchar(300) NOT NULL,
  `video_talent` varchar(300) NOT NULL,
  `fiels_talent` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `talent_images` longtext NOT NULL,
  `video1` varchar(255) NOT NULL,
  `video2` varchar(255) NOT NULL,
  `video3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_register`
--

INSERT INTO `company_register` (`reg_id`, `first_name`, `last_name`, `email`, `mobile`, `talent_image`, `country`, `specialist`, `certificate`, `work_field`, `field`, `sub_field`, `experience_info`, `language_speak`, `project_details`, `project_name`, `project_field`, `project_tools`, `project_date`, `project_design`, `project_prototype`, `project_video`, `project_certificate`, `project_competation`, `project_prize`, `passport_number`, `project_certificate_image`, `national_id`, `certificate_image`, `last_certificate`, `cv`, `videos`, `user_status`, `user_show`, `personal_information`, `customer_message`, `team_name`, `team_register`, `player_weight`, `player_position`, `player_taller`, `video_talent`, `fiels_talent`, `username`, `cat_name`, `talent_images`, `video1`, `video2`, `video3`) VALUES
(42, 'lamar', 'mohamed', 'mr3ffff19242@gmail.com', '1111111', '', '', 'التسجيل في الذكاء الاصطناعي', '  ثانوي  ', '', '', '', 'sdfsfsfsdf sfsf', '', '', '', '', '', '', '', '', '', '', '', '  ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'mohamed', 'art', 'Capture.PNG ', '', 'LearnJavaScriptInArabic2021001IntroductionAndWhatIsJavaScript.mp4', 'LearnJavaScriptInArabic2021005WhereToPutTheCode.mp4'),
(43, 'lamar', 'mohamed', 'mr319ddffs242@gmail.com', '11111', '', '', 'التسجيل في الذكاء الاصطناعي', '  secondary  ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '  ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'mohamed', 'art', 'Capture.PNG ', 'LearnJavaScriptInArabic2021001IntroductionAndWhatIsJavaScript.mp4', '', ''),
(44, 'mohamed ', 'essam', 'mr3192fff42@gmail.com', '111', '', '', 'mr319242@gmail.com', '  secondary  ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', 'hassan', 'sport', 'Capture.PNG ', '', '', ''),
(45, 'lamar', 'mohamed', 'mr3sddaded19242@gmail.com', '1111', '', '', ' dfd', '  ثانوي  ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'dsdf', '', '', '', '', '', '', '', '', 'adminadmin', 'fash', 'Capture.PNG ', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `email_subject` varchar(255) NOT NULL,
  `contact_message` varchar(255) NOT NULL,
  `contact_files` varchar(255) NOT NULL,
  `contact_date` varchar(255) NOT NULL,
  `fiels` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_name`, `contact_email`, `email_subject`, `contact_message`, `contact_files`, `contact_date`, `fiels`) VALUES
(20, 'new ', 'mr319242@gmail.com', 'اخري', 'nnnsnnnnnnnn', '', '2022-10-09 21:14:17', '23043309.macos_mojave_night.png '),
(21, 'محمد رمضان', 'mr319242@gmail.com', ' ريفايفال', 'ytut uyjiuy ', '', '2022-10-09 21:17:20', '2860141.ai_logo.png '),
(22, 'lamar', 'mr319242@gmail.com', ' الرياضة', 'hh', '', '2022-10-19 16:27:00', '7706801.sport3.jpg '),
(23, 'lamar', 'mr319242@gmail.com', ' الرياضة', 'asda', '', '2022-10-19 16:28:29', '7706801.sport3.jpg '),
(24, 'admin', 'mr319242@gmail.com', ' الازياء', '4553e', '', '2022-10-22 04:38:17', 'janna_regular.ttf ');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_enName` varchar(100) NOT NULL DEFAULT '',
  `country_arName` varchar(100) NOT NULL DEFAULT '',
  `country_enNationality` varchar(100) NOT NULL DEFAULT '',
  `country_arNationality` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`) VALUES
('AF', 'Afghanistan', 'أفغانستان', 'Afghan', 'أفغانستاني'),
('AL', 'Albania', 'ألبانيا', 'Albanian', 'ألباني'),
('AX', 'Aland Islands', 'جزر آلاند', 'Aland Islander', 'آلاندي'),
('DZ', 'Algeria', 'الجزائر', 'Algerian', 'جزائري'),
('AS', 'American Samoa', 'ساموا-الأمريكي', 'American Samoan', 'أمريكي سامواني'),
('AD', 'Andorra', 'أندورا', 'Andorran', 'أندوري'),
('AO', 'Angola', 'أنغولا', 'Angolan', 'أنقولي'),
('AI', 'Anguilla', 'أنغويلا', 'Anguillan', 'أنغويلي'),
('AQ', 'Antarctica', 'أنتاركتيكا', 'Antarctican', 'أنتاركتيكي'),
('AG', 'Antigua and Barbuda', 'أنتيغوا وبربودا', 'Antiguan', 'بربودي'),
('AR', 'Argentina', 'الأرجنتين', 'Argentinian', 'أرجنتيني'),
('AM', 'Armenia', 'أرمينيا', 'Armenian', 'أرميني'),
('AW', 'Aruba', 'أروبه', 'Aruban', 'أوروبهيني'),
('AU', 'Australia', 'أستراليا', 'Australian', 'أسترالي'),
('AT', 'Austria', 'النمسا', 'Austrian', 'نمساوي'),
('AZ', 'Azerbaijan', 'أذربيجان', 'Azerbaijani', 'أذربيجاني'),
('BS', 'Bahamas', 'الباهاماس', 'Bahamian', 'باهاميسي'),
('BH', 'Bahrain', 'البحرين', 'Bahraini', 'بحريني'),
('BD', 'Bangladesh', 'بنغلاديش', 'Bangladeshi', 'بنغلاديشي'),
('BB', 'Barbados', 'بربادوس', 'Barbadian', 'بربادوسي'),
('BY', 'Belarus', 'روسيا البيضاء', 'Belarusian', 'روسي'),
('BE', 'Belgium', 'بلجيكا', 'Belgian', 'بلجيكي'),
('BZ', 'Belize', 'بيليز', 'Belizean', 'بيليزي'),
('BJ', 'Benin', 'بنين', 'Beninese', 'بنيني'),
('BL', 'Saint Barthelemy', 'سان بارتيلمي', 'Saint Barthelmian', 'سان بارتيلمي'),
('BM', 'Bermuda', 'جزر برمودا', 'Bermudan', 'برمودي'),
('BT', 'Bhutan', 'بوتان', 'Bhutanese', 'بوتاني'),
('BO', 'Bolivia', 'بوليفيا', 'Bolivian', 'بوليفي'),
('BA', 'Bosnia and Herzegovina', 'البوسنة و الهرسك', 'Bosnian / Herzegovinian', 'بوسني/هرسكي'),
('BW', 'Botswana', 'بوتسوانا', 'Botswanan', 'بوتسواني'),
('BV', 'Bouvet Island', 'جزيرة بوفيه', 'Bouvetian', 'بوفيهي'),
('BR', 'Brazil', 'البرازيل', 'Brazilian', 'برازيلي'),
('IO', 'British Indian Ocean Territory', 'إقليم المحيط الهندي البريطاني', 'British Indian Ocean Territory', 'إقليم المحيط الهندي البريطاني'),
('BN', 'Brunei Darussalam', 'بروني', 'Bruneian', 'بروني'),
('BG', 'Bulgaria', 'بلغاريا', 'Bulgarian', 'بلغاري'),
('BF', 'Burkina Faso', 'بوركينا فاسو', 'Burkinabe', 'بوركيني'),
('BI', 'Burundi', 'بوروندي', 'Burundian', 'بورونيدي'),
('KH', 'Cambodia', 'كمبوديا', 'Cambodian', 'كمبودي'),
('CM', 'Cameroon', 'كاميرون', 'Cameroonian', 'كاميروني'),
('CA', 'Canada', 'كندا', 'Canadian', 'كندي'),
('CV', 'Cape Verde', 'الرأس الأخضر', 'Cape Verdean', 'الرأس الأخضر'),
('KY', 'Cayman Islands', 'جزر كايمان', 'Caymanian', 'كايماني'),
('CF', 'Central African Republic', 'جمهورية أفريقيا الوسطى', 'Central African', 'أفريقي'),
('TD', 'Chad', 'تشاد', 'Chadian', 'تشادي'),
('CL', 'Chile', 'شيلي', 'Chilean', 'شيلي'),
('CN', 'China', 'الصين', 'Chinese', 'صيني'),
('CX', 'Christmas Island', 'جزيرة عيد الميلاد', 'Christmas Islander', 'جزيرة عيد الميلاد'),
('CC', 'Cocos (Keeling) Islands', 'جزر كوكوس', 'Cocos Islander', 'جزر كوكوس'),
('CO', 'Colombia', 'كولومبيا', 'Colombian', 'كولومبي'),
('KM', 'Comoros', 'جزر القمر', 'Comorian', 'جزر القمر'),
('CG', 'Congo', 'الكونغو', 'Congolese', 'كونغي'),
('CK', 'Cook Islands', 'جزر كوك', 'Cook Islander', 'جزر كوك'),
('CR', 'Costa Rica', 'كوستاريكا', 'Costa Rican', 'كوستاريكي'),
('HR', 'Croatia', 'كرواتيا', 'Croatian', 'كوراتي'),
('CU', 'Cuba', 'كوبا', 'Cuban', 'كوبي'),
('CY', 'Cyprus', 'قبرص', 'Cypriot', 'قبرصي'),
('CW', 'Curaçao', 'كوراساو', 'Curacian', 'كوراساوي'),
('CZ', 'Czech Republic', 'الجمهورية التشيكية', 'Czech', 'تشيكي'),
('DK', 'Denmark', 'الدانمارك', 'Danish', 'دنماركي'),
('DJ', 'Djibouti', 'جيبوتي', 'Djiboutian', 'جيبوتي'),
('DM', 'Dominica', 'دومينيكا', 'Dominican', 'دومينيكي'),
('DO', 'Dominican Republic', 'الجمهورية الدومينيكية', 'Dominican', 'دومينيكي'),
('EC', 'Ecuador', 'إكوادور', 'Ecuadorian', 'إكوادوري'),
('EG', 'Egypt', 'مصر', 'Egyptian', 'مصري'),
('SV', 'El Salvador', 'إلسلفادور', 'Salvadoran', 'سلفادوري'),
('GQ', 'Equatorial Guinea', 'غينيا الاستوائي', 'Equatorial Guinean', 'غيني'),
('ER', 'Eritrea', 'إريتريا', 'Eritrean', 'إريتيري'),
('EE', 'Estonia', 'استونيا', 'Estonian', 'استوني'),
('ET', 'Ethiopia', 'أثيوبيا', 'Ethiopian', 'أثيوبي'),
('FK', 'Falkland Islands (Malvinas)', 'جزر فوكلاند', 'Falkland Islander', 'فوكلاندي'),
('FO', 'Faroe Islands', 'جزر فارو', 'Faroese', 'جزر فارو'),
('FJ', 'Fiji', 'فيجي', 'Fijian', 'فيجي'),
('FI', 'Finland', 'فنلندا', 'Finnish', 'فنلندي'),
('FR', 'France', 'فرنسا', 'French', 'فرنسي'),
('GF', 'French Guiana', 'غويانا الفرنسية', 'French Guianese', 'غويانا الفرنسية'),
('PF', 'French Polynesia', 'بولينيزيا الفرنسية', 'French Polynesian', 'بولينيزيي'),
('TF', 'French Southern and Antarctic Lands', 'أراض فرنسية جنوبية وأنتارتيكية', 'French', 'أراض فرنسية جنوبية وأنتارتيكية'),
('GA', 'Gabon', 'الغابون', 'Gabonese', 'غابوني'),
('GM', 'Gambia', 'غامبيا', 'Gambian', 'غامبي'),
('GE', 'Georgia', 'جيورجيا', 'Georgian', 'جيورجي'),
('DE', 'Germany', 'ألمانيا', 'German', 'ألماني'),
('GH', 'Ghana', 'غانا', 'Ghanaian', 'غاني'),
('GI', 'Gibraltar', 'جبل طارق', 'Gibraltar', 'جبل طارق'),
('GG', 'Guernsey', 'غيرنزي', 'Guernsian', 'غيرنزي'),
('GR', 'Greece', 'اليونان', 'Greek', 'يوناني'),
('GL', 'Greenland', 'جرينلاند', 'Greenlandic', 'جرينلاندي'),
('GD', 'Grenada', 'غرينادا', 'Grenadian', 'غرينادي'),
('GP', 'Guadeloupe', 'جزر جوادلوب', 'Guadeloupe', 'جزر جوادلوب'),
('GU', 'Guam', 'جوام', 'Guamanian', 'جوامي'),
('GT', 'Guatemala', 'غواتيمال', 'Guatemalan', 'غواتيمالي'),
('GN', 'Guinea', 'غينيا', 'Guinean', 'غيني'),
('GW', 'Guinea-Bissau', 'غينيا-بيساو', 'Guinea-Bissauan', 'غيني'),
('GY', 'Guyana', 'غيانا', 'Guyanese', 'غياني'),
('HT', 'Haiti', 'هايتي', 'Haitian', 'هايتي'),
('HM', 'Heard and Mc Donald Islands', 'جزيرة هيرد وجزر ماكدونالد', 'Heard and Mc Donald Islanders', 'جزيرة هيرد وجزر ماكدونالد'),
('HN', 'Honduras', 'هندوراس', 'Honduran', 'هندوراسي'),
('HK', 'Hong Kong', 'هونغ كونغ', 'Hongkongese', 'هونغ كونغي'),
('HU', 'Hungary', 'المجر', 'Hungarian', 'مجري'),
('IS', 'Iceland', 'آيسلندا', 'Icelandic', 'آيسلندي'),
('IN', 'India', 'الهند', 'Indian', 'هندي'),
('IM', 'Isle of Man', 'جزيرة مان', 'Manx', 'ماني'),
('ID', 'Indonesia', 'أندونيسيا', 'Indonesian', 'أندونيسيي'),
('IR', 'Iran', 'إيران', 'Iranian', 'إيراني'),
('IQ', 'Iraq', 'العراق', 'Iraqi', 'عراقي'),
('IE', 'Ireland', 'إيرلندا', 'Irish', 'إيرلندي'),
('IL', 'Israel', 'إسرائيل', 'Israeli', 'إسرائيلي'),
('IT', 'Italy', 'إيطاليا', 'Italian', 'إيطالي'),
('CI', 'Ivory Coast', 'ساحل العاج', 'Ivory Coastian', 'ساحل العاج'),
('JE', 'Jersey', 'جيرزي', 'Jersian', 'جيرزي'),
('JM', 'Jamaica', 'جمايكا', 'Jamaican', 'جمايكي'),
('JP', 'Japan', 'اليابان', 'Japanese', 'ياباني'),
('JO', 'Jordan', 'الأردن', 'Jordanian', 'أردني'),
('KZ', 'Kazakhstan', 'كازاخستان', 'Kazakh', 'كازاخستاني'),
('KE', 'Kenya', 'كينيا', 'Kenyan', 'كيني'),
('KI', 'Kiribati', 'كيريباتي', 'I-Kiribati', 'كيريباتي'),
('KP', 'Korea(North Korea)', 'كوريا الشمالية', 'North Korean', 'كوري'),
('KR', 'Korea(South Korea)', 'كوريا الجنوبية', 'South Korean', 'كوري'),
('XK', 'Kosovo', 'كوسوفو', 'Kosovar', 'كوسيفي'),
('KW', 'Kuwait', 'الكويت', 'Kuwaiti', 'كويتي'),
('KG', 'Kyrgyzstan', 'قيرغيزستان', 'Kyrgyzstani', 'قيرغيزستاني'),
('LA', 'Lao PDR', 'لاوس', 'Laotian', 'لاوسي'),
('LV', 'Latvia', 'لاتفيا', 'Latvian', 'لاتيفي'),
('LB', 'Lebanon', 'لبنان', 'Lebanese', 'لبناني'),
('LS', 'Lesotho', 'ليسوتو', 'Basotho', 'ليوسيتي'),
('LR', 'Liberia', 'ليبيريا', 'Liberian', 'ليبيري'),
('LY', 'Libya', 'ليبيا', 'Libyan', 'ليبي'),
('LI', 'Liechtenstein', 'ليختنشتين', 'Liechtenstein', 'ليختنشتيني'),
('LT', 'Lithuania', 'لتوانيا', 'Lithuanian', 'لتوانيي'),
('LU', 'Luxembourg', 'لوكسمبورغ', 'Luxembourger', 'لوكسمبورغي'),
('LK', 'Sri Lanka', 'سريلانكا', 'Sri Lankian', 'سريلانكي'),
('MO', 'Macau', 'ماكاو', 'Macanese', 'ماكاوي'),
('MK', 'Macedonia', 'مقدونيا', 'Macedonian', 'مقدوني'),
('MG', 'Madagascar', 'مدغشقر', 'Malagasy', 'مدغشقري'),
('MW', 'Malawi', 'مالاوي', 'Malawian', 'مالاوي'),
('MY', 'Malaysia', 'ماليزيا', 'Malaysian', 'ماليزي'),
('MV', 'Maldives', 'المالديف', 'Maldivian', 'مالديفي'),
('ML', 'Mali', 'مالي', 'Malian', 'مالي'),
('MT', 'Malta', 'مالطا', 'Maltese', 'مالطي'),
('MH', 'Marshall Islands', 'جزر مارشال', 'Marshallese', 'مارشالي'),
('MQ', 'Martinique', 'مارتينيك', 'Martiniquais', 'مارتينيكي'),
('MR', 'Mauritania', 'موريتانيا', 'Mauritanian', 'موريتانيي'),
('MU', 'Mauritius', 'موريشيوس', 'Mauritian', 'موريشيوسي'),
('YT', 'Mayotte', 'مايوت', 'Mahoran', 'مايوتي'),
('MX', 'Mexico', 'المكسيك', 'Mexican', 'مكسيكي'),
('FM', 'Micronesia', 'مايكرونيزيا', 'Micronesian', 'مايكرونيزيي'),
('MD', 'Moldova', 'مولدافيا', 'Moldovan', 'مولديفي'),
('MC', 'Monaco', 'موناكو', 'Monacan', 'مونيكي'),
('MN', 'Mongolia', 'منغوليا', 'Mongolian', 'منغولي'),
('ME', 'Montenegro', 'الجبل الأسود', 'Montenegrin', 'الجبل الأسود'),
('MS', 'Montserrat', 'مونتسيرات', 'Montserratian', 'مونتسيراتي'),
('MA', 'Morocco', 'المغرب', 'Moroccan', 'مغربي'),
('MZ', 'Mozambique', 'موزمبيق', 'Mozambican', 'موزمبيقي'),
('MM', 'Myanmar', 'ميانمار', 'Myanmarian', 'ميانماري'),
('NA', 'Namibia', 'ناميبيا', 'Namibian', 'ناميبي'),
('NR', 'Nauru', 'نورو', 'Nauruan', 'نوري'),
('NP', 'Nepal', 'نيبال', 'Nepalese', 'نيبالي'),
('NL', 'Netherlands', 'هولندا', 'Dutch', 'هولندي'),
('AN', 'Netherlands Antilles', 'جزر الأنتيل الهولندي', 'Dutch Antilier', 'هولندي'),
('NC', 'New Caledonia', 'كاليدونيا الجديدة', 'New Caledonian', 'كاليدوني'),
('NZ', 'New Zealand', 'نيوزيلندا', 'New Zealander', 'نيوزيلندي'),
('NI', 'Nicaragua', 'نيكاراجوا', 'Nicaraguan', 'نيكاراجوي'),
('NE', 'Niger', 'النيجر', 'Nigerien', 'نيجيري'),
('NG', 'Nigeria', 'نيجيريا', 'Nigerian', 'نيجيري'),
('NU', 'Niue', 'ني', 'Niuean', 'ني'),
('NF', 'Norfolk Island', 'جزيرة نورفولك', 'Norfolk Islander', 'نورفوليكي'),
('MP', 'Northern Mariana Islands', 'جزر ماريانا الشمالية', 'Northern Marianan', 'ماريني'),
('NO', 'Norway', 'النرويج', 'Norwegian', 'نرويجي'),
('OM', 'Oman', 'عمان', 'Omani', 'عماني'),
('PK', 'Pakistan', 'باكستان', 'Pakistani', 'باكستاني'),
('PW', 'Palau', 'بالاو', 'Palauan', 'بالاوي'),
('PS', 'Palestine', 'فلسطين', 'Palestinian', 'فلسطيني'),
('PA', 'Panama', 'بنما', 'Panamanian', 'بنمي'),
('PG', 'Papua New Guinea', 'بابوا غينيا الجديدة', 'Papua New Guinean', 'بابوي'),
('PY', 'Paraguay', 'باراغواي', 'Paraguayan', 'بارغاوي'),
('PE', 'Peru', 'بيرو', 'Peruvian', 'بيري'),
('PH', 'Philippines', 'الفليبين', 'Filipino', 'فلبيني'),
('PN', 'Pitcairn', 'بيتكيرن', 'Pitcairn Islander', 'بيتكيرني'),
('PL', 'Poland', 'بولندا', 'Polish', 'بولندي'),
('PT', 'Portugal', 'البرتغال', 'Portuguese', 'برتغالي'),
('PR', 'Puerto Rico', 'بورتو ريكو', 'Puerto Rican', 'بورتي'),
('QA', 'Qatar', 'قطر', 'Qatari', 'قطري'),
('RE', 'Reunion Island', 'ريونيون', 'Reunionese', 'ريونيوني'),
('RO', 'Romania', 'رومانيا', 'Romanian', 'روماني'),
('RU', 'Russian', 'روسيا', 'Russian', 'روسي'),
('RW', 'Rwanda', 'رواندا', 'Rwandan', 'رواندا'),
('KN', 'Saint Kitts and Nevis', 'سانت كيتس ونيفس,', 'Kittitian/Nevisian', 'سانت كيتس ونيفس'),
('MF', 'Saint Martin (French part)', 'ساينت مارتن فرنسي', 'St. Martian(French)', 'ساينت مارتني فرنسي'),
('SX', 'Sint Maarten (Dutch part)', 'ساينت مارتن هولندي', 'St. Martian(Dutch)', 'ساينت مارتني هولندي'),
('LC', 'Saint Pierre and Miquelon', 'سان بيير وميكلون', 'St. Pierre and Miquelon', 'سان بيير وميكلوني'),
('VC', 'Saint Vincent and the Grenadines', 'سانت فنسنت وجزر غرينادين', 'Saint Vincent and the Grenadines', 'سانت فنسنت وجزر غرينادين'),
('WS', 'Samoa', 'ساموا', 'Samoan', 'ساموي'),
('SM', 'San Marino', 'سان مارينو', 'Sammarinese', 'ماريني'),
('ST', 'Sao Tome and Principe', 'ساو تومي وبرينسيبي', 'Sao Tomean', 'ساو تومي وبرينسيبي'),
('SA', 'Saudi Arabia', 'المملكة العربية السعودية', 'Saudi Arabian', 'سعودي'),
('SN', 'Senegal', 'السنغال', 'Senegalese', 'سنغالي'),
('RS', 'Serbia', 'صربيا', 'Serbian', 'صربي'),
('SC', 'Seychelles', 'سيشيل', 'Seychellois', 'سيشيلي'),
('SL', 'Sierra Leone', 'سيراليون', 'Sierra Leonean', 'سيراليوني'),
('SG', 'Singapore', 'سنغافورة', 'Singaporean', 'سنغافوري'),
('SK', 'Slovakia', 'سلوفاكيا', 'Slovak', 'سولفاكي'),
('SI', 'Slovenia', 'سلوفينيا', 'Slovenian', 'سولفيني'),
('SB', 'Solomon Islands', 'جزر سليمان', 'Solomon Island', 'جزر سليمان'),
('SO', 'Somalia', 'الصومال', 'Somali', 'صومالي'),
('ZA', 'South Africa', 'جنوب أفريقيا', 'South African', 'أفريقي'),
('GS', 'South Georgia and the South Sandwich', 'المنطقة القطبية الجنوبية', 'South Georgia and the South Sandwich', 'لمنطقة القطبية الجنوبية'),
('SS', 'South Sudan', 'السودان الجنوبي', 'South Sudanese', 'سوادني جنوبي'),
('ES', 'Spain', 'إسبانيا', 'Spanish', 'إسباني'),
('SH', 'Saint Helena', 'سانت هيلانة', 'St. Helenian', 'هيلاني'),
('SD', 'Sudan', 'السودان', 'Sudanese', 'سوداني'),
('SR', 'Suriname', 'سورينام', 'Surinamese', 'سورينامي'),
('SJ', 'Svalbard and Jan Mayen', 'سفالبارد ويان ماين', 'Svalbardian/Jan Mayenian', 'سفالبارد ويان ماين'),
('SZ', 'Swaziland', 'سوازيلند', 'Swazi', 'سوازيلندي'),
('SE', 'Sweden', 'السويد', 'Swedish', 'سويدي'),
('CH', 'Switzerland', 'سويسرا', 'Swiss', 'سويسري'),
('SY', 'Syria', 'سوريا', 'Syrian', 'سوري'),
('TW', 'Taiwan', 'تايوان', 'Taiwanese', 'تايواني'),
('TJ', 'Tajikistan', 'طاجيكستان', 'Tajikistani', 'طاجيكستاني'),
('TZ', 'Tanzania', 'تنزانيا', 'Tanzanian', 'تنزانيي'),
('TH', 'Thailand', 'تايلندا', 'Thai', 'تايلندي'),
('TL', 'Timor-Leste', 'تيمور الشرقية', 'Timor-Lestian', 'تيموري'),
('TG', 'Togo', 'توغو', 'Togolese', 'توغي'),
('TK', 'Tokelau', 'توكيلاو', 'Tokelaian', 'توكيلاوي'),
('TO', 'Tonga', 'تونغا', 'Tongan', 'تونغي'),
('TT', 'Trinidad and Tobago', 'ترينيداد وتوباغو', 'Trinidadian/Tobagonian', 'ترينيداد وتوباغو'),
('TN', 'Tunisia', 'تونس', 'Tunisian', 'تونسي'),
('TR', 'Turkey', 'تركيا', 'Turkish', 'تركي'),
('TM', 'Turkmenistan', 'تركمانستان', 'Turkmen', 'تركمانستاني'),
('TC', 'Turks and Caicos Islands', 'جزر توركس وكايكوس', 'Turks and Caicos Islands', 'جزر توركس وكايكوس'),
('TV', 'Tuvalu', 'توفالو', 'Tuvaluan', 'توفالي'),
('UG', 'Uganda', 'أوغندا', 'Ugandan', 'أوغندي'),
('UA', 'Ukraine', 'أوكرانيا', 'Ukrainian', 'أوكراني'),
('AE', 'United Arab Emirates', 'الإمارات العربية المتحدة', 'Emirati', 'إماراتي'),
('GB', 'United Kingdom', 'المملكة المتحدة', 'British', 'بريطاني'),
('US', 'United States', 'الولايات المتحدة', 'American', 'أمريكي'),
('UM', 'US Minor Outlying Islands', 'قائمة الولايات والمناطق الأمريكية', 'US Minor Outlying Islander', 'أمريكي'),
('UY', 'Uruguay', 'أورغواي', 'Uruguayan', 'أورغواي'),
('UZ', 'Uzbekistan', 'أوزباكستان', 'Uzbek', 'أوزباكستاني'),
('VU', 'Vanuatu', 'فانواتو', 'Vanuatuan', 'فانواتي'),
('VE', 'Venezuela', 'فنزويلا', 'Venezuelan', 'فنزويلي'),
('VN', 'Vietnam', 'فيتنام', 'Vietnamese', 'فيتنامي'),
('VI', 'Virgin Islands (U.S.)', 'الجزر العذراء الأمريكي', 'American Virgin Islander', 'أمريكي'),
('VA', 'Vatican City', 'فنزويلا', 'Vatican', 'فاتيكاني'),
('WF', 'Wallis and Futuna Islands', 'والس وفوتونا', 'Wallisian/Futunan', 'فوتوني'),
('EH', 'Western Sahara', 'الصحراء الغربية', 'Sahrawian', 'صحراوي'),
('YE', 'Yemen', 'اليمن', 'Yemeni', 'يمني'),
('ZM', 'Zambia', 'زامبيا', 'Zambian', 'زامبياني'),
('ZW', 'Zimbabwe', 'زمبابوي', 'Zimbabwean', 'زمبابوي');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_name_en` varchar(250) NOT NULL,
  `course_num_days` varchar(100) NOT NULL,
  `course_constructor` varchar(255) NOT NULL,
  `course_price` varchar(255) NOT NULL,
  `course_place` varchar(255) NOT NULL,
  `course_learn` longtext NOT NULL,
  `course_learn_en` longtext NOT NULL,
  `course_requirement` longtext NOT NULL,
  `course_requirement_en` longtext NOT NULL,
  `course_description` longtext NOT NULL,
  `course_description_en` longtext NOT NULL,
  `how_course` longtext NOT NULL,
  `how_course_en` longtext NOT NULL,
  `course_constructor_learn` varchar(255) NOT NULL,
  `course_constructor_info` varchar(255) NOT NULL,
  `course_constructor_info_en` longtext NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `course_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_name_en`, `course_num_days`, `course_constructor`, `course_price`, `course_place`, `course_learn`, `course_learn_en`, `course_requirement`, `course_requirement_en`, `course_description`, `course_description_en`, `how_course`, `how_course_en`, `course_constructor_learn`, `course_constructor_info`, `course_constructor_info_en`, `image1`, `image2`, `image3`, `image4`, `course_status`) VALUES
(4, 'كورس تصميم وبناء المواقع الالكترونية من الصفر الي الاحتراف', 'A course in designing and building websites from scratch to professionalism', '10', 'Mohamed Ramadan', '100', 'Online', 'HTML & CSS ,\r\nتعلم كيفية إنشاء HTML ثابتة ,\r\nسنتعلم كيفية وضع الصفحات بأسهل طريقة من خلال التحدث عن جميع نماذج التخطيط في ,', 'HTML & CSS ,\r\nLearn how to create static HTML,\r\nWe will learn how to lay out pages in the easiest way by talking about all the layout models in', 'لا حاجة إلى معرفة مسبقة بـ HTML أو CSS ,\r\nستأخذك هذه الدورة من الصفر إلى المستوى المتقدم ,\r\nالرغبة في تعلم HTML و CSS ,\r\n', 'No prior knowledge of HTML or CSS is required.,\r\nThis course will take you from zero to advanced,\r\nDesire to learn HTML and CSS,', 'أهلاً بك، مرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا\r\n\r\nمرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا\r\n\r\nمرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا\r\n\r\nمرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا', 'Hello, welcome to the HTML CSS course: Code and Design Websites with HTML and CSS. HTML CSS Create interactive real-world websites with HTML5 and CSS3 and become a modern web designer\r\n\r\nWelcome to the HTML CSS course: Code and Design Websites with HTML and CSS. HTML CSS Create interactive real-world websites with HTML5 and CSS3 and become a modern web designer\r\n\r\nWelcome to the HTML CSS course: Code and Design Websites with HTML and CSS. HTML CSS Create interactive real-world websites with HTML5 and CSS3 and become a modern web designer\r\n\r\nWelcome to the HTML CSS course: Code and Design Websites with HTML and CSS. HTML CSS Create interactive real-world websites with HTML5 and CSS3 and become a modern web designer', 'إذا كنت ترغب في تعلم HTML 5 و CSS 3 ، فإن الخطوة الأولى في تطوير الويب ، تمامًا وبسهولة ، فأنت في المكان الصحيح. ,\r\nإنه مثالي للمبتدئين تمامًا بدون خبرة. ,\r\nإذا كنت ترغب في بناء موقع الويب الخاص بك ، فيجب عليك التسجيل ,', 'If you want to learn HTML 5 and CSS 3, the first step in web development, completely and easily, then you are in the right place. ,\r\nIt is perfect for complete beginners with no experience. ,\r\nIf you want to build your own website, you must register,', 'html , css, javascript , php', '                                                                                    بحلول عام 2024 ، سيكون هناك أكثر من مليون وظيفة حوسبة شاغرة وستكون فجوة المهارات مشكلة عالمية. كانت هذه نقطة انطلاقنا.\r\n\r\nفي أكاديمية OAK ، نحن خبراء التكنولوجيا الذين عمل', '                                                                                    By 2024, there will be over a million computing jobs vacant and the skills gap will be a global problem. This was our starting point.\r\n\r\nAt OAK Academy, we are the technology experts who have been in the sector for years and years. We are deeply rooted in the world of technology. We know the technology industry. We know that the biggest problem facing the tech industry is the \"tech skills gap\" and here\'s our solution\r\n\r\nWe specialize in critical areas such as cyber security, coding, information technology, game development, app monetization, and mobile. With our practical alignment, we are able to continually translate industry insights into the most requested and updated courses,                                                                                    ', '88631237.Client-headshot-4-Jim-Fahad-Digital.png', '71599871.515441.fash6.jpg', '4714038.515441.fash6.jpg', '', 'active'),
(5, 'كورس تصميم وبناء المواقع الالكترونية من الصفر الي الاحتراف', 'A course in designing and building websites from scratch to professionalism', '10', 'Mohamed Ramadan', '100', 'Online', 'HTML & CSS ,\r\nتعلم كيفية إنشاء HTML ثابتة ,\r\nسنتعلم كيفية وضع الصفحات بأسهل طريقة من خلال التحدث عن جميع نماذج التخطيط في', 'HTML & CSS ,\r\nLearn how to create static HTML,\r\nWe will learn how to lay out pages in the easiest way by talking about all the layout models in', 'لا حاجة إلى معرفة مسبقة بـ HTML أو CSS ,\r\nستأخذك هذه الدورة من الصفر إلى المستوى المتقدم ,\r\nالرغبة في تعلم HTML و CSS ,\r\n', 'No prior knowledge of HTML or CSS is required.,\r\nThis course will take you from zero to advanced,\r\nDesire to learn HTML and CSS,', 'أهلاً بك، مرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا\r\n\r\nمرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا\r\n\r\nمرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا\r\n\r\nمرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا', 'Hello, welcome to the HTML CSS course: Code and Design Websites with HTML and CSS. HTML CSS Create interactive real-world websites with HTML5 and CSS3 and become a modern web designer\r\n\r\nWelcome to the HTML CSS course: Code and Design Websites with HTML and CSS. HTML CSS Create interactive real-world websites with HTML5 and CSS3 and become a modern web designer\r\n\r\nWelcome to the HTML CSS course: Code and Design Websites with HTML and CSS. HTML CSS Create interactive real-world websites with HTML5 and CSS3 and become a modern web designer\r\n\r\nWelcome to the HTML CSS course: Code and Design Websites with HTML and CSS. HTML CSS Create interactive real-world websites with HTML5 and CSS3 and become a modern web designer', 'إذا كنت ترغب في تعلم HTML 5 و CSS 3 ، فإن الخطوة الأولى في تطوير الويب ، تمامًا وبسهولة ، فأنت في المكان الصحيح. ,\r\nإنه مثالي للمبتدئين تمامًا بدون خبرة. ,\r\nإذا كنت ترغب في بناء موقع الويب الخاص بك ، فيجب عليك التسجيل ,', 'If you want to learn HTML 5 and CSS 3, the first step in web development, completely and easily, then you are in the right place. ,\r\nIt is perfect for complete beginners with no experience. ,\r\nIf you want to build your own website, you must register,', 'html , css, javascript , php', '                                                        بحلول عام 2024 ، سيكون هناك أكثر من مليون وظيفة حوسبة شاغرة وستكون فجوة المهارات مشكلة عالمية. كانت هذه نقطة انطلاقنا.\r\n\r\nفي أكاديمية OAK ، نحن خبراء التكنولوجيا الذين عملوا في هذا القطاع لسنوات وسنو', '                                                        By 2024, there will be over a million computing jobs vacant and the skills gap will be a global problem. This was our starting point.\r\n\r\nAt OAK Academy, we are the technology experts who have been in the sector for years and years. We are deeply rooted in the world of technology. We know the technology industry. We know that the biggest problem facing the tech industry is the \"tech skills gap\" and here\'s our solution\r\n\r\nWe specialize in critical areas such as cyber security, coding, information technology, game development, app monetization, and mobile. With our practical alignment, we are able to continually translate industry insights into the most requested and updated courses,                                                        ', '9872589.Team-member-1-Jim-Fahad-Digital.jpg', '91947498.30943913.sport3.jpg', '15107479.99305331.art1.jpg', '', 'active'),
(6, 'كورس تصميم وبناء المواقع الالكترونية من الصفر الي الاحتراف', 'A course in designing and building websites from scratch to professionalism', '10', 'Mohamed Ramadan', '100', 'Online', 'HTML & CSS ,\r\nتعلم كيفية إنشاء HTML ثابتة ,\r\nسنتعلم كيفية وضع الصفحات بأسهل طريقة من خلال التحدث عن جميع نماذج التخطيط في', 'HTML & CSS ,\r\nLearn how to create static HTML,\r\nWe will learn how to lay out pages in the easiest way by talking about all the layout models in', 'لا حاجة إلى معرفة مسبقة بـ HTML أو CSS ,\r\nستأخذك هذه الدورة من الصفر إلى المستوى المتقدم ,\r\nالرغبة في تعلم HTML و CSS ,\r\n', 'No prior knowledge of HTML or CSS is required.,\r\nThis course will take you from zero to advanced,\r\nDesire to learn HTML and CSS,', 'أهلاً بك، مرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا\r\n\r\nمرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا\r\n\r\nمرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا\r\n\r\nمرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا', 'Hello, welcome to the HTML CSS course: Code and Design Websites with HTML and CSS. HTML CSS Create interactive real-world websites with HTML5 and CSS3 and become a modern web designer\r\n\r\nWelcome to the HTML CSS course: Code and Design Websites with HTML and CSS. HTML CSS Create interactive real-world websites with HTML5 and CSS3 and become a modern web designer\r\n\r\nWelcome to the HTML CSS course: Code and Design Websites with HTML and CSS. HTML CSS Create interactive real-world websites with HTML5 and CSS3 and become a modern web designer\r\n\r\nWelcome to the HTML CSS course: Code and Design Websites with HTML and CSS. HTML CSS Create interactive real-world websites with HTML5 and CSS3 and become a modern web designer', 'إذا كنت ترغب في تعلم HTML 5 و CSS 3 ، فإن الخطوة الأولى في تطوير الويب ، تمامًا وبسهولة ، فأنت في المكان الصحيح. ,\r\nإنه مثالي للمبتدئين تمامًا بدون خبرة. ,\r\nإذا كنت ترغب في بناء موقع الويب الخاص بك ، فيجب عليك التسجيل ,', 'If you want to learn HTML 5 and CSS 3, the first step in web development, completely and easily, then you are in the right place. ,\r\nIt is perfect for complete beginners with no experience. ,\r\nIf you want to build your own website, you must register,', 'html , css, javascript , php', '                                                                                    بحلول عام 2024 ، سيكون هناك أكثر من مليون وظيفة حوسبة شاغرة وستكون فجوة المهارات مشكلة عالمية. كانت هذه نقطة انطلاقنا.\r\n\r\nفي أكاديمية OAK ، نحن خبراء التكنولوجيا الذين عمل', '                                                                                    By 2024, there will be over a million computing jobs vacant and the skills gap will be a global problem. This was our starting point.\r\n\r\nAt OAK Academy, we are the technology experts who have been in the sector for years and years. We are deeply rooted in the world of technology. We know the technology industry. We know that the biggest problem facing the tech industry is the \"tech skills gap\" and here\'s our solution\r\n\r\nWe specialize in critical areas such as cyber security, coding, information technology, game development, app monetization, and mobile. With our practical alignment, we are able to continually translate industry insights into the most requested and updated courses,                                                                                    ', '41435811.8_marknelson_breakingdusk_b.jpg', '46982968.8557998.art3.jpg', '94232599.15107479.99305331.art1.jpg', '', 'active'),
(7, 'جافا سكريبت', 'javascript', '10', 'محمد رمضان', '100', 'القاهرة', ' HTML & CSS,\r\n تعلم كيفية إنشاء HTML ثابتة,\r\n سنتعلم كيفية وضع الصفحات بأسهل طريقة من خلال التحدث عن جميع نماذج التخطيط في,', ' HTML & CSS,\r\n تعلم كيفية إنشاء HTML ثابتة,\r\n سنتعلم كيفية وضع الصفحات بأسهل طريقة من خلال التحدث عن جميع نماذج التخطيط في,', ' لا حاجة إلى معرفة مسبقة بـ HTML أو CSS\r\n ستأخذك هذه الدورة من الصفر إلى المستوى المتقدم\r\n الرغبة في تعلم HTML و CSS', ' لا حاجة إلى معرفة مسبقة بـ HTML أو CSS\r\n ستأخذك هذه الدورة من الصفر إلى المستوى المتقدم\r\n الرغبة في تعلم HTML و CSS', 'أهلاً بك، مرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا مرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا مرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا مرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا', 'أهلاً بك، مرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا مرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا مرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا مرحبًا بك في دورة HTML CSS: الكود وتصميم مواقع الويب باستخدام HTML و CSS. HTML CSS لإنشاء مواقع ويب تفاعلية في العالم الحقيقي باستخدام HTML5 و CSS3 وتصبح مصمم ويب حديثًا', ' إذا كنت ترغب في تعلم HTML 5 و CSS 3 ، فإن الخطوة الأولى في تطوير الويب ، تمامًا وبسهولة ، فأنت في المكان الصحيح., \r\n إنه مثالي للمبتدئين تمامًا بدون خبرة. ,\r\n إذا كنت ترغب في بناء موقع الويب الخاص بك ، فيجب عليك التسجيل ,', ' إذا كنت ترغب في تعلم HTML 5 و CSS 3 ، فإن الخطوة الأولى في تطوير الويب ، تمامًا وبسهولة ، فأنت في المكان الصحيح., \r\n إنه مثالي للمبتدئين تمامًا بدون خبرة. ,\r\n إذا كنت ترغب في بناء موقع الويب الخاص بك ، فيجب عليك التسجيل ,', 'html , css , javascript', '                            السلام عليكم ورحمة الله انا محمد رمضان حاصل علي بكالوريوس هندسة \r\nخبرة في مجال البرمجة                            ', '                            Welcome My Name Is Mohamed                             ', '48284773.515441.fash6.jpg', '62787729.2860141.ai_logo.png', '32740277.4156367.ai_logo.png', '39603137.The30-SecondVideo.mp4', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `course_register`
--

CREATE TABLE `course_register` (
  `reg_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `reg_status` varchar(200) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `trasnaction_id` varchar(255) NOT NULL,
  `course_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_register`
--

INSERT INTO `course_register` (`reg_id`, `first_name`, `last_name`, `email`, `mobile`, `country`, `course_id`, `reg_status`, `payment_mode`, `trasnaction_id`, `course_price`) VALUES
(1, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 6, 'قبول', '', '', ''),
(3, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 5, 'قبول', '', '', ''),
(4, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 5, '', '', '', ''),
(5, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 6, '', '', '', ''),
(6, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 6, '', '', '', ''),
(7, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 4, '', '', '', ''),
(8, 'shima', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 4, '', '', '', ''),
(9, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 4, '', '', '', ''),
(10, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 4, '', '', '', ''),
(11, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 4, '', 'pay with paypal', '78A29238VC005750U', '<br />\n<b>Warning</b>:  Undefined variable $course_price in <b>C:\\xampp\\htdocs\\revival\\course_details.php</b> on line <b>80</b><br />\n'),
(12, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 4, '', 'pay with paypal', '8UN257462V824604V', ''),
(13, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 4, '', 'pay with paypal', '4SW81615SW121000X', ''),
(14, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 4, '', 'pay with paypal', '89V44201NH5886424', '');

-- --------------------------------------------------------

--
-- Table structure for table `email_message`
--

CREATE TABLE `email_message` (
  `email_id` int(11) NOT NULL,
  `email_text` varchar(255) NOT NULL,
  `email_text_en` varchar(255) NOT NULL,
  `email_section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_message`
--

INSERT INTO `email_message` (`email_id`, `email_text`, `email_text_en`, `email_section`) VALUES
(1, ' التسجيل في الذكاء الاصطناعي artidi', ' register in art register  ', 'التسجيل في الذكاء الاصطناعي'),
(2, 'التسجيل في مجال الرياضة ', 'Register in Sport Register ', 'التسجيل في الرياضة'),
(3, 'التسجيل في مجال الموضه', 'Register In Fashion Section', 'التسجيل في الازياء'),
(4, 'التسجيل في ريفايفال ', 'Register In Revival', 'التسجيل في ريفايفال'),
(5, 'تم اضافة مشروع جديد', 'new Project Addedd', 'اضافة مشروع جديد'),
(6, 'شكرا لك علي التواصل معنا في ريفايفال ', 'thank  you for registeration in revival;', 'رسالة التواصل'),
(7, 'شكرا لك علي طلب الخدمة من خلال ريفايفال ', 'thank you for order services in revival ', 'طلب خدمة جديد'),
(8, ' ايميل الاستثمار في موهبة  جديدة', ' Investment email ', 'استثمار في موهبة'),
(9, 'تم اضافة موهبة جديدة بنجاح', 'new Talent Added', 'اضافة موهبة'),
(10, 'تم تفعيل الحساب بنجاح', 'Your Acount Is Activated', 'تفعيل الحساب'),
(11, 'تم الاشتراك بنجاح في القائمة البريدية', 'Successfully subscribed to the mailing list', 'الاشتراك في القائمة البريدية'),
(12, 'تم الاشتراك بنجاح في الكورس ', 'Register Compelete In Course ', 'التسجيل في الكورس'),
(13, 'تاكيد التسجيل في الكورس ', 'confirm registeration in course ', 'الموافقة علي التسجيل في الكورس'),
(14, 'اضافة خير جديد', 'Add New News', 'اضافة خبر جديد'),
(15, 'اضافة مقال جديد', 'Add New Article ', 'اضافة مقال جديد');

-- --------------------------------------------------------

--
-- Table structure for table `email_message_event`
--

CREATE TABLE `email_message_event` (
  `email_id` int(11) NOT NULL,
  `email_text` varchar(255) NOT NULL,
  `email_text_en` varchar(255) NOT NULL,
  `email_section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_message_event`
--

INSERT INTO `email_message_event` (`email_id`, `email_text`, `email_text_en`, `email_section`) VALUES
(2, 'ايميل التواصل من صفحة الاحداث الرئيسية ', 'email from contaact form in main event page ', 'تواصل من الصفحة الرئيسية'),
(3, 'ايميل التواصل من الحدث', 'email content from event ', 'تواصل من الحدث'),
(4, 'ايميل المشاركة في الفاعلية ', 'email share in event ', 'شارك في الفعالية'),
(5, 'ايميل الانضمام الي فريق ', 'join team  mail', 'انضم الي فريق'),
(6, 'ايميل حساب جديد', 'email new refgister ', 'حساب جديد');

-- --------------------------------------------------------

--
-- Table structure for table `event_about_us`
--

CREATE TABLE `event_about_us` (
  `about_id` int(11) NOT NULL,
  `about_name` varchar(255) NOT NULL,
  `about_name_en` varchar(255) NOT NULL,
  `about_desc` longtext NOT NULL,
  `about_desc_en` longtext NOT NULL,
  `about_sub_desc` varchar(255) NOT NULL,
  `about_sub_desc_en` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `video1` varchar(255) NOT NULL,
  `video2` varchar(255) NOT NULL,
  `about_page` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_about_us`
--

INSERT INTO `event_about_us` (`about_id`, `about_name`, `about_name_en`, `about_desc`, `about_desc_en`, `about_sub_desc`, `about_sub_desc_en`, `image1`, `image2`, `video1`, `video2`, `about_page`) VALUES
(2, 'مدينة الذكاء الإصطناعي والواقع الإفتراضي', 'The city of artificial intelligence and virtual reality', 'مدينة الذكاء الإصطناعي والواقع الإفتراضي هي مدينة ذكية وتِقَنِيَّة لها تواجد في الواقع الحقيقي والإفتراضي والمعزز، تستثمر في المعرفة وابتكار أجهزة الذكاء الإصطناعي في المجالات المختلفة لتكون داعمة في الواقعين الحقيقي والافتراضي. تعمل على تطوير مشاريع اقتصادية واجتماعية خاصة ومبتكرة في عالم الميتافيرس بعقول عباقرة العالم العربي والإسلامي لرسم مستقبل الميتا فيرس ودعم التطوير التقني في العالم من خلال استثمار العقول الموهوبة ودعم الأبحاث التقنية بطريقة تفاعلية جديدة ومبتكرة، تسهم في تحقيق نمو مستدام في الاقتصاد المعرفي.\r\n\r\nأول مدينة ذكاء اصطناعي وواقع افتراضي في الشرق الأوسط', 'The city of artificial intelligence and virtual reality is a smart and technical city that has a presence in real, virtual and augmented reality. It invests in knowledge and innovation of artificial intelligence devices in various fields to be supportive in real and virtual reality. It works to develop special and innovative economic and social projects in the metavirus world with the minds of the geniuses of the Arab and Islamic world to chart the future of the metavirus and support technical development in the world by investing talented minds and supporting technical research in a new and innovative interactive way, which contributes to achieving sustainable growth in the knowledge economy.\r\n\r\nThe first artificial intelligence and virtual reality city in the Middle East', 'الوصف الفرعي الاول ,\r\nالوصف الفرعي الثاني ,', '', '17422360.art3.jpg', '10043513.art3.jpg', '48610986.', '36009485.', 'الذكاء الإصطناعي');

-- --------------------------------------------------------

--
-- Table structure for table `event_banner`
--

CREATE TABLE `event_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `banner_page` varchar(255) NOT NULL,
  `banner_head` varchar(255) NOT NULL,
  `banner_head_en` varchar(255) NOT NULL,
  `banner_desc` varchar(255) NOT NULL,
  `banner_desc_en` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_banner`
--

INSERT INTO `event_banner` (`banner_id`, `banner_name`, `image1`, `image2`, `banner_page`, `banner_head`, `banner_head_en`, `banner_desc`, `banner_desc_en`) VALUES
(9, 'AIVR CITY', '24388123.art3.jpg', '71597507.art3.jpg', 'الذكاء الإصطناعي', 'AIVR CITY', 'AIVR CITY', 'AIVR CITY', ''),
(10, 'AIVR CITY 2', '1544086.header2.jpg', '4583013.header2.jpg', 'الذكاء الإصطناعي', 'AIVR CITY', 'AIVR CITY', '', ''),
(12, 'AIVR CITY ', '5285244.header3.jpg', '78422412.header3.jpg', 'الذكاء الإصطناعي', ' 2AIVR CITY', 'AIVR CITY', 'حدث الذكاء الاصطناعي العالمي 2', 'حدث الذكاء الاصطناعي العالمي  2');

-- --------------------------------------------------------

--
-- Table structure for table `event_contact`
--

CREATE TABLE `event_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_head` varchar(255) NOT NULL,
  `contact_message` varchar(255) NOT NULL,
  `contact_files` varchar(255) NOT NULL,
  `contact_date` varchar(255) NOT NULL,
  `fiels` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_contact`
--

INSERT INTO `event_contact` (`contact_id`, `contact_name`, `contact_email`, `contact_head`, `contact_message`, `contact_files`, `contact_date`, `fiels`) VALUES
(6, 'lamar', 'mr319242@gmail.com', '', 'jhoh hoh9o hh ', '', '2022-10-01 01:27:15', 'Team-member-1-Jim-Fahad-Digital.jpg '),
(7, 'admin', 'mr319242@gmail.com', '', 'ugig igi gig', '', '2022-10-01 01:29:38', 'Team-member-1-Jim-Fahad-Digital.jpg '),
(8, 'admin', 'mr319242@gmail.com', ' صفحة الاحداث الرئيسية ', '5yrhgb', '', '2022-10-01 01:38:36', 'Client-headshot-4-Jim-Fahad-Digital.png '),
(9, 'admin123', 'mr319242@gmail.com', 'h h', 'الذكاء الإصطناعي', '', '2022-10-01 01:46:15', 'Client-headshot-4-Jim-Fahad-Digital.png '),
(10, 'admin', 'mr319242@gmail.com', 'الذكاء الإصطناعي', 'welcome', '', '2022-10-01 01:55:57', 'Team-member-1-Jim-Fahad-Digital.jpg '),
(11, 'mohamed ramadan', 'mr319242@gmail.com', ' صفحة الاحداث الرئيسية ', 'اختبار ارسال الرسائل ', '', '2022-10-01 09:56:04', 'Client-headshot-1-Jim-Fahad-Digital.png '),
(12, 'mohamed ramadan', 'mr319242@gmail.com', ' صفحة الاحداث الرئيسية ', 'اختبار ارسال الرسائل ', '', '2022-10-01 09:56:44', 'Client-headshot-1-Jim-Fahad-Digital.png '),
(13, 'admin123', 'mr319242@gmail.com', 'الذكاء الإصطناعي', 'ثضلا ', '', '2022-10-01 09:59:45', 'Client-headshot-4-Jim-Fahad-Digital.png '),
(14, 'lamar', 'mr319242@gmail.com', ' صفحة الاحداث الرئيسية ', 'gf', '', '2022-10-19 16:45:16', '4714038.515441.fash6.jpg '),
(15, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'ada', '', '2022-10-19 17:07:19', '4156367.ai_logo.png '),
(16, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'ada', '', '2022-10-19 17:07:20', '4156367.ai_logo.png '),
(17, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'adaghjhlbhj', '', '2022-10-19 17:08:32', '4156367.ai_logo.png '),
(18, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'adaghjhlbhj', '', '2022-10-19 17:08:33', '4156367.ai_logo.png '),
(19, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'adaghjhlbhj', '', '2022-10-19 17:08:33', '4156367.ai_logo.png '),
(20, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'adaghjhlbhj', '', '2022-10-19 17:08:33', '4156367.ai_logo.png '),
(21, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'adaghjhlbhj', '', '2022-10-19 17:08:33', '4156367.ai_logo.png '),
(22, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'adaghjhlbhj', '', '2022-10-19 17:08:54', '4156367.ai_logo.png '),
(23, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'adaghjhlbhj', '', '2022-10-19 17:08:55', '4156367.ai_logo.png '),
(24, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'adaghjhlbhj', '', '2022-10-19 17:08:55', '4156367.ai_logo.png '),
(25, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'adaghjhlbhj', '', '2022-10-19 17:09:07', '4156367.ai_logo.png '),
(26, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'adaghjhlbhj', '', '2022-10-19 17:09:07', '4156367.ai_logo.png '),
(27, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'adaghjhlbhj', '', '2022-10-19 17:09:08', '4156367.ai_logo.png '),
(28, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'adaghjhlbhj', '', '2022-10-19 17:09:08', '4156367.ai_logo.png '),
(29, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'adaghjhlbhj', '', '2022-10-19 17:09:08', '4156367.ai_logo.png '),
(30, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'adaghjhlbhj', '', '2022-10-19 17:09:13', '4156367.ai_logo.png '),
(31, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'adaghjhlbhj', '', '2022-10-19 17:09:13', '4156367.ai_logo.png '),
(32, 'lamar', 'ammar@gmail.com', ' صفحة الاحداث الرئيسية ', 'adaghjhlbhj', '', '2022-10-19 17:09:14', '4156367.ai_logo.png '),
(33, 'lamar', 'mr319242@gmail.com', ' صفحة الاحداث الرئيسية ', 'sf', '', '2022-10-19 17:10:32', '2860141.ai_logo.png '),
(34, 'mr319242@gmail.com', 'mr319242@gmail.com', 'الذكاء الإصطناعي', 'da', '', '2022-11-07 18:59:00', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `event_contact_us`
--

CREATE TABLE `event_contact_us` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_message` varchar(255) NOT NULL,
  `contact_date` varchar(255) NOT NULL,
  `fiels` varchar(255) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event_faq`
--

CREATE TABLE `event_faq` (
  `faq_id` int(11) NOT NULL,
  `faq_q` varchar(255) NOT NULL,
  `faq_q_en` varchar(255) NOT NULL,
  `faq_an` varchar(255) NOT NULL,
  `faq_an_en` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_faq`
--

INSERT INTO `event_faq` (`faq_id`, `faq_q`, `faq_q_en`, `faq_an`, `faq_an_en`) VALUES
(3, 'لماذا ريفايفال', 'Why Revival', 'ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر في مختلف المجالات', 'Simply distinguished cadres consisting of elite talents from different countries working on developing a creative and innovative project in various fields'),
(4, 'أهمية الخدمات التي نقدمها', 'The importance of our services', 'أهمية خدماتنا تكمن في أنها رافدا أساسيا لتجديد الاستراتيجيات التنموية وتوفير وصول أفضل إلى التنمية المستدامة من خلال الاقتصاد القائم على المعرفة حيث نطور مشاريع جديده ومبتكرة بمفهوم جديد وابداعي للحكومات والمؤسسات والافراد تسهم في جذب المستمرين ودعم التنم', 'The importance of our services lies in the fact that it is an essential tributary to renewing development strategies and providing better access to sustainable development through a knowledge-based economy where we develop new and innovative projects with'),
(5, 'انضم الان', 'Join Now', 'انظم الآن الى نخبة من محترفي تصميم وصناعة الأزياء والمجوهرات في العالم لتكون واحدا من أدوات نجاح وتميز الملتقى العالمي \"أدو للأزياء والموضة وفن الجسم والمجوهرات\" الذي يعتبر منصّة متميزة تلتقي فيها المواهب الناشئة بالنخب العالمية في مجال التصميم والأزياء و', 'Join now an elite of fashion and jewelry design and manufacture professionals in the world to be one of the tools of success and excellence in the global forum \"ADO Fashion, Fashion, Body Art and Jewelry\", which is a distinguished platform where emerging ');

-- --------------------------------------------------------

--
-- Table structure for table `event_goals`
--

CREATE TABLE `event_goals` (
  `goal_id` int(11) NOT NULL,
  `goal_head` varchar(255) NOT NULL,
  `goal_head_en` varchar(255) NOT NULL,
  `goal_desc` longtext NOT NULL,
  `goal_desc_en` longtext NOT NULL,
  `vision_head` longtext NOT NULL,
  `vision_head_en` longtext NOT NULL,
  `vision_desc` longtext NOT NULL,
  `vision_desc_en` longtext NOT NULL,
  `message_head` longtext NOT NULL,
  `message_head_en` longtext NOT NULL,
  `message_desc` longtext NOT NULL,
  `message_desc_en` longtext NOT NULL,
  `goal_page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_goals`
--

INSERT INTO `event_goals` (`goal_id`, `goal_head`, `goal_head_en`, `goal_desc`, `goal_desc_en`, `vision_head`, `vision_head_en`, `vision_desc`, `vision_desc_en`, `message_head`, `message_head_en`, `message_desc`, `message_desc_en`, `goal_page`) VALUES
(2, 'اهدافنا', 'Our goals', 'ابتكار مشاريع إبداعية في مجال عالم الذكاء الافتراضي والميتا فيرس,\r\nاستثمار المواهب والمعرفة لصناعة مستقبل تقني واعد ,\r\nمواكبة العالم لإنتاج مشاريع تقنية تتوافق مع النظرة المستقبلية لتوجه العالم ,\r\nالمساهمة في تحويل المشاريع في الواقع إلى واقع إفتراضي علمي متطور ,\r\nاكتشاف وتطوير المواهب في عالم الذكاء الإصطناعي والميتافيرس ليكونوا لبنة لبناء مستقبل مشرق ,', 'Creating creative projects in the field of virtual intelligence and metavirus,\r\nInvesting talents and knowledge to create a promising technical future,\r\nKeeping pace with the world to produce technical projects that are compatible with the future vision of the world\'s orientation,\r\nContribute to transforming projects in reality into an advanced scientific virtual reality,\r\nDiscovering and developing talents in the world of artificial intelligence and metaviruses to be a building block for building a bright future,', 'الرؤية', 'Our Vision', 'الريادة العالمية في تطوير تقنيات الذكاء الإصطناعي في المجالات الصناعية والعلمية والتجارية المستخدمة في الميتافيرس', 'Global leadership in the development of artificial intelligence techniques in the industrial, scientific and commercial fields used in metaverses', 'رسالتنا', 'Our Message', 'المساهمة في تطوير تقنيات الذكاء الإصطناعي ودعم الأبحاث المخصصة فيها لإبتكار أجهزة جديدة تدعم الميتا فيرس من خلال إستثمار نتاج عقول المواهب في العالم العربي والإسلامي وصناعة الإستدامة في الإقتصاد المعرفي', 'Contribute to the development of artificial intelligence techniques and support research dedicated to it to create new devices that support the meta-virus by investing the product of talented minds in the Arab and Islamic world and the sustainability industry in the knowledge economy', 'الذكاء الإصطناعي');

-- --------------------------------------------------------

--
-- Table structure for table `event_home_about`
--

CREATE TABLE `event_home_about` (
  `about_id` int(11) NOT NULL,
  `about_name` varchar(255) NOT NULL,
  `about_desc` longtext NOT NULL,
  `about_desc_en` longtext NOT NULL,
  `about_sub_desc` longtext NOT NULL,
  `about_sub_desc_en` longtext NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `video1` varchar(255) NOT NULL,
  `video2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_home_about`
--

INSERT INTO `event_home_about` (`about_id`, `about_name`, `about_desc`, `about_desc_en`, `about_sub_desc`, `about_sub_desc_en`, `image1`, `image2`, `video1`, `video2`) VALUES
(3, 'عن الاحداث', '- تعمل شركة ريفايفال على تطوير فعاليات بطريقة مبتكرة وتفاعلية تهدف الى تطوير نظام اقتصادي تمثل فيه المعرفة والسياحة والإبداعية عنصر الإنتاج الأساسي والقوة الدافعة لإنتاج الثورة لتهيئة علاقة إبداعيّة” فعّالة من أجل دعم السياحة وجذب المستثمرين وبناء مشاريع إبداعيّة لتجديد الاستراتيجيات التنموية وتوفير وصول أفضل إلى التنمية المستدامة من خلال تنظيم الفعاليات القائمة على المعرفة والابداع عبر منصات مميزة يلتقي فيها الخبراء والمختصين والموهوبين لصناعة أحداث وفعاليات مميزة تؤكدون فيها حضور علاماتكم لشخصية والتجارية أمام أكبر جمهور مهتم بمجال منشآتكم ومواهبكم لبناء شبكة علاقات دولية وإقليمية مع الخبراء والمختصين في مجالكم ...فكونوا جزء من الإحداث في ريفايفال...', '- Revival works on developing events in an innovative and interactive way that aims to develop an economic system in which knowledge, tourism and creativity are the main production element and the driving force for the production of the revolution to create an effective “creative relationship” in order to support tourism, attract investors and build creative projects to renew development strategies and provide better access to sustainable development By organizing events based on knowledge and creativity through distinguished platforms where experts, specialists and talented meet to create distinctive events and events in which you confirm the presence of your personal and commercial brands in front of the largest audience interested in the field of your facilities and talents to build a network of international and regional relations with experts and specialists in your field ... Be part of the events In Revival...', '', '', '21533556.art_state.jpg', '14372959.art1.jpg', '85477203.The 30-Second Video.mp4', '48075967.The 30-Second Video.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `event_home_banner`
--

CREATE TABLE `event_home_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `banner_page` varchar(255) NOT NULL,
  `banner_head` varchar(255) NOT NULL,
  `banner_head_en` varchar(255) NOT NULL,
  `banner_desc` varchar(255) NOT NULL,
  `banner_desc_en` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_home_banner`
--

INSERT INTO `event_home_banner` (`banner_id`, `banner_name`, `image1`, `image2`, `banner_page`, `banner_head`, `banner_head_en`, `banner_desc`, `banner_desc_en`) VALUES
(3, 'البانر الاول', '23447311.event1.jpg', '12427791.event1.jpg', '', 'اهم الاحداث العالمية لسنة 2023', 'The most important global events of 2023', '', ''),
(4, ' البانر 2', '27457916.event6.jpg', '77695898.event6.jpg', '', 'اهم الاحداث العالمية لسنة 2023', 'The most important global events of 2023', '', ''),
(5, ' البانر 3', '75286047.event2.jpg', '24980752.', '', 'اهم الاحداث العالمية لسنة 2023 mohamed ', 'The most important global events of 2023', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `event_home_reason`
--

CREATE TABLE `event_home_reason` (
  `reason_id` int(11) NOT NULL,
  `reasons` longtext NOT NULL,
  `reasons_en` longtext NOT NULL,
  `reason_image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_home_reason`
--

INSERT INTO `event_home_reason` (`reason_id`, `reasons`, `reasons_en`, `reason_image`) VALUES
(4, ' بناء شراكات دولية وإقليمية في مجالك ,\r\n فرصة لبناء شبكة علاقات مع الخبراء والمختصين في مجالك ,\r\n منصة مناسبة لبناء وإشهار علاماتكم التجارية والشخصية. ,\r\n التعرف على أحدث التقنيات في مجالك ,\r\n فعاليات مميزة ومبتكرة بطريقة تفاعلية تحقق أهدافك ,\r\n', 'Building international and regional partnerships in your field,\r\n  An opportunity to build a network of relationships with experts and specialists in your field,\r\n  A suitable platform for building and publicizing your brands and personality. ,\r\n  Learn about the latest technologies in your field,\r\n  Distinguished and innovative events in an interactive way that achieve your goals,', '41837332.4525984.art1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event_programme`
--

CREATE TABLE `event_programme` (
  `prog_id` int(11) NOT NULL,
  `prog_name` varchar(255) NOT NULL,
  `prog_date` varchar(255) NOT NULL,
  `prog_date_name` varchar(255) NOT NULL,
  `prog_date_price` varchar(255) NOT NULL,
  `prog_date_price_disc` varchar(255) NOT NULL,
  `main_head` varchar(255) NOT NULL,
  `main_head_en` varchar(255) NOT NULL,
  `sub_head` varchar(255) NOT NULL,
  `sub_head_en` varchar(255) NOT NULL,
  `prog_desc` longtext NOT NULL,
  `prog_desc_en` longtext NOT NULL,
  `event_page` varchar(255) NOT NULL,
  `first_team` varchar(255) NOT NULL,
  `first_team_en` varchar(255) NOT NULL,
  `second_team` varchar(255) NOT NULL,
  `second_team_en` varchar(255) NOT NULL,
  `match_date` varchar(255) NOT NULL,
  `match_time` varchar(255) NOT NULL,
  `match_stad` varchar(255) NOT NULL,
  `match_stad_en` varchar(255) NOT NULL,
  `match_resault` varchar(255) NOT NULL,
  `match_price` varchar(255) NOT NULL,
  `match_price_disc` varchar(255) NOT NULL,
  `work_date` varchar(255) NOT NULL,
  `work_time` varchar(255) NOT NULL,
  `work_place` varchar(255) NOT NULL,
  `work_speakers` varchar(255) NOT NULL,
  `work_price` varchar(255) NOT NULL,
  `work_dis_price` varchar(255) NOT NULL,
  `work_name` varchar(255) NOT NULL,
  `train_name` varchar(255) NOT NULL,
  `train_date` varchar(255) NOT NULL,
  `train_time` varchar(255) NOT NULL,
  `train_place` varchar(255) NOT NULL,
  `train_speaker` varchar(255) NOT NULL,
  `train_price` varchar(255) NOT NULL,
  `train_desc` longtext NOT NULL,
  `train_hours` varchar(255) NOT NULL,
  `train_days` varchar(255) NOT NULL,
  `train_dis_price` varchar(255) NOT NULL,
  `session_name` varchar(255) NOT NULL,
  `session_name_en` varchar(255) NOT NULL,
  `session_instruct` varchar(255) NOT NULL,
  `session_team` varchar(255) NOT NULL,
  `session_date` varchar(255) NOT NULL,
  `session_time` varchar(255) NOT NULL,
  `session_place` varchar(255) NOT NULL,
  `session_session_name` varchar(255) NOT NULL,
  `session_price` varchar(255) NOT NULL,
  `session_dis_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_programme`
--

INSERT INTO `event_programme` (`prog_id`, `prog_name`, `prog_date`, `prog_date_name`, `prog_date_price`, `prog_date_price_disc`, `main_head`, `main_head_en`, `sub_head`, `sub_head_en`, `prog_desc`, `prog_desc_en`, `event_page`, `first_team`, `first_team_en`, `second_team`, `second_team_en`, `match_date`, `match_time`, `match_stad`, `match_stad_en`, `match_resault`, `match_price`, `match_price_disc`, `work_date`, `work_time`, `work_place`, `work_speakers`, `work_price`, `work_dis_price`, `work_name`, `train_name`, `train_date`, `train_time`, `train_place`, `train_speaker`, `train_price`, `train_desc`, `train_hours`, `train_days`, `train_dis_price`, `session_name`, `session_name_en`, `session_instruct`, `session_team`, `session_date`, `session_time`, `session_place`, `session_session_name`, `session_price`, `session_dis_price`) VALUES
(2, 'حفل افتتاح المعرض', '', '', 'اليوم الاول', '', 'حفل افتتاح المعرض', 'Exhibition opening ceremony', 'قران , كلمة علمية ,', 'Wedding', 'نقل الواقع الحقيقي بمؤسساته وتقنياته من الواقع الافتراضي لعالم الميتافيرس بطريقة إبداعية تحاكي الواقع لمواكبة التطور العالمي', 'Transferring the real reality with its institutions and technologies from the virtual reality to the world of metavirs in a creative way that simulates reality to keep pace with global development', 'الذكاء الإصطناعي', '', '', '', '', '', '', '', '', '', '', '', '2022-11-15', '16:11', 'القاعه المغلقة', 'حسن محمد ', '300', '200', 'تعليم عن بعد ', 'الدورة الثانية', '', '', '', '', '200', '', '', '', '', 'الجلسة الاولى', 'first session', 'mohamed ramadan', 'محمد رمضان , حسن محمد ', '2022-11-27', '04:10', 'القاعة الاولي', 'mohamed ramadan', '100', '80'),
(3, 'قطوف علمية', '2022-10-10', 'اليوم الاول', '400', '', 'قطوف علمية', 'scientific cuts', 'سلسلة من الكلمات السريعة التي تعرض التجارب العلمية للخبراء والرياديين وأحدث التقنيات في مجال الأزياء والموضة حول المحاور الرئيسية للملتقى', 'A series of quick speeches presenting the scientific experiences of experts and leaders and the latest technologies in the field of fashion and fashion around the main themes of the forum', 'كلمة راعي الحفل ,\r\nكلمة المدير التنفيذي لشركة ريفايفال ,\r\nكلمة الراعي الرسمي للملتقى ,\r\nفيلم وثائقي عن المعرض ,\r\nتكريم الرعاة والداعمين من راعي الحفل ,\r\nافتتاح المعرض وقص الشريط تجول الحضور في المعرض ,\r\n', 'Ceremony Sponsor\'s Speech,\r\nA word from Revival CEO ,\r\nSpeech of the official sponsor of the forum ,\r\nDocumentary about the exhibition.\r\nHonoring the sponsors and supporters of the event\'s sponsor,\r\nOpening the exhibition and cutting the tape The audience toured the exhibition ,', 'الذكاء الإصطناعي', '', '', '', '', '', '', '', '', '', '', '', '2022-11-15', '11:31', 'القاعه المغلقة', 'حسن محمد ', '200', '100', 'الورشة الثانية', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'معرض الأزياء والموضة', '', '', '', '', 'معرض الأزياء والموضة', 'Fashion and fashion show', 'يجمع نخبة من المصممين والماركات العالمية والمصانع والمهتمين بالموضة والازياء والإعلاميين، وهو معرض خاص يضمّ أحدث الإبداعات التي أنتجتها أنامل المصممات والمصممين وتقنيات المصانع بطريقة تفاعلية مبتكرة وإبداعية، والذي من خلاله يسعون إلى تحقيق الأهداف التالية', 'It brings together an elite group of designers, international brands, factories, and those interested in fashion and fashion, and the media. It is a special exhibition that includes the latest creations produced by female designers, designers and factory ', 'اكتشاف أسواق جديدة وبناء علاقات تجارية إقليمية ودولية ,\r\nإشهار علاماتهم التجارية أو الشخصية ,\r\nفرصة قيّمة للظهور والانتشار من خلال التغطية الإعلاميّة الواسعة محليّاً وإقليميّاً وعالميّاً. ,\r\nتكوين علاقات واكتساب مهارات جديدة في عالم الأزياء والموضة ,\r\n', 'Discovering new markets and building regional and international trade relations.\r\npublicizing their trademarks or personalities,\r\nA valuable opportunity to appear and spread through extensive media coverage locally, regionally and globally. ,\r\nForming relationships and acquiring new skills in the world of fashion and fashion.', 'الذكاء الإصطناعي', 'برشلونة', 'Barca', 'ريال مدريد', 'RealMadrid', '2022-11-27', '04:51', 'استاذ القاهرة ', 'cairo staduim', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'المبارة الاولي ', '2022-10-10', '', '', '', 'معرض الأزياء والموضة', 'scientific cuts', 'قرآن', 'A series of quick speeches presenting the scientific experiences of experts and leaders and the latest technologies in the field of fashion and fashion around the main themes of the forum', 'هذتايسهعا', 'صبثث صخهبتا89 عاص9ب8غ عصب7', 'الذكاء الإصطناعي', 'الاهلي المصري', 'egypt alahly', 'الزمالك ', 'Alzamalek', '', '16:51', 'استاذ القاهرة ', 'cairo staduim', '2/2', '100', '60', '', '', '', '', '', '', '', 'الدورة في المبارة الاولي ', '2022-11-15', '23:09', 'الصالة المغطاة', 'حسن احمد محمد ', '300', 'كل هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص الذين لا يدركون بأن السعادة لا بد أن نستشعرها بصورة أكثر عقلانية ومنطقية فيعرضهم هذا لمواجهة الظروف الأليمة، وأكرر بأنه لا يوجد من يرغب في الحب ', '12', '4', '50', '', '', '', '', '', '', '', '', '', ''),
(13, 'حفل افتتاح المعرض السعر', '', '', '', '', '', '', '', '', '', '', 'الذكاء الإصطناعي', 'الاهلي ', '', '', '', '', '', '', '', '', '300', '60', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'حفل افتتاح المعرض الاول', '2022-12-01', 'اليوم الاول', '400', '200', 'جديد', 'scientific cuts', 'يجمع نخبة من المصممين والماركات العالمية والمصانع والمهتمين بالموضة والازياء والإعلاميين، وهو معرض خاص يضمّ أحدث الإبداعات التي أنتجتها أنامل المصممات والمصممين وتقنيات المصانع بطريقة تفاعلية مبتكرة وإبداعية، والذي من خلاله يسعون إلى تحقيق الأهداف التالية', 'A series of quick speeches presenting the scientific experiences of experts and leaders and the latest technologies in the field of fashion and fashion around the main themes of the forum', 'erwrwr', 'ewr', 'الذكاء الإصطناعي', 'الاهلي ', 'Alhaly', 'الزمالك ', 'Alzamalek', '2022-12-02', '10:20', 'استاذ القاهرة ', 'cairo staduim', '2/2', '100', '60', '2022-12-01', '10:20', 'القاعه المغلقة', 'حسن محمد ', '200', '100', 'الورشة الثانية', 'الدورة الثانية', '2022-12-01', '10:20', 'الصالة المغطاة', 'حسن احمد محمد ', '300', 'wqerw', '12', '4', '50', 'الجلسة الاول', 'first session', 'mohamed ramadan', 'محمد رمضان , حسن محمد ,', '2022-12-01', '01:20', 'القاعة الاولي', 'mohamed ramadan', '100', '80'),
(15, 'جديد', '2022-12-20', '', '', '', '', '', '', '', '', '', 'الذكاء الإصطناعي', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `event_speaker`
--

CREATE TABLE `event_speaker` (
  `speaker_id` int(11) NOT NULL,
  `speaker_name` varchar(255) NOT NULL,
  `speaker_name_en` varchar(255) NOT NULL,
  `speaker_jop` varchar(255) NOT NULL,
  `speaker_jop_en` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `event_page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_speaker`
--

INSERT INTO `event_speaker` (`speaker_id`, `speaker_name`, `speaker_name_en`, `speaker_jop`, `speaker_jop_en`, `image1`, `image2`, `event_page`) VALUES
(4, 'فهد احمد', 'fahed ', 'البرمجةسرلقصر', 'programmer', '81119704.Home-Team-Jim-Fahad-Digital.jpg', '45867680.Home-banner-Jim-Fahad-Digital.jpg', 'الذكاء الإصطناعي'),
(5, 'لمار', 'lamar ', 'مسوق الكتروني', '', '73460515.Home-Team-Jim-Fahad-Digital.jpg', '', 'الذكاء الإصطناعي'),
(7, 'اريج', 'arej', 'مبرمج', 'programmer', '91058511.Home-banner-Jim-Fahad-Digital.jpg', '86745665.Home-Team-Jim-Fahad-Digital.jpg', 'الذكاء الإصطناعي'),
(8, 'محمد رمضان', 'mohamed ramadan', 'مبرمج', 'programmer', '93464265.Client-headshot-1-Jim-Fahad-Digital.png', '78039523.Client-headshot-1-Jim-Fahad-Digital.png', 'الذكاء الإصطناعي');

-- --------------------------------------------------------

--
-- Table structure for table `event_sponser`
--

CREATE TABLE `event_sponser` (
  `sponser_id` int(11) NOT NULL,
  `sponser_name` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `sponser_name_en` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `sponser_link` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `event_page` varchar(255) COLLATE utf8_estonian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `event_sponser`
--

INSERT INTO `event_sponser` (`sponser_id`, `sponser_name`, `sponser_name_en`, `sponser_link`, `image1`, `image2`, `event_page`) VALUES
(2, 'ريفايفال', '', 'https://www.google.com', '13586933.ai_logo.png', '', 'الذكاء الإصطناعي'),
(3, 'ادو', 'adow', 'https://www.google.com', '75170442.ai2.jpg', '79534100.Home-Team-Jim-Fahad-Digital.jpg', 'الذكاء الإصطناعي'),
(4, 'الرياضة', '', 'https://www.google.com', '57926991.sport.png', '', 'الذكاء الإصطناعي'),
(5, 'ريفايفال', '', 'https://www.google.com', '58500082.logo3.png', '', 'الذكاء الإصطناعي'),
(6, 'لمار ', 'lamar', 'https://www.google.com', '26272381.Home-banner-Jim-Fahad-Digital.jpg', '6694081.Home-Team-Jim-Fahad-Digital.jpg', 'الذكاء الإصطناعي'),
(7, 'ريفايفال', 'lamar', '', '17145760.2860141.ai_logo.png', '4765862.2813838.jpg', 'الذكاء الإصطناعي');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `faq_q` varchar(255) NOT NULL,
  `faq_q_en` varchar(255) NOT NULL,
  `faq_an` longtext NOT NULL,
  `faq_an_en` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `faq_q`, `faq_q_en`, `faq_an`, `faq_an_en`) VALUES
(2, 'لماذا رفايفال', 'Why Refaeval', 'ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر في مختلف المجالات', 'Simply distinguished cadres consisting of a group of talents from different countries working on developing a creative and innovative project in various fields'),
(3, 'أهمية الخدمات التي نقدمها', 'The importance of our services', '      اذا كنت احدى المواهب التي تم اختيارها للمشاركة في الفعاليات سيتم ارسال نسخة من العقد مباشرة اليك للتوقيع قبل المشاركة.,\r\nأما اذا كنت وسيطاً أو منشأة وقد تم اختيار أحدى المواهب التي قمت بتسجيلها من خلال حسابك سيتم ارسال عقد للموهبة وإقرار لنسبتك من تعا السلاتميسترخهته0تعرخهتعخهراخهتاخهعتاجخاتعيس980ر', '    The importance of our services lies in the fact that it is an essential tributary to renewing development strategies and providing better access to sustainable development through a knowledge-based economy where we develop new and innovative projects w'),
(4, 'انضم الان', 'Join now', 'انظم الآن الى نخبة من محترفي تصميم وصناعة الأزياء والمجوهرات في العالم لتكون واحدا من أدوات نجاح وتميز الملتقى العالمي \"أدو للأزياء والموضة وفن الجسم والمجوهرات\" الذي يعتبر منصّة متميزة تلتقي فيها المواهب الناشئة بالنخب العالمية في مجال التصميم والأزياء و', 'Join now an elite of fashion and jewelry design and manufacturing professionals in the world to be one of the tools of success and excellence in the global forum \"Addo Fashion, Fashion, Body Art and Jewelry\", which is a distinguished platform where emergi'),
(5, 'سوال مفصل ', 'q details', 'اجابة رقم 1 ,\r\nاجابة رقم 2 ,\r\nاجابة رقم 3,\r\n', 'answer one ,\r\nanswer two ,\r\nanswer three ,');

-- --------------------------------------------------------

--
-- Table structure for table `fashion_event_register`
--

CREATE TABLE `fashion_event_register` (
  `reg_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fashion_event_register`
--

INSERT INTO `fashion_event_register` (`reg_id`, `first_name`, `last_name`, `email`, `mobile`, `country`) VALUES
(1, 'mohamed', 'mohamed', 'customer@gmail.com', '01011642731', 'EG');

-- --------------------------------------------------------

--
-- Table structure for table `fash_register`
--

CREATE TABLE `fash_register` (
  `fash_register_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `talent_image` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `specialist` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `work_field` varchar(255) NOT NULL,
  `field` varchar(255) NOT NULL,
  `sub_field` varchar(255) NOT NULL,
  `register_type` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_field` varchar(255) NOT NULL,
  `project_competation` varchar(255) NOT NULL,
  `project_prize` varchar(255) NOT NULL,
  `project_certificate_image` varchar(255) NOT NULL,
  `passport_number` varchar(255) NOT NULL,
  `national_id` varchar(255) NOT NULL,
  `certificate_image` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `user_show` varchar(200) NOT NULL,
  `personal_image` varchar(255) NOT NULL,
  `personal_information` varchar(255) NOT NULL,
  `customer_message` varchar(255) NOT NULL,
  `video_talent` varchar(255) NOT NULL,
  `talent_images` longtext NOT NULL,
  `video1` varchar(255) NOT NULL,
  `video2` varchar(255) NOT NULL,
  `video3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fash_register`
--

INSERT INTO `fash_register` (`fash_register_id`, `first_name`, `last_name`, `email`, `mobile`, `talent_image`, `country`, `specialist`, `certificate`, `work_field`, `field`, `sub_field`, `register_type`, `project_name`, `project_field`, `project_competation`, `project_prize`, `project_certificate_image`, `passport_number`, `national_id`, `certificate_image`, `username`, `password`, `code`, `user_status`, `user_show`, `personal_image`, `personal_information`, `customer_message`, `video_talent`, `talent_images`, `video1`, `video2`, `video3`) VALUES
(28, 'admin', 'admin', 'admin@gmail.com', '111111', 'Capture.PNG ', 'AL', 'موضة', '  بكالوريوس  ', '', '6', 'المجال الاول الفرعي ', ' وسيط / منشأة ', '', '', '  ', '   ', 'Capture.PNG ', '', '', '', 'adminadmin', '11111111', '', 'active', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `form_selection`
--

CREATE TABLE `form_selection` (
  `select_id` int(11) NOT NULL,
  `select_name` longtext NOT NULL,
  `select_sub_name` longtext NOT NULL,
  `select_name_en` longtext NOT NULL,
  `select_sub_name_en` longtext NOT NULL,
  `select_form` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form_selection`
--

INSERT INTO `form_selection` (`select_id`, `select_name`, `select_sub_name`, `select_name_en`, `select_sub_name_en`, `select_form`) VALUES
(5, 'المجال الاول ,\r\nالمجال الثاني ,\r\nالمجال الثالث ,\r\nالمجال الرابع ,\r\nالمجال الخامس ,', 'المجال الفرعي الاول ,\r\nالمجال الفرعي  الثاني ,\r\nالمجال الفرعي  الثالث ,\r\nالمجال الفرعي  الرابع ,\r\nالمجال الفرعي  الخامس ,', 'filed 1 ,\r\nfiled 2 ,\r\nfiled 3 ,\r\nfiled 4 ,\r\nfiled 6 ,\r\nfiled 7 ,', 'filed 1  sub ,\r\nfiled 2  sub,\r\nfiled 3  sub ,\r\nfiled 4  sub ,\r\nfiled 6  suub,', 'ريفايفال'),
(6, 'المجال الاول ,\r\nالمجال الثاني ,', 'المجال الاول الفرعي ,\r\nالمجال الثاني الفرعي ,', 'filed 1 ,\r\nfiled 2 ,', 'sub filed 1,\r\nsub filed 2 ,', 'الأزياء والمجوهرات'),
(7, 'المجال الاول ,\r\nالمجال الثاني ,', 'المجال الاول الفرعي ,\r\nالمجال الثاني الفرعي ,', 'filed 1 ,\r\nfiled 2 ,', 'sub filed 1,\r\nsub filed 2 ,', 'مواهب العالم الرياضية'),
(9, 'المجال الاول بعد التعديل ', 'المجال الفرعي الاول ,\r\nالمجال الفرعي الثاني ,\r\nالمجال الفرعي الثالث ,', 'first filed after edit ', 'first filed ,\r\nsecond filed ,\r\nthird filed ,', 'مدينة الذكاء الإصطناعي'),
(10, 'المجال الثاني  بعد التعديل', '', 'second Filed ', '', 'مدينة الذكاء الإصطناعي');

-- --------------------------------------------------------

--
-- Table structure for table `form_selection_event`
--

CREATE TABLE `form_selection_event` (
  `select_id` int(11) NOT NULL,
  `select_name` varchar(255) NOT NULL,
  `select_name_en` varchar(255) NOT NULL,
  `select_form` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form_selection_event`
--

INSERT INTO `form_selection_event` (`select_id`, `select_name`, `select_name_en`, `select_form`) VALUES
(1, 'الاختيار الاول ,\r\nالاختيار الثاني ,\r\nالاختيار الثالث ,', 'Select 1 ,\r\nselect 2 ,\r\nSelect 3 ,', 'المشاركه في الفعالية'),
(2, 'الاختيار الاول ,\r\nالاختيار الثاني ,\r\nالاختيار الثالث ,', 'Select 1 ,\r\nSelect 2 ,\r\nSelect 3 ,', 'انضم الي فريق');

-- --------------------------------------------------------

--
-- Table structure for table `goin_team`
--

CREATE TABLE `goin_team` (
  `goal_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `choose_you` varchar(255) NOT NULL,
  `files` varchar(255) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goin_team`
--

INSERT INTO `goin_team` (`goal_id`, `first_name`, `last_name`, `email`, `mobile`, `country`, `message`, `choose_you`, `files`, `event_id`) VALUES
(1, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 'th', ' صحفي ', '../../admin_event/uploadaia.jpg ', 4),
(2, 'mohamed', 'mohamed', 'mr319242@gmail.com', '01011642731', 'EG', 'rth', ' صحفي ', '../../admin_event/upload ', 4),
(3, 'mohamed', 'mohamed', 'mr319242@gmail.com', '01011642731', 'EG', 'rth', ' صحفي ', '../../admin_event/upload ', 4),
(4, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 'فات', ' متحدث ', '../../admin_event/uploadClient-headshot-3-Jim-Fahad-Digital.png ', 4),
(5, 'lamar', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 'yutyu', '\r\nالاختيار الثاني ', '../../admin_event/upload35f168fb-a2cd-49d8-ac2a-74f93be08880-300x300.jpg ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `investment`
--

CREATE TABLE `investment` (
  `invest_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `facility_name` varchar(255) NOT NULL,
  `talent_id` int(200) NOT NULL,
  `cat_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `main_events`
--

CREATE TABLE `main_events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_name_en` varchar(255) NOT NULL,
  `event_logo` varchar(255) NOT NULL,
  `event_active` varchar(200) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `regsiter_early_start` date NOT NULL,
  `regsiter_early_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_events`
--

INSERT INTO `main_events` (`event_id`, `event_name`, `event_name_en`, `event_logo`, `event_active`, `event_date`, `event_time`, `regsiter_early_start`, `regsiter_early_end`) VALUES
(4, 'الذكاء الإصطناعي', 'Artififcial Intellegece', '92611705.aia.jpg', 'فعال', '2022-12-30', '17:33:00', '2022-12-01', '2022-12-30'),
(5, 'المواهب الرياضية', 'Sports Talent', '53957894.sport.png', 'غير فعال', '0000-00-00', '00:00:00', '0000-00-00', '0000-00-00'),
(6, 'الازياء والمجوهرات', 'Fashion', '1830495.ai2.jpg', 'فعال', '0000-00-00', '00:00:00', '0000-00-00', '0000-00-00'),
(10, 'الحدث الثاني ', 'Fashion', '41835748.header1.jpg', 'غير فعال', '2022-12-01', '11:37:00', '2022-12-15', '2022-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `new_id` int(11) NOT NULL,
  `new_title` varchar(255) NOT NULL,
  `new_title_en` varchar(255) NOT NULL,
  `new_desc` longtext NOT NULL,
  `new_desc_en` longtext NOT NULL,
  `new_category` varchar(255) NOT NULL,
  `new_date` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`new_id`, `new_title`, `new_title_en`, `new_desc`, `new_desc_en`, `new_category`, `new_date`, `image1`, `image2`) VALUES
(1, 'انضم الان', 'The importance of our services', '    rter  ', '  rtewrt', 'art_int', '', '62246912.college.jpg', '96642891.college.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `reg_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `specialist` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `employee` varchar(255) NOT NULL,
  `field` varchar(200) NOT NULL,
  `sub_field` varchar(200) NOT NULL,
  `reg_type` varchar(200) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `personal_image` varchar(255) NOT NULL,
  `personal_information` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `videos` varchar(255) NOT NULL,
  `customer_message` varchar(250) NOT NULL,
  `video1` varchar(255) NOT NULL,
  `video2` varchar(255) NOT NULL,
  `video3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `first_name`, `last_name`, `email`, `mobile`, `country`, `specialist`, `certificate`, `employee`, `field`, `sub_field`, `reg_type`, `username`, `password`, `code`, `user_status`, `personal_image`, `personal_information`, `cv`, `videos`, `customer_message`, `video1`, `video2`, `video3`) VALUES
(15, 'lamar', 'mohamed ramadan', 'mr31ssss9242@gmail.com', '01011642731', 'EG', 'مهندس', '  بكالوريوس  ', '', '5', '\r\nالمجال الفرعي  الثالث ', '', '2', 'mohamedramadan', '', '', 'ai_logo.png ', 'السلام عليكم تم التسجيل في ريفايفال', 'event_pro.jpg event_pro2.jpg event1.jpg ', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `revival_about_us`
--

CREATE TABLE `revival_about_us` (
  `about_id` int(11) NOT NULL,
  `about_name` varchar(255) NOT NULL,
  `about_desc` longtext NOT NULL,
  `about_desc_en` longtext NOT NULL,
  `about_sub_desc` longtext NOT NULL,
  `about_sub_desc_en` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `video1` varchar(255) NOT NULL,
  `video2` varchar(255) NOT NULL,
  `about_page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `revival_about_us`
--

INSERT INTO `revival_about_us` (`about_id`, `about_name`, `about_desc`, `about_desc_en`, `about_sub_desc`, `about_sub_desc_en`, `image1`, `image2`, `video1`, `video2`, `about_page`) VALUES
(6, 'من نحن الرئيسية  ', 'شركة متخصصة في تطوير مشاريع إبداعية ومبتكرة في مجال الأحداث الرياضة والتصاميم المخصصة والذكاء الاصطناعي والابتكار تهدف إلى دعم الاقتصاد من خلال تنمية الأصول المهمة في الاقتصاد الجديد وهي: المعرفة الفنية، والإبداع والذكاء الاصطناعي، والمعلومات، بهدف تطوير نظام اقتصادي يمثل فيه العلم الكيفي والنوعي والإبداعي عنصر الإنتاج الأساسي والقوة الدافعة لإنتاج الثورة لتهيئة علاقة إبداعيّة” فعّالة من أجل جذب المستثمرين وبناء مشاريع إ بداعيّة لتجديد الاستراتيجيات التنموية وتوفير وصول أفضل إلى التنمية المستدامة من خلال الاقتصاد القائم على المعرفة والابتكار الذي يعتبر من أسرع القطاعات نمواً في الاقتصاد العالمي، وأكثرها نشاطاً من حيث الإنتاجية والعوائد، وتوفير فرص العمل معتمدين على عنصرين أساسيين هما', 'A company specialized in developing creative and innovative projects in the field of sports events, custom designs, artificial intelligence and innovation aimed at supporting the economy by developing important assets in the new economy: technical knowledge, creativity, artificial intelligence, and information, with the aim of developing an economic system in which qualitative, qualitative and creative science is an element The basic production and the driving force for the production of the revolution to create an effective “creative relationship” in order to attract investors and build innovative projects to renew development strategies and provide better access to sustainable development through the economy based on knowledge and innovation, which is one of the fastest growing sectors in the global economy, and the most active in terms of productivity Revenues, and job creation depend on two main elements:', ' المعرفة والابداع ,\r\n الذكاء الاصطناعي والابتكار ,  jpo', 'knowledge and creativity ,\r\n  artificial intelligence and innovation ,', '50465571.4525984.art1.jpg', '', '66938117.3 laravel 9 installation first project laravel.mp4', '21659361.5419366.The 30-Second Video.mp4', 'الرئيسية'),
(7, 'من نحن مدينة الذكاء', 'انضم الآن الى قائمة محترفي التقنية في نادي الذكاء الاصطناعي والميتافيرس التابع لمدينة Aivr City أول مدينة ذكاء اصطناعي وواقع افتراضي في الشرق الأوسط التي تعمل على تطوير مشاريع اقتصادية واجتماعية خاصة ومبتكرة في عالم الميتافيرس بعقول عباقرة العالم العربي والإسلامي لرسم مستقبل الميتا فيرس ودعم التطوير التقني في العالم من خلال استثمار العقول الموهوبة ودعم الأبحاث التقنية بطريقة تفاعلية جديدة ومبتكرة، تسهم في تحقيق نمو مستدام في الاقتصاد المعرفي، وتحقيق التقدم التقني والمالي للمشاركين....', 'Join now the list of technology professionals in the Artificial Intelligence and Metavirus Club of Aivr City, the first artificial intelligence and virtual reality city in the Middle East that works to develop special and innovative economic and social projects in the world of metaviruses with the minds of the geniuses of the Arab and Islamic world to chart the future of metavirus and support technical development in the world By investing talented minds and supporting technical research in a new and innovative interactive way, it contributes to achieving sustainable growth in the knowledge economy, and achieving technical and financial progress for the participants....', '', '', '10883920.8557998.art3.jpg', '82586565.14949203.joao-logo.jpg', '3393554.2.mp4', '7052876.365545.1349072.79224703.The 30-Second Video.mp4', 'مدينة الذكاء الإصطناعي'),
(8, 'من نحن المواهب الرياضية', 'هل تمتلك موهبة رياضية في اللعب او التدريب أو التحكيم أو التعليق الرياضي في أي مجال من المجالات الرياضية كرة القدم، العاب القوى الألعاب الفردية ...الخ بادر بالتسجيل في نادي مواهب العالم الرياضية الذي يعمل على صقل المواهب الرياضية ونقلها الى العالمية من خلال تنظيم أحداث عالمية حصرية ومبتكرة بادر بالتسجيل لتكون جزء من الحدث العالمي القادم واحصل على الدعم من البداية الى العالمية', 'Do you have a sports talent in playing, training, refereeing or sports commentary in any field of sports, football, athletics, individual games ... etc. Take the initiative to register in the World Sports Talents Club, which works to refine sports talents and transfer them to the world through organizing events International exclusive and innovative Register to be part of the next global event and get support from the beginning to the world', 'oio', '', '82173570.10264648.fashion.jpg', '19028387.12790730.event2.jpg', '64200451.The 30-Second Video.mp4', '91812161.7563545.The 30-Second Video.mp4', 'مواهب العالم الرياضية'),
(9, 'من نحن الموضة', 'انظم الآن الى نخبة من محترفي تصميم وصناعة الأزياء والمجوهرات في العالم لتكون واحدا من أدوات نجاح وتميز الملتقى العالمي أدو للأزياء والموضة وفن الجسم والمجوهرات الذي يعتبر منصّة متميزة تلتقي فيها المواهب الناشئة بالنخب العالمية في مجال التصميم والأزياء وفن الجسم والمجوهرات والمصانع والماركات العالمية والمشاهير، ومحبي الموضة والأزياء، صمم خصيصا لتحويل التصاميم الإبداعية الى منتجات تعرض أمام أكبر جمهور مهتم بالأزياء والموضة ، بدعم ورعاية ملتقى أدو تسلطون الضوء على أعمالكم فبادروا بالمشاركة في تصاميم الأزياء أو الإكسسوارات أو المجوهرات لنصنع منها منتجات عالمية تشارك في الحدث الأضخم والأبرز في الشرق الأوسط للموضة والأزياء والمجوهرات', 'Join now an elite of fashion and jewelry design and industry professionals in the world to be one of the tools of success and distinction of the global forum Addo for fashion, fashion, body art and jewelry, which is a distinguished platform where emerging talents meet with global elites in the field of design, fashion, body art, jewelry, factories, international brands, celebrities, and fashion lovers And fashion, specially designed to transform creative designs into products that are presented to the largest audience interested in fashion and fashion, with the support and sponsorship of ADDO Forum.', '', '', '36534485.515441.fash6.jpg', '35976539.515441.fash6.jpg', '36092460.7563545.The 30-Second Video.mp4', '91550571.111.mp4', 'الأزياء والمجوهرات');

-- --------------------------------------------------------

--
-- Table structure for table `revival_add_project`
--

CREATE TABLE `revival_add_project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_desc` longtext NOT NULL,
  `certificate_register` varchar(255) NOT NULL,
  `eng_draw` varchar(255) NOT NULL,
  `prototype` varchar(255) NOT NULL,
  `project_images` varchar(255) NOT NULL,
  `project_video` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `project_status` varchar(200) NOT NULL,
  `project_show` varchar(250) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `revival_banner`
--

CREATE TABLE `revival_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_name` varchar(250) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `banner_page` varchar(255) NOT NULL,
  `banner_head` varchar(255) NOT NULL,
  `banner_head_en` varchar(255) NOT NULL,
  `banner_desc` varchar(255) NOT NULL,
  `banner_desc_en` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `revival_banner`
--

INSERT INTO `revival_banner` (`banner_id`, `banner_name`, `image1`, `image2`, `banner_page`, `banner_head`, `banner_head_en`, `banner_desc`, `banner_desc_en`) VALUES
(2, 'البانر 1 ', '12790730.event2.jpg', '72531575.art2.jpg', 'الرئيسية', 'شركه ريفايفال للمعرفة والابداع', 'REVIVAL COMPANY FOR KNOWLEDGE AND CREATIVITY', 'شركة متخصصة في تطوير مشاريع إبداعية ومبتكرة في مجال الأحداث الرياضة والتصاميم المخصصة والذكاء الاصطناعي والابتكار', 'is specialize in developing creative and innovative projects in the field of sports events, custom designs, artificial intelligence and innovation.'),
(5, 'البانر 4', '4525984.art1.jpg', '55435681.art1.jpg', 'مدينة الذكاء الإصطناعي', 'AIVR CITY', 'AIVR CITY', 'مدينة الذكاء الإصطناعي والواقع الإفتراضي', 'Artificial Intelligence and Metavirus Club'),
(10, 'البانر5', '76326492.35f168fb-a2cd-49d8-ac2a-74f93be08880-300x300.jpg', '58161065.art2.jpg', 'مدينة الذكاء الإصطناعي', 'AIVR CITY', 'AIVR CITY', 'مدينة الذكاء الإصطناعي والواقع الإفتراضي', 'Artificial Intelligence and Metavirus Club'),
(11, 'البانر 6', '16883644.art3.jpg', '92716862.art3.jpg', 'مدينة الذكاء الإصطناعي', 'AIVR CITY', 'AIVR CITY', 'مدينة الذكاء الإصطناعي والواقع الإفتراضي', 'Artificial Intelligence and Metavirus Club'),
(12, 'البانر 7', '96221764.sport.jpg', '62853461.sport.jpg', 'مواهب العالم الرياضية', 'مواهب العالم الرياضية', 'WORLD SPORTS TALENTS', '.', '.'),
(13, 'البانر 8', '24712208.sport1.jpg', '51589634.sport1.jpg', 'مواهب العالم الرياضية', 'مواهب العالم الرياضية', 'WORLD SPORTS TALENTS', '.', '.'),
(14, 'البانر 9', '7706801.sport3.jpg', '30943913.sport3.jpg', 'مواهب العالم الرياضية', 'مواهب العالم الرياضية', 'WORLD SPORTS TALENTS', '.', '.'),
(15, 'البانر 10', '19330034.fashion.jpg', '10264648.fashion.jpg', 'الأزياء والمجوهرات', 'تصميم الأزياء', 'FASHION DESIGNING', 'انظم الآن الى نخبة من محترفي تصميم وصناعة الأزياء والمجوهرات في العالم', 'Join now an elite group of professionals in the design and manufacture of fashion and jewelry in the world'),
(16, 'البانر 11', '87867325.fash6.jpg', '515441.fash6.jpg', 'الأزياء والمجوهرات', 'تصميم الأزياء', 'FASHION DESIGNING', 'انظم الآن الى نخبة من محترفي تصميم وصناعة الأزياء والمجوهرات في العالم', 'Join now an elite group of professionals in the design and manufacture of fashion and jewelry in the world'),
(17, 'البانر 12', '96721837.fash4.jpg', '40678234.fash4.jpg', 'الأزياء والمجوهرات', 'تصميم الأزياء', 'FASHION DESIGNING', 'انظم الآن الى نخبة من محترفي تصميم وصناعة الأزياء والمجوهرات في العالم', 'Join now an elite group of professionals in the design and manufacture of fashion and jewelry in the world'),
(18, 'البانر 2', '59676018.art1.jpg', '28347695.art1.jpg', 'الرئيسية', 'شركه ريفايفال للمعرفة والابداع', 'REVIVAL COMPANY FOR KNOWLEDGE AND CREATIVITY', 'شركة متخصصة في تطوير مشاريع إبداعية ومبتكرة في مجال الأحداث الرياضة والتصاميم المخصصة والذكاء الاصطناعي والابتكار', 'is specialize in developing creative and innovative projects in the field of sports events, custom designs, artificial intelligence and innovation.'),
(19, 'البانر 3', '99097965.art3.jpg', '53101960.art3.jpg', 'الرئيسية', 'شركه ريفايفال للمعرفة والابداع', 'REVIVAL COMPANY FOR KNOWLEDGE AND CREATIVITY', 'شركة متخصصة في تطوير مشاريع إبداعية ومبتكرة في مجال الأحداث الرياضة والتصاميم المخصصة والذكاء الاصطناعي والابتكار', 'is specialize in developing creative and innovative projects in the field of sports events, custom designs, artificial intelligence and innovation.');

-- --------------------------------------------------------

--
-- Table structure for table `revival_gallary`
--

CREATE TABLE `revival_gallary` (
  `gallary_id` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `revival_gallary`
--

INSERT INTO `revival_gallary` (`gallary_id`, `image1`, `image2`) VALUES
(4, '14218021.art_state.jpg', '47075114.art1.jpg'),
(5, '67718969.art3.jpg', '64635459.art3.jpg'),
(6, '5505131.course_image.jpg', '98246322.art2.jpg'),
(7, '25398527.event_pro2.jpg', '98096298.event_pro2.jpg'),
(8, '99707401.event_pro.jpg', '31053792.event_pro.jpg'),
(9, '34779844.event1.jpg', '92148907.event4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `revival_goals`
--

CREATE TABLE `revival_goals` (
  `goal_id` int(11) NOT NULL,
  `goal_head` longtext NOT NULL,
  `goal_head_en` longtext NOT NULL,
  `goal_desc` longtext NOT NULL,
  `goal_desc_en` longtext NOT NULL,
  `vision_head` varchar(255) NOT NULL,
  `vision_head_en` longtext NOT NULL,
  `vision_desc` longtext NOT NULL,
  `vision_desc_en` longtext NOT NULL,
  `message_head` varchar(255) NOT NULL,
  `message_head_en` varchar(255) NOT NULL,
  `message_desc` longtext NOT NULL,
  `message_desc_en` longtext NOT NULL,
  `goal_page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `revival_goals`
--

INSERT INTO `revival_goals` (`goal_id`, `goal_head`, `goal_head_en`, `goal_desc`, `goal_desc_en`, `vision_head`, `vision_head_en`, `vision_desc`, `vision_desc_en`, `message_head`, `message_head_en`, `message_desc`, `message_desc_en`, `goal_page`) VALUES
(1, 'اهدافنا', 'Our Goals', 'دعم الاقتصاد بمشاريع عالمية إبداعية ومبتكرة تجذب المستثمرين وتسهم في تحقيق التنمية المستدامة وتوفر فرص عمل.', 'Supporting the economy with creative and innovative global projects that attract investors, contribute to achieving sustainable development and provide job opportunities.', 'رؤيتنا', 'Our Vision', 'ريادة وتميز في تطوير مشاريع عالمية إبداعية مبتكرة راس مالها المعرفة.', 'Leadership and excellence in the development of innovative, creative global projects with a capital of knowledge.', 'رسالتنا', 'Our Message', 'خلق فرص استثمارية بمعايير دولية تسهم في بناء الاقتصاد المعرفي القائم على المعرفة والذكاء الاصطناعي وتوفير بيئة جاذبة للمستثمرين، تهيئ سُبل الشراكة المحلية والعالمية الفاعلة.', 'Creating investment opportunities with international standards that contribute to building a knowledge-based economy based on knowledge and artificial intelligence and providing an attractive environment for investors that creates effective local and global partnerships.', 'الرئيسية'),
(2, 'اهدافنا', 'Our Goals', 'ابتكار مشاريع إبداعية في مجال عالم الذكاء الافتراضي والميتا فيرس, \r\nاستثمار المواهب والمعرفة لصناعة مستقبل تقني واعد , \r\nمواكبة العالم لإنتاج مشاريع تقنية تتوافق مع النظرة المستقبلية لتوجه العالم ,', 'Creating creative projects in the field of virtual intelligence and metavirus,\r\nInvesting talents and knowledge to create a promising technical future,\r\nKeeping pace with the world to produce technical projects that are compatible with the future vision of the world\'s orientation,', 'رؤيتنا', 'Our Vision', 'الريادة العالمية في تطوير تقنيات الذكاء الإصطناعي في المجالات الصناعية والعلمية والتجارية المستخدمة في الميتافيرس', 'Global leadership in the development of artificial intelligence techniques in the industrial, scientific and commercial fields used in metaverses', 'رسالتناi', 'Our Message', 'المساهمة في تطوير تقنيات الذكاء الإصطناعي ودعم الأبحاث المخصصة فيها لإبتكار أجهزة جديدة تدعم الميتا فيرس من خلال إستثمار نتاج عقول المواهب في العالم العربي والإسلامي وصناعة الإستدامة في الإقتصاد المعرفي', 'Contribute to the development of artificial intelligence techniques and support research dedicated to it to create new devices that support the meta-virus by investing the product of talented minds in the Arab and Islamic world and the sustainability industry in the knowledge economy', 'مدينة الذكاء الإصطناعي');

-- --------------------------------------------------------

--
-- Table structure for table `revival_order_services`
--

CREATE TABLE `revival_order_services` (
  `order_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `files` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `revival_order_services`
--

INSERT INTO `revival_order_services` (`order_id`, `first_name`, `last_name`, `email`, `mobile`, `service_name`, `country`, `message`, `files`, `order_status`) VALUES
(3, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'Sports Talents', 'EG', 'kikk', 'logo.jpg ', ''),
(4, 'lamar', 'mohamed ramadan', 'mr319242@gmail.com', '01011642731', 'Sports Talents', 'EG', 'rfsrsrsrrsr', 'success.php ', ''),
(5, 'Mohamed', 'mohamed ramadan', 'mr319242@gmail.com', '01011642731', 'Fashion and Jewelery', 'EG', 'trtrrrtr', 'config.php ', ''),
(6, 'Mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'Sports Talents', 'EG', 'dferdtret', 'config.php ', '');

-- --------------------------------------------------------

--
-- Table structure for table `revival_terms`
--

CREATE TABLE `revival_terms` (
  `term_id` int(11) NOT NULL,
  `term_name` varchar(200) NOT NULL,
  `term_name_en` varchar(200) NOT NULL,
  `term_data` longtext NOT NULL,
  `term_data_en` longtext NOT NULL,
  `term_page` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `revival_terms`
--

INSERT INTO `revival_terms` (`term_id`, `term_name`, `term_name_en`, `term_data`, `term_data_en`, `term_page`) VALUES
(3, 'شروط التسجيل في الذكاء الاصطناعي :', 'Conditions for registration in artificial intelligence :', 'يجب التسجيل بالاسم الحقيقي.,\r\nالالتزام بعدم تضمين الفيديوهات او الصور أي بيانات تواصل مباشرة او غير مباشرة,\r\nتضمين أي بيانات تواصل مباشرة او غير مباشرة او نقل رابط معلوماتك الخاصة الى وسائل التواصل يعرضك لإلغاء عضويتك في مواهب الرياضة.,\r\nعند تسجيلك في الموقع يجب عليك الالتزام بإنهاء إجراءات التعاقد المرسلة الى ايميلك لعرض بياناتك على الموقع وترشحك للمشاركة في الحدث العالمي.,\r\nلا يحق لي عضو تمثيل الشركة والتسويق لها بشكل رسمي الا بخطاب رسمي.,\r\nلا أمانع من عرض موهبتي على الجهات واللجان المعنية او عرضها في المكان الذي تراه الشركة مناسبا.  ,\r\nيتعهد المشارك أن المشاريع التي سيشارك بها هي مشاريع خاصة به ولم ينتهك حقوق أي جهة أو فرد. ,\r\nيلتزم المشارك بالحفاظ على سرية المعلومات الخاصة بالمشاركات والمشاريع الجماعية.,\r\nاستخدام أي معلومات او مشاريع تم عرضها عليك او اطلعت عليها في الشركة أو نشرها يعرضك للمسألة القانونية.,\r\nعند المشاركة بمنتجك او مشروعك في أي فعالية سيتم تقيع عقد رسمي معك في حينها.,\r\nالتسجيل في قسم مواهب الذكاء الاصطناعي لا يشمل التسجيل لا يشمل التسجيل في الفعاليات.,\r\nلا أمانع من عرض مشروعي او تصميمي على الجهات واللجان المعنية او عرضها في المكان الذي تراه الشركة مناسبا دون انتهاك حقوقي. ,\r\nيحق لإدارة أدو تغيير الشروط دون اشعار أي طرف.,\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'You must register with your real name.,\r\nCommitment not to include with videos or photos, any direct or indirect communication data.,\r\nIncluding any direct or indirect communication data, or transferring your private information link to social media, exposes you to canceling your membership in Sports Talents.,\r\nWhen you register on the site, you must commit to completing the contracting procedures sent to your email to display your data on the site and nominate you to participate in the global event.,\r\nNo member has the right to represent the company and to market it officially, except by an official letter.,\r\nI do not mind presenting my talent to the concerned authorities and committees, or displaying it in the place the company deems appropriate.,\r\nThe participant undertakes that the projects in which he will participate are his own and have not violated the rights of any party or individual.,\r\nThe participant is obligated to maintain the confidentiality of information related to the participation and group projects.\r\n,\r\nThe use or publication of any information or projects presented to you or you saw in the company exposes you to legal liability.,\r\nWhen participating with your product or project in any event, an official contract will be signed with you at the time.,\r\nRegistration in the Department of Artificial Intelligence talents does not include registration in the  events.,\r\nI do not mind presenting my project or design to the concerned authorities and committees, or displaying it in the place the company deems appropriate without violating my rights.,\r\nADDO management has the right to change the terms without notifying any party.,', 'مدينة الذكاء الإصطناعي'),
(4, 'شروط التسجيل في أدو:', 'ADDO Registration Terms:', 'يجب التسجيل بالاسم الحقيقي.,\r\nالالتزام بعدم تضمين الفيديوهات او الصور أي بيانات تواصل مباشرة او غير مباشرة,\r\nتضمين أي بيانات تواصل مباشرة او غير مباشرة او نقل رابط معلوماتك الخاصة الى وسائل التواصل يعرضك لإلغاء عضويتك في مواهب الرياضة.,\r\nعند تسجيلك في الموقع يجب عليك الالتزام بإنهاء إجراءات التعاقد المرسلة الى ايميلك لعرض بياناتك على الموقع وترشحك للمشاركة في الحدث العالمي.,\r\nلا يحق لي عضو تمثيل الشركة والتسويق لها بشكل رسمي الا بخطاب رسمي.,\r\nالتسجيل في قسم مواهب الأزياء والمجوهرات وفن الجسم لا يشمل التسجيل لا يشمل التسجيل في الفعاليات.,\r\nلا أمانع من عرض موهبتي على الجهات واللجان المعنية او عرضها في المكان الذي تراه الشركة مناسبا,\r\nلا أمانع من عرض مشروعي او تصميمي على الجهات واللجان المعنية او عرضها في المكان الذي تراه الشركة مناسبا,\r\nيتعهد المشارك بأن التصاميم التي سيشارك بها تصاميم خاصه به ولم ينتهك حقوق أي شخص أو جهة ويتحمل كل ما يترتب عن ذلك.\r\n,\r\nيتم تفعيل مشاركة العضو في الفعاليات عند ترشيحه وتعبئة الاستمارة الخاصة بالمشاركة وفق شروط الفعالية.\r\n,\r\nيقدم تصاميم تتواكب مع الموضة وفق شروط الفعالية في حينها.\r\n,\r\nالمصانع المشاركة تتعهد بعدم نشر تصاميم أدو او صناعتها له او للغير او وضعها في صفحاته او موقعه على الانترنت او وسيلة أخرى,\r\nلا يحق لأي شخص او جهة استخدام شعار الملتقى بأي شكل من الاشكال على منتجاته الا بموافقه خطية او بموجب تعاقد.\r\n,\r\nاكمال التسجيل يؤكد اطلاعك على الية المشاركة بالأعمال في فعاليات أدو.,\r\nيحق لإدارة أدو تغيير الشروط دون اشعار أي طرف.,\r\n\r\n\r\n\r\n\r\n\r\n', 'You must register with your real name.,\r\nCommitment not to include videos or photos, any direct or indirect communication data.,\r\nIncluding any direct or indirect communication data, or transferring your private information link to social media, exposes you to canceling your membership in Sports Talents.,\r\nWhen you register on the site, you must commit to completing the contracting procedures sent to your email to display your data on the site and nominate you to participate in the global event.,\r\nI have no right to represent the company and to market it officially, except by an official letter.,\r\nRegistration in the Department of Fashion, Jewelery and Body Art Talents does not include registration and does not include registration in events.,\r\nI do not mind presenting my talent to the concerned authorities and committees, or displaying it in the place the company deems appropriate.,\r\nI do not mind presenting my project or design to the concerned authorities and committees, or presenting it in the place the company deems appropriate.,\r\nThe participant undertakes that the designs that he will participate with are his own designs and did not violate the rights of any person or entity and bear all the consequences thereof.,\r\nThe member\'s participation in the events is activated upon his nomination and the filling of the form for participation in accordance with the terms of the event.,\r\nHe will Provide designs that keep pace with fashion according to the conditions of the event in a timely manner.,\r\nParticipating factories pledge not to publish Ado\'s designs or manufacture them for them or others, or put them on his pages or website or any other means.,\r\nNo person or entity has the right to use the Forum\'s logo in any way on its products, except with a written consent or under a contract.,\r\nCompleting the registration confirms that you are aware of the mechanism of business participation in ADDO events.,\r\n ADDO management has the right to change the terms without notifying any party.,', 'الأزياء والمجوهرات'),
(5, 'شروط مواهب العالم الرياضية:', 'Conditions for the world\'s sports talents:', 'يجب التسجيل بالاسم الحقيقي,\r\nالالتزام بعدم تضمين الفيديوهات او الصور أي بيانات تواصل مباشرة او غير مباشرة.,\r\nتضمين أي بيانات تواصل مباشرة او غير مباشرة او نقل رابط معلوماتك الخاصة الى وسائل التواصل يعرضك لإلغاء عضويتك في مواهب الرياضة.\r\n,\r\nعند تسجيلك في الموقع يجب عليك الالتزام بإنهاء إجراءات التعاقد المرسلة الى ايميلك لعرض بياناتك على الموقع وترشحك للمشاركة في الحدث العالمي.\r\n,\r\nلا يحق لي عضو تمثيل الشركة والتسويق لها بشكل رسمي الا بخطاب رسمي,\r\nلا أمانع من عرض موهبتي على الجهات واللجان المعنية او عرضها في المكان الذي تراه الشركة مناسبا.  \r\n,\r\nلا يحق لي نشر الفيديوهات التي تم تسليمها لريفايفال، او وضع أي إشارة تدل على عنواني او بيناتي في الفيديوهات والملفات المرفقة لضمان عدم استبعادها.\r\n,\r\nاعلم جيد أن تعاطي المنشطات ممنوع في الرياضة العالمية.,\r\n اقر أنني غير متعاقد مع أي نادي او جهة رياضية رسمية واذا اتضح عكس ذلك اتحمل ما ينتج عن ذلك.,\r\nلا يحق لي التعاقد مع أي جهة بعد التعاقد مع ريفايفال او نشر فيديوهات عن موهبتي الا عن طريق ريفايفال والتزم بكل بنود العقد.,\r\nالتسجيل في قسم مواهب الرياضة لا يشمل التسجيل لا يشمل التسجيل في الفعاليات.,\r\n يحق لإدارة أدو تغيير الشروط دون اشعار أي طرف.,\r\n\r\n\r\n', 'You must register with your real name.,\r\nCommitment not to include videos or photos, any direct or indirect communication data.,\r\nIncluding any direct or indirect communication data, or transferring your private information link to social media, exposes you to canceling your membership in Sports Talents.,\r\nWhen you register on the site, you must commit to completing the contracting procedures sent to your email to display your data on the site and nominate you to participate in the global event.,\r\nI have no right to represent the company and to market it officially, except by an official letter.,\r\nI do not mind presenting my talent to the concerned authorities and committees, or displaying it in the place the company deems appropriate.,\r\nI have no right to publish videos that have been submitted to Revival, or to put any indication of my address or data in the videos and attached files to ensure that they are not excluded.,\r\nI know very well that doping is prohibited in international sports.,\r\n I declare that I am not contracted with any club or official sports body, and if it turns out to be the contrary, I will bear the consequences of that.,\r\n  I have no right to contract with any party after contracting with Revival or to publish videos about my talent except through Revival and I abide by all the terms of the contract.,\r\nRegistration in the sports talents section does not include registration in events.,\r\nADDO management has the right to change the terms without notifying any party.	,', 'مواهب العالم الرياضية'),
(6, 'شروط التسجيل في ريفايفال:', 'REVIVAL REGISTRATION CONDITIONS:', 'يجب التسجيل بالاسم الحقيقي.,\r\nالتسجيل في موقع الشركة يخص طلب الوظائف ولا يشمل التسجيل في في اقسام الأنشطة أو الفعاليات.,\r\n لا يحق لي عضو تمثيل الشركة والتسويق لها بشكل رسمي الا بخطاب رسمي,\r\n اتعهد بتقديم بيانات ومستندات صحيحة,\r\n في حالة انتهاك العضو لحقوق الملكية الفكرية أو السطو العلمي على حقوق الغير تؤخذ ضد العضو المخالف الاجراءات القانونية المناسبة ويتحمل كافة التبعات.,\r\n يتعهد العضو بعدم استخدام او نقل أي مادة لأي موقع لحسابه او لحساب الغير بأي شكل من الأشكال، وفي حال فعل ذلك يتحمل النتائج المترتبة على ذلك.,\r\n\r\n\r\n\r\n', 'You must register with your real name.,\r\nRegistration on the company\'s website is related to the job application and does not include registration in the activities or events sections.,\r\nI have no right to represent the company and to market it officially, except by an official letter.,\r\nI pledge to provide correct data and documents.,\r\nIn the event of a member\'s violation of intellectual property rights or scientific theft of the rights of others, appropriate legal measures are taken against the violating member and he bears all the consequences.,\r\nThe member undertakes not to use or transfer any material to any site for his account or for the account of others in any way, and if he does so, he shall bear the consequences thereof.,', 'الرئيسية'),
(7, 'شروط طلب الخدمة', 'Terms of Service Request', 'يجب التسجيل بالاسم الحقيقي.,\r\nالالتزام بعدم تضمين الفيديوهات او الصور أي بيانات تواصل مباشرة او غير مباشرة,\r\nتضمين أي بيانات تواصل مباشرة او غير مباشرة او نقل رابط معلوماتك الخاصة الى وسائل التواصل يعرضك لإلغاء عضويتك في مواهب الرياضة.,\r\nعند تسجيلك في الموقع يجب عليك الالتزام بإنهاء إجراءات التعاقد المرسلة الى ايميلك لعرض بياناتك على الموقع وترشحك للمشاركة في الحدث العالمي.,\r\nلا يحق لي عضو تمثيل الشركة والتسويق لها بشكل رسمي الا بخطاب رسمي.,\r\nالتسجيل في قسم مواهب الأزياء والمجوهرات وفن الجسم لا يشمل التسجيل لا يشمل التسجيل في الفعاليات.,\r\nلا أمانع من عرض موهبتي على الجهات واللجان المعنية او عرضها في المكان الذي تراه الشركة مناسبا,\r\nلا أمانع من عرض مشروعي او تصميمي على الجهات واللجان المعنية او عرضها في المكان الذي تراه الشركة مناسبا,\r\nيتعهد المشارك بأن التصاميم التي سيشارك بها تصاميم خاصه به ولم ينتهك حقوق أي شخص أو جهة ويتحمل كل ما يترتب عن ذلك.\r\n,\r\nيتم تفعيل مشاركة العضو في الفعاليات عند ترشيحه وتعبئة الاستمارة الخاصة بالمشاركة وفق شروط الفعالية.\r\n,\r\nيقدم تصاميم تتواكب مع الموضة وفق شروط الفعالية في حينها.\r\n,\r\nالمصانع المشاركة تتعهد بعدم نشر تصاميم أدو او صناعتها له او للغير او وضعها في صفحاته او موقعه على الانترنت او وسيلة أخرى,\r\nلا يحق لأي شخص او جهة استخدام شعار الملتقى بأي شكل من الاشكال على منتجاته الا بموافقه خطية او بموجب تعاقد.\r\n,\r\nاكمال التسجيل يؤكد اطلاعك على الية المشاركة بالأعمال في فعاليات أدو.,\r\nيحق لإدارة أدو تغيير الشروط دون اشعار أي طرف.,\r\n', 'You must register with your real name.,\r\nCommitment not to include videos or photos, any direct or indirect communication data.,\r\nIncluding any direct or indirect communication data, or transferring your private information link to social media, exposes you to canceling your membership in Sports Talents.,\r\nWhen you register on the site, you must commit to completing the contracting procedures sent to your email to display your data on the site and nominate you to participate in the global event.,\r\nI have no right to represent the company and to market it officially, except by an official letter.,\r\nRegistration in the Department of Fashion, Jewelery and Body Art Talents does not include registration and does not include registration in events.,\r\nI do not mind presenting my talent to the concerned authorities and committees, or displaying it in the place the company deems appropriate.,\r\nI do not mind presenting my project or design to the concerned authorities and committees, or presenting it in the place the company deems appropriate.,\r\nThe participant undertakes that the designs that he will participate with are his own designs and did not violate the rights of any person or entity and bear all the consequences thereof.,\r\nThe member\'s participation in the events is activated upon his nomination and the filling of the form for participation in accordance with the terms of the event.,\r\nHe will Provide designs that keep pace with fashion according to the conditions of the event in a timely manner.,\r\nParticipating factories pledge not to publish Ado\'s designs or manufacture them for them or others, or put them on his pages or website or any other means.,\r\nNo person or entity has the right to use the Forum\'s logo in any way on its products, except with a written consent or under a contract.,\r\nCompleting the registration confirms that you are aware of the mechanism of business participation in ADDO events.,\r\n ADDO management has the right to change the terms without notifying any party.,', 'طلب خدمة');

-- --------------------------------------------------------

--
-- Table structure for table `share_event`
--

CREATE TABLE `share_event` (
  `share_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `choose_you` varchar(255) NOT NULL,
  `files` varchar(255) NOT NULL,
  `event_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `share_event`
--

INSERT INTO `share_event` (`share_id`, `first_name`, `last_name`, `email`, `mobile`, `country`, `message`, `choose_you`, `files`, `event_id`) VALUES
(1, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', ' برخينج خححبخرين خنحخرين ', ' متحدث ', 'admin/upload/art_upload/ai2.jpg ', '4'),
(2, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', ' برخينج خححبخرين خنحخرين ', ' متحدث ', '../../admin_event/uploadai2.jpg ', '4'),
(3, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', ' برخينج خححبخرين خنحخرين ', ' متحدث ', '../../admin_event/uploadai2.jpg ', '4'),
(4, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', ' برخينج خححبخرين خنحخرين ', ' متحدث ', '../../admin_event/uploadai2.jpg ', '4'),
(5, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 'ثقللا ', ' صحفي ', '../../admin_event/uploadaia.jpg ', '4'),
(6, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 'ثقللا ', ' صحفي ', '../../admin_event/uploadaia.jpg ', '4'),
(7, 'mohamed', 'mohamed', 'mr319242@gmail.com', '01011642731', 'EG', 'ثقى ', ' متحدث ', '../../admin_event/upload ', '4'),
(8, 'mohamed', 'mohamed', 'mr319242@gmail.com', '01011642731', 'EG', 'ثقى ', ' متحدث ', '../../admin_event/upload ', '4'),
(9, 'mohamed', 'ramadan', 'mr319242@gmail.com', '01011642731', 'EG', '5تعصق', '', '../../admin_event/uploadClient-headshot-4-Jim-Fahad-Digital.png ', '4'),
(10, 'lamar', 'mohamed ramadan', 'mr319242@gmail.com', '01011642731', 'EG', 'rtret', 'الاختيار الاول ', '../../admin_event/uploadsuccess.php ', '4');

-- --------------------------------------------------------

--
-- Table structure for table `sport_event_register`
--

CREATE TABLE `sport_event_register` (
  `reg_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sport_event_register`
--

INSERT INTO `sport_event_register` (`reg_id`, `first_name`, `last_name`, `email`, `mobile`, `country`) VALUES
(1, 'mohamed ', 'bb', 'mohamedramadan2930@gmail.com', '01011642731', 'EG');

-- --------------------------------------------------------

--
-- Table structure for table `sport_register`
--

CREATE TABLE `sport_register` (
  `sport_register_id` int(11) NOT NULL,
  `error` varchar(255) NOT NULL,
  `first_name2` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `talent_image` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `specialist` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `work_field` varchar(255) NOT NULL,
  `field` varchar(255) NOT NULL,
  `sub_field` varchar(255) NOT NULL,
  `register_type` varchar(255) NOT NULL,
  `experience_info` varchar(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_register` varchar(255) NOT NULL,
  `video_talent` varchar(255) NOT NULL,
  `fiels_talent` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `player_weight` varchar(255) NOT NULL,
  `player_position` varchar(255) NOT NULL,
  `player_taller` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `user_show` varchar(200) NOT NULL,
  `personal_image` varchar(255) NOT NULL,
  `customer_message` varchar(250) NOT NULL,
  `talent_images` longtext NOT NULL,
  `video1` varchar(255) NOT NULL,
  `video2` varchar(255) NOT NULL,
  `video3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sport_register`
--

INSERT INTO `sport_register` (`sport_register_id`, `error`, `first_name2`, `last_name`, `email`, `mobile`, `talent_image`, `country`, `specialist`, `certificate`, `work_field`, `field`, `sub_field`, `register_type`, `experience_info`, `team_name`, `team_register`, `video_talent`, `fiels_talent`, `username`, `password`, `code`, `player_weight`, `player_position`, `player_taller`, `user_status`, `user_show`, `personal_image`, `customer_message`, `talent_images`, `video1`, `video2`, `video3`) VALUES
(28, '', 'hassan', 'essam', 'mr31dddd9242@gmail.com', '01011642731', 'Capture.PNG ', 'EG', 'رياضي', '  ثانوي  ', '', '7', 'المجال الاول الفرعي ', ' وسيط / منشأة ', ' ', '', 'no', '', '', 'hassan', '11111111', '', '', '', '', 'active', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `sub_id` int(11) NOT NULL,
  `sub_email` varchar(255) NOT NULL,
  `sub_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`sub_id`, `sub_email`, `sub_date`) VALUES
(4, 'mr319242@gmail.com', '2022-09-25 23:48:40'),
(5, 'mr319242@gmail.com', '2022-09-25 23:53:13'),
(6, 'mr319242@gmail.com', '2022-10-05 23:44:51'),
(7, 'mr319242@gmail.com', '2022-10-05 23:45:41'),
(8, 'mr319242@gmail.com', '2022-10-05 23:46:45'),
(9, 'mr319242@gmail.com', '2022-10-05 23:47:00'),
(10, 'mr319242@gmail.com', '2022-10-05 23:49:09'),
(11, 'mr319242@gmail.com', '2022-10-05 23:49:23'),
(12, 'mr319242@gmail.com', '2022-10-05 23:50:04'),
(13, 'mr319242@gmail.com', '2022-10-05 23:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `target_category`
--

CREATE TABLE `target_category` (
  `target_id` int(11) NOT NULL,
  `target_name` varchar(255) NOT NULL,
  `target_category` longtext NOT NULL,
  `target_category_en` longtext NOT NULL,
  `taret_image` varchar(255) NOT NULL,
  `event_page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `target_category`
--

INSERT INTO `target_category` (`target_id`, `target_name`, `target_category`, `target_category_en`, `taret_image`, `event_page`) VALUES
(3, 'الفئات المستهدفة في الذكاء', 'الموهوبين ,\r\n المصانع والشركات ,\r\n المستثمرين ,\r\nالحكومات ,\r\n الخبراء المتخصصين في مجال الذكاء الإصطناعي والميتافيرس ,\r\n\r\n', 'talented people,\r\n  factories and companies,\r\n  investors,\r\ngovernments,\r\n  Experts in the field of artificial intelligence and metavirus,', '34518677.art1.jpg', 'الذكاء الإصطناعي');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addition_section`
--
ALTER TABLE `addition_section`
  ADD PRIMARY KEY (`add_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `artificial_event_register`
--
ALTER TABLE `artificial_event_register`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `art_register`
--
ALTER TABLE `art_register`
  ADD PRIMARY KEY (`art_register_id`);

--
-- Indexes for table `company_register`
--
ALTER TABLE `company_register`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_code`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_register`
--
ALTER TABLE `course_register`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `email_message`
--
ALTER TABLE `email_message`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `email_message_event`
--
ALTER TABLE `email_message_event`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `event_about_us`
--
ALTER TABLE `event_about_us`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `event_banner`
--
ALTER TABLE `event_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `event_contact`
--
ALTER TABLE `event_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `event_contact_us`
--
ALTER TABLE `event_contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `event_faq`
--
ALTER TABLE `event_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `event_goals`
--
ALTER TABLE `event_goals`
  ADD PRIMARY KEY (`goal_id`);

--
-- Indexes for table `event_home_about`
--
ALTER TABLE `event_home_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `event_home_banner`
--
ALTER TABLE `event_home_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `event_home_reason`
--
ALTER TABLE `event_home_reason`
  ADD PRIMARY KEY (`reason_id`);

--
-- Indexes for table `event_programme`
--
ALTER TABLE `event_programme`
  ADD PRIMARY KEY (`prog_id`);

--
-- Indexes for table `event_speaker`
--
ALTER TABLE `event_speaker`
  ADD PRIMARY KEY (`speaker_id`);

--
-- Indexes for table `event_sponser`
--
ALTER TABLE `event_sponser`
  ADD PRIMARY KEY (`sponser_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `fashion_event_register`
--
ALTER TABLE `fashion_event_register`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `fash_register`
--
ALTER TABLE `fash_register`
  ADD PRIMARY KEY (`fash_register_id`);

--
-- Indexes for table `form_selection`
--
ALTER TABLE `form_selection`
  ADD PRIMARY KEY (`select_id`);

--
-- Indexes for table `form_selection_event`
--
ALTER TABLE `form_selection_event`
  ADD PRIMARY KEY (`select_id`);

--
-- Indexes for table `goin_team`
--
ALTER TABLE `goin_team`
  ADD PRIMARY KEY (`goal_id`);

--
-- Indexes for table `investment`
--
ALTER TABLE `investment`
  ADD PRIMARY KEY (`invest_id`);

--
-- Indexes for table `main_events`
--
ALTER TABLE `main_events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`new_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `revival_about_us`
--
ALTER TABLE `revival_about_us`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `revival_add_project`
--
ALTER TABLE `revival_add_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `revival_banner`
--
ALTER TABLE `revival_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `revival_gallary`
--
ALTER TABLE `revival_gallary`
  ADD PRIMARY KEY (`gallary_id`);

--
-- Indexes for table `revival_goals`
--
ALTER TABLE `revival_goals`
  ADD PRIMARY KEY (`goal_id`);

--
-- Indexes for table `revival_order_services`
--
ALTER TABLE `revival_order_services`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `revival_terms`
--
ALTER TABLE `revival_terms`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `share_event`
--
ALTER TABLE `share_event`
  ADD PRIMARY KEY (`share_id`);

--
-- Indexes for table `sport_event_register`
--
ALTER TABLE `sport_event_register`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `sport_register`
--
ALTER TABLE `sport_register`
  ADD PRIMARY KEY (`sport_register_id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `target_category`
--
ALTER TABLE `target_category`
  ADD PRIMARY KEY (`target_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addition_section`
--
ALTER TABLE `addition_section`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `artificial_event_register`
--
ALTER TABLE `artificial_event_register`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `art_register`
--
ALTER TABLE `art_register`
  MODIFY `art_register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `company_register`
--
ALTER TABLE `company_register`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_register`
--
ALTER TABLE `course_register`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `email_message`
--
ALTER TABLE `email_message`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `email_message_event`
--
ALTER TABLE `email_message_event`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_about_us`
--
ALTER TABLE `event_about_us`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_banner`
--
ALTER TABLE `event_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `event_contact`
--
ALTER TABLE `event_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `event_contact_us`
--
ALTER TABLE `event_contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_faq`
--
ALTER TABLE `event_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_goals`
--
ALTER TABLE `event_goals`
  MODIFY `goal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_home_about`
--
ALTER TABLE `event_home_about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_home_banner`
--
ALTER TABLE `event_home_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_home_reason`
--
ALTER TABLE `event_home_reason`
  MODIFY `reason_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_programme`
--
ALTER TABLE `event_programme`
  MODIFY `prog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `event_speaker`
--
ALTER TABLE `event_speaker`
  MODIFY `speaker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `event_sponser`
--
ALTER TABLE `event_sponser`
  MODIFY `sponser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fashion_event_register`
--
ALTER TABLE `fashion_event_register`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fash_register`
--
ALTER TABLE `fash_register`
  MODIFY `fash_register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `form_selection`
--
ALTER TABLE `form_selection`
  MODIFY `select_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `form_selection_event`
--
ALTER TABLE `form_selection_event`
  MODIFY `select_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `goin_team`
--
ALTER TABLE `goin_team`
  MODIFY `goal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `investment`
--
ALTER TABLE `investment`
  MODIFY `invest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `main_events`
--
ALTER TABLE `main_events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `revival_about_us`
--
ALTER TABLE `revival_about_us`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `revival_add_project`
--
ALTER TABLE `revival_add_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `revival_banner`
--
ALTER TABLE `revival_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `revival_gallary`
--
ALTER TABLE `revival_gallary`
  MODIFY `gallary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `revival_goals`
--
ALTER TABLE `revival_goals`
  MODIFY `goal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `revival_order_services`
--
ALTER TABLE `revival_order_services`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `revival_terms`
--
ALTER TABLE `revival_terms`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `share_event`
--
ALTER TABLE `share_event`
  MODIFY `share_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sport_event_register`
--
ALTER TABLE `sport_event_register`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sport_register`
--
ALTER TABLE `sport_register`
  MODIFY `sport_register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `target_category`
--
ALTER TABLE `target_category`
  MODIFY `target_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
