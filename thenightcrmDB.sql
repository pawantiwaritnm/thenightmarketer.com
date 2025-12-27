-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2025 at 05:50 AM
-- Server version: 10.3.39-MariaDB-0ubuntu0.20.04.2
-- PHP Version: 8.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thenightcrmDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_notes`
--

CREATE TABLE `add_notes` (
  `id` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `added_by` int(11) NOT NULL,
  `text` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_notes`
--

INSERT INTO `add_notes` (`id`, `topic`, `date`, `status`, `added_on`, `updated_on`, `added_by`, `text`, `type`) VALUES
(1, 'test', '2023-12-15', -1, '2023-12-17 19:09:29', '2023-12-18 10:41:06', 1, 'test', 0),
(2, 'test test', '2023-12-31', -1, '2023-12-17 19:11:22', '2023-12-26 16:45:07', 1, 'test', 0),
(3, 'test test', '2023-12-15', -1, '2023-12-17 19:11:52', '2023-12-26 16:45:09', 1, 'test', 0),
(4, 'test', '2023-12-20', -1, '2023-12-18 10:57:41', '2023-12-26 16:45:11', 5, 'test', 0),
(5, 'Create Proposal for Social Media Management', '2023-12-20', -1, '2023-12-19 16:34:16', '2023-12-26 16:45:13', 9, 'Deadline will be Dec 20!', 0),
(6, 'IMPT. TNM Works', '2023-12-26', 1, '2023-12-26 16:49:22', '2023-12-28 12:56:24', 1, 'TNM SERVICE: \r\n- Analysis \r\n- Triggers\r\n- WhatsApp bot\r\n- Chat Bot\r\n- GTM\r\n- Pixel Integration\r\n- Email setup with workflows\r\n- Ui/ux audit', 0),
(7, 'Wedding', '2023-12-07', -1, '2023-12-27 11:30:18', '2023-12-27 11:30:41', 9, 'kk', 0),
(8, 'Video Lectures', '2023-12-08', -1, '2023-12-27 17:16:49', '2023-12-27 17:17:01', 9, '542121', 0),
(9, 'TNM ', '2023-12-29', 1, '2023-12-29 10:42:06', '2023-12-31 11:28:04', 14, '<p>Create A Career Page Social Media Executive Social Media Manager SEO Executive SEO Manager</p>\r\n', 0),
(10, 'test', '2023-12-13', 1, '2023-12-29 15:40:27', '2023-12-29 15:40:27', 1, '', 0),
(11, 'test', '2023-12-08', 1, '2023-12-29 15:51:21', '2023-12-29 15:52:04', 1, '<p>testttt</p>\r\n', 0),
(12, 'test2', '2023-12-14', 1, '2023-12-29 15:59:17', '2023-12-29 16:02:09', 1, '<p>test</p>\r\n', 1),
(13, 'John Pride, Startup Movers, Nutriseed, Nack, TNM', '2023-12-30', 1, '2023-12-30 12:03:42', '2024-01-02 10:37:30', 14, '<p>John Pride SEO Audit Report</p>\r\n\r\n<p>Startup Movers Blog Update Karna hai</p>\r\n\r\n<p>Manzuri (Shiprocket)</p>\r\n\r\n<p>Nutriseed (Loop subscription)</p>\r\n\r\n<p>Nack (Emailer Klaviyo)</p>\r\n\r\n<p>Shopify Exp.(1-2, 2-5), WordPress,&nbsp;Frontend Developer&nbsp;HTML</p>\r\n\r\n<p>Brookieno Website Duplicated Hogi&nbsp;</p>\r\n\r\n<p>Due Date Upload karna hai march 2023 se Jan 2024 tak</p>\r\n', 2),
(14, 'Brookieno', '2023-12-30', -1, '2023-12-30 12:05:23', '2023-12-30 12:21:27', 14, '<p>1.&nbsp;&nbsp; &nbsp;Add this heading on top of website - &quot;For order value above 1000, get 1 BIG BROOKIE ABSOLUTELY FREE ( Worth 160 Rupees)</p>\r\n\r\n<p>2.&nbsp;&nbsp; &nbsp;Add a Sliding images section on top of the homepage ( 3 or 4 good images) instead of a static image.</p>\r\n\r\n<p>3.&nbsp;&nbsp; &nbsp;No need to add the &quot;Egg&quot; &amp; &quot;Eggless&quot; buttons again inside Classic and Eggless headings , you can remove that &nbsp;buttons.</p>\r\n\r\n<p>4.&nbsp;&nbsp; &nbsp;Add few selected HD videos in the homepage.</p>\r\n\r\n<p>5.&nbsp;&nbsp; &nbsp;Add product BOX images ( front and back ) in product images. ( Box of 16)</p>\r\n\r\n<p>6.&nbsp;&nbsp; &nbsp;Add &quot;best seller&quot; tag on all best sellers mentioned there, also add orange in best seller list.</p>\r\n\r\n<p>7.&nbsp;&nbsp; &nbsp;Mention &ndash; Coffea arabica, Pista, Walnut, Cashew, Thyme etc as UPCOMING FLAVORS.</p>\r\n\r\n<p>8.&nbsp;&nbsp; &nbsp;Add &quot;brookie cake&quot; images as Upcoming product.</p>\r\n\r\n<p>9.&nbsp;&nbsp; &nbsp;Remove &nbsp;the banner image of Patchino &nbsp;from the middle portion of homepage and add another image.</p>\r\n\r\n<p>10.&nbsp;&nbsp; &nbsp;Change &ldquo;Vegan &nbsp;&amp; Gluten free&rdquo; buttons, product section etc in to &quot;Light Green&quot; theme.</p>\r\n\r\n<p>11.&nbsp;&nbsp; &nbsp;Incorporate the Keywords / Tags &ndash; &ldquo;Best brookie cakes&rdquo;, &ldquo;Best chocolate snacks&rdquo; &ldquo;Best chocolate dessert&rdquo; &ldquo; Best bite after meal&rdquo; &ldquo;World&rsquo;s best chocolate snacks&rdquo; etc the website.</p>\r\n\r\n<p>12.&nbsp;&nbsp; &nbsp;In Quick links section in the footer, , Mention &ldquo;Eggless&rdquo; below the &ldquo;Classic&rdquo; ( re-arrange the order )</p>\r\n\r\n<p>13.&nbsp;&nbsp; &nbsp;Add a separate button on top for &ldquo;Corporate gifting &amp; Co-branding &rdquo;- showcase some images of our corporate gift boxes and co-branding works.&nbsp;</p>\r\n\r\n<p>14.&nbsp;&nbsp; &nbsp;Add &ldquo;Product patent certificate&rdquo; in the Certificates section.</p>\r\n', 1),
(15, 'TNM Design References', '2024-01-04', 1, '2024-01-04 17:12:37', '2024-01-04 17:14:32', 1, '<p>https://hidokmeh.com/<br />\r\nhttps://discoverdesignstudio.com/<br />\r\nhttps://nevo-wcopilot.webflow.io/home-1<br />\r\nhttps://www.alexandrebirrien.com/<br />\r\nhttps://www.flammini.design/</p>\r\n', 1),
(16, 'TNM', '2024-01-11', 1, '2024-01-11 12:49:19', '2024-01-11 12:49:19', 14, '<ol>\r\n	<li>Brookieno.in Website Product Duplicate for&nbsp;Brookieno UAE</li>\r\n	<li>JP SEO</li>\r\n	<li>Manzuri Backup</li>\r\n</ol>\r\n', 1),
(17, 'Work of the Day - Rishabh', '2024-02-19', 1, '2024-02-19 10:35:44', '2024-02-19 10:36:17', 16, '<ol>\r\n	<li>Sorbet Website Design After Call</li>\r\n	<li>PDP of Second Aid</li>\r\n	<li>Schedule Social Media Post: ZingaFS, HMT, 77</li>\r\n	<li>Fazlani QC - Final Check!</li>\r\n</ol>\r\n', 1),
(18, 'Today\'s Work', '2024-02-19', 1, '2024-02-19 12:06:38', '2024-02-19 12:32:19', 16, '<p><strong>1.&nbsp; Premier&nbsp;advertising post design</strong></p>\r\n\r\n<p><strong>2. Sorbet &amp; Co. Stationary research</strong></p>\r\n\r\n<p><strong>3&nbsp; Thick font logo design for sorbet</strong></p>\r\n', 2),
(19, 'SEO Notes For Night Marketer', '', 1, '2024-02-24 18:34:42', '2024-02-27 18:32:02', 17, '<p><strong>Article Topics </strong></p>\r\n\r\n<p>1. Top Subscription app for Shopify </p>\r\n\r\n<p>2. klaviyo </p>\r\n\r\n<p>3. WhatsApp set up in Shopify  </p>\r\n\r\n<p>4. Top 3 COD orders in Shopify in India </p>\r\n', 2),
(20, 'SEO Notes For Night Marketer', '', -1, '2024-02-24 18:34:42', '2024-02-24 13:04:52', 17, '<p><strong>Article Topics&nbsp;</strong></p>\r\n\r\n<p>1. Top Subscription app for Shopify&nbsp;</p>\r\n\r\n<p>2. klaviyo&nbsp;</p>\r\n\r\n<p>3. WhatsApp&nbsp;set up in Shopify&nbsp;&nbsp;</p>\r\n\r\n<p>4. Top 3 COD orders in Shopify in India&nbsp;</p>\r\n', 2),
(21, 'Work of the Day - Rishabh', '2024-02-26', 1, '2024-02-26 11:11:21', '2024-02-26 18:22:26', 9, '<p>- ✔️ Email Logo to Greenleaf<br />\r\n- ✔️ Make a Post on Wireframe (Design TNM)<br />\r\n- ✔️ Improve the French Factor Design<br />\r\n- ✔️ Help Dimple in the Sorbet logo<br />\r\n- ✔️ Schedule ZingaFS Post</p>\r\n', 1),
(22, 'Work of the Day - Rishabh', '2024-02-28', 1, '2024-02-28 10:38:07', '2024-02-28 10:38:07', 9, '<p>Sorbet New Logo<br />\r\nSaggar Mehra Image<br />\r\nGreenLeaf<br />\r\nNutriseed<br />\r\nStartup Movers</p>\r\n', 2),
(23, 'Work of the Day - Rishabh', '2024-03-07', 1, '2024-03-07 17:17:22', '2024-03-07 17:19:08', 9, '<p>✓ Sorbet Color Palettes</p>\r\n\r\n<p>✓ Premier Ad Post</p>\r\n\r\n<p>✓ Nutriseed Page QC</p>\r\n\r\n<p>✓ Second Aid Design</p>\r\n\r\n<p>✓ TNM Service Page Stc.</p>\r\n\r\n<p>✓ ZingaFS Post Schedule</p>\r\n', 1),
(24, 'Work of the Day - Rishabh', '2024-03-12', 1, '2024-03-12 12:19:08', '2024-03-12 12:19:08', 9, '<p>- Greenleaf Design Pages<br />\r\n- Compile French Factor<br />\r\n- Start Mobile Design of FF<br />\r\n- ZingaFS Schedule Post</p>\r\n', 1),
(25, 'Work of the Day - Rishabh', '2024-03-19', 1, '2024-03-19 11:14:36', '2024-03-19 11:14:36', 9, '<ol>\r\n	<li>Voyage Ads Copy Revision</li>\r\n	<li>Nutriseed Contact &amp; Green Blend Update</li>\r\n	<li>Greenleaf Call with Shivani</li>\r\n	<li>French Factor Design Home Page</li>\r\n	<li>ZingaFS Post Schedule</li>\r\n</ol>\r\n', 1),
(26, 'Pending Tasks', '', 1, '2024-03-29 12:58:53', '2024-03-29 12:58:53', 16, '<p><strong>TNM Banners</strong><br />\r\n<strong>Zinga Social Media Post<br />\r\nSorbet Branding<br />\r\nTNM Social Media Post<br />\r\nReel Design<br />\r\nPremiere Post</strong><br />\r\n&nbsp;</p>\r\n', 1),
(27, 'Performance Marketing Major Point', '', 1, '2024-05-22 11:57:56', '2024-05-22 11:57:56', 17, '<p>1. Maximum 3 Months Tenure&nbsp;</p>\r\n\r\n<p>2. CRO of PDP, Home, Checkout, Conversion&nbsp;</p>\r\n\r\n<p>3. Copywriting&nbsp;</p>\r\n\r\n<p>4. Creatives + CRO</p>\r\n\r\n<p>5. Ad Rotation&nbsp;</p>\r\n\r\n<p>6. A/B Testing&nbsp;</p>\r\n\r\n<p>7. Tracking&nbsp;</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `add_portfolio`
--

CREATE TABLE `add_portfolio` (
  `id` int(11) NOT NULL,
  `client_project_name` varchar(200) NOT NULL,
  `industry` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `android_app_url` varchar(200) NOT NULL,
  `mobile_app_url` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `upload_file` varchar(200) NOT NULL,
  `added_on` datetime NOT NULL,
  `figma_link` varchar(200) NOT NULL,
  `updated_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `financial_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_portfolio`
--

INSERT INTO `add_portfolio` (`id`, `client_project_name`, `industry`, `url`, `android_app_url`, `mobile_app_url`, `category_id`, `status`, `upload_file`, `added_on`, `figma_link`, `updated_on`, `added_by`, `financial_year`) VALUES
(1, 'dds', 0, 'https://www.fabdukaan.com/crm/admin/add_portfolio', 'https://www.fabdukaan.com/crm/admin/add_portfolio', 'https://www.fabdukaan.com/crm/admin/add_portfolio', 0, -1, '', '2023-12-22 18:26:38', '', '2023-12-22 18:26:38', 1, 1),
(2, 'Richard Long', 7, 'Quia accusamus accus', 'Laboriosam voluptat', 'Dolore dolore id neq', 6, -1, '3e739b31b03f77307e68f099510ecea9.pdf', '2023-12-23 17:19:29', '', '2023-12-23 17:19:29', 1, 1),
(3, 'Yasir Rowe', 2, 'https://fabdukaan.com/legal_notic/user/razorpay_web_hook_post', '', '', 2, -1, '', '2023-12-29 10:14:57', '', '2023-12-29 10:14:57', 1, 1),
(4, 'John Pride', 10, 'https://www.johnpride.in/', '', '', 3, 1, '', '2023-12-29 12:22:58', '', '2023-12-29 12:22:58', 1, 1),
(5, 'Naagin Sauce', 9, 'https://www.naaginsauce.com/', '', '', 1, 1, '', '2023-12-29 13:09:09', '', '2023-12-29 13:09:09', 1, 1),
(6, 'Polka Pop', 9, 'https://polkapop.in/', '', '', 1, 1, '', '2023-12-29 13:09:39', '', '2023-12-29 13:09:39', 1, 1),
(7, 'Manzuri', 2, 'https://manzuri.in/', '', '', 2, 1, '', '2023-12-29 13:10:28', '', '2023-12-29 13:10:28', 1, 1),
(8, 'The Dr Choice', 2, 'https://thedrchoice.com/', '', '', 1, 1, '', '2023-12-29 13:12:39', '', '2023-12-29 13:12:39', 1, 1),
(9, 'The Himalayan Organics', 2, 'https://www.thehimalayanorganics.in/', '', '', 1, 1, '', '2023-12-29 13:13:25', '', '2023-12-29 13:13:25', 1, 1),
(10, 'Culari', 10, 'https://culari.in/', '', '', 1, 1, '', '2023-12-29 13:15:55', '', '2023-12-29 13:15:55', 1, 1),
(11, 'Nack Life', 2, 'https://nack.life/', '', '', 1, 1, '', '2023-12-29 13:16:30', '', '2023-12-29 13:16:30', 1, 1),
(12, 'Denver', 1, 'https://denverformen.com/', '', '', 1, 1, '', '2023-12-29 13:30:32', '', '2023-12-29 13:30:32', 1, 1),
(13, 'Nite Flite', 10, 'https://niteflite.in/', '', '', 2, 1, '', '2023-12-29 13:36:04', '', '2023-12-29 13:36:04', 1, 1),
(14, 'Pincode', 8, 'https://pincodebykunalkapur.com/', '', '', 3, 1, '', '2023-12-29 13:39:24', '', '2023-12-29 13:39:24', 1, 1),
(15, 'Clear Clipping', 11, 'https://www.clearclipping.com/', '', '', 2, 1, '', '2023-12-29 13:40:23', '', '2023-12-29 13:40:23', 1, 1),
(16, 'OEI Superfoods', 9, 'https://oeisuperfoods.com/', '', '', 2, 1, '', '2023-12-29 13:41:06', '', '2023-12-29 13:41:06', 1, 1),
(17, 'Ruchoks', 9, 'https://www.ruchoks.com/', '', '', 2, 1, '', '2023-12-29 13:41:42', '', '2023-12-29 13:41:42', 1, 1),
(18, 'Dibha', 9, 'https://www.dibha.com/', '', '', 2, 1, '', '2023-12-29 13:42:18', '', '2023-12-29 13:42:18', 1, 1),
(19, 'Nayasono', 13, 'https://nayasono.com/', '', '', 2, 1, '', '2023-12-29 13:43:42', '', '2023-12-29 13:43:42', 1, 1),
(20, 'Startup-movers', 14, 'https://www.startup-movers.com/', '', '', 3, 1, '', '2023-12-29 13:44:40', '', '2023-12-29 13:44:40', 1, 1),
(21, 'Fazlani Corp', 9, 'https://fazlanicorp.myshopify.com/', '', '', 1, 1, '', '2023-12-29 13:47:38', '', '2023-12-29 13:47:38', 1, 1),
(22, 'Organity', 2, 'https://organity.in/', '', '', 1, 1, '', '2023-12-29 15:24:51', '', '2023-12-29 15:24:51', 1, 1),
(23, 'Inka', 10, 'https://inka.co.in/', '', '', 1, 1, '', '2023-12-29 15:25:48', '', '2023-12-29 15:25:48', 1, 1),
(24, 'DigitalBuyer ', 1, 'https://www.digitalbuyer.com/', '', '', 4, 1, '', '2023-12-29 15:31:57', '', '2023-12-29 15:31:57', 1, 1),
(25, 'Capitol Area Technology ', 1, 'https://www.capitolareatechnology.com/', '', '', 4, 1, '', '2023-12-29 15:33:19', '', '2023-12-29 15:33:19', 1, 1),
(26, 'Youshare.in', 14, 'https://www.youshare.in/', '', '', 4, 1, '', '2023-12-29 15:33:54', '', '2023-12-29 15:33:54', 1, 1),
(27, 'TRY Rocks', 14, 'https://tryrock.com/', '', '', 2, 1, '', '2023-12-29 15:34:38', '', '2023-12-29 15:34:38', 1, 1),
(28, 'Dental Diem', 2, '', 'https://play.google.com/store/apps/details?id=com.locqum&fbclid=IwAR3D2T2RQTaXrxme7zGHhUcFYZAQZFaGNKc3RIoVC_5xbb8t0rlwsry0QAI', 'https://play.google.com/store/apps/details?id=com.locqum&fbclid=IwAR3D2T2RQTaXrxme7zGHhUcFYZAQZFaGNKc3RIoVC_5xbb8t0rlwsry0QAI', 3, 1, '', '2023-12-29 17:32:06', '', '2023-12-29 17:32:06', 1, 1),
(29, 'Baroda Bazaar', 7, '', '', 'https://play.google.com/store/apps/details?id=com.alpha.barodabazaar&fbclid=IwAR3bVE5TXinXsJ2Ov06BvQTRyDmHdMMHEyMKif6YZS-NcYLZofEw9mpjl2U', 3, 1, '', '2023-12-29 17:32:46', '', '2023-12-29 17:32:46', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `add_projects`
--

CREATE TABLE `add_projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `project_type` varchar(200) NOT NULL,
  `starting_date` varchar(200) NOT NULL,
  `ending_date` varchar(200) NOT NULL,
  `industry_id` int(11) NOT NULL,
  `technology_id` int(11) NOT NULL,
  `hourly` varchar(200) NOT NULL,
  `project_hours` varchar(200) NOT NULL,
  `client_id` int(11) NOT NULL,
  `priority` varchar(200) NOT NULL,
  `project_size` varchar(200) NOT NULL,
  `financial_year` int(11) NOT NULL,
  `some_details` text NOT NULL,
  `assign_priority` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_projects`
--

INSERT INTO `add_projects` (`id`, `project_name`, `project_type`, `starting_date`, `ending_date`, `industry_id`, `technology_id`, `hourly`, `project_hours`, `client_id`, `priority`, `project_size`, `financial_year`, `some_details`, `assign_priority`, `status`, `added_on`, `updated_on`, `added_by`) VALUES
(1, 'Castor William', '2', '2023-11-29', '2023-11-22', 2, 2, 'Yes', '12', 4, 'Low', 'Small', 1, ' test', 0, -1, '2023-11-21 18:05:32', '2023-11-27 11:42:53', 1),
(2, 'Castor William', '2', '2023-11-22', '2023-11-30', 2, 2, 'Yes', '12', 2, 'Low', 'Small', 1, 'test', 10, -1, '2023-11-22 10:22:55', '2023-11-22 10:22:55', 1),
(3, 'hdh test', '2', '2023-11-11', '2023-12-01', 2, 1, 'Yes', '10', 5, 'High', 'Big', 1, '          fdfd', 7, -1, '2023-11-22 12:24:50', '2023-11-25 15:12:41', 1),
(4, 'Demetria Pruitt', '1', '1997-05-30', '2012-10-18', 1, 2, 'Yes', '56', 3, 'High', 'Medium', 1, 'Aut vel qui sit reic', 0, -1, '2023-11-22 12:25:44', '2023-11-22 12:25:44', 1),
(5, 'Yours Graphic', '1', '2023-11-08', '', 11, 3, 'Yes', '60', 1, 'High', 'Medium', 1, 'lreom ipsum', 3, -1, '2023-11-24 15:36:27', '2023-11-24 15:36:27', 1),
(6, 'Supply Port', '2', '2023-01-30', '', 9, 2, 'No', '', 1, 'Low', 'Medium', 1, '  changes, and design and dev.', 0, 1, '2023-11-27 13:54:30', '2023-12-23 17:41:12', 1),
(7, 'Zenia Ford', '1', '2007-01-07', '2000-11-02', 2, 7, 'Yes', '43', 7, 'Medium', 'Small', 1, ' Adipisci natus conse', 0, -1, '2023-12-01 18:07:29', '2023-12-04 11:59:55', 1),
(8, 'Startup Movers', '2', '2023-10-12', '', 14, 3, 'No', '', 2, 'High', 'Big', 1, '  UI + UX Design + \r\nCustom Website', 0, 1, '2023-12-01 18:24:05', '2023-12-29 10:09:07', 1),
(9, 'Ruchocks', '1', '2023-08-16', '', 9, 2, 'Yes', '24', 3, 'Low', 'Small', 1, ' maintenance of  Ruchocks website ', 0, 1, '2023-12-01 18:26:11', '2023-12-29 10:09:18', 1),
(10, 'Nutriseed', '2', '2023-08-10', '', 9, 1, 'Yes', '35', 4, 'High', 'Medium', 1, ' UI/CRO Design + developement', 0, 1, '2023-12-01 18:28:24', '2023-12-29 10:09:34', 1),
(11, 'Fazlani Corp Website', '2', '2023-02-16', '', 2, 1, 'No', '', 5, 'Medium', 'Medium', 1, ' UI Design + Shopify Dev.', 0, 1, '2023-12-01 18:30:18', '2023-12-29 10:09:49', 1),
(12, 'Dibha', '1', '2023-09-02', '', 9, 2, 'Yes', '25', 6, 'Medium', 'Small', 1, ' Maintenance adding banners , and fixes', 0, 1, '2023-12-04 12:07:08', '2023-12-29 10:10:01', 1),
(13, 'Inka', '1', '2023-01-01', '', 10, 1, 'Yes', '24', 7, 'Medium', 'Small', 1, ' maintenance of website ', 0, 1, '2023-12-04 12:10:46', '2023-12-29 10:10:15', 1),
(14, 'OEI Superfood Graphics', '2', '2023-11-15', '', 9, 7, 'No', '', 8, 'Low', 'Small', 1, ' Graphics of \r\n- oei superfood and \r\n- suved.co.in ', 0, 1, '2023-12-04 12:12:44', '2023-12-29 10:10:36', 1),
(15, '77 Cold Pressed Oil SMM', '2', '2023-12-20', '', 2, 7, 'No', '', 9, 'Medium', 'Small', 1, '  Social media posting and management', 0, 1, '2023-12-26 16:15:10', '2023-12-29 10:10:46', 1),
(16, 'Ads creating The wick & co', '1', '2023-12-15', '', 7, 7, 'No', '', 10, 'Medium', 'Medium', 1, '    - Facebook and Instagram Ads creating\r\n- website maintenance', 0, 1, '2023-12-26 16:17:46', '2023-12-29 10:10:58', 1),
(17, 'The Happy Movement Travel SMM ', '2', '2023-12-20', '', 8, 7, 'No', '', 11, 'Medium', 'Medium', 1, ' Social media management and posting', 0, 1, '2023-12-26 16:18:55', '2023-12-29 10:11:12', 1),
(18, 'SEO John Pride', '1', '2023-12-01', '', 10, 3, 'No', '', 12, 'Medium', 'Medium', 1, ' SEO report every month', 0, 1, '2023-12-26 16:27:07', '2023-12-29 10:11:24', 1),
(19, 'The Happy Movement Travel SMM ', '2', '2023-12-20', '', 8, 7, 'No', '', 25, 'Medium', 'Medium', 1, 'Social media posting and management and ads setup', 0, -1, '2023-12-26 16:42:52', '2023-12-26 16:42:52', 1),
(20, 'TNM', '1', '2015-01-01', '', 4, 2, 'No', '', 13, 'High', 'Medium', 1, ' Office Internal Work. ', 0, 1, '2023-12-26 16:58:10', '2023-12-29 10:11:37', 1),
(21, 'Brookieno', '2', '2023-11-01', '', 9, 1, 'No', '', 14, 'Low', 'Small', 1, '   changes, and design and dev.', 0, 1, '2023-12-30 12:20:02', '2023-12-30 12:20:02', 1),
(22, 'Green leaf website', '2', '2024-02-10', '', 15, 8, 'No', '', 16, 'High', 'Medium', 1, '✅ LOGO Design\r\n✅ UI/UX Website Design \r\n✅ Custom Development ', 0, 1, '2024-02-29 11:22:52', '2024-02-29 11:22:52', 6),
(23, 'green leaf', '2', '2024-02-10', '', 15, 3, 'No', '', 16, 'Urgent', 'Medium', 1, 'logo design\r\nUI/UX design \r\ncustom development ', 0, -1, '2024-02-29 11:25:27', '2024-02-29 11:25:27', 6),
(24, 'Lara Carpenter', '1', '2005-12-07', '1974-11-17', 12, 1, 'Yes', '79', 13, 'Urgent', 'Medium', 1, 'Laboris sapiente com', 0, 1, '2024-02-29 11:42:31', '2024-02-29 11:42:31', 5),
(25, 'SEO The northvilla goa', '2', '2024-02-25', '', 8, 3, 'No', '', 26, 'Medium', 'Small', 1, 'Complete SEO', 0, 1, '2024-03-02 12:37:20', '2024-03-02 12:37:20', 6),
(26, 'BRG Website Maintenance', '1', '2022-12-20', '', 3, 2, 'Yes', '16', 17, 'Low', 'Small', 1, 'Website maintenance', 0, 1, '2024-03-02 12:39:22', '2024-03-02 12:39:22', 6),
(27, 'Inka website maintain', '1', '2022-01-21', '', 15, 1, 'Yes', '12', 7, 'Medium', 'Medium', 1, 'Inka website maintain', 0, 1, '2024-03-02 12:41:33', '2024-03-02 12:41:33', 6);

-- --------------------------------------------------------

--
-- Table structure for table `add_project_checklist`
--

CREATE TABLE `add_project_checklist` (
  `id` int(11) NOT NULL,
  `checklist_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_project_checklist`
--

INSERT INTO `add_project_checklist` (`id`, `checklist_id`, `project_id`, `admin_id`, `added_on`) VALUES
(4, 3, 1, 0, '2023-11-21 18:48:03'),
(5, 2, 1, 0, '2023-11-21 18:48:03'),
(12, 3, 2, 5, '2023-11-22 10:55:31'),
(13, 2, 2, 5, '2023-11-22 10:55:31'),
(14, 1, 6, 9, '2023-12-19 16:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `add_project_marketer`
--

CREATE TABLE `add_project_marketer` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `marketer_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_project_marketer`
--

INSERT INTO `add_project_marketer` (`id`, `project_id`, `marketer_id`, `added_on`) VALUES
(2, 2, 5, '2023-11-22 10:22:55'),
(3, 2, 1, '2023-11-22 10:22:55'),
(6, 4, 5, '2023-11-22 12:25:44'),
(7, 5, 6, '2023-11-24 15:36:27'),
(8, 5, 5, '2023-11-24 15:36:27'),
(9, 5, 1, '2023-11-24 15:36:27'),
(36, 3, 6, '2023-11-25 15:12:41'),
(37, 3, 5, '2023-11-25 15:12:41'),
(38, 3, 1, '2023-11-25 15:12:41'),
(39, 1, 1, '2023-11-27 11:42:53'),
(73, 7, 6, '2023-12-04 11:59:55'),
(89, 6, 14, '2023-12-23 17:41:12'),
(90, 6, 13, '2023-12-23 17:41:12'),
(91, 6, 12, '2023-12-23 17:41:12'),
(92, 6, 9, '2023-12-23 17:41:12'),
(93, 6, 6, '2023-12-23 17:41:12'),
(108, 19, 9, '2023-12-26 16:42:52'),
(109, 19, 1, '2023-12-26 16:42:52'),
(118, 8, 14, '2023-12-29 10:09:07'),
(119, 8, 13, '2023-12-29 10:09:07'),
(120, 8, 12, '2023-12-29 10:09:07'),
(121, 8, 9, '2023-12-29 10:09:07'),
(122, 8, 6, '2023-12-29 10:09:07'),
(123, 8, 5, '2023-12-29 10:09:07'),
(124, 9, 14, '2023-12-29 10:09:18'),
(125, 9, 12, '2023-12-29 10:09:18'),
(126, 9, 9, '2023-12-29 10:09:18'),
(127, 10, 12, '2023-12-29 10:09:34'),
(128, 10, 11, '2023-12-29 10:09:34'),
(129, 10, 9, '2023-12-29 10:09:34'),
(130, 11, 14, '2023-12-29 10:09:49'),
(131, 11, 12, '2023-12-29 10:09:49'),
(132, 11, 9, '2023-12-29 10:09:49'),
(133, 11, 6, '2023-12-29 10:09:49'),
(134, 12, 14, '2023-12-29 10:10:01'),
(135, 12, 13, '2023-12-29 10:10:01'),
(136, 12, 12, '2023-12-29 10:10:01'),
(137, 12, 9, '2023-12-29 10:10:01'),
(138, 13, 14, '2023-12-29 10:10:15'),
(139, 13, 13, '2023-12-29 10:10:15'),
(140, 13, 12, '2023-12-29 10:10:15'),
(141, 14, 10, '2023-12-29 10:10:36'),
(142, 14, 9, '2023-12-29 10:10:36'),
(143, 14, 6, '2023-12-29 10:10:36'),
(144, 15, 9, '2023-12-29 10:10:46'),
(145, 15, 1, '2023-12-29 10:10:46'),
(146, 16, 1, '2023-12-29 10:10:58'),
(147, 17, 9, '2023-12-29 10:11:12'),
(148, 17, 1, '2023-12-29 10:11:12'),
(149, 18, 13, '2023-12-29 10:11:24'),
(150, 18, 12, '2023-12-29 10:11:24'),
(151, 18, 11, '2023-12-29 10:11:24'),
(152, 18, 1, '2023-12-29 10:11:24'),
(153, 20, 14, '2023-12-29 10:11:37'),
(154, 20, 13, '2023-12-29 10:11:37'),
(155, 20, 12, '2023-12-29 10:11:37'),
(156, 20, 11, '2023-12-29 10:11:37'),
(157, 20, 9, '2023-12-29 10:11:37'),
(158, 20, 6, '2023-12-29 10:11:37'),
(159, 20, 5, '2023-12-29 10:11:37'),
(160, 20, 1, '2023-12-29 10:11:37'),
(161, 21, 14, '2023-12-30 12:20:02'),
(162, 21, 13, '2023-12-30 12:20:02'),
(163, 21, 12, '2023-12-30 12:20:02'),
(164, 21, 11, '2023-12-30 12:20:02'),
(165, 22, 16, '2024-02-29 05:52:52'),
(166, 22, 14, '2024-02-29 05:52:52'),
(167, 22, 13, '2024-02-29 05:52:52'),
(168, 22, 12, '2024-02-29 05:52:52'),
(169, 22, 9, '2024-02-29 05:52:52'),
(170, 22, 1, '2024-02-29 05:52:52'),
(171, 23, 16, '2024-02-29 05:55:27'),
(172, 23, 14, '2024-02-29 05:55:27'),
(173, 23, 13, '2024-02-29 05:55:27'),
(174, 23, 12, '2024-02-29 05:55:27'),
(175, 23, 9, '2024-02-29 05:55:27'),
(176, 23, 5, '2024-02-29 05:55:27'),
(177, 23, 1, '2024-02-29 05:55:27'),
(178, 24, 14, '2024-02-29 06:12:31'),
(179, 24, 12, '2024-02-29 06:12:31'),
(180, 24, 5, '2024-02-29 06:12:31'),
(181, 25, 17, '2024-03-02 07:07:20'),
(182, 25, 14, '2024-03-02 07:07:20'),
(183, 25, 9, '2024-03-02 07:07:20'),
(184, 25, 1, '2024-03-02 07:07:20'),
(185, 26, 14, '2024-03-02 07:09:22'),
(186, 26, 13, '2024-03-02 07:09:22'),
(187, 26, 12, '2024-03-02 07:09:22'),
(188, 26, 1, '2024-03-02 07:09:22'),
(189, 27, 14, '2024-03-02 07:11:33'),
(190, 27, 13, '2024-03-02 07:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `add_reminders`
--

CREATE TABLE `add_reminders` (
  `id` int(11) NOT NULL,
  `reminder_name` varchar(200) NOT NULL,
  `reminder_client` varchar(200) NOT NULL,
  `reminder_date` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `reminder_status` int(11) NOT NULL,
  `description` text NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_reminders`
--

INSERT INTO `add_reminders` (`id`, `reminder_name`, `reminder_client`, `reminder_date`, `status`, `added_by`, `reminder_status`, `description`, `added_on`, `updated_on`) VALUES
(1, 'Performance Marketing Major Points', '13', '2024-05-24 12:00:00', 0, 17, 0, '1. Minimum 3 Months Tenure \r\n2. CRO of PDP, Home, Checkout, Collection \r\n3. Copywriting \r\n4. Creatives + CRO\r\n5. Ad Rotation \r\n6. A/B Testing \r\n7. Tracking', '2024-05-22 12:00:56', '2024-07-08 09:56:14'),
(14, 'Task ', '13', '2024-05-29 12:00:00', 0, 17, 0, '3 Pages \r\nCloud Hosting \r\nCRO Services \r\nTNM SEO', '2024-05-28 15:37:08', '2024-07-08 09:56:14'),
(15, 'Services Pages - Design ', '13', '2024-06-02 11:00:00', 0, 17, 0, '1. Create UX Service Page different from other service pages\r\n2. Finalize Service Pages\r\n3. Need Banners for Service Pages and Home Page', '2024-06-01 13:41:56', '2024-07-06 05:23:45'),
(16, 'Gleaf', '16', '2024-06-07 16:00:00', 0, 17, 0, 'Reply to Greenleaf', '2024-06-07 13:23:53', '2024-07-06 05:23:48'),
(17, 'JP - PDP Hours', '12', '2024-06-10 11:00:00', 0, 17, 0, 'Hours for JP PDP', '2024-06-10 10:06:54', '2024-07-08 09:56:17'),
(18, 'The Night Marketer Website', '13', '2024-06-11 10:00:00', 0, 9, 0, 'Make Hero Image Slider of Two Banner - CRO & Generic\r\nUpdate the Form of the Service Pages', '2024-06-10 18:28:38', '2024-07-08 09:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `add_reminders_user`
--

CREATE TABLE `add_reminders_user` (
  `id` int(11) NOT NULL,
  `reminders_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_reminders_user`
--

INSERT INTO `add_reminders_user` (`id`, `reminders_id`, `user_id`, `added_on`) VALUES
(1, 1, 17, '2024-05-22 06:30:56'),
(2, 1, 16, '2024-05-22 06:30:56'),
(3, 1, 1, '2024-05-22 06:30:56'),
(14, 14, 17, '2024-05-28 10:07:08'),
(15, 15, 9, '2024-06-01 08:11:56'),
(16, 15, 6, '2024-06-01 08:11:56'),
(17, 16, 17, '2024-06-07 07:53:53'),
(18, 16, 6, '2024-06-07 07:53:53'),
(19, 17, 12, '2024-06-10 04:36:54'),
(20, 17, 5, '2024-06-10 04:36:54'),
(21, 18, 14, '2024-06-10 12:58:38'),
(22, 18, 12, '2024-06-10 12:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(11) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` int(4) NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `financial_year` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `designation` int(11) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`, `phone`, `email`, `status`, `added_on`, `updated_on`, `financial_year`, `image`, `designation`, `added_by`) VALUES
(1, 'raghav', 'e3c27053a20fb0f5feb12c0db7392893', 1, '9717884659', 'thenightmarketer@gmail.com', 1, '0000-00-00 00:00:00', '2024-02-08 10:01:26', 0, '', 0, 0),
(5, 'pawan', '9fad967186c0648127868f1641e43d40', 2, '7987708681', 'pawantiwari99913@gmail.com', 1, '2023-11-10 10:40:18', '2024-02-22 13:09:02', 1, '364cf352869307a74680c8d0a73a1da1.png', 3, 1),
(6, 'Sachin', '2925c95aa56e601370e450c743243e62', 2, '8800341992', 'sachin@thenightmarketer.com', 1, '2023-11-22 12:26:52', '2024-02-16 15:27:40', 1, 'cb83367c5937306eb784428ca557ea2c.png', 3, 1),
(9, 'Rishabh', '1b9a98b621b175908f9671f83f6464de', 2, '9264918690', 'rishabh@thenightmarketer.com', 1, '2023-11-27 10:56:16', '2023-11-27 10:56:16', 1, '98aead51338add84191cb1f8fd4c43d7.png', 7, 1),
(10, 'Kishan', 'a4b1efca3acb2c287ac98921e846687d', 2, '9990742473', 'kishan@thenightmarketer.com', 0, '2023-11-27 10:57:31', '2023-11-27 10:57:31', 1, '52042573044f4cfdd1142c905dcebead.png', 8, 1),
(11, 'Krishna', '321040d26a387a0f4377a2cdcb1cfbb1', 2, '7042274838', 'krishna@thenightmarketer.com', 0, '2023-11-27 11:00:24', '2023-11-27 11:00:24', 1, 'f1a4b768a33fecbd9a0d6fc6526122e9.png', 6, 1),
(12, 'Himanshu', '04125e867a63c672e8a89f270413bf1e', 2, '7830400691', 'himanshu@thenightmarketer.com', 1, '2023-11-27 11:07:21', '2024-02-19 10:11:34', 1, 'a39ccbab08190258dfc83fc788687ac3.png', 6, 1),
(13, 'Tarun', '176bb6a7aa20538afaa770fc6e95520e', 2, '8368741730', 'tarun@thenightmarketer.com', 0, '2023-11-27 11:08:27', '2023-11-27 11:08:27', 1, '75a6b85411fbaaaa398e1efbbeca3390.png', 6, 1),
(14, 'Naveen', '210a4ea7fc6554acfdcb891cd84259aa', 2, '9267982689', 'naveen@thenightmarketer.com', 1, '2023-11-27 11:09:54', '2024-02-08 11:04:47', 1, '5b06f980c03f4201f87d0a25cfa98153.png', 6, 1),
(15, 'kamal', '643df2b78ec37e0467b38f93a19783df', 2, '8882955521', 'kamal@thenightmarketer.com', 1, '2024-01-02 16:29:23', '2024-01-02 16:29:23', 1, '', 5, 1),
(16, 'Dimple', '54f821cd5d8ae34d35395772aadc72b3', 2, '8750763691', 'dimple@thenightmarketer.com', 1, '2024-01-23 15:58:10', '2024-01-23 15:58:10', 1, '', 8, 1),
(17, 'abhinav', '9e34ee7dd47bbd2b2aefea0eac8bcc9a', 2, '9399463945', 'abhinav@thenightmarketer.com', 1, '2024-02-22 13:28:59', '2024-05-22 11:49:26', 1, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_technology`
--

CREATE TABLE `app_technology` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_technology`
--

INSERT INTO `app_technology` (`id`, `name`, `status`, `added_on`) VALUES
(1, 'Shopify', 1, '2024-02-10 11:08:29'),
(2, 'Wordpress', 1, '2024-02-10 11:08:29'),
(3, 'Webflow', 1, '2024-02-10 11:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `asset_categories`
--

CREATE TABLE `asset_categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `asset_categories`
--

INSERT INTO `asset_categories` (`id`, `cat_name`, `status`, `added_on`) VALUES
(1, 'AI Tools', 1, '2023-12-27 12:35:22'),
(2, 'UI Design', 1, '2023-12-27 12:35:22'),
(3, 'UX Design', 1, '2023-12-27 12:35:49'),
(4, 'Graphic Design', 1, '2023-12-27 12:35:49'),
(5, 'Development', 1, '2023-12-27 12:36:06'),
(6, 'Shopify', 1, '2023-12-27 12:36:06'),
(7, 'WordPress', 1, '2023-12-27 12:36:28'),
(8, 'Social Media', 1, '2023-12-27 12:36:28'),
(9, 'GSheet', 1, '2023-12-27 12:36:48'),
(10, 'Others', 1, '2023-12-27 12:36:48'),
(11, 'Branding', 1, '2023-12-29 11:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `asset_images`
--

CREATE TABLE `asset_images` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `asset_images`
--

INSERT INTO `asset_images` (`id`, `image`, `asset_id`, `added_on`) VALUES
(1, 'Onset-Homes.pdf', 1, '2023-12-29 11:16:29'),
(2, 'wolf-branding-style-guide.pdf', 2, '2023-12-29 11:17:08'),
(3, 'dynasty-brand-guidelines.pdf', 3, '2023-12-29 11:17:51'),
(4, 'dynasty-brand-guidelines1.pdf', 4, '2023-12-29 11:58:38'),
(5, 'Onset-Homes1.pdf', 4, '2023-12-29 11:58:38'),
(6, 'wolf-branding-style-guide1.pdf', 4, '2023-12-29 11:58:38'),
(7, 'CRO_Checklist_to_boost_Conversions_for_2023_-_', 5, '2023-12-29 15:57:52'),
(8, 'dynasty-brand-guidelines6.pdf', 7, '2023-12-29 17:09:45'),
(9, 'Onset-Homes6.pdf', 7, '2023-12-29 17:09:45'),
(10, 'wolf-branding-style-guide6.pdf', 7, '2023-12-29 17:09:45'),
(11, 'Copy_of_SEO_checklist.xlsx', 10, '2024-02-21 11:24:04'),
(12, 'TNM_E-commerce_Checklist___Brookieno_Points_Status.xlsx', 11, '2024-03-22 12:12:43'),
(13, 'CRO_eBook_-_The_Night_Marketer.pdf', 16, '2024-05-14 11:25:04'),
(14, 'Ozar_Luxury_Brand.pdf', 22, '2024-07-02 16:29:27'),
(15, 'Urth_Brand.pdf', 23, '2024-07-02 16:31:09'),
(16, 'Sorbet_Brand_Book_(1).pdf', 24, '2024-07-02 16:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `asset_master`
--

CREATE TABLE `asset_master` (
  `id` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `link` text NOT NULL,
  `status` int(11) NOT NULL,
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `cat_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `financial_year` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `asset_master`
--

INSERT INTO `asset_master` (`id`, `file_name`, `link`, `status`, `updated_on`, `added_on`, `cat_id`, `added_by`, `financial_year`, `client_id`) VALUES
(1, 'Onset Home - Branding Doc', '', -1, '2023-12-29 11:58:08', '2023-12-29 11:16:29', 0, 9, 1, 13),
(2, 'Wolf - Branding Doc', '', -1, '2023-12-29 11:58:05', '2023-12-29 11:17:08', 0, 9, 1, 13),
(3, 'Dynasty - Branding Doc', '', -1, '2023-12-29 11:58:00', '2023-12-29 11:17:51', 0, 9, 1, 13),
(4, 'Branding Document of Brands', '', -1, '2023-12-29 17:06:54', '2023-12-29 11:58:38', 0, 9, 1, 13),
(5, 'CRO Checklist', 'https://docs.google.com/spreadsheets/d/1WNzUMSDe9jLtGwwdz7kFvCDS1WSULkhHVxcBQqvLdwc/edit?usp=sharing', 1, '2023-12-29 15:57:52', '2023-12-29 15:57:52', 0, 1, 1, 13),
(6, 'Shopify Guide', 'https://drive.google.com/file/d/1Z0gt11M1M_V8XaSEjCJoUqTIlP6o6P3B/view?usp=sharing', 1, '2023-12-29 16:55:33', '2023-12-29 16:55:33', 0, 1, 1, 13),
(7, 'Branding Document of Brands', '', 1, '2023-12-29 17:09:45', '2023-12-29 17:09:45', 0, 9, 1, 13),
(8, 'CRO Template', 'https://www.figma.com/file/ZUTPXOr0hVjXUC6yv3rKqs/CRO-Sample?type=design&node-id=0%3A1&mode=design&t=TqZPC0LTopYktpho-1', 1, '2024-01-02 16:45:48', '2024-01-02 16:45:48', 0, 1, 1, 13),
(9, 'Brand Guide website', 'https://brandguide.page/', 1, '2024-01-23 15:55:38', '2024-01-23 15:55:38', 0, 1, 1, 13),
(10, 'SEO checklist', 'https://docs.google.com/spreadsheets/d/152YhS3-wjGhCQMBZpoinWwVPbDEp2U_CrGP7Cnnx4ew/edit?usp=sharing', 1, '2024-02-21 11:24:04', '2024-02-21 11:24:04', 0, 6, 1, 13),
(11, 'CRO Checklist (Brokieno )', 'https://docs.google.com/spreadsheets/d/1CgchOyjq5EnyXeR2kULGna4YuBiKfwXYU2n6oOsvIwk/edit?usp=sharing', 1, '2024-03-22 12:12:43', '2024-03-22 12:12:43', 0, 6, 1, 13),
(12, 'Mobile App Designs - LaCasa', 'https://www.figma.com/proto/7S4nzftaLbcytYkp5J1jL5/La-Casa?page-id=90%3A1687&type=design&node-id=578-406&viewport=333%2C424%2C0.14&t=nnrb7ezJHNVhvTkn-1&scaling=scale-down&mode=design', 1, '2024-04-24 11:55:24', '2024-04-24 11:55:24', 0, 9, 1, 13),
(13, 'Mobile App Design - Dal Samarkand', 'https://www.figma.com/proto/PYVnNorLeyq4jGCSLREBVd/Dal-Samarkand?page-id=95%3A2&type=design&node-id=447-777&viewport=1025%2C-962%2C0.16&t=MBr5wwEVUAissRP2-1&scaling=scale-down&mode=design', 1, '2024-04-24 11:56:07', '2024-04-24 11:56:07', 0, 9, 1, 13),
(14, 'Mobile App Design - Hapta ', 'https://www.figma.com/proto/dX5D7TOTBXEgMzaUviPejw/Hapta-Network?page-id=6%3A32&type=design&node-id=9-474&viewport=229%2C-117%2C0.3&t=d8hkHZ1FEYnC5SQC-1&scaling=scale-down&starting-point-node-id=9%3A474&mode=design', 1, '2024-04-24 11:56:38', '2024-04-24 11:56:38', 0, 9, 1, 13),
(15, 'Mobile App Design - Toolworld', 'https://www.figma.com/proto/x612OMRyjzKiqYGtTm35w8/Toolworld.in?page-id=0%3A1&type=design&node-id=1-3650&viewport=793%2C1317%2C0.21&t=xNRUoNraHQGMzwjy-1&scaling=scale-down&starting-point-node-id=1%3A3650&mode=design', 1, '2024-04-24 11:57:32', '2024-04-24 11:57:32', 0, 9, 1, 13),
(16, 'CRO eBook', '', 1, '2024-05-14 11:25:04', '2024-05-14 11:25:04', 0, 9, 1, 13),
(17, 'Hydrant', 'https://www.drinkhydrant.com/pages/about', 1, '2024-05-17 12:15:58', '2024-05-17 12:15:58', 0, 1, 1, 13),
(18, 'CRO Sheet', 'https://docs.google.com/spreadsheets/d/1nW7bSIemgz01dWaHEhutt9lVmKspNw1ODEgABwNSLGc/edit', 1, '2024-05-31 10:29:23', '2024-05-31 10:29:23', 0, 17, 1, 13),
(19, 'Asset', 'https://www.magicdesign.io/', 1, '2024-06-02 19:11:04', '2024-06-02 19:11:04', 0, 1, 1, 13),
(20, 'Instagram Followers', 'https://app.smmowl.com/', 1, '2024-06-07 17:44:54', '2024-06-07 17:44:54', 0, 17, 1, 13),
(21, 'CRO PROPOSAL', 'https://docs.google.com/presentation/d/15WWftkJrvFFpk3hs-Th_cisuqtjuQ5o-Af_9Eu75bWo/edit?usp=sharing', 1, '2024-06-25 12:42:09', '2024-06-25 12:42:09', 0, 6, 1, 13),
(22, 'Ozar Luxury Brand', '', 1, '2024-07-02 16:29:27', '2024-07-02 16:29:27', 0, 6, 1, 13),
(23, 'Urth Brand', '', 1, '2024-07-02 16:31:09', '2024-07-02 16:31:09', 0, 6, 1, 13),
(24, 'Sorbet Brand Book', '', 1, '2024-07-02 16:31:44', '2024-07-02 16:31:44', 0, 6, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `checklist_master`
--

CREATE TABLE `checklist_master` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `checklist_master`
--

INSERT INTO `checklist_master` (`id`, `name`, `status`, `added_on`) VALUES
(1, 'Fonts', 1, '2023-11-21 17:53:03'),
(2, 'Paragraph, headers, and other text sizes', 1, '2023-11-21 17:53:03'),
(3, 'Buttons', 1, '2023-11-21 17:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `client_category`
--

CREATE TABLE `client_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client_category`
--

INSERT INTO `client_category` (`id`, `category_id`, `client_id`) VALUES
(27, 1, 1),
(28, 1, 5),
(29, 0, 6),
(30, 0, 7),
(31, 0, 8),
(32, 0, 9),
(33, 0, 10),
(34, 0, 11),
(35, 0, 12),
(36, 0, 13),
(37, 0, 14),
(38, 0, 15),
(39, 0, 16),
(40, 0, 17),
(44, 0, 4),
(45, 0, 3),
(46, 4, 3),
(47, 0, 18),
(51, 4, 2),
(52, 3, 2),
(53, 2, 2),
(54, 0, 19),
(55, 0, 20),
(56, 0, 21),
(57, 0, 22),
(58, 0, 23),
(59, 2, 24),
(60, 8, 25),
(61, 10, 26),
(62, 9, 14),
(63, 12, 15),
(64, 15, 16),
(65, 3, 17),
(66, 1, 18),
(67, 7, 19),
(68, 8, 20),
(69, 8, 21),
(70, 8, 22),
(71, 8, 23),
(72, 8, 24),
(73, 8, 25),
(74, 8, 26),
(75, 15, 27),
(76, 12, 27),
(77, 10, 27),
(78, 14, 28),
(79, 13, 28),
(80, 11, 28),
(81, 10, 28),
(82, 1, 29),
(83, 2, 30),
(84, 9, 31),
(85, 8, 32),
(86, 6, 33);

-- --------------------------------------------------------

--
-- Table structure for table `client_category_master`
--

CREATE TABLE `client_category_master` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client_category_master`
--

INSERT INTO `client_category_master` (`id`, `category`, `status`, `added_on`) VALUES
(1, 'E-commerce (both B2C and B2B platforms)', 1, '2023-11-24 11:10:42'),
(2, 'Healthcare and Wellness', 1, '2023-11-24 11:10:42'),
(3, 'Education and E-Learning', 1, '2023-11-24 11:10:42'),
(4, 'Technology and SaaS (Software as a Service)', 1, '2023-11-24 11:10:42'),
(5, 'Financial Services and Fintech', 1, '2023-11-24 11:10:42'),
(6, 'Real Estate', 1, '2023-11-24 11:10:42'),
(7, 'Retail and Consumer Goods', 1, '2023-11-24 11:10:42'),
(8, 'Hospitality and Travel', 1, '2023-11-24 11:10:42'),
(9, 'Food and Beverage', 1, '2023-11-24 11:10:42'),
(10, 'Fashion and Apparel', 1, '2023-11-24 11:10:42'),
(11, 'Entertainment and Media', 1, '2023-11-24 11:10:42'),
(12, 'Non-Profit Organizations and NGOs', 1, '2023-11-24 11:10:42'),
(13, 'Automotive', 1, '2023-11-24 11:10:42'),
(14, 'Legal Services', 1, '2023-11-24 11:10:42'),
(15, 'Manufacturing and Industrial', 1, '2023-11-24 11:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `client_master`
--

CREATE TABLE `client_master` (
  `id` int(11) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `client_email` varchar(200) NOT NULL,
  `client_phone` varchar(200) NOT NULL,
  `poc_name` varchar(200) DEFAULT NULL,
  `poc_phone` varchar(200) DEFAULT NULL,
  `poc_email` varchar(200) DEFAULT NULL,
  `client_locations` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL,
  `financial_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client_master`
--

INSERT INTO `client_master` (`id`, `client_name`, `client_email`, `client_phone`, `poc_name`, `poc_phone`, `poc_email`, `client_locations`, `status`, `added_on`, `updated_on`, `added_by`, `financial_year`) VALUES
(1, 'Supply Port', '', '', NULL, NULL, NULL, '', 1, '2023-12-28 18:44:37', '2023-12-28 18:44:37', 0, 0),
(2, 'Startup Movers', '', '', NULL, NULL, NULL, '', 1, '2023-12-28 18:44:37', '2023-12-28 18:44:37', 0, 0),
(3, 'Ruchocks', '', '', NULL, NULL, NULL, '', 1, '2023-12-28 18:46:00', '2023-12-28 18:46:00', 0, 0),
(4, 'Nutriseed', '', '', NULL, NULL, NULL, '', 1, '2023-12-28 18:46:00', '2023-12-28 18:46:00', 0, 0),
(5, 'Fazlani Corp Website', '', '', NULL, NULL, NULL, '', 1, '2023-12-28 18:46:29', '2023-12-28 18:46:29', 0, 0),
(6, 'Dibha', '', '', NULL, NULL, NULL, '', 1, '2023-12-28 18:46:29', '2023-12-28 18:46:29', 0, 0),
(7, 'Inka', '', '', NULL, NULL, NULL, '', 1, '2023-12-28 18:46:52', '2023-12-28 18:46:52', 0, 0),
(8, 'OEI Superfood Graphics', '', '', NULL, NULL, NULL, '', 1, '2023-12-28 18:46:52', '2023-12-28 18:46:52', 0, 0),
(9, '77 Cold Pressed Oil SMM', '', '', NULL, NULL, NULL, '', 1, '2023-12-28 18:47:16', '2023-12-28 18:47:16', 0, 0),
(10, 'Ads creating The wick & co', '', '', NULL, NULL, NULL, '', 1, '2023-12-28 18:47:16', '2023-12-28 18:47:16', 0, 0),
(11, 'The Happy Movement Travel SMM', '', '', NULL, NULL, NULL, '', 1, '2023-12-28 18:47:45', '2023-12-28 18:47:45', 0, 0),
(12, 'SEO John Pride', '', '', NULL, NULL, NULL, '', 1, '2023-12-28 18:47:45', '2023-12-28 18:47:45', 0, 0),
(13, 'TNM', '', '', NULL, NULL, NULL, '', 1, '2023-12-28 18:48:03', '2023-12-28 18:48:03', 0, 0),
(14, 'Brookieno', 'care@brookieno.com', '919746866778', '', '', '', 'Masous Tradesourse Pvt Ltd Kinfra Techno Industrial Park, Kakkanchery, Kerala 673635', 1, '2023-12-30 12:18:43', '2023-12-30 12:18:43', 1, 1),
(15, 'IOVRVF', 'gm_admin@iovrvf.org', '919958058960', 'Vishesh', '', '', 'Delhi', 1, '2024-01-10 23:47:47', '2024-01-10 23:47:47', 1, 1),
(16, 'Greenleaf', 'info@glagroresearch.com', '9318419553', '', '', '', 'delhi', 1, '2024-02-29 11:19:47', '2024-02-29 11:19:47', 6, 1),
(17, 'BRG {The Big Red Group}', 'info@thebigredgroup.com', '919310450013', '', '', '', 'Gurugram', 1, '2024-03-01 15:48:55', '2024-03-01 15:48:55', 6, 1),
(18, 'Manzuri', 'care@manzuriwellness.com', '8329160264', '', '', '', 'Pune', 0, '2024-05-22 05:34:14', '2024-03-01 15:55:00', 6, 1),
(19, 'Organity ', 'contact@organity.in', '000000000', '', '', '', 'delhi', 1, '2024-03-02 05:51:02', '2024-03-01 16:00:11', 6, 1),
(26, 'Thenorthvilla goa', 'thenorthvillagoa@gmail.com', '9873422272', '', '', '', 'goa', 1, '2024-03-02 11:19:38', '2024-03-02 11:19:38', 6, 1),
(30, 'Nack', 'hello@nack.life', '9009007981', '', '', '', 'New Delhi', 1, '2024-03-02 11:53:09', '2024-03-02 11:53:09', 6, 1),
(31, 'Brookieno', 'care@brookieno.com', '9746866778', '', '', '', 'Kerala', 0, '2024-03-02 06:39:11', '2024-03-02 11:54:37', 6, 1),
(32, 'Ruhe Stays', 'reservations@ruhestays.com', '9560009990', '', '', '', 'Goa', 0, '2024-05-22 05:34:05', '2024-03-02 12:05:01', 6, 1),
(33, 'Essel Realty', 'crm@esselrealty.com', '918377072794', '', '', '', 'Noida', 1, '2024-03-02 13:06:35', '2024-03-02 13:06:35', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation`, `status`, `added_on`) VALUES
(1, 'Technology AnalysAnalyst', 1, '2023-11-25 15:36:51'),
(2, 'Technical lead', 1, '2023-11-10 10:36:47'),
(3, 'Manager', 1, '2023-11-10 10:37:13'),
(4, 'Architect', 1, '2023-11-10 10:37:13'),
(5, 'Backend Developer', 1, '2023-11-25 15:37:50'),
(6, 'Frontend Developer', 1, '2023-11-25 15:37:50'),
(7, 'UX Designer', 1, '2023-11-25 15:38:35'),
(8, 'Graphic Designer', 1, '2023-11-25 15:38:35'),
(9, 'Director', 1, '2023-11-25 15:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `document_uploads`
--

CREATE TABLE `document_uploads` (
  `id` int(11) UNSIGNED NOT NULL,
  `investor_id` int(11) UNSIGNED NOT NULL,
  `pan_card` varchar(255) NOT NULL,
  `aadhar_card` varchar(200) NOT NULL,
  `bank_statement` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `document_uploads`
--

INSERT INTO `document_uploads` (`id`, `investor_id`, `pan_card`, `aadhar_card`, `bank_statement`, `created_at`, `updated_at`) VALUES
(1, 1, '693f76fbe374638bedd4407b06c6561f.jpg', 'b94e6f567f6a9044a1abb9ada61fa918.jpg', '8890234a3d4aac42047ac09d78b807b2.jpg', '2023-11-02 05:18:09', '2023-11-02 05:18:09'),
(2, 8, 'fac57f1135ae673ac20aa44e866fe66b.jpg', '1284f6f2e652e775936d22c6b4a08a45.jpg', 'f98687d8874b71d316768691ae7b7e44.jpg', '2023-10-30 05:22:05', '2023-10-30 05:22:05'),
(3, 10, 'b1143d07fc93349659084aa6332bd0bb.jpg', 'c0bc8b907c0cdc23afec795f855fe23b.jpg', 'ec69c968405a11189c2da1831ec1875e.jpg', '2023-10-30 13:04:08', '2023-10-30 13:04:08'),
(4, 7, 'bbb5572705474fe5c50aa416fe3a8591.png', '64a83f90d50fcc49d8294739fb23a094.png', 'aa134a68cdf9c2c7f9abb1ce317ed8b8.png', '2023-10-31 05:02:26', '2023-10-31 05:02:26'),
(5, 14, '19a1f8f69821d67c50b614e48ae41953.jpg', '58b374e85704e4d5101764914efc81ea.jpg', '73756dbc65d189bf7befa4014606eac7.jpg', '2023-11-01 11:48:29', '2023-11-01 11:48:29'),
(6, 1, '', '', '80aa2e518d9e210895cc21062974583e.jpg', '2023-11-02 04:59:56', '2023-11-02 04:59:56'),
(7, 1, '', '', 'fefc49bf6a581d7a199a19b9780141a6.jpg', '2023-11-02 05:01:07', '2023-11-02 05:01:07'),
(8, 1, '', '', '6bb937dd19eaed4b25db0c0508d9284b.jpg', '2023-11-02 05:07:27', '2023-11-02 05:07:27'),
(9, 1, '', '', 'ecbb43030a098570f0e4bce7599b9128.jpg', '2023-11-02 05:10:13', '2023-11-02 05:10:13'),
(10, 17, '8720c564d430954df8bd5f7d5e93a72e.jpg', '1055330e9304b6a03bd1ed033c585069.jpg', '2409cc4a4919ee2772cefbe5397f2fb7.jpg', '2023-11-04 04:46:05', '2023-11-04 04:46:05'),
(11, 19, 'fd8818fb0ab0bdc5aecacfa579126960.png', '9c305bcb268bcf9e32e616272fcd2fe2.png', 'fadb3c75515218d8d737229a8a5ca93f.png', '2023-11-04 06:06:22', '2023-11-04 06:06:22'),
(12, 18, 'a5a7837b556ae4b10d325cb4b3586fa1.jpg', '58b5d7216e8728acd365b527289e4de6.jpg', '4a86a300a6163a93ed4ec8b1368c2ca5.jpg', '2023-11-07 04:37:24', '2023-11-07 04:37:24'),
(13, 23, '63758d8f31270ffc9b22a7975ea7eef2.png', 'fb17df84abf04efa3af8ea31bb832d0d.png', '0047be1e2d035c202205d99c92092625.png', '2023-11-07 05:12:46', '2023-11-07 05:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `financialyear`
--

CREATE TABLE `financialyear` (
  `id` int(25) NOT NULL,
  `financialyear` varchar(255) NOT NULL,
  `financialyear_value` varchar(255) NOT NULL,
  `cep_financialyear` varchar(100) NOT NULL,
  `start_year` varchar(100) NOT NULL,
  `end_year` varchar(100) NOT NULL,
  `status` int(25) NOT NULL DEFAULT 1,
  `show_in_member` int(11) NOT NULL DEFAULT 1,
  `is_default` int(10) DEFAULT 0,
  `sort_order` int(11) NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `financialyear`
--

INSERT INTO `financialyear` (`id`, `financialyear`, `financialyear_value`, `cep_financialyear`, `start_year`, `end_year`, `status`, `show_in_member`, `is_default`, `sort_order`, `added_on`, `updated_on`) VALUES
(1, '23-24', '23-24', '2023-24', '2023', '2024', 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `industry_master`
--

CREATE TABLE `industry_master` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `industry_master`
--

INSERT INTO `industry_master` (`id`, `name`, `status`, `added_on`) VALUES
(1, 'E-commerce (both B2C and B2B platforms)', 1, '2023-11-24 11:10:42'),
(2, 'Healthcare and Wellness', 1, '2023-11-24 11:10:42'),
(3, 'Education and E-Learning', 1, '2023-11-24 11:10:42'),
(4, 'Technology and SaaS (Software as a Service)', 1, '2023-11-24 11:10:42'),
(5, 'Financial Services and Fintech', 1, '2023-11-24 11:10:42'),
(6, 'Real Estate', 1, '2023-11-24 11:10:42'),
(7, 'Retail and Consumer Goods', 1, '2023-11-24 11:10:42'),
(8, 'Hospitality and Travel', 1, '2023-11-24 11:10:42'),
(9, 'Food and Beverage', 1, '2023-11-24 11:10:42'),
(10, 'Fashion and Apparel', 1, '2023-11-24 11:10:42'),
(11, 'Entertainment and Media', 1, '2023-11-24 11:10:42'),
(12, 'Non-Profit Organizations and NGOs', 1, '2023-11-24 11:10:42'),
(13, 'Automotive', 1, '2023-11-24 11:10:42'),
(14, 'Legal Services', 1, '2023-11-24 11:10:42'),
(15, 'Manufacturing and Industrial', 1, '2023-11-24 11:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `insert_asset_cat`
--

CREATE TABLE `insert_asset_cat` (
  `id` int(11) NOT NULL,
  `asset_class_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `insert_asset_cat`
--

INSERT INTO `insert_asset_cat` (`id`, `asset_class_id`, `cat_id`, `added_on`) VALUES
(1, 1, 11, '2023-12-29 11:16:29'),
(2, 2, 11, '2023-12-29 11:17:08'),
(3, 3, 11, '2023-12-29 11:17:51'),
(4, 4, 11, '2023-12-29 11:58:38'),
(5, 5, 10, '2023-12-29 15:57:52'),
(6, 5, 9, '2023-12-29 15:57:52'),
(7, 5, 2, '2023-12-29 15:57:52'),
(8, 6, 6, '2023-12-29 16:55:33'),
(9, 7, 11, '2023-12-29 17:09:45'),
(10, 8, 3, '2024-01-02 16:45:48'),
(11, 8, 2, '2024-01-02 16:45:48'),
(12, 9, 11, '2024-01-23 15:55:38'),
(13, 10, 10, '2024-02-21 05:54:04'),
(14, 11, 9, '2024-03-22 06:42:43'),
(15, 11, 3, '2024-03-22 06:42:43'),
(16, 11, 2, '2024-03-22 06:42:43'),
(17, 12, 2, '2024-04-24 06:25:24'),
(18, 13, 3, '2024-04-24 06:26:07'),
(19, 13, 2, '2024-04-24 06:26:07'),
(20, 14, 2, '2024-04-24 06:26:38'),
(21, 15, 2, '2024-04-24 06:27:32'),
(22, 16, 7, '2024-05-14 05:55:04'),
(23, 16, 6, '2024-05-14 05:55:04'),
(24, 16, 5, '2024-05-14 05:55:04'),
(25, 16, 3, '2024-05-14 05:55:04'),
(26, 16, 2, '2024-05-14 05:55:04'),
(27, 17, 6, '2024-05-17 06:45:58'),
(28, 18, 10, '2024-05-31 04:59:23'),
(29, 19, 2, '2024-06-02 13:41:04'),
(30, 20, 8, '2024-06-07 12:14:54'),
(31, 21, 11, '2024-06-25 07:12:09'),
(32, 21, 3, '2024-06-25 07:12:09'),
(33, 21, 2, '2024-06-25 07:12:09'),
(34, 22, 11, '2024-07-02 10:59:27'),
(35, 23, 11, '2024-07-02 11:01:09'),
(36, 24, 11, '2024-07-02 11:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `agenda` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `upload_file` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `project_id`, `agenda`, `date`, `link`, `upload_file`, `status`, `added_on`, `added_by`) VALUES
(1, 9, 'test', '2023-12-08', 'https://fabdukaan.com/crm/admin/add_meeting', '93c83e5314559c2e005d2d008ab5e690.pdf', -1, '2023-12-23 18:36:00', 1),
(2, 9, 'gg', '2023-12-16', 'https://maviyom.com/multi-rotor-maviyom-x8/', '5540abb32d7452539adcdc3523e7da82.pdf', -1, '2023-12-27 17:17:59', 9),
(3, 6, 'test', '2024-02-10', 'test', '98b49281d389883cdcdbe33c36c3ac92.pdf', -1, '2024-02-07 17:43:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_app`
--

CREATE TABLE `new_app` (
  `id` int(11) NOT NULL,
  `app_name` varchar(200) NOT NULL,
  `app_technology` int(11) NOT NULL,
  `app_work` varchar(200) NOT NULL,
  `app_link` varchar(200) NOT NULL,
  `added_on` datetime DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `added_by` int(11) NOT NULL,
  `financial_year` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_app`
--

INSERT INTO `new_app` (`id`, `app_name`, `app_technology`, `app_work`, `app_link`, `added_on`, `updated_on`, `added_by`, `financial_year`, `status`) VALUES
(1, 'Kelly Woodard test', 1, 'Qui excepturi hic es', 'https://www.wowyburyvud.ws', '2024-02-10 17:02:47', '2024-02-10 17:46:12', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_categories`
--

CREATE TABLE `portfolio_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `portfolio_categories`
--

INSERT INTO `portfolio_categories` (`id`, `name`, `status`, `added_on`) VALUES
(1, 'Shopify', 1, '2023-11-24 11:11:20'),
(2, 'WordPress', 1, '2023-11-24 11:11:20'),
(3, 'Custom', 1, '2023-11-24 11:11:20'),
(4, 'CRM', 1, '2023-11-24 11:11:20'),
(5, 'React', 1, '2023-11-24 11:11:20'),
(6, 'Node', 1, '2023-11-24 11:11:20'),
(7, 'Graphic Design', 1, '2023-11-25 14:25:11'),
(8, 'UI/UX', 1, '2023-11-25 14:25:11'),
(9, 'Mobile App ', 1, '2024-01-04 17:50:33'),
(10, 'branding', 1, '2024-01-04 17:50:33'),
(11, 'Social Media', 1, '2024-01-04 17:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `project_checklist`
--

CREATE TABLE `project_checklist` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `checklist_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_checklist`
--

INSERT INTO `project_checklist` (`id`, `project_id`, `checklist_id`, `added_on`) VALUES
(4, 2, 3, '2023-11-22 10:22:55'),
(5, 2, 2, '2023-11-22 10:22:55'),
(6, 2, 1, '2023-11-22 10:22:55'),
(9, 4, 3, '2023-11-22 12:25:44'),
(10, 4, 2, '2023-11-22 12:25:44'),
(11, 5, 1, '2023-11-24 15:36:27'),
(28, 3, 2, '2023-11-25 15:12:41'),
(29, 3, 1, '2023-11-25 15:12:41'),
(30, 1, 3, '2023-11-27 11:42:53'),
(31, 1, 2, '2023-11-27 11:42:53'),
(32, 1, 1, '2023-11-27 11:42:53'),
(36, 9, 0, '2023-12-01 18:26:11'),
(37, 10, 0, '2023-12-01 18:28:24'),
(38, 8, 0, '2023-12-01 18:29:01'),
(39, 11, 0, '2023-12-01 18:30:18'),
(42, 7, 3, '2023-12-04 11:59:55'),
(43, 7, 2, '2023-12-04 11:59:55'),
(44, 12, 0, '2023-12-04 12:07:08'),
(45, 6, 1, '2023-12-04 12:08:42'),
(46, 13, 0, '2023-12-04 12:10:46'),
(47, 14, 0, '2023-12-04 12:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `project_industry_master`
--

CREATE TABLE `project_industry_master` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_industry_master`
--

INSERT INTO `project_industry_master` (`id`, `name`, `status`, `added_on`) VALUES
(1, 'E-commerce (both B2C and B2B platforms)', 1, '2023-11-24 11:10:42'),
(2, 'Healthcare and Wellness', 1, '2023-11-24 11:10:42'),
(3, 'Education and E-Learning', 1, '2023-11-24 11:10:42'),
(4, 'Technology and SaaS (Software as a Service)', 1, '2023-11-24 11:10:42'),
(5, 'Financial Services and Fintech', 1, '2023-11-24 11:10:42'),
(6, 'Real Estate', 1, '2023-11-24 11:10:42'),
(7, 'Retail and Consumer Goods', 1, '2023-11-24 11:10:42'),
(8, 'Hospitality and Travel', 1, '2023-11-24 11:10:42'),
(9, 'Food and Beverage', 1, '2023-11-24 11:10:42'),
(10, 'Fashion and Apparel', 1, '2023-11-24 11:10:42'),
(11, 'Entertainment and Media', 1, '2023-11-24 11:10:42'),
(12, 'Non-Profit Organizations and NGOs', 1, '2023-11-24 11:10:42'),
(13, 'Automotive', 1, '2023-11-24 11:10:42'),
(14, 'Legal Services', 1, '2023-11-24 11:10:42'),
(15, 'Manufacturing and Industrial', 1, '2023-11-24 11:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `project_type_master`
--

CREATE TABLE `project_type_master` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_type_master`
--

INSERT INTO `project_type_master` (`id`, `name`, `status`, `added_on`) VALUES
(1, 'Maintenance', 1, '2023-11-18 17:36:23'),
(2, 'One Time', 1, '2023-11-18 17:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `financial_year` int(11) NOT NULL,
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`id`, `name`, `type`, `status`, `added_on`, `financial_year`, `updated_on`, `added_by`) VALUES
(1, 'test', 'sdasdasd', 1, '2024-02-01 18:35:06', 1, '2024-02-01 18:35:06', 1),
(2, 'Dummy user', 'sdasdasd', 1, '2024-02-01 18:37:41', 1, '2024-02-01 18:37:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_master`
--

CREATE TABLE `role_master` (
  `id` int(11) NOT NULL,
  `role` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_master`
--

INSERT INTO `role_master` (`id`, `role`, `status`, `added_on`) VALUES
(1, 'Admin', 1, '2023-11-10 10:27:14'),
(2, 'Senior Employee', 1, '2023-11-18 17:36:56'),
(3, 'Junior Employee\n', 1, '2023-11-18 17:37:05'),
(4, 'Intern', 1, '2023-11-18 17:37:16'),
(5, 'Freelancer', 1, '2023-11-22 10:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `starting_date` varchar(200) NOT NULL,
  `ending_date` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `sheet_link` varchar(200) NOT NULL,
  `type_of_plan` varchar(200) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `financial_year` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `client_id`, `starting_date`, `ending_date`, `duration`, `sheet_link`, `type_of_plan`, `added_on`, `added_by`, `updated_on`, `financial_year`, `status`) VALUES
(1, 2, '2024-01-03', '', 'Monthly', 'https://docs.google.com/spreadsheets/d/1sZ5CONKwr5nFhyBQHenSfD5Ab5WE3PdWboMyc974Kb0/edit#gid=0', 'Basic', '2024-02-27 11:33:41', 17, '2024-03-16 11:35:54', 1, 1),
(2, 12, '2023-01-11', '', 'Monthly', 'https://docs.google.com/spreadsheets/d/1hp1hbl3kqSSWwRdxEKQlCzTbVL5hbwGEMf-YTRxepnI/edit#gid=0', 'Basic', '2024-02-27 11:34:49', 17, '2024-02-27 11:34:49', 1, 1),
(3, 13, '2024-01-03', '', 'Monthly', 'https://docs.google.com/spreadsheets/d/1ijufuDsVHJOmP9RrptkeDMbmnP-AaGbuV8cLMYmubK8/edit#gid=0', 'Basic', '2024-02-27 11:36:55', 17, '2024-02-27 11:36:55', 1, 1),
(4, 26, '2024-01-02', '', 'Monthly', 'https://docs.google.com/spreadsheets/d/1BXdMRgxs2uZjxUTIJ5DTD6P2hW2BzrrLdHLXip02e2M/edit#gid=0', 'Basic', '2024-03-04 10:07:48', 17, '2024-03-04 10:07:48', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seo_assign_to`
--

CREATE TABLE `seo_assign_to` (
  `id` int(11) NOT NULL,
  `assign_to` int(11) NOT NULL,
  `seo_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seo_assign_to`
--

INSERT INTO `seo_assign_to` (`id`, `assign_to`, `seo_id`, `added_on`) VALUES
(1, 16, 1, '2024-02-16 11:29:53'),
(2, 14, 1, '2024-02-16 11:29:53'),
(3, 17, 1, '2024-02-27 06:03:41'),
(4, 17, 2, '2024-02-27 06:04:49'),
(5, 17, 3, '2024-02-27 06:06:55'),
(6, 17, 4, '2024-03-04 04:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `smm_assign_to`
--

CREATE TABLE `smm_assign_to` (
  `id` int(11) NOT NULL,
  `assign_to` int(11) NOT NULL,
  `smm_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `smm_assign_to`
--

INSERT INTO `smm_assign_to` (`id`, `assign_to`, `smm_id`, `added_on`) VALUES
(1, 15, 1, '2024-02-16 12:27:22'),
(2, 14, 1, '2024-02-16 12:27:22'),
(3, 17, 1, '2024-02-29 06:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `smm_report`
--

CREATE TABLE `smm_report` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `starting_date` varchar(200) NOT NULL,
  `ending_date` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `sheet_link` varchar(200) NOT NULL,
  `type_of_plan` varchar(200) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `financial_year` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `social_media` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `smm_report`
--

INSERT INTO `smm_report` (`id`, `client_id`, `starting_date`, `ending_date`, `duration`, `sheet_link`, `type_of_plan`, `added_on`, `added_by`, `updated_on`, `financial_year`, `status`, `social_media`) VALUES
(1, 9, '2024-01-02', '', 'Monthly', 'https://docs.google.com/spreadsheets/d/1NLsXVbobSkqEfbnQQOYFo82zAWLA9EIarJYnNoOy9SA/edit#gid=1395505458', 'Basic', '2024-02-29 12:09:50', 17, '2024-03-16 11:40:28', 1, 1, 'facebook');

-- --------------------------------------------------------

--
-- Table structure for table `technology_master`
--

CREATE TABLE `technology_master` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `technology_master`
--

INSERT INTO `technology_master` (`id`, `name`, `status`, `added_on`) VALUES
(1, 'Shopify', 1, '2023-11-24 11:11:20'),
(2, 'WordPress', 1, '2023-11-24 11:11:20'),
(3, 'Custom', 1, '2023-11-24 11:11:20'),
(4, 'CRM', 1, '2023-11-24 11:11:20'),
(5, 'React', 1, '2023-11-24 11:11:20'),
(6, 'Node', 1, '2023-11-24 11:11:20'),
(7, 'Graphic Design', 1, '2023-11-25 14:25:11'),
(8, 'UI/UX', 1, '2023-11-25 14:25:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_notes`
--
ALTER TABLE `add_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_portfolio`
--
ALTER TABLE `add_portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_projects`
--
ALTER TABLE `add_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_project_checklist`
--
ALTER TABLE `add_project_checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_project_marketer`
--
ALTER TABLE `add_project_marketer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_reminders`
--
ALTER TABLE `add_reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_reminders_user`
--
ALTER TABLE `add_reminders_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_technology`
--
ALTER TABLE `app_technology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_categories`
--
ALTER TABLE `asset_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_images`
--
ALTER TABLE `asset_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_master`
--
ALTER TABLE `asset_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checklist_master`
--
ALTER TABLE `checklist_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_category`
--
ALTER TABLE `client_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_category_master`
--
ALTER TABLE `client_category_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_master`
--
ALTER TABLE `client_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_uploads`
--
ALTER TABLE `document_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financialyear`
--
ALTER TABLE `financialyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry_master`
--
ALTER TABLE `industry_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insert_asset_cat`
--
ALTER TABLE `insert_asset_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_app`
--
ALTER TABLE `new_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_checklist`
--
ALTER TABLE `project_checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_industry_master`
--
ALTER TABLE `project_industry_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_type_master`
--
ALTER TABLE `project_type_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_master`
--
ALTER TABLE `role_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_assign_to`
--
ALTER TABLE `seo_assign_to`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smm_assign_to`
--
ALTER TABLE `smm_assign_to`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smm_report`
--
ALTER TABLE `smm_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technology_master`
--
ALTER TABLE `technology_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_notes`
--
ALTER TABLE `add_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `add_portfolio`
--
ALTER TABLE `add_portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `add_projects`
--
ALTER TABLE `add_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `add_project_checklist`
--
ALTER TABLE `add_project_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `add_project_marketer`
--
ALTER TABLE `add_project_marketer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `add_reminders`
--
ALTER TABLE `add_reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `add_reminders_user`
--
ALTER TABLE `add_reminders_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `app_technology`
--
ALTER TABLE `app_technology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `asset_categories`
--
ALTER TABLE `asset_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `asset_images`
--
ALTER TABLE `asset_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `asset_master`
--
ALTER TABLE `asset_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `checklist_master`
--
ALTER TABLE `checklist_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_category`
--
ALTER TABLE `client_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `client_category_master`
--
ALTER TABLE `client_category_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `client_master`
--
ALTER TABLE `client_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `document_uploads`
--
ALTER TABLE `document_uploads`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `financialyear`
--
ALTER TABLE `financialyear`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industry_master`
--
ALTER TABLE `industry_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `insert_asset_cat`
--
ALTER TABLE `insert_asset_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `new_app`
--
ALTER TABLE `new_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `project_checklist`
--
ALTER TABLE `project_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `project_industry_master`
--
ALTER TABLE `project_industry_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `project_type_master`
--
ALTER TABLE `project_type_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_master`
--
ALTER TABLE `role_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seo_assign_to`
--
ALTER TABLE `seo_assign_to`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `smm_assign_to`
--
ALTER TABLE `smm_assign_to`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `smm_report`
--
ALTER TABLE `smm_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `technology_master`
--
ALTER TABLE `technology_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
