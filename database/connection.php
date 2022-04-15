<?php

    try {
        $db =new PDO('mysql:host=localhost;charset=utf8;dbname=first_project','root','root');
    } catch (PDOException $ex) {
        echo 'Error'. $ex;
        die();
    }

?>