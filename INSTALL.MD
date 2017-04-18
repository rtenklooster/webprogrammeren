# Installation

Er zijn twee manieren om de site installeren:
- Door middel van Git
- Door het uitpakken van een zip bestand

## Git

Haal de source code binnen in een map van de webserver:
```
[] git clone https://github.com/rtenklooster/webprogrammeren.git
```

## Zip bestand
Download het [zip-bestand] (https://github.com/rtenklooster/webprogrammeren/archive/master.zip)

Pak het zipbestand uit binnen een map van de webserver:

## Database
Installeer de database:

Navigeer naar de map waar de sourcecode gekloond is bv
```
cd /var/www/webprogrammeren
```

Maak de database aan:
```
mysql -u root -p < sql/pizza_database.sql
```
de -p optie is noodzakelijk als u een wachtwoord op het root account heeft.

Beter zou het zijn om een aparte gebruiker aan te maken voor de website.
Dit kan binnen mysql
```
mysql -u root -p
CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON pizza . * TO 'newuser'@'localhost';
```
Pas daarna de logingegevens van de database aan in het bestand
```
functions/database.php
```
