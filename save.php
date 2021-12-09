<?php
include("database.php");

if(isset($_POST['submit'])){
    $value_measured = $_POST['tittle'];
    $date_measured = $_POST['description'];

    $query = "INSERT INTO measures(value_measured, date_measured) VALUES ('$value_measured', '$date_measured')";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Failed");
        $_SESSION['message'] = "Failed to save";
        $_SESSION['message_type'] = "danger";
    }

    $_SESSION['message'] = "Saved succesfully";
    $_SESSION['message_type'] = "success";
    header("Location:index.php");
}

?>