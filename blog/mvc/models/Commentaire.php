<?php
namespace App\Models;
use App\Models\CRUD;

class Commentaire extends CRUD{

    protected $table = "commentaires";
    protected $primaryKey = "id";
    protected $fillable = ['contenu', 'date_publication', 'id_utilisateur', 'id_article'];
    
} 