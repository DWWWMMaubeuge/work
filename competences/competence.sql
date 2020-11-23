CREATE DATABASE DWWM_Maubeuge CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
use DWWM_Maubeuge;

CREATE TABLE users ( id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, datex  TIMESTAMP DEFAULT CURRENT_TIMESTAMP, name VARCHAR(255), surname VARCHAR(255), password VARCHAR(255), mail VARCHAR(255), id_formation INT, id_session INT, role varchar(3) );

INSERT INTO users ( name, surname, mail, password, id_formation, id_session, role ) VALUES ( "trouvetout",  "geo",    "geo@gmail.com", "123", 1, 1, 'FOR' );        
INSERT INTO users ( name, surname, mail, password, id_formation, id_session, role ) VALUES ( "picsou",  "oncle",    "oncle@gmail.com", "admim", 0, 0, 'ADM' );        
INSERT INTO users ( name, surname, mail, password, id_formation, id_session, role ) VALUES ( "ligonnes",  "xavier",    "xligo@gmail.com", "123", 1, 1, 'STA' );
INSERT INTO users ( name, surname, mail, password, id_formation, id_session, role ) VALUES ( "Castix",    "ferdinand", "fcast@gmail.com", "123", 3, 3, 'STA' );
INSERT INTO users ( name, surname, mail, password, id_formation, id_session, role ) VALUES ( "Lecuisinier",    "Max", "cuisine@gmail.com", "123", 2, 2,'STA' );
INSERT INTO users ( name, surname, mail, password, id_formation, id_session, role ) VALUES ( "Lecomte",    "JP", "compta@gmail.com", "123", 0, 0, 'ADM' );
INSERT INTO users ( name, surname, mail, password, id_formation, id_session, role ) VALUES ( "bourgey",    "Xav", "xav@gmail.com", "123", 1, 1, 'FOR' );
INSERT INTO users ( name, surname, mail, password, id_formation, id_session, role ) VALUES ( "durand",    "Sam", "sam@gmail.com", "123", 2, 1, 'FOR' );

INSERT INTO users ( name, surname, mail, password, id_formation, id_session, role ) VALUES ( "admin",    "admin", "admin", "admin", 0, 0, 'ADM' );



CREATE TABLE  skills ( id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, datex  TIMESTAMP DEFAULT CURRENT_TIMESTAMP, name VARCHAR(255), id_formation INT  );

INSERT INTO skills ( name, id_formation ) VALUES ( "HTML", 1 );
INSERT INTO skills ( name, id_formation ) VALUES ( "CSS", 1 );
INSERT INTO skills ( name, id_formation ) VALUES ( "AJAX", 1 );
INSERT INTO skills ( name, id_formation ) VALUES ( "JavaScript", 1 );

INSERT INTO skills ( name, id_formation ) VALUES ( "patisserie", 2 );
INSERT INTO skills ( name, id_formation ) VALUES ( "sauce", 2 );
INSERT INTO skills ( name, id_formation ) VALUES ( "légumes", 2 );

INSERT INTO skills ( name, id_formation ) VALUES ( "les métaux", 3 );
INSERT INTO skills ( name, id_formation ) VALUES ( "les plastiques", 3 );
INSERT INTO skills ( name, id_formation ) VALUES ( "les alliage", 3 );
INSERT INTO skills ( name, id_formation ) VALUES ( "soudure électrique", 3 );



CREATE TABLE  formations ( id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,  name VARCHAR(255) );

INSERT INTO formations ( name ) VALUES ( "DWWM" );
INSERT INTO formations ( name ) VALUES ( "CUISINE" );
INSERT INTO formations ( name ) VALUES ( "SOUDURE" );

CREATE TABLE  results ( id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, datex  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  id_user INT, id_skill INT, result INT, id_session INT );

INSERT INTO results ( id_user, id_skill, id_session, result ) VALUES ( 2, 1, 1, 15 );
INSERT INTO results ( id_user, id_skill, id_session, result ) VALUES ( 2, 2, 1, 38 );
INSERT INTO results ( id_user, id_skill, id_session, result ) VALUES ( 2, 3, 1, 55 );
INSERT INTO results ( id_user, id_skill, id_session, result ) VALUES ( 3, 1, 1, 73 );
INSERT INTO results ( id_user, id_skill, id_session, result ) VALUES ( 3, 2, 1, 66 );
INSERT INTO results ( id_user, id_skill, id_session, result ) VALUES ( 4, 2, 1, 22 );

CREATE TABLE  sessions ( id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, datex  TIMESTAMP DEFAULT CURRENT_TIMESTAMP, date_begin DATE, date_end DATE, name VARCHAR(255), id_formation INT  );

INSERT INTO sessions ( name, id_formation, date_begin, date_end ) VALUES ( "DWWM Maubeuge",    1, '2020-08-17', '2021-03-31' );
INSERT INTO sessions ( name, id_formation, date_begin, date_end ) VALUES ( "Soudure Maubeuge",    2, '2020-10-22', '2021-06-12' );
INSERT INTO sessions ( name, id_formation, date_begin, date_end ) VALUES ( "Cuisine Maubeuge",    3, '2021-01-21', '2021-10-30' );


CREATE TABLE mail2inscript ( id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, datex  TIMESTAMP DEFAULT CURRENT_TIMESTAMP, mail VARCHAR(255), id_formation INT, id_session INT, role varchar(3) );

CREATE TABLE user_session ( id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, datex  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  id_user INT, id_session INT);