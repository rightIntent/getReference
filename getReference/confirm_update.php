<?php 
        session_start();
        require './functions.php';
        $item=array_keys($_POST);
        $pdo = new PDO('mysql:host=localhost;dbname=reference', 'root', '');
        $sql= "UPDATE $category SET ";
        $i=0;
        foreach($_POST as $key){
                $sql .= "`".$item[$i]."`" . '=' . "'" .add_slesh($key) . "',\n";
                $i++;
        };
        $sql = substr($sql,0,-2);
        $sql .=  " WHERE `id`=" . $_POST['id'];
        $query=$pdo->prepare($sql);
        $query->execute();
        header("Location: edit.php");
?>



            