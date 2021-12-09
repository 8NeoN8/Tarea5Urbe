<?php

    include("database.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM measures WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query Failed");
        }
    }

    $_SESSION['message'] = 'task removed successfuly';
    $_SESSION['message_type'] = 'danger';

    header("Location: index.php");
?>