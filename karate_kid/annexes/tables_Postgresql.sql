CREATE TABLE club (
	id BIGSERIAL PRIMARY KEY,
	nom VARCHAR(100) NOT NULL,
	site_web VARCHAR(200),
	coordonnee_dir VARCHAR(200) NOT NULL
);

CREATE TABLE professeur (
	id BIGSERIAL PRIMARY KEY,
	id_club INTEGER NOT NULL,
	nom VARCHAR(100) NOT NULL
);

ALTER TABLE professeur
  ADD CONSTRAINT fk_professeur_id_club FOREIGN KEY (id_club) REFERENCES club(id);

CREATE TYPE ceinture_couleur AS ENUM('blanche', 'jaune', 'orange', 'verte','bleue', 'marron', 'rouge', 'noire');

CREATE TABLE karateka (
	id BIGSERIAL PRIMARY KEY,
	id_club INTEGER NOT NULL,
	dans INTEGER,
	nom VARCHAR(100) NOT NULL,
	poids REAL,
	taille REAL NOT NULL,
	dateNais DATE NOT NULL,
	photo VARCHAR(200),
	ceinture ceinture_couleur DEFAULT 'blanche' NOT NULL
);

ALTER TABLE karateka
  ADD CONSTRAINT fk_karateka_id_club FOREIGN KEY (id_club) REFERENCES club(id);

CREATE TABLE competition_tameshi_wari(
	nom VARCHAR(100),
	dateComp DATE,
	id_club INTEGER NOT NULL,
	lieu VARCHAR(100) NOT NULL,
	site_web VARCHAR(200),
	photos VARCHAR(200),
	contact VARCHAR(100) NOT NULL,
	PRIMARY KEY (nom,dateComp)
);

ALTER TABLE competition_tameshi_wari
  ADD CONSTRAINT fk_competition_tameshi_wari_id_club FOREIGN KEY (id_club) REFERENCES club(id);

CREATE TABLE competition_mixte(
	nom VARCHAR(100),
	dateComp DATE,
	id_club INTEGER NOT NULL,
	lieu VARCHAR(100) NOT NULL,
	site_web VARCHAR(200),
	photos VARCHAR(200),
	contact VARCHAR(100) NOT NULL,
	PRIMARY KEY (nom,dateComp)
);

ALTER TABLE competition_mixte
  ADD CONSTRAINT fk_competition_mixte_id_club FOREIGN KEY (id_club) REFERENCES club(id);

CREATE TABLE competition_katas(
	nom VARCHAR(100),
	dateComp DATE,
	id_club INTEGER NOT NULL,
	lieu VARCHAR(100) NOT NULL,
	site_web VARCHAR(200),
	photos VARCHAR(200),
	contact VARCHAR(100) NOT NULL,
	PRIMARY KEY (nom,dateComp)
);

ALTER TABLE competition_katas
  ADD CONSTRAINT fk_competition_katas_id_club FOREIGN KEY (id_club) REFERENCES club(id);

CREATE TABLE competition_kumite(
	nom VARCHAR(100),
	dateComp DATE,
	id_club INTEGER NOT NULL,
	lieu VARCHAR(100) NOT NULL,
	site_web VARCHAR(200),
	photos VARCHAR(200),
	contact VARCHAR(100) NOT NULL,
	PRIMARY KEY (nom,dateComp)
);

ALTER TABLE competition_kumite
  ADD CONSTRAINT fk_competition_kumite_id_club FOREIGN KEY (id_club) REFERENCES club(id);

CREATE TYPE categ AS ENUM ('offensive','deplacement','defense','technique de bras','technique de jambe','attente');

CREATE TYPE sous_categ AS ENUM ('poing','coude','pied','genou','position','projection','clé');

CREATE TABLE mouvements (
	nom_jap VARCHAR(100) PRIMARY KEY,
	nom_fr VARCHAR(100) UNIQUE NOT NULL,
	schema VARCHAR(200),
	categorie categ  NOT NULL,
	sous_categorie sous_categ  NOT NULL
);

CREATE TABLE famille (
	nom_jap VARCHAR(100) NOT NULL PRIMARY KEY,
	nom_fr VARCHAR(100) NOT NULL
);

CREATE TABLE kata (
	id BIGSERIAL PRIMARY KEY,
	nom_famille VARCHAR(100) NOT NULL,
	nom_jap VARCHAR(100) NOT NULL,
	nom_fr VARCHAR(100) NOT NULL,
	description VARCHAR(400),
	videos VARCHAR(200),
	schema VARCHAR(200),
	ceinture ceinture_couleur DEFAULT 'blanche' NOT NULL,
	dans INTEGER
);

