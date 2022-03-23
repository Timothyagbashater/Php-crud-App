<?php 
include 'connect.php';

if(isset($_GET['deleteid'])){

    //Accessing id from url
    $id = $_GET['deleteid'];

    //Delete query
    $sql = "delete from crud where id='$id'";
    if($conn->query($sql) === true){
        // echo "Record deleted successfully";
        echo '<div class="alert alert-success">Record Successfully Deleted! </div>';
        header('location: display.php');
    }
    else{
        die("Error connecting to datrabase".$conn->connect_error);
    }
}

?>