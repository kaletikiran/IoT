--
-- Database: `iot`
--
CREATE DATABASE IF NOT EXISTS `iot` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `iot`;

-- --------------------------------------------------------

--
-- Table structure for table `json_data`
--

CREATE TABLE IF NOT EXISTS `json_data` (
  `id` int(11) NOT NULL,
  `data2` longtext DEFAULT NULL,
  `created_on` datetime DEFAULT current_timestamp(),
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