ALTER TABLE kata
  ADD CONSTRAINT fk_kata_nom_famille FOREIGN KEY (nom_famille) REFERENCES famille(nom_jap);



CREATE TABLE match_tameshi_wari ( 
	nom_competition VARCHAR(100) UNIQUE NOT NULL, 
	dateComp DATE UNIQUE NOT NULL,
	num_match BIGSERIAL NOT NULL, 
	score_k1 INTEGER, 
	score_k2 INTEGER, 
	karateka1 INTEGER NOT NULL, 
	karateka2 INTEGER NOT NULL, 
	PRIMARY KEY (num_match, nom_competition, dateComp) 
);

ALTER TABLE match_tameshi_wari
  ADD CONSTRAINT fk_match_tameshi_wari_nom_competition FOREIGN KEY (nom_competition, dateComp) REFERENCES competition_tameshi_wari(nom, dateComp),
  ADD CONSTRAINT fk_match_tameshi_wari_karateka1 FOREIGN KEY (karateka1) REFERENCES karateka(id),
  ADD CONSTRAINT fk_match_tameshi_wari_karateka2 FOREIGN KEY (karateka2) REFERENCES karateka(id);

CREATE TABLE match_kumite (
	nom_competition VARCHAR(100) NOT NULL,
	dateComp DATE,
	num_match BIGSERIAL NOT NULL,
	score_k1 INTEGER,
	score_k2 INTEGER,
	karateka1 INTEGER NOT NULL,
	karateka2 INTEGER NOT NULL,
	PRIMARY KEY (num_match,nom_competition, dateComp)
);

ALTER TABLE match_kumite
  ADD CONSTRAINT fk_match_kumite_nom_competition FOREIGN KEY (nom_competition,dateComp) REFERENCES competition_kumite(nom,dateComp),
  ADD CONSTRAINT fk_match_kumite_karateka1 FOREIGN KEY (karateka1) REFERENCES karateka(id),
  ADD CONSTRAINT fk_match_kumite_karateka2 FOREIGN KEY (karateka2) REFERENCES karateka(id);

CREATE TABLE match_katas (
	nom_competition VARCHAR(100) NOT NULL,
	dateComp DATE NOT NULL,
	num_match BIGSERIAL NOT NULL,
	score_k1 INTEGER,
	score_k2 INTEGER,
	karateka1 INTEGER NOT NULL,
	karateka2 INTEGER NOT NULL,
	PRIMARY KEY (num_match,nom_competition, dateComp)
);

ALTER TABLE match_katas
  ADD CONSTRAINT fk_match_katas_nom_competition FOREIGN KEY (nom_competition,dateComp) REFERENCES competition_katas(nom,dateComp),
  ADD CONSTRAINT fk_match_katas_karateka1 FOREIGN KEY (karateka1) REFERENCES karateka(id),
  ADD CONSTRAINT fk_match_katas_karateka2 FOREIGN KEY (karateka2) REFERENCES karateka(id);

CREATE TYPE type_m AS ENUM ('katas','kumite','tameshi_wari');

CREATE TABLE match_mixte (
	nom_competition VARCHAR(100) NOT NULL,
	dateComp DATE NOT NULL,
	num_match BIGSERIAL NOT NULL,
	score_k1 INTEGER,
	score_k2 INTEGER,
	karateka1 INTEGER NOT NULL,
	karateka2 INTEGER NOT NULL,
	type_match type_m  NOT NULL,
	PRIMARY KEY (num_match, nom_competition, dateComp)
);

ALTER TABLE match_mixte
  ADD CONSTRAINT fk_match_mixte_nom_competition FOREIGN KEY (nom_competition, dateComp) REFERENCES competition_mixte(nom, dateComp),
  ADD CONSTRAINT fk_match_mixte_karateka1 FOREIGN KEY (karateka1) REFERENCES karateka(id),
  ADD CONSTRAINT fk_match_mixte_karateka2 FOREIGN KEY (karateka2) REFERENCES karateka(id);

CREATE TABLE mvt_ordre_katas (
	nom_mouvement VARCHAR(100) NOT NULL,
	id_kata INTEGER NOT NULL,
	ordre INTEGER NOT NULL,
	PRIMARY KEY (nom_mouvement,id_kata,ordre)
);

ALTER TABLE mvt_ordre_katas
  ADD CONSTRAINT fk_mvt_ordre_katas_nom_mvt FOREIGN KEY (nom_mouvement) REFERENCES mouvements(nom_jap),
  ADD CONSTRAINT fk_mvt_ordre_katas_id_kata FOREIGN KEY (id_kata) REFERENCES kata(id);

