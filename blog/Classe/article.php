<?php
class Article {
    private $id;
    private $titre;
    private $contenu;
    private $date_publication;
    private $id_utilisateur;

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getTitre() {
        return $this->titre;
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

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
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
}