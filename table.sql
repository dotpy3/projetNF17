CREATE TABLE club (
	`id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(100) NOT NULL,
	`site_web` VARCHAR(200),
	`coordonnee_dir` VARCHAR(200) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE professeur (
	`id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`id_club` BIGINT(20) NOT NULL,
	`nom` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `professeur`
  ADD CONSTRAINT `fk_professeur_id_club` FOREIGN KEY (`id_club`) REFERENCES `club`(`id`);

CREATE TABLE karateka (
	`id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`id_club` BIGINT(20) NOT NULL,
	`dans` INTEGER,
	`nom` VARCHAR(100) NOT NULL,
	`poids` REAL,
	`taille` REAL NOT NULL,
	`dateNais` DATE NOT NULL,
	`photo` VARCHAR(200),
	`ceinture` ENUM ('blanche', 'jaune', 'orange', 'verte','bleue', 'marron', 'rouge', 'noire') DEFAULT 'blanche' NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `karateka`
  ADD CONSTRAINT `fk_karateka_id_club` FOREIGN KEY (`id_club`) REFERENCES `club`(`id`);

CREATE TABLE competition_tameshi_wari(
	`nom` VARCHAR(100),
	`dateComp` DATE,
	INDEX (`dateComp`),
	`id_club` BIGINT(20) NOT NULL,
	`lieu` VARCHAR(100) NOT NULL,
	`site_web` VARCHAR(200),
	`photos` VARCHAR(200),
	`contact` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`nom`,`dateComp`)
);

ALTER TABLE `competition_tameshi_wari`
  ADD CONSTRAINT `fk_competition_tameshi_wari_id_club` FOREIGN KEY (`id_club`) REFERENCES `club`(`id`);

CREATE TABLE competition_mixte(
	`nom` VARCHAR(100),
	`dateComp` DATE,
	INDEX (`dateComp`),
	`id_club` BIGINT(20) NOT NULL,
	`lieu` VARCHAR(100) NOT NULL,
	`site_web` VARCHAR(200),
	`photos` VARCHAR(200),
	`contact` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`nom`,`dateComp`)
);

ALTER TABLE `competition_mixte`
  ADD CONSTRAINT `fk_competition_mixte_id_club` FOREIGN KEY (`id_club`) REFERENCES `club`(`id`);

CREATE TABLE competition_katas(
	`nom` VARCHAR(100),
	`dateComp` DATE,
	INDEX (`dateComp`),
	`id_club` BIGINT(20) NOT NULL,
	`lieu` VARCHAR(100) NOT NULL,
	`site_web` VARCHAR(200),
	`photos` VARCHAR(200),
	`contact` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`nom`,`dateComp`)
);

ALTER TABLE `competition_katas`
  ADD CONSTRAINT `fk_competition_katas_id_club` FOREIGN KEY (`id_club`) REFERENCES `club`(`id`);

CREATE TABLE competition_kumite(
	`nom` VARCHAR(100),
	`dateComp` DATE,
	INDEX (`dateComp`),
	`id_club` BIGINT(20) NOT NULL,
	`lieu` VARCHAR(100) NOT NULL,
	`site_web` VARCHAR(200),
	`photos` VARCHAR(200),
	`contact` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`nom`,`dateComp`)
);

ALTER TABLE `competition_kumite`
  ADD CONSTRAINT `fk_competition_kumite_id_club` FOREIGN KEY (`id_club`) REFERENCES `club`(`id`);

CREATE TABLE mouvements (
	`nom_jap` VARCHAR(100) NOT NULL,
	`nom_fr` VARCHAR(100) NOT NULL,
	`schema` VARCHAR(200),
	`categorie` ENUM ('offensive','deplacement','defense','technique de bras','technique de jambe','attente') NOT NULL,
	`sous_categorie` ENUM ('poing','coude','pied','genou','position','projection','clé') NOT NULL,
	PRIMARY KEY (`nom_jap`),
	UNIQUE KEY (`nom_fr`)
);

INSERT INTO `mouvements` (`nom_jap`, `nom_fr`, `schema`, `categorie`, `sous_categorie`) VALUES
('Gedan Barai', 'Attaque basse en balayage', './image/mouvements/Gedan-barai.png', 'defense', 'position'),
('Hachiji-Dachi', 'Position de départ', './image/mouvements/Hachji-dachi.png', 'attente', 'position'),
('Jodan Age Uke', 'Blocage vers le haut', './image/mouvements/Age-Uke.gif', 'defense', 'position'),
('Jodan Age Uke – KIAÏ', 'blocage vers le haut KIAI', './image/mouvements/age-uke-kiai.jpg', 'defense', 'position'),
('Musubi-Dashi', 'Position talons joints', './image/mouvements/musubi-dachi.png', 'attente', 'position'),
('Oi Zuki', 'Attaque au poing en poursuite', './image/mouvements/oi-zuki.jpg', 'offensive', 'poing'),
('Oi Zuki Kiai !', 'Attaque au poing en poursuite Kiai', './image/mouvements/oi-zuki-kiai.jpg', 'offensive', 'poing'),
('Shuto Uke', 'blocage du tranchant externe de la main', './image/mouvements/shuto_uke.gif', 'defense', 'poing'),
('Tetsui Otoshi', 'le marteau de fer', './image/mouvements/tetsui-otoshi.jpg', 'offensive', 'poing');

CREATE TABLE famille (
	`nom_jap` VARCHAR(100) NOT NULL PRIMARY KEY,
	`nom_fr` VARCHAR(100) NOT NULL
);

INSERT INTO `famille` (`nom_jap`, `nom_fr`) VALUES
('Heian', 'la paix tranquille'),
('Tekki', 'le cavalier de fer');

CREATE TABLE kata (
	`nom_famille` VARCHAR(100) NOT NULL,
	`nom_jap` VARCHAR(100) NOT NULL,
	`nom_fr` VARCHAR(100) NOT NULL,
	`description` VARCHAR(400),
	`videos` VARCHAR(200),
	`ceinture` ENUM ('blanche', 'jaune', 'orange', 'verte','bleue', 'marron', 'rouge', 'noire') DEFAULT 'blanche' NOT NULL,
	`dans` INTEGER,
	PRIMARY KEY (`nom_jap`,`nom_famille`),
	UNIQUE KEY (`nom_fr`)
);

ALTER TABLE `kata`
  ADD CONSTRAINT `fk_kata_nom_famille` FOREIGN KEY (`nom_famille`) REFERENCES `famille`(`nom_jap`);


INSERT INTO `kata` (`nom_famille`, `nom_jap`, `nom_fr`, `description`, `videos`, `ceinture`, `dans`) VALUES
('Heian', 'Godan', 'cinquième niveau', 'Il s''agit du cinquième et dernier kata de la famille Heian (famille de 5 katas comprenant la plupart des techniques de base du karaté).', 'https://www.youtube.com/watch?v=ZagZ6egeRbw', 'blanche', 0),
('Heian', 'Nidan', 'deuxième niveau', 'Il s''agit du deuxième kata de la famille Heian (famille de 5 katas comprenant la plupart des techniques de base du karaté).', 'https://www.youtube.com/watch?v=VApwsBSx7mg', 'blanche', 0),
('Heian', 'Sandan', 'troisième niveau', 'Il s''agit du troisième kata de la famille Heian (famille de 5 katas comprenant la plupart des techniques de base du karaté).', 'https://www.youtube.com/watch?v=1DDppu5CRrc', 'blanche', 0),
('Heian', 'Shodan', 'premier niveau', 'Il s''agit du premier kata de la famille Heian (famille de 5 katas comprenant la plupart des techniques de base du karaté).', 'https://www.youtube.com/watch?v=Rgg8vF_l8ZI', 'blanche', 0),
('Tekki', 'Shodan', 'premier niveau Shodan', 'Il s''agit du premier kata de la famille Tekki (famille de 3 katas dont la particularité est de se réaliser sur un seul axe).', 'https://www.youtube.com/watch?v=vCq_VbnS5Fk', 'bleue', 0),
('Heian', 'Yodan', 'quatrième niveau', 'Il s''agit du quatrième kata de la famille Heian (famille de 5 katas comprenant la plupart des techniques de base du karaté).', 'https://www.youtube.com/watch?v=AambQc8F0ZU', 'blanche', 0);

CREATE TABLE match_tameshi_wari ( 
	`nom_competition` VARCHAR(100) NOT NULL, 
	`dateComp` DATE NOT NULL, 
	INDEX (`dateComp`),
	`num_match` BIGINT(20) NOT NULL AUTO_INCREMENT, 
	`score_k1` INTEGER, `score_k2` INTEGER, 
	`karateka1` BIGINT(20) NOT NULL, 
	`karateka2` BIGINT(20) NOT NULL, 
	PRIMARY KEY (`num_match`, `nom_competition`, `dateComp`) 
);

ALTER TABLE `match_tameshi_wari`
  ADD CONSTRAINT `fk_match_tameshi_wari_nom_competition` FOREIGN KEY (`nom_competition`) REFERENCES `competition_tameshi_wari`(`nom`),
  ADD CONSTRAINT `fk_match_tameshi_wari_dateComp` FOREIGN KEY (`dateComp`) REFERENCES `competition_tameshi_wari`(`dateComp`),
  ADD CONSTRAINT `fk_match_tameshi_wari_karateka1` FOREIGN KEY (`karateka1`) REFERENCES `karateka`(`id`),
  ADD CONSTRAINT `fk_match_tameshi_wari_karateka2` FOREIGN KEY (`karateka2`) REFERENCES `karateka`(`id`);

CREATE TABLE match_kumite (
	`nom_competition` VARCHAR(100) NOT NULL,
	`dateComp` DATE,
	INDEX (`dateComp`),
	`num_match` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`score_k1` INTEGER,
	`score_k2` INTEGER,
	`karateka1` BIGINT(20) NOT NULL,
	`karateka2` BIGINT(20) NOT NULL,
	PRIMARY KEY (`num_match`,`nom_competition`, `dateComp`)
);

ALTER TABLE `match_kumite`
  ADD CONSTRAINT `fk_match_kumite_nom_competition` FOREIGN KEY (`nom_competition`) REFERENCES `competition_kumite`(`nom`),
  ADD CONSTRAINT `fk_match_kumite_dateComp` FOREIGN KEY (`dateComp`) REFERENCES `competition_kumite`(`dateComp`),
  ADD CONSTRAINT `fk_match_kumite_karateka1` FOREIGN KEY (`karateka1`) REFERENCES `karateka`(`id`),
  ADD CONSTRAINT `fk_match_kumite_karateka2` FOREIGN KEY (`karateka2`) REFERENCES `karateka`(`id`);

CREATE TABLE match_katas (
	`nom_competition` VARCHAR(100) NOT NULL,
	`dateComp` DATE NOT NULL,
	INDEX (`dateComp`),
	`num_match` BIGINT(20) NOT NULL,
	`score_k1` INTEGER,
	`score_k2` INTEGER,
	`karateka1` BIGINT(20) NOT NULL,
	`karateka2` BIGINT(20) NOT NULL,
	PRIMARY KEY (`num_match`,`nom_competition`, `dateComp`)
);

ALTER TABLE `match_katas`
  ADD CONSTRAINT `fk_match_katas_nom_competition` FOREIGN KEY (`nom_competition`) REFERENCES `competition_katas`(`nom`),
  ADD CONSTRAINT `fk_match_katas_dateComp` FOREIGN KEY (`dateComp`) REFERENCES `competition_katas`(`dateComp`),
  ADD CONSTRAINT `fk_match_katas_karateka1` FOREIGN KEY (`karateka1`) REFERENCES `karateka`(`id`),
  ADD CONSTRAINT `fk_match_katas_karateka2` FOREIGN KEY (`karateka2`) REFERENCES `karateka`(`id`);

CREATE TABLE match_mixte (
	`nom_competition` VARCHAR(100) NOT NULL,
	`dateComp` DATE REFERENCES competition_mixte(dateComp),
	INDEX (`dateComp`),
	`num_match` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`score_k1` INTEGER,
	`score_k2` INTEGER,
	`karateka1` BIGINT(20) NOT NULL,
	`karateka2` BIGINT(20) NOT NULL,
	`type_match` ENUM ('katas','kumite','tameshi_wari') NOT NULL,
	PRIMARY KEY (`num_match`,`nom_competition`, `dateComp`)
);

ALTER TABLE `match_mixte`
  ADD CONSTRAINT `fk_match_mixte_nom_competition` FOREIGN KEY (`nom_competition`) REFERENCES `competition_mixte`(`nom`),
  ADD CONSTRAINT `fk_match_mixte_dateComp` FOREIGN KEY (`dateComp`) REFERENCES `competition_mixte`(`dateComp`),
  ADD CONSTRAINT `fk_match_mixte_karateka1` FOREIGN KEY (`karateka1`) REFERENCES `karateka`(`id`),
  ADD CONSTRAINT `fk_match_mixte_karateka2` FOREIGN KEY (`karateka2`) REFERENCES `karateka`(`id`);

CREATE TABLE mvt_ordre_katas (
	`nom_mouvement` VARCHAR(100) NOT NULL,
	`nom_kata` VARCHAR(100) NOT NULL,
	`ordre` INTEGER NOT NULL,
	PRIMARY KEY (nom_mouvement,nom_kata,ordre)
);

ALTER TABLE `mvt_ordre_katas`
  ADD CONSTRAINT `fk_mvt_ordre_katas_nom_mvt` FOREIGN KEY (`nom_mouvement`) REFERENCES `mouvements`(`nom_jap`),
  ADD CONSTRAINT `fk_mvt_ordre_katas_nom_kata` FOREIGN KEY (`nom_kata`) REFERENCES `kata`(`nom_jap`);

INSERT INTO `mvt_ordre_katas` (`nom_mouvement`, `nom_kata`, `ordre`) VALUES
('Gedan Barai', 'Shodan', 3),
('Gedan Barai', 'Shodan', 5),
('Gedan Barai', 'Shodan', 8),
('Gedan Barai', 'Shodan', 13),
('Gedan Barai', 'Shodan', 15),
('Gedan Barai', 'Shodan', 17),
('Hachiji-Dachi', 'Shodan', 2),
('Hachiji-Dachi', 'Shodan', 25),
('Jodan Age Uke', 'Shodan', 9),
('Jodan Age Uke', 'Shodan', 10),
('Jodan Age Uke', 'Shodan', 11),
('Jodan Age Uke – KIAÏ', 'Shodan', 12),
('Musubi-Dashi', 'Shodan', 1),
('Musubi-Dashi', 'Shodan', 26),
('Oi Zuki', 'Shodan', 4),
('Oi Zuki', 'Shodan', 7),
('Oi Zuki', 'Shodan', 14),
('Oi Zuki', 'Shodan', 16),
('Oi Zuki', 'Shodan', 18),
('Oi Zuki', 'Shodan', 19),
('Oi Zuki Kiai !', 'Shodan', 20),
('Shuto Uke', 'Shodan', 21),
('Shuto Uke', 'Shodan', 22),
('Shuto Uke', 'Shodan', 23),
('Shuto Uke', 'Shodan', 24),
('Tetsui Otoshi', 'Shodan', 6);

CREATE TABLE auteur_coup (
	`nom_competition`  VARCHAR(100) NOT NULL,
	`dateComp` DATE NOT NULL,
	INDEX (`dateComp`),
	`num_match` BIGINT(20) NOT NULL,
	`nom_mouvement` VARCHAR(100) NOT NULL,
	`id_karateka` BIGINT(20) NOT NULL,
	`ordre` INTEGER NOT NULL,
	PRIMARY KEY (`nom_competition`,`dateComp`,`num_match`,`nom_mouvement`,`id_karateka`,`ordre`)
);

ALTER TABLE `auteur_coup`
  ADD CONSTRAINT `fk_AuteurCoup_nom_compet` FOREIGN KEY (`nom_competition`) REFERENCES `match_kumite` (`nom_competition`),
  ADD CONSTRAINT `fk_AuteurCoup_date_compet` FOREIGN KEY (`dateComp`) REFERENCES `match_kumite` (`dateComp`),
  ADD CONSTRAINT `fk_AuteurCoup_num_match` FOREIGN KEY (`num_match`) REFERENCES `match_kumite` (`num_match`),
  ADD CONSTRAINT `fk_AuteurCoup_nom_mouvement` FOREIGN KEY (`nom_mouvement`) REFERENCES `mouvements` (`nom_jap`),
  ADD CONSTRAINT `fk_AuteurCoup_id_karateka` FOREIGN KEY (`id_karateka`) REFERENCES `karateka` (`id`);


CREATE TABLE autorise_mouvement (
	`nom_mouvement` VARCHAR(100) NOT NULL,
	`nom_competition` VARCHAR(100) NOT NULL,
	`dateComp` DATE NOT NULL,
	INDEX (`dateComp`),
	`points` int NOT NULL DEFAULT '0',
	PRIMARY KEY (`nom_mouvement`,`nom_competition`,`dateComp`)
);

ALTER TABLE `autorise_mouvement`
  ADD CONSTRAINT `fk_AutoriseMvt_nom_compet` FOREIGN KEY (`nom_competition`) REFERENCES `competition_kumite` (`nom`),
  ADD CONSTRAINT `fk_AutoriseMvt_nom_mvt` FOREIGN KEY (`nom_mouvement`) REFERENCES `mouvements` (`nom_jap`),
  ADD CONSTRAINT `fk_AutoriseMvt_date_compet` FOREIGN KEY (`dateComp`) REFERENCES `competition_kumite` (`dateComp`);

CREATE TABLE maitrise (
	`id_karateka` BIGINT(20) NOT NULL,
	`nom_kata` VARCHAR(100) NOT NULL,
	PRIMARY KEY(`id_karateka`, `nom_kata`)
);

ALTER TABLE `maitrise`
  ADD CONSTRAINT `fk_Maitrise_id_karat` FOREIGN KEY (`id_karateka`) REFERENCES `karateka` (`id`),
  ADD CONSTRAINT `fk_Maitrise_nom_kata` FOREIGN KEY (`nom_kata`) REFERENCES `kata` (`nom_jap`);