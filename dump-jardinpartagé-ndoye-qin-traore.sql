CREATE TABLE EVENEMENT(
  id_evenement INT PRIMARY KEY AUTO_INCREMENT,
  type_evenement VARCHAR(50),
  nombre_place INT,
  date_evenement DATE
);

INSERT INTO EVENEMENT VALUES
(1 , 'fête des mères' , 50 , '2022-05-22'),
(2 , 'saint-valentin' , 100 , '2023-02-14'),
(3 , 'halloween' , 50 , '2023-10-31'),
(4 , 'fête des père' , 25 , '2022-06-19'),
(5 , 'pâques' , 60 , '2023-04-09'),
(6 , 'réveillon de noêl' , 40 , '2023-12-24'),
(7 , 'fête de la musique' , 200 , '2022-06-21'),
(8 , 'jour de l_an' , 35 , '2023-12-31'),
(9 , 'journée des droits des femmes' , 5 , '2023-03-08'),
(10 , 'fête des grands-mère' , 15 , '2023-03-05');



CREATE TABLE ADRESSE(
  id_adresse INT PRIMARY KEY AUTO_INCREMENT,
  num_voie VARCHAR(50),
  indicateur_eventuel_repetition VARCHAR(50),
  type_de_voie VARCHAR(50) NOT NULL,
  nom_voie VARCHAR(50) NOT NULL,
  code_postal INT NOT NULL
);

INSERT INTO ADRESSE VALUES
(1, 40, NULL, 'RUE', 'Hippolyte Maindron', 75002),
(2, 35, NULL, 'RUE', 'Polonceau', 75001),
(3, 5, NULL, 'RUE', 'Henri Ribiere', 75002),
(4, 18, NULL, 'PASSAGE', 'des tourelles', 75018),
(5, 20, NULL, 'RUE', 'ortolan', 75015),
(6, 21, NULL, 'RUE', 'Rottembourg', 75013),
(7, NULL, NULL, 'RUE', 'du pré', 75011),
(8, 159, NULL, 'RUE', 'de charonne', 75010),
(9, 1, NULL, 'RUE', 'des Mariniers', 75001),
(10, NULL, NULL, 'IMPASSE', 'Piat', 75014),
(11, 71, 'bis', 'BOULEVARD', 'Voltaire', 75019),
(12, 4, NULL, 'RUE', 'Mercoeur', 75017),
(13, 18, NULL, 'AVENUE', 'Daumesnil', 75018),
(14, 16, NULL, 'AVENUE', 'Jean Aicard', 75019),
(15, 25, NULL, 'AVENUE', 'de la porte de Vanves', 75006),
(16, 12, NULL, 'RUE', 'Linois', 75007),
(17, 4, NULL, 'IMPASSE', 'Berthaud', 75013),
(18, 105, NULL, 'RUE', 'du bac', 75004),
(19, 48, NULL, 'RUE', 'Trousseau', 75005),
(20, 107, NULL, 'RUE', 'de Reuilly', 75003),
(21, 10, NULL, 'RUE', 'Erard', 75017),
(22, 2, NULL, 'RUE', 'Jean Formige', 75019),
(23, 126, NULL, 'RUE', 'de Bagnolet', 75016),
(24, 56, NULL, 'RUE', 'Saint Blaise', 75013),
(25, 2, 'bis', 'CITE', 'Leroy', 75001),
(26, 10, NULL, 'PLACE', 'Franz Liszt', 75002),
(27, 3, NULL, 'RUE', 'de Thorigny', 75016),
(28, 24, NULL, 'RUE', 'de Coulmier', 75002),
(29, 30, NULL, 'RUE', 'Desnouettes', 75003),
(30, 3, 'ter', 'RUE', 'Riquet', 75012);


CREATE TABLE TYPE_D_ADHERENT(
  id_type_adherent INT PRIMARY KEY AUTO_INCREMENT,
  type_adherent VARCHAR(2)
);

