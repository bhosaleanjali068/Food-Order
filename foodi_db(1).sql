-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2019 at 07:00 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(200) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `USERNAME`, `PASSWORD`) VALUES
(1, 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `C_ID` int(11) NOT NULL,
  `City_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`C_ID`, `City_Name`) VALUES
(1, 'Thane'),
(2, 'Pune'),
(3, 'Mumbai Suburban'),
(4, 'Nashik'),
(5, 'Nagpur'),
(6, 'Ahmadnagar'),
(7, 'Solapur'),
(8, 'Jalgaon'),
(9, 'Kolhapur'),
(10, 'Aurangabad'),
(11, 'Nanded'),
(12, 'Mumbai City'),
(13, 'Satara'),
(14, 'Amravati'),
(15, 'Sangli'),
(16, 'Yavatmal'),
(17, 'Raigarh'),
(18, 'Buldana'),
(19, 'Beed'),
(20, 'Latur'),
(21, 'Chandrapur'),
(22, 'Dhule'),
(23, 'Jalna'),
(24, 'Parbhani'),
(25, 'Akola'),
(26, 'Osmanabad'),
(27, 'Nandurbar'),
(28, 'Ratnagiri'),
(29, 'Gondiya'),
(30, 'Wardha'),
(31, 'Bhandara'),
(32, 'Washim'),
(33, 'Hingoli'),
(34, 'Gadchiroli'),
(35, 'Sindhudurg'),
(323, 'Bandra(Mumbai Subur)'),
(330, 'Sholapur'),
(334, 'Buldhana'),
(336, 'Kolhpur'),
(338, 'Raigad'),
(342, 'Ahmednagar');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` int(11) NOT NULL,
  `post` bigint(22) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(100) NOT NULL,
  `adhar_num` bigint(22) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `mobile_num` int(11) NOT NULL,
  `salary` bigint(20) NOT NULL,
  `joining_date` date NOT NULL,
  `HOTEL_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `ID` bigint(20) NOT NULL,
  `TYPE_NAME` bigint(20) NOT NULL,
  `FOOD_NAME` varchar(200) NOT NULL,
  `PRICE` bigint(20) NOT NULL,
  `IMAGE` varchar(200) NOT NULL,
  `HOTEL_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`ID`, `TYPE_NAME`, `FOOD_NAME`, `PRICE`, `IMAGE`, `HOTEL_ID`) VALUES
(1, 1, 'Purn Poli', 150, 'pic/1_food.png', 1),
(2, 1, 'Zumka Bhakri', 200, 'pic/2_food.png', 1),
(3, 1, 'Thalipeeth', 120, 'pic/3_food.png', 1),
(4, 1, 'Misal Pav', 50, 'pic/4_food.png', 1),
(5, 0, 'Pav Bhaji', 50, 'pic/5_food.png', 1),
(6, 1, 'appe', 60, 'pic/6_food.png', 1),
(7, 1, 'Bhakar wadi', 70, 'pic/7_food.png', 1),
(8, 1, 'Kothimbar vadi', 100, 'pic/8_food.png', 1),
(9, 1, 'Pulav', 80, 'pic/9_food.png', 1),
(11, 4, 'Mooli paratha', 50, 'pic/11_food.png', 1),
(12, 4, 'Daal kachori', 60, 'pic/12_food.png', 1),
(13, 4, 'Lohari', 170, 'pic/13_food.png', 1),
(14, 4, 'Paratha', 80, 'pic/14_food.png', 1),
(15, 4, 'Kadhi pakoda', 200, 'pic/15_food.png', 1),
(20, 5, 'Hakka noodles', 260, 'pic/16_food.png', 1),
(21, 5, 'peanut noodles', 260, 'pic/21_food.png', 1),
(22, 5, 'Manchurian', 200, 'pic/22_food.png', 1),
(23, 7, 'Idli sambar', 100, 'pic/23_food.png', 1),
(24, 7, 'Mong adal vada', 60, 'pic/24_food.png', 1),
(25, 7, 'Uttapa', 80, 'pic/25_food.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `ID` int(11) NOT NULL,
  `hotel_name` varchar(200) NOT NULL,
  `hotel_address` varchar(200) NOT NULL,
  `owner_name` varchar(200) NOT NULL,
  `owner_mobile` bigint(20) NOT NULL,
  `IMAGE` varchar(100) NOT NULL,
  `USERNAME` varchar(200) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `CITY` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`ID`, `hotel_name`, `hotel_address`, `owner_name`, `owner_mobile`, `IMAGE`, `USERNAME`, `PASSWORD`, `CITY`) VALUES
