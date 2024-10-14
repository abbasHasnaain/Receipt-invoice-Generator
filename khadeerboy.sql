-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 07:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khadeerboy`
--

-- --------------------------------------------------------

--
-- Table structure for table `logindata`
--

CREATE TABLE `logindata` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logindata`
--

INSERT INTO `logindata` (`admin_id`, `username`, `password_hash`, `last_login`) VALUES
(1, 'admin', '$2y$10$PW/Td.0XWnVkWLhHGAn8i.HjJRR3cfm0BuPjZgCCppT5N3LkD58SS', '2024-01-30 16:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `new_sales_tax_invoice`
--

CREATE TABLE `new_sales_tax_invoice` (
  `our_ref_no` varchar(255) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `bill_no` int(255) NOT NULL,
  `memo_no` varchar(255) NOT NULL,
  `messrs` varchar(255) NOT NULL,
  `to_expense_incurred_on` varchar(255) NOT NULL,
  `ss` varchar(255) NOT NULL,
  `is_value` varchar(255) NOT NULL,
  `cash_b_no` varchar(255) NOT NULL,
  `from_user` varchar(255) NOT NULL,
  `percentage` int(255) NOT NULL,
  `dated` date NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `value_rs` varchar(255) NOT NULL,
  `index_no` varchar(255) NOT NULL,
  `igm_no` varchar(255) NOT NULL,
  `Di` varchar(255) NOT NULL,
  `import_duty` int(255) NOT NULL,
  `s_tax` int(255) NOT NULL,
  `income_tax` int(255) NOT NULL,
  `cartage` int(255) NOT NULL,
  `loading_unloading_charges` int(255) NOT NULL,
  `exam_openingweighing_charge` int(255) NOT NULL,
  `weight_charges` int(255) NOT NULL,
  `other_expenses` int(255) NOT NULL,
  `pct_no` varchar(255) NOT NULL,
  `lc_no` varchar(255) NOT NULL,
  `rupees_in_words` varchar(255) NOT NULL,
  `acd_rs` int(255) NOT NULL,
  `gst_rs` int(255) NOT NULL,
  `appg_openingweighing_charges` int(255) NOT NULL,
  `certificate_issue_exp` varchar(255) NOT NULL,
  `custom_gd_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_sales_tax_invoice`
--

INSERT INTO `new_sales_tax_invoice` (`our_ref_no`, `invoice_no`, `bill_no`, `memo_no`, `messrs`, `to_expense_incurred_on`, `ss`, `is_value`, `cash_b_no`, `from_user`, `percentage`, `dated`, `date`, `description`, `value_rs`, `index_no`, `igm_no`, `Di`, `import_duty`, `s_tax`, `income_tax`, `cartage`, `loading_unloading_charges`, `exam_openingweighing_charge`, `weight_charges`, `other_expenses`, `pct_no`, `lc_no`, `rupees_in_words`, `acd_rs`, `gst_rs`, `appg_openingweighing_charges`, `certificate_issue_exp`, `custom_gd_token`) VALUES
('A2', 'AS3213', 5, 'DS3EQ', 'HADHABDAFG FSAFAF', 'AFDASFVAS5435', 'SFGSD', 'SGDSS09SDGSKNGNJHHSDFGSA', 'DSGDSGDSBSGG', 'HATIM', 45, '2024-09-04', '2024-09-09', 'DSFAA SADHAB DHF HCGHSGDFYABFAHG', 'DFGSS', 'GDSGS', 'GSDFGSDGSD', 'SGGS', 776, 6765, 456, 464, 464, 46, 4646, 464, '46HFH', 'FGHD64', 'HOHOOHOHOOH', 2342, 3232, 32421, 'DSFSFS54', 'SRWWSDFS');

-- --------------------------------------------------------

--
-- Table structure for table `sales_tax_invoice`
--

CREATE TABLE `sales_tax_invoice` (
  `bill_no` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `ref_no` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `gst_no` varchar(255) DEFAULT NULL,
  `ss` varchar(255) DEFAULT NULL,
  `ss_from` varchar(255) DEFAULT NULL,
  `description_of_goods` varchar(255) DEFAULT NULL,
  `bl_no` varchar(255) DEFAULT NULL,
  `invoice_no` int(11) DEFAULT NULL,
  `igm_no` varchar(255) DEFAULT NULL,
  `igm_date` date DEFAULT NULL,
  `index_no` int(11) DEFAULT NULL,
  `index_date` date DEFAULT NULL,
  `bill_of_entry_no` varchar(255) DEFAULT NULL,
  `bill_of_entry_date` date DEFAULT NULL,
  `no_of_packages` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `marks_as_per_be` int(11) DEFAULT NULL,
  `service_charges` decimal(10,2) DEFAULT NULL,
  `gst_tax` decimal(10,2) DEFAULT NULL,
  `rupees_in_text` varchar(255) DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `messrs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_tax_invoice`
--

INSERT INTO `sales_tax_invoice` (`bill_no`, `date`, `ref_no`, `company_name`, `gst_no`, `ss`, `ss_from`, `description_of_goods`, `bl_no`, `invoice_no`, `igm_no`, `igm_date`, `index_no`, `index_date`, `bill_of_entry_no`, `bill_of_entry_date`, `no_of_packages`, `weight`, `marks_as_per_be`, `service_charges`, `gst_tax`, `rupees_in_text`, `grand_total`, `messrs`) VALUES
(2, '2024-02-01', 'REF456', 'XYZ Corporation', 'GST789012', 'SS456', 'Another Location', 'Test Items', 'BL456', 789, 'IGM456', '2024-02-01', 1011, '2024-02-02', 'BENo456', '2024-02-03', 10, 200, 0, '750.00', '75.00', 'Seven Hundred Fifty Rupees Only', '825.00', ''),
(4, '2024-02-15', 'REF101', 'PQR Enterprises', 'GST910111', 'SS101', 'New Location', 'New Goods', 'BL101', 1617, 'IGM101', '2024-02-15', 1819, '2024-02-16', 'BENo101', '2024-02-17', 20, 300, 0, '900.00', '90.00', 'Nine Hundred Rupees Only', '990.00', ''),
(6, '2024-02-25', 'REF141', 'UVW Limited', 'GST141516', 'SS141', 'Modern Location', 'Modern Goods', 'BL141', 2425, 'IGM141', '2024-02-25', 2627, '2024-02-26', 'BENo141', '2024-02-27', 30, 400, 0, '1100.00', '110.00', 'Eleven Hundred Rupees Only', '1210.00', ''),
(8, '2024-03-05', 'REF181', 'QRS Enterprises', 'GST181920', 'SS181', 'Innovative Location', 'Innovative Goods', 'BL181', 3233, 'IGM181', '2024-03-05', 3435, '2024-03-06', 'BENo181', '2024-03-07', 40, 500, 0, '1300.00', '130.00', 'Thirteen Hundred Rupees Only', '1430.00', ''),
(9, '2024-03-10', 'REF202', 'NOP Corporation', 'GST202122', 'SS202', 'Future Location', 'Future Goods', 'BL202', 3637, 'IGM202', '2024-03-10', 3839, '2024-03-11', 'BENo202', '2024-03-12', 45, 550, 0, '1400.00', '140.00', 'Fourteen Hundred Rupees Only', '1540.00', ''),
(10, '2024-03-15', 'REF222', 'RST Limited', 'GST222324', 'SS222', 'Revolutionary Location', 'Revolutionary Items', 'BL222', 4041, 'IGM222', '2024-03-15', 4243, '2024-03-16', 'BENo222', '2024-03-17', 50, 600, 0, '1500.00', '150.00', 'Fifteen Hundred Rupees Only', '1650.00', ''),
(11, '0023-12-31', '123123', 'asdasd', '3123123', '312312', '3123', '3dasdassda', '312312', 12312, '312213', '0000-00-00', 2312312, '0000-00-00', '212312', '1312-12-31', 2312, 312312, 23, '213123.00', '12312.00', 'asdasdasdsaas', '123231.00', 'asdass'),
(14, '2024-02-15', '1212121', 'PQR Enterprises', 'GST910111', 'SS101', 'New Location', 'New Goods', 'BL101', 1617, 'IGM101', '2024-02-15', 1819, '2024-02-16', 'BENo101', '2024-02-17', 20, 300, 0, '900.00', '90.00', 'Nine Hundred Rupees Only', '990.00', 's');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logindata`
--
ALTER TABLE `logindata`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `unique_username` (`username`);

--
-- Indexes for table `new_sales_tax_invoice`
--
ALTER TABLE `new_sales_tax_invoice`
  ADD PRIMARY KEY (`bill_no`);

--
-- Indexes for table `sales_tax_invoice`
--
ALTER TABLE `sales_tax_invoice`
  ADD PRIMARY KEY (`bill_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logindata`
--
ALTER TABLE `logindata`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `new_sales_tax_invoice`
--
ALTER TABLE `new_sales_tax_invoice`
  MODIFY `bill_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales_tax_invoice`
--
ALTER TABLE `sales_tax_invoice`
  MODIFY `bill_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
