<?php
require_once('Classes/CRUD.php');

$crud = new CRUD;

// Insert the new user into the database
$insert = $crud->insert('utilisateurs', $_POST);

$articles = $crud->selectWhere('articles', 'id_utilisateur', $insert);
$commentaires = $crud->selectWhere('commentaires', 'id_utilisateur', $insert);
$likes = $crud->selectWhere('likes', 'id_utilisateur', $insert);

header('Location: utilisateur-index.php');
exit;
?>
