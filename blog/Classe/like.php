<?php
class Like {
    private $id;
    private $id_utilisateur;
    private $id_article;

    // Getters
    public function getId() {
        return $this->id;
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

    public function setIdUtilisateur($id_utilisateur) {
        $this->id_utilisateur = $id_utilisateur;
    }

    public function setIdArticle($id_article) {
        $this->id_article = $id_article;
    }
}