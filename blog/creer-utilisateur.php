<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer Utilisateur</title>
</head>
<body>
<form method="post" action="utilisateur-store.php">
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