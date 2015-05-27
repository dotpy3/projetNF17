/* AJOUTS POUR TESTS */
INSERT INTO club (`id`, `nom`, `site_web`, `coordonnee_dir`)
	VALUES (NULL, 'Equipe de France', 'francekarate.fr', 'france.karate@contact.com');

INSERT INTO `karateka` (`id`, `id_club`, `dans`, `nom`, `poids`, `taille`,`dateNais`, `photo`, `ceinture`)
	VALUES	(NULL, NULL, '4', 'Michaël MILON', '73kg', '172', '03-03-1972', NULL, 'noire');

INSERT INTO `karate_kid`.`competition_katas` (`nom`, `dateComp`, `id_club`, `lieu`, `site_web`, `photos`, `contact`) VALUES
	('Championnat de France', '2015-05-30', '1', 'France', 'champ_france.fr', NULL, 'champ_france@france.fr'),
	('Championnat du Monde', '2015-05-31', '1', 'Russie', 'champ_monde.com', NULL, 'champ_monde@russia.com');	