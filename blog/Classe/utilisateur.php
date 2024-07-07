<?php
class Utilisateur {
    private $id;
    private $nom;
    private $email;
    private $mot_de_passe;
    private $pdo;

    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    // Getters and setters for each property...

    public function creer($nom, $email, $mot_de_passe) {
        $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nom, $email, $mot_de_passe]);
    }

    public function supprimer($id) {
        $sql = "DELETE FROM Utilisateurs WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function mettreAJour($id, $nom, $email, $mot_de_passe) {
        $sql = "UPDATE Utilisateurs SET nom = :nom, email = :email, mot_de_passe = :mot_de_passe WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id, 'nom' => $nom, 'email' => $email, 'mot_de_passe' => $mot_de_passe]);
    }

    public function afficherTout() {
        $stmt = $this->pdo->prepare("SELECT * FROM Utilisateurs");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
