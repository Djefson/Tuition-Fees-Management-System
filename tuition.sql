-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 14, 2012 at 01:22 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tuition`
--

-- --------------------------------------------------------

--
-- Table structure for table `banksoper`
--

CREATE TABLE IF NOT EXISTS `banksoper` (
  `bankid` varchar(255) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `bankslipnum` varchar(255) NOT NULL,
  `userid` varchar(20) NOT NULL,
  PRIMARY KEY (`bankid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banksoper`
--


-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `departid` varchar(255) NOT NULL,
  `departname` varchar(255) NOT NULL,
  `levelid` varchar(255) NOT NULL,
  `facid` varchar(255) NOT NULL,
  `fees` int(11) NOT NULL,
  PRIMARY KEY (`departid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`departid`, `departname`, `levelid`, `facid`, `fees`) VALUES
('BMC 1', 'BIOMEDICAL  SCIENCE', 'BAC 1', 'BMC', 0),
('BMC 2', 'BIOMEDICAL  SCIENCE', 'BAC 2', 'BMC', 0),
('BMC 3', 'BIOMEDICAL  SCIENCE', 'BAC 3', 'BMC', 0),
('BMC 4', 'BIOMEDICAL  SCIENCE', 'BAC 4', 'BMC', 0),
('CS .ENG 1', 'COMPUTER SCIENCE ENG', 'BAC 1', 'CS .ENG', 0),
('CS .ENG 2', 'COMPUTER SCIENCE ENG', 'BAC 2', 'CS .ENG', 0),
('CS .ENG 4', 'COMPUTER SCIENCE ENG', 'BAC 4', 'CS .ENG', 0),
('CS .ENG3', 'COMPUTER SCIENCE ENG', 'BAC 3', 'CS .ENG', 0),
('CS.MGT 2', 'COMPUTER SCIENCE MANAGMENT', 'BAC 2', 'CS.MGT', 0),
('CS.MGT1', 'COMPUTER SCIENCE MANAGMENT', 'BAC 1', 'CS.MGT', 0),
('CS.MGT3', 'COMPUTER SCIENCE MANAGMENT', 'BAC 3', 'CS.MGT', 350000),
('CS.MGT4', 'COMPUTER SCIENCE MANAGMENT', 'BAC 4', 'CS.MGT', 400000),
('MED 2', 'MEDECINE  DOC', 'BAC 2', 'MED', 0),
('MED 3', 'MEDECINE  DOC', 'BAC 3', 'MED', 0),
('MED 4', 'MEDECINE  DOC', 'BAC 4', 'MED', 0),
('MED P. C 1', 'MEDECINE  PRE CLINIC', 'BAC 1', 'MED C', 0),
('MED P. C 2', 'MEDECINE  PRE CLINIC', 'BAC 2', 'MED C', 0),
('MED P. C 3', 'MEDECINE  PRE CLINIC', 'BAC 3', 'MED P. C ', 0),
('MED P. C 4', 'MEDECINE  PRE CLINIC', 'BAC 4', 'MED P. C', 0),
('MED1', 'MEDECINE  DOC', 'BAC 1', 'MED', 0),
('NUR.SC 1', 'NURSING SCIENCE', 'BAC 1', 'NUR.SC', 0),
('NUR.SC 2', 'NURSING SCIENCE', 'BAC 2', 'NUR.SC', 0),
('NUR.SC 3', 'NURSING SCIENCE', 'BAC 3', 'NUR.SC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE IF NOT EXISTS `faculties` (
  `facid` varchar(255) NOT NULL,
  `facname` varchar(255) NOT NULL,
  `facstatus` varchar(255) NOT NULL,
  `faccombunation` varchar(255) NOT NULL,
  PRIMARY KEY (`facid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`facid`, `facname`, `facstatus`, `faccombunation`) VALUES
('BMC', 'BIOMEDICAL  SCIENCE', 'HUMAN  BEING  STUDIES ', 'BIOMEDICAL   SCIENCE'),
('CS .ENG', 'COMPUTER SCIENCE ', 'COMPUTER APPLIED SCIENCE', 'COMPUTER  SCIENCE ENG'),
('CS.MGT', 'COMPUTER SCIENCE ', 'COMPUTER AND  MANAGMENT STUDIES', 'COMPUTER SICNCE  AND MANAGMENT'),
('MED', 'MEDECINE  DOCTORS ', 'DOCTORS  STUDIES  ', 'MEDECINE  DOCTORS '),
('MED C', 'MEDECINE PRE  CLINIC ', 'ASSISTANT  DOCTORS  STUDIES ', 'MEDECINE PRE CLINIC'),
('NUR.SC', 'NURSING  SCIENCE ', 'PATIENTS  RELATED SCIENCE', 'NURSING ');

-- --------------------------------------------------------

--
-- Table structure for table `feepayement`
--

CREATE TABLE IF NOT EXISTS `feepayement` (
  `feeid` int(255) NOT NULL AUTO_INCREMENT,
  `stdid` varchar(11) NOT NULL,
  `paymentdate` varchar(20) NOT NULL,
  `feetype` varchar(255) NOT NULL,
  `feedescription` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `academicyear` int(11) NOT NULL,
  `feesamount` int(11) NOT NULL,
  `totalamount` int(11) NOT NULL,
  `rest` int(11) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `bankaccount` int(11) NOT NULL,
  `slipnumber` int(11) NOT NULL,
  `expirationdate` varchar(20) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `paymentmodeid` varchar(15) NOT NULL,
  PRIMARY KEY (`feeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `feepayement`
--

INSERT INTO `feepayement` (`feeid`, `stdid`, `paymentdate`, `feetype`, `feedescription`, `semester`, `academicyear`, `feesamount`, `totalamount`, `rest`, `bankname`, `bankaccount`, `slipnumber`, `expirationdate`, `userid`, `paymentmodeid`) VALUES
(6, 'std1', '2012-12-11 11:45:21', 'Annual Fee', 'Tuition', 'First Semester', 2012, 200000, 400000, 200000, 'BPR', 23654, 2154, '12/31/2012', 'cashier', 'Installment1'),
(18, 'std2', '2012-12-11 12:46:12', 'Semester Fee', 'Tuition', 'First Semester', 2012, 300000, 400000, 100000, 'caf isonga', 2365423, 1445872, '12/31/2012', 'cashier', 'Installment1'),
(19, 'std3', '2012-12-11 13:00:12', 'Monthly Fee', 'Tuition', 'Last Semester', 2012, 300000, 500000, 200000, 'BCR', 4578, 1236589, '30/12/2012', 'cashier', 'Installment1'),
(20, 'std4', '2012-12-13 18:58:05', 'Semester Fee', 'Anual Tuition', 'First Semester', 2012, 400000, 400000, 0, 'BPR', 2147483647, 13256987, '30/12/2012', 'cashier', 'Installment1'),
(21, 'std5', '2012-12-13 19:07:05', 'Annual Fee', 'Tuition', 'First Semester', 2012, 547000, 547000, 0, 'BPR', 0, 457896, '30/12/2012', 'cashier', 'Installment1'),
(22, 'std1', '2012-12-13 23:42:12', 'Annual Fee', 'Tuition', 'Last Semester', 2012, 200000, 200000, 0, 'BPR', 545412365, 236587, '31/12/2012', 'cashier', 'Installment1'),
(23, 'std2', '2012-12-13 23:52:39', 'Semester Fee', 'Tuition', 'Last Semester', 2012, 100000, 100000, 0, 'BPR', 545412365, 458744, '31/12/2012', 'cashier', 'Installment1'),
(24, 'std6', '2012-12-14 01:24:24', 'Semester Fee', 'Tuition', 'First Semester', 2012, 300000, 400000, 100000, 'BCR', 23659856, 124578, '31/12/2012', 'cashier', 'Installment1');

-- --------------------------------------------------------

--
-- Table structure for table ` level`
--

CREATE TABLE IF NOT EXISTS ` level` (
  `levelid` varchar(255) NOT NULL,
  `levelvoucher` varchar(255) NOT NULL,
  PRIMARY KEY (`levelid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table ` level`
--

INSERT INTO ` level` (`levelid`, `levelvoucher`) VALUES
('BAC 2', '02'),
('BAC 3', '03'),
('BAC 4', '04'),
('BAC I', '01');

-- --------------------------------------------------------

--
-- Table structure for table `payementdoc`
--

CREATE TABLE IF NOT EXISTS `payementdoc` (
  `billid` int(11) NOT NULL AUTO_INCREMENT,
  `stdid` varchar(20) NOT NULL,
  `received_from` varchar(50) NOT NULL,
  `departid` varchar(11) NOT NULL,
  `amount_payed` varchar(255) NOT NULL,
  `amount_in_word` varchar(255) NOT NULL,
  `payment_description` varchar(255) NOT NULL,
  `date_of_payment` varchar(255) NOT NULL,
  `slipnumber` varchar(255) NOT NULL,
  `userid` varchar(20) NOT NULL,
  PRIMARY KEY (`billid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `payementdoc`
--

INSERT INTO `payementdoc` (`billid`, `stdid`, `received_from`, `departid`, `amount_payed`, `amount_in_word`, `payment_description`, `date_of_payment`, `slipnumber`, `userid`) VALUES
(1, 'std1', 'NISHIMWE Joseph', 'CS.MGT4', '200000', '200000', 'Tuition', '2012-12-11 11:58:36', '02154', 'cashier'),
(2, 'std2', 'uwingabiye floride', 'CS.MGT4', '300000', '300000', 'Tuition', '2012-12-11 12:46:12', '1445872', 'cashier'),
(3, 'std3', 'google azor', 'CS.MGT1', '300000', '300000', 'Tuition', '2012-12-11 13:00:12', '', 'cashier'),
(4, 'std4', 'Anderson Himbi', 'CS .ENG 4', '400000', '400000', 'Anual Tuition', '2012-12-13 18:58:05', '13256987', 'cashier'),
(5, 'std5', 'Muntu Freddy', 'CS.MGT1', '547000', '547000', 'Tuition', '2012-12-13 19:07:05', '457896', 'cashier'),
(6, 'std1', 'NISHIMWE Joseph', 'CS.MGT4', '200000', '200000', 'Tuition', '2012-12-13 23:42:12', '236587', 'cashier'),
(7, 'std2', 'uwingabiye floride', 'CS.MGT4', '100000', '100000', 'Tuition', '2012-12-13 23:52:39', '458744', 'cashier'),
(8, 'std6', 'Mukeshimana Rosine', 'BMC 1', '300000', '300000', 'Tuition', '2012-12-14 01:24:24', '124578', 'cashier');

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetail`
--

CREATE TABLE IF NOT EXISTS `paymentdetail` (
  `detailid` int(11) NOT NULL AUTO_INCREMENT,
  `feeid` varchar(50) NOT NULL,
  `totalamount` int(11) NOT NULL,
  `admissionfee` int(11) NOT NULL,
  `insurancefee` int(11) NOT NULL,
  `tuitionfee` int(11) NOT NULL,
  `finalprojectfee` int(11) NOT NULL,
  `internershipfee` int(11) NOT NULL,
  `uniformfee` int(11) NOT NULL,
  `validationexamfee` int(11) NOT NULL,
  `otherdescription` varchar(50) NOT NULL,
  PRIMARY KEY (`detailid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `paymentdetail`
--

INSERT INTO `paymentdetail` (`detailid`, `feeid`, `totalamount`, `admissionfee`, `insurancefee`, `tuitionfee`, `finalprojectfee`, `internershipfee`, `uniformfee`, `validationexamfee`, `otherdescription`) VALUES
(7, '17', 400000, 100000, 30000, 200000, 40000, 10000, 10000, 10000, 'tuition and  insuarance'),
(8, '18', 300000, 45000, 15000, 150000, 45000, 10000, 25000, 25000, 'tui,vali,ins,int,admi,unif,final p'),
(9, '19', 500000, 10000, 20000, 300000, 0, 0, 0, 0, 'adm,insu,tuit'),
(10, '20', 400000, 0, 0, 400000, 0, 0, 0, 0, 'All amount was for the tuition'),
(11, '21', 547000, 45000, 2000, 400000, 100000, 0, 0, 0, 'adm, insu,tuit,fnprjct'),
(12, '22', 200000, 0, 0, 200000, 0, 0, 0, 0, 'Tuition'),
(13, '23', 100000, 0, 0, 100000, 0, 0, 0, 0, 'Tuition'),
(14, '24', 300000, 0, 0, 300000, 0, 0, 0, 0, 'Tuition');

-- --------------------------------------------------------

--
-- Table structure for table `paymentmode`
--

CREATE TABLE IF NOT EXISTS `paymentmode` (
  `payementmodeid` varchar(255) NOT NULL,
  `payementinstallment` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`payementmodeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentmode`
--

INSERT INTO `paymentmode` (`payementmodeid`, `payementinstallment`, `description`) VALUES
('Installment1', '', ''),
('Installment2', '', ''),
('Installment3', '', ''),
('Installment4', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stdid` varchar(255) NOT NULL,
  `stdname` varchar(255) NOT NULL,
  `stdaddress` varchar(255) NOT NULL,
  `stdphone` varchar(20) NOT NULL,
  `stdmaritalstatus` varchar(255) NOT NULL,
  `stdsponsorship` varchar(255) NOT NULL,
  `stdDOB` varchar(255) NOT NULL,
  `stdgender` varchar(255) NOT NULL,
  `departid` varchar(255) NOT NULL,
  `userid` varchar(20) NOT NULL,
  PRIMARY KEY (`stdid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stdid`, `stdname`, `stdaddress`, `stdphone`, `stdmaritalstatus`, `stdsponsorship`, `stdDOB`, `stdgender`, `departid`, `userid`) VALUES
('std1', 'NISHIMWE Joseph', 'kigali', '0785429342', 'Single', 'global found', '12/09/2012', 'Male', 'CS.MGT4', 'cashier'),
('std2', 'uwingabiye floride', 'Kicukiro', '0785429342', 'Single', 'FARG', '1987-02-01', 'Female', 'CS.MGT4', 'cashier'),
('std3', 'google azor', 'new york', '0785429342', 'married', 'apple', '1985-02-02', 'Male', 'CS.MGT1', 'cashier'),
('std4', 'Anderson Himbi', 'Remera', '0783355077', 'Married', 'My Self', '11/27/1987', 'Male', 'CS .ENG 4', 'cashier'),
('std5', 'Muntu Freddy', 'Kimironko', '0788562125', 'Single', 'Parents', '20/10/2012', 'Male', 'CS.MGT1', 'cashier'),
('std6', 'Mukeshimana Rosine', 'Muhima', '0728818783', 'Single', 'Parents', '20/10/1989', 'Female', 'BMC 1', 'cashier');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(10) NOT NULL,
  `workdepartment` varchar(255) NOT NULL,
  `servicetitle` varchar(255) NOT NULL,
  `studieslevel` varchar(255) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `workdepartment`, `servicetitle`, `studieslevel`) VALUES
('user1', 'UWINGABIYE Floride', 'admin123', 'Finance', 'Cashier', 'A0'),
('user2', 'NISHIMWE Joseph', 'joseph', 'Finance', 'DAF', 'A0');
