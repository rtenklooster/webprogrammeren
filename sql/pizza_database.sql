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
('Cola', "0.5 l", 4,200,1),
('Cola Light',"0.5 l", 4, 200,1),
('Sprite',"0.5 l", 4, 200,1),
('Sinas',"0.5 l", 4,200,1),
('Margherita', 'tomatensaus, dubbel mozzarella & oregano', 1,750,1),
('Hawaii', 'tomatensaus, mozzarella, ham, ananas en extra kaas', 1, 950,1),
('Funghi', 'tomatensaus, mozzarella, champignons & oregano', 1, 950,1),
('Prosciutto', 'tomatensaus, verse spinazie, mozzarella, mozzarella balletjes, rode ui, Italiaanse ham, oregano en lente-uitjes', 1, 950,1),
('Salami', 'tomatensaus, mozzarella en salami', 1, 950,1),
('Pepperoni', 'tomatensaus, mozzarella & pepperoni', 1, 950,1),
('Verde', 'pasta met pesto, spinazie, paprika, verse tomaat, kip en emmentaler kaas', 2, 950,1),
('Bianca', 'pasta met alfredosaus, champignons, gegrilde ham en emmentaler kaas', 2,900,1),
('Rossa', 'pasta met tomatensaus, champignons, rundergehakt en emmentaler kaas', 2, 1050,1),
('Lasagne della casa', 'dunne pastabladen met room , bolognese saus ,mozzarella kaas en parmezaanse kaas', 3, 1250,1),
('Lasagne verde', 'dunne pastabladen met room, bladspinazie, ricotta, kaas, pijnboompitten en parmezaanse kaas af gegarneerd met walnoten', 3,1350,1),
('Canneloni di mamma', 'deegrolletjes gevuld met kalfsgehakt, ricotta kaas, pijnboompitten en rozijnen', 3,1475,1);


INSERT into autorisatie (naam)
VALUES 	("admin"),
		("medewerker")
		;

INSERT into user (emailadres,password,naam,autorisatie_id)
VALUES 	("p.a.wesseling@st.hanze.nl","$2y$10$t3F2hQKtQfPbkXnYoDD.1ujnt8ZjVf7EgkxTlJQdPVD7ZePJfZSTq","Alexander",1),
		("r.m.ten.klooster@st.hanze.nl","$2y$10$o9266kmjWhls.JFYUTaYuuL/.6frHMWf5RzGPRFcfSEruxn870TRS","Richard",1),
		("s.e.j.kuiper@st.hanze.nl","$2y$10$MYmpheu8fKa8.v7zu1m7ZuSe10YJSO7nXH7ZE2N1ZdMBqNtR5tblS","Samuel",1),
		("m.nieuwenweg@st.hanze.nl","$2y$10$xDlLTjHGubKVI21bQkXOtu90PU3tJIb8SvkVaNMPFZupwMdn2IHe.","Micheal",1),
		("t.a.van.der.linden@st.hanze.nl","$2y$10$/Cfc1jXVQJwZNBcZbjnv5eJqa/m/Vi8E6sVMyMWpSIXZajx/oQNsq","Thomas",1),
		("kok@ziggo.nl","$2y$10$xDlLTjHGubKVI21bQkXOtu90PU3tJIb8SvkVaNMPFZupwMdn2IHe.","kok",2),
		("boekhouder@ziggo.nl","$2y$10$xDlLTjHGubKVI21bQkXOtu90PU3tJIb8SvkVaNMPFZupwMdn2IHe.","boekhouder",2)
						;
		
INSERT INTO klant (achternaam, voornaam, adres, postcode,woonplaats,telefoonnummer,emailadres)
 VALUES
('Kauffman','Coen','Doctor H.C. Bosstraat 114','3886 KA','Garderen', '06-64910642',"c.kauffman@gmail.com"),
('Pelser','Dyami','Binnenvaart 3','6642 CT','Beuningen', '06-97984860',"dhuhewr@ziggo.nl"),
('Pinas','Sjon','Lissabonweg 150','3137 LB','Vlaardingen', '06-77481146',"pinasappel@hotmail.com"),
('Stam','Anusha','Westzaanstraat 177','1013 ND','Amsterdam', '06-61152856',"anusheakus@live.nl"),
('Weij','Jans','Frankenstraat 121','5935 SN','Steijl', '06-47626307',"hoiikbenjans@outlook.com"),
('Kooter','Jaydon','Pieter Langendijkstraat 54','2533 TW','Den Haag', '06-19984027',"kooter@kooter.nl"),
('Meekel','Jaromir','Sportlaan 167','8934 AS','Leeuwarden', '06-47211237',"meekel@ziggo.nl"),
('Pijnappels','Elyne','Christinastraat 139','5401 CZ','Uden', '06-10001907',"pijnappels.e@hotmail.com"),
('Zuidwijk','Bjorn','Oude Rijnstraat 41','5916 NJ','Venlo', '06-43557650',"zuiderwijk@gmail.com"),
('Zwam','Dustin','Malvastraat 126','3051 NH','Rotterdam', '06-91213405',"vanzwamd@gmail.com"),
('Siersema','Yahya','Bruinhorsterlaan 22','3925 EZ','Scherpenzeel', '06-16976179',"yahyasiersma@hotmail.com"),
('Verberk','Brigitta','De Leenkamer 145','7271 ZC','Borculo', '06-32801520',"brigittalovex@hotmail.com"),
('Otter','Elles','Professor Oudemansstraat 37','2628 KE','Delft', '06-85468094',"elles.denotter@hotmail.com"),
('Verberkt','Mitchell','Stationsstraat 16','6651 ZZ','Druten', '06-40534902',"verberkt@gmail.com"),
('Brink','Margje','Molenweg 41','9915 PL','t Zandt', '06-92957620',"margjebrink@ziggo.nl");


INSERT INTO bestelling(bestel_datumtijd , betaalmethode , gewenste_moment , klant_id )
VALUES						("2016-11-11 13:23:44",1,"2016-11-11 13:53:44",12),
							("2017-02-02 11:12:01",0,"2017-02-02 11:45:01",1),
							("2017-03-03 11:42:01",0,"2017-03-03 12:42:01",5),
							("2017-04-14 14:56:59",0,"2017-04-14 15:30:59",4),
							("2017-03-12 17:36:19",1,"2017-03-12 19:30:19",7),
							("2017-02-14 12:56:59",0,"2017-04-14 15:30:59",4);
 


INSERT INTO orderregel (bestelling_id, product_id, aantal)
VALUES (1,3,1),
		(1,5,1),
		(2,5,5),
		(3,4,2),
		(4,1,1),
		(5,14,2),
		(6,10,2);

