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
        if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['stock']) ){
        $name=strip_tags($_POST['name']);
        $price=strip_tags($_POST['price']);
        $stock=strip_tags($_POST['stock']);
     
        $sql='UPDATE articles SET name=:name,price=:price,stock=:stock WHeRE id=:id';
        $data = $db->prepare($sql);
        $data->bindValue(':id',$id,PDO::PARAM_INT);
        $data->bindValue(':name',$name,PDO::PARAM_STR);
        $data->bindValue(':price',$price,PDO::PARAM_STR);
        $data->bindValue(':stock',$stock,PDO::PARAM_STR);
        $data->execute();
        $_SESSION['message']="Votre article a été bien modifier";
        header('Location:index.php');
        }
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
    <title>Update</title>
</head>
<body>
<main class="container">
        <div class="col-md-12">
            <h1 class='mt-5 mb-5'>Modification de l'article N° : <?= $article['id']?></h1>
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control " value="<?= $article['name']?>">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" id="price" name="price" class="form-control " value="<?= $article['price']?>">
                    </div>
                    <div class="form-group">
                        <label for="Stock">Stock</label>
                        <input type="text" id="stock" name="stock" class="form-control " value="<?= $article['stock']?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-5">Modifier</button>
                        <a href="index.php" class="btn btn-danger mt-5">Go Back</a>
                    </div>
                </form>
            </div>

        </div>
    </main>
</body>
</html>