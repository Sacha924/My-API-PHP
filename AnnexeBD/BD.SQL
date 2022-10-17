SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'PHP'),
(2, 'Javascript'),
(3, 'HTML'),
(4, 'CSS'),
(5, 'SQL'),
(6, 'Solidity');

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `libelle` varchar(200) NOT NULL,
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `formation` (`id`, `libelle`, `categorie_id`) VALUES
(1, 'On apprend à coder en PHP même si ce langage est .. hummm', 1),
(2, 'Javascript c tro tro bien :)', 2),
(3, 'html, le classique et incontournable', 3),
(4, 'le frère du css sans qui rien n\'est beau', 4),
(5, 'plutot sympa comme langage le sql', 5),
(6, 'le langage pr devenir riche, aka soliditixxx', 6),
(7, 'Une deuxième formation sur solidity car solidity = smart contract = avenir = :)', 6),
(8, 'une deuxième formation js pour devenir dev full stack ooO ', 2);

ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_FORMATION_CATEGORIE` (`categorie_id`);

ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `formation`
  ADD CONSTRAINT `FK_FORMATION_CATEGORIE` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
