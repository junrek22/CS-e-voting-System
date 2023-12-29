-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 06:12 PM
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
-- Database: `evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `Banner_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`Banner_title`) VALUES
('ELECTION 2024');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `candidate_id` varchar(20) NOT NULL,
  `profile_pic` varchar(40) NOT NULL,
  `candidate_first_name` varchar(20) NOT NULL,
  `candidate_last_name` varchar(20) NOT NULL,
  `candidate_nickname` varchar(20) NOT NULL,
  `Position` varchar(20) NOT NULL,
  `Platform` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `candidate_id`, `profile_pic`, `candidate_first_name`, `candidate_last_name`, `candidate_nickname`, `Position`, `Platform`) VALUES
(10, 'candidate-823-7796', 'profile-candidate-1352-3872.jpg', 'Jhunrhick', 'Tarre', 'Admin', 'Kagawad', 'Zcvbnm'),
(11, 'candidate-801-4185', 'profile_blank.jpg', 'Jhon', 'Jhon', 'Olvido', 'Kagawad', 'Xzcvbnm'),
(12, 'candidate-126-2464', 'profile_blank.jpg', 'Cfvgbfn', 'Xcvb', 'Cvbn', 'Brgy. Captain', 'Fdghj'),
(13, 'candidate-488-5335', 'profile_blank.jpg', 'Xzcvb', 'Sdfghjk', 'Sss', 'Vice President', 'Sdxfcgvhjk'),
(15, 'candidate-930-1889', 'profile_blank.jpg', 'Rivvy', 'My love', 'Admin', 'Vice President', 'Zsdfghnjmk.'),
(16, 'candidate-944-3325', 'profile_blank.jpg', 'Fgdfhjk', 'Zsxdcvfbg', 'Admin', 'Brgy. Captain', 'Dsfghkisfdjfjfjjfjjfjjfjfjjfjfjfjjfjjdfdjjdfdjdfdjjjffjjfffjjjffjjjjffjjfjfjjjfjjfjfjfjfjfjfjfjjffjfjjfjfjfjjffjfjfjfjfjfjfjfjfjjfjjffjjfjfjfjjfjfjfjjfjjffjjfjfjfjjfjfjjfjjjjfjfjfjjfjfffjfffjjffffjjff'),
(19, 'candidate-123-2571', 'profile_blank.jpg', 'Rivvy', 'Tarre', 'Dose', 'Treasurer', 'MARAMING PLATAPORMA');

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
(1, 'Admin', 'admin', '$2y$10$Os99smMYfFYbYFCJg/h7tORAZd8Ql.X2YrGJ47bMINVOthiz6nJm2'),
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
(77, 'Voters', '12-515-1191', '$2y$10$cknAX17N.GyXQvj0Gf/boOuOmPPBSWEQRKtQHGq51/BIvgKqTd85i'),
(78, 'Voters', '12-213-4547', '$2y$10$afy2t.Lr9ww7wdjIpbLhTeZjmIpmmwgvXklQLRpC4eBHH4sg41uz6'),
(80, 'Voters', '12-863-4624', '$2y$10$TiMd5gZYl0xE9DxbN0X6WOswKni9yUTyhZ2RtRte4qIlpJPUZ37za'),
(81, 'Voters', '12-296-6049', '$2y$10$4Owgk/N/./QN4VUNHAAiX.tdThCIbK40FH.UCjHjEjuK28Hvlnob.'),
(82, 'Voters', '12-372-3491', '$2y$10$wuvWQOC/jHUwmdlhhVXdtuO/xtznvsiGdbH7jWyhQV4d3mka60VGS'),
(83, 'Voters', '12-300-3661', '$2y$10$p.fRaXSdPhZdPg0cPN/uhey0BPPSVWBzlh4ZUdXgk34DgzEibj68e'),
(84, 'Voters', '12-485-6208', '$2y$10$8LWOmZFCKwHx2MluLRGd7e5HnUI5PTYhPge8YP0mEM9w3wABoDqke'),
(86, 'Voters', '12-426-4865', '$2y$10$FH4VxDiDlrOmBAVUKg2aTuiw0FpURM/cH/iAucdZVuu2BEe9C2r4a'),
(87, 'Voters', '12-435-9191', '$2y$10$GrmBzJOU5EK2DM1ehToVmepsyjFaGsM2sMupGljWxkNUdNxMm3Le6'),
(88, 'Voters', '12-965-1263', '$2y$10$4BCdgx.G3O.8qUDaPeFTyOL1aayvXIbJt24bRsjI9CSutUAT4GqVi'),
(89, 'Voters', '12-521-4105', '$2y$10$XtdlpJiHlGADIq.uI6Bj1OLMUEJaHkTam.IdnSsMv/vBoZpGnkaOu'),
(90, 'Voters', '12-235-3130', '$2y$10$ektq6KpsRWkVIS0gQt6j3.wwAcEOpDIIjfsL2j6XVYBvQ0/GeFzSe'),
(91, 'Voters', '12-138-1615', '$2y$10$R/G.tESCWaeBzgO0evpOmO35VaIpbiyvAut241XQ8AD1uUqIMC5j.'),
(92, 'Voters', '12-229-2652', '$2y$10$SKTcj2pf0UjeZ2B2C/Dvj.cx8JgdmhXiqm2dqScjCdblHwowaqfL6'),
(93, 'Voters', '12-301-5290', '$2y$10$6h03aodyfcslEY06JpUZbOBt5XLYm0h1jtDHZf86MNRtwLzusuCC6'),
(94, 'Voters', '12-958-3985', '$2y$10$SDEdgu4Do3pU./1aJ2Wb7u3CxBH5d5GVMZnJBU1ty5nxqLLqA7EV6'),
(95, 'Voters', '12-581-1504', '$2y$10$cSwMOqeWvN5CtKy5sM0/S.RGP3Z.JwfkVNduheFMhjZiZgL310ZtG'),
(96, 'Voters', '12-244-5762', '$2y$10$dJUtEfa82qSNkWooOu.TN.o8fatH7vrDAmR7AwTOf8QfMrO3.uhIq'),
(97, 'Voters', '12-888-7747', '$2y$10$lwzvx9JfWMWHCoKfQkOrUezQvQ5Tv.7Q4WwcOhTbi80lKy4YDFhxG'),
(100, 'Voters', '12-954-4796', '$2y$10$obeHQXoSq49D3M74.z42LeWN.zW5/d/1FAdgmWLVcbqvHQLIgRyVu'),
(101, 'Voters', '12-924-2772', '$2y$10$hjUhmHz7rt/61qm/VSZcgukv2qgT2wj6RKWX5X3NHm0e8Vd0Phh66'),
(102, 'Voters', '12-286-4294', '$2y$10$XroOWe1joTUqdaI9f70KPuT7SHtpBiOnFY81IBkId3Y2Qqy0Yn8kC'),
(104, 'Voters', '12-973-4291', '$2y$10$ki5qqw7oSGPfS8uVDTUNruHDKXs7QHPvi6uWM1X8o95kaI/iyC5iq'),
(105, 'Voters', '12-926-4495', '$2y$10$2Tj5D2CaKiOs0Zw9xOP9c.DZ9L/2vwZYbH4/MvSBHxXC5cvAxcmkW');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `position_name` varchar(25) NOT NULL,
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
(8, 'Treasurer', 'Damodamo kwarta kung sino makapot ah'),
(9, 'Admin', 'Cgffgh'),
(11, 'Adsadad', 'Xsdfghjkl;sdasdoasdoasidoasidpoaidodiapodiapodiapodiaopdiaspodiapsidapoidpaoidpasoidapoidaosidpasidpaidpoasidoasidpoasidpasidpaisdpoaidpiadpoasidpoasidpoasidpoaidpoaispdoiaspdiaspodiaspodiaspodiapsodipasidpasidpsaidosaidpoasidpaisdiadpoasidpoasidpaoisdopasidpoasidpoasidpoiaspdoiaspodiaopdiaspoda'),
(12, 'Congressman', 'Daw sya ni bala ang pitawowwwffjf');

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
  `acc_stat` varchar(10) NOT NULL,
  `vote_stat` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `UserID`, `Precinct`, `Firstname`, `Lastname`, `Profile_pic`, `Status`, `acc_stat`, `vote_stat`) VALUES
