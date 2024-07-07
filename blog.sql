CREATE DATABASE blog;
USE blog;

CREATE TABLE Utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    email VARCHAR(100),
    mot_de_passe VARCHAR(100)
);

CREATE TABLE Articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100),
    contenu TEXT,
    date_publication DATETIME,
    id_utilisateur INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id)
);

CREATE TABLE Commentaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contenu TEXT,
    date_commentaire DATETIME,
    id_article INT,
    id_utilisateur INT,
    FOREIGN KEY (id_article) REFERENCES Articles(id),
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id)
);

CREATE TABLE Categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50)
);

CREATE TABLE Articles_Categories (
    id_article INT,
    id_categorie INT,
    FOREIGN KEY (id_article) REFERENCES Articles(id),
    FOREIGN KEY (id_categorie) REFERENCES Categories(id)
);
