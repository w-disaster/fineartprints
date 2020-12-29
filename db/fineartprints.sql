-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Dic 29, 2020 alle 10:22
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fineartprints`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Art_print`
--

CREATE TABLE `Art_print` (
  `Technique_id` char(9) NOT NULL,
  `Picture_title` char(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Category`
--

CREATE TABLE `Category` (
  `Name` char(140) NOT NULL,
  `Image` char(50) NOT NULL,
  `Orientation` char(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Category`
--

INSERT INTO `Category` (`Name`, `Image`, `Orientation`) VALUES
('Abstract', 'abstract1.webp', 'portrait'),
('Architecture', 'edificio1.webp', 'landscape'),
('Film', 'film1.webp', 'portrait'),
('Fine arts', 'il_postino.webp', 'portrait'),
('Nature', 'nature1.webp', 'portrait'),
('Other', 'edificio3.webp', 'portrait'),
('Space', 'space1.webp', 'portrait'),
('Street', 'street1.webp', 'portrait');

-- --------------------------------------------------------

--
-- Struttura della tabella `Credit_Card`
--

CREATE TABLE `Credit_Card` (
  `Expire_date` char(10) NOT NULL,
  `Owner` char(140) NOT NULL,
  `Number` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Credit_Card`
--

INSERT INTO `Credit_Card` (`Expire_date`, `Owner`, `Number`) VALUES
('12/40', 'Gino Lippa', 1234567890123456),
('10/50', 'Mario Rossi', 2345678901234567),
('08/34', 'Luigi Gialli', 3456789012345678),
('09/44', 'Giovanni Neri', 4567890123456789);

-- --------------------------------------------------------

--
-- Struttura della tabella `Final_product`
--

CREATE TABLE `Final_product` (
  `Picture_title` char(140) NOT NULL,
  `Technique_id` char(9) NOT NULL,
  `Frame_id` char(9) NOT NULL,
  `Passpartout_id` char(140) NOT NULL,
  `Art_print_width` int(11) NOT NULL,
  `Art_print_height` int(11) NOT NULL,
  `Passpartout_width` int(11) NOT NULL,
  `Order_id` int(11) NOT NULL,
  `Company_name` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Frame`
--

CREATE TABLE `Frame` (
  `Frame_id` char(9) NOT NULL,
  `Image` char(50) NOT NULL,
  `Description` char(140) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Frame`
--

INSERT INTO `Frame` (`Frame_id`, `Image`, `Description`, `Price`) VALUES
('7820', 'frame01.webp', 'Vienna Chateau 20 Silver', 47),
('7821', 'frame02.webp', 'Vienna Chateau 20 Gold', 59),
('7822', 'frame03.webp', 'Affresco Oro', 47),
('7823', 'frame04.webp', 'Veneziano Oro 20 Silver', 32),
('7824', 'frame05.webp', 'Fiorentina Oro Antico', 21),
('7825', 'frame06.webp', 'Vienna Chateau 50 Braun', 45),
('7826', 'frame07.webp', 'Palladio 70', 65),
('7827', 'frame08.webp', 'Hermitage Gold', 32),
('7828', 'frame09.webp', 'Hermitage Silver', 17);

-- --------------------------------------------------------

--
-- Struttura della tabella `Make_frame_available`
--

CREATE TABLE `Make_frame_available` (
  `Email` char(140) NOT NULL,
  `Frame_id` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Make_passpartout_available`
--

CREATE TABLE `Make_passpartout_available` (
  `Email` char(140) NOT NULL,
  `Passpartout_id` char(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Passpartout`
--

CREATE TABLE `Passpartout` (
  `Passpartout_id` char(140) NOT NULL,
  `Image` char(50) NOT NULL,
  `Specifications` char(140) NOT NULL,
  `Price_per_cm2` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Passpartout`
--

INSERT INTO `Passpartout` (`Passpartout_id`, `Image`, `Specifications`, `Price_per_cm2`) VALUES
('8001', 'pass01.webp', 'Bianco', 11),
('8002', 'pass02.webp', 'Bianco Naturale', 12.24),
('8003', 'pass03.webp', 'Nero', 12.24),
('8004', 'pass04.webp', 'Newport Blue', 15.23),
('8005', 'pass05.webp', 'Williams Green', 14.23),
('8006', 'pass06.webp', 'Chinese Red', 12.24);

-- --------------------------------------------------------

--
-- Struttura della tabella `Payment_Info`
--

CREATE TABLE `Payment_Info` (
  `Card_number` bigint(20) NOT NULL,
  `Email` char(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Payment_Info`
--

INSERT INTO `Payment_Info` (`Card_number`, `Email`) VALUES
(1234567890123456, 'gino.lippa@prints.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `Picture`
--

CREATE TABLE `Picture` (
  `Title` char(140) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Author` char(140) NOT NULL,
  `Image` char(50) NOT NULL,
  `Base_price` float NOT NULL,
  `Discount` float NOT NULL DEFAULT 0,
  `Publish_date` date NOT NULL,
  `Orientation` char(140) NOT NULL,
  `Category_name` char(140) NOT NULL,
  `Email` char(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Picture`
--

INSERT INTO `Picture` (`Title`, `Description`, `Author`, `Image`, `Base_price`, `Discount`, `Publish_date`, `Orientation`, `Category_name`, `Email`) VALUES
('Abstract print n.1', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'abstract1.webp', 50, 0, '2020-10-23', 'portrait', 'Abstract', 'cippa.pino@prints.com'),
('Abstract print n.2', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'abstract2.webp', 80, 0, '2020-11-05', 'portrait', 'Abstract', 'cippa.pino@prints.com'),
('Abstract print n.3', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'abstract3.webp', 90, 0, '2020-10-22', 'landscape', 'Abstract', 'cippa.pino@prints.com'),
('Abstract print n.4', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Davide Rossi', 'abstract4.webp', 110, 0, '2020-07-03', 'landscape', 'Abstract', 'cippa.pino@prints.com'),
('Abstract print n.5', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Davide Rossi', 'abstract5.webp', 80, 0, '2020-02-08', 'landscape', 'Abstract', 'cippa.pino@prints.com'),
('Abstract print n.6', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'abstract6.webp', 80, 0, '2020-01-06', 'portrait', 'Abstract', 'cippa.pino@prints.com'),
('Black and white building', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Davide Rossi', 'architecture1.webp', 50, 0, '2020-10-05', 'landscape', 'Architecture', 'cippa.pino@prints.com'),
('Film print n.1', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Davide Rossi', 'film1.webp', 20, 0, '2020-10-07', 'portrait', 'film', 'cippa.pino@prints.com'),
('Film print n.2', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Luca Fabri', 'film2.webp', 18, 0, '2020-07-20', 'landscape', 'film', 'cippa.pino@prints.com'),
('Film print n.3', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Riccardo Battistini', 'film3.webp', 15, 0, '2020-06-17', 'portrait', 'film', 'cippa.pino@prints.com'),
('Film print n.4', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Luca Fabri', 'film4.webp', 7, 0, '2020-08-27', 'portrait', 'film', 'cippa.pino@prints.com'),
('Film print n.5', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Riccardo Battistini', 'film5.webp', 9, 0, '2020-11-24', 'portrait', 'film', 'cippa.pino@prints.com'),
('Film print n.6', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Davide Rossi', 'film6.webp', 13, 0, '2020-07-14', 'portrait', 'film', 'cippa.pino@prints.com'),
('Golconda', 'The piece depicts a scene of \"raining men\", nearly identical to each other dressed in dark overcoats and bowler hats, who seem to be either falling down like rain drops, floating up like helium balloons, or just stationed in mid-air as no movement or motion is implied. The backdrop features red-roofed buildings and a mostly blue partly cloudy sky, lending credence to the theory that the men are not raining. The men are equally spaced in a lattice, facing the viewpoint and receding back in rhombic grid layers. ', 'Renè Magritte', 'golconda-magritte.jpeg', 90, 0, '2020-12-21', 'landscape', 'Fine arts', 'cippa.pino@prints.com'),
('Impression, Sunrise', 'Impression, Sunrise (French: Impression, soleil levant) is a painting by Claude Monet first shown at what would become known as the \"Exhibition of the Impressionists\" in Paris in April, 1874. The painting is credited with inspiring the name of the Impressionist movement. ', 'Claude Monet', 'impressione_levar_del_sole.jpeg', 120, 0, '2020-04-08', 'landscape', 'Fine arts', 'cippa.pino@prints.com'),
('Modern spiral building', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Davide Rossi', 'architecture3.webp', 70, 0, '2020-06-03', 'portrait', 'Architecture', 'cippa.pino@prints.com'),
('Nature print n.1', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Davide Rossi', 'nature1.webp', 18, 0, '2020-04-26', 'portrait', 'nature', 'cippa.pino@prints.com'),
('Nature print n.2', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Riccardo Battistini', 'nature2.webp', 23, 0, '2020-04-29', 'portrait', 'nature', 'cippa.pino@prints.com'),
('Nature print n.3', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Luca Fabri', 'nature3.webp', 18, 0, '2020-09-05', 'portrait', 'nature', 'cippa.pino@prints.com'),
('Nature print n.4', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Davide Rossi', 'nature4.webp', 21, 0, '2020-06-02', 'portrait', 'nature', 'cippa.pino@prints.com'),
('Nature print n.5', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Riccardo Battistini', 'nature5.webp', 22, 0, '2020-01-26', 'landscape', 'nature', 'cippa.pino@prints.com'),
('Nature print n.6', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Luca Fabri', 'nature6.webp', 23, 0, '2020-02-03', 'landscape', 'nature', 'cippa.pino@prints.com'),
('Nature print n.7', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Riccardo Battistini', 'nature7.webp', 17, 0, '2020-04-01', 'portrait', 'nature', 'cippa.pino@prints.com'),
('Portrait of Joseph Roulin', 'Joseph Roulin—who appears in this portrait resplendent in his blue uniform against a floral background that echoes his lush, swirling beard—was among Vincent van Gogh’s most important friends. The two lived on the same street in Arles, in the South of France, where Roulin worked for the postal service. Van Gogh was fascinated by his friend’s face, but he was at least as taken with the man’s character.', 'Van Gogh', 'il_postino.webp', 90, 0, '2020-12-23', 'portrait', 'Fine arts', 'cippa.pino@prints.com'),
('Skyscraper on fog', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'architecture2.webp', 100, 0, '2020-02-22', 'landscape', 'Architecture', 'cippa.pino@prints.com'),
('Space print n.1', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Luca Fabri', 'space1.webp', 14, 0, '2020-10-14', 'portrait', 'space', 'cippa.pino@prints.com'),
('Space print n.2', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Riccardo Battistini', 'space2.webp', 25, 0, '2020-07-03', 'landscape', 'space', 'cippa.pino@prints.com'),
('Space print n.3', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Davide Rossi', 'space3.webp', 37, 0, '2020-03-03', 'landscape', 'space', 'cippa.pino@prints.com'),
('Street print n.1', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Davide Rossi', 'street1.webp', 21, 0, '2020-05-06', 'portrait', 'street', 'cippa.pino@prints.com'),
('Street print n.2', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Riccardo Battistini', 'street2.webp', 11, 0, '2020-03-21', 'portrait', 'street', 'cippa.pino@prints.com'),
('Street print n.3', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Davide Rossi', 'street3.webp', 21, 0, '2020-01-23', 'portrait', 'street', 'cippa.pino@prints.com'),
('Street print n.4', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Luca Fabri', 'street4.webp', 9, 0, '2020-08-23', 'portrait', 'street', 'cippa.pino@prints.com'),
('The Persistence of Memory', 'The Persistence of Memory (Spanish: La persistencia de la memoria) is a 1931 painting by artist Salvador Dalí and one of the most recognizable works of Surrealism. First shown at the Julien Levy Gallery in 1932, since 1934 the painting has been in the collection of the Museum of Modern Art (MoMA) in New York City, which received it from an anonymous donor.', 'Salvador Dalì', 'la_persistenza_della_memoria.jpeg', 110, 0, '2020-01-19', 'landscape', 'Fine arts', 'cippa.pino@prints.com'),
('Wheatfield with Crows', 'Wheatfield with Crows is a July 1890 painting by Vincent van Gogh. It has been cited by several critics as one of his greatest works. It is commonly stated that this was van Gogh\'s final painting. However, art historians are uncertain as to which painting was van Gogh\'s last, as no clear historical records exist.', 'Van Gogh', 'campo_di_grano_volo_di_corvi.jpeg', 100, 0, '2020-04-27', 'landscape', 'Fine arts', 'cippa.pino@prints.com'),
('White building', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Davide Rossi', 'architecture4.webp', 50, 0, '2020-06-16', 'landscape', 'Architecture', 'cippa.pino@prints.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `Prints_order`
--

CREATE TABLE `Prints_order` (
  `Order_id` int(11) NOT NULL,
  `Ship_city` char(140) DEFAULT NULL,
  `Ship_postal_code` int(11) DEFAULT NULL,
  `Ship_address` char(140) DEFAULT NULL,
  `Order_date` date NOT NULL,
  `Shipped_date` date DEFAULT NULL,
  `Email` char(140) NOT NULL,
  `Card_number` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Print_technique`
--

CREATE TABLE `Print_technique` (
  `Technique_id` char(9) NOT NULL,
  `Image` char(50) NOT NULL,
  `Description` char(140) NOT NULL,
  `Price_per_cm2` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Print_technique`
--

INSERT INTO `Print_technique` (`Technique_id`, `Image`, `Description`, `Price_per_cm2`) VALUES
('01', 'canvas.webp', 'Print on Artist\'s Canvas', 12),
('02', 'handmade.webp', 'Hand painted oil painting on Canvas', 12),
('03', 'varnished.webp', 'Print on Varnished Canvas', 2),
('04', 'craft.webp', 'Print on Craft Paper', 6),
('05', 'satin.webp', 'Print on Satin Photographic Paper', 3),
('06', 'watercolor.webp', 'Print on Watercolor', 4),
('07', 'wood.webp', 'Print on natural wood', 9),
('08', 'plexiglas.webp', 'Print on Plexiglas', 5),
('09', 'glass.webp', 'Print on Glass', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `Shipper`
--

CREATE TABLE `Shipper` (
  `Company_name` char(140) NOT NULL,
  `Phone` char(15) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Shipper`
--

INSERT INTO `Shipper` (`Company_name`, `Phone`, `Price`) VALUES
('Bartolini', '0712345678', 5),
('DHL Express', '0719427618', 0),
('SDA Carrier Express', '0714212345', 7.5),
('UPS', '0714562718', 15.5);

-- --------------------------------------------------------

--
-- Struttura della tabella `Tracking_notification`
--

CREATE TABLE `Tracking_notification` (
  `Tracking_notification_id` int(11) NOT NULL,
  `Description` char(140) NOT NULL,
  `Data` date NOT NULL,
  `City` char(140) NOT NULL,
  `Postal_code` int(11) NOT NULL,
  `Address` char(140) NOT NULL,
  `Order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `User`
--

CREATE TABLE `User` (
  `Email` char(140) NOT NULL,
  `Birth_date` date NOT NULL,
  `Password` char(140) NOT NULL,
  `Name` char(140) NOT NULL,
  `Surname` char(140) NOT NULL,
  `Phone` char(140) NOT NULL,
  `City` char(140) NOT NULL,
  `Postal_code` int(11) NOT NULL,
  `Province` char(140) NOT NULL,
  `Address` char(140) NOT NULL,
  `Role` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `User`
--

INSERT INTO `User` (`Email`, `Birth_date`, `Password`, `Name`, `Surname`, `Phone`, `City`, `Postal_code`, `Province`, `Address`, `Role`) VALUES
('cippa.pino@prints.com', '1990-01-20', 'pass2020', 'Cippa', 'Pino', '0714512309', 'Cesena', 47521, 'FC', 'Via Giuseppe Ungaretti', 'seller'),
('gino.lippa@prints.com', '1996-10-17', 'pass2020', 'Gino', 'Lippa', '0714529816', 'Senigallia', 60019, 'AN', 'Viale dei pini 11', 'customer');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Art_print`
--
ALTER TABLE `Art_print`
  ADD PRIMARY KEY (`Picture_title`,`Technique_id`),
  ADD UNIQUE KEY `ID_Art_print_IND` (`Picture_title`,`Technique_id`),
  ADD KEY `REF_Art_p_Print_IND` (`Technique_id`);

--
-- Indici per le tabelle `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`Name`),
  ADD UNIQUE KEY `ID_Category_IND` (`Name`);

--
-- Indici per le tabelle `Credit_Card`
--
ALTER TABLE `Credit_Card`
  ADD PRIMARY KEY (`Number`),
  ADD UNIQUE KEY `ID_Credit_Card_IND` (`Number`);

--
-- Indici per le tabelle `Final_product`
--
ALTER TABLE `Final_product`
  ADD PRIMARY KEY (`Picture_title`,`Technique_id`,`Frame_id`,`Passpartout_id`),
  ADD UNIQUE KEY `ID_Final_product_IND` (`Picture_title`,`Technique_id`,`Frame_id`,`Passpartout_id`),
  ADD KEY `EQU_Final_Print_IND` (`Order_id`),
  ADD KEY `REF_Final_Passp_IND` (`Passpartout_id`),
  ADD KEY `REF_Final_Frame_IND` (`Frame_id`),
  ADD KEY `REF_Final_Shipp_IND` (`Company_name`);

--
-- Indici per le tabelle `Frame`
--
ALTER TABLE `Frame`
  ADD PRIMARY KEY (`Frame_id`),
  ADD UNIQUE KEY `ID_Frame_IND` (`Frame_id`);

--
-- Indici per le tabelle `Make_frame_available`
--
ALTER TABLE `Make_frame_available`
  ADD PRIMARY KEY (`Frame_id`,`Email`),
  ADD UNIQUE KEY `ID_Make_frame_available_IND` (`Frame_id`,`Email`),
  ADD KEY `REF_Make__User_1_IND` (`Email`);

--
-- Indici per le tabelle `Make_passpartout_available`
--
ALTER TABLE `Make_passpartout_available`
  ADD PRIMARY KEY (`Passpartout_id`,`Email`),
  ADD UNIQUE KEY `ID_Make_passpartout_available_IND` (`Passpartout_id`,`Email`),
  ADD KEY `REF_Make__User_IND` (`Email`);

--
-- Indici per le tabelle `Passpartout`
--
ALTER TABLE `Passpartout`
  ADD PRIMARY KEY (`Passpartout_id`),
  ADD UNIQUE KEY `ID_Passpartout_IND` (`Passpartout_id`);

--
-- Indici per le tabelle `Payment_Info`
--
ALTER TABLE `Payment_Info`
  ADD PRIMARY KEY (`Email`,`Card_number`),
  ADD UNIQUE KEY `ID_Payment_Info_IND` (`Email`,`Card_number`),
  ADD KEY `REF_Payme_Credi_IND` (`Card_number`);

--
-- Indici per le tabelle `Picture`
--
ALTER TABLE `Picture`
  ADD PRIMARY KEY (`Title`),
  ADD UNIQUE KEY `ID_Picture_IND` (`Title`),
  ADD KEY `REF_Pictu_Categ_IND` (`Category_name`),
  ADD KEY `REF_Pictu_User_IND` (`Email`);

--
-- Indici per le tabelle `Prints_order`
--
ALTER TABLE `Prints_order`
  ADD PRIMARY KEY (`Order_id`),
  ADD UNIQUE KEY `ID_Prints_order_IND` (`Order_id`),
  ADD KEY `REF_Print_Payme_IND` (`Email`,`Card_number`);

--
-- Indici per le tabelle `Print_technique`
--
ALTER TABLE `Print_technique`
  ADD PRIMARY KEY (`Technique_id`),
  ADD UNIQUE KEY `ID_Print_technique_IND` (`Technique_id`);

--
-- Indici per le tabelle `Shipper`
--
ALTER TABLE `Shipper`
  ADD PRIMARY KEY (`Company_name`),
  ADD UNIQUE KEY `ID_Shipper_IND` (`Company_name`);

--
-- Indici per le tabelle `Tracking_notification`
--
ALTER TABLE `Tracking_notification`
  ADD PRIMARY KEY (`Tracking_notification_id`),
  ADD UNIQUE KEY `ID_Tracking_notification_IND` (`Tracking_notification_id`),
  ADD KEY `REF_Track_Print_IND` (`Order_id`);

--
-- Indici per le tabelle `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `ID_User_IND` (`Email`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Art_print`
--
ALTER TABLE `Art_print`
  ADD CONSTRAINT `REF_Art_p_Pictu` FOREIGN KEY (`Picture_title`) REFERENCES `Picture` (`Title`),
  ADD CONSTRAINT `REF_Art_p_Print_FK` FOREIGN KEY (`Technique_id`) REFERENCES `Print_technique` (`Technique_id`);

--
-- Limiti per la tabella `Final_product`
--
ALTER TABLE `Final_product`
  ADD CONSTRAINT `EQU_Final_Print_FK` FOREIGN KEY (`Order_id`) REFERENCES `Prints_order` (`Order_id`),
  ADD CONSTRAINT `REF_Final_Art_p` FOREIGN KEY (`Picture_title`,`Technique_id`) REFERENCES `Art_print` (`Picture_title`, `Technique_id`),
  ADD CONSTRAINT `REF_Final_Frame_FK` FOREIGN KEY (`Frame_id`) REFERENCES `Frame` (`Frame_id`),
  ADD CONSTRAINT `REF_Final_Passp_FK` FOREIGN KEY (`Passpartout_id`) REFERENCES `Passpartout` (`Passpartout_id`),
  ADD CONSTRAINT `REF_Final_Shipp_FK` FOREIGN KEY (`Company_name`) REFERENCES `Shipper` (`Company_name`);

--
-- Limiti per la tabella `Make_frame_available`
--
ALTER TABLE `Make_frame_available`
  ADD CONSTRAINT `REF_Make__Frame` FOREIGN KEY (`Frame_id`) REFERENCES `Frame` (`Frame_id`),
  ADD CONSTRAINT `REF_Make__User_1_FK` FOREIGN KEY (`Email`) REFERENCES `User` (`Email`);

--
-- Limiti per la tabella `Make_passpartout_available`
--
ALTER TABLE `Make_passpartout_available`
  ADD CONSTRAINT `REF_Make__Passp` FOREIGN KEY (`Passpartout_id`) REFERENCES `Passpartout` (`Passpartout_id`),
  ADD CONSTRAINT `REF_Make__User_FK` FOREIGN KEY (`Email`) REFERENCES `User` (`Email`);

--
-- Limiti per la tabella `Payment_Info`
--
ALTER TABLE `Payment_Info`
  ADD CONSTRAINT `REF_Payme_Credi_FK` FOREIGN KEY (`Card_number`) REFERENCES `Credit_Card` (`Number`),
  ADD CONSTRAINT `REF_Payme_User` FOREIGN KEY (`Email`) REFERENCES `User` (`Email`);

--
-- Limiti per la tabella `Picture`
--
ALTER TABLE `Picture`
  ADD CONSTRAINT `REF_Pictu_Categ_FK` FOREIGN KEY (`Category_name`) REFERENCES `Category` (`Name`),
  ADD CONSTRAINT `REF_Pictu_User_FK` FOREIGN KEY (`Email`) REFERENCES `User` (`Email`);

--
-- Limiti per la tabella `Prints_order`
--
ALTER TABLE `Prints_order`
  ADD CONSTRAINT `REF_Print_Payme_FK` FOREIGN KEY (`Email`,`Card_number`) REFERENCES `Payment_Info` (`Email`, `Card_number`);

--
-- Limiti per la tabella `Tracking_notification`
--
ALTER TABLE `Tracking_notification`
  ADD CONSTRAINT `REF_Track_Print_FK` FOREIGN KEY (`Order_id`) REFERENCES `Prints_order` (`Order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