(1, '12-508-7238', '2323G', 'Jhunrhick', 'Tarre', 'profile_blank.jpg', 'Valid', 'Old', 'NOTVOTED'),
(2, '12-599-3456', '6784D', 'Jhunrhick', 'Tarre', '', 'Valid', 'Old', 'NOTVOTED'),
(3, '12-256-4919', '2323G', 'Ray', 'Tarre', 'profile-voter-12-284-2348.jpg', 'Valid', 'Old', 'NOTVOTED'),
(4, '12-498-7509', '4563F', 'Shenshen', 'Tarre', 'profile-voter-12-284-2348.jpg', 'Valid', 'Old', 'NOTVOTED'),
(5, '12-284-2348', '6784D', 'Shenshen', 'Tarre', 'profile-voter-12-284-2348.jpg', 'Valid', 'Old', 'NOTVOTED'),
(7, '12-366-3126', '6784D', 'Ranran', 'Tarre ', 'profile-voter-12-284-2348.jpg', 'Valid', 'Old', 'NOTVOTED'),
(31, '12-963-2695', '6784D', 'dummy2', 'dummy3', 'profile-voter-12-963-2695.png', 'Valid', 'Old', 'NOTVOTED'),
(32, '12-837-1841', '4563F', 'Nathaniel', 'Angelo', 'profile-voter-12-837-1841.png', 'Valid', 'Old', 'NOTVOTED'),
(36, '12-986-2506', '4563F', '13123', '1232133', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(37, '12-205-2106', '2323G', '123123123', '123123123', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(38, '12-219-1271', '6784D', '123123', '123123', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(39, '12-917-4043', '4563F', 'Jhunrhick', 'Tarre', 'profile-voter-12-917-4043.png', 'Valid', 'Old', 'NOTVOTED'),
(40, '12-608-7697', '2323G', 'John', 'Titor', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(42, '12-275-9795', '6784D', 'Diosa', 'Tarre', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(43, '12-617-3127', '4563F', 'Ranzelle', 'Tarre', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(46, '12-789-5701', '6784D', 'Nathaniel Angelo', 'Gentugao', 'profile-voter-12-789-5701.jpg', 'Valid', 'Old', 'NOTVOTED'),
(47, '12-694-7314', '4563F', 'Jhunrhick', 'Tarre', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(48, '12-299-1334', '4563F', 'Json', 'Json ', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(49, '12-769-2506', '6784D', 'json again', 'json', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(50, '12-921-2011', '6784D', 'json last na gid', 'asdas', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(51, '12-653-9615', '2323G', 'aaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaa', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(52, '12-669-9983', '4563F', 'bbbbbbbbbbbbbbbbbb', 'bbbbbbbbbbbbbbbb', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(53, '12-634-7212', '4563F', 'Nathaniel', 'Gentugao', 'profile-voter-12-634-7212.jpg', 'Valid', 'Old', 'NOTVOTED'),
(54, '12-685-2830', '4563F', 'asdasd', 'asdasda', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(55, '12-306-2492', '6784D', 'hhhhhhhhhhhhhhhhhhhhhhhhh', 'hhhhhhhhhhhhhhhhhhhhhhhhh', 'profile_blank.jpg', 'Invalid', 'New', 'NOTVOTED'),
(57, '12-619-6121', '2323G', 'qweqweqeqeqweq', 'ewqeqweqweqweqw', 'profile_blank.jpg', 'Invalid', 'New', 'NOTVOTED'),
(58, '12-287-4996', '2323G', 'tatatatatttta', 'tastataatata', 'profile_blank.jpg', 'Valid', 'Old', 'NOTVOTED'),
(59, '12-229-5306', '2323G', 'Jolipas', 'Jolipas', 'profile_blank.jpg', 'Invalid', 'New', 'NOTVOTED'),
(60, '12-897-5439', '2323G', 'sdfghjsdfghj', 'sdfghjkdfgh', 'profile_blank.jpg', 'Valid', 'Old', 'NOTVOTED'),
(61, '12-511-7319', '2323G', 'Nathaniel Angelo', 'Gentugao', 'profile_blank.jpg', 'Valid', 'Old', 'NOTVOTED'),
(62, '12-395-7594', '2323G', 'Gella', 'Francisco', 'profile_blank.jpg', 'Valid', 'Old', 'NOTVOTED'),
(63, '12-349-6917', '4563F', 'Trixie Joy', 'Divinagracia', 'profile-voter-12-349-6917.jpg', 'Valid', 'Old', 'NOTVOTED'),
(64, '12-125-8252', '4563F', 'No more', 'Reload', 'profile_blank.jpg', 'Valid', 'Old', 'NOTVOTED'),
(65, '12-138-8820', '4563F', 'Tarre', 'Tarre', 'profile_blank.jpg', 'Valid', 'Old', 'NOTVOTED'),
(66, '12-890-6068', '4563F', 'Jotaro', 'Cujoh', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(67, '12-995-3004', '6784D', 'Kuya', 'Cakes', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(68, '12-850-9122', '6784D', 'Jotaro', 'Cujoh', 'profile_blank.jpg', 'Valid', 'Old', 'NOTVOTED'),
(69, '12-938-8855', '4563F', 'Kuya', 'Cakes', 'profile_blank.jpg', 'Invalid', 'New', 'NOTVOTED'),
(70, '12-644-8159', '2323G', 'Kuya', 'Cakes', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(71, '12-755-6694', '4563F', 'Kuya', 'Cakes', 'profile_blank.jpg', 'Invalid', 'New', 'NOTVOTED'),
(72, '12-920-6782', '2323G', '21345', '2134', 'profile_blank.jpg', 'Invalid', 'New', 'NOTVOTED'),
(73, '12-135-9840', '6784D', 'John Titor', 'Tarre', 'profile_blank.jpg', 'Invalid', 'New', 'NOTVOTED'),
(75, '12-991-7059', '6784D', 'Voter', 'Voter', 'profile_blank.jpg', 'Valid', 'Old', 'NOTVOTED'),
(76, '12-515-1191', '2323G', 'Shane', 'Andrew', 'profile-voter-12-515-1191.jpg', 'Valid', 'Old', 'NOTVOTED'),
(77, '12-213-4547', '2323G', 'Jhonsss', 'Jhon', 'profile_blank.jpg', 'Valid', 'Old', 'NOTVOTED'),
(79, '12-863-4624', '2323G', 'Pa himo ko account', 'account', 'profile_blank.jpg', 'Valid', 'Old', 'NOTVOTED'),
(80, '12-296-6049', '6784D', 'Rivvy', 'Tarre', 'profile_blank.jpg', 'Valid', 'Old', 'NOTVOTED'),
(81, '12-372-3491', '4563F', 'Ray', 'Tarre', 'profile_blank.jpg', 'Valid', 'Old', 'NOTVOTED'),
(82, '12-300-3661', '4563F', 'jhon', 'jhon', 'profile_blank.jpg', 'Invalid', 'New', 'NOTVOTED'),
(83, '12-485-6208', '4563F', 'Voter2', 'Voter2', 'profile_blank.jpg', 'Valid', 'Old', 'NOTVOTED'),
(85, '12-426-4865', '2323G', 'Mghg', 'Hggf', 'profile_blank.jpg', 'Valid', 'Old', 'NOTVOTED'),
(86, '12-435-9191', '6784D', 'dcfghj', 'sdxfghjkio', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(87, '12-965-1263', '4563F', 'dfgtyuj', 'dfghju', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(88, '12-521-4105', '4563F', 'sadasd', 'assadasdas', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(89, '12-235-3130', '4563F', 'mbccghg', 'hgf', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(90, '12-138-1615', '4563F', '23432', '234322', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(91, '12-229-2652', '4563F', 'voter3', 'voter3', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(92, '12-301-5290', '6784D', 'Voter3', 'Voter3', 'profile_blank.jpg', 'Valid', 'Old', 'NOTVOTED'),
(93, '12-958-3985', '4563F', 'sdfghj', 'xdfghj', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(94, '12-581-1504', '2323G', 'NOTVOTED', 'Notvoted', 'profile_blank.jpg', 'Valid', 'Old', 'VOTED'),
(95, '12-244-5762', '6784D', 'gwa', 'gwa', 'profile_blank.jpg', 'Pending', 'New', 'NOTVOTED'),
(96, '12-888-7747', '6784D', 'Sdfghby', 'Xdfg', 'profile_blank.jpg', 'Valid', 'Old', 'VOTED'),
(99, '12-954-4796', '2323G', 'Dfghn', 'Dfghj', 'profile_blank.jpg', 'Valid', 'Old', 'VOTED'),
(100, '12-924-2772', '4563F', '123123', '123123', 'profile_blank.jpg', 'Valid', 'Old', 'VOTED'),
(101, '12-286-4294', '4563F', 'Tarres', 'Fgthyjuyk', 'profile-voter-12-286-4294.jpg', 'Valid', 'Old', 'VOTED'),
(103, '12-973-4291', '2323G', 'Tarre', '123123', 'profile-voter-12-973-4291.jpg', 'Valid', 'Old', 'NOTVOTED'),
(104, '12-926-4495', '6784D', 'sawerftgyhu', 'sdfghyju', 'profile_blank.jpg', 'Valid', 'Old', 'NOTVOTED');

-- --------------------------------------------------------

--
-- Table structure for table `voters_ballot`
--

CREATE TABLE `voters_ballot` (
  `id` int(11) NOT NULL,
  `user_voter` varchar(15) NOT NULL,
  `candidate_id` varchar(20) NOT NULL,
  `position` varchar(25) NOT NULL,
  `platform` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voters_ballot`
--

INSERT INTO `voters_ballot` (`id`, `user_voter`, `candidate_id`, `position`, `platform`) VALUES
(1, '12-888-7747', 'candidate-823-7796', 'Kagawad', 'Zcvbnm'),
(2, '12-888-7747', 'candidate-126-2464', 'Brgy. Captain', 'Fdghj'),
(3, '12-888-7747', 'candidate-488-5335', 'Vice President', 'Sdxfcgvhjk'),
(4, '12-581-1504', 'candidate-801-4185', 'Kagawad', 'Xzcvbnm'),
(5, '12-581-1504', 'candidate-944-3325', 'Brgy. Captain', 'Dsfghkisfdjfjfjjfjjfjjfjfjjfjfjfjjfjjdfdjjdfdjdfdjjjffjjfffjjjffjjjjffjjfjfjjjfjjfjfjfjfjfjfjfjjffjfjjfjfjfjjffjfjfjfjfjfjfjfjfjjfjjffjjfjfjfjjfjfjfjjfjjffjjfjfjfjjfjfjjfjjjjfjfjfjjfjfffjfffjjffffjjff'),
(6, '12-581-1504', 'candidate-930-1889', 'Vice President', 'Zsdfghnjmk.'),
(10, '12-954-4796', 'candidate-823-7796', 'Kagawad', 'Zcvbnm'),
(11, '12-954-4796', 'candidate-126-2464', 'Brgy. Captain', 'Fdghj'),
(12, '12-954-4796', 'candidate-930-1889', 'Vice President', 'Zsdfghnjmk.'),
(13, '12-924-2772', 'candidate-823-7796', 'Kagawad', 'Zcvbnm'),
(14, '12-924-2772', 'candidate-944-3325', 'Brgy. Captain', 'Dsfghkisfdjfjfjjfjjfjjfjfjjfjfjfjjfjjdfdjjdfdjdfdjjjffjjfffjjjffjjjjffjjfjfjjjfjjfjfjfjfjfjfjfjjffjfjjfjfjfjjffjfjfjfjfjfjfjfjfjjfjjffjjfjfjfjjfjfjfjjfjjffjjfjfjfjjfjfjjfjjjjfjfjfjjfjfffjfffjjffffjjff'),
(15, '12-924-2772', 'candidate-488-5335', 'Vice President', 'Sdxfcgvhjk'),
(16, '12-286-4294', 'candidate-801-4185', 'Kagawad', 'Xzcvbnm'),
(17, '12-286-4294', 'candidate-126-2464', 'Brgy. Captain', 'Fdghj'),
(18, '12-286-4294', 'candidate-930-1889', 'Vice President', 'Zsdfghnjmk.');

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
-- Indexes for table `voters_ballot`
--
ALTER TABLE `voters_ballot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `voters_ballot`
--
ALTER TABLE `voters_ballot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
