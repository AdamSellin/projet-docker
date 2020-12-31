CREATE TABLE IF NOT EXISTS `contacts` ( `id` int(11) NOT NULL AUTO_INCREMENT, `nom` varchar(50) NOT NULL, `prenom` varchar(50) NOT NULL, `email` varchar(50) NOT NULL, `date_naissance` date NOT NULL, `telephone` varchar(10) NOT NULL, `idParent` varchar(50) NOT NULL, PRIMARY KEY (`id`), KEY `idParent` (`idParent`) ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8

INSERT INTO `contacts` (`id`, `nom`, `prenom`, `email`, `date_naissance`, `telephone`, `idParent`) VALUES (3, 'Russeil', 'Margaux', 'margaux.russeil@gmail.com', '1999-09-19', '0652414247', 'Margaux'), (4, 'Russeil', 'Sylvie', 'Fasm.rus@free.fr', '1969-01-06', '0680913411', 'Sylvie')

CREATE TABLE IF NOT EXISTS `profils` ( `identifiant` varchar(50) NOT NULL, `mdp` varchar(50) NOT NULL, `nom` varchar(50) NOT NULL, `prenom` varchar(50) NOT NULL, `date_naissance` date NOT NULL, `email` varchar(50) NOT NULL, `telephone` varchar(10) NOT NULL, PRIMARY KEY (`identifiant`), KEY `identifiant` (`identifiant`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8

INSERT INTO `profils` (`identifiant`, `mdp`, `nom`, `prenom`, `date_naissance`, `email`, `telephone`) VALUES ('Margaux', 'azerty', 'Russeil', 'Margaux', '1999-09-19', 'margaux.russeil@gmail.com', '0652414247'), ('Sylvie', 'azerty', 'Russeil', 'Sylvie', '1969-01-06', 'Fasm.rus@free.fr', '0680513461')
