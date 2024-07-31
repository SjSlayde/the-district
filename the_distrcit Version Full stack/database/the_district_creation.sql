
-- Base de données : `the_district`
--


--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int AUTO_INCREMENT PRIMARY KEY ,
  `libelle` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
) ;



--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `libelle` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_categorie` int NOT NULL REFERENCES categorie(id),
  `active` varchar(10) NOT NULL
) ;


--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
                            `id` int AUTO_INCREMENT PRIMARY KEY,
                            `id_plat` int NOT NULL REFERENCES plat(id),
                            `quantite` int NOT NULL,
                            `total` decimal(10,2) NOT NULL,
                            `date_commande` datetime NOT NULL,
                            `etat` varchar(50) NOT NULL,
                            `nom_client` varchar(150) NOT NULL,
                            `telephone_client` varchar(20) NOT NULL,
                            `email_client` varchar(150) NOT NULL,
                            `adresse_client` varchar(255) NOT NULL
) ;

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `nom_prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ;



