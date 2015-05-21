CREATE TABLE club (
	int id;
	varchar(50) nom;
	varchar(50) site_web;
	varchar(50) coordonnees;
);

CREATE TABLE professeur (
	int id;
	varchar(50) nom;
);

CREATE TABLE competition (
	varchar(50) nom;
	date date;
	varchar(25) lieu;
	varchar(50) site_web;
	varchar(100) contact;
	/*photos ?*/
);

CREATE TYPE t_ceinture AS ENUM ('blanche', 'orange', 'verte', 'bleue', 'marron', 'noire');

CREATE TABLE karateka (
	int id;
	varchar(50);
	float poids;
	float taille;
	date naissance;
	/*string photo;*/
	t_ceinture ceinture; /*t_ceinture A IMPLEMENTER*/
	int dans; /* 0 si ceinture != noire */
);