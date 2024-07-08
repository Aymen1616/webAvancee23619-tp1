<?php

//print_r($_POST);

require_once('Classes/CRUD.php');

$crud = new CRUD;
$id = $_POST['id'];
$delete = $crud->delete('utilisateurs',$id);
if($delete){
    header('location: utilisateur-index.php');
   // header('location: '.$_SERVER['HTTP_REFERER']);
}else{
    echo 'error';
};