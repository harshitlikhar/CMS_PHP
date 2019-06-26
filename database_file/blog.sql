-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2019 at 11:06 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstrap'),
(2, 'JavaScript'),
(3, 'Python'),
(6, 'JAVA'),
(7, 'ANGULAR  7');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(8, 1, 'Kshav', 'k@gmail.com', 'dkjbwsdaobucdoibweoihhw', 'Approved', '2019-06-20'),
(9, 2, 'yoo', 'panda@gmail.co', 'dkkbedbjwead`', 'Unapproved', '2019-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(250) NOT NULL,
  `post_author` varchar(250) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(250) NOT NULL,
  `post_comment_count` varchar(255) NOT NULL,
  `post_status` varchar(250) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 1, 'php', 'keshav', '2019-06-20', 'disaster-management-ppt-3-638.jpg', '                           xsxsw                                                      ', 'php,html,css,bootstrap,mysql', '2', 'published'),
(2, 1, 'php and java', 'keshav likhar', '2019-06-20', 'Untitledfefdf.png', '         xcsackhvvkvaysv test tes\r\n\r\nxsaljc\r\n\r\ntgdbdfljghreig\r\nregourhoufvwe t      test complete                                                         ', 'php,html,css,bootstrap', '6', 'published'),
(3, 1, 'Snow man', 'keshav', '2019-06-20', 'Untitledfefdf.png', 'hiiii  ', 'php,html,css,bootstrap,mysql', '4', 'published'),
(6, 1, 'php and java', 'keshav  L', '2019-06-18', '1024x0-wood-main-door-models-wood-door-designs-in-pakistan-view-wood-door-70994.jpg', '         m,z cj bzjbscljbzljsbcljszbc         ', 'php,html,css,bootstrap,mysql', '4', 'published'),
(7, 6, 'php', 'keshav likhar', '2019-06-20', 'Untitled.png', '         Para Military forces who are in active service and their family members travelling at their own expense. Para Military forces include BSF/ITBP/CISF/CRPF/RPF/NSG/SSB/ Coast Guards/ Assam Rifles / IB For the purpose of concession, the family includes Spouse, dependent children between 02 and 26 years of age and dependent Parents. Married children are not considered as part of family.\r\nRequired Documents: 	Official ID card issued to the serving personnel and dependent card issued to the family members.\r\nDiscount: 	50% of Basic fare on select classes\r\nTravel: 	Any sector within India.\r\nTicket Validity: 	1 Year from date of issue\r\nAdvance Purchase: 	Ticket to be purchased 7 days before departure.\r\nChildren: 	No additional discount applies.\r\nInfant: 	(Under 2 years) 1st accompanying Infant - Rs.1000 per coupon, Plus applicable taxes. 2nd and more Infants, no discount permissible.', 'php,html,css,bootstrap,mysql', '4', 'published'),
(8, 1, 'Testing', 'keshav likhar', '2019-06-22', 'images.jpg', '<p>&nbsp; &lt;div class=\"form-group\"&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&lt;label for=\"status\"&gt;Post status&lt;/label&gt;&lt;br/&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&lt;select name=\"post_status\" id=\"\"&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&lt;option value=\"draft\"&gt;Select Option&lt;/option&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&lt;option value=\"published\"&gt;Publish&lt;/option&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&lt;option value=\"draft\"&gt;Draft&lt;/option&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&lt;/select&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br>&nbsp; &nbsp; &nbsp; &nbsp;&lt;/div&gt;&nbsp;</p>', 'php,html,css,bootstrap,mysql', '', 'published'),
(9, 1, 'Testing', 'keshav likhar', '2019-06-22', 'images.jpg', '<p>&nbsp; &lt;div class=\"form-group\"&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&lt;label for=\"status\"&gt;Post status&lt;/label&gt;&lt;br/&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&lt;select name=\"post_status\" id=\"\"&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&lt;option value=\"draft\"&gt;Select Option&lt;/option&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&lt;option value=\"published\"&gt;Publish&lt;/option&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&lt;option value=\"draft\"&gt;Draft&lt;/option&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&lt;/select&gt;<br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br>&nbsp; &nbsp; &nbsp; &nbsp;&lt;/div&gt;&nbsp;</p>', 'php,html,css,bootstrap,mysql', '', 'draft'),
(10, 1, 'php', 'keshav', '2019-06-22', '', '<p>jlbcsajb</p>', 'php,html,css,bootstrap,mysql', '', 'draft'),
(11, 2, 'Testing', 'keshav likhar', '2019-06-22', '', '<p>adsca</p>', 'php,html,css,bootstrap,mysql', '', 'draft'),
(12, 3, 'Testing', 'keshav likhar', '2019-06-22', '', '<p>csd</p>', 'test', '', 'draft'),
(13, 3, 'Testing', 'keshav likhar', '2019-06-22', '', '<p>csd</p>', 'test', '', 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iamreallyacrazypotato0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(12, 'Mr.hacker', '$2y$10$iamreallyacrazypotatouHbXwembfpILhZycpShnxBO480wDYlDW', 'hacker', 'khan', 'hakku@gmail.com', '', 'User', '$2y$10$iamreallyacrazypotato0'),
(13, 'test4', '$2y$10$iamreallyacrazypotatouHbXwembfpILhZycpShnxBO480wDYlDW', 'test', 'test', 'test4@gmail.com', '', 'User', '$2y$10$iamreallyacrazypotato0'),
(14, 'Keshavlikhar', '$2y$10$iamreallyacrazypotatouHbXwembfpILhZycpShnxBO480wDYlDW', 'Keshav', 'Likhar', 'harshitlikhar007@gmail.com', '', 'Admin', '$2y$10$iamreallyacrazypotato0'),
(15, 'kueen', '$2y$10$iamreallyacrazypotatouCNjjouZskZZWgdak/H84jnm9ussSKo.', '', '', 'kueen@gmail.com', '', 'Admin', '$2y$10$iamreallyacrazypotato0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
