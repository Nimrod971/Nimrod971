-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 08 juin 2021 à 09:21
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `salon_pst_pfh`
--

-- --------------------------------------------------------

--
-- Structure de la table `pst2a`
--

CREATE TABLE `pst2a` (
  `id_EquipePST` int(11) NOT NULL,
  `num_EquipePST` text NOT NULL,
  `nom_PST` text NOT NULL,
  `descriptif_PST` text NOT NULL,
  `equipe_PST` text NOT NULL,
  `image_PST` text NOT NULL,
  `tutor_PST` text NOT NULL,
  `phrase_acroche` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pst3a`
--

CREATE TABLE `pst3a` (
  `id_EquipePST` int(11) NOT NULL,
  `salle` text NOT NULL,
  `horraire` text NOT NULL,
  `num_EquipePST` text NOT NULL,
  `nom_PST` text NOT NULL,
  `descriptif_PST` text NOT NULL,
  `equipe_PST` text NOT NULL,
  `image_PST` text NOT NULL,
  `tutor_PST` text NOT NULL,
  `phrase_acroche` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pst3a`
--

INSERT INTO `pst3a` (`id_EquipePST`, `salle`, `horraire`, `num_EquipePST`, `nom_PST`, `descriptif_PST`, `equipe_PST`, `image_PST`, `tutor_PST`, `phrase_acroche`) VALUES
(1, 'I11', 'AM', 'Equipe 30A ', 'B.I.L.A.L – Boîtier Intelligent Libre pour Automobile Légère', 'Connecté au port OBD, le boîtier B.I.L.A.L accède directement aux données de votre véhicule et traduit les informations afin de suivre sa consommation et sa position en temps réel et en permanence.\r\nGrâce à notre application, vous pouvez consulter vos statistiques trajet ainsi que la position de votre voiture n’importe où et n’importe quand.\r\n', 'TOY-RIONT LE DOSSEUR Elouan (Chef de projet), ARNOUX Julie, \r\nDELIERE Charles,\r\nDELAYE Eliott,\r\nBRILLET Pierre-Louis', 'images_pst3A/B.I.L.A.L.jpg', 'Mme ALKASM Sulaf', 'Un boîtier connecté pour une consommation + responsable'),
(2, 'I02bis', 'PM', 'Equipe 30B', 'The Quest of Tataë\r\n', 'The Quest of TATAË est un RPG pour 3 à 4 joueurs, conçu pour donner le meilleur de ce genre couplé au plaisir du multijoueur. Explorez de sombres cryptes, partez à la recherche d’anciens artefacts et rencontrez de nouveaux alliés dans ce jeu innovant et fun !', 'ARCHAMBEAU Thomas (Chef de Projet),\r\nVAISSAIRE Eléonore,\r\nCHANSOU Tristan,\r\nDESCHAMPS Aymeric,\r\nCLÉMENT Aimeric,\r\n', 'images_pst3A/The Quest of Tataë.jpg\r\n', 'Félicia IONASCU', 'Un RPG multijoueur, c’est pas banal !'),
(3, 'I02', 'AM', 'Equipe 30C', 'Borne COVID', 'PAS ENVOYER', 'HAASTRUP THEO (Chef de Projet),\r\nFRATACCI Emeline,\r\nBERNARD Hippolyte,\r\nETHEVE Gabriel,\r\nMOUTASSAMY Jahmali\r\n', 'PAS ENVOYER', 'Chiraz TRABELSI', 'PAS ENVOYER'),
(4, 'I02bis', 'PM', 'Equipe 30D', 'ERGO DOMO', 'Les « smart house » sont des maisons entièrement connectées permettant notamment au propriétaire de garder le contrôle sur son domicile peu importe sa localisation.  Le PST « Ergo Domo » vise à reproduire une maquette d’une maison contenant les fonctionnalités que l’on pourrait retrouver au sein d’une smart house. Ainsi, c’est à travers l\'application Blynk » que l’utilisateur peut la contrôler.', 'CHU YEW YEE Andréa\r\nALVES Quentin\r\nTENAILLEAU Sarah-Angélique\r\nFENG Xinyao\r\nBENMEHIDI Takia\r\n', 'images_pst3A\\ERGO DOMO.png', 'Nadine KHODOR', 'Parce que VOUS méritez une BONNE maison.'),
(5, 'I11', 'AM', 'Equipe 30E', 'F.D.B.', 'Notre projet s\'intitule FDB, ce nom a été donné en raison des différentes significations qu\'il avait pour nous, telles que «Fais Des Billets» (Gagner de l\'argent) ou «Fais Du Bitcoin».\r\nEn effet, l’objectif fondamental de notre projet est de créer un logiciel permettant à un utilisateur de tester la stratégie de trading, avec l\'utilisation d\'API et de courtiers. Nous voulons que ce logiciel soit facile d\'accès, et majoritairement ajustable en fonction des techniques ou des sentiments de l’utilisateur en matière de marchés financiers. Ce projet fusionne à la fois notre passion, notre intérêt et nos études, et présente une belle opportunité de valoriser de manière parallèle nos compétences en ingénierie et nos connaissances financières.\r\n', 'OZOUF Jonathan,\r\nAMALAN KANNAN Baptiste,\r\nRENAUD--PARREIRA Anthony,\r\nMEYER Alexandre,\r\nSCEMAMA Johanne,\r\nGENOVESE Mélissa\r\n', 'images_pst3A\\F.D.B.jpg', 'Nadine KHODOR', 'La Meilleure Stratégie de Trading est l’Automatisation.'),
(6, '', '', 'Equipe 31A', 'Vidéo surveillance & streaming\r\n', 'En quelques clics, bénéficiez d’une surveillance de votre domicile.\r\n\r\nIl vous suffira d’installer nos caméras, serveur et application afin de surveiller votre domicile.\r\n\r\nNotre algorithme permet de détecter les intrus qui pénètrent chez vous. Il utilise la détection humaine. \r\n\r\nUne alerte vous sera envoyée pour vous permettre de visionner les caméras en temps réel et de conserver l’enregistrement vidéo.\r\n', 'NOUAR Manelle,\r\nPROUX Angélique, \r\nLEJEUNE Gael, \r\nCHAUVREAU-MANAT Steve, \r\nOBADI Anas, \r\nBELRHITI ALAOUI Habiba\r\n', 'images_pst3A/VIDÉO SURVEILLANCE & STREAMING.jpg\r\n', 'Vlad VALICA', 'Travaillons ensemble pour votre sécurité au quotidien !'),
(7, '', '', 'Equipe 31B', 'Monture équatoriale de téléscope\r\n', 'Notre projet vise la fabrication d’une monture équatoriale de télescope dite « GoTo », complètement autonome : une monture automatisée dans le pointage de l’astre que l’on souhaite observer, disponible dans une base de données logicielle sur un ordinateur. Cette monture est transportable partout : il lui suffit d’un support et d’un ordinateur. Choisissez votre étoile, et observez !', 'BUI Sylvain,\r\nCOLLATY Srikanth,\r\nMADAD Sarra,\r\nLOUATY Nour-El-Houda,\r\nLECLERC Maxence\r\n', 'images_pst3A/Monture équatoriale de téléscope.jpg\r\n', 'Sylvie ZAGO \r\n', '« Le ciel n’a jamais été aussi près. »');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pst2a`
--
ALTER TABLE `pst2a`
  ADD PRIMARY KEY (`id_EquipePST`);

--
-- Index pour la table `pst3a`
--
ALTER TABLE `pst3a`
  ADD PRIMARY KEY (`id_EquipePST`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
