<?php

//print_r($_POST);

require_once('Classes/CRUD.php');

$crud = new CRUD;

$update = $crud->update('utilisateurs', $_POST);

if($update){
    header('location: utilisateur-index.php');
   // header('location: '.$_SERVER['HTTP_REFERER']);
}else{
    echo 'error';
};