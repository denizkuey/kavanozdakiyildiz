
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `podcasts` (
  `idPodcast` int(11) NOT NULL,
  `titlePodcast` longtext NOT NULL,
  `descPodcast` longtext NOT NULL,
  `audioFullNamePodcast` longtext NOT NULL,
  `orderPodcast` longtext NOT NULL
) 
