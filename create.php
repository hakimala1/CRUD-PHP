<?php

    session_start();
    require_once('database/connection.php');


    if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['stock']) ){
        $name=strip_tags($_POST['name']);
        $price=strip_tags($_POST['price']);
        $stock=strip_tags($_POST['stock']);
     

        $sql= 'INSERT INTO articles(name,price,stock) VALUES (:name, :price, :stock)';
        $article = $db->prepare($sql);
        $article->bindValue(':name',$name,PDO::PARAM_STR);
        $article->bindValue(':price',$price,PDO::PARAM_STR);
        $article->bindValue(':stock',$stock,PDO::PARAM_STR);
        $article->execute();
        $_SESSION['message']="Votre article est ajouter";
        header('Location:index.php');
        
    }else{
        $_SESSION['message'] = "Vous devez remplire tous les champs";
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
    <title>Add Product</title>
</head>

<body>
    <main class="container">
        <div class="col-md-12">
            <h1 class='mt-5 mb-5'>Création d'article</h1>
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control ">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" id="price" name="price" class="form-control ">
                    </div>
                    <div class="form-group">
                        <label for="Stock">Stock</label>
                        <input type="text" id="stock" name="stock" class="form-control ">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-5">Ajouter</button>
                        <a href="index.php" class="btn btn-danger mt-5">Go Back</a>
                    </div>
                </form>
            </div>

        </div>
    </main>
</body>

</html>