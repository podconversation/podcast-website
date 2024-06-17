-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 09:07 AM
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
-- Database: `podcast`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `title`, `description`) VALUES
(5, 'OUR VISION', 'At Pod Conversations, we\'re passionate about storytelling. Our mission is to provide a platform where voices from all walks of life can be heard. We believe in the power of narrative to inspire, educate, and entertain, and we strive to bring you the most engaging and thought-provoking content.'),
(7, 'OUR MISSION', 'At Pod Conversations, we\'re passionate about storytelling. Our mission is to provide a platform where voices from all walks of life can be heard. We believe in the power of narrative to inspire, educate, and entertain, and we strive to bring you the most engaging and thought-provoking content.'),
(9, 'DISCLAIMER!', 'THIS WEBSITE IS FOR SCHOOL PURPOSES ONLY!');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `id`, `comment`, `date`) VALUES
(8, 1, 'Good', 'April 25 2024 12:10:am'),
(9, 1, 'sample', 'April 25 2024 12:14:am'),
(10, 1, 'super', 'April 25 2024 12:16:am'),
(13, 1, 'I really love the external page.', 'April 25 2024 12:25:am'),
(14, 1, 'what happen?', 'April 25 2024 12:25:am'),
(15, 1, 'Nice try', 'April 25 2024 12:30:am'),
(16, 1, '1', 'April 25 2024 12:32:am'),
(17, 1, 'asdasd', 'April 25 2024 12:42:am'),
(18, 1, 'posting', 'April 25 2024 12:44:am'),
(19, 1, 'yeheeey', 'April 25 2024 12:46:am'),
(20, 1, 'do something', 'April 25 2024 12:46:am'),
(21, 1, 'sample comment', 'April 25 2024 12:47:am'),
(22, 1, 'WOOOOW', 'April 25 2024 12:49:am'),
(23, 1, 'aaaa', 'April 25 2024 12:50:am'),
(24, 1, 'asdasd', 'April 25 2024 12:50:am'),
(25, 1, 'asdkjh', 'April 25 2024 12:51:am'),
(26, 1, 'asd', 'April 25 2024 01:01:am'),
(27, 1, 'HI VIEWERS!', 'June 14 2024 03:01:pm'),
(28, 3, 'ITS SO NICE FOR BEGINERS\r\n', 'June 14 2024 03:05:pm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `password`) VALUES
(1, 'SPICE_', 'GIRLS', 'admin', 'admin123'),
(2, 'Jane', 'Co', 'janeco', '123'),
(3, 'kate', 'cortes', 'kate12345', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `link` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `description`, `link`) VALUES
(3, 'MOTIVATIONAL', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/O-2suZ70YEY\" title=\"Trust In Your Prayers - Steve Harvey Motivation\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(8, 'MOTIVATIONAL', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/tG98GhLmXI4\" title=\"Right Attitude Attracts SUCCESS || Powerful Motivational Speeches To Start Your Day\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(9, 'MOTIVATIONAL', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/joNAzJLBO1A\" title=\"MORNING MOTIVATION - listen every day to start your day right! setting intention &amp; gratitude\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(10, 'MOTIVATIONAL', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/ZjIRYn7x8sk\" title=\"KENDALL JENNER Opens Up About Anxiety, Insecurity, &amp; How To Be Truly Happy! | Jay Shetty\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(11, 'MOTIVATIONAL', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/AmARvccsdMI\" title=\"SELENA GOMEZ ON: How To STOP Insecurity &amp; TRULY LOVE YOURSELF To The Core | Jay Shetty\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(12, 'MOTIVATIONAL', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/g2cQ2kD6lzs\" title=\"KOBE BRYANT&#39;S LAST GREAT INTERVIEW On How To FIND PURPOSE In LIFE | Kobe Bryant &amp; Jay Shetty\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(13, 'LOVE', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/sySM2EWRch4\" title=\"Recently Heartbroken People Share Love Advice | Filipino | Rec•Create\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(14, 'LOVE', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/-URarCgch2Y?list=RDCMUCLN4328Cu9smzDYSF0B4yVA\" title=\"Saving a Relationship | LETTERS FROM THE SKY\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(15, 'LOVE', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/E-XI2I9UB5Q?list=RDCMUCLN4328Cu9smzDYSF0B4yVA\" title=\"SKYPODCAST: Love is the Answer (Full Episode)\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(16, 'LOVE', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/kToHw-RBiYE?list=RDCMUCLN4328Cu9smzDYSF0B4yVA\" title=\"Situationships | Moments\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(17, 'LOVE', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/BKhehUq3O2c?list=RDCMUCLN4328Cu9smzDYSF0B4yVA\" title=\"SKYPODCAST: Our First Date (Full Episode)\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(18, 'LOVE', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/sU2l3bhtBNE?list=RDCMUCLN4328Cu9smzDYSF0B4yVA\" title=\"Relationship Boundaries\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(19, 'SPOOKY', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/Qpi9VdWgFw8\" title=\"REAL CONJURING STORIES, ANNABELLE HAS ESCAPED, &amp; GAVIN CAUGHT ON FIRE - JUMPERS JUMP EP.87\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(20, 'SPOOKY', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/Cc60TCOZ-Yc\" title=\"Spooky -- Reddit Stories -- Two Hot Takes Podcast -- FULL EPISODE\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(21, 'SPOOKY', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/jUqnax_Moz0\" title=\"Spooky Dark Edition.. || Two Hot Takes Podcast || Reddit Reactions\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(22, 'SPOOKY', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/EbQhreWDH3I\" title=\"Paranormal -- Reddit Stories -- FULL EPISODE !!\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(23, 'SPOOKY', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/Q19QkJ1QOtk\" title=\"CRAZY FILIPINO GHOST STORIES, DARK MANIFESTATION THEORY &amp; SPIRITUAL REALMS - EP.150\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(24, 'SPOOKY', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/3q31oX_79Kg\" title=\"Ghost Stories | Imp And Skizz Podcast (Ep10)\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(25, 'MENTAL HEALTH', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/_aw7Yo4Blco\" title=\"Kelvin Miranda Talks About His Mental Health Diagnosis | Toni Talks\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(26, 'MENTAL HEALTH', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/9x5IAcv-iY0\" title=\"Maxene Magalona Opens Up About Her Mental Health Condition | Toni Talks\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(27, 'MENTAL HEALTH', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/Va5HN2SIhNQ\" title=\"Kylie Verzosa Speaks About Her Silent Battle with Depression | Women&#39;s Month | Toni Talks\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(28, 'MENTAL HEALTH', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/whvI8TVN91s\" title=\"TONI Episode 104 | Molested &amp; Attempted Suicide Seven Times: Pastor Paul Shares His Story Of Revival\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(29, 'MENTAL HEALTH', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/GOqEl4ADyVk\" title=\"TOM HOLLAND Gets Vulnerable About Mental Health &amp; Overcoming Social Anxiety\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(30, 'MENTAL HEALTH', '<iframe width=\"1022\" height=\"575\" src=\"https://www.youtube.com/embed/dxEVXEUREYs\" title=\"Why Kris Bernal Felt Like A Failure | Toni Talks\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(31, 'LOVE', '<iframe width=\"1250\" height=\"703\" src=\"https://www.youtube.com/embed/t2OeZcxVVI4?list=PL-Woi1-PlvaLMXaictKoiRv6PYUOIy4Xm\" title=\"The Nutrition Expert: 93% of Adults Have Metabolic Issues (What Your Body Is Trying to Tell You)\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(32, 'LOVE', '<iframe width=\"1250\" height=\"703\" src=\"https://www.youtube.com/embed/t2OeZcxVVI4?list=PL-Woi1-PlvaLMXaictKoiRv6PYUOIy4Xm\" title=\"The Nutrition Expert: 93% of Adults Have Metabolic Issues (What Your Body Is Trying to Tell You)\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
