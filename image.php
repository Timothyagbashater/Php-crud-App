<?php 
    include 'connect.php';
    include 'user.php';

    $sql = "select file from crud WHERE $file = $";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    //var_dump($row);
    $image = $row['$file'];
    $image_src ="upload/".$image;
?>