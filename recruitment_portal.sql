-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2025 at 02:10 AM
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
-- Database: `recruitment_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `contribution_part1` text NOT NULL,
  `contribution_part2` text NOT NULL,
  `quote` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `member_name`, `contribution_part1`, `contribution_part2`, `quote`) VALUES
(1, 'Mohammad Maruf Haider', 'Home and about - HTML, CSS and responsiveness. Header and footer design for all pages for uniformity', '', ''),
(2, 'Elias Majaliwa', 'Management and Apply page - Full Gitgub and Jira management, Structure of pages, HTML and CSS for Apply form.', '', 'Onwards'),
(3, 'Mahin Khalil', 'Jobs page - HTML, CSS and responsiveness of jobs page.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_ref` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `short_desc` text DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `reports_to` varchar(100) DEFAULT NULL,
  `responsibilities` text DEFAULT NULL,
  `requirements` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_ref`, `title`, `company`, `short_desc`, `salary`, `reports_to`, `responsibilities`, `requirements`) VALUES
(1, 'A1B2C', 'Software Developer', 'PixelWorks Studios', 'Build new game features in C++/Unity for console and PC in an agile team.', '$95,000–$120,000 + super', 'Lead Game Engineer', '<ol><li>Ship gameplay features with clean, testable code</li><li>Profile and optimize frame-time and memory usage</li><li>Collaborate with Design and Art in 2-week sprints</li><li>Participate in code reviews and technical planning</li></ol>', '<ul><li><strong>Essential:</strong> C++ proficiency; Unity or Unreal; Git; debugging tools</li><li><strong>Preferable:</strong> Console certification; networked gameplay; shaders; 3D math</li></ul>'),
(2, '9X7QK', 'Cybersecurity Analyst', 'SecureNet Solutions', 'Monitor, triage, and respond to threats across cloud and on-prem infrastructure.', '$105,000–$135,000 + benefits', 'SOC Manager', '<ol><li>Investigate alerts and produce incident reports</li><li>Hunt for IOCs and tune detections</li><li>Advise clients on remediation and hardening</li><li>Maintain and tune SIEM/XDR rules</li></ol>', '<ul><li><strong>Essential:</strong> SIEM/XDR; MITRE ATT&CK; scripting (Python/Bash); network protocols</li><li><strong>Preferable:</strong> Azure/M365 Defender; SEC+/GCIH/CISSP; forensics tools</li></ul>'),
(3, 'P200', 'Digital Learning Support Officer', 'Metro University', 'Support e-learning platforms, assist staff with digital tools, and contribute to education innovation.', '$75,000–$90,000 + benefits', 'Head of Digital Learning', 'Provide training, assist with LMS updates, collaborate with IT and faculty teams.', 'Experience with LMS platforms, strong communication skills, and technical troubleshooting abilities.'),
(4, 'P300', 'UI/UX Designer', 'InnovateX', 'Create user-centred designs and collaborate with product and engineering to ship great experiences.', '$85,000–$110,000', 'Design Lead', 'Conduct user research, create wireframes and prototypes, and test usability.', 'Proficiency with Figma, Adobe XD, and user-testing tools; creative and analytical mindset.'),
(5, 'P400', 'IT Systems Administrator', 'Department of Digital Services', 'Maintain systems, ensure uptime, and deliver secure digital services for citizens.', '$100,000–$125,000', 'Infrastructure Manager', 'Manage network and server environments, monitor system health, and deploy updates.', 'Knowledge of Windows/Linux servers, networking, and cybersecurity fundamentals.');

-- --------------------------------------------------------

--
-- Table structure for table `process_eoi`
--

CREATE TABLE `process_eoi` (
  `eoiNumber` int(11) NOT NULL,
  `jobRef` varchar(5) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `street` varchar(40) DEFAULT NULL,
  `suburb` varchar(40) DEFAULT NULL,
  `state` varchar(3) DEFAULT NULL,
  `postcode` varchar(4) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `skills` varchar(100) DEFAULT NULL,
  `otherSkills` text DEFAULT NULL,
  `status` varchar(10) DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `process_eoi`
--

INSERT INTO `process_eoi` (`eoiNumber`, `jobRef`, `firstName`, `lastName`, `dob`, `gender`, `street`, `suburb`, `state`, `postcode`, `email`, `phone`, `skills`, `otherSkills`, `status`) VALUES
(2, 'A1B2C', 'Alex', 'Jade', '2025-08-04', 'Male', 'new road', 'hawthorn', 'NSW', '3100', 'alex@xmail.com', '04367891', 'JavaScript', 'plc programming', 'New'),
(3, 'A1B2C', 'Alice', 'Jane', '2025-07-06', 'Female', 'old road', 'new city', 'NT', '3000', 'jane@gmail.com', '056789123', 'HTML', 'robotics', 'New'),
(4, '9X7QK', 'John', 'Freeman', '2025-01-08', 'Male', 'springvale road', 'Melbourne', 'VIC', '3001', 'john@gmail.com', '0432542', 'JavaScript', 'none', 'New'),
(5, 'A1B2C', 'Alex', 'Mercer', '2025-10-07', 'Male', 'john street', 'hawthorn', 'VIC', '3143', 'alexm@gmail.com', '0546231', 'HTML', 'c programming', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('Admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `process_eoi`
--
ALTER TABLE `process_eoi`
  ADD PRIMARY KEY (`eoiNumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `process_eoi`
--
ALTER TABLE `process_eoi`
  MODIFY `eoiNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
