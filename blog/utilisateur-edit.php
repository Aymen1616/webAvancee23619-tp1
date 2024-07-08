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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Create</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <form action="utilisateur-update.php" method="post">
            <input type="hidden" name="id" value="<?= $id;?>">
            <h2>Edit Utilisateur</h2>
            <label>Name
                <input type="text" name="nom" value="<?= $nom;?>">
            </label>
            <label>Email
                <input type="email" name="email" value="<?= $email;?>">
            </label>
            <label>Mot de passe
                <input type="password" name="mot_de_passe" value="<?= $mot_de_passe;?>">
            </label>
            <input type="submit" class="btn" value="Save">
        </form>
    </div>
</body>
</html>