-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 08:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatapp`
--
CREATE DATABASE IF NOT EXISTS `chatapp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `chatapp`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `evoting`
--
CREATE DATABASE IF NOT EXISTS `evoting` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `evoting`;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `profile_pic` varchar(40) NOT NULL,
  `candidate_first_name` varchar(20) NOT NULL,
  `candidate_last_name` varchar(20) NOT NULL,
  `candidate_nickname` varchar(20) NOT NULL,
  `Position` varchar(25) NOT NULL,
  `Platform` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `profile_pic`, `candidate_first_name`, `candidate_last_name`, `candidate_nickname`, `Position`, `Platform`) VALUES
(2, 'profile_blank.jpg', 'Jhunrhick', 'Tarre', ' admin', 'President', 'asdasd'),
(3, 'profile_blank.jpg', 'Nathaniel Angelosss', 'Gentugao', ' Olvido', 'Brgy. Captain', 'damo ko di inks arts hehee'),
(7, 'profile-candidate-374-1899.jpg', 'Asas', 'Tarres', '  Admin', 'Vice President', 'Fasdsadasdsefrserrerrrsersersersr'),
(9, 'profile_blank.jpg', 'Jonathan', 'Joestar', ' Jojos', 'President', 'ORA ORA ORA ORA ORA ORA ORA');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `User_Type` varchar(10) NOT NULL,
  `Username` varchar(14) NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `User_Type`, `Username`, `Password`) VALUES
