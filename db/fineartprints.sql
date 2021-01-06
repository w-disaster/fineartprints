-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Gen 06, 2021 alle 21:31
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
-- Struttura della tabella `art_print`
--

CREATE TABLE `art_print` (
  `Technique_id` int(5) NOT NULL DEFAULT 0,
  `Picture_title` char(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `art_print`
--

INSERT INTO `art_print` (`Technique_id`, `Picture_title`) VALUES
(0, 'Abstract print n.1'),
(1, 'Abstract print n.1'),
(2, 'Abstract print n.1'),
(3, 'Abstract print n.1'),
(4, 'Abstract print n.1'),
(5, 'Abstract print n.1'),
(0, 'Abstract print n.2'),
(2, 'Abstract print n.2'),
(3, 'Abstract print n.2'),
(4, 'Abstract print n.2'),
(5, 'Abstract print n.2'),
(6, 'Abstract print n.2'),
(0, 'Abstract print n.3'),
(3, 'Abstract print n.3'),
(4, 'Abstract print n.3'),
(5, 'Abstract print n.3'),
(6, 'Abstract print n.3'),
(7, 'Abstract print n.3'),
(0, 'Abstract print n.4'),
(4, 'Abstract print n.4'),
(5, 'Abstract print n.4'),
(6, 'Abstract print n.4'),
(7, 'Abstract print n.4'),
(8, 'Abstract print n.4'),
(0, 'Abstract print n.5'),
(5, 'Abstract print n.5'),
(6, 'Abstract print n.5'),
(7, 'Abstract print n.5'),
(8, 'Abstract print n.5'),
(9, 'Abstract print n.5'),
(0, 'Abstract print n.6'),
(5, 'Abstract print n.6'),
(6, 'Abstract print n.6'),
(7, 'Abstract print n.6'),
(8, 'Abstract print n.6'),
(9, 'Abstract print n.6'),
(0, 'After Lunch (The Trellis)'),
(1, 'After Lunch (The Trellis)'),
(2, 'After Lunch (The Trellis)'),
(3, 'After Lunch (The Trellis)'),
(4, 'After Lunch (The Trellis)'),
(5, 'After Lunch (The Trellis)'),
(6, 'After Lunch (The Trellis)'),
(7, 'After Lunch (The Trellis)'),
(8, 'After Lunch (The Trellis)'),
(9, 'After Lunch (The Trellis)'),
(0, 'Black and white building'),
(1, 'Black and white building'),
(2, 'Black and white building'),
(3, 'Black and white building'),
(4, 'Black and white building'),
(5, 'Black and white building'),
(0, 'Film print n.1'),
(5, 'Film print n.1'),
(9, 'Film print n.1'),
(0, 'Film print n.2'),
(5, 'Film print n.2'),
(9, 'Film print n.2'),
(0, 'Film print n.3'),
(5, 'Film print n.3'),
(9, 'Film print n.3'),
(0, 'Film print n.4'),
(5, 'Film print n.4'),
(9, 'Film print n.4'),
(0, 'Film print n.5'),
(5, 'Film print n.5'),
(9, 'Film print n.5'),
(0, 'Girl with a Pearl Earring'),
(1, 'Girl with a pearl earring'),
(2, 'Girl with a pearl earring'),
(3, 'Girl with a pearl earring'),
(4, 'Girl with a pearl earring'),
(5, 'Girl with a pearl earring'),
(6, 'Girl with a pearl earring'),
(7, 'Girl with a pearl earring'),
(8, 'Girl with a pearl earring'),
(9, 'Girl with a pearl earring'),
(0, 'Golconda'),
(1, 'Golconda'),
(2, 'Golconda'),
(3, 'Golconda'),
(4, 'Golconda'),
(5, 'Golconda'),
(6, 'Golconda'),
(7, 'Golconda'),
(8, 'Golconda'),
(9, 'Golconda'),
(0, 'Impression, Sunrise'),
(1, 'Impression, Sunrise'),
(2, 'Impression, Sunrise'),
(3, 'Impression, Sunrise'),
(4, 'Impression, Sunrise'),
(5, 'Impression, Sunrise'),
(6, 'Impression, Sunrise'),
(7, 'Impression, Sunrise'),
(8, 'Impression, Sunrise'),
(9, 'Impression, Sunrise'),
(0, 'Lady with an Ermine'),
(1, 'Lady with an Ermine'),
(2, 'Lady with an Ermine'),
(3, 'Lady with an Ermine'),
(4, 'Lady with an Ermine'),
(5, 'Lady with an Ermine'),
(6, 'Lady with an Ermine'),
(7, 'Lady with an Ermine'),
(8, 'Lady with an Ermine'),
(9, 'Lady with an Ermine'),
(0, 'Modern spiral building'),
(3, 'Modern spiral building'),
(4, 'Modern spiral building'),
(5, 'Modern spiral building'),
(6, 'Modern spiral building'),
(7, 'Modern spiral building'),
(0, 'Nature print n.1'),
(5, 'Nature print n.1'),
(9, 'Nature print n.1'),
(0, 'Nature print n.2'),
(5, 'Nature print n.2'),
(9, 'Nature print n.2'),
(0, 'Nature print n.3'),
(5, 'Nature print n.3'),
(9, 'Nature print n.3'),
(0, 'Nature print n.4'),
(5, 'Nature print n.4'),
(9, 'Nature print n.4'),
(0, 'Nature print n.5'),
(5, 'Nature print n.5'),
(9, 'Nature print n.5'),
(0, 'Nature print n.6'),
(5, 'Nature print n.6'),
(9, 'Nature print n.6'),
(0, 'Nature print n.7'),
(5, 'Nature print n.7'),
(9, 'Nature print n.7'),
(0, 'Portrait of Joseph Roulin'),
(1, 'Portrait of Joseph Roulin'),
(2, 'Portrait of Joseph Roulin'),
(3, 'Portrait of Joseph Roulin'),
(4, 'Portrait of Joseph Roulin'),
(5, 'Portrait of Joseph Roulin'),
(6, 'Portrait of Joseph Roulin'),
(7, 'Portrait of Joseph Roulin'),
(8, 'Portrait of Joseph Roulin'),
(9, 'Portrait of Joseph Roulin'),
(0, 'Portrait of Lucina Brembati'),
(1, 'Portrait of Lucina Brembati'),
(2, 'Portrait of Lucina Brembati'),
(3, 'Portrait of Lucina Brembati'),
(4, 'Portrait of Lucina Brembati'),
(5, 'Portrait of Lucina Brembati'),
(6, 'Portrait of Lucina Brembati'),
(7, 'Portrait of Lucina Brembati'),
(8, 'Portrait of Lucina Brembati'),
(9, 'Portrait of Lucina Brembati'),
(0, 'Skyscraper on fog'),
(5, 'Skyscraper on fog'),
(6, 'Skyscraper on fog'),
(7, 'Skyscraper on fog'),
(8, 'Skyscraper on fog'),
(9, 'Skyscraper on fog'),
(0, 'Space print n.1'),
(5, 'Space print n.1'),
(9, 'Space print n.1'),
(0, 'Space print n.2'),
(5, 'Space print n.2'),
(9, 'Space print n.2'),
(0, 'Space print n.3'),
(5, 'Space print n.3'),
(9, 'Space print n.3'),
(0, 'Street print n.1'),
(5, 'Street print n.1'),
(9, 'Street print n.1'),
(0, 'Street print n.2'),
(5, 'Street print n.2'),
(9, 'Street print n.2'),
(0, 'Street print n.3'),
(5, 'Street print n.3'),
(9, 'Street print n.3'),
(0, 'Street print n.4'),
(5, 'Street print n.4'),
(9, 'Street print n.4'),
(0, 'Texture and patterns n.1'),
(0, 'Texture and patterns n.2'),
(0, 'Texture and patterns n.3'),
(0, 'Texture and patterns n.4'),
(0, 'The Cardsharps'),
(1, 'The Cardsharps'),
(2, 'The Cardsharps'),
(3, 'The Cardsharps'),
(4, 'The Cardsharps'),
(5, 'The Cardsharps'),
(6, 'The Cardsharps'),
(7, 'The Cardsharps'),
(8, 'The Cardsharps'),
(9, 'The Cardsharps'),
(0, 'The Persistence of Memory'),
(1, 'The persistence of memory'),
(2, 'The persistence of memory'),
(3, 'The persistence of memory'),
(4, 'The persistence of memory'),
(5, 'The persistence of memory'),
(6, 'The persistence of memory'),
(7, 'The persistence of memory'),
(8, 'The persistence of memory'),
(9, 'The persistence of memory'),
(0, 'Wheatfield with Crows'),
(0, 'White building'),
(2, 'White building'),
(3, 'White building'),
(4, 'White building'),
(5, 'White building'),
(6, 'White building');

-- --------------------------------------------------------

--
-- Struttura della tabella `category`
--

CREATE TABLE `category` (
  `Name` char(140) NOT NULL,
  `Image` char(50) NOT NULL,
  `Orientation` char(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `category`
--

INSERT INTO `category` (`Name`, `Image`, `Orientation`) VALUES
('Abstract', 'abstract1.webp', 'portrait'),
('Architecture', 'architecture3.webp', 'landscape'),
('Film', 'film1.webp', 'portrait'),
('Fine arts', 'postman-roulin.jpeg', 'portrait'),
('Nature', 'nature1.webp', 'portrait'),
('Space', 'space1.webp', 'portrait'),
('Street', 'street1.webp', 'portrait'),
('Texture and patterns', 'textureandpatterns1.webp', 'portrait');

-- --------------------------------------------------------

--
-- Struttura della tabella `credit_card`
--

CREATE TABLE `credit_card` (
  `Expire_date` char(10) NOT NULL,
  `Owner` char(140) NOT NULL,
  `Number` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `credit_card`
--

INSERT INTO `credit_card` (`Expire_date`, `Owner`, `Number`) VALUES
('12/40', 'Gino Lippa', 1234567890123456),
('10/50', 'Mario Rossi', 2345678901234567),
('08/34', 'Luigi Gialli', 3456789012345678),
('09/44', 'Giovanni Neri', 4567890123456789);

-- --------------------------------------------------------

--
-- Struttura della tabella `final_product`
--

CREATE TABLE `final_product` (
  `Picture_title` char(140) NOT NULL,
  `Technique_id` int(5) NOT NULL,
  `Frame_id` int(5) NOT NULL,
  `Passpartout_id` int(5) NOT NULL,
  `Art_print_width` int(11) NOT NULL,
  `Art_print_height` int(11) NOT NULL,
  `Order_id` int(11) NOT NULL,
  `Price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `frame`
--

CREATE TABLE `frame` (
  `Frame_id` int(5) NOT NULL,
  `Image` char(50) NOT NULL,
  `Description` char(140) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `frame`
--

INSERT INTO `frame` (`Frame_id`, `Image`, `Description`, `Price`) VALUES
(7819, 'none-pf.webp', 'none', 0),
(7820, 'frame01.webp', 'Vienna Chateau 20 Silver', 47),
(7821, 'frame02.webp', 'Vienna Chateau 20 Gold', 59),
(7822, 'frame03.webp', 'Affresco Oro', 47),
(7823, 'frame04.webp', 'Veneziano Oro 20 Silver', 32),
(7824, 'frame05.webp', 'Fiorentina Oro Antico', 21),
(7825, 'frame06.webp', 'Vienna Chateau 50 Braun', 45),
(7826, 'frame07.webp', 'Palladio 70', 65),
(7827, 'frame08.webp', 'Hermitage Gold', 32),
(7828, 'frame09.webp', 'Hermitage Silver', 17);

-- --------------------------------------------------------

--
-- Struttura della tabella `make_frame_available`
--

CREATE TABLE `make_frame_available` (
  `Email` char(140) NOT NULL,
  `Frame_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `make_frame_available`
--

INSERT INTO `make_frame_available` (`Email`, `Frame_id`) VALUES
('cippa.pino@prints.com', 7819),
('cippa.pino@prints.com', 7820),
('cippa.pino@prints.com', 7821),
('cippa.pino@prints.com', 7822),
('cippa.pino@prints.com', 7823),
('cippa.pino@prints.com', 7824),
('cippa.pino@prints.com', 7825),
('cippa.pino@prints.com', 7826),
('cippa.pino@prints.com', 7827),
('cippa.pino@prints.com', 7828);

-- --------------------------------------------------------

--
-- Struttura della tabella `make_passpartout_available`
--

CREATE TABLE `make_passpartout_available` (
  `Email` char(140) NOT NULL,
  `Passpartout_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `make_passpartout_available`
--

INSERT INTO `make_passpartout_available` (`Email`, `Passpartout_id`) VALUES
('cippa.pino@prints.com', 8000),
('cippa.pino@prints.com', 8001),
('cippa.pino@prints.com', 8002),
('cippa.pino@prints.com', 8003),
('cippa.pino@prints.com', 8004),
('cippa.pino@prints.com', 8005),
('cippa.pino@prints.com', 8006);

-- --------------------------------------------------------

--
-- Struttura della tabella `passpartout`
--

CREATE TABLE `passpartout` (
  `Passpartout_id` int(5) NOT NULL,
  `Image` char(50) NOT NULL,
  `Specifications` char(140) NOT NULL,
  `Price_per_cm2` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `passpartout`
--

INSERT INTO `passpartout` (`Passpartout_id`, `Image`, `Specifications`, `Price_per_cm2`) VALUES
(8000, 'none-pf.webp', 'none', 0),
(8001, 'pass01.webp', 'Bianco', 11),
(8002, 'pass02.webp', 'Bianco Naturale', 12.24),
(8003, 'pass03.webp', 'Nero', 12.24),
(8004, 'pass04.webp', 'Newport Blue', 15.23),
(8005, 'pass05.webp', 'Williams Green', 14.23),
(8006, 'pass06.webp', 'Chinese Red', 12.24);

-- --------------------------------------------------------

--
-- Struttura della tabella `payment_info`
--

CREATE TABLE `payment_info` (
  `Card_number` bigint(20) NOT NULL,
  `Email` char(140) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'in use'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `payment_info`
--

INSERT INTO `payment_info` (`Card_number`, `Email`, `Status`) VALUES
(1234567890123456, 'gino.lippa@prints.com', 'in use'),
(2345678901234567, 'gino.lippa@prints.com', 'in use');

-- --------------------------------------------------------

--
-- Struttura della tabella `picture`
--

CREATE TABLE `picture` (
  `Title` char(140) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Author` char(140) NOT NULL,
  `Image` char(50) NOT NULL,
  `Base_price` float NOT NULL,
  `Discount` float NOT NULL DEFAULT 0,
  `Publish_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Orientation` char(140) NOT NULL,
  `Category_name` char(140) NOT NULL,
  `Email` char(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `picture`
--

INSERT INTO `picture` (`Title`, `Description`, `Author`, `Image`, `Base_price`, `Discount`, `Publish_date`, `Orientation`, `Category_name`, `Email`) VALUES
('Abstract print n.1', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'abstract1.webp', 50, 20, '2020-12-30 10:44:11', 'portrait', 'Abstract', 'cippa.pino@prints.com'),
('Abstract print n.2', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'abstract2.webp', 80, 0, '2020-11-04 23:00:00', 'portrait', 'Abstract', 'cippa.pino@prints.com'),
('Abstract print n.3', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'abstract3.webp', 90, 0, '2020-10-21 22:00:00', 'landscape', 'Abstract', 'cippa.pino@prints.com'),
('Abstract print n.4', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Davide Rossi', 'abstract4.webp', 110, 50, '2020-12-30 10:44:11', 'landscape', 'Abstract', 'cippa.pino@prints.com'),
('Abstract print n.5', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Davide Rossi', 'abstract5.webp', 80, 0, '2020-02-07 23:00:00', 'landscape', 'Abstract', 'cippa.pino@prints.com'),
('Abstract print n.6', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'abstract6.webp', 80, 0, '2020-01-05 23:00:00', 'portrait', 'Abstract', 'cippa.pino@prints.com'),
('After Lunch (The Trellis)', 'The canvas was painted by Lega in 1868 at Piagentina, the place in the hills around Florence where he had gone to live in 1861 and where many of the other Macchiaioli painters used to gather, drawn by the landscape and the possibility of painting from life. It is one of the artist’s masterpieces, in which he turns an affectionate gaze on a bourgeois and feminine world, taking it as the cue for a splendid representation of the landscape carried out in accordance with the principles of the new theory of the macchia or “blot,” with results of the highest quality.\r\nThe myriad hues capturing the sunlight and the cool of the trellis impart a thoroughly natural feel to the stringent, almost Renaissance handling of perspective.', 'Silvestro Lega', 'after-lunch.jpeg', 95, 0, '2020-12-29 11:20:57', 'landscape', 'Fine arts', 'cippa.pino@prints.com'),
('Black and white building', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Davide Rossi', 'architecture1.webp', 50, 10, '2020-12-30 10:44:11', 'landscape', 'Architecture', 'cippa.pino@prints.com'),
('Film print n.1', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Davide Rossi', 'film1.webp', 20, 0, '2020-12-29 11:14:32', 'portrait', 'Film', 'cippa.pino@prints.com'),
('Film print n.2', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Luca Fabri', 'film2.webp', 18, 25, '2020-12-30 10:44:11', 'landscape', 'Film', 'cippa.pino@prints.com'),
('Film print n.3', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Riccardo Battistini', 'film3.webp', 15, 0, '2020-12-29 11:14:38', 'portrait', 'Film', 'cippa.pino@prints.com'),
('Film print n.4', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Luca Fabri', 'film4.webp', 7, 0, '2020-12-29 11:14:53', 'portrait', 'Film', 'cippa.pino@prints.com'),
('Film print n.5', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Riccardo Battistini', 'film5.webp', 9, 0, '2020-12-29 11:14:57', 'portrait', 'Film', 'cippa.pino@prints.com'),
('Girl with a Pearl Earring', 'Girl with a Pearl Earring is Vermeer’s most famous painting. It is not a portrait, but a ‘tronie’ – a painting of an imaginary figure. Tronies depict a certain type or character; in this case a girl in exotic dress, wearing an oriental turban and an improbably large pearl in her ear.\r\n\r\nJohannes Vermeer was the master of light. This is shown here in the softness of the girl’s face and the glimmers of light on her moist lips. And of course, the shining pearl.', 'Johannes Vermeer', 'girl-perl-earring.jpeg', 95, 0, '2020-12-29 11:20:53', 'portrait', 'Fine arts', 'cippa.pino@prints.com'),
('Golconda', 'The piece depicts a scene of \"raining men\", nearly identical to each other dressed in dark overcoats and bowler hats, who seem to be either falling down like rain drops, floating up like helium balloons, or just stationed in mid-air as no movement or motion is implied. The backdrop features red-roofed buildings and a mostly blue partly cloudy sky, lending credence to the theory that the men are not raining. The men are equally spaced in a lattice, facing the viewpoint and receding back in rhombic grid layers. ', 'Renè Magritte', 'golconda-magritte.jpeg', 90, 0, '2020-12-29 11:19:35', 'landscape', 'Fine arts', 'cippa.pino@prints.com'),
('Impression, Sunrise', 'Impression, Sunrise (French: Impression, soleil levant) is a painting by Claude Monet first shown at what would become known as the \"Exhibition of the Impressionists\" in Paris in April, 1874. The painting is credited with inspiring the name of the Impressionist movement. ', 'Claude Monet', 'impression-sunrise.jpeg', 120, 0, '2020-12-29 11:22:21', 'landscape', 'Fine arts', 'cippa.pino@prints.com'),
('Lady with an Ermine', 'The painting was purchased ca. 1800 in Italy, by Adam Jerzy, the son of Princess Izabela Czartoryska, and donated to the Museum in Puławy where it was exhibited in the ‘Gothic House’ from 1809–1830.\r\n\r\nIn Puławy, it was erroneously considered to be a portrait alluding to the beloved mistress of King Francis I of France, referred to as the ‘Belle Ferronière’. We now know that the subject of the portrait is Cecilia Gallerani (ca. 1473-1536), a reputed mistress of Lodovico Sforza, Duke of Milan, also known as ‘il Moro’ (the Moor).', 'Leonardo da Vinci', 'lady-with-ermine.jpeg', 165, 40, '2020-12-30 10:44:11', 'portrait', 'Fine arts', 'cippa.pino@prints.com'),
('Modern spiral building', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Davide Rossi', 'architecture3.webp', 70, 0, '2020-06-02 22:00:00', 'portrait', 'Architecture', 'cippa.pino@prints.com'),
('Nature print n.1', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Davide Rossi', 'nature1.webp', 18, 0, '2020-12-29 11:18:20', 'portrait', 'Nature', 'cippa.pino@prints.com'),
('Nature print n.2', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Riccardo Battistini', 'nature2.webp', 23, 0, '2020-12-29 11:18:26', 'portrait', 'Nature', 'cippa.pino@prints.com'),
('Nature print n.3', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Luca Fabri', 'nature3.webp', 18, 40, '2020-12-30 10:44:11', 'portrait', 'Nature', 'cippa.pino@prints.com'),
('Nature print n.4', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Davide Rossi', 'nature4.webp', 21, 0, '2020-12-29 11:18:35', 'portrait', 'Nature', 'cippa.pino@prints.com'),
('Nature print n.5', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Riccardo Battistini', 'nature5.webp', 22, 0, '2020-12-29 11:18:38', 'landscape', 'Nature', 'cippa.pino@prints.com'),
('Nature print n.6', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Luca Fabri', 'nature6.webp', 23, 0, '2020-12-29 11:18:43', 'landscape', 'Nature', 'cippa.pino@prints.com'),
('Nature print n.7', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Riccardo Battistini', 'nature7.webp', 17, 0, '2020-12-29 11:18:46', 'portrait', 'Nature', 'cippa.pino@prints.com'),
('Portrait of Joseph Roulin', 'Joseph Roulin—who appears in this portrait resplendent in his blue uniform against a floral background that echoes his lush, swirling beard—was among Vincent van Gogh’s most important friends. The two lived on the same street in Arles, in the South of France, where Roulin worked for the postal service. Van Gogh was fascinated by his friend’s face, but he was at least as taken with the man’s character.', 'Van Gogh', 'postman-roulin.jpeg', 90, 0, '2020-12-29 11:22:49', 'portrait', 'Fine arts', 'cippa.pino@prints.com'),
('Portrait of Lucina Brembati', 'The Portrait of Lucina Brembati is a painting by the Italian High Renaissance painter Lorenzo Lotto, dating to c. 1521/23. It is housed in the Accademia Carrara of Bergamo, northern Italy.\r\n\r\nThe work is known since 1882, when the Accademia acquired it from a private collection. The subject was identified later, after the rebus included in it was recognized: the moon in the upper left background contains the inscription \'CI\', which, in Italian, translates as \'CI in Luna\', e.g. \'LuCIna\'; the Brembati coat of arms is instead contained in ring of the woman\'s left forefinger.', 'Lorenzo Lotto', 'portrait-lucina-brembati.jpeg', 78, 0, '2020-12-29 11:20:39', 'portrait', 'Fine arts', 'cippa.pino@prints.com'),
('Skyscraper on fog', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'architecture2.webp', 100, 0, '2020-02-21 23:00:00', 'landscape', 'Architecture', 'cippa.pino@prints.com'),
('Space print n.1', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Luca Fabri', 'space1.webp', 14, 0, '2020-12-29 11:18:50', 'portrait', 'Space', 'cippa.pino@prints.com'),
('Space print n.2', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Riccardo Battistini', 'space2.webp', 25, 0, '2020-12-29 11:18:52', 'landscape', 'Space', 'cippa.pino@prints.com'),
('Space print n.3', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Davide Rossi', 'space3.webp', 37, 0, '2020-12-29 11:18:55', 'landscape', 'Space', 'cippa.pino@prints.com'),
('Street print n.1', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Davide Rossi', 'street1.webp', 21, 0, '2020-12-29 11:19:55', 'portrait', 'Street', 'cippa.pino@prints.com'),
('Street print n.2', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Riccardo Battistini', 'street2.webp', 11, 0, '2020-12-29 11:19:57', 'portrait', 'Street', 'cippa.pino@prints.com'),
('Street print n.3', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Davide Rossi', 'street3.webp', 21, 0, '2020-12-29 11:19:59', 'portrait', 'Street', 'cippa.pino@prints.com'),
('Street print n.4', 'Excepteur enim incididunt mollit aute sint commodo ullamco labore esse. Officia amet consequat duis tempor duis do occaecat eu non aliqua exercitation officia incididunt et. Ipsum ullamco pariatur eiusmod deserunt magna consequat cillum tempor. Nostrud sunt reprehenderit duis ad. Qui eiusmod reprehenderit labore qui ullamco mollit. Sit eiusmod sunt occaecat est nostrud est cupidatat.', 'Luca Fabri', 'street4.webp', 9, 0, '2020-12-29 11:20:01', 'portrait', 'Street', 'cippa.pino@prints.com'),
('Texture and patterns n.1', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'textureandpatterns1.webp', 50, 0, '2021-01-04 11:45:07', 'portrait', 'Texture and patterns', 'cippa.pino@prints.com'),
('Texture and patterns n.2', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'textureandpatterns2.webp', 20, 0, '2020-12-30 16:04:23', 'portrait', 'Texture and patterns', 'cippa.pino@prints.com'),
('Texture and patterns n.3', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'textureandpatterns3.webp', 60, 0, '2020-12-30 16:04:23', 'landscape', 'Texture and patterns', 'cippa.pino@prints.com'),
('Texture and patterns n.4', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Luca Fabri', 'textureandpatterns4.webp', 30, 0, '2020-12-30 16:04:23', 'landscape', 'Texture and patterns', 'cippa.pino@prints.com'),
('The Cardsharps', 'The Cardsharps (painted around 1594) is a painting by the Italian Baroque artist Michelangelo Merisi da Caravaggio. The painting shows an expensively-dressed but unworldly boy playing cards with another boy. The second boy, a cardsharp, has extra cards tucked in his belt behind his back, out of sight of the mark but not the viewer, and a sinister older man is peering over the dupe\'s shoulder and signaling to his young accomplice. The second boy has a dagger handy at his side.', 'Caravaggio', 'the-cardsharps.jpeg', 126, 0, '2020-12-29 11:20:42', 'landscape', 'Fine arts', 'cippa.pino@prints.com'),
('The Persistence of Memory', 'The Persistence of Memory (Spanish: La persistencia de la memoria) is a 1931 painting by artist Salvador Dalí and one of the most recognizable works of Surrealism. First shown at the Julien Levy Gallery in 1932, since 1934 the painting has been in the collection of the Museum of Modern Art (MoMA) in New York City, which received it from an anonymous donor.', 'Salvador Dalì', 'persistence-memory.jpeg', 110, 0, '2020-12-29 11:23:31', 'landscape', 'Fine arts', 'cippa.pino@prints.com'),
('Wheatfield with Crows', 'Wheatfield with Crows is a July 1890 painting by Vincent van Gogh. It has been cited by several critics as one of his greatest works. It is commonly stated that this was van Gogh\'s final painting. However, art historians are uncertain as to which painting was van Gogh\'s last, as no clear historical records exist.', 'Van Gogh', 'wheatfield-crows.jpeg', 100, 0, '2020-12-29 11:21:14', 'landscape', 'Fine arts', 'cippa.pino@prints.com'),
('White building', 'Minim nulla est nostrud dolore mollit id laborum Lorem ullamco aliquip velit qui aliquip. Eu ipsum aute aute proident esse do. Excepteur id Lorem deserunt reprehenderit amet cupidatat. Est do ea est eiusmod sunt proident pariatur ex nostrud esse duis. Ad ipsum esse nulla adipisicing quis occaecat sunt pariatur id non adipisicing. Est magna irure aliqua consequat ut incididunt adipisicing eu ipsum aliquip incididunt. Ipsum laborum magna ex reprehenderit velit.', 'Davide Rossi', 'architecture4.webp', 50, 0, '2020-06-15 22:00:00', 'landscape', 'Architecture', 'cippa.pino@prints.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `prints_order`
--

CREATE TABLE `prints_order` (
  `Order_id` int(11) NOT NULL,
  `Ship_city` char(140) DEFAULT NULL,
  `Ship_postal_code` int(11) DEFAULT NULL,
  `Ship_address` char(140) DEFAULT NULL,
  `Order_date` date NOT NULL,
  `Shipped_date` date DEFAULT NULL,
  `Email` char(140) NOT NULL,
  `Card_number` bigint(20) NOT NULL,
  `Shipper_name` char(140) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'In production'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `print_technique`
--

CREATE TABLE `print_technique` (
  `Technique_id` int(5) NOT NULL,
  `Image` char(50) NOT NULL,
  `Description` char(140) NOT NULL,
  `Price_per_cm2` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `print_technique`
--

INSERT INTO `print_technique` (`Technique_id`, `Image`, `Description`, `Price_per_cm2`) VALUES
(0, 'none.webp', 'none', 0),
(1, 'canvas.webp', 'Print on Artist\'s Canvas', 12),
(2, 'handmade.webp', 'Hand painted oil painting on Canvas', 12),
(3, 'varnished.webp', 'Print on Varnished Canvas', 2),
(4, 'craft.webp', 'Print on Craft Paper', 6),
(5, 'satin.webp', 'Print on Satin Photographic Paper', 3),
(6, 'watercolor.webp', 'Print on Watercolor', 4),
(7, 'wood.webp', 'Print on natural wood', 9),
(8, 'plexiglas.webp', 'Print on Plexiglas', 5),
(9, 'glass.webp', 'Print on Glass', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `shipper`
--

CREATE TABLE `shipper` (
  `Company_name` char(140) NOT NULL,
  `Phone` char(15) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `shipper`
--

INSERT INTO `shipper` (`Company_name`, `Phone`, `Price`) VALUES
('Bartolini', '0712345678', 5),
('DHL Express', '0719427618', 0),
('SDA Carrier Express', '0714212345', 7.5),
('UPS', '0714562718', 15.5);

-- --------------------------------------------------------

--
-- Struttura della tabella `tracking_notification`
--

CREATE TABLE `tracking_notification` (
  `Tracking_notification_id` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Order_id` int(11) NOT NULL,
  `Status` varchar(4) DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `Email` char(140) NOT NULL,
  `Birth_date` date NOT NULL,
  `Password` char(128) NOT NULL,
  `Salt` char(128) NOT NULL,
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
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`Email`, `Birth_date`, `Password`, `Salt`, `Name`, `Surname`, `Phone`, `City`, `Postal_code`, `Province`, `Address`, `Role`) VALUES
('cippa.pino@prints.com', '1990-01-20', '9cadaf9f0e4a1f96bb9a496d3fddef248ecdd5b1d678abb0ab1ed1d1d816f012fa39b45d7381b5eedf73f6f61a6791c6f9c5bf90e179c5c1ece868b8eccb3198', '9ae419866fa9d3705ccd86071d4fee30bc9fd23970fc9e39bdd0a9ea9eef878aedbcfa61a2aaab1b5f2634e3796dc4b573dd28920a70c2d5d4d5a7dd381b83f3', 'Cippa', 'Pino', '0714512309', 'Cesena', 47521, 'FC', 'Via Giuseppe Ungaretti', 'seller'),
('gino.lippa@prints.com', '1996-10-17', '5bfbd82c6885742c68ff2b2a2a9168fb13757c184b3dfe86fe9c2c04ef8483a12680fe31dbab9aab8c8c1dc712d25038397a360a0011c493060954d323377dcc', 'f82544562507f6ac3c0d89daee50e2999f411bcdd52305ef25e56e5bb2db7c7c422584f0a8ef616c74304e6a5c0c1cc31a36f1d365bdd90f7c82edaed5fd79f2', 'Gino', 'Lippa', '714529816', 'Senigallia', 60019, 'AN', 'Viale dei pini 11', 'customer');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `art_print`
--
ALTER TABLE `art_print`
  ADD PRIMARY KEY (`Picture_title`,`Technique_id`),
  ADD UNIQUE KEY `ID_Art_print_IND` (`Picture_title`,`Technique_id`),
  ADD KEY `REF_Art_p_Print_IND` (`Technique_id`);

--
-- Indici per le tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Name`),
  ADD UNIQUE KEY `ID_Category_IND` (`Name`);

--
-- Indici per le tabelle `credit_card`
--
ALTER TABLE `credit_card`
  ADD PRIMARY KEY (`Number`),
  ADD UNIQUE KEY `ID_Credit_Card_IND` (`Number`);

--
-- Indici per le tabelle `final_product`
--
ALTER TABLE `final_product`
  ADD PRIMARY KEY (`Picture_title`,`Technique_id`,`Frame_id`,`Passpartout_id`),
  ADD UNIQUE KEY `ID_Final_product_IND` (`Picture_title`,`Technique_id`,`Frame_id`,`Passpartout_id`),
  ADD KEY `EQU_Final_Print_IND` (`Order_id`),
  ADD KEY `REF_Final_Passp_IND` (`Passpartout_id`),
  ADD KEY `REF_Final_Frame_IND` (`Frame_id`);

--
-- Indici per le tabelle `frame`
--
ALTER TABLE `frame`
  ADD PRIMARY KEY (`Frame_id`),
  ADD UNIQUE KEY `ID_Frame_IND` (`Frame_id`);

--
-- Indici per le tabelle `make_frame_available`
--
ALTER TABLE `make_frame_available`
  ADD PRIMARY KEY (`Frame_id`,`Email`),
  ADD UNIQUE KEY `ID_Make_frame_available_IND` (`Frame_id`,`Email`),
  ADD KEY `REF_Make__User_1_IND` (`Email`);

--
-- Indici per le tabelle `make_passpartout_available`
--
ALTER TABLE `make_passpartout_available`
  ADD PRIMARY KEY (`Passpartout_id`,`Email`),
  ADD UNIQUE KEY `ID_Make_passpartout_available_IND` (`Passpartout_id`,`Email`),
  ADD KEY `REF_Make__User_IND` (`Email`);

--
-- Indici per le tabelle `passpartout`
--
ALTER TABLE `passpartout`
  ADD PRIMARY KEY (`Passpartout_id`),
  ADD UNIQUE KEY `ID_Passpartout_IND` (`Passpartout_id`);

--
-- Indici per le tabelle `payment_info`
--
ALTER TABLE `payment_info`
  ADD PRIMARY KEY (`Email`,`Card_number`),
  ADD UNIQUE KEY `ID_Payment_Info_IND` (`Email`,`Card_number`),
  ADD KEY `REF_Payme_Credi_IND` (`Card_number`);

--
-- Indici per le tabelle `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`Title`),
  ADD UNIQUE KEY `ID_Picture_IND` (`Title`),
  ADD KEY `REF_Pictu_Categ_IND` (`Category_name`),
  ADD KEY `REF_Pictu_User_IND` (`Email`);

--
-- Indici per le tabelle `prints_order`
--
ALTER TABLE `prints_order`
  ADD PRIMARY KEY (`Order_id`),
  ADD UNIQUE KEY `ID_Prints_order_IND` (`Order_id`),
  ADD KEY `REF_Print_Payme_IND` (`Email`,`Card_number`),
  ADD KEY `REF_Shipper_FK` (`Shipper_name`);

--
-- Indici per le tabelle `print_technique`
--
ALTER TABLE `print_technique`
  ADD PRIMARY KEY (`Technique_id`),
  ADD UNIQUE KEY `ID_Print_technique_IND` (`Technique_id`);

--
-- Indici per le tabelle `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`Company_name`),
  ADD UNIQUE KEY `ID_Shipper_IND` (`Company_name`);

--
-- Indici per le tabelle `tracking_notification`
--
ALTER TABLE `tracking_notification`
  ADD PRIMARY KEY (`Tracking_notification_id`),
  ADD UNIQUE KEY `ID_Tracking_notification_IND` (`Tracking_notification_id`),
  ADD KEY `REF_Track_Print_IND` (`Order_id`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `ID_User_IND` (`Email`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `art_print`
--
ALTER TABLE `art_print`
  ADD CONSTRAINT `REF_Art_p_Pictu` FOREIGN KEY (`Picture_title`) REFERENCES `picture` (`Title`),
  ADD CONSTRAINT `REF_Art_p_Print_FK` FOREIGN KEY (`Technique_id`) REFERENCES `print_technique` (`Technique_id`);

--
-- Limiti per la tabella `final_product`
--
ALTER TABLE `final_product`
  ADD CONSTRAINT `EQU_Final_Print_FK` FOREIGN KEY (`Order_id`) REFERENCES `prints_order` (`Order_id`),
  ADD CONSTRAINT `REF_Final_Art_p` FOREIGN KEY (`Picture_title`,`Technique_id`) REFERENCES `art_print` (`Picture_title`, `Technique_id`),
  ADD CONSTRAINT `REF_Final_Frame_FK` FOREIGN KEY (`Frame_id`) REFERENCES `frame` (`Frame_id`),
  ADD CONSTRAINT `REF_Final_Passp_FK` FOREIGN KEY (`Passpartout_id`) REFERENCES `passpartout` (`Passpartout_id`);

--
-- Limiti per la tabella `make_frame_available`
--
ALTER TABLE `make_frame_available`
  ADD CONSTRAINT `REF_Make__Frame` FOREIGN KEY (`Frame_id`) REFERENCES `frame` (`Frame_id`),
  ADD CONSTRAINT `REF_Make__User_1_FK` FOREIGN KEY (`Email`) REFERENCES `user` (`Email`);

--
-- Limiti per la tabella `make_passpartout_available`
--
ALTER TABLE `make_passpartout_available`
  ADD CONSTRAINT `REF_Make__Passp` FOREIGN KEY (`Passpartout_id`) REFERENCES `passpartout` (`Passpartout_id`),
  ADD CONSTRAINT `REF_Make__User_FK` FOREIGN KEY (`Email`) REFERENCES `user` (`Email`);

--
-- Limiti per la tabella `payment_info`
--
ALTER TABLE `payment_info`
  ADD CONSTRAINT `REF_Payme_Credi_FK` FOREIGN KEY (`Card_number`) REFERENCES `credit_card` (`Number`),
  ADD CONSTRAINT `REF_Payme_User` FOREIGN KEY (`Email`) REFERENCES `user` (`Email`);

--
-- Limiti per la tabella `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `REF_Pictu_Categ_FK` FOREIGN KEY (`Category_name`) REFERENCES `category` (`Name`),
  ADD CONSTRAINT `REF_Pictu_User_FK` FOREIGN KEY (`Email`) REFERENCES `user` (`Email`);

--
-- Limiti per la tabella `prints_order`
--
ALTER TABLE `prints_order`
  ADD CONSTRAINT `REF_Print_Payme_FK` FOREIGN KEY (`Email`,`Card_number`) REFERENCES `payment_info` (`Email`, `Card_number`),
  ADD CONSTRAINT `REF_Shipper_FK` FOREIGN KEY (`Shipper_name`) REFERENCES `shipper` (`Company_name`);

--
-- Limiti per la tabella `tracking_notification`
--
ALTER TABLE `tracking_notification`
  ADD CONSTRAINT `REF_Track_Print_FK` FOREIGN KEY (`Order_id`) REFERENCES `prints_order` (`Order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
