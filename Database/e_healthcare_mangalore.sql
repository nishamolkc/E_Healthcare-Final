-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2018 at 05:48 AM
-- Server version: 5.7.19-log
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_healthcare_mangalore`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoinment`
--

CREATE TABLE `appoinment` (
  `id` int(150) NOT NULL,
  `patient_master_id` bigint(10) NOT NULL,
  `hospital_id` bigint(15) NOT NULL,
  `doctor_id` bigint(10) NOT NULL,
  `app_date` date NOT NULL,
  `description` varchar(150) NOT NULL,
  `status` int(30) NOT NULL,
  `token` bigint(5) NOT NULL,
  `doctor_time_id` bigint(10) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `card_type` varchar(25) NOT NULL,
  `cvv` int(4) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appoinment`
--

INSERT INTO `appoinment` (`id`, `patient_master_id`, `hospital_id`, `doctor_id`, `app_date`, `description`, `status`, `token`, `doctor_time_id`, `card_number`, `card_type`, `cvv`, `amount`) VALUES
(1, 1, 1, 2, '2016-08-24', 'Head Ache', 0, 1, 5, '', '', 0, 0),
(2, 2, 1, 2, '2016-08-24', 'Head Ache', 1, 2, 5, '', '', 0, 0),
(3, 2, 2, 2, '2016-08-24', 'Surgery', 0, 1, 4, '', '', 0, 0),
(4, 3, 1, 2, '2016-08-31', 'Fever', 0, 1, 5, '', '', 0, 0),
(5, 1, 1, 1, '2016-09-05', 'Head Ache', 1, 1, 1, '', '', 0, 0),
(6, 3, 1, 3, '2016-09-06', 'Head Ache', 0, 1, 1, '', '', 0, 0),
(7, 3, 2, 1, '2016-09-06', 'Head Ache', 0, 1, 1, '', '', 0, 0),
(8, 2, 1, 2, '2016-09-07', 'Chest Pain', 0, 1, 1, '', '', 0, 0),
(9, 2, 1, 2, '2016-09-08', 'Chest Pain', 0, 1, 10, '', '', 0, 0),
(10, 1, 2, 1, '2017-10-07', 'Temperatue', 1, 1, 1, '1234567890123456', 'Debit Card', 123, 200),
(12, 2, 1, 2, '2018-03-22', 'Er455', 0, 2, 10, '1222222', 'Debit Card', 444, 200),
(13, 1, 1, 2, '2018-04-12', 'Sdfgh', 1, 1, 10, '1234567', 'Debit Card', 123, 200);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `doctor_id` bigint(10) NOT NULL,
  `image_path` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `subject`, `doctor_id`, `image_path`, `description`) VALUES
(1, 'Maternity', 1, 'upload/article1.docx', 'hgffh');

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `id` int(150) NOT NULL,
  `blood_group_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`id`, `blood_group_name`) VALUES
(1, 'A+ve'),
(2, 'A-ve'),
(3, 'AB+ve'),
(4, 'AB-ve'),
(5, 'B+ve'),
(6, 'B-ve'),
(7, 'O+ve'),
(8, 'O-ve');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(10) NOT NULL,
  `city_name` varchar(150) NOT NULL,
  `district_id` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`, `district_id`) VALUES
(1, 'Attingal', 1),
(2, 'Kovalam', 1),
(3, 'Chengannur', 4),
(4, 'Haripad', 4),
(5, 'Kochi', 7),
(6, 'Edappally', 7),
(7, 'Mukkam', 11),
(8, 'Kappad', 11);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(150) NOT NULL,
  `department_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`) VALUES
(1, 'GYNECOLOGY'),
(2, 'PEDIATRICS'),
(3, 'DENTISTRY'),
(4, 'PHYSIOTHERAPY'),
(5, 'ONCOLOGY'),
(6, 'ORTHOLOGY'),
(7, 'PSYCHOLOGY'),
(8, 'CARDIOLOGY'),
(9, 'DERMATOLOGY'),
(11, 'NEUROLOGY');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(10) NOT NULL,
  `designation_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation_name`) VALUES
(1, 'PEDIATRICIAN'),
(2, 'GYNECOLOGIST'),
(3, 'DENTIST'),
(4, 'PHYSIOTHERAPIST'),
(5, 'ONCOLOGIST'),
(6, 'ORTHOLOGIST'),
(7, 'DERMATOLOGIST'),
(8, 'CARDIOLOGIST'),
(9, 'NEUROLOGIST'),
(10, 'PSYCHOLOGIST');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(150) NOT NULL,
  `district_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district_name`) VALUES
(1, 'THIRUVANANTHAPURAM'),
(2, 'KOLLAM'),
(3, 'PATHANAMTHITTA'),
(4, 'ALAPPUZHA'),
(5, 'KOTTAYAM'),
(6, 'IDUKKI'),
(7, 'ERNAKULAM'),
(8, 'THRISSUR'),
(9, 'PALAKKAD'),
(10, 'MALAPPURAM'),
(11, 'KOZHIKODE'),
(12, 'WAYANAD'),
(13, 'KANNUR'),
(14, 'KASARAGOD'),
(15, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(150) NOT NULL,
  `doctor_name` varchar(150) NOT NULL,
  `house_name` varchar(150) NOT NULL,
  `city_id` bigint(10) NOT NULL,
  `district_id` bigint(10) NOT NULL,
  `card` varchar(20) NOT NULL,
  `card_no` varchar(20) NOT NULL,
  `mobile_number` varchar(30) NOT NULL,
  `email` varchar(25) NOT NULL,
  `specialization_id` bigint(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `image_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `doctor_name`, `house_name`, `city_id`, `district_id`, `card`, `card_no`, `mobile_number`, `email`, `specialization_id`, `status`, `image_path`) VALUES
