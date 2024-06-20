<?php
    include('functions.php');
    require('../reusable/conn.php');
    $id = $_GET['id'];

    $query = "DELETE FROM schools WHERE `id` = '$id'";
    $school = mysqli_query($connect, $query);

    if($school) {
        set_message("School deleted successfully", "alert-danger");
        header('Location: ../index.php');
    } else {
        echo 'FAILED:' . mysqli_error($connect);
    }
?>