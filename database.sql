SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `info` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255)	NOT NULL,

  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `info` (`id`, `username`, `name`, `email`, `password`) VALUES
(1, 'Testing','alex', 'email@email.com', 'Hel.152'),
(2, 'abc','jonh', 'admin@localhost.com', '\\rn'),