(1, 'Swapnalok', 'Near PVR, \r\nLatur', 'anil shaha', 78998877, 'pic/1_hotel.png', 'Swapnalok', 'Swapnalok', 20),
(2, 'Aroma', 'Shree Nagar, MIDC,Latur', 'Surendra Paul', 8673452389, 'pic/2_hotel.png', 'Aroma', 'Aroma', 20),
(3, 'Embassy', 'Ambejogai Road, Shivaji Chowk, Latur ', 'Kiran Deshmukh', 9567453423, 'pic/3_hotel.png', 'Embassy', 'Embassy', 20),
(4, 'Parth', 'Near cocsit collage,Ambajogai road Latur', 'Dhiraj Tapdiya', 9567566893, 'pic/4_hotel.png', 'Parth', 'Parth', 20),
(5, 'Carnival', 'Ambejogai Road, Ambajogai Road-renapur, Latur', 'Amol Kolte', 770977537, 'pic/5_hotel.png', 'Carnival', 'Carnival', 20),
(6, 'sudarshan', 'Shivaji Chock, Latur', 'vinod Varma', 9064537634, 'pic/6_hotel.png', 'Sudarshan', 'Sudarshan', 20),
(7, 'Vaishnavi', ' Ausa Road, Latur ', 'ganesh Kumar', 9865734567, 'pic/7_hotel.png', 'Vaishnavi', 'Vaishnavi', 20),
(8, 'Kesari', ' Barshi Road, Latur - ', 'sachin sharma', 9274335541, 'pic/8_hotel.png', 'Kesari', 'Kesari', 20),
(9, 'Shantai', 'shivaji Chock,Latur', 'bajaj shivam', 8765349876, 'pic/9_hotel.png', 'Shantai', 'Shantai', 20),
(10, 'VITS', 'Ambajogai Road, Latur', 'baheti ruturaj', 8672349876, 'pic/10_hotel.png', 'VITS', 'VITS', 20),
(11, 'Swaraj', ' Barshi Road, Latur - ', 'Kiran Patil', 8965743478, 'pic/11_hotel.png', 'Swaraj', 'Swaraj', 19),
(12, 'Amar', 'Maharashtra State Highway No 142, Kada, Beed ', 'Yash Garad', 8745985432, 'pic/12_hotel.png', 'Amar', 'Amar', 19),
(13, 'pradip', 'Dhule Solapur Highway NH 52, Chousala, Beed ', 'amar pande', 9049567834, 'pic/13_hotel.png', 'pradip', 'pradip', 19),
(14, 'kanhaiyya', 'Dhule Solapur Highway NH 52, Chousala, Beed ', 'sohail Shaikh', 8766576787, 'pic/14_hotel.png', 'kanhaiyya', 'kanhaiyya', 19),
(15, 'Yasharaj', 'Jalna Road, Beed ', 'aniket yadav', 9049273787, 'pic/15_hotel.png', 'Yashraj', 'Yashraj', 19),
(16, 'Sagar', 'Beed to Jalna Road, Beed ', 'dhiraj  bajaj', 9923687713, 'pic/16_hotel.png', 'Sagar', 'Sagar', 19),
(17, 'Yashawant', 'Marathwadi, Ahmednagar Beed Road, Beed ', 'Suraj Rathod', 8799567845, 'pic/17_hotel.png', 'Yashawant', 'Yashawant', 19),
(18, 'Sangam', 'Sirsala, beed , Ambedkar Chowk', 'Kedar Deshamukha', 8879675645, 'pic/18_hotel.png', 'Sangam', 'Sangam', 19),
(19, 'Santosh', 'Parli Road, Ambajogai, Beed ', 'gorakh Munde', 8965487659, 'pic/19_hotel.png', 'Santosh', 'Santosh', 19),
(20, 'Family Hotel', 'Sirsala Beed', 'govind Nagargoje', 8965435687, 'pic/20_hotel.png', 'Family', 'Family', 19),
(21, 'Angeethi', '6, Jalna Road Aurangabad,', 'Sagar nikam', 8765437654, 'pic/21_hotel.png', 'Angeethi', 'Angeethi', 10),
(22, 'Ujwal', '35, Chelipura, Aurangabad-', 'Anuj Sharma', 8965874356, 'pic/22_hotel.png', 'Ujwal', 'Ujwal', 10),
(23, 'Yuvraj', 'Shekta Road Bidkin, Bidkin, Aurangabad', 'Amol patil', 8976543454, 'pic/23_hotel.png', 'Yuvraj', 'Yuvraj', 10),
(24, 'Amarpreet', 'Pandit Nehru Marg, Jalna Road Aurangabad', 'subhash sonawane', 7517241517, 'pic/24_hotel.png', 'Amarpreet', 'Amarpreet', 10),
(25, 'Rana', 'Railway Station Road, Aurangabad Railway Station, Aurangabad-', 'Nikhil kulkarni', 9309790558, 'pic/25_hotel.png', 'Rana', 'Rana', 10),
(26, 'Holidy Era', '1st Floor, Disha Sagar, Railway Station Road, Railway Station Road, Padampura, Aurangabad', 'wagh krishna', 7057248517, 'pic/26_hotel.png', 'Holidy Era', 'Holidy Era', 10),
(27, 'Naivedya', 'X-31, Bajaj Nagar, Waluj MIDC, Aurangabad-', 'pradeep sharma', 9956473524, 'pic/27_hotel.png', 'Naivedya', 'Naivedya', 10),
(28, 'VITS', 'Vedant Nagar, Station Road, Station Road Aurangabad', 'nikhil pande', 8876564534, 'pic/28_hotel.png', 'VITS', 'VITS', 10),
(29, 'Sagar', 'Waluj MIDC, Aurangabad-', 'Rahul singh', 8867456734, 'pic/29_hotel.png', 'Sagar', 'Sagar', 10),
(30, 'Sai palace', 'Beed Aurangabad Highway Malewadi, Aurangabad', 'krishna nikam', 9936245623, 'pic/30_hotel.png', 'Sai palace', 'Sai palace', 10),
(31, 'The grand mahefil', 'Camp Road, Amravati', 'mukesh Ambani', 9856321473, 'pic/31_hotel.png', 'manish', '1234', 14),
(32, 'Hotel Mehfil Inn', 'Camp, Amravati', 'anil shrama', 9632587410, 'pic/32_hotel.png', 'munna', '1236', 14),
(33, 'Amravti Inn', 'Amaravati, Maltekdi Road, Amravati', 'nilesh bhardawaaj', 9978765437, 'pic/33_hotel.png', 'Amravti inn', 'Amravti inn', 14),
(34, 'Radhay Inn', ' Railway Station to Bus Station Road, Amravati,', 'mulkesh bajaj', 7778911545, 'pic/34_hotel.png', 'Radhay inn', 'Radhay inn', 14),
(35, 'Ramgiri', 'Near Amravati Railway Station, Bus Stand Road, Maltekdi, Amravati, ', 'rahul ojwal', 7789096745, 'pic/35_hotel.png', 'Ramgiri', 'ramgiri', 14),
(36, 'Aman palace', 'Badnera Rd, Vidhya Vihar Colony, Navathe Nagar, Amravti', 'nilesh kukreja', 9046576879, 'pic/36_hotel.png', 'Aman palace', 'Aman palace', 14),
(37, 'Gauri inn', 'NH 6, Rahatgoan New by-pass Nagpur Road, Amravati\r\n', 'ramesh somani', 8765456756, 'pic/37_hotel.png', 'Gauri inn', '', 14),
(38, 'Next Level', 'OPP. TO GRAND MEHFILL, Camp Rd, Amravati', 'krishna badure', 7057248517, 'pic/38_hotel.png', 'Next Level', 'Next Level', 14),
(39, 'Neelam', 'Badnera Road, Near samarth High School, Rajapeth, Amravati', 'aniket pande', 7788956712, 'pic/39_hotel.png', 'Neelam', 'Neelam', 14),
(40, 'Adarsh', 'Choudhari Chowk,Old Cotton Market Road, Old Cotton Market, Amravati', 'nikhil sharma', 9978564534, 'pic/40_hotel.png', 'Adarsh', 'Adarsh', 14),
(41, 'City IIn', 'CITY CENTER, sahakar chowk, Shalimar Chowk, Daund', 'Yogesh Patil', 9834567324, 'pic/41_hotel.png', 'City IIn', 'City Inn', 2),
(42, 'The Pride hotel', '5, University Main Road, Shivaji Nagar, Pune ', 'Kushal Vys', 8654327689, 'pic/42_hotel.png', 'The Pride', 'The Pride', 2),
(43, 'Royal Executive', 'Near Kpc Hospital, Kadar Bhai Chowk, Rasta Peth, Pune ', 'Suyash Yadav', 9867543245, 'pic/43_hotel.png', 'Royal Executive', 'Royal Executive', 2),
(44, 'Shivaji Hotel', '365/11, Main Road, Shivaji Nagar, Pune - ', 'Rohit Sardar', 8976543256, 'pic/44_hotel.png', 'Shivaji Hotel', 'Shivaji Hotel', 2),
(45, 'Sapna ', ' Opposite Shiv Sagar Restaurant, Hotel Sapna Pune,', 'Vivek Rajput', 9567432457, 'pic/45_hotel.png', 'Sapna', 'Sapna', 2),
(46, 'Novetel', 'Survey No 30/3, Weikfield IT City Infopark, Viman Nagar, Pune ', 'Vishal Tiwari', 7709377537, 'pic/46_hotel.png', 'Novetel', 'Novetel', 2),
(47, 'Radha Krishna', 'Datta nagar road, Ambegaon Road, Katraj, Pune ', 'Abhishek Sachan', 9876543245, 'pic/47_hotel.png', 'Radha Krishna', 'Radha Krishna', 2),
(48, 'Radission', 'Nagar Bypass Road, Kharadi, Pune - ', 'Rahul Patil', 8965432678, 'pic/48_hotel.png', 'Radission', 'Radission', 2),
(49, 'Wadeshwar', '1229 Shivajinagar, Fergusson College Road, Pune', 'Sangram Mane', 9876543267, 'pic/49_hotel.png', 'Wadeshwar', 'Wadeshwar', 2),
(50, 'Aryan', 'Talegaon Road, Kharabwadi, Chakan, Pune ', 'Vishal Sawant', 8865436789, 'pic/50_hotel.png', 'Aryan ', 'Aryan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `emp_post` varchar(200) NOT NULL,
  `HOTEL_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `ID` bigint(20) NOT NULL,
  `DATE` date NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `MOBILE` bigint(20) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `TOTAL` bigint(20) NOT NULL,
  `PAID` bigint(20) NOT NULL,
  `REMAINING` bigint(20) NOT NULL,
  `HOTEL_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`ID`, `DATE`, `NAME`, `MOBILE`, `ADDRESS`, `TOTAL`, `PAID`, `REMAINING`, `HOTEL_ID`) VALUES
