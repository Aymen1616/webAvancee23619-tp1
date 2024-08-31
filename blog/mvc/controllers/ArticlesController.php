<?php
namespace App\Controllers;

use App\Models\Article;
use App\Models\Commentaire;
use App\Providers\View;

class ArticlesController {
    public function show() {
        $article = new Article;
        $articles = $article->select();

        foreach ($articles as &$article) {
            $commentaire = new Commentaire;
            $article['commentaires'] = $commentaire->where('id_article', $article['id']);
        }

        return View::render('article/show', ['articles' => $articles]);
    }
}