INSERT INTO TYPE_D_ADHERENT VALUES
(1, 'PP'),
(2, 'HO'),
(3, 'MR'),
(4, 'EC');


CREATE TABLE ADHERENT(
  id_adherent INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50),
  telephone_adherent VARCHAR(50) UNIQUE,
  courriel_adherent VARCHAR(50) UNIQUE,
  id_type_adherent INT NOT NULL,
  id_adresse INT NOT NULL,
  FOREIGN KEY(id_type_adherent) REFERENCES TYPE_D_ADHERENT(id_type_adherent) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY(id_adresse) REFERENCES ADRESSE(id_adresse) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO ADHERENT VALUES
(1, 'Martin', 'Benjamin', '0195503686', 'benjamin.martin@gmail.com',1,8) ,
(2, 'Bernard', 'Aurélie', '0941848589', 'aurelie.bernard@gmail.com',1,23) ,
(3, 'Ecole PAUL VALERY', NULL, '0851273236', 'paul.valery@gmail.com',4,11) ,
(4, 'Ecole COLETTE MAGNY', NULL, '0176636095', 'colette.magny@gmail.com',4,9) ,
(5, 'Ecole FRERES VOISIN', NULL, '0951136094', 'frere.voisin@gmail.com',4,20) ,
(6, 'Ecole LE VAU', NULL, '0525652075', 'le.vau@gmail.com',4,9) ,
(7, 'Ecole HERMEL', NULL, '0474047747', 'hermel@gmail.com',4,22) ,
(8, 'Ecole TURGOT', NULL, '0178281880', 'turgot@gmail.com',4,29) ,
(9, 'Moreau', 'Michel', '0864420637', 'michel.moreau@gmail.com',1,9) ,
(10, 'Laurent', 'Siobhane', '0920334119', NULL,1,28) ,
(11, 'Simon', 'Ines', '0804476545', NULL,1,30) ,
(12, 'Bertrand', 'Sandrine', '0956387374', NULL,1,21) ,
(13, 'Morel', 'Sophie', '0254667070', 'sophie.morel@gmail.com',1,25) ,
(14, 'Fournier', 'Clotilde', '0695180217', NULL,1,5) ,
(15, 'Girard', 'Denis', '0174802640', 'denis.girard@gmail.com',1,8) ,
(16, 'Bonnet', 'Emma', '0134311167', 'emma.bonnet@gmail.com',1,28) ,
(17, 'Dupont', 'George', '0686123468', 'george.dupont@gmail.com',1,23) ,
(18, 'Hopital Bretonneux', NULL, '0989854972', NULL,2,13) ,
(19, 'Hopital Laribroissiere', NULL, '0742284391', 'laribroissiere@gmail.com',2,4) ,
(20, 'Hopital Saint Antoine', NULL, '0679382729', NULL,2,19) ,
(21, 'Ehpad Korian Saint-Simon', NULL, '0033511539', 'saint.simon@gmail.com',2,1) ,
(22, 'Ehpad Korian Les Amandiers', NULL, '0868865627', 'amandiers@gmail.com',2,20) ,
(23, 'Blanc', 'Nolan', '0089942403', 'nolanwhite@gmail.com',1,30) ,
(24, 'Guerin', 'Edouard', '0883734879', NULL,1,20) ,
(25, 'Boyer', 'Florance', '0373612962', NULL,1,2) ,
(26, 'Garnier', 'Isabelle', '0520524865', NULL,1,17) ,
(27, 'Chevalier', 'Julie', '0430704291', 'unechevaliere@gmail.com',1,9) ,
(28, 'Francois', 'Camille', '0159411707', NULL,1,8) ,
(29, 'Morin', 'Gaelle', '0944980692', 'gaelle.mo@gmail.com',1,5) ,
(30, 'Marie', 'Rose', '0825656000', 'rose75@gmail.com',1,21);



