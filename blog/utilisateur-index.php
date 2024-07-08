<?php
require_once('Classes/CRUD.php');
$crud = new CRUD;
$select = $crud->select('utilisateurs', 'nom');
// echo'<pre>';
// print_r($select);
// echo'</pre>';
// die();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Index</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Utilisateurs</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($select as $row){
            ?>
            <tr>
                <td><a href="utilisateur-show.php?id=<?= $row['id'];?>"><?=$row['nom']; ?></a></td>
                <td><?=$row['email']; ?></td>
                <td><a class="btn" href="utilisateur-show.php?id=<?= $row['id'];?>">Edit</a></td>
            </tr>
            <?php    
            }
            ?>
        </tbody>
    </table>
    <br><br>
    <a href="creer-utilisateur.php" class="btn">Nouveau utilisateur</a>
</body>
</html>