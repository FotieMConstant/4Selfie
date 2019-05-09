CREATE TABLE `init_photo` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `final_photo` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `description_p1` varchar(255) NOT NULL,
  `description_p2` varchar(255) NOT NULL,
  `location_1` varchar(255) NOT NULL,
  `location_2` varchar(255) NOT NULL,
  `likes_p1` int(11) NOT NULL,
  `likes_p2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
