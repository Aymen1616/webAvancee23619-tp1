<?php
class Commentaire {
    private $id;
    private $contenu;
    private $date_publication;
    private $id_utilisateur;
    private $id_article;

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function getDatePublication() {
        return $this->date_publication;
    }

    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    public function getIdArticle() {
        return $this->id_article;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    public function setDatePublication($date_publication) {
        $this->date_publication = $date_publication;
    }

    public function setIdUtilisateur($id_utilisateur) {
        $this->id_utilisateur = $id_utilisateur;
    }

    public function setIdArticle($id_article) {
        $this->id_article = $id_article;
    }
}