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

    if(!$article){
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <title>Article <?= $article['name']?></title>
</head>

<body>
    <main class="container">
        <div class="col-md-12 mt-5">
            <h1>Article N° : <?= $article['id']?></h1>
            <p>Name : <?= $article['name']?></p>
            <p>Prix : <?= $article['price']?> DT</p>
            <p>Stock : <?= $article['stock']?></p>
            <a href="index.php" class="btn btn-danger mt-2">Go Back</a>
        </div>
    </main>

</body>

</html>