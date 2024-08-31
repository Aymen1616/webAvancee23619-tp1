<?php

namespace App\Controllers;

use App\Models\Commentaire;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class CommentairesController {
    public function __construct() {
        Auth::session();
    }

    public function index() {
        $commentaire = new Commentaire;
        $select = $commentaire->select();
        View::render('commentaire/index', ['commentaires' => $select]);

    }

    public function create() {
        // if ($_SESSION['privilege_id'] == 1) { 
            $id_article = $_GET['id_article'] ?? null;
            $id_utilisateur = $_SESSION['user_id'] ?? null;
            return View::render('commentaire/create', ['id_article' => $id_article,'id_utilisateur' => $id_utilisateur]);
        // } else {
        //     return View::render('error', ['msg' => 'Vous n\'avez pas les privilèges nécessaires pour créer un commentaire.']);
        // }
    }


    

    public function store($data = []) {
        // if ($_SESSION['privilege_id'] == 1) { // Vérifie si l'utilisateur a un privilège d'administrateur
            $validator = new Validator;
            $validator->field('contenu', $data['contenu'])->required()->min(5);
            if ($validator->isSuccess()) {
                $commentaire = new Commentaire;
                $insert = $commentaire->insert($data);

                if ($insert) {
                    return View::redirect('article');
                } else {
                    return View::render('error');
                }
            } else {
                $errors = $validator->getErrors();
                return View::render('commentaire/create', ['errors' => $errors, 'commentaire' => $data]);
            }
        // } else {
        //     return View::render('error', ['msg' => 'Vous n\'avez pas les privilèges nécessaires pour créer un commentaire.']);
        // }
    }

    public function edit($data = []) {
        if ($_SESSION['privilege_id'] == 1) { // Vérifie si l'utilisateur a un privilège d'administrateur
            if (isset($_GET['id']) && $_GET['id'] != null) {
                $commentaire = new Commentaire;
                $selectId = $commentaire->selectId($_GET['id']);
                if ($selectId) {
                    return View::render('commentaire/edit', ['commentaire' => $selectId]);
                } else {
                    return View::render('error');
                }
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error', ['msg' => 'Vous n\'avez pas les privilèges nécessaires pour modifier un commentaire.']);
        }
    }
    

    public function update($data, $get_data) {
        if ($_SESSION['privilege_id'] == 1) { 
            if (isset($get_data['id']) && $get_data['id'] != null) {
                $id = $get_data['id'];
                $validator = new Validator;
                $validator->field('contenu', $data['contenu'])->required()->min(5);
                if ($validator->isSuccess()) {
                    $commentaire = new Commentaire;
                    $update = $commentaire->update($data, $id);
                    if ($update) {
                        return View::redirect('article');
                    } else {
                        return View::render('error');
                    }
                } else {
                    $errors = $validator->getErrors();
                    return View::render('commentaire/edit', ['errors' => $errors, 'commentaire' => $data]);
                }
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error', ['msg' => 'Vous n\'avez pas les privilèges nécessaires pour modifier un commentaire.']);
        }
    }

    public function delete($data) {
        if ($_SESSION['privilege_id'] == 1) { // Vérifie si l'utilisateur a un privilège d'administrateur
            $commentaire = new Commentaire;
            $delete = $commentaire->delete($data['id']);
            if ($delete) {
                return View::redirect('article');
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error', ['msg' => 'Vous n\'avez pas les privilèges nécessaires pour supprimer un commentaire.']);
        }
    }
}
