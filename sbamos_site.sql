-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2023 at 08:29 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbamos_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content`
--

DROP TABLE IF EXISTS `tbl_content`;
CREATE TABLE IF NOT EXISTS `tbl_content` (
  `contentId` int NOT NULL AUTO_INCREMENT,
  `moduleId` int NOT NULL DEFAULT '14',
  `pageId` int NOT NULL DEFAULT '0',
  `parentId` int NOT NULL DEFAULT '0',
  `heading` varchar(255) DEFAULT NULL,
  `subHeading` varchar(255) DEFAULT NULL,
  `subListHeading` varchar(500) DEFAULT NULL,
  `subListCaption` varchar(500) DEFAULT NULL,
  `shortDescribtion` text,
  `describtion` text,
  `tw` varchar(255) DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `gp` varchar(255) DEFAULT NULL,
  `contentImage` varchar(255) DEFAULT NULL,
  `btnName` varchar(255) DEFAULT NULL,
  `btnURL` varchar(255) DEFAULT NULL,
  `headingOnImage` enum('Y','N') NOT NULL DEFAULT 'N',
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `swapNo` int NOT NULL DEFAULT '0',
  `entryDate` varchar(50) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`contentId`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_content`
--

INSERT INTO `tbl_content` (`contentId`, `moduleId`, `pageId`, `parentId`, `heading`, `subHeading`, `subListHeading`, `subListCaption`, `shortDescribtion`, `describtion`, `tw`, `fb`, `gp`, `contentImage`, `btnName`, `btnURL`, `headingOnImage`, `status`, `swapNo`, `entryDate`) VALUES
(6, 14, 22, 0, '404', '', '', '', '', 'Page is not found!', '', '', '', '1662800995-content.png', 'Go in track', '[SITE_LOC_PATH]/', 'N', 'Y', 0, '2017-02-13 11:21:25'),
(7, 14, 20, 0, '401 - Authentication error', '', NULL, NULL, '', '<h3>401</h3>\r\n\r\n<p>SORRY! We could not authenticate you!</p>\r\n\r\n<p><a class=\"btn btn-primary\" href=\"{{SITE_LOC_PATH}}\">Go in track</a></p>\r\n', '', '', '', '', NULL, NULL, 'N', 'Y', 0, '2017-02-13 11:59:26'),
(8, 14, 21, 0, '403 - Permission denyed', '', NULL, NULL, '', '<h3>403</h3>\r\n\r\n<p>SORRY! You don\'t have any permission to view this!</p>\r\n\r\n<p><a class=\"btn btn-primary\" href=\"{{SITE_LOC_PATH}}\">Go in track</a></p>\r\n', '', '', '', '', NULL, NULL, 'N', 'Y', 0, '2017-02-13 11:49:27'),
(10, 14, 23, 0, '500 - Internal Server Error', '', NULL, NULL, '', '<h3>500</h3>\r\n\r\n<p>Internal server error!</p>\r\n\r\n<p><a class=\"btn btn-primary\" href=\"{{SITE_LOC_PATH}}\">Go in track</a></p>\r\n', '', '', '', '', NULL, NULL, 'N', 'Y', 0, '2017-02-13 11:12:34'),
(22, 14, 41, 0, 'Wrong Link', '', NULL, NULL, '', '<h3>Bad Link</h3>\r\n\r\n<p>SORRY! You are in wrong link!</p>\r\n\r\n<p><a class=\"btn btn-primary\" href=\"{{SITE_LOC_PATH}}\">Go in track</a></p>\r\n', '', '', '', '', '', '', 'N', 'Y', 0, '2017-06-18 15:21:43'),
(28, 14, 48, 0, 'About Us', '', '', '', '', '<h3>Let<strong> tomorrow </strong> begin <strong> today</strong></h3>\r\n\r\n<p>Since our inception in 2007, we have been true and faithful to our goals, vision and mission. PCM is a regulated Forex Broker dedicated to make Forex trading effortless, professional and impregnable. Our founders are like minded people who envisioned the development of Forex trading. They believe in the trader&rsquo;s interest, so it is our top priority too.</p>\r\n\r\n<h4>Our Speed</h4>\r\n\r\n<p>PCM is a reputed ECN Forex Broker with strong financial presence in the market. Our dexterity in handling technology has aided us to create a unique trading platform for traders. We have a unique &lsquo;no dealing desk&rsquo; execution feature. This allows our customers direct contact to our Electronic Communication Network. With every trade, we guarantee Godspeed execution and first class liquidity experience.</p>\r\n\r\n<h4>Our Approach</h4>\r\n\r\n<p>As one of the Best Forex Broker in Asia, we aim to empower traders. Here we understand that not everyone knows about Forex trading. We believe in investing our time and knowledge for every client to educate them in Forex trading. Our goal is to coach our clients all the tricks of trading so they can make rational, intelligent and informed decision. We strive to make the Forex market approachable to as many individuals as possible, so they can reap benefits from it. We deliver insightful market news, educational materials and comprehensible trade analysis to our traders for effective trading.</p>\r\n\r\n<h4>PCM is the strength you can depend on</h4>\r\n\r\n<p>We provide Services to individual and institutional traders, hedge funds, commercial entities, brokerage firms, and money managers around the world. Traders are supported in their daily online trading with the most up-to-date and reliable trading information including daily trading analysis and market reviews as well as daily and weekly video reviews. That confidence has translated into amazing success PCM traders, with the numbers of new traders increasing rapidly. PCM is more than just a Forex broker and provides a second to none trading experience leading to the success of our traders in the online Forex markets.</p>\r\n', NULL, NULL, NULL, '1511347952-content.jpg', '', '', 'N', 'Y', 0, '2017-07-30 13:20:48'),
(29, 14, 55, 0, 'Content Comming Soon', '', NULL, NULL, '', '<h3>Comming Soon</h3>\r\n<p>Page will be avilable. Keep in touch!</p>\r\n<p><a class=\"btn btn-primary\" href=\"{{SITE_LOC_PATH}}\">Go Back</a></p>', NULL, NULL, NULL, NULL, '', '', 'N', 'Y', 0, '2017-07-30 14:41:36'),
(30, 14, 49, 0, '2007', '', NULL, NULL, '', '<h4>Started with a small service</h4>\r\n								                	<p>  This was the time when we started our company. We had no idea how far we would go, we werenâ€™t even sure that we would be able to survive for a few years. What drove us to start the company was the understanding\r\n													that we could provide a service no one else was providing.</p>', NULL, NULL, NULL, NULL, '', '', 'N', 'Y', 0, '2017-07-30 16:39:48'),
(31, 14, 49, 0, '2009', '', NULL, NULL, '', '<h4> First employees </h4>\r\n								                	<p> This was the first period when PCM actually felt like it would stick around for a while. We realized we were growing more stable and expanding at the same time. We needed a new office as we had severely outgrown the last one. We started scouting\r\n													for a new location.</p>', NULL, NULL, NULL, NULL, '', '', 'N', 'Y', 0, '2017-07-30 16:03:50'),
(32, 14, 50, 0, 'Our Core Values', '', '', '', '', '<p>We care for our clients and their business as our own business. We think and act like business partners; not like academic advisors. We share our client&#39;s aspirations, and work to understand their reality and align our incentives with their objectives &mdash; so they know we&rsquo;re in this together.</p>\r\n\r\n<h3>Team Values</h3>\r\n\r\n<p>Our team comes from a very diverse background. We believe in togetherness and we follow our code of conduct, which promises to uphold. Our values ultimately help us to attract and retain quality clients and partners, and develop quality relationships with them.</p>\r\n', NULL, NULL, NULL, '1511346417-content.jpg', '', '', 'N', 'Y', 0, '2017-07-30 17:43:16'),
(33, 14, 52, 0, 'Our Approach', '', '', '', '', '<p>Here at PCM we approaches every client&rsquo;s business as if it were our own. We believe a forex firm should be more than just an firm. We put ourselves in our clients&rsquo; vision, align our incentives with their objectives, and collaborate to unlock the full potential of their business strategies. This builds deep and enjoyable relationships.</p>\r\n\r\n<h3>PCM works for You &amp; with You!</h3>\r\n\r\n<p>The right approach is necessary for the right outcome. PCM approaches work by applying its external knowledge to your organization&rsquo;s internal way of doing work. We know that in order to maximize the potential of success for your company we need to shape our expert forex advisers in a way that applies to your way of doing business. This allows us to create rich relationships with our clients.</p>\r\n', NULL, NULL, NULL, '1511345704-content.jpg', '', '', 'N', 'Y', 0, '2017-07-30 17:19:25'),
(34, 14, 56, 0, 'Introducing Broker', '', 'Additional Advantages for Partners', 'We grow with our partners', '', '<p>PCM&rsquo;s Introducing Broker (IB) program allows firms to receive compensation for directing new clients to PCM. Whether you are a trading education company, signal provider or offer other value added services for traders, PCM provides customized solutions through our wide range of products and services to help fit your needs.</p>\r\n', NULL, NULL, NULL, '1505760955-content.png', 'Demo Button', 'http://www.google.com', 'N', 'Y', 0, '2017-09-18 18:55:55'),
(35, 14, 56, 34, 'Advanced technology', '', '', '', '', '<p>Both you and your clients can benefit from cutting-edge innovations when it comes to our line of trading instruments for algorithmic or self-trading, money management, and investment.</p>\r\n', NULL, NULL, NULL, NULL, '', '', 'N', 'Y', 0, '2017-09-18 19:43:51'),
(36, 14, 56, 34, 'Personal support', '', '', '', '', '<p>We can offer personalized guidance to our Partners in order to help you make the best decisions for your business development.</p>\r\n', NULL, NULL, NULL, NULL, '', '', 'N', 'Y', 0, '2017-09-18 19:35:52'),
(37, 14, 56, 34, 'Providing Affiliate link', '', '', '', '', '<p>that stores all of your referral traffic information and statistics. You will also be able to attach a custom affiliate link to your partner&rsquo;s affiliate link and see all traffic (clicks and registration statistics for both the main and the custom affiliate links).</p>\r\n', NULL, NULL, NULL, NULL, '', '', 'N', 'Y', 0, '2017-09-18 19:34:54'),
(38, 14, 56, 34, '24/7 Live Support', '', '', '', '', '<p>You can also benefit from our 24/7 Live Support who can answer all of your questions regarding the company, as well as PCM&rsquo;s promotions and bonuses.</p>\r\n', NULL, NULL, NULL, NULL, '', '', 'N', 'Y', 0, '2017-09-18 19:42:55'),
(39, 14, 56, 34, 'A Wide range of Promo Materials', '', '', '', '', '<p>A wide range of promo materials developed by the PCM design team to aid you in attracting new clients. You can also download the complete Partner&rsquo;s Starter Kit to gain further insights into making the most out of your partnership with us.</p>\r\n', NULL, NULL, NULL, NULL, '', '', 'N', 'Y', 0, '2017-09-18 19:47:56'),
(40, 14, 54, 0, 'Benefits and Rewards', '', 'Why partner with us?', 'We grow with our partners', '', '<p>We care for our clients&rsquo; business as our business. We think and act like business partners, not academic advisors. We share our clients&rsquo; aspirations, work to understand their reality, and align our incentives with their objectives &mdash; so they know we&rsquo;re in this together.</p>\r\n', NULL, NULL, NULL, '1505805104-content.jpg', '', '', 'N', 'Y', 0, '2017-09-19 07:44:11'),
(41, 14, 54, 40, 'What does PCM do?', '', '', '', '', '<p>When you work at PCM, you get to be part of a team that is known for its performance. We are efficiency driven professionals who focus on the upcoming forex strategies..</p>\r\n', NULL, NULL, NULL, NULL, '', '', 'N', 'Y', 0, '2017-09-19 07:59:13'),
(42, 14, 54, 40, 'What industries do you specialize in?', '', '', '', '', '<p>PCM focuses not just on recruiting individuals that are performance oriented but also on developing them. To us it is important to ensure that our clients are satisfied and are being served with the care and respect they deserve.</p>\r\n', NULL, NULL, NULL, NULL, '', '', 'N', 'Y', 0, '2017-09-19 07:50:14'),
(43, 14, 54, 40, 'Can you help us raise money?', '', '', '', '', '<p>Once we see the potential in someone and recruit them we ensure that they get an environment in which they can actually realize their potential. Stress and pressure are the enemies of productivity and creativity, we aim to decrease them as much as possible.</p>\r\n', NULL, NULL, NULL, NULL, '', '', 'N', 'Y', 0, '2017-09-19 07:48:15'),
(44, 81, 0, 0, 'This is heading', NULL, NULL, NULL, NULL, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'Y', 0, '2017-09-19 10:18:50'),
(45, 71, 0, 0, 'What do we do ?', NULL, NULL, NULL, NULL, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'Y', 0, '2017-09-20 18:27:13'),
(49, 14, 88, 0, 'cotent heading', '', 'sub list heading', 'sub list heading', '', '<form action=\"\" method=\"post\" id=\"registerform\">\r\n            <div class=\"container login-form-cstm\">\r\n                <div class=\"row\">\r\n                    <h3><i class=\"fa fa-user-plus\" aria-hidden=\"true\"></i> SIGNUP FORM</h3><hr><br>\r\n                </div>\r\n<div class=\"row\">\r\n<div class=\"conMsg\"></div>\r\n</div>\r\n                <div class=\"row\">\r\n                    <div class=\"form-group\">\r\n                        <label for=\"name\">Full Name:</label>\r\n                        <input type=\"name\" class=\"form-control\" id=\"name\" name=\"name\">\r\n                    </div>\r\n                    <div class=\"form-group\">\r\n                        <label for=\"email\">Email:</label>\r\n                        <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\">\r\n                    </div>\r\n                    <div class=\"form-group\">\r\n                        <label for=\"phone\">Contact No:</label>\r\n                        <input type=\"phone\" class=\"form-control\" id=\"phone\" name=\"phone\">\r\n                    </div>\r\n                    <div class=\"form-group\">\r\n                        <label for=\"password\">Choose Password:</label>\r\n                        <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\">\r\n                    </div>\r\n                    <div class=\"form-group\">\r\n                        <label for=\"password\">Confirm Password:</label>\r\n                        <input type=\"password\" class=\"form-control\" id=\"password\" name=\"orgpassword\">\r\n                    </div>\r\n                </div>\r\n                <div class=\"row\">\r\n                    <button type=\"submit\" class=\"btn btn-primary\">Sign up</button>\r\n<input type=\"hidden\" name=\"ajax\" value=\"1\">\r\n<input type=\"hidden\" name=\"SourceForm\" value=\"customerLoginForm\">\r\n                    <p>Allready have an Account! <a href=\"#login\" class=\"fancybox\">Click here to login</a></p>\r\n                </div>\r\n            </div>    \r\n        </form>', NULL, NULL, NULL, '1506676073-content.jpg', 'vbv', 'http://google.com', 'N', 'Y', 0, '2017-09-29 09:53:07'),
(50, 14, 88, 49, 'sub heading', '', '', '', '', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', NULL, NULL, NULL, NULL, '', '', 'N', 'Y', 0, '2017-09-29 09:23:11'),
(51, 84, 0, 0, 'About PCM', 'As always, traders grows with us!', NULL, NULL, NULL, '<p>Perfect Capital Markets (PCM) is a UK based, online forex brokerage company. We offer various accounts, trading software and trading tools to trade in forex market for individuals, fund managers and institutional customers. Currently, we have more than 10,000 individual clients, institutional clients and channel partners. We are committed to offering the latest and state of the art trading platforms to ensure that you get the best trading experience in financial market.</p>\r\n', NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'Y', 0, '2017-10-03 10:12:07'),
(53, 14, 49, 0, '2012', '', '', '', '', '<h4>Recognition in Forex Market</h4>\r\n                                        <p> By this time we were a well known name within the industry. We had been prominent members of the industry for more than 5 years and worked for some of the biggest traders in the industry; we werenâ€™t dismissed\r\n                                        by anyone because we could not be dismissed by anyone.</p>', NULL, NULL, NULL, NULL, '', '', 'N', 'Y', 0, '2017-11-22 10:15:56'),
(54, 14, 49, 0, '2016', '', '', '', '', '<h4>PCM â€” Corporation or Family</h4>\r\n                                        <p>Our journey has only brought us higher. Forex completely changes the way we analyze and present data. We have embraced new technologies and have ensured that our clients receive cutting edge analytics. As we go on towards the future we intend to exploit the full potential of new technologies to power our services.</p>', NULL, NULL, NULL, NULL, '', '', 'N', 'Y', 0, '2017-11-22 10:53:57'),
(55, 14, 49, 0, '2017', '', '', '', '', ' <h4>Weâ€™re Number One</h4>\r\n                                        <p>Being number one is as important as retaining the position. We strive for excellence when it comes to client satisfaction. We believe in winning together and our clients are always first. Sky is the limit ... </p>', NULL, NULL, NULL, NULL, '', '', 'N', 'Y', 0, '2017-11-22 10:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_error`
--

DROP TABLE IF EXISTS `tbl_email_error`;
CREATE TABLE IF NOT EXISTS `tbl_email_error` (
  `errorId` int NOT NULL AUTO_INCREMENT,
  `user` int NOT NULL DEFAULT '0',
  `errorCase` varchar(255) DEFAULT NULL,
  `error` varchar(500) DEFAULT NULL,
  `entryDate` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`errorId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_smtp_configuration`
--

DROP TABLE IF EXISTS `tbl_email_smtp_configuration`;
CREATE TABLE IF NOT EXISTS `tbl_email_smtp_configuration` (
  `smtpId` int NOT NULL AUTO_INCREMENT,
  `smtpHost` varchar(225) DEFAULT NULL,
  `smtpUsername` varchar(225) DEFAULT NULL,
  `smtpPassword` varchar(225) DEFAULT NULL,
  `smtpPort` varchar(225) DEFAULT NULL,
  `smtpSecure` varchar(225) DEFAULT NULL,
  `smtpFromName` varchar(255) DEFAULT NULL,
  `smtpFromEmail` varchar(255) DEFAULT NULL,
  `smtpReplyName` varchar(255) DEFAULT NULL,
  `smtpReplyEmail` varchar(255) DEFAULT NULL,
  `isActivated` enum('Y','N','NONE') NOT NULL DEFAULT 'NONE',
  `status` enum('Y','N','NONE') NOT NULL DEFAULT 'NONE',
  `entryDate` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`smtpId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_templates`
--

DROP TABLE IF EXISTS `tbl_email_templates`;
CREATE TABLE IF NOT EXISTS `tbl_email_templates` (
  `emailtemplatesId` int NOT NULL AUTO_INCREMENT,
  `heading` varchar(225) DEFAULT NULL,
  `subject` varchar(500) DEFAULT NULL,
  `altMessage` varchar(500) DEFAULT NULL,
  `description` text,
  `status` enum('Y','N','NONE') NOT NULL DEFAULT 'NONE',
  `entryDate` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`emailtemplatesId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_tobesent`
--

DROP TABLE IF EXISTS `tbl_email_tobesent`;
CREATE TABLE IF NOT EXISTS `tbl_email_tobesent` (
  `tobesentId` int NOT NULL AUTO_INCREMENT,
  `forId` varchar(50) DEFAULT NULL,
  `toMail` varchar(1000) DEFAULT NULL,
  `ccMail` varchar(1000) DEFAULT NULL,
  `bccMail` varchar(1000) DEFAULT NULL,
  `subject` varchar(1000) DEFAULT NULL,
  `message` text,
  `fromName` varchar(255) DEFAULT NULL,
  `fromMail` varchar(500) DEFAULT NULL,
  `priority` varchar(10) DEFAULT NULL,
  `deliveryStatus` varchar(50) DEFAULT NULL,
  `executionDate` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `entryDate` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tobesentId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_link_image`
--

DROP TABLE IF EXISTS `tbl_link_image`;
CREATE TABLE IF NOT EXISTS `tbl_link_image` (
  `imgId` int NOT NULL AUTO_INCREMENT,
  `linkId` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `linkTable` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `path` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `entryDate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`imgId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login_log`
--

DROP TABLE IF EXISTS `tbl_login_log`;
CREATE TABLE IF NOT EXISTS `tbl_login_log` (
  `loginId` int NOT NULL AUTO_INCREMENT,
  `tokenNo` varchar(50) DEFAULT NULL,
  `userId` int NOT NULL DEFAULT '0',
  `ip` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `areaCode` varchar(50) DEFAULT NULL,
  `dmaCode` varchar(50) DEFAULT NULL,
  `countryCode` varchar(50) DEFAULT NULL,
  `countryName` varchar(50) DEFAULT NULL,
  `continentCode` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `currencyCode` varchar(50) DEFAULT NULL,
  `currencySymbol` varchar(50) DEFAULT NULL,
  `currencyConverter` varchar(50) DEFAULT NULL,
  `loginTime` varchar(50) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `logoutTime` varchar(50) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sessionId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`loginId`)
) ENGINE=InnoDB AUTO_INCREMENT=395 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login_log`
--

INSERT INTO `tbl_login_log` (`loginId`, `tokenNo`, `userId`, `ip`, `city`, `region`, `areaCode`, `dmaCode`, `countryCode`, `countryName`, `continentCode`, `latitude`, `longitude`, `currencyCode`, `currencySymbol`, `currencyConverter`, `loginTime`, `logoutTime`, `sessionId`) VALUES
(1, 'wI1SwwhuD3K5J6qqjmT75PrWrxeTUP1d6uncNHw40iqdog3mdk', 1, '42.105.0.71', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 12:51:02', '2022-11-29 12:52:37', '24ab5add8ef332982122ab59fd466aed'),
(2, 'OvaY0tih6YECJ1pazQmhc6GJKwLYKqJYhOK2GrL3M9JPhDr7ah', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-03 12:45:57', '0000-00-00 00:00:00', 'b8r8bnspo731lt1rpjblrcd5pk'),
(3, 'R0CtGccwJW9eE4n6oULGjKjjV4kcchynBIUID8N4HdciJC7JNn', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-03 15:26:57', '0000-00-00 00:00:00', '3vtni492d5nnnnmdvli4vblq7r'),
(4, 'GOE7ylbu2NdNdzkOupfak05zygOjexOWCuPP0e1MQqGzvyOthO', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-04 11:48:15', '0000-00-00 00:00:00', '5fkevo5huuvi838kt09pvs7qqj'),
(5, 'sXhBsqAMYa2rpI7twomyBqpHUWwJLcQ8tYkroL5rhzQGDgR3gE', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-05 18:11:20', '0000-00-00 00:00:00', 'kv0fagbnuu7a9t2eg2m0t37pkm'),
(6, 'rcHjazL31jjBVUfaladsZNm4WOh8rIjstJXbUfNq6wWrrMZD7t', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-11 12:04:42', '0000-00-00 00:00:00', '3dc77egj6fbefpdbo5ittgumc7'),
(7, 'cQTQj5PXl0HmmcNadOsjuoPFCMPuQ2uMyUVFXhOiykHPT0pvVX', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-11 19:30:23', '0000-00-00 00:00:00', 'q3b9rpq9i1lj0ifkhirsgap7sq'),
(8, 'H70epMLP1ldBbOCrWsiMb9X5CGViR0aWTKxVjdbjrCr6eFqQ57', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-13 14:50:11', '0000-00-00 00:00:00', 'j3j7kk9ughekqlqf9ju08hcig3'),
(9, 'fLyJwUnhuG7He3CkdnTbh5DIrmbG3v3JGr6C5nZmWO7IxspMKw', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-14 13:39:31', '0000-00-00 00:00:00', 'b694u0qfin5g5f9n90pp7k8nk6'),
(10, '1gjgY6B1e0MWPGyF7wTMKW4va9a2UnviYqX2Q4srFUMz2OqT3l', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-16 12:10:13', '0000-00-00 00:00:00', '2b0gdf09tegb1br6u19ceo1qti'),
(11, 'D0hnOAsIeuRQqErI6EL3smLZBOHzEzE0ojo9Fh94o4AHbrF6mk', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-21 13:56:13', '2022-12-21 17:51:02', 'ftgpitdl5p8n3gihpr5j9ign1b'),
(12, 'T4X4gecZqU6eiN7mr2Xd4gARnNHUka8uC1jvci3Qi50MUEkRMK', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-21 17:51:09', '0000-00-00 00:00:00', '8v97cbvp3ne0l3vpjvdkl4fco5'),
(13, 'qJ6dqX1x8RAj7ppn6hWet0wdT5EZIMqekfgyn9MsOyVPkscfTJ', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-26 11:02:38', '0000-00-00 00:00:00', '678hs9l4rb475h9huk5g2pmiv8'),
(14, '4CzyxEfgoAP55UsOFUSQXz8QoRgWlKxFzCg38B3blv3Ju36KTZ', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-28 17:02:29', '0000-00-00 00:00:00', '3p7n3m5gt6bgt1n0mbt8u80m3t'),
(15, 'fKul5C0pxb7fqUBN33aeItqhJ8BQrqsr96usyCExvMMacLqQ3V', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-29 13:42:18', '0000-00-00 00:00:00', '5slkbgmdd54cs4r3ohiaf6c4se'),
(16, 'xYYi6j7KvZgXtX5LwSFjNaSDYCzCa7V0gHMbG00XUXUz1tGoTj', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-30 06:49:01', '0000-00-00 00:00:00', 'tr680nd4a17c8o266bjm5thi5i'),
(17, 'Vqda0nHoT84frgczpZiTKJamlBDAhpsqow4s9vUQLtQXKDL2xe', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-30 19:44:23', '0000-00-00 00:00:00', '830hlohh0tmlc8eftaeffl92io'),
(18, 'qcvDWaUnLp6o6N6b7nixnLTuEe56LopTasjkrV3xq1dXrZzJzi', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-30 20:35:34', '2022-12-30 20:42:56', '9f8v5p9cgf804ai7p57dhcgtdq'),
(19, '5GIohl7PnUdRWFpZjBNhnlvksM3IZjxG7lU8A2xVGEs1f4ADQ9', 13, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-30 20:43:06', '0000-00-00 00:00:00', 's9lm3t9eftsniv3rhqsml607ig'),
(20, 'LV3fdwu3fIx8SuzGbMBkBTPDfn3GqLjHIgu8rGaTBcNXAJ72e2', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-05 12:44:33', '0000-00-00 00:00:00', 'kjblo08ut04h2ha0rkkonuq06o'),
(21, 'WUuohDIAcvqk3c3BXPXkcxopehHZU7RD04YRBimgmD765ysAzS', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-06 11:23:19', '0000-00-00 00:00:00', '1eqsigmca6dhuc2jejvbctjg4i'),
(22, 'UapqDFKrla1Z9D4fYnxNlHSQ5TAmJsXUllpYYHuz7Pe8QjKzbY', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-08 10:00:43', '0000-00-00 00:00:00', '6ajige2sncv3jmgqk2hv13v3n6'),
(23, 'fm7bTC5sTZjkDEYXHI7MsKqKzCAemwaGFHicWYlnOAsNdqA6Me', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-09 01:52:45', '0000-00-00 00:00:00', '9lh57r7qmfdm87qvti591q34fe'),
(24, 'DJfNuOyz0TiC20wOOGaPgeoqEMXn1myh72FuohoVjlZKV9zDCL', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-09 09:44:34', '0000-00-00 00:00:00', 'gjad6hktporkn7t5nspns84fr1'),
(25, 'KYvbpyd7DDGI58XpcBsJ9JtUFFzaxTnRn0lJ0oHuJKmo6z9fRD', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-10 17:34:58', '0000-00-00 00:00:00', 'koofj3h664obijvutle8n6kmjr'),
(26, 'aOl5BRmsbV3Gyv6fzdsefG8iLpddRJWLx3iZgk2fJQF4YTg7zw', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-10 22:58:21', '0000-00-00 00:00:00', 'rphanctdddit3de9mdn5gfpql3'),
(27, 'xRyk7GaEMfGTl20OU3riQOMKC2A8m00tESEBGVLkK9B4wWqDNt', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 11:25:58', '0000-00-00 00:00:00', 'qe8nr368eqkk89jkj7318v080e'),
(28, 'BOteiT8SQDDxRjd9JxauKtwLNdFWexauTJ0Lhvn9nCrD1JSz3a', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 19:28:16', '0000-00-00 00:00:00', '9niqs5msv4lrsrqh164396vth2'),
(29, 'Pw8wufX7Av4T4oG0Am2mWy6bwCpjhBb72rBcOcaoAoR8xPLZXI', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-18 12:25:11', '0000-00-00 00:00:00', '82ueilvrle2ltnsdlu3ud5oq1m'),
(30, 'l3QEX8fCOjS3Bt5IOgnlYLIcE7U5Fd70qUSnfeQ7aVAMwma6or', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-18 16:16:54', '0000-00-00 00:00:00', 'dg5f8ekrdu8be1238edvu66f66'),
(31, 'Zpo5J8FV1SekL507MD11IxwOzEm0X6WvtI0R3sqYzv6baDNTgx', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-19 10:12:58', '2023-01-19 18:09:19', 'df45qf10v2quha81c82bmov2ek'),
(32, 'i65ttG3j91DzKe49MgjHu6MqmhI6muYjAfdb6xMq9mf5EJGHl0', 13, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-19 18:09:24', '2023-01-19 21:12:02', 'm8fnsmh8jtehji515sv1ocj4go'),
(33, 'tuQG0rhuvSlOj9GpfEMfiNNWShQoIKzodiqMOn3G5YWFJFa1gi', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-19 22:24:05', '2023-01-19 22:29:35', '1hc5h7i2h01n7rabp5dj9rui2p'),
(34, 'esK0Z0pdeKaqJVTJKb8Jr0D6fosrCvbPXzTFlW7yYHkY2YjL1f', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-19 22:50:50', '0000-00-00 00:00:00', 'm9m0i3q08tse24s5pvqi398hm4'),
(35, 'AsUN47NmdMLG0EhNheyGnIIerduURckshfd5lGASplLaKhVg52', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 09:18:15', '2023-01-20 13:16:39', '921divr3okusmj5150kv8okiek'),
(36, 'hU5xNLWGWl8f3HqSDqBAxVdWF8JkTNBfBSQQUtpXsguQ071qoZ', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 13:16:47', '2023-01-20 17:44:33', 'ee8l90uafe7elo5nojiq3gh1id'),
(37, 'v8UE44kaATnr5k92SOWpkSbrb69TVIi8iiJn18XFVWtnc76zvy', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-20 18:09:56', '0000-00-00 00:00:00', '9ks3dt5sn817fghglgiqbk96oj'),
(38, 'YZn2yfk6KRjD3XS71DxI7LCdnSGMNhMzPEXkZT9m8yCECO3wsF', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-21 09:31:07', '2023-01-21 09:31:16', 'ks2h6ri3t8f1j2itmg42dph8hf'),
(39, 'ydfNyetF2aKcEaznRcClWDK5IQe2r2gByPqAFpY9OwJAqaRbFV', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-21 09:32:26', '0000-00-00 00:00:00', '8rt8d29hua0rekeq6ljdiqe209'),
(40, '2SvTbtyWfAxbZPPEICaPvtEPhyx4x7sa3dL8rpJJeA3V58g0my', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-21 09:33:36', '2023-01-21 09:34:45', 'iq8n2pnc844u0erkki1fpakmed'),
(41, 'mkg0dzDOmknaqewLkKxzt9S2kpVcuDkVKwk1GNvxInMQxwrFD1', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-21 09:36:41', '2023-01-21 09:36:59', 'cu0n58m3ojonagbborbl50c12l'),
(42, 'n0E73WyLTESGhhiybSFCfQQR4rnFM0P8LyJHgZnWfq6yXfnfik', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-21 09:37:10', '2023-01-21 09:50:39', 'vnvlnnve0qn261njpec7qeogqd'),
(43, 'FjiZuW8tQsw3Rt8hwO5ys6J2CVCMAP3TmxvhZMSvyML78ojU6N', 13, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-21 09:51:01', '2023-01-21 09:52:33', 'mu9i4ej0615qo98q4scteajam4'),
(44, 'rtkh9smJswKmOPTRTJhL0uXLpg4NkC4zLU9X6Dh6JMrpWm3IhQ', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-21 09:51:54', '0000-00-00 00:00:00', 's1cmskfpt5u8a5bok3ad48lakl'),
(45, 'A65bAimspqON5PW2EwMH8iWMLsk72ZzmsdHifTfeBPndEvrmoR', 13, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-21 09:52:44', '2023-01-21 09:53:52', 'lfvc68u9sn58u9lfev72k6oe1u'),
(46, 'lwbg5icNZKfrQoioBnHeRhE4nwl24xyCO3CaopNKX5rDGzaJZQ', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-21 09:53:58', '2023-01-21 12:36:42', 'vbb5kjlqaunnbpsr4b074ugtn6'),
(47, '8pRxkZDBGHtc5NRE3aFsfxoJOX9o1euwH2relJOx2otIHnAzG2', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-21 12:36:57', '2023-01-21 13:10:31', 'membd2joimqtls1gmmri3a7e6c'),
(48, 'x3u5GH1CsFpZ5GhtIFFGFKUM73zx8hj6KIYn69cUf7bRKhjiYZ', 16, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-21 13:10:39', '2023-01-21 13:11:13', 'ssts9mrcl5pua41bivukm7e92h'),
(49, 'qOYadVPBNdSoOdSvZH6KKtTqByjoEYqzQhMj9mgPxssCMjFsBf', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-21 13:11:31', '0000-00-00 00:00:00', '6slr4pl3bpn947ihppm6erruik'),
(50, 'ts2LGjHEfZbOd1B7N96E2lvrdEJdyKJ2NYsVmdJxvgAmRtpd74', 16, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-21 13:14:07', '2023-01-21 13:22:17', 'vr8k92ashopd3tt60g5ib3f993'),
(51, 'YvGXXR0yRIFS1DRve7UIUR7YhHbdZBnOyzAFmN2nX1URhyNb5Z', 19, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-21 13:22:23', '2023-01-21 13:23:23', '9qd3libf0uegth9d88vfsg0ejj'),
(52, 'EhoqeR8Qz7T1UDth1ERzvYyY8vKBND9AjmLlsDLQPq0E8Pe6cx', 19, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-21 13:23:28', '0000-00-00 00:00:00', 'dmh7ckgfk1hf16lajmauf18ca8'),
(53, 'Ng6QSp9q6TJ466QK4kAmjZ3WPMfHwrN29OlGDsDol3Pw7p7jbZ', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-22 09:26:36', '0000-00-00 00:00:00', '24f5ner6nkugs24bsnku61v7kt'),
(54, 'EmmeTZTJC5e5Fkqy8T9lGEks32EwbmBb4Lh3IpKTFoJRsVtmQo', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-23 22:09:39', '0000-00-00 00:00:00', 'p9qbk1u75q43l5ubecogkq5op8'),
(55, 'MpeUjXjaBxqVZ4UBA9DymcFMikKVKVZ1hD1lPMykdnbSQdHaBx', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-25 14:54:40', '0000-00-00 00:00:00', 'nipgdjlacetj5kpr2hil3v9id2'),
(56, 'TLS4ZTUChaU83lMG4jrvOzzgfIaAwm1aoEphIlsksisbslZ11F', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-27 13:24:46', '0000-00-00 00:00:00', 'c7b6eeh7avbc6tbb2vlp1l6lg2'),
(57, 'wyxXRzY7SDDIN9LrX3hQtDMrHhEJ9ZQqiRzwSSsFyAYXjmJ6sR', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-28 11:22:22', '0000-00-00 00:00:00', 'alit0ip8d7plu7k7bn6cglcvl1'),
(58, 'aNauXswVc0RJOCfmOaNEZqUbUWZJ1ad0w00lMkzSQh8hrwqkQk', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-30 13:20:49', '0000-00-00 00:00:00', 't6qrqphdds907ub9kv222ne40m'),
(59, 'g2GOD2yoEsDcXXcN20DJpSf5UNsRWhQXxXMtFO0RM2TR9WiS3f', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-31 17:12:13', '0000-00-00 00:00:00', 'fakp6608ic3j8es8a8f25gpt6s'),
(60, 'k4J0jfapmdvBsmSENQAjM9SsAmPOsn1nRNePytdbLCm1SowkXi', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-01 13:10:14', '0000-00-00 00:00:00', 'saslth4shgkpjper7lvdmjpqu3'),
(61, 'BXmI8Gabbf6Yib3Jn7l9NSzL365CP9YxDRLNCGR9rJJGfIle24', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-01 17:58:58', '2023-02-02 00:14:22', 'llhkjqv8r4e242mgoajog5grbu'),
(62, 'QDdPik5XzqSxclBdzMnASavQkn6p54qgIKGJUlgmH3VDADvrkE', 22, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 00:14:40', '0000-00-00 00:00:00', 'm74hln2et8lqnt98nu6ae9l7s2'),
(63, 'uFUqNd05xXPE55ftZRRRDy1hGRWmG2DvYnMJM5FO2sJBIoKr5N', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 10:34:05', '0000-00-00 00:00:00', 'i7024h2ii2gv5a56bbfo30eauk'),
(64, 'Wrhgjyvp7IYeu7aUjytwWPR31QqmAjb933ObY7JEidnxVQSXvq', 22, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 13:16:30', '0000-00-00 00:00:00', 'e3a515f9cd1bd03de1606ddb58ddfb5b'),
(65, 'sYkgKMrJsTpzb4dhZhCe3WxuDX3qhdmvTZBEWo7naTj4AtssqH', 22, '106.211.154.234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 13:23:50', '2023-02-02 14:37:40', '6d243fb9dd5445fc0a0d391b519fc3df'),
(66, '6UWxz3YM0hb9fYMCbxt6HfprfBzAOfEpva7DEYrGyltyU05ttr', 22, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 14:17:23', '0000-00-00 00:00:00', '82f5a72260fe60e27e04805003823c59'),
(67, 'VMp1XNVbkWxbn7ScIrX312IEvxHhu1ZTH3LKgVMyjrenYGuZ6q', 1, '106.211.154.234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 14:37:50', '0000-00-00 00:00:00', '4cf34294e0fb8065d7b7b892369c62be'),
(68, 'ed7KC4Uems3njkgLT2eKstYXjZe8YtHDT1ADk4AqyYOXweECKs', 1, '106.211.154.234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 15:41:30', '0000-00-00 00:00:00', 'b2a3b0a151a40b071fe961bd0737de95'),
(69, 'XvjkpiDRa1FcDeAcPufibEhBzPR33pzywaDZddcRYSuwVC24vk', 22, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 15:50:20', '0000-00-00 00:00:00', '087daef41270a75d4ec82e4300463945'),
(70, 'pwMD6iRAPds83YQETEguK8BuTic0lwYWtcD8rpExfyJk6hCz6r', 22, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 16:52:02', '0000-00-00 00:00:00', 'b916fe6fca06e0bdbe9cba3390dd0716'),
(71, 'bltddpd3NRBNHP3FrfJIoplLXLh6Md1WtXEq1kZtgL7AQmJ2qI', 22, '106.211.154.234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 16:53:34', '0000-00-00 00:00:00', '2ac5d97246a71c1984c638bb8502ff86'),
(72, '2Oh1CfWDa1u4WiETfQFYNmfPAPAuu02LUq15OIIosE5y92fuvI', 22, '106.211.154.234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 19:01:05', '0000-00-00 00:00:00', '1dbf16eea782c977abd32c3d86784978'),
(73, 'JsPiKjSQDhUi2X7r2TcOmKmYmjti9s3iSTiE7JDd0nKd6uXDPu', 22, '106.211.154.234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 19:59:36', '2023-02-02 19:59:45', '55c56671677f802a567ea5ee2321d4de'),
(74, 'qMRRMFcitNv3KBTCRAxew43YrEgdrQ0SloxWAEcsoRvM4CyMKl', 22, '106.211.154.234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 19:59:56', '0000-00-00 00:00:00', '0e29b67651aec9e650d6334318ac11e3'),
(75, 'yqzHiAET3zUoWoNHB7jk5B0B5EZd3wBfjq9ZUg1JGh7sV1wTia', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 20:07:00', '0000-00-00 00:00:00', '62cc90f605b560292993bd7352b42445'),
(76, 'dGXp3aAzy0Ql96kEHr1BDl6kQBFnaIRkzeDDXSSAhHbUEBgBTH', 22, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 20:26:50', '0000-00-00 00:00:00', '6266be90c1d4444caf51f6cfc7ef1199'),
(77, 'HXvmyhGuTDCccohRxGQenROJ8HhpxnlfNPu9LChp4TGYwFFTo4', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 21:04:51', '0000-00-00 00:00:00', 'e86663093636c850290c6252fc8befa1'),
(78, 'KTJ1lV9RloLHqbbLjf490mqZT46B3Db5ZaYbidnV9MvyrpFp8L', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-03 02:26:09', '0000-00-00 00:00:00', '07a801c2addb97fc493072241f66e7c1'),
(79, 'bOB3WYTFYColpi6Tr7JBFTcpakdoeXDOSGdhi2Qthgxkvh9U8C', 22, '106.211.154.234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-03 11:03:48', '0000-00-00 00:00:00', '1dc6144a09f378a7bc498220f41f5069'),
(80, 'rWqAttyjqRRKS3IVAQbtQsXJQ9SWf7LzTFk1XZsageSV2VKbrR', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-03 11:26:10', '0000-00-00 00:00:00', '025372b8ba17d2b19c0c62080211faa5'),
(81, 'hmqHtMuIZvSDYHWNsxBr0yHwzfhRpQqP1JvxDssrXOdD57rJJY', 22, '106.211.154.234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-03 11:31:16', '0000-00-00 00:00:00', '396cd958d7b9ccd8576a2e897f5c675c'),
(82, 'NyCVI67BMogGwenEJOHKatma4jSaKDyUw9ucH26BN2iWVESqCE', 22, '193.56.245.35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-03 13:37:33', '0000-00-00 00:00:00', '960fffb3b38dc8a50f80ebeddcc629f3'),
(83, '42Gpi2ozlRLaDdazfUPhTjmCtfsWleIpInozRzBj8H5JyIpc9s', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-03 16:10:33', '0000-00-00 00:00:00', '43e8bca2cc9151a0f5d00c786d415aa6'),
(84, 'sHAHQNCtI36SRfsFYTxpPZSZdTapU2p8HpNtsdZa42YE2GyZl7', 22, '106.211.154.234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-03 19:35:57', '0000-00-00 00:00:00', 'd0e8a62424b2763d865756ef2b8eadd9'),
(85, 'wzsaNGFvneytLrDuKyGLytNWDyylKj6jpYPiPLoFDiDS0VMhZv', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-03 19:51:58', '0000-00-00 00:00:00', '88dc6470c68264b295cbc6adc0ce7eea'),
(86, 'oAQnoJJ6NzqKi33yleKXUIVg5tGlhQXcDOuq3zh2IloeSwNDv0', 22, '106.211.154.234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-03 21:15:30', '0000-00-00 00:00:00', '869b3597d7510f14fc20b5ee7db6b9e5'),
(87, 'sncwfdplTeB4t7Rh50PcCWnyEnSm5OlOuPH3dflXb6qHiS6AU6', 22, '106.211.154.234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-03 22:05:28', '0000-00-00 00:00:00', '49ba2f7802da09da3079e513b1c8fcbe'),
(88, 'eG3yHAO8ogWibkxk2W32gE2PWYRjTu4jtdIFvzTALfdljVQvFs', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-04 19:15:46', '0000-00-00 00:00:00', 'baf1d2484ccaaf01cda3d2388122cb84'),
(89, '0btFi0wXBe1wu0b5ZrRjHuSbXPTfqffTPEnP2w2LcdGZCGFLPl', 22, '223.176.37.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-06 11:11:58', '0000-00-00 00:00:00', 'c458b50d03faeeaf5d080c6011471e24'),
(90, '1JBvEX3L1Dlm3NwyLaBHJthk1rlcosyuqjFqr1T8gGL07SfuRB', 22, '223.176.37.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-06 15:41:46', '0000-00-00 00:00:00', 'dd7aec5d24894f66b0c4bd2f58119dbd'),
(91, 'klPzQ5cUSG6eA61Dh8lC4WZKnMvzbry8Rzu5PFDEdpC6BfvBWy', 22, '223.176.37.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-06 18:53:26', '0000-00-00 00:00:00', '3eed73cbe5ef2417ff16b4859d0e1edd'),
(92, 'zu0tLUkYvqkhGR5Liypoyyt158edsNPNdruiTS3tzW7MbETEcx', 22, '223.176.37.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-06 20:29:24', '0000-00-00 00:00:00', '68148ac7abb10dfb07bbecb80ad17427'),
(93, '176BEomgMZ5G6mLJt70X2kqO9Y2iwTo2IU6CmLHx39ss5oUWJS', 22, '223.176.37.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-07 11:32:15', '0000-00-00 00:00:00', 'ba5d39e9408457b9b74fdc8a89660f3f'),
(94, 'jJGTyCG7PCSzsaahMwdf1dAUt3NTIaOMS5QlWNihCost5eBUaT', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-07 12:37:13', '0000-00-00 00:00:00', 'c11fbeed7da6f400dbff83a908567f1e'),
(95, 'vqL3In7danr0ZWp5y4Ki2ZJaSxlbNmCDGhtRgtTOSlMb9PxxuT', 22, '223.176.37.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-07 12:57:15', '0000-00-00 00:00:00', 'af7e5acc11d421342606820ed0b71bb3'),
(96, 'ZTKr7NFNzgYlZYSdDnCC5stIfDRkbtceiLHl86iaTIEj9hUtUe', 22, '86.200.155.155', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-10 04:32:31', '0000-00-00 00:00:00', '84573ddcd722c64f0b70eb3f87b4d602'),
(97, 'nRw9Aqwwj6K9tLd3oOvSFZ7z0Ci9hZnW8arvUCY5YXfK1D1fFQ', 22, '47.11.20.202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-10 13:33:41', '0000-00-00 00:00:00', 'e7c6c0791509826debd631b12d0c6b60'),
(98, 'snD3qFMabGscFCTET7nXPxKPizr1zO94gE1jFo8N5qDBaYHxj8', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-10 16:13:35', '0000-00-00 00:00:00', '1c30bf3699d3c53fc1c5ae1c52e6cb0b'),
(99, 'c6LhoiYwuLJrVGwXScPJGNgEw5s0jJS5mtGeAOAMJLH9h5plsF', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-10 19:58:47', '0000-00-00 00:00:00', '5be98e7e4e3d765534c988a6603e8e8a'),
(100, 'xOuNmoes9Jc9LUPXoPlOmdk1HEX8zI9iW0IvRbYcXOLIZ6SNgI', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-10 20:07:25', '0000-00-00 00:00:00', '28a428f607443d235b12e482ad53a634'),
(101, '8rNkNjPqqJBKLNqpMtgTZS3WGZrVZA0x3FrcdBggwi07C3DLBh', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-11 11:40:52', '0000-00-00 00:00:00', 'de48591c89b3341bd79bf82950199431'),
(102, 'ptukFmhjLmFejVw4i345Bx7peeKlkzjf4kXw3xaGdjQEJ5Vc39', 22, '47.11.198.233', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 11:18:19', '0000-00-00 00:00:00', 'c4f23568268ec5c546575231db7cee29'),
(103, 'DTCzKvc6VRDWj0UgvWg94Oq7xy8chqMVOFDanRXt6qI0E71EJD', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 13:43:45', '0000-00-00 00:00:00', '9d7251a2bd58f7e9d1a1df43eeebf4bd'),
(104, 'G80RWGMe5LBHUA5hR93UBBbMV5uNO0heoDtUVJjuvA63gsblA3', 22, '42.105.113.140', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 14:34:18', '0000-00-00 00:00:00', '5302952de81a5b26c3d8efb5264b5789'),
(105, 'rkLPoRFt2cjQ2SmS0VxmY2fWmwbzfaM68nI90tLbk9zPb7ntgh', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 15:51:11', '0000-00-00 00:00:00', 'b801478adb78aa77bf3f1b611209edf9'),
(106, 'jIyYOuqO6GLn4qQ8gvp64X899brOuaa0UROLVC6XKThaxwKxJ5', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 16:04:25', '0000-00-00 00:00:00', '04ba552aa3e7bb4a2d15cfba93e7adbc'),
(107, 'KEjgNpeFTAhFaQNyc8IV9YT1BXcNK4JJ5sV8wWsI2YkdwZEim8', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 17:24:08', '0000-00-00 00:00:00', '5383f5ed7ee581f28835f13bd886c45b'),
(108, 'NfuRH075touS9hYyhiZvja2I6CwGfErQbjpgWp29PCOSWc2EpE', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 17:38:38', '0000-00-00 00:00:00', '1f5b258eba097c6af2c77ca02733dfcc'),
(109, 'JfZr5ICCgrAr4Z8QkzMlmBpHOMyyNjPKPaOMclec7pKnMIXVHO', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 20:26:47', '0000-00-00 00:00:00', '2f97d3afbb82dc242617e9d578c80a9c'),
(110, 'eOIIZbfSb8L1GZIx73pCptRf21Ol6tUzVAv4wym6YfRlVaxoCB', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-14 14:09:40', '0000-00-00 00:00:00', '667cc9a6b6bb406d98358afeed8f5930'),
(111, 'jeuJadT2YMNdhkYjsx8JwEudkckfnXHiHycyLSV34dojkWwEGo', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-14 18:02:01', '0000-00-00 00:00:00', 'ac87ea94aee0090254308b246a074775'),
(112, 'blSKmzmkluZeVZggBm5fuXlPqbFAu5TUfKFsER9lvnGvcZ47HD', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-14 20:58:07', '0000-00-00 00:00:00', '8c984c7dc21d0e554db710324e3cddce'),
(113, 'ync7T5mDvMxgojUYbi2Pqwbpnx9t5xy6Vfo94YdRkmPZmv4UUA', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-15 12:42:58', '0000-00-00 00:00:00', '04f98b8a0abc3d9cba051a30a9ad0d0b'),
(114, 'u3bQuF00rQu0hcm1Z6Il2dB1sEtowDTY2CpDG4qS2uHt7dR0Wz', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-15 15:46:58', '0000-00-00 00:00:00', '2594d460ac99944b7eacc8b71138c587'),
(115, 'uC5Nlgq1a1skSrcrpt87vkGqlRrXhoE4EAYMjjPkCLYCiQS8ZX', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-15 16:38:07', '0000-00-00 00:00:00', '03aa5e6908bc8762679943fd99eaf068'),
(116, '9VLadfIjLnLwiDvrugZp19fcW6ppNCUHbh3wKFXv6Vao9pb4HW', 22, '92.184.117.134', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-15 16:56:15', '0000-00-00 00:00:00', 'a15705f4a65e4cea89550c8f41600981'),
(117, '074lFP8nN25iNnSViynjhqXhDkTixsvcdSchTYWRGj9Iam94jm', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-15 17:03:32', '0000-00-00 00:00:00', '2c82f9217a43c3d4801f75ffb0b76063'),
(118, 'fdnwdO6SpqR2tjvl5KEfqd5go50NdhZNUaIS30DaW0ZWICp6mS', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-15 18:24:50', '0000-00-00 00:00:00', 'eacdb569a4f27ae4960d883ce8e4c206'),
(119, 'IC2RtsUgL4zMBJCkRUqG84GWmJwg2h7IhzNaqLOH7oYYoOBfiN', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-15 18:27:23', '0000-00-00 00:00:00', '7efb523e779bcc0f0a48374b098a3ead'),
(120, 'tfzAV8NK4BJQ6cpzCIw0O95wpM9SXZgJYKQglgANX5wH4yAiEh', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-15 18:30:17', '0000-00-00 00:00:00', '16f44a744bcd9a3f7c19ebfadd8ef83b'),
(121, 'al3Bga0kPMsBOC4hPSqDqx9ECTSxqvwxHKttXkVS1gGCPdcgDf', 22, '185.228.228.82', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-15 19:08:13', '0000-00-00 00:00:00', '8a200424ed0c6571333baff44bc7abd8'),
(122, 'sEi1hGYPAsuLtdYvMYl7VTGsdUQMUW3ZK8JZexzV8aNUtKlFrJ', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-16 12:49:32', '0000-00-00 00:00:00', 'c0bfd6f4deff103a0a67822a067ca078'),
(123, 'V9cWw6jjwsz8JNY8XNdBXsFDo1kcH1noXj0Hwtr9gOwyIyCkA9', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-16 20:47:24', '0000-00-00 00:00:00', 'c71b03fce6e0d4a0aac7e43847d31431'),
(124, '8bI1WSUdm7ilVV9D0BSYXt6PkvpFjOxb6pYXDH9L087uKIGEWG', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-16 20:48:07', '0000-00-00 00:00:00', '16eabf2112e2f763b6c3992c83187d48'),
(125, 'vwIJeDq9NdNTkl30BbB9xW43N93pOq0Q8LG84xxaOwHkYBxelx', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-17 11:02:56', '2023-02-17 11:51:53', '3504af0134dc726cb005f009b324611e'),
(126, 'xyyAsjorDekzH8xq7d7HbR4SmaGOJZYytUMwwAkcgVXr2ta8D9', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-17 11:42:20', '0000-00-00 00:00:00', '246d43751516824739cde3a9456bc4ae'),
(127, 'hCLme97uppJiIcq9KW3AHorCx0ZwiFGkzQckfAD4ErE77UNWzG', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-17 12:00:08', '0000-00-00 00:00:00', '6e884e853a53f14fe64b329c4c794071'),
(128, 'sXio4UDYHEs1F0L548or7sEcBa0CRL3FCbWubZoGCN8YMwNjTr', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-17 14:28:18', '0000-00-00 00:00:00', 'b21daa0f36eabf7adc902e39e9de030f'),
(129, '6fVFNwYLGQuUumr12PoyI6Ubp9Cb5filR0x8tIqHPgWYrgvzoP', 22, '223.176.49.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-17 17:42:43', '0000-00-00 00:00:00', '68d736a9d61fd32e43b073c0ad230c1c'),
(130, 'pNDY8gJ67N7khRRjFtQaftoa7JDxnKAh1tYprxKxafnD8lBED3', 22, '223.176.46.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-17 19:43:39', '0000-00-00 00:00:00', '795bf09487f718a786a609f108bce1a3'),
(131, 'CQmQW8eBkrQegugZ1MfqQGgdCWPjSXeYJ91zbRNfI8yaO4fQmh', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-17 20:58:14', '0000-00-00 00:00:00', '9efa248c6ef1b884d6c174b011c8be2b'),
(132, 'n9Fbz57j4wQXM7JJ310eXPPnImyEEW29MkZ5w0YW9rG2oMUpaW', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-17 21:58:14', '0000-00-00 00:00:00', '6a531869a85be1a2c6881c71b647cc3c'),
(133, '3oP1voVeXjh7Yv9xCMJHGsDmA0VRsyc7cSZdvIcZJTmrTRAy0B', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-17 22:27:34', '0000-00-00 00:00:00', 'c626a9c85b148beaa24f606416379e87'),
(134, 'KMgvK2F4vhtq3zs3koz4fAynpVYHqqmU20UMr0KHYHdz3y7YUs', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-17 23:12:12', '0000-00-00 00:00:00', '121608ae52c0ab42c4ad7d16642fa289'),
(135, 'sO8Jw6ivlR4Px2AT6geR5Gp3JF0k7tr0e0l0bY1etZujoxbmpl', 22, '223.176.42.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-18 16:46:51', '0000-00-00 00:00:00', 'c9612c56aa76122636846e6b438c24ed'),
(136, '1NyD45y8SnJ6qeGkojiNFByf71LvLkZCemDEubpaWvPAhOa2Wf', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-18 17:31:00', '0000-00-00 00:00:00', 'f62c15e86f818e4fae9786b9162c565a'),
(137, 'sPFZKH7rENQcP7h32OZJRbdWc1uCVvYPAnsolpXHBjgtsVOZWb', 22, '223.176.42.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-18 18:04:53', '0000-00-00 00:00:00', 'cb7defaae91fed0690d4e2d94cd77c6c'),
(138, 'fc99RUd1dffTglQeOYbrME5gKb07zRrh6ub6YNWjExNAT8QUCs', 22, '223.176.42.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-18 19:39:43', '0000-00-00 00:00:00', '948a4492d012f6d06899ece77aa5c22d'),
(139, '2IfKSOS41KdkrMCNlmJJg7hevQhYMosuHLCOgtrteYmFhj9oaw', 22, '223.176.42.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-19 11:56:31', '0000-00-00 00:00:00', '2b9db6dbcdac7f16801aed6cd28f61e9'),
(140, 'zX0v1xqF8IfUQcOyg0syiBm2WnPUM1WOJ6JLBobPhAFgmG3aht', 22, '223.176.42.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-19 15:10:52', '0000-00-00 00:00:00', '590197a5715f293a647ef8af850128bc'),
(141, 'Ml9XrjsS3iXIeAxZ2GOnn6TvjH9cP600o0lMBVW7dNZeBDFTMf', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-19 15:34:09', '0000-00-00 00:00:00', 'e018472ce44f7f2d4f56897ee706ee94'),
(142, 'VviGhJcMKzdqe7mtVj3MgpGEnrAlbzOk47yl2BF1h9XUPNWcXv', 22, '47.11.231.246', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 11:15:39', '0000-00-00 00:00:00', '9e145b3c5d59b72793fa3223e71ddd21'),
(143, 'QNShKMLSw3XujdtyuC8kO6OLp0qM4A6TYvgdgN7RbnCbVTGkr4', 22, '42.105.1.68', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 13:33:58', '0000-00-00 00:00:00', '693e20ac1b5ded791d1e7437b18d53b0'),
(144, '234xlsq3Pr7YwTANyw272AwJINzH6ENkP5pSbzkKvvX8amAqn9', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 13:37:31', '0000-00-00 00:00:00', '33c207953bf1888dc69088b40097af58'),
(145, 'Nj6dtkuFKb1BCqy8F8dkxkrhp0qSeAFU78xAcLCqpigBWjl2NY', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 13:44:08', '0000-00-00 00:00:00', '974aa4d64641b6f63243e8d261111508'),
(146, 'Xdgzt2iy3ip5YUUlufyrattn8q8vXcNCZAUoGXGGNifU5fPPA7', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 13:53:35', '0000-00-00 00:00:00', '74fcbbe7b5bfe42990277b8c5c38f2e0'),
(147, 'lFA5nuJfacEHuFE38mvrJqBKRWYjH9kjkDXQ6do95MRxXsAOPO', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 14:10:30', '0000-00-00 00:00:00', '97f99115d19df7006324ae806f15bdd4'),
(148, '67zLjoDzs6ASgBbV74VhmGjM0ujFlDkaBHKaC2sVfsiuoiiMc2', 22, '92.184.116.140', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 14:14:24', '0000-00-00 00:00:00', '0289a216c9b2545073fb86eb0570be7a'),
(149, 'hOoQ6iD4rcpcX7bt7egiQHaGxU9zZ21jsf6RKzKUVWBYT49ErB', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 14:32:56', '0000-00-00 00:00:00', 'd67bddc39b251f35a6f82ae0f4c53f3a'),
(150, 'l2hTpEp3XRmMcIOiqm7xJIK15X9ePLF2IbBAp3RVwd1yWvNSON', 22, '223.176.42.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 15:03:41', '0000-00-00 00:00:00', '0911ebc33e4f7b209afb44f2efd475d2'),
(151, 'musQ6SoKvkjevkGfNRvyisQOOPjP64z9IpA4Eo8HPoCGiPEWHZ', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 15:37:29', '0000-00-00 00:00:00', 'd96965c70e28d572980531d5452b056c'),
(152, 'nXF8ScMR2j8fBjvitSiJkDwVWocuvhe8XNQfspU3ITilU7Y8K4', 22, '223.176.42.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 15:41:12', '0000-00-00 00:00:00', 'f48f50cb190f41f031ffa37e40d4f1d0'),
(153, 'COJ3T9DGxOPZxKqRXmYLS8L5Rsvq6xsuDDB1SUor0PJUSB5Fc8', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 16:32:14', '0000-00-00 00:00:00', '3207b7e18bfde5b292e77a263174d20a'),
(154, 'gXsUvodUfltjxxSYCH7OhxYmEybO2oSNvo22B4ypUG7W816Kvv', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 16:36:45', '0000-00-00 00:00:00', '3ac3c634cebc93821798928d460d1dde'),
(155, 'Yj17SvQjtcTujdurFcAhvesSNMEsFn2N6IJPxWFWlqfMs5jBHs', 22, '223.176.42.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 17:02:26', '0000-00-00 00:00:00', 'f285c5861e0aceaf85743c58019caf13'),
(156, '3jTgBqdSYOZBhYiDhQ0JdvHJxPBZebaetHFt9BFGUqqJ3T96su', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 18:14:54', '0000-00-00 00:00:00', 'e73bbbc6b84035433ebf2e2e93c3935b'),
(157, 'W6gUX1THXqt5i3xyHuGdaSiY2G7pzSCtNvrv9MJgWlVYXKAwTi', 22, '223.176.42.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 19:22:25', '0000-00-00 00:00:00', '2b9cf22e390191cd005ec230425832e2'),
(158, 'yz2m2oYq41roTZMOWVAhJgDVgI2ckmeqrnd6DfNdDBZocqCKeE', 22, '223.176.42.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 20:03:46', '0000-00-00 00:00:00', '5e112a3d6fb354c2efc740596061c4fd'),
(159, 'yR9p3jXq1fCJoDYoQc9iYTMDaQgtf49sIQdyMVNgYrF3azGukU', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 20:41:17', '0000-00-00 00:00:00', 'a4f76ab9b643f1769b4a8bdedcee1666'),
(160, 'LUo3eVG5PRbNmSL6slolfokyE5sr1Ft29vcaYURp0Mx9J4sXJh', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 21:00:01', '0000-00-00 00:00:00', '52966cb886bc5a157e7ce1f51003e327'),
(161, 'RhnaZKKkG0gv9eBzEz3Gw3xQLfaefUw03wEgvCHWXUWOI5qPoT', 22, '223.176.42.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 21:20:59', '0000-00-00 00:00:00', 'f93838e6a80479064f8a6835a87b836f'),
(162, 'oKAUGsROdPgZm0VMR0RKB06BvVlL3gcxZRZny8MxlZDNgvEE2u', 22, '223.176.42.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-21 11:47:49', '0000-00-00 00:00:00', '2065ce4bdd5f24a364177afabd999d54'),
(163, 'PVvnwiurxtONSD4EelUpo4DZXG0mmT5Zt1reVXkS781B8O6ZRu', 22, '223.176.42.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-21 12:31:38', '0000-00-00 00:00:00', '210839190458fdf357b2c5061c9e82b6'),
(164, 'kMHa5UQPWmKkIrsiIcxtVw1izYTf7RH3h0EYubgPxHPAPrDPFS', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-21 12:37:34', '0000-00-00 00:00:00', '5c618e7a5bbf84c120fca69dd960eb71'),
(165, 'QNDh14gZdifnzunH5gwnVpyfBtXjAdgf1nw8zy8z5syhBexAd3', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-21 14:38:22', '0000-00-00 00:00:00', '50bbe494ceb8554613a32eb1e232f115'),
(166, 'tC9xNUfg8zgQBCMbH0mLiAXf6qFHqCINGg6dGy5xJbdVhy7Fu1', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-21 16:26:02', '0000-00-00 00:00:00', '5729de8b925011ead9ee27a4d71a29ad'),
(167, 'T8QFM7fHUvTe6sTjWCGlqjmaNEJ3asSLePddPptaCjZfSceB2h', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-21 16:34:26', '0000-00-00 00:00:00', '0117e3d0164ce7a7efedb0c13d7d34b9'),
(168, 'IS062L2xBYx9XjTZSMOggLpWp1BGq7IA9uAROsrs7bqQzLUMfl', 22, '223.176.42.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-21 16:40:15', '0000-00-00 00:00:00', '7fc0dc408ded2ee7bf4dae5d9addd005'),
(169, 'b74u2hNzYHS9ljSWHUiUvgOvILdTi63riJmCa9sVVUVB9pJ5x5', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-21 17:42:34', '0000-00-00 00:00:00', '7e1852cf65861cf50f756c8991c7753d'),
(170, '5eltxbHs3jPJAW3hMcF9RRBHwUSUO3pSxY5ntoHjeH3XA7kyJN', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-21 17:53:36', '0000-00-00 00:00:00', 'c9348c09db701affb58719ca7f67f533'),
(171, 'dA1UQwXgvgIV5U5ze8auAL3xakS9DsxfI1iF6tT8VFT6QlSKlv', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-21 19:27:00', '0000-00-00 00:00:00', '3f45a41742c12972f33b62874ca007e4'),
(172, '51FfUuOXnPaWzDIMPX3kKN4RGGVRo13bPPJyREiyXvWgTelV0D', 22, '223.233.40.18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-21 20:34:18', '0000-00-00 00:00:00', '80c35f70f43cb7b49c2ac8d3ba83321d'),
(173, 'nhzfa6wc1AXpPGSrsCY6r8BKrsA0mhKREyFte0I8rZSlLouu9I', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-21 21:37:02', '0000-00-00 00:00:00', '36b1724be1a86c66b1b2fc48134345ae'),
(174, '79YDpeYzZqU6AtTUYCaFzkWo6nuDLl3GbUbjUG5RB91DaBKFbc', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-22 14:17:59', '0000-00-00 00:00:00', 'dae68b2a3d4a66ff4961473a66ff79b4'),
(175, 'nB8u3GGX6Z5AOOPrqjlvXt2iEz4U7b7qMOYGxlZCN0sRDKrvX6', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-22 15:49:02', '0000-00-00 00:00:00', '28f38a1a416cd5aab37b676f98f3b7f4'),
(176, 'XzvFc3W2I2TbNr5LQ0pL78rkb5lfeIvEv37jFL5v6kLD89kufu', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-22 22:02:05', '0000-00-00 00:00:00', '613bfc349fa098759e11fb6c02eaacfd'),
(177, 'vVmHlIMdbrUulzkSvIqgV8jMwZkySCekVk6RwBcIoMdBPzXzIQ', 22, '223.176.42.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-23 12:17:02', '0000-00-00 00:00:00', 'ae26d75e0f876e391c1fe04728b87342'),
(178, 'TXfipOkiZTtIva2UqXTOgCLnnaJIqrX4ZS51OMFxaokH4zpyce', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-23 14:50:53', '0000-00-00 00:00:00', 'c412b02efcf06218617b8cfb58777540'),
(179, 'j1DaNxhXV82NRQFC2cvHVTAjyVe86Zfh7fJd1DFzqKghT0zMwl', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-23 15:00:14', '0000-00-00 00:00:00', '6bbbf1689bf5624a2f1742ecda562913'),
(180, 'h4ry1RPyDlubPTLBYAPhieFfWAci4Kjk23WO3eHdGynR8azeIl', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-23 16:00:55', '0000-00-00 00:00:00', '234c592dd22475709b9d34e0533812f1'),
(181, 'QuFjOB4QIoYtyAJcQTJvdNoyy8qLhEa43QSQDWv7cc3dvVhSgc', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-23 18:41:43', '0000-00-00 00:00:00', '88bf9797a513a060ce407cc84e9134b4'),
(182, 'Zrwye86de1kpF6jGldWw2BSjqkYSAZKntKPiVoMGjoUfpPgfRi', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-23 18:47:09', '0000-00-00 00:00:00', '6bf8b40fd385c6477d126a1b45505be0'),
(183, 'CKsQV77DNpKfCg58QjuMVIortNAWIV3WnKH7kfk1suMifUt2Rj', 22, '110.224.16.166', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-23 19:28:50', '0000-00-00 00:00:00', '5387b2a9f87c6f564fc1be7b16888d57'),
(184, 'MuT20tlUQNA97aqx6jHu9UTeLuAyuVU32GspVufUnweGn9oSYS', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-23 19:31:08', '0000-00-00 00:00:00', '12b945baa6401471132338e8a3741718'),
(185, 'LQ1a4BmNWocqAFDdiUXmxvjdhuN0NS0MToMrLhoj86q2im082n', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-23 19:45:26', '0000-00-00 00:00:00', '51e6c1ca4dd5899c9491c84eb7b2f233'),
(186, 'UfV8EPqHj14Ghud92ElPaoo7sHrPEOfOu6tUzk32qDM9cJeOfe', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-23 19:53:48', '0000-00-00 00:00:00', '3d8de61837a62643c7dc6514c0cd1a0d'),
(187, 'syzlCE5uLEIGZVAlfEB8nH1xWkDECzIdHnYPla5QF1a6e7IuUE', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-23 21:06:59', '0000-00-00 00:00:00', '71f4126caac2123621a8844dd1a71e80'),
(188, 'k4lYK3r0Z6qrJUxQLkeBeJacaRqxeo4M06cDbcB8X1tX1Plfp3', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-23 22:02:47', '0000-00-00 00:00:00', '0c63bcd5d8cd7fd2d37ea54ef6a3458c'),
(189, '5Xl1nd3aeeY81kFHzCIJnC6Zwoj1bxTWxmn3qAC6xWZRMEb1bG', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-23 22:34:04', '0000-00-00 00:00:00', '5e9cccdea8476952b077c12514636680'),
(190, 'CRwq8a2wtRV8t2LRqny2ZLm0YNAMmwu2Pe41uJInszFeDESRy0', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 00:38:00', '0000-00-00 00:00:00', '523eea25af31eba904c67efc128036b0'),
(191, 'pinHnf6jhqzmYTavqWLXEbynGFFTngtE4i86p4o2c88ARwst8e', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 05:07:03', '0000-00-00 00:00:00', 'cb585c46189120b82e554f2ac9d0cd73'),
(192, 'OScXBNbzvCOHki3Vb12O01JMokxzhFPC2aDMCvZJjAy5qUBzZe', 22, '223.237.104.82', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 11:31:38', '0000-00-00 00:00:00', '544603ee4d4000532df3d3f2cb5ccc2f'),
(193, 'TuVL67NqgSZMKnBCdcfCaWhrNYO3GrRzycYIRihhjVUsZqce6l', 22, '152.58.164.190', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 13:28:35', '0000-00-00 00:00:00', 'd5b58ded747ce0d6fe1ca4fbdd4c7fdc'),
(194, 'tMDfRLHK6jJUszQoKU3aJxt9yeLusfWNUiPJpRWipY3C2nRDmM', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 13:43:12', '0000-00-00 00:00:00', '544242acfcc863e1898699fbb8aaa3e6'),
(195, '7KqaVLbMp6R8SxwiUbNPKmLbXKJST0DnBAqK4VnNtyYNZrizbw', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 14:07:15', '0000-00-00 00:00:00', 'f6b6387cc000e2a992e9722d7604742f'),
(196, 'sQ1CkIhIdTkoWE3fyHdM25weBDQOfrJex8K4SSfFNwe8iYV0O0', 22, '223.237.104.82', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 14:45:34', '0000-00-00 00:00:00', '8df260287359277ba6dd9257f1342950'),
(197, 'Hk2jGxz1Tc6MnvNhuRhbjlRQwhxLsJ0TlK0fnV4NFPD2Xbfxjk', 22, '223.237.104.82', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 15:28:21', '0000-00-00 00:00:00', '751ffa94bf81c868973e2c4f7b01f8ce'),
(198, 'DoYJNmqUUBrH843WSsGLSNECoyidjoQMh2FuKXC4J8TH1JOzEj', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 15:28:50', '0000-00-00 00:00:00', '3d0b7f0f925632948242dbe6ecfe34fe'),
(199, 'SizMV2eRjVasVWavahPP22JZeOE9q5t4zweFkjawfUWvuoXxyc', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 16:45:17', '0000-00-00 00:00:00', '6c9fdc87768bd1fbf3ff2378b4a96ce6'),
(200, 'OqWIp2gy7ebvWdjbojlfb07kakBieYRB7MwSLmY2GZQvtMYoFv', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-24 18:33:04', '0000-00-00 00:00:00', '84e0b357a916adba0937f2a74791f7f6'),
(201, 'U2y13nON1migPTILy4kR3c4N9nRdGsfhlMeiNi3Vj6cSlbYo9B', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-25 14:34:24', '0000-00-00 00:00:00', 'c25dcfb0c95fd149b4f2e56a2e080374'),
(202, 'VorHLhHwAi4Q7SgiB7AOd2vsdO2NtQoWGer9hMqUrsx5w8NQlt', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-25 14:38:27', '0000-00-00 00:00:00', '849bdf104855b985e9cf06473dd93097'),
(203, '3HAcEc5jbfUhV9BlBdZrzsVGweapDnlfMvMdOowXT39EYSZmVu', 22, '42.105.3.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-27 12:05:19', '0000-00-00 00:00:00', '0d4fd0e12402551587325d2795ee0154'),
(204, 'fHGWr31xjHBF5WYyjW6HkMU8vVHdHragQhuW34nuJ0kckxNNz7', 22, '42.105.3.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-27 13:23:39', '0000-00-00 00:00:00', '78d33e78125a10e43c9e0614b7b4bfb9'),
(205, 'lXMpjf3KTdd3E2sFFJiigELVkhqRf1lW7UAcljtTsFkjnl1XkC', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-27 13:57:43', '0000-00-00 00:00:00', '730a47c6e7a8b2df8faa2c6484d394c3'),
(206, 'rOTKN4Ot4wRT6p7mznVtdma9HNjKIrpuayXfpESriauV9r6rak', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-27 14:04:59', '0000-00-00 00:00:00', 'eab706728745e51bdb48273886568416'),
(207, 'TznVF3JqDTVOifJj3i7lsROBVGv46aztsbuB5JX9NZAFz9CLOA', 22, '92.184.96.247', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-27 14:19:59', '0000-00-00 00:00:00', '692a1acdb10baa2898d4ebcd7099c40e'),
(208, 'EixLFCmSoqxjbUabkMQPW6ymrrSlC3ZRrnODXtdiCylQZJYpwY', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-27 14:55:14', '0000-00-00 00:00:00', '676320c118f838d605a8e749772aed0b'),
(209, 'fJ6D5jXQ1IjlOvdz3k31LTi3xsMYz6RP5uS7ObbjeCqDWHCRDk', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-27 15:09:55', '0000-00-00 00:00:00', '2dea7a5f93705ec13ee3b4217ad16c5e'),
(210, 'bSkkQrBHW1nfv47ymvX6CK3uqtjjJKtXH051LubWqUXkflfzZD', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-27 16:44:21', '0000-00-00 00:00:00', 'b457e02702c57bbe99680b7633433fb5'),
(211, '1Lxnov0yvj8w7vcg6pPLgl5FWgKl7Mwlvq5SSxRZL1Wt1zg0eR', 22, '92.184.96.247', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-27 18:57:32', '0000-00-00 00:00:00', '43ea661c1944129136dffd5c6e565fc3'),
(212, '7H4E8ga8deENl9nV8GvzyBaK2rEGmWlfXoQNbiKxwdEDYeo4fC', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-27 18:58:45', '0000-00-00 00:00:00', '0833fc7c2cb1b7534abcf1d138f81ce1'),
(213, 'CPD6r2F0SktqaHc86KWBkgVzf33gHn65qopdJB0iMYhvljSFTQ', 22, '87.88.146.243', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-27 19:29:35', '0000-00-00 00:00:00', 'acd67db69d99c80442210be90808fbe1'),
(214, 'ifGHih2esqCYZsaWnKh3NW7Wbf5JEHkmWKZDiSRWaPpmHnXi6Q', 22, '106.211.144.173', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-27 20:06:37', '0000-00-00 00:00:00', '6c18e42896568a0184abaad52c4f7303'),
(215, 'moBTnNighPnehtrigzzeGz6M2QfmPbSDA29Bn4WxVLik6076UR', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-27 21:19:08', '0000-00-00 00:00:00', 'dace710c7c0df4377dd9a51270c94eee'),
(216, 'HhRwUJyU6mgAuIBFdxqiBLt3vGbjL21FuOEjGu9xq7VT7fgXt2', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-27 21:59:11', '0000-00-00 00:00:00', '1f910b54742c0de53e02810067909db1'),
(217, 'JR5yq4VR3orkrMNHtriHfdzB0vibw7yrnzu2O9x4pSxLZX6rVm', 22, '80.215.3.254', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 14:26:08', '0000-00-00 00:00:00', 'ba6741f89bd1c04f43f008d05da15b64');
INSERT INTO `tbl_login_log` (`loginId`, `tokenNo`, `userId`, `ip`, `city`, `region`, `areaCode`, `dmaCode`, `countryCode`, `countryName`, `continentCode`, `latitude`, `longitude`, `currencyCode`, `currencySymbol`, `currencyConverter`, `loginTime`, `logoutTime`, `sessionId`) VALUES
(218, 'ovqUMoxw54yXCcJWwKAuz71HybYRDZKiWHfTzzlrTYofArnES2', 22, '80.215.3.254', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 14:26:35', '0000-00-00 00:00:00', 'd72f6d39af0cf195578bb2d637db95e0'),
(219, 'oBf1IEEWl9G9WoqVPyypx8lE9K6XBlGwNYTjuQCqIMCIGoT1kT', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 14:36:52', '0000-00-00 00:00:00', '801e1bab2eeea33e22d33c75e0902b1f'),
(220, 'tdcOrQbAEO8D2TnzJLHdo2WsdSi0T7JClf9dBNlVVVeLybtACx', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 14:39:41', '0000-00-00 00:00:00', '3bb7106f705ca4f0ac04e916d0ee0921'),
(221, 'O2eiUVBCAWntJg48a0D40feuv02wQeHINb7kYu6FwsFDidh6Ff', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 15:06:30', '0000-00-00 00:00:00', 'bf2fc705232453e9231525238c7865c3'),
(222, 'mZFpZ9JDd4NDnJnToHZiIdmbNeMv2pmwgUF3aAiBnRHfb42dGf', 22, '106.211.144.173', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 15:37:15', '0000-00-00 00:00:00', '42cb8681678aa5ea80be1df1b65f07c9'),
(223, 'OZGXLIbm2qAG4iSaELWmPG4IKeJPCeidkQZ9xl3CHPSkTzHUOp', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 15:42:00', '0000-00-00 00:00:00', 'c10eb3ae0350290caad9fbfb10c6878b'),
(224, 'bgdCAuW5nxCr53JtnP4xRHgyQc8zgUdr8brDaYYh8S2eun6bwy', 22, '106.211.144.173', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 16:05:26', '0000-00-00 00:00:00', 'f9d6df6b0edbe98c56308536af88b54b'),
(225, 'WCbT6mk2yzveGSnziJIH84C7ZiY2Y5C4tDEtt3fuSsvvg1yyMe', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 16:45:08', '0000-00-00 00:00:00', 'ceddd488e51aeb01a51af4d29064a20e'),
(226, 'hIOSi8btBGF1ahsP9Y9yQu1Gaz3q8xokCsFHTz5EfMQ5bZnuGq', 22, '106.211.144.173', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 16:50:15', '0000-00-00 00:00:00', '58dfd3fbd7c8446827d738321ccfe36b'),
(227, 'EIhAKA8ZeARu8plgsuz5nPnIXB4jLquXNx630MDLBPkeQZ4hBO', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 16:54:14', '0000-00-00 00:00:00', '10d1232e28c7c50e686a6fd264358bc3'),
(228, '4qLAyalOcehVxDfkkThJFVaTMqOlfI8H5nir75U2IFmgz4wRMA', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 16:58:02', '0000-00-00 00:00:00', '236445f27f3a88bdb08d9ce28e432531'),
(229, 'qrFkgLmrTAin1hjQrO8FPDkqvxJO45D7WMAMNZA41vYdR1eqxK', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 16:59:07', '0000-00-00 00:00:00', '334c34e5a821a1ad3cc9602598998f70'),
(230, '1f8z74l2mzpN0knAoGdvXwUeYFIAB3rh2JBZLrU4SwqbuPMNaE', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 17:04:18', '0000-00-00 00:00:00', '7082576d08ec80b77039ad55734b07ac'),
(231, 'TDGKSsyJx3CFcbFeMwiDLYYok3JfdxYVzd9gI39uGlkmJrHTKJ', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 17:16:31', '0000-00-00 00:00:00', '80fc27296f1e97e22b7b511328465ef7'),
(232, 'dv7DCVduXdK2tRXWqs2fbd2wM3LXk9tcU0e9OAqIkEt2WBrazy', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 19:02:44', '0000-00-00 00:00:00', 'f8aa257a8fbcf43bd4f4bd8b6635178a'),
(233, 'abLFxro3AuTQYxet8XTYwPggFer0Lfeqj42hRzhtv0jaFVxvZQ', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 19:04:28', '0000-00-00 00:00:00', 'c7a8c3255d953ee0040bfe9f591989d3'),
(234, 'gqx7Ejchu3BreH5I9ise4bi3rnHpNw3cNPsHVs0Id9f8Z7Wijp', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 19:05:18', '0000-00-00 00:00:00', 'e8057225ec84ab102645a11476df70ff'),
(235, 'WY1qNErEeXmR1HmpkkvlVW8aZuijSYVwcQJBV8v6H8up43GRjE', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 19:23:07', '0000-00-00 00:00:00', 'f21d470422fd4953f4e32f2fe3496612'),
(236, 'qR0fSw2I0H5w5lKYGAkaTjgV2H9r4LjYyM5Adryved961Epgic', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 19:25:47', '0000-00-00 00:00:00', '8f791438a4915f00d78d9c4ea6e55048'),
(237, 'tlZymJgWFtLoXZigVburxy722iOcoDoEOYl4Htyz6CUH8X1RA3', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 19:26:34', '0000-00-00 00:00:00', 'b23d271b0b4d8e73582afd709a466395'),
(238, 'VDe8gGKVa4RnKmN8BJypuoXWqrnTfu6LBc1l2FxRNcGKOpa6cH', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 20:25:31', '0000-00-00 00:00:00', '5eb5705e3c36a566cc25706b17c3c91b'),
(239, 'EulBsQ9DoWNAgcCzPGFcbDgz3XoOaQNL9eli9v8hSPJUX36KCm', 22, '106.211.144.173', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 20:33:36', '0000-00-00 00:00:00', '7d5087a9ebc0311a634d9d385a0914c0'),
(240, '2VR7x53kJBpNRzK7AZycykojfGIfjddVOSxSgv2BAAT9cyRObw', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 20:40:53', '0000-00-00 00:00:00', 'dd8451e6e3d4f3679fe918935a3e8b8c'),
(241, 'cSroC7R45ava6Cc5rn4UFeQSD2bVC8wtEiaZo6cAW6HZBU9LWc', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 21:48:12', '0000-00-00 00:00:00', 'c5ff7e13d983a33295bc74fb2f768e6b'),
(242, '8Kt1SMDI7f0EZAcKFP1cTErJLBm5pidfB0k3ppTBfT1Yi9KNtS', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-01 13:52:37', '0000-00-00 00:00:00', '54bed7e756a1c3ef36674c33ccf134ba'),
(243, 'hFi8IpGLzlb0DBiznn8485sj5DcO72NlmAj7IKiRFR5xBhFhew', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-01 13:53:15', '0000-00-00 00:00:00', '5e7cff143ce078ab675fd41bc6544a39'),
(244, 'cZCn1liPKMHvDhdHI83gLSgP9n0ql0BQYMDhd5oqRdyUhlo1Su', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-01 13:58:35', '0000-00-00 00:00:00', 'f0c35199178f43ce712c114fe1b3a8fb'),
(245, 'zl6feJBs3merdal1v3lipWe0cXKbxiTc5UtggWVmbnb4hp1o0A', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-01 15:07:07', '0000-00-00 00:00:00', 'f91b258fcb9aeb002d9b13d5cf276054'),
(246, 'tb4CSrMoRJmj2YYiX9MRXdE2u8i2izTooGLkklZ2ACYqqRADsv', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-01 15:21:57', '0000-00-00 00:00:00', 'c83b6b4fc01b9d6cacb1d7c068687cfa'),
(247, 'uXGFoSviusWazvnyTTAepSMVR0rPgUjZGCeXlNIzGeZ2jqUN8c', 22, '106.211.144.173', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-01 16:02:19', '0000-00-00 00:00:00', '467e08c27ac2e9302790f53cbc2fddaa'),
(248, '3WyrI0f5ArwKbBRkuOLRHiAny1ltvOmG1ygLVFWWL4LQ55eM0U', 22, '106.211.144.173', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-01 16:37:50', '0000-00-00 00:00:00', 'c29332f747412d7fd55de7485b8e7707'),
(249, 'hqcjxJs1jv47WzUNBB3wiu1mLAWjKBLEpnnBYQnLKr74D07tpB', 22, '106.211.144.173', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-01 18:19:11', '0000-00-00 00:00:00', '2b86f8752ca08e388353cd3dd4fe2db9'),
(250, 'l6o8dyNOI44BI7ya7QiUrE2E2pUchivgYrpbcoAUkyMufxBMAl', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-01 18:31:48', '0000-00-00 00:00:00', '8b33b952db42187aadc1683b2777e9fe'),
(251, 'CkrFVxqt8r0AtiCJkAs3Kncs35zQYBuxfBO3TJkmbCtIdlWyeo', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-01 18:52:22', '0000-00-00 00:00:00', 'a07db867c86d73ed881c1fdc3b462d3f'),
(252, 'MxoR4KZhuj3k3iG1U8P7MejwBP2Vzv9KsLRIgSPgNEfjBRTn23', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-01 20:53:52', '0000-00-00 00:00:00', '9e832f56d452e0310277677a01d610d7'),
(253, 'JzMiX6oGzHPeA3q7dHOBtJjylE42D4enbIDMXVZd0sj58qxrVv', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-01 21:00:16', '0000-00-00 00:00:00', '224776f10e1027a4d2694e693ca2b76a'),
(254, 'E1DXVHLKDUzZVA9PFAS1VBcBT2jfkHMFMc3P6lSqYzOvu5ihWO', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-01 22:00:39', '0000-00-00 00:00:00', '39f2845b01500e1b2ed739469c295fcd'),
(255, 'BzcI29FRRaaYuYTlmvUHRrUnZiTpJ4x239ggCyLpdaDqP8yfaN', 22, '106.211.144.173', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 11:59:00', '0000-00-00 00:00:00', '9db02d7756870e9804e195e034485c89'),
(256, 'tMzkDXwwrzW2ZUmYVHExo99hw7lz72upXSAZL2MBsUbTor6Hs9', 22, '106.211.144.173', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 12:35:59', '0000-00-00 00:00:00', 'fd056608474332160ec62cb26dcd2ae6'),
(257, 'cjk6WkanRWHx6ODabUpkwCoJHw404MNYcimf7ogmXsjAw4yih7', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 12:47:40', '0000-00-00 00:00:00', 'e8d64023b9ec0975b9166a44c7e578a9'),
(258, 'JX4PXMEc4swCvLs1uS8nAKC2eooX3avgDsCV3FqcdeiT3JGEAH', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 13:23:37', '0000-00-00 00:00:00', '912178379a08b1d5119af823afdb1297'),
(259, 'b4N8PjXxAvbdM6Dolj5LLKQ2UssKR9x9uIWA5yVXjQpOYhGmVJ', 22, '42.105.6.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 13:41:29', '0000-00-00 00:00:00', '23116d3f884576d49f3d73abd99ef292'),
(260, 'zVOXPY64we2Oip7PLRh1qqGEpb2PDSt9XxVzVdGOmkTOXz92ah', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 13:53:30', '0000-00-00 00:00:00', 'ffb5447e0b4930c6d97aa2b741ad35af'),
(261, 'R7OIDRdXFefYPDrQCELwvnocszHy8M3XAmzETKabctbc113IQJ', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 13:54:49', '0000-00-00 00:00:00', '90bc0845510667248f2f43ecafc2a801'),
(262, 'Jdh4YZMU4nXU8j6iBbcvnDUufppKz5al8lFXUaj1I6HkDKLhPM', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 14:10:15', '0000-00-00 00:00:00', 'afdee36829d20f0abd6a864798f4feb4'),
(263, 'tueqhpUNZhzA2O780gJKToKABn92vmSavKeEOSSd9g2QkRvFjv', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 14:17:11', '0000-00-00 00:00:00', '50ad1eb0d51f4f699f911da2d34a75e0'),
(264, 'C13BDBnEm8L35afWoJDZzbAhecWF7erIvPuXuZ6qrn4jmkwIhP', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 14:43:56', '0000-00-00 00:00:00', '4774b6fdb37670ea01171418f0dd211b'),
(265, '1ls9wPcYiuJLFAwztJwXNhS6XCBCBEhFkNxoYnlDw8ZD4ORuhS', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 16:58:09', '0000-00-00 00:00:00', 'f01fd8be7ba16dcb9eeb22201444d7ed'),
(266, 'ZIO9c0Y5GyN7p9IzHXHotrfSM5oBrR0X2NHYmwG9AaCWzsntsR', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 18:18:00', '0000-00-00 00:00:00', '687ac2667156d697653934e9075fb35c'),
(267, '89DK0rT8YFjGe4UVJ8KygLCkLNv854t3Lky1iAa6oVryNdUdhE', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 18:42:02', '0000-00-00 00:00:00', 'b518df6b9184d6180bc41a040782da77'),
(268, 'N5LVg4qksQcQlLvBMnom7jt8Pgxrcn4Jryvt8Fq0DOVD7bprGN', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 18:44:28', '0000-00-00 00:00:00', '0d2757dd7bdf5b88ccb194f83514a490'),
(269, 'JY5FqiScQ1djdk8gC1nyss7vzxlgHhXdNVGJMvm1whqyGgUkBB', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 19:52:40', '0000-00-00 00:00:00', '0da49cc2ef240c3d98b4c0d1e20f31be'),
(270, 'jQ5iHMcQqeUYif0vqH0Rpjo9buvQKnsd1owRewiEEMMG1ki4CJ', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-02 20:29:52', '0000-00-00 00:00:00', 'da32bc1bfd5315c1390d7517ae142d38'),
(271, 'sd2BpSoxdhAfyJ6nJ3xEwbaTamXfcPP8Jt8lFF8g39q4dFM9mq', 22, '203.163.250.103', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 12:16:08', '0000-00-00 00:00:00', '0e7a1ef4ee7a2dd4cb872d5aac7493d8'),
(272, 'SP4zf6HijrDcIxkg5uqUvEH77EhFfsY5T8CNyw2xVcPHW6UNVs', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 13:42:20', '0000-00-00 00:00:00', 'e31e08b6b20f220679a3b9d7d6265b72'),
(273, 'YvpGYYJ6ow0HEYSX9Vv1OvUn8ttCHcK55XaVooF6oe4VYJfdOz', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 13:57:35', '0000-00-00 00:00:00', 'ffef8dc05b58f65236fffd876dddd115'),
(274, 'BvRTduwyaqlhrefxrWKPqxl4gqzaIJYBGTAebxDw5GU0oXIHLW', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 14:09:44', '0000-00-00 00:00:00', 'f17b5cc11180e930ebf2969b609601e6'),
(275, 'pdPaEKiGx0V5I1mLlpNoAHApG542kPZAFjO7L9iOGCegrxTmMG', 1, '49.37.34.149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 14:47:27', '0000-00-00 00:00:00', '3d27ef2e0442631b7087798672b8025d'),
(276, 'F3Zpaqv3jRYPqgsp2E6V8Ch5ueQpxQHi4cATmutrYJFNlt8Zlv', 22, '203.163.250.103', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 15:09:49', '0000-00-00 00:00:00', 'd18b04c695dfc72dd5906c11807fe0fa'),
(277, 'I3n87iRf8ET6Ztf17NtalOF13xuqBY1BhkJvdwIPHQ9pjpRVGe', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 15:23:38', '0000-00-00 00:00:00', '593c142f05a6d789c528ad9d20fb43ca'),
(278, 'DmbRACNAYF7QtTlWECkBBjqeo5hufJt6b7bJr7SG0xxR145DrU', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 16:45:48', '0000-00-00 00:00:00', '43c3f2d243a7177bcdc63c5b1c0aaab5'),
(279, 'zFEhnS2e3LptXdlkScCC3o4JdMqOOxx6jXVf7fQP6lTGBiPeB2', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 17:47:10', '0000-00-00 00:00:00', '369ba3dd0cc12c75a0b93142322b578c'),
(280, 'W5EaMDoByhAHgxejYFSBoprJt6OU7IR8Hupkt8kf3yw5GDBbVM', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 18:38:48', '0000-00-00 00:00:00', '23c68f938c90d89016cb2352ad00e3f4'),
(281, 'rb3pj3TKgWlG9cSowMHmNAXewOjl3HfADA2HsuSHDVtvNVzGO7', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 18:50:08', '0000-00-00 00:00:00', '78fc163b6092edb41050b45c0936e2af'),
(282, '1tiQquVyGAzA3XbqK8tDeeSqRXyfFYtec3CoVr3flmlPSv2kY6', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-03 20:44:31', '0000-00-00 00:00:00', 'fe7c3993c65c55c4d022f1f2fe7ec3a9'),
(283, 'Ydt9EIALN8pUtV7I76IhBJ33GIl7OCxA1IeaO5pDkbYlB0M3I2', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-05 17:39:36', '0000-00-00 00:00:00', 'fba507559541119bfa1bc903cbce8fa2'),
(284, 'LbD6wpD3LJE1WYlpz7aysTiQfaHMVLfC675VP2TJgDL4xc9Cvb', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-06 11:08:34', '0000-00-00 00:00:00', '9b3e1ced5aadf070536584f4b8f36574'),
(285, 'bEN9Tbr81h6fAaVJwg04p5qSuLqtJsv27rHxW2HDmSmLekIl1E', 1, '49.37.34.49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-06 12:24:14', '0000-00-00 00:00:00', '6ccc32947eaa5be37240323658279260'),
(286, '8LdjoM0KSd3GCh3QpFsLW9nGchU7a18439ZvpX6oe87ffiMSKy', 22, '223.176.32.253', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-06 12:36:46', '0000-00-00 00:00:00', 'e8649d3c4488bd2b7e275f8c6d90882f'),
(287, 'vlZozDIO9Tc9IZx1TqsrX4zVAwth4Mrtk8DBkmeRDu0dvcmXl7', 22, '91.165.130.146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-06 14:56:19', '0000-00-00 00:00:00', '279549c0bb4236fd535e376eb085664b'),
(288, 'CjT63mN0YJnjLiqvj0TjRzgz4CM4hVUUCOhIgPUAKDZ2gPWCRG', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-06 18:30:19', '0000-00-00 00:00:00', 'd119504334c591f3a0512fcb7aa69d5e'),
(289, 'CtbLrk4006Nc7IQuMECUmTMJh1paJDsELCsvbS0fa4pocNTcK1', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-07 13:45:41', '0000-00-00 00:00:00', '9ff0b346f6016ae410fbbdf845309f78'),
(290, 'TLikC9GhD23qlLW2bP0GrhEi42YOEMbX3gmoVzqCTj0T5XiueU', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-07 14:12:58', '0000-00-00 00:00:00', '7e9ee3291b87648321255331616af888'),
(291, 'rvhmTD60CNlLSRDD2knqz8UxZjGhMaLEq8lArFxQMWzDznCFUj', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-07 18:40:44', '0000-00-00 00:00:00', '451390eb63b0d002389747071d55063d'),
(292, 'MHaFWZxoRqwDe6EL9zP7u2H8B1f8gCyJAofV3j3G9605l62AdI', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-07 19:55:59', '0000-00-00 00:00:00', 'b21a0373c11ab74a0bf6807385d10d80'),
(293, 'fd5jrufMirWcX7hENf4PobpFI4QashilAHTsOcA8WVeEEjhqvZ', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-07 20:32:22', '0000-00-00 00:00:00', '2f8d3b031333a6e82ee614063ed75354'),
(294, 'yOCvZVJe72iVu8ZhlVZd3vC0tClePmSJmYAITQ9uhJc8nUJeoE', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-07 20:43:34', '0000-00-00 00:00:00', '86841febcf45c3baa5b73018ded965ae'),
(295, '52GqAxIu99DkuRWphuG8QZ8BUxd1zEphHrTbs8F8rniC5FggpP', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-07 21:57:52', '0000-00-00 00:00:00', '483e07d8f0699f677deead405b59422f'),
(296, 'Rm41wGECAtguFAITrHui9bJYaye8FabcErxyPjj1h9KIyNoK1Z', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-08 13:34:40', '0000-00-00 00:00:00', '44ec3f12a534c218e7aa008705c59b46'),
(297, 'Z567hMrvqvZOkUBOaGDCaXe7nXqfisJDG7BjDa2NZbeoZXdNaZ', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-08 14:18:05', '0000-00-00 00:00:00', '98a4d3fdbda5a2b623bd78b5949f4b60'),
(298, 'kkVQppNMnJgGTE4zF6i3kTqcFbyCRwqXed1kgPffcUAbIMoHUh', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-08 15:18:16', '0000-00-00 00:00:00', '1da591d2182ad7f7765a81a26c635f17'),
(299, '97eYrIYlY2WaXkxPfpAyPylvMu9ech4RpsTgKrvJi7nnirAkEb', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-08 16:12:01', '0000-00-00 00:00:00', 'eec1461d85755fddf1fe6a28bc1c28c3'),
(300, '1zwFPyeKeZHNvoKlsgTPPdvIYEbUSALcLAfOPU2NLQBJKVp2Xc', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-08 16:55:32', '0000-00-00 00:00:00', 'a2454ad0599269de12e8c14b0cc8b7d1'),
(301, 'GgbjAG6AVUQIJpSfEUgRyIjawMRZnUxTzCxxYRYCe7JFCis1hq', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-08 17:02:45', '0000-00-00 00:00:00', '7ae6002d816dddcfade4a9ccafb042d7'),
(302, 'su6igVAodCR0Eu6vrjQZ40td8Lz9ZjOuYqlh91vwLWUckxlH5b', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-08 18:33:16', '0000-00-00 00:00:00', '64d38809c679f7af375d281e08dfa40b'),
(303, 'CKVlrlUfEY77HjAbnS5WstrpYdglMr06zRfvlNhiE4LifHhrrA', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-08 21:04:21', '0000-00-00 00:00:00', '68d7a90cd1ff5781648438c72397331e'),
(304, 'C9kTOTq6tYtsM8LAGimu82Z2qUUx5RXNhezkmQXNDsMa1y4xg6', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-09 20:40:37', '0000-00-00 00:00:00', 'a2d6c68202c0ee1a99ba8a770061c6d9'),
(305, 'hgQ5haEVAWqOfOMfXg1gKBIIMvuR3IKnSLhoRKlFR0ZdU4MaDx', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-10 13:47:24', '0000-00-00 00:00:00', '52a484fa85126f1991e01a0084bd8162'),
(306, 'c7NEcnJ6D3CgMTqHf85KFejAmrgLIjCXxlPMzplxD2sikJK6iQ', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-10 15:03:29', '0000-00-00 00:00:00', '6a93297b30ca35a902f97ffd7c48a932'),
(307, 'DSWlo5420B0ieK2NmJAS5nIR6TmRfdyDlGy1VKeXd7K8yg0xxU', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-10 18:36:00', '0000-00-00 00:00:00', '0a28769afe8c22d02b6ee606e3aee009'),
(308, 'qyyC3WyD2tv6R2p7s9ZNarsjZDfSxKjwKJ5lz0kyNiKiUOmQ0D', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-10 21:01:53', '0000-00-00 00:00:00', 'dacde41e271a35534bf7b354ab7f7a05'),
(309, 'zu8sOYtZvppFJwrN0dveOdMQGxuv9VnNWfX5OWo8gN2u7sO7x1', 1, '49.37.35.91', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-12 03:51:34', '0000-00-00 00:00:00', 'vuks20l2lkhcj014auk9aviak6'),
(310, 'EOfTPGbodBARZinHvICIpxAMD5RqqzgagCpIXDQYDz5SKFrgvN', 1, '49.37.35.91', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-12 04:45:28', '0000-00-00 00:00:00', 'k3fk17f77o1f4is20j5521jphi'),
(311, 'wZJqE9EnOaybYgR7tjLIr0FkKb78KCV2SzPiaSp42fqzzkJ42t', 1, '49.37.33.21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-12 19:31:31', '0000-00-00 00:00:00', 'v0btcghoqfjfoek26d108flhs4'),
(312, 'uNCpr5fCoBro8aj0Ru446qrqwAazYSeO1qWS9NbaRaTLfq7uiy', 22, '223.176.32.253', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 11:22:30', '0000-00-00 00:00:00', '72572gg2jhm199q1ckhv12rbto'),
(313, 'rqbm8PV6VeHKVrPQD1G0v7DuuhdiCbj7yVWobLVIrcL5XHzVFw', 1, '49.37.33.21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 11:42:45', '0000-00-00 00:00:00', '1gd7voru6uk1ctu67htbcpsshg'),
(314, 'YpAjDJRkWGhYz2YDJg3ms2imEXDErHthS6v3SInsYhRMyhDhT4', 22, '102.16.65.143', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 11:46:09', '0000-00-00 00:00:00', '83pafr1jtl4p5njl7aqa3lp05g'),
(315, 'pmFGtM3eUzTGpZUKY1DlBqXgkgbdG9IYgKB39FS1ke1fnSCEQv', 22, '102.16.65.143', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 11:49:00', '0000-00-00 00:00:00', 'e29duv60ueu3muoesj1cs7uvrf'),
(316, 'eHW1I5jI2BSO6RXZ6mD3LbaE4eGqi2pJ3ZmhCiH52OHig1NMRA', 22, '102.16.117.119', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 13:34:42', '0000-00-00 00:00:00', '7ihlevn4j3bkvts6r2pm8utqsc'),
(317, 'xZFK4vay1nIAKQt3OtE6qdQ5EpqKiIg8WvuV8Ss9nIxEeYsZ8A', 1, '49.37.33.21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 13:46:53', '0000-00-00 00:00:00', 'gbn7gfdmf4hhsf437kpgo7dsc9'),
(318, 'xDZ5mSpd8USzjS4ln6M2OBrxysUyqQeLWRNCDOlvtxdEpJ8PKn', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:17:19', '0000-00-00 00:00:00', 'hdv8566t8fgqg17g6cl2lpovc4'),
(319, 'AINH0I7m7bOHTcqM8HUQc8wYUUCGQlbZKK3naQC1OHPdAWEHs4', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:18:02', '0000-00-00 00:00:00', 'o87dopjvul4aie9piq6lh215pd'),
(320, 'HfT234DKA2ts8aTtqXiuU8OPMFQxsawJA2I2XyOlXjL71tLFe8', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:18:09', '0000-00-00 00:00:00', 'lgd7p2l9ttbt7rh2frs7jdkn71'),
(321, 'PE2keYK0xh0cpvPWeSSCKHiIk75sgaKpnSQDsvKIcEsbENZzWX', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:18:10', '0000-00-00 00:00:00', 'rp7ebln3j45bbanf1iqpej3f5j'),
(322, 'FJvQJjy4M4SdyUj9vgiDhZJMb4TEOI4VdpjC7y8MJ4nVlzgFzG', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:18:29', '0000-00-00 00:00:00', 'i66temh0iup0vlrvfbhk5fageo'),
(323, 'XFbNIEk4zdLz2JuTcbA1Kr1N6dvLrXN9Ju9sJr6qxmGix54q1d', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:18:44', '0000-00-00 00:00:00', 'j9fn9l7fum3elurrj1nuvs759c'),
(324, 'mPjAr5gCIGQrvMQQMVRjv3oxbb2crjlswn0Ob4U2XJsZPegJOC', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:19:02', '0000-00-00 00:00:00', 'jcabiua9fdq4rro9flslg0cil2'),
(325, 'Lb7Viug04szyHwwaqd9Byrg9j4tZSMIDKSrH5irkUkB7Miqw47', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:19:04', '0000-00-00 00:00:00', 'h89khoi4ieo6o1ma8n3q9fc9nm'),
(326, '01QQiopoGFwY4SlCV400rSMqPDhXSIfFSfz2uAezF7vAtiHYrB', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:19:20', '0000-00-00 00:00:00', 'peo34klejth6k9k8rv5i8fk43v'),
(327, 's5FdVzQvNNtitj7sLeRdvxd9RPwbnRsZCRlfPqo3eJB62sCJzw', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:19:21', '0000-00-00 00:00:00', '010797d8amm5rpmdshge7js604'),
(328, 'PVwukcP3cTdg8fb58EnbjBD18pnhtM3oJQLNkONq6ofTYIcEZO', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:19:22', '0000-00-00 00:00:00', 'm35ja1t1cacm53ldm4jq7fomf0'),
(329, 'HvSEP5nmHUPTGuqcgM8wpiJeP2VT28Xpu0rlBpE6iHNWGrgmpc', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:19:22', '0000-00-00 00:00:00', '4ra1395jp2a5hsode6ittr40l8'),
(330, 'DyLChBxa5MPmuUjVCaiDA1CRkCpWxKIrYmQo11wS47nJeY0IfP', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:19:22', '0000-00-00 00:00:00', 'tsejlui1fpue1vfhc98stg1u2v'),
(331, 'ZkOkO6xwgvuPnUwPVJOSYvoOWqo2QN0rI2vpNSh9otfw0g00V2', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:19:22', '0000-00-00 00:00:00', 'ds4gf4e0f0c48k1qhgbcpmjb7t'),
(332, 'kCvGspRfNmaPy5YSkFbeVmVyGTM3ua2aQn00kSzeXIyu1YTMuX', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:21:15', '0000-00-00 00:00:00', 'e25fv3tqk7rfi4tnnh7vucitk9'),
(333, 'L5A4FylyZUmk8t7k4ALbDoEyvlP1qvMJpgjyPFzDTy2M1d1iS8', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:21:19', '0000-00-00 00:00:00', 'ndll511lnlbicat7pjl9ar3rq4'),
(334, 'piOy8Fz6I2bcYeh0IhjP0aMGC1ELO5GCQ8rhqXDetuSY944FHB', 22, '102.16.117.119', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:23:29', '0000-00-00 00:00:00', 'isopba8e9lmdohlleop026nk9l'),
(335, '30FNzNnieyps7UcH56T4BFDUcybul0LXz9EigtLAzyLKOZjZXb', 22, '223.176.32.253', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 14:27:49', '0000-00-00 00:00:00', 'cocrrafq2vurevvviccu3fmgls'),
(336, 'NxkVaZEUgTftUDtGdmYOkapTg6EVvkMZ6eRBtwbgtOTN9PTaAE', 1, '49.37.33.21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 15:10:12', '0000-00-00 00:00:00', 'a9ltuo6rav411eje4itis812av'),
(337, 'sGHrMIO2rF3kmyrZQiZszK893IijJXROkqioKOMg87UEsRjNJm', 22, '223.176.32.253', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 15:31:51', '0000-00-00 00:00:00', 'kg2kc54nvtog4qml3o0ci14s1s'),
(338, 'NhQYGjMPEZwrLPSNiSjyWOXo79azOtsgktBfOAFiKnGd39Q24n', 1, '49.37.33.21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 16:56:53', '0000-00-00 00:00:00', 'pu94d266isan5itlenv3ndh2fr'),
(339, 'HTXkyHZTi9Re0lmzu1rn3ezvA8l7CoXdSmgjhrw3c6bsRdHLQm', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 18:44:23', '0000-00-00 00:00:00', '0mjgdrh4ull6msb1u7pbj9eh6p'),
(340, 'wsT7cmV30duC3yjlVJELOYTRDZ5YQfVIaWKJyzM90hdVQ0mE89', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 19:03:10', '0000-00-00 00:00:00', 'l6pmcrjhjj2iurarqds0dcepkc'),
(341, 'PcXbSocdfuqjMHLAUZcpytCzVoZhhfTLwyWnfp4yZFsJ3jtQMm', 22, '223.176.32.253', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 19:49:05', '0000-00-00 00:00:00', 'b99mpoulqcd1h0ris1b8kgde5e'),
(342, '7HbBnZ3AWip5icpqmdWuMvhWwwPb9DxTAy9jOWl2MRf1Q4YM9n', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 22:16:17', '0000-00-00 00:00:00', 'jco381a8gru9c3u20506g6js57'),
(343, 'cPe8RyeIQ4lQY0p7MC2tNiQhCg5ZfHiUhrIljAtmgqmbZkugeA', 1, '49.37.33.21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-14 12:01:57', '0000-00-00 00:00:00', 'nv5eg1r7v0t6mu84huekl3j37a'),
(344, 'rgjxtbGbrSVS8bqdnW9ZsxeMRSTTUj8MpR30IGoOjRRk31rYz0', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-14 13:59:49', '0000-00-00 00:00:00', 'vet1r7mojfsugfdde9j2dd3rhe'),
(345, 'JOc54OmQ4pLsPm2nuId7YZHPLzyy1GqaPvaRrdPr5pWfxvJE8r', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-14 14:05:31', '0000-00-00 00:00:00', 'hnrur50u56h93f620kvlib7sgk'),
(346, 'eRXVfeLOwPoDqZoqn7ZevCWc8Xjf4LuImp2IMbh7cvfxEKJjky', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-14 15:40:16', '0000-00-00 00:00:00', 'btj1855f5h344nisccgq2bd2jf'),
(347, 'ePvYtCc4y6bYZghQbz0VHpSNd0Z228OXYOGvyYUqLqM77LBs4z', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-14 18:49:47', '0000-00-00 00:00:00', 'a4sa778csq2rib5qdp4vijt126'),
(348, 'wZfMsQRgwilhhFDUq7VQo09yREV3BYzdTebGSpz1DUUOQI6aKA', 22, '91.171.140.39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-15 13:50:54', '0000-00-00 00:00:00', '91elbf3sn6k8e07pd2rv0icvpt'),
(349, 'JNHksI1nncEnjJAQEFjxmxF6SGoo8Y1NKnidDZPAKNJfYdZK9i', 22, '91.171.140.39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-15 18:41:59', '0000-00-00 00:00:00', 'i6gc3kqc32mftngg0u7qbfc916'),
(350, 'amo8ASfg4ospeLEgWQrvSX6jlrTkCAODETc9zHQvQ6IzFrgLHN', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-15 21:15:14', '0000-00-00 00:00:00', 'p53jrve1dh42uuldn6pic94tns'),
(351, 'hKhEyUxmcknmJGZ2jXVIbXmutirKM162P1z0KlWCk9TJztlxI9', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-15 22:10:04', '0000-00-00 00:00:00', 'cgtqacik9qg5bk1lks86ogj9j6'),
(352, 'qZot3tPrjzWmd2QZTF7cfOxz7dDYnkm1YQfauawmBf6XgVEL8b', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 09:19:15', '0000-00-00 00:00:00', 'h6uv509f6vtp13unss2r18rjuc'),
(353, 'qfAWp6lamvcTe9RI3h9HcymPa7pFd8M51Rs60vQcyXauFZBXca', 22, '91.171.140.39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 13:47:17', '0000-00-00 00:00:00', '90j0j5f9j9jstkt8i5i4k3snbk'),
(354, 'uBqKsUAD0b07GUEBx7FbiN5KjZshoHTlEtuzs1XVQOOzU5n6W3', 22, '91.171.140.39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 18:39:42', '0000-00-00 00:00:00', 'q1kcc5u6psap72irot3e9j8t0d'),
(355, 'HJdIBlKEaw7ONqtHIZZ3eGu1y2yQI84K367CKMk2ZcS2xuUNgL', 22, '91.171.140.39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 13:58:07', '0000-00-00 00:00:00', 'bcglvl6u59vbto2n9pbtdrt6qd'),
(356, 'oEKdHF5J9rV7r3dbSnhaUGCfvMbzTFU186Y0SqGysJjo4iVthR', 22, '91.171.140.39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 18:48:42', '0000-00-00 00:00:00', '9g7oq3jnshunppiro2106r51h9'),
(357, 'k86sKqM1kYdExkem8GQ6w24y2eEDyt2W6maK5CRLVx16bzWVsV', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 17:26:36', '0000-00-00 00:00:00', 'jhrmcua7qst6na7g5tqd5ren77'),
(358, 'w4nnBPqZkUK1j3GB0WMuy8feseJcXzzhjt3UW0kHD2JbPe6qbk', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 16:44:35', '0000-00-00 00:00:00', 'tcsgf76slsbf7m31pbqa8o594q'),
(359, 'yOTp8aZoJPPRAv58wjMnUp0wfQl462IYpngSx0f8BDk3kH933y', 1, '49.37.33.21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 16:48:00', '0000-00-00 00:00:00', 'gqha9m6kl7me6ajb9fuk8k2oa2'),
(360, 'Q1iYHWLCwLJ9TYndDagDgKnSSIUZQggfO3cILIMg33CGYmzIw6', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 13:51:23', '0000-00-00 00:00:00', 'qhe9h1274di8hf4jhbdhst1jr5'),
(361, 'BJm6ZOh5PcSll3lvb3PdhCVHcU60FK6B17Sp5S3pXhtknwvOLG', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 14:05:03', '0000-00-00 00:00:00', '7bbm2fvs7k2tfukd0953gmajam'),
(362, 'YH1JKZI9KAHsd0OXOmvxuw6TwmTJkJF08JcLJj0rHrJOOYSkKJ', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 14:14:17', '0000-00-00 00:00:00', 'cbha24b91oqoauq1rmhdr72vf9'),
(363, 'WDH9zktucP1lMnLIsYoNo24sji3DnFCkpFT5I1mARD3IRte1kU', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 16:11:16', '0000-00-00 00:00:00', '1to22th2qq4tc4oig85qq0t314'),
(364, 'ZphR5O3o1iOe5Q48gAorupHh88oLixUabm6adGGtj3jqpaeA4w', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 18:30:21', '0000-00-00 00:00:00', 'mocge7j0g5mrk2lumvg0b25mrl'),
(365, 'McJwqrPliQ28axp4zVAmMuHhazAQT41MrokFU9C0SrZaxGts7O', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 18:41:14', '0000-00-00 00:00:00', 'dbrakqfjfitlef5giovmd3lkls'),
(366, 'GxAcMX4coPr9ZB0G2NjfoEFvsLcb4PJDSUdFXD3jiB1XsufHPI', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 20:24:36', '0000-00-00 00:00:00', '82b79p057en55l9dm61ib44pq1'),
(367, 'xhmA8pBNpXrVf8QknnH5XFASviLzOXEgOVoQdNvgW84fOXN0ru', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 13:30:04', '0000-00-00 00:00:00', 'cj0hhgofnid32oqiru1qrm6qpu'),
(368, 'cUuZKLeDXYJqO4H4bSGr1tlBAbYqRawj5aI3WNvpwEp9Om286g', 22, '91.171.140.39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 14:05:14', '0000-00-00 00:00:00', '55hb4d4ar0vmsaai57hos5on85'),
(369, '8jGvj68DiKeDXB67tIIueT6upZ330BY7XWr4Yh8R4wGQDRDpF0', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 17:18:15', '0000-00-00 00:00:00', 'qbfrf0s408iqqno0nerj54s6dn'),
(370, 'jkN70B3iKN1t6ftKn1wI12s45CwSIAhujH6CWZh84ojr39zF3o', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 18:28:51', '0000-00-00 00:00:00', 'tagkmi1ss251hrtcmqi23n8aok'),
(371, '3JLmzNJOVzODqt7LppmabmamcLZvzkOMisEgQDYRuXmzsSzwwT', 22, '91.171.140.39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 18:36:21', '0000-00-00 00:00:00', 'pgclbillsu2k2icq54b50lhep7'),
(372, 'ieK16bfAU4qkgshp2KnLvp3SZBnA11DJFoEKIZwLPN1ADmZ9HT', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 19:08:42', '0000-00-00 00:00:00', 'fevbkf747utvvop1b2c81gtpst'),
(373, 'zVQ6afWJtEZZQLvCW6cIbxY8en2wad49Xj68pUzxksdk6S9GVF', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 20:53:54', '0000-00-00 00:00:00', 'a9akta33q30oq0rgv3921dm0g6'),
(374, 'Rn7hjIN2pfGmwtI5ol1z3zXwEMHJQLGuwoLJgUyQxmFS7AJOmS', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-22 04:09:52', '0000-00-00 00:00:00', 'ojrogca4ai6tnrjblnl9au961k'),
(375, '00coIYx4Ho8FnLWSRypYwmKyJIzbLkTCCk34duGyYZAvuHJsfW', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-22 13:22:16', '0000-00-00 00:00:00', '1hoo13bugbucsgqkaags39in5q'),
(376, 'bRpsKNoz7JNX4Lyqect0oPLdobo3DEmXX4qQ9WnGwZ6KRL1iU7', 22, '91.171.140.39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-22 14:11:10', '0000-00-00 00:00:00', '4qoas87sgimtkt5sa94mc1sfnt'),
(377, '9wHMiT9qc6KmNHIJ5J11LhHmU4iHS8gCIQsr1WQDHLqHSwNpc0', 1, '49.37.33.21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-22 16:49:38', '0000-00-00 00:00:00', 'l0nibq5g50rp01dic92sckdpnt'),
(378, 'I07QmXrxnB2EV3mRnPvqB6XzblFi2yDcMwGdFkx8n4Ni222KHs', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-22 18:16:30', '0000-00-00 00:00:00', '1qp1m1h62dkikejtan2kgot5q2'),
(379, 'ulqITPuQR9zjwQ7qbufQDb4PQfyeZQTlCpPWVKFt960nOX613T', 22, '91.171.140.39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-22 18:44:27', '0000-00-00 00:00:00', '7fv2t403ar8n8rl44ane5a37de'),
(380, 'QhYM07RW7C8x3JVVtCukbCRzpRikyPwlsJwL60YaCKFHSGA0nN', 22, '91.163.35.249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-22 19:19:19', '0000-00-00 00:00:00', 'qp2c6lm7n0892rlu23bp16ag2j'),
(381, 'dTVmlHSLQW6nbu7M3NrhHy0TwNPwAVi1mPQXvUK5sMZR8ZOQ01', 1, '49.37.33.21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-22 21:14:41', '0000-00-00 00:00:00', 'l54uvokkp1ak64r7n6nm7ocots'),
(382, '3jT5RZXsCCR2yGmWajpwYgms1mgiA3cVH2pVLw1slgWI52KeYI', 22, '93.19.8.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-22 23:47:36', '0000-00-00 00:00:00', 'iisnvfvsp4fr9q6n1m83clpctr'),
(383, 'J8cjWBmTYyJzUsO4RcYEvZ43HgCh8xd2iTsOQ88rvcJ9HyTcEf', 1, '49.37.33.21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 00:54:14', '0000-00-00 00:00:00', 'bsatn6jc1qidhoqf7surd5f2aa'),
(384, 'KtcYKBVrMpVnIvjHj3AoBiK2gLtACOu2W5KBCNNMJ45AJBbCTj', 1, '49.37.33.21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 11:49:09', '2023-03-23 11:51:21', '7vnv7u2vm7igsfr2m3latgd5oh'),
(385, 'O9OJoCJskTatxMkj10wmu0idRwKYojiuITK9jWo3aCBUQrgq8Y', 22, '42.105.102.190', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 11:51:18', '0000-00-00 00:00:00', 'fb6nr5qt5k1lc54m02ie4i9ig9'),
(386, '81hH19KYIequOlhr4JJY19zEyB66hE9R2RNLiSs9CDMVI65hlb', 22, '49.37.33.21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 11:53:15', '0000-00-00 00:00:00', 'lhlm5kpka69shuh032sqkcjoe2'),
(387, 'LRmQ6HYrCTOFUoOfV1RRgV6pJKluYs84rBEK5a3Fy7Bmu82ZsD', 22, '176.130.130.208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 13:49:24', '0000-00-00 00:00:00', '3066paro712q896412qo8r2e3k'),
(388, 'aOTKYGLRkZfmG33x6KWTWvqYZZVYJTvUReiBguiQSZalA2c50A', 1, '49.37.33.21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 14:06:02', '0000-00-00 00:00:00', 'a4e90804vtpfcaic8gbsvpnlj9'),
(389, '1e3n1NYzDg8SC86Kmv46yfvlB9HLzB4tcPImKonXhCF082FsoN', 22, '91.171.140.39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 14:13:10', '0000-00-00 00:00:00', '53nbk5r04h1lfaiskb9609lk6v'),
(390, 'z3ZFntRFLdsn1RSs45pB4Y7D0Yz7Z9pIhKeExvz1APApUcPvVE', 1, '49.37.33.21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 14:41:59', '0000-00-00 00:00:00', '76cr67o8uqbjc5hp4824nl92b4'),
(391, 'RxN1MURoAwV0HDAvZkz4EzC5Grp19Wp2kpymmZtlkExmAdqjYL', 22, '91.171.140.39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 16:40:02', '0000-00-00 00:00:00', '0i4b0hh0kuk1k374ell3jrtmpq'),
(392, 'ibK5RVp43JJumMNcgnAkWkQSaRj3JYGBNE6KXZwANh0CvVS97J', 1, '49.37.33.21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 17:00:30', '0000-00-00 00:00:00', 'aadm3k8eln52boovahuvcki4tf'),
(393, 'Jvru7fUiut6cirsirShJjj59jXBBzd2VWDSSBT0EdoOCgPxbHQ', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 17:30:43', '0000-00-00 00:00:00', 'lqrn1e4bphv3kfgkf8odtg8ntu'),
(394, 'OllbCyeVZcAN5mAeKmWt8GpY9fg3SKGekQNEf2HsuUtAa12smq', 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-01 12:45:06', '0000-00-00 00:00:00', '1rh2g2f4pk4fjhqpg7f140hoc9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module`
--

DROP TABLE IF EXISTS `tbl_module`;
CREATE TABLE IF NOT EXISTS `tbl_module` (
  `moduleId` int NOT NULL AUTO_INCREMENT,
  `parentModuleId` int NOT NULL DEFAULT '0',
  `nameForDeveloper` varchar(255) DEFAULT NULL,
  `moduleName` varchar(255) DEFAULT NULL,
  `instruction` varchar(255) DEFAULT NULL,
  `moduleIcon` varchar(255) DEFAULT NULL,
  `swapNo` int NOT NULL DEFAULT '0',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `entryDate` varchar(50) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`moduleId`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_module`
--

INSERT INTO `tbl_module` (`moduleId`, `parentModuleId`, `nameForDeveloper`, `moduleName`, `instruction`, `moduleIcon`, `swapNo`, `status`, `entryDate`) VALUES
(1, 0, 'modulemanagement', 'Modules', '', 'mdi mdi-database', 1, 'Y', '0000-00-00 00:00:00'),
(2, 1, 'managemodule', 'Install / Uninstall', 'Add, Edit and Delete your webapp module', 'mdi mdi-database-plus', 0, 'Y', '0000-00-00 00:00:00'),
(3, 0, 'usermanagement', 'User / Security', '', 'mdi mdi-fingerprint', 2, 'Y', '2016-07-03 11:58:28'),
(4, 3, 'userlist', 'User', '', 'mdi mdi-account-network', 0, 'Y', '2016-07-03 11:31:29'),
(12, 0, 'pagemanagement', 'Site Pages', '', ' mdi mdi-book-open-page-variant', 3, 'Y', '2016-08-27 18:34:02'),
(13, 12, 'sitepage', 'Site Page', '', 'mdi mdi-book-multiple', 0, 'Y', '2016-08-27 18:40:03'),
(14, 0, 'contentmanagement', 'Content', '', 'mdi mdi-file', 5, 'Y', '2016-08-28 13:01:54'),
(15, 14, 'pages', 'CMS Pages', '', 'mdi mdi-file', 0, 'Y', '2016-08-28 13:09:57'),
(16, 0, 'accountmanagement', 'Configuration', '', ' mdi mdi-settings', 4, 'Y', '2017-06-14 15:59:56'),
(17, 16, 'account', 'Settings', '', ' mdi mdi-settings', 0, 'Y', '2017-06-14 15:33:59'),
(20, 0, 'emailmanagement', 'Email', '', 'mdi mdi-email-variant', 6, 'Y', '2022-09-14 14:32:28'),
(21, 20, 'smtpconfiguration', 'SMTP', 'All the records will be displayed below', 'mdi mdi-settings', 0, 'Y', '2022-09-14 14:33:29'),
(22, 20, 'templateslist', 'Template', 'All the records will be displayed below', 'mdi mdi-file-document', 0, 'Y', '2022-09-14 14:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

DROP TABLE IF EXISTS `tbl_page`;
CREATE TABLE IF NOT EXISTS `tbl_page` (
  `pageId` int NOT NULL AUTO_INCREMENT,
  `parentId` int NOT NULL DEFAULT '0',
  `moduleId` int NOT NULL DEFAULT '0',
  `pageName` varchar(255) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `subPageName` varchar(255) DEFAULT NULL,
  `pageCaption` varchar(500) DEFAULT NULL,
  `pageInfo` text,
  `pageIcon_fontAwesome` varchar(255) DEFAULT NULL,
  `pageUrl` varchar(255) DEFAULT NULL,
  `pageSession` varchar(10) DEFAULT NULL,
  `permalink` varchar(255) DEFAULT NULL,
  `isTop` enum('Y','N') NOT NULL DEFAULT 'N',
  `isFooter` enum('Y','N') NOT NULL DEFAULT 'N',
  `isSide` enum('Y','N') NOT NULL DEFAULT 'N',
  `bottomContent` varchar(500) DEFAULT NULL,
  `sideContent` varchar(500) DEFAULT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `swapNo` int NOT NULL DEFAULT '0',
  `entryDate` varchar(50) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`pageId`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`pageId`, `parentId`, `moduleId`, `pageName`, `image`, `subPageName`, `pageCaption`, `pageInfo`, `pageIcon_fontAwesome`, `pageUrl`, `pageSession`, `permalink`, `isTop`, `isFooter`, `isSide`, `bottomContent`, `sideContent`, `status`, `swapNo`, `entryDate`) VALUES
(19, 0, 14, '400', '', '', '', '', '', '', 'B', '400', 'N', 'N', 'N', '', '', 'Y', 15, '2017-02-13 11:30:23'),
(20, 0, 14, '401', '', '', '', '', '', '', 'B', '401', 'N', 'N', 'N', '', '', 'Y', 16, '2017-02-13 11:40:23'),
(21, 0, 14, '403', '', '', '', '', '', '', 'B', '403', 'N', 'N', 'N', '', '', 'Y', 17, '2017-02-13 11:57:23'),
(22, 0, 14, '404', '1511341534-image.jpg', '', '', '', '', '', 'B', '404', 'N', 'N', 'N', '', '', 'Y', 18, '2017-02-13 11:06:24'),
(23, 0, 14, '500', '', '', '', '', '', '', 'B', '500', 'N', 'N', 'N', '', '', 'Y', 19, '2017-02-13 11:15:24'),
(41, 0, 14, 'Wrong Link', '', '', '', '', '', '', 'B', 'wrong-link', 'N', 'N', 'N', '', '', 'Y', 14, '2017-06-18 15:22:42'),
(55, 0, 14, 'Comming Soon', NULL, '', '', '', '', '', 'B', 'comming-soon', 'N', 'N', 'N', '', '', 'Y', 13, '2017-07-30 14:26:32'),
(88, 0, 14, 'dummy', NULL, 'page title', 'gcghc gfgf tftf', 'hgu gyuguy ygyuuy yguyg', '', '', 'N', 'dummy', 'N', 'N', 'N', '', '', 'Y', 8, '2017-09-29 09:06:06'),
(96, 0, 50, 'Forgot Password', NULL, '', '', '', '', '', 'N', 'forgot-password', 'N', 'N', 'N', '', '', 'Y', 9, '2017-11-27 05:58:33'),
(98, 0, 50, 'Recover Password', NULL, '', '', '', '', '', 'N', 'recover-password', 'N', 'N', 'N', '', '', 'Y', 10, '2017-11-27 12:53:25'),
(99, 0, 50, 'Login', NULL, '', '', '', '', '', 'N', 'login', 'N', 'N', 'N', '', '', 'Y', 11, '2022-08-27 19:57:08'),
(100, 0, 50, 'Enrollment', NULL, '', '', '', '', '', 'N', 'enrollment', 'N', 'N', 'N', '', '', 'Y', 12, '2022-08-27 20:18:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site`
--

DROP TABLE IF EXISTS `tbl_site`;
CREATE TABLE IF NOT EXISTS `tbl_site` (
  `siteId` int NOT NULL AUTO_INCREMENT,
  `siteName` varchar(100) DEFAULT NULL,
  `siteDescribtion` text,
  `sitePhone` varchar(20) DEFAULT NULL,
  `sitePhone2` varchar(20) DEFAULT NULL,
  `siteEmail` varchar(100) DEFAULT NULL,
  `siteEmail2` varchar(100) DEFAULT NULL,
  `workingHours` text,
  `siteCurrencySymbol` varchar(10) DEFAULT NULL,
  `sitePaymentId` char(100) DEFAULT NULL,
  `siteSuccessPath` varchar(100) DEFAULT NULL,
  `siteFailurePath` varchar(100) DEFAULT NULL,
  `siteAddress` varchar(255) DEFAULT NULL,
  `siteAddress2` varchar(255) DEFAULT NULL,
  `siteLogo` varchar(255) DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `gp` varchar(255) DEFAULT NULL,
  `tw` varchar(255) DEFAULT NULL,
  `li` varchar(255) DEFAULT NULL,
  `yt` varchar(255) DEFAULT NULL,
  `riskWarning` text,
  `legalDeclaration` text,
  `pt` varchar(255) DEFAULT NULL,
  `activeTraders` varchar(20) DEFAULT NULL,
  `expertAdvisors` varchar(20) DEFAULT NULL,
  `awardsWinning` varchar(20) DEFAULT NULL,
  `yearsOfExcellence` varchar(20) DEFAULT NULL,
  `bottomContent` text,
  `depositeusdinr` varchar(20) DEFAULT NULL,
  `withdrawusdinr` varchar(20) DEFAULT NULL,
  `wfixdepositeusdinr` varchar(20) DEFAULT NULL,
  `wfixwithdrawusdinr` varchar(20) DEFAULT NULL,
  `cronPointer` varchar(255) DEFAULT NULL,
  `wdthAssistAmnt` varchar(20) DEFAULT NULL,
  `wdthAssistMood` varchar(20) DEFAULT NULL,
  `dpstAssistAmnt` varchar(20) DEFAULT NULL,
  `dpstAssistMood` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`siteId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_site`
--

INSERT INTO `tbl_site` (`siteId`, `siteName`, `siteDescribtion`, `sitePhone`, `sitePhone2`, `siteEmail`, `siteEmail2`, `workingHours`, `siteCurrencySymbol`, `sitePaymentId`, `siteSuccessPath`, `siteFailurePath`, `siteAddress`, `siteAddress2`, `siteLogo`, `fb`, `gp`, `tw`, `li`, `yt`, `riskWarning`, `legalDeclaration`, `pt`, `activeTraders`, `expertAdvisors`, `awardsWinning`, `yearsOfExcellence`, `bottomContent`, `depositeusdinr`, `withdrawusdinr`, `wfixdepositeusdinr`, `wfixwithdrawusdinr`, `cronPointer`, `wdthAssistAmnt`, `wdthAssistMood`, `dpstAssistAmnt`, `dpstAssistMood`) VALUES
(1, 'Sbamos', 'SBAMOS', '+33 0666142702', '', 'info@sbamos.com', '', '', '', '', '', '', 'PARIS', '', '1672034582-sitelogo.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '960', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `parentUserId` int NOT NULL DEFAULT '0',
  `userType` enum('S','A','NONE') NOT NULL DEFAULT 'NONE' COMMENT 'S= Supar Admin, A= Normal Admin',
  `name` varchar(100) DEFAULT NULL,
  `aliasName` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `alternatePhone` varchar(20) DEFAULT NULL,
  `userImage` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `orgPassword` varchar(255) DEFAULT NULL,
  `permission` text,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `entryDate` varchar(50) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `onlineTime` varchar(50) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `parentUserId`, `userType`, `name`, `aliasName`, `email`, `designation`, `address`, `phone`, `alternatePhone`, `userImage`, `username`, `password`, `orgPassword`, `permission`, `status`, `entryDate`, `onlineTime`) VALUES
(1, 0, 'S', 'Super', 'Super', 'super.admin@gmail.com', '', '', '', '', '1661599717.png', 'admin', 'a43c27c2babefd68df8a694900f30a1c', 'Admin123@', '{\"0\":{\"id\":\"38\",\"action\":{}},\"1\":{\"id\":\"39\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"2\":{\"id\":\"31\",\"action\":{}},\"3\":{\"id\":\"32\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"4\":{\"id\":\"33\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"5\":{\"id\":\"35\",\"action\":{}},\"6\":{\"id\":\"36\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"7\":{\"id\":\"34\",\"action\":{}},\"8\":{\"id\":\"37\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"9\":{\"id\":\"20\",\"action\":{}},\"10\":{\"id\":\"21\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"11\":{\"id\":\"22\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"12\":{\"id\":\"3\",\"action\":{}},\"13\":{\"id\":\"4\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"14\":{\"id\":\"28\",\"action\":{}},\"15\":{\"id\":\"29\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"16\":{\"id\":\"30\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"17\":{\"id\":\"25\",\"action\":{}},\"18\":{\"id\":\"26\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"19\":{\"id\":\"27\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"20\":{\"id\":\"1\",\"action\":{}},\"21\":{\"id\":\"2\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"22\":{\"id\":\"12\",\"action\":{}},\"23\":{\"id\":\"13\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"24\":{\"id\":\"16\",\"action\":{}},\"25\":{\"id\":\"17\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"26\":{\"id\":\"14\",\"action\":{}},\"27\":{\"id\":\"15\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"28\":{\"id\":\"42\",\"action\":{}},\"29\":{\"id\":\"43\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"30\":{\"id\":47,\"action\":{}},\"31\":{\"id\":48,\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"32\":{\"id\":49,\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"33\":{\"id\":50,\"action\":{}},\"34\":{\"id\":51,\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"35\":{\"id\":52,\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"36\":{\"id\":53,\"action\":{}},\"37\":{\"id\":54,\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"38\":{\"id\":55,\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"39\":{\"id\":56,\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}}}', 'Y', '2016-06-19 16:55:00', '0000-00-00 00:00:00'),
(22, 1, 'A', 'LOIC FOLGOAS', '', 'admin@sbamos.com', NULL, NULL, '', NULL, '1675404275.png', 'sbamos', '532a8a9567d793880cd7fc71f74cd7d8', 'Sbamos@321', '{\"0\":{\"id\":\"38\",\"action\":{}},\"1\":{\"id\":\"39\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"2\":{\"id\":\"47\",\"action\":{}},\"3\":{\"id\":\"48\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"4\":{\"id\":\"49\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"5\":{\"id\":\"50\",\"action\":{}},\"6\":{\"id\":\"51\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"7\":{\"id\":\"52\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"8\":{\"id\":\"53\",\"action\":{}},\"9\":{\"id\":\"54\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"10\":{\"id\":\"55\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"11\":{\"id\":\"35\",\"action\":{}},\"12\":{\"id\":\"36\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"13\":{\"id\":\"42\",\"action\":{}},\"14\":{\"id\":\"43\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"15\":{\"id\":\"3\",\"action\":{}},\"16\":{\"id\":\"4\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"17\":{\"id\":\"28\",\"action\":{}},\"18\":{\"id\":\"29\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"19\":{\"id\":\"30\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"20\":{\"id\":\"25\",\"action\":{}},\"21\":{\"id\":\"26\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"22\":{\"id\":\"27\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}},\"23\":{\"id\":\"16\",\"action\":{}},\"24\":{\"id\":\"17\",\"action\":{\"0\":\"ADD\",\"1\":\"EDIT\",\"2\":\"STATUS\",\"3\":\"TRASH\",\"4\":\"REMOVE\"}}}', 'Y', '2023-02-02 00:12:48', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
