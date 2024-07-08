<?php
///print_r($_POST);

require_once('Classes/CRUD.php');

$crud = new CRUD;

$insert = $crud->insert('utilisateurs', $_POST);

// header('location:client-show.php?id='.$insert);


// Rediriger vers la page utilisateur-index.php
header('Location: utilisateur-index.php');
exit;