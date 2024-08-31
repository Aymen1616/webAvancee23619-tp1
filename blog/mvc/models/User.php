<?php
namespace App\Models;

use App\Models\CRUD;

class User extends CRUD {
    protected $table = "utilisateurs";
    protected $primaryKey = "id";
    protected $fillable = ['nom', 'email', 'mot_de_passe', 'privilege_id'];
    private $salt = "H4@1&";

    public function hashPassword($password, $cost = 10){
        $options = [
            'cost' => $cost
        ];

        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function checkuser($email, $password) {
        $user = $this->unique('email', $email);
        if ($user) {
            if(password_verify($password, $user['mot_de_passe'])) {
                session_regenerate_id();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['nom'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['password'] = $password;
                $_SESSION['privilege_id'] = $user['privilege_id'];
                $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function createAdmin($nom, $email, $password, $privilege_id = 1) {
        $hashed_password = $this->hashPassword($password);
        $data = [
            'nom' => $nom,
            'email' => $email,
            'mot_de_passe' => $hashed_password,
            'privilege_id' => $privilege_id
        ];

        return $this->insert($data);
    }
}
