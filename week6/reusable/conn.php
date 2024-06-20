<?php
    $connect = mysqli_connect('localhost', 'root', '', 'publicschools');
    if(!$connect){
      die("Connection Failed: " . mysqli_connect_error());
    }
?>