CREATE TABLE auteur_coup (
	nom_competition  VARCHAR(100) NOT NULL,
	dateComp DATE NOT NULL,
	num_match INTEGER NOT NULL,
	nom_mouvement VARCHAR(100) NOT NULL,
	id_karateka INTEGER NOT NULL,
	ordre INTEGER NOT NULL,
	PRIMARY KEY (nom_competition,dateComp,num_match,nom_mouvement,id_karateka,ordre)
);

ALTER TABLE auteur_coup
  ADD CONSTRAINT fk_AuteurCoup_nom_compet FOREIGN KEY (nom_competition, dateComp, num_match) REFERENCES match_kumite (nom_competition, dateComp, num_match),
  ADD CONSTRAINT fk_AuteurCoup_nom_mouvement FOREIGN KEY (nom_mouvement) REFERENCES mouvements (nom_jap),
  ADD CONSTRAINT fk_AuteurCoup_id_karateka FOREIGN KEY (id_karateka) REFERENCES karateka (id);

CREATE TABLE autorise_mouvement (
	nom_mouvement VARCHAR(100) NOT NULL,
	nom_competition VARCHAR(100) NOT NULL,
	dateComp DATE NOT NULL,
	points INTEGER NOT NULL DEFAULT '0',
	PRIMARY KEY (nom_mouvement,nom_competition,dateComp)
);

ALTER TABLE autorise_mouvement
  ADD CONSTRAINT fk_AutoriseMvt_nom_compet FOREIGN KEY (nom_competition, dateComp) REFERENCES competition_kumite (nom, dateComp),
  ADD CONSTRAINT fk_AutoriseMvt_nom_mvt FOREIGN KEY (nom_mouvement) REFERENCES mouvements (nom_jap);

CREATE TABLE maitrise (
	id_karateka INTEGER NOT NULL,
	id_kata INTEGER NOT NULL,
	PRIMARY KEY(id_karateka, id_kata)
);

ALTER TABLE maitrise
  ADD CONSTRAINT fk_Maitrise_id_karat FOREIGN KEY (id_karateka) REFERENCES karateka (id),
  ADD CONSTRAINT fk_Maitrise_id_kata FOREIGN KEY (id_kata) REFERENCES kata (id);


/* VALEURS D'INITIALISATION */

INSERT INTO famille (nom_jap, nom_fr) VALUES
	('Heian', 'la paix tranquille'),
	('Tekki', 'le cavalier de fer');

INSERT INTO mouvements (nom_jap, nom_fr, schema, categorie, sous_categorie) VALUES
	('Gedan Barai', 'Attaque basse en balayage', './image/mouvements/Gedan-barai.png', 'defense', 'position'),
	('Hachiji-Dachi', 'Position de départ', './image/mouvements/Hachji-dachi.png', 'attente', 'position'),
	('Jodan Age Uke', 'Blocage vers le haut', './image/mouvements/Age-Uke.gif', 'defense', 'position'),
	('Jodan Age Uke – KIAÏ', 'blocage vers le haut KIAI', './image/mouvements/age-uke-kiai.jpg', 'defense', 'position'),
	('Musubi-Dashi', 'Position talons joints', './image/mouvements/musubi-dachi.png', 'attente', 'position'),
	('Oi Zuki', 'Attaque au poing en poursuite', './image/mouvements/oi-zuki.jpg', 'offensive', 'poing'),
	('Oi Zuki Kiai !', 'Attaque au poing en poursuite Kiai', './image/mouvements/oi-zuki-kiai.jpg', 'offensive', 'poing'),
	('Shuto Uke', 'blocage du tranchant externe de la main', './image/mouvements/shuto_uke.gif', 'defense', 'poing'),
	('Tetsui Otoshi', 'le marteau de fer', './image/mouvements/tetsui-otoshi.jpg', 'offensive', 'poing');

INSERT INTO kata (id, nom_famille, nom_jap, nom_fr, description, videos, ceinture, dans) VALUES
	(nextval('kata_id_seq'), 'Heian', 'Godan', 'cinquième niveau', 'Il s''agit du cinquième et dernier kata de la famille Heian (famille de 5 katas comprenant la plupart des techniques de base du karaté).', 'https://www.youtube.com/watch?v=ZagZ6egeRbw', 'blanche', 0)
	RETURNING ID;
