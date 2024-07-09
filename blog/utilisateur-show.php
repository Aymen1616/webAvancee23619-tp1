<?php

if(isset($_GET['id']) && $_GET['id']!= null){
    $id = $_GET['id'];
    require_once('Classes/CRUD.php');

    $crud = new CRUD;
    $selectId = $crud->selectId('utilisateurs',  $id);
    //echo $count;
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
    <title>Utilisateur</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>
<body class="d-flex align-items-center justify-content-center">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Utilisateur</h5>
            <p><strong>Name:</strong><?= $nom;?></p>
            <p><strong>Email:</strong><?= $email;?></p>
            <div class="d-flex justify-content-between">
                <a class="btn btn-primary" href="utilisateur-edit.php?id=<?=$id;?>">Edit</a>
                <form action="utilisateur-delete.php" method="post">
                    <input type="hidden" name="id" value="<?=$id;?>">
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
