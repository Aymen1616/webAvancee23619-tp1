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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Show</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Utilisateur</h1>
        <p><strong>Name:</strong><?= $nom;?></p>
        <p><strong>email:</strong><?= $email;?></p>
        <a class="btn" href="utilisateur-edit.php?id=<?=$id;?>">Edit</a>
        <form action="utilisateur-delete.php" method="post">
            <input type="hidden" name="id" value="<?=$id;?>">
            <button class="btn red">Delete</button>
        </form>    
    </div>
</body>
</html>