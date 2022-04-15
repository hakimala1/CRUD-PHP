<?php

    session_start();
    require_once('database/connection.php');
    $sql= 'SELECT * FROM articles';
    $data = $db->prepare($sql);
    $data->execute();
    $articles=$data->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($articles);
    // die()

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
    <title>Home</title>
</head>

<body>
    <div class='container '>
        <div class="row">
            <section>
                <?php if($_SESSION['message']){?>
                    <div class="alert">
                        <p class="alert alert-success">
                            <?php
                            echo $_SESSION['message'];
                            $_SESSION['message']="";
                            ?>
                        </p>
                    </div>
                <?php }?>
                <h1 class='mt-5 mb-5'>Liste des articles</h1>
                <a href="create.php" class="btn btn-primary mb-5">Ajouter un Article <article></article></a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($articles as $article) { ?>
                        <tr>
                            <td><?= $article['id']?></td>
                            <td><?= $article['name']?></td>
                            <td><?= $article['price']?></td>
                            <td><?= $article['stock']?></td>
                            <td>
                                <a href="show.php?id=<?= $article['id']?>"  class="text-blue">Show</a>
                                <a href="edit.php?id=<?= $article['id']?>"  class="text-success">Edit</a>
                                <a href="delete.php?id=<?= $article['id']?>"  class="text-danger">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>

</html>