(1, 'Dr. Adhithya', 'Karakuttikal', 7, 11, 'Voters ID', '7898585', '8281796341', 'adhithya@gmail.com', 1, 1, 'upload/doctor2.jpg'),
(2, 'Ameer', 'Vellaikal', 4, 4, 'Voters ID', '7777888896', '9874589696', 'ameer@gmail.com', 1, 1, 'upload/doctor3.jpg'),
(3, 'Akash', 'Vandanam', 2, 1, 'Voters ID', '5877996', '8974858574', 'akash@gmail.com', 1, 1, 'upload/doctor4.jpg'),
(4, 'Dr. Manu', 'Puthanpua', 1, 1, 'Voters ID', '6974411aa', '8974859873', 'manu@gmail.com', 1, 1, 'upload/doctor5.png'),
(8, 'Dr.Suhasini', 'Vandanam(H)', 1, 1, 'PAN CARD', '9632587', '8281796341', 'suhasini@gmail.com', 1, 1, 'upload/doctor8.jpg'),
(10, 'Dr. Krishna', 'Nandanam(H)', 4, 4, 'Voters ID', '7898585MI', '8281796341', 'krishna@gmail.com', 1, 0, 'upload/doctor10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_hospital`
--

CREATE TABLE `doctor_hospital` (
  `id` int(10) NOT NULL,
  `doctor_id` bigint(10) NOT NULL,
  `hospital_id` bigint(20) NOT NULL,
  `doctor_time_id` bigint(15) NOT NULL,
  `day_name` varchar(20) NOT NULL,
  `designation_id` bigint(5) NOT NULL,
  `department_id` bigint(5) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_hospital`
--

INSERT INTO `doctor_hospital` (`id`, `doctor_id`, `hospital_id`, `doctor_time_id`, `day_name`, `designation_id`, `department_id`, `status`) VALUES
(1, 1, 2, 1, 'Tue', 1, 2, 1),
(3, 1, 1, 1, 'Mon', 1, 2, 1),
(4, 3, 1, 1, 'Tue', 1, 2, 1),
(5, 2, 1, 1, 'Wed', 8, 8, 1),
(6, 2, 1, 10, 'Thu', 8, 8, 1),
(7, 2, 3, 1, 'Fri', 8, 8, 1),
(8, 2, 4, 11, 'Sat', 8, 8, 1),
(9, 0, 1, 1, '', 1, 1, 0),
(10, 0, 3, 1, 'Fri', 2, 1, 0),
(11, 1, 1, 1, 'Wed', 1, 2, 1),
(12, 1, 2, 4, 'Wed', 1, 2, 1),
(13, 1, 4, 8, 'Wed', 1, 2, 1),
(14, 2, 3, 11, 'Wed', 2, 1, 1),
(15, 1, 2, 1, 'Sat', 1, 2, 1),
(16, 1, 0, 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_time`
--

CREATE TABLE `doctor_time` (
  `id` bigint(10) NOT NULL,
  `timing_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_time`
--

INSERT INTO `doctor_time` (`id`, `timing_name`) VALUES
(1, '07.00AM-10.00AM'),
(2, '09.00AM-12.00PM'),
(3, '11.00AM- 2.00PM'),
(4, '12.00PM-3.00PM'),
(5, '1.00PM-3.00PM'),
(6, '2.00PM -4.00PM'),
(7, '3.00PM -5.00PM'),
(8, '4.00PM-6.00PM'),
(9, '5.00PM-11.00PM'),
(10, '9.00AM-1.00PM'),
(11, '2.00PM -10.00PM'),
(12, '8am to 10pm'),
(13, '2.00PM -10.00PM');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(150) NOT NULL,
  `uploaded_date` date NOT NULL,
  `title` varchar(150) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `description` varchar(150) NOT NULL,
  `investigations` varchar(150) NOT NULL,
  `appoinment_id` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `uploaded_date`, `title`, `file_path`, `description`, `investigations`, `appoinment_id`) VALUES
(1, '2016-08-17', 'Scan Report', 'file.docx', 'Head Ache', 'Nothing', 1),
(2, '2016-09-06', 'Aaa', 'file1.pdf', 'Aaa', 'Aaaaaaaaaaaaa', 5),
(3, '2016-09-06', 'Vvvvv', 'file2.pdf', 'Aaa', 'Nothing Special', 5),
(4, '2016-09-06', 'Qqq', 'file3.pdf', 'Qqqqqqqq', 'Qqqqqqqq', 5);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` bigint(20) NOT NULL,
  `doctor_id` bigint(20) NOT NULL,
  `hospital_name` varchar(50) NOT NULL,
  `location` varchar(30) NOT NULL,
  `designation_id` bigint(5) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `doctor_id`, `hospital_name`, `location`, `designation_id`, `from_date`, `to_date`) VALUES
(1, 4, 'Amrutha', 'Ernakulam', 0, '2015-08-21', '2016-09-12'),
(4, 4, 'Amrutha', 'Ernakulam', 0, '2015-08-21', '2016-09-12'),
(12, 5, 'Amrutha Hospital', 'Ernakulam', 0, '2016-09-07', '2016-09-30'),
(13, 5, 'NNM', 'Kozhikkode', 0, '2016-09-01', '2016-09-23'),
(14, 6, 'NNN', 'Kozhikkode', 0, '2016-09-08', '2016-09-23'),
(15, 7, 'NNN', 'Kochi', 0, '2016-09-07', '2016-09-15'),
(16, 8, 'Amrutha Hospital', 'Ernakulam', 0, '2016-08-29', '2016-10-01'),
(17, 10, 'Amrutha Hospital', 'Kozhikkode', 0, '2015-09-06', '2016-09-23'),
(18, 11, 'NNM', 'Attingal', 0, '2016-08-28', '2016-10-01'),
(19, 15, 'MIMS', 'Kottakkal', 1, '2016-03-31', '2017-03-31'),
(20, 15, 'Amritha', 'Ernakulam', 1, '2017-03-31', '2018-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(10) NOT NULL,
  `patient_master_id` bigint(10) NOT NULL,
  `doctor_id` bigint(10) NOT NULL,
  `feed_back_date` date NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `patient_master_id`, `doctor_id`, `feed_back_date`, `comment`) VALUES
(1, 2, 1, '2018-04-02', 'sss');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(150) NOT NULL,
  `hospital_name` varchar(150) NOT NULL,
  `location` varchar(50) NOT NULL,
  `district_id` bigint(11) NOT NULL,
  `city_id` bigint(10) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_mobileno` varchar(30) NOT NULL,
  `website` varchar(50) NOT NULL,
  `status` int(3) NOT NULL,
  `image_path` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `hospital_name`, `location`, `district_id`, `city_id`, `phone_number`, `email`, `contact_name`, `contact_mobileno`, `website`, `status`, `image_path`) VALUES
(1, 'Amrutha Hospital', 'Kozhikkode', 11, 7, '04782553732', 'amrutha@gmail.com', 'Varun', '9878563243', 'Www.amruthahospital.com', 1, 'upload/hospital1.jpg'),
(2, 'Matha Hospital', 'Ernakulam', 7, 5, '04789663254', 'mathahospital@gmail.com', 'Vimal', '9878563241', 'Www.mathahospital.com', 1, 'upload/hospital2.jpg'),
(3, 'Apollo', 'Thiruvananthapuram', 1, 1, '07882562263', 'apollo@gmail.com', 'Giri', '8786541888', 'Www.apollohsptl.com', 1, 'upload/hospital3.jpg'),
(4, 'St. Joseph Govt Hospital', 'Ernakulam', 7, 6, '07894556363', 'stjosephhsptl@gmail.com', 'Varun', '9878563241', 'Www.stjoseph Hospital.com', 1, 'upload/hospital4.jpg'),
(5, 'Varsha Hospital', 'Mulanthurithi', 7, 5, '74100258963', 'valsankkl@gmail.com', 'Valsan', '7418529630', 'Www.ree.com', 1, 'upload/hospital5.');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_department`
--

CREATE TABLE `hospital_department` (
  `id` int(150) NOT NULL,
  `hospital_id` bigint(10) NOT NULL,
  `department_id` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_department`
--

INSERT INTO `hospital_department` (`id`, `hospital_id`, `department_id`) VALUES
(1, 1, 3),
(2, 1, 1),
(3, 1, 8),
(4, 1, 2),
(6, 1, 6),
(7, 3, 1),
(8, 3, 2),
(9, 3, 3),
(10, 3, 11),
(11, 3, 7),
(12, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `identity_card`
--

CREATE TABLE `identity_card` (
  `id` int(150) NOT NULL,
  `card_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identity_card`
--

INSERT INTO `identity_card` (`id`, `card_type`) VALUES
(1, 'Driver\'s License'),
(2, 'Voter\'s ID'),
(3, 'Aadhar'),
(4, 'PAN card');

-- --------------------------------------------------------

--
-- Table structure for table `lab_record`
--

CREATE TABLE `lab_record` (
  `id` int(150) NOT NULL,
  `appoinment_id` bigint(10) NOT NULL,
  `medical_lab_id` bigint(10) NOT NULL,
  `lab_test_id` bigint(10) NOT NULL,
  `result` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lab_test`
--

CREATE TABLE `lab_test` (
  `id` int(150) NOT NULL,
  `test_name` varchar(50) NOT NULL,
  `normal_value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_test`
--

INSERT INTO `lab_test` (`id`, `test_name`, `normal_value`) VALUES
(1, 'BP', '70-140'),
(2, 'Scan', '0'),
(3, 'Blood Test', '0');

-- --------------------------------------------------------

--
-- Table structure for table `leave_master`
--

CREATE TABLE `leave_master` (
  `id` bigint(11) NOT NULL,
  `leave_date` date NOT NULL,
  `doctor_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_master`
--

INSERT INTO `leave_master` (`id`, `leave_date`, `doctor_id`) VALUES
(1, '2016-08-20', 3),
(2, '2016-08-21', 3),
(3, '2016-08-22', 3),
(4, '2016-08-23', 3);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `userlevel` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `userlevel`) VALUES
('adhithya@gmail.com', '1234', 2),
('admin', 'admin', 1),
('akash@gmail.com', '1234', 2),
('ameer@gmail.com', '1234', 2),
('amrutha@gmail.com', '1234', 3),
('apollo@gmail.com', '1234', 3),
('aravindh@gamial.com', '1234', 5),
('haripriya@gmail.com', '1234', 4),
('jyothy@gmail.com', '1234', 4),
('kariyilmedical@gmail.com', '1234', 6),
('kites.php@gmail.com', '1234', 2),
('mahesh@gmail.com', '1234', 4),
('manu@gmail.com', '1234', 2),
('matha@gmail.com', '1234', 5),
('mathahospital@gmail.com', '1234', 3),
('neethymedical@gmail.com', '1234', 6),
('stjosephhsptl@gmail.com', '1234', 3),
('suhasini@gmail.com', '1234', 2),
('valsankkl@gmail.com', '1234', 3);

-- --------------------------------------------------------

--
-- Table structure for table `medical_lab`
--

CREATE TABLE `medical_lab` (
  `id` int(150) NOT NULL,
  `lab_name` varchar(50) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `website` varchar(30) NOT NULL,
  `district_id` bigint(20) NOT NULL,
  `city_id` bigint(10) NOT NULL,
  `status` int(10) NOT NULL,
  `image_path` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_lab`
--

INSERT INTO `medical_lab` (`id`, `lab_name`, `phone_number`, `email`, `website`, `district_id`, `city_id`, `status`, `image_path`) VALUES
(1, 'Matha Medicals', '04879663652', 'matha@gmail.com', 'Www.mathamedical.com', 11, 7, 1, 'upload/lab1.jpg'),
(2, 'Aravindh Medical Centre', '04223226565', 'aravindh@gamial.com', 'Www.aravindhmedicals.com', 1, 2, 1, 'upload/lab2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `medical_store`
--

CREATE TABLE `medical_store` (
  `id` int(150) NOT NULL,
  `store_name` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `district_id` bigint(12) NOT NULL,
  `city_id` bigint(10) NOT NULL,
  `status` int(10) NOT NULL,
  `image_path` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_store`
--

INSERT INTO `medical_store` (`id`, `store_name`, `phone_number`, `email`, `district_id`, `city_id`, `status`, `image_path`) VALUES
(1, 'Neethy Medicals', '04896332541', 'neethymedical@gmail.com', 11, 7, 1, 'upload/store1.jpg'),
(2, 'Kariyil Medical Store', '04772553252', 'kariyilmedical@gmail.com', 4, 3, 1, 'upload/store2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patient_master`
--

CREATE TABLE `patient_master` (
  `id` int(150) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `card_number` varchar(50) NOT NULL,
  `card_type` varchar(50) NOT NULL,
  `date_of_birth` varchar(12) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `house_name` varchar(50) NOT NULL,
  `post_office` varchar(30) NOT NULL,
  `district_id` bigint(10) NOT NULL,
  `city_id` bigint(10) NOT NULL,
  `blood_group_id` bigint(10) NOT NULL,
  `image_path` varchar(50) NOT NULL,
  `status` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_master`
--

INSERT INTO `patient_master` (`id`, `patient_name`, `card_number`, `card_type`, `date_of_birth`, `gender`, `mobile_number`, `email`, `house_name`, `post_office`, `district_id`, `city_id`, `blood_group_id`, `image_path`, `status`) VALUES
(1, 'Jyothy', '223366', 'Adhar', '1994/08/17', 'Female', '9697159873', 'jyothy@gmail.com', 'Vandanam(H)', 'Mukkam', 11, 7, 2, 'upload/patient1.JPG', 1),
(2, 'Haripriya', '369852', 'Adhar', '1991-08-17', 'Female', '9697159877', 'haripriya@gmail.com', 'Vandanam(H)', 'Kakkanade', 7, 5, 7, 'upload/patient2.jpg', 1),
(3, 'Mahesh', '666698', 'Adhar', '1990/08/01', 'Male', '9895757714', 'mahesh@gmail.com', 'Valappil', 'Attingal', 1, 1, 1, 'upload/patient3.jpg', 1),
(5, 'Valsan', '123456789', 'Adhar', '2018/04/12', 'Male', '9895757714', 'valsankkl@gmail.com', 'Souparnika', 'A', 7, 5, 1, 'upload/patient5.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(150) NOT NULL,
  `appoinment_id` bigint(10) NOT NULL,
  `present_illness` varchar(150) NOT NULL,
  `diagnosis` varchar(150) NOT NULL,
  `history` varchar(150) NOT NULL,
  `investigations` varchar(150) NOT NULL,
  `prescriptions` varchar(150) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `medical_lab_history` varchar(100) DEFAULT NULL,
  `medical_store_history` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `appoinment_id`, `present_illness`, `diagnosis`, `history`, `investigations`, `prescriptions`, `remarks`, `medical_lab_history`, `medical_store_history`) VALUES
(1, 1, 'Head Ache', 'Scan', 'No', 'No', 'Medicine', 'No', 'aa', 'bb'),
(2, 2, 'Head Ache', 'No', 'No', 'No', 'Medicine', 'No', 'mmmmm', ''),
(3, 3, 'Head Ache', 'No', 'No', 'No', 'Medicine', 'No', '', ''),
(4, 2, 'Joint Pain', 'Ff', 'Ff', 'Ff', 'Ff', 'Ff', 'mmmmm', ''),
(5, 13, 'Aa', 'Aa', 'Aa', 'A', 'A', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `id` int(10) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`id`, `qualification`, `description`) VALUES
(1, 'MD', '  '),
(2, 'MBBS', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `qualification_details`
--

CREATE TABLE `qualification_details` (
  `id` bigint(20) NOT NULL,
  `doctor_id` bigint(20) NOT NULL,
  `qualification_id` bigint(20) NOT NULL,
  `college` varchar(50) NOT NULL,
  `university` varchar(50) NOT NULL,
  `year` varchar(30) NOT NULL,
  `certificate_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification_details`
--

INSERT INTO `qualification_details` (`id`, `doctor_id`, `qualification_id`, `college`, `university`, `year`, `certificate_path`) VALUES
(5, 1, 2, 'Govt Medical College Kozhikode', 'Calicut University', '2012', 'upload/certificate5.'),
(6, 1, 1, 'Govt Medical College Kozhikode', 'Calicut University', '2013', 'upload/certificate6.'),
(7, 1, 2, 'Govt Medical College Kozhikode', 'Calicut University', '2013', 'upload/certificate7.'),
(8, 3, 2, 'Govt Medical College, Alappuzha', 'Kerala', '2012', 'upload/certificate8.'),
(9, 3, 1, 'Govt Medical College, Alappuzha', 'Kerala', '2014', 'upload/certificate9.'),
(11, 4, 2, 'Govt Medical College, Alappuzha', 'Kerala', '2014', 'upload/certificate11.'),
(12, 5, 2, 'Govt Medical College Kozhikode', 'Calicut University', '2001', 'upload/certificate12.'),
(13, 5, 1, 'Govt Medical College Kozhikode', 'Calicut University', '2013', 'upload/certificate13.'),
(14, 6, 2, 'Govt Medical College Kozhikode', 'Calicut University', '2013', 'upload/certificate14.'),
(15, 7, 2, 'Govt Medical College Kozhikode', 'Calicut University', '2013', 'upload/certificate15.'),
(16, 8, 2, 'Govt Medical College Kozhikode', 'Calicut University', '2001', 'upload/certificate16.'),
(17, 10, 2, 'Govt Medical College Kozhikode', 'Calicut University', '2001', 'upload/certificate17.'),
(27, 11, 2, 'Kozhikkode medical collage', 'Kerala', '2001', 'upload/lab27.'),
(28, 11, 1, 'Kozhikkode medical collage', 'Calicut University', '2013', 'upload/certificate28.pdf'),
(29, 11, 1, 'Kozhikkode medical collage', 'Calicut University', '2013', 'upload/certificate29.pdf'),
(30, 14, 2, 'Medical College', 'Calicut', '2012', 'upload/certificate30.docx'),
(31, 15, 2, 'Medical College', 'Calicut', '2012', 'upload/certificate31.docx'),
(32, 15, 1, 'Medical College', 'Alappy', '2014', 'upload/certificate32.docx');

-- --------------------------------------------------------

--
-- Table structure for table `reference_master`
--

CREATE TABLE `reference_master` (
  `id` int(150) NOT NULL,
  `reference_date` date NOT NULL,
  `appoinment_id` bigint(20) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `refer_appoinment` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference_master`
--

INSERT INTO `reference_master` (`id`, `reference_date`, `appoinment_id`, `reason`, `refer_appoinment`) VALUES
(1, '2016-08-24', 2, 'Surgery', 3);

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `id` int(150) NOT NULL,
  `specialization_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`id`, `specialization_name`) VALUES
(1, 'SURGEON');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoinment`
--
ALTER TABLE `appoinment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_hospital`
--
ALTER TABLE `doctor_hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_time`
--
ALTER TABLE `doctor_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_department`
--
ALTER TABLE `hospital_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identity_card`
--
ALTER TABLE `identity_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_record`
--
ALTER TABLE `lab_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_master`
--
ALTER TABLE `leave_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `medical_lab`
--
ALTER TABLE `medical_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_store`
--
ALTER TABLE `medical_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_master`
--
ALTER TABLE `patient_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualification_details`
--
ALTER TABLE `qualification_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference_master`
--
ALTER TABLE `reference_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoinment`
--
ALTER TABLE `appoinment`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `doctor_hospital`
--
ALTER TABLE `doctor_hospital`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `doctor_time`
--
ALTER TABLE `doctor_time`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hospital_department`
--
ALTER TABLE `hospital_department`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `identity_card`
--
ALTER TABLE `identity_card`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lab_record`
--
ALTER TABLE `lab_record`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lab_test`
--
ALTER TABLE `lab_test`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `leave_master`
--
ALTER TABLE `leave_master`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `medical_lab`
--
ALTER TABLE `medical_lab`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `medical_store`
--
ALTER TABLE `medical_store`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `patient_master`
--
ALTER TABLE `patient_master`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `qualification_details`
--
ALTER TABLE `qualification_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `reference_master`
--
ALTER TABLE `reference_master`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
