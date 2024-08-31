<?php
namespace App\Controllers;

use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;
use SendGrid;
use SendGrid\Mail\Mail;

class ContactController {
    public function __construct() {
        Auth::session();
    }

    public function create() {
        return View::render('contact/send');
    }

    public function send($data) {
        // Vérifier si la session est déjà démarrée
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Vérifier si les variables de session sont définies
        if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
            echo "Les variables de session ne sont pas définies.";
            return;
        }

        $fromEmail = $_SESSION['email'];
        $to = $data['email'];
        $subject = $data['subject'];
        $body = $data['message'];

        if ($this->sendEmail($fromEmail, $to, $subject, $body)) {
            return View::render('contact/success');
        } else {
            echo "L'e-mail n'a pas pu être envoyé. Veuillez vérifier vos informations et réessayer.";
        }
    }

    private function sendEmail($fromEmail, $to, $subject, $body) {
        $email = new Mail();
        $email->setFrom($fromEmail);
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/html", $body);

        $sendgrid = new SendGrid(getenv('SENDGRID_API_KEY'));

        try {
            $response = $sendgrid->send($email);
            return $response->statusCode() == 202;
        } catch (Exception $e) {
            echo "L'e-mail n'a pas pu être envoyé. Erreur: {$e->getMessage()}";
            return false;
        }
    }
}
