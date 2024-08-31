<?php
namespace App\Models;
use App\Models\CRUD;

class Article extends CRUD {
    protected $table = "articles";
    protected $primaryKey = "id";
    protected $fillable = ['titre', 'contenu', 'date_publication', 'id_utilisateur'];

    public function commentaires() {
        return $this->hasMany('App\Models\Commentaire', 'id_article', 'id');
    }
}