(1, 'Admin', 'admin', '$2y$10$dd80xRZB0kq6WjMMVSFoZ.LC6srYUfWpyyi/bHHMAhDCQUhneGLuK'),
(2, 'Voters', '12-508-7238', '$2y$10$R4xFsjmkGic/6NO3YOTk7eYt07NX6joUcmS.2DgbHNitu2asJ8g8C'),
(3, 'Voters', '12-599-3456', '$2y$10$1usaQk.SjGWGjU3Kj60HXOn83Bkf.z9OP6thV/lo59hCi8EON4TnG'),
(4, 'Voters', '12-256-4919', '$2y$10$SM6FuBl3qbvJ9mVKzMIvJOYhRkCAyG1sKNwybMGgs/.fje/Lce1sa'),
(5, 'Voters', '12-498-7509', '$2y$10$d5yXD97Rdby2G8IqXTvkCe8zImQ54J.Jau2bKMrSiv60DW450v/Na'),
(6, 'Voters', '12-284-2348', '$2y$10$QP.U4TWEpd/hn6Oo7thPwOR3XY93PU1TWkEibMZXmzAKk3vXFj9zK'),
(8, 'Voters', '12-366-3126', '$2y$10$XB/wN403K9aWDdoiEIAcOO0ukddl.rbGkHxHtKn1ThI6NCGhL4rKa'),
(32, 'Voters', '12-963-2695', '$2y$10$vXfuoITfDl0F64yE92ndc.Do3xrfJTlIW2zsQ3z//c0WoPD8htA2S'),
(33, 'Voters', '12-837-1841', '$2y$10$2PtmYgVJCcHGUH9uhPnuOu3Mrwo.unZmMzidp1bStFZXGjsmn6EIy'),
(37, 'Voters', '12-986-2506', '$2y$10$tqKqvzcv2xovfG1xZECUfej9IgS.NfJ81aNnxHt0a07pLQYWlJQOi'),
(38, 'Voters', '12-205-2106', '$2y$10$JFfEt..0Um5rWcQxmEdVI.6ca8rBI2eidfKDAidil5EEwdgGWkmA.'),
(39, 'Voters', '12-219-1271', '$2y$10$wGtQL1ltArya.jSi7T54yeuSXMAPztjQyJhZN46H43SATGFrVvBiS'),
(40, 'Voters', '12-917-4043', '$2y$10$SaNW1a5VfRWQhOz4sVLkBudVCYV6t0UqijLIj7JzcET4YnJivVJfG'),
(41, 'Voters', '12-608-7697', '$2y$10$XtXTJIcC8v4eozWWyla5XeQHjxslcgz0Fq5Hy7/hhR6IRVYZqt.Mm'),
(43, 'Voters', '12-275-9795', '$2y$10$6Lw2WjK8EPRtwWGuF/zc3O8KemqZharopR9ZFKkZ7ynRwBIB3wYNy'),
(44, 'Voters', '12-617-3127', '$2y$10$ZqEL4mBDayd/XVtq544CQ.fss0Sc5uFW6pUmwot/ALbiptziVkXbS'),
(45, 'Voters', '12-635-7724', '$2y$10$l4JeUlfdm9rXWkkRkgzOy.voLBCF3DcSBXzQIExxGbGcrKUtC55HK'),
(46, 'Voters', '12-298-3159', '$2y$10$Xrtbz9/2B/GoJozyiHI2GeKMm1tLP9Xc27gPlOjMlhtiMflvsK9Ui'),
(47, 'Voters', '12-789-5701', '$2y$10$sO9n3S1U2IE35bJTNtvUIO8D6W7eL7bpmWJOjmucP9zQ15xEZIqPG'),
(48, 'Voters', '12-694-7314', '$2y$10$5V6LVkNvl97ozAzQGmGADOe8NjcXhzwYsAO/V5jj.kGfI5OzsQpMG'),
(49, 'Voters', '12-299-1334', '$2y$10$acAxN0pdjg.lKbSkdcYa1.5Wn7h5Wmi4.aAgEXEkRyGZ/5h3nYoVe'),
(50, 'Voters', '12-769-2506', '$2y$10$d1F1ZyKiSh564QaS78f0tuL1qVlp1K1kPBB.XGUhf1mDwQ.JLUFeG'),
(51, 'Voters', '12-921-2011', '$2y$10$zm2FJJGpWAjTuN8V1usFsec7HNPN9VBobkxm1fR3458uE/4M/D3ai'),
(52, 'Voters', '12-653-9615', '$2y$10$VSjmFRuwjru8fyYJ8bk2KeAM2K.aIH7Mu8pTPy6PaMfQqGhgcIXAS'),
(53, 'Voters', '12-669-9983', '$2y$10$ap6agEHGFE9HduETwZYu7e9praHtCevk9d/Iw6OWnzmtftS/U3nxi'),
(54, 'Voters', '12-634-7212', '$2y$10$48wefuYO6tu.kjY0WajMA.IfHAIQYptIKz370DF4wRBe/mbofBOp.'),
(55, 'Voters', '12-685-2830', '$2y$10$Qkppqzr/m6ndbcA0A4Ss9exJrFVXtblyLj.uPPakGZaSndS0euMn.'),
(56, 'Voters', '12-306-2492', '$2y$10$lCMZRuK6c7INOq87S3pUa.QMAYtPnneP7PULPyLufM4DfPkEVpX0i'),
(57, 'Voters', '12-542-8448', '$2y$10$RzZbbeP8z63tXwb3o4JQAe0Vq4gvRef4koaP6.3HK.oBU.43pSJEW'),
(58, 'Voters', '12-619-6121', '$2y$10$cdG7Zn3BIHFyDvQJUtfjleNPwtZ4rSG5Hp.8MzD2sxW/J7TrV/eGa'),
(59, 'Voters', '12-287-4996', '$2y$10$xF0iWUnw/qhiVjoo95ExkemXTO8uGrouYg8ynOAKHkK3ig7Cu5lQW'),
(60, 'Voters', '12-229-5306', '$2y$10$8abHqr8DrUd5O4/NEUW8Pe2CEJELDL2eJT6wdg4vMblZf05DJ.btm'),
(61, 'Voters', '12-897-5439', '$2y$10$ztmGL1CFHXCQHly35ESPuufULfdx//e88lhIhMCA5ugNlX.pCwJEC'),
(62, 'Voters', '12-511-7319', '$2y$10$bVpfw9mumNNq3hZXFgncZ.ddCsPuG.8ykJUewHTfiCBsmuKwVoAFq'),
(63, 'Voters', '12-395-7594', '$2y$10$HyGwYt2TeyFS7MBh4gbOEeB.oB8quOugDdpDh3yNAzsBuMrsXzJ8.'),
(64, 'Voters', '12-349-6917', '$2y$10$KCf3jYz7nZo1sERCZBybXesIsxKKyYlX7vfyglP1ag.JJl5k4rPuO'),
(65, 'Voters', '12-125-8252', '$2y$10$sjlKrtUCi0ixG6l7AW7r9eJL0JoG1g8MhOUIJjmGH4pZtVa/Oa.86'),
(66, 'Voters', '12-138-8820', '$2y$10$l2VumUJdbqcmVemUcf3UkOAv9rdcyWWKEsovCwowvhrA5J8xX5vl.'),
(67, 'Voters', '12-890-6068', '$2y$10$TpjMO159r9cc8lIuzBlBmexH0sTPZh4FVCKZ903Co85/anfyFR/Mu'),
(68, 'Voters', '12-995-3004', '$2y$10$UlgNBOD08ydThbCEkKyWIejD4CYXBjSR7VBO7cf8z7ysDXtx9LuAW'),
(69, 'Voters', '12-850-9122', '$2y$10$k3SLDS4EgftakTON.tOQ7OF1a8kAyiDxB8cNHoAK6FxeGmPGJjxmG'),
(70, 'Voters', '12-938-8855', '$2y$10$KUOhPPBEwoYPYT6oIweunOMs3MILIO35pFurDdPII5oaqgAvkfeYi'),
(71, 'Voters', '12-644-8159', '$2y$10$vlZCa5zHsCCbz.zIqb44Hu22G8VNCRC/86eT3IOhxjmqN5HngrxOO'),
(72, 'Voters', '12-755-6694', '$2y$10$550Sg1bdnZt.gh80wQqI2uYlna7dZOe0TtisWC9xQYxUEQbklkc7S'),
(73, 'Voters', '12-920-6782', '$2y$10$DKNftXyrBd/J6Rg00/ce8.bt1dm/sTVe6nhfNuowK4IURZkHmSxmC'),
(74, 'Voters', '12-135-9840', '$2y$10$NqgLexoOatzvsCgMMeE5ceqdDKFChTFfeUpI0ESvfPClJIpcXvEA2'),
(76, 'Voters', '12-991-7059', '$2y$10$0lzTDzBgPkLD4MUMH/o3P.xDCc5VIJ74jcuXYAOE9J102oyPyANS.'),
(77, 'Voters', '12-515-1191', '$2y$10$cknAX17N.GyXQvj0Gf/boOuOmPPBSWEQRKtQHGq51/BIvgKqTd85i');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `position_name` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position_name`, `description`) VALUES
(1, 'Kagawad', 'Dmao ko kwarta'),
(2, 'Brgy. Captain', 's'),
(3, 'Vice President', 'Sadadasssssssssssssadadasssssssssssssadadasssssssssssssadadasssssssssssssadadasssssssssssssadadasssssssssssssadadasssssssssssssadadasssssssssssssadadasssssssssssssadadasssssssssssssadadasssssssssssssadadasssssssssssssadadasssssssssssssadadassssssssssss'),
(7, 'President', 'ORA ORA ORA ORA ORA D4CCCCCC'),
(8, 'Treasurer', 'Damodamo kwarta kung sino makapot ah');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `UserID` varchar(15) NOT NULL,
  `Precinct` varchar(15) NOT NULL,
  `Firstname` varchar(25) NOT NULL,
  `Lastname` varchar(25) NOT NULL,
  `Profile_pic` varchar(30) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `acc_stat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `UserID`, `Precinct`, `Firstname`, `Lastname`, `Profile_pic`, `Status`, `acc_stat`) VALUES
