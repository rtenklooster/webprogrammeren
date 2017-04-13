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

CREATE TABLE users (
  id                         	INTEGER UNSIGNED         	NOT NULL     AUTO_INCREMENT,
  emailadres                 	varchar(60)              	NOT NULL,
  wachtwoord                 	varchar(128)             	NOT NULL,
  voornaam                   	varchar(40),
  PRIMARY KEY(id),
  UNIQUE (emailadres)
);


CREATE TABLE product (
  id                         	INTEGER UNSIGNED         	NOT NULL     AUTO_INCREMENT,
  naam                       	varchar(100)             	NOT NULL,
  omschrijving               	text,
  categorie_id               	INTEGER UNSIGNED         	NOT NULL,
  prijs              			int(10)                   	NOT NULL,
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
FOREIGN KEY(bestelling_id)  	REFERENCES bestelling(id),
FOREIGN KEY(product_id)      	REFERENCES product(id)
);

		
INSERT into productcategorie (naam)
VALUES 	("Dranken"),
		("Pizza's"),
		("Pasta's"),
		("Lasagne's");

INSERT INTO `product` (`naam`, `omschrijving`, `categorie_id`, `prijs`) VALUES
('Cola', NULL, 1,200),
('Cola Light', NULL, 1, 200),
('Sprite', NULL, 1, 200),
('Sinas', NULL, 1,200),
('Margherita', 'Tomaten en Kaas', 2,750),
('Napoletana', 'Tomaten, kaas, kappertjes en ansjovis', 2, 950),
('Funghi', 'Tomaten, kaas en champignons', 2, 950),
('Prosciutto', 'Tomaten, kaas en ham', 2, 950),
('Bolognese', 'Tomatensaus, gehakt en parmezaanse kaas', 3, 950),
('Napoletana', 'Tomatensaus, knoflook en peterselie', 3,900),
('Carbonara', 'Spek, ei, room, peterselie en uien', 3, 1050),
('Frutti di Mare', 'Tomatensaus, vissoorten, tonijn en peterselie', 3,1050),
('Lasagne della casa', 'Dunne pastabladen met room , bolognese saus ,mozzarella kaas en Parmezaanse kaas', 4, 1250),
('Lasagne verde', 'Dunne pastabladen met room, bladspinazie, ricotta, kaas, pijnboompitten en Parmezaanse kaas af gegarneerd met walnoten', 4,1350),
('Canneloni di mamma', 'Deegrolletjes gevuld met kalfsgehakt, ricotta kaas, pijnboompitten en rozijnen', 4,1475);


INSERT into users (emailadres,wachtwoord,voornaam)
VALUES 	("p.a.wesseling@st.hanze.nl","$2y$10$t3F2hQKtQfPbkXnYoDD.1ujnt8ZjVf7EgkxTlJQdPVD7ZePJfZSTq","Alexander"),
		("r.m.ten.klooster@st.hanze.nl","$2y$10$o9266kmjWhls.JFYUTaYuuL/.6frHMWf5RzGPRFcfSEruxn870TRS","Richard"),
		("s.e.j.kuiper@st.hanze.nl","$2y$10$MYmpheu8fKa8.v7zu1m7ZuSe10YJSO7nXH7ZE2N1ZdMBqNtR5tblS","Samuel"),
		("m.nieuwenweg@st.hanze.nl","$2y$10$xDlLTjHGubKVI21bQkXOtu90PU3tJIb8SvkVaNMPFZupwMdn2IHe.","Micheal"),
		("t.a.van.der.linden@st.hanze.nl","$2y$10$/Cfc1jXVQJwZNBcZbjnv5eJqa/m/Vi8E6sVMyMWpSIXZajx/oQNsq","Thomas")		;		
		
		