INSERT INTO kata (id, nom_famille, nom_jap, nom_fr, description, videos, ceinture, dans) VALUES
	(nextval('kata_id_seq'), 'Heian', 'Nidan', 'deuxième niveau', 'Il s''agit du deuxième kata de la famille Heian (famille de 5 katas comprenant la plupart des techniques de base du karaté).', 'https://www.youtube.com/watch?v=VApwsBSx7mg', 'blanche', 0)
RETURNING ID;

INSERT INTO kata (id, nom_famille, nom_jap, nom_fr, description, videos, ceinture, dans) VALUES
	(nextval('kata_id_seq'), 'Heian', 'Sandan', 'troisième niveau', 'Il s''agit du troisième kata de la famille Heian (famille de 5 katas comprenant la plupart des techniques de base du karaté).', 'https://www.youtube.com/watch?v=1DDppu5CRrc', 'blanche', 0)
RETURNING ID;

INSERT INTO kata (id, nom_famille, nom_jap, nom_fr, description, videos, ceinture, dans) VALUES
	(nextval('kata_id_seq'), 'Heian', 'Shodan', 'premier niveau', 'Il s''agit du premier kata de la famille Heian (famille de 5 katas comprenant la plupart des techniques de base du karaté).', 'https://www.youtube.com/watch?v=Rgg8vF_l8ZI', 'blanche', 0)
RETURNING ID;

INSERT INTO kata (id, nom_famille, nom_jap, nom_fr, description, videos, ceinture, dans) VALUES
	(nextval('kata_id_seq'), 'Tekki', 'Shodan', 'premier niveau Shodan', 'Il s''agit du premier kata de la famille Tekki (famille de 3 katas dont la particularité est de se réaliser sur un seul axe).', 'https://www.youtube.com/watch?v=vCq_VbnS5Fk', 'bleue', 0)
RETURNING ID;

INSERT INTO kata (id, nom_famille, nom_jap, nom_fr, description, videos, ceinture, dans) VALUES
	(nextval('kata_id_seq'), 'Heian', 'Yodan', 'quatrième niveau', 'Il s''agit du quatrième kata de la famille Heian (famille de 5 katas comprenant la plupart des techniques de base du karaté).', 'https://www.youtube.com/watch?v=AambQc8F0ZU', 'blanche', 0)
RETURNING ID;

	
INSERT INTO mvt_ordre_katas (nom_mouvement, id_kata, ordre) VALUES
	('Gedan Barai', 4, 3),
	('Gedan Barai', 4, 5),
	('Gedan Barai', 4, 8),
	('Gedan Barai', 4, 13),
	('Gedan Barai', 4, 15),
	('Gedan Barai', 4, 17),
	('Hachiji-Dachi', 4, 2),
	('Hachiji-Dachi', 4, 25),
	('Jodan Age Uke', 4, 9),
	('Jodan Age Uke', 4, 10),
	('Jodan Age Uke', 4, 11),
	('Jodan Age Uke – KIAÏ', 4, 12),
	('Musubi-Dashi', 4, 1),
	('Musubi-Dashi', 4, 26),
	('Oi Zuki', 4, 4),
	('Oi Zuki', 4, 7),
	('Oi Zuki', 4, 14),
	('Oi Zuki', 4, 16),
	('Oi Zuki', 4, 18),
	('Oi Zuki', 4, 19),
	('Oi Zuki Kiai !', 4, 20),
	('Shuto Uke', 4, 21),
	('Shuto Uke', 4, 22),
	('Shuto Uke', 4, 23),
	('Shuto Uke', 4, 24),
	('Tetsui Otoshi', 4, 6);




CREATE FUNCTION verifMATCH() RETURNS trigger AS $emp_stamp$
    BEGIN
        -- Check that karateka names are different
        IF NEW.karateka1 == NEW.karateka2 THEN
            RAISE EXCEPTION 'Impossible d avoir un match avec le meme karateka';
        END IF;

        RETURN NEW;
    END;
$emp_stamp$ LANGUAGE plpgsql;

CREATE TRIGGER verifMATCHTrigger BEFORE INSERT OR UPDATE ON match_katas
    FOR EACH ROW EXECUTE PROCEDURE verifMATCH();

CREATE TRIGGER verifMATCHTrigger BEFORE INSERT OR UPDATE ON match_mixte
    FOR EACH ROW EXECUTE PROCEDURE verifMATCH();

CREATE TRIGGER verifMATCHTrigger BEFORE INSERT OR UPDATE ON match_kumite
    FOR EACH ROW EXECUTE PROCEDURE verifMATCH();

CREATE TRIGGER verifMATCHTrigger BEFORE INSERT OR UPDATE ON match_tameshi_wari
    FOR EACH ROW EXECUTE PROCEDURE verifMATCH();


