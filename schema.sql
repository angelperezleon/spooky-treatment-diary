CREATE TABLE `diary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `recipient` varchar(120) NOT NULL,
  `preset` varchar(100) NOT NULL,
  `programs` varchar(100) NOT NULL,
  `settings` varchar(100) NOT NULL,
  `method` varchar(250) NOT NULL,
  `notes` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `preset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `presetslist` varchar(100) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programlist` varchar(100) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

