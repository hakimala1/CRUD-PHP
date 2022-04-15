<?php
session_start();
require_once('database/connection.php');

if($_GET['id'] && !empty($_GET['id'])){

    $id=strip_tags($_GET['id']);
    $sql= 'SELECT * FROM articles WHERE id=:id';
    $data = $db->prepare($sql);
    $data->bindValue(':id',$id, PDO::PARAM_INT);
    $data->execute();
    $article=$data->fetch();

    if($article){
  
        $id=strip_tags($_GET['id']);

     
        $sql='DELETE FROM articles WHeRE id=:id';
        $data = $db->prepare($sql);
        $data->bindValue(':id',$id,PDO::PARAM_INT);
 
        $data->execute();
        $_SESSION['message']="Votre article a été bien supprimé";
        header('Location:index.php');
      
    }
    else{
        header('Location:index.php');
        $_SESSION['message'] = "L'article non trouvé";
    }
}
else
{
    header('Location:index.php');
    $_SESSION['message'] = "Vous n'avez pas droit d'y acceder !!!";
}
?>