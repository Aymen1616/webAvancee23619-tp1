<?php
require_once 'Classe/utilisateur.php';
require_once 'db/connex.php';


$utilisateur = new Utilisateur($pdo); 

// Vérifier si le formulaire a été soumis
if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    // Utiliser la méthode creer pour insérer un nouvel utilisateur dans la base de données
    $utilisateur->creer($nom, $email, $mot_de_passe);
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer Utilisateur</title>
</head>
<body>
<form method="post" action="creer-utilisateur.php">
    <label for="nom">Nom:</label><br>
    <input type="text" id="nom" name="nom"><br>
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br>
    <label for="mot_de_passe">Mot de passe:</label><br>
    <input type="password" id="mot_de_passe" name="mot_de_passe"><br>
    <input type="submit" value="Créer">
</form>

</body>
</html>