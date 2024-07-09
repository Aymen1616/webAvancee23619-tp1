CREATE DATABASE blog;
USE blog;

CREATE TABLE Utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    email VARCHAR(50),
    mot_de_passe VARCHAR(50)
);

CREATE TABLE Articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100),
    contenu TEXT,
    date_publication DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_utilisateur INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id)
);

CREATE TABLE Commentaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contenu TEXT,
    date_publication DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_utilisateur INT,
    id_article INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (id_article) REFERENCES Articles(id)
);

CREATE TABLE Likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur INT,
    id_article INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (id_article) REFERENCES Articles(id)
);
-- Insérer des données dans la table Utilisateurs
INSERT INTO Utilisateurs (nom, email, mot_de_passe) VALUES
('Sophie Lemoine', 'sophie.lemoine@example.com', 'sophie123'),
('Lucas Bernard', 'lucas.bernard@example.com', 'lucas456'),
('Emma Dubois', 'emma.dubois@example.com', 'emma789');

-- Insérer des données dans la table Articles
INSERT INTO Articles (titre, contenu, id_utilisateur) VALUES
('Les bienfaits du sport', 'Le sport est bénéfique pour la santé physique et mentale. Il aide à maintenir un poids santé, améliore le sommeil et booste l\'humeur.', 1),
('La cuisine végétarienne', 'La cuisine végétarienne est à la fois savoureuse et nutritive. Elle offre une grande variété de plats qui peuvent satisfaire tous les goûts.', 2),
('Voyager en Europe', 'L\'Europe est riche en histoire et en culture. Voyager en Europe permet de découvrir de nombreux pays, chacun avec ses propres traditions et paysages uniques.', 3);

-- Insérer des données dans la table Commentaires
INSERT INTO Commentaires (contenu, id_utilisateur, id_article) VALUES
('Très intéressant, je vais essayer de faire plus de sport !', 2, 1),
('Je suis d\'accord, la cuisine végétarienne est délicieuse et variée.', 3, 2),
('J\'adore voyager en Europe, il y a tellement de belles villes à visiter.', 1, 3);

-- Insérer des données dans la table Likes
INSERT INTO Likes (id_utilisateur, id_article) VALUES
(1, 2),
(2, 3),
(3, 1);