(1, '12-508-7238', '2323G', 'Jhunrhick', 'Tarre', 'profile_blank.jpg', 'Valid', 'New'),
(2, '12-599-3456', '6784D', 'Jhunrhick', 'Tarre', '', 'Valid', 'New'),
(3, '12-256-4919', '2323G', 'Ray', 'Tarre', 'profile-voter-12-284-2348.jpg', 'Valid', 'New'),
(4, '12-498-7509', '4563F', 'Shenshen', 'Tarre', 'profile-voter-12-284-2348.jpg', 'Valid', 'New'),
(5, '12-284-2348', '6784D', 'Shenshen', 'Tarre', 'profile-voter-12-284-2348.jpg', 'Valid', 'New'),
(7, '12-366-3126', '6784D', 'Ranran', 'Tarre ', 'profile-voter-12-284-2348.jpg', 'Valid', 'New'),
(31, '12-963-2695', '6784D', 'dummy2', 'dummy3', 'profile-voter-12-963-2695.png', 'Valid', 'New'),
(32, '12-837-1841', '4563F', 'Nathaniel', 'Angelo', 'profile-voter-12-837-1841.png', 'Valid', 'New'),
(36, '12-986-2506', '4563F', '13123', '1232133', 'profile_blank.jpg', 'Pending', 'New'),
(37, '12-205-2106', '2323G', '123123123', '123123123', 'profile_blank.jpg', 'Pending', 'New'),
(38, '12-219-1271', '6784D', '123123', '123123', 'profile_blank.jpg', 'Pending', 'New'),
(39, '12-917-4043', '4563F', 'Jhunrhick', 'Tarre', 'profile-voter-12-917-4043.png', 'Valid', 'New'),
(40, '12-608-7697', '2323G', 'John', 'Titor', 'profile_blank.jpg', 'Pending', 'New'),
(42, '12-275-9795', '6784D', 'Diosa', 'Tarre', 'profile_blank.jpg', 'Pending', 'New'),
(43, '12-617-3127', '4563F', 'Ranzelle', 'Tarre', 'profile_blank.jpg', 'Pending', 'New'),
(46, '12-789-5701', '6784D', 'Nathaniel Angelo', 'Gentugao', 'profile-voter-12-789-5701.jpg', 'Valid', 'New'),
(47, '12-694-7314', '4563F', 'Jhunrhick', 'Tarre', 'profile_blank.jpg', 'Pending', 'New'),
(48, '12-299-1334', '4563F', 'Json', 'Json ', 'profile_blank.jpg', 'Pending', 'New'),
(49, '12-769-2506', '6784D', 'json again', 'json', 'profile_blank.jpg', 'Pending', 'New'),
(50, '12-921-2011', '6784D', 'json last na gid', 'asdas', 'profile_blank.jpg', 'Pending', 'New'),
(51, '12-653-9615', '2323G', 'aaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaa', 'profile_blank.jpg', 'Pending', 'New'),
(52, '12-669-9983', '4563F', 'bbbbbbbbbbbbbbbbbb', 'bbbbbbbbbbbbbbbb', 'profile_blank.jpg', 'Pending', 'New'),
(53, '12-634-7212', '4563F', 'Nathaniel', 'Gentugao', 'profile-voter-12-634-7212.jpg', 'Valid', 'New'),
(54, '12-685-2830', '4563F', 'asdasd', 'asdasda', 'profile_blank.jpg', 'Pending', 'New'),
(55, '12-306-2492', '6784D', 'hhhhhhhhhhhhhhhhhhhhhhhhh', 'hhhhhhhhhhhhhhhhhhhhhhhhh', 'profile_blank.jpg', 'Invalid', 'New'),
(56, '12-542-8448', '2323G', '1111111111111111111111111', '1111111111111111111111111', 'profile_blank.jpg', 'Valid', 'New'),
(57, '12-619-6121', '2323G', 'qweqweqeqeqweq', 'ewqeqweqweqweqw', 'profile_blank.jpg', 'Invalid', 'New'),
(58, '12-287-4996', '2323G', 'tatatatatttta', 'tastataatata', 'profile_blank.jpg', 'Valid', 'New'),
(59, '12-229-5306', '2323G', 'Jolipas', 'Jolipas', 'profile_blank.jpg', 'Invalid', 'New'),
(60, '12-897-5439', '2323G', 'sdfghjsdfghj', 'sdfghjkdfgh', 'profile_blank.jpg', 'Valid', 'New'),
(61, '12-511-7319', '2323G', 'Nathaniel Angelo', 'Gentugao', 'profile_blank.jpg', 'Valid', 'New'),
(62, '12-395-7594', '2323G', 'Gella', 'Francisco', 'profile_blank.jpg', 'Valid', 'New'),
(63, '12-349-6917', '4563F', 'Trixie Joy', 'Divinagracia', 'profile-voter-12-349-6917.jpg', 'Valid', 'New'),
(64, '12-125-8252', '4563F', 'No more', 'Reload', 'profile_blank.jpg', 'Valid', 'New'),
(65, '12-138-8820', '4563F', 'Tarre', 'Tarre', 'profile_blank.jpg', 'Valid', 'New'),
(66, '12-890-6068', '4563F', 'Jotaro', 'Cujoh', 'profile_blank.jpg', 'Pending', 'New'),
(67, '12-995-3004', '6784D', 'Kuya', 'Cakes', 'profile_blank.jpg', 'Pending', 'New'),
(68, '12-850-9122', '6784D', 'Jotaro', 'Cujoh', 'profile_blank.jpg', 'Valid', 'New'),
(69, '12-938-8855', '4563F', 'Kuya', 'Cakes', 'profile_blank.jpg', 'Invalid', 'New'),
(70, '12-644-8159', '2323G', 'Kuya', 'Cakes', 'profile_blank.jpg', 'Pending', 'New'),
(71, '12-755-6694', '4563F', 'Kuya', 'Cakes', 'profile_blank.jpg', 'Invalid', 'New'),
(72, '12-920-6782', '2323G', '21345', '2134', 'profile_blank.jpg', 'Invalid', 'New'),
(73, '12-135-9840', '6784D', 'John Titor', 'Tarre', 'profile_blank.jpg', 'Invalid', 'New'),
(75, '12-991-7059', '6784D', 'Voter', 'Voter', 'profile_blank.jpg', 'Valid', 'New'),
(76, '12-515-1191', '2323G', 'Shane', 'Andrew', 'profile-voter-12-515-1191.jpg', 'Valid', 'New');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2019-10-21 13:37:09', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `votesystem`
--
CREATE DATABASE IF NOT EXISTS `votesystem` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `votesystem`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'crce', '$2y$10$kLqXG4BAJrPbsOjJ/.B4eeZn6oojNhAb8l5/cb9eZvFnYU.pz2qni', 'CRCE', 'Admin', 'WhatsApp Image 2021-05-27 at 17.55.34.jpeg', '2018-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `platform` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `position_id`, `firstname`, `lastname`, `photo`, `platform`) VALUES
(18, 8, 'Jhunrhick', 'Tarre', '', 'damo ko kwarta'),
(19, 8, 'shenshen', 'Tarre', '', 'damo ko tae\r\n'),
(20, 8, 'rr', 'tarre', '', 'damodamo ko protein powder');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `max_vote` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `description`, `max_vote`, `priority`) VALUES
(8, 'Baranggay capitan', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `voters_id` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `voters_id`, `password`, `firstname`, `lastname`, `photo`) VALUES
(2, 'MnvpykLV4DgqJhO', '$2y$10$lgLQN8TWRbvJ2bJ1Oyyk9.amu0hLy980U6fdgtT1QSt.Xbdj51Ele', 'Jhunrhick', 'Tarre', ''),
(3, '4l1xYnbIUKFOXHy', '$2y$10$mC.kkOL3UfJoDMkA8Sl.Ae0E1fzBNtIrD7axIuxRpMZPIEfHMAdae', 'Shenshen', 'Tarre', ''),
(4, 'vtqXTulpxbGIYMc', '$2y$10$lZEon9UOlCFJy7GodatZT.OsP4uhuSre6dzRml6S1lBEdPAsDYLmC', 'RR', 'Tarre', '');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `voters_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `voters_id`, `candidate_id`, `position_id`) VALUES
(81, 2, 18, 8),
(82, 3, 18, 8),
(83, 4, 18, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
