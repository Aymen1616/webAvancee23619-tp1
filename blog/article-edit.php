<?php

if(isset($_GET['id']) && $_GET['id']!= null){
    $id = $_GET['id'];
    require_once('Classes/CRUD.php');
    $crud = new CRUD;
    $selectId = $crud->selectId('articles',  $id);

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
            <h5 class="card-title">Modifier l'article</h5>
            <form action="article-update.php" method="post">
                <input type="hidden" name="id" value="<?= $id;?>">
                <div class="form-group">
                    <label for="titre">Titre:</label>
                    <input type="text" class="form-control" id="titre" name="titre" value="<?= $titre;?>">
                </div>
                <div class="form-group">
                    <label for="contenu">Contenu:</label>
                    <input type="text" class="form-control" id="contenu" name="contenu" value="<?= $contenu;?>">
                </div>
                <div class="form-group">
                    <label for="date_publication">Date de publication:</label>
                    <input type="text" class="form-control" id="date_publication" name="date_publication" value="<?= $date_publication;?>">
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
