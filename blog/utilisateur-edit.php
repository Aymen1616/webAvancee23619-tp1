<?php

if(isset($_GET['id']) && $_GET['id']!= null){
    $id = $_GET['id'];
    require_once('Classes/CRUD.php');
    $crud = new CRUD;
    $selectId = $crud->selectId('utilisateurs',  $id);

    if($selectId){       
        foreach($selectId as $key=>$value){
            $$key = $value;
        }
    }else{
        header('location:utilisateur-index.php');
        exit;
    }  
}else{
    header('location:utilisateur-index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>
<body class="d-flex align-items-center justify-content-center">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Modifier Utilisateur</h5>
            <form action="utilisateur-update.php" method="post">
                <input type="hidden" name="id" value="<?= $id;?>">
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?= $nom;?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $email;?>">
                </div>
                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe:</label>
                    <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" value="<?= $mot_de_passe;?>">
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
