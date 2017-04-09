DROP DATABASE IF EXISTS pizza;
CREATE DATABASE pizza CHARACTER SET utf8;
USE pizza;

CREATE TABLE productcategorie (
  id                         	INTEGER UNSIGNED         	NOT NULL     AUTO_INCREMENT,
  naam                       	varchar(40)              	NOT NULL,
PRIMARY KEY(id)
);
CREATE TABLE autorisatie(
  id                         	INTEGER UNSIGNED         	NOT NULL     AUTO_INCREMENT,
  naam                       	varchar(40)              	NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE klant (
  id                         	INTEGER UNSIGNED         	NOT NULL     AUTO_INCREMENT,
  emailadres                 	varchar(60)              	NOT NULL,
  wachtwoord                 	varchar(128)             	NOT NULL,
  voornaam                   	varchar(40),
  tussenvoegsel              	varchar(20),
  achternaam                 	varchar(40)              	NOT NULL,
  adres                      	varchar(60)              	NOT NULL,
  postcode                   	varchar(10)              	NOT NULL,
  woonplaats                 	varchar(60)              	NOT NULL,
  telefoonnummer             	varchar(20)              	NOT NULL,
  autorisatie_id				INTEGER UNSIGNED			NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(autorisatie_id)	REFERENCES autorisatie(id)
);



CREATE TABLE product (
  id                         	INTEGER UNSIGNED         	NOT NULL     AUTO_INCREMENT,
  naam                       	varchar(100)             	NOT NULL,
  omschrijving               	text,
  categorie_id               	INTEGER UNSIGNED         	NOT NULL,
  productgrootte_id				INTEGER UNSIGNED,
  prijs              			int(10)                   	NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY(categorie_id)    		REFERENCES productcategorie(id)
);

CREATE TABLE bestelling(
  id                         	INTEGER UNSIGNED         	NOT NULL     AUTO_INCREMENT,
  bestel_datumtijd           	datetime                 	NOT NULL,
  afleverkeuze                 	tinyint(1)               	NOT NULL,
  gewenste_moment			 	datetime                 	NOT NULL,
  klant_id                   	INTEGER UNSIGNED         	NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY(klant_id)        	REFERENCES klant(id)
);

CREATE TABLE orderregel (
  bestelling_id					INTEGER UNSIGNED         	NOT NULL,
  product_id                 	INTEGER UNSIGNED         	NOT NULL,
FOREIGN KEY(bestelling_id)  	REFERENCES bestelling(id),
FOREIGN KEY(product_id)      	REFERENCES product(id)
);

INSERT into autorisatie  (naam)
VALUES 	("Klant"),
		("Beheerder");
		
INSERT into productcategorie (naam)
VALUES 	("Dranken"),
		("Pizza's"),
		("Pasta's"),
		("Lasagne's");


INSERT into product (naam, prijs, categorie_id)
VALUES 	("Cola",200,1),
		("Cola Light",200,1),
		("Sprite",200,1),
		("Sinas",200,1);

INSERT into product (naam,omschrijving,categorie_id, prijs)
VALUES 	("Margherita","Tomaten kaas",2,750),
		("Napoletana","Tomaten kaas kappertjes ansjovis",2,950),
		("Funghi","Tomaten kaas champignons",2,950),
		("Prosciutto","Tomaten kaas ham",2,950);

INSERT into product (naam,omschrijving,categorie_id, prijs)	
VALUES	("Bolognese","Tomatensaus met gehakt en parmezaanse kaas",3,950),
		("Napoletana","Tomatensaus met knoflook en peterselie",3,900),
		("Carbonara","Spek ei room peterselie uien",3,1050),
		("Frutti di Mare","Tomatensaus vissoorten tonijn en peterselie",3,1050);

INSERT into product (naam,omschrijving,categorie_id, prijs)	
VALUES	("Lasagne della casa","Dunne pastabladen in lagen bereidt met room en Bolognese saus en mozzarella kaas en Parmezaanse kaas",4,1250),
		("Lasagne verde","Dunne pastabladen in lagen bereidt met room/bladspinazie/ricotta/kaas/pijnboompitten en Parmezaanse kaas af gegarneerd met walnoten",4,1350),
		("Canneloni di mamma","Deegrolletjes gevuld met kalfsgehakt/ricotta kaas/pijnboompitten en rozijnen",4,1475);
		

		
		
		
