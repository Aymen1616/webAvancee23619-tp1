<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs Index</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Utilisateurs</h1>
        <div class="row">
            <?php
            require_once('Classes/CRUD.php');
            $crud = new CRUD;
            $utilisateurs = $crud->select('utilisateurs', 'nom');
            foreach($utilisateurs as $utilisateur){
                $articles = $crud->selectWhere('articles', 'id_utilisateur', $utilisateur['id']);
                $commentaires = $crud->selectWhere('commentaires', 'id_utilisateur', $utilisateur['id']);
                $likes = $crud->selectWhere('likes', 'id_utilisateur', $utilisateur['id']);
            ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 cardindex">
                    <div class="card-body">
                        <h5 class="card-title"><a href="utilisateur-show.php?id=<?= $utilisateur['id'];?>"><?= $utilisateur['nom']; ?></a></h5>
                        <p class="card-text"><span class="highlight">Email:</span> <?= $utilisateur['email']; ?></p>
                        <p class="card-text"><span class="highlight">Articles:</span><br>
                            <?php foreach($articles as $article) { echo $article['titre'] . " <a class='float-right' href='article-edit.php?id=" . $article['id'] . "'>Edit</a><br>"; } ?>
                        </p>
                        <p class="card-text"><span class="highlight">Commentaires:</span><br>
                            <?php foreach($commentaires as $commentaire) { echo $commentaire['contenu'] . " <a class='float-right' href='commentaire-edit.php?id=" . $commentaire['id'] . "'>Edit</a><br>"; } ?>
                        </p>
                        <p class="card-text">
                            <?php echo count($likes) > 0 ? "a like un article" : "n'as like aucun article"; ?>
                        </p>
                        <a class="btn btn-primary" href="utilisateur-show.php?id=<?= $utilisateur['id'];?>">Edit</a>
                    </div>
                </div>
            </div>
            <?php    
            }
            ?>
        </div>
        <a href="creer-utilisateur.php" class="btn btn-success">Nouveau utilisateur</a>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
