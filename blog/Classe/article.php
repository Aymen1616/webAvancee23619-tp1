<?php
class Article {
    private $id;
    private $titre;
    private $contenu;
    private $date_publication;
    private $id_utilisateur;

    // Getters and setters for each property...

    public function creer($titre, $contenu, $date_publication, $id_utilisateur) {
        // Code to insert a new article into the database...
    }

    public function supprimer($id) {
        // Code to delete an article from the database...
    }

    public function mettreAJour($id, $titre, $contenu, $date_publication, $id_utilisateur) {
        // Code to update an article in the database...
    }

    public function afficherTout() {
        // Code to display all articles from the database...
    }
}
?>
