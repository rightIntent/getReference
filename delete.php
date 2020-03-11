<?php 
    session_start();
    require './functions.php';
    $category = explode('_', $_SESSION['category'])[0];
    $delete = new Events;
    $delete -> DELETE($category,$_GET['pass']);
    header("Location: /edit.php");
?>