CREATE TABLE JARDIN(
 id_jardin INT PRIMARY KEY AUTO_INCREMENT,
nom_jardin VARCHAR(100) UNIQUE,
 site_internet VARCHAR(100),
 nom_association VARCHAR(100) NOT NULL,
 amenagement TEXT,
 courriel_jardin TEXT,
 date_fermeture_exceptionnelle DATE,
 heure_ouverture TIME,
 heure_fermeture TIME,
 id_adresse INT NOT NULL,
 FOREIGN KEY(id_adresse) REFERENCES ADRESSE(id_adresse) ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO JARDIN VALUES
(1 , "Jardin du square Chanoine Viollet" , NULL , "Jardins des Couleurs", "composteur cabane", "jardinsdescouleurs@gmail.com", NULL, '08:00:00', '19:00:00' , 1),
(2 , "Jardin l_Univert" , "Jardin l'Univert" , "Halage", "composteur cabane Récupération d'eau serre", "stephane.bourdelet@halage.fr", NULL, '09:00:00', '20:00:00' , 2),
(3 , "Le jardin enchanté" , NULL , "Amicale Ribière", "composteur", "lejardinenchante19@gmail.com", NULL, '07:00:00', '17:30:00' , 3),
(4 , "Jardin des Tourelles" , NULL , "Jardin des Tourelles", NULL, "jardin.tourelles@gmail.com", NULL, '08:00:00', '18:00:00' , 4),
(5 , "Le nid de l'Ortolan" , NULL , "les jardiniers du 5ème", "digicode: 24D60 + valider", "jardiniersdu5eme@gmail.com", NULL, '08:00:00', '19:00:00' , 5),
(6 , "Jardin Bel-Air" , NULL , "Graine de partage", "composteur cabane mare bac surélevé", "grainedp@yahoo.fr", NULL, '09:00:00', '20:00:00' , 6),
(7 , "jardin partagé Chapelle Charbon" , NULL , "Vergers Urbains", "une couche drainante, comprise entre deux géotextiles, surmontée d’une couche de 1m de terre végétale : deux fontaines à boire - trois bouches d’arrosage - une grillette parisienne de 1m de haut et trois portillons - une haie champêtre", "vergersurbains@gmail.com", NULL, '07:00:00', '17:30:00' , 7),
(8 , "colbert" , NULL , "culture en herbe", "coffre", "culturesenherbes2@gmail.com", NULL, '08:00:00', '18:00:00' , 8),
(9 , "Jardin des couleurs" , NULL , "Jardins des couleurs", "local composteur table surélevé pour fauteuils", "jardinsdescouleurs@gmail.com", NULL, '08:00:00', '19:00:00' , 9),
(10 , "Jardin Luquet" , NULL , "Archipelia", NULL, "info@archipelia.org", NULL, '09:00:00', '20:00:00' , 10),
(11 , "Jardin partagé Tibhirine" , NULL , "jardin partagé truillot", "cabane grillagée composteurs bacs", "jardinpartage.truillot@gmail.com", '2021-7-27', '07:00:00', '17:30:00' , 11),
(12 , "Square Jean Allemane" , NULL , "MJC Mercoeur", "9 bacs hors sol", "contact@mercoeur.asso.fr", NULL, '08:00:00', '18:00:00' , 12),
(13 , "Le jardin de la gare de Reuilly" , NULL , "Urbanescence", "cabane - bacs hors sol", "contact@urbanescence.org", NULL, '08:00:00', '19:00:00' , 13),
(14 , "Jean Aicard" , NULL , "Conseil d'arrondissementTTP Hôpitaux Saint Maurice", "4 plessis 2m x 2 m - local", "mariondeltell@hotmail.com", NULL, '09:00:00', '20:00:00' , 14),
(15 , "Les jardins de la douve" , NULL , "Les jardins de la douve", "récupérateur d'eau cabane", "bureau@lesjardinsdeladouve.org", NULL, '07:00:00', '17:30:00' , 15),
(16 , "Les jardins de Beaugrenelle" , "Les jardins de Beaugrenelle" , "Espaces", "cabane", NULL, NULL, '08:00:00', '18:00:00' , 16),
(17 , "Les 1001 feuilles" , NULL , "Les 1001 Feuilles", "composteur du square cabane Récupération d'eau", "les1001feuilles@orange.fr", NULL, '08:00:00', '19:00:00' , 17),
(18 , "Jardin Partagé du Square des Missions Etrangères" , NULL , "Le jardin partagé du square des Missions Etrangères", "hôtel à insectes meuble en palette bacs en palette abri", "aygd@laposte.net", NULL, '09:00:00', '20:00:00' , 18),
(19 , "Jardin Nomade" , "Jardin Nomade" , "Association Quartier St Bernard", "composteur cabane spirale à insectes", "bureau@qsb11.org", NULL, '07:00:00', '17:30:00' , 19),
(20 , "Jardin Santerre" , "Jardin Santerre" , "Association des résidents du 107", "composteurs", NULL, NULL, '08:00:00', '18:00:00' , 20),
(21 , "La Baleine Verte" , "La Baleine Verte" , "Autour de la baleine", "bacs compost mare", "labaleineverte12@gmail.com", NULL, '08:00:00', '19:00:00' , 21),
(22 , "Le Jardin des oursons de saint Lambert" , "Le Jardin des oursons de saint Lambert" , "le jardin des oursons saint Lambert", "cabane terrasse en platelage bois composteurs", "jardindesoursons@gmail.com", NULL, '09:00:00', '20:00:00' , 22),
(23 , "Jardin suspendu" , NULL , "multi’colors", "cabane récupérateur d'eau serre tables de jardinage", "mail@multicolors.org", NULL, '07:00:00', '17:30:00' , 23),
(24 , "Le 56" , "Le 56" , "Le 56", "composteur Récupération d'eau toilettes sèches abri ruches", "le56contact@gmail.com", NULL, '08:00:00', '18:00:00' , 24),
(25 , "Leroy Sème" , "Leroy Sème" , "Leroy Sème", "composteur recup eau cabane mare toit végétalisé Oyas", "leroyseme@gmail.com", NULL, '08:00:00', '19:00:00' , 25),
(26 , "Jardin partagé solidaire Cavaillé Coll" , "Jardin partagé solidaire Cavaillé Coll" , "Emmaüs Solidarité", "stabilisé - coffre", "jardinsinsertion@emmaus.asso.fr", NULL, '09:00:00', '20:00:00' , 26),
(27 , "Jardin partagé Berthe Weill" , NULL , "Le Jardin Partagé Berthe Weill", "décaissement au sol sur 60 à 80 cm d’épaisseur avec un apport de TV, une zone d’accès en stabilisé de 8 m2, un point d’eau avec robinet amovible, une corbeille de propreté type Bagatelle, une jardinière PMR en bois, un coffre en bois pour petit outillage", "jardinbertheweill@gmail.com", NULL, '07:00:00', '17:30:00' , 27),
(28 , "Vert Tige" , "Vert Tige" , "Vert -Tige", "composteur cabane", "jardin.vert.tige@gmail.com", NULL, '08:00:00', '18:00:00' , 28),
(29 , "Le Potager du Clos" , "Le Potager du Clos" , "le potager du clos", "cabane terrasse en platelage bois 2 bacs en hauteur composteurs", "lepotagerduclos@laposte.net", NULL, '08:00:00', '19:00:00' , 29),
(30 , "Commun jardin" , "Commun jardin" , "Vergers Urbains", "Local aquaponie", "vergersurbains@gmail.com", NULL, '09:00:00', '20:00:00' , 30);


CREATE TABLE ADHESION(
  num_adhesion INT PRIMARY KEY AUTO_INCREMENT,
  date_adhesion DATE NOT NULL,
  id_jardin INT NOT NULL,
  id_adherent INT NOT NULL,
  FOREIGN KEY(id_jardin) REFERENCES JARDIN(id_jardin) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY(id_adherent) REFERENCES ADHERENT(id_adherent) ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO ADHESION VALUES
(5200001 , '2022-02-27' ,1, 1),
(5200002 , '2022-05-03' ,5, 1),
(5200003 , '2022-02-07' ,7, 2),
(5200004 , '2022-01-31' ,25, 3),
(5200005 , '2022-04-17' ,20, 4),
(5200006 , '2022-03-02' ,11, 5),
(5200007 , '2022-04-21' ,4, 5),
(5200008 , '2022-01-13' ,3, 7),
(5200009 , '2022-04-01' ,5, 8),
(5200010 , '2022-02-15' ,4, 9),
(5200011 , '2022-03-22' ,23, 11),
(5200012 , '2022-04-09' ,3, 12),
(5200013 , '2022-02-02' ,3, 13),
(5200014 , '2022-03-18' ,19, 14),
(5200015 , '2022-02-05' ,3, 15),
(5200016 , '2022-01-04' ,5, 16),
(5200017 , '2022-03-17' ,1, 18),
(5200018 , '2022-04-12' ,17, 18),
(5200019 , '2022-02-07' ,27, 19),
(5200020 , '2022-02-10' ,26, 20),
(5200021 , '2022-02-07' ,1, 21),
(5200022 , '2022-04-08' ,12, 22),
(5200023 , '2022-03-19' ,22, 23),
(5200024 , '2022-01-06' ,9, 24),
(5200025 , '2022-05-17' ,25, 25),
(5200026 , '2022-04-10' ,15, 26),
(5200027 , '2022-03-11' ,15, 27),
(5200028 , '2022-02-20' ,20, 28),
(5200029 , '2022-01-22' ,2, 29),
(5200030 , '2022-03-30' ,24, 30);


CREATE TABLE AVOIR_LIEU(
    id_jardin INT NOT NULL,
    id_evenement INT NOT NULL,
    FOREIGN KEY(id_jardin) REFERENCES JARDIN(id_jardin)ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(id_evenement) REFERENCES EVENEMENT(id_evenement) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO AVOIR_LIEU VALUES
(1 , 6 ),
(1 , 1 ),
(2 , 2 ),
(2 , 2 ),
(3 , 9 ),
(3 , 8 ),
(4 , 8 ),
(4 , 6 ),
(5 , 9 ),
(5 , 2 ),
(6 , 10 ),
(6 , 6 ),
(7 , 3 ),
(7 , 10 ),
(8 , 2 ),
(8 , 4 ),
(9 , 7 ),
(9 , 8 ),
(10 , 10 ),
(10 , 7 ),
(11 , 6 ),
(11 , 3 ),
(12 , 10 ),
(12 , 4 ),
(13 , 5 ),
(13 , 9 ),
(14 , 5 ),
(14 , 2 ),
(15 , 7 ),
(15 , 8 ),
(16 , 8 ),
(16 , 5 ),
(17 , 3 ),
(17 , 5 ),
(18 , 7 ),
(18 , 8 ),
(19 , 4 ),
(19 , 6 ),
(20 , 7 ),
(20 , 6 ),
(21 , 10 ),
(21 , 6 ),
(22 , 1 ),
(22 , 7 ),
(23 , 5 ),
(23 , 9 ),
(24 , 3 ),
(24 , 8 ),
(25 , 7 ),
(25 , 9 ),
(26 , 4 ),
(26 , 10 ),
(27 , 5 ),
(27 , 3 ),
(28 , 1 ),
(28 , 8 ),
(29 , 4 ),
(29 , 6 ),
(30 , 3 ),
(30 , 2 );
