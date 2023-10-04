
CREATE DATABASE IF NOT EXISTS `garage`;
USE `garage`;

CREATE TABLE IF NOT EXISTS `reservations` (
  `id_reservation` int NOT NULL AUTO_INCREMENT,
  `id_voiture` int NOT NULL,
  `id_utilisateur` int NOT NULL,
  `date_reservation` date DEFAULT NULL,
  PRIMARY KEY (`id_reservation`)
)AUTO_INCREMENT=39;

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `admin` int DEFAULT '0',
  PRIMARY KEY (`id_utilisateur`) USING BTREE,
  UNIQUE KEY `nom_utilisateur` (`nom`) USING BTREE
);

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `mdp`, `admin`) VALUES
	(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1),
	(37, 'examSIO2', 'dc060395e7e599451e023c57a41e2b3d59f3f06c774716dc17262fd27d868d76', 0);

CREATE TABLE IF NOT EXISTS `voitures` (
  `id_voiture` int NOT NULL AUTO_INCREMENT,
  `immatriculation` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL DEFAULT 'voiture',
  `date_mise_en_circulation` date NOT NULL,
  `prix` int NOT NULL,
  `date_entree_garage` date NOT NULL,
  `puissance` int NOT NULL,
  `type_carburant` varchar(255) NOT NULL DEFAULT 'essence',
  `description` text,
  `photo` varchar(255) DEFAULT NULL,
  `etat_reservation` int DEFAULT '0',
  PRIMARY KEY (`id_voiture`) USING BTREE,
  UNIQUE KEY `immatriculation` (`immatriculation`)
);

INSERT INTO `voitures` (`id_voiture`, `immatriculation`, `marque`, `modele`, `categorie`, `date_mise_en_circulation`, `prix`, `date_entree_garage`, `puissance`, `type_carburant`, `description`, `photo`, `etat_reservation`) VALUES
	(48, '2ch', 'Citroën', '2CH', 'Citadine', '2005-05-05', 100000, '2020-05-05', 2, 'Essence', 'Citroën 2CV', '/images/voitures/2ch.jpg', 0),
	(49, '206', 'Peugeot', '206', 'Citadine', '2005-05-05', 500000, '2020-05-05', 100, 'Essence', '206', '/images/voitures/206.jpg', 0),
	(50, '308', 'Peugeot', '308', 'Citadine', '2005-05-05', 5000, '2020-05-05', 100, 'Diesel', '308', '/images/voitures/308gti.jpg', 0),
	(51, 'C15', 'Citroën', 'C15', 'Utilitaire', '2020-05-05', 15, '2020-05-05', 15, 'Essence', 'Citroën C15', '/images/voitures/c15.jpg', 0),
	(52, 'Duster', 'Dacia', 'Duster', 'SUV', '2002-05-05', 5000, '2020-05-05', 50, 'Essence', 'Dacia duster', '/images/voitures/duster.jpg', 0),
	(53, 'Fiat Elodie', 'Fiat', '500 Elodie', 'Citadine', '2020-05-05', 50, '2021-05-05', 5, 'Essence', 'Fiat 500 Elodie', '/images/voitures/élodie en voiture.png', 0),
	(54, 'Ranger', 'Ford', 'Ranger', 'SUV', '2002-05-05', 5000, '2020-05-05', 200, 'Diesel', 'Ford Ranger', '/images/voitures/ford ranger.jpg', 0),
	(55, 'Rémi', 'Jeep', 'Rémi', 'Poids-lourd', '2020-05-05', 1, '2020-05-05', 1, 'Diesel', 'Jeep rémi', '/images/voitures/IMG_20230330_150959.jpg', 0),
	(56, 'Jong Jong', 'Smart', 'Jong Jong', 'Poids-lourd', '2020-05-05', 1, '0202-02-05', 1, 'Diesel', 'Smart Jong Jong', '/images/voitures/IMG_20230516_071338.jpg', 0),
	(57, 'Panda 4x4', 'Fiat', 'Panda 4x4', 'SUV', '2020-05-05', 5, '2020-02-02', 50, 'Essence', 'Fiat panda 4x4', '/images/voitures/panda_4x4.jpg', 0),
	(58, 'Partner', 'Peugeot', 'Partner', 'Utilitaire', '5200-05-05', 500, '2020-02-02', 50, 'Diesel', 'Peugeot Partner', '/images/voitures/partner.jpg', 0),
	(59, 'RAM', 'RAM', '3500', 'SUV', '2011-11-11', 56563, '5222-02-25', 500, 'Diesel', 'RAM 3500', '/images/voitures/ram3500.jpg', 0),
	(60, 'Sus', 'Peugeot', 'Baptiste', 'Moto', '2015-03-26', 5356, '2024-05-12', 1, 'Diesel', 'Baptiste', '/images/voitures/Screenshot_2023_0417_185535.png', 0),
	(61, 'e208', 'Peugeot', 'e208', 'Citadine', '2020-05-05', 20000, '2022-05-05', 300, 'Electrique', 'e208', '/images/voitures/e208.jpg', 0),
	(62, 'scenic', 'Renault', 'Scenic', 'SUV', '2004-02-28', 55500, '2015-08-15', 50, 'Essence', 'scenic', '/images/voitures/scenic.jpg', 0),
	(63, 'c3', 'Citroën', 'c3', 'Citadine', '2020-05-05', 20000, '2022-10-10', 70, 'Diesel', 'c3', '/images/voitures/c3.jpg', 0);
