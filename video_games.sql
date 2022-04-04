-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2022 at 03:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video_games`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `published_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `excerpt`, `author`, `body`, `slug`, `status`, `image`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'GTA 6 development confirmed', 'One of the most popular gaming titles is set to return with the famed developed working on a new title in the series', 'Elgun Zamanov', '<p>One of the most popular and controversial video games of all time Grand Theft Auto will be getting an 8th entre in the mainline series.</p>\r\n\r\n<p>The last title, GTA V was released back in 2013 and has won multiple awards and accolades. As of November 2021, GTA 5 had sold a staggering 155 million copies making it one of the best selling games of all time.</p>\r\n\r\n<p>The online component, GTA Online is also incredibly popular with new content and missions added frequently, the most recent update was released on December 2021 called &quot;The Contract&quot; features the return of Grand Theft Auto V protagonist Franklin Clinton.</p>', 'gta-6-development-confirmed', '1', 'assets/media/blog/gta-6-development-confirmed-1602.jpg', '2022-02-08 08:53:00', '2022-02-05 08:53:11', '2022-03-27 16:27:31'),
(2, 'FIFA 22 - Everything you need to know', 'What to expect from the latest entry in EA\'s popular soccer/football franchise', 'Elgun Zamanov', '<p>Euro 2020 has come to an end, and the bitter disappointment and heartache for many teams (including our very own England) will hopefully become a little less sore with time... unless you support the Italy men&#39;s team, that is - congrats by the way!</p>\r\n\r\n<p>Now the focus turns to the new season, particularly the Premier League which is set to return in August, with stadiums full to the brim with supporters who have had to wait a long time to cheer their teams on up close due to coronavirus restrictions. Of course, part of the excitement of the new season - beside buying tickets to watch your beloved club take on the new campaign and watching them on TV or at the pub - is enjoying some sports sim action in the form of soccer/football video games... and there&#39;s certainly one name that springs to mind each year.</p>', 'fifa-22-everything-you-need-to-know', '1', 'assets/media/blog/fifa-22-everything-you-need-to-know-1244.jpg', '2022-02-20 09:07:00', '2022-02-05 09:07:45', '2022-03-24 17:35:37'),
(3, 'NBA 2K22 gameplay deep dive', 'Details on changes and enhancements ahead of the game’s September 10 launch.', 'Elgun Zamanov', '<p>Hello, PlayStation Nation! It&rsquo;s that time of year when we get to unpack all the exciting gameplay enhancements and new features coming your way with NBA 2K22!</p>\r\n\r\n<p>We had an ambitious feature list that we wanted to tackle this year: faster-paced gameplay, tighter and more responsive movement, more skill-based offense, and big changes to the player builder. We made a strong push to ensure that we were delivering the same quality gameplay upgrades on both PS5 and PS4, so no matter which version you run with this year, you&rsquo;re going to get a brand-new experience.</p>\r\n\r\n<p>The primary goal for defense was to give gamers the tools to be able to really change the outcome of the game on the floor and at the rim. If you were a great perimeter defender who anticipated well, we wanted you to be able to clamp up the dribbler and force a pass. If you were a rim protector, we wanted to give you the ability to send away weak shot attempts at will.</p>', 'nba-2k22-gameplay-deep-dive', '0', 'assets/media/blog/nba-2k22-gameplay-deep-dive-1642.jpg', '2022-03-06 09:23:00', '2022-02-05 09:23:08', '2022-03-24 17:36:50'),
(4, 'Battlefield 2042 gets day 1 patch, more on the way', 'EA\'s piecemeal update approach leaves day 1 gamers with many issues still remaining.', 'Elgun Zamanov', '<p>You can head on over to the Update #1 link top, to pick through the 10-plus bullet points checking through the fixes supplied in patch 0.2.1. However, to be brief, the patch addresses rubber-banding problems in All-Out Warfare modes, stuttering in Breakaway, team name visibility, Falck&rsquo;s animations, AI spawning in Portal, and several fixes for Hazard Zone gaming.</p>\r\n\r\n<p>Officially, the next two patches will arrive within 30 days from the general launch today. Update #2 is described by EA/DICE as &ldquo;delivering more fixes and improvements that we&rsquo;ve identified during this first week of Early Access.&rdquo;&nbsp; By this time next month, Update #3 will arrive and represents a &ldquo;larger and more substantial update.&rdquo;</p>', 'battlefield-2042-gets-day-1-patch-more-on-the-way', '1', 'assets/media/blog/battlefield-2042-gets-day-1-patch-more-on-the-way-6095.jpg', '2022-03-14 09:34:00', '2022-02-05 09:34:12', '2022-03-24 17:37:43'),
(5, 'New Need For Speed Game Announced As Final NFS Heat Update Adds Crossplay', 'Electronic Arts announced that developer Criterion is working on a new Need for Speed, just as Need for Speed: Heat\'s final update adds crossplay.', 'Elgun Zamanov', '<p>The final update coming to&nbsp;<a href=\"https://screenrant.com/tag/need-for-speed-heat/\"><strong><em>Need for Speed Heat</em></strong></a>&nbsp;enables crossplay between PlayStation, Xbox, and PC versions of the racing game, and developer Criterion is moving on to the next title in the long-running series. Released in November 2019,&nbsp;<em>Need for Speed Heat</em>&nbsp;was seen as a strong return to form for the series. In the wake of the disastrous&nbsp;<em>Need for Speed: Payback,</em>&nbsp;which was damaged by publisher EA&#39;s signature &quot;surprise mechanics&quot; and&nbsp;<a href=\"https://screenrant.com/need-speed-heat-no-loot-boxes/\">pay-to-win loot box mechanics</a>, many feared the series would never return to its former glory. Fortunately,&nbsp;<em>Need for Speed Heat</em>, while not revolutionary for the franchise, proved it at least still had some gas in the tank.</p>\r\n\r\n<p>In the months following&nbsp;<em>Need for Speed Heat</em>&#39;s release, developer Criterion, best known for its work on the&nbsp;<em>Burnout</em>&nbsp;franchise, updated the game with numerous free and premium content, from new cars and challenges to cosmetic customization options and more. Now, that support is coming to an end, but not before&nbsp;<em>Need for Speed Heat</em>&nbsp;cements its place in history by becoming Electronic Arts&#39; first title with&nbsp;<a href=\"https://screenrant.com/grand-theft-auto-6-cross-play/\">full crossplay support</a>.</p>', 'new-need-for-speed-game-announced-as-final-nfs-heat-update-adds-crossplay', '1', 'assets/media/blog/new-need-for-speed-game-announced-as-final-nfs-heat-update-adds-crossplay-5418.jpg', '2022-03-16 09:38:00', '2022-02-05 09:38:53', '2022-03-24 17:38:32'),
(6, 'Official Rockstar updates, GTA 6 news, and all the rumors', 'Rockstar has confirmed GTA 6 development is \"well underway\"', 'Elgun Zamanov', '<p>We all knew GTA 6 was as inevitable as the death of the sun, but Rockstar has finally confirmed that it&#39;s actually happening.&nbsp;</p>\r\n\r\n<p><em>&quot;We are pleased to confirm that active development for the next entry in the Grand Theft Auto series is well underway.&quot;</em></p>\r\n\r\n<p>Long story short: if Rockstar had announced &nbsp;GTA 6 the day after Red Dead Redemption 2 came out (October 26, 2018 - put it in your diary), then based on historical delays between console GTA announcements and release, we&rsquo;d be waiting around 22 months &ndash; so August 2020.&nbsp;Of course, Rockstar didn&#39;t do that. It didn&#39;t do anything, in fact, so all we have to go on is word that GTA 6 was &quot;early in development&quot; as of April 2020. That makes it difficult to predict any sort of release window.</p>', 'official-rockstar-updates-gta-6-news-and-all-the-rumors', '1', 'assets/media/blog/gta-6-news-official-rockstar-updates-and-all-the-rumors-6235.jpg', '2022-03-21 09:57:00', '2022-02-05 09:57:53', '2022-03-24 17:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Sport games', '2021-12-08 08:58:13', '2022-01-20 08:19:15'),
(2, 'Action games', '2022-01-20 09:17:08', '2022-01-20 09:17:08'),
(3, 'Action-Adventure games', '2022-02-01 08:31:57', '2022-02-01 08:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(12, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(13, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(14, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(15, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(16, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(17, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(18, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(19, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(20, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(21, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(22, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(23, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(24, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(25, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(26, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(27, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(28, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(29, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(30, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(31, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(32, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(33, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(34, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(35, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(36, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(37, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(38, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(39, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(40, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(41, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(42, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(43, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(44, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(45, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(46, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(47, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(48, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(49, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(50, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(51, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(52, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(53, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(54, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(55, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(56, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(57, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(58, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(59, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(60, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(61, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(62, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(63, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(64, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(65, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(66, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(67, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(68, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(69, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(70, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(71, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(72, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(73, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(74, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(75, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(76, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(77, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(78, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(79, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(80, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(81, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(82, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(83, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(84, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(85, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(86, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(87, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(88, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(89, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(90, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(91, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(92, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(93, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(94, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(95, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(96, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(97, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(98, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(99, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(100, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(101, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(102, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(103, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(104, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(105, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(106, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(107, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(108, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(109, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(110, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(111, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(112, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(113, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(114, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(115, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(116, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(117, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(118, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(119, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(120, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(121, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(122, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(123, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(124, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(125, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(126, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(127, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(128, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(129, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(130, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(131, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(132, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(133, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(134, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(135, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(136, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(137, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(138, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(139, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(140, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(141, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(142, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(143, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(144, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(145, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(146, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(147, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(148, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(149, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(150, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(151, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(152, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(153, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(154, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(155, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(156, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(157, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(158, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(159, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(160, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(161, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(162, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(163, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(164, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(165, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(166, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(167, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(168, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(169, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(170, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(171, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(172, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(173, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(174, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(175, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(176, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(177, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(178, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(179, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(180, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(181, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(182, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(183, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(184, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(185, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(186, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(187, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(188, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(189, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(190, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(191, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(192, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(193, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(194, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(195, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(196, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(197, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(198, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(199, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(200, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(201, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(202, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(203, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(204, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(205, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(206, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(207, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(208, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(209, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(210, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(211, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(212, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(213, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(214, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(215, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(216, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(217, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(218, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(219, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(220, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(221, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(222, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(223, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(224, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(225, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(226, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(227, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(228, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(229, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(230, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(231, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(232, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(233, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(234, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(235, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(236, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(237, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(238, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `country_id`, `created_at`, `updated_at`) VALUES
(2, 'Elgun Zamanov', 'elgunzamanv@gmail.com', '1234567', 14, '2022-02-07 08:35:01', '2022-02-07 08:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `developers` varchar(255) NOT NULL,
  `publishers` varchar(255) NOT NULL,
  `series` varchar(255) NOT NULL,
  `engine` varchar(255) NOT NULL,
  `platforms` varchar(255) NOT NULL,
  `modes` enum('1','2','3') NOT NULL COMMENT '1-Singleplayer, 2-Multiplayer, 3-Both',
  `released_year` datetime NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `category_id`, `subcategory_id`, `name`, `image`, `developers`, `publishers`, `series`, `engine`, `platforms`, `modes`, `released_year`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'FIFA 22', 'assets/media/games/fifa-22.jpeg', 'EA Vancouver, EA Romania', 'EA Sports', 'FIFA', 'Frostbite 3', 'Microsoft Windows Nintendo Switch PlayStation 4 PlayStation 5 Stadia Xbox One Xbox Series X/S', '3', '2021-10-01 00:00:00', '100.00', '1', '2021-12-23 20:12:24', '2022-03-27 15:50:45'),
(2, 2, 2, 'Call of Duty: WW2', 'assets/media/games/call-of-duty-ww2.jpg', 'Sledgehammer Games', 'Activision', 'Call of Duty', 'Sledgehammer Engine', 'Microsoft Windows, PlayStation 4, Xbox One', '3', '2003-10-29 00:00:00', '120.00', '0', '2022-01-20 11:42:05', '2022-03-27 15:52:54'),
(3, 3, 3, 'GTA 5', 'assets/media/games/gta-5.jpg', 'Rockstar North', 'Rockstar Games', 'Grand Theft Auto', 'RAGE', 'Xbox One, Microsoft Windows, PlayStation 5', '3', '2013-09-17 00:00:00', '150.00', '1', '2022-02-01 14:22:32', '2022-03-27 15:44:53'),
(4, 2, 2, 'Battlefield 4', 'assets/media/games/battlefield-4.jpg', 'DICE, DICE LA', 'Electronic Arts', 'Battlefield', 'Frostbite 3', 'Microsoft Windows, Xbox 360, PlayStation 4', '3', '2013-10-29 00:00:00', '100.00', '1', '2022-02-01 16:27:21', '2022-03-27 15:54:50'),
(5, 1, 4, 'Forza Horizon 5', 'assets/media/games/forza-horizon-5.jpg', 'Playground Games', 'Xbox Game Studios', 'Forza', 'ForzaTech', 'Microsoft Windows, Xbox One', '3', '2021-11-09 00:00:00', '140.00', '1', '2022-02-01 16:52:45', '2022-03-27 16:00:42'),
(6, 1, 1, 'NBA 2K22', 'assets/media/games/nba-2k22.jpg', 'Visual Concepts', '2K Sports', 'NBA 2K', 'Eco-Motion', 'Microsoft Windows, Nintendo Switch, PlayStation 5, Xbox One', '3', '2021-10-19 00:00:00', '130.00', '1', '2022-02-01 16:57:15', '2022-03-27 16:02:03'),
(7, 1, 4, 'Need for Speed Heat', 'assets/media/games/need-for-speed-heat.jpg', 'Ghost Games', 'Electronic Arts', 'Need for Speed', 'Frostbite 3', 'Microsoft Windows, PlayStation 4, Xbox One', '3', '2019-11-08 00:00:00', '110.00', '1', '2022-02-01 17:01:34', '2022-03-27 16:03:02'),
(8, 3, 3, 'Cyberpunk 2077', 'assets/media/games/cyberpunk-2077.jpg', 'CD Projekt Red', 'CD Projekt', 'Cyberpunk', 'REDengine 4', 'Microsoft Windows, Xbox One, PlayStation 5', '1', '2020-12-10 00:00:00', '140.00', '1', '2022-02-07 14:50:54', '2022-03-27 16:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `total_price` decimal(5,2) NOT NULL,
  `details` text NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '2' COMMENT '0-Canceled, 1-Completed, 2-Pending',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `quantity`, `total_price`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '200.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, quibusdam.', '2', '2022-01-21 17:19:40', '2022-01-21 17:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `product_info` text NOT NULL,
  `stock` mediumint(6) NOT NULL,
  `discount` smallint(6) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0-Out of stock, 1-Available',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `game_id`, `product_info`, `stock`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'The best game I\'ve ever seen.', 7, 0, '1', '2022-01-21 11:58:38', '2022-01-22 10:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Team sports', '1', '2022-02-01 12:46:34', '2022-02-01 12:46:42'),
(2, 2, 'Shooter', '1', '2022-02-01 12:47:21', '2022-02-01 12:56:25'),
(3, 3, 'Role-playing', '1', '2022-02-01 12:50:03', '2022-02-01 12:56:31'),
(4, 1, 'Racing', '1', '2022-02-01 12:51:43', '2022-02-01 12:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `image` varchar(250) NOT NULL DEFAULT '',
  `roles` enum('1','2') NOT NULL COMMENT '1-Super admin, 2-Admin',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `position` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `image`, `roles`, `status`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Elgun Zamanov', 'elgunzamanv@gmail.com', NULL, '$2y$10$Cm4tBCsBVi19WzZnikUm2exntFQCOnUjWiq.xGATCsJgq5A1xDjma', NULL, 'assets/media/users/elgun-zamanov-5655.jpg', '1', '1', NULL, '2021-11-14 17:54:36', '2022-03-27 08:20:12'),
(5, 'Sənan Mehdiyev', 'senan@example.com', NULL, '$2y$10$Fplot7pop8AGKf.3xW5AN.Qx8d1OCbv1bNuZd0oDgZRw1lfpv1pSq', NULL, '', '2', '1', 'Data Science', '2022-03-31 08:29:12', '2022-03-31 08:30:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `email` (`email`),
  ADD KEY `phone` (`phone`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`customer_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
