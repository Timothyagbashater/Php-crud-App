<?php
//DB connection
$conn = new mysqli("localhost", "root", "", "crudoperation");

//checking db connection
if($conn === false){
    die("Error connecting to database".$conn->connect_error);
}
// else{
//     echo "Connection Successfully";
// }

?>