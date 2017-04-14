DROP DATABASE IF EXISTS pizza;
CREATE DATABASE pizza CHARACTER SET utf8;
USE pizza;

CREATE TABLE productcategorie (
  id                         	INTEGER UNSIGNED         	NOT NULL     AUTO_INCREMENT,
  naam                       	varchar(40)              	NOT NULL,
PRIMARY KEY(id)
);

CREATE TABLE klant (
  id                         	INTEGER UNSIGNED         	NOT NULL     AUTO_INCREMENT,
  emailadres                 	varchar(60)              	NOT NULL,
  voornaam                   	varchar(40),
  tussenvoegsel              	varchar(20),
  achternaam                 	varchar(40)              	NOT NULL,
  adres                      	varchar(60)              	NOT NULL,
  postcode                   	varchar(10)              	NOT NULL,
  woonplaats                 	varchar(60)              	NOT NULL,
  telefoonnummer             	varchar(20)              	NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE autorisatie (
  id                         	INTEGER UNSIGNED         	NOT NULL     AUTO_INCREMENT,
  naam                       	varchar(40)              	NOT NULL,
PRIMARY KEY(id)
);


CREATE TABLE user (
  id                         	INTEGER UNSIGNED         	NOT NULL     AUTO_INCREMENT,
  emailadres                 	varchar(60)              	NOT NULL,
  password                  	varchar(128)             	NOT NULL,
  naam                   	    varchar(40),
  autorisatie_id				INTEGER UNSIGNED         	NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(autorisatie_id)    		REFERENCES autorisatie(id),
  UNIQUE (emailadres)
);


CREATE TABLE product (
  id                         	INTEGER UNSIGNED         	NOT NULL     AUTO_INCREMENT,
  naam                       	varchar(100)             	NOT NULL,
  omschrijving               	text,
  categorie_id               	INTEGER UNSIGNED         	NOT NULL,
  prijs              			int(10)                   	NOT NULL,
  actief						tinyint(1)					NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY(categorie_id)    		REFERENCES productcategorie(id)
);

CREATE TABLE bestelling(
  id                         	INTEGER UNSIGNED         	NOT NULL     AUTO_INCREMENT,
  bestel_datumtijd           	datetime                 	NOT NULL,
  betaalmethode                	tinyint(1)               	NOT NULL,
  gewenste_moment			 	datetime                 	NOT NULL,
  klant_id                   	INTEGER UNSIGNED         	NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY(klant_id)        	REFERENCES klant(id)
);

CREATE TABLE orderregel (
  bestelling_id					INTEGER UNSIGNED         	NOT NULL,
  product_id                 	INTEGER UNSIGNED         	NOT NULL,
  aantal						INTEGER UNSIGNED			NOT NULL,
FOREIGN KEY(bestelling_id)  	REFERENCES bestelling(id),
FOREIGN KEY(product_id)      	REFERENCES product(id)
);


INSERT into productcategorie (naam)
VALUES 	("Pizza's"),
		("Pasta's"),
		("Lasagne's"),
		("Dranken");

INSERT INTO product (naam, omschrijving, categorie_id, prijs,actief) VALUES
('Cola', NULL, 4,200,0),
('Cola Light', NULL, 4, 200,0),
('Sprite', NULL, 4, 200,0),
('Sinas', NULL, 4,200,0),
('Margherita', 'Tomaten en Kaas', 1,750,0),
('Napoletana', 'Tomaten, kaas, kappertjes en ansjovis', 1, 950,0),
('Funghi', 'Tomaten, kaas en champignons', 1, 950,0),
('Prosciutto', 'Tomaten, kaas en ham', 1, 950,0),
('Bolognese', 'Tomatensaus, gehakt en parmezaanse kaas', 2, 950,0),
('Napoletana', 'Tomatensaus, knoflook en peterselie', 2,900,0),
('Carbonara', 'Spek, ei, room, peterselie en uien', 2, 1050,0),
('Frutti di Mare', 'Tomatensaus, vissoorten, tonijn en peterselie', 2,1050,0),
('Lasagne della casa', 'Dunne pastabladen met room , bolognese saus ,mozzarella kaas en Parmezaanse kaas', 3, 1250,0),
('Lasagne verde', 'Dunne pastabladen met room, bladspinazie, ricotta, kaas, pijnboompitten en Parmezaanse kaas af gegarneerd met walnoten', 3,1350,0),
('Canneloni di mamma', 'Deegrolletjes gevuld met kalfsgehakt, ricotta kaas, pijnboompitten en rozijnen', 3,1475,0);


INSERT into autorisatie (naam)
VALUES 	("admin"),
		("medewerker")
		;

INSERT into user (emailadres,password,naam,autorisatie_id)
VALUES 	("p.a.wesseling@st.hanze.nl","$2y$10$t3F2hQKtQfPbkXnYoDD.1ujnt8ZjVf7EgkxTlJQdPVD7ZePJfZSTq","Alexander",1),
		("r.m.ten.klooster@st.hanze.nl","$2y$10$o9266kmjWhls.JFYUTaYuuL/.6frHMWf5RzGPRFcfSEruxn870TRS","Richard",1),
		("s.e.j.kuiper@st.hanze.nl","$2y$10$MYmpheu8fKa8.v7zu1m7ZuSe10YJSO7nXH7ZE2N1ZdMBqNtR5tblS","Samuel",1),
		("m.nieuwenweg@st.hanze.nl","$2y$10$xDlLTjHGubKVI21bQkXOtu90PU3tJIb8SvkVaNMPFZupwMdn2IHe.","Micheal",1),
		("t.a.van.der.linden@st.hanze.nl","$2y$10$/Cfc1jXVQJwZNBcZbjnv5eJqa/m/Vi8E6sVMyMWpSIXZajx/oQNsq","Thomas",1)		;