(1, '2019-03-07', 'sdsdsd', 77878, 'latur', 490, 100, 390, 1),
(2, '2019-03-16', 'aaaaaaaaaaaa', 98989898, 'pune', 790, 700, 90, 1),
(3, '2019-03-14', 'wwwwww', 67676, 'd', 500, 500, 0, 1),
(4, '2019-03-18', 'fffff', 898989, 'pune ', 1940, 1940, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale_item`
--

CREATE TABLE `sale_item` (
  `ID` bigint(20) NOT NULL,
  `FOOD_ID` bigint(20) NOT NULL,
  `PRICE` bigint(20) NOT NULL,
  `QTY` bigint(20) NOT NULL,
  `TOTAL` bigint(20) NOT NULL,
  `SALE_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_item`
--

INSERT INTO `sale_item` (`ID`, `FOOD_ID`, `PRICE`, `QTY`, `TOTAL`, `SALE_ID`) VALUES
(1, 13, 170, 2, 340, 1),
(2, 5, 50, 3, 150, 1),
(3, 13, 170, 3, 510, 2),
(4, 7, 70, 4, 280, 2),
(5, 11, 50, 3, 150, 2),
(6, 7, 70, 5, 350, 3),
(7, 2, 200, 2, 400, 4),
(8, 21, 260, 5, 1300, 4),
(9, 6, 60, 4, 240, 4);

-- --------------------------------------------------------

--
-- Table structure for table `temp_sale_item`
--

CREATE TABLE `temp_sale_item` (
  `ID` bigint(20) NOT NULL,
  `FOOD_ID` bigint(20) NOT NULL,
  `PRICE` bigint(20) NOT NULL,
  `QTY` bigint(20) NOT NULL,
  `TOTAL` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `ID` bigint(20) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `HOTEL_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`ID`, `NAME`, `HOTEL_ID`) VALUES
(1, 'Maharashtriyan', 1),
(4, 'panjabi', 1),
(5, 'chaynij', 1),
(6, 'chaynij', 1),
(7, 'South indian', 1),
(8, '', 1),
(9, '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sale_item`
--
ALTER TABLE `sale_item`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `temp_sale_item`
--
ALTER TABLE `temp_sale_item`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sale_item`
--
ALTER TABLE `sale_item`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `temp_sale_item`
--
ALTER TABLE `temp_sale_item`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
