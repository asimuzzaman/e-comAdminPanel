-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `choose your own db name`
--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `priority` int(11) NOT NULL,
  `join_date` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `name`, `password`, `priority`, `join_date`, `email`) VALUES
(1, 'admin', 'Mr. Admin', 'stbu3CrK.J7XE', 1, 1532538767, 'mr.admin@gmail.com'),
(3, 'john', 'John Smith', 'stCCYWl0rdtnM', 2, 1532631344, 'john.smith@example.com'),
(4, 'kamal', 'Mohammad Kamal', 'stCCYWl0rdtnM', 1, 1532631931, 'md.kamal@e.com'),
(5, 'hills', 'Hills Irwin', 'stCR789hAtnHk', 3, 1532875896, 'hills.irwin@gmail.com'),
(6, 'smith', 'Smith Trott', 'st1hU0wqpxq7g', 1, 1532875927, 's.trott@ymail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `delivery_address` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `join_date` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `is_blocked` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `password`, `delivery_address`, `phone`, `join_date`, `email`, `is_blocked`) VALUES
(1, 'Md.', 'Hasan', 'cmV5uNh059zZM', 'Banani, Dhaka - 1213', '0157765684', 1532606518, 'md.hasan@e.com', 0),
(3, 'loren', 'ipsum', 'cmBB64HV./k5M', '876 Sleepy Hollow Drive\r\nBrookline, MA 02446', '012264679898', 1532633101, 'loren.ipsum@d.com', 1),
(4, 'Ochoa', 'Patel', 'cmV5uNh059zZM', '445 Mount Eden Road, Mount Eden, Auckland', '01548746568', 1532876714, 'patel', NULL),
(5, 'Davis ', 'Evans', 'cmV5uNh059zZM', 'Main Highway Otaki; 32 Wilson Street', '+880154886556', 1532876773, 'davis', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fb_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `date` int(11) DEFAULT NULL,
  `reply` text,
  `replied_by` int(11) DEFAULT NULL,
  `is_solved` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fb_id`, `customer_id`, `body`, `date`, `reply`, `replied_by`, `is_solved`) VALUES
(1, 3, 'hi, I am facing problem', 1532690067, NULL, NULL, NULL),
(2, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin laoreet, metus a bibendum posuere, libero urna tristique justo, ac interdum lectus elit in nulla. Nulla erat mi, gravida sit amet fringilla ac, posuere sit amet orci. Quisque lacinia, dolor sollicitudin pharetra efficitur, lorem ante elementum nisl, eget euismod felis lorem sed lorem. Nunc sagittis lobortis lacinia. Cras eleifend consequat arcu, eu venenatis nisl dignissim sit amet. Praesent auctor leo commodo venenatis euismod. Pellentesque luctus imperdiet nisi ac pharetra. Suspendisse a varius nulla, sit amet placerat dolor. Aliquam efficitur magna risus, volutpat elementum odio porta at. In hac habitasse platea dictumst. Mauris et nibh ipsum. ', 1532690124, 'We have successfully solved the problem. Thank you for staying with us.', 1, 1),
(3, 3, 'Aliquam eu condimentum ipsum. Proin at ex nec quam scelerisque rutrum vel sit amet nisl. Nam sollicitudin feugiat turpis, eget rhoncus lacus rhoncus et. Vestibulum varius finibus dapibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed bibendum dolor eleifend, eleifend arcu sed, viverra nunc. Nulla sit amet euismod diam, vitae maximus orci. Sed erat velit, tincidunt ut leo ut, auctor suscipit magna. Nulla odio enim, faucibus eget nunc sed, convallis fermentum urna. ', 1532690134, NULL, NULL, NULL),
(4, 1, 'Unable to log into my account. try to fix the problem.', 1532714331, 'Did you clear your browser cache?', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `vat` decimal(4,2) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `image` varchar(60) DEFAULT NULL,
  `isAvailable` tinyint(1) NOT NULL DEFAULT '1',
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `name`, `price`, `vat`, `admin_id`, `image`, `isAvailable`, `quantity`) VALUES
(1, 'Pencil', '15.00', '5.00', 1, 'pencil.jpg', 1, 100),
(2, 'Paprika', '60.00', '5.00', 1, 'paprika-vegetables-colorful-food-57426.jpeg', 1, 20),
(3, 'Beans', '30.00', '7.50', 1, '174549-131-216C921D.jpg', 0, 500),
(4, 'Cotton Bud', '25.00', '5.50', 1, 'useful_cotton_bud_hacks_to_solv.jpg', 1, 20),
(5, 'Beef', '499.00', '10.00', 1, 'NMEBEWBXX0012.png', 1, 50),
(6, 'Butter', '150.00', '5.65', 1, 'DDABUSAXX0007.png', 0, 30),
(7, 'Zero Cal', '185.00', '3.50', 1, 'GHFDISSXX0041.png', 1, 35),
(8, 'Odonil', '165.00', '7.50', 1, 'HACAFPBXX0004.png', 1, 26),
(9, 'Fortune Rice Brain oil', '185.00', '8.00', 1, 'GCSCOIMSB0013.png', 0, 30),
(10, 'Dabur honey', '300.00', '6.50', 1, 'GJSHOIMXX0001.png', 1, 80),
(11, 'Salted peanuts', '400.00', '6.00', 1, 'GSCSNBRNU0001.png', 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `pur_id` int(11) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`pur_id`, `receipt_id`, `pro_id`, `quantity`) VALUES
(1, 1, 5, 30),
(2, 1, 11, 50),
(3, 1, 1, 20),
(4, 2, 10, 15),
(5, 2, 3, 25),
(6, 3, 4, 13),
(7, 4, 6, 22),
(8, 5, 9, 5),
(9, 6, 7, 2),
(10, 7, 10, 3),
(11, 8, 2, 5),
(12, 9, 1, 1),
(13, 5, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT 'Whether it is delivered, ordered etc'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`receipt_id`, `date`, `customer_id`, `status`) VALUES
(1, 1533720045, 3, 2),
(2, 1533720117, 1, 1),
(3, 1533720158, 5, 0),
(4, 1533720194, 4, 2),
(5, 1533720531, 4, 1),
(6, 1533720934, 1, 0),
(7, 1533720958, 3, 1),
(8, 1533720990, 5, 0),
(9, 1533759614, 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`pur_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `pur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

