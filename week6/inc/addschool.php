<?php
    include('functions.php');
    // print_r($_POST);
    // Array ( [schoolName] => My School [schoolType] => High School [phone] => 6477052728 [email] => sasch@email.com [Add_School] => )
    $schoolName = $_POST['schoolName'];
    $schoolLevel = $_POST['schoolLevel'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    require('../reusable/conn.php');

    $query = "INSERT INTO schools(`School Name`,`School Level`, `Phone`, `Email`) 
                            VALUES('". mysqli_real_escape_string($connect, $schoolName) ."', 
                            '". mysqli_real_escape_string($connect, $schoolLevel) ."', 
                            '$phone', 
                            '$email')";

    $school = mysqli_query($connect, $query);

    if($school) {
        set_message("School added successfully", "alert-success");
        header('Location: ../index.php');
    } else {
        echo 'FAILED:' . mysqli_error($connect);
    }
?>