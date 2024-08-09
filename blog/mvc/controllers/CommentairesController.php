<?php
namespace App\Controllers;

use App\Models\Commentaire;
use App\Providers\View;
use App\Providers\Validator;

class CommentairesController{
    public function index() {
        $commentaire = new Commentaire;
        $select = $commentaire->select();
        View::render('commentaire/index', ['commentaires' => $select]);
    }

    public function create() {
        View::render('commentaire/create');
    }

    public function show($data = []) {
        if (isset($_GET['id']) && $data['id'] != null) {
            $commentaire = new Commentaire;
            $selectId = $commentaire->selectId($data['id']);
            if ($selectId) {
                return View::render('commentaire/show', ['commentaire' => $selectId]);
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error', ['msg' => 'Commentaire not found!']);
        }
    }
    
    public function edit($data = []) {
        if (isset($_GET['id']) && $data['id'] != null) {
            $commentaire = new Commentaire;
            $selectId = $commentaire->selectId($data['id']);
            if ($selectId) {
                return View::render('commentaire/edit', ['commentaire' => $selectId]);
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error');
        }
    }
    
    public function store($data = []) {
        $validator = new Validator;
        $validator->field('contenu', $data['contenu'])->required()->min(3);
    
        if ($validator->isSuccess()) {
            $commentaire = new Commentaire;
            $insert = $commentaire->insert($data);
    
            if ($insert) {
                return View::redirect('commentaire/show?id=' . $insert);
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            return View::render('commentaire/create', ['errors' => $errors, 'commentaire' => $data]);
        }
    }
    
    public function update($data, $get_data) {
        if (isset($get_data['id']) && $get_data['id'] != null) {
            $id = $get_data['id'];
            $validator = new Validator;
            $validator->field('contenu', $data['contenu'])->required()->min(3);
    
            if ($validator->isSuccess()) {
                $commentaire = new Commentaire;
                $update = $commentaire->update($data, $id);
    
                if ($update) {
                    return View::redirect('commentaire/show?id=' . $id);
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
    }
    
    public function delete($data){
        $commentaire = new Commentaire;
        $delete = $commentaire->delete($data['id']);
        if($delete){
            return View::redirect('commentaire');
        }else{
            return View::render('error');
        }
    }
}