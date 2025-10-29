-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2025 at 10:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2_db`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;