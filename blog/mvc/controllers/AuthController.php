<?php
namespace App\Controllers;

use App\Models\User;
use App\Providers\View;
use App\Providers\Validator;

class AuthController {
    public function index() {
        View::render('auth/index');
    }

    public function store($data) {
        $validator = new Validator;

        if (!isset($data['email']) || !isset($data['mot_de_passe'])) {
            $errors['message'] = "Veuillez remplir tous les champs";
            return View::render('auth/index', ['errors' => $errors, 'user' => $data]);
        }

        $validator->field('email', $data['email'])->email()->required()->max(50);
        $validator->field('mot_de_passe', $data['mot_de_passe'])->min(5)->max(20);

        if ($validator->isSuccess()) {
            $user = new User;
            $checkuser = $user->checkuser($data['email'], $data['mot_de_passe']);
            if ($checkuser) {
                session_start();
                $_SESSION['email'] = $data['email'];
                $_SESSION['password'] = $data['mot_de_passe']; 
                return View::redirect('article');
            } else {
                $errors['message'] = "Veuillez vérifier vos identifiants";
                return View::render('auth/index', ['errors' => $errors, 'user' => $data]);
            }
        } else {
            $errors = $validator->getErrors();
            return View::render('auth/index', ['errors' => $errors, 'user' => $data]);
        }
    }

    public function delete() {
        session_destroy();
        return View::redirect('login');
    }
}
